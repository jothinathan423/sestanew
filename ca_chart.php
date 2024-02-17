<?php
session_start();

// Step 1: Database Connection
include 'configuration.php';
$db = new mysqli($servername, $username, $password, $dbname);

if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

$ca_id = $_SESSION['ca_id'];

// Retrieve data for the pie chart
$pieChartQuery = "SELECT student_activities.activity_type, COUNT(*) as activity_count
                  FROM student_activities
                  INNER JOIN students ON student_activities.student_id = students.id
                  WHERE students.ca_id = $ca_id
                  GROUP BY student_activities.activity_type";

$pieChartResult = $db->query($pieChartQuery);

$pieLabels = array();
$pieData = array();

while ($row = $pieChartResult->fetch_assoc()) {
    $pieLabels[] = $row['activity_type'];
    $pieData[] = $row['activity_count'];
}

// Retrieve data for the graph chart
$graphChartQuery = "SELECT student_activities.activity_type, COUNT(*) as activity_count
                    FROM student_activities
                    INNER JOIN students ON student_activities.student_id = students.id
                    WHERE students.ca_id = $ca_id
                    GROUP BY student_activities.activity_type";

$graphChartResult = $db->query($graphChartQuery);

$graphLabels = array();
$graphData = array();

while ($row = $graphChartResult->fetch_assoc()) {
    $graphLabels[] = $row['activity_type'];
    $graphData[] = $row['activity_count'];
}

// Close the database connection
$db->close();
?>

<!DOCTYPE html>
<html>
<head>
    
    <title>CA Chart</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
    <!-- partial:partials/_navbar.html -->

    <?php
    include 'casidebar.php';
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Student Activity Chart</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <h2 style="text-align: center;">Pie Chart</h2>
                <div id="pieChart" style="max-width: 500px; margin: 0 auto;">
                    <canvas id="chartPie"></canvas>
                </div>
            </div>
            <div class="col-6">
                <h2 style="text-align: center;">Graph Chart</h2>
                <div id="graphChart" style="max-width: 500px; margin: 0 auto;">
                    <canvas id="chartGraph"></canvas>
                </div>
            </div>
        </div>

        <script>
            var pieCtx = document.getElementById('chartPie').getContext('2d');
            var pieData = {
                labels: <?php echo json_encode($pieLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($pieData); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(204, 0, 0, 0.6)',
                        'rgba(153, 51, 255, 0.6)',
                        'rgba(0, 128, 0, 0.6)',
                        'rgba(255, 102, 255, 0.6)'
                    ]
                }]
            };

            var pieChart = new Chart(pieCtx, {
                type: 'pie',
                data: pieData
            });

            var graphCtx = document.getElementById('chartGraph').getContext('2d');
            var graphData = {
                labels: <?php echo json_encode($graphLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($graphData); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(204, 0, 0, 0.6)',
                        'rgba(153, 51, 255, 0.6)',
                        'rgba(0, 128, 0, 0.6)',
                        'rgba(255, 102, 255, 0.6)'
                    ]
                }]
            };

            var graphChart = new Chart(graphCtx, {
                type: 'bar',
                data: graphData
            });
        </script>
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
</body>
</html>
