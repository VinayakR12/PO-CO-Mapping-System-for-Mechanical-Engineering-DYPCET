-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2024 at 04:22 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mech`
--

-- --------------------------------------------------------

--
-- Table structure for table `allocation`
--

CREATE TABLE `allocation` (
  `id` int(11) NOT NULL,
  `subject_id` varchar(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `year` int(10) NOT NULL,
  `phase` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `allocation`
--

INSERT INTO `allocation` (`id`, `subject_id`, `teacher_id`, `year`, `phase`) VALUES
(1, '1, 2', 2, 2024, 1);

-- --------------------------------------------------------

--
-- Table structure for table `average`
--

CREATE TABLE `average` (
  `id` int(10) NOT NULL,
  `PO1` int(10) NOT NULL,
  `PO2` int(10) NOT NULL,
  `PO3` int(10) NOT NULL,
  `PO4` int(10) NOT NULL,
  `PO5` int(11) NOT NULL,
  `PO6` int(11) NOT NULL,
  `PO7` int(10) NOT NULL,
  `PO8` int(10) NOT NULL,
  `PO9` int(10) NOT NULL,
  `PO10` int(10) NOT NULL,
  `PO11` int(10) NOT NULL,
  `PO12` int(10) NOT NULL,
  `PSO1` int(10) NOT NULL,
  `PSO2` int(10) NOT NULL,
  `subject_id` int(10) NOT NULL,
  `year` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `average`
--

INSERT INTO `average` (`id`, `PO1`, `PO2`, `PO3`, `PO4`, `PO5`, `PO6`, `PO7`, `PO8`, `PO9`, `PO10`, `PO11`, `PO12`, `PSO1`, `PSO2`, `subject_id`, `year`) VALUES
(2, 2, 1, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 3, 1, 2024),
(3, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 2, 2024);

-- --------------------------------------------------------

--
-- Table structure for table `co`
--

CREATE TABLE `co` (
  `id` int(10) NOT NULL,
  `co_statement` varchar(255) NOT NULL,
  `subject_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `co`
--

INSERT INTO `co` (`id`, `co_statement`, `subject_id`) VALUES
(1, 'cO1', '1'),
(2, 'co2', '1'),
(3, 'co3', '1'),
(4, 'co4', '1');

-- --------------------------------------------------------

--
-- Table structure for table `mapping`
--

CREATE TABLE `mapping` (
  `id` int(10) NOT NULL,
  `PO1` varchar(100) NOT NULL,
  `PO2` varchar(100) NOT NULL,
  `PO3` varchar(100) NOT NULL,
  `PO4` varchar(100) NOT NULL,
  `PO5` varchar(100) NOT NULL,
  `PO6` varchar(100) NOT NULL,
  `PO7` varchar(100) NOT NULL,
  `PO8` varchar(100) NOT NULL,
  `PO9` varchar(100) NOT NULL,
  `PO10` varchar(100) NOT NULL,
  `PO11` varchar(100) NOT NULL,
  `PSO1` varchar(100) NOT NULL,
  `PSO2` varchar(100) NOT NULL,
  `subject_id` varchar(10) NOT NULL,
  `year` int(10) NOT NULL,
  `PO12` varchar(10) NOT NULL,
  `co_id` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mapping`
--

INSERT INTO `mapping` (`id`, `PO1`, `PO2`, `PO3`, `PO4`, `PO5`, `PO6`, `PO7`, `PO8`, `PO9`, `PO10`, `PO11`, `PSO1`, `PSO2`, `subject_id`, `year`, `PO12`, `co_id`) VALUES
(1, '1', '1', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '1', 2024, '3', '1'),
(2, '1', '0', '0', '3', '3', '3', '0', '3', '3', '3', '3', '3', '2', '1', 2024, '3', '2'),
(3, '3', '0', '3', '3', '3', '3', '0', '3', '3', '3', '3', '3', '3', '1', 2024, '3', '3'),
(4, '0', '0', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '3', '1', 2024, '3', '4');

-- --------------------------------------------------------

--
-- Table structure for table `pos`
--

CREATE TABLE `pos` (
  `id` int(100) NOT NULL,
  `statement` varchar(255) NOT NULL,
  `subject_id` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pos`
--

INSERT INTO `pos` (`id`, `statement`, `subject_id`, `type`) VALUES
(1, 'Engineering Knowledge', '1', 'pso'),
(2, 'Engineering Knowledge 2', '2', 'pso'),
(3, 'Engineering Knowledge 3', '1', 'po');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(50) NOT NULL,
  `sessions` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `name`, `code`, `sessions`) VALUES
(1, 'Python', 'VHHJ456HH', 42),
(2, 'web development', '21cse', 23);

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `teacher_id` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `isadmin` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `profile` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`teacher_id`, `name`, `email`, `password`, `isadmin`, `code`, `profile`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$2wxGek9cZrt1SSadn5BHKOLymrWFR354VxA/NtI26.hTx9219ACA2', 1, 0, ''),
(2, 'Vivek Jadhav', 'vivek@gmail.com', '$2y$10$XGj05KeMh0HLUVjNJ7QOP.mp7l8q3fKTOai6PfdTfLOgk8xKDI85O', 1, 0, '04032024184722Snapchat-43199194.jpg'),
(3, 'Dhiraj Kadam', 'dhiraj@gmail.com', '$2y$10$.EoxbbPTGdvET5CQ4W2GQuwXmF0p0mqWkoklbk7fqsZ4UI/SWxB8C', 0, 0, '0'),
(4, 'maithili', 'maithili@gmail.com', '$2y$10$tAtDGkt22Pq4QNXkx.nREeGWbwJzaYzzu4QBJ2U63sgboTKmLdF.e', 0, 0, '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allocation`
--
ALTER TABLE `allocation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `average`
--
ALTER TABLE `average`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `co`
--
ALTER TABLE `co`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mapping`
--
ALTER TABLE `mapping`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pos`
--
ALTER TABLE `pos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allocation`
--
ALTER TABLE `allocation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `average`
--
ALTER TABLE `average`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `co`
--
ALTER TABLE `co`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mapping`
--
ALTER TABLE `mapping`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pos`
--
ALTER TABLE `pos`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `teacher_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
