-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 17, 2024 at 02:37 PM
-- Server version: 10.5.20-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id21402454_mecsesta`
--

-- --------------------------------------------------------

--
-- Table structure for table `addstudent_activities`
--

CREATE TABLE `addstudent_activities` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `activity_type` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `certificate_path` varchar(255) NOT NULL,
  `organized_by` varchar(255) NOT NULL,
  `attended_from_date` varchar(255) NOT NULL,
  `attended_to_date` varchar(255) NOT NULL,
  `number_of_days` int(255) NOT NULL,
  `prize_position` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `credit_points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `addstudent_activities`
--

INSERT INTO `addstudent_activities` (`id`, `student_id`, `activity_type`, `topic`, `certificate_path`, `organized_by`, `attended_from_date`, `attended_to_date`, `number_of_days`, `prize_position`, `status`, `credit_points`) VALUES
(22, 7, 'paper_presentation', 'Machine learning ', 'certificates/2/B.Tech - Information Technology/22IT020/additional_certificates/paper_presentation-Machine learning -65b7bfe81a18c.jpeg', 'Muthayammal engineering college ', '2023-12-07', '2023-12-07', 1, 'Participant', 'waiting', 10);

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'jothiadmin', 'Jothi422@');

-- --------------------------------------------------------

--
-- Table structure for table `ca`
--

