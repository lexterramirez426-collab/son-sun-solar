-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2026 at 08:06 AM
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
-- Database: `son_sun_solar`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `time_in` datetime NOT NULL,
  `latitude` decimal(10,7) NOT NULL,
  `longitude` decimal(10,7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `employee_id`, `time_in`, `latitude`, `longitude`) VALUES
(1, 1, '2026-10-07 07:04:48', 0.0000000, 0.0000000),
(2, 1, '2026-10-07 07:09:11', 14.5995000, 121.1078000),
(3, 1, '2026-10-07 07:12:23', 14.5995000, 121.1078000),
(4, 1, '2026-10-07 07:12:24', 14.5995000, 121.1078000),
(5, 1, '2026-10-07 07:12:28', 14.5995000, 121.1078000),
(6, 1, '2026-10-07 07:13:33', 14.5995000, 121.1078000),
(7, 1, '2026-10-07 07:14:13', 14.5995000, 121.1078000),
(8, 1, '2026-10-07 07:14:15', 14.5995000, 121.1078000),
(9, 1, '2026-10-07 07:14:17', 14.5995000, 121.1078000),
(10, 1, '2026-10-07 07:14:18', 14.5995000, 121.1078000),
(11, 1, '2026-10-07 07:14:27', 14.5995000, 121.1078000),
(12, 1, '2026-10-07 07:16:43', 14.5995000, 121.1078000),
(13, 1, '2026-10-07 07:16:45', 14.5995000, 121.1078000),
(14, 1, '2026-10-07 07:16:49', 14.5995000, 121.1078000),
(15, 1, '2026-10-07 07:16:50', 14.5995000, 121.1078000),
(16, 1, '2026-10-07 07:17:14', 14.5995000, 121.1078000),
(17, 1, '2026-10-07 07:17:16', 14.5995000, 121.1078000),
(18, 1, '2026-10-07 07:17:17', 14.5995000, 121.1078000),
(19, 1, '2026-10-07 07:17:17', 14.5995000, 121.1078000),
(20, 1, '2026-10-07 07:17:17', 14.5995000, 121.1078000),
(21, 1, '2026-10-07 07:17:18', 14.5995000, 121.1078000),
(22, 1, '2026-10-07 07:17:18', 14.5995000, 121.1078000),
(23, 1, '2026-10-07 07:17:19', 14.5995000, 121.1078000),
(24, 1, '2026-10-07 07:17:38', 14.5995000, 121.1078000),
(25, 1, '2026-10-07 07:18:09', 14.5995000, 121.1078000),
(26, 1, '2026-10-07 07:18:11', 14.5995000, 121.1078000),
(27, 1, '2026-10-07 07:18:12', 14.5995000, 121.1078000),
(28, 1, '2026-10-07 07:18:15', 14.5995000, 121.1078000),
(29, 1, '2026-10-07 07:18:16', 14.5995000, 121.1078000),
(30, 1, '2026-10-07 07:18:16', 14.5995000, 121.1078000),
(31, 3, '2026-10-07 14:02:27', 14.5995000, 121.1078000),
(32, 2, '2026-10-07 14:04:23', 14.5995000, 121.1078000);

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `mname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `department` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`employee_id`, `fname`, `mname`, `lname`, `birthday`, `gender`, `email`, `phone_number`, `address`, `department`) VALUES
(1, 'juan', 'dela', 'cruz', '2026-10-15', 'Male', 'juan123@gmail.com', '09956492222', 'Pasig City', 'IT'),
(2, 'Test', 'Employee', 'User', '2026-10-15', 'Male', 'Test@gmail.com', '12345678901', 'Kenneth', 'Technician'),
(3, 'Lexter', 'B', 'Ramirez', '2009-10-20', 'Male', 'lexterpogi@gmail.com', '09951234566', 'Pasig City', 'IT');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `employee_id`, `username`, `password`, `role`) VALUES
(1, 1, 'Admin', '$2y$10$rfZO4kj3olI0v7SSfYXCJeR7569SpZJ.YmDQe5eh1S45XQSc4ufZG', 'Admin'),
(2, 2, 'employee_test', '$2y$10$ERQyf6I0GeLwTOAYBijsaOKSu0zdc.Dixyf1RhxJorr6KIPhD5/Si', 'Employee'),
(3, 3, 'D4ffo', '$2y$10$uLfoiPgvSe5YmxyTCWN8t.YqP3AaP0SPK5e3U/nYHZEo8xoPuUWeq', 'Employee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `employee_id` (`employee_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`employee_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
