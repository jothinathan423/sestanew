<?php
session_start();

include 'configuration.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $dob = $_POST['dob'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $id = $_POST['id'];
    $year_of_study = $_POST['year_of_study'];
    $branch = $_POST['branch'];
    $section = $_POST['section'];
    $ca = $_POST['ca'];
    $mentor_id = $_POST['mentor_id'];

    // Perform update query
    $sql = "UPDATE students SET firstname=?, lastname=?, dob=?, email=?, phone=?, gender=?, year_of_study=?, branch=?, section=?, ca_id=?, mentor_id=? WHERE roll_number=?";
    
    $stmt = $conn->prepare($sql);

    // Ensure 'roll_number' is treated as a string by using 's' in bind_param
    $stmt->bind_param("ssssssssssss", $firstname, $lastname, $dob, $email, $phone, $gender, $year_of_study, $branch, $section, $ca, $mentor_id, $id);

    if ($stmt->execute()) {
        // Record updated successfully
        echo "<script>alert('Updated Successfully.'); window.location='ca_dashboard.php';</script>";// Redirect to a confirmation page
        exit();
    } else {
        echo "Error updating record: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
