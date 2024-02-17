<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SPM Dashboard</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
</head>
<body>
<div class="container-scroller">
<?php 

include 'peersidebar.php';


?>    


<?php
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Get CA's ID from the session
$peer_id = $_SESSION['peer_id'];
$query = "SELECT fromnumber, tonumber, gender FROM peer_mentor WHERE peer_id ='$peer_id'";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                $mentorData = mysqli_fetch_assoc($result);
                $fromNumber = $mentorData['fromnumber'];
                $toNumber = $mentorData['tonumber'];
                $gender = $mentorData['gender'];

            }

$sql = "SELECT COUNT(*) AS student_count FROM students WHERE roll_number BETWEEN '$fromNumber' AND '$toNumber' AND gender = '$gender' ORDER BY firstname ASC";
// Query to retrieve student details associated with the CA
$query = "SELECT * FROM students WHERE roll_number BETWEEN '$fromNumber' AND '$toNumber'AND gender = '$gender' ORDER BY roll_number ASC";
$result = $conn->query($query);
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">

              </div>
            </div>
            
            
           
            <div class="row">
              <div class="col-md-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="d-sm-flex align-items-baseline report-summary-header">
                          <h5 class="font-weight-semibold">Report Summary</h5> <span class="ml-auto">Updated Report</span> <button class="btn btn-icons border-0 p-2"><i class="icon-refresh"></i></button>
                        </div>
                      </div>
                    </div>
                    <div class="row report-inner-cards-wrapper">
                      <div class=" col-md -6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">No of Students:</span>
                          <br>
                          <h4><?php echo $result->num_rows; ?></h4>
                  
                        </div>
                        <div class="inner-card-icon bg-success">
                          <i class="icon-rocket"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">No of Students 0 credit</span>
                          <br>
                          <?php
        $zeroCreditQuery = "SELECT COUNT(*) AS zero_credit_count FROM students WHERE roll_number BETWEEN '$fromNumber' AND '$toNumber' AND gender = '$gender' AND credit_points = 0";
        $zeroCreditResult = $conn->query($zeroCreditQuery);

        if ($zeroCreditResult) {
            $zeroCreditRow = $zeroCreditResult->fetch_assoc();
            echo "<h4>" . $zeroCreditRow['zero_credit_count'] . "</h4>";
        } else {
            echo "Error in SQL query: " . $conn->error;
        }
        ?>
                          
                          
                        </div>
                        <div class="inner-card-icon bg-danger">
                          <i class="icon-briefcase"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">No of Students above <br>100 credit</span>
                          <?php
$above100CreditQuery = "SELECT COUNT(*) AS above_100_credit_count FROM students WHERE roll_number BETWEEN '$fromNumber' AND '$toNumber' AND gender = '$gender' and credit_points > 100";
$above100CreditResult = $conn->query($above100CreditQuery);

if ($above100CreditResult) {
    $above100CreditRow = $above100CreditResult->fetch_assoc();
    echo "<h4>" . $above100CreditRow['above_100_credit_count'] . "</h4>";
} else {
    echo "Error in SQL query: " . $conn->error;
}
?>
                          

                          
                        </div>
                        <div class="inner-card-icon bg-warning">
                          <i class="icon-globe-alt"></i>
                        </div>
                      </div>
                      <div class="col-md-6 col-xl report-inner-card">
                        <div class="inner-card-text">
                          <span class="report-title">No of students above <br>200 credit</span>
                          <?php
$above100CreditQuery = "SELECT COUNT(*) AS above_100_credit_count FROM students WHERE roll_number BETWEEN '$fromNumber' AND '$toNumber' AND gender = '$gender' and credit_points > 100";
$above100CreditResult = $conn->query($above100CreditQuery);

if ($above100CreditResult) {
    $above100CreditRow = $above100CreditResult->fetch_assoc();
    echo "<h4>" . $above100CreditRow['above_100_credit_count'] . "</h4>";
} else {
    echo "Error in SQL query: " . $conn->error;
}
?>
                          
                        </div>
                        <div class="inner-card-icon bg-primary">
                          <i class="icon-diamond"></i>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            <div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" id="students">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h2 class="mb-sm-0">Student List</h2>
                    </div>
                    <div class="table-responsive border rounded p-1">
                      <table class="table">
                        <thead>
                          <tr>
                          <th class="font-weight-bold">Roll number</th>
                            <th class="font-weight-bold">Student Name</th>
                            <th class="font-weight-bold">Year of Study</th>
                            <th class="font-weight-bold">Credit Point</th>
                            <th class="font-weight-bold">Mobile</th>
                            <th class="font-weight-bold">More</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['roll_number'] . "</td>";
                echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                echo "<td>" . $row['year_of_study'] . "</td>";
                echo "<td>" . $row['credit_points'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td><a href='peer_student_activity.php?id=" . $row['id'] . "' class='btn btn-info'>Details</a></td>";
                echo "</tr>";
            }

        } else {
            echo "<p>No students found for this Class Advisor.</p>";
        }

        // Close the database connection
        $conn->close();
        ?>
                          
                        </tbody>
                      </table>
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
