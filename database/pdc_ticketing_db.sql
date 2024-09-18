-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 18, 2024 at 06:07 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdc_ticketing_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_auditlog`
--

CREATE TABLE `tbl_auditlog` (
  `id` int(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `activity` varchar(2000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `date_posted` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_auditlog`
--

INSERT INTO `tbl_auditlog` (`id`, `user_id`, `activity`, `type`, `date_posted`) VALUES
(270, '1', 'User logged in', 'Login', '2024-09-18 23:21:54.815041'),
(271, '1', 'Added new user id: #2 as it', 'Account', '2024-09-18 23:23:27.222074'),
(272, '1', 'Added new user id: #3 as maintenance', 'Account', '2024-09-18 23:23:56.370280'),
(273, '1', 'Updated status of user: #3 as Inactive', 'Account', '2024-09-18 23:29:32.384831'),
(274, '1', 'Updated status of user: #3 as Active', 'Account', '2024-09-18 23:30:28.687901'),
(275, '1', 'Updated password of user: #2', 'Account', '2024-09-18 23:33:56.880859'),
(276, '1', 'Updated information of user: #2', 'Account', '2024-09-18 23:36:23.259791'),
(277, '1', 'Updated information of user: #2', 'Account', '2024-09-18 23:36:36.657026'),
(278, '1', 'Updated information of user: #2', 'Account', '2024-09-18 23:36:38.344904');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auditlog`
--
ALTER TABLE `tbl_auditlog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auditlog`
--
ALTER TABLE `tbl_auditlog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
