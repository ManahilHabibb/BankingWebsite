```php
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = ""; // Default password is empty for XAMPP
$database = "mybank";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
$fullName = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
$signupemail = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
$signupusername = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
$signuppassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

// Prepare statement
$stmt = $conn->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $fullName, $signupemail, $signupusername, $signuppassword);

// Execute statement
if ($stmt->execute()) {
    echo "New record created successfully!";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
```