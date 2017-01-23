-- phpMyAdmin SQL Dump
-- version 4.4.13.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 24, 2017 at 03:28 AM
-- Server version: 5.6.31-0ubuntu0.15.10.1
-- PHP Version: 5.6.11-1ubuntu3.4

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
-- Table structure for table `attendance`
--

CREATE TABLE IF NOT EXISTS `attendance` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `attendance` varchar(255) DEFAULT NULL,
  `canquiz` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`id`, `student_id`, `date`, `attendance`, `canquiz`) VALUES
(1, 1, '2016-10-03', 'present', NULL),
(2, 2, '2016-10-03', 'absent', NULL),
(3, 3, '2016-10-03', 'absent', NULL),
(4, 4, '2016-10-03', 'absent', NULL),
(5, 6, '2016-10-03', 'present', NULL),
(7, 6, '2016-10-04', 'present', NULL),
(8, 12, '2014-10-06', 'present', NULL),
(9, 15, '2016-10-04', 'present', NULL),
(10, 10, '2016-10-04', 'present', NULL),
(11, 9, '2016-10-04', 'present', NULL),
(12, 15, '2016-10-09', 'absent', NULL),
(13, 9, '2016-10-09', 'present', NULL),
(14, 16, '2016-10-09', 'present', NULL),
(15, 10, '2016-10-09', 'absent', NULL),
(16, 9, '2016-10-10', 'present', NULL),
(17, 16, '2016-10-10', 'absent', NULL),
(18, 10, '2016-10-10', 'present', NULL),
(19, 15, '2016-10-10', 'absent', NULL),
(20, 26, '2017-01-24', 'present', NULL),
(21, 25, '2017-01-24', 'present', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `audio`
--

CREATE TABLE IF NOT EXISTS `audio` (
  `id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `folder` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audio`
--

INSERT INTO `audio` (`id`, `filename`, `folder`) VALUES
(1, 'BE.mp3', 'hard'),
(2, 'BA.mp3', 'hard'),
(3, 'BI - Copy.mp3', 'hard'),
(4, 'BO - Copy (2).mp3', 'hard'),
(5, 'BU.mp3', 'hard'),
(6, 'BA (1) - Copy.mp3', 'sfsad'),
(7, 'asdgfdfgdfgdfg.mp3', 'sfsad'),
(8, 'BA.mp3', 'sfsad'),
(9, 'BA (1).mp3', 'sfsad'),
(10, 'BE (1).mp3', 'sfsad'),
(11, 'BE (1) - Copy.mp3', 'sfsad'),
(12, 'BE.mp3', 'sfsad'),
(13, 'BI - Copy.mp3', 'sfsad'),
(14, 'BI (1).mp3', 'sfsad'),
(15, 'BI.mp3', 'sfsad'),
(16, 'BO - Copy (2).mp3', 'sfsad'),
(17, 'A (2) - Copy.mp3', 'Hard'),
(18, 'A (1).mp3', 'Hard'),
(19, 'A (1).mp3', 'eto'),
(20, 'A (2) - Copy.mp3', 'eto'),
(21, 'aaaa - Copy.mp3', 'eto'),
(22, 'aaaa.mp3', 'eto'),
(23, 'asdgfdfgdfgdfg.mp3', 'eto'),
(24, 'BA (1) - Copy.mp3', 'eto'),
(25, 'BA (1).mp3', 'eto'),
(26, 'A (1).mp3', 'asa'),
(27, 'A (2) - Copy.mp3', 'asa'),
(28, 'A (2) - Copy.mp3', 'WDQE'),
(29, 'A (1).mp3', 'WDQE'),
(30, 'aaaa - Copy.mp3', 'WDQE');

-- --------------------------------------------------------

--
-- Table structure for table `choice`
--

CREATE TABLE IF NOT EXISTS `choice` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `is_correct` tinyint(1) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lesson`
--

CREATE TABLE IF NOT EXISTS `lesson` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` date NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `audio` varchar(255) NOT NULL,
  `isDone` int(11) DEFAULT '0',
  `lesson_number` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson`
--

INSERT INTO `lesson` (`id`, `user_id`, `name`, `description`, `active`, `last_update`, `audio`, `isDone`, `lesson_number`) VALUES
(1, 39, 'Hard', '2016-10-03', 1, '2016-10-03 18:18:34', '', 1, NULL),
(2, 39, 'soft', '2016-10-04', 1, '2016-10-03 18:18:43', '', 0, NULL),
(4, 39, 'Love', '2016-10-05', 1, '2016-10-03 18:19:23', '', 1, NULL),
(5, 39, 'sfsad', '2017-09-13', 1, '2017-09-03 10:49:11', '', 0, NULL),
(6, 41, 'Eto', '2016-10-04', 1, '2016-10-04 18:26:51', '', 1, NULL),
(7, 41, 'asa', '2016-10-05', 1, '2016-10-04 18:31:02', '', 0, NULL),
(8, 41, 'Good', '2016-10-05', 1, '2016-10-04 18:31:11', '', 1, NULL),
(9, 41, 'Dsadas', '2016-10-06', 1, '2016-10-04 18:32:34', '', 1, NULL),
(11, 41, 'sA', '2016-10-04', 1, '2016-10-04 14:36:54', '', 0, NULL),
(12, 41, 'SADASD', '2016-10-05', 1, '2016-10-04 14:37:21', '', 0, NULL),
(13, 42, 'WDQE', '2014-10-06', 1, '2014-10-06 09:53:19', '', 0, NULL),
(14, 42, 'Sadsdas', '2016-10-04', 1, '2016-10-04 10:35:59', '', 0, NULL),
(15, 42, 'sdasd', '2016-10-04', 1, '2016-10-04 10:36:14', '', 0, NULL),
(16, 1, 'lesson 1', '2017-01-18', 1, '2017-01-03 19:45:08', 'A (2) - Copy.mp3', 0, NULL),
(17, 1, 'Hedgehog Jupiter', '2017-01-20', 1, '2017-01-03 20:22:27', 'A (1).mp3', 0, NULL),
(18, 42, 'Proin Eget Tortor Risus. Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit.', '2017-01-24', 1, '2017-01-24 01:49:13', 'BO - Copy (2).mp3', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `lesson_dtl`
--

CREATE TABLE IF NOT EXISTS `lesson_dtl` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `seconds` int(3) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `audio_id` int(11) NOT NULL,
  `board` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_dtl`
--

INSERT INTO `lesson_dtl` (`id`, `lesson_id`, `filename`, `seconds`, `last_update`, `audio_id`, `board`) VALUES
(1, 1, 'ba.png', 2, '2016-10-03 10:20:18', 2, 1),
(2, 1, 'be.png', 2, '2016-10-03 10:20:24', 1, 1),
(3, 1, 'i.png', 2, '2016-10-03 10:20:34', 3, 1),
(4, 1, 'o.png', 2, '2016-10-03 10:20:42', 4, 1),
(5, 1, 'u.png', 2, '2016-10-03 10:20:50', 5, 1),
(6, 6, 'babsbas.png', 2, '2016-10-04 10:28:21', 19, 1),
(7, 6, 'daaaa.png', 2, '2016-10-04 10:28:29', 20, 1),
(8, 6, 'haaaa.png', 2, '2016-10-04 10:28:40', 24, 1),
(9, 6, 'kkkk.png', 2, '2016-10-04 10:28:48', 25, 1),
(10, 13, 'logo.png', 2, '2014-10-06 01:54:00', 28, 1),
(11, 13, 'circle-outline.png', 2, '2014-10-06 01:54:08', 29, 1);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=276 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `message`, `action`, `created_at`) VALUES
(1, 'mia rose Log in.', 'User Log in', '2016-10-03 18:13:08'),
(2, 'mia rose Create User [diana].', 'User Create User', '2016-10-03 18:14:09'),
(3, 'mia rose Log out.', 'User log out', '2016-10-03 18:14:23'),
(4, 'diana mundo Log in.', 'User Log in', '2016-10-03 18:14:29'),
(5, 'diana mundo Added new Section rose.', 'Add Section', '2016-10-03 18:15:11'),
(6, 'diana mundo Create User [].', 'User Create User', '2016-10-03 18:15:47'),
(7, 'diana mundo Create User [].', 'User Create User', '2016-10-03 18:16:05'),
(8, 'diana mundo Create User [].', 'User Create User', '2016-10-03 18:16:32'),
(9, 'diana mundo Added new Lesson hard.', 'Add Lesson', '2016-10-03 18:18:34'),
(10, 'diana mundo Added new Lesson soft.', 'Add Lesson', '2016-10-03 18:18:43'),
(11, 'diana mundo Added new Lesson donee.', 'Add Lesson', '2016-10-03 18:18:57'),
(12, 'diana mundo Deleted Lesson donee.', 'Delete Lesson', '2016-10-03 18:19:10'),
(13, 'diana mundo Added new Lesson love.', 'Add Lesson', '2016-10-03 18:19:23'),
(14, 'diana mundo Updated Lesson Love.', 'Update Lesson', '2016-10-03 18:19:28'),
(15, 'diana mundo Added .', 'Add Lesson Content', '2016-10-03 18:20:18'),
(16, 'diana mundo Added .', 'Add Lesson Content', '2016-10-03 18:20:24'),
(17, 'diana mundo Added .', 'Add Lesson Content', '2016-10-03 18:20:34'),
(18, 'diana mundo Added .', 'Add Lesson Content', '2016-10-03 18:20:42'),
(19, 'diana mundo Added .', 'Add Lesson Content', '2016-10-03 18:20:50'),
(20, 'diana mundo Added quiz 1.', 'Add Quiz', '2016-10-03 18:21:36'),
(21, 'diana mundo Added quiz 2.', 'Add Quiz', '2016-10-03 18:22:03'),
(22, 'diana mundo Added quiz 3.', 'Add Quiz', '2016-10-03 18:22:26'),
(23, 'diana mundo Added quiz 4.', 'Add Quiz', '2016-10-03 18:22:46'),
(24, 'diana mundo Added alamat ng daliri.', 'Add Story', '2016-10-03 18:23:24'),
(25, 'diana mundo Updated Alamat Ng Daliri.', 'Update Story', '2016-10-03 18:23:30'),
(26, 'diana mundo Create User [].', 'User Create User', '2016-10-03 10:27:22'),
(27, 'diana mundo Create User [].', 'User Create User', '2016-10-03 10:28:01'),
(28, 'diana mundo Create User [].', 'User Create User', '2016-10-03 10:28:35'),
(29, 'sofas ako Log in.', 'User Log in', '2016-10-03 10:29:40'),
(30, 'ikaw hard Log in.', 'User Log in', '2016-10-03 10:30:03'),
(31, 'diana mundo Log out.', 'User log out', '2016-10-03 10:31:07'),
(32, 'ako hard Log in.', 'Student Log in', '2016-10-03 10:31:14'),
(33, 'soft ako Log in.', 'Student Log in', '2016-10-03 10:33:11'),
(34, 'naku hard Log in.', 'Student Log in', '2016-10-03 10:33:20'),
(35, 'soft ako Log in.', 'Student Log in', '2016-10-03 10:33:33'),
(36, 'sofas ako Log in.', 'User Log in', '2016-10-03 10:37:17'),
(37, 'diana mundo Log in.', 'User Log in', '2016-10-03 10:38:01'),
(38, 'diana mundo Updated Lesson Hard.', 'Update Lesson', '2016-10-03 10:38:16'),
(39, 'sofas ako Log in.', 'User Log in', '2016-10-03 10:42:41'),
(40, 'diana mundo Log in.', 'User Log in', '2016-10-03 10:43:13'),
(41, 'diana mundo Create User [].', 'User Create User', '2017-09-03 10:44:00'),
(42, 'diana mundo Added new Lesson sfsad.', 'Add Lesson', '2017-09-03 10:49:11'),
(43, 'diana mundo Log out.', 'User log out', '2017-09-03 10:50:39'),
(44, 'mia rose Log in.', 'User Log in', '2017-09-03 10:50:47'),
(45, 'mia rose Create User [again].', 'User Create User', '2017-09-03 23:59:59'),
(46, 'mia rose Log out.', 'User log out', '2016-10-03 10:54:17'),
(47, 'diana mundo Log in.', 'User Log in', '2016-10-03 10:54:25'),
(48, 'ikaw hard Log in.', 'User Log in', '2016-10-03 10:55:09'),
(49, 'sofas ako Log in.', 'User Log in', '2016-10-03 18:04:56'),
(50, 'mia rose Log in.', 'User Log in', '2016-10-03 18:15:31'),
(51, 'mia rose Create User [paul].', 'User Create User', '2016-10-03 18:16:53'),
(52, 'mia rose Log out.', 'User log out', '2016-10-03 18:18:19'),
(53, 'sofas ako Log in.', 'User Log in', '2016-10-03 18:18:31'),
(54, 'Paul Mangahas Log in.', 'User Log in', '2016-10-03 18:18:49'),
(55, 'Paul Mangahas Added new Section jehova.', 'Add Section', '2016-10-03 18:19:41'),
(56, 'Paul Mangahas Create User [].', 'User Create User', '2016-10-03 18:20:32'),
(57, 'Paul Mangahas Create User [].', 'User Create User', '2016-10-03 18:22:20'),
(58, 'Paul Mangahas Create User [].', 'User Create User', '2016-10-03 18:22:44'),
(59, 'Paul Mangahas Added new Lesson eto.', 'Add Lesson', '2016-10-04 18:26:51'),
(60, 'Paul Mangahas Added .', 'Add Lesson Content', '2016-10-04 18:28:21'),
(61, 'Paul Mangahas Added .', 'Add Lesson Content', '2016-10-04 18:28:29'),
(62, 'Paul Mangahas Added .', 'Add Lesson Content', '2016-10-04 18:28:40'),
(63, 'Paul Mangahas Added .', 'Add Lesson Content', '2016-10-04 18:28:48'),
(64, 'Paul Mangahas Added p1.', 'Add Quiz', '2016-10-04 18:29:32'),
(65, 'Paul Mangahas Added p1.', 'Add Quiz', '2016-10-04 18:30:07'),
(66, 'Paul Mangahas Added quiz 3.', 'Add Quiz', '2016-10-04 18:30:35'),
(67, 'Paul Mangahas Added new Lesson asa.', 'Add Lesson', '2016-10-04 18:31:02'),
(68, 'Paul Mangahas Added new Lesson Good.', 'Add Lesson', '2016-10-04 18:31:11'),
(69, 'Paul Mangahas Updated Lesson Good.', 'Update Lesson', '2016-10-04 18:31:17'),
(70, 'lina Marallag Log in.', 'User Log in', '2016-10-04 18:31:52'),
(71, 'Paul Mangahas Added new Lesson Dsadas.', 'Add Lesson', '2016-10-04 18:32:34'),
(72, 'Paul Mangahas Updated Lesson Dsadas.', 'Update Lesson', '2016-10-04 18:32:41'),
(73, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 18:35:24'),
(74, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 14:35:59'),
(75, 'Paul Mangahas Added Good.', 'Add Story', '2016-10-04 14:36:59'),
(76, 'Paul Mangahas Updated Good.', 'Update Story', '2016-10-04 14:37:08'),
(77, 'lina Marallag Log in.', 'User Log in', '2016-10-04 14:39:22'),
(78, 'Paul Mangahas Updated Lesson Eto.', 'Update Lesson', '2016-10-04 14:39:59'),
(79, 'sofas ako Log in.', 'User Log in', '2016-10-04 14:40:25'),
(80, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 14:47:53'),
(81, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 16:24:08'),
(82, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 16:24:18'),
(83, 'Paul Mangahas Log in.', 'User Log in', '2016-10-04 16:24:29'),
(84, 'Paul Mangahas Log out.', 'User log out', '2016-10-04 14:24:59'),
(85, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 14:25:05'),
(86, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 14:27:09'),
(87, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 14:37:22'),
(88, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 14:14:09'),
(89, 'lina Marallag Log in.', 'User Log in', '2016-10-04 14:14:43'),
(90, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 14:29:49'),
(91, 'lina Marallag Log in.', 'User Log in', '2016-10-04 14:30:18'),
(92, 'Paul Mangahas Log in.', 'User Log in', '2016-10-04 14:30:44'),
(93, 'Paul Mangahas Added new Lesson sdasdas.', 'Add Lesson', '2016-10-04 14:30:57'),
(94, 'Charles Marallag Log in.', 'Student Log in', '2016-10-04 14:31:12'),
(95, 'lina Marallag Log in.', 'User Log in', '2016-10-04 14:31:58'),
(96, 'Paul Mangahas Log in.', 'User Log in', '2016-10-04 14:36:02'),
(97, 'Paul Mangahas Deleted Lesson sdasdas.', 'Delete Lesson', '2016-10-04 14:36:41'),
(98, 'Paul Mangahas Added new Lesson sA.', 'Add Lesson', '2016-10-04 14:36:54'),
(99, 'Paul Mangahas Log out.', 'User log out', '2016-10-04 14:37:06'),
(100, 'Paul Mangahas Log in.', 'User Log in', '2016-10-04 14:37:12'),
(101, 'Paul Mangahas Added new Lesson SADASD.', 'Add Lesson', '2016-10-04 14:37:21'),
(102, 'Paul Mangahas Log out.', 'User log out', '2016-10-04 14:38:06'),
(103, 'Paul Mangahas Log in.', 'User Log in', '2016-10-04 14:38:15'),
(104, 'Paul Mangahas Create User [].', 'User Create User', '2013-10-04 14:39:18'),
(105, 'Paul Mangahas Log out.', 'User log out', '2016-10-04 14:39:57'),
(106, 'Paul Mangahas Log in.', 'User Log in', '2016-10-04 14:40:16'),
(107, 'Paul Mangahas Log out.', 'User log out', '2016-10-01 14:43:32'),
(108, 'Paul Mangahas Log in.', 'User Log in', '2016-10-01 14:43:37'),
(109, 'Paul Mangahas Updated profile', 'User Update Profile', '2016-10-01 14:44:12'),
(110, 'pam Mangahas Updated profile', 'User Update Profile', '2016-10-01 14:44:24'),
(111, 'pam tabas Log out.', 'User log out', '2016-10-01 14:46:16'),
(112, 'Charles Marallag Log in.', 'Student Log in', '2016-10-01 16:12:26'),
(113, 'pam tabas Log in.', 'User Log in', '2016-10-01 16:13:44'),
(114, 'pam tabas Log out.', 'User log out', '2016-10-01 16:18:16'),
(115, 'mia rose Log in.', 'User Log in', '2016-10-01 16:18:24'),
(116, 'mia rose Log out.', 'User log out', '2016-10-01 16:18:28'),
(117, 'pam tabas Log in.', 'User Log in', '2016-10-01 16:18:38'),
(118, 'pam tabas Log out.', 'User log out', '2016-10-01 16:18:46'),
(119, 'mia rose Log in.', 'User Log in', '2016-10-01 16:18:53'),
(120, 'mia rose Delete User [pam].', 'User Delete User', '2016-10-01 16:19:03'),
(121, 'mia rose Create User [rosalie].', 'User Create User', '2016-10-01 16:19:59'),
(122, 'mia rose Log out.', 'User log out', '2016-10-01 09:20:17'),
(123, 'Rosalie mijares Log in.', 'User Log in', '2016-10-01 09:20:38'),
(124, 'Rosalie mijares Added new Section ava.', 'Add Section', '2016-10-01 09:20:58'),
(125, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-01 09:21:43'),
(126, 'Rosalie mijares Log in.', 'User Log in', '2016-10-01 09:26:03'),
(127, 'Rosalie mijares Log out.', 'User log out', '2016-10-01 09:26:36'),
(128, 'Rosalie mijares Log in.', 'User Log in', '2016-10-01 09:27:25'),
(129, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-01 09:27:58'),
(130, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-04 09:28:47'),
(131, 'Rosalie mijares Create User [].', 'User Create User', '2015-07-04 09:29:10'),
(132, 'Rosalie mijares Log out.', 'User log out', '2016-10-06 09:30:11'),
(133, 'Rosalie mijares Log in.', 'User Log in', '2016-10-06 09:50:29'),
(134, 'Rosalie mijares Create User [].', 'User Create User', '2014-10-06 09:52:53'),
(135, 'Rosalie mijares Added new Lesson WDQE.', 'Add Lesson', '2014-10-06 09:53:19'),
(136, 'Rosalie mijares Added .', 'Add Lesson Content', '2014-10-06 09:54:00'),
(137, 'Rosalie mijares Added .', 'Add Lesson Content', '2014-10-06 09:54:08'),
(138, 'Rosalie mijares Added SADSA.', 'Add Quiz', '2014-10-06 09:54:32'),
(139, 'Rosalie mijares Added quiz 1.', 'Add Quiz', '2014-10-06 09:54:44'),
(140, 'Rosalie mijares Log out.', 'User log out', '2014-10-06 09:54:47'),
(141, 'Rosalie mijares Log in.', 'User Log in', '2014-10-06 09:54:59'),
(142, 'Rosalie mijares Log out.', 'User log out', '2014-10-06 09:55:09'),
(143, 'sadasda sdasd Log in.', 'Student Log in', '2014-10-06 09:55:15'),
(144, 'sadasda sdasd Log in.', 'Student Log in', '2014-10-06 09:55:43'),
(145, 'Rosalie mijares Log in.', 'User Log in', '2014-10-06 09:55:55'),
(146, 'sadasda sdasd Log in.', 'Student Log in', '2014-10-06 09:56:08'),
(147, 'Rosalie mijares Create User [].', 'User Create User', '2009-11-06 10:17:08'),
(148, 'Rosalie mijares Log out.', 'User log out', '2009-11-06 10:17:32'),
(149, 'Rosalie mijares Log in.', 'User Log in', '2016-10-04 10:31:00'),
(150, 'Rosalie mijares Create User [].', 'User Create User', '2015-10-04 10:32:30'),
(151, 'Rosalie mijares Log out.', 'User log out', '2016-10-04 10:32:59'),
(152, 'mia rose Log in.', 'User Log in', '2016-10-04 10:33:04'),
(153, 'mia rose Log out.', 'User log out', '2016-10-04 10:33:46'),
(154, 'Rosalie mijares Log in.', 'User Log in', '2016-10-04 10:33:57'),
(155, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-04 10:35:00'),
(156, 'mine daa Log in.', 'User Log in', '2016-10-04 10:35:26'),
(157, 'Rosalie mijares Added new Lesson sad.', 'Add Lesson', '2016-10-04 10:35:59'),
(158, 'Rosalie mijares Updated Lesson Sadsdas.', 'Update Lesson', '2016-10-04 10:36:08'),
(159, 'Rosalie mijares Added new Lesson sdasd.', 'Add Lesson', '2016-10-04 10:36:14'),
(160, 'add daa Log in.', 'Student Log in', '2016-10-04 10:38:01'),
(161, 'chalie marallag Log in.', 'Student Log in', '2016-10-04 10:42:33'),
(162, 'Rosalie mijares Log in.', 'User Log in', '2016-10-04 10:42:56'),
(163, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-04 10:43:19'),
(164, 'Rosalie mijares Log out.', 'User log out', '2016-10-04 10:43:25'),
(165, 'dw ewe Log in.', 'Student Log in', '2016-10-04 10:43:29'),
(166, 'Rosalie mijares Log out.', 'User log out', '2016-10-04 10:43:54'),
(167, 'Rosalie mijares Log in.', 'User Log in', '2016-10-09 14:26:06'),
(168, 'Rosalie mijares Log out.', 'User log out', '2016-10-09 14:27:58'),
(169, 'mia rose Log in.', 'User Log in', '2016-10-09 14:28:10'),
(170, 'sam nicole Log in.', 'Student Log in', '2016-10-09 14:41:19'),
(171, 'mia rose Log in.', 'User Log in', '2016-10-09 14:43:13'),
(172, 'mia rose Log out.', 'User log out', '2016-10-09 14:43:18'),
(173, 'Rosalie mijares Log in.', 'User Log in', '2016-10-09 14:43:38'),
(174, 'mia rose Log in.', 'User Log in', '2016-10-09 14:58:23'),
(175, 'mia rose Create User [Mama].', 'User Create User', '2016-10-09 14:59:48'),
(176, 'mia rose Log out.', 'User log out', '2016-10-09 15:00:26'),
(177, 'mia rose Log in.', 'User Log in', '2016-10-09 15:03:53'),
(178, 'mia rose Log out.', 'User log out', '2016-10-09 15:04:16'),
(179, 'Rosalie mijares Log in.', 'User Log in', '2016-10-09 15:04:27'),
(180, 'Rosalie mijares Log out.', 'User log out', '2016-10-09 15:07:10'),
(181, 'Rosalie mijares Log in.', 'User Log in', '2016-10-09 15:07:47'),
(182, 'mine daa Log in.', 'User Log in', '2016-10-09 15:08:17'),
(183, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-09 15:12:03'),
(184, 'Rosalie mijares Log out.', 'User log out', '2016-10-09 15:12:14'),
(185, 'Rosalie mijares Log in.', 'User Log in', '2016-10-09 15:38:58'),
(186, 'Rosalie mijares Log in.', 'User Log in', '2016-10-09 15:41:00'),
(187, 'Rosalie mijares Log out.', 'User log out', '2016-10-09 15:43:12'),
(188, 'mia rose Log in.', 'User Log in', '2016-10-09 16:15:49'),
(189, 'chalie marallag Log in.', 'Student Log in', '2016-10-09 16:16:43'),
(190, 'mia rose Log in.', 'User Log in', '2016-10-10 00:52:09'),
(191, 'mia rose Log in.', 'User Log in', '2016-10-10 02:27:50'),
(192, 'mia rose Log out.', 'User log out', '2016-10-10 02:30:10'),
(193, 'sam nicole Log in.', 'Student Log in', '2016-10-10 02:30:23'),
(194, 'sam nicole Log in.', 'Student Log in', '2016-10-10 02:30:30'),
(195, 'mia rose Log in.', 'User Log in', '2016-10-10 02:30:44'),
(196, 'mia rose Log out.', 'User log out', '2016-10-10 02:31:17'),
(197, 'mia rose Log in.', 'User Log in', '2016-10-10 02:32:31'),
(198, 'mia rose Log out.', 'User log out', '2016-10-10 02:34:43'),
(199, 'diana mundo Log in.', 'User Log in', '2016-10-10 02:34:54'),
(200, 'diana mundo Create User [].', 'User Create User', '2016-10-10 02:35:38'),
(201, 'diana mundo Log out.', 'User log out', '2016-10-10 02:36:03'),
(202, 'sam nicole Log in.', 'Student Log in', '2016-10-10 02:37:02'),
(203, 'diana mundo Log in.', 'User Log in', '2016-10-10 02:37:26'),
(204, 'diana mundo Create User [].', 'User Create User', '2016-10-10 02:39:11'),
(205, 'diana mundo Log out.', 'User log out', '2016-10-10 02:41:51'),
(206, 'mia rose Log in.', 'User Log in', '2016-10-10 02:43:04'),
(207, 'mia rose Log out.', 'User log out', '2016-10-10 02:47:15'),
(208, 'sam nicole Log in.', 'Student Log in', '2016-10-10 02:47:26'),
(209, 'sam nicole Log in.', 'Student Log in', '2016-10-10 02:49:19'),
(210, 'mia rose Log in.', 'User Log in', '2016-10-10 02:51:22'),
(211, 'mia rose Log out.', 'User log out', '2016-10-10 02:52:58'),
(212, 'sam nicole Log in.', 'Student Log in', '2016-10-10 02:55:06'),
(213, 'mia rose Log in.', 'User Log in', '2016-10-10 02:57:24'),
(214, 'mia rose Log out.', 'User log out', '2016-10-10 03:02:34'),
(215, 'sam nicole Log in.', 'Student Log in', '2016-10-10 03:03:41'),
(216, 'Rosalie mijares Log in.', 'User Log in', '2016-10-10 03:04:11'),
(217, 'Rosalie mijares Log out.', 'User log out', '2016-10-10 03:05:07'),
(218, 'sam nicole Log in.', 'Student Log in', '2016-10-10 03:05:19'),
(219, 'Rosalie mijares Log in.', 'User Log in', '2016-10-10 03:07:32'),
(220, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-10 03:09:13'),
(221, 'Rosalie mijares Log out.', 'User log out', '2016-10-10 03:24:09'),
(222, 'Rosalie mijares Log in.', 'User Log in', '2016-10-10 06:00:37'),
(223, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-10 06:05:22'),
(224, 'add daa Log in.', 'Student Log in', '2016-10-12 04:25:18'),
(225, 'Rosalie mijares Log in.', 'User Log in', '2016-10-12 04:25:35'),
(226, 'Rosalie mijares Create User [].', 'User Create User', '2016-10-12 04:28:11'),
(227, 'Rosalie mijares Log out.', 'User log out', '2016-10-12 04:28:48'),
(228, 'chalie marallag Log in.', 'Student Log in', '2016-10-12 04:29:04'),
(229, 'mia rose Log in.', 'User Log in', '2016-10-12 15:52:39'),
(230, 'mia rose Log in.', 'User Log in', '2016-10-12 15:55:33'),
(231, 'mia rose Create User [admin002].', 'User Create User', '2016-10-12 15:59:33'),
(232, 'mia rose Create User [admin001].', 'User Create User', '2016-10-12 16:03:16'),
(233, 'mia rose Create User [admin001].', 'User Create User', '2016-10-12 16:14:18'),
(234, 'mia rose Log in.', 'User Log in', '2016-10-13 06:48:09'),
(235, 'mia rose Log in.', 'User Log in', '2016-10-17 13:07:16'),
(236, 'sam nicole Log in.', 'Student Log in', '2016-11-21 19:04:13'),
(237, 'chalie marallag Log in.', 'Student Log in', '2016-11-21 19:04:21'),
(238, 'aDad asdaS Log in.', 'Student Log in', '2016-11-21 19:04:28'),
(239, 'mia rose Log in.', 'User Log in', '2016-11-21 19:04:58'),
(240, 'mia rose Log out.', 'User log out', '2016-11-21 19:08:28'),
(241, 'Rosalie mijares Log in.', 'User Log in', '2016-11-21 19:08:41'),
(242, 'Rosalie mijares Create User [].', 'User Create User', '2016-11-21 19:10:24'),
(243, 'Rosalie mijares Log out.', 'User log out', '2016-11-21 19:10:45'),
(244, 'mia rose Log in.', 'User Log in', '2016-11-30 07:04:05'),
(245, 'mia rose Log out.', 'User log out', '2017-01-02 21:40:54'),
(246, 'mia rose Log in.', 'User Log in', '2017-01-02 21:41:18'),
(247, 'mia rose Log in.', 'User Log in', '2017-01-02 22:57:02'),
(248, 'mia rose Log in.', 'User Log in', '2017-01-03 17:41:14'),
(249, 'mia rose Added new Section New Section.', 'Add Section', '2017-01-03 17:44:43'),
(250, 'mia rose Log in.', 'User Log in', '2017-01-03 18:22:09'),
(251, 'mia rose Create User [].', 'User Create User', '2017-01-03 18:23:53'),
(252, 'mia rose Added new Lesson lesson 1.', 'Add Lesson', '2017-01-03 19:45:08'),
(253, 'mia rose Added new Lesson Hedgehog Jupiter.', 'Add Lesson', '2017-01-03 20:22:27'),
(254, 'mia rose Create User [foobar].', 'User Create User', '2017-01-03 20:43:47'),
(255, 'mia rose Log in.', 'User Log in', '2017-01-07 15:39:13'),
(256, 'mia rose Log in.', 'User Log in', '2017-01-07 20:46:57'),
(257, 'mia rose Log in.', 'User Log in', '2017-01-19 00:55:29'),
(258, 'mia rose Log in.', 'User Log in', '2017-01-23 22:24:30'),
(259, 'sam nicole Log in.', 'Student Log in', '2017-01-23 23:13:21'),
(260, 'mia rose Log out.', 'User log out', '2017-01-23 23:16:12'),
(261, 'Rosalie mijares Log in.', 'User Log in', '2017-01-23 23:16:34'),
(262, 'Rosalie mijares Create User [].', 'User Create User', '2017-01-24 01:21:27'),
(263, 'Rosalie mijares Create User [].', 'User Create User', '2017-01-24 01:22:11'),
(264, 'Rosalie mijares Create User [].', 'User Create User', '2017-01-24 01:22:27'),
(265, 'Bawang Boy Log in.', 'Student Log in', '2017-01-24 01:40:59'),
(266, 'chalie marallag Log in.', 'Student Log in', '2017-01-24 01:41:44'),
(267, 'egg egg Log in.', 'Student Log in', '2017-01-24 01:44:52'),
(268, 'egg egg Log in.', 'Student Log in', '2017-01-24 01:45:58'),
(269, 'egg egg Log in.', 'Student Log in', '2017-01-24 01:47:08'),
(270, 'egg egg Log in.', 'Student Log in', '2017-01-24 01:47:22'),
(271, 'Rosalie mijares Added new Lesson Proin eget tortor risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit..', 'Add Lesson', '2017-01-24 01:49:13'),
(272, 'Rosalie mijares Updated Lesson Proin Eget Tortor Risus. Lorem Ipsum Dolor Sit Amet, Consectetur Adipiscing Elit..', 'Update Lesson', '2017-01-24 01:49:42'),
(273, 'Bawang Boy Log in.', 'Student Log in', '2017-01-24 01:50:52'),
(274, 'Bawang Boy Log in.', 'Student Log in', '2017-01-24 01:51:02'),
(275, 'Bawang Boy Log in.', 'Student Log in', '2017-01-24 01:53:10');

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE IF NOT EXISTS `media` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `parent`
--

CREATE TABLE IF NOT EXISTS `parent` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `middle_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parent`
--

INSERT INTO `parent` (`id`, `username`, `password`, `first_name`, `last_name`, `middle_name`, `email`, `phone`) VALUES
(1, 'ikaw', 'pass', 'ikaw', 'hard', NULL, NULL, NULL),
(2, 'sofas', 'pass', 'sofas', 'ako', NULL, NULL, NULL),
(3, 'lina', 'pass', 'lina', 'Marallag', NULL, NULL, NULL),
(4, 'mine', 'pass', 'mine', 'daa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `parentstud`
--

CREATE TABLE IF NOT EXISTS `parentstud` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `id` int(11) NOT NULL,
  `quiz_category_id` int(10) unsigned NOT NULL DEFAULT '1',
  `lesson_id` int(11) NOT NULL,
  `description` varchar(225) NOT NULL,
  `audio` varchar(255) NOT NULL,
  `answer` varchar(1) NOT NULL,
  `type` varchar(255) NOT NULL,
  `choice1` varchar(255) NOT NULL,
  `choice2` varchar(255) NOT NULL,
  `choice3` varchar(255) NOT NULL,
  `choice4` varchar(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `quiz_category_id`, `lesson_id`, `description`, `audio`, `answer`, `type`, `choice1`, `choice2`, `choice3`, `choice4`) VALUES
(1, 1, 1, 'quiz 1', 'BA.mp3', '1', 'salita', 'ba.png', 'be.png', 'o.png', 'u.png'),
(2, 1, 1, 'quiz 2', 'BE.mp3', '3', 'salita', 'ba.png', 'i.png', 'be.png', 'u.png'),
(3, 1, 1, 'quiz 3', 'BO.mp3', '2', 'salita', 'u.png', 'o.png', 'be.png', 'i.png'),
(4, 1, 1, 'quiz 4', 'BU.mp3', '4', 'salita', 'ba.png', 'be.png', 'i.png', 'u.png'),
(5, 1, 6, 'p1', 'A (2) - Copy.mp3', '2', 'salita', 'babsbas.png', 'daaaa.png', 'haaaa.png', 'haaaa.png'),
(6, 1, 6, 'p1', 'BO - Copy (2).mp3', '1', 'salita', 'babsbas.png', 'haaaa.png', 'daaaa.png', 'haaaa.png'),
(7, 1, 6, 'quiz 3', 'BI.mp3', '4', 'salita', 'daaaa.png', 'haaaa.png', 'kkkk.png', 'babsbas.png'),
(8, 1, 13, 'SADSA', 'A (1).mp3', '2', 'salita', 'logo.png', 'circle-outline.png', 'logo.png', 'circle-outline.png'),
(9, 1, 13, 'quiz 1', 'BE (1) - Copy.mp3', '1', 'salita', 'logo.png', 'logo.png', 'circle-outline.png', 'logo.png'),
(34, 3, 1, 'Test Position ', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_categories`
--

CREATE TABLE IF NOT EXISTS `quiz_categories` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `filename` varchar(250) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `date_updated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_categories`
--

INSERT INTO `quiz_categories` (`id`, `name`, `description`, `filename`, `date_added`, `date_updated`) VALUES
(1, 'Multiple Choice', 'Multiple choice is a form of an objective assessment in which respondents are asked to select the only correct answer out of the choices from a list.', 'folder.php', '2017-01-07 10:04:46', '2017-01-07 08:05:58'),
(2, 'Matching Type (Drag and Drop)', ' A matching type quiz is an item that provides a defined term and requires a test taker to match identifying characteristics to the correct ...', 'folder.php', '2017-01-07 10:04:49', '2017-01-07 08:05:58'),
(3, 'True or False', 'Type have only two possible answers. Most commonly this is ''True'' and ''False'', but could also be ''Yes'' and ''No'', ''Agree'' and ''Disagree'', or any other suitable pair of mutually-exclusive responses. True or False questions must be direct questions, and the only possible answers must be the two options given. For example, a question of "What is your favorite color" with possible answers of "Red" and "Blue" would be unsuitable, as there are other possible favorite colors other than red and blue.', 'true_and_false/index.php', '2017-01-07 10:01:14', '2017-01-07 08:05:58');

-- --------------------------------------------------------

--
-- Table structure for table `quiz_result`
--

CREATE TABLE IF NOT EXISTS `quiz_result` (
  `id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `total_number` varchar(100) NOT NULL,
  `quiz_date` datetime NOT NULL,
  `quiz_status` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(255) DEFAULT NULL,
  `current_item` int(11) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `lesson_id`, `user_id`, `score`, `total_number`, `quiz_date`, `quiz_status`, `last_update`, `remarks`, `current_item`) VALUES
(1, 1, 2, '2', '4', '2016-10-03 10:32:00', 0, '2016-10-03 02:32:00', 'Very good', 5),
(2, 1, 2, '3', '4', '2016-10-03 10:32:19', 0, '2016-10-03 02:32:19', 'Fantastic', 5),
(3, 1, 2, '4', '4', '2016-10-03 10:32:39', 0, '2016-10-03 02:32:39', 'Excellent', 5),
(4, 1, 3, '2', '4', '2016-10-03 10:35:37', 0, '2016-10-03 02:35:37', 'Very good', 5),
(5, 1, 3, '0', '4', '2016-10-03 10:35:52', 0, '2016-10-03 02:35:52', 'Needs Improvement', 5),
(6, 1, 3, '3', '4', '2016-10-03 10:36:10', 0, '2016-10-03 02:36:10', 'Fantastic', 5),
(7, 6, 6, '1', '3', '2016-10-04 14:38:02', 0, '2016-10-04 06:38:02', 'good', 4),
(8, 6, 6, '0', '3', '2016-10-04 14:38:21', 0, '2016-10-04 06:38:21', 'Needs Improvement', 4),
(9, 6, 6, '0', '3', '2016-10-04 14:38:34', 0, '2016-10-04 06:38:34', 'Needs Improvement', 4),
(10, 13, 12, '0', '2', '2014-10-06 09:56:59', 0, '2014-10-06 01:56:59', 'Needs Improvement', 3),
(11, 13, 12, '0', '2', '2014-10-06 09:57:11', 0, '2014-10-06 01:57:11', 'Needs Improvement', 3);

-- --------------------------------------------------------

--
-- Table structure for table `quiz_take`
--

CREATE TABLE IF NOT EXISTS `quiz_take` (
  `id` int(11) NOT NULL,
  `quiz_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `score` varchar(100) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `quiz_true_or_false`
--

CREATE TABLE IF NOT EXISTS `quiz_true_or_false` (
  `id` int(10) unsigned NOT NULL,
  `quiz_id` int(10) unsigned NOT NULL,
  `question` varchar(100) NOT NULL,
  `truth_text` varchar(10) NOT NULL,
  `false_text` varchar(10) NOT NULL,
  `correct_answer` varchar(10) NOT NULL,
  `background` varchar(255) NOT NULL,
  `true_image` varchar(255) NOT NULL,
  `false_image` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_true_or_false`
--

INSERT INTO `quiz_true_or_false` (`id`, `quiz_id`, `question`, `truth_text`, `false_text`, `correct_answer`, `background`, `true_image`, `false_image`) VALUES
(5, 24, 'asdsad', 'true', 'false', 'true', '/uploads/aaebe9d5ec364cf668f9077611958cf1.jpg', '/uploads/31f71644884962e8c5efb68b266e8960.jpg', '/uploads/9a244b21c53485f6a66c8979321bb91c.jpg'),
(6, 34, '1', 'true', 'false', 'true', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(7, 34, '2', 'true', 'false', 'false', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(8, 34, '3', 'true', 'false', 'false', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(9, 34, '4', 'true', 'false', 'true', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(10, 34, '5', 'true', 'false', 'false', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(11, 34, '6', 'true', 'false', 'true', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(12, 34, '7', 'true', 'false', 'false', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(13, 34, '8', 'true', 'false', 'false', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(14, 34, '9', 'true', 'false', 'true', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg'),
(15, 34, '10', 'true', 'false', 'true', '/uploads/d9d1c2a424c3dfa4052391df69ec33e2.jpg', '/uploads/ed545578c5bbb902c3f6aa8976f0049a.jpg', '/uploads/9a46de4adf3d77089ddeb2bb82b150ba.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `id` int(11) NOT NULL,
  `section` varchar(255) DEFAULT NULL,
  `created_by` int(1) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`id`, `section`, `created_by`) VALUES
(1, 'rose', 39),
(2, 'jehova', 41),
(3, 'ava', 42),
(4, 'New Section', 1);

-- --------------------------------------------------------

--
-- Table structure for table `story`
--

CREATE TABLE IF NOT EXISTS `story` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `story`
--

INSERT INTO `story` (`id`, `user_id`, `name`, `description`, `filename`, `active`, `last_update`) VALUES
(1, 39, 'Alamat Ng Daliri', 'Sad', 'ANG ALAMAT NG MGA DALIRI.mp4', 1, '2016-10-03 10:23:24'),
(2, 41, 'Good', 'Quiz 1', 'IKAW BA''Y MABUTING TAO-.mp4', 1, '2016-10-04 06:36:59');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL,
  `lrn` varchar(13) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `teacher` int(11) DEFAULT NULL,
  `section` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `sy` year(4) DEFAULT NULL,
  `parent_last_name` varchar(255) DEFAULT NULL,
  `parent_first_name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `lrn`, `first_name`, `middle_name`, `last_name`, `active`, `last_update`, `teacher`, `section`, `address`, `sy`, `parent_last_name`, `parent_first_name`) VALUES
(9, '111111111111', 'sam', '', 'nicole', 1, '0000-00-00 00:00:00', 42, 'ava', 'jaskdjsa', 2016, 'nicole', 'nica'),
(10, '222222222222', 'chalie', '', 'marallag', 1, '0000-00-00 00:00:00', 42, 'ava', 'adhajk', 2016, 'marallag', 'charles'),
(11, '333333333333', 'aDad', '', 'asdaS', 1, '0000-00-00 00:00:00', 42, 'ava', 'asASa', 2015, 'ASAs', 'aSa'),
(12, '455555555555', 'sadasda', '', 'sdasd', 1, '0000-00-00 00:00:00', 42, 'ava', 'ADASDA', 2014, 'ASAs', 'ASAs'),
(13, '121211111111', 'dad', '', 'dsadas', 1, '0000-00-00 00:00:00', 42, 'ava', 'asdsad', 2009, 'dfdfds', 'asdasd'),
(14, '666666666666', 'nica', '', 'meneses', 1, '0000-00-00 00:00:00', 42, 'ava', 'asd', 2015, 'meneses', 'nila'),
(15, '999999999999', 'add', '', 'daa', 1, '0000-00-00 00:00:00', 42, 'ava', 'asas', 2016, 'daa', 'mine'),
(16, '555555555555', 'dw', '', 'ewe', 1, '0000-00-00 00:00:00', 42, 'ava', 'asdas', 2016, 'ewe', 'sa'),
(17, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '', '', 0000, '', ''),
(18, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '', '', 0000, '', ''),
(19, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '', '', 0000, '', ''),
(20, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '', '', 0000, '', ''),
(21, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '', '', 0000, '', ''),
(22, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '', '', 0000, '', ''),
(23, '', '', '', '', 0, '0000-00-00 00:00:00', 0, '', '', 0000, '', ''),
(24, '123123123123', 'egg', 'egg', 'egg', 1, '0000-00-00 00:00:00', 1, 'New Section', 'eee', 2017, 'aasadasd', 'asdasd'),
(25, '123213543545', 'Untouchable', 'my', 'Queen', 1, '0000-00-00 00:00:00', 42, 'ava', 'asdasdsadasdasd', 2017, 'asdasdas', 'asdasd'),
(26, '435454565765', 'Bawang', 'my', 'Boy', 1, '0000-00-00 00:00:00', 42, 'ava', 'gfdgfd', 2017, 'sdfsdfdsf', 'asdasd');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `type_id` tinyint(1) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(40) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(100) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `fromtime` time DEFAULT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `totime` time DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type_id`, `username`, `password`, `first_name`, `middle_name`, `last_name`, `email`, `phone`, `address`, `active`, `fromtime`, `last_update`, `totime`) VALUES
(1, 1, 'admin', 'pass', 'mia', '', 'rose', 'miarose@gmail.com', '09422916120', 'sss', 1, '00:00:00', '2016-09-29 22:16:14', NULL),
(39, 2, 'diana', 'pass', 'diana', '', 'mundo', 'diana@gmail.com', '09282262875', 'tatalon', 1, '09:00:00', '0000-00-00 00:00:00', '12:00:00'),
(40, 2, 'again', 'pass', 'again', '', 'again', 'pass@gmail.com', '09464461156', 'pass', 1, '12:00:00', '0000-00-00 00:00:00', '15:00:00'),
(42, 2, 'rosalie', 'pass', 'Rosalie', '', 'mijares', 'rosalie@gmail.com', '09464456641', 'tatalon', 1, '08:00:00', '0000-00-00 00:00:00', '16:00:00'),
(46, 0, '', '', '', '', '', '', '', '', 0, '00:00:00', '0000-00-00 00:00:00', '00:00:00'),
(47, 1, 'foobar', 'foobar', 'foo', 'my', 'bar', 'asdasd@dasdasdsa.co', '111111111111', 'asd', 1, '00:00:00', '0000-00-00 00:00:00', '00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE IF NOT EXISTS `user_type` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`, `description`, `active`, `last_update`) VALUES
(1, 'admin', 'admin', 1, '0000-00-00 00:00:00'),
(2, 'teacher', 'teacher', 1, '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent`
--
ALTER TABLE `parent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parentstud`
--
ALTER TABLE `parentstud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
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
-- Indexes for table `quiz_true_or_false`
--
ALTER TABLE `quiz_true_or_false`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
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
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `audio`
--
ALTER TABLE `audio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `lesson_dtl`
--
ALTER TABLE `lesson_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=276;
--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `parent`
--
ALTER TABLE `parent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `parentstud`
--
ALTER TABLE `parentstud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `quiz_categories`
--
ALTER TABLE `quiz_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `quiz_take`
--
ALTER TABLE `quiz_take`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz_true_or_false`
--
ALTER TABLE `quiz_true_or_false`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=48;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
