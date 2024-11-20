<?php
// Database credentials
$servername = "localhost";
$username = "root"; 
$password = "";     
$dbname = "bank";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username']; // User's entered username
    $password = $_POST['password']; // User's entered password

    // Query to get the user by username
    $stmt = $conn->prepare("SELECT * FROM signup WHERE username = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    // Fetch user data
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and verify the password
    if ($user && password_verify($password, $user['password'])) {
        // Password is correct, start the session
        $_SESSION['username'] = $username;

        // Redirect to welcome.php
        header("Location: html.php");
        exit(); // Ensure no further code is executed
    } else {
        // If the username or password is incorrect
        $message = 'Invalid username or password!';
    }
}
?>
