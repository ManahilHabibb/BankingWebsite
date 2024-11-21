<?php
// Database credentials
include 'db.php';
// Start the session
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (isset($_POST['login'])) { // Handle signup
        // Check if username already exists
        $stmt = $conn->prepare("SELECT * FROM login WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $message = 'Username already exists!';
        } else {
            // Insert new user into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO login (username, password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                $message = 'You are logged in successfully.';
            } else {
                $message = 'Login failed. Please try again.';
            }
        }
    } elseif (isset($_POST['login'])) { // Handle login
        $stmt = $conn->prepare("SELECT * FROM login WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: html.php");
            exit();
        } else {
            $message = 'Invalid username or password!';
        }
    }
}
?>
