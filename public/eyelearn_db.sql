-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2016 at 05:26 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `eyelearn_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE `audio` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `filename`, `folder`) VALUES
(1, 'A.mp3', 'Mga Patinig'),
(2, 'E.mp3', 'Mga Patinig'),
(3, 'I.mp3', 'Mga Patinig'),
(4, 'O.mp3', 'Mga Patinig'),
(5, 'U.mp3', 'Mga Patinig'),
(10, '2.mp3', 'Alamat ng Pinya'),
(11, '3.mp3', 'Alamat ng Pinya'),
(12, '4.mp3', 'Alamat ng Pinya'),
(13, '5.mp3', 'Alamat ng Pinya'),
(14, 'E.mp3', 'Ang Mga Patinig'),
(15, 'A.mp3', 'Ang Mga Patinig'),
(16, 'I.mp3', 'Ang Mga Patinig'),
(17, 'O.mp3', 'Ang Mga Patinig'),
(18, 'U.mp3', 'Ang Mga Patinig'),
(20, 'aso.mp3', 'Ang titik A'),
(21, 'baboy.mp3', 'Ang titik A'),
(22, 'baka.mp3', 'Ang titik A'),
(23, 'butiki.mp3', 'Ang titik A'),
(24, 'ilong.mp3', 'Ang titik A'),
(25, '3.mp3', 'ds'),
(26, '2.mp3', 'ds'),
(27, '5.mp3', 'ds'),
(28, '4.mp3', 'ds'),
(29, 'A.mp3', 'ds'),
(30, 'A.mp3', 'Aralin tatlo'),
(31, 'E.mp3', 'Aralin tatlo'),
(32, 'O.mp3', 'Aralin tatlo'),
(33, 'I.mp3', 'Aralin tatlo'),
(34, 'U.mp3', 'Aralin tatlo'),
(35, '33.mp3', 'patinig'),
(36, '22.mp3', 'patinig'),
(37, '44.mp3', 'patinig'),
(38, '55.mp3', 'patinig'),
(39, '66.mp3', 'patinig'),
(40, 'I.mp3', 'ryan'),
(41, 'E.mp3', 'ryan'),
(42, 'O.mp3', 'ryan'),
(43, 'BO.mp3', 'Testing to'),
(44, 'BU.mp3', 'Testing to'),
(45, 'DE.mp3', 'Testing to'),
(46, 'DA.mp3', 'Testing to'),
(47, 'DI.mp3', 'Testing to'),
(48, 'DO.mp3', 'Testing to'),
(49, 'DU.mp3', 'Testing to'),
(50, 'E.mp3', 'Testing to');

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE `choice` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `choice`
--

INSERT INTO `choice` (`id`, `question_id`, `name`, `is_correct`, `active`, `last_update`) VALUES
(1, 1, 'a. a', 1, 1, '2016-02-23 17:31:15'),
(2, 1, 'b. b', 0, 1, '0000-00-00 00:00:00'),
(3, 1, 'o. o', 0, 1, '0000-00-00 00:00:00'),
(4, 2, 'a. o', 0, 1, '2016-02-23 17:34:39'),
(5, 2, 'b. a', 1, 1, '2016-02-23 17:34:45'),
(6, 2, 'c. e', 0, 1, '0000-00-00 00:00:00'),
(7, 3, 'a. a', 0, 1, '0000-00-00 00:00:00'),
(8, 3, 'b. e', 0, 1, '2016-02-23 17:32:37'),
(9, 3, 'c. b', 1, 1, '2016-02-23 17:35:04'),
(10, 4, 'a. k', 0, 1, '0000-00-00 00:00:00'),
(11, 4, 'b. u', 0, 1, '0000-00-00 00:00:00'),
(12, 4, 'c. b', 1, 1, '0000-00-00 00:00:00'),
(13, 5, 'a. b', 0, 1, '0000-00-00 00:00:00'),
(14, 5, 'b. i', 0, 1, '0000-00-00 00:00:00'),
(15, 5, 'c. t', 1, 1, '2016-02-23 17:33:54'),
(16, 6, 'a. t', 0, 1, '0000-00-00 00:00:00'),
(17, 6, 'b. o', 1, 1, '2016-02-23 17:34:20'),
(18, 6, 'c. k', 0, 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `audio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `user_id`, `name`, `description`, `active`, `last_update`, `audio`) VALUES
(3, 2, 'Ang Mga Patinig', '', 1, '0000-00-00 00:00:00', ''),
(4, 2, 'Ang titik A', 'A', 1, '0000-00-00 00:00:00', ''),
(6, 2, 'Aralin tatlo', '', 1, '0000-00-00 00:00:00', ''),
(9, 2, 'Quiz 1', '', 1, '2016-09-06 04:52:35', ''),
(10, 2, 'patinig', '', 1, '2016-09-07 08:51:32', ''),
(11, 2, 'ryan', '', 1, '2016-09-09 08:38:53', ''),
(12, 2, 'Testing to', '', 1, '2016-09-13 15:54:32', '');

