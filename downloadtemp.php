<?php
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

// Folder path on the server
$folderPath = 'certificates';

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
?>
