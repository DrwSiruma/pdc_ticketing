-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2025 at 06:00 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `date_posted` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemcategory`
--

CREATE TABLE `tbl_itemcategory` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `img_name` varchar(1000) NOT NULL,
  `img_path` varchar(1000) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `designation` enum('1','2') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemlist`
--

CREATE TABLE `tbl_itemlist` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id` int(100) NOT NULL,
  `notif_msg` varchar(5000) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `user_id` int(100) NOT NULL,
  `post_date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ticketreport`
--

CREATE TABLE `tbl_ticketreport` (
  `id` int(100) NOT NULL,
  `ticket_num` varchar(1000) NOT NULL,
  `outlet_id` varchar(1000) NOT NULL,
  `emp_id` varchar(1000) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  `report_type` enum('1','2') NOT NULL,
  `outlet_name` varchar(1000) NOT NULL,
  `emp_name` varchar(1000) NOT NULL,
  `ticket_date` date NOT NULL,
  `time_in` time(6) DEFAULT NULL,
  `time_out` time(6) DEFAULT NULL,
  `subj` varchar(1000) NOT NULL,
  `findings` longtext NOT NULL,
  `action` longtext NOT NULL,
  `diagnosis` longtext NOT NULL,
  `recom` longtext NOT NULL,
  `fn_client` varchar(100) NOT NULL,
  `signature_client` longtext,
  `fn_signiture2` varchar(100) DEFAULT NULL,
  `signiture_2` longtext,
  `signature_personnel` longtext,
  `modify_date` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `posted_date` datetime(6) NOT NULL,
  `report_remarks` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tickets`
--

CREATE TABLE `tbl_tickets` (
  `id` int(100) NOT NULL,
  `ticket_num` varchar(1000) NOT NULL,
  `outlet` varchar(1000) NOT NULL,
  `reported_by` varchar(100) NOT NULL,
  `designation` enum('1','2') NOT NULL,
  `topiccateg` varchar(1000) NOT NULL,
  `topicitem` varchar(1000) NOT NULL,
  `img_name` varchar(1000) NOT NULL,
  `file_path` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL,
  `priority_type` varchar(100) DEFAULT NULL,
  `concern_type` enum('Issue','Request') DEFAULT NULL,
  `status` enum('1','2','3','4','5') NOT NULL DEFAULT '2',
  `remark` varchar(1000) NOT NULL,
  `sched_start` date DEFAULT NULL,
  `sched_end` date DEFAULT NULL,
  `overdue` enum('0','1') DEFAULT NULL,
  `assigned` varchar(1000) NOT NULL,
  `msg_ses` varchar(5000) NOT NULL DEFAULT '0',
  `rprt` enum('0','1') NOT NULL DEFAULT '0',
  `date_posted` datetime(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6),
  `date_modified` datetime(6) DEFAULT CURRENT_TIMESTAMP(6),
  `date_closed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_useraccounts`
--

CREATE TABLE `tbl_useraccounts` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','it-admin','maintenance-admin','office','outlet','it','maintenance') NOT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created` datetime(6) DEFAULT CURRENT_TIMESTAMP(6),
  `updated` datetime(6) DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`id`, `name`, `username`, `password`, `role`, `status`, `created`, `updated`) VALUES
(1, 'Administrator', 'pdc_admin', '$2y$10$85VBb7u1C6Xkc7POKHFcJeZpTAXA4LvWDVfLRrzgeDpOv4dDhqBtu', 'admin', 'Active', '2024-09-18 23:21:08.747594', '2024-09-23 13:43:56.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_auditlog`
--
ALTER TABLE `tbl_auditlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_itemcategory`
--
ALTER TABLE `tbl_itemcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_itemlist`
--
ALTER TABLE `tbl_itemlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ticketreport`
--
ALTER TABLE `tbl_ticketreport`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_auditlog`
--
ALTER TABLE `tbl_auditlog`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_itemcategory`
--
ALTER TABLE `tbl_itemcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_itemlist`
--
ALTER TABLE `tbl_itemlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_ticketreport`
--
ALTER TABLE `tbl_ticketreport`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