CREATE TABLE `ca` (
  `ca_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ca`
--

INSERT INTO `ca` (`ca_id`, `username`, `password`, `phonenumber`, `gender`, `images`, `department`, `name`) VALUES
(1, 'kalaiyarasi2020.it@gmail.com', 'Jothi422@', '1224134', 'female', 'caprofile/kalaimam.jpeg', 'B.Tech - Information Technology', 'KALAYARASI');

-- --------------------------------------------------------

--
-- Table structure for table `hod`
--

CREATE TABLE `hod` (
  `hod_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hod`
--

INSERT INTO `hod` (`hod_id`, `username`, `password`, `name`, `branch`, `images`, `phonenumber`, `gender`) VALUES
(1, 'assvanitha@gmail.com', 'Jothi422@', 'ANITHA', 'B.Tech - Information Technology', 'hodprofile/anithamampic.png', '9876543210', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `id_cards`
--

CREATE TABLE `id_cards` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `photo` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mentors`
--

CREATE TABLE `mentors` (
  `mentor_id` int(11) NOT NULL,
  `mentor_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mentors`
--

INSERT INTO `mentors` (`mentor_id`, `mentor_name`, `email`, `password`, `department`, `images`, `phonenumber`, `gender`) VALUES
(1, 'KALAYARASI', 'kalaiyarasi2020.it@gmail.com', 'Jothi422@', 'B.E - Electronics and Communication Engineering', 'mentorprofile/kalaimam.jpeg', '34324932', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `peer_mentor`
--

CREATE TABLE `peer_mentor` (
  `peer_id` int(11) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fromnumber` varchar(255) NOT NULL,
  `tonumber` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `year` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peer_mentor`
--

INSERT INTO `peer_mentor` (`peer_id`, `roll_number`, `name`, `number`, `email`, `password`, `fromnumber`, `tonumber`, `gender`, `images`, `year`, `department`) VALUES
(2, '22IT033', 'jothinathan', '8807993608', 'jothinathannagarajan@gmail.com', '2003-05-11', '22IT001', '22IT100', 'male', 'peerprofile/download (3).png', '2', 'B.Tech - Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `principal`
--

CREATE TABLE `principal` (
  `principal_id` int(255) NOT NULL,
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `phonenumber` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `principal`
--

INSERT INTO `principal` (`principal_id`, `id`, `username`, `password`, `name`, `images`, `phonenumber`, `gender`) VALUES
(1, 1, 'principal@gmail.com', 'Jothi422@', 'MADHESHWARAN', 'principalprofile/download.jpg', '12312312', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `roll_number` varchar(255) NOT NULL,
  `images` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `dob` date NOT NULL,
  `phone` varchar(255) NOT NULL,
  `mentor_id` varchar(255) NOT NULL,
  `ca_id` varchar(255) NOT NULL,
  `year_of_study` int(255) NOT NULL,
  `branch` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `credit_points` int(11) NOT NULL,
  `addcredit_points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `roll_number`, `images`, `email`, `password`, `gender`, `dob`, `phone`, `mentor_id`, `ca_id`, `year_of_study`, `branch`, `section`, `credit_points`, `addcredit_points`) VALUES
(1, 'KAVIN', 'K S', '22IT035', 'studentprofile/kavin pic.jpg', 'kavinselvamani781@gmail.com ', '2004-11-19', 'male', '2004-11-19', '9894427715', '1', '3', 2, 'B.Tech - Information Technology', 'a', 0, 0),
(3, 'HARISHKUMAR', 'M', '22IT029', 'studentprofile/harish pic.jpg', 'harish22it029@gmail.com', '2005-04-17', 'male', '2005-04-17', '9789328633', '2', '3', 2, 'B.Tech - Information Technology', 'a', 0, 0),
(4, 'ASRAF', 'A', '22IT011', 'studentprofile/asrafpic.jpg', 'asrafaleem8@gmail.com', '2004-10-19', 'male', '2004-10-19', '7695953143', '3', '3', 2, 'B.Tech - Information Technology', 'a', 0, 0),
(5, 'LIKKASH', 'R', '22IT042', 'studentprofile/likkash pic.jpg', 'likkashlikkash1@gmail.com', '2004-12-22', 'male', '2004-12-22', '6374746756', '1', '3', 2, 'B.Tech - Information Technology', 'a', 0, 0),
(6, 'BALJI', 'R', '22IT013', 'studentprofile/balajipic.jpg', 'balajiravi497@gmail.com', '2005-06-09', 'male', '2005-12-12', '9965235825', '3', '3', 2, 'B.Tech - Information Technology', 'a', 0, 0),
(7, 'DHARSANI', 'M', '22IT020', 'studentprofile/dharsanipic.jpg', 'dharsanimv@gmail.com', '2005-09-03', 'female', '2005-09-03', '917598485282', '1', '1', 2, 'B.Tech - Information Technology', 'a', 0, 0),
(8, 'RUBIGA', 'S', '22IT068', 'studentprofile/rubiga pic.jpg', 'rubikasekar123@gmail.com', '2005-03-01', 'male', '2005-03-01', '9342939909', '3', '3', 2, 'B.Tech - Information Technology', 'b', 0, 0),
(20, 'KARTHIKA', 'S S', '22IT034', 'studentprofile/DocScanner Jan 27, 2024 3-32 PM-1(6894147646518).jpg', 'karthika.ssk2005@gmail.com', '2005-02-19', 'female', '2005-02-19', '7604952031', '1', '1', 2, 'B.Tech - Information Technology', 'a', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_activities`
--

CREATE TABLE `student_activities` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `activity_type` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `certificate_path` varchar(255) NOT NULL,
  `organized_by` varchar(255) NOT NULL,
  `attended_from_date` varchar(255) NOT NULL,
  `attended_to_date` varchar(255) NOT NULL,
  `number_of_days` int(255) NOT NULL,
  `prize_position` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `credit_points` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student_activities`
--

INSERT INTO `student_activities` (`id`, `student_id`, `activity_type`, `topic`, `certificate_path`, `organized_by`, `attended_from_date`, `attended_to_date`, `number_of_days`, `prize_position`, `status`, `credit_points`) VALUES
(5, 7, 'workshop', 'emerging global trends in iot with cyber security', 'certificates/2/B.Tech - Information Technology/22IT020/IMG-20231125-WA0003.jpg', 'ksr institute for engineering', '2023-10-06', '2023-10-06', 1, 'participant', 'waiting', 20),
(6, 7, 'Online certification General topics', 'effective communication', 'certificates/2/B.Tech - Information Technology/22IT020/IMG_20231029_143835.jpg', 'Great learning', '2023-08-11', '2023-08-11', 1, 'participant', 'waiting', 5),
(7, 7, 'Online certification General topics 2', 'Mathematics for job interview', 'certificates/2/B.Tech - Information Technology/22IT020/IMG_20231029_143926.jpg', 'Great learning', '2023-08-11', '2023-08-11', 1, 'participant', 'waiting', 5),
(8, 7, 'Online certification Technical', 'CSS properties', 'certificates/2/B.Tech - Information Technology/22IT020/IMG_20240127_150427.jpg', 'Great learning', '2023-08-11', '2023-08-11', 1, 'participant', 'waiting', 10),
(9, 7, 'Online certification Technical 2', 'Java application', 'certificates/2/B.Tech - Information Technology/22IT020/IMG_20231029_143903.jpg', 'Great learning', '2023-08-11', '2023-08-11', 1, 'participant', 'waiting', 10),
(10, 5, 'Project Contest / Field Project / Minor Project', 'Face Recognition Based Attendance System ', 'certificates/2/B.Tech - Information Technology/22IT042/DOC-20231028-WA0001..pdf', 'MUTHAYAMMAL ENGINEERING COLLEGE ', '2023-07-13', '2023-07-13', 1, 'participant', 'waiting', 50),
(11, 5, 'workshop', 'IOT based on health services and application ', 'certificates/2/B.Tech - Information Technology/22IT042/IMG20240129202438.jpg', 'Odugaatech', '2023-09-09', '2023-09-09', 1, 'participant', 'waiting', 20),
(12, 5, 'Paper presentation / Seminar participation / Workshop participation (External)', 'Cloud computing ', 'certificates/2/B.Tech - Information Technology/22IT042/IMG20240129203319.jpg', 'Salem college of engineering and technology ', '2023-10-13', '2023-10-13', 1, 'participant', 'waiting', 20),
(13, 7, 'Paper presentation / Seminar participation / Workshop participation (External)', 'Machine learning ', 'certificates/2/B.Tech - Information Technology/22IT020/IMG-20240129-WA0010.jpg', 'Salem college of engineering and technology ', '2023-10-13', '2023-10-13', 1, 'participant', 'waiting', 20),
(14, 8, 'workshop', 'Contemporary Technologies', 'certificates/2/B.Tech - Information Technology/22IT068/DocScanner 29-Jan-2024 8-51 pm.jpg', 'KSR COLLEGE OF ENGINEERING', '2023-11-01', '2023-11-01', 1, 'participant', 'waiting', 20),
(15, 8, 'Paper presentation / Seminar participation / Workshop participation (External)', 'IOT', 'certificates/2/B.Tech - Information Technology/22IT068/DocScanner 29-Jan-2024 8-56 pm', 'Salem College Of Engineering And Technology', '2023-10-04', '2023-10-04', 1, 'participant', 'waiting', 20),
(16, 5, 'seminar', 'Transceiver Technologies for High-speed ICs ', 'certificates/2/B.Tech - Information Technology/22IT042/IMG20240129205758.jpg', 'IEEE - IISc VLSI Chapter and Photonics Chapter ', '2023-09-16', '2023-09-16', 1, 'participant', 'waiting', 10),
(17, 8, 'Online certification Technical', 'Foundation of cyber security', 'certificates/2/B.Tech - Information Technology/22IT068/1706542439743.jpg', 'Coursera', '2024-01-20', '2024-01-25', 6, 'participant', 'waiting', 10),
(18, 5, 'seminar 2', 'Career guidance webinar ', 'certificates/2/B.Tech - Information Technology/22IT042/IMG20240129205930.jpg', 'Skilldunia', '2023-10-25', '2023-10-25', 1, 'participant', 'waiting', 10),
(19, 8, 'Online certification Technical 2', 'Introducing Robotic Process Automation (RPA)', 'certificates/2/B.Tech - Information Technology/22IT068/1706542536776.jpg', 'AUTOMATION ANYWHERE', '2023-01-09', '2023-01-09', 1, 'participant', 'waiting', 10),
(20, 20, 'seminar', 'IOT', 'certificates/2/B.Tech - Information Technology/22IT034/IMG_20240129_210028_362 (3).jpg', 'SALEM COLLEGE OF ENGINEERING AND TECHNOLOGY ', '2023-10-04', '2023-10-04', 1, 'participant', 'waiting', 10),
(21, 8, 'Online certification General topics 2', 'Knowledge quiz series', 'certificates/2/B.Tech - Information Technology/22IT068/1706542631891.jpg', 'Karpagam College Of Engineering', '2023-09-09', '2023-09-09', 1, 'participant', 'waiting', 5),
(22, 5, 'Online certification General topics', 'Self-placed training course ', 'certificates/2/B.Tech - Information Technology/22IT042/IMG20240129210554.jpg', 'MathWorks', '2023-09-13', '2023-09-13', 1, 'participant', 'waiting', 5),
(23, 20, 'workshop', 'Emerging Global Trends In IoT With Cyber Security', 'certificates/2/B.Tech - Information Technology/22IT034/IMG_20240129_210005_413.jpg', 'KSR INSTITUTE FOR ENGINEERING AND TECHNOLOGY ', '2023-10-06', '2023-10-06', 1, 'participant', 'waiting', 20),
(24, 5, 'Online certification Technical', 'MongoDB Basics', 'certificates/2/B.Tech - Information Technology/22IT042/IMG20240129210624.jpg', 'ICT Academy Learnathon ', '2023-09-14', '2023-09-14', 1, 'participant', 'waiting', 10),
(25, 5, 'Online certification General topics 2', 'Google Data Analytics ', 'certificates/2/B.Tech - Information Technology/22IT042/IMG20240129210754.jpg', 'The Digital Adda', '2023-10-27', '2023-10-27', 1, 'participant', 'waiting', 5),
(26, 20, 'Paper presentation / Seminar participation / Workshop participation (External)', 'IOT', 'certificates/2/B.Tech - Information Technology/22IT034/IMG_20240129_210028_362 (4).jpg', 'SALEM COLLEGE OF ENGINEERING AND TECHNOLOGY ', '20203-10-04', '2023-10-04', 7305, 'participant', 'waiting', 20),
(27, 20, 'seminar 2', 'Database Security For Cyber Professionals', 'certificates/2/B.Tech - Information Technology/22IT034/WhatsApp Image 2024-01-29 at 9.15.56 PM.jpeg', 'The Digital Adda', '2023-07-04', '2023-07-04', 1, 'participant', 'waiting', 10),
(28, 20, 'student tech talk', 'IOT', 'certificates/2/B.Tech - Information Technology/22IT034/IMG_20231028_134006.jpg', 'muthayammal engineeering college', '2023-10-13', '2023-10-13', 1, 'participant', 'waiting', 20),
(29, 20, 'Online certification Technical', 'Typing Skills Test', 'certificates/2/B.Tech - Information Technology/22IT034/KARTHIKA.pdf', 'Typing Skills Certificate', '2023-10-27', '2023-10-27', 1, 'participant', 'waiting', 10),
(30, 20, 'Online certification General topics', 'lifestyle for environment', 'certificates/2/B.Tech - Information Technology/22IT034/WhatsApp Image 2024-01-29 at 9.35.24 PM.jpeg', '', '2023-09-25', '2023-09-25', 1, 'participant', 'waiting', 5),
(31, 20, 'Online certification Technical 2', 'Knowledge Quize series on Electric Vehicles- IX', 'certificates/2/B.Tech - Information Technology/22IT034/WhatsApp Image 2024-01-29 at 9.40.39 PM.jpeg', 'Karpagam college of Engineering', '2023-09-17', '2023-09-17', 1, 'participant', 'waiting', 10),
(32, 20, 'Online certification General topics 2', 'game  zone ', 'certificates/2/B.Tech - Information Technology/22IT034/IMG_20240129_210015_719.jpg', 'SALEM COLLEGE OF ENGINEERING AND TECHNOLOGY ', '2023-10-04', '2023-10-04', 1, 'participant', 'waiting', 5),
(33, 4, 'Online certification General topics 2', 'Transceiver Technologies for High-Speed ICs', 'certificates/2/B.Tech - Information Technology/22IT011/Certificate for ASRAF A for NANOSYSTEMS_ LAB TO FAB_compressed (1).pdf', 'IEEE-IISc VLSI Chapter and Photonics Chapter ', '2023-09-16', '2023-09-16', 1, 'participant', 'waiting', 5),
(34, 4, 'workshop', 'IOT', 'certificates/2/B.Tech - Information Technology/22IT011/17065458829813412640412637284331.jpg', 'ODUGAA TECH', '2024-09-09', '2023-09-09', 367, 'participant', 'waiting', 20),
(35, 6, 'workshop', 'IOT BASED ON HEALTH SERVICE AND APPLICATION', 'certificates/2/B.Tech - Information Technology/22IT013/PDFGallery_20240130_072021.pdf', 'Odugaatech', '2023-09-09', '2023-09-09', 1, 'participant', 'waiting', 20),
(36, 6, 'Online certification General topics', 'SOFT SKILLS FOR IT', 'certificates/2/B.Tech - Information Technology/22IT013/Balaji Ravi (3)_page-0001.jpg', 'GREAT LEARNING ', '2023-10-07', '2023-10-07', 1, 'participant', 'waiting', 5),
(37, 6, 'Online certification General topics 2', 'WHAT IS IOT', 'certificates/2/B.Tech - Information Technology/22IT013/Balaji Ravi (1).pdf', 'GREAT LEARNING ', '2023-10-18', '2023-10-18', 1, 'participant', 'waiting', 5),
(38, 6, 'Online certification Technical', 'FRONT END DEVELOPMENT -HTML', 'certificates/2/B.Tech - Information Technology/22IT013/Balaji Ravi (2).pdf', 'GREAT LEARNING ', '2023-07-06', '2023-07-06', 1, 'participant', 'waiting', 10),
(39, 6, 'Online certification Technical 2', 'JAVA APPLICATION ', 'certificates/2/B.Tech - Information Technology/22IT013/Balaji Ravi.pdf', 'GREAT LEARNING ', '2023-12-29', '2023-12-29', 1, 'participant', 'waiting', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addstudent_activities`
--
ALTER TABLE `addstudent_activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ca`
--
ALTER TABLE `ca`
  ADD PRIMARY KEY (`ca_id`);

--
-- Indexes for table `hod`
--
ALTER TABLE `hod`
  ADD PRIMARY KEY (`hod_id`);

--
-- Indexes for table `id_cards`
--
ALTER TABLE `id_cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mentors`
--
ALTER TABLE `mentors`
  ADD PRIMARY KEY (`mentor_id`);

--
-- Indexes for table `peer_mentor`
--
ALTER TABLE `peer_mentor`
  ADD PRIMARY KEY (`peer_id`);

--
-- Indexes for table `principal`
--
ALTER TABLE `principal`
  ADD PRIMARY KEY (`principal_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_activities`
--
ALTER TABLE `student_activities`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `certificate_path` (`certificate_path`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addstudent_activities`
--
ALTER TABLE `addstudent_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ca`
--
ALTER TABLE `ca`
  MODIFY `ca_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `id_cards`
--
ALTER TABLE `id_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mentors`
--
ALTER TABLE `mentors`
  MODIFY `mentor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peer_mentor`
--
ALTER TABLE `peer_mentor`
  MODIFY `peer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `principal`
--
ALTER TABLE `principal`
  MODIFY `principal_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `student_activities`
--
ALTER TABLE `student_activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
