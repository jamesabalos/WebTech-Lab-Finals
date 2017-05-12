-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2017 at 04:24 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `home_owner`
--

-- --------------------------------------------------------

--
-- Table structure for table `home_owner`
--

CREATE TABLE `home_owner` (
  `hoID` int(20) NOT NULL,
  `last_name` varchar(45) NOT NULL,
  `first_name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `birthdate` varchar(45) NOT NULL,
  `address` varchar(45) NOT NULL,
  `address2` varchar(45) DEFAULT NULL,
  `gender` enum('f','m') NOT NULL,
  `cp_no` int(12) NOT NULL,
  `tel_no` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `home_owner`
--

INSERT INTO `home_owner` (`hoID`, `last_name`, `first_name`, `password`, `email`, `birthdate`, `address`, `address2`, `gender`, `cp_no`, `tel_no`) VALUES
(11, 'Samson ', 'Sean Eric ', '202cb962ac59075b964b07152d234b70', 'sea@gmail.com', '123', '132', '132', 'm', 123, 123),
(12, 'Samson', 'sean', '202cb962ac59075b964b07152d234b70', 'sam@gmail.com', '123', '123', '123', 'm', 123, 123);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `home_owner`
--
ALTER TABLE `home_owner`
  ADD PRIMARY KEY (`hoID`),
  ADD UNIQUE KEY `hoID_UNIQUE` (`hoID`),
  ADD KEY `hoID` (`hoID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `home_owner`
--
ALTER TABLE `home_owner`
  MODIFY `hoID` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
