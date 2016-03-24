-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 15, 2015 at 11:20 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ZooDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `Animals`
--

CREATE TABLE `Animals` (
  `Cage_No` int(11) NOT NULL,
  `Animal_ID` varchar(6) NOT NULL,
  `Animal_Nick` varchar(30) NOT NULL,
  `Gender` varchar(1) NOT NULL,
  `Animal_ClassID` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Animals`
--

INSERT INTO `Animals` (`Cage_No`, `Animal_ID`, `Animal_Nick`, `Gender`, `Animal_ClassID`) VALUES
(2, '001CNN', 'Browny  The Dog', 'M', 'CNN001'),
(7, '001DLP', 'Manny The Dolphin', 'M', 'DLP001'),
(6, '001EGL', 'Lawin The Eagle', 'M', 'EGL001'),
(4, '001GRF', 'Arthur The Giraffe', 'M', 'GRF001'),
(5, '001KPT', 'Whitney The Dove', 'F', 'DOV001'),
(1, '001LIO', 'Leo The Lion', 'M', 'LIO001'),
(3, '001MKY', 'Berta The Monkey', 'F', 'MKY001'),
(8, '001SRK', 'Sharky The Shark', 'M', 'SRK001');

-- --------------------------------------------------------

--
-- Table structure for table `Animal_Class`
--

CREATE TABLE `Animal_Class` (
  `Animal_ClassID` varchar(6) NOT NULL,
  `Family_Name` varchar(30) NOT NULL,
  `Species_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Animal_Class`
--

INSERT INTO `Animal_Class` (`Animal_ClassID`, `Family_Name`, `Species_Name`) VALUES
('CNN001', 'Dog', 'Domesticated Bulldog'),
('DLP001', 'Dolphin', 'Blowhole Dolphin'),
('DOV001', 'Dove', 'Philippine White Dove'),
('EGL001', 'Eagle', 'Philippine Eagle'),
('GRF001', 'Giraffe', 'Extra-Legged Giraffe'),
('LIO001', 'Lion', 'Golden Lion'),
('MKY001', 'Monkey', 'Philippine Brown Monkey'),
('SRK001', 'Shark', 'Great White Shark');

-- --------------------------------------------------------

--
-- Table structure for table `Cage`
--

CREATE TABLE `Cage` (
  `Station_ID` varchar(30) NOT NULL,
  `Cage_No` int(11) NOT NULL,
  `Cage_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Cage`
--

INSERT INTO `Cage` (`Station_ID`, `Cage_No`, `Cage_Type`) VALUES
('TER001', 1, 'Lion''s Den'),
('TER001', 2, 'Dog Cage'),
('JNG001', 3, 'Extra Swing Set Cage'),
('JNG001', 4, 'High Gate Cage'),
('AVR001', 5, 'Dove Lane'),
('AVR001', 6, 'Eagle Farm'),
('AQU001', 7, 'Dolphin Tank'),
('AQU001', 8, 'Shark Tank X2'),
('JNG001', 9, 'Jungle Maternity Ward'),
('AQU001', 10, 'Bangus Net');

-- --------------------------------------------------------

--
-- Table structure for table `Shift_Assignment`
--

CREATE TABLE `Shift_Assignment` (
  `Shift_ID` int(11) NOT NULL,
  `Staff_ID` varchar(6) NOT NULL,
  `Station_ID` varchar(6) NOT NULL,
  `StartTime` int(11) NOT NULL,
  `EndTime` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Shift_Assignment`
--

INSERT INTO `Shift_Assignment` (`Shift_ID`, `Staff_ID`, `Station_ID`, `StartTime`, `EndTime`) VALUES
(1, 'SCH001', 'AQU001', 600, 1200),
(2, 'SMG001', 'AQU001', 600, 1200),
(3, 'SVT001', 'AQU001', 600, 1200),
(4, 'SCT001', 'AQU001', 600, 1200),
(5, 'SCH001', 'AQU001', 1200, 1800),
(6, 'SMG001', 'AQU001', 1200, 1800),
(7, 'SVT001', 'AQU001', 1200, 1800),
(8, 'SCT001', 'AQU001', 1200, 1800),
(9, 'SCH002', 'AVR001', 600, 1200),
(10, 'SMG002', 'AVR001', 600, 1200),
(11, 'SVT002', 'AVR001', 600, 1200),
(12, 'SCT002', 'AVR001', 600, 1200),
(13, 'SCH002', 'AVR001', 1200, 1800),
(14, 'SMG002', 'AVR001', 1200, 1800),
(15, 'SVT002', 'AVR001', 1200, 1800),
(16, 'SCT002', 'AVR001', 1200, 1800),
(17, 'SCH003', 'JNG001', 600, 1200),
(18, 'SMG003', 'JNG001', 600, 1200),
(19, 'SVT003', 'JNG001', 600, 1200),
(20, 'SCT003', 'JNG001', 600, 1200),
(21, 'SCH003', 'JNG001', 1200, 1800),
(22, 'SMG003', 'JNG001', 1200, 1800),
(23, 'SVT003', 'JNG001', 1200, 1800),
(24, 'SCT003', 'JNG001', 1200, 1800),
(25, 'SCH004', 'TER001', 600, 1200),
(26, 'SMG004', 'TER001', 600, 1200),
(27, 'SVT004', 'TER001', 600, 1200),
(28, 'SCT004', 'TER001', 600, 1200),
(29, 'SCH004', 'TER001', 1200, 1800),
(30, 'SMG004', 'TER001', 1200, 1800),
(31, 'SVT004', 'TER001', 1200, 1800),
(32, 'SCT004', 'TER001', 1200, 1800),
(33, 'SCT004', 'AQU001', 730, 1900);

-- --------------------------------------------------------

--
-- Table structure for table `Staff`
--

CREATE TABLE `Staff` (
  `Staff_ID` varchar(6) NOT NULL,
  `Staff_Name` varchar(30) NOT NULL,
  `Staff_Type` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Staff`
--

INSERT INTO `Staff` (`Staff_ID`, `Staff_Name`, `Staff_Type`) VALUES
('SCH001', 'Dave Consejo', 'Cashier'),
('SCH002', 'Lana Sendo', 'Cashier'),
('SCH003', 'Lissandra Tores', 'Cashier'),
('SCH004', 'Macy Solomon', 'Cashier'),
('SCT001', 'Mary Calamba', 'Caretaker'),
('SCT002', 'Amigo Perez', 'Caretaker'),
('SCT003', 'Ness Calamay', 'Caretaker'),
('SCT004', 'Viktor Lazer', 'Caretaker'),
('SMG001', 'Joshua Diko', 'Manager'),
('SMG002', 'Elliot Campos', 'Manager'),
('SMG003', 'Grace Uy', 'Manager'),
('SMG004', 'Darius Aquino', 'Manager'),
('SVT001', 'Jane Malacca', 'Veterinarian'),
('SVT002', 'X Davide', 'Veterinarian'),
('SVT003', 'Jane Choi', 'Veterinarian'),
('SVT004', 'Teemo Daquis', 'Veterinarian');

-- --------------------------------------------------------

--
-- Table structure for table `Station`
--

CREATE TABLE `Station` (
  `Station_ID` varchar(6) NOT NULL,
  `Station_Name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Station`
--

INSERT INTO `Station` (`Station_ID`, `Station_Name`) VALUES
('AQU001', 'Sea Water Park'),
('AVR001', 'Aviary Center'),
('JNG001', 'Jungle EcoPark'),
('TER001', 'Terra Station');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Animals`
--
ALTER TABLE `Animals`
  ADD PRIMARY KEY (`Animal_ID`),
  ADD KEY `Animal_ClassID` (`Animal_ClassID`),
  ADD KEY `Cage_No` (`Cage_No`);

--
-- Indexes for table `Animal_Class`
--
ALTER TABLE `Animal_Class`
  ADD PRIMARY KEY (`Animal_ClassID`) USING BTREE,
  ADD UNIQUE KEY `Animal_ClassID` (`Animal_ClassID`);

--
-- Indexes for table `Cage`
--
ALTER TABLE `Cage`
  ADD PRIMARY KEY (`Cage_No`),
  ADD KEY `Station_ID` (`Station_ID`);

--
-- Indexes for table `Shift_Assignment`
--
ALTER TABLE `Shift_Assignment`
  ADD PRIMARY KEY (`Shift_ID`),
  ADD KEY `Staff_ID` (`Staff_ID`),
  ADD KEY `Station_ID` (`Station_ID`);

--
-- Indexes for table `Staff`
--
ALTER TABLE `Staff`
  ADD PRIMARY KEY (`Staff_ID`);

--
-- Indexes for table `Station`
--
ALTER TABLE `Station`
  ADD PRIMARY KEY (`Station_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Cage`
--
ALTER TABLE `Cage`
  MODIFY `Cage_No` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `Shift_Assignment`
--
ALTER TABLE `Shift_Assignment`
  MODIFY `Shift_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `Animals`
--
ALTER TABLE `Animals`
  ADD CONSTRAINT `Animals_ibfk_1` FOREIGN KEY (`Animal_ClassID`) REFERENCES `Animal_Class` (`Animal_ClassID`),
  ADD CONSTRAINT `Animals_ibfk_2` FOREIGN KEY (`Cage_No`) REFERENCES `Cage` (`Cage_No`),
  ADD CONSTRAINT `Animals_ibfk_3` FOREIGN KEY (`Animal_ClassID`) REFERENCES `Animal_Class` (`Animal_ClassID`),
  ADD CONSTRAINT `Animals_ibfk_4` FOREIGN KEY (`Cage_No`) REFERENCES `Cage` (`Cage_No`);

--
-- Constraints for table `Cage`
--
ALTER TABLE `Cage`
  ADD CONSTRAINT `Cage_ibfk_1` FOREIGN KEY (`Station_ID`) REFERENCES `Station` (`Station_ID`),
  ADD CONSTRAINT `Cage_ibfk_2` FOREIGN KEY (`Station_ID`) REFERENCES `Station` (`Station_ID`);

--
-- Constraints for table `Shift_Assignment`
--
ALTER TABLE `Shift_Assignment`
  ADD CONSTRAINT `Shift_Assignment_ibfk_1` FOREIGN KEY (`Staff_ID`) REFERENCES `Staff` (`Staff_ID`),
  ADD CONSTRAINT `Shift_Assignment_ibfk_2` FOREIGN KEY (`Staff_ID`) REFERENCES `Staff` (`Staff_ID`),
  ADD CONSTRAINT `Shift_Assignment_ibfk_3` FOREIGN KEY (`Station_ID`) REFERENCES `Station` (`Station_ID`),
  ADD CONSTRAINT `Shift_Assignment_ibfk_4` FOREIGN KEY (`Station_ID`) REFERENCES `Station` (`Station_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
