<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start(); // Start the session only if none exists
}
// Database credentials
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "bank";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (isset($_POST['login'])) { 
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
                $message = 'You are signed up successfully.';
            } else {
                $message = 'Signup failed. Please try again.';
            }
        }
    } elseif (isset($_POST['login'])) { // Handle login
        $stmt = $conn->prepare("SELECT * FROM login WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (isset($_SESSION['valid'])){
            header("Location: html.php");
            exit();
        } else {
            $message = 'Invalid username or password!';
        }
    }
}
?>