-- --------------------------------------------------------

--
-- Table structure for table `lesson_dtl`
--

CREATE TABLE `lesson_dtl` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `seconds` int(3) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `audio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_dtl`
--

INSERT INTO `lesson_dtl` (`id`, `lesson_id`, `filename`, `seconds`, `last_update`, `audio_id`) VALUES
(11, 13, 'a.png', 2, '2016-08-22 05:37:20', 1),
(13, 13, 'e.png', 2, '2016-08-22 07:45:55', 2),
(14, 13, 'i.png', 2, '2016-08-22 05:42:03', 3),
(15, 13, 'o.png', 2, '2016-08-22 05:42:16', 4),
(16, 13, 'u.png', 2, '2016-08-22 05:42:25', 5),
(17, 17, '1.png', 4, '2016-08-26 14:12:14', 0),
(18, 17, '2.png', 2, '2016-08-26 14:13:30', 0),
(19, 17, '3.png', 4, '2016-08-26 14:13:39', 0),
(20, 17, '4.png', 1, '2016-08-26 14:13:48', 0),
(21, 17, '5.png', 2, '2016-08-26 14:13:59', 0),
(22, 3, 'a(2).png', 2, '2016-09-05 22:28:02', 1),
(23, 3, 'e.png', 2, '2016-09-05 22:28:09', 2),
(24, 3, 'i.png', 2, '2016-09-01 18:25:58', 3),
(25, 3, 'o.png', 2, '2016-09-01 18:25:43', 4),
(26, 3, 'u.png', 2, '2016-09-01 18:25:32', 18),
(28, 4, '3.png', 2, '2016-09-01 21:40:15', 20),
(29, 4, '10547671_814974965192819_4372190642617792283_n.jpg', 2, '2016-09-01 21:41:17', 21),
(30, 4, '10559711_814974551859527_6101120209606421938_n.jpg', 2, '2016-09-01 21:42:01', 22),
(31, 4, '10561781_814974508526198_7073469486283670844_n.jpg', 2, '2016-09-01 21:42:11', 23),
(32, 4, '10505337_814974725192843_8292935193044712344_n.jpg', 2, '2016-09-01 21:41:46', 24),
(33, 5, 'ha.png', 2, '2016-09-05 09:53:15', 25),
(34, 5, 'ka.png', 2, '2016-09-05 09:53:26', 26),
(35, 5, 'ma.png', 2, '2016-09-05 09:53:36', 27),
(36, 5, 'na.png', 2, '2016-09-05 09:53:47', 28),
(37, 5, 'nga.png', 2, '2016-09-05 09:53:58', 29),
(38, 6, 'da.png', 2, '2016-09-05 09:56:20', 30),
(39, 6, 'pa.png', 0, '2016-09-05 09:56:46', 30),
(40, 6, 'wa.png', 0, '2016-09-05 09:57:05', 30),
(41, 6, 'ta.png', 2, '2016-09-05 09:57:17', 33),
(42, 6, 'ya.png', 2, '2016-09-05 09:57:29', 34),
(43, 3, '10593230_814974838526165_4102144375927037405_n.jpg', 2, '2016-09-05 22:24:57', 14),
(44, 3, '10593070_814974751859507_9118754705244324839_n.jpg', 2, '2016-09-05 22:25:09', 16),
(45, 3, '10521698_814974595192856_8006211341600751288_n.jpg', 2, '2016-09-05 22:25:18', 14),
(46, 10, '2.png', 3, '2016-09-07 00:53:54', 35),
(47, 10, '4.png', 3, '2016-09-07 00:54:29', 36),
(48, 10, '5.png', 3, '2016-09-07 00:54:39', 37),
(49, 10, '1.png', 3, '2016-09-07 00:55:01', 39),
(50, 11, '14182430_1213660812006678_706978079_n.jpg', 3, '2016-09-09 01:05:09', 40),
(51, 11, 'pagsusulit.jpg', 3, '2016-09-09 01:05:23', 41),
(52, 11, '10511495_750112411694856_5210835405411234904_o.jpg', 3, '2016-09-09 01:05:36', 42),
(53, 3, 'DSCF4341.JPG', 2, '2016-09-13 07:31:10', 15),
(54, 12, 'mali ko 2.png', 2, '2016-09-13 07:55:59', 43),
(55, 12, 'mali ko.png', 2, '2016-09-13 07:56:09', 44),
(56, 12, 'student account delete folder.png', 2, '2016-09-13 07:56:21', 45),
(57, 12, 'tagal ng output naghahang.png', 2, '2016-09-13 07:56:37', 47),
(58, 12, 'teacher.jpg', 2, '2016-09-13 07:56:49', 48);

