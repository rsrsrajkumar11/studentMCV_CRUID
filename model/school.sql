-- phpMyAdmin SQL Dump
-- version 4.4.15.10
-- https://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 07, 2019 at 04:30 PM
-- Server version: 5.6.43
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school`
-- Custom code by rajkumar

create database school;
use school;
-- --------------------------------------------------------

--
-- Table structure for table `student`
--


CREATE TABLE IF NOT EXISTS `student` (
  `rollno` int(3) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `marks` int(3) DEFAULT NULL,
  `deleteFlg` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`rollno`, `name`, `marks`, `deleteFlg`) VALUES
(23, 'SAYALI', 90, 0),
(123, 'RAJKUMARS', 100, 0),
(127, 'HHH', 78, 1),
(129, 'TTT', 84, 1),
(222, 'KKK', 67, 1),
(333, 'INDRA', 59, 1),
(444, 'TTT', 90, 1),
(445, 'RAJ', 67, 0),
(555, 'LLL', 45, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`rollno`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
