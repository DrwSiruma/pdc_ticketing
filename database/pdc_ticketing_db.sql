-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2025 at 07:00 AM
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
(382, '1', 'Added new item category: Appliances', 'ItemCategory', '2024-10-23 17:10:33.308757'),
(383, '1', 'User logged out', 'Logout', '2024-10-23 17:13:40.793940'),
(384, '1', 'User logged in', 'Login', '2024-10-23 17:24:47.057847'),
(385, '1', 'User logged out', 'Logout', '2024-10-24 07:10:01.664501'),
(386, '1', 'User logged in', 'Login', '2024-10-24 09:14:00.784237'),
(387, '1', 'User logged out', 'Logout', '2024-10-24 15:24:46.447370'),
(388, '11', 'User logged in', 'Login', '2024-10-24 15:24:56.016630'),
(389, '11', 'User logged out', 'Logout', '2024-10-24 17:57:32.215949'),
(390, '1', 'User logged in', 'Login', '2024-10-24 17:57:52.263780'),
(391, '1', 'Added new user id: #15 as it', 'Account', '2024-10-24 18:26:18.990607'),
(392, '1', 'Added new user id: #16 as it', 'Account', '2024-10-25 09:13:57.760300'),
(393, '1', 'Added new user id: #17 as it-admin', 'Account', '2024-10-25 09:14:28.045032'),
(394, '1', 'User logged in', 'Login', '2024-10-25 12:34:02.639534'),
(395, '1', 'Updated status of user: #17 as Inactive', 'Account', '2024-10-25 13:37:41.335082'),
(396, '1', 'Updated status of user: #17 as Active', 'Account', '2024-10-25 13:37:53.237031'),
(397, '1', 'User logged out', 'Logout', '2024-10-25 13:41:11.631940'),
(398, '11', 'User logged in', 'Login', '2024-10-25 13:41:28.966715'),
(399, '11', 'User logged out', 'Logout', '2024-10-29 15:58:56.516873'),
(400, '1', 'User logged in', 'Login', '2024-10-29 15:59:04.630118'),
(401, '1', 'Added new item: Aircon', 'Item', '2024-10-29 15:59:26.970304'),
(402, '1', 'User logged out', 'Logout', '2024-10-29 15:59:40.966904'),
(403, '11', 'User logged in', 'Login', '2024-10-29 15:59:49.867000'),
(404, '11', 'User logged out', 'Logout', '2024-10-29 16:33:43.600645'),
(405, '1', 'User logged in', 'Login', '2024-10-29 16:35:22.258628'),
(406, '1', 'User logged out', 'Logout', '2024-10-29 16:43:43.970991'),
(407, '11', 'User logged in', 'Login', '2024-10-29 16:43:49.415288'),
(408, '11', 'User logged out', 'Logout', '2024-10-29 16:43:52.048431'),
(409, '11', 'User logged in', 'Login', '2024-10-29 16:43:58.873739'),
(410, '11', 'Open new ticket #: PDCS1024001', 'Ticket', '2024-10-30 10:41:49.652457'),
(411, '11', 'Open new ticket #: PDCS1024002', 'Ticket', '2024-10-30 10:53:27.931979'),
(412, '11', 'User logged out', 'Logout', '2024-10-30 11:00:18.389286'),
(413, '1', 'User logged in', 'Login', '2024-10-30 11:00:28.731693'),
(414, '1', 'User logged out', 'Logout', '2024-10-30 11:27:39.297559'),
(415, '11', 'User logged in', 'Login', '2024-10-30 11:28:09.450807'),
(416, '11', 'User logged out', 'Logout', '2024-10-30 11:30:20.816424'),
(417, '1', 'User logged in', 'Login', '2024-10-30 11:30:32.871470'),
(418, '1', 'User logged out', 'Logout', '2024-10-30 11:34:31.264017'),
(419, '11', 'User logged in', 'Login', '2024-10-30 11:34:44.179011'),
(421, '11', 'Open new ticket #: PDCS1024003', 'Ticket', '2024-10-30 11:55:52.087253'),
(422, '11', 'User logged in', 'Login', '2024-11-02 13:34:08.178601'),
(423, '11', 'User logged in', 'Login', '2024-11-11 23:15:35.557823'),
(424, '11', 'Open new ticket #: PDCS1124001', 'Ticket', '2024-11-12 10:57:30.326157'),
(425, '11', 'Open new ticket #: PDCS1124002', 'Ticket', '2024-11-12 11:38:15.091609'),
(426, '11', 'User logged out', 'Logout', '2024-11-12 11:39:04.737213'),
(427, '1', 'User logged in', 'Login', '2024-11-12 11:50:51.841297'),
(428, '1', 'User logged out', 'Logout', '2024-11-12 11:51:23.119129'),
(429, '11', 'User logged in', 'Login', '2024-11-12 11:51:37.989543'),
(430, '11', 'Open new ticket #: PDCS1124003', 'Ticket', '2024-11-12 11:58:14.114461'),
(431, '11', 'User logged out', 'Logout', '2024-11-13 19:08:27.561700'),
(432, '1', 'User logged in', 'Login', '2024-11-13 19:08:34.201706'),
(433, '1', 'Updated status of item category: 2', 'Item', '2024-11-13 19:22:42.242266'),
(434, '1', 'Updated status of item category: 2', 'Item', '2024-11-13 19:22:44.190392'),
(435, '1', 'Added new item: LCD Monitor', 'Item', '2024-11-13 19:24:56.002711'),
(436, '1', 'User logged out', 'Logout', '2024-11-14 10:52:58.387602'),
(437, '11', 'User logged in', 'Login', '2024-11-14 10:53:05.797201'),
(438, '11', 'User logged in', 'Login', '2024-11-15 13:50:56.674789'),
(439, '11', 'User logged in', 'Login', '2024-11-15 17:18:46.177599'),
(440, '11', 'User logged out', 'Logout', '2024-11-18 09:32:47.687613'),
(441, '1', 'User logged in', 'Login', '2024-11-18 09:32:58.218432'),
(442, '1', 'User logged out', 'Logout', '2024-11-18 09:36:40.479374'),
(443, '11', 'User logged in', 'Login', '2024-11-18 09:36:46.680764'),
(444, '11', 'User logged out', 'Logout', '2024-11-21 10:10:43.827535'),
(445, '1', 'User logged in', 'Login', '2024-11-21 14:22:40.296546'),
(446, '1', 'User logged out', 'Logout', '2024-11-21 14:23:09.031538'),
(447, '11', 'User logged in', 'Login', '2024-11-21 14:23:17.286046'),
(448, '11', 'User logged in', 'Login', '2024-11-25 09:50:59.811778'),
(449, '11', 'User logged out', 'Logout', '2024-11-25 16:43:43.596892'),
(450, '1', 'User logged in', 'Login', '2024-11-25 16:43:49.580848'),
(451, '1', 'User logged out', 'Logout', '2024-11-25 16:43:56.996584'),
(452, '11', 'User logged in', 'Login', '2024-11-25 16:44:02.449359'),
(453, '1', 'User logged in', 'Login', '2024-11-27 09:55:41.889536'),
(454, '1', 'User logged out', 'Logout', '2024-11-27 09:56:23.295450'),
(455, '11', 'User logged in', 'Login', '2024-11-27 09:56:28.684481'),
(456, '11', 'User logged out', 'Logout', '2024-11-28 14:06:33.938190'),
(457, '1', 'User logged in', 'Login', '2024-11-28 14:06:42.807476'),
(458, '1', 'User logged out', 'Logout', '2024-11-28 16:40:04.410467'),
(459, '11', 'User logged in', 'Login', '2024-11-28 16:40:12.307695'),
(460, '11', 'User logged out', 'Logout', '2024-12-02 15:42:32.625348'),
(461, '1', 'User logged in', 'Login', '2024-12-02 15:42:42.977685'),
(462, '1', 'User logged in', 'Login', '2024-12-02 21:12:55.947217'),
(463, '1', 'User logged out', 'Logout', '2024-12-03 11:26:56.771598'),
(464, '11', 'User logged in', 'Login', '2024-12-03 11:27:03.668752'),
(465, '11', 'User logged out', 'Logout', '2024-12-03 11:27:12.222370'),
(466, '14', 'User logged in', 'Login', '2024-12-03 11:27:32.643916'),
(467, '14', 'Open new ticket #: PDCS1224001', 'Ticket', '2024-12-03 11:28:10.682898'),
(468, '14', 'User logged out', 'Logout', '2024-12-03 11:34:26.404822'),
(469, '1', 'User logged in', 'Login', '2024-12-03 11:34:34.060706'),
(470, '1', 'User logged out', 'Logout', '2024-12-03 11:42:06.318859'),
(471, '1', 'User logged in', 'Login', '2024-12-03 11:42:27.169928'),
(472, '1', 'User logged in', 'Login', '2024-12-03 11:47:34.620623'),
(473, '1', 'User logged out', 'Logout', '2024-12-03 12:57:31.959583'),
(474, '1', 'User logged in', 'Login', '2024-12-03 12:57:51.425236'),
(475, '1', 'User logged out', 'Logout', '2024-12-03 21:22:02.931970'),
(476, '14', 'User logged in', 'Login', '2024-12-04 09:47:05.903801'),
(477, '14', 'User logged out', 'Logout', '2024-12-04 09:48:38.093955'),
(478, '1', 'User logged in', 'Login', '2024-12-04 09:48:44.649920'),
(479, '1', 'User logged in', 'Login', '2024-12-04 09:57:25.870362'),
(480, '1', 'User logged out', 'Logout', '2024-12-05 16:31:14.526867'),
(481, '14', 'User logged in', 'Login', '2024-12-05 16:31:23.983822'),
(482, '14', 'User logged out', 'Logout', '2024-12-05 16:32:08.956630'),
(483, '1', 'User logged in', 'Login', '2024-12-05 16:32:17.417725'),
(484, '1', 'Added new item: Tablet', 'Item', '2024-12-05 16:45:57.771532'),
(485, '1', 'Added new item: Laptop', 'Item', '2024-12-05 16:46:04.761870'),
(486, '1', 'Added new item: Desktop/Computer', 'Item', '2024-12-05 16:46:20.683507'),
(487, '1', 'Added new item: CCTV Camera', 'Item', '2024-12-05 16:46:58.227921'),
(488, '1', 'Added new item: Digital Video Recorder (DVR)', 'Item', '2024-12-05 16:47:23.612385'),
(489, '1', 'Added new item: Converge Router', 'Item', '2024-12-05 16:47:56.174770'),
(490, '1', 'Added new item: Can\'t Edit', 'Item', '2024-12-05 16:49:05.960504'),
(491, '1', 'User logged out', 'Logout', '2024-12-06 17:26:20.871013'),
(492, '14', 'User logged in', 'Login', '2024-12-06 17:26:26.852914'),
(493, '14', 'User logged out', 'Logout', '2024-12-06 17:28:27.228168'),
(494, '1', 'User logged in', 'Login', '2024-12-06 17:28:37.300938'),
(495, '1', 'User logged out', 'Logout', '2024-12-07 10:03:04.925800'),
(496, '1', 'User logged in', 'Login', '2024-12-07 22:36:13.483949'),
(497, '1', 'User logged in', 'Login', '2024-12-09 13:08:06.693998'),
(498, '1', 'User logged out', 'Logout', '2024-12-09 15:38:46.187805'),
(499, '14', 'User logged in', 'Login', '2024-12-09 15:39:01.399889'),
(500, '14', 'User logged out', 'Logout', '2024-12-09 15:39:13.380362'),
(501, '1', 'User logged in', 'Login', '2024-12-09 15:39:46.265481'),
(502, '1', 'User logged out', 'Logout', '2024-12-09 20:14:58.070415'),
(503, '1', 'User logged in', 'Login', '2024-12-09 22:41:57.307358'),
(504, '1', 'User logged in', 'Login', '2024-12-10 15:13:35.737561'),
(506, '1', 'Approve ticket #: PDCS1124002', 'Ticket', '2024-12-12 10:46:47.408380'),
(507, '1', 'User logged in', 'Login', '2024-12-12 13:59:59.402399'),
(508, '1', 'Reject ticket #: PDCS1124003', 'Ticket', '2024-12-13 13:27:32.441907'),
(509, '1', 'Reject ticket #: PDCS1124001', 'Ticket', '2024-12-13 13:38:56.173513'),
(510, '1', 'User logged out', 'Logout', '2024-12-13 15:41:22.449817'),
(511, '14', 'User logged in', 'Login', '2024-12-13 15:41:38.688006'),
(512, '14', 'User logged out', 'Logout', '2024-12-13 15:42:13.427779'),
(513, '1', 'User logged in', 'Login', '2024-12-13 15:42:22.224103'),
(514, '1', 'User logged out', 'Logout', '2024-12-13 16:48:35.801143'),
(515, '11', 'User logged in', 'Login', '2024-12-13 16:48:41.628084'),
(516, '11', 'User logged out', 'Logout', '2024-12-13 19:02:37.264501'),
(517, '14', 'User logged in', 'Login', '2024-12-13 19:02:42.905967'),
(518, '14', 'Open new ticket #: PDCS1224002', 'Ticket', '2024-12-13 19:03:25.954841'),
(519, '14', 'Open new ticket #: PDCS1224003', 'Ticket', '2024-12-13 19:07:07.702990'),
(520, '14', 'Open new ticket #: PDCS1224004', 'Ticket', '2024-12-13 19:08:23.324154'),
(521, '14', 'User logged in', 'Login', '2024-12-15 13:52:37.492265'),
(522, '14', 'User logged out', 'Logout', '2024-12-16 13:34:36.229763'),
(523, '1', 'User logged in', 'Login', '2024-12-16 13:35:52.799480'),
(524, '1', 'Reject ticket #: PDCS1224003', 'Ticket', '2024-12-16 13:36:28.171243'),
(525, '1', 'Reject ticket #: PDCS1224004', 'Ticket', '2024-12-16 13:36:41.336398'),
(529, '1', 'Reject ticket #: PDCS1224004', 'Ticket', '2024-12-17 15:56:14.986673'),
(530, '1', 'User logged out', 'Logout', '2024-12-17 16:04:39.531913'),
(531, '14', 'User logged in', 'Login', '2024-12-17 16:04:48.470891'),
(532, '14', 'Open new ticket #: PDCS1224005', 'Ticket', '2024-12-17 16:08:00.719539'),
(533, '14', 'User logged out', 'Logout', '2024-12-17 16:23:48.817226'),
(534, '1', 'User logged in', 'Login', '2024-12-17 16:23:56.915680'),
(535, '1', 'User logged in', 'Login', '2024-12-20 11:06:47.567392'),
(536, '1', 'Approve ticket #: PDCS1224005', 'Ticket', '2024-12-20 11:07:52.066903'),
(537, '1', 'User logged in', 'Login', '2024-12-26 15:41:52.970206'),
(538, '1', 'Approve ticket #: PDCS1024002', 'Ticket', '2024-12-26 15:43:30.112134'),
(539, '1', 'User logged out', 'Logout', '2024-12-26 15:54:46.494070'),
(540, '11', 'User logged in', 'Login', '2024-12-26 15:54:52.604605'),
(541, '11', 'User logged out', 'Logout', '2024-12-26 16:02:00.109053'),
(542, '1', 'User logged in', 'Login', '2024-12-26 16:02:22.414527'),
(543, '1', 'User logged in', 'Login', '2025-01-07 17:40:39.490923'),
(544, '1', 'Re-scheduled ticket #: PDCS1124002', 'Ticket', '2025-01-08 11:09:33.147209'),
(545, '1', 'User logged out', 'Logout', '2025-01-08 11:10:12.492259'),
(546, '11', 'User logged in', 'Login', '2025-01-08 11:10:21.200885'),
(547, '11', 'User logged out', 'Logout', '2025-01-08 11:12:23.832604'),
(548, '1', 'User logged in', 'Login', '2025-01-08 11:12:39.245338'),
(549, '1', 'Re-scheduled ticket #: PDCS1224005', 'Ticket', '2025-01-09 11:45:10.501941'),
(550, '1', 'Re-assigned ticket #: PDCS1224005', 'Ticket', '2025-01-09 11:54:04.830365'),
(551, '1', 'Re-assigned ticket #: PDCS1224005', 'Ticket', '2025-01-09 16:56:44.590681'),
(552, '1', 'Re-assigned ticket #: PDCS1024002', 'Ticket', '2025-01-09 16:57:02.159152'),
(553, '1', 'User logged in', 'Login', '2025-01-10 15:01:10.303888'),
(554, '1', 'User logged in', 'Login', '2025-01-13 13:24:13.557633'),
(555, '1', 'User logged out', 'Logout', '2025-01-13 13:25:58.758320'),
(556, '11', 'User logged in', 'Login', '2025-01-13 13:26:07.247234'),
(557, '11', 'User logged out', 'Logout', '2025-01-13 13:44:01.431064'),
(558, '1', 'User logged in', 'Login', '2025-01-13 13:44:08.831634'),
(559, '1', 'Change ticket type of ticket #: PDCS1224005', 'Ticket', '2025-01-13 16:58:00.377284'),
(560, '1', 'Change ticket type of ticket #: PDCS1224005', 'Ticket', '2025-01-13 16:58:32.638533'),
(561, '1', 'User logged in', 'Login', '2025-01-14 11:41:10.373670'),
(562, '1', 'User logged in', 'Login', '2025-01-14 11:43:34.609503'),
(563, '1', 'Change the Priority level of ticket #: PDCS1224005', 'Ticket', '2025-01-14 13:08:40.412610'),
(564, '1', 'Change the Priority level of ticket #: PDCS1124002', 'Ticket', '2025-01-15 11:30:42.146726'),
(565, '1', 'User logged out', 'Logout', '2025-01-15 13:20:30.968716'),
(566, '14', 'User logged in', 'Login', '2025-01-15 13:20:47.759256'),
(567, '14', 'User logged out', 'Logout', '2025-01-15 13:30:53.350616'),
(568, '1', 'User logged in', 'Login', '2025-01-15 13:31:01.341242'),
(569, '1', 'Re-assigned ticket #: PDCS1224005', 'Ticket', '2025-01-15 13:31:53.143511'),
(570, '1', 'User logged out', 'Logout', '2025-01-15 13:32:17.098330'),
(571, '14', 'User logged in', 'Login', '2025-01-15 13:32:23.059608'),
(572, '14', 'User logged out', 'Logout', '2025-01-15 13:44:48.177126'),
(573, '1', 'User logged in', 'Login', '2025-01-15 13:44:57.203400'),
(574, '1', 'Re-assigned ticket #: PDCS1124002', 'Ticket', '2025-01-15 14:25:25.655154'),
(575, '1', 'Re-assigned ticket #: PDCS1124002', 'Ticket', '2025-01-15 14:27:26.510364'),
(576, '1', 'User logged out', 'Logout', '2025-01-15 14:27:51.681013'),
(577, '11', 'User logged in', 'Login', '2025-01-15 14:28:02.175448'),
(578, '11', 'User logged out', 'Logout', '2025-01-15 16:25:05.971431'),
(579, '1', 'User logged in', 'Login', '2025-01-15 16:25:12.905914'),
(580, '1', 'Updated status of user: #12 as Active', 'Account', '2025-01-15 16:33:34.789178'),
(581, '1', 'User logged out', 'Logout', '2025-01-15 16:34:07.580301'),
(582, '12', 'User logged in', 'Login', '2025-01-15 16:34:17.031057'),
(583, '12', 'Open new ticket #: PDCS0125001', 'Ticket', '2025-01-15 16:35:13.795408'),
(584, '12', 'User logged out', 'Logout', '2025-01-15 16:35:26.722306'),
(585, '1', 'User logged in', 'Login', '2025-01-15 16:35:35.380584'),
(586, '1', 'User logged in', 'Login', '2025-01-22 11:30:23.739061'),
(587, '1', 'User logged out', 'Logout', '2025-01-22 14:58:49.247501'),
(588, '11', 'User logged in', 'Login', '2025-01-22 14:58:54.103358'),
(589, '11', 'User logged out', 'Logout', '2025-01-22 16:14:05.525619'),
(590, '1', 'User logged in', 'Login', '2025-01-22 16:14:11.881422'),
(595, '1', 'Approve ticket #: PDCS1224002', 'Ticket', '2025-01-23 16:27:18.268462'),
(596, '1', 'User logged in', 'Login', '2025-01-23 16:44:51.346692'),
(597, '1', 'User logged in', 'Login', '2025-01-23 17:03:18.241203'),
(598, '1', 'Re-assigned ticket #: PDCS1224002', 'Ticket', '2025-01-24 19:50:54.625878'),
(599, '1', 'Re-assigned ticket #: PDCS1224002', 'Ticket', '2025-01-24 19:54:56.651882'),
(600, '1', 'Re-assigned ticket #: PDCS1224002', 'Ticket', '2025-01-27 15:34:28.675091'),
(601, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:35:40.264633'),
(602, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:37:41.914117'),
(603, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:39:17.246184'),
(604, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:42:39.459316'),
(605, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:42:56.686203'),
(606, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:47:54.701487'),
(607, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:49:15.396032'),
(608, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:54:40.480528'),
(609, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 17:55:09.718641'),
(610, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 23:39:25.195458'),
(611, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 23:39:38.735425'),
(612, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 23:40:02.687660'),
(613, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 23:40:57.760804'),
(614, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-27 23:42:54.321555'),
(615, '1', 'Finished ticket report of: #PDCS1224002', 'Report', '2025-01-28 00:40:31.692004'),
(616, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 00:43:41.948529'),
(617, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:01:22.557313'),
(618, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:01:54.347883'),
(619, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:04:01.168134'),
(620, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:04:06.976154'),
(621, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:04:26.646991'),
(622, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:05:04.678227'),
(623, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:12:07.471929'),
(624, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:12:16.423417'),
(625, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:33:29.172485'),
(626, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:36:36.980231'),
(627, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:36:58.431403'),
(628, '1', 'Updated ticket report of: #PDCS1224002', 'Report', '2025-01-28 13:37:08.242254'),
(629, '1', 'Finished ticket report of: #PDCS1224002', 'Report', '2025-01-28 14:13:55.096967'),
(630, '1', 'Finished ticket report of: #PDCS1224002', 'Report', '2025-01-28 14:14:44.920753'),
(631, '1', 'Finished ticket report of: #PDCS1224002', 'Report', '2025-01-28 14:15:18.105430'),
(632, '1', 'Finished ticket report of: #PDCS1224002', 'Report', '2025-01-28 14:16:39.959608'),
(633, '1', 'Approve ticket #: PDCS1224005', 'Ticket', '2025-01-30 16:11:48.753264'),
(634, '1', 'Approve ticket #: PDCS1024001', 'Ticket', '2025-01-30 16:22:40.893416'),
(635, '1', 'Updated ticket report of: #PDCS1024001', 'Report', '2025-01-30 16:25:56.810288'),
(636, '1', 'User logged in', 'Login', '2025-01-31 08:14:05.286642'),
(637, '1', 'Closed ticket #: PDCS1224002', 'Ticket', '2025-02-02 20:49:07.085735'),
(638, '1', 'Closed ticket #: PDCS1224002', 'Ticket', '2025-02-02 20:51:39.004720'),
(639, '1', 'Updated ticket report of: #PDCS1224005', 'Report', '2025-02-02 22:48:44.954210'),
(640, '1', 'Approve ticket #: PDCS1024002', 'Ticket', '2025-02-02 22:50:07.456385'),
(641, '1', 'Approve ticket #: PDCS1124002', 'Ticket', '2025-02-02 22:52:32.755062'),
(642, '1', 'Added new user id: #18 as maintenance', 'Account', '2025-02-02 22:54:48.162463'),
(643, '1', 'User logged out', 'Logout', '2025-02-03 00:00:34.065900'),
(644, '14', 'User logged in', 'Login', '2025-02-03 00:01:20.866618'),
(645, '14', 'User logged out', 'Logout', '2025-02-03 00:02:48.363692'),
(646, '1', 'User logged in', 'Login', '2025-02-03 00:04:02.651891'),
(647, '1', 'Updated password of user: #15', 'Account', '2025-02-03 00:04:18.620874'),
(648, '1', 'User logged out', 'Logout', '2025-02-03 00:04:24.067379'),
(649, '15', 'User logged in', 'Login', '2025-02-03 00:04:33.070197'),
(650, '15', 'User logged in', 'Login', '2025-02-03 00:12:23.754369'),
(651, '15', 'User logged in', 'Login', '2025-02-03 00:12:58.174591'),
(652, '15', 'User logged out', 'Logout', '2025-02-03 00:44:35.046420'),
(653, '15', 'User logged in', 'Login', '2025-02-03 00:44:44.462955'),
(654, '15', 'User logged out', 'Logout', '2025-02-03 01:24:23.190500'),
(655, '17', 'User logged in', 'Login', '2025-02-03 01:24:57.816662'),
(656, '17', 'User logged out', 'Logout', '2025-02-03 01:25:08.062708'),
(657, '16', 'User logged in', 'Login', '2025-02-03 01:25:17.562621'),
(658, '16', 'User logged out', 'Logout', '2025-02-03 01:36:32.661037'),
(659, '15', 'User logged in', 'Login', '2025-02-03 01:36:44.602601'),
(660, '15', 'User logged out', 'Logout', '2025-02-03 11:17:24.017574'),
(661, '1', 'User logged in', 'Login', '2025-02-03 11:17:33.218866'),
(662, '1', 'User logged out', 'Logout', '2025-02-03 11:22:13.134222'),
(663, '15', 'User logged in', 'Login', '2025-02-03 11:22:43.029045'),
(664, '15', 'User logged out', 'Logout', '2025-02-03 11:23:55.143616'),
(665, '14', 'User logged in', 'Login', '2025-02-03 11:24:01.290175'),
(666, '14', 'User logged out', 'Logout', '2025-02-03 11:24:18.792456'),
(667, '15', 'User logged in', 'Login', '2025-02-03 11:24:23.874135'),
(668, '15', 'User logged out', 'Logout', '2025-02-03 11:24:35.789053'),
(669, '1', 'User logged in', 'Login', '2025-02-03 11:24:41.797538'),
(670, '1', 'User logged out', 'Logout', '2025-02-03 11:27:29.914137'),
(671, '15', 'User logged in', 'Login', '2025-02-03 11:27:35.539577'),
(672, '15', 'User logged out', 'Logout', '2025-02-03 11:36:51.744336'),
(673, '14', 'User logged in', 'Login', '2025-02-03 11:43:56.737293'),
(674, '14', 'Open new ticket #: PDCS0225001', 'Ticket', '2025-02-03 11:46:20.709065'),
(675, '14', 'User logged out', 'Logout', '2025-02-03 11:49:54.924871'),
(676, '1', 'User logged in', 'Login', '2025-02-03 11:50:00.732851'),
(677, '1', 'Approve ticket #: PDCS0225001', 'Ticket', '2025-02-03 11:55:01.840706'),
(678, '1', 'Re-assigned ticket #: PDCS0225001', 'Ticket', '2025-02-03 11:56:37.906974'),
(679, '1', 'Updated ticket report of: #PDCS0225001', 'Report', '2025-02-03 11:58:30.598296'),
(680, '1', 'Updated ticket report of: #PDCS0225001', 'Report', '2025-02-03 11:58:46.148069'),
(681, '1', 'User logged out', 'Logout', '2025-02-03 12:00:25.672634'),
(682, '14', 'User logged in', 'Login', '2025-02-03 12:00:41.305281'),
(683, '14', 'User logged out', 'Logout', '2025-02-03 12:01:19.578681'),
(684, '15', 'User logged in', 'Login', '2025-02-03 12:01:26.846338'),
(685, '15', 'User logged out', 'Logout', '2025-02-03 12:02:40.126942'),
(686, '1', 'User logged in', 'Login', '2025-02-03 12:02:45.566536'),
(687, '1', 'User logged out', 'Logout', '2025-02-03 12:09:18.199368'),
(688, '14', 'User logged in', 'Login', '2025-02-03 12:09:22.514439'),
(689, '14', 'User logged out', 'Logout', '2025-02-03 12:45:31.438601'),
(690, '1', 'User logged in', 'Login', '2025-02-03 12:45:40.417764'),
(691, '1', 'Finished ticket report of: #PDCS0225001', 'Report', '2025-02-03 12:52:27.849249'),
(692, '1', 'User logged out', 'Logout', '2025-02-03 16:48:56.445399'),
(693, '15', 'User logged in', 'Login', '2025-02-03 16:55:18.972972'),
(694, '15', 'User logged in', 'Login', '2025-02-12 15:57:59.593390'),
(695, '15', 'User logged out', 'Logout', '2025-02-17 19:04:47.363045'),
(696, '1', 'User logged in', 'Login', '2025-02-17 19:04:59.009308'),
(697, '1', 'User logged out', 'Logout', '2025-02-17 19:05:42.619066'),
(698, '17', 'User logged in', 'Login', '2025-02-17 19:05:50.414941'),
(699, '17', 'User logged in', 'Login', '2025-02-19 16:08:30.375274'),
(700, '17', 'User logged in', 'Login', '2025-02-21 19:47:41.831567'),
(701, '17', 'User logged in', 'Login', '2025-02-24 19:17:09.567410'),
(702, '17', 'User logged in', 'Login', '2025-02-26 16:40:56.615188'),
(703, '17', 'User logged out', 'Logout', '2025-02-26 17:24:41.216689'),
(704, '16', 'User logged in', 'Login', '2025-02-26 17:24:49.818979'),
(705, '16', 'User logged out', 'Logout', '2025-02-26 17:34:18.480778'),
(706, '17', 'User logged in', 'Login', '2025-02-26 17:34:25.064550'),
(707, '1', 'User logged in', 'Login', '2025-03-11 17:04:12.673952'),
(708, '1', 'User logged in', 'Login', '2025-03-11 17:04:16.215886'),
(709, '1', 'User logged out', 'Logout', '2025-03-14 10:13:28.669584'),
(710, '17', 'User logged in', 'Login', '2025-03-14 12:38:55.091117'),
(711, '17', 'User logged out', 'Logout', '2025-03-14 12:41:13.329984'),
(712, '1', 'User logged in', 'Login', '2025-03-14 12:41:30.169723'),
(713, '1', 'Closed ticket #: PDCS0225001', 'Ticket', '2025-03-14 12:43:54.097678'),
(714, '1', 'User logged out', 'Logout', '2025-03-14 12:44:18.721451'),
(715, '17', 'User logged in', 'Login', '2025-03-14 12:44:26.946938'),
(716, '17', 'User logged out', 'Logout', '2025-03-14 12:50:35.511275'),
(717, '1', 'User logged in', 'Login', '2025-03-14 12:50:41.089361'),
(718, '1', 'User logged out', 'Logout', '2025-03-14 12:50:57.464313'),
(719, '17', 'User logged in', 'Login', '2025-03-14 13:12:58.759013'),
(720, '17', 'User logged in', 'Login', '2025-03-14 15:46:55.010609'),
(721, '17', 'User logged out', 'Logout', '2025-03-14 16:35:35.430254'),
(722, '15', 'User logged in', 'Login', '2025-03-14 16:37:17.044684'),
(723, '15', 'User logged out', 'Logout', '2025-03-14 16:37:41.884912'),
(724, '1', 'User logged in', 'Login', '2025-03-14 16:37:50.211288'),
(725, '1', 'User logged out', 'Logout', '2025-03-14 16:38:20.199199'),
(726, '15', 'User logged in', 'Login', '2025-03-14 16:38:27.135228'),
(727, '15', 'Updated ticket report of: #PDCS1224005', 'Report', '2025-03-18 14:58:53.359874'),
(728, '15', 'Updated ticket report of: #PDCS1224005', 'Report', '2025-03-18 14:59:01.622684'),
(729, '15', 'Updated ticket report of: #PDCS1224005', 'Report', '2025-03-18 15:01:05.910929'),
(730, '15', 'Updated ticket report of: #PDCS1224005', 'Report', '2025-03-18 15:04:52.155974'),
(731, '15', 'Updated ticket report of: #PDCS1224005', 'Report', '2025-03-18 15:44:49.619947');

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
(5, 'Smart Broadband', '1', '2'),
(6, 'Aircon', '1', '7'),
(7, 'LCD Monitor', '1', '7'),
(8, 'Tablet', '1', '3'),
(9, 'Laptop', '1', '3'),
(10, 'Desktop/Computer', '1', '3'),
(11, 'CCTV Camera', '1', '4'),
(12, 'Digital Video Recorder (DVR)', '1', '4'),
(13, 'Converge Router', '1', '2'),
(14, 'Can\'t Edit', '1', '6');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notif`
--

CREATE TABLE `tbl_notif` (
  `id` int(100) NOT NULL,
  `notif_msg` varchar(5000) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '1',
  `user_id` int(100) NOT NULL,
  `post_date` datetime(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_notif`
--

INSERT INTO `tbl_notif` (`id`, `notif_msg`, `status`, `user_id`, `post_date`) VALUES
(1, 'You have successfully created ticket #: PDCS1224004', '0', 14, '2024-12-13 19:08:23.331982'),
(2, 'Your ticket #: , is declined due to <i>Duplicate Request</i>.', '0', 14, '2024-12-17 15:56:14.990477'),
(3, 'You have successfully created ticket #: PDCS1224005', '0', 14, '2024-12-17 16:08:00.720938'),
(4, 'Your ticket #: PDCS1024002, is approved. You may check the ticket status.', '0', 11, '2024-12-26 15:43:30.118930'),
(5, 'Your ticket #: PDCS1124002, is re-scheduled for the reason \"\".', '0', 11, '2025-01-08 11:09:33.155472'),
(6, 'Your ticket #: PDCS1224005, is re-scheduled for the reason \"Technical Issue\".', '0', 14, '2025-01-09 11:45:10.506499'),
(7, 'Your ticket #: PDCS1224005, is re-assigned to \"16\".', '0', 14, '2025-01-09 11:54:04.832358'),
(8, 'Your ticket #: PDCS1224005, is re-assigned to \"15\".', '0', 14, '2025-01-09 16:56:44.593803'),
(9, 'Your ticket #: PDCS1024002, is re-assigned to \"17\".', '0', 11, '2025-01-09 16:57:02.162838'),
(10, 'Your ticket #: PDCS1224005, is re-assigned to \"16\".', '0', 14, '2025-01-15 13:31:53.146635'),
(11, 'Your ticket #: PDCS1124002, is re-assigned to \"Andrew Siruma\".', '0', 11, '2025-01-15 14:27:26.515596'),
(12, 'You have successfully created ticket #: PDCS0125001', '1', 12, '2025-01-15 16:35:13.796757'),
(17, 'Your ticket #: PDCS1224002, is approved. You may check the ticket status.', '0', 14, '2025-01-23 16:27:18.269189'),
(18, 'Your ticket #: PDCS1224002, is re-assigned to \"Arjay Oropesa\".', '0', 14, '2025-01-24 19:50:54.633228'),
(19, 'Your ticket #: PDCS1224002, is re-assigned to \"Arjay Oropesa\".', '0', 14, '2025-01-24 19:54:56.655335'),
(20, 'Your ticket #: PDCS1224002, is re-assigned to \"Adan Flores\".', '0', 14, '2025-01-27 15:34:28.678410'),
(21, 'Your ticket #: PDCS1224005, is approved. You may check the ticket status.', '0', 14, '2025-01-30 16:11:48.759253'),
(22, 'Your ticket #: PDCS1024001, is approved. You may check the ticket status.', '1', 11, '2025-01-30 16:22:40.899475'),
(23, 'Your ticket #: PDCS1224002, is now closed. The issue has been resolved.', '0', 14, '2025-02-02 20:49:07.096275'),
(24, 'Your assigned ticket:PDCS1224002, is now closed. The issue has been resolved.', '1', 16, '2025-02-02 20:49:07.100440'),
(27, 'Your ticket #: PDCS1024002, is approved. You may check the ticket status.', '1', 11, '2025-02-02 22:50:07.458515'),
(28, 'Your ticket #: PDCS1124002, is approved. You may check the ticket status.', '1', 11, '2025-02-02 22:52:32.757701'),
(29, 'You have successfully created ticket #: PDCS0225001', '0', 14, '2025-02-03 11:46:20.712110'),
(30, 'Your ticket #: PDCS0225001, is approved. You may check the ticket status.', '0', 14, '2025-02-03 11:55:01.842147'),
(31, 'Your ticket #: PDCS0225001, is re-assigned to \"Arjay Oropesa\".', '0', 14, '2025-02-03 11:56:37.908007'),
(32, 'Your ticket #: PDCS0225001, is now closed. The issue has been resolved.', '1', 14, '2025-03-14 12:43:54.099630'),
(33, 'Your assigned ticket:PDCS0225001, is now closed. The issue has been resolved.', '1', 17, '2025-03-14 12:43:54.100601');

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
  `signature_client` longtext DEFAULT NULL,
  `signature_personnel` longtext DEFAULT NULL,
  `modify_date` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `posted_date` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_ticketreport`
--

INSERT INTO `tbl_ticketreport` (`id`, `ticket_num`, `outlet_id`, `emp_id`, `status`, `report_type`, `outlet_name`, `emp_name`, `ticket_date`, `time_in`, `time_out`, `subj`, `findings`, `action`, `diagnosis`, `recom`, `fn_client`, `signature_client`, `signature_personnel`, `modify_date`, `posted_date`) VALUES
(1, 'PDCS1224002', '14', '16', '0', '1', 'DD-ATC', 'Adan Flores', '2024-12-13', '09:45:00.000000', '20:40:00.000000', 'Internet - Smart Broadband', '- Sample\r\n- Testing', '- Data Testing\r\n- Data Entry', '', '', 'John Doe', 'data:image/png;base64,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', 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAZAAAACWCAYAAADwkd5lAAAAAXNSR0IArs4c6QAAFzpJREFUeF7tnQcUNUdZhl9AQZCiIr0jYAEEItVQFKSIQIKCkEDovVgpohHFgCQiKIioSJEaikTpRjixovQgB6VjwIIcpEQwiDT3jTMwLHvvnZ17t80+c07On/Dv7sw8s+x7Z752DtEgAAEIQAACBQTOUXAPt0AAAhCAAASEgPASQAACEIBAEQEEpAgbN0EAAhCAAALCOwABCEAAAkUEEJAibNwEAQhAAAIICO8ABCAAAQgUEUBAirBxEwQgAAEIICC8AxCAAAQgUEQAASnCxk0QgAAEIICA8A5AAAIQgEARAQSkCBs3QQACEIAAAsI7AAEIQAACRQQQkCJs3AQBCEAAAggI7wAEIAABCBQRQECKsHETBCAAAQggILwDEIAABCBQRAABKcLGTRCAAAQggIDwDkAAAhCAQBEBBKQIGzdBAAIQgAACwjsAAQhAAAJFBBCQImzcBAEIQAACCAjvAAQgAAEIFBFAQIqwcRMEIAABCCAgvAMQgAAEIFBEAAEpwsZNEIAABCCAgPAOQAACEIBAEQEEpAgbN0EAAhCAAALCOwABCEAAAkUEEJAibNwEAQhAAAIICO8ABCAAAQgUEUBAirBxEwQgAAEIICC8AxCAAAQgUEQAASnCxk0QgAAEIICA8A5AAAIQgEARAQSkCBs3QQACEIAAAsI7AAEIQAACRQQQkCJs3AQBCEAAAggI7wAEIAABCBQRQECKsHETBCAAAQggILwDEIAABCBQRAABKcLGTRCAAAQggIDwDtRM4EKSzqx5gswNAlMSQECmpE/fQxJ4jqS7STpZ0rFDdsSzIbBWAgjIWle+/nm/Q9I1wjSfK+nu9U+ZGUJgXAIIyLi86W08Am+XdK3Q3Uck3VLSe8brnp4gUD8BBKT+NV7rDFMBiQyeKek+awXCvCFwaAIIyKGJ8ry5EPhTSUdJOi0M6KaSPiHp4pK+OJdBMg4ILJkAArLk1WPs2wj8qqRfkfQYSY+V9B+SLizpiZIeBjoIQGB/AgjI/gx5wjwJxB3IyyUdLelpkh7Y/PMxSZdmFzLPRWNUyyKAgCxrvZY62idL+ilJJ0p61EiTaAvINyW7kD9o/v0BI42DbiBQLQEEpNqlnc3Ezifp3yU5qO+pjR3ioSONzMdXPsbyEZb/dDtF0u0lPS/EiIw0FLqBQJ0EEJA613VOszqhOS46vjFony7piBEHltpAooC0dyUjDoeuIFAfAQSkvjWd04wu2fzS/5Ck80i6gaQ3jji4KCBxF+KuEZARF4Cu6ieAgNS/xlPO8EWS7iTJfx4z8kBeIumOkpzS5B6hbwRk5EWgu7oJICB1r++Us7t+E/39943R/POSrhjsIGOO54VBtE5tdj63QkDGRE9fayGAgKxlpcefZ4wEtw3k0eN3rztIeqmkFzcpTO4c+u8yrE8wNLqEQB0EEJA61nFus3AWXB8d2fvqypLOmmCA1ws2l7+TdGTov8uwPsHQ6BICdRBAQOpYxznNwm67Z0i6SMiA60y4U7RLNXmv/lWSEyleriUgqWF9irHRJwSqIICAVLGMs5rEVG67bQh+t78U/jl3k9bkK3hhzeo9YTAVEEBAKljEGU1hSrfdLgzefVxGkncjPk7DC2tGLwtDWT4BBGT5azinGUS3XY/pWZLuPfHgbP9w/IntIW9uxoINZOIFofu6CCAgda3nlLOJbrs+KvJ75ey3l5hyQMED6yelsz2yXsYOZOLVoPvqCCAg1S3pZBOKbrv/0yRN/BZJZ0r6tslG8/8dv1LSbSQ9XdL9EZCJV4PuqyOAgFS3pJNM6KTGVfcRkj4l6XPNB9u2ENscbHuYssUU7q+TdItQH6SdYHHK8dE3BBZNAAFZ9PLNYvBOk2532YuFX/rHSTpv88v/rZKuM/EIXQf9z0JE/A9iA5l4Nei+OgIISHVLOvqE7huE478lfWvS+ytCSdnRB5R0aA8se2J9tqlEeIFEQIgDmXJV6LsaAghINUs5yUS8+/hg43F12Y7eYyXASQaWdPoZSecPVQhd2taJFadI7jg1B/qHwMEJICAHR7qqB8bdR/S8cqW/j4Zf+mkhpymhOKGjPcR8nPWkJj/WVZva6L8TKiROOS76hsDiCSAgi1/CySbQ3n04SM/V/uYWa/EXkn5I0skhqeIngpH/C5ORo2MIVEIAAalkISeYRtx9uOv/apInXqH5Vf/JGQqId0X3kxRtNI+X9IsT8KJLCFRHAAGpbklHmVB79/Hrkn4p9NxVCXCUQW3o5FwhueOlQz4sC92HpxwQfUOgFgIISC0rOe48fqP5Rf/w0OV/hojzL4b/nmO+qVdJ+rFm5/G/kpwt2EkWaRCAwJ4EEJA9Aa7wdkeX/3MSZf67kh6ScJijgLxBkuNA3O7TJFh85grXjSlD4OAEEJCDI63+gU4LYvuH278E20f6i37qqn/fHiLi04Ww4fw7toy5+kVjghAYggACMgTVep/pzLbOcBvddi0kz2hNdyoBccbdJ4fMu4+TdHwY1/dK+qeQ3NHvuyPmT2xqtT+q3mViZhAYhwACMg7nGnqx4fxdjTvsd+/4JT+FG6/TlTjOI7bfk/Sg8B+/3exIflrS34agx7tLer2km9ewKMwBAlMSQECmpL+svu366l/2NpZbTLp2H57R2AJySog/cd921b1Tk4Pr1Qna+Pd25/Xx29uCkFxpWfgZLQTmRwABmd+azHFEdn19t6TzhMG51ofdYru8mcYSEO84HBxom4ebAwadcTd6g0WOfyLp6JCXy95YzovlZI+u2W4PMhoEIFBIAAEpBLey22I0t6O3v7nJLfWbiRtvG8UYApJ6Vbn/v5T0wxvW5PSmDsg1JV1D0jub6/5K0o2DoDjhIw0CECgkgIAUglvRbQ4StME5isdLG6O0q/xtakMGEl4wVBb8kdC5a454LBaUTc01Sux67PgP1yqxAf2RFRrSu7zPVvSaMtUpCCAgU1BfTp+O4v634LnkUX9a0neFlCVjC8jNJD1f0sVDxz6Ouu0OlD6qOiu49UY33qNCZULvRJwja+ntexomv98c4d0kTGQOteiXzpTxZxJAQDJBrfQyB939oaQvSzpn8+ejJZ2wg8WhAwldHtdHZvaqiu9rrheVj63e0RxX+RjriDDu75T08bAbcZp3z22p7YWSjmkNPp3rUufFuBdCAAFZyEIVDtNHN941lDTvPhxx7qJMbtvsDOnzDykgrmj4guafK0uKtdbPkOR4FBvyd7W427Ah/ceTi13D5IpBVPzBHapdKNSG3/R8R8TfK/nLvruHN0m6blgn83HMCwIy1Gry3G8ggIDU+1I8T9JdFzq9PwpHZ7/Q7HgsZE5+eLkwFxvLLWY5zXU/nGalXR3RNdJtR3mqpIfmPKjgmq7dwfub40DHqNiO5DLAb5d0reTZfT7+dqW2iF44PNN16C2YcynkVYCMW5ZGAAFZ2orlj9cfYQfNLbHZ2G37hasJOrLdlQRtBO/7wf8HSd/fcfTmj/gDmp3MqZJuNQCgGDOz7dGOjvcO5VLhOM3z7SMgtnvcvxFAp2mxXeiPEZABVpJHbiWAgNT9gsQo7D7HPiYSbR/+9/c2H6erdcRXbCK3jxfWX0u6UXjw30i6W1PL/Inh+CkWrMpdMe9YfATXVUDqhpL8/H8Mc8t95q7rbNC2zcjPd/vZxgPMa+DmuBl7jDkA09elLQZn9hEQOxTcpXFPjsdz244O06Oyvsdku+bM36+YAAJS/+K/NvzKdrqPH82Yro+MnCTxEuFaZ7F1Wdjcto8N5KTGa+oRkl4SjMN2H/bu48xgs3DBqtzmwlE+AusqIOXdjHc3bhcInlq5z910nbMSx/QpvqZtd0nvi2LisZ07+Ys+AtLmvI17elTWp499mXB/5QQQkMoXOBxvWAAuH5IN/syOKae7D/+adjW/Pm0fAWn34/xVR4ZdyMN6DMLBjo4RsX1gUwEp7z6+LzzfCSL3bfb2stfXaUG43rLjgc8JO6z0Mucau3rmQNqco0h0CUQ8youPpiZ8JmQu204AAVnHG+J4B0eTuz0wxA10zdy7D3tt2b3VXj3ehfT14jpUNl6PxaVyvVu4aHC9zV2txwS7x1ubvFj25OpqNsQ7dqJEJNvP8y4mpkWxm3Dc3Wwb7ysl3SbYYWwH8TGhW5oIctv9UYBsrPdR1ibh7jLmeyfnrMTttC+5fLkOAmcTQEDW8yLYaOyPk9smT6ZoM/E1TjxoI23fdqhUJlH0nH7Ev+z7NO+4rt8cD6Wldtv3/1Yjjt6N2Rsquir36SO91naan2sEYZtgtZ8dP/j2ELOh3ztEN6ek37VL9HUxRYuTRHptu7i3dzl2rLhdqI3y3AU7WZSuE/cdmAACcmCgM3/cNqP6VUOuKAcM7uOddCgBifYQ/2lbRm7L3bl4Z/NRSU6P4sSMf57bQes6u9P6uMzJGR1k6WDLnBaPnJzc0Ts+N3tS3THj5q4dT9cOJN3lRG+zZzc14u8R+nhKSHWf0SWXQOAbCSAg63sruozqzrLrX+I+ftm3bvihBMQ7D9sDvBNx2pHc1mfnEgXV6d99nFTS/Ev+uJDepc+x0PtCgKT7/HzIdJwbwxHF1bYb24jcumwgLwrp7dv5y14cPML67JhK2HBP5QQQkMoXuGN6jhloG9WjPcCX+9gj/kItobOPG2/sz15K9gRzHivvELrSxm8aW5+di6PRPxAe5PogH+o54fSIyL/s06jybY9yKhbn9nJzskfvYLwDzPWQiu7OPjqLzgXtHUg70DD1EEurNEZvu55T53IIYANZ6zuQGtX96z4m4jvEufghvLAcMPjgIHR2I+7T+u5cvPu4dYjXcNxGnxY9r/p4T8XU+O7HkeROTumdhO08uc+JNd4tBO8JA27v/NqBhm2Dedcz+sydayGAEX3F70BqVDcGV+q79gF47Csg3hX7OM2pOfraP0p2LrZ/OEbGHl/+Ne5dT27b5jrb9YxfbpJS/lr4C3tC2W7iZI7pTsaxL045v6lt2j20BaQdaNh+XnQ0eFoQ69w5cx0EvkqAI6z1vgz+ePkXsI3m/og5J5N/ve/b9rWB7PNBj95Q/pV/08yJ+P8DTllv8egrWLkC4mBBi8SdkzG1d3v2vLJnmNu2misxRc2bJV0veV5buHetQzzq+1iIkselN/OF4bKvEUBA1vs2OLFfWhc8N1J9F7F9dyClR0oWRNsw7NHkXFSO8s5tjgVxAKULU8U0JDn35giICz3ZccEf+5gWf1MKFUfgRy+sTceJMUmmsxSnyTLbY9lkQI/zso3EwukYm0McXebw4prKCCAglS1o5nT8kfLHys0fGsdM5Eaq7+piHwHZx6j9spAza1fFxK7xlwQC+jm7BOQqQTw8Lx+N2XXYbdsH27XnnSvLtg0fV7Xbpp1Fyv0OTcCodxYuorUtMDHGwrgPG+O9g6NBIJsAApKNqpoL/VFxPQzXCnHEtNN92BU0J1I9B8Kuo5Ntzyh1qz0+xGDkVEzc1L9Tj9gG9ISQjytnru107Dn37BK41B7Sde2mnUUqILbn5LoWOwAyCof593UkyJkz11RKAAGpdGG3TMtJ/o4Of58mGsyJVM+hVboDKQ3sS4+uLCSPyxlkxzXR86tPEGW7INSurnMDBTcdZfnYadPOokvMcl2L7f1lN+I3hmJdu+bB30PgbAIIyLpehHh09ZUw7XaiwdL07ynFUgFx2dqfD+fy9qbKbfscXaV9ROO9vZP6ug6nz4lZgP2/pQK9qzphe77xo54G+50cDPFduazaYuZrj82EuOsoLvMxXLY2AgjIelbcR1c2nPtPN5dDte2j3fqmf2/fXyogrs9hA7Y/hDZo57QoiP6guuxtn3Tv7ec7H9ZHGluAU4vYJtK3uXa7DdsunfuFMAfbOkpbO47DSRGjgX3XzqKvWJWuWencuK8SAghIJQuZMY14dBWLFz288Vjyr/5264pUz3j8Vy8p+TWbm78qHUcqiD/RJCQ8pc8gN1xrm5C9uLwDsodSbnMKGHux/UCoXeK0KE5Fv09LI8nT5+yyoZT0eU9JLjTlSHqLEw0CWQQQkCxMi7/IRZrs9+9fxq6VsesjlJv+vQuMj1z8Id20w+m6p0/+qni/s9jeNmMufRYvBtf1Sa7omiLetV02uBG7aJfzXB2iRffi+KxcG8oh+uYZENhJAAHZiaiKCxxlfkSYSW51v1Kj+q4UGl1A++Sv8v0uiPSQcNzk0rX7HF2l44lpRnJrhFho/FH3rsU7DqdKd26rIVrfY6khxsAzIfB1BBCQ+l+IWBvcCQl9LNJV4nUThRKjuvtwKhJnps2N7O6TvyrdHeXWzshdZdfWcAVGR+jbJrItOtu1zS2WjuS3a63rt3uHR4PAagggIPUvdfQKsoD4n9yKeZFMiVE9pttw1tmb70DcJ3/VvvaZXaudRme7FrtzV7WbBeNJoY6Gvdlc/8PX0iCwOgIISN1LHmuDWzTcXBv7mj2nXPLR9nGZj80csJimS+nq2oF7joLOSSNSImY9p3t25LaP79JaG/EZjlWxsd5HV66bcsyBjPd9x8j1EJgFAQRkFssw2CCirSB24NQVjjzu2/oa1f0r3e6w5w0ZZ2O98K5+HbzmPFHbys/6vvhhPyMEu/mYaYi2Ka2J65a/JpSf9XzsaWVHARoEVksAAal76f2Bu26YYp/Asi4qfY3qrjNy46ZI0lGNAd8eU10tNwdVrKDnZ2yq537IlfROzXXKbdvwLsP/7pK3tuvYw8rHco4ZoUFg1QQQkLqXP627XRIc16bTx6jumhaPDLUtXOOiq8X069tKq6Zpzh1Md5cRlixNMmjvKh/J+fjKXlq3D7EeIwyDLiAwbwIIyLzXZ9/R+YPrX9C7Ipf79JNrh/DOwxHO3on4CKzdUoP1CcEY3b7GLrIOEnTrm6K9z5y6rk3zUfnvny7JZWH7lNfddwzcD4FZE0BAZr08Bxmc61EcMjYh16huw/3Hm13I50KchGthpG1bvIjH7DQgtjO42b3WR2hjt1jVz/m2nCKdBgEIJAQQEF6HEgK5RnV7YbkWho+ATm91tKnkqisJesfkyG7bGZxm47SSQR7oHgL4DgSSx9RHAAGpb03HmlGOUT1Gdnd5f3Ul8Eu9xl4Valq4xgcNAhCYIQEEZIaLsqAh7TKqb4vxaCddTI3l5Hxa0EvAUNdLAAFZ79ofaubbjOrb3HQ3VfNzRTwLEw0CEJg5AQRk5gu0gOHtMqpvKhXbVc1v31iVBeBiiBCohwACUs9aTjmTbUb13FKxGKunXEH6hkABAQSkABq3dBLYZFQ/VKlYsEMAAjMjgIDMbEEWPpwuo/q+pWIXjoThQ6BeAghIvWs71cy6jOqlpWKnmgP9QgACGQQQkAxIXNKLQJdRvaRUbK9OuRgCEBifAAIyPvM19Ng2qh8r6UaSxkqGuAbGzBECkxNAQCZfgmoHkBrVXSzqyAMndawWHBODwFIIICBLWalljjMa1c8K6dBfLunoZU6FUUMAAm0CCAjvxNAEolHd/SAgQ9Pm+RAYkQACMiLslXZlo7qz8rog04clXX6lHJg2BKojgIBUt6SznNCpkm4RRuY07sfNcpQMCgIQ6EUAAemFi4v3IBAr/MU643s8ilshAIE5EEBA5rAK6xlDLBK1nhkzUwhUTAABqXhxmRoEIACBIQkgIEPS5dkQgAAEKiaAgFS8uEwNAhCAwJAEEJAh6fJsCEAAAhUTQEAqXlymBgEIQGBIAgjIkHR5NgQgAIGKCSAgFS8uU4MABCAwJAEEZEi6PBsCEIBAxQQQkIoXl6lBAAIQGJIAAjIkXZ4NAQhAoGICCEjFi8vUIAABCAxJAAEZki7PhgAEIFAxAQSk4sVlahCAAASGJICADEmXZ0MAAhComAACUvHiMjUIQAACQxJAQIaky7MhAAEIVEwAAal4cZkaBCAAgSEJICBD0uXZEIAABCom8H9dIg3TWOOMGgAAAABJRU5ErkJggg==', '2025-01-27 15:34:28.000000', '0000-00-00 00:00:00.000000'),
(2, 'PDCS1224005', '14', '15', '0', '1', 'DD-ATC', 'Andrew Siruma', '2024-12-17', '00:00:00.000000', '00:00:00.000000', 'Digital Devices - Laptop', '', '', '', '', '', '', 'data:image/png;base64,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', '2025-01-30 16:11:48.760622', '0000-00-00 00:00:00.000000'),
(3, 'PDCS1024001', '11', '15', '0', '1', 'Head Office', 'Andrew Siruma', '2024-10-30', '00:00:00.000000', '00:00:00.000000', 'POS - POS Printer', '- A', '- B', '- C', '- D', '', '', '', '2025-01-30 16:22:40.902662', '0000-00-00 00:00:00.000000'),
(4, 'PDCS1024002', '11', '17', '0', '1', 'Head Office', 'Arjay Oropesa', '2024-10-30', NULL, NULL, 'POS - POS Printer', '', '', '', '', '', NULL, NULL, '2025-02-02 22:50:07.460741', '0000-00-00 00:00:00.000000'),
(5, 'PDCS1124002', '11', '17', '0', '1', 'Head Office', 'Arjay Oropesa', '2024-11-12', NULL, NULL, 'POS - POS', '', '', '', '', '', NULL, NULL, '2025-02-02 22:52:32.759338', '0000-00-00 00:00:00.000000');
INSERT INTO `tbl_ticketreport` (`id`, `ticket_num`, `outlet_id`, `emp_id`, `status`, `report_type`, `outlet_name`, `emp_name`, `ticket_date`, `time_in`, `time_out`, `subj`, `findings`, `action`, `diagnosis`, `recom`, `fn_client`, `signature_client`, `signature_personnel`, `modify_date`, `posted_date`) VALUES
(6, 'PDCS0225001', '14', '17', '0', '1', 'DD-ATC', 'Arjay Oropesa', '2025-02-03', '11:58:00.000000', '13:00:00.000000', 'POS - POS', '-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff\n-dffdfd\n-gfkmkms\n-fddff', '-dfdfdf', '-mdmd', '-mdmdmd', 'John Doe', 'data:image/png;base64,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', 'data:image/png;base64,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', '2025-02-03 11:56:37.000000', '0000-00-00 00:00:00.000000');

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
(1, 'PDCS1024001', '11', 'Hanamichi Sakuragi', '1', '1', '2', 'TRHOANGELO_10232024.jpg', '../img/sup_doc/TRHOANGELO_10232024.jpg', 'Test Data', 'P4', 'Issue', '1', 'Our team has received your request, and we\'re already reviewing the details. We\'ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.', '2025-02-03', '2025-02-05', '15', '0', '0', '2024-10-30 10:41:49.643451', '2025-01-30 16:22:40.000000', NULL),
(2, 'PDCS1024002', '11', 'Joshua Garcia', '1', '1', '2', '457377830_565243119158694_2829328946720226073_n.jpg', '../img/sup_doc/457377830_565243119158694_2829328946720226073_n.jpg', 'Test 2', 'P4', 'Issue', '1', 'Our team has received your request, and we\'re already reviewing the details. We\'ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.', '2025-02-02', '2025-02-05', '17', '0', '0', '2024-10-30 10:53:27.928812', '2025-02-02 22:50:07.000000', NULL),
(4, 'PDCS1024003', '11', 'AJ Raval', '2', '7', '6', 'tabletvslaptop.png', '../img/sup_doc/tabletvslaptop.png', 'Test 3', NULL, NULL, '2', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-10-30 11:55:52.084329', NULL, NULL),
(5, 'PDCS1124001', '11', 'LeBron James', '2', '7', '6', 'PreventiveTR_TIMES110524.jpg', '../img/sup_doc/PreventiveTR_TIMES110524.jpg', 'Test data entry only.', NULL, NULL, '3', 'Not Applicable', NULL, NULL, '', '0', '0', '2024-11-12 10:57:30.322534', '2024-12-13 13:38:56.000000', NULL),
(6, 'PDCS1124002', '11', 'James Harden', '1', '1', '3', 'PreventiveTR_JMB110624.jpg', '../img/sup_doc/PreventiveTR_JMB110624.jpg', 'kjl', 'P1', 'Issue', '1', 'Our team has received your request, and we\'re already reviewing the details. We\'ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.', '2025-02-03', '2025-02-05', '17', '0', '0', '2024-11-12 11:38:15.087404', '2025-02-02 22:52:32.000000', NULL),
(7, 'PDCS1124003', '11', 'Stephen Curry', '1', '2', '4', 'PreventiveTR_MANUELA110524.jpg', '../img/sup_doc/PreventiveTR_MANUELA110524.jpg', 'Test data entry only.', NULL, NULL, '3', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-11-12 11:58:14.112935', '2024-12-13 13:27:32.000000', NULL),
(8, 'PDCS1224001', '14', 'Kai Sotto', '2', '7', '7', 'PreventiveTR_ATC110424.jpg', '../img/sup_doc/PreventiveTR_ATC110424.jpg', 'Test Data Only', NULL, NULL, '2', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-12-03 11:28:10.680195', NULL, NULL),
(9, 'PDCS1224002', '14', 'Steve Nash', '1', '2', '5', 'PreventiveTR_SFPILAR110424.jpg', '../img/sup_doc/PreventiveTR_SFPILAR110424.jpg', 'For data testing only.', 'P2', 'Issue', '5', 'Ticket #PDCS1224002 has been closed because the issue is resolved.', '2025-01-27', '2025-01-28', '16', '0', '1', '2024-12-13 19:03:25.950482', '2025-02-02 20:51:39.000000', '2025-02-02 20:51:39'),
(10, 'PDCS1224003', '14', 'Michael Jordan', '1', '2', '5', 'PreventiveTR_SFPILAR110424.jpg', '../img/sup_doc/PreventiveTR_SFPILAR110424.jpg', 'For data testing only.', NULL, NULL, '3', 'Duplicate Request', NULL, NULL, '', '0', '0', '2024-12-13 19:07:07.700117', '2024-12-16 13:36:28.000000', NULL),
(11, 'PDCS1224004', '14', 'John Doe', '1', '2', '5', 'PreventiveTR_FSKIOSK110424.jpg', '../img/sup_doc/PreventiveTR_FSKIOSK110424.jpg', 'For data testing only.', NULL, NULL, '3', 'Duplicate Request', NULL, NULL, '', '0', '0', '2024-12-13 19:08:23.315041', '2024-12-17 15:56:14.000000', NULL),
(12, 'PDCS1224005', '14', 'Donald Trump', '1', '3', '9', 'bootstrap-messages-or-conversations as Smart Object-1.png', '../img/sup_doc/bootstrap-messages-or-conversations as Smart Object-1.png', 'For data testing only.', 'P2', 'Issue', '1', 'Our team has received your request, and we\'re already reviewing the details. We\'ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.', '2025-01-30', '2025-01-31', '15', '0', '0', '2024-12-17 16:08:00.718386', '2025-01-30 16:11:48.000000', NULL),
(13, 'PDCS0125001', '12', 'Juan Dela Cruz', '1', '2', '4', 'White Wireless Router.E01.watermarked.2k.png', '../img/sup_doc/White Wireless Router.E01.watermarked.2k.png', 'For data testing only', NULL, NULL, '2', 'Our team has received your request, and weâ€™re already reviewing the details. Weâ€™ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.', NULL, NULL, '', '0', '0', '2025-01-15 16:35:13.793874', '2025-01-15 16:35:13.793874', NULL),
(14, 'PDCS0225001', '14', 'Juan Dela Cruz', '1', '1', '3', '337111979_779834096475538_6626693919656155958_n.jpg', '../img/sup_doc/337111979_779834096475538_6626693919656155958_n.jpg', 'nasira', 'P1', 'Issue', '5', 'Ticket #PDCS0225001 has been closed because the issue is resolved.', '2025-02-03', '2025-02-04', '17', '0', '1', '2025-02-03 11:46:20.708083', '2025-03-14 12:43:54.000000', '2025-03-14 12:43:54');

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
(12, 'APC', 'pdc_apc', '$2y$10$WHIe9rnaCgpox50HuMtgUuBWFjKE3KKPGHAz3FBzxjh95AyG3Bexq', 'office', 'Active', '2024-09-23 13:49:24.181011', '2025-01-15 16:33:34.787383'),
(13, 'TCK', 'pdc_tck', '$2y$10$eBjroQ4.j.TVnfYbALyTi.b/AfwiS8DAd6Qumo8O3hcAPolYMSBXu', 'office', 'Inactive', '2024-09-23 15:42:51.338461', '2024-09-23 15:51:17.151253'),
(14, 'DD-ATC', 'dd_atc', '$2y$10$vf9ea6Paw9CVZ2yvmL6zEuwM97gPVo2VQwnJ7EJFyCd1ddmr/Pe7.', 'outlet', 'Active', '2024-10-04 14:27:33.990603', '2024-10-04 14:27:33.990603'),
(15, 'Andrew Siruma', 'andrew_it', '$2y$10$rnyNlwN8r2wJDgDp8yHKOuxmo2x/pm8i19j6TZmgIAim9t63cCO5u', 'it', 'Active', '2024-10-24 18:26:18.983463', '2025-02-03 00:04:18.000000'),
(16, 'Adan Flores', 'it_adan', '$2y$10$xOWLUmmXcLY7IVN/gmfXZ.5uV6xQH4rIoI4UWydO0i8cS6iXQne.C', 'it', 'Active', '2024-10-25 09:13:57.750433', '2024-10-25 09:13:57.750433'),
(17, 'Arjay Oropesa', 'it_arjay', '$2y$10$4DdhReTKWjxAY2WJjBayguHNjiuofdDbtDYhaQ1HWQVx6dOwz7TTm', 'it', 'Active', '2024-10-25 09:14:28.039666', '2024-10-25 13:37:53.233056'),
(18, 'John Doe', 'pdc_johndoe', '$2y$10$vPruxOaRWaVAiBumS/djxeyOSlqWK/lgJImJURjHKL32BZQbI3BFe', 'maintenance', 'Active', '2025-02-02 22:54:48.161369', '2025-02-02 22:54:48.161369');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=732;

--
-- AUTO_INCREMENT for table `tbl_itemcategory`
--
ALTER TABLE `tbl_itemcategory`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_itemlist`
--
ALTER TABLE `tbl_itemlist`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_notif`
--
ALTER TABLE `tbl_notif`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_ticketreport`
--
ALTER TABLE `tbl_ticketreport`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
