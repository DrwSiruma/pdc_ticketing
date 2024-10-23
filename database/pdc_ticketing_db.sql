-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 23, 2024 at 11:12 AM
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
(278, '1', 'Updated information of user: #2', 'Account', '2024-09-18 23:36:38.344904'),
(279, '1', 'User logged out', 'Logout', '2024-09-19 08:03:45.031986'),
(280, '1', 'User logged in', 'Login', '2024-09-19 11:43:15.985482'),
(281, '1', 'Updated status of user: #3 as Inactive', 'Account', '2024-09-19 12:23:25.040925'),
(282, '1', 'Updated status of user: #3 as Active', 'Account', '2024-09-19 12:23:27.051714'),
(283, '1', 'User logged out', 'Logout', '2024-09-19 13:50:06.442857'),
(284, '1', 'User logged in', 'Login', '2024-09-20 14:33:51.256082'),
(285, '1', 'Added new user id: #11 as office', 'Account', '2024-09-20 14:43:14.611088'),
(286, '1', 'User logged out', 'Logout', '2024-09-20 14:56:50.329145'),
(287, '1', 'User logged in', 'Login', '2024-09-20 14:56:56.527545'),
(288, '1', 'User logged in', 'Login', '2024-09-23 10:28:42.287677'),
(289, '1', 'Added new user id: #12 as office', 'Account', '2024-09-23 13:49:24.186600'),
(290, '1', 'Updated information of user: #12', 'Account', '2024-09-23 13:50:34.049576'),
(291, '1', 'Updated information of user: #12', 'Account', '2024-09-23 13:50:40.365657'),
(292, '1', 'Updated password of user: #12', 'Account', '2024-09-23 13:52:45.405376'),
(293, '1', 'Added new user id: #13 as office', 'Account', '2024-09-23 15:42:51.343437'),
(294, '1', 'Updated status of user: #11 as Inactive', 'Account', '2024-09-23 15:51:13.942453'),
(295, '1', 'Updated status of user: #12 as Inactive', 'Account', '2024-09-23 15:51:14.890695'),
(296, '1', 'Updated status of user: #13 as Inactive', 'Account', '2024-09-23 15:51:17.152812'),
(297, '1', 'User logged out', 'Logout', '2024-09-23 18:02:00.141542'),
(298, '1', 'User logged in', 'Login', '2024-09-25 12:15:36.514234'),
(299, '1', 'User logged out', 'Logout', '2024-09-25 17:55:51.277765'),
(300, '1', 'User logged in', 'Login', '2024-09-30 11:18:25.971084'),
(301, '1', 'User logged in', 'Login', '2024-10-01 13:02:04.297817'),
(302, '1', 'User logged in', 'Login', '2024-10-02 14:09:54.133447'),
(303, '1', 'User logged out', 'Logout', '2024-10-02 14:34:12.745631'),
(304, '1', 'User logged in', 'Login', '2024-10-03 13:36:32.288131'),
(305, '1', 'Updated status of user: #11 as Active', 'Account', '2024-10-03 15:18:30.096095'),
(306, '1', 'User logged out', 'Logout', '2024-10-03 16:16:46.772817'),
(307, '11', 'User logged in', 'Login', '2024-10-03 16:16:53.122714'),
(308, '11', 'User logged in', 'Login', '2024-10-03 16:17:01.374886'),
(309, '11', 'User logged in', 'Login', '2024-10-03 16:18:57.355340'),
(310, '11', 'User logged in', 'Login', '2024-10-03 16:21:38.542520'),
(311, '11', 'User logged in', 'Login', '2024-10-03 16:23:49.958348'),
(312, '11', 'User logged in', 'Login', '2024-10-03 16:36:32.919607'),
(313, '11', 'User logged in', 'Login', '2024-10-03 16:36:55.240621'),
(314, '11', 'User logged out', 'Logout', '2024-10-03 16:56:32.920100'),
(315, '11', 'User logged in', 'Login', '2024-10-04 12:31:20.688284'),
(316, '11', 'User logged out', 'Logout', '2024-10-04 13:25:55.440853'),
(317, '11', 'User logged in', 'Login', '2024-10-04 13:26:03.882099'),
(318, '11', 'User logged out', 'Logout', '2024-10-04 13:52:44.421136'),
(319, '11', 'User logged in', 'Login', '2024-10-04 13:53:29.897577'),
(320, '11', 'User logged out', 'Logout', '2024-10-04 14:26:46.305537'),
(321, '1', 'User logged in', 'Login', '2024-10-04 14:26:52.191712'),
(322, '1', 'Added new user id: #14 as outlet', 'Account', '2024-10-04 14:27:33.992031'),
(323, '1', 'User logged out', 'Logout', '2024-10-04 14:27:46.042378'),
(324, '14', 'User logged in', 'Login', '2024-10-04 14:28:05.307773'),
(325, '11', 'User logged in', 'Login', '2024-10-07 13:16:19.150545'),
(326, '11', 'User logged out', 'Logout', '2024-10-07 15:23:32.209396'),
(327, '1', 'User logged in', 'Login', '2024-10-07 15:56:00.217049'),
(328, '1', 'User logged in', 'Login', '2024-10-08 13:58:44.810356'),
(329, '1', 'User logged in', 'Login', '2024-10-08 16:50:20.395560'),
(330, '11', 'User logged in', 'Login', '2024-10-09 12:10:48.989194'),
(331, '11', 'User logged out', 'Logout', '2024-10-09 12:11:09.686823'),
(332, '1', 'User logged in', 'Login', '2024-10-09 12:15:35.361680'),
(333, '1', 'Added new item category: POS', 'ItemCategory', '2024-10-09 13:00:06.161108'),
(334, '1', 'User logged in', 'Login', '2024-10-10 10:14:19.354425'),
(335, '1', 'Added new item category: Internet', 'ItemCategory', '2024-10-10 10:24:57.832670'),
(336, '1', 'User logged out', 'Logout', '2024-10-10 10:33:00.081615'),
(337, '1', 'User logged in', 'Login', '2024-10-10 10:33:54.493728'),
(338, '1', 'Added new item category: Digital Devices', 'ItemCategory', '2024-10-10 11:25:08.496843'),
(339, '1', 'Added new item category: CCTV', 'ItemCategory', '2024-10-10 11:38:10.417710'),
(340, '1', 'User logged out', 'Logout', '2024-10-10 11:41:52.070852'),
(341, '11', 'User logged in', 'Login', '2024-10-10 11:42:11.370405'),
(342, '11', 'User logged out', 'Logout', '2024-10-10 13:03:35.362100'),
(343, '1', 'User logged in', 'Login', '2024-10-10 13:04:13.818764'),
(344, '1', 'Added new item category: ISOP', 'ItemCategory', '2024-10-10 13:10:22.449444'),
(345, '1', 'Added new item category: PAR Level', 'ItemCategory', '2024-10-10 13:18:33.718684'),
(346, '1', 'User logged in', 'Login', '2024-10-11 17:00:15.924178'),
(347, '1', 'User logged in', 'Login', '2024-10-13 17:22:51.742899'),
(348, '1', 'Added new item: Cashdrawer', 'Item', '2024-10-15 14:56:31.882215'),
(349, '1', 'User logged in', 'Login', '2024-10-15 15:12:33.963881'),
(350, '1', 'Added new item: POS Printer', 'Item', '2024-10-15 15:12:49.702902'),
(351, '1', 'Added new item: POS', 'Item', '2024-10-15 16:38:55.927556'),
(352, '1', 'User logged in', 'Login', '2024-10-16 09:49:31.322113'),
(353, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:04:48.997868'),
(354, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:04:53.784312'),
(355, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:04:55.316224'),
(356, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:04:56.335221'),
(357, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:04:57.282338'),
(358, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:06:54.597903'),
(359, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:06:59.154321'),
(360, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:07:01.427534'),
(361, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:07:54.581744'),
(362, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:07:57.881557'),
(363, '1', 'Added new item: PLDT Router', 'Item', '2024-10-16 10:21:04.175397'),
(364, '1', 'Added new item: Smart Broadband', 'Item', '2024-10-16 10:21:14.963970'),
(365, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:21:30.390906'),
(366, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:22:28.869900'),
(367, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:24:42.490217'),
(368, '1', 'Updated status of item: 0', 'Item', '2024-10-16 10:24:46.277893'),
(369, '1', 'Updated status of item: 3', 'Item', '2024-10-16 10:25:21.112554'),
(370, '1', 'Updated status of item: 3', 'Item', '2024-10-16 10:25:22.958607'),
(371, '1', 'User logged in', 'Login', '2024-10-16 12:44:26.212014'),
(372, '1', 'Updated status of item category: 4', 'Item', '2024-10-16 12:56:53.346872'),
(373, '1', 'Updated status of item category: 4', 'Item', '2024-10-16 12:57:06.932420'),
(374, '1', 'User logged out', 'Logout', '2024-10-16 22:36:45.479137'),
(375, '1', 'User logged in', 'Login', '2024-10-17 22:15:16.400391'),
(376, '1', 'Updated status of item category: 1', 'Item', '2024-10-17 22:15:24.109722'),
(377, '1', 'Updated status of item category: 1', 'Item', '2024-10-17 22:15:26.964031'),
(378, '1', 'User logged in', 'Login', '2024-10-18 14:45:17.981361'),
(380, '1', 'Updated status of item category: 2', 'Item', '2024-10-23 16:54:10.942825'),
(381, '1', 'Updated status of item category: 2', 'Item', '2024-10-23 16:54:37.998121'),
(382, '1', 'Added new item category: Appliances', 'ItemCategory', '2024-10-23 17:10:33.308757');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_itemcategory`
--

INSERT INTO `tbl_itemcategory` (`id`, `name`, `img_name`, `img_path`, `status`, `designation`) VALUES
(1, 'POS', 'vpos_set.png', '../img/item-category/vpos_set.png', '1', '1'),
(2, 'Internet', 'White Wireless Router.E01.watermarked.2k.png', '../img/item-category/White Wireless Router.E01.watermarked.2k.png', '1', '1'),
(3, 'Digital Devices', 'digital_device.png', '../img/item-category/digital_device.png', '1', '1'),
(4, 'CCTV', 'cctv_set.jpg', '../img/item-category/cctv_set.jpg', '1', '1'),
(5, 'ISOP', 'web_icon.png', '../img/item-category/web_icon.png', '1', '1'),
(6, 'PAR Level', 'sheets_icon.png', '../img/item-category/sheets_icon.png', '1', '1'),
(7, 'Appliances', '_8c7946e5-5871-4fd7-9cf6-ef8c46ff5edd.jpg', '../img/item-category/_8c7946e5-5871-4fd7-9cf6-ef8c46ff5edd.jpg', '1', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_itemlist`
--

CREATE TABLE `tbl_itemlist` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_itemlist`
--

INSERT INTO `tbl_itemlist` (`id`, `name`, `status`, `category`) VALUES
(1, 'Cashdrawer', '1', '1'),
(2, 'POS Printer', '1', '1'),
(3, 'POS', '1', '1'),
(4, 'PLDT Router', '1', '2'),
(5, 'Smart Broadband', '1', '2');

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
  `created` datetime(6) DEFAULT current_timestamp(6),
  `updated` datetime(6) DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_useraccounts`
--

INSERT INTO `tbl_useraccounts` (`id`, `name`, `username`, `password`, `role`, `status`, `created`, `updated`) VALUES
(1, 'Administrator', 'pdc_admin', '$2y$10$85VBb7u1C6Xkc7POKHFcJeZpTAXA4LvWDVfLRrzgeDpOv4dDhqBtu', 'admin', 'Active', '2024-09-18 23:21:08.747594', '2024-09-23 13:43:56.000000'),
(2, 'IT Support', 'pdc_it', '$2y$10$RWruz4YN291BYQ2cAX8cNu8q4hzb8AqlGjFZ1b9UA.gLrxJ/fNK2m', 'it-admin', 'Active', '2024-09-18 23:23:27.217829', '2024-10-16 09:56:48.971064'),
(3, 'Maintenance Support', 'pdc_maintenance', '$2y$10$Z6uIQyrJzBKoqfoD14XJ4.lRaN9p/8XWWe/66TEH51DnoTjypsnD.', 'maintenance-admin', 'Active', '2024-09-18 23:23:56.365882', '2024-10-16 09:56:53.904485'),
(11, 'Head Office', 'pdc_ho', '$2y$10$nWY2Bcd6XWqTJYkPUmWNuOwW38ujo22VJ8H3a9TL./chXZLKnf4O2', 'office', 'Active', '2024-09-20 14:43:14.609384', '2024-10-03 15:18:30.081311'),
(12, 'APC', 'pdc_apc', '$2y$10$WHIe9rnaCgpox50HuMtgUuBWFjKE3KKPGHAz3FBzxjh95AyG3Bexq', 'office', 'Inactive', '2024-09-23 13:49:24.181011', '2024-09-23 15:51:14.889388'),
(13, 'TCK', 'pdc_tck', '$2y$10$eBjroQ4.j.TVnfYbALyTi.b/AfwiS8DAd6Qumo8O3hcAPolYMSBXu', 'office', 'Inactive', '2024-09-23 15:42:51.338461', '2024-09-23 15:51:17.151253'),
(14, 'DD-ATC', 'dd_atc', '$2y$10$vf9ea6Paw9CVZ2yvmL6zEuwM97gPVo2VQwnJ7EJFyCd1ddmr/Pe7.', 'outlet', 'Active', '2024-10-04 14:27:33.990603', '2024-10-04 14:27:33.990603');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=383;

--
-- AUTO_INCREMENT for table `tbl_itemcategory`
--
ALTER TABLE `tbl_itemcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_itemlist`
--
ALTER TABLE `tbl_itemlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
