-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 13, 2017 at 03:10 AM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinical_appointment`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `app_id` int(11) NOT NULL,
  `pat_name` varchar(100) NOT NULL,
  `doc_id` int(5) NOT NULL,
  `scheduled_date` date NOT NULL,
  `scheduled_time` time NOT NULL,
  `mobile_no` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `problem` varchar(200) NOT NULL,
  `confirm` tinyint(1) NOT NULL DEFAULT '0',
  `patient_id` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`app_id`, `pat_name`, `doc_id`, `scheduled_date`, `scheduled_time`, `mobile_no`, `email`, `problem`, `confirm`, `patient_id`) VALUES
(2, 'Babin Rana', 4, '2017-12-25', '02:00:00', '9845688436', 'ashwinrana10@gmail.com', 'headach', 1, 1),
(3, 'Rabin', 4, '2017-12-06', '20:53:00', '12345679', 'rabin@gmail.com', 'head', 0, NULL),
(4, 'Babin Rana', 4, '2017-12-25', '02:15:00', '9845688436', 'ashwinrana10@gmail.com', 'headach', 1, 1),
(5, 'Babin', 4, '2017-12-25', '02:30:00', '9845027604', 'ashwinrana10@gmail.com', ' Hh', 0, NULL),
(6, 'MRR', 1, '2017-12-17', '01:00:00', '7845123659', 'MRR@MRR.MRR', 'MRR ', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `subject` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_availabilty`
--

CREATE TABLE `doctor_availabilty` (
  `avail_id` int(11) NOT NULL,
  `doc_id` int(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `doctor_availabilty`
--

INSERT INTO `doctor_availabilty` (`avail_id`, `doc_id`, `day`, `start_time`, `end_time`) VALUES
(1, 1, 'Sunday', '13:00:00', '15:00:00'),
(2, 2, 'Monday', '14:00:00', '16:00:00'),
(3, 3, 'Sunday', '11:00:00', '13:00:00'),
(5, 1, 'Monday', '13:00:00', '15:00:00'),
(6, 1, 'Tuesday', '13:00:00', '15:00:00'),
(7, 2, 'Tuesday', '14:00:00', '16:00:00'),
(8, 2, 'Wednesday', '14:00:00', '16:00:00'),
(9, 1, 'Thursday', '13:00:00', '15:00:00'),
(10, 3, 'Tuesday', '11:00:00', '13:00:00'),
(11, 3, 'Wednesday', '11:00:00', '13:00:00'),
(12, 2, 'Thursday', '15:00:00', '17:00:00'),
(13, 1, 'Friday', '10:00:00', '14:00:00'),
(14, 2, 'Saturday', '12:00:00', '16:00:00'),
(15, 3, 'Thursday', '12:00:00', '15:00:00'),
(16, 4, 'Sunday', '14:03:00', '18:00:00'),
(17, 4, 'Tuesday', '16:00:00', '18:00:00'),
(18, 4, 'Monday', '14:00:00', '16:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `doc_id` int(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `address` varchar(50) NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `specialist` varchar(100) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`doc_id`, `name`, `gender`, `address`, `mobile_no`, `email`, `password`, `specialist`, `img`) VALUES
(1, 'Paul', 'male', 'Siphal', 9813332255, 'paul17@gmail.com', '9813332255', 'Neurologist', 'picture_3968778455a047a25057e68.84177843.jpg'),
(2, 'Emma', 'female', 'Chabahil', 9843345679, 'rebakah02@gmail.com', '9843345679', 'Physiotherapist', 'picture_19335a06cfe736dd65.57651740.png'),
(3, 'Michaella', 'female', 'Kalopul', 9843345679, 'michela02@gmail.com', '', 'ENT', 'picture_318855a15b01d575f67.47279541.jpg'),
(4, 'Ashwin Rana', 'male', 'Kalanki, Kathamndu', 9845688436, 'ashwinrana10@gmail.com', '9845688436', 'Neurologist ', 'picture_7652650465a1fb40868d796.88116779.png');

-- --------------------------------------------------------

--
-- Table structure for table `patient_info`
--

CREATE TABLE `patient_info` (
  `pat_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `dob` date NOT NULL,
  `mobile_no` bigint(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `patient_info`
--

INSERT INTO `patient_info` (`pat_id`, `name`, `address`, `gender`, `dob`, `mobile_no`, `email`, `username`, `password`) VALUES
(1, 'Ashma Dhakal', 'Siphal', 'female', '1996-12-13', 9843046627, 'ashmadhakal94@gmail.com', 'ashma', 'ashma');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `mobile_no` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `name`, `mobile_no`, `email`, `password`) VALUES
(1, 'Ashma Dhakal', 9812346670, 'admin@admin.com', 'admin'),
(3, 'Ashwin', 9845688436, 'ashwinrana10@gmail.com', 'ashwin007');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `doctor_availabilty`
--
ALTER TABLE `doctor_availabilty`
  ADD PRIMARY KEY (`avail_id`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`doc_id`);

--
-- Indexes for table `patient_info`
--
ALTER TABLE `patient_info`
  ADD PRIMARY KEY (`pat_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `doctor_availabilty`
--
ALTER TABLE `doctor_availabilty`
  MODIFY `avail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `doc_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `patient_info`
--
ALTER TABLE `patient_info`
  MODIFY `pat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
