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
            // Insert new user into the database
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $conn->prepare("INSERT INTO signup (name, email, username, password) VALUES (:name, :email, :username, :password)");
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);

            if ($stmt->execute()) {
                $message = 'Signup successful! You can now log in.';
            } else {
                $message = 'Signup failed. Please try again.';
            }
        }
    } elseif (isset($_POST['login'])) { // Handle login
        $stmt = $conn->prepare("SELECT * FROM signup WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['username'] = $username;
            header("Location: dashboard.php"); // Redirect to the dashboard or home page
            exit();
        } else {
            $message = 'Invalid username or password!';
        }
    }
}
?>
