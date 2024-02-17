<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student Peer Mentor Information</title>

    <link rel="stylesheet" href="style.css">

    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
  <?php include 'casidebar.php'; ?>

  <div class="container">
    <header>Student Peer Mentor Registration</header>

    <?php
    // Database connection details
    include 'configuration.php';

    // Create a database connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $sql = "SELECT * FROM peer_mentor WHERE peer_id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            // Display the form with existing data
            echo '<form method="POST" action="update_process.php">';
            echo '<input type="hidden" name="peer_id" value="' . $row['peer_id'] . '">';

            // Div for "Personal Details"
            echo '<div class="details personal">';
            echo '<span class="title">Personal Details</span>';
            echo '<div class="fields">';
            // Name field
            echo '<div class="input-field">';
            echo '<label>Name</label>';
            echo '<input type="text" id="firstname" placeholder="Enter your name" name="name" value="' . $row['name'] . '" required>';
            echo '</div>';
            // Date of Birth (password) field
            echo '<div class="input-field">';
            echo '<label>Date of Birth (password)</label>';
            echo '<input type="text" name="date_of_birth" value="' . $row['password'] . '" required>';
            echo '</div>';
            // Email (username) field
            
            echo '<div class="input-field">';
            echo '<label>Email (username)</label>';
            echo '<input type="text" name="email" value="' . $row['email'] . '" required>';
            echo '</div>';



            echo '<div class="input-field">';
            echo '<label>Roll Number</label>';
            echo '<input type="text" name="rollnumber" value="' . $row['roll_number'] . '" required>';
            echo '</div>';


            
            echo '<div class="input-field">';
            echo '<label>Phone Number</label>';
            echo '<input type="text" name="phonenumber" value="' . $row['number'] . '" required>';
            echo '</div>';


            // From Number field
            echo '<div class="input-field">';
            echo '<label>From Number</label>';
            echo '<input type="text" name="from_number" value="' . $row['fromnumber'] . '" required>';
            echo '</div>';
            // To Number field
            echo '<div class="input-field">';
            echo '<label>To Number</label>';
            echo '<input type="text" name="to_number" value="' . $row['tonumber'] . '" required>';
            echo '</div>';
            // Gender field
            echo '<div class="input-field">';
            echo '<label>Gender</label>';
            echo '<select required name="gender">';
            echo '<option disabled>Select gender</option>';
            echo '<option value="male" ' . ($row['gender'] === 'male' ? 'selected' : '') . '>Male</option>';
            echo '<option value="female" ' . ($row['gender'] === 'female' ? 'selected' : '') . '>Female</option>';
            echo '</select>';
            echo '</div>';
            // Year Of Study field
            echo '<div class="input-field">';
            echo '<label>Year Of Study</label>';
            echo '<select required name="year">';
            echo '<option disabled>Select Year Of Study</option>';
            for ($i = 1; $i <= 4; $i++) {
                echo '<option value="' . $i . '" ' . ($row['year'] == $i ? 'selected' : '') . '>' . $i . '</option>';
            }
            echo '</select>';
            echo '</div>';
            echo '<div class="input-field">';
            echo '<label>Branch of Study</label>';
            echo '<select required name="department">';
            echo '<option disabled>Select Branch of Study</option>';
            $departments = ['it', 'cs', 'ece', 'eee'];
            foreach ($departments as $dept) {
                echo '<option value="' . $dept . '" ' . ($row['department'] === $dept ? 'selected' : '') . '>' . strtoupper($dept) . '</option>';
            }
            echo '</select>';
            echo '</div>';
            // Close the "Personal Details" div
            echo '</div>';
            // Close the form
            echo '</form>';
        } else {
            echo "Record not found.";
        }
    } else {
        echo "Invalid request.";
    }

    $conn->close();
    ?>
    <center>
      <button type="submit">Update</button>
    </center>
  </div>

  <script src="script.js"></script>
</body>
</html>
