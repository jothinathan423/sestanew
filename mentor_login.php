<?php
session_start();
include("config.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM mentors WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if ($password == $row["password"]) { // No password encryption
            $_SESSION["mentor_id"] = $row["mentor_id"];
            header("Location: mentor_dashboard.php");
        } else {
            echo "<script>alert('Incorrect Password!'); window.location='mentorlogin.php';</script>";
        }
    } else {
        echo "<script>alert('Username not Found'); window.location='mentorlogin.php';</script>";
    }
}

// HTML form for mentor login goes here
?>
