<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli("localhost", "root", "", "login");

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve user input
    $username = $_POST["username"];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT); // Hash the password for security

    // Check if the username already exists in the database
    $check_query = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($check_query);

    if ($result->num_rows > 0) {
        echo "Username already exists. Please choose a different username.";
    } else {
        // Insert the new user into the database
        $insert_query = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($insert_query) === TRUE) {
            echo 'Registration successful. <a href="login.php">Login here</a>.';


        } else {
            echo "Error: " . $insert_query . "<br>" . $conn->error;
        }
    }

    $conn->close();
}
?>
