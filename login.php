<?php
session_start();
require_once 'db_connect.php';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT id, username, password FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row['id'];
        $db_username = $row['username'];
        $hashed_password = $row['password'];

        
        if (password_verify($password, $hashed_password)) {
    
            $_SESSION['loggedin'] = true;
            $_SESSION['id'] = $id;
            $_SESSION['username'] = $db_username;

          
            header("location: index.php");
        } else {
           
            $_SESSION['login_error'] = "Invalid username or password.";
            header("location: index.php");
        }
    } else {
       
        $_SESSION['login_error'] = "Invalid username or password.";
        header("location: index.php");
    }

    $conn->close();
}
?>