<?php
session_start();

?>

<html>

<head>
    
<title>Student Dashboard</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include 'studentsidebar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row purchace-popup">
                        
                    </div>
                    <div class="card-header">
        
    <div class="container mt-5">
        <center>
            <h1>Student Activity Registration</h1>
        </center>
        <form action="sestaregister_process1.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="activity_type" class="form-label">Select Activity Type:</label>
                <select class="form-select" id="activity_type" name="activity_type" required>
                    <option value="NPTEL certificate - 50">NPTEL Certificate</option>
                    <option value="Seminar participation 1 - 10">Seminar Participation</option>
                    <option value="Seminar participation 2 - 10">Seminar Participation</option>
                    <option value="Student Tech Talk - 20">Student Techtalk</option>
                    <option value="Online Certification Technical - 10">Online Certificate</option>
                    <option value="paper presentation,seminar,workshop - 20">Paper Presentation, Seminar, Workshop</option>
                    <option value="Seminar participation 1 - 10">Seminar Participation</option>
                    <option value="paper_presentation - 10">Paper Presentation</option>
                    <option value="workshop - 20">Workshop</option>
                    <option value="seminar - 10">Seminar</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="topic" class="form-label">Topic:</label>
                <input type="text" class="form-control" id="topic" name="topic" required>
            </div>

            <div class="mb-3">
                <label for="organized_by" class="form-label">Organized By:</label>
                <input type="text" class="form-control" id="organized_by" name="organized_by" required>
            </div>

            <div class="mb-3">
                <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                <input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>
            </div>

            <div class="mb-3">
                <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                <input type="date" class="form-control" id="attended_to_date" name="attended_to_date">
            </div>

            <div class="mb-3">
                <label for="certificate" class="form-label">Upload Certificate (Max 300kB, PDF or Image files only):</label>
                <div class="input-group">
                    <input type="file" class="form-control" id="certificate" name="certificate" accept=".pdf, .jpg, .jpeg, .png" required>
                </div>
            </div>

            <div class="mb-3">
                <label for="prize_position" class="form-label">Prize Position:</label>
                <select class="form-select" id="prize_position" name="prize_position">
                    <option value="1st">1st</option>
                    <option value="2nd">2nd</option>
                    <option value="3rd">3rd</option>
                    <option value="Participant">Participant</option>
                    <option value="Gold">Gold</option>
                    <option value="Silver">Silver</option>
                    <option value="Elite">Elite</option>
                    <option value="Completed">Completed</option>
                </select>
            </div>

            <center>
                <button type="submit" class="btn btn-primary">Register</button>
            </center>
        </form>
    </div>

<script src="vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="vendors/chart.js/Chart.min.js"></script>
    <script src=".vendors/moment/moment.min.js"></script>
    <script src="vendors/daterangepicker/daterangepicker.js"></script>
    <script src="vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="js/dashboard.js"></script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
