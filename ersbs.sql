-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2019 at 11:32 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ersbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryid` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `collegecourse`
--

CREATE TABLE `collegecourse` (
  `collegecourseid` int(11) NOT NULL,
  `collegecourse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `collegecourse`
--

INSERT INTO `collegecourse` (`collegecourseid`, `collegecourse`) VALUES
(8, 'Animation'),
(10, 'Fashion Design and Technology'),
(5, 'Financial Management'),
(2, 'Game Development'),
(4, 'Marketing and Advertising Management'),
(9, 'Multimedia Arts and Design'),
(7, 'Psychology'),
(6, 'Real Estate Mangement'),
(1, 'Software Engineering'),
(3, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `commentid` int(11) NOT NULL,
  `comments` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `courseid` int(11) NOT NULL,
  `collegecourseid` int(11) NOT NULL,
  `shscourseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `eventID` int(11) NOT NULL,
  `eventCategory` varchar(30) NOT NULL,
  `eventName` varchar(40) NOT NULL,
  `eventInformation` varchar(250) NOT NULL,
  `organizerName` varchar(30) NOT NULL,
  `venue` varchar(50) NOT NULL,
  `objectives` longtext NOT NULL,
  `competitionStructure` varchar(30) NOT NULL,
  `estAttendees` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `endDate` date NOT NULL,
  `endTime` time NOT NULL,
  `sourceFunding` varchar(255) NOT NULL,
  `actTitle` varchar(255) NOT NULL,
  `amount` double NOT NULL,
  `totalFunding` double NOT NULL,
  `itemPart` varchar(255) NOT NULL,
  `itemQty` double NOT NULL,
  `itemAmount` double NOT NULL,
  `totalExpense` double NOT NULL,
  `matQty` double NOT NULL,
  `materials` varchar(255) NOT NULL,
  `actionPlan` varchar(255) NOT NULL,
  `programAct` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `posterText` text NOT NULL,
  `created` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`eventID`, `eventCategory`, `eventName`, `eventInformation`, `organizerName`, `venue`, `objectives`, `competitionStructure`, `estAttendees`, `startDate`, `startTime`, `endDate`, `endTime`, `sourceFunding`, `actTitle`, `amount`, `totalFunding`, `itemPart`, `itemQty`, `itemAmount`, `totalExpense`, `matQty`, `materials`, `actionPlan`, `programAct`, `poster`, `posterText`, `created`) VALUES
(23, 'Workshops', '1', '1', '201606', '1', 'Array', 'roundRobin', 1, '2019-04-18', '01:01:00', '2019-04-20', '01:01:00', '1', '1', 1, 1, '1', 1, 1, 1, 1, '1', '1', 'Sample lang', '', '', '2019-04-18 15:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `fileid` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shscourse`
--

CREATE TABLE `shscourse` (
  `shscourseid` int(11) NOT NULL,
  `shscourse` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shscourse`
--

INSERT INTO `shscourse` (`shscourseid`, `shscourse`) VALUES
(1, 'Accountancy Business and Management'),
(4, 'Animation'),
(8, 'Audio Production'),
(5, 'Fashion Design'),
(6, 'Graphic Illustration'),
(2, 'Humanities and Social Science'),
(7, 'Media and Visual Arts'),
(9, 'Robotics'),
(3, 'Software Development');

-- --------------------------------------------------------

--
-- Table structure for table `strand`
--

CREATE TABLE `strand` (
  `strandid` int(11) NOT NULL,
  `strand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `strand`
--

INSERT INTO `strand` (`strandid`, `strand`) VALUES
(1, 'college'),
(2, 'shs');

-- --------------------------------------------------------

--
-- Table structure for table `structure`
--

CREATE TABLE `structure` (
  `structureid` int(11) NOT NULL,
  `structure` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `upload`
--

CREATE TABLE `upload` (
  `id` int(11) NOT NULL,
  `poster` varchar(255) NOT NULL,
  `posterText` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `idnumber` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `role`, `lastname`, `firstname`, `idnumber`, `email`, `password`, `created_at`) VALUES
(21, 'student', 'ple', 'sam', '201606', 'asd@asd.com', '$2y$10$b/fOxgN9za8loeFtX5d5GeyjKOmIUfskawxYB4EhZS9l.PrZP/0hC', '2019-04-18 14:21:23'),
(22, 'professor', 'le', 'sa', '201607', 'dsa@dsa.com', '$2y$10$Izy/bg5hkmsc0k17tZLr1OvzUq/aBeOmLgNMrvAf7PKV6wbo2RSOq', '2019-04-18 14:21:46');

-- --------------------------------------------------------

--
-- Table structure for table `yearlevel`
--

CREATE TABLE `yearlevel` (
  `yearlevelid` int(11) NOT NULL,
  `yearlevel` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `yearlevel`
--

INSERT INTO `yearlevel` (`yearlevelid`, `yearlevel`) VALUES
(1, '1st'),
(2, '2nd'),
(3, '3rd'),
(4, '4th');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryid`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `collegecourse`
--
ALTER TABLE `collegecourse`
  ADD PRIMARY KEY (`collegecourseid`),
  ADD UNIQUE KEY `collegecourse` (`collegecourse`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`commentid`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`courseid`),
  ADD KEY `collegecourseid` (`collegecourseid`),
  ADD KEY `shscourseid` (`shscourseid`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`eventID`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`fileid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `shscourse`
--
ALTER TABLE `shscourse`
  ADD PRIMARY KEY (`shscourseid`),
  ADD UNIQUE KEY `shscourse` (`shscourse`);

--
-- Indexes for table `strand`
--
ALTER TABLE `strand`
  ADD PRIMARY KEY (`strandid`),
  ADD UNIQUE KEY `strand` (`strand`);

--
-- Indexes for table `structure`
--
ALTER TABLE `structure`
  ADD PRIMARY KEY (`structureid`),
  ADD UNIQUE KEY `structure` (`structure`);

--
-- Indexes for table `upload`
--
ALTER TABLE `upload`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `username` (`idnumber`);

--
-- Indexes for table `yearlevel`
--
ALTER TABLE `yearlevel`
  ADD PRIMARY KEY (`yearlevelid`),
  ADD UNIQUE KEY `yearlevel` (`yearlevel`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `collegecourse`
--
ALTER TABLE `collegecourse`
  MODIFY `collegecourseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `commentid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `courseid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `eventID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `fileid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shscourse`
--
ALTER TABLE `shscourse`
  MODIFY `shscourseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `strand`
--
ALTER TABLE `strand`
  MODIFY `strandid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `structure`
--
ALTER TABLE `structure`
  MODIFY `structureid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `upload`
--
ALTER TABLE `upload`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `yearlevel`
--
ALTER TABLE `yearlevel`
  MODIFY `yearlevelid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`collegecourseid`) REFERENCES `collegecourse` (`collegecourseid`),
  ADD CONSTRAINT `course_ibfk_2` FOREIGN KEY (`shscourseid`) REFERENCES `shscourse` (`shscourseid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
