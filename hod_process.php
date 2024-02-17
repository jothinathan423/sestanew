<?php
session_start();

// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get username and password from the login form
$username = $_POST['username'];
$password = $_POST['password'];

// Prepare and execute a SQL statement to select the CA from the "ca" table
$stmt = $conn->prepare("SELECT hod_id, username FROM hod WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    // Authentication successful
    $_SESSION['hod_id'] = $row['hod_id'];
    header("Location: hod_dashboard.php");
} else {
    
        echo "<script>alert('Username or Password is incorrect!'); window.location='hod_login.html';</script>";
}

$stmt->close();
$conn->close();
?>
