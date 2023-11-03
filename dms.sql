-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2021 at 12:56 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dms`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_studentprofile`
--

CREATE TABLE `account_studentprofile` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `matric` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `dept_name_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `account_studentprofile`
--

INSERT INTO `account_studentprofile` (`id`, `fullname`, `matric`, `password`, `dept_name_id`, `session_id`) VALUES
(1, 'Ayinde Wasiu', '15N02/012', '5212ff879101c62047ba7646fd63aba5', 2, 1),
(2, 'Odewale Ayuba', '1234', '81dc9bdb52d04dc20036dbd8313ed055', 1, 2),
(3, 'Ojewole Ijiwere', '15N04/004', 'cf5f668e9b5aaa8c04929599a3de8517', 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `bursary_schoolfees`
--

CREATE TABLE `bursary_schoolfees` (
  `id` int(11) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `did_id` int(11) DEFAULT NULL,
  `sid_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bursary_schoolfees`
--

INSERT INTO `bursary_schoolfees` (`id`, `amount`, `did_id`, `sid_id`) VALUES
(1, '200500', 1, 1),
(2, '670000', 1, 2),
(3, '22', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `confirmed_payment`
--

CREATE TABLE `confirmed_payment` (
  `id` int(11) NOT NULL,
  `feesId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `directory` varchar(50) DEFAULT NULL,
  `amount` varchar(30) DEFAULT NULL,
  `dateConfirmed` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `feesId` int(11) NOT NULL,
  `studentId` int(11) NOT NULL,
  `amount` varchar(30) NOT NULL,
  `datePaid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `feesId`, `studentId`, `amount`, `datePaid`) VALUES
(1, 2, 2, '20000', '2019-08-12'),
(2, 2, 2, '400500', ''),
(3, 2, 2, '150000', '2019-06-05 14:07:43pm');

-- --------------------------------------------------------

--
-- Table structure for table `system_departmentdata`
--

CREATE TABLE `system_departmentdata` (
  `id` int(11) NOT NULL,
  `dept_name` varchar(50) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL,
  `fid_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_departmentdata`
--

INSERT INTO `system_departmentdata` (`id`, `dept_name`, `created_on`, `fid_id`) VALUES
(1, 'Law', NULL, 1),
(2, 'Psychology', '2019-06-05 14:03:02pm', 2),
(3, 'Sociology', '2019-06-05 14:52:19pm', 2),
(4, 'History', '2019-06-05 14:52:36pm', 3);

-- --------------------------------------------------------

--
-- Table structure for table `system_facultydata`
--

CREATE TABLE `system_facultydata` (
  `id` int(11) NOT NULL,
  `faculty_name` varchar(30) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_facultydata`
--

INSERT INTO `system_facultydata` (`id`, `faculty_name`, `created_on`) VALUES
(1, 'Law', '2019-06-14 00:00:00.000288'),
(2, 'Social Science', '2019-06-14 00:00:00.000288'),
(3, 'Humanities', '2019-06-05 13:54:44pm');

-- --------------------------------------------------------

--
-- Table structure for table `system_sessiondata`
--

CREATE TABLE `system_sessiondata` (
  `id` int(11) NOT NULL,
  `session_name` varchar(15) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `system_sessiondata`
--

INSERT INTO `system_sessiondata` (`id`, `session_name`, `created_on`) VALUES
(1, '2014/2015', '2019-06-05 14:03:02pm'),
(2, '2015/2016', '2019-06-05 14:03:02pm'),
(3, '2016/2017', '2019-06-05 14:13:31pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_on` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `password`, `created_on`) VALUES
(1, 'Adebola', 'debola', 'f57b5bfccccfd94ea60fc9303b54665f', '2019-06-05 15:52:52pm'),
(2, 'CampCodes', 'campcodes', 'ac09c14446487b84da336c98e97d45a8', '2021-04-28 13:03:27pm'),
(3, 'admin', 'admin', '0192023a7bbd73250516f069df18b500', '2021-07-13 18:43:40pm'),
(4, 'test', 'test', '098f6bcd4621d373cade4e832627b4f6', '2021-07-13 18:45:17pm'),
(5, 'sample', 'sample', '5e8ff9bf55ba3508199d22e984129be6', '2021-07-13 18:46:22pm');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_studentprofile`
--
ALTER TABLE `account_studentprofile`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_studentprofi_dept_name_id_50c95d10_fk_system_de` (`dept_name_id`),
  ADD KEY `account_studentprofi_semester_id_1c85b29c_fk_system_se` (`session_id`);

--
-- Indexes for table `bursary_schoolfees`
--
ALTER TABLE `bursary_schoolfees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bursary_schoolfees_did_id_c11c5cf3_fk_system_departmentdata_id` (`did_id`),
  ADD KEY `bursary_schoolfees_sid_id_7cba7ebd_fk_system_sessiondata_id` (`sid_id`);

--
-- Indexes for table `confirmed_payment`
--
ALTER TABLE `confirmed_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feesId` (`feesId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `feesId` (`feesId`),
  ADD KEY `studentId` (`studentId`);

--
-- Indexes for table `system_departmentdata`
--
ALTER TABLE `system_departmentdata`
  ADD PRIMARY KEY (`id`),
  ADD KEY `system_departmentdata_fid_id_a6b2799c_fk_system_facultydata_id` (`fid_id`);

--
-- Indexes for table `system_facultydata`
--
ALTER TABLE `system_facultydata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_sessiondata`
--
ALTER TABLE `system_sessiondata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_studentprofile`
--
ALTER TABLE `account_studentprofile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bursary_schoolfees`
--
ALTER TABLE `bursary_schoolfees`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `confirmed_payment`
--
ALTER TABLE `confirmed_payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_departmentdata`
--
ALTER TABLE `system_departmentdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `system_facultydata`
--
ALTER TABLE `system_facultydata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `system_sessiondata`
--
ALTER TABLE `system_sessiondata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `account_studentprofile`
--
ALTER TABLE `account_studentprofile`
  ADD CONSTRAINT `account_studentprofile_ibfk_1` FOREIGN KEY (`dept_name_id`) REFERENCES `system_departmentdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `account_studentprofile_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `system_sessiondata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bursary_schoolfees`
--
ALTER TABLE `bursary_schoolfees`
  ADD CONSTRAINT `bursary_schoolfees_ibfk_1` FOREIGN KEY (`did_id`) REFERENCES `system_departmentdata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bursary_schoolfees_ibfk_3` FOREIGN KEY (`sid_id`) REFERENCES `system_sessiondata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`feesId`) REFERENCES `bursary_schoolfees` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payment_ibfk_2` FOREIGN KEY (`studentId`) REFERENCES `account_studentprofile` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `system_departmentdata`
--
ALTER TABLE `system_departmentdata`
  ADD CONSTRAINT `system_departmentdata_ibfk_1` FOREIGN KEY (`fid_id`) REFERENCES `system_facultydata` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
