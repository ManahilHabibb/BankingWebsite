<?php
// Database credentials
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "bank";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connection successful";
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit();
}

?>
