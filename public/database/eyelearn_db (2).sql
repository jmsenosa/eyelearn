-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2016 at 07:12 PM
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
(112, 'aaaa.mp3', 'Ang Mga Patinig'),
(113, 'eeeeeee.mp3', 'Ang Mga Patinig'),
(114, 'iiiiiiiii.mp3', 'Ang Mga Patinig'),
(115, 'ooooo.mp3', 'Ang Mga Patinig'),
(116, 'uuuuu.mp3', 'Ang Mga Patinig'),
(117, 'BA (1).mp3', 'Ang Mga Katinig'),
(118, 'DA.mp3', 'Ang Mga Katinig'),
(119, 'HA.mp3', 'Ang Mga Katinig'),
(120, 'GA.mp3', 'Ang Mga Katinig'),
(121, 'KA.mp3', 'Ang Mga Katinig'),
(122, 'LA.mp3', 'Ang Mga Katinig'),
(123, 'MA.mp3', 'Ang Mga Katinig'),
(124, 'NA.mp3', 'Ang Mga Katinig'),
(125, 'NGA.mp3', 'Ang Mga Katinig'),
(126, 'RA.mp3', 'Ang Mga Katinig'),
(127, 'PA.mp3', 'Ang Mga Katinig'),
(128, 'SA.mp3', 'Ang Mga Katinig'),
(129, 'TA.mp3', 'Ang Mga Katinig'),
(130, 'YA.mp3', 'Ang Mga Katinig'),
(131, 'WA.mp3', 'Ang Mga Katinig'),
(132, 'BA.mp3', 'Ang Tunog Ba, Ka, Da'),
(133, 'BE (1).mp3', 'Ang Tunog Ba, Ka, Da'),
(134, 'BI.mp3', 'Ang Tunog Ba, Ka, Da'),
(135, 'BO.mp3', 'Ang Tunog Ba, Ka, Da'),
(136, 'BU.mp3', 'Ang Tunog Ba, Ka, Da'),
(137, 'DA.mp3', 'Ang Tunog Ba, Ka, Da'),
(138, 'DE.mp3', 'Ang Tunog Ba, Ka, Da'),
(139, 'DI.mp3', 'Ang Tunog Ba, Ka, Da'),
(140, 'DO.mp3', 'Ang Tunog Ba, Ka, Da'),
(141, 'KA.mp3', 'Ang Tunog Ba, Ka, Da'),
(142, 'DU.mp3', 'Ang Tunog Ba, Ka, Da'),
(143, 'KE.mp3', 'Ang Tunog Ba, Ka, Da'),
(144, 'KI.mp3', 'Ang Tunog Ba, Ka, Da'),
(145, 'KO.mp3', 'Ang Tunog Ba, Ka, Da'),
(146, 'KU.mp3', 'Ang Tunog Ba, Ka, Da'),
(147, 'e - Copy (2).mp3', 'test'),
(148, 'A (1) - Copy.mp3', 'test'),
(149, 'ii.mp3', 'test');

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
(26, 26, 'Ang Mga Patinig', '', 1, '2016-09-17 14:51:26', ''),
(27, 26, 'Ang Mga Katinig', '', 1, '2016-09-17 14:52:10', ''),
(28, 26, 'Ang Tunog Ba, Ka, Da', '', 1, '2016-09-17 14:53:12', ''),
(30, 39, 'test ', '', 1, '2016-09-17 18:39:26', '');

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
  `audio_id` int(11) NOT NULL,
  `board` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lesson_dtl`
--

INSERT INTO `lesson_dtl` (`id`, `lesson_id`, `filename`, `seconds`, `last_update`, `audio_id`, `board`) VALUES
(100, 26, 'aba.png', 3, '2016-09-17 06:56:36', 112, 1),
(101, 26, 'naka.png', 3, '2016-09-17 06:56:49', 113, 1),
(102, 26, 'kai.png', 3, '2016-09-17 06:57:00', 114, 1),
(103, 26, 'nis.png', 3, '2016-09-17 06:57:13', 115, 1),
(104, 26, 'naman.png', 3, '2016-09-17 06:57:22', 116, 1),
(105, 27, 'ba.png', 3, '2016-09-17 07:49:30', 117, 1),
(106, 27, 'ka.png', 3, '2016-09-17 07:49:55', 121, 1),
(107, 27, 'dah.png', 3, '2016-09-17 07:50:07', 118, 1),
(108, 27, 'gah.png', 3, '2016-09-17 07:50:26', 120, 1),
(109, 27, 'hah.png', 3, '2016-09-17 07:50:35', 119, 1),
(110, 27, 'lah.png', 3, '2016-09-17 07:50:45', 122, 2),
(111, 27, 'mah.png', 3, '2016-09-17 07:50:56', 123, 2),
(112, 27, 'nah.png', 3, '2016-09-17 07:51:12', 124, 2),
(113, 27, 'ngaa.png', 3, '2016-09-17 07:51:27', 125, 2),
(114, 27, 'pah.png', 3, '2016-09-17 07:51:40', 127, 2),
(115, 27, 'rah.png', 3, '2016-09-17 07:52:00', 126, 3),
(116, 27, 'sah.png', 3, '2016-09-17 07:52:11', 128, 3),
(117, 27, 'tah.png', 3, '2016-09-17 07:52:23', 129, 3),
(118, 27, 'wah.png', 3, '2016-09-17 07:52:43', 131, 3),
(119, 27, 'yah.png', 3, '2016-09-17 07:52:58', 130, 3),
(120, 28, 'baaa.png', 2, '2016-09-17 08:57:50', 132, 1),
(121, 28, 'be.png', 2, '2016-09-17 08:59:00', 133, 1),
(125, 28, 'bi.png', 2, '2016-09-17 09:01:41', 134, 1),
(126, 28, 'bo.png', 2, '2016-09-17 09:01:53', 135, 1),
(127, 28, 'bu.png', 2, '2016-09-17 09:02:01', 136, 1),
(128, 28, 'daaa.png', 2, '2016-09-17 09:02:30', 137, 2),
(129, 28, 'de.png', 2, '2016-09-17 09:02:37', 138, 2),
(130, 28, 'di.png', 2, '2016-09-17 09:02:46', 139, 2),
(131, 28, 'do.png', 2, '2016-09-17 09:02:59', 140, 2),
(132, 28, 'du.png', 2, '2016-09-17 09:03:10', 142, 2),
(133, 28, 'kaaa.png', 2, '2016-09-17 09:03:42', 141, 3),
(134, 28, 'ke.png', 2, '2016-09-17 09:03:52', 143, 3),
(135, 28, 'ki.png', 2, '2016-09-17 09:04:04', 144, 3),
(136, 28, 'ko.png', 2, '2016-09-17 09:04:14', 145, 3),
(138, 28, 'ku.png', 2, '2016-09-17 09:05:42', 146, 3),
(139, 30, 'wqewqe.png', 2, '2016-09-17 10:41:35', 147, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `message` varchar(255) DEFAULT NULL,
  `action` varchar(255) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `message`, `action`, `created_at`) VALUES
(1, 'Charles Marallag Log in.', 'User Log in', '2016-09-16 21:35:22'),
(2, 'ariane de leon Log in.', 'User Log in', '2016-09-16 21:35:39'),
(3, 'ariane de leon Log out.', 'User log out', '2016-09-16 22:05:50'),
(4, 'admin istrator Log in.', 'User Log in', '2016-09-16 22:05:55'),
(5, 'admin istrator Delete User [millet].', 'User Delete User', '2016-09-16 22:09:13'),
(6, 'admin istrator Delete User [01-2016-0005].', 'User Delete User', '2016-09-16 22:10:03'),
(7, 'Charles Marallag Log out.', 'User log out', '2016-09-16 22:24:47'),
(8, 'Charles Marallag Log in.', 'User Log in', '2016-09-16 22:24:59'),
(9, 'admin istrator Log out.', 'User log out', '2016-09-16 23:57:59'),
(10, 'Charles Marallag Log in.', 'User Log in', '2016-09-16 23:58:02'),
(11, 'Charles Marallag Log out.', 'User log out', '2016-09-16 23:58:56'),
(12, 'ariane de leon Log in.', 'User Log in', '2016-09-17 00:07:27'),
(13, 'ariane de leon Log out.', 'User log out', '2016-09-17 00:07:33'),
(14, 'admin istrator Log in.', 'User Log in', '2016-09-17 00:07:38'),
(15, 'admin istrator Log out.', 'User log out', '2016-09-17 00:27:07'),
(16, 'ariane de leon Log in.', 'User Log in', '2016-09-17 00:27:13'),
(17, 'ariane de leon Log out.', 'User log out', '2016-09-17 00:43:46'),
(18, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 00:43:54'),
(19, 'Charles Marallag Log out.', 'User log out', '2016-09-17 01:07:06'),
(20, 'ariane de leon Log in.', 'User Log in', '2016-09-17 01:07:09'),
(21, 'ariane de leon Log out.', 'User log out', '2016-09-17 01:22:24'),
(22, 'ariane de leon Log in.', 'User Log in', '2016-09-17 01:22:27'),
(23, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 05:22:54'),
(24, 'Charles Marallag Log out.', 'User log out', '2016-09-17 05:26:09'),
(25, 'ariane de leon Log in.', 'User Log in', '2016-09-17 05:26:36'),
(26, 'Ryan Dalaodao Log in.', 'User Log in', '2016-09-17 05:26:47'),
(27, 'Ryan Dalaodao Log out.', 'User log out', '2016-09-17 05:26:58'),
(28, 'Rose Marlyn Mijares Log in.', 'User Log in', '2016-09-17 05:27:04'),
(29, 'Rose Marlyn Mijares Log out.', 'User log out', '2016-09-17 05:27:19'),
(30, 'ariane de leon Log in.', 'User Log in', '2016-09-17 05:27:52'),
(31, 'ariane de leon Create User [01-2016-0004].', 'User Create User', '2016-09-17 05:28:40'),
(32, 'ariane de leon Updated profile', 'User Update Profile', '2016-09-17 05:28:58'),
(33, 'ariane de leon Added new Lesson Batas.', 'Add Lesson', '2016-09-17 05:29:19'),
(34, 'ariane de leon Log out.', 'User log out', '2016-09-17 05:40:12'),
(35, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 05:40:16'),
(36, 'Charles Marallag Log out.', 'User log out', '2016-09-17 05:40:37'),
(37, 'admin istrator Log in.', 'User Log in', '2016-09-17 05:40:45'),
(38, 'admin istrator Log out.', 'User log out', '2016-09-17 05:43:38'),
(39, 'ariane de leon Log in.', 'User Log in', '2016-09-17 05:43:45'),
(40, 'ariane de leon Updated profile', 'User Update Profile', '2016-09-17 05:43:56'),
(41, 'ariane de leon Added new Lesson LESSON1.', 'Add Lesson', '2016-09-17 05:49:55'),
(42, 'ariane de leon Added new Lesson LESSON2.', 'Add Lesson', '2016-09-17 05:52:00'),
(43, 'ariane de leon Added .', 'Add Lesson Content', '2016-09-17 05:54:19'),
(44, 'ariane de leon Added Alamat ng Pinya .', 'Add Story', '2016-09-17 05:56:03'),
(45, 'ariane de leon Updated Alamat Ng Pinya 1.', 'Update Story', '2016-09-17 05:56:18'),
(46, 'ariane de leon Log out.', 'User log out', '2016-09-17 05:57:17'),
(47, 'admin istrator Log in.', 'User Log in', '2016-09-17 05:57:24'),
(48, 'admin istrator Log out.', 'User log out', '2016-09-17 06:08:42'),
(49, 'ariane de leon Log in.', 'User Log in', '2016-09-17 06:08:46'),
(50, 'ariane de leon Deleted Lesson LESSON1.', 'Delete Lesson', '2016-09-17 06:08:58'),
(51, 'ariane de leon Added .', 'Add Lesson Content', '2016-09-17 06:10:12'),
(52, 'ariane de leon Added .', 'Add Lesson Content', '2016-09-17 06:10:22'),
(53, 'ariane de leon Added .', 'Add Lesson Content', '2016-09-17 06:10:33'),
(54, 'ariane de leon Added .', 'Add Lesson Content', '2016-09-17 06:10:44'),
(55, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 06:13:56'),
(56, 'ariane de leon Added Quiz 1.', 'Add Story', '2016-09-17 06:16:46'),
(57, 'ariane de leon Updated Quiz 1.', 'Update Story', '2016-09-17 06:16:52'),
(58, 'ariane de leon Added Quiz #6.', 'Add Quiz', '2016-09-17 06:22:33'),
(59, 'ariane de leon Deleted 47.', 'Add Quiz', '2016-09-17 06:22:38'),
(60, 'ariane de leon Added Quiz #2.', 'Add Quiz', '2016-09-17 06:23:25'),
(61, 'ariane de leon Log out.', 'User log out', '2016-09-17 06:23:31'),
(62, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 11:57:01'),
(63, 'Charles Marallag Log out.', 'User log out', '2016-09-17 11:58:32'),
(64, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 11:58:37'),
(65, 'ariane de leon Log in.', 'User Log in', '2016-09-17 12:37:50'),
(66, 'ariane de leon Added Alamat ng Pinya .', 'Add Story', '2016-09-17 12:38:21'),
(67, 'ariane de leon Updated Alamat Ng Pinya .', 'Update Story', '2016-09-17 12:38:31'),
(68, 'ariane de leon Deleted .', 'Delete Story', '2016-09-17 12:38:36'),
(69, 'ariane de leon Log out.', 'User log out', '2016-09-17 12:38:40'),
(70, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 12:39:06'),
(71, 'Charles Marallag Log out.', 'User log out', '2016-09-17 12:41:47'),
(72, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 12:41:54'),
(73, 'Charles Marallag Log out.', 'User log out', '2016-09-17 12:42:16'),
(74, 'ariane de leon Log in.', 'User Log in', '2016-09-17 12:42:23'),
(75, 'ariane de leon Updated profile', 'User Update Profile', '2016-09-17 12:45:49'),
(76, 'salome nevado Update User [01-2016-0001].', 'User Update User', '2016-09-17 12:48:26'),
(77, 'salome nevado Create User [].', 'User Create User', '2016-09-17 12:49:57'),
(78, 'salome nevado Update User [].', 'User Update User', '2016-09-17 12:51:19'),
(79, 'salome nevado Update User [].', 'User Update User', '2016-09-17 12:52:19'),
(80, 'salome nevado Update User [].', 'User Update User', '2016-09-17 12:52:44'),
(81, 'salome nevado Update User [].', 'User Update User', '2016-09-17 12:52:58'),
(82, 'salome nevado Delete User [].', 'User Delete User', '2016-09-17 12:53:10'),
(83, 'salome nevado Update User [01-2016-0001].', 'User Update User', '2016-09-17 12:53:26'),
(84, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 12:54:09'),
(85, 'Charles Marallag Log out.', 'User log out', '2016-09-17 12:54:56'),
(86, 'salome nevado Create User [].', 'User Create User', '2016-09-17 13:02:09'),
(87, 'salome nevado Delete User [].', 'User Delete User', '2016-09-17 13:02:28'),
(88, 'salome nevado Create User [].', 'User Create User', '2016-09-17 13:02:49'),
(89, 'salome nevado Update User [].', 'User Update User', '2016-09-17 13:07:05'),
(90, 'salome nevado Create User [11-2011-0038].', 'User Create User', '2016-09-17 13:09:45'),
(91, 'salome nevado Log out.', 'User log out', '2016-09-17 13:10:38'),
(92, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 13:11:27'),
(93, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 13:12:01'),
(94, 'Charles Marallag Log out.', 'User log out', '2016-09-17 13:12:13'),
(95, 'salome nevado Log in.', 'User Log in', '2016-09-17 13:12:23'),
(96, 'salome nevado Delete User [].', 'User Delete User', '2016-09-17 13:14:22'),
(97, 'salome nevado Create User [].', 'User Create User', '2016-09-17 13:15:20'),
(98, 'salome nevado Added new Lesson WHO YOU.', 'Add Lesson', '2016-09-17 13:20:25'),
(99, 'salome nevado Updated Lesson WHO YOU.', 'Update Lesson', '2016-09-17 13:21:02'),
(100, 'salome nevado Added .', 'Add Lesson Content', '2016-09-17 13:30:01'),
(101, 'salome nevado Added .', 'Add Lesson Content', '2016-09-17 13:30:12'),
(102, 'salome nevado Added .', 'Add Lesson Content', '2016-09-17 13:30:21'),
(103, 'salome nevado Added .', 'Add Lesson Content', '2016-09-17 13:30:31'),
(104, 'salome nevado Added .', 'Add Lesson Content', '2016-09-17 13:30:40'),
(105, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 13:31:13'),
(106, 'salome nevado Added Quiz #1.', 'Add Quiz', '2016-09-17 13:36:14'),
(107, 'salome nevado Added Quiz #2.', 'Add Quiz', '2016-09-17 13:40:28'),
(108, 'salome nevado Log out.', 'User log out', '2016-09-17 13:56:19'),
(109, 'salome nevado Log in.', 'User Log in', '2016-09-17 15:05:10'),
(110, 'salome nevado Log out.', 'User log out', '2016-09-17 15:05:17'),
(111, 'admin istrator Log in.', 'User Log in', '2016-09-17 15:05:27'),
(112, 'admin istrator Added new Lesson sdsada.', 'Add Lesson', '2016-09-17 15:48:13'),
(113, 'admin istrator Deleted Lesson sdsada.', 'Delete Lesson', '2016-09-17 15:48:59'),
(114, 'admin istrator Deleted Lesson Ang Mga Patinig.', 'Delete Lesson', '2016-09-17 15:49:04'),
(115, 'admin istrator Log out.', 'User log out', '2016-09-17 15:49:10'),
(116, 'salome nevado Log in.', 'User Log in', '2016-09-17 15:49:13'),
(117, 'salome nevado Log in.', 'User Log in', '2016-09-17 15:51:37'),
(118, 'salome nevado Delete User [].', 'User Delete User', '2016-09-17 15:54:51'),
(119, 'salome nevado Updated profile', 'User Update Profile', '2016-09-17 15:57:23'),
(120, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 16:00:45'),
(121, 'Charles Marallag Log out.', 'User log out', '2016-09-17 16:03:03'),
(122, ' nevado Log in.', 'User Log in', '2016-09-17 16:03:09'),
(123, ' nevado Updated profile', 'User Update Profile', '2016-09-17 16:03:27'),
(124, 'salome nevado Log out.', 'User log out', '2016-09-17 16:03:46'),
(125, 'admin istrator Log in.', 'User Log in', '2016-09-17 16:09:31'),
(126, 'admin istrator Delete User [teacher2].', 'User Delete User', '2016-09-17 16:09:54'),
(127, 'admin istrator Delete User [newadmin].', 'User Delete User', '2016-09-17 16:10:00'),
(128, 'admin istrator Create User [freya].', 'User Create User', '2016-09-17 16:13:45'),
(129, 'admin istrator Update User [freya].', 'User Update User', '2016-09-17 16:14:05'),
(130, 'admin istrator Log out.', 'User log out', '2016-09-17 16:14:17'),
(131, 'Freya Fortich Log in.', 'User Log in', '2016-09-17 16:14:43'),
(132, 'Freya Fortich Added new Lesson Ang Mga Patinig.', 'Add Lesson', '2016-09-17 16:15:13'),
(133, 'Freya Fortich Create User [01-2016-0010].', 'User Create User', '2016-09-17 16:16:23'),
(134, 'Freya Fortich Create User [01-2016-0011].', 'User Create User', '2016-09-17 16:18:34'),
(135, 'Freya Fortich Create User [01-2016-0012].', 'User Create User', '2016-09-17 16:32:55'),
(136, 'Freya Fortich Log out.', 'User log out', '2016-09-17 16:42:02'),
(137, 'salome nevado Log in.', 'User Log in', '2016-09-17 16:42:09'),
(138, 'Rebecca Mijares Log in.', 'User Log in', '2016-09-17 16:47:38'),
(139, 'Rebecca Mijares Log out.', 'User log out', '2016-09-17 17:47:15'),
(140, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 18:34:56'),
(141, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 18:34:56'),
(142, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 18:34:56'),
(143, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 18:34:56'),
(144, 'salome nevado Log in.', 'User Log in', '2016-09-17 18:40:42'),
(145, 'salome nevado Create User [].', 'User Create User', '2016-09-17 18:41:03'),
(146, 'salome nevado Log out.', 'User log out', '2016-09-17 18:45:04'),
(147, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 18:45:08'),
(148, 'Charles Marallag Log out.', 'User log out', '2016-09-17 18:48:16'),
(149, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 18:48:20'),
(150, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 18:50:46'),
(151, 'salome nevado Log in.', 'User Log in', '2016-09-17 18:52:56'),
(152, 'salome nevado Log out.', 'User log out', '2016-09-17 18:54:22'),
(153, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 18:54:27'),
(154, 'Charles Marallag Log out.', 'User log out', '2016-09-17 19:00:24'),
(155, 'Rose Marlyn Mijares Log in.', 'User Log in', '2016-09-17 19:31:49'),
(156, 'Rose Marlyn Mijares Log out.', 'User log out', '2016-09-17 19:32:01'),
(157, 'Freya Fortich Log in.', 'User Log in', '2016-09-17 19:34:14'),
(158, 'Freya Fortich Log out.', 'User log out', '2016-09-17 19:37:16'),
(159, 'salome nevado Log in.', 'User Log in', '2016-09-17 19:37:20'),
(160, 'salome nevado Log out.', 'User log out', '2016-09-17 19:37:35'),
(161, 'Freya Fortich Log in.', 'User Log in', '2016-09-17 19:37:46'),
(162, 'Freya Fortich Deleted Lesson Ang Mga Patinig.', 'Delete Lesson', '2016-09-17 19:40:37'),
(163, 'Freya Fortich Added new Lesson Ang Mga Patinig.', 'Add Lesson', '2016-09-17 19:40:46'),
(164, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 20:02:02'),
(165, 'Charles Marallag Log out.', 'User log out', '2016-09-17 20:04:28'),
(166, 'Freya Fortich Added new Lesson Ang Patinig.', 'Add Lesson', '2016-09-17 20:07:50'),
(167, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:12:24'),
(168, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:12:33'),
(169, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:12:49'),
(170, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:13:00'),
(171, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:13:10'),
(172, 'Freya Fortich Added new Lesson Pagkilala sa mga katinig.', 'Add Lesson', '2016-09-17 20:13:54'),
(173, 'Freya Fortich Log in.', 'User Log in', '2016-09-17 20:25:08'),
(174, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:26:14'),
(175, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:26:25'),
(176, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:28:22'),
(177, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:29:51'),
(178, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:30:06'),
(179, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:30:28'),
(180, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:30:39'),
(181, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:30:49'),
(182, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:30:58'),
(183, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:31:11'),
(184, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:31:23'),
(185, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:31:39'),
(186, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:31:52'),
(187, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:32:35'),
(188, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:33:34'),
(189, 'Freya Fortich Added new Lesson Ang Tunog Ba, Ka, Da.', 'Add Lesson', '2016-09-17 20:34:52'),
(190, 'Freya Fortich Added Pagsusulit Bilang 1.', 'Add Quiz', '2016-09-17 20:37:09'),
(191, 'Freya Fortich Added Pagsusulit Bilang 2.', 'Add Quiz', '2016-09-17 20:37:43'),
(192, 'Freya Fortich Added Pagsusulit Bilang 3.', 'Add Quiz', '2016-09-17 20:38:12'),
(193, 'Freya Fortich Added Pagsusulit Bilang 4.', 'Add Quiz', '2016-09-17 20:38:49'),
(194, 'Freya Fortich Added Pagsusulit Bilang 5.', 'Add Quiz', '2016-09-17 20:39:36'),
(195, 'Freya Fortich Added Pagsusulit Bilang 1.', 'Add Quiz', '2016-09-17 20:40:23'),
(196, 'Freya Fortich Added Pagsusulit Bilang 2.', 'Add Quiz', '2016-09-17 20:41:18'),
(197, 'Freya Fortich Deleted 56.', 'Add Quiz', '2016-09-17 20:41:50'),
(198, 'Freya Fortich Deleted 57.', 'Add Quiz', '2016-09-17 20:41:52'),
(199, 'Freya Fortich Added Pagsusulit Bilang 1.', 'Add Quiz', '2016-09-17 20:42:17'),
(200, 'Freya Fortich Added Pagsusulit Bilang 2.', 'Add Quiz', '2016-09-17 20:42:48'),
(201, 'Freya Fortich Added Pagsusulit Bilang 3.', 'Add Quiz', '2016-09-17 20:43:24'),
(202, 'Freya Fortich Added Pagsusulit Bilang 4.', 'Add Quiz', '2016-09-17 20:44:04'),
(203, 'Freya Fortich Added Pagsusulit Bilang 5.', 'Add Quiz', '2016-09-17 20:44:41'),
(204, 'Freya Fortich Updated Lesson kat.', 'Update Lesson', '2016-09-17 20:45:37'),
(205, 'Freya Fortich Updated Lesson Ang Mga Katinig.', 'Update Lesson', '2016-09-17 20:46:12'),
(206, 'Freya Fortich Deleted Lesson kat.', 'Delete Lesson', '2016-09-17 20:46:40'),
(207, 'Freya Fortich Added new Lesson Ang Mga Patinig.', 'Add Lesson', '2016-09-17 20:51:26'),
(208, 'Freya Fortich Added new Lesson Ang Mga Katinig.', 'Add Lesson', '2016-09-17 20:52:10'),
(209, 'Freya Fortich Added new Lesson Ang Tunog Ba, Ka, Da.', 'Add Lesson', '2016-09-17 20:53:12'),
(210, 'Freya Fortich Added new Lesson Ang Tunog La, Ma, Na.', 'Add Lesson', '2016-09-17 20:54:29'),
(211, 'Freya Fortich Updated Lesson Ang Tunog Ga, Ha, La.', 'Update Lesson', '2016-09-17 20:55:04'),
(212, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:56:36'),
(213, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:56:49'),
(214, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:57:00'),
(215, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:57:13'),
(216, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 20:57:22'),
(217, 'Freya Fortich Added Pagsusulit Bilang 1.', 'Add Quiz', '2016-09-17 21:45:33'),
(218, 'Freya Fortich Added Pagsusulit Bilang 2.', 'Add Quiz', '2016-09-17 21:46:49'),
(219, 'Freya Fortich Added Pagsusulit Bilang 3.', 'Add Quiz', '2016-09-17 21:47:24'),
(220, 'Freya Fortich Added Pagsusulit Bilang 4.', 'Add Quiz', '2016-09-17 21:48:02'),
(221, 'Freya Fortich Added Pagsusulit Bilang 5.', 'Add Quiz', '2016-09-17 21:48:59'),
(222, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:49:30'),
(223, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:49:55'),
(224, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:50:07'),
(225, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:50:26'),
(226, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:50:35'),
(227, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:50:45'),
(228, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:50:56'),
(229, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:51:12'),
(230, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:51:27'),
(231, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:51:40'),
(232, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:52:00'),
(233, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:52:11'),
(234, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:52:23'),
(235, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:52:43'),
(236, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 21:52:58'),
(237, 'Rebecca Mijares Log in.', 'User Log in', '2016-09-17 22:01:06'),
(238, 'Freya Fortich Added Pagsusulit Bilang 1.', 'Add Quiz', '2016-09-17 22:04:46'),
(239, 'Freya Fortich Added Pagsusulit Bilang 2.', 'Add Quiz', '2016-09-17 22:05:56'),
(240, 'Freya Fortich Added Pagsusulit Bilang 3.', 'Add Quiz', '2016-09-17 22:06:37'),
(241, 'Freya Fortich Added Alamat ng Pinya .', 'Add Story', '2016-09-17 22:09:31'),
(242, 'Freya Fortich Updated Alamat Ng Pinya .', 'Update Story', '2016-09-17 22:09:38'),
(243, 'Rebecca Mijares Log out.', 'User log out', '2016-09-17 22:09:58'),
(244, 'Charles Marallag Log in.', 'User Log in', '2016-09-17 22:10:02'),
(245, 'Freya Fortich Added Alamat ng Daliri.', 'Add Story', '2016-09-17 22:10:42'),
(246, 'Freya Fortich Updated Alamat Ng Daliri.', 'Update Story', '2016-09-17 22:10:49'),
(247, 'Charles Marallag Log out.', 'User log out', '2016-09-17 22:11:11'),
(248, 'Rebecca Mijares Log in.', 'User Log in', '2016-09-17 22:11:15'),
(249, 'Freya Fortich Deleted .', 'Delete Story', '2016-09-17 22:12:16'),
(250, 'Freya Fortich Added Alamat ng Pinya .', 'Add Story', '2016-09-17 22:13:12'),
(251, 'Freya Fortich Added Ang Leon At ang Daga.', 'Add Story', '2016-09-17 22:16:01'),
(252, 'Freya Fortich Updated Ang Leon At Ang Daga.', 'Update Story', '2016-09-17 22:16:09'),
(253, 'Freya Fortich Create User [01-2016-2555].', 'User Create User', '2016-09-17 22:20:18'),
(254, 'Freya Fortich Log out.', 'User log out', '2016-09-17 22:25:09'),
(255, 'admin istrator Log in.', 'User Log in', '2016-09-17 22:25:17'),
(256, 'admin istrator Create User [harlequin].', 'User Create User', '2016-09-17 22:26:44'),
(257, 'admin istrator Update User [harlequin].', 'User Update User', '2016-09-17 22:26:58'),
(258, 'admin istrator Log out.', 'User log out', '2016-09-17 22:27:26'),
(259, 'margot robbie Log in.', 'User Log in', '2016-09-17 22:27:35'),
(260, 'margot robbie Create User [01-2016-0030].', 'User Create User', '2016-09-17 22:28:46'),
(261, 'margot robbie Create User [01-2016-0031].', 'User Create User', '2016-09-17 22:29:24'),
(262, 'margot robbie Log out.', 'User log out', '2016-09-17 22:29:49'),
(263, 'admin istrator Log in.', 'User Log in', '2016-09-17 22:29:55'),
(264, 'admin istrator Create User [Kanaba].', 'User Create User', '2016-09-17 22:32:58'),
(265, 'admin istrator Update User [Kanaba].', 'User Update User', '2016-09-17 22:33:22'),
(266, 'admin istrator Log out.', 'User log out', '2016-09-17 22:33:28'),
(267, 'margot robbie Log in.', 'User Log in', '2016-09-17 22:33:50'),
(268, 'margot robbie Updated profile', 'User Update Profile', '2016-09-17 22:34:16'),
(269, 'margot robbie Log out.', 'User log out', '2016-09-17 22:43:00'),
(270, 'admin istrator Log in.', 'User Log in', '2016-09-17 22:43:07'),
(271, 'admin istrator Create User [nana].', 'User Create User', '2016-09-17 22:43:42'),
(272, 'admin istrator Create User [teacher45].', 'User Create User', '2016-09-17 22:45:20'),
(273, 'admin istrator Log out.', 'User log out', '2016-09-17 22:45:44'),
(274, 'margot robbie Log in.', 'User Log in', '2016-09-17 22:46:02'),
(275, 'margot robbie Log out.', 'User log out', '2016-09-17 22:47:00'),
(276, 'margot robbie Log in.', 'User Log in', '2016-09-17 22:47:22'),
(277, 'margot robbie Log out.', 'User log out', '2016-09-17 22:48:59'),
(278, 'salome nevado Log in.', 'User Log in', '2016-09-17 22:49:03'),
(279, 'salome nevado Log out.', 'User log out', '2016-09-17 22:49:09'),
(280, 'Freya Fortich Log in.', 'User Log in', '2016-09-17 22:50:25'),
(281, 'Freya Fortich Log out.', 'User log out', '2016-09-17 22:51:38'),
(282, 'Freya Fortich Log in.', 'User Log in', '2016-09-17 22:51:56'),
(283, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 22:57:50'),
(284, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 22:59:00'),
(285, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 22:59:11'),
(286, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:00:14'),
(287, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:00:28'),
(288, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:01:41'),
(289, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:01:53'),
(290, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:02:01'),
(291, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:02:30'),
(292, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:02:37'),
(293, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:02:46'),
(294, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:02:59'),
(295, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:03:10'),
(296, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:03:42'),
(297, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:03:52'),
(298, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:04:04'),
(299, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:04:14'),
(300, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:04:22'),
(301, 'Freya Fortich Deleted Lesson Ang Tunog Ga, Ha, La.', 'Delete Lesson', '2016-09-17 23:05:10'),
(302, 'Freya Fortich Added .', 'Add Lesson Content', '2016-09-17 23:05:42'),
(303, 'Rebecca Mijares Log out.', 'User log out', '2016-09-17 23:58:30'),
(304, 'Charles Marallag Log in.', 'User Log in', '2016-09-18 00:00:34'),
(305, 'Charles Marallag Log out.', 'User log out', '2016-09-18 00:00:54'),
(306, 'Freya Fortich Added Pagsusulit Bilang 1.', 'Add Quiz', '2016-09-18 00:02:03'),
(307, 'Freya Fortich Added Pagsusulit Bilang 2.', 'Add Quiz', '2016-09-18 00:02:49'),
(308, 'Freya Fortich Added Pagsusulit Bilang 3.', 'Add Quiz', '2016-09-18 00:03:28'),
(309, 'Freya Fortich Added Pagsusulit Bilang 4.', 'Add Quiz', '2016-09-18 00:04:03'),
(310, 'Freya Fortich Added Pagsusulit Bilang 5.', 'Add Quiz', '2016-09-18 00:04:52'),
(311, 'Freya Fortich Added Pagsusulit Bilang 6.', 'Add Quiz', '2016-09-18 00:05:42'),
(312, 'Freya Fortich Deleted .', 'Delete Story', '2016-09-18 00:06:15'),
(313, 'Freya Fortich Added Si Pagong at si matsing.', 'Add Story', '2016-09-18 00:07:03'),
(314, 'Freya Fortich Updated Si Pagong At Si Matsing.', 'Update Story', '2016-09-18 00:07:09'),
(315, 'noy now Log in.', 'User Log in', '2016-09-18 00:07:24'),
(316, 'Freya Fortich Delete User [01-2016-2555].', 'User Delete User', '2016-09-18 00:08:51'),
(317, 'Freya Fortich Deleted 76.', 'Add Quiz', '2016-09-18 00:09:04'),
(318, 'noy now Log out.', 'User log out', '2016-09-18 00:22:31'),
(319, 'Rebecca Mijares Log in.', 'User Log in', '2016-09-18 00:23:07'),
(320, 'Princess Devera Log in.', 'User Log in', '2016-09-18 00:27:06'),
(321, 'Princess Devera Log out.', 'User log out', '2016-09-18 00:32:27'),
(322, 'Princess Devera Log in.', 'User Log in', '2016-09-18 00:32:35'),
(323, 'Princess Devera Log out.', 'User log out', '2016-09-18 00:32:59'),
(324, 'Princess Devera Log in.', 'User Log in', '2016-09-18 00:33:12'),
(325, 'Princess Devera Log out.', 'User log out', '2016-09-18 00:33:58'),
(326, 'Freya Fortich Create User [01-2016-0013].', 'User Create User', '2016-09-18 00:34:50'),
(327, 'Joseph tams Log in.', 'User Log in', '2016-09-18 00:35:08'),
(328, 'Freya Fortich Log out.', 'User log out', '2016-09-18 00:35:21'),
(329, 'admin istrator Log in.', 'User Log in', '2016-09-18 00:35:27'),
(330, 'admin istrator Create User [cynthia].', 'User Create User', '2016-09-18 00:36:21'),
(331, 'admin istrator Log out.', 'User log out', '2016-09-18 00:36:29'),
(332, 'Cynthia Cardillera Log in.', 'User Log in', '2016-09-18 00:36:37'),
(333, 'Cynthia Cardillera Added Tamad si Juan.', 'Add Story', '2016-09-18 00:37:40'),
(334, 'Cynthia Cardillera Updated Tamad Si Juan.', 'Update Story', '2016-09-18 00:37:47'),
(335, 'Cynthia Cardillera Create User [01-2016-0040].', 'User Create User', '2016-09-18 00:38:15'),
(336, 'Joseph tams Log out.', 'User log out', '2016-09-18 00:38:30'),
(337, 'Carolina Manilyn Log in.', 'User Log in', '2016-09-18 00:38:33'),
(338, 'Cynthia Cardillera Added new Lesson test .', 'Add Lesson', '2016-09-18 00:39:26'),
(339, 'Cynthia Cardillera Added .', 'Add Lesson Content', '2016-09-18 00:41:35'),
(340, 'Cynthia Cardillera Added .', 'Add Lesson Content', '2016-09-18 00:41:46'),
(341, 'Cynthia Cardillera Updated profile', 'User Update Profile', '2016-09-18 00:42:52'),
(342, 'Cynthia Cardillere Log out.', 'User log out', '2016-09-18 00:43:04'),
(343, 'Cynthia Cardillere Log in.', 'User Log in', '2016-09-18 00:43:12'),
(344, 'Cynthia Cardillere Log out.', 'User log out', '2016-09-18 00:47:45'),
(345, 'Carolina Manilyn Log out.', 'User log out', '2016-09-18 00:47:56'),
(346, 'Joseph tams Log in.', 'User Log in', '2016-09-18 00:48:02'),
(347, 'Joseph tams Log out.', 'User log out', '2016-09-18 00:51:41'),
(348, 'admin istrator Log in.', 'User Log in', '2016-09-18 00:52:24'),
(349, 'admin istrator Delete User [newTeacher].', 'User Delete User', '2016-09-18 00:52:38'),
(350, 'admin istrator Delete User [cynthia].', 'User Delete User', '2016-09-18 00:52:47'),
(351, 'admin istrator Log out.', 'User log out', '2016-09-18 00:53:16'),
(352, 'Freya Fortich Log in.', 'User Log in', '2016-09-18 00:53:26'),
(353, 'Samantha Columbres Log in.', 'User Log in', '2016-09-18 00:53:56'),
(354, 'Freya Fortich Log out.', 'User log out', '2016-09-18 01:07:02'),
(355, 'Freya Fortich Log in.', 'User Log in', '2016-09-18 01:07:13');

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
(63, 26, 'Pagsusulit Bilang 1', 'A (1).mp3', '2', 'salita', 'naka.png', 'aba.png', 'kai.png', 'naman.png'),
(64, 26, 'Pagsusulit Bilang 2', '00.mp3', '4', 'salita', 'aba.png', 'naka.png', 'kai.png', 'nis.png'),
(65, 26, 'Pagsusulit Bilang 3', 'e.mp3', '2', 'salita', 'naman.png', 'naka.png', 'kai.png', 'nis.png'),
(66, 26, 'Pagsusulit Bilang 4', 'uu.mp3', '1', 'salita', 'naman.png', 'naka.png', 'aba.png', 'nis.png'),
(67, 26, 'Pagsusulit Bilang 5', 'ii.mp3', '3', 'salita', 'aba.png', 'naman.png', 'kai.png', 'naka.png'),
(68, 27, 'Pagsusulit Bilang 1', 'KA.mp3', '3', 'naiiba', 'gah.png', 'gah.png', 'ka.png', 'gah.png'),
(69, 27, 'Pagsusulit Bilang 2', 'NA.mp3', '4', 'naiiba', 'aba.png', 'naka.png', 'kai.png', 'nah.png'),
(70, 27, 'Pagsusulit Bilang 3', 'YA.mp3', '2', 'salita', 'wah.png', 'yah.png', 'wah.png', 'wah.png'),
(71, 28, 'Pagsusulit Bilang 1', 'BO - Copy.mp3', '4', 'naiiba', 'ka.png', 'dah.png', 'ba.png', 'bo.png'),
(72, 28, 'Pagsusulit Bilang 2', 'DI - Copy (2).mp3', '1', 'naiiba', 'di.png', 'du.png', 'do.png', 'daaa.png'),
(73, 28, 'Pagsusulit Bilang 3', 'KE.mp3', '2', 'naiiba', 'ko.png', 'ke.png', 'ko.png', 'ko.png'),
(74, 28, 'Pagsusulit Bilang 4', 'KI - Copy (2).mp3', '3', 'salita', 'ke.png', 'ke.png', 'ki.png', 'ke.png'),
(75, 28, 'Pagsusulit Bilang 5', 'BA (1).mp3', '2', 'salita', 'daaa.png', 'baaa.png', 'du.png', 'do.png');

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
  `last_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remarks` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz_result`
