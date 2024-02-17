<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>SPM Update</title>
    <link rel="shortcut icon" href="mec.jpg" />
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

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete"])) {
    $peerIdToDelete = $_POST["delete"];
    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("DELETE FROM peer_mentor WHERE peer_id = ?");
    $stmt->bind_param("i", $peerIdToDelete);
    $stmt->execute();
    $stmt->close();

    // Display success message
    echo '<script>alert("Profile deleted successfully."); window.location="spmupdate.php";</script>';
}

// Query to retrieve all student peer mentor records
$sql = "SELECT * FROM peer_mentor";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    ?>

    <div class="main-panel">

        <div class="table-responsive border rounded p-1">
            <table class="table">
                <thead>
                <tr>
                    <th class="font-weight-bold">Profile</th>
                    <th class="font-weight-bold">Roll number</th>
                    <th class="font-weight-bold">Student Name</th>
                    <th class="font-weight-bold">Year of Study</th>
                    <th class="font-weight-bold">Department</th>
                    <th class="font-weight-bold">Email</th>
                    <th class="font-weight-bold">Phone</th>
                    <th class="font-weight-bold">Action</th>
                </tr>
                </thead>
                <tbody>

                <?php

                while ($row = $result->fetch_assoc()) {
                    echo '<tr>';
                    echo '<td><img src="' . $row['images'] . '" alt="Your Image" class="img-xs rounded-circle"></td>';
                    echo '<td>' . $row['roll_number'] . '</td>';
                    echo '<td>' . $row['name'] . '</td>';
                    echo '<td>' . $row['year'] . '</td>';
                    echo '<td>' . $row['department'] . '</td>';
                    echo '<td>' . $row['email'] . '</td>';
                    echo '<td>' . $row['number'] . '</td>';
                    echo '<td>';
                    echo '<form method="POST" onsubmit="return confirmDelete()">';
                    echo '<input type="hidden" name="delete" value="' . $row['peer_id'] . '">';
                    echo '<button type="submit">Delete</button>';
                    echo '</form>';
                    echo '<a href="update_form.php?id=' . $row['peer_id'] . '">Update</a>';
                    echo '</td>';
                    echo '</tr>';
                }

                echo '</table>';
} else {
    echo "No records found.";
}

$conn->close();
?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete this profile?");
    }
</script>

</div>
</div>
</body>
</html>
