-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2025 at 09:33 AM
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
(635, '1', 'Updated ticket report of: #PDCS1024001', 'Report', '2025-01-30 16:25:56.810288');

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
(17, 'Your ticket #: PDCS1224002, is approved. You may check the ticket status.', '1', 14, '2025-01-23 16:27:18.269189'),
(18, 'Your ticket #: PDCS1224002, is re-assigned to \"Arjay Oropesa\".', '1', 14, '2025-01-24 19:50:54.633228'),
(19, 'Your ticket #: PDCS1224002, is re-assigned to \"Arjay Oropesa\".', '1', 14, '2025-01-24 19:54:56.655335'),
(20, 'Your ticket #: PDCS1224002, is re-assigned to \"Adan Flores\".', '1', 14, '2025-01-27 15:34:28.678410'),
(21, 'Your ticket #: PDCS1224005, is approved. You may check the ticket status.', '1', 14, '2025-01-30 16:11:48.759253'),
(22, 'Your ticket #: PDCS1024001, is approved. You may check the ticket status.', '1', 11, '2025-01-30 16:22:40.899475');

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
(1, 'PDCS1224002', '14', '16', '0', '1', 'DD-ATC', 'Adan Flores', '2024-12-13', '09:45:00.000000', '20:40:00.000000', 'Internet - Smart Broadband', '- Sample\r\n- Testing', '- Data Testing\r\n- Data Entry', '', '', 'John Doe', 'data:image/png;base64,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', 'data:image/png;base64,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', '2025-01-27 15:34:28.000000', '0000-00-00 00:00:00.000000'),
(2, 'PDCS1224005', '14', '15', '0', '1', 'DD-ATC', 'Andrew Siruma', '2024-12-17', NULL, NULL, 'Digital Devices - Laptop', '', '', '', '', '', NULL, NULL, '2025-01-30 16:11:48.760622', '0000-00-00 00:00:00.000000'),
(3, 'PDCS1024001', '11', '15', '0', '1', 'Head Office', 'Andrew Siruma', '2024-10-30', '00:00:00.000000', '00:00:00.000000', 'POS - POS Printer', '- A', '- B', '- C', '- D', '', '', '', '2025-01-30 16:22:40.902662', '0000-00-00 00:00:00.000000');

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
(2, 'PDCS1024002', '11', 'Joshua Garcia', '1', '1', '2', '457377830_565243119158694_2829328946720226073_n.jpg', '../img/sup_doc/457377830_565243119158694_2829328946720226073_n.jpg', 'Test 2', 'P2', 'Issue', '1', 'Unavailability of Previous Assigned Personnel', '2024-12-26', '2024-12-27', '17', '0', '0', '2024-10-30 10:53:27.928812', '2025-01-09 16:57:02.000000', NULL),
(4, 'PDCS1024003', '11', 'AJ Raval', '2', '7', '6', 'tabletvslaptop.png', '../img/sup_doc/tabletvslaptop.png', 'Test 3', NULL, NULL, '2', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-10-30 11:55:52.084329', NULL, NULL),
(5, 'PDCS1124001', '11', 'LeBron James', '2', '7', '6', 'PreventiveTR_TIMES110524.jpg', '../img/sup_doc/PreventiveTR_TIMES110524.jpg', 'Test data entry only.', NULL, NULL, '3', 'Not Applicable', NULL, NULL, '', '0', '0', '2024-11-12 10:57:30.322534', '2024-12-13 13:38:56.000000', NULL),
(6, 'PDCS1124002', '11', 'James Harden', '1', '1', '3', 'PreventiveTR_JMB110624.jpg', '../img/sup_doc/PreventiveTR_JMB110624.jpg', 'kjl', 'P1', 'Issue', '4', 'Re-assigned to: 15. Reason: Unavailability of Previous Assigned Personnel', '2025-01-08', '2025-01-09', '15', '0', '0', '2024-11-12 11:38:15.087404', '2025-01-15 14:27:26.000000', NULL),
(7, 'PDCS1124003', '11', 'Stephen Curry', '1', '2', '4', 'PreventiveTR_MANUELA110524.jpg', '../img/sup_doc/PreventiveTR_MANUELA110524.jpg', 'Test data entry only.', NULL, NULL, '3', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-11-12 11:58:14.112935', '2024-12-13 13:27:32.000000', NULL),
(8, 'PDCS1224001', '14', 'Kai Sotto', '2', '7', '7', 'PreventiveTR_ATC110424.jpg', '../img/sup_doc/PreventiveTR_ATC110424.jpg', 'Test Data Only', NULL, NULL, '2', 'For data testing only.', NULL, NULL, '', '0', '0', '2024-12-03 11:28:10.680195', NULL, NULL),
(9, 'PDCS1224002', '14', 'Steve Nash', '1', '2', '5', 'PreventiveTR_SFPILAR110424.jpg', '../img/sup_doc/PreventiveTR_SFPILAR110424.jpg', 'For data testing only.', 'P2', 'Issue', '1', 'Re-assigned to: 16. Reason: Customer Request', '2025-01-27', '2025-01-28', '16', '0', '1', '2024-12-13 19:03:25.950482', '2025-01-27 15:34:28.000000', NULL),
(10, 'PDCS1224003', '14', 'Michael Jordan', '1', '2', '5', 'PreventiveTR_SFPILAR110424.jpg', '../img/sup_doc/PreventiveTR_SFPILAR110424.jpg', 'For data testing only.', NULL, NULL, '3', 'Duplicate Request', NULL, NULL, '', '0', '0', '2024-12-13 19:07:07.700117', '2024-12-16 13:36:28.000000', NULL),
(11, 'PDCS1224004', '14', 'John Doe', '1', '2', '5', 'PreventiveTR_FSKIOSK110424.jpg', '../img/sup_doc/PreventiveTR_FSKIOSK110424.jpg', 'For data testing only.', NULL, NULL, '3', 'Duplicate Request', NULL, NULL, '', '0', '0', '2024-12-13 19:08:23.315041', '2024-12-17 15:56:14.000000', NULL),
(12, 'PDCS1224005', '14', 'Donald Trump', '1', '3', '9', 'bootstrap-messages-or-conversations as Smart Object-1.png', '../img/sup_doc/bootstrap-messages-or-conversations as Smart Object-1.png', 'For data testing only.', 'P2', 'Issue', '1', 'Our team has received your request, and we\'re already reviewing the details. We\'ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.', '2025-01-30', '2025-01-31', '15', '0', '0', '2024-12-17 16:08:00.718386', '2025-01-30 16:11:48.000000', NULL),
(13, 'PDCS0125001', '12', 'Juan Dela Cruz', '1', '2', '4', 'White Wireless Router.E01.watermarked.2k.png', '../img/sup_doc/White Wireless Router.E01.watermarked.2k.png', 'For data testing only', NULL, NULL, '2', 'Our team has received your request, and weâ€™re already reviewing the details. Weâ€™ll keep you updated on the progress and reach out shortly with any next steps. For quick reference, please save your ticket number.', NULL, NULL, '', '0', '0', '2025-01-15 16:35:13.793874', '2025-01-15 16:35:13.793874', NULL);

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
(15, 'Andrew Siruma', 'andrew_it', '$2y$10$SRPdEYwGR6DCI9cLRgsbbOXtq0uNnnISdJDUYr/PVMOVtXYnMiVOy', 'it', 'Active', '2024-10-24 18:26:18.983463', '2024-10-24 18:26:18.983463'),
(16, 'Adan Flores', 'it_adan', '$2y$10$xOWLUmmXcLY7IVN/gmfXZ.5uV6xQH4rIoI4UWydO0i8cS6iXQne.C', 'it', 'Active', '2024-10-25 09:13:57.750433', '2024-10-25 09:13:57.750433'),
(17, 'Arjay Oropesa', 'it_arjay', '$2y$10$4DdhReTKWjxAY2WJjBayguHNjiuofdDbtDYhaQ1HWQVx6dOwz7TTm', 'it', 'Active', '2024-10-25 09:14:28.039666', '2024-10-25 13:37:53.233056');

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=636;

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
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_ticketreport`
--
ALTER TABLE `tbl_ticketreport`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_tickets`
--
ALTER TABLE `tbl_tickets`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_useraccounts`
--
ALTER TABLE `tbl_useraccounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
