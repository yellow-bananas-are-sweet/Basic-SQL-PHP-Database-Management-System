<?php
session_start();


if ($_SESSION['loggedin'] === true) {
    echo "<h1>Welcome, " . htmlspecialchars($_SESSION['username']) . "!</h1>";
    echo "<p>You are logged in.</p>";
    echo "<a href='logout.php'>Logout</a>";
    
} else {
    echo "<h1>Login</h1>";
    if (isset($_SESSION['login_error'])) {
        echo "<p style='color:red;'>" . $_SESSION['login_error'] . "</p>";
        unset($_SESSION['login_error']); 
    }
    ?>



    <form action="login.php" method="post">

        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Login">

    </form>
    <p>Don't have an account? <a href="register.php">Register here.</a></p>
    
	
	
	<?php
}
?>