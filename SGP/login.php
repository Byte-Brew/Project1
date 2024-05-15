<!DOCTYPE html>
<html>
<head>
    <title>Compassbooking</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Login at Compassbooking</h2>
        <form action="login_process.php" method="post">
            <label for="username">Username:</label>
            <input type="text" name="username" required><br><br>
            <label for="password">Password:</label>
            <input type="password" name="password" required><br><br>
            <input type="submit" value="Login">
        </form>
        <?php
        if (isset($_GET["error"])) {
            $error = $_GET["error"];
            echo "<p class='error-message'>$error</p>";
        }
        ?>
        <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
    </div>
</body>
</html>
