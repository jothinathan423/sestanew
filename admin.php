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

$sql = "SELECT COUNT(*) AS student_count FROM students";
// Query to retrieve student details associated with the CA
$query = "SELECT * FROM students";
$result = $conn->query($query);
?>
<?php
if(isset($_POST['delete_students'])){
    $selected_students = $_POST['selected_students'];

    foreach($selected_students as $student_id){
        $delete_query = "DELETE FROM students WHERE id = $student_id";
        $conn->query($delete_query);
    }
    header("Location: admin.php");
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin Dashboard</title>
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
    <link rel="shortcut icon" href="mec.jpg" />
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="navbar-brand-wrapper d-flex align-items-center">
          <a class="navbar-brand brand-logo" href="#">
            <img src="sample.svg" alt="logo" class="logo-dark" />
          </a>
          <a class="navbar-brand brand-logo-mini" href="#"><img src="images/logo-mini.svg" alt="logo" /></a>
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
                  <img class="img-xs rounded-circle" src="mec.jpg" alt="profile image">
                  <div class="dot-indicator bg-success"></div>
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">ADMIN</p>
                  <p class="designation">Administrator</p>
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
              <a class="nav-link" href="caregister.php">
                <span class="menu-title">Register CA</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="cadele.php">
                <span class="menu-title">CA - Deletion</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hodregister.php">
                <span class="menu-title">Register HOD</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="hoddele.php">
                <span class="menu-title">HOD Deletion</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mentorregister.php">
                <span class="menu-title">Register Mentor</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="mentdele.php">
                <span class="menu-title">Mentor Deletion</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="principalregister.php">
                <span class="menu-title">Register Principal</span>
                <i class="icon-book-open menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="principaldele.php">
                <span class="menu-title">Principal Deletion</span>
                <i class="icon-globe menu-icon"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#students">
                <span class="menu-title">Tables</span>
                <i class="icon-grid menu-icon"></i>
              </a>
            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" href="download.php">
                <span class="menu-title">Download Folder</span>
                <i class="icon-grid menu-icon"></i>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link" href="delete.php">
                <span class="menu-title">Delete - Folder</span>
                <i class="icon-grid menu-icon"></i>
              </a>
            </li>
            
            
            <li class="nav-item">
              <a class="nav-link" href="truncate.php">
                <span class="menu-title">Truncate - Activity</span>
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
        $zeroCreditQuery = "SELECT COUNT(*) AS zero_credit_count FROM students WHERE credit_points = 0";
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
$above100CreditQuery = "SELECT COUNT(*) AS above_100_credit_count FROM students WHERE credit_points > 100";
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
$above100CreditQuery = "SELECT COUNT(*) AS above_100_credit_count FROM students WHERE credit_points > 100";
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
                    <input type="text" id="myInput" onkeyup="searchTable()" placeholder="Search for names...">
                    <select id="yearSelect" onchange="filterTable()">
    <option value="all">All Years</option>
    <option value="1">Year 1</option>
    <option value="2">Year 2</option>
    <option value="3">Year 3</option>
    <option value="4">Year 4</option>
</select>

<select id="branchSelect" onchange="filterTable()">
    <option value="all">All Branches</option>
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
    <!-- Add more branches as needed -->
</select>

                    <div class="table-responsive border rounded p-1">
                        <div class="table-responsive border rounded p-1">
        <form method="post" action="">
            <center>
            <button type="submit" name="delete_students" class="btn btn-danger mb-2">Delete Selected</button>
            </center>
                      <table class="table" id="myTable">
                        <thead>
                          <tr>
                              <th class="font-weight-bold"><input type="checkbox" id="selectAllCheckbox"> Select All</th>
                          <th class="font-weight-bold" onclick="sortTable(0)">Roll number</th>
                            <th class="font-weight-bold" onclick="sortTable(1)">Student Name</th>
                            <th class="font-weight-bold" onclick="sortTable(2)">Year of Study</th>
                            <th class="font-weight-bold" onclick="sortTable(3)">Branch</th>
                            <th class="font-weight-bold" onclick="sortTable(4)">Mobile</th>
                            <th class="font-weight-bold" onclick="sortTable(5)">More</th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><input type='checkbox' name='selected_students[]' value='" . $row['id'] . "'></td>";
                echo "<td>" . $row['roll_number'] . "</td>";
                echo "<td>" . $row['firstname'] . " " . $row['lastname'] . "</td>";
                echo "<td>" . $row['year_of_study'] . "</td>";
                echo "<td>" . $row['branch'] . "</td>";
                echo "<td>" . $row['phone'] . "</td>";
                echo "<td><a href='admin_student_activities.php?id=" . $row['id'] . "' class='btn btn-info'>Details</a></td>";
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
function filterTable() {
    var yearFilter = document.getElementById("yearSelect").value;
    var branchFilter = document.getElementById("branchSelect").value;

    var table = document.getElementById("myTable");
    var rows = table.getElementsByTagName("tr");

    for (var i = 1; i < rows.length; i++) { // Start from 1 to skip header row
        var cells = rows[i].getElementsByTagName("td");
        var year = cells[3].innerHTML; // Assuming the year is in the third column
        var branch = cells[4].innerHTML; // Assuming the branch is in the fourth column

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


<script>
            document.addEventListener('DOMContentLoaded', function () {
                var selectAllCheckbox = document.getElementById('selectAllCheckbox');
                var checkboxes = document.querySelectorAll('input[name="selected_students[]"]');

                selectAllCheckbox.addEventListener('change', function () {
                    checkboxes.forEach(function (checkbox) {
                        checkbox.checked = selectAllCheckbox.checked;
                    });
                });

                checkboxes.forEach(function (checkbox) {
                    checkbox.addEventListener('change', function () {
                        selectAllCheckbox.checked = Array.from(checkboxes).every(function (checkbox) {
                            return checkbox.checked;
                        });
                    });
                });
            });
        </script>



<script>
function sortTable(columnIndex) {
    var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
    table = document.getElementById("myTable");
    switching = true;
    dir = "asc";

    while (switching) {
        switching = false;
        rows = table.rows;

        for (i = 1; i < rows.length - 1; i++) {
            shouldSwitch = false;
            x = rows[i].getElementsByTagName("td")[columnIndex];
            y = rows[i + 1].getElementsByTagName("td")[columnIndex];

            var xValue, yValue;

            // Convert the innerHTML to a number if possible, otherwise use string comparison
            xValue = convertCellValueToComparable(x.innerHTML);
            yValue = convertCellValueToComparable(y.innerHTML);

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

function convertCellValueToComparable(value) {
    // Convert the innerHTML to a number if possible, otherwise use string comparison
    return !isNaN(Number(value)) ? Number(value) : value.toLowerCase();
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