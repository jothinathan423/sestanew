<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mentor Records Management</title>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
    <!----======== CSS ======== -->
</head>
<body>
<?php
include 'casidebar.php';
?>
<?php
include 'configuration.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if Mentor ID is provided for deletion
if (isset($_GET['id'])) {
    $mentorIdToDelete = $_GET['id'];

    // Perform deletion query
    $deleteQuery = "DELETE FROM mentors WHERE mentor_id = $mentorIdToDelete";

    if ($conn->query($deleteQuery) === TRUE) {
        
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Query to retrieve all Mentor records
$sql = "SELECT * FROM mentors";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <div class="main-panel">
        <div class="table-responsive border rounded p-1">
            <table class="table">
                <thead>
                    <tr>
                        <th class="font-weight-bold">Profile</th>
                        <th class="font-weight-bold">Mentor ID</th>
                        <th class="font-weight-bold">Mentor Name</th>
                        <th class="font-weight-bold">Email</th>
                        <th class="font-weight-bold">Department</th>
                        <th class="font-weight-bold">Phone Number</th>
                        <th class="font-weight-bold">Gender</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td><img src="' . $row['images'] . '" alt="Profile Image" class="img-xs rounded-circle"></td>';
                        echo '<td>' . $row['mentor_id'] . '</td>';
                        echo '<td>' . $row['mentor_name'] . '</td>';
                        echo '<td>' . $row['email'] . '</td>';
                        echo '<td>' . $row['department'] . '</td>';
                        echo '<td>' . $row['phonenumber'] . '</td>';
                        echo '<td>' . $row['gender'] . '</td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo "No records found.";
                }
                $conn->close();
                ?>
            </div>
</body>
</html>
