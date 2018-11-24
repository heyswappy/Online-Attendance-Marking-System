-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2018 at 05:06 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `attendance`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`id`, `name`, `pass`) VALUES
(0, 'root', 'root'),
(7, 'bond', 'default'),
(54, 'another', 'default');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `log` date DEFAULT NULL,
  `sid` int(11) DEFAULT NULL,
  `fid` int(11) DEFAULT NULL,
  `cid` varchar(10) DEFAULT NULL,
  `stat` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`log`, `sid`, `fid`, `cid`, `stat`) VALUES
('2018-11-21', 13, 1, '5', 0),
('2018-11-21', 14, 1, '5', 0),
('2018-11-21', 15, 1, '5', 0),
('2018-11-21', 16, 1, '5', 0),
('2018-11-21', 1, 1, '2', 1),
('2018-11-21', 2, 1, '2', 0),
('2018-11-21', 3, 1, '2', 0),
('2018-11-21', 4, 1, '2', 0),
('2018-11-22', 1, 1, '2', 0),
('2018-11-22', 2, 1, '2', 0),
('2018-11-22', 3, 1, '2', 0),
('2018-11-22', 4, 1, '2', 0),
('2018-11-02', 13, 1, '5', 0),
('2018-11-02', 14, 1, '5', 0),
('2018-11-02', 15, 1, '5', 0),
('2018-11-02', 16, 1, '5', 0),
('2018-11-24', 5, 3, '1', 0),
('2018-11-24', 6, 3, '1', 0),
('2018-11-24', 7, 3, '1', 0),
('2018-11-24', 8, 3, '1', 0),
('2018-11-24', 1, 3, '1', 0),
('2018-11-24', 2, 3, '1', 0),
('2018-11-24', 3, 3, '1', 0),
('2018-11-24', 4, 3, '1', 0),
('2018-11-24', 3237, 3, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batch` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batch`) VALUES
('B3'),
('B4'),
('B5'),
('B6');

-- --------------------------------------------------------

--
-- Table structure for table `classfac`
--

