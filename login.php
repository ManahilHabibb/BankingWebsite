```php
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$db_username = "root";
$db_password = "";
$database = "mybank";

$conn = new mysqli($servername, $db_username, $db_password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get form data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $anyname = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate form data
    if (empty($anyname) || empty($email) || empty($username) || empty($password)) {
        echo "Please fill in all fields.";
    } else {
        // Prepare SQL statement
        $stmt = $conn->prepare("INSERT INTO users (name, email, username, password) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $anyname, $email, $username, $password);

        // Execute SQL statement
        if ($stmt->execute()) {
            echo "Registration successful!";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
}

$conn->close();
?>
```