<?php
if (isset($_POST['accept'])) {
    // Get the activity_id and student_id from the form
    $activity_id = $_POST['activity_id'];
    $student_id = $_POST['student_id'];

    include 'configuration.php';
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Update the status column to 'approved' in the student_activities table
    $query = "UPDATE student_activities SET status = 'approved' WHERE activity_id = " . $conn->real_escape_string($activity_id);

    if ($conn->query($query) === TRUE) {
        // Redirect back to the student details page
        header("Location: ment_student_activities.php?id=$student_id");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    // Close the database connection
    $conn->close();
}
?>
