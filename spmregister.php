<?php
session_start();

// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Get CA's ID from the session
$ca_id = $_SESSION['ca_id'];

$sql = "SELECT COUNT(*) AS student_count FROM students WHERE ca_id = $ca_id";
// Query to retrieve student details associated with the CA
$query = "SELECT * FROM students WHERE ca_id = $ca_id";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>SPM Register</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
</head>
<body>
  <?php

  include 'casidebar.php';

  ?>
  

  <div class="container">
    <header>Student Peer Mentor Registration</header>

    <form method="POST" action="spm_process_registration.php" enctype="multipart/form-data">
      <div class="details personal">
        <span class="title">Personal Details</span>

        <div class="fields">
          <div class="input-field">
            <label>Name </label>
            <input type="text" id="firstname" placeholder="Enter your name" name="name" required>
          </div>

          <div class="input-field">
            <label>Date of Birth(password)</label>
            <input type="date" name="date_of_birth" placeholder="Enter birth date" required>
          </div>
          <div class="input-field">
            <label>Email(username)</label>
            <input type="text" name="email" placeholder="Enter your email" required>
          </div>

          <div class="input-field">
            <label>Rollnumber</label>
            <input type="text" name="rollnumber" placeholder="Enter your rollnumber" required>
          </div>

          <div class="input-field">
            <label>Phone</label>
            <input type="number" name="phonenumber" placeholder="Enter your number" required>
          </div>

          <div class="input-field">
            <label>from number</label>
            <input type="text" name="from_number" placeholder="from number" required>
          </div>

          <div class="input-field">
            <label>to number</label>
            <input type="text" name="to_number" placeholder="to number" required>
          </div>

          <div class="input-field">
            <label>Gender</label>
            <select required name="gender">
              <option disabled selected>Select gender</option>
              <option value="male">Male</option>
              <option value="female">Female</option>
            </select>
          </div>

          <div class="input-field">
            <label>Year Of Study</label>
            <select required name="year">
              <option disabled selected>Select Year Of Study</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </div>

          <div class0000000000="input-field">
            <label>Profile Picture</label>
            <input type="file" name="profile_picture" id="profile_picture" required>
          </div>

          <div class="input-field">
            <label>Branch of Study</label>
            <select required name="department">
            <option disabled selected>Select Branch of Study</option>
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
            </select>
          </div>
        </div>
      </div>
      <center>
        <button type="submit">Submit</button>
      </center>
    </form>
  </div>

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

    <script src="script.js"></script>
</body>
</html>