-- --------------------------------------------------------

--
-- Table structure for table `parents`
--

CREATE TABLE `parents` (
  `id` int(11) NOT NULL,
  `parent_token` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `description` varchar(225) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `lesson_id`, `description`, `audio`, `answer`, `type`, `choice1`, `choice2`, `choice3`, `choice4`) VALUES
(11, 4, 'Quiz #2', 'baboy.mp3', '4', 'salita', '10559711_814974551859527_6101120209606421938_n.jpg', '10559711_814974551859527_6101120209606421938_n.jpg', '10559711_814974551859527_6101120209606421938_n.jpg', '10505337_814974725192843_8292935193044712344_n.jpg'),
(12, 4, 'Quiz #3', 'baka.mp3', '4', 'salita', '10561781_814974508526198_7073469486283670844_n.jpg', '10561781_814974508526198_7073469486283670844_n.jpg', '10561781_814974508526198_7073469486283670844_n.jpg', '10547671_814974965192819_4372190642617792283_n.jpg'),
(13, 3, 'Quiz #1', '2 (1).mp3', '3', 'salita', 'i.png', 'e.png', 'a(2).png', 'o.png'),
(14, 3, 'Quiz #2', '2 (2).mp3', '1', 'salita', 'e.png', 'i.png', 'u.png', 'o.png'),
(16, 3, 'number 3', '2 (4).mp3', '2', 'salita', 'i.png', 'o.png', 'u.png', 'a(2).png'),
(17, 3, 'number 4', '2 (5).mp3', '1', 'salita', 'u.png', 'o.png', 'i.png', 'e.png'),
(18, 4, 'Quiz #2', '2.mp3', '1', 'naiiba', '10547671_814974965192819_4372190642617792283_n.jpg', 'i.png', 'u.png', 'o.png'),
(19, 4, 'Quiz #4', '5.mp3', '2', 'salita', '3.png', '10547671_814974965192819_4372190642617792283_n.jpg', '10561781_814974508526198_7073469486283670844_n.jpg', '10561781_814974508526198_7073469486283670844_n.jpg'),
(20, 4, 'Quiz #5', '3.mp3', '3', 'salita', '10547671_814974965192819_4372190642617792283_n.jpg', '10547671_814974965192819_4372190642617792283_n.jpg', '10561781_814974508526198_7073469486283670844_n.jpg', '10547671_814974965192819_4372190642617792283_n.jpg'),
(21, 6, 'Quiz #1', '22.mp3', '2', 'salita', 'da.png', 'pa.png', 'ta.png', 'ta.png'),
(22, 6, 'Quiz #2', '33.mp3', '4', 'salita', 'ya.png', 'ta.png', 'wa.png', 'pa.png'),
(23, 6, 'Quiz #3', '44.mp3', '3', 'salita', 'pa.png', 'da.png', 'ta.png', 'ya.png'),
(24, 6, 'Quiz #4', '55.mp3', '4', 'salita', 'pa.png', 'da.png', 'ya.png', 'ta.png'),
(25, 6, 'Quiz #5', '66.mp3', '1', 'salita', 'da.png', 'pa.png', 'ta.png', 'ya.png'),
(26, 3, 'Quiz #5', 'q.mp3', '1', 'salita', 'u.png', 'i.png', 'a(2).png', 'e.png'),
(27, 10, 'Quiz #1', '10.mp3', '3', 'salita', '2.png', '4.png', '5.png', '1.png'),
(28, 10, 'Quiz #2', '11.mp3', '2', 'salita', '4.png', '2.png', '1.png', '5.png'),
(29, 10, 'Quiz #3', '77.mp3', '1', 'salita', '2.png', '4.png', '1.png', '5.png'),
(30, 10, 'Quiz #4', '88.mp3', '2', 'salita', '2.png', '1.png', '5.png', '4.png'),
(31, 11, 'Quiz #1', '7777.mp3', '2', 'salita', 'pagsusulit.jpg', '10511495_750112411694856_5210835405411234904_o.jpg', '14182430_1213660812006678_706978079_n.jpg', '14182430_1213660812006678_706978079_n.jpg'),
(32, 11, 'Quiz #2', '5555.mp3', '2', 'salita', '10511495_750112411694856_5210835405411234904_o.jpg', 'pagsusulit.jpg', 'pagsusulit.jpg', 'pagsusulit.jpg'),
(33, 12, 'Quiz #1', 'BE.mp3', '2', 'naiiba', 'nga.png', '10561781_814974508526198_7073469486283670844_n.jpg', '10547671_814974965192819_4372190642617792283_n.jpg', '10547671_814974965192819_4372190642617792283_n.jpg'),
(34, 12, 'Story of Pineapple', 'BO.mp3', '2', 'salita', 'mali ko.png', 'mali ko.png', 'teacher.jpg', 'student account delete folder.png'),
(35, 12, 'Quiz #4', 'BU.mp3', '1', 'naiiba', '10559711_814974551859527_6101120209606421938_n.jpg', '10547671_814974965192819_4372190642617792283_n.jpg', '10547671_814974965192819_4372190642617792283_n.jpg', '10547671_814974965192819_4372190642617792283_n.jpg'),
(36, 12, 'Quiz #4', 'DI.mp3', '4', 'salita', 'student account delete folder.png', 'mali ko.png', 'tagal ng output naghahang.png', 'teacher.jpg'),
(37, 12, 'number 3', 'DU.mp3', '4', 'salita', 'student account delete folder.png', 'mali ko.png', 'mali ko 2.png', 'tagal ng output naghahang.png');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE `quiz_result` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `total_number` varchar(100) NOT NULL,
  `quiz_date` datetime NOT NULL,
  `quiz_status` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `lesson_id`, `user_id`, `score`, `total_number`, `quiz_date`, `quiz_status`, `last_update`) VALUES
