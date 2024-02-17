<?php
session_start();

// Database connection details

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Student Dashbaord</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
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
    
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <?php
      include 'studentsidebar.php';
      
      ?>


<?php



// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the student ID from the URL parameter
$student_id = $_GET['id'];

// Query to retrieve activities for the selected student
$query = "SELECT * FROM student_activities WHERE student_id = $student_id";
$result = $conn->query($query);

// Retrieve student details
$query_student = "SELECT * FROM students WHERE id = $student_id";
$result_student = $conn->query($query_student);
$student = $result_student->fetch_assoc();
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
                    <h5 class="mb-0">Student Details:</h5>
                    
                  </div>
                  <div class="d-md-flex row m-0 quick-action-btns" role="group" aria-label="Quick action buttons">
                  <?php
// Code to fetch data from the database

// Fetch data from the database
$query_data = "SELECT * FROM students where id = $student_id"; // Update query as per your database schema
$result_data = $conn->query($query_data);

// Display student information in a Bootstrap 5 two-column layout with a reduced photo size
if ($result_data->num_rows > 0) {
    while ($row = $result_data->fetch_assoc()) {
        $fullName = $row['firstname'] . ' ' . $row['lastname'];
        $rollnumber = $row['roll_number'];
        $yearOfStudy = $row['year_of_study'];
        $branch = $row['branch'];
        $gender = $row['gender'];
        $phone = $row['phone'];
        $email = $row['email'];
        $creditPoint = $row['credit_points'];
        $addcreditPoint = $row['addcredit_points'];
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
            <div class='col-md-4'><h5 class='card-text'>Name</h5></div>
            <div class='col-md-6'>:  $fullName</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Roll Number</h5></div>
            <div class='col-md-6'>:  $rollnumber</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Year of Study</h5></div>
            <div class='col-md-6'>:  $yearOfStudy</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Branch</h5></div>
            <div class='col-md-6'>:  $branch</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Gender</h5></div>
            <div class='col-md-6'>:  $gender</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Phone</h5></div>
            <div class='col-md-6'>:  $phone</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Email</h5></div>
            <div class='col-md-8'>:  $email</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Total Credit Point</h5></div>
            <div class='col-md-6'>:  300</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Credit Earned</h5></div>
            <div class='col-md-6'>:  $creditPoint</div>
        </div>";
        echo "<div class='row'>
            <div class='col-md-4'><h5 class='card-text'>Additional Credit Earned</h5></div>
            <div class='col-md-6'>:  $addcreditPoint</div>
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

  




                    
                  </div>
                </div>
              </div>
            </div>
            
            
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                
                  <div class="card-body" id="students">
                  <h2 class='mt-4'>Activities List:</h2>
                    <div class="d-sm-flex align-items-center mb-4">
                    
                      <?php
        if ($result->num_rows > 0) {
            
            echo "<table class='table'>";
            ?>

<thead>
                          <tr>
                          <th class="font-weight-bold">Activity Type</th>
                            <th class="font-weight-bold">Topic</th>
                            <th class="font-weight-bold">Credit Point</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold">View</th>
                            
                          </tr>
                        </thead>


                        <?php
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['activity_type'] . "</td>";
                echo "<td>" . $row['topic'] . "</td>";
                echo "<td>" . $row['credit_points'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><a href='" . $row['certificate_path'] . "' target='_blank'>view</a></td>";
 
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No activities found for this student.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          





          <?php



// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the student ID from the URL parameter
$student_id = $_GET['id'];

// Query to retrieve activities for the selected student
$query = "SELECT * FROM addstudent_activities WHERE student_id = $student_id";
$result = $conn->query($query);

// Retrieve student details
$query_student = "SELECT * FROM students WHERE id = $student_id";
$result_student = $conn->query($query_student);
$student = $result_student->fetch_assoc();
?>
          <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                
                  <div class="card-body" id="students">
                  <h2 class='mt-4'>Additional Activities List:</h2>
                    <div class="d-sm-flex align-items-center mb-4">
                    
                      <?php
        if ($result->num_rows > 0) {
            
            echo "<table class='table'>";
            ?>

<thead>
                          <tr>
                          <th class="font-weight-bold">Activity Type</th>
                            <th class="font-weight-bold">Topic</th>
                            <th class="font-weight-bold">Credit Point</th>
                            <th class="font-weight-bold">Status</th>
                            <th class="font-weight-bold">View</th>
                            
                          </tr>
                        </thead>


                        <?php
            echo "<tbody>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['activity_type'] . "</td>";
                echo "<td>" . $row['topic'] . "</td>";
                echo "<td>" . $row['credit_points'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td><a href='" . $row['certificate_path'] . "' target='_blank'>view</a></td>";
 
                echo "</tr>";
            }
            echo "</tbody>";
            echo "</table>";
        } else {
            echo "<p>No activities found for this student.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          <footer class="footer">
            <div class="d-sm-flex justify-content-center justify-content-sm-between">
              <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © mec.edu.in 2023</span>
              <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">  Muthayammal Engineering College</span>
            </div>
          </footer>
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
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
    <!-- End custom js for this page -->
  </body>
</html>


