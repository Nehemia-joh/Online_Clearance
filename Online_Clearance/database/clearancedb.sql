-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2023 at 11:53 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7
CREATE DATABASE clearance_db;
USE clearance_db;
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clearancedb`
--

-- --------------------------------------------------------

--
-- Table structure for table `approval`
--

CREATE TABLE `approval` (
  `approval_id` int(11) NOT NULL,
  `clearance_id` int(11) DEFAULT NULL,
  `faculty_id` int(11) DEFAULT NULL,
  `approval_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `clearance`
--

CREATE TABLE `clearance` (
  `clearance_id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `submission_date` date DEFAULT NULL,
  `student_email` varchar(50) DEFAULT NULL,
  `student_name` varchar(50) DEFAULT NULL,
  `student_major` varchar(50) DEFAULT NULL,
  `matric` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `lib` varchar(20) DEFAULT NULL,
  `finance` varchar(10) DEFAULT NULL,
  `services` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clearance`
--

INSERT INTO `clearance` (`clearance_id`, `student_id`, `status`, `submission_date`, `student_email`, `student_name`, `student_major`, `matric`, `username`, `lib`, `finance`, `services`) VALUES
(7, NULL, 'Approved', '2023-06-16', 'aropestephen@gmail.com', 'Stephen Arope', 'Computer Science', '051', 'Stephen', 'Approved', NULL, NULL),
(8, NULL, 'Approved', '2023-06-16', 'stephen@gmail.com', 'Amani Bwire', 'Computer Science', '018', 'Amani', 'Approved', NULL, NULL),
(9, NULL, 'Approved', '2023-06-16', 'juliusgaston@gmail.com', 'Julius Gaston', 'IT', '011', 'Juju', 'Approved', NULL, NULL),
(10, NULL, 'Approved', '2023-06-16', 'aropejulieth@gamil.com', 'Julieth Arope', 'Computer Science', '010', 'Julieth', NULL, NULL, NULL),
(11, NULL, 'Pending', '2023-06-17', 'nehegery@gmail.com', 'Nehemia', 'computer science', '024', 'Nehemia', NULL, NULL, NULL),
(12, NULL, 'Approved', '2023-06-17', 'jof@gmail.com', 'jof', 'accounting', '001', 'jof', 'Approved', 'Approved', 'Approved');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_items`
--

CREATE TABLE `clearance_items` (
  `clearance_item_id` int(11) NOT NULL,
  `clearance_id` int(11) DEFAULT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `item_status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clearance_items`
--

INSERT INTO `clearance_items` (`clearance_item_id`, `clearance_id`, `item_name`, `item_status`) VALUES
(1, 1, 'projector', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `clearance_requirements`
--

CREATE TABLE `clearance_requirements` (
  `requirement_id` int(11) NOT NULL,
  `item_name` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `faculty_id` int(11) NOT NULL,
  `faculty_name` varchar(255) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`faculty_id`, `faculty_name`, `department`) VALUES
(1, 'Information Technology', 'Informatics');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(30) NOT NULL,
  `item_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `item_name`) VALUES
(1, 'projector'),
(2, 'library'),
(3, 'Laboratory'),
(4, 'idcard');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int(6) NOT NULL,
  `student_email` varchar(255) DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `matric` int(10) NOT NULL,
  `student_major` varchar(255) DEFAULT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_email`, `student_name`, `matric`, `student_major`, `username`, `password`, `role`) VALUES
(1, 'nehegery@gmail.com', 'Nehemia', 24, 'Computer Science', 'Nehemia', '12345', 'nonregular'),
(2, 'amani@gmail.com', 'Amani Bwire', 18, 'Computer Science', 'Amani', 'pombe', 'nonregular');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(6) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `created_on`, `role`) VALUES
(1, 'Logic', 'logic', 'mawe', '2023-06-05 15:52:52pm', 'admin'),
(2, 'admin', 'admin', 'admin123', '2023-04-28 13:03:27pm', 'admin'),
(3, 'Hussein Kishanga', 'Hussein', '09876', '2023-06-15 18:34:01', 'admin'),
(5, 'Julius', 'Juju', 'kanje', '2023-06-16 10:33:04', 'admin'),
(7, 'americanany palok', 'library', '1234', '2023-06-17 23:10:45', 'library'),
(8, 'reclana reman', 'services', '1234', '2023-06-17 23:17:00', 'services'),
(9, 'sophiana Rampat', 'finance', '1234', '2023-06-17 23:17:47', 'finance');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `approval`
--
ALTER TABLE `approval`
  ADD PRIMARY KEY (`approval_id`);

--
-- Indexes for table `clearance`
--
ALTER TABLE `clearance`
  ADD PRIMARY KEY (`clearance_id`);

--
-- Indexes for table `clearance_items`
--
ALTER TABLE `clearance_items`
  ADD PRIMARY KEY (`clearance_item_id`);

--
-- Indexes for table `clearance_requirements`
--
ALTER TABLE `clearance_requirements`
  ADD PRIMARY KEY (`requirement_id`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`faculty_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `approval`
--
ALTER TABLE `approval`
  MODIFY `approval_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clearance`
--
ALTER TABLE `clearance`
  MODIFY `clearance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `clearance_items`
--
ALTER TABLE `clearance_items`
  MODIFY `clearance_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clearance_requirements`
--
ALTER TABLE `clearance_requirements`
  MODIFY `requirement_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `faculty_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
