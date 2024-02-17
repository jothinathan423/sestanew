<?php
session_start();
include 'casidebar.php';



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Student Update</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
<!-- End layout styles -->
    
</head>
<body><br><br>
    <center>
    <form action="update.php" method="get">
        <center>
            <h1>Student Roll Number</h1>
        <input type="text" name="id" placeholder="Enter Student Roll Number" >

        <br><br>
        <button type="submit">update</button>

        </center>
    </form>
    </center>
    
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
</html>
