-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2024 at 12:55 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schoolmanagementci`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `pendingfees` int(100) NOT NULL,
  `joindate` date NOT NULL,
  `status` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `fname`, `email`, `password`, `category`, `class`, `dob`, `pendingfees`, `joindate`, `status`) VALUES
(1, 'Payel', 'Jahar', 'payel@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'School', '8th', '2024-01-02', 2000, '2024-01-20', 1),
(3, 'Riya', 'ABC', 'r@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'technology', '10th', '2024-01-03', 4000, '2024-01-20', 1),
(4, 'disha', 'abcd', 'disha1@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Games', '8th', '2024-01-04', 30000, '2024-01-20', 1),
(5, 'payel b', 'j', 'p2@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 'Games', '10th', '2024-01-01', 1000, '2024-01-03', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
