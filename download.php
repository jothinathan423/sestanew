<?php

session_start();

// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Function to recursively add files to a zip archive
function addFilesToZip($folder, &$zip, $basePath = '')
{
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($folder),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        if (!$file->isDir()) {
            $filePath = $file->getRealPath();
            $relativePath = ltrim(substr($file->getPathname(), strlen($basePath)), DIRECTORY_SEPARATOR);
            $zip->addFile($filePath, $relativePath);
        }
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get selected year and branch from the form
    $selectedYear = $_POST['year'];
    $selectedBranch = $_POST['branch'];

    // Folder path on the server based on the selected year and branch
     if ($selectedBranch === 'all') {
        // Download from the selected year folder without considering the branch
        $folderPath = "certificates/{$selectedYear}";
    } else {
        // Download from the selected year and branch folder
        $folderPath = "certificates/{$selectedYear}/{$selectedBranch}";
    }

    // Output zip file name
    $zipFileName = 'downloads.zip';

    // Create a Zip archive
    $zip = new ZipArchive();

    // Check if the zip archive was created successfully
    if ($zip->open($zipFileName, ZipArchive::CREATE | ZipArchive::OVERWRITE) === true) {
        addFilesToZip($folderPath, $zip, $folderPath);
        $zip->close();

        // Set appropriate headers for file download
        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename=' . $zipFileName);
        header('Content-Length: ' . filesize($zipFileName));

        // Read the zip file and output its content
        readfile($zipFileName);

        // Delete the temporary zip file after download
        unlink($zipFileName);
        exit;
    } else {
        die('Unable to create zip archive.');
    }
}
?>
<?php

include 'adminsidebar.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Student Dashboard</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />

<!-- End layout styles -->
<!-- End layout styles -->
</head>
<body>
    <center>
     <div class="container">
    <h1>Download Certificates</h1>
<br><br>
            <div class="details personal">
    <h2>Select Year and Branch</h2>
     <form method="post" action="">
        <label for="year">Year:</label>
        <select name="year" required>
            <!-- Add options for the years you want to include -->
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
            
            <!-- Add more options as needed -->
        </select>
<br><br><br><br><br>
<center>
        <button type="submit">Download Certificates</button>
        </center>
    </form>
    </div>
    </div>
    </center>
</body>
</html>
