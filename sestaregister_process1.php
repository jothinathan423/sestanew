<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'configuration.php';
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $student_id = $_SESSION["student_id"];

    $selectedOption = $_POST["activity_type"];
    $topic = $_POST["topic"];
    $organized_by = $_POST["organized_by"];
    $attended_from_date = $_POST["attended_from_date"];
    $attended_to_date = $_POST["attended_to_date"];
    $prize_position = $_POST["prize_position"];

    // Split the selected option into two parts, e.g., using a delimiter like " - "
    list($activity_type, $credit_points) = explode(" - ", $selectedOption);

    // Calculate the number of days
    $fromDate = new DateTime($attended_from_date);
    $toDate = new DateTime($attended_to_date);
    $interval = $fromDate->diff($toDate);
    $number_of_days = ($interval->days) + 1;

    // Retrieve the roll number of the student from the 'students' table
    $roll_number_query = "SELECT roll_number, branch, year_of_study FROM students WHERE id = '$student_id'";
    $roll_number_result = $conn->query($roll_number_query);

    if ($roll_number_result->num_rows > 0) {
        $row = $roll_number_result->fetch_assoc();
        $roll_number = $row["roll_number"];
        $branch = $row["branch"];
        $year = $row["year_of_study"];

        // Create folders named after the student's year and branch if they don't exist
        $year_folder = "certificates/" . $year . "/";
        if (!file_exists($year_folder)) {
            mkdir($year_folder, 0777, true);
        }

        $branch_folder = $year_folder . $branch . "/";
        if (!file_exists($branch_folder)) {
            mkdir($branch_folder, 0777, true);
        }

        // Create a folder named after the student's roll number if it doesn't exist
        $certificate_dir = $branch_folder . $roll_number . "/additional_certificates/";
        if (!file_exists($certificate_dir)) {
            mkdir($certificate_dir, 0777, true);
        }

        // Generate a unique filename based on activity type and topic
        $filename = $activity_type . '-' . $topic . '-' . uniqid();
        $extension = pathinfo($_FILES["certificate"]["name"], PATHINFO_EXTENSION);
        $certificate_path = $certificate_dir . $filename . '.' . $extension;

        if (move_uploaded_file($_FILES["certificate"]["tmp_name"], $certificate_path)) {
            // Insert data into the database without checking for existing registrations
            $sql = "INSERT INTO addstudent_activities (student_id, activity_type, topic, certificate_path, organized_by, attended_from_date, attended_to_date, prize_position, credit_points, number_of_days, status)
                    VALUES ('$student_id', '$activity_type', '$topic', '$certificate_path', '$organized_by', '$attended_from_date', '$attended_to_date', '$prize_position', '$credit_points', '$number_of_days', 'waiting')";

            if ($conn->query($sql) === true) {
                echo "<script>alert('Successfully Registered.'); window.location='viewcertificate.php?id=" . $student_id . "';</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Error uploading certificate.";
        }
    } else {
        echo "Roll number not found for the student.";
    }

    $conn->close();
}
?>
