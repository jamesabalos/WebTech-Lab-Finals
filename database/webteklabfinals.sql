-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2017 at 12:31 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webteklabfinals`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookid` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `status` enum('Done','Ongoing') NOT NULL,
  `address` varchar(30) NOT NULL,
  `reqid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `convo`
--

CREATE TABLE `convo` (
  `coid` int(10) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `sender` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `home_owner`
--

CREATE TABLE `home_owner` (
  `hoid` int(10) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(30) NOT NULL,
  `birthdate` int(35) NOT NULL,
  `address` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `cp_no` int(20) NOT NULL,
  `tel_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `ho_service`
--

CREATE TABLE `ho_service` (
  `servid` int(10) NOT NULL,
  `hoid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payId` int(10) UNSIGNED NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `payDate` date NOT NULL,
  `bookid` int(11) NOT NULL,
  `hoid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `request`
--

CREATE TABLE `request` (
  `reqid` int(10) NOT NULL,
  `reqdate` date NOT NULL,
  `reqtime` time NOT NULL,
  `reqstatus` enum('Accepted','Pending','Rejected') NOT NULL,
  `hoid` int(10) NOT NULL,
  `spid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `servid` int(10) NOT NULL,
  `servtype` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `spid` int(10) NOT NULL,
  `email` varchar(30) NOT NULL,
  `gender` enum('F','M') NOT NULL,
  `password` varchar(100) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `company_name` varchar(45) NOT NULL,
  `birthdate` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `cp_no` int(20) NOT NULL,
  `tel_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sp_service`
--

CREATE TABLE `sp_service` (
  `servid` int(10) NOT NULL,
  `spid` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `visId` int(10) NOT NULL,
  `visDate` date NOT NULL,
  `visTime` time(6) NOT NULL,
  `reason` varchar(1000) NOT NULL,
  `visStatus` enum('Done','Ongoin') NOT NULL,
  `bookid` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookid`),
  ADD UNIQUE KEY `bookid_UNIQUE` (`bookid`),
  ADD KEY `reqID_idx` (`reqid`);

--
-- Indexes for table `convo`
--
ALTER TABLE `convo`
  ADD PRIMARY KEY (`coid`),
  ADD UNIQUE KEY `coid_UNIQUE` (`coid`);

--
-- Indexes for table `home_owner`
--
ALTER TABLE `home_owner`
  ADD PRIMARY KEY (`hoid`),
  ADD UNIQUE KEY `hoid_UNIQUE` (`hoid`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `ho_service`
--
ALTER TABLE `ho_service`
  ADD KEY `hoID_idx` (`hoid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payId`),
  ADD KEY `bookid_idx` (`bookid`),
  ADD KEY `hoid_idx` (`hoid`);

--
-- Indexes for table `request`
--
ALTER TABLE `request`
  ADD PRIMARY KEY (`reqid`),
  ADD UNIQUE KEY `reqid_UNIQUE` (`reqid`),
  ADD KEY `ho_id_idx` (`hoid`),
  ADD KEY `sp_id_idx` (`spid`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`servid`),
  ADD UNIQUE KEY `servid_UNIQUE` (`servid`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`spid`),
  ADD UNIQUE KEY `spid_UNIQUE` (`spid`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- Indexes for table `sp_service`
--
ALTER TABLE `sp_service`
  ADD KEY `spID_idx` (`spid`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visId`),
  ADD UNIQUE KEY `visId_UNIQUE` (`visId`),
  ADD KEY `bookid_idx` (`bookid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `home_owner`
--
ALTER TABLE `home_owner`
  MODIFY `hoid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payId` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `request`
--
ALTER TABLE `request`
  MODIFY `reqid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `servid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `spid` int(10) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `reqID` FOREIGN KEY (`reqid`) REFERENCES `request` (`reqid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ho_service`
--
ALTER TABLE `ho_service`
  ADD CONSTRAINT `hoID` FOREIGN KEY (`hoid`) REFERENCES `home_owner` (`hoid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `request`
--
ALTER TABLE `request`
  ADD CONSTRAINT `ho_id` FOREIGN KEY (`hoid`) REFERENCES `home_owner` (`hoid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `sp_id` FOREIGN KEY (`spid`) REFERENCES `service_provider` (`spid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sp_service`
--
ALTER TABLE `sp_service`
  ADD CONSTRAINT `spID` FOREIGN KEY (`spid`) REFERENCES `service_provider` (`spid`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
