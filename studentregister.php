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
$ca_id = $_SESSION['ca_id'];

$sql = "SELECT COUNT(*) AS student_count FROM students WHERE ca_id = $ca_id";
// Query to retrieve student details associated with the CA
$query = "SELECT * FROM students WHERE ca_id = $ca_id";
$result = $conn->query($query);
?>
<!DOCTYPE html>
<!--=== Coding by CodingLab | www.codinglabweb.com === -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!----======== CSS ======== -->
    <link rel="stylesheet" href="style.css">
     
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>Student Register</title>
<!-- End layout styles -->
    <link rel="shortcut icon" href="mec.jpg" />
</head>
<body>
  <?php

  include 'casidebar.php';

  ?>
    <div class="container">
        <header>Student Registration</header>

        <form method="POST" action="process_registration.php" enctype="multipart/form-data">
            
                <div class="details personal">
                    <span class="title">Personal Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>First Name </label>
                            <input type="text" id="firstname" placeholder="Enter your name" name="firstname" required>
                        </div>

                        <div class="input-field">
                            <label>Last Name</label>
                            <input type="text" name="lastname" placeholder="Enter your ccupation" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="dob" placeholder="Enter birth date" required>
                        </div>

                        <div class="input-field">
                            <label>Date of Birth</label>
                            <input type="date" name="password" placeholder="Enter birth date" required>
                        </div>
                        <div class="input-field">
                            <label>Email</label>
                            <input type="text" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="input-field">
                            <label>Mobile Number</label>
                            <input type="number" name="phone" placeholder="Enter mobile number" required>
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
            <input type="file" name="image" id="image" class="form-control-file">
        
          </div>

                        
                  
                </div>

                <div class="details ID">
                    <span class="title">Identity Details</span>

                    <div class="fields">
                        <div class="input-field">
                            <label>Roll Number(username)</label>
                            <input type="text" name="rollnumber" placeholder="Enter ID type" required>
                        </div>

                        <div class="input-field">
                            <label>Year Of Study</label>
                            <select required name="year">
                                <option disabled selected>Select Year Of Study</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Branch of Study</label>
                            <select required name="department">
                                <option disabled selected>Select Branch of Study</option>
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
                            </select>
                          </div>

                        <div class="input-field">
                            <label>Section</label>
                            <select required name="section">
                                <option disabled selected>Select Section</option>
                                <option value="a">A</option>
                                <option value="b">B</option>
                                <option value="c">C</option>
                                
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Class Adivisor ID</label>
                            <select required name="ca">
                                <option disabled selected>Select Class Advisor ID</option>
                                <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
        <option value="60">60</option>
        <option value="61">61</option>
        <option value="62">62</option>
        <option value="63">63</option>
        <option value="64">64</option>
        <option value="65">65</option>
        <option value="66">66</option>
        <option value="67">67</option>
        <option value="68">68</option>
        <option value="69">69</option>
        <option value="70">70</option>
        <option value="71">71</option>
        <option value="72">72</option>
        <option value="73">73</option>
        <option value="74">74</option>
        <option value="75">75</option>
        <option value="76">76</option>
        <option value="77">77</option>
        <option value="78">78</option>
        <option value="79">79</option>
        <option value="80">80</option>
        <option value="81">81</option>
        <option value="82">82</option>
        <option value="83">83</option>
        <option value="84">84</option>
        <option value="85">85</option>
        <option value="86">86</option>
        <option value="87">87</option>
        <option value="88">88</option>
        <option value="89">89</option>
        <option value="90">90</option>
        <option value="91">91</option>
        <option value="92">92</option>
        <option value="93">93</option>
        <option value="94">94</option>
        <option value="95">95</option>
        <option value="96">96</option>
        <option value="97">97</option>
        <option value="98">98</option>
        <option value="99">99</option>
        <option value="100">100</option>
                            </select>
                        </div>

                        <div class="input-field">
                            <label>Mentor ID</label>
                            <select required name="ment">
                                <option disabled selected>Select Mentor ID</option>
                                <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
        <option value="9">9</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
        <option value="13">13</option>
        <option value="14">14</option>
        <option value="15">15</option>
        <option value="16">16</option>
        <option value="17">17</option>
        <option value="18">18</option>
        <option value="19">19</option>
        <option value="20">20</option>
        <option value="21">21</option>
        <option value="22">22</option>
        <option value="23">23</option>
        <option value="24">24</option>
        <option value="25">25</option>
        <option value="26">26</option>
        <option value="27">27</option>
        <option value="28">28</option>
        <option value="29">29</option>
        <option value="30">30</option>
        <option value="31">31</option>
        <option value="32">32</option>
        <option value="33">33</option>
        <option value="34">34</option>
        <option value="35">35</option>
        <option value="36">36</option>
        <option value="37">37</option>
        <option value="38">38</option>
        <option value="39">39</option>
        <option value="40">40</option>
        <option value="41">41</option>
        <option value="42">42</option>
        <option value="43">43</option>
        <option value="44">44</option>
        <option value="45">45</option>
        <option value="46">46</option>
        <option value="47">47</option>
        <option value="48">48</option>
        <option value="49">49</option>
        <option value="50">50</option>
        <option value="51">51</option>
        <option value="52">52</option>
        <option value="53">53</option>
        <option value="54">54</option>
        <option value="55">55</option>
        <option value="56">56</option>
        <option value="57">57</option>
        <option value="58">58</option>
        <option value="59">59</option>
        <option value="60">60</option>
        <option value="61">61</option>
        <option value="62">62</option>
        <option value="63">63</option>
        <option value="64">64</option>
        <option value="65">65</option>
        <option value="66">66</option>
        <option value="67">67</option>
        <option value="68">68</option>
        <option value="69">69</option>
        <option value="70">70</option>
        <option value="71">71</option>
        <option value="72">72</option>
        <option value="73">73</option>
        <option value="74">74</option>
        <option value="75">75</option>
        <option value="76">76</option>
        <option value="77">77</option>
        <option value="78">78</option>
        <option value="79">79</option>
        <option value="80">80</option>
        <option value="81">81</option>
        <option value="82">82</option>
        <option value="83">83</option>
        <option value="84">84</option>
        <option value="85">85</option>
        <option value="86">86</option>
        <option value="87">87</option>
        <option value="88">88</option>
        <option value="89">89</option>
        <option value="90">90</option>
        <option value="91">91</option>
        <option value="92">92</option>
        <option value="93">93</option>
        <option value="94">94</option>
        <option value="95">95</option>
        <option value="96">96</option>
        <option value="97">97</option>
        <option value="98">98</option>
        <option value="99">99</option>
        <option value="100">100</option>
                            </select>
                                                    
                          </div>
                    </div>

                    
                </div> 
            </div>
            <h5>**Before Entering CA and Menotor ID refer the CA reference and Mentor Reference page**</h5>
            <center>

            <button type="submit">submit</button>
            </center>
            
            
                </div> 
            </div>
        </form>
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