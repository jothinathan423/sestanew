<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOD Records Management</title>
    <!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
    <!----======== CSS ======== -->
</head>
<body>
<?php
include 'adminsidebar.php';
?>
<?php
include 'configuration.php';
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if HOD ID is provided for deletion
if (isset($_GET['id'])) {
    $hodIdToDelete = $_GET['id'];

    // Perform deletion query
    $deleteQuery = "DELETE FROM hod WHERE hod_id = $hodIdToDelete";

    if ($conn->query($deleteQuery) === TRUE) {
        
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Query to retrieve all HOD records
$sql = "SELECT * FROM hod";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>
    <div class="main-panel">
        <div class="table-responsive border rounded p-1">
            <table class="table">
                <thead>
                    <tr>
                        <th class="font-weight-bold">Profile</th>
                        <th class="font-weight-bold">HOD ID</th>
                        <th class="font-weight-bold">Username</th>
                        <th class="font-weight-bold">Name</th>
                        <th class="font-weight-bold">Branch</th>
                        <th class="font-weight-bold">Phone Number</th>
                        <th class="font-weight-bold">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td><img src="' . $row['images'] . '" alt="Profile Image" class="img-xs rounded-circle"></td>';
                        echo '<td>' . $row['hod_id'] . '</td>';
                        echo '<td>' . $row['username'] . '</td>';
                        echo '<td>' . $row['name'] . '</td>';
                        echo '<td>' . $row['branch'] . '</td>';
                        echo '<td>' . $row['phonenumber'] . '</td>';
                        echo '<td><a href="#" onclick="confirmDelete(' . $row['hod_id'] . ');">Delete</a></td>';
                        echo '</tr>';
                    }
                    echo '</table>';
                } else {
                    echo "No records found.";
                }
                $conn->close();
                ?>
            </div>
    </div>
    <script>
        function confirmDelete(hodId) {
            var result = confirm("Are you sure you want to delete this record?");
            if (result) {
                window.location.href = '?id=' + hodId;
            }
        }
    </script>
</body>
</html>
