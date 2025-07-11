-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 11, 2025 at 08:46 AM
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

--
-- Dumping data for table `tbl_auditlog`
--

INSERT INTO `tbl_auditlog` (`id`, `user_id`, `activity`, `type`, `date_posted`) VALUES
(1, '1', 'User logged in', 'Login', '2025-07-04 12:02:51.237105'),
(2, '1', 'Added new user id: #23 as office', 'Account', '2025-07-04 12:04:44.656007'),
(3, '1', 'Added new user id: #24 as office', 'Account', '2025-07-04 12:05:28.424077'),
(4, '1', 'Updated information of user: #24', 'Account', '2025-07-04 12:06:01.068979'),
(5, '1', 'Updated password of user: #24', 'Account', '2025-07-04 12:06:22.795760'),
(6, '1', 'Added new user id: #25 as office', 'Account', '2025-07-04 12:07:47.441334'),
(7, '1', 'Added new user id: #26 as outlet', 'Account', '2025-07-04 12:09:21.619634'),
(8, '1', 'Added new user id: #27 as outlet', 'Account', '2025-07-04 12:12:40.389878'),
(9, '1', 'Added new user id: #28 as outlet', 'Account', '2025-07-04 12:34:10.984267'),
(10, '1', 'Added new user id: #29 as outlet', 'Account', '2025-07-04 12:34:48.414149'),
(11, '1', 'Added new user id: #30 as outlet', 'Account', '2025-07-04 12:49:28.069220'),
(12, '1', 'Added new user id: #31 as outlet', 'Account', '2025-07-04 14:01:41.451731'),
(13, '1', 'Added new user id: #32 as outlet', 'Account', '2025-07-04 14:03:08.070976'),
(14, '1', 'Added new user id: #33 as outlet', 'Account', '2025-07-04 14:08:29.437980'),
(15, '1', 'Added new user id: #34 as outlet', 'Account', '2025-07-04 14:25:07.393461'),
(16, '1', 'Added new user id: #35 as outlet', 'Account', '2025-07-04 14:26:01.607748'),
(17, '1', 'Added new user id: #36 as outlet', 'Account', '2025-07-04 14:27:10.778835'),
(18, '1', 'Added new user id: #37 as outlet', 'Account', '2025-07-04 14:28:07.417200'),
(19, '1', 'Added new user id: #38 as outlet', 'Account', '2025-07-04 14:33:15.309842'),
(20, '1', 'Added new user id: #39 as outlet', 'Account', '2025-07-04 14:34:23.047966'),
(21, '1', 'Added new user id: #40 as outlet', 'Account', '2025-07-04 14:35:31.235453'),
(22, '1', 'Added new user id: #41 as outlet', 'Account', '2025-07-04 14:36:32.133084'),
(23, '1', 'Added new user id: #42 as outlet', 'Account', '2025-07-04 14:37:10.822362'),
(24, '1', 'Added new user id: #43 as outlet', 'Account', '2025-07-04 14:38:03.236518'),
(25, '1', 'Added new user id: #44 as outlet', 'Account', '2025-07-04 14:40:48.302243'),
(26, '1', 'Added new user id: #45 as outlet', 'Account', '2025-07-04 14:41:27.826052'),
(27, '1', 'Added new user id: #46 as outlet', 'Account', '2025-07-04 14:42:13.972636'),
(28, '1', 'Added new user id: #47 as outlet', 'Account', '2025-07-04 14:42:57.488118'),
(29, '1', 'Added new user id: #48 as outlet', 'Account', '2025-07-04 14:44:34.049199'),
(30, '1', 'Added new user id: #49 as outlet', 'Account', '2025-07-04 14:45:46.203661'),
(31, '1', 'Added new user id: #50 as outlet', 'Account', '2025-07-04 14:46:46.742204'),
(32, '1', 'Added new user id: #51 as outlet', 'Account', '2025-07-04 14:47:53.047203'),
(33, '1', 'Added new user id: #52 as outlet', 'Account', '2025-07-04 14:48:36.427594'),
(34, '1', 'Added new user id: #53 as outlet', 'Account', '2025-07-04 14:49:26.300547'),
(35, '1', 'Added new user id: #54 as outlet', 'Account', '2025-07-04 14:50:08.129013'),
(36, '1', 'Added new user id: #55 as outlet', 'Account', '2025-07-04 14:50:51.679059'),
(37, '1', 'Added new user id: #56 as outlet', 'Account', '2025-07-04 14:51:39.460271'),
(38, '1', 'Added new user id: #57 as outlet', 'Account', '2025-07-04 14:52:28.557582'),
(39, '1', 'Added new user id: #58 as outlet', 'Account', '2025-07-04 15:04:26.327953'),
(40, '1', 'Added new user id: #59 as outlet', 'Account', '2025-07-04 15:07:41.123644'),
(41, '1', 'Added new user id: #60 as outlet', 'Account', '2025-07-04 15:08:43.148052'),
(42, '1', 'Added new user id: #61 as outlet', 'Account', '2025-07-04 15:09:26.662312'),
(43, '1', 'Added new user id: #62 as outlet', 'Account', '2025-07-04 15:11:52.463169'),
(44, '1', 'Added new user id: #63 as outlet', 'Account', '2025-07-04 15:12:37.824345'),
(45, '1', 'Added new user id: #64 as outlet', 'Account', '2025-07-04 15:13:31.465911'),
(46, '1', 'Added new user id: #65 as outlet', 'Account', '2025-07-04 15:21:04.150778'),
(47, '1', 'Added new user id: #66 as it', 'Account', '2025-07-04 15:22:47.303487'),
(48, '1', 'Added new user id: #67 as it', 'Account', '2025-07-04 15:23:55.283313'),
(49, '1', 'Added new item category: POS', 'ItemCategory', '2025-07-04 15:28:40.915012'),
(50, '1', 'Added new item category: CCTV', 'ItemCategory', '2025-07-04 15:28:49.809751'),
(51, '1', 'Added new item: POS Printer', 'Item', '2025-07-04 15:29:02.584244'),
(52, '1', 'Added new item: Cash Drawer', 'Item', '2025-07-04 15:29:42.670319'),
(53, '1', 'Added new item: Key Board', 'Item', '2025-07-04 15:29:51.689955'),
(54, '1', 'Added new item: Mouse', 'Item', '2025-07-04 15:29:58.572989'),
(55, '1', 'Added new item: Take Out', 'Item', '2025-07-04 15:30:15.648444'),
(56, '1', 'Added new item: Drive Thru', 'Item', '2025-07-04 15:30:24.150898'),
(57, '1', 'Added new item: Thermal Printer', 'Item', '2025-07-04 15:30:59.619725'),
(58, '1', 'Added new item: Dine-In', 'Item', '2025-07-04 15:31:23.719348'),
(59, '1', 'Added new item: 2nd Monitor - Display', 'Item', '2025-07-04 16:01:09.611404'),
(60, '1', 'Added new item: DVR/NVR', 'Item', '2025-07-04 16:01:28.773670'),
(61, '1', 'Added new item: Monitor', 'Item', '2025-07-04 16:01:35.971406'),
(62, '1', 'Added new item: Camera', 'Item', '2025-07-04 16:02:04.348098'),
(63, '1', 'Added new item category: Digital Devices', 'ItemCategory', '2025-07-04 16:06:39.741668'),
(64, '1', 'Added new item: Tablet', 'Item', '2025-07-04 16:07:00.629283'),
(65, '1', 'Added new item: Laptop', 'Item', '2025-07-04 16:07:06.029053'),
(66, '1', 'Added new item: Desktop / Computer', 'Item', '2025-07-04 16:07:54.426645'),
(67, '1', 'Added new item category: Network/Internet Connections', 'ItemCategory', '2025-07-04 16:26:14.764438'),
(68, '1', 'Added new item: PLDT', 'Item', '2025-07-04 16:26:33.531021'),
(69, '1', 'Added new item: PLDT', 'Item', '2025-07-04 16:26:38.003221'),
(70, '1', 'Added new item: Network Switch', 'Item', '2025-07-04 16:34:34.687826'),
(71, '1', 'Added new item: Converge', 'Item', '2025-07-07 13:05:38.286319'),
(72, '1', 'Edit item: Tablet', 'Item', '2025-07-07 13:29:36.373096');

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

