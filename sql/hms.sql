-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2021 at 01:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `P_id` int(11) NOT NULL,
  `appointmentDate` varchar(255) NOT NULL,
  `appointmentTime` varchar(255) NOT NULL,
  `D_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`P_id`, `appointmentDate`, `appointmentTime`, `D_id`) VALUES
(100, '05/02/2021', '3:30 PM', 1),
(100, '12/02/2021', '3:30 PM', 4),
(101, '04/03/2021', '1:30 PM', 2),
(102, '05/06/2021', '10:00 AM', 3),
(103, '12/02/2021', '3:30', 4),
(103, '12/02/2021', '3', 4),
(100, '22/02/2021', '3:30', 4),
(100, '22/02/2021', '3:30', 4),
(0, '', '', 0),
(0, '', '', 0),
(0, '', '', 0),
(0, '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `D_id` int(11) NOT NULL,
  `specilization` varchar(255) NOT NULL,
  `D_name` varchar(255) NOT NULL,
  `address` longtext NOT NULL,
  `D_age` int(11) NOT NULL,
  `D_gender` varchar(10) NOT NULL,
  `CNIC_no` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`D_id`, `specilization`, `D_name`, `address`, `D_age`, `D_gender`, `CNIC_no`, `Password`) VALUES
(1, 'Cardiology', 'Dr.Atif', 'peshawar', 45, 'M', '16300', 'atif'),
(2, 'Dermatology', 'Dr.Amna', 'peshawar', 44, 'F', '16301', 'amna'),
(3, 'Orthopaedics', 'Dr.Amir', 'peshawar', 40, 'M', '16302', 'amir'),
(4, 'Radiology', 'Dr.Alina', 'peshawar', 33, 'F', '16303', 'alina'),
(6, 'general physician', 'ali', 'islamabad', 0, 'M', '16311', 'vhjgjh');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `P_ID` int(11) NOT NULL,
  `D_id` int(11) DEFAULT NULL,
  `PatientName` varchar(200) DEFAULT NULL,
  `PatientContno` bigint(10) DEFAULT NULL,
  `PatientEmail` varchar(200) DEFAULT NULL,
  `PatientGender` varchar(50) DEFAULT NULL,
  `PatientAdd` mediumtext DEFAULT NULL,
  `PatientAge` int(10) DEFAULT NULL,
  `Patientdiaganoses` varchar(255) NOT NULL,
  `CNIC_no` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Medicine` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`P_ID`, `D_id`, `PatientName`, `PatientContno`, `PatientEmail`, `PatientGender`, `PatientAdd`, `PatientAge`, `Patientdiaganoses`, `CNIC_no`, `Password`, `Medicine`) VALUES
(100, 1, 'Ayesha Ali', 3167584155, 'Aye@gmail.com', 'F', 'Peshawar', 20, 'fever', '17300', 'ayesha', 'antibiotic'),
(101, 2, 'Ali', 3156847585, 'ali@gmail.com', 'M', 'Noshara', 21, 'skin pimple', '17301', 'ali', 'antibiotic'),
(102, 2, 'Farah', 3036587589, 'farah@gmail.com', 'F', 'Hayytabad', 22, 'skin Rashesh', '17302', 'farah', 'lorin'),
(103, 4, 'Javairia Rehman', 1266556, 'javairia@gmail.com', 'f', 'peshawar', 21, 'headche', '17303', '1234', 'ghi'),
(104, 3, 'hifza majeed', 3423, 'hifza@gmail.com', 'f', 'peshawar', 20, 'headche', '17304', '1234', 'antibiotic'),
(105, 3, 'islam', 3045685358, 'islam@gmail.com', 'M', 'lahore', 21, 'fever', '17305', '1234', 'lorin'),
(106, 2, 'mussa', 248823632, 'musi@gmail.com', 'M', 'peshawar', 19, 'headche', '17306', '1234', 'ghi'),
(108, 1, 'ramsha', 1266556, 'ra@gmail.com', 'f', 'peshawar', 0, 'headche', '17390', '1234', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`D_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`P_ID`),
  ADD KEY `D_id` (`D_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`D_id`) REFERENCES `doctors` (`D_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
