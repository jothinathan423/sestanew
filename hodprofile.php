<?php

session_start();


?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendors/simple-line-icons/css/simple-line-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="vendors/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="vendors/chartist/chartist.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="css/style.css">
    <!-- End layout styles -->
    
    <title>HOD Dashoboard</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
  </head>
  <body>
  <div class="container-scroller">

<?php
include 'hodsidebar.php';
?>

<?php
// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize $mentor_id
$hod_id = null;

if (isset($_GET['hod_id'])) {
    $hod_id = $_GET['hod_id'];
} else {
    // Handle the case when mentor_id is not provided in the URL
    echo "Mentor ID is missing in the URL.";
}

// Use prepared statements to query the database
if ($hod_id !== null) {
    $query = "SELECT * FROM hod WHERE hod_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $hod_id); // Assuming mentor_id is an integer, use "i" for integers
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any rows are returned
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            // Process mentor data here
        }
    } else {
        echo "Mentor data not found.";
    }
}
?>

        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">

              </div>
            </div>
            
            <!-- Quick Action Toolbar Starts-->
            <div class="row quick-action-toolbar">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-header d-block d-md-flex">
                    <h5 class="mb-0">Mentor Details:</h5>
                    
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                  <?php
// Code to fetch data from the database

// Fetch data from the database
$query_data = "SELECT * FROM hod where hod_id = $hod_id"; // Update query as per your database schema
$result_data = $conn->query($query_data);

// Display student information in a Bootstrap 5 two-column layout with a reduced photo size
if ($result_data->num_rows > 0) {
    while ($row = $result_data->fetch_assoc()) {
        $fullName = $row['name'];
    
        
        $branch = $row['branch'];
        $gender = $row['gender'];
        $phone = $row['phonenumber'];
        $email = $row['username'];
    
        $imagePath = $row['images'];

        echo "<div class='row mb-3'>";
        echo "<div class='col-md-6'>";
        echo "<div class='card'>";
        echo "<br>";
        
        echo "<br>";
        echo "<center>";
        echo "<img src='$imagePath' class='card-img-top' alt='Passport Photo' style='max-width: 150px; max-height: 150px;'>";
        echo "</center>";
        echo "</div>";
        echo "</div>";
        echo "<div class='col-md-6'>";
        echo "<div class='card'>";
        echo "<div class='card-body'>";
        echo "<div class='row'>
            <div class='col-md-6'><h5 class='card-text'>Name</h5></div>
            <div class='col-md-6'>:  $fullName</div>
        </div>";
        
        echo "<div class='row'>
            <div class='col-md-6'><h5 class='card-text'>Branch</h5></div>
            <div class='col-md-6'>:  $branch</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-6'><h5 class='card-text'>Gender</h5></div>
            <div class='col-md-6'>:  $gender</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-6'><h5 class='card-text'>Phone</h5></div>
            <div class='col-md-6'>:  $phone</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-6'><h5 class='card-text'>Email</h5></div>
            <div class='col-md-6'>:  $email</div>
        </div>";
        
        echo "</div>";
        echo "</div>";
        echo "</div>";
        echo "</div>";
    }
} else {
    echo "No student data found.";
}
?>

    <script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src="vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>
</body>
</html