--
-- Dumping data for table `tbl_itemcategory`
--

INSERT INTO `tbl_itemcategory` (`id`, `name`, `img_name`, `img_path`, `status`, `designation`) VALUES
(1, 'POS', '', '', '1', '1'),
(2, 'CCTV', '', '', '1', '1'),
(3, 'Digital Devices', '', '', '1', '1'),
(4, 'Network/Internet Connections', '', '', '1', '1');

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

--
-- Dumping data for table `tbl_itemlist`
--

INSERT INTO `tbl_itemlist` (`id`, `name`, `status`, `category`) VALUES
(1, 'Journal Printer', '1', '1'),
(2, 'Thermal Printer', '1', '1'),
(3, 'Key Board', '1', '1'),
(4, 'Mouse', '1', '1'),
(5, 'Dine-In', '1', '1'),
(6, 'Drive Thru', '1', '1'),
(7, 'Take Out', '1', '1'),
(8, 'Cash Drawer', '1', '1'),
(9, '2nd Monitor - Display', '1', '1'),
(10, 'DVR/NVR', '1', '2'),
(11, 'Monitor', '1', '2'),
(12, 'Camera', '1', '2'),
(13, 'Tablet', '1', '3'),
(14, 'Laptop', '1', '3'),
(15, 'Desktop / Computer', '1', '3'),
(16, 'PLDT', '1', '4'),
(17, 'Smart Broadband', '1', '4'),
(18, 'Network Switch', '1', '4'),
(19, 'Converge', '1', '4');

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
(1, 'Administrator', 'pdc_admin', '$2y$10$85VBb7u1C6Xkc7POKHFcJeZpTAXA4LvWDVfLRrzgeDpOv4dDhqBtu', 'admin', 'Active', '2024-09-18 23:21:08.747594', '2024-09-23 13:43:56.000000'),
(22, 'Andrew Siruma', 'pdcit_drew', '$2y$10$NaTVdGq.Tyh8Ica/RfFRd.IWwYSIIRoUVsOXkkFsgn5MW5iduU89q', 'it', 'Active', '2025-07-04 15:22:47.187995', '2025-07-04 15:24:49.571418'),
(23, 'Head Office', 'pd_ho', '$2y$10$0WcLKKbNeE7FeztZL5og6uucaPbBY1Lxjss7TTxgC5ldZVH6W63dC', 'office', 'Active', '2025-07-04 12:04:44.585164', '2025-07-04 12:04:44.585164'),
(24, 'Alabang Production Center', 'pdc_apc', '$2y$10$qVLmDYFoI44GzE2Wpc4OcOSVtt1SMPACTDvhClKhIdXrPoiFIw9GC', 'office', 'Active', '2025-07-04 12:05:28.356801', '2025-07-04 12:06:22.000000'),
(25, 'Tayabas Central Kitchen', 'pdc_tck', '$2y$10$BB76dOHOk/JIlQvLRVETbO5fXn5R2lihGbOMTNbnd7.MD25VK/.iS', 'office', 'Active', '2025-07-04 12:07:47.355840', '2025-07-04 12:07:47.355840'),
(26, 'Alabang Town Center', 'dunkin_atc', '$2y$10$6x9ekiL6VZiMm5h1Tpf45eMyh0NhhTkN1YIFkVMQasJ1ASUyvsZTu', 'outlet', 'Active', '2025-07-04 12:09:21.556879', '2025-07-04 12:09:21.556879'),
(27, 'Centro Alabang', 'dunkin_centro', '$2y$10$rx1cS7OxGYucWkYnLmhZtejyaUVDW6W.jOliM51xPmBrv3.vqr7JC', 'outlet', 'Active', '2025-07-04 12:12:40.299518', '2025-07-04 12:12:40.299518'),
(28, 'Festival Main', 'dunkin_fs3', '$2y$10$GNjJGHnklOzFNMtJfjYy7umjpnCV4wbiUEGg8mmCErzlY1GOYElFS', 'outlet', 'Active', '2025-07-04 12:34:10.708783', '2025-07-04 12:34:10.708783'),
(29, 'Landmark', 'dunkin_landmark', '$2y$10$4Mn8yqWPlMHPX6PJCQFyMOPU8XifR3.ZkyktpK4u.z9sMKpqxVAOa', 'outlet', 'Active', '2025-07-04 12:34:48.366278', '2025-07-04 12:34:48.366278'),
(30, 'Northgate', 'dunkin_northgate', '$2y$10$kAlS/norufp/3Fe0Nv2tB.wm0/2xC9U0VYEF4TUN1e/lva.hrEdmS', 'outlet', 'Active', '2025-07-04 12:49:28.036109', '2025-07-04 12:49:28.036109'),
(31, 'Poblacion', 'dunkin_poblacion', '$2y$10$jTwsZwnSLXhSHFd0kXIb1.OAtZwRw/eaPAtE09cX26.SXn04hNx.K', 'outlet', 'Active', '2025-07-04 14:01:41.333101', '2025-07-04 14:01:41.333101'),
(32, 'Waltermart - Muntinlupa', 'dunkin_wmmunti', '$2y$10$AFSCXhe4UJNSdbyyxLjrpOq2r52VKxAlpzmt4QjyH/Csh4Tv1ip6O', 'outlet', 'Active', '2025-07-04 14:03:08.001891', '2025-07-04 14:03:08.001891'),
(33, 'DoÃ±a Isabel', 'dunkin_disabel', '$2y$10$SBolySJbv.hC8sTtvIIYKu4Zu.pOkMDuuay.9zWKotNhkeKkVcaFq', 'outlet', 'Active', '2025-07-04 14:08:29.365095', '2025-07-04 14:08:29.365095'),
(34, 'MCX', 'dunkin_mcx', '$2y$10$vo5XGoaWKRfJpe/AeVvbUeSqc6SYwAIeie/WDKk3ANPLX86IA7iWm', 'outlet', 'Active', '2025-07-04 14:25:07.323249', '2025-07-04 14:25:07.323249'),
(35, 'South Station', 'dunkin_sstation', '$2y$10$i9yrmCFpJO37wMhkNUnXJuDy3wZpBh8KnYy7i8210i8flRl.CMOAC', 'outlet', 'Active', '2025-07-04 14:26:01.492075', '2025-07-04 14:26:01.492075'),
(36, 'SMDC Leaf', 'dunkin_smdc', '$2y$10$.Agov5IH7/NZjbS/LPP6O.92rSaHXSxVBpV.5t55d1mf1QaPJPeFe', 'outlet', 'Active', '2025-07-04 14:27:10.744996', '2025-07-04 14:27:10.744996'),
(37, 'JMB', 'dunkin_jmb', '$2y$10$aQuTX7wz9ZqkWEsC7rKoAeCh4RwXGTCrbCUcmaEDvGHIyigA94uY2', 'outlet', 'Active', '2025-07-04 14:28:07.341970', '2025-07-04 14:28:07.341970'),
(38, 'Manila Times', 'dunkin_times', '$2y$10$If5wZSzPQoMdWZkeLfTwxe9P0Y7MCHpCtOlqGjHUYSaRQkXkfQPue', 'outlet', 'Active', '2025-07-04 14:33:15.242255', '2025-07-04 14:33:15.242255'),
(39, 'DoÃ±a Manuela', 'dunkin_dmanuela', '$2y$10$rYQmMFOPFQ/NvojdlLkqCuT/k2wpc4yP.t78pU8tPMSPmWIRPYVoq', 'outlet', 'Active', '2025-07-04 14:34:23.008385', '2025-07-04 14:34:23.008385'),
(40, 'Moonwalk', 'dunkin_moonwalk', '$2y$10$JjZJ12isAvlcvKPBunIHBOPA6V6ySvG/gQQ30sshH/9/OwxEWsRcu', 'outlet', 'Active', '2025-07-04 14:35:31.195328', '2025-07-04 14:35:31.195328'),
(41, 'San Francisco - Pilar', 'dunkin_sfpilar', '$2y$10$wIYrYnHipU8PsFUtCK14Iu67VoKX1QiE5hXU1xpOuxy9OjmdsPiXO', 'outlet', 'Active', '2025-07-04 14:36:32.094008', '2025-07-04 14:36:32.094008'),
(42, 'Casimiro', 'dunkin_casimiro', '$2y$10$z8Ve8G8vJ5KysLVy9gLEn..AVkyfc1kx7KpgYYxneKuthjYh17PIe', 'outlet', 'Active', '2025-07-04 14:37:10.753398', '2025-07-04 14:37:10.753398'),
(43, 'Naga Road', 'dunkin_nagard', '$2y$10$V5VBW8UUE/v5Nf3ByaWVq.4xx.xrimWtO.VVKxuV68LZqeRH6DME6', 'outlet', 'Active', '2025-07-04 14:38:03.200410', '2025-07-04 14:38:03.200410'),
(44, 'Southville', 'dunkin_southville', '$2y$10$96Ii.X3Gokw.lO2k54ibR.cWRITo4e4Dh8lva8/FE/o15NhQlUQV2', 'outlet', 'Active', '2025-07-04 14:40:48.261406', '2025-07-04 14:40:48.261406'),
(45, 'Verdant', 'dunkin_verdant', '$2y$10$PRAisDLg1f59hU5wQ9zoa.eRnG4wm30mZa9JReEGKB4DM2IQ30jqq', 'outlet', 'Active', '2025-07-04 14:41:27.784336', '2025-07-04 14:41:27.784336'),
(46, 'Evacom', 'dunkin_evacom', '$2y$10$E4HXxoVfNUDTGLPaAyY8d.GYAGDbn5vROcwKixWZ8S6p4Pw.6pVjG', 'outlet', 'Active', '2025-07-04 14:42:13.895927', '2025-07-04 14:42:13.895927'),
(47, 'NAIA Road', 'dunkin_naia', '$2y$10$r48YuOfBiSnVfCO6ZYwsVeXh4Wn8I9fV6UNXfoWn58t0m5H8VcgZi', 'outlet', 'Active', '2025-07-04 14:42:57.396407', '2025-07-04 14:42:57.396407'),
(48, 'PITX', 'dunkin_pitx', '$2y$10$vnYLo76oH4Yhlh8jXNhQMeTptwO.ha2Dg4gK5j7LfW9n23Xx3qFke', 'outlet', 'Active', '2025-07-04 14:44:33.989072', '2025-07-04 14:44:33.989072'),
(49, 'Puregold San Dionisio', 'dunkin_pgsd', '$2y$10$YoKMC.OCwobLRl8E1OoIXemf4gf.4TapBKVC9B6focPopRpYwLlgW', 'outlet', 'Active', '2025-07-04 14:45:46.168566', '2025-07-04 14:45:46.168566'),
(50, 'DoÃ±a Soledad', 'dunkin_dsoledad', '$2y$10$qTPDEKPn9K9jhjuVrXF8EOuzobc1AHrnUBPxRBUJFjBvCtH2CHMAW', 'outlet', 'Active', '2025-07-04 14:46:46.698640', '2025-07-04 14:46:46.698640'),
(51, 'Sucat', 'dunkin_sucat', '$2y$10$EfnjtktSdSNAcg4Jj3nK2ez0Tn7ZxF.AwrR7IZpgpeE6RSr5pfiPS', 'outlet', 'Active', '2025-07-04 14:47:52.970944', '2025-07-04 14:47:52.970944'),
(52, 'Tambo', 'dunkin_tambo', '$2y$10$LAFxqhnNl1mVGufhiLS79O/N4hBKEyDvegsaTtxvzJCgPG1qsiv/6', 'outlet', 'Active', '2025-07-04 14:48:36.345706', '2025-07-04 14:48:36.345706'),
(53, 'Waltermart - Bicutan', 'dunkin_wmbicutan', '$2y$10$RJctSt7jebtQHrcPdqQjxeHlFvy5jEHeaXCxex4w8jOUy9AF1iAba', 'outlet', 'Active', '2025-07-04 14:49:26.251130', '2025-07-04 14:49:26.251130'),
(54, 'Valley 1', 'dunkin_valley1', '$2y$10$dTIaLD0gbkm6q/7TvT09yuFSfT9iH70ozroLvT8fLD3pXgXcWtYie', 'outlet', 'Active', '2025-07-04 14:50:08.038791', '2025-07-04 14:50:08.038791'),
(55, 'Azure', 'dunkin_azure', '$2y$10$RJQuW0QqsE62W8xPYZ0HVOE14.oEo61Z.6kbKOUIGPO/r8eYjPv6m', 'outlet', 'Active', '2025-07-04 14:50:51.598960', '2025-07-04 14:50:51.598960'),
(56, 'Candelaria', 'dunkin_cande', '$2y$10$59j7m7NSdAxHAux14cjA..N9MsFZU6y59UsF3ezIim.DS28MJ9Ao2', 'outlet', 'Active', '2025-07-04 14:51:39.411619', '2025-07-04 14:51:39.411619'),
(57, 'Pacific Mall', 'dunkin_pmall', '$2y$10$/mfTLDfhrIhfJ2uGYF7t7OUhfqowDsHCK.TYmDuA7aONUaD3m6/UG', 'outlet', 'Active', '2025-07-04 14:52:28.513413', '2025-07-04 14:52:28.513413'),
(58, 'Primark - Tayabas', 'dunkin_primark', '$2y$10$Zar64dsGrqRvaj8oM9rsf.fxCCZnATGXkRu/kOJsoaKbJk39nsGsq', 'outlet', 'Active', '2025-07-04 15:04:26.247208', '2025-07-04 15:04:26.247208'),
(59, 'Quezon Ave.', 'dunkin_qa', '$2y$10$bjAMu32Pr1rppeiX5/dkH..kI4BUMqkPCr4Fa0FMAlglbwo7f/e7S', 'outlet', 'Active', '2025-07-04 15:07:41.087583', '2025-07-04 15:07:41.087583'),
(60, 'SM - Lucena', 'dunkin_smluc', '$2y$10$hs7KvOrOp3i/Kop.eTjAau0ROdiFhQuY8AvLwClce8PmTtLEVxg6S', 'outlet', 'Active', '2025-07-04 15:08:43.103471', '2025-07-04 15:08:43.103471'),
(61, 'Maryhill', 'dunkin_maryhill', '$2y$10$DcbrQhks83QTpiS0oLBUd.9RaNLpmbkSMzgpP5Ka4fN2wrUOvJwAi', 'outlet', 'Active', '2025-07-04 15:09:26.592988', '2025-07-04 15:09:26.592988'),
(62, 'Waltermart - Candelaria', 'dunkin_wmcande', '$2y$10$ixqflYG27w9LA3Py18msreZctPDsBceaY9ayA22JlR6ht6ieWqmYG', 'outlet', 'Active', '2025-07-04 15:11:52.423299', '2025-07-04 15:11:52.423299'),
(63, 'Mauban', 'dunkin_mauban', '$2y$10$moWCoESXMGF1u7EqYVgOVuSBGMvO6HoJAJpcFtz08knXcia1WSSMW', 'outlet', 'Active', '2025-07-04 15:12:37.708191', '2025-07-04 15:12:37.708191'),
(64, 'Sariaya', 'dunkin_sariaya', '$2y$10$1BgVgMowL4wM6vvrPhBYL.krHcwRP6v4Oxswyi9dyunuLy8RNHY3q', 'outlet', 'Active', '2025-07-04 15:13:31.403365', '2025-07-04 15:13:31.403365'),
(65, 'Shell - Pagbilao', 'dunkin_pagbilao', '$2y$10$RKBlaxIGCt5xnMgAst0QE.t5xxgpbzOYxYiTyTJTmWQbN5eQm3AB2', 'outlet', 'Active', '2025-07-04 15:21:04.110087', '2025-07-04 15:21:04.110087'),
(66, 'Charl Ace Fuentes', 'pdcit_ace', '$2y$10$W5D1cU4rkiTLXr1cLL7tAeLBHts.r/GvoPkkPLREY3JFjRjuw7Z.i', 'it', 'Active', '2025-07-04 15:23:55.245025', '2025-07-04 15:25:03.347757');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_itemcategory`
--
ALTER TABLE `tbl_itemcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_itemlist`
--
ALTER TABLE `tbl_itemlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
