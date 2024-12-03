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


    $stmt = $conn->prepare("SELECT * FROM signup WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    
        if (isset($_POST['login'])) { // Handle login
            $stmt = $conn->prepare("SELECT * FROM signup WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
    
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
    
            if ($user && password_verify($password, $user['password'])) {
                $_SESSION['valid'] = true;
                header("Location: html.php");
                exit();
            } else {
                $message = 'Invalid username or password!';
            }
        }
    }
?>