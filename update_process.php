<?php
session_start();

// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $peer_id = $_POST['peer_id'];
    $name = $_POST['name'];
    $date_of_birth = $_POST['date_of_birth'];
    $email = $_POST['email'];
    $from_number = $_POST['from_number'];
    $to_number = $_POST['to_number'];
    $gender = $_POST['gender'];
    $year = $_POST['year'];
    $department = $_POST['department'];

    // Handle the uploaded profile picture
    

    // Update the student peer mentor information
    $sql = "UPDATE peer_mentor SET name=?, password=?, email=?, fromnumber=?, tonumber=?, gender=?, year=?, department=? WHERE peer_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssssi", $name, $date_of_birth, $email, $from_number, $to_number, $gender, $year, $department, $peer_id);

    if ($stmt->execute()) {
        // Record updated successfully
        echo "updated successfully";
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

// Close the database connection
$conn->close();
?>
