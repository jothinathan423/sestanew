<?php
session_start();
include 'configuration.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $rollnumber = $_POST["rollnumber"];
    $year_of_study = $_POST["year"];
    $branch = $_POST["department"];
    $section = $_POST["section"];
    $phone = $_POST["phone"];
    $ment = $_POST["ment"];
    $ca = $_POST["ca"];

    // Check if the roll number already exists
    $check_query = "SELECT * FROM students WHERE roll_number='$rollnumber'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // Roll number already exists
        echo '<script>alert("Student with the same roll number already exists!"); window.location="studentregister.php";</script>';
        exit();
    }

    // Handle image upload
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == UPLOAD_ERR_OK) {
        $targetDirectory = "studentprofile/"; // Create a directory for storing uploaded images
        $targetFile = $targetDirectory . basename($_FILES["image"]["name"]);
        $uploadOk = 1;

        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if ($check !== false) {
            // Image is valid
        } else {
            echo "<p class='text-danger'>File is not an image.</p>";
            $uploadOk = 0;
        }

        if ($_FILES["image"]["size"] > 500000) {
            echo '<script>alert("Your File is too large. Try to upload another Image.");</script>';
            // Redirect back using JavaScript
            echo '<script>window.history.back();</script>';
            $uploadOk = 0;
        }

        if (file_exists($targetFile)) {
            echo '<script>alert("Sorry, this file already exists.");</script>';
            echo '<script>window.history.back();</script>';
            $uploadOk = 0;
        }

        $allowedExtensions = array("jpg", "jpeg", "png", "gif");
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        if (!in_array($imageFileType, $allowedExtensions)) {
            echo '<script>alert("Sorry, only JPG, JPEG, PNG, and GIF files are allowed.");</script>';
            echo '<script>window.history.back();</script>';
            $uploadOk = 0;
        }

        if ($uploadOk == 1) {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
                $imagePath = $targetFile;

                // Modified SQL query to include a default value for 'addcredit_points'
                $sql = "INSERT INTO students (firstname, lastname, roll_number, email, password, gender, dob, mentor_id, ca_id, year_of_study, branch, section, phone, images, credit_points, addcredit_points)
                        VALUES ('$firstname', '$lastname', '$rollnumber', '$email', '$password', '$gender', '$dob', '$ment', '$ca', '$year_of_study', '$branch', '$section', '$phone', '$imagePath', 0, 0)";

                if ($conn->query($sql) === true) {
                    // Display alert message
                    echo '<script>alert("Student registered successfully."); window.location.href = "ca_dashboard.php";</script>';
    // Close the connection
                    // Close the connection
                    $conn->close();
                    // Redirect to ca_dashboard.php
                    header("Location: ca_dashboard.php");
                    exit();
                } else {
                    echo "<p class='text-danger'>Error: " . $sql . "<br>" . $conn->error . "</p>";
                }
            } else {
                echo "<p class='text-danger'>Sorry, there was an error uploading your file.</p>";
            }
        }
    } else {
        echo "<p class='text-danger'>No file was uploaded or an error occurred.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
</body>
</html>
