<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title>Principal Dashboard</title>
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
      <?php
      include 'principalsidebar.php'


      ?>
<?php

// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the list of all branches
$branchesQuery = "SELECT DISTINCT `branch` FROM students";
$branchesResult = $conn->query($branchesQuery);

// Check if the query was successful
if ($branchesResult) {
    // Fetch all branches as an associative array
    $branches = $branchesResult->fetch_all(MYSQLI_ASSOC);

    // Loop through each branch and display statistics
    foreach ($branches as $branch) {
        $branchName = $branch['branch'];
        
        // Display branch statistics card
        echo "
            <div class='row'>
                <div class='col-md-12 grid-margin'>
                    <div class='card'>
                        <div class='card-body'>
                            <div class='row'>
                                <div class='col-md-12'>
                                    <div class='d-sm-flex align-items-baseline report-summary-header'>
                                        <h5 class='font-weight-semibold'>$branchName</h5>
                                        <span class='ml-auto'>Updated Report</span>
                                        <button class='btn btn-icons border-0 p-2'><i class='icon-refresh'></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class='row report-inner-cards-wrapper'>
                                <div class='col-md-6 col-xl report-inner-card'>
                                    <div class='inner-card-text'>
                                        <span class='report-title'>No of Students:</span>
                                        <br>
                                        <h4>";

        // Query to get the count of students for the current branch
        $studentCountQuery = "SELECT COUNT(*) AS student_count FROM students WHERE branch = '$branchName'";
        $studentCountResult = $conn->query($studentCountQuery);

        if ($studentCountResult) {
            $studentCountRow = $studentCountResult->fetch_assoc();
            echo $studentCountRow['student_count'];
        } else {
            echo "Error in SQL query: " . $conn->error;
        }

        echo "</h4>
                                    </div>
                                    <div class='inner-card-icon bg-success'>
                                        <i class='icon-rocket'></i>
                                    </div>
                                </div>
                                <div class='col-md-6 col-xl report-inner-card'>
                                    <div class='inner-card-text'>
                                        <span class='report-title'>No of Students 0 credit:</span>
                                        <br>
                                        <h4>";

        // Query to get the count of students with 0 credits for the current branch
        $zeroCreditQuery = "SELECT COUNT(*) AS zero_credit_count FROM students WHERE credit_points = 0 AND branch = '$branchName'";
        $zeroCreditResult = $conn->query($zeroCreditQuery);

        if ($zeroCreditResult) {
            $zeroCreditRow = $zeroCreditResult->fetch_assoc();
            echo $zeroCreditRow['zero_credit_count'];
        } else {
            echo "Error in SQL query: " . $conn->error;
        }

        echo "</h4>
                                    </div>
                                    <div class='inner-card-icon bg-danger'>
                                        <i class='icon-briefcase'></i>
                                    </div>
                                </div>
                                <div class='col-md-6 col-xl report-inner-card'>
                                    <div class='inner-card-text'>
                                        <span class='report-title'>No of Students above 100 credit:</span>
                                        <br>
                                        <h4>";

        // Query to get the count of students above 100 credits for the current branch
        $above100CreditQuery = "SELECT COUNT(*) AS above_100_credit_count FROM students WHERE credit_points > 100 AND branch = '$branchName'";
        $above100CreditResult = $conn->query($above100CreditQuery);

        if ($above100CreditResult) {
            $above100CreditRow = $above100CreditResult->fetch_assoc();
            echo $above100CreditRow['above_100_credit_count'];
        } else {
            echo "Error in SQL query: " . $conn->error;
        }

        echo "</h4>
                                    </div>
                                    <div class='inner-card-icon bg-warning'>
                                        <i class='icon-globe-alt'></i>
                                    </div>
                                </div>
                                <div class='col-md-6 col-xl report-inner-card'>
                                    <div class='inner-card-text'>
                                        <span class='report-title'>No of Students above 200 credit:</span>
                                        <br>
                                        <h4>";

        // Query to get the count of students above 200 credits for the current branch
        $above200CreditQuery = "SELECT COUNT(*) AS above_200_credit_count FROM students WHERE credit_points > 200 AND branch = '$branchName'";
        $above200CreditResult = $conn->query($above200CreditQuery);

        if ($above200CreditResult) {
            $above200CreditRow = $above200CreditResult->fetch_assoc();
            echo $above200CreditRow['above_200_credit_count'];
        } else {
            echo "Error in SQL query: " . $conn->error;
        }

        echo "</h4>
                                    </div>
                                    <div class='inner-card-icon bg-primary'>
                                        <i class='icon-diamond'></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
            </div>";
    }
} else {
    // Output an error message if the query fails
    echo "Error in SQL query: " . $conn->error;
}

// Close the database connection
$conn->close();
?>
          
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
          
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    
<script>
function filterTable() {
    var yearFilter = document.getElementById("yearSelect").value;
    var branchFilter = document.getElementById("branchSelect").value;

    var table = document.getElementById("myTable");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) { // Start from 1 to skip header row
        var cells = rows[i].getElementsByTagName("td");
        var year = cells[2].innerHTML; // Assuming the year is in the third column
        var branch = cells[3].innerHTML; // Assuming the branch is in the fourth column

        var showRow = (yearFilter === "all" || year === yearFilter) &&
                      (branchFilter === "all" || branch === branchFilter);

        rows[i].style.display = showRow ? "" : "none";
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
    <script src="./vendors/chart.js/Chart.min.js"></script>
    <script src="./vendors/moment/moment.min.js"></script>
    <script src="./vendors/daterangepicker/daterangepicker.js"></script>
    <script src="./vendors/chartist/chartist.min.js"></script>
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="js/off-canvas.js"></script>
    <script src="js/misc.js"></script>
    <!-- endinject -->
    <!-- Custom js for this page -->
    <script src="./js/dashboard.js"></script>
    <!-- End custom js for this page -->
  </body>
</html>