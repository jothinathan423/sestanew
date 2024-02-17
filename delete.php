<?php
session_start();
$baseFolderPath = 'certificates';

// Function to delete a folder and its contents recursively
function deleteFolder($folderPath) {
    if (!is_dir($folderPath)) {
        // Not a directory, do nothing or handle error as needed
        return false;
    }

    $files = array_diff(scandir($folderPath), ['.', '..']);

    foreach ($files as $file) {
        $filePath = $folderPath . '/' . $file;

        if (is_dir($filePath)) {
            // Recursive call to delete subdirectories and files
            deleteFolder($filePath);
        } else {
            // Delete the file
            unlink($filePath);
        }
    }

    // Remove the empty directory
    return rmdir($folderPath);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmed'])) {
    $selectedYear = $_POST['year'];
    $selectedBranch = $_POST['branch'];

    // Construct the folder path based on selected year and branch
    $folderPath = $baseFolderPath . '/' . $selectedYear . '/' . $selectedBranch;

    // Call the function to delete the folder
    if (deleteFolder($folderPath)) {
         echo '<script>alert("Successfully deleted");</script>';
    } else {
         echo '<script>alert("Error in Deletion");</script>';
    }
}
?>
<?php

include 'adminsidebar.php';

?>
<!DOCTYPE html>
<html>
<head>
    <title>Delete Folder Form</title>
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this folder? Please check whether you have a backup file.");
        }
    </script>
</head>
<body>
    <center>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit="return confirmDelete();">
        <h1>Deleting Certificates in Storage</h1><br>
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
        <label for="branch">Branch:</label>
        <select name="branch" required>
            <!-- Add options for the branches you want-->
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
                                <option value="Master of Computer Applications">Master of Computer Applications</option>
            <!-- Add more branches as needed -->
        </select>
<br><br><br>
<center>
        <input type="hidden" name="confirmed" value="true">
        <input type="submit" value="Delete Folder">
        </center>
    </form>
    </center>
</body>
</html>
