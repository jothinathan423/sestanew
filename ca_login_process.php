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
$stmt = $conn->prepare("SELECT ca_id, username FROM ca WHERE username = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    // Authentication successful
    $_SESSION['ca_id'] = $row['ca_id'];
    header("Location: ca_dashboard.php");
} else {
    echo "<script>alert('Incorrect Username or Passowrd!'); window.location='class_advisor_login.php';</script>";
}

$stmt->close();
$conn->close();
?>
