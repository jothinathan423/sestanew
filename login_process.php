<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection code here (similar to the previous examples).
   include 'configuration.php';

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM students WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        // Set a session variable to indicate the user is logged in.
        $_SESSION["student_id"] = $row["id"];
        header("Location: dashboard.php"); // Redirect to a student dashboard or any other page.
    } else {
        echo "<script>alert('Username or Password is incorrect!'); window.location='studentlogin.php';</script>";
    }

    $conn->close();
}
?>
