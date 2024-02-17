<?php
session_start();

// Database connection details
include 'configuration.php';

// Create a database connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Define the role (CA, HOD, Mentor, Principal) based on your needs
$role = "CA"; // Change this as needed

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $principal_id = $_POST["id"];
    $name = $_POST["name"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phonenumber = $_POST["phonenumber"];
    $gender = $_POST["gender"];
    $profile_picture = $_FILES["profile_picture"]["name"];

    // File upload directory
    $target_dir = "principalprofile/";
    $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);

    $check_query = "SELECT * FROM principal WHERE principal_id='$id' OR username='$email'";
    $check_result = $conn->query($check_query);

    if ($check_result->num_rows > 0) {
        // CA with the same ID or email already exists
        echo '<script>alert("Principal with the same ID or email already exists!"); window.location="admin.php";</script>';
        exit();
    }

    // Upload the file
    if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
        // File uploaded successfully, insert data into the database
        $sql = "INSERT INTO principal (id, principal_id, name, password, username, phonenumber, gender, images)
                VALUES ('$id','$principal_id','$name', '$password', '$email', '$phonenumber', '$gender', '$target_file')";

if ($conn->query($sql) === true) {
    // Registration successful
    echo "Registration successful!";
    echo "<script>alert('Registered successfully!'); window.location='admin.php';</script>"; // Show alert and then redirect
    exit();
}
else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>CA Register</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
</head>
<body>
    <?php
include 'adminsidebar.php';

?>
    <div class="container">
        <header>Principal Registration</header>
        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>" enctype="multipart/form-data">
            <div class="details personal">
                <span class="title">Personal Details</span>
                <div class="fields">
                    <div class="input-field">
                        <label>Principal id</label>
                        <input type="text" id="id" name="id" placeholder="Enter your id" required>
                    </div>
                    <div class="input-field">
                        <label>Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                    </div>
                    <div class="input-field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Enter password" required>
                    </div>
                    <div class="input-field">
                        <label>Email (username)</label>
                        <input type="text" name="email" placeholder="Enter your email" required>
                    </div>
                    <div class="input-field">
                        <label>Phone</label>
                        <input type="number" name="phonenumber" placeholder="Enter your number" required>
                    </div>
                    <div class="input-field">
                        <label>Gender</label>
                        <select required name="gender">
                            <option disabled selected>Select gender</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label>Profile Picture</label>
                        <input type="file" name="profile_picture" id="profile_picture" required>
                    </div>
                    
                </div>
            </div>
            <center>
                <button type="submit">Register</button>
            </center>
        </form>
    </div>
</body>
</html>
