-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2022 at 10:42 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `puptdb_frbs`
--

-- --------------------------------------------------------

--
-- Table structure for table `frbs_borrowed_equipments`
--

CREATE TABLE `frbs_borrowed_equipments` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `reservation_id` bigint(20) NOT NULL,
  `equipment_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `returned_quantity` int(11) NOT NULL,
  `status_id` bigint(20) NOT NULL,
  `condition_id` bigint(20) NOT NULL,
  `remarks` text NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_borrowed_equipments`
--

INSERT INTO `frbs_borrowed_equipments` (`id`, `user_id`, `reservation_id`, `equipment_id`, `quantity`, `returned_quantity`, `status_id`, `condition_id`, `remarks`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(321, 0, 57, 10, 20, 20, 3, 3, 'cleared', 'a', '2021-08-26 05:09:04', '2021-08-26 05:22:02', '0000-00-00 00:00:00'),
(322, 0, 57, 11, 7, 7, 3, 3, 'cleared', 'a', '2021-08-26 05:09:04', '2021-08-26 05:22:24', '0000-00-00 00:00:00'),
(323, 0, 57, 12, 1, 1, 3, 3, 'cleared', 'a', '2021-08-26 05:09:04', '2021-08-26 05:22:36', '0000-00-00 00:00:00'),
(324, 0, 57, 18, 1, 1, 3, 3, 'cleared', 'a', '2021-08-26 05:09:04', '2021-08-26 05:22:47', '0000-00-00 00:00:00'),
(325, 131, 58, 10, 10, 0, 4, 0, '', 'd', '2021-08-26 06:36:56', '2021-08-26 06:40:28', '2021-08-26 06:40:28'),
(326, 131, 58, 11, 1, 0, 4, 0, '', 'd', '2021-08-26 06:36:56', '2021-08-26 06:40:28', '2021-08-26 06:40:28'),
(327, 131, 58, 12, 1, 0, 4, 0, '', 'd', '2021-08-26 06:36:56', '2021-08-26 06:40:28', '2021-08-26 06:40:28'),
(328, 131, 58, 13, 1, 0, 4, 0, '', 'd', '2021-08-26 06:36:57', '2021-08-26 06:40:28', '2021-08-26 06:40:28'),
(329, 131, 58, 14, 1, 0, 4, 0, '', 'd', '2021-08-26 06:36:57', '2021-08-26 06:40:28', '2021-08-26 06:40:28'),
(330, 131, 58, 15, 1, 0, 4, 0, '', 'd', '2021-08-26 06:36:57', '2021-08-26 06:40:29', '2021-08-26 06:40:29'),
(331, 131, 58, 16, 1, 0, 4, 0, '', 'd', '2021-08-26 06:36:57', '2021-08-26 06:40:29', '2021-08-26 06:40:29'),
(332, 131, 58, 17, 1, 0, 4, 0, '', 'd', '2021-08-26 06:36:57', '2021-08-26 06:40:29', '2021-08-26 06:40:29'),
(333, 131, 58, 18, 1, 0, 4, 0, '', 'd', '2021-08-26 06:36:57', '2021-08-26 06:40:29', '2021-08-26 06:40:29'),
(334, 131, 58, 10, 10, 0, 4, 0, '', 'd', '2021-08-26 06:37:49', '2021-08-26 06:40:29', '2021-08-26 06:40:29'),
(335, 131, 58, 11, 1, 0, 4, 0, '', 'd', '2021-08-26 06:37:50', '2021-08-26 06:40:29', '2021-08-26 06:40:29'),
(336, 131, 58, 12, 1, 0, 4, 0, '', 'd', '2021-08-26 06:37:50', '2021-08-26 06:40:29', '2021-08-26 06:40:29'),
(337, 131, 58, 13, 1, 0, 4, 0, '', 'd', '2021-08-26 06:37:50', '2021-08-26 06:40:29', '2021-08-26 06:40:29'),
(338, 131, 58, 14, 1, 0, 4, 0, '', 'd', '2021-08-26 06:37:50', '2021-08-26 06:40:30', '2021-08-26 06:40:30'),
(339, 131, 58, 15, 1, 0, 4, 0, '', 'd', '2021-08-26 06:37:50', '2021-08-26 06:40:30', '2021-08-26 06:40:30'),
(340, 131, 58, 16, 1, 0, 4, 0, '', 'd', '2021-08-26 06:37:50', '2021-08-26 06:40:30', '2021-08-26 06:40:30'),
(341, 131, 58, 17, 1, 0, 4, 0, '', 'd', '2021-08-26 06:37:50', '2021-08-26 06:40:30', '2021-08-26 06:40:30'),
(342, 131, 58, 18, 1, 0, 4, 0, '', 'd', '2021-08-26 06:37:50', '2021-08-26 06:40:30', '2021-08-26 06:40:30'),
(343, 131, 58, 10, 10, 0, 4, 0, '', 'd', '2021-08-26 06:38:14', '2021-08-26 06:40:30', '2021-08-26 06:40:30'),
(344, 131, 58, 11, 1, 0, 4, 0, '', 'd', '2021-08-26 06:38:14', '2021-08-26 06:40:30', '2021-08-26 06:40:30'),
(345, 131, 58, 12, 1, 0, 4, 0, '', 'd', '2021-08-26 06:38:14', '2021-08-26 06:40:30', '2021-08-26 06:40:30'),
(346, 131, 58, 13, 1, 0, 4, 0, '', 'd', '2021-08-26 06:38:15', '2021-08-26 06:40:31', '2021-08-26 06:40:31'),
(347, 131, 58, 14, 1, 0, 4, 0, '', 'd', '2021-08-26 06:38:15', '2021-08-26 06:40:31', '2021-08-26 06:40:31'),
(348, 131, 58, 15, 1, 0, 4, 0, '', 'd', '2021-08-26 06:38:15', '2021-08-26 06:40:31', '2021-08-26 06:40:31'),
(349, 131, 58, 16, 1, 0, 4, 0, '', 'd', '2021-08-26 06:38:15', '2021-08-26 06:40:31', '2021-08-26 06:40:31'),
(350, 131, 58, 17, 1, 0, 4, 0, '', 'd', '2021-08-26 06:38:15', '2021-08-26 06:40:31', '2021-08-26 06:40:31'),
(351, 131, 58, 18, 1, 0, 4, 0, '', 'd', '2021-08-26 06:38:15', '2021-08-26 06:40:31', '2021-08-26 06:40:31'),
(352, 131, 61, 10, 10, 0, 4, 0, '', 'd', '2021-08-26 06:42:15', '2021-08-26 07:53:41', '2021-08-26 07:53:41'),
(353, 131, 61, 11, 1, 0, 4, 0, '', 'd', '2021-08-26 06:42:15', '2021-08-26 07:53:41', '2021-08-26 07:53:41'),
(354, 131, 61, 12, 1, 0, 4, 0, '', 'd', '2021-08-26 06:42:15', '2021-08-26 07:53:41', '2021-08-26 07:53:41'),
(355, 17, 70, 10, 6, 0, 4, 0, '', 'd', '2021-08-26 11:08:39', '2021-08-26 12:10:32', '2021-08-26 12:10:32'),
(356, 17, 70, 11, 4, 0, 4, 0, '', 'd', '2021-08-26 11:08:39', '2021-08-26 12:10:32', '2021-08-26 12:10:32'),
(357, 0, 70, 10, 16, 16, 3, 3, 'cleared', 'a', '2021-08-26 12:10:32', '2021-08-26 12:15:36', '0000-00-00 00:00:00'),
(358, 0, 70, 11, 4, 4, 3, 3, 'cleared', 'a', '2021-08-26 12:10:32', '2021-08-26 12:16:00', '0000-00-00 00:00:00'),
(359, 17, 71, 10, 16, 16, 3, 5, 'cleared', 'a', '2021-08-27 01:10:17', '2021-08-27 01:26:14', '0000-00-00 00:00:00'),
(360, 115, 72, 10, 10, 0, 4, 0, '', 'd', '2021-08-27 02:50:16', '2021-08-27 03:14:46', '2021-08-27 03:14:46'),
(361, 115, 72, 11, 3, 0, 4, 0, '', 'd', '2021-08-27 02:50:17', '2021-08-27 03:14:46', '2021-08-27 03:14:46'),
(362, 115, 72, 12, 3, 0, 4, 0, '', 'd', '2021-08-27 02:50:17', '2021-08-27 03:14:46', '2021-08-27 03:14:46'),
(363, 0, 72, 10, 10, 10, 3, 5, 'cleared', 'a', '2021-08-27 03:14:46', '2021-08-27 03:23:58', '0000-00-00 00:00:00'),
(364, 0, 72, 11, 3, 3, 3, 5, 'cleared', 'a', '2021-08-27 03:14:46', '2021-08-27 03:21:10', '0000-00-00 00:00:00'),
(365, 0, 72, 12, 3, 3, 3, 3, 'cleared', 'a', '2021-08-27 03:14:46', '2021-08-27 03:22:04', '0000-00-00 00:00:00'),
(366, 0, 72, 13, 1, 1, 3, 3, 'cleared', 'a', '2021-08-27 03:14:46', '2021-08-27 03:23:48', '0000-00-00 00:00:00'),
(367, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:03:39', '2021-09-17 11:06:25', '2021-09-17 11:06:25'),
(368, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:03:39', '2021-09-17 11:06:25', '2021-09-17 11:06:25'),
(369, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:03:39', '2021-09-17 11:06:26', '2021-09-17 11:06:26'),
(370, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:06:26', '2021-09-17 11:08:47', '2021-09-17 11:08:47'),
(371, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:06:26', '2021-09-17 11:08:47', '2021-09-17 11:08:47'),
(372, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:06:26', '2021-09-17 11:08:47', '2021-09-17 11:08:47'),
(373, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:08:47', '2021-09-17 11:09:11', '2021-09-17 11:09:11'),
(374, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:08:48', '2021-09-17 11:09:11', '2021-09-17 11:09:11'),
(375, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:08:48', '2021-09-17 11:09:11', '2021-09-17 11:09:11'),
(376, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:09:11', '2021-09-17 11:10:02', '2021-09-17 11:10:02'),
(377, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:09:12', '2021-09-17 11:10:02', '2021-09-17 11:10:02'),
(378, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:09:12', '2021-09-17 11:10:02', '2021-09-17 11:10:02'),
(379, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:10:02', '2021-09-17 11:11:03', '2021-09-17 11:11:03'),
(380, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:10:02', '2021-09-17 11:11:03', '2021-09-17 11:11:03'),
(381, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:10:02', '2021-09-17 11:11:03', '2021-09-17 11:11:03'),
(382, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:11:03', '2021-09-17 11:14:17', '2021-09-17 11:14:17'),
(383, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:11:03', '2021-09-17 11:14:17', '2021-09-17 11:14:17'),
(384, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:11:03', '2021-09-17 11:14:17', '2021-09-17 11:14:17'),
(385, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:14:17', '2021-09-17 11:15:15', '2021-09-17 11:15:15'),
(386, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:14:17', '2021-09-17 11:15:16', '2021-09-17 11:15:16'),
(387, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:14:17', '2021-09-17 11:15:16', '2021-09-17 11:15:16'),
(388, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:15:16', '2021-09-17 11:27:57', '2021-09-17 11:27:57'),
(389, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:15:16', '2021-09-17 11:27:57', '2021-09-17 11:27:57'),
(390, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:15:16', '2021-09-17 11:27:57', '2021-09-17 11:27:57'),
(391, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 11:27:57', '2021-09-17 13:57:57', '2021-09-17 13:57:57'),
(392, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 11:27:57', '2021-09-17 13:57:57', '2021-09-17 13:57:57'),
(393, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 11:27:57', '2021-09-17 13:57:57', '2021-09-17 13:57:57'),
(394, 0, 73, 10, 1, 0, 4, 0, '', 'd', '2021-09-17 13:57:57', '2021-09-18 15:50:21', '2021-09-18 15:50:21'),
(395, 0, 73, 14, 1, 0, 4, 0, '', 'd', '2021-09-17 13:57:57', '2021-09-18 15:50:21', '2021-09-18 15:50:21'),
(396, 0, 73, 18, 1, 0, 4, 0, '', 'd', '2021-09-17 13:57:57', '2021-09-18 15:50:21', '2021-09-18 15:50:21'),
(397, 17, 75, 11, 1, 0, 4, 0, '', 'd', '2021-09-18 00:43:32', '2021-09-18 13:53:31', '2021-09-18 13:53:31'),
(398, 17, 75, 12, 1, 0, 4, 0, '', 'd', '2021-09-18 00:43:32', '2021-09-18 13:53:31', '2021-09-18 13:53:31'),
(399, 0, 75, 11, 1, 0, 4, 0, '', 'd', '2021-09-18 13:53:31', '2021-09-18 14:10:09', '2021-09-18 14:10:09'),
(400, 0, 75, 12, 1, 0, 4, 0, '', 'd', '2021-09-18 13:53:31', '2021-09-18 14:10:09', '2021-09-18 14:10:09'),
(401, 0, 75, 11, 1, 0, 4, 0, '', 'd', '2021-09-18 14:10:09', '2021-09-18 15:50:08', '2021-09-18 15:50:08'),
(402, 0, 75, 12, 1, 0, 4, 0, '', 'd', '2021-09-18 14:10:09', '2021-09-18 15:50:08', '2021-09-18 15:50:08'),
(403, 131, 81, 10, 1, 0, 4, 0, '', 'd', '2021-09-21 14:59:48', '2021-10-06 17:17:16', '2021-10-06 17:17:16'),
(404, 131, 81, 11, 1, 0, 4, 0, '', 'd', '2021-09-21 14:59:48', '2021-10-06 17:17:16', '2021-10-06 17:17:16'),
(405, 0, 82, 10, 1, 0, 4, 0, '', 'a', '2021-10-06 17:47:28', '2021-10-06 17:47:28', '0000-00-00 00:00:00'),
(406, 17, 84, 10, 10, 0, 4, 0, '', 'a', '2021-10-10 14:43:09', '2021-10-10 14:43:09', '0000-00-00 00:00:00'),
(407, 17, 85, 10, 6, 0, 4, 0, '', 'd', '2022-06-19 15:43:03', '2022-06-19 16:04:40', '2022-06-19 16:04:40'),
(408, 0, 85, 10, 6, 0, 4, 0, '', 'd', '2022-06-19 16:04:40', '2022-06-26 21:05:29', '2022-06-26 21:05:29'),
(409, 0, 85, 10, 6, 0, 4, 0, '', 'd', '2022-06-26 21:05:30', '2022-06-26 22:38:13', '2022-06-26 22:38:13'),
(410, 0, 85, 10, 6, 0, 4, 0, '', 'a', '2022-06-26 22:38:13', '2022-06-26 22:38:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_courses`
--

CREATE TABLE `frbs_courses` (
  `id` bigint(20) NOT NULL,
  `course_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_courses`
--

INSERT INTO `frbs_courses` (`id`, `course_name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'bachelor of science in information technology', 'bachelor of science in information technology', 'a', '2021-05-13 09:20:36', '2022-07-13 16:40:10', '0000-00-00 00:00:00'),
(2, 'bachelor of science in mechanical engineering', 'bachelor of science in mechanical engineering', 'a', '2021-05-13 09:20:48', '2021-09-21 16:00:53', '0000-00-00 00:00:00'),
(3, 'human resource management', 'human resource management', 'a', '2021-05-13 09:21:00', '2021-09-21 16:01:02', '0000-00-00 00:00:00'),
(11, 'marketing management', 'marketing management', 'a', '2021-07-28 10:36:55', '2021-09-21 16:01:11', '0000-00-00 00:00:00'),
(5, 'diploma in information communication technology', 'diploma in information communication technology', 'a', '2021-06-23 23:47:30', '2021-09-21 16:01:20', '0000-00-00 00:00:00'),
(8, 'bachelor of science in accountancy', 'bachelor of science in accountancy', 'a', '2021-07-28 10:19:13', '2021-09-21 16:01:31', '0000-00-00 00:00:00'),
(7, 'bachelor of science in electronics engineering', 'bachelor of science in electronics engineering', 'a', '2021-07-28 10:11:18', '2021-09-21 16:01:41', '0000-00-00 00:00:00'),
(9, 'bachelor of science in office administration', 'bachelor of science in office administration', 'a', '2021-07-28 10:21:42', '2021-09-21 16:01:51', '0000-00-00 00:00:00'),
(10, 'diploma in office management technology', 'diploma in office management technology', 'a', '2021-07-28 10:25:28', '2021-09-21 16:02:01', '0000-00-00 00:00:00'),
(12, 'bachelor of Secondary Education Major English ', 'bachelor of Secondary Education Major English ', 'a', '2021-07-28 11:20:36', '2021-09-21 16:02:10', '0000-00-00 00:00:00'),
(13, 'bsed - math', 'bachelor in Secondary Education Major Mathematics', 'a', '2021-07-28 11:24:14', '2021-07-28 11:24:14', '0000-00-00 00:00:00'),
(14, 'sample', 'sample', 'd', '2021-10-09 23:48:55', '2021-10-09 23:53:03', '2021-10-09 23:53:03');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_equipments`
--

CREATE TABLE `frbs_equipments` (
  `id` bigint(20) NOT NULL,
  `equipment_code` varchar(100) NOT NULL,
  `equipment_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` text NOT NULL,
  `status_id` bigint(20) NOT NULL,
  `condition_id` bigint(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_equipments`
--

INSERT INTO `frbs_equipments` (`id`, `equipment_code`, `equipment_name`, `description`, `image`, `status_id`, `condition_id`, `quantity`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(10, 'eid-001', 'Monoblock Chairs', 'Monoblock Chairs', '1627510793_78eaf6c75d311b7107c1.jpg', 6, 3, 58, '6', '2021-07-28 17:19:53', '2022-06-26 22:38:13', '0000-00-00 00:00:00'),
(11, 'eid-002', 'classroom table', 'classroom table', '1627510836_a58da4be299415f895d4.jpg', 6, 3, 9, '6', '2021-07-28 17:20:36', '2021-10-06 17:17:16', '0000-00-00 00:00:00'),
(12, 'eid-003', 'long tables', 'long tables', '1627510871_cfef3432e93c274630a8.png', 6, 3, 10, '6', '2021-07-28 17:21:11', '2021-09-18 15:50:08', '0000-00-00 00:00:00'),
(13, 'eid-004', 'projector', 'projector', '1627510901_a18886e7c72a4e532d20.png', 6, 3, 2, '6', '2021-07-28 17:21:41', '2021-08-27 03:23:48', '0000-00-00 00:00:00'),
(14, 'eid-005', 'project screen', 'project screen', '1627510932_addf3519e64ce224e642.jpg', 6, 3, 2, '6', '2021-07-28 17:22:12', '2021-09-18 15:50:21', '0000-00-00 00:00:00'),
(15, 'eid-006', 'speakers', 'speakers', '1627511009_7be110472ff2dbf62e01.jpg', 6, 3, 2, '6', '2021-07-28 17:23:29', '2021-08-26 06:40:31', '0000-00-00 00:00:00'),
(16, 'eid-007', 'Electric Fan', 'Electric Fan', '1627511042_45128d4f4a3e3842ea02.jpg', 6, 3, 6, '6', '2021-07-28 17:24:02', '2021-08-26 06:40:31', '0000-00-00 00:00:00'),
(17, 'eid-008', 'microphone', 'microphone', '1627511075_b57a5a7dad99c802ba90.jpg', 6, 3, 3, '6', '2021-07-28 17:24:35', '2021-08-26 06:40:31', '0000-00-00 00:00:00'),
(18, 'eid-009', 'amplifier', 'amplifier', '1627511113_6063b9b41097f1949764.jpg', 6, 3, 1, '6', '2021-07-28 17:25:13', '2021-09-18 15:50:21', '0000-00-00 00:00:00'),
(19, 'sample', 'sample', 'sample', '1633846091_f9529491aca4579babd4.jpg', 6, 3, 30, 'd', '2021-10-10 14:07:18', '2021-10-10 14:08:21', '2021-10-10 14:08:21'),
(20, 'sample', 'sample', 'sample', '1633847109_772fc0bcae54b5ba538c.png', 6, 3, 100, 'd', '2021-10-10 14:25:09', '2021-10-10 14:26:04', '2021-10-10 14:26:04'),
(21, 'sample', 'sample', 'sample', '1633847266_b9f6aaa96aa2b88dc75d.png', 6, 6, 100, 'd', '2021-10-10 14:27:46', '2021-10-10 14:27:58', '2021-10-10 14:27:58');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_equipment_conditions`
--

CREATE TABLE `frbs_equipment_conditions` (
  `id` bigint(20) NOT NULL,
  `equipment_condition` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_equipment_conditions`
--

INSERT INTO `frbs_equipment_conditions` (`id`, `equipment_condition`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'good', 'Good Condition', 'a', '2021-06-24 02:26:36', '2021-06-24 02:26:36', '0000-00-00 00:00:00'),
(4, 'damaged', 'damaged', 'a', '2021-08-27 01:24:23', '2021-08-27 01:24:23', '0000-00-00 00:00:00'),
(5, 'average', 'average', 'a', '2021-08-27 01:24:43', '2021-08-27 01:24:43', '0000-00-00 00:00:00'),
(6, 'best', 'best', 'a', '2021-08-27 01:24:55', '2021-08-27 01:24:55', '0000-00-00 00:00:00'),
(7, 'bad', 'bad', 'a', '2021-08-27 01:25:05', '2021-08-27 01:25:05', '0000-00-00 00:00:00'),
(8, 'sample', 'sample', 'd', '2021-10-10 12:57:22', '2021-10-10 12:57:39', '2021-10-10 12:57:39');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_equipment_status`
--

CREATE TABLE `frbs_equipment_status` (
  `id` bigint(20) NOT NULL,
  `equipment_status` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_equipment_status`
--

INSERT INTO `frbs_equipment_status` (`id`, `equipment_status`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 'returned', 'returned', 'a', '2021-06-23 20:25:35', '2021-07-26 01:58:17', '0000-00-00 00:00:00'),
(4, 'borrowed', 'borrowed', 'a', '2021-06-23 20:27:24', '2021-07-26 01:58:35', '0000-00-00 00:00:00'),
(5, 'out of stock', 'out of stock', 'a', '2021-07-27 08:49:47', '2021-07-27 08:49:47', '0000-00-00 00:00:00'),
(6, 'available', 'available', 'a', '2021-07-27 22:28:07', '2021-07-27 22:28:07', '0000-00-00 00:00:00'),
(7, 'sample', 'sample', 'd', '2021-10-10 12:45:05', '2021-10-10 12:45:24', '2021-10-10 12:45:24');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_event_types`
--

CREATE TABLE `frbs_event_types` (
  `id` bigint(20) NOT NULL,
  `event_type` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_event_types`
--

INSERT INTO `frbs_event_types` (`id`, `event_type`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'organizational', 'organizational', 'a', '2021-05-13 09:16:33', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'academic related', 'academic related', 'a', '2021-05-13 09:16:42', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'University-wides', 'University-wide', 'd', '2021-06-22 06:44:50', '2021-06-22 06:46:44', '2021-06-22 06:46:44'),
(4, 'sample', 'sample', 'd', '2021-10-10 12:31:22', '2021-10-10 12:31:46', '2021-10-10 12:31:46');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_extension_names`
--

CREATE TABLE `frbs_extension_names` (
  `id` bigint(20) NOT NULL,
  `extension_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_extension_names`
--

INSERT INTO `frbs_extension_names` (`id`, `extension_name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'jr', 'junior', 'a', '2021-05-13 09:12:26', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'ii', 'the second', 'a', '2021-05-13 09:12:45', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'iii', 'the third', 'a', '2021-05-13 09:12:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'iv', 'the fourth', 'a', '2021-05-13 09:13:08', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, 'VI', 'Fifth', 'd', '2021-06-22 07:32:29', '2021-06-22 07:33:15', '2021-06-22 07:33:15'),
(6, 'none', 'no extension name', 'a', '2021-06-22 15:20:11', '2021-06-22 15:20:11', '0000-00-00 00:00:00'),
(7, 'sample', 'sample', 'a', '2021-10-10 12:14:30', '2021-10-10 12:14:40', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_facilities`
--

CREATE TABLE `frbs_facilities` (
  `id` bigint(20) NOT NULL,
  `facility_code` varchar(50) NOT NULL,
  `facility_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `facility_fee` int(11) NOT NULL,
  `facility_status_id` bigint(20) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_facilities`
--

INSERT INTO `frbs_facilities` (`id`, `facility_code`, `facility_name`, `description`, `image`, `capacity`, `facility_fee`, `facility_status_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(24, 'fid-002', 'Gymnasium', 'Gymnasium', '1627503042_7bf5bb365773c31fda66.jpg', 500, 100, 5, 'a', '2021-07-28 15:10:42', '2022-07-13 16:35:59', '0000-00-00 00:00:00'),
(23, 'fid-001', 'auditorium', 'auditorium', '1627502999_8c526a9f8e3164fcf139.jpg', 200, 100, 5, 'a', '2021-07-28 15:09:59', '2021-07-28 15:09:59', '0000-00-00 00:00:00'),
(25, 'fid-003', 'Multimedia Room', 'Multimedia Room', '1627503095_67366678a9780a718b88.jpg', 60, 100, 5, 'a', '2021-07-28 15:11:35', '2021-07-28 15:11:35', '0000-00-00 00:00:00'),
(26, 'fid-004', 'Aboitiz Laboratory', 'Aboitiz Laboratory', '1627503154_4e16f4edf8966c7891b0.jpg', 60, 100, 5, 'a', '2021-07-28 15:12:34', '2021-07-28 15:12:34', '0000-00-00 00:00:00'),
(27, 'fid-005', 'Conference Room', 'Conference Room', '1627503200_e80ab6e4a832c05f0b96.jpg', 60, 100, 5, 'a', '2021-07-28 15:13:20', '2021-07-28 15:13:20', '0000-00-00 00:00:00'),
(28, 'fid-006', 'DOST Laboratory', 'DOST Laboratory', '1627503260_df61247b9bfd38d87dcb.jpg', 60, 100, 5, 'a', '2021-07-28 15:14:20', '2021-07-28 15:14:20', '0000-00-00 00:00:00'),
(29, 'fid-007', 'Speech Laboratory', 'Speech Laboratory', '1627503321_2efdfc414dd4ae7c03e0.jpg', 40, 100, 5, 'a', '2021-07-28 15:15:21', '2021-07-28 15:15:21', '0000-00-00 00:00:00'),
(30, 'fid-008', 'Research Office', 'Research Office', '1627503398_55ab5f87d756d60cdbc4.jpg', 30, 100, 5, 'a', '2021-07-28 15:16:38', '2021-07-28 15:16:38', '0000-00-00 00:00:00'),
(31, 'sample', 'sample', 'sample', '1633844430_ba1f6394c84269fb9c0f.png', 60, 100, 5, 'd', '2021-10-10 13:40:30', '2021-10-10 13:41:50', '2021-10-10 13:41:50'),
(32, 'sample', 'sample', 'sample', '1633847000_34b00d99cbfafe531aa7.png', 100, 100, 5, 'd', '2021-10-10 14:23:20', '2021-10-10 14:24:10', '2021-10-10 14:24:10');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_facility_maintenances`
--

CREATE TABLE `frbs_facility_maintenances` (
  `id` bigint(20) NOT NULL,
  `facility_id` bigint(20) NOT NULL,
  `maintenance_date` date NOT NULL,
  `scheduled_starting_time` time NOT NULL,
  `scheduled_end_time` time NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_facility_maintenances`
--

INSERT INTO `frbs_facility_maintenances` (`id`, `facility_id`, `maintenance_date`, `scheduled_starting_time`, `scheduled_end_time`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 24, '2022-06-27', '07:30:00', '10:30:00', 'Cleaning of Gym', 'd', '2022-06-19 16:50:06', '2022-06-19 16:56:52', '2022-06-19 16:56:52'),
(2, 24, '2022-07-11', '07:30:00', '10:30:00', 'Cleaning of Gym', 'a', '2022-07-03 15:43:12', '2022-07-08 05:58:12', '0000-00-00 00:00:00'),
(3, 25, '2022-07-22', '20:00:00', '21:00:00', 'Cleaning of multimedia room', 'a', '2022-07-13 11:01:36', '2022-07-13 11:06:29', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_facility_status`
--

CREATE TABLE `frbs_facility_status` (
  `id` bigint(20) NOT NULL,
  `facility_status` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_facility_status`
--

INSERT INTO `frbs_facility_status` (`id`, `facility_status`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, 'Occupied', 'Occupied', 'a', '2021-06-23 20:28:38', '2021-06-23 20:28:38', '0000-00-00 00:00:00'),
(5, 'Available', 'Available', 'a', '2021-06-24 00:12:35', '2021-06-24 00:12:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_faculties`
--

CREATE TABLE `frbs_faculties` (
  `id` bigint(20) NOT NULL,
  `position_id` bigint(20) NOT NULL,
  `department_id` bigint(20) NOT NULL,
  `employee_number` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `extension_name_id` bigint(20) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_faculties`
--

INSERT INTO `frbs_faculties` (`id`, `position_id`, `department_id`, `employee_number`, `first_name`, `last_name`, `middle_name`, `extension_name_id`, `email_address`, `contact_number`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(46, 1, 1, 'eid-00327-TG-0', 'Orlando ', 'lingo', '', 6, 'lingoorlando@gamil.com', '9091375373', 'd', '2021-10-09 01:30:16', '2021-10-09 13:13:12', '2021-10-09 13:13:12'),
(45, 1, 4, 'eid-00322-TG-0', 'Darwin ', 'Tacubanza', '', 6, 'darwintacubanza@gmail.com', '9950713784', 'a', '2021-10-09 01:30:16', '2021-10-10 09:32:58', '0000-00-00 00:00:00'),
(44, 1, 3, 'eid-00324-TG-0', 'Merly', ' Tataro', '', 6, 'tataromerly@gmail.com', '9164546149', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(43, 1, 2, 'eid-00321-TG-0', 'Angelito', ' Calingo', '', 6, 'calingoangelito@gmail.com', '9281901983', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(42, 1, 3, 'eid-00314-TG-0', 'Evangeline', 'Lim', '', 6, 'evangelinelim@gmail.com', '9511217733', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(41, 1, 2, 'eid-00320-TG-0', 'Danilo', 'Valenzuela', '', 6, 'daniovalenzuela@gmail.com', '9970780187', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(40, 7, 3, 'eid-00325-TG-0', 'Cecilia', 'Alagon', '', 6, 'ceciliaalagaon@gmail.com', '9563588213', 'a', '2021-10-09 01:30:16', '2022-07-13 14:12:18', '0000-00-00 00:00:00'),
(39, 1, 1, 'eid-00310-TG-0', 'Elvin', 'Catantan', '', 6, 'ec.cantatan@gmail.com', '9770255241', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(38, 1, 2, 'eid-00319-TG-0', 'Tromil', 'Gardose', '', 6, 'gardosetromil@gmail.com', '9302990870', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(37, 1, 1, 'eid-00317-TG-0', 'John Dustin', 'Santos', '', 6, 'johndustinsantos@gmail.com', '9994080568', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(36, 7, 3, 'eid-00311-TG-0', 'Mhel', 'Garcia', '', 6, 'mpgarciaregistrar@gmail.com', '9951302183', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(35, 10, 3, 'eid-00323-TG-0', 'Gina', 'Dela Cruz ', '', 6, 'ginadelacruz@gmail.com', '9164546149', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(34, 1, 2, 'eid-00326-TG-0', 'Almir ', 'Almirañez', '', 6, 'almir.almiranez@gmail.com', '9206131468', 'd', '2021-10-09 01:30:15', '2021-10-09 01:30:33', '2021-10-09 01:30:33'),
(33, 9, 3, 'eid-00315-TG-0', 'Maliksi', 'Liwanag', '', 6, 'maliksi.liwanag@gmail.com', '9197867189', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(32, 8, 2, 'eid-00318-TG-0', 'Michael', 'Zarco', '', 6, 'zarco.michael@gmail.com', '9473089458', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(31, 1, 1, 'eid-00316-TG-0', 'Gecilie', 'Almirañez', '', 6, 'almiranez.gecilie@gmail.com', '9328434905', 'd', '2021-10-09 01:30:15', '2021-10-10 09:03:11', '2021-10-10 09:03:11'),
(30, 2, 3, 'eid-00313-TG-0', 'Marissa', 'ferrer ', '', 6, 'marissaferrer@gmail.com', '9205540377', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(29, 5, 3, 'eid-00312-TG-0', 'Yolanda', 'Rabe', '', 6, 'yolandarabe@gmail.com', '9270545331', 'd', '2021-10-09 01:30:15', '2022-07-02 22:54:59', '2022-07-02 22:54:59'),
(28, 2, 3, 'eid-11313-tg-0', 'john benedict', 'assuncion', 'legarda', 6, 'jbal@gmail.com', '9123456789', 'd', '2021-10-09 01:29:18', '2021-10-09 13:22:00', '2021-10-09 13:22:00'),
(47, 1, 1, 'eid-00328-TG-0', 'Marian ', 'Arada', '', 6, 'aradamarian@gmail.com', '9358211304', 'd', '2021-10-09 01:30:16', '2022-07-13 14:23:51', '2022-07-13 14:23:51'),
(48, 1, 2, 'eid-00329-TG-0', 'Israel', 'Ortega', '', 6, 'ortegaisrael@gmail.com', '9185300406', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(49, 1, 2, 'eid-00335-TG-0', ' Benjamin', 'Abarquez ', '', 1, 'abarquezbenjamin@gmail.com', '9471822543', 'a', '2021-10-09 01:30:17', '2021-10-09 01:30:17', '0000-00-00 00:00:00'),
(50, 1, 2, 'eid-00326-TG-0', 'Almir ', 'Almirañez', '', 6, 'puptcs.jtlsescar@gmail.com', '9206131468', 'a', '2021-10-09 13:21:49', '2022-07-03 14:44:43', '0000-00-00 00:00:00'),
(51, 1, 1, 'eid-00327-TG-0', 'Orlando ', 'lingo', '', 6, 'lingoorlando@gamil.com', '9091375373', 'a', '2021-10-09 13:21:49', '2021-10-09 13:21:49', '0000-00-00 00:00:00'),
(52, 1, 2, '2017-00313-TG-0', 'sample', 'sample', 'sample', 1, 'sample@gmail.com', '09123456789', 'd', '2021-10-10 09:34:02', '2021-10-10 09:34:24', '2021-10-10 09:34:24'),
(53, 8, 3, 'Eid-00328-TG-0', 'Bernadette', 'Canlas', '', 6, 'sample@gmail.com', '09123456789', 'a', '2022-07-13 14:13:38', '2022-07-13 14:13:38', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_faculty_departments`
--

CREATE TABLE `frbs_faculty_departments` (
  `id` bigint(20) NOT NULL,
  `department` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_faculty_departments`
--

INSERT INTO `frbs_faculty_departments` (`id`, `department`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'information technology', 'information technology', 'a', '2021-05-13 09:14:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'engineering', 'engineering', 'a', '2021-05-13 09:15:12', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'business adminstration', 'business adminstration', 'a', '2021-05-13 09:15:28', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'Engineering Electronics', 'bachelor of science in mechanical engineering', 'a', '2021-06-22 06:08:04', '2021-06-22 06:08:04', '0000-00-00 00:00:00'),
(5, 'Engineering Electronic', 'bachelor of science in mechanical engineering', 'd', '2021-06-22 06:14:07', '2021-06-22 06:14:34', '2021-06-22 06:14:34'),
(6, 'sample', 'sample', 'd', '2021-10-10 11:41:30', '2021-10-10 11:41:37', '2021-10-10 11:41:37'),
(7, 'sample', 'sample', 'd', '2021-10-10 11:45:07', '2021-10-10 11:46:48', '2021-10-10 11:46:48'),
(8, 'sample', 'sample', 'd', '2021-10-10 11:45:15', '2021-10-10 11:45:51', '2021-10-10 11:45:51'),
(9, 'sample', 'sample', 'd', '2021-10-10 11:45:28', '2021-10-10 11:45:44', '2021-10-10 11:45:44'),
(10, 'sample', 'sample', 'd', '2021-10-10 11:45:29', '2021-10-10 11:45:38', '2021-10-10 11:45:38');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_faculty_positions`
--

CREATE TABLE `frbs_faculty_positions` (
  `id` bigint(20) NOT NULL,
  `position` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_faculty_positions`
--

INSERT INTO `frbs_faculty_positions` (`id`, `position`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'professor', 'professor', 'a', '2021-05-13 09:13:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'branch director', 'branch director', 'a', '2021-05-13 09:14:14', '2022-06-19 13:37:44', '0000-00-00 00:00:00'),
(3, 'guidance councilor', 'guidance councilor', 'a', '2021-05-13 09:14:38', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(7, 'head of academic programs', 'head of academic programs', 'a', '2022-07-13 14:06:49', '2022-07-13 14:06:49', '0000-00-00 00:00:00'),
(8, 'head of student services', 'head of student services', 'a', '2022-07-13 14:07:10', '2022-07-13 14:07:10', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_logs`
--

CREATE TABLE `frbs_logs` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `reservation_id` bigint(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_logs`
--

INSERT INTO `frbs_logs` (`id`, `user_id`, `reservation_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(715, 17, 69, 'generate payment voucher.', '2021-09-19 22:42:02', '2021-09-19 22:42:02', '0000-00-00 00:00:00'),
(714, 17, 69, 'generate payment voucher.', '2021-09-19 22:39:58', '2021-09-19 22:39:58', '0000-00-00 00:00:00'),
(713, 17, 69, 'approved the reservation.', '2021-09-19 22:38:13', '2021-09-19 22:38:13', '0000-00-00 00:00:00'),
(712, 17, 69, 'reassess of the reservation', '2021-09-19 22:38:01', '2021-09-19 22:38:01', '0000-00-00 00:00:00'),
(711, 17, 69, 'approved the reservation.', '2021-09-19 22:37:48', '2021-09-19 22:37:48', '0000-00-00 00:00:00'),
(710, 17, 69, 'generate activity form', '2021-09-19 22:35:27', '2021-09-19 22:35:27', '0000-00-00 00:00:00'),
(709, 17, 69, 'generate activity form', '2021-09-19 22:34:24', '2021-09-19 22:34:24', '0000-00-00 00:00:00'),
(708, 17, 69, 'generate activity form', '2021-09-19 22:29:31', '2021-09-19 22:29:31', '0000-00-00 00:00:00'),
(707, 17, 69, 'generate activity form', '2021-09-19 22:28:18', '2021-09-19 22:28:18', '0000-00-00 00:00:00'),
(706, 17, 69, 'generate activity form', '2021-09-19 22:19:37', '2021-09-19 22:19:37', '0000-00-00 00:00:00'),
(705, 17, 69, 'generate activity form', '2021-09-19 22:16:19', '2021-09-19 22:16:19', '0000-00-00 00:00:00'),
(704, 17, 69, 'generate activity form', '2021-09-19 22:13:12', '2021-09-19 22:13:12', '0000-00-00 00:00:00'),
(703, 17, 69, 'generate activity form', '2021-09-19 22:10:56', '2021-09-19 22:10:56', '0000-00-00 00:00:00'),
(702, 17, 69, 'edit the reservation.', '2021-09-19 22:09:51', '2021-09-19 22:09:51', '0000-00-00 00:00:00'),
(701, 17, 69, 'generate activity form', '2021-09-19 22:08:28', '2021-09-19 22:08:28', '0000-00-00 00:00:00'),
(700, 17, 79, 'End of reservation', '2021-09-19 16:25:42', '2021-09-19 16:25:42', '0000-00-00 00:00:00'),
(699, 17, 79, 'Verified the official receipt.', '2021-09-19 16:25:28', '2021-09-19 16:25:28', '0000-00-00 00:00:00'),
(698, 17, 79, 'approved the reservation.', '2021-09-19 16:24:59', '2021-09-19 16:24:59', '0000-00-00 00:00:00'),
(697, 17, 79, 'edit the reservation.', '2021-09-19 16:24:44', '2021-09-19 16:24:44', '0000-00-00 00:00:00'),
(696, 17, 79, 'Cancelled the reservation.', '2021-09-19 16:24:03', '2021-09-19 16:24:03', '0000-00-00 00:00:00'),
(695, 17, 79, 'Verified the official receipt.', '2021-09-19 16:23:43', '2021-09-19 16:23:43', '0000-00-00 00:00:00'),
(694, 17, 79, 'Uploaded the official receipt.', '2021-09-19 16:23:12', '2021-09-19 16:23:12', '0000-00-00 00:00:00'),
(693, 17, 79, 'approved the reservation.', '2021-09-19 16:22:43', '2021-09-19 16:22:43', '0000-00-00 00:00:00'),
(692, 17, 79, 'edit the reservation.', '2021-09-19 16:22:13', '2021-09-19 16:22:13', '0000-00-00 00:00:00'),
(691, 17, 77, 'edit the reservation.', '2021-09-19 16:16:36', '2021-09-19 16:16:36', '0000-00-00 00:00:00'),
(690, 17, 77, 'edit the reservation.', '2021-09-19 14:57:46', '2021-09-19 14:57:46', '0000-00-00 00:00:00'),
(689, 17, 77, 'edit the reservation.', '2021-09-19 14:47:57', '2021-09-19 14:47:57', '0000-00-00 00:00:00'),
(688, 17, 78, 'End of reservation', '2021-09-19 10:10:58', '2021-09-19 10:10:58', '0000-00-00 00:00:00'),
(687, 17, 78, 'Verified the official receipt.', '2021-09-19 10:10:22', '2021-09-19 10:10:22', '0000-00-00 00:00:00'),
(686, 17, 78, 'Uploaded the official receipt.', '2021-09-19 10:09:57', '2021-09-19 10:09:57', '0000-00-00 00:00:00'),
(685, 17, 78, 'generate payment voucher.', '2021-09-19 10:08:22', '2021-09-19 10:08:22', '0000-00-00 00:00:00'),
(684, 17, 78, 'approved the reservation.', '2021-09-19 10:07:25', '2021-09-19 10:07:25', '0000-00-00 00:00:00'),
(683, 17, 77, 'edit the reservation.', '2021-09-18 19:32:07', '2021-09-18 19:32:07', '0000-00-00 00:00:00'),
(682, 17, 77, 'edit the reservation.', '2021-09-18 19:29:27', '2021-09-18 19:29:27', '0000-00-00 00:00:00'),
(681, 17, 77, 'edit the reservation.', '2021-09-18 19:28:57', '2021-09-18 19:28:57', '0000-00-00 00:00:00'),
(680, 17, 76, 'edit the reservation.', '2021-09-18 17:47:27', '2021-09-18 17:47:27', '0000-00-00 00:00:00'),
(679, 17, 76, 'edit the reservation.', '2021-09-18 17:46:47', '2021-09-18 17:46:47', '0000-00-00 00:00:00'),
(678, 17, 75, 'edit the reservation.', '2021-09-18 14:10:09', '2021-09-18 14:10:09', '0000-00-00 00:00:00'),
(677, 17, 75, 'edit the reservation.', '2021-09-18 13:53:32', '2021-09-18 13:53:32', '0000-00-00 00:00:00'),
(676, 17, 73, 'edit the reservation.', '2021-09-17 13:57:57', '2021-09-17 13:57:57', '0000-00-00 00:00:00'),
(675, 17, 74, 'edit the reservation.', '2021-09-17 13:54:50', '2021-09-17 13:54:50', '0000-00-00 00:00:00'),
(674, 17, 74, 'edit the reservation.', '2021-09-17 13:54:27', '2021-09-17 13:54:27', '0000-00-00 00:00:00'),
(673, 17, 74, 'edit the reservation.', '2021-09-17 13:46:39', '2021-09-17 13:46:39', '0000-00-00 00:00:00'),
(672, 17, 74, 'edit the reservation.', '2021-09-17 13:45:33', '2021-09-17 13:45:33', '0000-00-00 00:00:00'),
(671, 17, 74, 'edit the reservation.', '2021-09-17 13:17:38', '2021-09-17 13:17:38', '0000-00-00 00:00:00'),
(670, 17, 73, 'edit the reservation.', '2021-09-17 11:27:58', '2021-09-17 11:27:58', '0000-00-00 00:00:00'),
(669, 17, 73, 'edit the reservation.', '2021-09-17 11:15:16', '2021-09-17 11:15:16', '0000-00-00 00:00:00'),
(668, 17, 73, 'edit the reservation.', '2021-09-17 11:14:17', '2021-09-17 11:14:17', '0000-00-00 00:00:00'),
(667, 17, 73, 'edit the reservation.', '2021-09-17 11:11:03', '2021-09-17 11:11:03', '0000-00-00 00:00:00'),
(666, 17, 73, 'edit the reservation.', '2021-09-17 11:10:02', '2021-09-17 11:10:02', '0000-00-00 00:00:00'),
(665, 17, 73, 'edit the reservation.', '2021-09-17 11:09:12', '2021-09-17 11:09:12', '0000-00-00 00:00:00'),
(664, 17, 73, 'edit the reservation.', '2021-09-17 11:08:48', '2021-09-17 11:08:48', '0000-00-00 00:00:00'),
(663, 17, 73, 'edit the reservation.', '2021-09-17 11:06:26', '2021-09-17 11:06:26', '0000-00-00 00:00:00'),
(662, 17, 73, 'edit the reservation.', '2021-09-17 11:03:39', '2021-09-17 11:03:39', '0000-00-00 00:00:00'),
(661, 17, 73, 'edit the reservation.', '2021-09-17 10:45:56', '2021-09-17 10:45:56', '0000-00-00 00:00:00'),
(660, 17, 69, 'edit the reservation.', '2021-09-12 22:25:24', '2021-09-12 22:25:24', '0000-00-00 00:00:00'),
(659, 17, 69, 'Uploaded the official receipt.', '2021-08-27 19:46:58', '2021-08-27 19:46:58', '0000-00-00 00:00:00'),
(658, 17, 69, 'generate payment voucher.', '2021-08-27 18:52:58', '2021-08-27 18:52:58', '0000-00-00 00:00:00'),
(657, 17, 69, 'generate payment voucher.', '2021-08-27 18:51:00', '2021-08-27 18:51:00', '0000-00-00 00:00:00'),
(656, 17, 69, 'generate payment voucher.', '2021-08-27 12:20:19', '2021-08-27 12:20:19', '0000-00-00 00:00:00'),
(655, 17, 69, 'generate payment voucher.', '2021-08-27 12:18:29', '2021-08-27 12:18:29', '0000-00-00 00:00:00'),
(654, 17, 69, 'generate payment voucher.', '2021-08-27 12:17:42', '2021-08-27 12:17:42', '0000-00-00 00:00:00'),
(653, 17, 69, 'generate payment voucher.', '2021-08-27 12:14:21', '2021-08-27 12:14:21', '0000-00-00 00:00:00'),
(652, 17, 69, 'generate payment voucher.', '2021-08-27 12:13:20', '2021-08-27 12:13:20', '0000-00-00 00:00:00'),
(651, 17, 69, 'generate payment voucher.', '2021-08-27 12:10:19', '2021-08-27 12:10:19', '0000-00-00 00:00:00'),
(650, 17, 69, 'generate payment voucher.', '2021-08-27 12:09:41', '2021-08-27 12:09:41', '0000-00-00 00:00:00'),
(649, 17, 69, 'generate payment voucher.', '2021-08-27 12:08:20', '2021-08-27 12:08:20', '0000-00-00 00:00:00'),
(648, 17, 69, 'generate payment voucher.', '2021-08-27 12:06:58', '2021-08-27 12:06:58', '0000-00-00 00:00:00'),
(647, 17, 69, 'generate payment voucher.', '2021-08-27 12:04:45', '2021-08-27 12:04:45', '0000-00-00 00:00:00'),
(646, 17, 69, 'generate payment voucher.', '2021-08-27 12:03:57', '2021-08-27 12:03:57', '0000-00-00 00:00:00'),
(645, 17, 69, 'generate payment voucher.', '2021-08-27 11:56:36', '2021-08-27 11:56:36', '0000-00-00 00:00:00'),
(644, 17, 69, 'generate payment voucher.', '2021-08-27 11:56:01', '2021-08-27 11:56:01', '0000-00-00 00:00:00'),
(643, 17, 69, 'generate payment voucher.', '2021-08-27 11:55:04', '2021-08-27 11:55:04', '0000-00-00 00:00:00'),
(642, 17, 69, 'generate payment voucher.', '2021-08-27 11:54:00', '2021-08-27 11:54:00', '0000-00-00 00:00:00'),
(641, 17, 69, 'generate payment voucher.', '2021-08-27 11:25:31', '2021-08-27 11:25:31', '0000-00-00 00:00:00'),
(640, 17, 69, 'generate payment voucher.', '2021-08-27 11:24:29', '2021-08-27 11:24:29', '0000-00-00 00:00:00'),
(639, 17, 69, 'generate payment voucher.', '2021-08-27 11:21:36', '2021-08-27 11:21:36', '0000-00-00 00:00:00'),
(638, 17, 69, 'generate payment voucher.', '2021-08-27 11:19:22', '2021-08-27 11:19:22', '0000-00-00 00:00:00'),
(637, 17, 69, 'approved the reservation.', '2021-08-27 11:18:48', '2021-08-27 11:18:48', '0000-00-00 00:00:00'),
(636, 17, 72, 'Return equipment.', '2021-08-27 03:23:58', '2021-08-27 03:23:58', '0000-00-00 00:00:00'),
(635, 17, 72, 'Return equipment.', '2021-08-27 03:23:48', '2021-08-27 03:23:48', '0000-00-00 00:00:00'),
(634, 17, 72, 'Return equipment.', '2021-08-27 03:23:33', '2021-08-27 03:23:33', '0000-00-00 00:00:00'),
(633, 17, 72, 'Return equipment.', '2021-08-27 03:22:15', '2021-08-27 03:22:15', '0000-00-00 00:00:00'),
(632, 17, 72, 'Return equipment.', '2021-08-27 03:22:04', '2021-08-27 03:22:04', '0000-00-00 00:00:00'),
(631, 17, 72, 'Return equipment.', '2021-08-27 03:21:10', '2021-08-27 03:21:10', '0000-00-00 00:00:00'),
(630, 17, 72, 'Return equipment.', '2021-08-27 03:19:20', '2021-08-27 03:19:20', '0000-00-00 00:00:00'),
(629, 17, 72, 'End of reservation', '2021-08-27 03:17:05', '2021-08-27 03:17:05', '0000-00-00 00:00:00'),
(628, 17, 72, 'Verified the official receipt.', '2021-08-27 03:16:23', '2021-08-27 03:16:23', '0000-00-00 00:00:00'),
(627, 17, 72, 'approved the reservation.', '2021-08-27 03:15:47', '2021-08-27 03:15:47', '0000-00-00 00:00:00'),
(626, 17, 72, 'edit the reservation.', '2021-08-27 03:14:46', '2021-08-27 03:14:46', '0000-00-00 00:00:00'),
(625, 17, 72, 'Cancelled the reservation.', '2021-08-27 03:13:29', '2021-08-27 03:13:29', '0000-00-00 00:00:00'),
(624, 17, 72, 'Verified the official receipt.', '2021-08-27 03:10:57', '2021-08-27 03:10:57', '0000-00-00 00:00:00'),
(623, 115, 72, 'Uploaded the official receipt.', '2021-08-27 03:05:24', '2021-08-27 03:05:24', '0000-00-00 00:00:00'),
(622, 17, 72, 'generate payment voucher.', '2021-08-27 03:01:59', '2021-08-27 03:01:59', '0000-00-00 00:00:00'),
(621, 17, 72, 'approved the reservation.', '2021-08-27 02:59:47', '2021-08-27 02:59:47', '0000-00-00 00:00:00'),
(620, 17, 72, 'generate activity form', '2021-08-27 02:57:51', '2021-08-27 02:57:51', '0000-00-00 00:00:00'),
(619, 17, 72, 'reassess of the reservation', '2021-08-27 02:57:00', '2021-08-27 02:57:00', '0000-00-00 00:00:00'),
(618, 17, 72, 'generate payment voucher.', '2021-08-27 02:56:29', '2021-08-27 02:56:29', '0000-00-00 00:00:00'),
(617, 17, 72, 'approved the reservation.', '2021-08-27 02:54:13', '2021-08-27 02:54:13', '0000-00-00 00:00:00'),
(616, 17, 69, 'generate activity form', '2021-08-27 02:01:15', '2021-08-27 02:01:15', '0000-00-00 00:00:00'),
(615, 17, 69, 'generate activity form', '2021-08-27 01:59:35', '2021-08-27 01:59:35', '0000-00-00 00:00:00'),
(614, 17, 69, 'reassess of the reservation', '2021-08-27 01:58:43', '2021-08-27 01:58:43', '0000-00-00 00:00:00'),
(613, 17, 71, 'Return equipment.', '2021-08-27 01:26:14', '2021-08-27 01:26:14', '0000-00-00 00:00:00'),
(612, 17, 71, 'Return equipment.', '2021-08-27 01:26:05', '2021-08-27 01:26:05', '0000-00-00 00:00:00'),
(611, 17, 71, 'Return equipment.', '2021-08-27 01:23:14', '2021-08-27 01:23:14', '0000-00-00 00:00:00'),
(610, 17, 71, 'End of reservation', '2021-08-27 01:22:42', '2021-08-27 01:22:42', '0000-00-00 00:00:00'),
(609, 17, 71, 'Verified the official receipt.', '2021-08-27 01:22:25', '2021-08-27 01:22:25', '0000-00-00 00:00:00'),
(608, 17, 71, 'Uploaded the official receipt.', '2021-08-27 01:21:32', '2021-08-27 01:21:32', '0000-00-00 00:00:00'),
(607, 17, 71, 'generate payment voucher.', '2021-08-27 01:19:24', '2021-08-27 01:19:24', '0000-00-00 00:00:00'),
(606, 17, 71, 'generate payment voucher.', '2021-08-27 01:18:02', '2021-08-27 01:18:02', '0000-00-00 00:00:00'),
(605, 17, 71, 'generate payment voucher.', '2021-08-27 01:14:19', '2021-08-27 01:14:19', '0000-00-00 00:00:00'),
(604, 17, 71, 'generate payment voucher.', '2021-08-27 01:12:21', '2021-08-27 01:12:21', '0000-00-00 00:00:00'),
(603, 17, 71, 'generate payment voucher.', '2021-08-27 01:11:02', '2021-08-27 01:11:02', '0000-00-00 00:00:00'),
(602, 17, 71, 'approved the reservation.', '2021-08-27 01:10:39', '2021-08-27 01:10:39', '0000-00-00 00:00:00'),
(601, 17, 69, 'approved the reservation.', '2021-08-27 01:05:09', '2021-08-27 01:05:09', '0000-00-00 00:00:00'),
(600, 17, 69, 'edit the reservation.', '2021-08-27 01:03:28', '2021-08-27 01:03:28', '0000-00-00 00:00:00'),
(599, 17, 69, 'generate activity form', '2021-08-27 00:46:14', '2021-08-27 00:46:14', '0000-00-00 00:00:00'),
(598, 17, 69, 'generate activity form', '2021-08-27 00:36:31', '2021-08-27 00:36:31', '0000-00-00 00:00:00'),
(597, 17, 69, 'generate activity form', '2021-08-27 00:34:57', '2021-08-27 00:34:57', '0000-00-00 00:00:00'),
(596, 17, 69, 'generate activity form', '2021-08-27 00:32:36', '2021-08-27 00:32:36', '0000-00-00 00:00:00'),
(595, 17, 69, 'generate activity form', '2021-08-27 00:31:16', '2021-08-27 00:31:16', '0000-00-00 00:00:00'),
(594, 17, 69, 'generate activity form', '2021-08-27 00:29:04', '2021-08-27 00:29:04', '0000-00-00 00:00:00'),
(593, 17, 69, 'generate activity form', '2021-08-27 00:22:27', '2021-08-27 00:22:27', '0000-00-00 00:00:00'),
(592, 17, 69, 'generate activity form', '2021-08-27 00:20:15', '2021-08-27 00:20:15', '0000-00-00 00:00:00'),
(591, 17, 69, 'generate activity form', '2021-08-27 00:18:36', '2021-08-27 00:18:36', '0000-00-00 00:00:00'),
(590, 17, 69, 'generate activity form', '2021-08-27 00:14:57', '2021-08-27 00:14:57', '0000-00-00 00:00:00'),
(589, 17, 69, 'generate activity form', '2021-08-27 00:11:52', '2021-08-27 00:11:52', '0000-00-00 00:00:00'),
(588, 17, 69, 'generate activity form', '2021-08-27 00:10:27', '2021-08-27 00:10:27', '0000-00-00 00:00:00'),
(587, 17, 69, 'generate activity form', '2021-08-27 00:02:40', '2021-08-27 00:02:40', '0000-00-00 00:00:00'),
(586, 17, 69, 'generate activity form', '2021-08-26 23:58:11', '2021-08-26 23:58:11', '0000-00-00 00:00:00'),
(585, 17, 69, 'generate activity form', '2021-08-26 23:54:58', '2021-08-26 23:54:58', '0000-00-00 00:00:00'),
(584, 17, 69, 'generate activity form', '2021-08-26 23:52:06', '2021-08-26 23:52:06', '0000-00-00 00:00:00'),
(583, 17, 69, 'generate activity form', '2021-08-26 23:47:52', '2021-08-26 23:47:52', '0000-00-00 00:00:00'),
(582, 17, 69, 'generate activity form', '2021-08-26 23:45:48', '2021-08-26 23:45:48', '0000-00-00 00:00:00'),
(581, 17, 69, 'generate activity form', '2021-08-26 23:44:49', '2021-08-26 23:44:49', '0000-00-00 00:00:00'),
(580, 17, 69, 'generate activity form', '2021-08-26 23:42:53', '2021-08-26 23:42:53', '0000-00-00 00:00:00'),
(579, 17, 69, 'generate activity form', '2021-08-26 23:36:54', '2021-08-26 23:36:54', '0000-00-00 00:00:00'),
(578, 17, 69, 'generate activity form', '2021-08-26 23:31:29', '2021-08-26 23:31:29', '0000-00-00 00:00:00'),
(577, 17, 69, 'generate activity form', '2021-08-26 23:18:18', '2021-08-26 23:18:18', '0000-00-00 00:00:00'),
(576, 17, 69, 'generate activity form', '2021-08-26 23:02:48', '2021-08-26 23:02:48', '0000-00-00 00:00:00'),
(575, 17, 69, 'generate activity form', '2021-08-26 22:58:47', '2021-08-26 22:58:47', '0000-00-00 00:00:00'),
(574, 17, 69, 'generate activity form', '2021-08-26 22:57:39', '2021-08-26 22:57:39', '0000-00-00 00:00:00'),
(573, 17, 69, 'generate activity form', '2021-08-26 22:56:52', '2021-08-26 22:56:52', '0000-00-00 00:00:00'),
(572, 17, 69, 'generate activity form', '2021-08-26 22:53:33', '2021-08-26 22:53:33', '0000-00-00 00:00:00'),
(571, 17, 69, 'generate activity form', '2021-08-26 22:49:39', '2021-08-26 22:49:39', '0000-00-00 00:00:00'),
(570, 17, 69, 'generate activity form', '2021-08-26 22:48:29', '2021-08-26 22:48:29', '0000-00-00 00:00:00'),
(569, 17, 69, 'generate activity form', '2021-08-26 22:43:23', '2021-08-26 22:43:23', '0000-00-00 00:00:00'),
(568, 17, 69, 'generate activity form', '2021-08-26 22:36:27', '2021-08-26 22:36:27', '0000-00-00 00:00:00'),
(567, 17, 69, 'generate activity form', '2021-08-26 22:35:18', '2021-08-26 22:35:18', '0000-00-00 00:00:00'),
(566, 17, 69, 'generate activity form', '2021-08-26 22:33:27', '2021-08-26 22:33:27', '0000-00-00 00:00:00'),
(565, 17, 69, 'generate activity form', '2021-08-26 22:31:04', '2021-08-26 22:31:04', '0000-00-00 00:00:00'),
(564, 17, 69, 'generate activity form', '2021-08-26 22:28:07', '2021-08-26 22:28:07', '0000-00-00 00:00:00'),
(563, 17, 69, 'generate activity form', '2021-08-26 22:23:54', '2021-08-26 22:23:54', '0000-00-00 00:00:00'),
(562, 17, 69, 'generate activity form', '2021-08-26 22:15:45', '2021-08-26 22:15:45', '0000-00-00 00:00:00'),
(561, 17, 69, 'generate activity form', '2021-08-26 22:12:07', '2021-08-26 22:12:07', '0000-00-00 00:00:00'),
(560, 17, 69, 'generate activity form', '2021-08-26 22:05:31', '2021-08-26 22:05:31', '0000-00-00 00:00:00'),
(559, 17, 69, 'generate activity form', '2021-08-26 22:03:30', '2021-08-26 22:03:30', '0000-00-00 00:00:00'),
(558, 17, 69, 'generate activity form', '2021-08-26 21:56:12', '2021-08-26 21:56:12', '0000-00-00 00:00:00'),
(557, 17, 69, 'Cancelled the reservation.', '2021-08-26 20:19:30', '2021-08-26 20:19:30', '0000-00-00 00:00:00'),
(556, 17, 69, 'Verified the official receipt.', '2021-08-26 12:25:36', '2021-08-26 12:25:36', '0000-00-00 00:00:00'),
(555, 17, 69, 'approved the reservation.', '2021-08-26 12:24:42', '2021-08-26 12:24:42', '0000-00-00 00:00:00'),
(554, 17, 69, 'edit the reservation.', '2021-08-26 12:23:48', '2021-08-26 12:23:48', '0000-00-00 00:00:00'),
(553, 17, 70, 'Return equipment.', '2021-08-26 12:16:00', '2021-08-26 12:16:00', '0000-00-00 00:00:00'),
(552, 17, 70, 'Return equipment.', '2021-08-26 12:15:36', '2021-08-26 12:15:36', '0000-00-00 00:00:00'),
(551, 17, 70, 'End of reservation', '2021-08-26 12:15:05', '2021-08-26 12:15:05', '0000-00-00 00:00:00'),
(550, 17, 70, 'Verified the official receipt.', '2021-08-26 12:14:27', '2021-08-26 12:14:27', '0000-00-00 00:00:00'),
(549, 17, 70, 'approved the reservation.', '2021-08-26 12:12:23', '2021-08-26 12:12:23', '0000-00-00 00:00:00'),
(548, 17, 70, 'edit the reservation.', '2021-08-26 12:10:33', '2021-08-26 12:10:33', '0000-00-00 00:00:00'),
(547, 17, 70, 'Cancelled the reservation.', '2021-08-26 12:09:01', '2021-08-26 12:09:01', '0000-00-00 00:00:00'),
(546, 17, 70, 'Verified the official receipt.', '2021-08-26 12:03:37', '2021-08-26 12:03:37', '0000-00-00 00:00:00'),
(545, 17, 70, 'Uploaded the official receipt.', '2021-08-26 12:02:53', '2021-08-26 12:02:53', '0000-00-00 00:00:00'),
(544, 17, 70, 'approved the reservation.', '2021-08-26 12:00:42', '2021-08-26 12:00:42', '0000-00-00 00:00:00'),
(543, 17, 70, 'reassess of the reservation', '2021-08-26 12:00:04', '2021-08-26 12:00:04', '0000-00-00 00:00:00'),
(542, 17, 70, 'approved the reservation.', '2021-08-26 11:59:36', '2021-08-26 11:59:36', '0000-00-00 00:00:00'),
(541, 17, 70, 'reassess of the reservation', '2021-08-26 11:50:04', '2021-08-26 11:50:04', '0000-00-00 00:00:00'),
(540, 17, 70, 'approved the reservation.', '2021-08-26 11:48:17', '2021-08-26 11:48:17', '0000-00-00 00:00:00'),
(539, 17, 69, 'generate activity form', '2021-08-26 09:12:43', '2021-08-26 09:12:43', '0000-00-00 00:00:00'),
(538, 17, 69, 'Cancelled the reservation.', '2021-08-26 09:11:51', '2021-08-26 09:11:51', '0000-00-00 00:00:00'),
(537, 17, 69, 'Verified the official receipt.', '2021-08-26 09:11:34', '2021-08-26 09:11:34', '0000-00-00 00:00:00'),
(536, 17, 69, 'Request for reupload of official receipt.', '2021-08-26 09:11:18', '2021-08-26 09:11:18', '0000-00-00 00:00:00'),
(535, 131, 69, 'Uploaded the official receipt.', '2021-08-26 09:08:18', '2021-08-26 09:08:18', '0000-00-00 00:00:00'),
(534, 131, 69, 'generate payment voucher.', '2021-08-26 09:07:08', '2021-08-26 09:07:08', '0000-00-00 00:00:00'),
(533, 17, 69, 'approved the reservation.', '2021-08-26 09:06:25', '2021-08-26 09:06:25', '0000-00-00 00:00:00'),
(532, 17, 69, 'reassess of the reservation', '2021-08-26 09:06:08', '2021-08-26 09:06:08', '0000-00-00 00:00:00'),
(531, 17, 69, 'rejected the reservation.', '2021-08-26 09:05:58', '2021-08-26 09:05:58', '0000-00-00 00:00:00'),
(530, 17, 69, 'reassess of the reservation', '2021-08-26 09:05:41', '2021-08-26 09:05:41', '0000-00-00 00:00:00'),
(529, 17, 69, 'approved the reservation.', '2021-08-26 09:05:28', '2021-08-26 09:05:28', '0000-00-00 00:00:00'),
(528, 17, 69, 'reassess of the reservation', '2021-08-26 09:05:12', '2021-08-26 09:05:12', '0000-00-00 00:00:00'),
(527, 17, 69, 'approved the reservation.', '2021-08-26 09:05:00', '2021-08-26 09:05:00', '0000-00-00 00:00:00'),
(526, 17, 62, 'End of reservation', '2021-08-26 07:52:50', '2021-08-26 07:52:50', '0000-00-00 00:00:00'),
(525, 17, 62, 'Verified the official receipt.', '2021-08-26 07:51:29', '2021-08-26 07:51:29', '0000-00-00 00:00:00'),
(524, 17, 62, 'Uploaded the official receipt.', '2021-08-26 07:49:52', '2021-08-26 07:49:52', '0000-00-00 00:00:00'),
(523, 17, 62, 'Uploaded the official receipt.', '2021-08-26 07:48:59', '2021-08-26 07:48:59', '0000-00-00 00:00:00'),
(522, 17, 62, 'approved the reservation.', '2021-08-26 07:48:24', '2021-08-26 07:48:24', '0000-00-00 00:00:00'),
(521, 17, 62, 'reassess of the reservation', '2021-08-26 07:48:09', '2021-08-26 07:48:09', '0000-00-00 00:00:00'),
(520, 17, 62, 'approved the reservation.', '2021-08-26 07:47:39', '2021-08-26 07:47:39', '0000-00-00 00:00:00'),
(519, 17, 62, 'reassess of the reservation', '2021-08-26 07:46:33', '2021-08-26 07:46:33', '0000-00-00 00:00:00'),
(518, 17, 62, 'rejected the reservation.', '2021-08-26 07:46:19', '2021-08-26 07:46:19', '0000-00-00 00:00:00'),
(517, 17, 62, 'reassess of the reservation', '2021-08-26 07:45:36', '2021-08-26 07:45:36', '0000-00-00 00:00:00'),
(516, 17, 62, 'rejected the reservation.', '2021-08-26 07:45:21', '2021-08-26 07:45:21', '0000-00-00 00:00:00'),
(515, 17, 62, 'reassess of the reservation', '2021-08-26 07:44:32', '2021-08-26 07:44:32', '0000-00-00 00:00:00'),
(514, 17, 62, 'rejected the reservation.', '2021-08-26 07:44:23', '2021-08-26 07:44:23', '0000-00-00 00:00:00'),
(513, 17, 62, 'reassess of the reservation', '2021-08-26 07:43:14', '2021-08-26 07:43:14', '0000-00-00 00:00:00'),
(512, 17, 62, 'rejected the reservation.', '2021-08-26 07:43:01', '2021-08-26 07:43:01', '0000-00-00 00:00:00'),
(511, 17, 62, 'reassess of the reservation', '2021-08-26 07:41:54', '2021-08-26 07:41:54', '0000-00-00 00:00:00'),
(510, 17, 62, 'reassess of the reservation', '2021-08-26 07:41:42', '2021-08-26 07:41:42', '0000-00-00 00:00:00'),
(509, 17, 62, 'reassess of the reservation', '2021-08-26 07:41:25', '2021-08-26 07:41:25', '0000-00-00 00:00:00'),
(508, 17, 62, 'rejected the reservation.', '2021-08-26 07:41:11', '2021-08-26 07:41:11', '0000-00-00 00:00:00'),
(507, 17, 62, 'reassess of the reservation', '2021-08-26 07:38:33', '2021-08-26 07:38:33', '0000-00-00 00:00:00'),
(506, 17, 62, 'rejected the reservation.', '2021-08-26 07:37:28', '2021-08-26 07:37:28', '0000-00-00 00:00:00'),
(505, 17, 62, 'reassess of the reservation', '2021-08-26 07:33:13', '2021-08-26 07:33:13', '0000-00-00 00:00:00'),
(504, 17, 62, 'reassess of the reservation', '2021-08-26 07:33:04', '2021-08-26 07:33:04', '0000-00-00 00:00:00'),
(503, 17, 62, 'approved the reservation.', '2021-08-26 07:13:09', '2021-08-26 07:13:09', '0000-00-00 00:00:00'),
(502, 17, 62, 'reassess of the reservation', '2021-08-26 07:13:02', '2021-08-26 07:13:02', '0000-00-00 00:00:00'),
(501, 17, 62, 'approved the reservation.', '2021-08-26 07:11:33', '2021-08-26 07:11:33', '0000-00-00 00:00:00'),
(500, 17, 62, 'reassess of the reservation', '2021-08-26 07:11:13', '2021-08-26 07:11:13', '0000-00-00 00:00:00'),
(499, 17, 62, 'approved the reservation.', '2021-08-26 07:09:56', '2021-08-26 07:09:56', '0000-00-00 00:00:00'),
(498, 17, 62, 'reassess of the reservation', '2021-08-26 07:09:01', '2021-08-26 07:09:01', '0000-00-00 00:00:00'),
(497, 17, 62, 'approved the reservation.', '2021-08-26 07:06:32', '2021-08-26 07:06:32', '0000-00-00 00:00:00'),
(496, 17, 62, 'approved the reservation.', '2021-08-26 07:06:23', '2021-08-26 07:06:23', '0000-00-00 00:00:00'),
(494, 17, 57, 'Return equipment.', '2021-08-26 05:22:47', '2021-08-26 05:22:47', '0000-00-00 00:00:00'),
(495, 17, 62, 'approved the reservation.', '2021-08-26 07:04:00', '2021-08-26 07:04:00', '0000-00-00 00:00:00'),
(493, 17, 57, 'Return equipment.', '2021-08-26 05:22:36', '2021-08-26 05:22:36', '0000-00-00 00:00:00'),
(492, 17, 57, 'Return equipment.', '2021-08-26 05:22:24', '2021-08-26 05:22:24', '0000-00-00 00:00:00'),
(491, 17, 57, 'Return equipment.', '2021-08-26 05:22:02', '2021-08-26 05:22:02', '0000-00-00 00:00:00'),
(490, 17, 57, 'End of reservation', '2021-08-26 05:21:28', '2021-08-26 05:21:28', '0000-00-00 00:00:00'),
(489, 17, 57, 'Verified the official receipt.', '2021-08-26 05:21:09', '2021-08-26 05:21:09', '0000-00-00 00:00:00'),
(487, 17, 57, 'approved the reservation.', '2021-08-26 05:20:26', '2021-08-26 05:20:26', '0000-00-00 00:00:00'),
(488, 17, 57, 'Uploaded the official receipt.', '2021-08-26 05:20:47', '2021-08-26 05:20:47', '0000-00-00 00:00:00'),
(486, 17, 57, 'edit the reservation.', '2021-08-26 05:09:04', '2021-08-26 05:09:04', '0000-00-00 00:00:00'),
(485, 17, 57, 'edit the reservation.', '2021-08-26 05:06:31', '2021-08-26 05:06:31', '0000-00-00 00:00:00'),
(716, 17, 69, 'generate payment voucher.', '2021-09-19 22:43:32', '2021-09-19 22:43:32', '0000-00-00 00:00:00'),
(717, 17, 69, 'generate payment voucher.', '2021-09-19 22:44:57', '2021-09-19 22:44:57', '0000-00-00 00:00:00'),
(718, 17, 69, 'generate payment voucher.', '2021-09-19 22:45:54', '2021-09-19 22:45:54', '0000-00-00 00:00:00'),
(719, 17, 69, 'generate payment voucher.', '2021-09-19 22:47:46', '2021-09-19 22:47:46', '0000-00-00 00:00:00'),
(720, 17, 69, 'generate payment voucher.', '2021-09-19 22:49:00', '2021-09-19 22:49:00', '0000-00-00 00:00:00'),
(721, 17, 69, 'generate payment voucher.', '2021-09-19 22:51:06', '2021-09-19 22:51:06', '0000-00-00 00:00:00'),
(722, 17, 69, 'generate payment voucher.', '2021-09-20 09:45:52', '2021-09-20 09:45:52', '0000-00-00 00:00:00'),
(723, 17, 69, 'generate payment voucher.', '2021-09-20 11:38:31', '2021-09-20 11:38:31', '0000-00-00 00:00:00'),
(726, 33, 0, 'signed in', '2021-09-21 12:34:50', '2021-09-21 12:34:50', '0000-00-00 00:00:00'),
(725, 17, 0, 'signed in', '2021-09-21 12:26:55', '2021-09-21 12:26:55', '0000-00-00 00:00:00'),
(727, 131, 0, 'signed in', '2021-09-21 12:36:32', '2021-09-21 12:36:32', '0000-00-00 00:00:00'),
(728, 17, 0, 'signed in', '2021-09-21 12:37:58', '2021-09-21 12:37:58', '0000-00-00 00:00:00'),
(729, 17, 80, 'approved the reservation.', '2021-09-21 12:38:59', '2021-09-21 12:38:59', '0000-00-00 00:00:00'),
(730, 17, 80, 'Uploaded the official receipt.', '2021-09-21 12:39:37', '2021-09-21 12:39:37', '0000-00-00 00:00:00'),
(731, 17, 80, 'Verified the official receipt.', '2021-09-21 12:40:08', '2021-09-21 12:40:08', '0000-00-00 00:00:00'),
(732, 131, 0, 'signed in', '2021-09-21 14:27:21', '2021-09-21 14:27:21', '0000-00-00 00:00:00'),
(733, 17, 0, 'signed in', '2021-09-21 14:28:12', '2021-09-21 14:28:12', '0000-00-00 00:00:00'),
(734, 131, 69, 'generate payment voucher.', '2021-09-21 14:29:14', '2021-09-21 14:29:14', '0000-00-00 00:00:00'),
(735, 131, 69, 'Uploaded the official receipt.', '2021-09-21 14:29:14', '2021-09-21 14:29:14', '0000-00-00 00:00:00'),
(736, 17, 69, 'Verified the official receipt.', '2021-09-21 14:29:49', '2021-09-21 14:29:49', '0000-00-00 00:00:00'),
(737, 131, 81, 'generate activity form', '2021-09-21 15:01:04', '2021-09-21 15:01:04', '0000-00-00 00:00:00'),
(738, 17, 69, 'generate activity permit', '2021-09-21 15:12:51', '2021-09-21 15:12:51', '0000-00-00 00:00:00'),
(739, 17, 69, 'generate activity permit', '2021-09-21 15:14:01', '2021-09-21 15:14:01', '0000-00-00 00:00:00'),
(740, 17, 69, 'generate activity permit', '2021-09-21 15:15:56', '2021-09-21 15:15:56', '0000-00-00 00:00:00'),
(741, 17, 69, 'generate activity permit', '2021-09-21 15:18:12', '2021-09-21 15:18:12', '0000-00-00 00:00:00'),
(742, 131, 81, 'generate activity form', '2021-09-21 15:21:55', '2021-09-21 15:21:55', '0000-00-00 00:00:00'),
(743, 17, 69, 'generate activity permit', '2021-09-21 15:22:12', '2021-09-21 15:22:12', '0000-00-00 00:00:00'),
(744, 17, 69, 'generate activity permit', '2021-09-21 15:22:57', '2021-09-21 15:22:57', '0000-00-00 00:00:00'),
(745, 17, 69, 'generate activity permit', '2021-09-21 15:25:58', '2021-09-21 15:25:58', '0000-00-00 00:00:00'),
(746, 17, 69, 'generate activity permit', '2021-09-21 15:27:40', '2021-09-21 15:27:40', '0000-00-00 00:00:00'),
(747, 17, 69, 'generate activity permit', '2021-09-21 15:29:58', '2021-09-21 15:29:58', '0000-00-00 00:00:00'),
(748, 17, 69, 'generate activity permit', '2021-09-21 15:30:27', '2021-09-21 15:30:27', '0000-00-00 00:00:00'),
(749, 17, 81, 'generate activity form', '2021-09-21 15:32:24', '2021-09-21 15:32:24', '0000-00-00 00:00:00'),
(750, 17, 81, 'approved the reservation.', '2021-09-21 15:32:48', '2021-09-21 15:32:48', '0000-00-00 00:00:00'),
(751, 17, 81, 'generate payment voucher.', '2021-09-21 15:33:28', '2021-09-21 15:33:28', '0000-00-00 00:00:00'),
(752, 17, 81, 'generate activity form', '2021-09-21 15:43:41', '2021-09-21 15:43:41', '0000-00-00 00:00:00'),
(753, 17, 0, 'signed in', '2021-09-21 15:51:28', '2021-09-21 15:51:28', '0000-00-00 00:00:00'),
(754, 17, 0, 'signed in', '2021-09-21 16:17:50', '2021-09-21 16:17:50', '0000-00-00 00:00:00'),
(755, 17, 82, 'generate activity form', '2021-09-21 17:28:49', '2021-09-21 17:28:49', '0000-00-00 00:00:00'),
(756, 17, 82, 'rejected the reservation.', '2021-09-21 17:28:49', '2021-09-21 17:28:49', '0000-00-00 00:00:00'),
(757, 17, 82, 'rejected the reservation.', '2021-09-21 17:30:00', '2021-09-21 17:30:00', '0000-00-00 00:00:00'),
(758, 17, 82, 'reassess of the reservation', '2021-09-21 17:32:07', '2021-09-21 17:32:07', '0000-00-00 00:00:00'),
(759, 17, 82, 'rejected the reservation.', '2021-09-21 17:35:19', '2021-09-21 17:35:19', '0000-00-00 00:00:00'),
(760, 17, 82, 'rejected the reservation.', '2021-09-21 17:36:03', '2021-09-21 17:36:03', '0000-00-00 00:00:00'),
(761, 17, 82, 'rejected the reservation.', '2021-09-21 17:36:08', '2021-09-21 17:36:08', '0000-00-00 00:00:00'),
(762, 17, 82, 'rejected the reservation.', '2021-09-21 18:19:42', '2021-09-21 18:19:42', '0000-00-00 00:00:00'),
(763, 17, 82, 'reassess of the reservation', '2021-09-21 18:20:18', '2021-09-21 18:20:18', '0000-00-00 00:00:00'),
(764, 17, 82, 'rejected the reservation.', '2021-09-21 18:20:33', '2021-09-21 18:20:33', '0000-00-00 00:00:00'),
(765, 17, 82, 'rejected the reservation.', '2021-09-21 18:21:33', '2021-09-21 18:21:33', '0000-00-00 00:00:00'),
(766, 17, 82, 'reassess of the reservation', '2021-09-21 18:22:00', '2021-09-21 18:22:00', '0000-00-00 00:00:00'),
(767, 17, 82, 'rejected the reservation.', '2021-09-21 18:22:21', '2021-09-21 18:22:21', '0000-00-00 00:00:00'),
(768, 17, 82, 'reassess of the reservation', '2021-09-21 18:23:22', '2021-09-21 18:23:22', '0000-00-00 00:00:00'),
(769, 17, 82, 'rejected the reservation.', '2021-09-21 18:23:41', '2021-09-21 18:23:41', '0000-00-00 00:00:00'),
(770, 17, 82, 'reassess of the reservation', '2021-09-21 18:53:27', '2021-09-21 18:53:27', '0000-00-00 00:00:00'),
(771, 17, 0, 'signed in', '2021-10-06 16:07:54', '2021-10-06 16:07:54', '0000-00-00 00:00:00'),
(772, 17, 82, 'approved the reservation.', '2021-10-06 16:09:59', '2021-10-06 16:09:59', '0000-00-00 00:00:00'),
(773, 17, 82, 'reassess of the reservation', '2021-10-06 16:10:23', '2021-10-06 16:10:23', '0000-00-00 00:00:00'),
(774, 17, 82, 'approved the reservation.', '2021-10-06 16:10:59', '2021-10-06 16:10:59', '0000-00-00 00:00:00'),
(775, 17, 82, 'reassess of the reservation', '2021-10-06 16:17:34', '2021-10-06 16:17:34', '0000-00-00 00:00:00'),
(776, 17, 82, 'approved the reservation.', '2021-10-06 16:17:46', '2021-10-06 16:17:46', '0000-00-00 00:00:00'),
(777, 17, 82, 'reassess of the reservation', '2021-10-06 16:19:14', '2021-10-06 16:19:14', '0000-00-00 00:00:00'),
(778, 17, 82, 'approved the reservation.', '2021-10-06 16:19:26', '2021-10-06 16:19:26', '0000-00-00 00:00:00'),
(779, 17, 82, 'reassess of the reservation', '2021-10-06 16:22:26', '2021-10-06 16:22:26', '0000-00-00 00:00:00'),
(780, 17, 82, 'approved the reservation.', '2021-10-06 16:22:50', '2021-10-06 16:22:50', '0000-00-00 00:00:00'),
(781, 17, 82, 'reassess of the reservation', '2021-10-06 16:24:11', '2021-10-06 16:24:11', '0000-00-00 00:00:00'),
(782, 17, 82, 'approved the reservation.', '2021-10-06 16:24:21', '2021-10-06 16:24:21', '0000-00-00 00:00:00'),
(783, 17, 82, 'reassess of the reservation', '2021-10-06 16:24:44', '2021-10-06 16:24:44', '0000-00-00 00:00:00'),
(784, 17, 82, 'approved the reservation.', '2021-10-06 16:24:57', '2021-10-06 16:24:57', '0000-00-00 00:00:00'),
(785, 17, 82, 'reassess of the reservation', '2021-10-06 16:25:44', '2021-10-06 16:25:44', '0000-00-00 00:00:00'),
(786, 17, 82, 'approved the reservation.', '2021-10-06 16:26:07', '2021-10-06 16:26:07', '0000-00-00 00:00:00'),
(787, 17, 82, 'reassess of the reservation', '2021-10-06 16:31:41', '2021-10-06 16:31:41', '0000-00-00 00:00:00'),
(788, 17, 82, 'approved the reservation.', '2021-10-06 16:31:57', '2021-10-06 16:31:57', '0000-00-00 00:00:00'),
(789, 17, 82, 'reassess of the reservation', '2021-10-06 16:36:34', '2021-10-06 16:36:34', '0000-00-00 00:00:00'),
(790, 17, 82, 'approved the reservation.', '2021-10-06 16:36:45', '2021-10-06 16:36:45', '0000-00-00 00:00:00'),
(791, 17, 82, 'reassess of the reservation', '2021-10-06 16:37:45', '2021-10-06 16:37:45', '0000-00-00 00:00:00'),
(792, 17, 82, 'approved the reservation.', '2021-10-06 16:37:58', '2021-10-06 16:37:58', '0000-00-00 00:00:00'),
(793, 17, 82, 'reassess of the reservation', '2021-10-06 16:38:24', '2021-10-06 16:38:24', '0000-00-00 00:00:00'),
(794, 17, 82, 'approved the reservation.', '2021-10-06 16:38:42', '2021-10-06 16:38:42', '0000-00-00 00:00:00'),
(795, 17, 82, 'reassess of the reservation', '2021-10-06 16:39:18', '2021-10-06 16:39:18', '0000-00-00 00:00:00'),
(796, 17, 82, 'approved the reservation.', '2021-10-06 16:39:31', '2021-10-06 16:39:31', '0000-00-00 00:00:00'),
(797, 17, 82, 'reassess of the reservation', '2021-10-06 16:41:07', '2021-10-06 16:41:07', '0000-00-00 00:00:00'),
(798, 17, 82, 'approved the reservation.', '2021-10-06 16:41:24', '2021-10-06 16:41:24', '0000-00-00 00:00:00'),
(799, 17, 82, 'reassess of the reservation', '2021-10-06 16:42:16', '2021-10-06 16:42:16', '0000-00-00 00:00:00'),
(800, 17, 82, 'approved the reservation.', '2021-10-06 16:42:37', '2021-10-06 16:42:37', '0000-00-00 00:00:00'),
(801, 17, 82, 'reassess of the reservation', '2021-10-06 16:42:47', '2021-10-06 16:42:47', '0000-00-00 00:00:00'),
(802, 17, 82, 'approved the reservation.', '2021-10-06 16:43:04', '2021-10-06 16:43:04', '0000-00-00 00:00:00'),
(803, 17, 82, 'reassess of the reservation', '2021-10-06 16:44:06', '2021-10-06 16:44:06', '0000-00-00 00:00:00'),
(804, 17, 82, 'approved the reservation.', '2021-10-06 16:44:19', '2021-10-06 16:44:19', '0000-00-00 00:00:00'),
(805, 17, 82, 'reassess of the reservation', '2021-10-06 16:44:50', '2021-10-06 16:44:50', '0000-00-00 00:00:00'),
(806, 17, 82, 'approved the reservation.', '2021-10-06 16:45:20', '2021-10-06 16:45:20', '0000-00-00 00:00:00'),
(807, 17, 82, 'reassess of the reservation', '2021-10-06 16:48:45', '2021-10-06 16:48:45', '0000-00-00 00:00:00'),
(808, 17, 82, 'approved the reservation.', '2021-10-06 16:50:13', '2021-10-06 16:50:13', '0000-00-00 00:00:00'),
(809, 17, 82, 'reassess of the reservation', '2021-10-06 16:54:05', '2021-10-06 16:54:05', '0000-00-00 00:00:00'),
(810, 17, 82, 'approved the reservation.', '2021-10-06 16:54:23', '2021-10-06 16:54:23', '0000-00-00 00:00:00'),
(811, 17, 82, 'reassess of the reservation', '2021-10-06 16:55:27', '2021-10-06 16:55:27', '0000-00-00 00:00:00'),
(812, 17, 82, 'approved the reservation.', '2021-10-06 16:55:46', '2021-10-06 16:55:46', '0000-00-00 00:00:00'),
(813, 17, 82, 'reassess of the reservation', '2021-10-06 16:56:22', '2021-10-06 16:56:22', '0000-00-00 00:00:00'),
(814, 17, 82, 'approved the reservation.', '2021-10-06 16:59:37', '2021-10-06 16:59:37', '0000-00-00 00:00:00'),
(815, 17, 82, 'reassess of the reservation', '2021-10-06 17:04:38', '2021-10-06 17:04:38', '0000-00-00 00:00:00'),
(816, 17, 82, 'approved the reservation.', '2021-10-06 17:04:56', '2021-10-06 17:04:56', '0000-00-00 00:00:00'),
(817, 17, 82, 'reassess of the reservation', '2021-10-06 17:19:42', '2021-10-06 17:19:42', '0000-00-00 00:00:00'),
(818, 17, 82, 'approved the reservation.', '2021-10-06 17:19:58', '2021-10-06 17:19:58', '0000-00-00 00:00:00'),
(819, 17, 82, 'reassess of the reservation', '2021-10-06 17:21:08', '2021-10-06 17:21:08', '0000-00-00 00:00:00'),
(820, 17, 82, 'rejected the reservation.', '2021-10-06 17:43:41', '2021-10-06 17:43:41', '0000-00-00 00:00:00'),
(821, 17, 82, 'reassess of the reservation', '2021-10-06 17:43:54', '2021-10-06 17:43:54', '0000-00-00 00:00:00'),
(822, 17, 82, 'approved the reservation.', '2021-10-06 17:44:56', '2021-10-06 17:44:56', '0000-00-00 00:00:00'),
(823, 17, 82, 'reassess of the reservation', '2021-10-06 17:45:18', '2021-10-06 17:45:18', '0000-00-00 00:00:00'),
(824, 17, 82, 'approved the reservation.', '2021-10-06 17:45:32', '2021-10-06 17:45:32', '0000-00-00 00:00:00'),
(825, 17, 82, 'Uploaded the official receipt.', '2021-10-06 17:46:15', '2021-10-06 17:46:15', '0000-00-00 00:00:00'),
(826, 17, 82, 'Verified the official receipt.', '2021-10-06 17:46:39', '2021-10-06 17:46:39', '0000-00-00 00:00:00'),
(827, 17, 82, 'Cancelled the reservation.', '2021-10-06 17:46:57', '2021-10-06 17:46:57', '0000-00-00 00:00:00'),
(828, 17, 82, 'edit the reservation.', '2021-10-06 17:47:28', '2021-10-06 17:47:28', '0000-00-00 00:00:00'),
(829, 17, 82, 'approved the reservation.', '2021-10-06 17:48:01', '2021-10-06 17:48:01', '0000-00-00 00:00:00'),
(830, 17, 82, 'Request for reupload of official receipt.', '2021-10-06 17:48:19', '2021-10-06 17:48:19', '0000-00-00 00:00:00'),
(831, 17, 82, 'reassess of the reservation', '2021-10-06 18:06:05', '2021-10-06 18:06:05', '0000-00-00 00:00:00'),
(832, 131, 0, 'signed in', '2021-10-06 20:25:17', '2021-10-06 20:25:17', '0000-00-00 00:00:00'),
(833, 17, 0, 'signed in', '2021-10-06 20:29:06', '2021-10-06 20:29:06', '0000-00-00 00:00:00'),
(834, 131, 0, 'signed in', '2021-10-06 20:31:15', '2021-10-06 20:31:15', '0000-00-00 00:00:00'),
(835, 17, 0, 'signed in', '2021-10-06 20:40:03', '2021-10-06 20:40:03', '0000-00-00 00:00:00'),
(836, 131, 0, 'signed in', '2021-10-06 20:46:56', '2021-10-06 20:46:56', '0000-00-00 00:00:00'),
(837, 17, 0, 'signed in', '2021-10-06 21:01:30', '2021-10-06 21:01:30', '0000-00-00 00:00:00'),
(838, 131, 0, 'signed in', '2021-10-06 21:04:22', '2021-10-06 21:04:22', '0000-00-00 00:00:00'),
(839, 17, 0, 'signed in', '2021-10-06 21:08:32', '2021-10-06 21:08:32', '0000-00-00 00:00:00'),
(840, 131, 0, 'signed in', '2021-10-06 21:09:28', '2021-10-06 21:09:28', '0000-00-00 00:00:00'),
(841, 17, 0, 'signed in', '2021-10-06 21:34:12', '2021-10-06 21:34:12', '0000-00-00 00:00:00'),
(842, 131, 0, 'signed in', '2021-10-06 21:36:15', '2021-10-06 21:36:15', '0000-00-00 00:00:00'),
(843, 17, 0, 'signed in', '2021-10-06 21:44:56', '2021-10-06 21:44:56', '0000-00-00 00:00:00'),
(844, 131, 0, 'signed in', '2021-10-06 22:05:36', '2021-10-06 22:05:36', '0000-00-00 00:00:00'),
(845, 17, 0, 'signed in', '2021-10-06 22:06:13', '2021-10-06 22:06:13', '0000-00-00 00:00:00'),
(846, 131, 0, 'signed in', '2021-10-06 22:13:40', '2021-10-06 22:13:40', '0000-00-00 00:00:00'),
(847, 17, 0, 'signed in', '2021-10-06 22:14:02', '2021-10-06 22:14:02', '0000-00-00 00:00:00'),
(848, 17, 0, 'signed in', '2021-10-08 19:28:31', '2021-10-08 19:28:31', '0000-00-00 00:00:00'),
(849, 17, 82, 'approved the reservation.', '2021-10-08 23:04:22', '2021-10-08 23:04:22', '0000-00-00 00:00:00'),
(850, 17, 0, 'signed in', '2021-10-09 12:40:49', '2021-10-09 12:40:49', '0000-00-00 00:00:00'),
(851, 187, 0, 'signed in', '2021-10-09 12:41:13', '2021-10-09 12:41:13', '0000-00-00 00:00:00'),
(852, 17, 0, 'signed in', '2021-10-09 15:23:33', '2021-10-09 15:23:33', '0000-00-00 00:00:00'),
(853, 17, 0, 'signed in', '2021-10-09 22:10:01', '2021-10-09 22:10:01', '0000-00-00 00:00:00'),
(854, 17, 0, 'signed in', '2021-10-10 08:16:14', '2021-10-10 08:16:14', '0000-00-00 00:00:00'),
(855, 187, 0, 'signed in', '2021-10-10 09:49:45', '2021-10-10 09:49:45', '0000-00-00 00:00:00'),
(856, 187, 84, 'generate activity form', '2021-10-10 09:52:14', '2021-10-10 09:52:14', '0000-00-00 00:00:00'),
(857, 17, 0, 'signed in', '2021-10-10 09:54:13', '2021-10-10 09:54:13', '0000-00-00 00:00:00'),
(858, 17, 0, 'signed in', '2021-10-10 12:03:22', '2021-10-10 12:03:22', '0000-00-00 00:00:00'),
(859, 187, 0, 'signed in', '2021-10-10 13:02:41', '2021-10-10 13:02:41', '0000-00-00 00:00:00'),
(860, 17, 0, 'signed in', '2021-10-10 13:04:27', '2021-10-10 13:04:27', '0000-00-00 00:00:00'),
(861, 187, 0, 'signed in', '2021-10-10 14:55:46', '2021-10-10 14:55:46', '0000-00-00 00:00:00'),
(862, 17, 0, 'signed in', '2021-10-10 15:01:19', '2021-10-10 15:01:19', '0000-00-00 00:00:00'),
(863, 187, 0, 'signed in', '2021-10-10 15:50:28', '2021-10-10 15:50:28', '0000-00-00 00:00:00'),
(864, 17, 0, 'signed in', '2021-10-10 16:17:39', '2021-10-10 16:17:39', '0000-00-00 00:00:00'),
(865, 17, 0, 'signed in', '2021-10-10 16:34:51', '2021-10-10 16:34:51', '0000-00-00 00:00:00'),
(866, 187, 0, 'signed in', '2021-10-10 16:42:57', '2021-10-10 16:42:57', '0000-00-00 00:00:00'),
(867, 17, 0, 'signed in', '2021-10-10 16:53:26', '2021-10-10 16:53:26', '0000-00-00 00:00:00'),
(868, 187, 0, 'signed in', '2021-10-10 16:58:54', '2021-10-10 16:58:54', '0000-00-00 00:00:00'),
(869, 17, 0, 'signed in', '2021-10-10 18:03:00', '2021-10-10 18:03:00', '0000-00-00 00:00:00'),
(870, 17, 84, 'approved the reservation.', '2021-10-10 18:05:36', '2021-10-10 18:05:36', '0000-00-00 00:00:00'),
(871, 17, 84, 'Uploaded the official receipt.', '2021-10-10 18:06:00', '2021-10-10 18:06:00', '0000-00-00 00:00:00'),
(872, 17, 84, 'Verified the official receipt.', '2021-10-10 18:06:16', '2021-10-10 18:06:16', '0000-00-00 00:00:00'),
(873, 17, 84, 'End of reservation', '2021-10-10 18:06:33', '2021-10-10 18:06:33', '0000-00-00 00:00:00'),
(874, 187, 0, 'signed in', '2021-10-10 18:13:14', '2021-10-10 18:13:14', '0000-00-00 00:00:00'),
(875, 17, 0, 'signed in', '2021-10-10 18:14:14', '2021-10-10 18:14:14', '0000-00-00 00:00:00'),
(876, 17, 0, 'signed in', '2021-10-10 18:14:56', '2021-10-10 18:14:56', '0000-00-00 00:00:00'),
(877, 17, 0, 'signed in', '2021-11-05 10:23:00', '2021-11-05 10:23:00', '0000-00-00 00:00:00'),
(878, 17, 0, 'signed in', '2021-11-05 10:31:51', '2021-11-05 10:31:51', '0000-00-00 00:00:00'),
(879, 17, 0, 'signed in', '2022-06-19 10:40:54', '2022-06-19 10:40:54', '0000-00-00 00:00:00'),
(880, 17, 0, 'signed in', '2022-06-19 13:45:41', '2022-06-19 13:45:41', '0000-00-00 00:00:00'),
(881, 17, 0, 'signed in', '2022-06-19 15:29:05', '2022-06-19 15:29:05', '0000-00-00 00:00:00'),
(882, 17, 85, 'approved the reservation.', '2022-06-19 16:02:31', '2022-06-19 16:02:31', '0000-00-00 00:00:00'),
(883, 17, 85, 'reassess of the reservation', '2022-06-19 16:03:07', '2022-06-19 16:03:07', '0000-00-00 00:00:00'),
(884, 17, 85, 'edit the reservation.', '2022-06-19 16:04:40', '2022-06-19 16:04:40', '0000-00-00 00:00:00'),
(885, 17, 0, 'signed in', '2022-06-19 16:56:22', '2022-06-19 16:56:22', '0000-00-00 00:00:00'),
(886, 17, 0, 'signed in', '2022-06-19 17:39:32', '2022-06-19 17:39:32', '0000-00-00 00:00:00'),
(887, 17, 0, 'signed in', '2022-06-19 20:00:38', '2022-06-19 20:00:38', '0000-00-00 00:00:00'),
(888, 17, 0, 'signed in', '2022-06-19 20:03:28', '2022-06-19 20:03:28', '0000-00-00 00:00:00'),
(889, 17, 0, 'signed in', '2022-06-19 20:04:56', '2022-06-19 20:04:56', '0000-00-00 00:00:00'),
(890, 17, 0, 'signed in', '2022-06-26 12:50:11', '2022-06-26 12:50:11', '0000-00-00 00:00:00'),
(891, 17, 85, 'approved the reservation.', '2022-06-26 14:20:04', '2022-06-26 14:20:04', '0000-00-00 00:00:00'),
(892, 17, 85, 'approved the reservation.', '2022-06-26 14:20:56', '2022-06-26 14:20:56', '0000-00-00 00:00:00'),
(893, 17, 85, 'reassess of the reservation', '2022-06-26 14:22:58', '2022-06-26 14:22:58', '0000-00-00 00:00:00'),
(894, 17, 85, 'rejected the reservation.', '2022-06-26 14:23:25', '2022-06-26 14:23:25', '0000-00-00 00:00:00'),
(895, 17, 85, 'reassess of the reservation', '2022-06-26 14:24:10', '2022-06-26 14:24:10', '0000-00-00 00:00:00'),
(896, 17, 85, 'approved the reservation.', '2022-06-26 14:25:29', '2022-06-26 14:25:29', '0000-00-00 00:00:00'),
(897, 17, 85, 'approved the reservation.', '2022-06-26 14:25:32', '2022-06-26 14:25:32', '0000-00-00 00:00:00'),
(898, 17, 85, 'reassess of the reservation', '2022-06-26 14:37:35', '2022-06-26 14:37:35', '0000-00-00 00:00:00'),
(899, 17, 85, 'rejected the reservation.', '2022-06-26 14:37:49', '2022-06-26 14:37:49', '0000-00-00 00:00:00'),
(900, 17, 85, 'reassess of the reservation', '2022-06-26 14:38:05', '2022-06-26 14:38:05', '0000-00-00 00:00:00'),
(901, 17, 85, 'approved the reservation.', '2022-06-26 14:38:19', '2022-06-26 14:38:19', '0000-00-00 00:00:00'),
(902, 17, 0, 'signed in', '2022-06-26 19:07:29', '2022-06-26 19:07:29', '0000-00-00 00:00:00'),
(903, 17, 86, 'edit the reservation.', '2022-06-26 21:02:03', '2022-06-26 21:02:03', '0000-00-00 00:00:00'),
(904, 17, 86, 'edit the reservation.', '2022-06-26 21:04:35', '2022-06-26 21:04:35', '0000-00-00 00:00:00'),
(905, 17, 85, 'reassess of the reservation', '2022-06-26 21:05:05', '2022-06-26 21:05:05', '0000-00-00 00:00:00'),
(906, 17, 85, 'edit the reservation.', '2022-06-26 21:05:30', '2022-06-26 21:05:30', '0000-00-00 00:00:00'),
(907, 17, 85, 'approved the reservation.', '2022-06-26 21:06:27', '2022-06-26 21:06:27', '0000-00-00 00:00:00'),
(908, 17, 85, 'reassess of the reservation', '2022-06-26 22:30:28', '2022-06-26 22:30:28', '0000-00-00 00:00:00'),
(909, 17, 85, 'approved the reservation.', '2022-06-26 22:32:35', '2022-06-26 22:32:35', '0000-00-00 00:00:00'),
(910, 17, 85, 'Uploaded the official receipt.', '2022-06-26 22:34:04', '2022-06-26 22:34:04', '0000-00-00 00:00:00'),
(911, 17, 85, 'Verified the official receipt.', '2022-06-26 22:34:30', '2022-06-26 22:34:30', '0000-00-00 00:00:00'),
(912, 17, 85, 'Cancelled the reservation.', '2022-06-26 22:37:45', '2022-06-26 22:37:45', '0000-00-00 00:00:00'),
(913, 17, 85, 'edit the reservation.', '2022-06-26 22:38:13', '2022-06-26 22:38:13', '0000-00-00 00:00:00'),
(914, 17, 85, 'approved the reservation.', '2022-06-26 22:39:55', '2022-06-26 22:39:55', '0000-00-00 00:00:00'),
(915, 17, 86, 'approved the reservation.', '2022-06-26 22:41:53', '2022-06-26 22:41:53', '0000-00-00 00:00:00'),
(916, 17, 85, 'reassess of the reservation', '2022-06-26 23:03:35', '2022-06-26 23:03:35', '0000-00-00 00:00:00'),
(917, 17, 85, 'approved the reservation.', '2022-06-26 23:03:49', '2022-06-26 23:03:49', '0000-00-00 00:00:00'),
(918, 187, 0, 'signed in', '2022-06-26 23:27:08', '2022-06-26 23:27:08', '0000-00-00 00:00:00'),
(919, 17, 0, 'signed in', '2022-06-27 01:06:26', '2022-06-27 01:06:26', '0000-00-00 00:00:00'),
(920, 17, 85, 'reassess of the reservation', '2022-06-27 01:06:56', '2022-06-27 01:06:56', '0000-00-00 00:00:00'),
(921, 17, 85, 'approved the reservation.', '2022-06-27 01:10:27', '2022-06-27 01:10:27', '0000-00-00 00:00:00'),
(922, 17, 86, 'Uploaded the official receipt.', '2022-06-27 02:05:51', '2022-06-27 02:05:51', '0000-00-00 00:00:00'),
(923, 17, 86, 'Verified the official receipt.', '2022-06-27 02:06:19', '2022-06-27 02:06:19', '0000-00-00 00:00:00'),
(924, 187, 0, 'signed in', '2022-06-27 02:18:11', '2022-06-27 02:18:11', '0000-00-00 00:00:00'),
(925, 17, 86, 'Cancelled the reservation.', '2022-06-27 02:20:54', '2022-06-27 02:20:54', '0000-00-00 00:00:00'),
(926, 17, 86, 'edit the reservation.', '2022-06-27 02:21:14', '2022-06-27 02:21:14', '0000-00-00 00:00:00'),
(927, 17, 86, 'approved the reservation.', '2022-06-27 02:21:39', '2022-06-27 02:21:39', '0000-00-00 00:00:00'),
(928, 17, 86, 'generate activity form', '2022-06-27 02:23:37', '2022-06-27 02:23:37', '0000-00-00 00:00:00'),
(929, 17, 86, 'generate activity form', '2022-06-27 02:26:05', '2022-06-27 02:26:05', '0000-00-00 00:00:00'),
(930, 17, 86, 'generate activity form', '2022-06-27 02:30:32', '2022-06-27 02:30:32', '0000-00-00 00:00:00'),
(931, 17, 86, 'generate activity form', '2022-06-27 02:31:33', '2022-06-27 02:31:33', '0000-00-00 00:00:00'),
(932, 17, 86, 'generate activity form', '2022-06-27 02:32:38', '2022-06-27 02:32:38', '0000-00-00 00:00:00'),
(933, 17, 86, 'generate activity form', '2022-06-27 02:33:33', '2022-06-27 02:33:33', '0000-00-00 00:00:00'),
(934, 17, 86, 'generate activity form', '2022-06-27 02:34:49', '2022-06-27 02:34:49', '0000-00-00 00:00:00'),
(935, 17, 86, 'generate activity form', '2022-06-27 02:37:34', '2022-06-27 02:37:34', '0000-00-00 00:00:00'),
(936, 17, 86, 'generate activity form', '2022-06-27 02:38:50', '2022-06-27 02:38:50', '0000-00-00 00:00:00'),
(937, 17, 0, 'signed in', '2022-06-27 08:28:39', '2022-06-27 08:28:39', '0000-00-00 00:00:00'),
(938, 187, 0, 'signed in', '2022-06-27 08:35:37', '2022-06-27 08:35:37', '0000-00-00 00:00:00'),
(939, 17, 0, 'signed in', '2022-06-27 09:36:52', '2022-06-27 09:36:52', '0000-00-00 00:00:00'),
(940, 187, 0, 'signed in', '2022-06-27 20:02:58', '2022-06-27 20:02:58', '0000-00-00 00:00:00'),
(941, 17, 0, 'signed in', '2022-06-27 20:50:49', '2022-06-27 20:50:49', '0000-00-00 00:00:00'),
(942, 279, 0, 'signed in', '2022-06-27 21:54:45', '2022-06-27 21:54:45', '0000-00-00 00:00:00'),
(943, 17, 0, 'signed in', '2022-06-27 21:57:11', '2022-06-27 21:57:11', '0000-00-00 00:00:00'),
(944, 187, 0, 'signed in', '2022-06-27 22:01:33', '2022-06-27 22:01:33', '0000-00-00 00:00:00'),
(945, 17, 0, 'signed in', '2022-06-27 22:05:00', '2022-06-27 22:05:00', '0000-00-00 00:00:00'),
(946, 187, 0, 'signed in', '2022-06-27 22:06:30', '2022-06-27 22:06:30', '0000-00-00 00:00:00'),
(947, 17, 0, 'signed in', '2022-06-27 22:10:55', '2022-06-27 22:10:55', '0000-00-00 00:00:00');
INSERT INTO `frbs_logs` (`id`, `user_id`, `reservation_id`, `description`, `created_at`, `updated_at`, `deleted_at`) VALUES
(948, 187, 0, 'signed in', '2022-06-27 22:15:55', '2022-06-27 22:15:55', '0000-00-00 00:00:00'),
(949, 17, 0, 'signed in', '2022-06-27 22:16:58', '2022-06-27 22:16:58', '0000-00-00 00:00:00'),
(950, 187, 0, 'signed in', '2022-06-27 22:18:45', '2022-06-27 22:18:45', '0000-00-00 00:00:00'),
(951, 17, 0, 'signed in', '2022-06-27 22:19:40', '2022-06-27 22:19:40', '0000-00-00 00:00:00'),
(952, 187, 0, 'signed in', '2022-06-27 22:21:19', '2022-06-27 22:21:19', '0000-00-00 00:00:00'),
(953, 17, 85, 'generate activity form', '2022-06-27 22:32:36', '2022-06-27 22:32:36', '0000-00-00 00:00:00'),
(954, 17, 85, 'generate payment voucher.', '2022-06-27 22:33:14', '2022-06-27 22:33:14', '0000-00-00 00:00:00'),
(955, 17, 85, 'generate payment voucher.', '2022-06-27 22:35:08', '2022-06-27 22:35:08', '0000-00-00 00:00:00'),
(956, 17, 0, 'signed in', '2022-06-27 23:04:22', '2022-06-27 23:04:22', '0000-00-00 00:00:00'),
(957, 17, 85, 'generate activity form', '2022-06-27 23:06:41', '2022-06-27 23:06:41', '0000-00-00 00:00:00'),
(958, 17, 85, 'generate activity form', '2022-06-27 23:07:59', '2022-06-27 23:07:59', '0000-00-00 00:00:00'),
(959, 17, 85, 'generate activity form', '2022-06-27 23:09:06', '2022-06-27 23:09:06', '0000-00-00 00:00:00'),
(960, 17, 85, 'Uploaded the official receipt.', '2022-06-27 23:09:53', '2022-06-27 23:09:53', '0000-00-00 00:00:00'),
(961, 17, 85, 'Verified the official receipt.', '2022-06-27 23:10:28', '2022-06-27 23:10:28', '0000-00-00 00:00:00'),
(962, 17, 85, 'generate activity permit', '2022-06-27 23:11:29', '2022-06-27 23:11:29', '0000-00-00 00:00:00'),
(963, 17, 86, 'reassess of the reservation', '2022-06-27 23:32:58', '2022-06-27 23:32:58', '0000-00-00 00:00:00'),
(964, 17, 86, 'generate activity form', '2022-06-27 23:33:47', '2022-06-27 23:33:47', '0000-00-00 00:00:00'),
(965, 17, 86, 'approved the reservation.', '2022-06-27 23:34:41', '2022-06-27 23:34:41', '0000-00-00 00:00:00'),
(966, 17, 86, 'reassess of the reservation', '2022-06-27 23:34:53', '2022-06-27 23:34:53', '0000-00-00 00:00:00'),
(967, 17, 86, 'rejected the reservation.', '2022-06-27 23:35:10', '2022-06-27 23:35:10', '0000-00-00 00:00:00'),
(968, 17, 86, 'reassess of the reservation', '2022-06-27 23:35:55', '2022-06-27 23:35:55', '0000-00-00 00:00:00'),
(969, 17, 86, 'rejected the reservation.', '2022-06-27 23:40:26', '2022-06-27 23:40:26', '0000-00-00 00:00:00'),
(970, 17, 86, 'reassess of the reservation', '2022-06-27 23:41:55', '2022-06-27 23:41:55', '0000-00-00 00:00:00'),
(971, 17, 86, 'rejected the reservation.', '2022-06-27 23:42:17', '2022-06-27 23:42:17', '0000-00-00 00:00:00'),
(972, 17, 86, 'reassess of the reservation', '2022-06-27 23:45:20', '2022-06-27 23:45:20', '0000-00-00 00:00:00'),
(973, 17, 86, 'rejected the reservation.', '2022-06-27 23:45:47', '2022-06-27 23:45:47', '0000-00-00 00:00:00'),
(974, 17, 86, 'reassess of the reservation', '2022-06-27 23:46:06', '2022-06-27 23:46:06', '0000-00-00 00:00:00'),
(975, 187, 0, 'signed in', '2022-06-27 23:49:56', '2022-06-27 23:49:56', '0000-00-00 00:00:00'),
(976, 298, 0, 'signed in', '2022-06-28 00:00:33', '2022-06-28 00:00:33', '0000-00-00 00:00:00'),
(977, 17, 0, 'signed in', '2022-06-28 00:15:01', '2022-06-28 00:15:01', '0000-00-00 00:00:00'),
(978, 17, 86, 'approved the reservation.', '2022-06-28 00:16:06', '2022-06-28 00:16:06', '0000-00-00 00:00:00'),
(979, 17, 0, 'signed in', '2022-06-28 11:36:35', '2022-06-28 11:36:35', '0000-00-00 00:00:00'),
(980, 17, 0, 'signed in', '2022-07-02 20:14:16', '2022-07-02 20:14:16', '0000-00-00 00:00:00'),
(981, 17, 0, 'signed in', '2022-07-02 20:20:48', '2022-07-02 20:20:48', '0000-00-00 00:00:00'),
(982, 17, 87, 'edit the reservation.', '2022-07-02 21:25:58', '2022-07-02 21:25:58', '0000-00-00 00:00:00'),
(983, 17, 87, 'approved the reservation.', '2022-07-02 21:30:52', '2022-07-02 21:30:52', '0000-00-00 00:00:00'),
(984, 17, 87, 'reassess of the reservation', '2022-07-02 21:36:30', '2022-07-02 21:36:30', '0000-00-00 00:00:00'),
(985, 187, 0, 'signed in', '2022-07-02 22:18:23', '2022-07-02 22:18:23', '0000-00-00 00:00:00'),
(986, 17, 88, 'approved the reservation.', '2022-07-02 22:25:16', '2022-07-02 22:25:16', '0000-00-00 00:00:00'),
(987, 333, 0, 'signed in', '2022-07-02 22:27:09', '2022-07-02 22:27:09', '0000-00-00 00:00:00'),
(988, 333, 88, 'reassess of the reservation', '2022-07-02 22:29:34', '2022-07-02 22:29:34', '0000-00-00 00:00:00'),
(989, 333, 0, 'signed in', '2022-07-02 22:31:44', '2022-07-02 22:31:44', '0000-00-00 00:00:00'),
(990, 17, 0, 'signed in', '2022-07-02 22:34:41', '2022-07-02 22:34:41', '0000-00-00 00:00:00'),
(991, 333, 0, 'signed in', '2022-07-02 22:35:37', '2022-07-02 22:35:37', '0000-00-00 00:00:00'),
(992, 333, 0, 'signed in', '2022-07-02 22:38:15', '2022-07-02 22:38:15', '0000-00-00 00:00:00'),
(993, 17, 87, 'approved the reservation.', '2022-07-02 22:58:22', '2022-07-02 22:58:22', '0000-00-00 00:00:00'),
(994, 17, 0, 'signed in', '2022-07-03 08:47:19', '2022-07-03 08:47:19', '0000-00-00 00:00:00'),
(995, 187, 0, 'signed in', '2022-07-03 09:04:41', '2022-07-03 09:04:41', '0000-00-00 00:00:00'),
(996, 17, 87, 'reassess of the reservation', '2022-07-03 09:22:46', '2022-07-03 09:22:46', '0000-00-00 00:00:00'),
(997, 17, 87, 'approved the reservation.', '2022-07-03 09:23:03', '2022-07-03 09:23:03', '0000-00-00 00:00:00'),
(998, 187, 0, 'signed in', '2022-07-03 09:24:55', '2022-07-03 09:24:55', '0000-00-00 00:00:00'),
(999, 187, 0, 'signed in', '2022-07-03 09:29:59', '2022-07-03 09:29:59', '0000-00-00 00:00:00'),
(1000, 324, 0, 'signed in', '2022-07-03 09:36:50', '2022-07-03 09:36:50', '0000-00-00 00:00:00'),
(1001, 324, 0, 'signed in', '2022-07-03 09:37:43', '2022-07-03 09:37:43', '0000-00-00 00:00:00'),
(1002, 207, 0, 'signed in', '2022-07-03 09:39:01', '2022-07-03 09:39:01', '0000-00-00 00:00:00'),
(1003, 319, 0, 'signed in', '2022-07-03 09:42:34', '2022-07-03 09:42:34', '0000-00-00 00:00:00'),
(1004, 187, 0, 'signed in', '2022-07-03 09:44:47', '2022-07-03 09:44:47', '0000-00-00 00:00:00'),
(1005, 17, 87, 'reassess of the reservation', '2022-07-03 11:58:54', '2022-07-03 11:58:54', '0000-00-00 00:00:00'),
(1006, 17, 87, 'approved the reservation.', '2022-07-03 11:59:19', '2022-07-03 11:59:19', '0000-00-00 00:00:00'),
(1007, 17, 87, 'approved the reservation.', '2022-07-03 12:01:08', '2022-07-03 12:01:08', '0000-00-00 00:00:00'),
(1008, 17, 0, 'signed in', '2022-07-03 12:07:28', '2022-07-03 12:07:28', '0000-00-00 00:00:00'),
(1009, 17, 87, 'reassess of the reservation', '2022-07-03 12:08:12', '2022-07-03 12:08:12', '0000-00-00 00:00:00'),
(1010, 17, 87, 'approved the reservation.', '2022-07-03 12:08:24', '2022-07-03 12:08:24', '0000-00-00 00:00:00'),
(1011, 17, 87, 'reassess of the reservation', '2022-07-03 12:11:07', '2022-07-03 12:11:07', '0000-00-00 00:00:00'),
(1012, 17, 87, 'approved the reservation.', '2022-07-03 12:11:23', '2022-07-03 12:11:23', '0000-00-00 00:00:00'),
(1013, 17, 87, 'reassess of the reservation', '2022-07-03 12:13:52', '2022-07-03 12:13:52', '0000-00-00 00:00:00'),
(1014, 17, 87, 'approved the reservation.', '2022-07-03 12:14:07', '2022-07-03 12:14:07', '0000-00-00 00:00:00'),
(1015, 17, 87, 'reassess of the reservation', '2022-07-03 12:14:58', '2022-07-03 12:14:58', '0000-00-00 00:00:00'),
(1016, 17, 87, 'approved the reservation.', '2022-07-03 12:15:14', '2022-07-03 12:15:14', '0000-00-00 00:00:00'),
(1017, 17, 87, 'reassess of the reservation', '2022-07-03 12:18:28', '2022-07-03 12:18:28', '0000-00-00 00:00:00'),
(1018, 17, 87, 'approved the reservation.', '2022-07-03 12:18:40', '2022-07-03 12:18:40', '0000-00-00 00:00:00'),
(1019, 17, 87, 'reassess of the reservation', '2022-07-03 12:29:40', '2022-07-03 12:29:40', '0000-00-00 00:00:00'),
(1020, 17, 87, 'approved the reservation.', '2022-07-03 12:30:12', '2022-07-03 12:30:12', '0000-00-00 00:00:00'),
(1021, 17, 87, 'reassess of the reservation', '2022-07-03 12:32:09', '2022-07-03 12:32:09', '0000-00-00 00:00:00'),
(1022, 17, 87, 'approved the reservation.', '2022-07-03 12:32:30', '2022-07-03 12:32:30', '0000-00-00 00:00:00'),
(1023, 17, 87, 'reassess of the reservation', '2022-07-03 12:33:14', '2022-07-03 12:33:14', '0000-00-00 00:00:00'),
(1024, 17, 87, 'approved the reservation.', '2022-07-03 12:33:30', '2022-07-03 12:33:30', '0000-00-00 00:00:00'),
(1025, 17, 87, 'reassess of the reservation', '2022-07-03 12:34:38', '2022-07-03 12:34:38', '0000-00-00 00:00:00'),
(1026, 17, 87, 'approved the reservation.', '2022-07-03 12:34:54', '2022-07-03 12:34:54', '0000-00-00 00:00:00'),
(1027, 17, 87, 'reassess of the reservation', '2022-07-03 12:36:49', '2022-07-03 12:36:49', '0000-00-00 00:00:00'),
(1028, 17, 87, 'approved the reservation.', '2022-07-03 12:37:08', '2022-07-03 12:37:08', '0000-00-00 00:00:00'),
(1029, 17, 87, 'reassess of the reservation', '2022-07-03 12:38:47', '2022-07-03 12:38:47', '0000-00-00 00:00:00'),
(1030, 17, 87, 'approved the reservation.', '2022-07-03 12:39:08', '2022-07-03 12:39:08', '0000-00-00 00:00:00'),
(1031, 17, 87, 'reassess of the reservation', '2022-07-03 12:40:02', '2022-07-03 12:40:02', '0000-00-00 00:00:00'),
(1032, 17, 87, 'approved the reservation.', '2022-07-03 12:40:23', '2022-07-03 12:40:23', '0000-00-00 00:00:00'),
(1033, 17, 87, 'reassess of the reservation', '2022-07-03 14:41:50', '2022-07-03 14:41:50', '0000-00-00 00:00:00'),
(1034, 17, 87, 'approved the reservation.', '2022-07-03 14:42:15', '2022-07-03 14:42:15', '0000-00-00 00:00:00'),
(1035, 17, 87, 'reassess of the reservation', '2022-07-03 14:42:59', '2022-07-03 14:42:59', '0000-00-00 00:00:00'),
(1036, 17, 87, 'approved the reservation.', '2022-07-03 14:46:06', '2022-07-03 14:46:06', '0000-00-00 00:00:00'),
(1037, 17, 87, 'reassess of the reservation', '2022-07-03 14:46:50', '2022-07-03 14:46:50', '0000-00-00 00:00:00'),
(1038, 17, 87, 'approved the reservation.', '2022-07-03 14:50:10', '2022-07-03 14:50:10', '0000-00-00 00:00:00'),
(1039, 17, 87, 'reassess of the reservation', '2022-07-03 14:51:12', '2022-07-03 14:51:12', '0000-00-00 00:00:00'),
(1040, 17, 87, 'approved the reservation.', '2022-07-03 14:53:05', '2022-07-03 14:53:05', '0000-00-00 00:00:00'),
(1041, 17, 87, 'reassess of the reservation', '2022-07-03 14:55:49', '2022-07-03 14:55:49', '0000-00-00 00:00:00'),
(1042, 17, 87, 'approved the reservation.', '2022-07-03 15:04:30', '2022-07-03 15:04:30', '0000-00-00 00:00:00'),
(1043, 17, 87, 'reassess of the reservation', '2022-07-03 15:27:36', '2022-07-03 15:27:36', '0000-00-00 00:00:00'),
(1044, 17, 87, 'approved the reservation.', '2022-07-03 15:27:52', '2022-07-03 15:27:52', '0000-00-00 00:00:00'),
(1045, 333, 0, 'signed in', '2022-07-03 15:29:18', '2022-07-03 15:29:18', '0000-00-00 00:00:00'),
(1046, 17, 0, 'signed in', '2022-07-04 10:03:24', '2022-07-04 10:03:24', '0000-00-00 00:00:00'),
(1047, 17, 0, 'signed in', '2022-07-04 14:56:15', '2022-07-04 14:56:15', '0000-00-00 00:00:00'),
(1048, 17, 0, 'signed in', '2022-07-06 13:45:27', '2022-07-06 13:45:27', '0000-00-00 00:00:00'),
(1049, 17, 0, 'signed in', '2022-07-07 20:58:06', '2022-07-07 20:58:06', '0000-00-00 00:00:00'),
(1050, 17, 86, 'generate activity form', '2022-07-07 21:17:07', '2022-07-07 21:17:07', '0000-00-00 00:00:00'),
(1051, 17, 86, 'generate activity form', '2022-07-07 21:19:02', '2022-07-07 21:19:02', '0000-00-00 00:00:00'),
(1052, 17, 86, 'generate activity form', '2022-07-07 21:19:54', '2022-07-07 21:19:54', '0000-00-00 00:00:00'),
(1053, 17, 86, 'generate activity form', '2022-07-07 21:21:30', '2022-07-07 21:21:30', '0000-00-00 00:00:00'),
(1054, 17, 85, 'generate activity permit', '2022-07-07 21:24:02', '2022-07-07 21:24:02', '0000-00-00 00:00:00'),
(1055, 17, 85, 'generate activity permit', '2022-07-07 21:30:40', '2022-07-07 21:30:40', '0000-00-00 00:00:00'),
(1056, 17, 86, 'generate payment voucher.', '2022-07-07 21:32:21', '2022-07-07 21:32:21', '0000-00-00 00:00:00'),
(1057, 17, 86, 'generate payment voucher.', '2022-07-07 21:34:19', '2022-07-07 21:34:19', '0000-00-00 00:00:00'),
(1058, 17, 0, 'signed in', '2022-07-07 22:16:57', '2022-07-07 22:16:57', '0000-00-00 00:00:00'),
(1059, 17, 0, 'signed in', '2022-07-08 05:39:03', '2022-07-08 05:39:03', '0000-00-00 00:00:00'),
(1060, 17, 91, 'edit the reservation.', '2022-07-08 06:11:11', '2022-07-08 06:11:11', '0000-00-00 00:00:00'),
(1061, 17, 0, 'signed in', '2022-07-08 09:33:27', '2022-07-08 09:33:27', '0000-00-00 00:00:00'),
(1062, 17, 0, 'signed in', '2022-07-08 10:53:44', '2022-07-08 10:53:44', '0000-00-00 00:00:00'),
(1063, 324, 0, 'signed in', '2022-07-08 11:02:07', '2022-07-08 11:02:07', '0000-00-00 00:00:00'),
(1064, 17, 0, 'signed in', '2022-07-08 11:44:21', '2022-07-08 11:44:21', '0000-00-00 00:00:00'),
(1065, 324, 0, 'signed in', '2022-07-08 11:45:23', '2022-07-08 11:45:23', '0000-00-00 00:00:00'),
(1066, 17, 86, 'generate activity form', '2022-07-08 12:18:11', '2022-07-08 12:18:11', '0000-00-00 00:00:00'),
(1067, 17, 86, 'generate activity form', '2022-07-08 12:19:15', '2022-07-08 12:19:15', '0000-00-00 00:00:00'),
(1068, 17, 86, 'generate activity form', '2022-07-08 12:21:59', '2022-07-08 12:21:59', '0000-00-00 00:00:00'),
(1069, 17, 86, 'generate activity form', '2022-07-08 12:30:28', '2022-07-08 12:30:28', '0000-00-00 00:00:00'),
(1070, 17, 0, 'signed in', '2022-07-12 20:10:33', '2022-07-12 20:10:33', '0000-00-00 00:00:00'),
(1071, 17, 0, 'signed in', '2022-07-12 22:37:40', '2022-07-12 22:37:40', '0000-00-00 00:00:00'),
(1072, 17, 87, 'reassess of the reservation', '2022-07-12 22:42:48', '2022-07-12 22:42:48', '0000-00-00 00:00:00'),
(1073, 17, 92, 'edit the reservation.', '2022-07-12 23:04:02', '2022-07-12 23:04:02', '0000-00-00 00:00:00'),
(1074, 17, 92, 'edit the reservation.', '2022-07-12 23:06:39', '2022-07-12 23:06:39', '0000-00-00 00:00:00'),
(1075, 17, 92, 'edit the reservation.', '2022-07-12 23:07:21', '2022-07-12 23:07:21', '0000-00-00 00:00:00'),
(1076, 17, 92, 'edit the reservation.', '2022-07-12 23:54:30', '2022-07-12 23:54:30', '0000-00-00 00:00:00'),
(1077, 17, 0, 'signed in', '2022-07-13 06:10:22', '2022-07-13 06:10:22', '0000-00-00 00:00:00'),
(1078, 17, 92, 'edit the reservation.', '2022-07-13 07:16:12', '2022-07-13 07:16:12', '0000-00-00 00:00:00'),
(1079, 17, 93, 'edit the reservation.', '2022-07-13 09:38:55', '2022-07-13 09:38:55', '0000-00-00 00:00:00'),
(1080, 17, 93, 'edit the reservation.', '2022-07-13 10:10:07', '2022-07-13 10:10:07', '0000-00-00 00:00:00'),
(1081, 17, 0, 'signed in', '2022-07-13 11:16:18', '2022-07-13 11:16:18', '0000-00-00 00:00:00'),
(1082, 17, 92, 'approved the reservation.', '2022-07-13 13:03:49', '2022-07-13 13:03:49', '0000-00-00 00:00:00'),
(1083, 17, 0, 'signed in', '2022-07-13 13:05:10', '2022-07-13 13:05:10', '0000-00-00 00:00:00'),
(1084, 187, 0, 'signed in', '2022-07-13 13:05:43', '2022-07-13 13:05:43', '0000-00-00 00:00:00'),
(1085, 298, 0, 'signed in', '2022-07-13 13:17:41', '2022-07-13 13:17:41', '0000-00-00 00:00:00'),
(1086, 17, 93, 'approved the reservation.', '2022-07-13 13:25:42', '2022-07-13 13:25:42', '0000-00-00 00:00:00'),
(1087, 17, 94, 'approved the reservation.', '2022-07-13 13:26:29', '2022-07-13 13:26:29', '0000-00-00 00:00:00'),
(1088, 298, 94, 'generate activity form', '2022-07-13 13:34:35', '2022-07-13 13:34:35', '0000-00-00 00:00:00'),
(1089, 17, 94, 'reassess of the reservation', '2022-07-13 13:38:59', '2022-07-13 13:38:59', '0000-00-00 00:00:00'),
(1090, 17, 94, 'approved the reservation.', '2022-07-13 13:39:29', '2022-07-13 13:39:29', '0000-00-00 00:00:00'),
(1091, 324, 0, 'signed in', '2022-07-13 13:40:40', '2022-07-13 13:40:40', '0000-00-00 00:00:00'),
(1092, 17, 96, 'approved the reservation.', '2022-07-13 13:42:16', '2022-07-13 13:42:16', '0000-00-00 00:00:00'),
(1093, 324, 96, 'approved the reservation.', '2022-07-13 13:42:40', '2022-07-13 13:42:40', '0000-00-00 00:00:00'),
(1094, 279, 0, 'signed in', '2022-07-13 13:43:11', '2022-07-13 13:43:11', '0000-00-00 00:00:00'),
(1095, 279, 96, 'approved the reservation.', '2022-07-13 13:43:28', '2022-07-13 13:43:28', '0000-00-00 00:00:00'),
(1096, 17, 97, 'approved the reservation.', '2022-07-13 13:44:54', '2022-07-13 13:44:54', '0000-00-00 00:00:00'),
(1097, 279, 97, 'approved the reservation.', '2022-07-13 13:45:17', '2022-07-13 13:45:17', '0000-00-00 00:00:00'),
(1098, 279, 94, 'approved the reservation.', '2022-07-13 13:46:05', '2022-07-13 13:46:05', '0000-00-00 00:00:00'),
(1099, 333, 0, 'signed in', '2022-07-13 13:48:30', '2022-07-13 13:48:30', '0000-00-00 00:00:00'),
(1100, 333, 94, 'approved the reservation.', '2022-07-13 13:49:26', '2022-07-13 13:49:26', '0000-00-00 00:00:00'),
(1101, 17, 98, 'approved the reservation.', '2022-07-13 13:51:08', '2022-07-13 13:51:08', '0000-00-00 00:00:00'),
(1102, 333, 98, 'approved the reservation.', '2022-07-13 13:51:31', '2022-07-13 13:51:31', '0000-00-00 00:00:00'),
(1103, 207, 0, 'signed in', '2022-07-13 13:52:12', '2022-07-13 13:52:12', '0000-00-00 00:00:00'),
(1104, 207, 0, 'signed in', '2022-07-13 14:00:24', '2022-07-13 14:00:24', '0000-00-00 00:00:00'),
(1105, 17, 0, 'signed in', '2022-07-13 14:20:01', '2022-07-13 14:20:01', '0000-00-00 00:00:00'),
(1106, 337, 0, 'signed in', '2022-07-13 14:47:29', '2022-07-13 14:47:29', '0000-00-00 00:00:00'),
(1107, 337, 97, 'approved the reservation.', '2022-07-13 14:51:31', '2022-07-13 14:51:31', '0000-00-00 00:00:00'),
(1108, 337, 0, 'signed in', '2022-07-13 15:47:16', '2022-07-13 15:47:16', '0000-00-00 00:00:00'),
(1109, 319, 0, 'signed in', '2022-07-13 15:59:35', '2022-07-13 15:59:35', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_modules`
--

CREATE TABLE `frbs_modules` (
  `id` bigint(20) NOT NULL,
  `module` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_modules`
--

INSERT INTO `frbs_modules` (`id`, `module`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'users', 'user management', 'a', '2021-05-13 09:03:57', '2021-07-28 13:51:20', '0000-00-00 00:00:00'),
(2, 'miscellaneous management', 'miscellaneous management', 'd', '2021-05-13 09:04:46', '2021-07-22 02:13:56', '2021-07-22 02:13:56'),
(3, 'reservations', 'reservation management', 'a', '2021-05-13 09:05:02', '2021-07-23 22:10:00', '0000-00-00 00:00:00'),
(4, 'university', 'university management', 'a', '2021-05-13 09:05:21', '2021-07-28 13:51:34', '0000-00-00 00:00:00'),
(5, 'System Setting', 'System Settings', 'd', '2021-06-21 11:30:50', '2021-06-21 11:31:06', '2021-06-21 11:31:06'),
(6, 'modules', 'module management', 'a', '2021-07-22 02:14:17', '2021-07-28 13:51:44', '0000-00-00 00:00:00'),
(7, 'Settings', 'System Management', 'a', '2021-07-22 02:14:56', '2021-07-23 22:10:57', '0000-00-00 00:00:00'),
(8, 'Equipment', 'Equipment Management', 'a', '2021-07-22 02:15:41', '2021-07-23 22:10:39', '0000-00-00 00:00:00'),
(9, 'Dashboard', 'Dashboard', 'a', '2021-07-28 13:38:14', '2021-07-28 13:38:14', '0000-00-00 00:00:00'),
(10, 'sample', 'sample', 'd', '2021-10-09 16:51:17', '2021-10-09 17:11:24', '2021-10-09 17:11:24'),
(11, 'Facilities', 'Facilities', 'a', '2022-07-02 22:32:51', '2022-07-02 22:32:51', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_organizations`
--

CREATE TABLE `frbs_organizations` (
  `id` bigint(20) NOT NULL,
  `organization_type_id` bigint(20) NOT NULL,
  `organization_name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_organizations`
--

INSERT INTO `frbs_organizations` (`id`, `organization_type_id`, `organization_name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'computer society', 'computer society', 'a', '2021-05-13 09:19:21', '2022-07-13 16:40:24', '0000-00-00 00:00:00'),
(2, 1, 'junior marketing management', 'junior marketing management', 'a', '2021-05-13 09:19:36', '2021-09-19 16:08:52', '0000-00-00 00:00:00'),
(3, 1, 'Junior Philippine Society of Mechanical Engineers', 'Junior Philippine Society of Mechanical Engineers', 'a', '2021-05-13 09:19:55', '2021-09-19 16:09:01', '0000-00-00 00:00:00'),
(4, 2, 'irock', 'irock org', 'a', '2021-05-13 09:20:20', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 1, 'Philippine Association of Students in Office Administration', 'Philippine Association of Students in Office Administration', 'a', '2021-07-28 10:45:34', '2021-09-19 16:10:59', '0000-00-00 00:00:00'),
(7, 1, 'Junior People Management Association of the Philippines', 'Junior People Management Association of the Philippines', 'a', '2021-07-28 10:47:48', '2021-09-19 16:11:08', '0000-00-00 00:00:00'),
(8, 1, 'Mentor\'s Society', 'Mentor\'s Society', 'a', '2021-07-28 10:57:32', '2021-09-19 16:11:18', '0000-00-00 00:00:00'),
(9, 1, 'Association of Electronics Engineering Students', 'Association of Electronics Engineering Students', 'a', '2021-07-28 10:58:05', '2021-09-19 16:11:28', '0000-00-00 00:00:00'),
(10, 2, 'Central Student Council', 'Central Student Council', 'a', '2021-07-28 10:58:52', '2021-09-19 16:11:39', '0000-00-00 00:00:00'),
(11, 1, 'Junior Philippine Institute of Accountants', 'Junior Philippine Institute of Accountants', 'a', '2021-07-28 11:40:12', '2021-09-19 16:11:51', '0000-00-00 00:00:00'),
(12, 1, 'sample', 'sample', 'd', '2021-10-10 00:06:41', '2021-10-10 00:08:57', '2021-10-10 00:08:57'),
(13, 2, 'Alumni Association', 'Alumni Association', 'a', '2022-07-02 21:52:34', '2022-07-02 21:52:34', '0000-00-00 00:00:00'),
(14, 2, 'Outside Organizations', 'Organizations outside the University', 'a', '2022-07-02 21:53:13', '2022-07-02 21:53:13', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_organization_officers`
--

CREATE TABLE `frbs_organization_officers` (
  `id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `org_position_id` bigint(20) NOT NULL,
  `status` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_organization_officers`
--

INSERT INTO `frbs_organization_officers` (`id`, `student_id`, `org_position_id`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 164, 1, 'a', '2022-06-26 20:05:49', '2022-06-26 20:05:49', '0000-00-00 00:00:00'),
(3, 236, 2, 'a', '2022-06-26 20:07:31', '2022-06-26 20:07:31', '0000-00-00 00:00:00'),
(4, 239, 1, 'd', '2022-07-08 06:16:15', '2022-07-08 06:27:59', '2022-07-08 06:27:59');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_organization_positions`
--

CREATE TABLE `frbs_organization_positions` (
  `id` bigint(20) NOT NULL,
  `position` varchar(250) NOT NULL,
  `description` varchar(250) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_organization_positions`
--

INSERT INTO `frbs_organization_positions` (`id`, `position`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'President', 'President of the organization', 'a', '2022-06-19 11:06:41', '2022-06-19 11:06:41', '0000-00-00'),
(2, 'Class President', 'President of the classroom', 'a', '2022-06-19 11:48:12', '2022-06-26 20:06:36', '0000-00-00'),
(3, 'Vice President Internal', 'Vice President Internal', 'a', '2022-07-13 16:31:43', '2022-07-13 16:32:03', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_organization_types`
--

CREATE TABLE `frbs_organization_types` (
  `id` bigint(20) NOT NULL,
  `organization_type` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_organization_types`
--

INSERT INTO `frbs_organization_types` (`id`, `organization_type`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'academic organization', 'academic organization', 'a', '2021-05-13 09:13:30', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'non-academic organization', 'non-academic organization', 'a', '2021-05-13 09:13:40', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'non-academic organizatios', 'non-academic organizatio', 'd', '2021-06-22 09:36:27', '2021-06-22 09:36:41', '2021-06-22 09:36:41'),
(4, 'university-wide', 'sample', 'd', '2021-10-10 10:49:07', '2021-10-10 10:49:13', '2021-10-10 10:49:13'),
(5, 'sample', 'sample', 'd', '2021-10-10 10:56:14', '2021-10-10 10:56:46', '2021-10-10 10:56:46');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_permissions`
--

CREATE TABLE `frbs_permissions` (
  `id` bigint(20) NOT NULL,
  `module_id` bigint(20) NOT NULL,
  `permission` varchar(50) NOT NULL,
  `permission_type` bigint(20) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_permissions`
--

INSERT INTO `frbs_permissions` (`id`, `module_id`, `permission`, `permission_type`, `slug`, `icon`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 1, 'Edit user', 13, 'edit-user', '<i class=\"fas fa-user-edit\"></i>', 'a', '2021-07-22 02:10:12', '2021-07-22 02:10:12', '0000-00-00 00:00:00'),
(10, 1, 'add user', 12, 'add-user', '<i class=\"fas fa-user-plus\"></i>', 'a', '2021-07-21 23:12:10', '2021-07-22 02:10:46', '0000-00-00 00:00:00'),
(9, 1, 'Users', 11, 'users', '<i class=\"fas fa-users\"></i>', 'a', '2021-07-21 23:02:38', '2021-10-09 17:25:12', '0000-00-00 00:00:00'),
(12, 1, 'Delete User', 14, 'delete-user', '<i class=\"fas fa-user-times\"></i>', 'a', '2021-07-22 02:11:54', '2021-07-22 02:11:54', '0000-00-00 00:00:00'),
(13, 1, 'Roles', 11, 'roles', '<i class=\"fas fa-user-tag\"></i>', 'a', '2021-07-22 02:13:28', '2021-07-22 02:13:28', '0000-00-00 00:00:00'),
(14, 1, 'add role', 12, 'add-role', '<i class=\"fas fa-user-tag\"></i>', 'a', '2021-07-22 02:18:04', '2021-07-22 02:18:04', '0000-00-00 00:00:00'),
(15, 1, 'edit role', 13, 'edit-role', '<i class=\"fas fa-user-tag\"></i>', 'a', '2021-07-22 02:18:35', '2021-07-22 02:18:35', '0000-00-00 00:00:00'),
(16, 1, 'delete role', 14, 'delete-role', '<i class=\"fas fa-user-tag\"></i>', 'a', '2021-07-22 02:19:13', '2021-07-22 02:19:13', '0000-00-00 00:00:00'),
(17, 6, 'modules', 11, 'modules', '<i class=\"fas fa-bookmark\"></i>', 'a', '2021-07-22 02:22:20', '2021-07-22 02:22:20', '0000-00-00 00:00:00'),
(18, 6, 'add module', 12, 'add-module', '<i class=\"fas fa-bookmark\"></i>', 'a', '2021-07-22 02:23:02', '2021-07-22 02:23:02', '0000-00-00 00:00:00'),
(19, 6, 'edit module', 13, 'edit-module', '<i class=\"fas fa-bookmark\"></i>', 'a', '2021-07-22 02:23:44', '2021-07-22 02:23:44', '0000-00-00 00:00:00'),
(20, 6, 'delete module', 14, 'delete-module', '<i class=\"fas fa-bookmark\"></i>', 'a', '2021-07-22 02:24:30', '2021-07-22 02:24:30', '0000-00-00 00:00:00'),
(21, 6, 'permissions', 11, 'permissions', '<i class=\"fas fa-user-cog\"></i>', 'a', '2021-07-22 05:04:59', '2021-07-22 05:04:59', '0000-00-00 00:00:00'),
(22, 6, 'permission types', 11, 'permission-types', '<i class=\"fas fa-user-cog\"></i>', 'a', '2021-07-22 05:05:28', '2021-07-22 05:05:28', '0000-00-00 00:00:00'),
(23, 1, 'roles permissions', 11, 'roles-permissions', '<i class=\"fas fa-user-cog\"></i>', 'a', '2021-07-22 05:06:17', '2021-07-22 05:06:17', '0000-00-00 00:00:00'),
(24, 3, 'reservations', 11, 'reservations', '<i class=\"fas fa-clipboard-list\"></i>', 'a', '2021-07-22 05:24:01', '2021-07-22 05:24:01', '0000-00-00 00:00:00'),
(25, 11, 'facilities', 11, 'facility', '<i class=\"fas fa-landmark\"></i>', 'a', '2021-07-22 05:25:16', '2022-07-02 22:33:50', '0000-00-00 00:00:00'),
(26, 8, 'equipment', 11, 'equipments', '<i class=\"fas fa-desktop\"></i>', 'a', '2021-07-22 05:26:38', '2021-09-20 21:28:15', '0000-00-00 00:00:00'),
(27, 8, 'borrowed equipment', 11, 'borrowed-equipments', '<i class=\"fas fa-desktop\"></i>', 'a', '2021-07-22 05:27:26', '2021-09-20 21:28:27', '0000-00-00 00:00:00'),
(28, 9, 'Dashboard', 11, 'dashboard', '<i class=\"fas fa-tachometer-alt\"></i>', 'a', '2021-07-28 13:40:23', '2021-07-28 13:41:20', '0000-00-00 00:00:00'),
(29, 3, 'calendar of activities', 11, 'reservations/t', '<i class=\"far fa-calendar-alt\"></i>', 'a', '2021-07-28 13:49:23', '2021-07-28 13:49:23', '0000-00-00 00:00:00'),
(30, 4, 'students', 11, 'students', '<i class=\"fas fa-user-graduate\"></i>', 'a', '2021-07-28 13:53:57', '2021-07-28 13:53:57', '0000-00-00 00:00:00'),
(31, 4, 'faculties', 11, 'faculties', '<i class=\"fas fa-chalkboard-teacher\"></i>', 'a', '2021-07-28 13:54:42', '2021-07-28 13:54:42', '0000-00-00 00:00:00'),
(32, 4, 'courses', 11, 'courses', '<i class=\"fas fa-book\"></i>', 'a', '2021-07-28 13:56:48', '2021-07-28 13:56:48', '0000-00-00 00:00:00'),
(33, 4, 'organizations', 11, 'organizations', '<i class=\"fas fa-sitemap\"></i>', 'a', '2021-07-28 13:57:45', '2021-07-28 13:57:45', '0000-00-00 00:00:00'),
(34, 7, 'Year Level', 11, 'levels', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:01:52', '2021-07-28 14:01:52', '0000-00-00 00:00:00'),
(35, 7, 'extension names', 11, 'extensions', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:02:21', '2021-07-28 14:02:21', '0000-00-00 00:00:00'),
(36, 7, 'organization types', 11, 'organizationtypes', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:03:15', '2021-07-28 14:03:15', '0000-00-00 00:00:00'),
(37, 7, 'faculty positions', 11, 'positions', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:03:56', '2021-07-28 14:03:56', '0000-00-00 00:00:00'),
(38, 7, 'faculty department', 11, 'departments', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:04:28', '2021-07-28 14:04:28', '0000-00-00 00:00:00'),
(39, 7, 'reservation remarks', 11, 'remarks', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:05:06', '2021-07-28 14:05:06', '0000-00-00 00:00:00'),
(40, 7, 'event types', 11, 'eventtypes', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:05:38', '2021-07-28 14:05:38', '0000-00-00 00:00:00'),
(41, 7, 'facility status', 11, 'facility-status', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:06:13', '2021-07-28 14:06:13', '0000-00-00 00:00:00'),
(42, 7, 'equipment status', 11, 'equipment-status', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:06:42', '2021-07-28 14:06:42', '0000-00-00 00:00:00'),
(43, 7, 'equipment condition', 11, 'equipment-conditions', '<i class=\"fas fa-cogs\"></i>', 'a', '2021-07-28 14:07:16', '2021-07-28 14:11:08', '0000-00-00 00:00:00'),
(44, 1, 'sample', 11, 'sample', 'sample', 'd', '2021-10-09 17:25:46', '2021-10-09 17:25:59', '2021-10-09 17:25:59'),
(45, 7, 'organization positions', 11, 'organization-positions', '<i class=\"fas fa-cogs\"></i>', 'a', '2022-06-19 13:43:56', '2022-06-19 13:43:56', '0000-00-00 00:00:00'),
(46, 4, 'organization officers', 11, 'organization-officers', '<i class=\"fas fa-cogs\"></i>', 'a', '2022-06-19 15:27:57', '2022-06-19 15:27:57', '0000-00-00 00:00:00'),
(47, 11, 'facility maintenances', 11, 'facility-maintenances', '<i class=\"fas fa-cogs\"></i>', 'a', '2022-06-19 16:55:32', '2022-07-02 22:34:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_permission_types`
--

CREATE TABLE `frbs_permission_types` (
  `id` bigint(20) NOT NULL,
  `type` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_permission_types`
--

INSERT INTO `frbs_permission_types` (`id`, `type`, `slug`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(11, 'View', 'v', 'a', '2021-07-21 23:01:18', '2021-10-09 17:15:31', '0000-00-00 00:00:00'),
(12, 'Add', 'a', 'a', '2021-07-21 23:01:28', '2021-07-21 23:01:28', '0000-00-00 00:00:00'),
(13, 'Edit', 'u', 'a', '2021-07-21 23:01:41', '2021-07-21 23:01:41', '0000-00-00 00:00:00'),
(14, 'Delete', 'd', 'a', '2021-07-21 23:02:00', '2021-10-09 17:19:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_reservations`
--

CREATE TABLE `frbs_reservations` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `organization_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `faculty_id` bigint(20) NOT NULL,
  `student_id` bigint(20) NOT NULL,
  `facility_id` bigint(20) NOT NULL,
  `event_type_id` bigint(20) NOT NULL,
  `status_id` bigint(20) NOT NULL,
  `reservation_code` varchar(100) NOT NULL,
  `event_name` varchar(100) NOT NULL,
  `budget` int(11) NOT NULL,
  `participants_count` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_starting_time` time NOT NULL,
  `reservation_end_time` time NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_reservations`
--

INSERT INTO `frbs_reservations` (`id`, `user_id`, `organization_id`, `course_id`, `faculty_id`, `student_id`, `facility_id`, `event_type_id`, `status_id`, `reservation_code`, `event_name`, `budget`, `participants_count`, `reservation_date`, `reservation_starting_time`, `reservation_end_time`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(92, 17, 1, 0, 45, 164, 25, 1, 2, 'rs-78213-tg-0', 'Sample Event', 1000, 60, '2022-07-22', '07:30:00', '15:30:00', 'a', '2022-07-12 23:02:44', '2022-07-13 13:03:49', '0000-00-00 00:00:00'),
(93, 17, 1, 0, 45, 164, 25, 1, 2, 'rs-22575-tg-0', 'Computer Society Election', 1000, 60, '2022-07-22', '15:30:00', '19:30:00', 'a', '2022-07-13 07:57:22', '2022-07-13 13:25:42', '0000-00-00 00:00:00'),
(94, 298, 0, 1, 45, 236, 23, 2, 2, 'rs-14807-tg-0', 'Sample Event', 1000, 60, '2022-07-22', '07:30:00', '10:30:00', 'a', '2022-07-13 13:18:43', '2022-07-13 13:39:29', '0000-00-00 00:00:00'),
(95, 298, 1, 0, 45, 164, 24, 1, 1, 'rs-58404-tg-0', 'seminar', 1000, 100, '2022-07-22', '07:30:00', '12:30:00', 'a', '2022-07-13 13:19:50', '2022-07-13 13:19:50', '0000-00-00 00:00:00'),
(96, 324, 0, 1, 45, 236, 26, 2, 2, 'rs-54207-tg-0', 'class', 1000, 30, '2022-07-29', '07:30:00', '10:30:00', 'a', '2022-07-13 13:41:41', '2022-07-13 13:42:16', '0000-00-00 00:00:00'),
(97, 279, 0, 1, 45, 236, 26, 2, 2, 'rs-60431-tg-0', 'classss', 1000, 60, '2022-07-29', '10:30:00', '12:30:00', 'a', '2022-07-13 13:44:26', '2022-07-13 13:44:54', '0000-00-00 00:00:00'),
(98, 333, 1, 0, 45, 164, 24, 1, 2, 'rs-42819-tg-0', 'sample', 1000, 60, '2022-07-29', '07:30:00', '10:30:00', 'a', '2022-07-13 13:50:25', '2022-07-13 13:51:08', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_reservation_remarks`
--

CREATE TABLE `frbs_reservation_remarks` (
  `id` bigint(20) NOT NULL,
  `reservation_remarks` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_reservation_remarks`
--

INSERT INTO `frbs_reservation_remarks` (`id`, `reservation_remarks`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'pending', 'pending', 'a', '2021-05-13 09:15:47', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'approved', 'approved', 'a', '2021-05-13 09:16:03', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'rejected', 'rejected', 'a', '2021-05-13 09:16:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, 'ongoing', 'ongoing', 'a', '2021-08-22 05:11:51', '2021-08-24 00:23:44', '0000-00-00 00:00:00'),
(5, 'finished', 'finished', 'a', '2021-08-22 05:12:27', '2021-09-21 14:06:12', '0000-00-00 00:00:00'),
(6, 'rescheduled', 'rescheduled', 'a', '2021-08-24 00:23:30', '2021-08-24 01:33:18', '0000-00-00 00:00:00'),
(7, 'for rescheduling', 'for rescheduling', 'd', '2021-10-10 10:18:36', '2021-10-10 10:18:44', '2021-10-10 10:18:44'),
(8, 'fds rescheduling', 'for rescheduling', 'd', '2021-10-10 10:20:54', '2021-10-10 10:21:02', '2021-10-10 10:21:02'),
(9, 'fdfasdf', 'dfasdfsadf', 'd', '2021-10-10 10:30:03', '2021-10-10 10:30:50', '2021-10-10 10:30:50');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_reservation_status`
--

CREATE TABLE `frbs_reservation_status` (
  `id` bigint(20) NOT NULL,
  `reservation_id` bigint(20) NOT NULL,
  `status_id` bigint(20) NOT NULL,
  `reservation_fee` int(11) NOT NULL,
  `remarks` text NOT NULL,
  `receipt` text NOT NULL,
  `custodian_is_checked` int(1) NOT NULL DEFAULT 0,
  `admin_is_checked` int(1) NOT NULL DEFAULT 0,
  `president_is_checked` int(1) NOT NULL DEFAULT 0,
  `professor_is_checked` int(1) NOT NULL DEFAULT 0,
  `is_checked` varchar(1) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_reservation_status`
--

INSERT INTO `frbs_reservation_status` (`id`, `reservation_id`, `status_id`, `reservation_fee`, `remarks`, `receipt`, `custodian_is_checked`, `admin_is_checked`, `president_is_checked`, `professor_is_checked`, `is_checked`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(124, 98, 2, 300, '', '', 1, 0, 0, 0, '', 'a', '2022-07-13 13:50:25', '2022-07-13 13:51:31', '0000-00-00 00:00:00'),
(121, 95, 1, 0, 'Waiting for the assessment', '', 0, 0, 0, 0, '', 'a', '2022-07-13 13:19:50', '2022-07-13 13:19:50', '0000-00-00 00:00:00'),
(122, 96, 2, 240, '', '', 0, 0, 1, 1, '', 'a', '2022-07-13 13:41:41', '2022-07-13 13:43:28', '0000-00-00 00:00:00'),
(123, 97, 2, 160, '', '', 0, 1, 1, 0, '', 'a', '2022-07-13 13:44:26', '2022-07-13 14:51:31', '0000-00-00 00:00:00'),
(119, 93, 2, 400, '', '', 0, 0, 0, 0, '', 'a', '2022-07-13 07:57:22', '2022-07-13 13:25:42', '0000-00-00 00:00:00'),
(118, 92, 2, 800, '', '', 0, 0, 0, 0, '', 'a', '2022-07-12 23:02:44', '2022-07-13 13:03:49', '0000-00-00 00:00:00'),
(120, 94, 2, 240, '', '', 1, 0, 1, 0, '0', 'a', '2022-07-13 13:18:43', '2022-07-13 13:49:26', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_roles`
--

CREATE TABLE `frbs_roles` (
  `id` bigint(20) NOT NULL,
  `role_name` varchar(50) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_roles`
--

INSERT INTO `frbs_roles` (`id`, `role_name`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'super admin', 'super admin', 'a', '2021-07-20 02:27:27', '2021-10-09 17:00:13', '0000-00-00 00:00:00'),
(2, 'Admin', 'Administrator', 'a', '2021-07-20 02:27:41', '2021-07-20 02:27:41', '0000-00-00 00:00:00'),
(3, 'student', 'student', 'a', '2021-07-28 14:16:25', '2021-07-28 14:16:25', '0000-00-00 00:00:00'),
(4, 'faculty', 'faculty', 'a', '2021-07-28 14:16:37', '2021-10-09 17:02:35', '0000-00-00 00:00:00'),
(10, 'professor', 'Adviser or Professor', 'a', '2022-06-27 08:32:06', '2022-06-27 08:32:06', '0000-00-00 00:00:00'),
(6, 'President', 'President of the organization or classroom', 'a', '2022-06-19 15:22:40', '2022-06-26 23:11:07', '0000-00-00 00:00:00'),
(7, 'Custodian', 'Property Custodian', 'a', '2022-06-26 23:09:10', '2022-07-02 22:08:48', '0000-00-00 00:00:00'),
(8, 'School Admin', 'School Admin', 'a', '2022-06-26 23:09:38', '2022-07-13 15:46:27', '0000-00-00 00:00:00'),
(9, 'Security', 'School Security', 'd', '2022-06-26 23:10:31', '2022-07-02 22:09:13', '2022-07-02 22:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_roles_permissions`
--

CREATE TABLE `frbs_roles_permissions` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `permission_id` bigint(20) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_roles_permissions`
--

INSERT INTO `frbs_roles_permissions` (`id`, `role_id`, `permission_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(40, 1, 17, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(39, 1, 16, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(38, 1, 15, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(37, 1, 14, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(36, 1, 13, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(35, 1, 12, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(34, 1, 9, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(33, 1, 10, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(32, 1, 11, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(31, 2, 12, '2021-07-22 02:31:37', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(30, 2, 9, '2021-07-22 02:31:37', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(29, 2, 10, '2021-07-22 02:31:37', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(28, 2, 11, '2021-07-22 02:31:37', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(27, 1, 9, '2021-07-22 02:02:56', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(26, 2, 9, '2021-07-22 01:46:22', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(25, 2, 10, '2021-07-22 01:46:22', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(24, 2, 10, '2021-07-21 23:14:12', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(23, 2, 9, '2021-07-21 23:12:38', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(22, 2, 10, '2021-07-21 23:12:38', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(21, 2, 9, '2021-07-21 23:10:03', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(41, 1, 18, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(42, 1, 19, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(43, 1, 20, '2021-07-22 02:32:48', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(44, 2, 11, '2021-07-22 02:33:47', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(45, 2, 10, '2021-07-22 02:33:47', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(46, 2, 9, '2021-07-22 02:33:47', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(47, 2, 12, '2021-07-22 02:33:47', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(48, 2, 11, '2021-07-22 02:34:51', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(49, 2, 10, '2021-07-22 02:34:51', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(50, 2, 9, '2021-07-22 02:34:51', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(51, 2, 12, '2021-07-22 02:34:51', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(52, 2, 13, '2021-07-22 02:34:51', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(53, 2, 14, '2021-07-22 02:34:51', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(54, 2, 15, '2021-07-22 02:34:51', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(55, 2, 16, '2021-07-22 02:34:51', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(56, 1, 11, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(57, 1, 10, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(58, 1, 9, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(59, 1, 12, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(60, 1, 13, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(61, 1, 14, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(62, 1, 15, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(63, 1, 16, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(64, 1, 23, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(65, 1, 17, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(66, 1, 18, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(67, 1, 19, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(68, 1, 20, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(69, 1, 21, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(70, 1, 22, '2021-07-22 05:07:06', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(71, 2, 11, '2021-07-22 05:07:23', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(72, 2, 10, '2021-07-22 05:07:23', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(73, 2, 9, '2021-07-22 05:07:23', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(74, 2, 12, '2021-07-22 05:07:23', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(75, 2, 24, '2021-07-22 05:28:21', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(76, 2, 24, '2021-07-22 05:28:48', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(77, 2, 27, '2021-07-22 05:28:48', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(78, 1, 11, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(79, 1, 10, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(80, 1, 9, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(81, 1, 12, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(82, 1, 13, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(83, 1, 14, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(84, 1, 15, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(85, 1, 16, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(86, 1, 23, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(87, 1, 24, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(88, 1, 25, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(89, 1, 17, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(90, 1, 18, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(91, 1, 19, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(92, 1, 20, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(93, 1, 21, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(94, 1, 22, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(95, 1, 26, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(96, 1, 27, '2021-07-22 05:29:49', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(97, 2, 24, '2021-07-22 05:30:24', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(98, 2, 27, '2021-07-22 05:30:24', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(99, 1, 11, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(100, 1, 10, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(101, 1, 9, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(102, 1, 12, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(103, 1, 13, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(104, 1, 14, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(105, 1, 15, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(106, 1, 16, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(107, 1, 23, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(108, 1, 24, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(109, 1, 25, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(110, 1, 17, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(111, 1, 18, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(112, 1, 19, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(113, 1, 20, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(114, 1, 21, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(115, 1, 22, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(116, 1, 26, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(117, 1, 27, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(118, 1, 28, '2021-07-28 13:41:00', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(119, 1, 11, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(120, 1, 10, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(121, 1, 9, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(122, 1, 12, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(123, 1, 13, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(124, 1, 14, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(125, 1, 15, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(126, 1, 16, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(127, 1, 23, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(128, 1, 24, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(129, 1, 25, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(130, 1, 29, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(131, 1, 17, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(132, 1, 18, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(133, 1, 19, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(134, 1, 20, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(135, 1, 21, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(136, 1, 22, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(137, 1, 26, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(138, 1, 27, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(139, 1, 28, '2021-07-28 13:49:45', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(140, 1, 11, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(141, 1, 10, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(142, 1, 9, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(143, 1, 12, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(144, 1, 13, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(145, 1, 14, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(146, 1, 15, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(147, 1, 16, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(148, 1, 23, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(149, 1, 24, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(150, 1, 25, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(151, 1, 29, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(152, 1, 30, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(153, 1, 31, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(154, 1, 32, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(155, 1, 33, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(156, 1, 17, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(157, 1, 18, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(158, 1, 19, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(159, 1, 20, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(160, 1, 21, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(161, 1, 22, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(162, 1, 26, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(163, 1, 27, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(164, 1, 28, '2021-07-28 13:58:29', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(165, 1, 11, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(166, 1, 10, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(167, 1, 9, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(168, 1, 12, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(169, 1, 13, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(170, 1, 14, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(171, 1, 15, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(172, 1, 16, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(173, 1, 23, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(174, 1, 24, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(175, 1, 25, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(176, 1, 29, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(177, 1, 30, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(178, 1, 31, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(179, 1, 32, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(180, 1, 33, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(181, 1, 17, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(182, 1, 18, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(183, 1, 19, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(184, 1, 20, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(185, 1, 21, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(186, 1, 22, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(187, 1, 34, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(188, 1, 35, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(189, 1, 36, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(190, 1, 37, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(191, 1, 38, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(192, 1, 39, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(193, 1, 41, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(194, 1, 42, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(195, 1, 43, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(196, 1, 26, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(197, 1, 27, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(198, 1, 28, '2021-07-28 14:09:28', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(199, 2, 24, '2021-07-28 14:14:49', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(200, 2, 25, '2021-07-28 14:14:49', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(201, 2, 29, '2021-07-28 14:14:49', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(202, 2, 27, '2021-07-28 14:14:49', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(203, 2, 28, '2021-07-28 14:14:49', '2021-07-28 14:15:36', '2021-07-28 14:15:36'),
(204, 2, 24, '2021-07-28 14:15:36', '2022-07-02 20:17:11', '2022-07-02 20:17:11'),
(205, 2, 25, '2021-07-28 14:15:36', '2022-07-02 20:17:11', '2022-07-02 20:17:11'),
(206, 2, 29, '2021-07-28 14:15:36', '2022-07-02 20:17:11', '2022-07-02 20:17:11'),
(207, 2, 26, '2021-07-28 14:15:36', '2022-07-02 20:17:11', '2022-07-02 20:17:11'),
(208, 2, 27, '2021-07-28 14:15:36', '2022-07-02 20:17:11', '2022-07-02 20:17:11'),
(209, 2, 28, '2021-07-28 14:15:36', '2022-07-02 20:17:11', '2022-07-02 20:17:11'),
(210, 4, 24, '2021-07-28 14:17:35', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(211, 4, 29, '2021-07-28 14:17:35', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(212, 4, 27, '2021-07-28 14:17:35', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(213, 3, 24, '2021-07-28 14:19:41', '2021-07-28 14:24:05', '2021-07-28 14:24:05'),
(214, 3, 29, '2021-07-28 14:19:41', '2021-07-28 14:24:05', '2021-07-28 14:24:05'),
(215, 3, 27, '2021-07-28 14:19:41', '2021-07-28 14:24:05', '2021-07-28 14:24:05'),
(216, 4, 24, '2021-07-28 14:23:55', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(217, 4, 29, '2021-07-28 14:23:55', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(218, 4, 27, '2021-07-28 14:23:55', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(219, 4, 28, '2021-07-28 14:23:55', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(220, 3, 24, '2021-07-28 14:24:05', '2022-07-02 20:20:08', '2022-07-02 20:20:08'),
(221, 3, 29, '2021-07-28 14:24:05', '2022-07-02 20:20:08', '2022-07-02 20:20:08'),
(222, 3, 27, '2021-07-28 14:24:05', '2022-07-02 20:20:08', '2022-07-02 20:20:08'),
(223, 3, 28, '2021-07-28 14:24:05', '2022-07-02 20:20:08', '2022-07-02 20:20:08'),
(224, 4, 29, '2021-10-09 15:23:07', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(225, 4, 27, '2021-10-09 15:23:07', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(226, 4, 28, '2021-10-09 15:23:07', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(227, 4, 27, '2021-10-09 15:24:00', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(228, 4, 28, '2021-10-09 15:24:00', '2021-10-09 15:41:29', '2021-10-09 15:41:29'),
(229, 4, 24, '2021-10-09 15:41:29', '2022-07-02 20:18:31', '2022-07-02 20:18:31'),
(230, 4, 29, '2021-10-09 15:41:29', '2022-07-02 20:18:31', '2022-07-02 20:18:31'),
(231, 4, 27, '2021-10-09 15:41:29', '2022-07-02 20:18:31', '2022-07-02 20:18:31'),
(232, 4, 28, '2021-10-09 15:41:29', '2022-07-02 20:18:31', '2022-07-02 20:18:31'),
(233, 1, 11, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(234, 1, 10, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(235, 1, 9, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(236, 1, 12, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(237, 1, 13, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(238, 1, 14, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(239, 1, 15, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(240, 1, 16, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(241, 1, 23, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(242, 1, 24, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(243, 1, 25, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(244, 1, 29, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(245, 1, 30, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(246, 1, 31, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(247, 1, 32, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(248, 1, 33, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(249, 1, 17, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(250, 1, 18, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(251, 1, 19, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(252, 1, 20, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(253, 1, 21, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(254, 1, 22, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(255, 1, 34, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(256, 1, 35, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(257, 1, 36, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(258, 1, 37, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(259, 1, 38, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(260, 1, 39, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(261, 1, 40, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(262, 1, 41, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(263, 1, 42, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(264, 1, 43, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(265, 1, 26, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(266, 1, 27, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(267, 1, 28, '2021-10-10 12:03:07', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(268, 1, 11, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(269, 1, 10, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(270, 1, 9, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(271, 1, 12, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(272, 1, 13, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(273, 1, 14, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(274, 1, 15, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(275, 1, 16, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(276, 1, 23, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(277, 1, 24, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(278, 1, 25, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(279, 1, 29, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(280, 1, 30, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(281, 1, 31, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(282, 1, 32, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(283, 1, 33, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(284, 1, 17, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(285, 1, 18, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(286, 1, 19, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(287, 1, 20, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(288, 1, 21, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(289, 1, 22, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(290, 1, 34, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(291, 1, 35, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(292, 1, 37, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(293, 1, 38, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(294, 1, 39, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(295, 1, 40, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(296, 1, 41, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(297, 1, 42, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(298, 1, 43, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(299, 1, 45, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(300, 1, 26, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(301, 1, 27, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(302, 1, 28, '2022-06-19 13:45:27', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(303, 1, 11, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(304, 1, 10, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(305, 1, 9, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(306, 1, 12, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(307, 1, 13, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(308, 1, 14, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(309, 1, 15, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(310, 1, 16, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(311, 1, 23, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(312, 1, 24, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(313, 1, 25, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(314, 1, 29, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(315, 1, 30, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(316, 1, 31, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(317, 1, 32, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(318, 1, 33, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(319, 1, 46, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(320, 1, 17, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(321, 1, 18, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(322, 1, 19, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(323, 1, 20, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(324, 1, 21, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(325, 1, 22, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(326, 1, 34, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(327, 1, 35, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(328, 1, 37, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(329, 1, 38, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(330, 1, 39, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(331, 1, 40, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(332, 1, 41, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(333, 1, 42, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(334, 1, 43, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(335, 1, 45, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(336, 1, 26, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(337, 1, 27, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(338, 1, 28, '2022-06-19 15:28:44', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(339, 1, 11, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(340, 1, 10, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(341, 1, 9, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(342, 1, 12, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(343, 1, 13, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(344, 1, 14, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(345, 1, 15, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(346, 1, 16, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(347, 1, 23, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(348, 1, 24, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(349, 1, 25, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(350, 1, 29, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(351, 1, 47, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(352, 1, 30, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(353, 1, 31, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(354, 1, 32, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(355, 1, 33, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(356, 1, 46, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(357, 1, 17, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(358, 1, 18, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(359, 1, 19, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(360, 1, 20, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(361, 1, 21, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(362, 1, 22, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(363, 1, 34, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(364, 1, 35, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(365, 1, 37, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(366, 1, 38, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(367, 1, 39, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(368, 1, 40, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(369, 1, 41, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(370, 1, 42, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(371, 1, 43, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(372, 1, 45, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(373, 1, 26, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(374, 1, 27, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(375, 1, 28, '2022-06-19 16:56:09', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(376, 1, 11, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(377, 1, 10, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(378, 1, 9, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(379, 1, 12, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(380, 1, 13, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(381, 1, 14, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(382, 1, 15, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(383, 1, 16, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(384, 1, 23, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(385, 1, 24, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(386, 1, 25, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(387, 1, 29, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(388, 1, 47, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(389, 1, 30, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(390, 1, 31, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(391, 1, 32, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(392, 1, 33, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(393, 1, 17, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(394, 1, 18, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(395, 1, 19, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(396, 1, 20, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(397, 1, 21, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(398, 1, 22, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(399, 1, 34, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(400, 1, 35, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(401, 1, 37, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(402, 1, 38, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(403, 1, 39, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(404, 1, 40, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(405, 1, 41, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(406, 1, 42, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(407, 1, 43, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(408, 1, 45, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(409, 1, 26, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(410, 1, 27, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(411, 1, 28, '2022-06-19 20:03:11', '2022-06-19 20:04:40', '2022-06-19 20:04:40'),
(412, 1, 11, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(413, 1, 10, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(414, 1, 9, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(415, 1, 12, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(416, 1, 13, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(417, 1, 14, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(418, 1, 15, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(419, 1, 16, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(420, 1, 23, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(421, 1, 24, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(422, 1, 25, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(423, 1, 29, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(424, 1, 47, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(425, 1, 30, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(426, 1, 31, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(427, 1, 32, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(428, 1, 33, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(429, 1, 46, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(430, 1, 17, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(431, 1, 18, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(432, 1, 19, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(433, 1, 20, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(434, 1, 21, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(435, 1, 22, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(436, 1, 34, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(437, 1, 35, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(438, 1, 36, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(439, 1, 37, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(440, 1, 38, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(441, 1, 39, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(442, 1, 40, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(443, 1, 41, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(444, 1, 42, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(445, 1, 43, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(446, 1, 45, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(447, 1, 26, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(448, 1, 27, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(449, 1, 28, '2022-06-19 20:04:40', '2022-07-02 20:16:33', '2022-07-02 20:16:33'),
(450, 7, 24, '2022-06-26 23:12:19', '2022-06-26 23:14:16', '2022-06-26 23:14:16'),
(451, 7, 29, '2022-06-26 23:12:19', '2022-06-26 23:14:16', '2022-06-26 23:14:16'),
(452, 7, 27, '2022-06-26 23:12:19', '2022-06-26 23:14:16', '2022-06-26 23:14:16'),
(453, 6, 24, '2022-06-26 23:12:45', '2022-06-26 23:14:32', '2022-06-26 23:14:32'),
(454, 6, 29, '2022-06-26 23:12:45', '2022-06-26 23:14:32', '2022-06-26 23:14:32'),
(455, 6, 27, '2022-06-26 23:12:45', '2022-06-26 23:14:32', '2022-06-26 23:14:32'),
(456, 8, 24, '2022-06-26 23:13:09', '2022-06-26 23:14:51', '2022-06-26 23:14:51'),
(457, 8, 29, '2022-06-26 23:13:09', '2022-06-26 23:14:51', '2022-06-26 23:14:51'),
(458, 8, 27, '2022-06-26 23:13:09', '2022-06-26 23:14:51', '2022-06-26 23:14:51'),
(459, 9, 24, '2022-06-26 23:13:40', '2022-06-26 23:15:06', '2022-06-26 23:15:06'),
(460, 9, 29, '2022-06-26 23:13:40', '2022-06-26 23:15:06', '2022-06-26 23:15:06'),
(461, 9, 27, '2022-06-26 23:13:40', '2022-06-26 23:15:06', '2022-06-26 23:15:06'),
(462, 7, 24, '2022-06-26 23:14:16', '2022-07-02 20:18:00', '2022-07-02 20:18:00'),
(463, 7, 29, '2022-06-26 23:14:16', '2022-07-02 20:18:00', '2022-07-02 20:18:00'),
(464, 7, 27, '2022-06-26 23:14:16', '2022-07-02 20:18:00', '2022-07-02 20:18:00'),
(465, 7, 28, '2022-06-26 23:14:16', '2022-07-02 20:18:00', '2022-07-02 20:18:00'),
(466, 6, 24, '2022-06-26 23:14:32', '2022-07-02 20:18:46', '2022-07-02 20:18:46'),
(467, 6, 29, '2022-06-26 23:14:32', '2022-07-02 20:18:46', '2022-07-02 20:18:46'),
(468, 6, 27, '2022-06-26 23:14:32', '2022-07-02 20:18:46', '2022-07-02 20:18:46'),
(469, 6, 28, '2022-06-26 23:14:32', '2022-07-02 20:18:46', '2022-07-02 20:18:46'),
(470, 8, 24, '2022-06-26 23:14:51', '2022-07-02 20:19:27', '2022-07-02 20:19:27'),
(471, 8, 29, '2022-06-26 23:14:51', '2022-07-02 20:19:27', '2022-07-02 20:19:27'),
(472, 8, 27, '2022-06-26 23:14:51', '2022-07-02 20:19:27', '2022-07-02 20:19:27'),
(473, 8, 28, '2022-06-26 23:14:51', '2022-07-02 20:19:27', '2022-07-02 20:19:27'),
(474, 9, 24, '2022-06-26 23:15:06', '2022-07-02 20:19:48', '2022-07-02 20:19:48'),
(475, 9, 29, '2022-06-26 23:15:06', '2022-07-02 20:19:48', '2022-07-02 20:19:48'),
(476, 9, 27, '2022-06-26 23:15:06', '2022-07-02 20:19:48', '2022-07-02 20:19:48'),
(477, 9, 28, '2022-06-26 23:15:06', '2022-07-02 20:19:48', '2022-07-02 20:19:48'),
(478, 10, 24, '2022-06-27 08:33:16', '2022-07-02 20:19:05', '2022-07-02 20:19:05'),
(479, 10, 29, '2022-06-27 08:33:16', '2022-07-02 20:19:05', '2022-07-02 20:19:05'),
(480, 10, 27, '2022-06-27 08:33:16', '2022-07-02 20:19:05', '2022-07-02 20:19:05'),
(481, 10, 28, '2022-06-27 08:33:16', '2022-07-02 20:19:05', '2022-07-02 20:19:05'),
(482, 1, 11, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(483, 1, 10, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(484, 1, 9, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(485, 1, 12, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(486, 1, 13, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(487, 1, 14, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(488, 1, 15, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(489, 1, 16, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(490, 1, 23, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(491, 1, 24, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(492, 1, 25, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(493, 1, 29, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(494, 1, 47, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(495, 1, 30, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(496, 1, 31, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(497, 1, 32, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(498, 1, 33, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(499, 1, 46, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(500, 1, 17, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(501, 1, 18, '2022-07-02 20:16:33', '2022-07-02 20:16:33', '0000-00-00 00:00:00'),
(502, 1, 19, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(503, 1, 20, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(504, 1, 21, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(505, 1, 22, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(506, 1, 34, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(507, 1, 35, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(508, 1, 36, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(509, 1, 37, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(510, 1, 38, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(511, 1, 39, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(512, 1, 40, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(513, 1, 41, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(514, 1, 45, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(515, 1, 28, '2022-07-02 20:16:34', '2022-07-02 20:16:34', '0000-00-00 00:00:00'),
(516, 2, 24, '2022-07-02 20:17:11', '2022-07-02 22:31:24', '2022-07-02 22:31:24'),
(517, 2, 25, '2022-07-02 20:17:11', '2022-07-02 22:31:24', '2022-07-02 22:31:24'),
(518, 2, 29, '2022-07-02 20:17:11', '2022-07-02 22:31:24', '2022-07-02 22:31:24'),
(519, 2, 28, '2022-07-02 20:17:11', '2022-07-02 22:31:24', '2022-07-02 22:31:24'),
(520, 7, 24, '2022-07-02 20:18:00', '2022-07-02 20:18:00', '0000-00-00 00:00:00'),
(521, 7, 29, '2022-07-02 20:18:00', '2022-07-02 20:18:00', '0000-00-00 00:00:00'),
(522, 7, 28, '2022-07-02 20:18:00', '2022-07-02 20:18:00', '0000-00-00 00:00:00'),
(523, 4, 24, '2022-07-02 20:18:31', '2022-07-02 20:18:31', '0000-00-00 00:00:00'),
(524, 4, 29, '2022-07-02 20:18:31', '2022-07-02 20:18:31', '0000-00-00 00:00:00'),
(525, 4, 28, '2022-07-02 20:18:31', '2022-07-02 20:18:31', '0000-00-00 00:00:00'),
(526, 6, 24, '2022-07-02 20:18:46', '2022-07-02 20:18:46', '0000-00-00 00:00:00'),
(527, 6, 29, '2022-07-02 20:18:46', '2022-07-02 20:18:46', '0000-00-00 00:00:00'),
(528, 6, 28, '2022-07-02 20:18:46', '2022-07-02 20:18:46', '0000-00-00 00:00:00'),
(529, 10, 24, '2022-07-02 20:19:05', '2022-07-02 20:19:05', '0000-00-00 00:00:00'),
(530, 10, 29, '2022-07-02 20:19:05', '2022-07-02 20:19:05', '0000-00-00 00:00:00'),
(531, 10, 28, '2022-07-02 20:19:05', '2022-07-02 20:19:05', '0000-00-00 00:00:00'),
(532, 8, 24, '2022-07-02 20:19:27', '2022-07-02 20:19:27', '0000-00-00 00:00:00'),
(533, 8, 29, '2022-07-02 20:19:27', '2022-07-02 20:19:27', '0000-00-00 00:00:00'),
(534, 8, 28, '2022-07-02 20:19:27', '2022-07-02 20:19:27', '0000-00-00 00:00:00'),
(535, 9, 24, '2022-07-02 20:19:48', '2022-07-02 20:19:48', '0000-00-00 00:00:00'),
(536, 9, 29, '2022-07-02 20:19:48', '2022-07-02 20:19:48', '0000-00-00 00:00:00'),
(537, 9, 28, '2022-07-02 20:19:48', '2022-07-02 20:19:48', '0000-00-00 00:00:00'),
(538, 3, 24, '2022-07-02 20:20:08', '2022-07-02 20:20:08', '0000-00-00 00:00:00'),
(539, 3, 29, '2022-07-02 20:20:08', '2022-07-02 20:20:08', '0000-00-00 00:00:00'),
(540, 3, 28, '2022-07-02 20:20:08', '2022-07-02 20:20:08', '0000-00-00 00:00:00'),
(541, 2, 24, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(542, 2, 25, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(543, 2, 29, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(544, 2, 47, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(545, 2, 30, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(546, 2, 31, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(547, 2, 32, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(548, 2, 33, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(549, 2, 46, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00'),
(550, 2, 28, '2022-07-02 22:31:24', '2022-07-02 22:31:24', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_students`
--

CREATE TABLE `frbs_students` (
  `id` bigint(20) NOT NULL,
  `organization_id` bigint(20) NOT NULL,
  `course_id` bigint(20) NOT NULL,
  `year_id` bigint(20) NOT NULL,
  `extension_name_id` bigint(20) NOT NULL,
  `student_number` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `contact_number` varchar(50) NOT NULL,
  `facebook_account` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_students`
--

INSERT INTO `frbs_students` (`id`, `organization_id`, `course_id`, `year_id`, `extension_name_id`, `student_number`, `first_name`, `last_name`, `middle_name`, `email_address`, `contact_number`, `facebook_account`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(251, 9, 7, 1, 6, '2020-00296-TG-0', 'Yoan Marvic', 'Lagan', '', 'laganyoan@gmail.com', '9164452292', 'Yoan Marvic Lagan', 'd', '2021-10-09 01:22:17', '2021-10-09 13:13:01', '2021-10-09 13:13:01'),
(250, 1, 1, 3, 6, '2018-00148-TG-0', 'Christian Jay ', 'Cabiles ', 'Espiritu', 'cjespiritucabiles@gmail.com', '9988951682', 'Christian Jay Cabiles ', 'a', '2021-10-09 01:22:17', '2021-10-09 13:55:19', '0000-00-00 00:00:00'),
(249, 1, 1, 1, 6, '2020-00087-TG-0', 'Aleli Anne', 'Isidro', '', 'isidro.alelianne@gmail.com', '9959618529', 'Aleli Anne Isidro', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(248, 8, 13, 2, 6, '2019-00487-TG-O', 'Abdul Jabbar', 'Mira-Ato', '', 'ajimiraato95@gmail.com', '9164490815', 'Abdul Jabbar Mira-Ato', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(247, 1, 1, 2, 6, '2019-00444-TG-0', 'Ronn Andre', ' Acorda', '', 'ronanandreacorda16@gmail.com', '9086161739', 'Ronn Andre Acorda', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(246, 1, 1, 2, 6, '2019-00112-TG-0', 'Joyce Andres', 'Acidera ', '', 'joyceacidera05@gmail.com', '9612900155', 'Joyce Acidera', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(245, 3, 2, 2, 6, '2019-00523-TG-O', 'Christ John', 'Mercurio', '', 'christjohnmercurio@gmail.com', '9287511229', 'Christ John Mercurio', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(244, 1, 1, 3, 6, '2018-00107-TG-0', 'Mark Andrei', 'Bertolano', 'Taunan', 'markandreibertolano@gmail.com', '9458025717', 'Mark Andrei Bertolano', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(243, 3, 2, 2, 6, '2019-00458-TG-O', 'John Christopher', 'Lim', '', 'kazuto002109@gmail.com', '9966911047', 'John Christopher Lim', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(242, 1, 1, 3, 6, '2018-00137-TG-0', 'Kate ', 'Bello ', 'Abrillo', 'kate.bello09@gmail.com', '9351027233', 'Kate Bello ', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(241, 1, 5, 2, 6, '2019-00398-TG-O', 'Sharif', 'Launto', '', 'pyrex101@gmail.com', '9395271948', 'Sharif Launto', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(240, 6, 9, 1, 6, '2020-00097-TG-0', 'Marc Allen', 'Inal', '', 'inaallen3@gmail.com', '9276629607', 'Marc Allen Inal', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(239, 7, 3, 2, 1, '2019-00521-TG-O', 'Florente', 'Garcia ', '', 'jrgarcia123.abc@gmail.com', '9494826772', 'Florente Garcia ', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(238, 9, 7, 2, 6, '2019-00399-TG-O', 'Mhel Laurence ', 'Formalejo', '', 'emelef28@gmail.com', '9664003190', 'Mhel Laurence Formalejo', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(237, 1, 1, 3, 6, '2018-00034-TG-0', 'Timothy', 'Beldeniza', '', 'bsdtimothy@gmail.com', '9302990870', 'Timothy ', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(236, 11, 8, 2, 6, '2019-00407-TG-O', 'Rose Kyla', 'Fernandez ', '', 'roseklyaf@gmail.com', '9128044474', 'Rose Kyla Fernandez ', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(235, 3, 2, 2, 6, '2019-00402-TG-O', 'Rey Vincent', 'Dolz', '', 'vincentdolz12@gmail.com', '9950713784', 'Rey Vincent Dolz', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(234, 11, 8, 1, 6, '2020-00253-TG-0', 'Hasmin', 'Esah', '', 'hasmineesah@gmail.com', '9293172102', 'Hasmin Esah', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(233, 1, 5, 2, 6, 'Dolor, Victoria Angela Marie A.', 'Victoria Angela Marie', 'Dolor', '', 'lullabyangela@gmail.com', '9164546149', 'Victoria Dolor', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(232, 1, 1, 1, 6, '2020-00279-TG-0', 'Diego', 'De Vera', '', 'deveradiego15@gmail.com', '9125809987', 'Diego De Vera', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(231, 8, 12, 2, 6, '2019-00395-TG-O', 'Abdul Kaiser', 'Dianalan', '', 'kaiser.dianlan221@gmail.com', '9358211304', 'Abdul Kaiser Dianalan', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(230, 1, 1, 1, 6, '2020-00328-TG-0', 'Andrea Dennise', 'De Mesa', '', 'andreademesa16@gmail.com', '9125809987', 'Andrea Dennise De Mesa', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(229, 1, 5, 3, 6, '2018-00239-TG-0', 'John Harvey', 'Villegas', 'Caralde', 'harveyjohn1926@gmail.com', '9275451481', 'John Harvey Villegas', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(228, 1, 5, 3, 6, '2018-00253-TG-0', 'Alyssa Joanna', 'Villanueva', 'Oribe', 'alyvillanueva14@gmail.com', '9505306098', 'Alyssa Villanueva', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(227, 1, 5, 3, 6, '2018-00245-TG-0', 'Irish', 'Traqueña', 'Dacuma', 'virginiatraquena@gmail.com', '9457607391', 'Irish Traqueña', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(226, 1, 5, 3, 6, '2018-00263-TG-0', 'Aldrin', 'Seroje ', 'Inojales', 'serojealdrin@gmail.com', '9611698349', 'Aldrin Seroje', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(225, 1, 5, 3, 6, '2018-00338-TG-0', 'Jamie', 'Samar', 'Babaran', 'jamiesamar18@gmail.com', '9274165220', 'Jamie Samar', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(224, 1, 5, 3, 6, '2018-00355-TG-0', 'Shailyn Joyce ', 'Sa-an', 'Piloton', 'shailynjoycesaan@gmail.com', '9354705680', 'Shailyn Joyce Sa-an', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(223, 1, 5, 3, 6, '2018-00260-TG-0', 'Jasmine', 'Rakim', 'Del Rosario', 'rakimjasmine@gmail.com', '9485669008', 'Javana Rakim', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(222, 1, 5, 3, 6, '2018-00354-TG-0', 'Mary Grace', 'Ragpala', 'Mallen', 'grasyamallen@gmail.com', '9666846869', 'Grace Ragpala', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(221, 1, 5, 3, 6, '2018-00345-TG-0', 'Jillian', 'Pollescas', '', 'jillianpollescas@gmail.com', '9350932677', 'Jillian Pollescas', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(220, 1, 5, 3, 6, 'PASCUBILLO, LESSA ANNE PANGANIBAN', 'Lessa Anne', 'Pascubillo', 'Panganiban', 'lezzaanne@gmail.com', '9555801099', 'Lessa Anne Pascubillo', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(219, 1, 5, 3, 6, '2018-00513-TG-0', 'Jonh Carlo', 'Navaja', 'Wamar', 'jcnavaja28@gmail.com', '9099997319', 'Jonh Carlo Navaja', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(218, 1, 5, 3, 6, '2018-00305-TG-0', 'Meriel Necole', 'Manuel', 'Tagayong', 'mnmerielmanuel@gmail.com', '9070394183', 'Meriel Manuel', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(217, 1, 5, 3, 6, '2018-00372-TG-0', 'Marcus Kim', 'Manuel', 'Vibal', 'marcusmanuel.pupt@gmail.com', '9281636890', 'Marcus Kim Manuel', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(216, 1, 5, 3, 6, '2018-00328-TG-0', 'Jamreo', 'Manalo', 'Marcelo', 'jamreimanalo@gmail.com', '9474784309', 'Jamrei Manalo', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(215, 1, 5, 3, 6, '2018-00330-TG-0', 'Nerissa', 'Maglente', 'Copada', 'nerissamaglente2@gmail.com', '9972238770', 'Nerissa Maglente', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(214, 1, 5, 3, 6, '2018-00349-TG-0', 'Zairanih', 'Lumabi', 'Khusin', 'zklumabi@gmail.com', '9174656426', 'Zairanih Lumabi', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(213, 1, 5, 3, 6, '2018-00319-TG-0', 'Pauline Jane', 'Llagas ', 'Santos', 'paulinellagas@gmail.com', '9560866865', 'Pauline Jane Llagas', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(212, 1, 5, 3, 6, '2018-00376-TG-0', 'Lenard', 'Llacer', 'Jundis', 'linijin17@gmail.com', '9057368291', 'Lenard Llacer', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(211, 1, 5, 3, 6, '2018-00299-TG-0', 'David', 'Limba ', 'Laguiab', 'davidlimba19@gmail.com', '9498060410', 'David Limba', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(210, 1, 5, 3, 6, '2018-00523-TG-0', 'Chrisitian ', 'Lazaro ', 'Cordero', 'lazarochan03@gmail.com', '9195252973', 'Christian Lazaro', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(209, 1, 5, 3, 6, '2018-00487-TG-0', 'Van joakhim ', 'Laude', 'Balquin', 'khimlaude@gmail.com', '9553295266', 'Van Joakhim Laude', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(208, 1, 5, 3, 4, '2018-00315-TG-0', 'Crisologo', 'Lapitan ', 'Proto', 'choilapitan47@gmail.com', '9519691309', 'Crisologo Lapitan', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(207, 1, 5, 3, 6, '2018-00293-TG-0', 'Jerome ', 'Jalandoon', 'Bermudez', 'jerome.jalandoon@gmail.com', '9673104255', 'Jerome Jalandoon', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(206, 9, 7, 2, 6, '2019-00408-TG-O', ' Aaron ', 'Cunanan', '', 'aarontuu@yahoo.com', '9563588213', ' Aaron Cunanan', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(205, 1, 1, 1, 6, '2020-00228-TG-0', ' John Vincent ', 'De Castro', '', 'gstcdecastronecniv@gmail.com', '9217547387', ' John Vincent De Castro', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(204, 1, 1, 3, 6, '2018-00524-TG-0', 'Ivan Daniel', 'Balona ', 'Galarace', 'ivandanielg1124@gmail.com', '9287618500', 'Ivan Daniel Balona ', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(203, 1, 5, 3, 6, '2018-00322-TG-0', 'Raymond', 'Gabito', '', 'gabitoraymond358@gmail.com', '9079897143', 'Raymond Gabito', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(202, 1, 5, 3, 6, '2018-00379-TG-0', 'Froilan', 'Fernandez', 'Dumaguin', 'froilanfernandez08@gmail.com', '9466583458', 'Froilan Fernandez', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(201, 8, 12, 1, 6, '2020-00268-TG-0', 'Althea ', 'Dabu', '', 'dabu.althea@gmail.com', '9298518667', 'Althea Dabu', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(200, 2, 11, 2, 6, '2019-00405-TG-O', 'Joshua Gabrielle ', 'Concepcion', '', 'joshuaconcepcion12.jc@gmail.com', '9951365750', 'Joshua Gabrielle Concepcion', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(199, 1, 5, 3, 6, '2018-00353-TG-0', 'Erjohn', 'Espuerta', 'Sarmiento', 'erjohn13@gmail.com', '9994080568', 'Erjohn Espuerta', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(198, 3, 2, 1, 6, '2020-00247-TG-0', 'Frances Anne ', 'Cruz', '', 'frncsanncruz@gmail.com', '9970780187', 'Frances Anne Cruz', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(197, 6, 9, 1, 6, '2020-00452-TG-0', 'Leila ', 'Borromeo', '', 'leilaborromeo96@gmail.com', '9219631071', 'Leila Borromeo', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(196, 1, 5, 2, 6, '2019-00389-TG-O', 'Jaysean ', 'Caube', '', 'jaysencaube@gmail.com', '9121440008', 'Jaysean Caube', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(195, 1, 5, 3, 6, 'DELA CRUZ, EDMON MADRONIO', 'Edmon ', 'Dela Cruz ', 'Madronio', 'rhingmakz21@gmail.com', '9192377875', 'Willson Madronio Dela Cruz', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(194, 1, 5, 3, 6, '2018-00361-TG-0', 'John Russel', 'Dacanay', 'Larraquel', 'johnrusseldacanay@gmail.com', '9617030037', 'John Russel Dacanay', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(193, 9, 7, 2, 6, '2019-00498-TG-O', ' Bryle', 'Castillon', '', 'brylecourdey@gmail.com', '9770255241', ' Bryle Castillon', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(192, 8, 12, 1, 6, '2020-00358-TG-0', 'Isabella Elaine', 'Biaco', '', 'itisabellaelaine@gmail.com', '9668860227', 'Isabella Elaine Biaco', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(191, 3, 2, 2, 6, '2019-00409-TG-O', 'Anjanette ', 'Castillo', '', 'castillo15@gmail.com', '9206131468', 'Anjanette Castillo', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(190, 1, 5, 3, 6, '2018-00342-TG-0', 'Ken Zedric', 'Cortes ', 'Corpuz', 'kzcortes27@gmail.com', '9562679248', 'Ken Zedric Cortes', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(189, 1, 1, 3, 6, '2018-00520-TG-0', 'Gerald Kevin', 'Aurora', 'Caaya', 'kevstixxay@gmail.com', '9063588283', 'Gerald Kevin Aurora', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(188, 11, 8, 2, 6, '2019-00393-TG-O', 'Gillian ', 'Carballo', '', 'gillian.carballo0319@gmail.com', '9216944388', 'Gillian Carballo', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(187, 8, 13, 1, 6, '2020-00224-TG-0', 'Jana Enigma ', 'Baruc', '', 'jaebaruc@gmail.com', '9209453809', 'Jana Baruc', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(186, 1, 1, 3, 6, '2018-00628-TG-0', 'Roe Bien', 'Arnaiz ', 'Pedragosa', 'roebienbien@gmail.com', '9615795318', 'Roe Bien Arnaiz', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(185, 1, 5, 2, 6, '2019-00410-TG-O', 'Francis Manuel ', 'Caragdag', '', 'franciscaragdag@gmail.com', '9666800520', 'Francis Manuel Caragdag', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(184, 2, 11, 1, 6, '2020-00299-TG-0', 'Christian Allen', 'Baquir', '', 'riuqab@gmail.com', '9278898456', 'Christian Allen Baquir', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(183, 11, 8, 1, 6, '2020-00309-TG-0', 'Christji Myr ', 'Bado', '', 'christjimybado@gmail.com', '9204050184', 'Christji Myr Bado', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(182, 2, 1, 1, 6, '2020-00349-TG-0', 'Jonathan', 'Amoranto', '', 'jonathanamoranto878@gmail.com', '9495778897', 'Jonathan Amoranto', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(181, 7, 3, 2, 6, '2019-00524-TG-O', 'Julius Carlo ', 'Cabaces', '', 'juliuscarlo.cabeces@gmail.com', '9154673130', 'Julius Carlo Cabaces', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(180, 1, 5, 3, 6, '2018-00220-TG-0', 'Quiel Jeremiah', 'Cariaso', 'Ledesma', 'quieljeremiahcariaso04@gmail.com', '9165679982', 'Quiel Cariaso', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(179, 1, 1, 1, 6, '2020-00137-TG-0', 'Mary Cielo ', 'Aguilar', '', 'lhuvaciel08@gmailc.com', '9662983198', 'Mary Cielo Aguilar', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(178, 9, 7, 2, 6, '2019-00481-TG-O', 'Jhon Niño ', 'Bustamante', '', 'jhonbustamante011501@gmail.com', '9512282798', 'Jhon Niño Bustamante', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(177, 1, 1, 1, 6, '2020-00440-TG-0', 'Andrea', 'Abella', '', 'abella.andrea0514@gmail.com', '9471822543', 'Andrea Abella', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(176, 8, 13, 2, 6, '2019-00490-TG-O', 'Wency Diane ', 'Basada', '', 'basadawwencydaine03@gmail.com', '9518958097', 'Wency Diane Basada', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(175, 1, 1, 3, 6, '2018-00169-TG-0', 'Lester Glenn', 'Apurada ', 'Laganson', 'lesterapurada@gmail.com', '9773870096', 'Lester Apurada', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(174, 1, 5, 3, 6, '2018-00256-TG-0', 'Joshua', 'Capalaran', 'Angob', 'joshuacapalaran27@gmail.com', '9494271642', 'Joshua Capalaran', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(173, 6, 10, 2, 6, '2019-00388-TG-O', ' Ivan Rae', 'Baribar', '', 'ivanraeb01@gmail.com', '9951302183', ' Ivan Rae Baribar', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(172, 1, 1, 3, 6, '2018-00217-TG-0', 'Ivan Christopher', 'An', 'Badua', 'ivanchristopheran@gmail.com', '9473000398', 'Ivan Christopher An', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(171, 1, 5, 2, 6, '2019-00527-TG-O', 'April ', 'Azagra', '', 'eprelazagara@gmail.com', '9054679722', 'April Azagara', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(170, 1, 5, 3, 6, '2018-00343-TG-0', 'Charmie', 'Cabanela', 'Ablon', 'cabanelacharmie@gmail.com', '9550838590', 'charmie Cabanela', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(169, 11, 8, 2, 6, '2019-00531-TG-O', ' Irenic Danae ', 'Atun', '', 'irenicdanaeatun@gmail.com', '9367866756', 'Irenic Danae Atun', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(168, 7, 3, 1, 6, '2020-00199-TG-0', 'Sheila Mae ', 'Yacub', '', 'sheilamaeyacub1002@gmail.com', '9159759465', 'Sheila Mae Yacub', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(167, 2, 11, 1, 6, '2020-00205-TG-0', ' Airon ', 'Villaruel', '', 'aironvillaruel123@gmail.com', '9610890864', 'Airon Villaruel', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(166, 6, 9, 1, 6, '2020-00195-TG-0', 'Christopher ', 'Ultra', '', 'arn.christoper10@gmail.com', '9202528772', 'Christopher Ultra', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(165, 1, 5, 3, 6, '2018-00484-TG-0', 'Lailynette', 'Burton', 'Dela Cruz', 'llynttburton08@gmail.com', '9154997683', 'Lei Burton', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(164, 1, 1, 3, 6, '2018-00167-TG-0', 'Juan Carlos', 'Amaguin', '', 'puptcs.jtlsescar@gmail.com', '9175391998', 'Jc Amaguin', 'a', '2021-10-09 01:22:10', '2022-07-03 14:45:29', '0000-00-00 00:00:00'),
(163, 1, 5, 2, 6, '2019-00488-TG-O', 'Christian Phillip ', 'Alvaro', '', 'ian.alvaro16@gmail.com', '9397335722', 'Christian Phillip Alvaro', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(162, 1, 5, 1, 6, '2020-00455-TG-0', 'Reign Pier', 'Ticar', '', 'reignticar02@gmail.com', '9295905980', 'Reign Pier Ticar', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(161, 1, 5, 3, 6, '2018-00525-TG-0', 'Christian Elvin', 'Bangga', 'Rilveria ', 'ecbangga@gmail.com', '9774724891', 'Elvin Christian', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(160, 11, 8, 2, 6, '2019-00519-TG-O', 'Mark Joshua ', 'Allado', '', 'worldchanger4117@gmail.com', '9475883200', 'Mark Joshua Allado', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(159, 7, 3, 1, 6, '2020-00161-TG-0', 'Rysha Laine', 'Taganas', '', 'taganasryshalaine@gmail.com', '9473089458', 'Rysha Laine Taganas', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(158, 1, 5, 3, 6, '2018-00231-TG-0', 'Ed Mhar', 'Apura', 'Delante', 'mhar.apura@gmail.com', '9291854660', 'Mhar Apura', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(157, 3, 2, 1, 6, '2020-00037-TG-0', 'Janise Hop ', 'Sandigan', '', 'janisesandigan@gmail.com', '9394363091', 'Janise Hop Sandigan', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(156, 1, 5, 2, 6, '2019-00493-TG-O', 'Francheska Nicole', 'Alcid', '', 'nicoleskiie@gmail.com', '9169358178', 'Francheska Nicole Alcid', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(155, 8, 13, 1, 6, '2020-00053-TG-0', 'Daisylene Suzy', 'Ross', '', 'zyzyross4@gmail.com', '9197867189', 'Daisylene Suzy Ross', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(154, 8, 12, 1, 6, '2020-00187-TG-0', 'Michelle Via ', 'Rediga', '', 'michellerediga@gmail.com', '9563053213', 'Michelle Via Rediga', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(153, 7, 3, 1, 6, '2020-00201-TG-0', 'John Steven ', 'Penecitos', '', 'Steven.penecitos123@gmail.com', '9091548796', 'John Steven Penecitos', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(152, 7, 3, 1, 6, '2020-00179-TG-0', 'Kyle Hebryl', 'Evangelista', '', 'evangelistakyle18@gmail.com', '9270545331', 'Kyle Hebryl Evangelista', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(151, 1, 5, 1, 6, '2020-00173-TG-0', 'Theresa Mariane ', 'Espejo', '', 'theresamariane@gmail.com', '9611451258', 'Theresa Mariane Espejo', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(150, 3, 2, 1, 6, '2020-00039-TG-0', 'Arvine Justine ', 'Dimaano', '', 'arvinejustine2102@gmail.com', '9154040321', 'Arvine Justine Dimaano', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(149, 9, 7, 1, 6, '2020-00207-TG-0', 'Fabien ', 'De Leon', '', 'fabiendeleon@gmail.com', '9493470963', 'Fabien De Leon', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(147, 1, 5, 1, 6, '2020-00189-TG-0', 'Mary Jane Fhel', 'Bobadilla', '', 'mjfbobadilla02@gmail.com', '9281615257', 'Mary Jane Fhel Bobadilla', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(148, 6, 10, 1, 6, '2020-00191-TG -0', 'Er Jane ', 'Cabahug', '', 'erjanecabahug0411@gmail.com', '9079068720', 'Er Jane Cabahug', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(146, 1, 5, 1, 6, '2020-00457-TG-0', 'Anna Patricia', 'Aquino', '', 'annapatriciaaquino01@gmail.com', '9380615397', ' Anna Patricia Aquino', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(143, 1, 5, 3, 6, '2018-00304-TG-0', 'Bernadette', 'Tradio', 'Villanaba', 'bernatrads4@gmail.com', '9494058830', 'Bernadette Tradio', 'a', '2021-10-09 01:22:08', '2021-10-09 01:22:08', '0000-00-00 00:00:00'),
(144, 1, 5, 3, 6, '2018-00313-TG-0', 'John Timothy', 'Sescar ', 'Llega', 'tmbrccl@gmail.com', '9087896711', 'John Timothy Sescar', 'a', '2021-10-09 01:22:08', '2021-10-09 01:22:08', '0000-00-00 00:00:00'),
(145, 1, 5, 1, 6, '2020-00197-TG-0', 'Bryant Paul ', 'Babac, Bryant Paul S.', '', 'bryantpaulbabac@gmail.com', '9667344635', 'Bryant Paul Babac', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(252, 6, 9, 1, 6, '2020-00290-TG-0', 'Ann Janet', 'Luminario', '', 'anjaluminario@gmail.com', '9091411985', 'Ann Janet Luminario', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(253, 1, 1, 3, 6, '2018-00190-TG-0', 'Earl Janiel', 'Compra', 'Fernando', 'compranicles@gmail.com', '9776029970', 'Earl Janiel Compra', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(254, 1, 1, 1, 6, '2020-00219-TG-0', 'Justin', 'Mabalot', '', 'justinmabalot02@gmail.com', '9053315458', 'Justin Mabalot', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(255, 8, 12, 1, 6, '2020-00089-TG-0', 'Cedrick', 'Monge', '', 'cedrickigop21@gmail.com', '9108410175', 'Cedrick Monge', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(256, 8, 13, 1, 6, '2020-00278-TG-0', 'Maria Arabella', 'Pablo', '', 'mariaarabellapablo05@gmail.com', '9056140472', 'Maria Arabella Pablo', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(257, 1, 1, 1, 6, '2020-00311-TG-0', 'Frederick', 'Papa', '', 'frederickaniscal@gmail.com', '9081781330', 'Frederick Papa', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(258, 1, 1, 2, 6, '2019-00110-TG-0', 'Gurgen Mille', 'Aguimbag ', '', 'gurgenmille.aguimbag@gmail.com', '9122231510', 'Gurgen Mille Aguimbag', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(259, 1, 1, 1, 6, '2020-00246-TG-0', 'Coleen', 'Perez ', '', 'perezcoleendalit@gmail.com', '9567388450', 'Coleen Perez ', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(260, 1, 1, 2, 6, '2019-00430-TG-0', 'Allen Kobe', 'Agustin', '', 'allenkobe.agustin@gmail.com', '9065165529', 'Allen Kobe Agustin', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(261, 1, 1, 2, 6, '2019-00237-TG-0', 'Phil Deiter', 'Atun', '', 'atunphil@gmail.com', '9287551696', 'Phil Deiter Atun', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(262, 1, 1, 3, 6, '2018-00075-TG-0', 'Russel', 'Claveria', 'Morada', 'claveria.russel@gmail.com', '9429755930', 'Russel Claveria', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(263, 1, 1, 1, 6, '2020-00217-TG-0', 'Ma. Fidelyn', 'Palus', '', 'palusmafidelyn@gmail.com', '9272160933', 'Ma. Fidelyn Palus', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(264, 1, 2, 3, 6, '2015-00313-tg-0', 'agapito', 'reyes', '', 'ar@gmail.com', '9123456789', '', 'd', '2021-10-09 13:17:26', '2021-10-10 08:43:02', '2021-10-10 08:43:02'),
(265, 1, 1, 4, 6, '2017-00313-TG-0', 'Jessica', 'Ungcuangco', 'Aguilar', 'jessica.uy@gmail.com', '09123456789', 'Jessica Uy', 'd', '2021-10-10 08:38:41', '2021-10-10 08:40:30', '2021-10-10 08:40:30');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_users`
--

CREATE TABLE `frbs_users` (
  `id` bigint(20) NOT NULL,
  `role_id` bigint(20) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_users`
--

INSERT INTO `frbs_users` (`id`, `role_id`, `first_name`, `last_name`, `email_address`, `username`, `password`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(299, 3, 'maria arabella', 'pablo', 'mariaarabellapablo05@gmail.com', 'mariaarabellapablo05@gmail.com', '$2y$10$PY4LuHL3t7YTUR64GwQizeZrX.XX5WNYsImYnwTwlj.YB0MQa5slG', 'd', '2021-10-09 01:22:18', '2021-10-09 14:54:33', '2021-10-09 14:54:33'),
(298, 3, 'cedrick', 'monge', 'cedrickigop21@gmail.com', '2020-00089-tg-0', '$2y$10$a2sXn0/5T/0XIKiqBDIO.ekcRf9Go.AMMIbkXTavVQ.6te6y93zn.', 'a', '2021-10-09 01:22:18', '2022-07-13 14:19:23', '0000-00-00 00:00:00'),
(23, 2, 'David', 'Sescar', 'fasdf@gmail.com', 'admin123', '$2y$10$bzMH86LzY8rgQgQDmVtjxe0ch2V4EzxbBReuJZAJWnusPFS/Qgq6K', 'd', '2021-06-23 21:11:31', '2021-06-23 21:11:38', '2021-06-23 21:11:38'),
(328, 4, ' benjamin', 'abarquez ', 'abarquezbenjamin@gmail.com', 'eid-00335-tg-0', '$2y$10$GhcSY9p1sEyaJSCTWXaSZOfWeQLeK4bLJ4N2denSETySorZFgCbDC', 'a', '2021-10-09 01:30:17', '2022-07-13 14:20:46', '0000-00-00 00:00:00'),
(17, 1, 'John Timothy', 'Sescar', 'tmbrccl@gmail.com', 'superadmin', '$2y$10$.uzc0O1DVutYz09AmONIxu8WJvtEN7scVw20mZOuqkJgVi2uinqku', 'a', '2021-06-23 20:57:00', '2021-06-23 20:57:00', '0000-00-00 00:00:00'),
(33, 2, 'Juan', 'Dela Cruz', 'admin@gmail.com', 'admin1239', '$2y$10$PYaTNYzwCOMbEmYDUwKLk.EOeWdHezE7wL1CLRtVcikK777qISEKe', 'd', '2021-07-22 05:09:30', '2021-10-09 14:57:52', '2021-10-09 14:57:52'),
(32, 2, 'Admin', 'Admin', 'admin@gmail.com', 'admin@gmail.com', '$2y$10$rFafDEadbQm9qxcbunH3K.1o4RZHhSe0k3XaLi/ZzGP30YhpZZSJO', 'd', '2021-07-07 09:12:07', '2021-07-07 09:16:20', '2021-07-07 09:16:20'),
(297, 3, 'justin', 'mabalot', 'justinmabalot02@gmail.com', '2020-00219-tg-0', '$2y$10$mjGebHfOfGUwrkasVDSe7ut4gGtDXN47/JqHN1LhFGnUzCmgzCByu', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(296, 3, 'earl janiel', 'compra', 'compranicles@gmail.com', '2018-00190-tg-0', '$2y$10$P/xBDGyahgQpBmJlE92ONeoOOt9difzYfphAnc.FLBgWcfz1Dpg/a', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(295, 3, 'ann janet', 'luminario', 'anjaluminario@gmail.com', '2020-00290-tg-0', '$2y$10$qoLkVgIzrQigoYhn2LJQH.RGlCXHFfOLy0P3lacsVMrSK0p3rNLM6', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(294, 3, 'yoan marvic', 'lagan', 'laganyoan@gmail.com', '2020-00296-tg-0', '$2y$10$ez82CsF3VwJqn9y1gh.PmOlU9dfyVrHj2lcbSZxkxP7.ppCK4aktG', 'd', '2021-10-09 01:22:17', '2021-10-09 13:13:01', '2021-10-09 13:13:01'),
(293, 3, 'christian jay ', 'cabiles ', 'cjespiritucabiles@gmail.com', '2018-00148-tg-0', '$2y$10$gyMb4pbVx3hHu10jAFRrxeSPSGi7GfUD0vUQjMiWZMhlkI6HR1cBe', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(292, 3, 'aleli anne', 'isidro', 'isidro.alelianne@gmail.com', '2020-00087-tg-0', '$2y$10$znHj5CsqmWgHCYCdF5G2peoKFGxzSKpTw18wKm1AwRNvHbVgmKOzi', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(291, 3, 'abdul jabbar', 'mira-ato', 'ajimiraato95@gmail.com', '2019-00487-tg-o', '$2y$10$nVW32KKh/a4hJ8BWQI4UXeuwHazq3t72zQ9xSLSIW.fakAYeFMWZe', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(290, 3, 'ronn andre', ' acorda', 'ronanandreacorda16@gmail.com', '2019-00444-tg-0', '$2y$10$PfEG78aEiml1DBO8iMNpSOO/Nz9/oHBPxzLYofPOXu7dWWKtyi52W', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(289, 3, 'joyce andres', 'acidera ', 'joyceacidera05@gmail.com', '2019-00112-tg-0', '$2y$10$Pk/qK1gte9gtzJr8z5Mi5O5s0NI3jXKr6zrSic8sQ./UDLiw3BrB.', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(288, 3, 'christ john', 'mercurio', 'christjohnmercurio@gmail.com', '2019-00523-tg-o', '$2y$10$bacB2nr8ci.PZw.Ctc2eO.1dgCUUhFGu7TJuUS/dkpNRA3T0uCsWS', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(287, 3, 'mark andrei', 'bertolano', 'markandreibertolano@gmail.com', '2018-00107-tg-0', '$2y$10$wr373VAaLctQ6Cny.OEKpOyCaWy4FaGbl33uku6L5kLq9MHC4QALy', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(286, 3, 'john christopher', 'lim', 'kazuto002109@gmail.com', '2019-00458-tg-o', '$2y$10$J.gwv2eEzPqNC8eECm.ELOZRFmHhy0HMBcwLT81ew7Zw9Lzd8PzH.', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(285, 3, 'kate ', 'bello ', 'kate.bello09@gmail.com', '2018-00137-tg-0', '$2y$10$YRy.v/OdWyC8HmdUyjttbuj989tj81o3RxiZ3QDSH0S7OqvJkAdAC', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(284, 3, 'sharif', 'launto', 'pyrex101@gmail.com', '2019-00398-tg-o', '$2y$10$FIn9rzk8Oudqh8MFWgo0huRt1lWuW1z2zCcCP5rf5PbmC18TDWhte', 'a', '2021-10-09 01:22:17', '2021-10-09 01:22:17', '0000-00-00 00:00:00'),
(283, 3, 'marc allen', 'inal', 'inaallen3@gmail.com', '2020-00097-tg-0', '$2y$10$5k6pNuzVBSazQy9pj0x3LeIpIH2vP.Sd7rcNjWCf/ndK.LTx5qJFq', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(282, 3, 'florente', 'garcia ', 'jrgarcia123.abc@gmail.com', '2019-00521-tg-o', '$2y$10$nIeAL0JNn6qwQ8l/fnbG4Oq42sOeYDBRqEvu6GVqllYaOdI63/OlK', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(281, 3, 'mhel laurence ', 'formalejo', 'emelef28@gmail.com', '2019-00399-tg-o', '$2y$10$u259pJMArLAM/9BP6S4eqOmo2o/Hqc0KoE83aQNGbRQmpocp3crPW', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(327, 4, 'israel', 'ortega', 'ortegaisrael@gmail.com', 'eid-00329-tg-0', '$2y$10$VC9432B8orFJwrVeYP07.Om.4Kus1PxFxzeWpRQbi8exRad5n3Anq', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(280, 3, 'timothy', 'beldeniza', 'bsdtimothy@gmail.com', '2018-00034-tg-0', '$2y$10$M6Q5Hm8vqjYHDPSusC4fJOers/DAqu1N3x/FCIcCK12AzqVEvMfAe', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(325, 4, 'orlando ', 'lingo', 'lingoorlando@gamil.com', 'eid-00327-tg-0', '$2y$10$6DlqX8ffhvX41h3DEHba..pe34RPN3oAGUtYmU53vhYEgEcM702EO', 'd', '2021-10-09 01:30:16', '2021-10-09 13:13:12', '2021-10-09 13:13:12'),
(324, 10, 'darwin ', 'tacubanza', 'darwintacubanza@gmail.com', 'eid-00322-tg-0', '$2y$10$s.E3ZQC.zRDKHFbchUkhleH4blYFM25y4duPecltE9ZnegI3ugG.S', 'a', '2021-10-09 01:30:16', '2022-07-08 11:45:12', '0000-00-00 00:00:00'),
(279, 6, 'rose kyla', 'fernandez ', 'roseklyaf@gmail.com', '2019-00407-tg-0', '$2y$10$jETHJMGG8MB2DikW5.Q3/u///EPwgfs8NLr9leJRvKxdfS617fuWa', 'a', '2021-10-09 01:22:16', '2022-06-27 21:54:27', '0000-00-00 00:00:00'),
(278, 3, 'rey vincent', 'dolz', 'vincentdolz12@gmail.com', '2019-00402-tg-o', '$2y$10$1TqAonwMjxuXz73Fh2y1eek/oKSApT5QQbHcUr/nuUQ4r0Fq4TRI2', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(277, 3, 'hasmin', 'esah', 'hasmineesah@gmail.com', '2020-00253-tg-0', '$2y$10$Yd5EwUDAYpdAsFGZU0L0v.u1.OHveY06II7ro.lFmNTkyuLxXo7LW', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(276, 3, 'victoria angela marie', 'dolor', 'lullabyangela@gmail.com', 'dolor, victoria angela marie a.', '$2y$10$ikOpWPARVttF3yi3HTtHlemBpHunXH.TsEble7dfra60swEO8dV/u', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(275, 3, 'diego', 'de vera', 'deveradiego15@gmail.com', '2020-00279-tg-0', '$2y$10$6p9RP8Cpx.J.PTQuHTFp3OvNYI5GPnOR/39SGWfknnZ53pcggU2JO', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(274, 3, 'abdul kaiser', 'dianalan', 'kaiser.dianlan221@gmail.com', '2019-00395-tg-o', '$2y$10$vU2JjSCDTWRj/tp47UjeH.MP/Qet0NHseKvMJbzzQMU.xggZem9IW', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(273, 3, 'andrea dennise', 'de mesa', 'andreademesa16@gmail.com', '2020-00328-tg-0', '$2y$10$ukYMn/R9xuqUMOArmt4MSeLWiPsF672KnttDTspBUKKzAPHcwAQwS', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(272, 3, 'john harvey', 'villegas', 'harveyjohn1926@gmail.com', '2018-00239-tg-0', '$2y$10$Cf.cSPsCJJJ6SsvqKwV28.PD7Be71cgc73rjMWBjIw/Vk7XnISRaa', 'a', '2021-10-09 01:22:16', '2021-10-09 01:22:16', '0000-00-00 00:00:00'),
(271, 3, 'alyssa joanna', 'villanueva', 'alyvillanueva14@gmail.com', '2018-00253-tg-0', '$2y$10$DRpgLqoumD2TFeA6rAwu0.cCb4PZtZGEAeXTNI3Y797JyDcN4asOy', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(270, 3, 'irish', 'traque??a', 'virginiatraquena@gmail.com', '2018-00245-tg-0', '$2y$10$ffCHyi58Yeyb7qircUrUnu703LBQa9v4MwUJSjf0qxmSkq43xPv0O', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(269, 3, 'aldrin', 'seroje ', 'serojealdrin@gmail.com', '2018-00263-tg-0', '$2y$10$hGhRLFka/MJplcpVLFTnoe6y3gTbGtPBA7wJM/KJZd0E5OtImCcEG', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(268, 3, 'jamie', 'samar', 'jamiesamar18@gmail.com', '2018-00338-tg-0', '$2y$10$P4wAxZ7hypugWBGcx2s1p.qPWKzCwXANxLMnvCjdd1LjfufRw1aSS', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(267, 3, 'shailyn joyce ', 'sa-an', 'shailynjoycesaan@gmail.com', '2018-00355-tg-0', '$2y$10$qC7XgWaTzBnNOvuA22fTR.dx5pBkv81lyg0MGHgX1apF.mU1C/TdW', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(266, 3, 'jasmine', 'rakim', 'rakimjasmine@gmail.com', '2018-00260-tg-0', '$2y$10$Gju3TZ9ORlMUzjPHhUGbeewQN5I9gApT5P7I6o/iVLhXDavDtIwgS', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(265, 3, 'mary grace', 'ragpala', 'grasyamallen@gmail.com', '2018-00354-tg-0', '$2y$10$n7Gf3ors8kXda8VisYpwPugPsSGhx3boXUqLXAG2Tpc/ti5MSKA6u', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(264, 3, 'jillian', 'pollescas', 'jillianpollescas@gmail.com', '2018-00345-tg-0', '$2y$10$utHHYDj5lfJRIY4iIwH7D.YEsDvoVZX4cyGH3FxgCLf5wtq9U3z/S', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(323, 4, 'merly', ' tataro', 'tataromerly@gmail.com', 'eid-00324-tg-0', '$2y$10$FC8VxiwB978pWSvYA03rXuey.WaDfy2qY2vFzHQDPiVle4//F09Pe', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(322, 4, 'angelito', ' calingo', 'calingoangelito@gmail.com', 'eid-00321-tg-0', '$2y$10$zpoy4Qp3GolfbSq8ZGsnh.IDFRkBhTCgN4Asocct1/yHQnAbR8TGO', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(321, 4, 'evangeline', 'lim', 'evangelinelim@gmail.com', 'eid-00314-tg-0', '$2y$10$DiguXv2AcbK9R9/Ny5WX2.KBSPhXQ2Df7h8TZ4GBkg7TqiVIMFAZ2', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(263, 3, 'lessa anne', 'pascubillo', 'lezzaanne@gmail.com', 'pascubillo, lessa anne panganiban', '$2y$10$9F9fbUQeQcXeG/MldCqV0O0ygRT/kYFapMiAB5fFYdXqgnxzqxbCi', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(262, 3, 'jonh carlo', 'navaja', 'jcnavaja28@gmail.com', '2018-00513-tg-0', '$2y$10$fsfNbClPS0BqLkImRC6G7e33iuA5F3zQZInpvHz3.mZXgwy0TBmUu', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(261, 3, 'meriel necole', 'manuel', 'mnmerielmanuel@gmail.com', '2018-00305-tg-0', '$2y$10$C7pWd.pr56fw9Xt5o2LuVuIHD9e3J0X4G3530EPbSwnE8148fHLlm', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(260, 3, 'marcus kim', 'manuel', 'marcusmanuel.pupt@gmail.com', '2018-00372-tg-0', '$2y$10$U.4jB4ENVEEum17WjycvueuQ2LNg2KjrPQQxzIundz2uoiorQuT0e', 'a', '2021-10-09 01:22:15', '2021-10-09 01:22:15', '0000-00-00 00:00:00'),
(259, 3, 'jamreo', 'manalo', 'jamreimanalo@gmail.com', '2018-00328-tg-0', '$2y$10$aDuFp.SVe156vH59p9S1teuBWE6Z7OIrAgiILWQDxVtKgFIzblTCy', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(258, 3, 'nerissa', 'maglente', 'nerissamaglente2@gmail.com', '2018-00330-tg-0', '$2y$10$9h1X20xzmEwHjwxpi1jUyeykayoAlwcRpiiX7ax2V5TKGQGXdF/h.', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(257, 3, 'zairanih', 'lumabi', 'zklumabi@gmail.com', '2018-00349-tg-0', '$2y$10$tb5JcUL2LPlsuyCNy1GSG.1XGFGmAKJxBWTmiAOTdXTqYcc/uUFEW', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(256, 3, 'pauline jane', 'llagas ', 'paulinellagas@gmail.com', '2018-00319-tg-0', '$2y$10$L3acizDvzB8XBEr98V/NU.bq946s29vUxOkEZf42qyAsz7OewpLiy', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(255, 3, 'lenard', 'llacer', 'linijin17@gmail.com', '2018-00376-tg-0', '$2y$10$BF4WBXIjw5trS6hTgDv2Le78FeRSRSXWTVnzCQ0P9tcjkQZRyMMOa', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(254, 3, 'david', 'limba ', 'davidlimba19@gmail.com', '2018-00299-tg-0', '$2y$10$VgkFJATB6aBjUD6xAwaDO.sz/KV7KmQzwnCtNxdngjaqmXH3fMm4y', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(253, 3, 'chrisitian ', 'lazaro ', 'lazarochan03@gmail.com', '2018-00523-tg-0', '$2y$10$3s7OLuExEl.ECt6go.DAxOKzK1QE2zkjf.gG4Bv/czFp90tMM4UVG', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(252, 3, 'van joakhim ', 'laude', 'khimlaude@gmail.com', '2018-00487-tg-0', '$2y$10$72GLsAAhjt5UwTTBgj1s1.Qxpony7SxRgnf6Gdv9aCGVg3tPbNDa6', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(320, 4, 'danilo', 'valenzuela', 'daniovalenzuela@gmail.com', 'eid-00320-tg-0', '$2y$10$ukUEUo6uifp43NgL7iBs2.oKqDDhfkJeib3bPz.PtFdbn1QIJX/oC', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(319, 8, 'cecilia', 'alagon', 'ceciliaalagaon@gmail.com', 'eid-00325-tg-0', '$2y$10$6q9ccutlfX1lDeYZ7cUlXOVBtKPyhHlt7CPLQndd7WWDBDBK3OWKK', 'a', '2021-10-09 01:30:16', '2022-07-13 14:05:44', '0000-00-00 00:00:00'),
(318, 4, 'elvin', 'catantan', 'ec.cantatan@gmail.com', 'eid-00310-tg-0', '$2y$10$rcGv7hOt/G94l4m7DxfWGO8.we7lKAzonT80tGbw3KPA.cL2/c2yS', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(317, 4, 'tromil', 'gardose', 'gardosetromil@gmail.com', 'eid-00319-tg-0', '$2y$10$RpfrqubaVzJruTonxK76fOTxvpID755VDnicbaWtUdkhtRpK0OzXW', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(316, 4, 'john dustin', 'santos', 'johndustinsantos@gmail.com', 'eid-00317-tg-0', '$2y$10$E4t4jN7SA15MD1.MGijspeO0pTDQ0LUpZ66jqIsSAwzeQAu5ofvMi', 'a', '2021-10-09 01:30:16', '2021-10-09 01:30:16', '0000-00-00 00:00:00'),
(315, 4, 'mhel', 'garcia', 'mpgarciaregistrar@gmail.com', 'eid-00311-tg-0', '$2y$10$PDiqgFpYXqX7OPUvvC2fWePVd4/GipLuQxyDw1k9faddu8yKGInpm', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(251, 3, 'crisologo', 'lapitan ', 'choilapitan47@gmail.com', '2018-00315-tg-0', '$2y$10$3ykZqkHEgcgoUzo0iPHot.WWuRd22GjFosFwV1nftukw3QFgZyu2O', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(250, 3, 'jerome ', 'jalandoon', 'jerome.jalandoon@gmail.com', '2018-00293-tg-0', '$2y$10$uSGcnwxnbrvyxYLk7.0uFOWe9xNGrxtFOnSdZxxYAqDREbEztElaW', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(249, 3, ' aaron ', 'cunanan', 'aarontuu@yahoo.com', '2019-00408-tg-o', '$2y$10$p9rCoSKbg1/Z6ye9JWCEsuQviDUTtR9cnZpdBcfysdvByOrhiEXdW', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(248, 3, ' john vincent ', 'de castro', 'gstcdecastronecniv@gmail.com', '2020-00228-tg-0', '$2y$10$i5.vb6MMEIc5h.7lYGbd6OxWsTPk5J3vzwQy3hdbmoijDBDwqehCW', 'a', '2021-10-09 01:22:14', '2021-10-09 01:22:14', '0000-00-00 00:00:00'),
(247, 3, 'ivan daniel', 'balona ', 'ivandanielg1124@gmail.com', '2018-00524-tg-0', '$2y$10$162J7B9m4xh312GGYoCpl.WOXb7godzofjvdd/gkUqGaXtFUdMb8u', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(246, 3, 'raymond', 'gabito', 'gabitoraymond358@gmail.com', '2018-00322-tg-0', '$2y$10$VJEIG2c.TiiwwC/4uM9.0eQFsRB9Z9d7sYHpID90ETZb2WEhsu8e2', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(245, 3, 'froilan', 'fernandez', 'froilanfernandez08@gmail.com', '2018-00379-tg-0', '$2y$10$IYU9n6rlFV10jCMK5K.kD.vwWFX3v2ZFr3Zmybuo.TXuYFvTD.8ZS', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(244, 3, 'althea ', 'dabu', 'dabu.althea@gmail.com', '2020-00268-tg-0', '$2y$10$KPFUjqHP16lm4knVitJuHOmkC5lBu03O7MjvYMKQ4UMKVC/kI/.zm', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(243, 3, 'joshua gabrielle ', 'concepcion', 'joshuaconcepcion12.jc@gmail.com', '2019-00405-tg-o', '$2y$10$ZSq16UHRNbTi/PxX6gDdRuRQ3yYCZzQK.wbEU0yXf03EdsSx9X3P.', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(242, 3, 'erjohn', 'espuerta', 'erjohn13@gmail.com', '2018-00353-tg-0', '$2y$10$FcsQiT5GJSu.Xz3Qta7Luu3upW3SSzXz.LINf/I36HUKwKod3Bn5W', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(241, 3, 'frances anne ', 'cruz', 'frncsanncruz@gmail.com', '2020-00247-tg-0', '$2y$10$3BsKNmeE.B4zbOIYPzQKKuvvAup2irt7/mEoJLhbWcBUseg8.BwhO', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(240, 3, 'leila ', 'borromeo', 'leilaborromeo96@gmail.com', '2020-00452-tg-0', '$2y$10$NJNihLyVD4PzbMkbMj7KX.fxBko/JOkyA4WHyROcgUMKRzH6Fad0e', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(239, 3, 'jaysean ', 'caube', 'jaysencaube@gmail.com', '2019-00389-tg-o', '$2y$10$ny17FoLAqLngdDzwhnaiZ.7m5.mMQoe8V58gVn.UzSKsdVwP3TKrS', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(238, 3, 'edmon ', 'dela cruz ', 'rhingmakz21@gmail.com', 'dela cruz, edmon madronio', '$2y$10$uJzcjY/ZnFsRIVawIR8I.OBTb3WbFIZ.eXQjA/osh1xJfzx9teRFG', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(237, 3, 'john russel', 'dacanay', 'johnrusseldacanay@gmail.com', '2018-00361-tg-0', '$2y$10$Nq6td8pyaxCG2NqhoCwriuMk94e8NN56nl7O0VL26Jb2vVz2s/03a', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(236, 3, ' bryle', 'castillon', 'brylecourdey@gmail.com', '2019-00498-tg-o', '$2y$10$fuxg.eN9Kl7qf9c0RcQPTOi5KUTnzksg2a92QtzYQYD3jS1BAWlCq', 'a', '2021-10-09 01:22:13', '2021-10-09 01:22:13', '0000-00-00 00:00:00'),
(235, 3, 'isabella elaine', 'biaco', 'itisabellaelaine@gmail.com', '2020-00358-tg-0', '$2y$10$eeWXep1DYfSUmDYJLaSJyeg.zZqpmO33Tu/Mc9rYXEgEUDD15cZYe', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(234, 3, 'anjanette ', 'castillo', 'castillo15@gmail.com', '2019-00409-tg-o', '$2y$10$9ZhBoJEPl5WBEbltZ6xpoOzRvA.gbSC33PyoaeYbCeUrNSvT.nJie', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(233, 3, 'ken zedric', 'cortes ', 'kzcortes27@gmail.com', '2018-00342-tg-0', '$2y$10$uzfHQoUyb9jg/c80pzF.ZuNmrYcFBNpZvGSNp.Akoeo1PQjheecyC', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(232, 3, 'gerald kevin', 'aurora', 'kevstixxay@gmail.com', '2018-00520-tg-0', '$2y$10$rkhM9RzVZwxKwJSKlHOcSukEjRIBifosvf.yx3vW81Zh/8dtJT2ie', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(231, 3, 'gillian ', 'carballo', 'gillian.carballo0319@gmail.com', '2019-00393-tg-o', '$2y$10$UyWc/GdCivd/WMNAmkHx5u5Rpm6RntGHHaqFtBv8hOfkseiXVNLc6', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(230, 3, 'jana enigma ', 'baruc', 'jaebaruc@gmail.com', '2020-00224-tg-0', '$2y$10$A3xRP5pfNZESdPeg7DRo/e4iWWoxzFqGPKcJmyiGL1LdcOw4of6x6', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(229, 3, 'roe bien', 'arnaiz ', 'roebienbien@gmail.com', '2018-00628-tg-0', '$2y$10$5c7gRfaNVe0oXhPP3wJ2neEZR/lrixvZG3z/xhCdQ0McGVUne1VpS', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(228, 3, 'francis manuel ', 'caragdag', 'franciscaragdag@gmail.com', '2019-00410-tg-o', '$2y$10$ApIwukWJt6go00K.iKHhTeJaG473Wnk/IJlmmlWRTexM/z.77EdmC', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(227, 3, 'christian allen', 'baquir', 'riuqab@gmail.com', '2020-00299-tg-0', '$2y$10$9JJLkKgUhyiLU2436enWHuICGyWmGEFZE5flb24ev7tPKZjT9TLpi', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(226, 3, 'christji myr ', 'bado', 'christjimybado@gmail.com', '2020-00309-tg-0', '$2y$10$1TVsJGpBD09Jf7aQ.PEAFOyrXFtXm1E3XNCf5uWOuXDB.eNBaQYd2', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(225, 3, 'jonathan', 'amoranto', 'jonathanamoranto878@gmail.com', '2020-00349-tg-0', '$2y$10$q/VAoPfDcBoj7msJtcY.XecGQ7KxBa97LimCXUj1R8KFLe7kEvLcW', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(224, 3, 'julius carlo ', 'cabaces', 'juliuscarlo.cabeces@gmail.com', '2019-00524-tg-o', '$2y$10$bSBC62nmohDa3tZ7e4jC0.4M.NZWAIpjhq0DisNVhUSkjUd2Jy1vi', 'a', '2021-10-09 01:22:12', '2021-10-09 01:22:12', '0000-00-00 00:00:00'),
(223, 3, 'quiel jeremiah', 'cariaso', 'quieljeremiahcariaso04@gmail.com', '2018-00220-tg-0', '$2y$10$6gGrTb8TgVK9RdypMdblbe/wbWDbUjMcIL0clCV194mJsFmrP249S', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(222, 3, 'mary cielo ', 'aguilar', 'lhuvaciel08@gmailc.com', '2020-00137-tg-0', '$2y$10$5u/BdZsY3iYaT0AtwAJXIuO2j/2lQ1NVYTZD4nsaJYOqNuQgKnTxe', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(221, 3, 'jhon ni??o ', 'bustamante', 'jhonbustamante011501@gmail.com', '2019-00481-tg-o', '$2y$10$srqJKMDx3Oo3WJcjhflyz.k8G47Cn3DPlFz2APmlqRNrBKdSvPOZm', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(220, 3, 'andrea', 'abella', 'abella.andrea0514@gmail.com', '2020-00440-tg-0', '$2y$10$G2EA7IE54EklWnWnKXu16OZcPkpFF0YmsL05g..tGOvdTMEWiDQui', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(219, 3, 'wency diane ', 'basada', 'basadawwencydaine03@gmail.com', '2019-00490-tg-o', '$2y$10$6W6ZrgjUTjfpvWiD0R4nCe4mg2y.YQbCjTE5WJngkc67aY3AbPEmG', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(218, 3, 'lester glenn', 'apurada ', 'lesterapurada@gmail.com', '2018-00169-tg-0', '$2y$10$hiqvTErYBR5Hlx8VP2PJkOFe4ZbeUHhpnaNAw6n/5sBGrD529KYh.', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(314, 4, 'gina', 'dela cruz ', 'ginadelacruz@gmail.com', 'eid-00323-tg-0', '$2y$10$EtxyeeW7CO87vU9vDkztFO6mbCMLlNzrtQg0ngVLF9jhIfxWrAIZm', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(313, 4, 'almir ', 'almira??ez', 'almir.almiranez@gmail.com', 'eid-00326-tg-0', '$2y$10$7xOtgW1A2tt4jS2wSUILTuOI3A7FksNpMyMaPto6gVK.tXBf2IZ5y', 'd', '2021-10-09 01:30:15', '2021-10-09 01:30:33', '2021-10-09 01:30:33'),
(312, 4, 'maliksi', 'liwanag', 'maliksi.liwanag@gmail.com', 'eid-00315-tg-0', '$2y$10$PE4xqnHFmeviY/tE1rcWr.1YOiA3jy0eHp2JKmIiz3N5x3LQfFNwS', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(311, 4, 'michael', 'zarco', 'zarco.michael@gmail.com', 'eid-00318-tg-0', '$2y$10$aox.04BZ9LpVncZqJ8oH3u3MLHlEWSwCwi0cOiX/IenKH7YdYuHJW', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(217, 3, 'joshua', 'capalaran', 'joshuacapalaran27@gmail.com', '2018-00256-tg-0', '$2y$10$gfJVmIojdbZBmz/gjAzR5ukm/VPsuPmxk/meMzqz0esaH7GWOz1QK', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(216, 3, ' ivan rae', 'baribar', 'ivanraeb01@gmail.com', '2019-00388-tg-o', '$2y$10$7frLUpg6w.xZfevH9RnfU.EsS7g3dQzM2ZOdjYXWZMARk5SbGeW/e', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(215, 3, 'ivan christopher', 'an', 'ivanchristopheran@gmail.com', '2018-00217-tg-0', '$2y$10$JOWXcpQ2MILPVEYE1ymLDOaE02f76OnCfjGPm8jL7zE6XkoEzgZ9O', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(214, 3, 'april ', 'azagra', 'eprelazagara@gmail.com', '2019-00527-tg-o', '$2y$10$0vTAXjiQDvgDVK8FhhJSx.vBbYSpPCp5V1T5oqXpheq9OD.Gxk42S', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(213, 3, 'charmie', 'cabanela', 'cabanelacharmie@gmail.com', '2018-00343-tg-0', '$2y$10$GRfMldSAk17a0G5pclYRsOy8rCCBKww/QqnQ45.xtGQddOdhKxAIO', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(212, 3, ' irenic danae ', 'atun', 'irenicdanaeatun@gmail.com', '2019-00531-tg-o', '$2y$10$Ahrn1ffDiL.OB6SEPPc0CemlC2zy5EJM8WcluLWrKVsHrr0QAIFya', 'a', '2021-10-09 01:22:11', '2021-10-09 01:22:11', '0000-00-00 00:00:00'),
(211, 3, 'sheila mae ', 'yacub', 'sheilamaeyacub1002@gmail.com', '2020-00199-tg-0', '$2y$10$b2yMcCUo54QKls.JhZVPHul/UgCvE3c7AaSNAujSUB816DuGFXUU.', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(210, 3, ' airon ', 'villaruel', 'aironvillaruel123@gmail.com', '2020-00205-tg-0', '$2y$10$NOkqcbyGdK7W/2lm53W5U.9PEOuYsFdJ/a6XqEK6eDh7FuujGYCS6', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(209, 3, 'christopher ', 'ultra', 'arn.christoper10@gmail.com', '2020-00195-tg-0', '$2y$10$.Fnlmu1uQOnv1jnTh83VfuquhOdr7HPBGEzTpwlOlDnpKkdjAjScy', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(208, 3, 'lailynette', 'burton', 'llynttburton08@gmail.com', '2018-00484-tg-0', '$2y$10$dWhCINBPzCu8HR.ggmo/C.lqh6ObFmdJDY5eE1cBgyWpL4Jf3saQ.', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(207, 6, 'juan carlos', 'amaguin', 'Puptcs.jtlsescar@gmail.com', '2018-00167-tg-0', '$2y$10$NlsMFeqrQIWz0iDO7yG2l.7pVokchmXIJXdJU6PMWO/w1u6u6dePq', 'a', '2021-10-09 01:22:10', '2022-07-13 14:00:10', '0000-00-00 00:00:00'),
(206, 3, 'christian phillip ', 'alvaro', 'ian.alvaro16@gmail.com', '2019-00488-tg-o', '$2y$10$ULV4iWNTdiAPl8I4ZxPIquH4yLfygXtemwKkjIQdQmMQBnj.RbimS', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(205, 3, 'reign pier', 'ticar', 'reignticar02@gmail.com', '2020-00455-tg-0', '$2y$10$ObqmSMeQNqKOk/pZ0jjq3e/.XaGoviPPZwBDzZ6OSTLhjxEuhVl4.', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(204, 3, 'christian elvin', 'bangga', 'ecbangga@gmail.com', '2018-00525-tg-0', '$2y$10$Kev1qaAXWIFJxY5jmtNgR.SENqld6YvlGKirmhlWKsGW58KpY0dNy', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(203, 3, 'mark joshua ', 'allado', 'worldchanger4117@gmail.com', '2019-00519-tg-o', '$2y$10$yHWLwvERQt8lw9PZMp9/P.cXSEyeBAzDrPEPGb9.KdPoUM2jv1NEi', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(202, 3, 'rysha laine', 'taganas', 'taganasryshalaine@gmail.com', '2020-00161-tg-0', '$2y$10$C9H5sbWKlALt98hF7rGycOjIETpvSctcU.uVTjP.Dk0VAi8LR1jLK', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(201, 3, 'ed mhar', 'apura', 'mhar.apura@gmail.com', '2018-00231-tg-0', '$2y$10$7IjxBcG9sx7CgHEq1KMO5elMS.fihl31ZcUSrHFhJkxDbKfDUq/di', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(200, 3, 'janise hop ', 'sandigan', 'janisesandigan@gmail.com', '2020-00037-tg-0', '$2y$10$7.LVpLFAFuEeYPXsirR0NujkeVkr9B1QHtv2DemARWFiKK/1Tdvq2', 'a', '2021-10-09 01:22:10', '2021-10-09 01:22:10', '0000-00-00 00:00:00'),
(199, 3, 'francheska nicole', 'alcid', 'nicoleskiie@gmail.com', '2019-00493-tg-o', '$2y$10$6yFlMJrzVOiEwQdvVx3lf.XZnhOGiTTWvAhKjcBQFniqmZU8c83wO', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(198, 3, 'daisylene suzy', 'ross', 'zyzyross4@gmail.com', '2020-00053-tg-0', '$2y$10$qVITaujlkmDUSUy4mUEs1O9rjnTJJswawTiQ8wCumY63PRZ39OBUy', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(197, 3, 'michelle via ', 'rediga', 'michellerediga@gmail.com', '2020-00187-tg-0', '$2y$10$WAVMbjR4VrOnOS9lszwy8eeDWj4NbMq1TO.ZCmCSOd2QJUaaQv8G6', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(196, 3, 'john steven ', 'penecitos', 'steven.penecitos123@gmail.com', '2020-00201-tg-0', '$2y$10$3U5AmLkV1IsZ2kxl2NDBSeDLh1jIJ.VXrDzbN9tivQo433hf/.A/m', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(195, 3, 'kyle hebryl', 'evangelista', 'evangelistakyle18@gmail.com', '2020-00179-tg-0', '$2y$10$wioU/Jum9p6e0uvWX2hcOuUZKIRH0KikSxC2Qy/AtNFAu5QPtau2q', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(194, 3, 'theresa mariane ', 'espejo', 'theresamariane@gmail.com', '2020-00173-tg-0', '$2y$10$4UCveL471MfrDXDmvcJsxec3hYaLLxobZEcOu7tmtreJ/5HLbwsYS', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(193, 3, 'arvine justine ', 'dimaano', 'arvinejustine2102@gmail.com', '2020-00039-tg-0', '$2y$10$s8YXNIU2jQRwVqqcFbSEbumsh9pXmacO6NdmyTP4S1/X/zT45R4AK', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(192, 3, 'fabien ', 'de leon', 'fabiendeleon@gmail.com', '2020-00207-tg-0', '$2y$10$QfjcsljqNtrfi3T4h6BiJe0cOKctXcmWxcrLxdRkzLnz1N9/N9mkO', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(310, 4, 'gecilie', 'almira??ez', 'almiranez.gecilie@gmail.com', 'eid-00316-tg-0', '$2y$10$j9YNW/x6dbGROMei09S9z.SQcF1b/JBLKm/q2rX4h5S/YYOkWhK2K', 'd', '2021-10-09 01:30:15', '2021-10-10 09:03:11', '2021-10-10 09:03:11'),
(191, 3, 'er jane ', 'cabahug', 'erjanecabahug0411@gmail.com', '2020-00191-tg -0', '$2y$10$DL1Uv63DnX6RVwRxdZ6o/.84nlz5jDMMskUa0YWghMdj3yBfloyz.', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(190, 3, 'mary jane fhel', 'bobadilla', 'mjfbobadilla02@gmail.com', '2020-00189-tg-0', '$2y$10$ZLAz1WzIkEPfN8OCLpuJ3.RXM7MXOHifvSVWs34/27P4tgLKxwDo.', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(189, 3, 'anna patricia', 'aquino', 'annapatriciaaquino01@gmail.com', '2020-00457-tg-0', '$2y$10$Kczmvr/OjLI5F2syTf0xN.rhWWeLVQ1F8W90WZdsp76/5HKAL.onK', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(188, 3, 'bryant paul ', 'babac, bryant paul s.', 'bryantpaulbabac@gmail.com', '2020-00197-tg-0', '$2y$10$yTQ2A7hqDrgLdNIrZh.6C.v3m0OCgOkKdWgiAKadn7mopfR1.cddi', 'a', '2021-10-09 01:22:09', '2021-10-09 01:22:09', '0000-00-00 00:00:00'),
(187, 8, 'john timothy', 'sescar ', 'tmbrccl@gmail.com', '2018-00313-tg-0', '$2y$10$GLjscg74wOgmEwC4nf.m8OZZaJ9yUglPa9CFiyTthCWJ4ou9NOGd.', 'a', '2021-10-09 01:22:08', '2022-07-13 14:26:55', '0000-00-00 00:00:00'),
(186, 3, 'bernadette', 'tradio', 'bernatrads4@gmail.com', '2018-00304-tg-0', '$2y$10$/xJYMTjQ1kBfdIx0d9oZ/OrTZaRRSOiyOGHkUIzMa9uzP.zBqNOsm', 'a', '2021-10-09 01:22:08', '2021-10-09 01:22:08', '0000-00-00 00:00:00'),
(309, 4, 'marissa', 'ferrer ', 'marissaferrer@gmail.com', 'eid-00313-tg-0', '$2y$10$fnS1qo1sXR3wrRWBDVF3tuGmVdULK.j0.g/kjzBC34GWUAt/mX4oe', 'a', '2021-10-09 01:30:15', '2021-10-09 01:30:15', '0000-00-00 00:00:00'),
(308, 4, 'yolanda', 'rabe', 'yolandarabe@gmail.com', 'eid-00312-tg-0', '$2y$10$kpECJGeY8L1d.VnwFqIqbe8t9yEZVBvnwdi9Bpf8NGeSF5yAFYT5O', 'd', '2021-10-09 01:30:15', '2022-07-02 22:54:59', '2022-07-02 22:54:59'),
(300, 3, 'frederick', 'papa', 'frederickaniscal@gmail.com', '2020-00311-tg-0', '$2y$10$Ul936NqoQj0tXvoWPGEV8uINeeknhffbmKu13kYHsmoXJrwIfSVjq', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(301, 3, 'gurgen mille', 'aguimbag ', 'gurgenmille.aguimbag@gmail.com', '2019-00110-tg-0', '$2y$10$C6kzgfw9jh1cYv64ezVFjeXdei1l1XgROqLE3CpG4IH955waDiJF2', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(302, 3, 'coleen', 'perez ', 'perezcoleendalit@gmail.com', '2020-00246-tg-0', '$2y$10$vzIgO775dnXCVvxREUKvbep.r0KpyiJ08JBmR3uuPsIIOBxQN4OV6', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(303, 3, 'allen kobe', 'agustin', 'allenkobe.agustin@gmail.com', '2019-00430-tg-0', '$2y$10$ZpX0tj0oui6JUS846oLsfehaX3YJHTmizD3yNbxwuj6qVYb9z8bQ2', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(304, 3, 'phil deiter', 'atun', 'atunphil@gmail.com', '2019-00237-tg-0', '$2y$10$9P7MkQsAWJqmNT38SN6YSuas8S/wS6A299cx/eXWUL9aLm.FNMQz2', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(305, 3, 'russel', 'claveria', 'claveria.russel@gmail.com', '2018-00075-tg-0', '$2y$10$NYTM8NPdcXpOdkKxrEQZH.TwVcCA5q1sSGbNaHVJBpRgSSEljeI2i', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(306, 3, 'ma. fidelyn', 'palus', 'palusmafidelyn@gmail.com', '2020-00217-tg-0', '$2y$10$n9M.Msy856Ofrk9fNhJfqeexoagnhsMgUip8mQ1p1TzJV195E7zJa', 'a', '2021-10-09 01:22:18', '2021-10-09 01:22:18', '0000-00-00 00:00:00'),
(330, 4, 'almir ', 'almira??ez', 'almir.almiranez@gmail.com', 'eid-00326-tg-0', '$2y$10$KKxfp64FjavW75.fOLU5xulDFSNtXhWD9tjwvTX7cthc5wKg.sFBK', 'a', '2021-10-09 13:21:49', '2021-10-09 13:21:49', '0000-00-00 00:00:00'),
(331, 4, 'orlando ', 'lingo', 'lingoorlando@gamil.com', 'eid-00327-tg-0', '$2y$10$w8.WO4i8x0VjvE146Tpdgu/JfNd99YSjD2DVk7LQ4dCMFl3OvaQO2', 'a', '2021-10-09 13:21:49', '2021-10-09 13:21:49', '0000-00-00 00:00:00'),
(332, 2, 'sample', 'sample', 'sample@gmail.com', 'sample@gmail.com', '$2y$10$Kv.nm2Uix4c.ipDqjmQIVug40AkAoRdKMEVhXCq6zrkZvWolNv7j.', 'd', '2021-10-09 14:57:03', '2021-10-09 14:57:26', '2021-10-09 14:57:26'),
(333, 7, 'sample', 'sample', 'puptcs.jtlsescar@gmail.com', 'sample1@gmail.com', '$2y$10$f.D7Tri6HQC6y40j3WxPvO81RLV1ZnimvzY/LYG8UPO8M9Hzr0TfS', 'a', '2021-10-09 15:03:46', '2022-07-03 14:40:54', '0000-00-00 00:00:00'),
(334, 2, 'samplesample', 'samplesample', 'samplesample@gmail.com', 'samplesample@gmail.com', '$2y$10$8NoBNI.2h0I3lQiA03Ss1eMsX1W13H.mhIyjN2q28uvZTOhnCtkFC', 'a', '2021-10-09 15:09:19', '2021-10-09 15:09:19', '0000-00-00 00:00:00'),
(337, 8, 'bernadette', 'canlas', 'sample@gmail.com', 'eid-00328-tg-0', '$2y$10$Q0iQYJ.VH61rxw1/4gvUs.Rx.vuFhXykZC9FxHIyyhaxD09YS5ZIS', 'a', '2022-07-13 14:13:38', '2022-07-13 14:25:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `frbs_year_levels`
--

CREATE TABLE `frbs_year_levels` (
  `id` bigint(20) NOT NULL,
  `year` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `status` varchar(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL,
  `deleted_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `frbs_year_levels`
--

INSERT INTO `frbs_year_levels` (`id`, `year`, `description`, `status`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '1st year', '1st year', 'a', '2021-05-13 09:11:04', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, '2nd year', '2nd year', 'a', '2021-05-13 09:11:15', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, '3rd year', '3rd year', 'a', '2021-05-13 09:11:27', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(4, '4th year', '4th year', 'a', '2021-05-13 09:11:41', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(5, '5th year', '5th year', 'a', '2021-05-13 09:11:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(6, 'Freshmans', 'first year', 'd', '2021-06-22 08:13:16', '2021-06-22 09:05:25', '2021-06-22 09:05:25'),
(7, '6th year', '6th year', 'd', '2021-10-10 10:04:38', '2021-10-10 10:04:45', '2021-10-10 10:04:45');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `frbs_borrowed_equipments`
--
ALTER TABLE `frbs_borrowed_equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_courses`
--
ALTER TABLE `frbs_courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_equipments`
--
ALTER TABLE `frbs_equipments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_equipment_conditions`
--
ALTER TABLE `frbs_equipment_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_equipment_status`
--
ALTER TABLE `frbs_equipment_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_event_types`
--
ALTER TABLE `frbs_event_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_extension_names`
--
ALTER TABLE `frbs_extension_names`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_facilities`
--
ALTER TABLE `frbs_facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_facility_maintenances`
--
ALTER TABLE `frbs_facility_maintenances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_facility_status`
--
ALTER TABLE `frbs_facility_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_faculties`
--
ALTER TABLE `frbs_faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_faculty_departments`
--
ALTER TABLE `frbs_faculty_departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_faculty_positions`
--
ALTER TABLE `frbs_faculty_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_logs`
--
ALTER TABLE `frbs_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_modules`
--
ALTER TABLE `frbs_modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_organizations`
--
ALTER TABLE `frbs_organizations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_organization_officers`
--
ALTER TABLE `frbs_organization_officers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_organization_positions`
--
ALTER TABLE `frbs_organization_positions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_organization_types`
--
ALTER TABLE `frbs_organization_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_permissions`
--
ALTER TABLE `frbs_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_permission_types`
--
ALTER TABLE `frbs_permission_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_reservations`
--
ALTER TABLE `frbs_reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_reservation_remarks`
--
ALTER TABLE `frbs_reservation_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_reservation_status`
--
ALTER TABLE `frbs_reservation_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_roles`
--
ALTER TABLE `frbs_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_roles_permissions`
--
ALTER TABLE `frbs_roles_permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_students`
--
ALTER TABLE `frbs_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_users`
--
ALTER TABLE `frbs_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frbs_year_levels`
--
ALTER TABLE `frbs_year_levels`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `frbs_borrowed_equipments`
--
ALTER TABLE `frbs_borrowed_equipments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=411;

--
-- AUTO_INCREMENT for table `frbs_courses`
--
ALTER TABLE `frbs_courses`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `frbs_equipments`
--
ALTER TABLE `frbs_equipments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `frbs_equipment_conditions`
--
ALTER TABLE `frbs_equipment_conditions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `frbs_equipment_status`
--
ALTER TABLE `frbs_equipment_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `frbs_event_types`
--
ALTER TABLE `frbs_event_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `frbs_extension_names`
--
ALTER TABLE `frbs_extension_names`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `frbs_facilities`
--
ALTER TABLE `frbs_facilities`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `frbs_facility_maintenances`
--
ALTER TABLE `frbs_facility_maintenances`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `frbs_facility_status`
--
ALTER TABLE `frbs_facility_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `frbs_faculties`
--
ALTER TABLE `frbs_faculties`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `frbs_faculty_departments`
--
ALTER TABLE `frbs_faculty_departments`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `frbs_faculty_positions`
--
ALTER TABLE `frbs_faculty_positions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `frbs_logs`
--
ALTER TABLE `frbs_logs`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1110;

--
-- AUTO_INCREMENT for table `frbs_modules`
--
ALTER TABLE `frbs_modules`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `frbs_organizations`
--
ALTER TABLE `frbs_organizations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `frbs_organization_officers`
--
ALTER TABLE `frbs_organization_officers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `frbs_organization_positions`
--
ALTER TABLE `frbs_organization_positions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `frbs_organization_types`
--
ALTER TABLE `frbs_organization_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `frbs_permissions`
--
ALTER TABLE `frbs_permissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `frbs_permission_types`
--
ALTER TABLE `frbs_permission_types`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `frbs_reservations`
--
ALTER TABLE `frbs_reservations`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;

--
-- AUTO_INCREMENT for table `frbs_reservation_remarks`
--
ALTER TABLE `frbs_reservation_remarks`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `frbs_reservation_status`
--
ALTER TABLE `frbs_reservation_status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `frbs_roles`
--
ALTER TABLE `frbs_roles`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `frbs_roles_permissions`
--
ALTER TABLE `frbs_roles_permissions`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=551;

--
-- AUTO_INCREMENT for table `frbs_students`
--
ALTER TABLE `frbs_students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=266;

--
-- AUTO_INCREMENT for table `frbs_users`
--
ALTER TABLE `frbs_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=338;

--
-- AUTO_INCREMENT for table `frbs_year_levels`
--
ALTER TABLE `frbs_year_levels`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