CREATE TABLE `classfac` (
  `batch` varchar(4) NOT NULL,
  `sub1` int(11) DEFAULT NULL,
  `sub2` int(11) DEFAULT NULL,
  `sub3` int(11) DEFAULT NULL,
  `sub4` int(11) DEFAULT NULL,
  `sub5` int(11) DEFAULT NULL,
  `sub6` int(11) DEFAULT NULL,
  `sub7` int(11) DEFAULT NULL,
  `sub8` int(11) DEFAULT NULL,
  `sub9` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classfac`
--

INSERT INTO `classfac` (`batch`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`) VALUES
('B3', 8, 2, 9, 1, 0, 0, 0, 0, 0),
('B4', 8, 2, 9, 6, 0, 0, 0, 0, 0),
('B5', 3, 1, 9, 4, 0, 0, 0, 0, 0),
('B6', 3, 1, 2, 6, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `classsub`
--

CREATE TABLE `classsub` (
  `batch` varchar(4) NOT NULL,
  `sub1` varchar(10) DEFAULT NULL,
  `sub2` varchar(10) DEFAULT NULL,
  `sub3` varchar(10) DEFAULT NULL,
  `sub4` varchar(10) DEFAULT NULL,
  `sub5` varchar(10) DEFAULT NULL,
  `sub6` varchar(10) DEFAULT NULL,
  `sub7` varchar(10) DEFAULT NULL,
  `sub8` varchar(10) DEFAULT NULL,
  `sub9` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classsub`
--

INSERT INTO `classsub` (`batch`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`) VALUES
('B3', '1', '2', '3', '5', '0', '0', '0', '0', '0'),
('B4', '1', '2', '3', '6', '0', '0', '0', '0', '0'),
('B5', '1', '2', '3', '4', '0', '0', '0', '0', '0'),
('B6', '1', '2', '5', '6', '0', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `code` varchar(10) NOT NULL,
  `name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`code`, `name`) VALUES
('0', 'DEFAULT'),
('1', 'DATABASE'),
('2', 'DATA STRUCTURE'),
('3', 'MATHS'),
('4', 'COA'),
('5', 'DEEP LEARNING'),
('6', 'SOCIAL LEGAL');

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `name`, `pass`) VALUES
(0, 'DEFAULT', 'DEFAULT'),
(1, 'TBT', 'def'),
(2, 'MKT', 'DEFAULT'),
(3, 'GURVE', 'DEFAULT'),
(4, 'PAWAN', 'DEFAULT'),
(5, 'TAJ', 'DEFAULT'),
(6, 'SWATI', 'DEFAULT'),
(7, 'BONNI', 'DEFAULT'),
(8, 'INDU', 'DEFAULT'),
(9, 'GSS', 'DEFAULT');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT NULL,
  `batch` varchar(4) DEFAULT NULL,
  `year` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `pass`, `batch`, `year`) VALUES
(1, 'SWAPNIL', 'def', 'B6', 2017),
(2, 'JASPREET', 'DEFAULT', 'B6', 2017),
(3, 'ARCHIT', 'DEFAULT', 'B6', 2017),
(4, 'HARSHAL', 'DEFAULT', 'B6', 2017),
(5, 'PRAKHAR', 'DEFAULT', 'B5', 2017),
(6, 'KRITIKA', 'DEFAULT', 'B5', 2017),
(7, 'SHUBRA', 'DEFAULT', 'B5', 2017),
(8, 'SIDDHANT', 'DEFAULT', 'B5', 2017),
(9, 'SAPTASWA', 'DEFAULT', 'B4', 2017),
(10, 'SAMIKSHA', 'DEFAULT', 'B4', 2017),
(11, 'SNEHA', 'DEFAULT', 'B4', 2017),
(12, 'GARVIT', 'DEFAULT', 'B4', 2017),
(13, 'ANUBHAV', 'DEFAULT', 'B3', 2017),
(14, 'ANSHIKA', 'DEFAULT', 'B3', 2017),
(15, 'SANCHIT', 'DEFAULT', 'B3', 2017),
(16, 'ATUL', 'DEFAULT', 'B3', 2017),
(45, 'SW', 'DEFAULT', 'B4', 2017),
(63, 'TEST2', 'DEFAULT', 'B3', 2017),
(3237, 'KETAN', 'DEFAULT', 'B6', 2017),
(123456, 'TEST', 'DEFAULT', 'B3', 2017);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD UNIQUE KEY `log` (`log`,`sid`,`fid`,`cid`),
  ADD KEY `sid` (`sid`),
  ADD KEY `fid` (`fid`),
  ADD KEY `cid` (`cid`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batch`);

--
-- Indexes for table `classfac`
--
ALTER TABLE `classfac`
  ADD PRIMARY KEY (`batch`),
  ADD KEY `sub1` (`sub1`),
  ADD KEY `sub2` (`sub2`),
  ADD KEY `sub3` (`sub3`),
  ADD KEY `sub4` (`sub4`),
  ADD KEY `sub5` (`sub5`),
  ADD KEY `sub6` (`sub6`),
  ADD KEY `sub7` (`sub7`),
  ADD KEY `sub8` (`sub8`),
  ADD KEY `sub9` (`sub9`);

--
-- Indexes for table `classsub`
--
ALTER TABLE `classsub`
  ADD PRIMARY KEY (`batch`),
  ADD KEY `sub1` (`sub1`),
  ADD KEY `sub2` (`sub2`),
  ADD KEY `sub3` (`sub3`),
  ADD KEY `sub4` (`sub4`),
  ADD KEY `sub5` (`sub5`),
  ADD KEY `sub6` (`sub6`),
  ADD KEY `sub7` (`sub7`),
  ADD KEY `sub8` (`sub8`),
  ADD KEY `sub9` (`sub9`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`code`);

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD KEY `batch` (`batch`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`sid`) REFERENCES `student` (`id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`fid`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `attendance_ibfk_3` FOREIGN KEY (`cid`) REFERENCES `course` (`code`);

--
-- Constraints for table `classfac`
--
ALTER TABLE `classfac`
  ADD CONSTRAINT `classfac_ibfk_1` FOREIGN KEY (`sub1`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `classfac_ibfk_10` FOREIGN KEY (`batch`) REFERENCES `batch` (`batch`),
  ADD CONSTRAINT `classfac_ibfk_2` FOREIGN KEY (`sub2`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `classfac_ibfk_3` FOREIGN KEY (`sub3`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `classfac_ibfk_4` FOREIGN KEY (`sub4`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `classfac_ibfk_5` FOREIGN KEY (`sub5`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `classfac_ibfk_6` FOREIGN KEY (`sub6`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `classfac_ibfk_7` FOREIGN KEY (`sub7`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `classfac_ibfk_8` FOREIGN KEY (`sub8`) REFERENCES `faculty` (`id`),
  ADD CONSTRAINT `classfac_ibfk_9` FOREIGN KEY (`sub9`) REFERENCES `faculty` (`id`);

--
-- Constraints for table `classsub`
--
ALTER TABLE `classsub`
  ADD CONSTRAINT `classsub_ibfk_1` FOREIGN KEY (`sub1`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `classsub_ibfk_10` FOREIGN KEY (`batch`) REFERENCES `batch` (`batch`),
  ADD CONSTRAINT `classsub_ibfk_2` FOREIGN KEY (`sub2`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `classsub_ibfk_3` FOREIGN KEY (`sub3`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `classsub_ibfk_4` FOREIGN KEY (`sub4`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `classsub_ibfk_5` FOREIGN KEY (`sub5`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `classsub_ibfk_6` FOREIGN KEY (`sub6`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `classsub_ibfk_7` FOREIGN KEY (`sub7`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `classsub_ibfk_8` FOREIGN KEY (`sub8`) REFERENCES `course` (`code`),
  ADD CONSTRAINT `classsub_ibfk_9` FOREIGN KEY (`sub9`) REFERENCES `course` (`code`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`batch`) REFERENCES `batch` (`batch`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