--

INSERT INTO `quiz_result` (`id`, `lesson_id`, `user_id`, `score`, `total_number`, `quiz_date`, `quiz_status`, `last_update`, `remarks`) VALUES
(58, 26, 27, '1', '5', '2016-09-17 17:16:02', 0, '2016-09-17 15:16:36', 'Pagbutihin pa'),
(59, 26, 27, '4', '5', '2016-09-17 17:16:42', 0, '2016-09-17 15:17:12', 'Sobrang Magaling'),
(60, 26, 27, '5', '5', '2016-09-17 17:17:16', 0, '2016-09-17 15:17:50', 'Napakagaling'),
(61, 27, 27, '2', '3', '2016-09-17 17:18:58', 0, '2016-09-17 15:21:04', 'Magaling'),
(62, 27, 27, '3', '3', '2016-09-17 17:21:07', 0, '2016-09-17 15:46:15', 'Napakagaling'),
(63, 26, 28, '3', '5', '2016-09-17 18:27:21', 0, '2016-09-17 16:28:46', ''),
(64, 26, 28, '4', '5', '2016-09-17 18:28:51', 0, '2016-09-17 16:29:39', ''),
(65, 26, 28, '4', '5', '2016-09-17 18:29:43', 0, '2016-09-17 16:30:18', ''),
(66, 27, 28, '3', '3', '2016-09-17 18:30:23', 0, '2016-09-17 16:30:44', ''),
(67, 27, 28, '3', '3', '2016-09-17 18:30:49', 0, '2016-09-17 16:31:15', ''),
(68, 27, 28, '3', '3', '2016-09-17 18:31:20', 0, '2016-09-17 16:31:34', ''),
(69, 28, 28, '5', '5', '2016-09-17 18:31:40', 0, '2016-09-17 16:32:19', ''),
(70, 26, 29, '4', '5', '2016-09-17 18:48:27', 0, '2016-09-17 16:49:00', ''),
(71, 26, 29, '5', '5', '2016-09-17 18:49:04', 0, '2016-09-17 16:49:35', ''),
(72, 26, 29, '5', '5', '2016-09-17 18:49:38', 0, '2016-09-17 16:50:06', ''),
(73, 27, 29, '3', '3', '2016-09-17 18:50:10', 0, '2016-09-17 16:50:28', ''),
(74, 27, 29, '3', '3', '2016-09-17 18:50:33', 0, '2016-09-17 16:50:50', ''),
(75, 27, 29, '2', '3', '2016-09-17 18:50:54', 0, '2016-09-17 16:51:07', ''),
(76, 26, 38, '2', '5', '2016-09-17 18:54:28', 0, '2016-09-17 16:54:55', ''),
(77, 26, 38, '2', '5', '2016-09-17 18:55:00', 0, '2016-09-17 16:55:28', ''),
(78, 26, 38, '2', '5', '2016-09-17 18:55:32', 0, '2016-09-17 16:56:03', ''),
(79, 27, 38, '2', '3', '2016-09-17 18:56:07', 0, '2016-09-17 16:56:24', ''),
(80, 27, 38, '2', '3', '2016-09-17 18:56:27', 0, '2016-09-17 16:56:41', ''),
(81, 27, 38, '3', '3', '2016-09-17 18:56:45', 0, '2016-09-17 16:56:58', ''),
(82, 28, 38, '3', '5', '2016-09-17 18:57:02', 0, '2016-09-17 16:57:34', ''),
(83, 28, 38, '4', '5', '2016-09-17 18:57:38', 0, '2016-09-17 16:58:06', ''),
(84, 28, 38, '5', '5', '2016-09-17 18:58:10', 0, '2016-09-17 16:58:35', '');

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
(13, 26, 'Alamat Ng Daliri', 'Sampung Mga Daliri', 'ANG ALAMAT NG MGA DALIRI.mp4', 1, '2016-09-17 08:10:42'),
(15, 26, 'Ang Leon At Ang Daga', 'Aq At Si Mahal', 'Ang Leon at ang Daga - Mga Pabula ni Aesop - Mga Kuwentong Pambata - Filipino Fairy Tales.mp4', 1, '2016-09-17 08:16:01'),
(16, 26, 'Si Pagong At Si Matsing', 'Si Ako At Si Ikaw', 'Epic Story of Pagong and Matsing (COMSO17A animation project).mp4', 1, '2016-09-17 10:07:03'),
(17, 39, 'Tamad Si Juan', 'Sdsa', 'Juan Tamad.mp4', 1, '2016-09-17 10:37:40');

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
(2, 2, 0, 'teacher', 'pass', 'salome', '', 'nevado', 'salomenevado@yahoo.com', '093656413912', '80 tolentino st. CRC bldg. S.F.D.M', 1, '2016-09-17 02:03:27', '', 0),
(3, 3, 0, 'yvette', 'pass', 'yvette', '', 'de leon', 'arianeburnscode@yahoo.com', '09422916120', 'aa', 1, '2016-02-18 20:05:14', '', 0),
(11, 1, 0, 'admin2', '1234', 'charles', 'm', 'marallag', 'charles_darwin_marallag@yahoo.com', '09265686310', 'QC', 1, '0000-00-00 00:00:00', '', 0),
(15, 4, 0, '01-2016-0001', '', 'Charles', 'D', 'Marallag', '', '', 'muÃ±oz', 1, '2016-09-16 22:53:26', '57c81d6b88d1c', 2),
(16, 4, 0, '01-2016-0002', '', 'Ryan', 'D', 'Dalaodao', '', '', 'aaaa', 1, '0000-00-00 00:00:00', '57c81e013e525', 2),
(17, 4, 0, '01-2016-0000', '', 'Rose Marlyn', 'Bugos', 'Mijares', '', '', '200 kaliraya Street cluster 28 tatalon', 1, '0000-00-00 00:00:00', '57c90c2191c51', 9),
(18, 4, 0, '01-2016-0003', '', 'Rose Marlyn', 'Bugos', 'Mijares', '', '', '200 kaliraya Street cluster 28 tatalon', 1, '0000-00-00 00:00:00', '57cfdea7c8057', 2),
(20, 4, 0, '01-2016-0004', '', 'runnel', 's', 'fortich', '', '', 'rotc huunters', 1, '0000-00-00 00:00:00', '57dc640844f10', 2),
(24, 4, 0, '11-2011-0038', '', 'jdsdfjdflkdf', 'wefiwejhfoiwf', 'dfhjwefijwefpnh', '', '', 'wdoifjweifjwoiefj', 1, '0000-00-00 00:00:00', '57dcd0194c860', 2),
(26, 2, 0, 'freya', 'michelle', 'Freya', '', 'Fortich', 'freyafortich@gmail.com', '09464461156', '96 ROTC Hunters, Tatalon Quezon City', 1, '2016-09-17 02:14:05', '', 0),
(27, 4, 0, '01-2016-0010', '', 'Rebecca', 'Bugos', 'Mijares', '', '', '11830 91 STREET NW, Edmonton', 1, '0000-00-00 00:00:00', '57dcfbd71f927', 26),
(28, 4, 0, '01-2016-0011', '', 'Princess', 'Dunca', 'Devera', '', '', 'Santa Terisita St. banawe', 1, '0000-00-00 00:00:00', '57dcfc5ab157b', 26),
(29, 4, 0, '01-2016-0012', '', 'Joseph', 'Danilo', 'tams', '', '', 'Tatalon Cluster 13 Quezon City', 1, '0000-00-00 00:00:00', '57dcffb785e9d', 26),
(30, 4, 0, '', '', 'ewqe', '', 'qwewq', '', '', '', 1, '0000-00-00 00:00:00', '57dd1dbf1efad', 2),
(32, 2, 0, 'harlequin', 'ganda', 'margot', '', 'robbie', 'margotrobbie@gmail.com', '09465515560', 'ooooo', 1, '2016-09-16 20:34:16', '', 0),
(33, 4, 0, '01-2016-0030', '', 'noy', 'nou', 'now', '', '', 'dkjl;sd', 1, '0000-00-00 00:00:00', '57dd531e2fff0', 32),
(34, 4, 0, '01-2016-0031', '', 'now', 'need', 'lang', '', '', 'dmsjd', 1, '0000-00-00 00:00:00', '57dd53441fae2', 32),
(35, 2, 0, 'Kanaba', 'asan', 'Tin', '', 'Asan', 'tintin@yahoo.com', '09282262875', 'asan', 1, '2016-09-16 20:33:22', '', 0),
(36, 1, 0, 'nana', 'nana', 'nana', 'nana', 'nna', 'nana@gmail.com', '09464461156', 'nanana', 1, '0000-00-00 00:00:00', '', 0),
(37, 2, 0, 'teacher45', '1234', 'Rose Marlyn', '', 'Mijares', 'vic2ria_918@yahoo.com', '09464461156', '200 kaliraya Street cluster 28 tatalon', 1, '0000-00-00 00:00:00', '', 0),
(38, 4, 0, '01-2016-0013', '', 'Samantha', 'Nicole', 'Columbres', '', '', 'tatalon', 1, '0000-00-00 00:00:00', '57dd70aa442c1', 26),
(40, 4, 0, '01-2016-0040', '', 'Carolina', 'bebe', 'Manilyn', '', '', 'sahdsajkd', 1, '0000-00-00 00:00:00', '57dd7177ac1d7', 39);

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
-- Indexes for table `logs`
--
ALTER TABLE `logs`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT for table `choice`
--
ALTER TABLE `choice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `lesson`
--
ALTER TABLE `lesson`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `lesson_dtl`
--
ALTER TABLE `lesson_dtl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=356;
--
-- AUTO_INCREMENT for table `parents`
--
ALTER TABLE `parents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `quiz_result`
--
ALTER TABLE `quiz_result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `quiz_take`
--
ALTER TABLE `quiz_take`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `story`
--
ALTER TABLE `story`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
