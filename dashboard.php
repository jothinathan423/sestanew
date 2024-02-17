<?php
session_start();
include 'configuration.php';
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT COUNT(*) AS student_count FROM students";
$query = "SELECT * FROM students";
$result = $conn->query($query);
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
    <title>Student Dashboard</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
    <style>
        .card{
            overflow : auto;
        }   
    </style>
</head>
<body>
       <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            <!-- partial:partials/_sidebar.html -->
            <?php include 'studentsidebar.php'; ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row purchace-popup">
                        
                    </div>
                    <div class="card-header">
                                        <h5 class="card-title">
                                            Uploaded Certificates - <span style="color:Red;"> (You must upload only .PDF (or) .Jpeg file format / The maximum file size should not exceed 300 KB)</span></h5>
                                    </div>
                    <!-- content -->
                    <div class="content">
                        <div class="row row-cols-1 row-cols-md-3 g-4">
                            <div class="col-lg-12 col-md-12">
                                <div class="card widget">
                                    
                                    <div class="row g-4">
                                        <div class="mb-4">
                                            <div class="card mb-4">
                                                <div class="card-body">
                                                    <div class="row">
                                                        <table class="table table-bordered border-primary" cellspacing="0" rules="all" border="1" id="GvCourse" style="border-collapse: collapse; width: 100%; overflow: scroll;">
                                                            <tr style="color: White; background-color: #FF6E40;">
                                                                <th scope="col">S.No</th>
                                                                <th scope="col">Activity</th>
                                                                <th class="form-label">Topic Name</th>
                                                                <th scope="col">Upload Status</th>
                                                                <th scope="col">Action</th>
                                                            </tr>
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">1</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="NPTEL certificate - 50">NPTEL Certificate</option>
                                                                            
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'NPTEL certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'NPTEL certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'NPTEL certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="Gold">Gold</option>';
                                                                        echo '<option value="Silver">Silver</option>';
                                                                        echo '<option value="Elite">Elite</option>';
                                                                        echo '<option value="Completed">Completed</option>';
                                                    
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'NPTEL certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'NPTEL certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'NPTEL certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                                </form>
                                                            </tr>






                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">2</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="seminar - 10">Seminar participation</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>

                                                                

                                                                <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">3</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="seminar 2 - 10">Seminar participation-2</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'seminar 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                                <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">4</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="workshop - 20">Workshop Participation</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'workshop'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'workshop'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'workshop'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'workshop'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'workshop'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'workshop'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                        </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">5</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="student tech talk - 20">Student tech talk</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'student tech talk'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'student tech talk'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'student tech talk'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'student tech talk'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'student tech talk'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'student tech talk'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                        </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">6</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Paper presentation / Seminar participation / Workshop participation (External) - 20"> Paper presentation(External)</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Paper presentation / Seminar participation / Workshop participation (External)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Paper presentation / Seminar participation / Workshop participation (External)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Paper presentation / Seminar participation / Workshop participation (External)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="1st">1st</option>';
                                                                        echo '<option value="2nd">2nd</option>';
                                                                        echo '<option value="3rd">3rd</option>';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Paper presentation / Seminar participation / Workshop participation (External)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Paper presentation / Seminar participation / Workshop participation (External)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Paper presentation / Seminar participation / Workshop participation (External)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">7</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Online certification General topics - 5">Online certification-General topics</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                          
$sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic'];}
                                                                     else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By :</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();

        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">8</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Online certification General topics 2 - 5">Online certification-General topics-2</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification General topics 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>

                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">9</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Online certification Technical - 10">Online certification-Technical</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                       
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">10</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Online certification Technical 2 - 10">Online certification-Technical-2</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Online certification Technical 2'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">11</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Outreach programme participation(Social Relevance) - 10">Outreach programme participation(Social Relevance)</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Outreach programme participation(Social Relevance)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Outreach programme participation(Social Relevance)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Outreach programme participation(Social Relevance)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                      
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Outreach programme participation(Social Relevance)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Outreach programme participation(Social Relevance)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Outreach programme participation(Social Relevance)'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">12</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Industrial training certificate - 10">Industrial training certificate</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Industrial training certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Industrial training certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Industrial training certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Industrial training certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Industrial training certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Industrial training certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">13</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Sports participation certificate - 10">Sports participation certificate</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Sports participation certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Sports participation certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Sports participation certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="1st">1st</option>';
                                                                        echo '<option value="2nd">2nd</option>';
                                                                        echo '<option value="3rd">3rd</option>';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Sports participation certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Sports participation certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Sports participation certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">14</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Value added course certificate - 20">Value added course certificate</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Value added course certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Value added course certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Value added course certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Value added course certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Value added course certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Value added course certificate'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">15</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="EDC Program - 20">EDC Program</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'EDC Program'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'EDC Program'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'EDC Program'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'EDC Program'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'EDC Program'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'EDC Program'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">16</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Idea submission to Centre of Product & Consultancy - 20">Idea submission to Centre of Product & Consultancy</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Idea submission to Centre of Product & Consultancy'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Idea submission to Centre of Product & Consultancy'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Idea submission to Centre of Product & Consultancy'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="1st">1st</option>';
                                                                        echo '<option value="2nd">2nd</option>';
                                                                        echo '<option value="3rd">3rd</option>';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Idea submission to Centre of Product & Consultancy'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Idea submission to Centre of Product & Consultancy'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Idea submission to Centre of Product & Consultancy'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>
                                                            </form>
                                                            </tr>
                                                            
                                                            <tr>
                                                                <form action="sestaregister_process.php" method="post" enctype="multipart/form-data">
                                                                    <td>
                                                                        <span id="GvCourse_Sno_0">17</span>
                                                                    </td>
                                                                    <td>
                                                                        <select name="activity_type" id="">
                                                                            <option value="Project Contest / Field Project / Minor Project - 50">Project Contest / Field Project / Minor Project</option>
                                                                        </select>
                                                                    </td>
                                                                    <td>

                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Project Contest / Field Project / Minor Project'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
            
                                                                        echo $existing_data['topic']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" name="topic" class="form-control">';
                                                                    }
                                                                    ?>

                                                                    
                                                                    </td>
                                                                    <td align="center">
                                                                    <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Project Contest / Field Project / Minor Project'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
                                                                        echo "Uploaded Certificate:<br> ";
                                                                        echo '<a href="' . $existing_data['certificate_path'] . '" target="_blank">View Certificate</a>'; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="file" name="certificate" id="certificate">';
                                                                    }
                                                                    ?>
                                                                    </td>
                                                                    <td>
                                                                        <div class="mb-3">
                                                                            <label for="prize_position" class="form-label">Prize Position:</label><br>
                                                                            <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Project Contest / Field Project / Minor Project'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['prize_position']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<select class="form-select" id="prize_position" name="prize_position">';
                                                                        echo '<option value="1st">1st</option>';
                                                                        echo '<option value="2nd">2nd</option>';
                                                                        echo '<option value="3rd">3rd</option>';
                                                                        echo '<option value="participant">participated</option>';
                                                                    }
                                                                    ?>
                                                                            
                                                                        </div>
                                                                    </td>
                                                            </tr>
                                                            <tr>
                                                                <td></td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="organized_by" class="form-label">Organized By:</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Project Contest / Field Project / Minor Project'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['organized_by']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="text" class="form-control" id="organized_by" name="organized_by" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_from_date" class="form-label">Attended Date (From Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Project Contest / Field Project / Minor Project'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_from_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_from_date" name="attended_from_date" required>';
                                                                    }
                                                                    ?>
                                                                        
                                                                    </div>
                                                                </td>
                                                                <td>
                                                                    <div class="mb-3">
                                                                        <label for="attended_to_date" class="form-label">Attended Date (To Date):</label>
                                                                        <br>
                                                                        <?php
                                                                    include 'configuration.php';
                                                                    $conn = new mysqli($servername, $username, $password, $dbname);
                                                                    if ($conn->connect_error) {
                                                                        die("Connection failed: " . $conn->connect_error);
                                                                    }
                                                                    // Check if the student has already registered for this activity
                                                                    $sql_check = "SELECT * FROM student_activities WHERE student_id = '$student_id' AND activity_type = 'Project Contest / Field Project / Minor Project'"; // Update this with the appropriate activity_type
                                                                    $result_check = $conn->query($sql_check);

                                                                    if ($result_check->num_rows > 0) {
                                                                        // Activity already registered, display existing data
                                                                        $existing_data = $result_check->fetch_assoc();
        
                                                                    
                                                                        echo $existing_data['attended_to_date']; // Change 'certificate' to the appropriate column name
                                                                    } else {
                                                                        // Display the file upload input
                                                                        echo '<input type="date" class="form-control" id="attended_to_date" name="attended_to_date" required>';
                                                                    }
                                                                    ?>
                                                                    </div>
                                                                </td>
                                                                <td align="center">
                                                                <?php
                                                                if ($result_check->num_rows > 0) {
                                                                    // Activity already registered, disable the submit button
                                                                    echo "Submitted";
                                                                } else {
                                                                    // Display the "Submit" button
                                                                    echo '<input type="submit" name="GvCourse$ctl03$btnUpload" value="Submit" id="GvCourse_btnUpload_1" class="btn btn-primary me-2" />';
                                                                }
                                                                ?>
                                                                </td>

                                                            </form>
                                                            </tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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

</body>
</html>
