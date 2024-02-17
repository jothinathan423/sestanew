<?php
session_start();


?>

<!DOCTYPE html>
<html>
<head>
    
<title>Update Student Profile</title>
    <link rel="shortcut icon" href="mec.jpg" />
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- Include Bootstrap CSS for styling -->
    
</head>
<body>
    <?php include 'casidebar.php';
    ?>
    <div class="container">
        <h2>Edit Student</h2>
        <?php
        // Database connection code (replace with your actual database credentials)
       include 'configuration.php';
        // Create a connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check the connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            // Fetch the student data by ID
            $query = "SELECT * FROM students WHERE roll_number = '$id'";

            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                $studentData = $result->fetch_assoc();
                ?>
                <form action="stu_process.php" method="post">
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name </label>
                            <input type="text" id="firstname" placeholder="Enter your name"  value="<?= $studentData['firstname'] ?>" name="firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="lastname" placeholder="Enter your ccupation" value="<?= $studentData['lastname'] ?>"required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" placeholder="Enter birth date" value="<?= $studentData['dob'] ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="password" placeholder="Enter birth date" value="<?= $studentData['dob'] ?>" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email" value="<?= $studentData['email'] ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="phone" placeholder="Enter mobile number"  value="<?= $studentData['phone'] ?>" required>
                        </div>

                        <div class="input-field">
                            <label>Gender</label>
                            <input type="text" name="gender" value="<?= $studentData['gender'] ?>">
                        </div>

                        
                  
                </div>

                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Roll Number(username)</label>
                            <input type="text" name="id" value="<?= $studentData['roll_number'] ?>" placeholder="Enter ID type" required>
                        </div>

                        <div class="input-field">
                            <label>Year Of Study</label>
                            <input  type="text" name="year_of_study" value="<?= $studentData['year_of_study'] ?>" required>
                                
                            
                        </div>

                        <div class="input-field">
                            <label>Branch of Study</label>
                            <input type="text" name="branch" value="<?= $studentData['branch'] ?>" required>
                                
                          </div>

                        <div class="input-field">
                            <label>Section</label>
                            <input type="text" name="section" value="<?= $studentData['section'] ?>" required >
                                
                            
                        </div>

                        <div class="input-field">
                            <label>Class Adivisor ID</label>
                            <input type="text"  name="ca"required value="<?= $studentData['ca_id'] ?>">
                                
                        </div>

                        <div class="input-field">
                            <label>Mentor ID</label>
                            <input type="text" name="mentor_id" value="<?= $studentData['mentor_id'] ?>" required>
                                
                                                    
                          </div>
                    </div>

                    
                </div> 
            </div>
            <button type="submit">Update</button>
                </form>


                
            <?php
            } else {
                echo 'Student not found';
            }
        } else {
            echo 'Invalid request';
        }

        // Close the database connection
        $conn->close();
        ?>
    </div>
</body>
</html>
