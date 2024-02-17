<?php
session_start();

// Database connection parameters
include 'configuration.php';

// Create a database connection
$db = new mysqli($servername, $username, $password, $dbname);

// Check for a connection error
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Check if CA is logged in and their ID is in the session
if (isset($_SESSION['hod_id'])) {
    // Get CA's ID from the session
    $hod_id = $_SESSION['hod_id'];

    $conn = new mysqli($servername, $username, $password, $dbname);
$query = "SELECT branch FROM hod WHERE hod_id ='$hod_id'";
$result = mysqli_query($conn, $query);

if ($result && mysqli_num_rows($result) > 0) {
    $hodData = mysqli_fetch_assoc($result);
    $branch = $hodData['branch'];
    

}
    // Modify the database query to select data based on the CA's ID and approved status
    $query = "SELECT students.year_of_study, CONCAT(students.firstname, ' ', students.lastname) AS student_name, student_activities.activity_type, student_activities.topic, student_activities.organized_by, student_activities.attended_from_date, student_activities.attended_to_date, student_activities.number_of_days, student_activities.prize_position, student_activities.credit_points 
              FROM students 
              JOIN student_activities ON students.id = student_activities.student_id 
              WHERE students.branch = '$branch' AND student_activities.status = 'approved'"; // Add the status condition here
    
    // Execute the query
    $result = $db->query($query);

    if ($result) {
        // Set the headers to tell the browser it's an Excel file
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="database_data.csv"');

        // Output the column headers
        $columns = $result->fetch_fields();
        $columnNames = array();
        foreach ($columns as $column) {
            $columnNames[] = $column->name;
        }
        echo implode(',', $columnNames) . "\n";

        // Output the data
        while ($row = $result->fetch_assoc()) {
            echo implode(',', $row) . "\n";
        }

        // Close the database connection
        $db->close();
    } else {
        echo "Error: " . $db->error;
    }
} else {
    echo "CA not logged in. Please log in first.";
}
?>
