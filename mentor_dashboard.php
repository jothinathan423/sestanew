<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Mentor Dashboard</title>
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

      include 'mentorsidebar.php';

      ?>

<?php


// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



// Get CA's ID from the session
$ment_id = $_SESSION['mentor_id'];

$sql = "SELECT COUNT(*) AS student_count FROM students WHERE mentor_id = $ment_id";
// Query to retrieve student details associated with the CA
$query = "SELECT * FROM students WHERE mentor_id = $ment_id";
$result = $conn->query($query);
?>
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">

              </div>
            </div>
            
            <!-- Quick Action Toolbar Starts-->
            
            <!-- Quick Action Toolbar Ends-->
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
        $zeroCreditQuery = "SELECT COUNT(*) AS zero_credit_count FROM students WHERE credit_points = 0 and mentor_id = $ment_id";
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
$above100CreditQuery = "SELECT COUNT(*) AS above_100_credit_count FROM students WHERE credit_points > 100 and mentor_id = $ment_id";
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
$above100CreditQuery = "SELECT COUNT(*) AS above_100_credit_count FROM students WHERE credit_points > 100 and mentor_id = $ment_id";
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
            
            <div class="row" id="students">
              <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body" id="students">
                    <div class="d-sm-flex align-items-center mb-4">
                      <h2 class="mb-sm-0">Student List</h2>
                    </div>
                    <input type="text" id="myInput" onkeyup="searchTable()" placeholder="Search for names...">

                    <div class="table-responsive border rounded p-1">
                      <table class="table" id="myTable">
                        <thead>
                          <tr>
                          <th class="font-weight-bold" onclick="sortTable(0)">Roll number</th>
                            <th class="font-weight-bold" onclick="sortTable(1)">Student Name</th>
                            <th class="font-weight-bold" onclick="sortTable(2)">Year of Study</th>
                            <th class="font-weight-bold" onclick="sortTable(3)">Credit Point</th>
                            <th class="font-weight-bold" onclick="sortTable(4)">Mobile</th>
                            <th class="font-weight-bold" onclick="sortTable(5)">More</th>
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
                echo "<td><a href='ment_student_activities.php?id=" . $row['id'] . "' class='btn btn-info'>Details</a></td>";
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
    <script>
function sortTable(columnIndex) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    dir = "asc";

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < (rows.length - 1); i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[columnIndex];
            y = rows[i + 1].getElementsByTagName("td")[columnIndex];

            var xValue, yValue;

            // Convert the innerHTML to a number if possible, otherwise use string comparison
            if (!isNaN(Number(x.innerHTML)) && !isNaN(Number(y.innerHTML))) {
                xValue = Number(x.innerHTML);
                yValue = Number(y.innerHTML);
            } else {
                xValue = x.innerHTML.toLowerCase();
                yValue = y.innerHTML.toLowerCase();
            }

            if (dir === "asc" ? xValue > yValue : xValue < yValue) {
                shouldSwitch = true;
                break;
            }
        }

        if (shouldSwitch) {
            rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
            switching = true;
            switchcount++;
        } else {
            if (switchcount === 0 && dir === "asc") {
                dir = "desc";
                switching = true;
            }
        }
    }
}
</script>





    <script>
function searchTable() {
    // Declare variables
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    table = document.getElementById("myTable");
    tr = table.getElementsByTagName("tr");

    // Loop through all table rows, and hide those who don't match the search query
    for (i = 0; i < tr.length; i++) {
        tds = tr[i].getElementsByTagName("td");
        for (j = 0; j < tds.length; j++) {
            td = tds[j];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break;
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
}
</script>

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