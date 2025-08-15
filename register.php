<?php
session_start();
require_once 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, password) VALUES ('$username', '$hashed_password')";
    if ($conn->query($sql) === TRUE) {
    
        $_SESSION['login_error'] = "Registration successful! You can now log in.";
        header("location: index.php");
        exit;
    } else {
       
        $error_message = "Registration failed. Username may already exist.";
        $_SESSION['login_error'] = $error_message;
        header("location: index.php");
        exit;
    }

    $conn->close();
} 
?>




<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="register.php" method="post">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
    <p>Already have an account? <a href="index.php">Login here.</a></p>
</body>
</html>