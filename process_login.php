<?php
session_start();

// Connect to your MySQL database (replace with your database details)
include 'configuration.php';
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check for errors in the connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query to fetch principal data based on username
    $query = "SELECT * FROM principal WHERE username = '$username'";
    $result = $mysqli->query($query);

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if ($row['password'] === $password) {
            // Successful login
            $_SESSION['principal_id'] = $row['principal_id'];
            header("Location: principaldash.php");
            exit(); // Terminate script after the header() call
        } else {
            // Incorrect password
            
            echo "<script>alert('Login Failed.Incorrect Password'); window.location='principal_login.php';</script>";
        }
    } else {
        // User not found
        echo "<script>alert('Username not Found'); window.location='principal_login.php';</script>";
        
    }
}

// Close the database connection
$mysqli->close();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mentor Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Principal Login</h1>
        <br><br>
        <center>
            <!-- Your HTML form for login can go here -->
        </center>
    </div>
</body>
</html>
