<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Database connection code (replace with your actual database credentials)
include 'configuration.php';

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get the username and password from the login form
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Query the database to check if the provided username and password are valid
    $query = "SELECT * FROM admin WHERE username = '$enteredUsername' AND password = '$enteredPassword'";

    $result = $conn->query($query);

    if ($result->num_rows === 1) {
        // Admin login successful
        session_start();
        $_SESSION['admin_logged_in'] = true;
        header("Location: admin.php"); // Redirect to the admin dashboard
    } else {
        // Admin login failed
        echo "<script>alert('Username or Password is incorrect!'); window.location='admin_login.php';</script>";
    }

    // Close the database connection
    $conn->close();
} else {
    echo 'Invalid request';
}
?>
