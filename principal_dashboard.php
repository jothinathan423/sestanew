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



// Get CA's ID from the session
$sql = "SELECT COUNT(*) AS student_count FROM students";
// Query to retrieve student details associated with the CA
$query = "SELECT * FROM students";
$result = $conn->query($query);
?>
      <!-- partial:partials/_navbar.html -->
            
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row purchace-popup">
              <div class="col-12 stretch-card grid-margin">

              </div>
            </div>
            <!-- Quick Action Toolbar Starts-->
           
            <!-- Quick Action Toolbar Ends-->
            
            
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
                      <table class="table" id="myTable">
                        <thead>
                          <tr>
                          <th class="font-weight-bold" onclick="sortTable(0)">Roll Number</th>
                            <th class="font-weight-bold" onclick="sortTable(1)">Student Name</th>
                            <th class="font-weight-bold" onclick="sortTable(2)">Year of Study</th>
                            <th class="font-weight-bold" onclick="sortTable(3)">Branch</th>
                            <th class="font-weight-bold" onclick="sortTable(4)">Credit Point</th>
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
                echo "<td>" . $row['branch'] . "</td>";
                echo "<td>" . $row['credit_points'] . "</td>";
                
                echo "<td><a href='prince_student_activities.php?id=" . $row['id'] . "' class='btn btn-info'>Details</a></td>";
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