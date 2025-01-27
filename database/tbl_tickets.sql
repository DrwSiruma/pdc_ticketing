-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2025 at 05:27 AM
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
  `assigned` varchar(1000) NOT NULL,
  `msg_ses` varchar(5000) NOT NULL DEFAULT '0',
  `rprt` enum('0','1') NOT NULL DEFAULT '0',
  `date_posted` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `date_modified` datetime(6) DEFAULT current_timestamp(6),
  `date_closed` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_tickets`
--

INSERT INTO `tbl_tickets` (`id`, `ticket_num`, `outlet`, `reported_by`, `designation`, `topiccateg`, `topicitem`, `img_name`, `file_path`, `description`, `priority_type`, `concern_type`, `status`, `remark`, `sched_start`, `sched_end`, `assigned`, `msg_ses`, `rprt`, `date_posted`, `date_modified`, `date_closed`) VALUES
(1, 'PDCS1024001', '11', 'Hanamichi Sakuragi', '1', '1', '2', 'TRHOANGELO_10232024.jpg', '../img/sup_doc/TRHOANGELO_10232024.jpg', 'Test Data', NULL, NULL, '2', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-10-30 10:41:49.643451', NULL, NULL),
(2, 'PDCS1024002', '11', 'Joshua Garcia', '1', '1', '2', '457377830_565243119158694_2829328946720226073_n.jpg', '../img/sup_doc/457377830_565243119158694_2829328946720226073_n.jpg', 'Test 2', 'P2', 'Issue', '1', 'Unavailability of Previous Assigned Personnel', '2024-12-26', '2024-12-27', '17', '0', '0', '2024-10-30 10:53:27.928812', '2025-01-09 16:57:02.000000', NULL),
(4, 'PDCS1024003', '11', 'AJ Raval', '2', '7', '6', 'tabletvslaptop.png', '../img/sup_doc/tabletvslaptop.png', 'Test 3', NULL, NULL, '2', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-10-30 11:55:52.084329', NULL, NULL),
(5, 'PDCS1124001', '11', 'LeBron James', '2', '7', '6', 'PreventiveTR_TIMES110524.jpg', '../img/sup_doc/PreventiveTR_TIMES110524.jpg', 'Test data entry only.', NULL, NULL, '3', 'Not Applicable', NULL, NULL, '', '0', '0', '2024-11-12 10:57:30.322534', '2024-12-13 13:38:56.000000', NULL),
(6, 'PDCS1124002', '11', 'James Harden', '1', '1', '3', 'PreventiveTR_JMB110624.jpg', '../img/sup_doc/PreventiveTR_JMB110624.jpg', 'kjl', 'P1', 'Issue', '4', 'Re-assigned to: 15. Reason: Unavailability of Previous Assigned Personnel', '2025-01-08', '2025-01-09', '15', '0', '0', '2024-11-12 11:38:15.087404', '2025-01-15 14:27:26.000000', NULL),
(7, 'PDCS1124003', '11', 'Stephen Curry', '1', '2', '4', 'PreventiveTR_MANUELA110524.jpg', '../img/sup_doc/PreventiveTR_MANUELA110524.jpg', 'Test data entry only.', NULL, NULL, '3', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-11-12 11:58:14.112935', '2024-12-13 13:27:32.000000', NULL),
(8, 'PDCS1224001', '14', 'Kai Sotto', '2', '7', '7', 'PreventiveTR_ATC110424.jpg', '../img/sup_doc/PreventiveTR_ATC110424.jpg', 'Test Data Only', NULL, NULL, '2', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-12-03 11:28:10.680195', NULL, NULL),
(9, 'PDCS1224002', '14', 'Steve Nash', '1', '2', '5', 'PreventiveTR_SFPILAR110424.jpg', '../img/sup_doc/PreventiveTR_SFPILAR110424.jpg', 'For data testing only.', 'P2', 'Issue', '1', 'Re-assigned to: 17. Reason: Customer Request', '2025-01-27', '2025-01-28', '17', '0', '0', '2024-12-13 19:03:25.950482', '2025-01-24 19:54:56.000000', NULL),
(10, 'PDCS1224003', '14', 'Michael Jordan', '1', '2', '5', 'PreventiveTR_SFPILAR110424.jpg', '../img/sup_doc/PreventiveTR_SFPILAR110424.jpg', 'For data testing only.', NULL, NULL, '3', 'Duplicate Request', NULL, NULL, '', '0', '0', '2024-12-13 19:07:07.700117', '2024-12-16 13:36:28.000000', NULL),
(11, 'PDCS1224004', '14', 'John Doe', '1', '2', '5', 'PreventiveTR_FSKIOSK110424.jpg', '../img/sup_doc/PreventiveTR_FSKIOSK110424.jpg', 'For data testing only.', NULL, NULL, '3', 'Duplicate Request', NULL, NULL, '', '0', '0', '2024-12-13 19:08:23.315041', '2024-12-17 15:56:14.000000', NULL),
(12, 'PDCS1224005', '14', 'Donald Trump', '1', '3', '9', 'bootstrap-messages-or-conversations as Smart Object-1.png', '../img/sup_doc/bootstrap-messages-or-conversations as Smart Object-1.png', 'For data testing only', 'P3', 'Issue', '4', 'Re-assigned to: 16. Reason: The assigned personnel is on Leave', '2025-01-10', '2025-01-12', '16', '0', '0', '2024-12-17 16:08:00.718386', '2025-01-15 13:31:53.000000', NULL),
(13, 'PDCS0125001', '12', 'Juan Dela Cruz', '1', '2', '4', 'White Wireless Router.E01.watermarked.2k.png', '../img/sup_doc/White Wireless Router.E01.watermarked.2k.png', 'For data testing only', NULL, NULL, '2', 'Our team has received your request, and weâ€™re already reviewing the details. Weâ€™ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.', NULL, NULL, '', '0', '0', '2025-01-15 16:35:13.793874', '2025-01-15 16:35:13.793874', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