(11, 3, 15, '4', '5', '2016-09-05 18:25:19', 0, '2016-09-05 16:26:09'),
(12, 3, 15, '3', '5', '2016-09-05 18:26:14', 0, '2016-09-05 16:26:52'),
(13, 3, 15, '2', '5', '2016-09-05 18:26:56', 0, '2016-09-05 16:27:28'),
(14, 4, 15, '3', '5', '2016-09-05 18:27:33', 0, '2016-09-05 16:28:06'),
(15, 4, 15, '4', '5', '2016-09-05 18:28:10', 0, '2016-09-05 16:28:45'),
(16, 4, 15, '5', '5', '2016-09-05 18:30:08', 0, '2016-09-05 16:30:45'),
(17, 6, 15, '1', '5', '2016-09-05 18:30:49', 0, '2016-09-05 16:31:29'),
(18, 6, 15, '3', '5', '2016-09-05 18:31:57', 0, '2016-09-05 16:32:24'),
(20, 6, 15, '3', '5', '2016-09-06 06:20:48', 0, '2016-09-06 04:21:57'),
(21, 10, 15, '1', '4', '2016-09-07 09:02:38', 0, '2016-09-07 07:03:29'),
(22, 10, 15, '1', '4', '2016-09-07 09:03:34', 0, '2016-09-07 07:04:10'),
(23, 10, 15, '4', '4', '2016-09-07 09:05:03', 0, '2016-09-07 07:06:05'),
(24, 3, 19, '1', '5', '2016-09-09 09:09:46', 0, '2016-09-09 07:11:12'),
(25, 10, 19, '0', '4', '2016-09-09 09:11:56', 0, '2016-09-09 07:12:31'),
(26, 11, 19, '2', '2', '2016-09-09 09:12:55', 0, '2016-09-09 07:13:06'),
(27, 11, 19, '0', '2', '2016-09-09 09:13:14', 0, '2016-09-09 07:13:29'),
(28, 11, 19, '2', '2', '2016-09-09 09:13:31', 0, '2016-09-09 07:13:45'),
(29, 3, 19, '1', '5', '2016-09-09 09:14:33', 0, '2016-09-09 07:15:15'),
(30, 3, 19, '1', '5', '2016-09-09 09:16:35', 0, '2016-09-09 07:17:17'),
(31, 11, 15, '0', '2', '2016-09-09 09:26:11', 0, '2016-09-09 07:26:58'),
(32, 11, 15, '1', '2', '2016-09-13 15:09:11', 0, '2016-09-13 13:09:31'),
(33, 11, 15, '1', '2', '2016-09-13 15:09:37', 0, '2016-09-13 13:10:09');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_take`
--

CREATE TABLE `quiz_take` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE `story` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `user_id`, `name`, `description`, `filename`, `active`, `last_update`) VALUES
(6, 2, 'Alamat ng Pinya ', 'Story of Pineapple', 'Ang Alamat ng pinya.mp4', 1, '2016-09-05 20:27:47'),
(7, 2, 'Bata', 'Story Of Pineapple', '6 Almost Immortal Animals - YouTube.mp4', 1, '2016-09-05 20:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `type_id` tinyint(1) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `parent_token` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type_id`, `parent_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `address`, `active`, `last_update`, `parent_token`, `created_by`) VALUES
(1, 1, 0, 'admin', 'pass', 'admin', '', 'istrator', 'arianeburnscode@yahoo.com', '09422916120', 'sss', 1, '2016-02-12 00:33:01', '', 0),
(2, 2, 0, 'teacher', 'pass', 'ariane', '', 'de leon', 'arianeburnscode@yahoo.com', '09422916120', '111', 1, '2016-03-03 04:21:56', '', 0),
(3, 3, 0, 'yvette', 'pass', 'yvette', '', 'de leon', 'arianeburnscode@yahoo.com', '09422916120', 'aa', 1, '2016-02-18 20:05:14', '', 0),
(6, 3, 0, 'millet', 'pass', 'Millet', 'sofe', 'bangcaya', 'arianeburnscode@yahoo.com', '09422916120', 'ss', 1, '0000-00-00 00:00:00', '', 0),
(9, 2, 0, 'teacher2', 'pass', 'Nenita', 'francisco', 'de leon', 'arianeburnscode@yahoo.com', '09422916120', 'aa', 1, '0000-00-00 00:00:00', '', 0),
(10, 1, 0, 'newadmin', 'pass', 'newadmin', 'newadmin', 'newadmin', 'arianeburnscode@yahoo.com', '09422916120', 'newadmin', 1, '0000-00-00 00:00:00', '', 0),
(11, 1, 0, 'admin2', '1234', 'charles', 'm', 'marallag', 'charles_darwin_marallag@yahoo.com', '09265686310', 'QC', 1, '0000-00-00 00:00:00', '', 0),
(12, 2, 0, 'newTeacher', 'qwer', 'darwin', '', 'marallag', 'odnanref_marallag@yahoo.com', '11212112122', 'qc', 1, '2016-03-02 23:25:29', '', 0),
(15, 4, 0, '01-2016-0001', '', 'Charles', 'D', 'Marallag', '', '', 'muÃ±oz', 1, '0000-00-00 00:00:00', '57c81d6b88d1c', 2),
(16, 4, 0, '01-2016-0002', '', 'Ryan', 'D', 'Dalaodao', '', '', 'aaaa', 1, '0000-00-00 00:00:00', '57c81e013e525', 2),
(17, 4, 0, '01-2016-0000', '', 'Rose Marlyn', 'Bugos', 'Mijares', '', '', '200 kaliraya Street cluster 28 tatalon', 1, '0000-00-00 00:00:00', '57c90c2191c51', 9),
(18, 4, 0, '01-2016-0003', '', 'Rose Marlyn', 'Bugos', 'Mijares', '', '', '200 kaliraya Street cluster 28 tatalon', 1, '0000-00-00 00:00:00', '57cfdea7c8057', 2),
(19, 4, 0, '01-2016-0005', '', 'Joseph', 'n', 'Tamayo', '', '', 'mmmm', 1, '0000-00-00 00:00:00', '57d25e781aeaa', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `description`, `active`, `last_update`) VALUES
(1, 'admin', 'admin', 1, '0000-00-00 00:00:00'),
(2, 'teacher', 'teacher', 1, '0000-00-00 00:00:00'),
(3, 'parents', 'parents', 1, '0000-00-00 00:00:00'),
(4, 'student', 'student', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `audio`
--
ALTER TABLE `audio`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `choice`
--
ALTER TABLE `choice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson`
--
ALTER TABLE `lesson`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lesson_dtl`
--
ALTER TABLE `lesson_dtl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parents`
--
ALTER TABLE `parents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_result`
--
ALTER TABLE `quiz_result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_take`
--
ALTER TABLE `quiz_take`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `story`
--
ALTER TABLE `story`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `lesson_dtl`
--
ALTER TABLE `lesson_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `quiz_take`
--
ALTER TABLE `quiz_take`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
