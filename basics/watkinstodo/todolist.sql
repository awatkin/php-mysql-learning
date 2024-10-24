-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2024 at 01:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `todolist`
--
CREATE DATABASE IF NOT EXISTS `todolist` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `todolist`;

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

CREATE TABLE `audit` (
  `auditid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `date` int(11) NOT NULL,
  `activity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`auditid`, `userid`, `date`, `activity`) VALUES
(1, 1, 1729597042, 'flog'),
(2, 1, 1729597343, 'log'),
(3, 1, 1729597634, 'flog'),
(4, 1, 1729598937, 'flog'),
(5, 1, 1729598952, 'log'),
(6, 1, 1729676447, 'log'),
(7, 1, 1729676455, 'cli'),
(8, 1, 1729677980, 'log'),
(9, 1, 1729677987, 'cli'),
(10, 1, 1729684573, 'log'),
(11, 1, 1729684585, 'cli'),
(12, 1, 1729687046, 'log'),
(13, 1, 1729687055, 'cli'),
(14, 1, 1729687152, 'fta'),
(15, 1, 1729687271, 'log'),
(16, 1, 1729687274, 'cli'),
(17, 1, 1729687285, 'fta'),
(18, 1, 1729687381, 'fta'),
(19, 3, 1729687496, 'log'),
(20, 3, 1729687501, 'cli'),
(21, 3, 1729687507, 'fta'),
(22, 3, 1729687557, 'fta'),
(23, 3, 1729687825, 'fta'),
(24, 3, 1729687847, 'log'),
(25, 3, 1729687856, 'cli'),
(26, 3, 1729687861, 'cta'),
(27, 3, 1729691483, 'log'),
(28, 3, 1729691642, 'log'),
(29, 3, 1729692929, 'log'),
(30, 3, 1729693723, 'log'),
(31, 3, 1729693865, 'log'),
(32, 3, 1729694014, 'log'),
(33, 3, 1729694273, 'log'),
(34, 3, 1729694442, 'log'),
(35, 3, 1729694914, 'log'),
(36, 3, 1729695008, 'log'),
(37, 3, 1729695072, 'log'),
(38, 3, 1729695385, 'log'),
(39, 3, 1729695959, 'log'),
(40, 3, 1729696027, 'log'),
(41, 4, 1729756379, 'log'),
(42, 4, 1729756387, 'cli'),
(43, 4, 1729756404, 'cta'),
(44, 4, 1729756456, 'log'),
(45, 4, 1729756508, 'log'),
(46, 4, 1729757237, 'log'),
(47, 4, 1729757244, 'cta'),
(48, 4, 1729757328, 'cta'),
(49, 4, 1729757335, 'cta'),
(50, 4, 1729757438, 'log'),
(51, 4, 1729757532, 'log'),
(52, 4, 1729757627, 'log'),
(53, 4, 1729757784, 'log'),
(54, 4, 1729758023, 'log'),
(55, 4, 1729758355, 'log'),
(56, 4, 1729758692, 'log'),
(57, 4, 1729759027, 'log'),
(58, 4, 1729759235, 'log'),
(59, 4, 1729759290, 'log'),
(60, 4, 1729759353, 'log'),
(61, 4, 1729759634, 'log'),
(62, 4, 1729760857, 'log'),
(63, 4, 1729760898, 'log'),
(64, 4, 1729761045, 'log'),
(65, 4, 1729761332, 'log'),
(66, 4, 1729761338, 'cta'),
(67, 4, 1729761445, 'log');

-- --------------------------------------------------------

--
-- Table structure for table `lists`
--

CREATE TABLE `lists` (
  `listid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `listname` text NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lists`
--

INSERT INTO `lists` (`listid`, `userid`, `listname`, `date`) VALUES
(1, 1, 'Freddy', 1729676455),
(2, 1, 'Albert', 1729677987),
(3, 1, 'happy', 1729684585),
(4, 1, 'hghgh', 1729687055),
(5, 1, 'ecwec', 1729687274),
(7, 3, 'ecwecwef', 1729687856);

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `taskid` int(11) NOT NULL,
  `listid` int(11) NOT NULL,
  `task` text NOT NULL,
  `complete` text NOT NULL,
  `date` int(11) NOT NULL,
  `duedate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `fname` text NOT NULL,
  `sname` text NOT NULL,
  `email` text NOT NULL,
  `signup` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `fname`, `sname`, `email`, `signup`) VALUES
(1, 'adamski', '$2y$10$X550KntgFiugc99xS71Zz.1JPKbyQIH0L3h37LizrTqoEk1lZFjVK', 'Adam', 'Adams', 'a@g.c', 1729588727),
(2, 'adamsk', '$2y$10$qJeQaCYNhFAVRoEq0xukiurel2wP42bzcK.afXSSrMRIDwIfkDfEq', 'Adam', 'Watkin', 't@b.v', 1729589082),
(3, 'adam', '$2y$10$HBDqKY7p5TQRhQalKvGe8uHNASTcP13J7um3.Pq53VCl5mTTINmya', 'asd', 'dsf', 'ef', 1729687483),
(4, 'adam5', '$2y$10$fIlP5RjeJCPIoLqfwtgB1Ow8n/RVrtfYJmfvWLzo2/L7BV/Zf4l4i', 'adam5', 'watk', 'ewkwe', 1729756360);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audit`
--
ALTER TABLE `audit`
  ADD PRIMARY KEY (`auditid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `lists`
--
ALTER TABLE `lists`
  ADD PRIMARY KEY (`listid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`taskid`),
  ADD KEY `listid` (`listid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audit`
--
ALTER TABLE `audit`
  MODIFY `auditid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `lists`
--
ALTER TABLE `lists`
  MODIFY `listid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `taskid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `audit`
--
ALTER TABLE `audit`
  ADD CONSTRAINT `audit_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lists`
--
ALTER TABLE `lists`
  ADD CONSTRAINT `lists_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `user` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tasks`
--
ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`listid`) REFERENCES `lists` (`listid`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
