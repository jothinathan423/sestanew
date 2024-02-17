<?php
session_start();

// Include your database connection code here (e.g., connection details, functions).
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define a function to safely handle user input
function sanitizeInput($conn, $input) {
    return htmlspecialchars(mysqli_real_escape_string($conn, trim($input)));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form is submitted

    $name = sanitizeInput($conn, $_POST['name']);
    $email = sanitizeInput($conn, $_POST['email']);
    $date_of_birth = sanitizeInput($conn,$_POST['date_of_birth']);
    $rollnumber = sanitizeInput($conn, $_POST['rollnumber']);
    $phone = sanitizeInput($conn, $_POST['phonenumber']);
    $from_number = sanitizeInput($conn, $_POST['from_number']);
    $to_number = sanitizeInput($conn, $_POST['to_number']);
    $gender = sanitizeInput($conn, $_POST['gender']);
    $year = sanitizeInput($conn, $_POST['year']);
    $department = sanitizeInput($conn, $_POST['department']);

    // Check if a file was uploaded
    if (isset($_FILES['profile_picture']) && $_FILES['profile_picture']['error'] === 0) {
        $targetDir = 'peerprofile/'; // Directory to save profile images
        $fileName = basename($_FILES['profile_picture']['name']);
        $profilePicture = $targetDir . $fileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($_FILES['profile_picture']['tmp_name'], $profilePicture)) {
            // Insert data into the database
            $sql = "INSERT INTO peer_mentor (name, email, roll_number, password, number, fromnumber, tonumber, gender, year, department, images) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssssssssss", $name, $email, $rollnumber, $date_of_birth, $phone, $from_number, $to_number, $gender, $year, $department, $profilePicture);

            if ($stmt->execute()) {
                echo '<script>
    alert("Data inserted successfully.");
    window.location.href = "spmupdate.php";
</script>';

                // You can do other actions here after a successful insertion, if needed.
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Failed to move the uploaded file.";
        }
    } else {
        echo "No file uploaded.";
    }
}

// Close the database connection
$conn->close();
?>
