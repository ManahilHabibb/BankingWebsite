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
    $name = htmlspecialchars($_POST['name'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $username = htmlspecialchars($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (isset($_POST['signup'])) { // Handle signup
        // Check if username already exists
        $stmt = $conn->prepare("SELECT * FROM signup WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $message = 'Username already exists!';
        } else {
           
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO signup (username, email, name, password) VALUES (:username, :email, :name, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                $_SESSION['username'] = $username; 
                header("Location: html.php"); 
                exit();
            } else {
                $message = 'Signup failed. Please try again.';
            }
        }
    } 
}
?>
