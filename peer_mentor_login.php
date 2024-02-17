<?php
// Start the session at the very beginning of your script
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
$stmt = $conn->prepare("SELECT peer_id, name FROM peer_mentor WHERE email = ? AND password = ?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if ($row) {
    // Authentication successful
    $_SESSION['peer_id'] = $row['peer_id'];

    header("Location: peer_dashboard.php");
    exit(); // Terminate the script after the header() call
} else {
    echo "<script>alert('Username or Password is incorrect!'); window.location='peer_login.html';</script>";
}

$stmt->close();
$conn->close();
?>
