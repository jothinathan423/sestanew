<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
<title>Truncate Credit points</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
</head>
<body>


<?php
include 'configuration.php';

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Update 'creditpoint' column in 'students' table
$updateCreditpointValue = 0; // Set this to the value you want to set the 'creditpoint' column to

$sql = "UPDATE students SET credit_points=?";
    
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $updateCreditpointValue); // Assuming 'creditpoint' is an integer column

if ($stmt->execute()) {
    // Column updated successfully
    echo "Credit point column updated successfully.";
} else {
    echo "Error updating credit point column: " . $stmt->error;
}

$stmt->close();

$conn->close();
?>
    
</body>
</html>
