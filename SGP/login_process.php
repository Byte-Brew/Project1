<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "login");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    header("Location: login.php?error=Incorrect password. Please try again.");

    // Retrieve user input
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if the username exists in the database
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check_query);



    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Verify the password
        if (password_verify($password, $row["password"])) {
            // Start a session to store user data
            session_start();
            $_SESSION["username"] = $username;

            // Redirect to the dashboard.html page upon successful login
            header("Location: Medical/index.html");
            exit;
        } else {
            echo "Incorrect password. Please try again.";
        }
    } else {
        echo "Username not found. Please register <a href='signup.php'>here</a>.";
    }

    $conn->close();
}
?>