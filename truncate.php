
<?php
session_start();
include 'configuration.php';

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get selected year and branch from the form
    $selectedYear = $_POST['year'];
    $selectedBranch = $_POST['branch'];

    // JavaScript confirmation before submitting the form
    echo '<script>
            var confirmed = confirm("Are you sure you want to truncate? before truncate check whether you have the backup of excel and files.");
            if (confirmed) {
                document.getElementById("truncateForm").submit();
            } else {
                alert("Truncate canceled.");
                window.location.href = "download.php";
            }
          </script>';

    $truncateValue = ''; // Set this to the value you want to set the column to (e.g., empty string, NULL)

    // Update 'credit_points'
    $updateSql = "UPDATE students SET credit_points=? WHERE year_of_study=? AND branch=?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("iss", $truncateValue, $selectedYear, $selectedBranch);

    if ($updateStmt->execute()) {
        echo '<script>alert("Credit points updated successfully for selected year and branch.");</script>';
    } else {
        echo '<script>alert("Error updating credit points: ' . $updateStmt->error . '");</script>';
    }

    // Update 'addcredit_points'
    $updateSql = "UPDATE students SET addcredit_points=? WHERE year_of_study=? AND branch=?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("iss", $truncateValue, $selectedYear, $selectedBranch);

    if ($updateStmt->execute()) {
        echo '<script>alert("Additional Credit points updated successfully for selected year and branch.");</script>';
    } else {
        echo '<script>alert("Error updating additional credit points: ' . $updateStmt->error . '");</script>';
    }

    $updateStmt->close();

    // Truncate the 'student_activities' table
    $truncateSql = "DELETE FROM student_activities WHERE student_id IN (SELECT id FROM students WHERE year_of_study=? AND branch=?)";
    $truncateStmt = $conn->prepare($truncateSql);
    $truncateStmt->bind_param("ss", $selectedYear, $selectedBranch);

    if ($truncateStmt->execute()) {
        echo '<script>alert("Student activities table truncated successfully for selected year and branch.");</script>';
    } else {
        echo '<script>alert("Error truncating student activities table: ' . $truncateStmt->error . '");</script>';
    }

    // Truncate the 'addstudent_activities' table
    $truncateSql = "DELETE FROM addstudent_activities WHERE student_id IN (SELECT id FROM students WHERE year_of_study=? AND branch=?)";
    $truncateStmt = $conn->prepare($truncateSql);
    $truncateStmt->bind_param("ss", $selectedYear, $selectedBranch);

    if ($truncateStmt->execute()) {
        echo '<script>alert("Additional Student activities table truncated successfully for selected year and branch.");</script>';
    } else {
        echo '<script>alert("Error truncating additional student activities table: ' . $truncateStmt->error . '");</script>';
    }

    $truncateStmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="mec.jpg" />
    <title>Truncate</title>
    <!-- Add your CSS and JavaScript dependencies here -->
</head>
<body>
    <?php include 'adminsidebar.php'; ?>
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row purchace-popup">
                <div class="col-12 stretch-card grid-margin">
                    <form id="truncateForm" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                        <label for="year">Select Year:</label>
                        <select name="year" id="year">
                            <!-- Add options for years -->
                            <option value="1">1 - Year</option>
                            <option value="2">2 - Year</option>
                            <option value="3">3 - Year</option>
                            <option value="4">4 - Year</option>
                            <!-- Add more options as needed -->
                        </select>
                        <br>
                        <label for="branch">Select Branch:</label>
                        <select name="branch" id="branch">
                            <option value="B.E - Bio Medical Engineering">B.E - Bio Medical Engineering</option>
                                <option value="B.E - Computer Science and Engineering">B.E - Computer Science and Engineering</option>
                                <option value="B.E - Computer Science and Engineering (Artificial Intelligence and Machine Learning)">B.E - Computer Science and Engineering (Artificial Intelligence and Machine Learning)</option>
                                <option value="B.E - Computer Science and Engineering (Cyber Security)">B.E - Computer Science and Engineering (Cyber Security)</option>
                                <option value="B.E - Electronics Engineering (VLSI Design and Technology)">B.E - Electronics Engineering (VLSI Design and Technology)</option>
                                <option value="B.E - Electronics and Communication Engineering">B.E - Electronics and Communication Engineering</option>
                                <option value="B.E - Electrical and Electronics Engineering">B.E - Electrical and Electronics Engineering</option>
                                <option value="B.E - Civil Engineering">B.E - Civil Engineering</option>
                                <option value="B.E - Mechanical Engineering">B.E - Mechanical Engineering</option>
                                <option value="B.E - Mechatronics Engineering">B.E - Mechatronics Engineering</option>
                                <option value="B.Tech - Bio Technology">B.Tech - Bio Technology</option>
                                <option value="B.Tech - Information Technology">B.Tech - Information Technology</option>
                                <option value="B.Tech - Artificial Intelligence and Data Science">B.Tech - Artificial Intelligence and Data Science</option>
                                <option value="B.Tech - Computer Science and Business Systems">B.Tech - Computer Science and Business Systems</option>
                                <option value="M.E - Computer Science and Engineering">M.E - Computer Science and Engineering</option>
                                <option value="M.E - VLSI Design">M.E - VLSI Design</option>
                                <option value="M.E - Power Systems Engineering">M.E - Power Systems Engineering</option>
                                <option value="M.E - CAD/CAM">M.E - CAD/CAM</option>
                                <option value="Master of Business Administration">Master of Business Administration</option>
                                <option value="Master of Computer Applications">Master of Computer Applications</option>>
                        </select>
                        <br>
                        <input type="submit" value="Truncate">
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
