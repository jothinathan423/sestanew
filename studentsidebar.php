<!DOCTYPE html>
<html>
<head>
    <title>Student Activity Chart</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style.css">
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
    <link rel="shortcut icon" href="images/favicon.png" />    
</head>
<body>
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="#">
          <img src="sample.svg" alt="logo" class="logo" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="index.html"><img src="images/logo-mini.svg" alt="logo" /></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center flex-grow-1" style="text-align: center; background-color: #ffffff; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);">
    <center>
    <img src="mec.jpg" alt="Company Logo" style="max-width: 6%; height: auto;">
    <span style="font-size: 140%; margin-top: 10px;">MUTHAYAMMAL ENGINEERING COLLEGE (AUTONOMOUS) - SESTA</span>
    
</center>

        </div>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
            <span class="icon-menu"></span>
          </button>
      </nav>
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
    <nav class="sidebar sidebar-offcanvas" id="sidebar">
          <ul class="nav">
            <li class="nav-item nav-profile">
              <a href="#" class="nav-link">
                <div class="profile-image">
                <?php
// Start the session

// Check if the session variable 'ca_id' is set
if (!isset($_SESSION["student_id"])) {
        echo "<script>alert('please login'); window.location='studentlogin.php';</script>";
    exit();
}

// Database connection details
include 'configuration.php'; // Include your database configuration

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the CA ID from the session
$student_id = $_SESSION["student_id"];

// Query to retrieve the image link associated with the CA's session ID
$query = "SELECT images FROM students WHERE id = $student_id"; // Adjust table and column names

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $imageLink = $row['images'];

    // Display the image
    echo '<img src="' . $imageLink . '" alt="Image" class="img-xs rounded-circle">';
} else {
    echo "Image link not found for the student session ID.";
}


// Close the database connection
$conn->close();
?>
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?php
// Start the session

// Check if the session variable 'ca_id' is set
if (!isset($_SESSION['student_id'])) {
    echo "CA ID not set in the session.";
    exit();
}

// Database connection details
include 'configuration.php'; // Include your database configuration

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the CA ID from the session
$student_id = $_SESSION['student_id'];

// Query to retrieve the CA's name
$query = "SELECT firstname FROM students WHERE id = $student_id"; // Replace 'name' and 'ca_id' with your actual column and identifier names

$result = $conn->query($query);

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $ca_name = $row['firstname'];
    echo "$ca_name";
} else {
    echo "CA not found.";
}

// Close the database connection
$conn->close();
?></p>
                  <p class="designation">Student</p>
                </div>
                <div class="icon-container">
                  <i class="icon-bubbles"></i>
                  <div class="dot-indicator bg-danger"></div>
                </div>
              </a>
            </li>
                        <li class="nav-item nav-category"><span class="nav-link">Action</span></li>
            <li class="nav-item">
              <div class="collapse" id="ui-basic">
                <ul class="nav flex-column sub-menu">
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                  <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                </ul>
              </div>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="dashboard.php">
                <span class="menu-title">Upload</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="sestaregister1.php">
                <span class="menu-title">Additional Sesta</span>
                <i class="icon-chart menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewcertificate.php?<?php echo "id=" . $_SESSION['student_id']; ?>">
                <span class="menu-title">View Certificate</span>
                <i class="icon-grid menu-icon"></i>
              </a>
            </li>
            
            
            
         
            <li class="nav-item nav-category"><span class="nav-link">Home</span></li>
            <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <span class="menu-title">Log Out</span>
                <i class="icon-doc menu-icon"></i>
              </a>
            
              
              
            </li>
            
          </ul>
        </nav>





        
</body>
</html>