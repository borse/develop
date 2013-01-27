-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2013 at 08:29 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_develop`
--

-- --------------------------------------------------------

--
-- Table structure for table `developers`
--

CREATE TABLE IF NOT EXISTS `developers` (
  `member_id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `login` varchar(100) NOT NULL DEFAULT '',
  `passwd` varchar(32) NOT NULL DEFAULT '',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `developers`
--

INSERT INTO `developers` (`member_id`, `firstname`, `lastname`, `login`, `passwd`, `timestamp`) VALUES
(5, 'Ali', 'Abdulla', 'ali_abdulla3', '31920d93634d21faa8d374e6a6083f60', '0000-00-00 00:00:00'),
(6, 'Ahmad', 'Zaki', 'amzraptor', 'f86256146c8078c3b3c0f577a40c954c', '0000-00-00 00:00:00'),
(7, 'Ahmed', 'El Shenawy', 'Shenawy', '3d0b54f4abdad42ff078fd43b21f357f', '0000-00-00 00:00:00'),
(9, 'M', 'A', 'MA', 'e882b72bccfc2ad578c27b0d9b472a14', '0000-00-00 00:00:00'),
(10, 'Mohammed', 'ElGamal', 'Moecamel', '42f646d0b80f496c54b5a6d2c9d922e1', '0000-00-00 00:00:00'),
(11, 'mahmood', 'salah', 'mss3331', '9aee390f19345028f03bb16c588550e1', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE IF NOT EXISTS `folders` (
  `folder_id` int(11) NOT NULL AUTO_INCREMENT,
  `site_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `parent_id` int(11) NOT NULL,
  `path` text NOT NULL,
  PRIMARY KEY (`folder_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`folder_id`, `site_id`, `name`, `parent_id`, `path`) VALUES
(1, 1, 'develop', 0, ''),
(2, 2, 'inter-rent', 0, ''),
(3, 1, 'functions', 1, 'develop/'),
(4, 1, 'index', 3, 'develop/functions/'),
(5, 1, 'update', 3, 'develop/functions/'),
(6, 1, 'images', 1, 'develop/'),
(7, 1, 'register-form', 6, 'develop/images/'),
(8, 1, 'register-form-icons', 7, 'develop/images/register-form'),
(9, 1, 'js', 1, 'develop/'),
(10, 1, 'scripts', 9, 'develop/js/'),
(11, 1, 'minicode', 1, 'develop/'),
(12, 2, 'css', 2, 'inter-rent/'),
(13, 2, 'model', 12, 'inter-rent/css/'),
(14, 2, 'functions', 2, 'inter-rent/'),
(15, 2, 'images', 2, 'inter-rent/'),
(16, 2, 'register-form', 15, 'inter-rent/images/'),
(17, 2, 'register-form-icons', 16, 'inter-rent/images/register-form/'),
(18, 2, 'items', 2, 'inter-rent/'),
(19, 2, 'js', 2, 'inter-rent/'),
(20, 2, 'minicode', 2, 'inter-rent/'),
(25, 1, 'css', 1, 'develop/'),
(31, 1, 'full-list', 3, ''),
(32, 1, 'mahmood', 1, ''),
(33, 1, 'zaki', 1, ''),
(34, 1, 'ex', 33, ''),
(35, 1, 'das', 33, '');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `page_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `folder_id` int(11) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`page_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `name`, `folder_id`, `timestamp`) VALUES
(2, 'index.php', 2, '0000-00-00 00:00:00'),
(3, 'login-form.php', 2, '0000-00-00 00:00:00'),
(4, 'test.php', 2, '0000-00-00 00:00:00'),
(5, 'login-exec.php', 2, '2013-01-11 21:00:00'),
(6, 'register-form.php', 2, '0000-00-00 00:00:00'),
(7, 'index.php', 1, '0000-00-00 00:00:00'),
(8, 'Develop', 0, '0000-00-00 00:00:00'),
(9, 'General-Ideas', 3, '0000-00-00 00:00:00'),
(10, 'member-index.php', 2, '0000-00-00 00:00:00'),
(11, 'items-add-images-form.php', 2, '0000-00-00 00:00:00'),
(12, 'tutorials', 1, '0000-00-00 00:00:00'),
(13, 'register-form.js', 9, '0000-00-00 00:00:00'),
(14, 'item-form.php', 2, '0000-00-00 00:00:00'),
(15, 'insert_update.php', 5, '0000-00-00 00:00:00'),
(16, 'update.php', 1, '0000-00-00 00:00:00'),
(17, 'full-list.php', 1, '0000-00-00 00:00:00'),
(18, 'intra-rent', 0, '2013-01-06 14:59:32'),
(30, 'draw_map.php', 31, '2013-01-13 20:09:19'),
(31, 'popup_box.php', 31, '2013-01-13 20:15:39'),
(32, 'mahmood.html', 32, '2013-01-13 21:15:38'),
(33, 'zakipage', 33, '2013-01-14 00:29:48'),
(34, 'zaki2', 33, '2013-01-14 00:30:05'),
(35, 'asd', 33, '2013-01-16 22:23:49'),
(36, 'asf', 33, '2013-01-16 22:25:15'),
(37, 'a', 0, '2013-01-16 22:32:56'),
(38, '', 0, '2013-01-16 22:35:01'),
(39, 'ffffff', 33, '2013-01-16 22:36:43'),
(40, 'more examasdasd', 33, '2013-01-17 03:06:49'),
(41, 'fasf', 33, '2013-01-17 03:09:55'),
(42, 'asdasd', 1, '2013-01-17 03:16:17'),
(43, 'ssssss', 34, '2013-01-17 03:16:52'),
(44, 'exac', 33, '2013-01-17 03:18:59'),
(45, 'asfasf', 33, '2013-01-17 03:20:22'),
(46, 'tf', 33, '2013-01-17 03:24:29');

-- --------------------------------------------------------

--
-- Table structure for table `sites`
--

CREATE TABLE IF NOT EXISTS `sites` (
  `site_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`site_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `sites`
--

INSERT INTO `sites` (`site_id`, `name`) VALUES
(1, 'Developing site'),
(2, 'inter-rent');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `tag_ID` int(11) NOT NULL AUTO_INCREMENT,
  `to_do_id` int(11) NOT NULL,
  `creator_dev_id` int(11) NOT NULL,
  `appointed_dev_id` int(11) NOT NULL,
  `to_do_update_id` int(11) NOT NULL,
  `tag_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isRead` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`tag_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=133 ;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`tag_ID`, `to_do_id`, `creator_dev_id`, `appointed_dev_id`, `to_do_update_id`, `tag_timestamp`, `isRead`) VALUES
(1, 10, 5, 6, 41, '0000-00-00 00:00:00', 1),
(2, 10, 5, 10, 41, '0000-00-00 00:00:00', 1),
(3, 10, 5, 7, 42, '0000-00-00 00:00:00', 1),
(4, 10, 5, 6, 42, '0000-00-00 00:00:00', 1),
(5, 14, 12, 5, 44, '0000-00-00 00:00:00', 0),
(6, 10, 5, 7, 45, '0000-00-00 00:00:00', 1),
(7, 10, 5, 7, 46, '0000-00-00 00:00:00', 0),
(8, 10, 5, 9, 48, '0000-00-00 00:00:00', 1),
(9, 10, 5, 7, 49, '0000-00-00 00:00:00', 1),
(10, 10, 5, 7, 50, '0000-00-00 00:00:00', 1),
(11, 10, 5, 5, 51, '0000-00-00 00:00:00', 1),
(12, 10, 5, 7, 52, '0000-00-00 00:00:00', 1),
(13, 10, 5, 9, 53, '0000-00-00 00:00:00', 1),
(14, 10, 5, 9, 54, '0000-00-00 00:00:00', 1),
(15, 10, 5, 9, 55, '0000-00-00 00:00:00', 1),
(16, 10, 5, 9, 56, '0000-00-00 00:00:00', 1),
(17, 10, 5, 9, 57, '0000-00-00 00:00:00', 1),
(18, 10, 5, 9, 59, '0000-00-00 00:00:00', 1),
(19, 10, 5, 9, 60, '0000-00-00 00:00:00', 1),
(20, 10, 5, 9, 61, '0000-00-00 00:00:00', 1),
(21, 10, 5, 7, 61, '0000-00-00 00:00:00', 1),
(22, 10, 5, 9, 62, '0000-00-00 00:00:00', 1),
(23, 10, 5, 7, 62, '0000-00-00 00:00:00', 1),
(24, 10, 5, 9, 63, '0000-00-00 00:00:00', 1),
(25, 10, 5, 7, 63, '0000-00-00 00:00:00', 1),
(26, 10, 5, 5, 64, '0000-00-00 00:00:00', 1),
(29, 10, 5, 7, 67, '0000-00-00 00:00:00', 1),
(30, 10, 5, 7, 68, '0000-00-00 00:00:00', 1),
(31, 10, 5, 6, 69, '0000-00-00 00:00:00', 1),
(32, 10, 5, 11, 69, '0000-00-00 00:00:00', 1),
(33, 10, 5, 6, 70, '0000-00-00 00:00:00', 1),
(34, 10, 5, 11, 70, '0000-00-00 00:00:00', 1),
(35, 10, 5, 6, 71, '0000-00-00 00:00:00', 1),
(36, 10, 5, 11, 71, '0000-00-00 00:00:00', 1),
(37, 10, 5, 6, 71, '0000-00-00 00:00:00', 1),
(38, 10, 5, 10, 71, '0000-00-00 00:00:00', 1),
(39, 10, 5, 7, 72, '0000-00-00 00:00:00', 1),
(40, 10, 5, 6, 73, '0000-00-00 00:00:00', 1),
(41, 10, 5, 11, 73, '0000-00-00 00:00:00', 1),
(42, 10, 5, 7, 75, '0000-00-00 00:00:00', 1),
(43, 10, 5, 11, 75, '0000-00-00 00:00:00', 1),
(44, 10, 5, 5, 75, '0000-00-00 00:00:00', 1),
(45, 10, 5, 6, 77, '0000-00-00 00:00:00', 1),
(46, 11, 5, 6, 79, '0000-00-00 00:00:00', 1),
(47, 11, 5, 7, 80, '0000-00-00 00:00:00', 1),
(48, 10, 5, 6, 81, '0000-00-00 00:00:00', 1),
(49, 10, 5, 7, 81, '0000-00-00 00:00:00', 1),
(50, 10, 5, 6, 82, '0000-00-00 00:00:00', 1),
(51, 10, 5, 10, 82, '0000-00-00 00:00:00', 1),
(52, 10, 5, 7, 83, '0000-00-00 00:00:00', 1),
(53, 10, 5, 11, 83, '0000-00-00 00:00:00', 1),
(54, 10, 5, 5, 84, '0000-00-00 00:00:00', 1),
(55, 10, 5, 10, 84, '0000-00-00 00:00:00', 1),
(56, 10, 11, 5, 85, '0000-00-00 00:00:00', 1),
(57, 13, 11, 7, 86, '0000-00-00 00:00:00', 1),
(58, 10, 11, 6, 87, '0000-00-00 00:00:00', 1),
(59, 26, 6, 7, 88, '0000-00-00 00:00:00', 1),
(60, 26, 6, 5, 89, '0000-00-00 00:00:00', 1),
(61, 26, 6, 9, 89, '0000-00-00 00:00:00', 1),
(62, 26, 11, 5, 90, '0000-00-00 00:00:00', 1),
(63, 10, 5, 7, 92, '0000-00-00 00:00:00', 1),
(64, 10, 5, 6, 92, '0000-00-00 00:00:00', 1),
(65, 34, 5, 10, 93, '0000-00-00 00:00:00', 1),
(66, 34, 5, 6, 94, '0000-00-00 00:00:00', 1),
(67, 10, 5, 6, 95, '0000-00-00 00:00:00', 1),
(68, 10, 5, 10, 96, '0000-00-00 00:00:00', 1),
(69, 10, 5, 5, 97, '0000-00-00 00:00:00', 1),
(70, 36, 11, 5, 99, '0000-00-00 00:00:00', 1),
(71, 36, 5, 11, 100, '0000-00-00 00:00:00', 1),
(72, 36, 5, 11, 101, '0000-00-00 00:00:00', 1),
(73, 10, 5, 5, 102, '2012-12-31 04:44:25', 1),
(74, 10, 5, 6, 102, '2012-12-31 04:44:25', 1),
(75, 20, 5, 11, 103, '2012-12-31 04:49:33', 1),
(76, 10, 5, 6, 104, '2013-01-01 08:18:47', 0),
(77, 36, 5, 5, 105, '2013-01-01 14:26:09', 1),
(78, 20, 11, 11, 106, '2013-01-01 15:09:46', 0),
(79, 10, 5, 5, 107, '2013-01-03 15:59:52', 1),
(80, 10, 5, 5, 108, '2013-01-04 07:41:53', 1),
(81, 10, 5, 5, 109, '2013-01-04 07:55:39', 1),
(82, 11, 5, 5, 110, '2013-01-04 08:07:37', 1),
(83, 11, 5, 5, 111, '2013-01-04 08:08:20', 1),
(84, 11, 5, 5, 112, '2013-01-04 08:10:56', 1),
(85, 11, 5, 5, 113, '2013-01-04 08:11:04', 1),
(86, 11, 5, 5, 114, '2013-01-04 09:40:25', 1),
(87, 10, 5, 5, 115, '2013-01-04 09:41:25', 1),
(88, 10, 5, 5, 116, '2013-01-04 09:41:30', 1),
(89, 10, 5, 5, 117, '2013-01-04 09:41:34', 1),
(90, 10, 5, 5, 118, '2013-01-04 09:41:38', 1),
(91, 11, 5, 5, 119, '2013-01-04 09:44:34', 1),
(92, 11, 5, 5, 120, '2013-01-04 09:44:51', 1),
(93, 11, 5, 5, 121, '2013-01-04 09:45:29', 1),
(94, 11, 5, 5, 122, '2013-01-04 09:46:27', 1),
(95, 11, 5, 5, 123, '2013-01-04 09:46:58', 1),
(96, 11, 5, 5, 124, '2013-01-04 09:47:20', 1),
(97, 11, 5, 5, 125, '2013-01-04 09:49:55', 1),
(98, 11, 5, 5, 126, '2013-01-04 09:50:11', 1),
(99, 10, 5, 5, 127, '2013-01-04 09:50:29', 1),
(100, 11, 5, 5, 128, '2013-01-04 09:51:17', 1),
(101, 11, 5, 5, 129, '2013-01-04 09:51:43', 1),
(102, 11, 5, 5, 130, '2013-01-04 10:05:20', 1),
(103, 10, 5, 11, 131, '2013-01-04 12:01:14', 0),
(104, 10, 5, 5, 131, '2013-01-04 12:01:14', 1),
(105, 10, 5, 5, 132, '2013-01-04 17:00:24', 1),
(106, 10, 5, 11, 132, '2013-01-04 17:00:24', 0),
(107, 10, 5, 5, 133, '2013-01-04 17:00:37', 1),
(108, 10, 5, 11, 133, '2013-01-04 17:00:37', 0),
(109, 10, 5, 5, 134, '2013-01-04 17:00:46', 1),
(110, 10, 5, 11, 134, '2013-01-04 17:00:46', 0),
(111, 10, 5, 5, 135, '2013-01-04 21:28:34', 0),
(112, 10, 5, 11, 135, '2013-01-04 21:28:34', 0),
(113, 10, 5, 5, 136, '2013-01-04 21:28:51', 0),
(114, 10, 5, 11, 136, '2013-01-04 21:28:51', 0),
(115, 10, 5, 5, 137, '2013-01-04 21:29:01', 1),
(116, 10, 5, 11, 137, '2013-01-04 21:29:01', 0),
(117, 10, 5, 5, 138, '2013-01-04 21:30:50', 0),
(118, 10, 5, 11, 138, '2013-01-04 21:30:50', 0),
(119, 34, 5, 6, 139, '2013-01-10 17:13:58', 0),
(120, 34, 5, 7, 140, '2013-01-10 17:14:03', 0),
(121, 34, 5, 9, 141, '2013-01-10 17:14:09', 0),
(122, 34, 5, 6, 142, '2013-01-10 17:14:15', 0),
(123, 34, 5, 6, 143, '2013-01-10 17:14:22', 0),
(124, 34, 5, 9, 144, '2013-01-10 17:14:27', 0),
(125, 34, 5, 10, 145, '2013-01-10 17:14:32', 0),
(126, 11, 5, 6, 146, '2013-01-10 17:15:18', 1),
(127, 10, 5, 7, 147, '2013-01-10 17:15:27', 0),
(128, 51, 5, 5, 148, '2013-01-16 22:05:36', 1),
(129, 50, 5, 6, 149, '2013-01-17 03:11:38', 0),
(130, 50, 5, 6, 150, '2013-01-17 03:12:15', 1),
(131, 49, 5, 5, 151, '2013-01-17 03:30:39', 0),
(132, 26, 7, 6, 153, '2013-01-22 07:25:11', 0);

-- --------------------------------------------------------

--
-- Table structure for table `to_do`
--

CREATE TABLE IF NOT EXISTS `to_do` (
  `to_do_id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `details` text NOT NULL,
  `done` tinyint(1) NOT NULL COMMENT 'Y or N',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`to_do_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `to_do`
--

INSERT INTO `to_do` (`to_do_id`, `page_id`, `developer_id`, `title`, `details`, `done`, `timestamp`) VALUES
(10, 2, 5, 'test 2', 'ads', 1, '0000-00-00 00:00:00'),
(11, 4, 5, 'tesyt6', 'asd]', 1, '0000-00-00 00:00:00'),
(12, 5, 5, 'tesdy6', 'asd', 1, '0000-00-00 00:00:00'),
(13, 3, 5, 'test7', 'asd', 1, '0000-00-00 00:00:00'),
(14, 6, 5, 'validation checks', 'add pictures for right and wrong, and some javascripts alerts', 0, '0000-00-00 00:00:00'),
(15, 6, 5, 'ay haga', 'sddsgsgd sgsdg sdg sdg sdg ', 1, '0000-00-00 00:00:00'),
(16, 7, 5, 'security', 'make sure all data send and received to and from the data base are encrpted', 0, '0000-00-00 00:00:00'),
(17, 7, 5, 'done/undon table', 'make the table list the done, and undone to-do, with a single click', 1, '0000-00-00 00:00:00'),
(18, 7, 5, 'done function', 'create a function that flags  the to-do thread as finished', 1, '0000-00-00 00:00:00'),
(19, 8, 5, 'login system', 'create a login system, \r\nflag which user has created  the to-do and update entry', 1, '0000-00-00 00:00:00'),
(20, 8, 5, 'timestamps', 'make sure all to-do and updates have a timestamp in them', 1, '0000-00-00 00:00:00'),
(21, 10, 5, 'category table', 'make category list into a table, \r\nthis should be also changed in the add-item-form.php\r\n\r\nand so on', 0, '0000-00-00 00:00:00'),
(22, 8, 5, 'devolopers:tags/missions/hashs etc', 'use Tags, and signtures for users.. and task list for member profile page', 0, '0000-00-00 00:00:00'),
(23, 8, 5, 'menu for develop pages', 'create menu for , new page/new item/login etc as a separate included page', 0, '0000-00-00 00:00:00'),
(24, 2, 5, 'separate index.php', 'make every isset($_get['''']) function into a separate page..\r\n\r\nmake index.php a member index page...\r\ncreate a new page for ALL tasks', 0, '0000-00-00 00:00:00'),
(25, 11, 5, 'limit uploadable images', 'make limit of uloads to 5..\r\ncheck b4 u display "upload" inputs..\r\nif 3 images are still remaining, loop 3 times to display 3 upload inputs\r\n.... /ali', 0, '0000-00-00 00:00:00'),
(26, 4, 5, 'this is a test', 'testing', 1, '0000-00-00 00:00:00'),
(27, 12, 5, 'jquery login', 'awesome sliding panel , cute animation, must do <br>\r\n<a href="http://borse.myftp.org/tutorials/demo/index.html">live demo</a> <br>\r\n<a href="http://borse.myftp.org/tutorials/login-page-jquery-demp.zip">source code</a><br>\r\n<a href="http://net.tutsplus.com/tutorials/javascript-ajax/build-a-top-panel-with-jquery/?search_index=1">online tutorial</a>', 0, '0000-00-00 00:00:00'),
(28, 13, 5, 'rework code', '@mahmoud: <br>\r\nplease rewrite code to be shorter and more effcient <br>\r\n\r\nchoose better variable names, and use plenty of comments to make code understandable\r\n<br>\r\n/ali', 0, '0000-00-00 00:00:00'),
(29, 2, 5, 'loading icon animation', 'display animation of loading. when an image thumbnail is clicked, untill the big image is loaded', 1, '0000-00-00 00:00:00'),
(30, 14, 5, 'loading icon animation', 'display animation of loading. when an image thumbnail is clicked, untill the big image is loaded', 0, '0000-00-00 00:00:00'),
(31, 12, 5, 'saving sessions to database', 'each time the user logsout or closes the browser: <br/>\r\n\r\nsave all session to database\r\n<br/>\r\nhttp://www.tonymarston.net/php-mysql/session-handler.html', 0, '0000-00-00 00:00:00'),
(32, 8, 5, 'create and use wrappers', 'create wrappers, rewrite most of code using them', 0, '0000-00-00 00:00:00'),
(33, 15, 5, 'error: update with no tags', 'when someone dosent tag anyone, and clicks update. errors occurs, because $_post[''appointed_devs_id''] is empty(probably)..\r\n\r\nfix accordingly, using isset or something', 0, '0000-00-00 00:00:00'),
(34, 8, 5, 'yet another test', 'from abdulla', 1, '0000-00-00 00:00:00'),
(35, 16, 5, 'create a delete for each tagged name', 'for each tagged person, create a box with an X..\r\n<br/>\r\nwhen the box is clicked: find name within the array, and delete, \r\n<br/>\r\nalso ofc hide the box clicked, using element()', 0, '0000-00-00 00:00:00'),
(36, 8, 5, 'test3', 'zxcxzc', 0, '0000-00-00 00:00:00'),
(37, 17, 5, 'display  task''s list  by page', 'under each page name, print the tasks of that page\r\n\r\n<br/>\r\nuse divs', 0, '0000-00-00 00:00:00'),
(42, 31, 5, 'bug- adding new tasks', 'for some reason, when u add a new task, the confirmation alert dosent fire.. altho the task is added correctly..', 0, '2013-01-13 20:19:07'),
(43, 30, 5, 'page task counter', 'display a digit, near each page name, to indicate how many tasks are ongoing inside each page', 0, '2013-01-13 20:20:47'),
(44, 30, 5, 'hide completed tasks', 'create an option to display ongoing, and finished tasks.. inside page view', 0, '2013-01-13 20:21:47'),
(45, 30, 5, 'folder task counter', 'same like page task counter.. but for folders too..', 0, '2013-01-13 20:22:31'),
(46, 7, 5, 'loading animation for menu', 'load an animation in the menu, untill querys are fully loaded', 0, '2013-01-13 20:25:04'),
(47, 9, 5, 'add new site', 'create option, to add new site. or folder..\r\nfor example, general-ideas folder.. tutorial folder.. etc', 0, '2013-01-13 20:25:59'),
(48, 9, 5, 'fix site table', 'add a folder_id to the table i think?', 0, '2013-01-13 20:26:40'),
(49, 17, 5, 'make everything ajax', 'every time u add task/folder/page.. the page shouldnt refresh..', 0, '2013-01-13 20:28:10'),
(50, 33, 6, 'fuck a girl', 'when he gets horny soon', 0, '2013-01-14 00:30:33'),
(51, 7, 5, 'fix menu issue', 'fix the menu to display correctly, wether the user is zoomed in or out', 0, '2013-01-16 22:04:01'),
(52, 33, 5, 'asd', 'asd', 0, '2013-01-16 22:13:07'),
(53, 33, 5, 'asdasd', 'asd', 0, '2013-01-16 22:14:58'),
(54, 33, 5, 'asd', 'asd', 0, '2013-01-16 22:15:16'),
(55, 33, 5, '312', 'asd', 0, '2013-01-16 22:16:50'),
(56, 33, 5, 'afs', 'saf', 0, '2013-01-16 22:18:22'),
(57, 33, 5, 'sfa', 'fasf', 0, '2013-01-16 22:36:33'),
(58, 33, 5, 'be gay', 'bitch', 0, '2013-01-17 02:57:41');

-- --------------------------------------------------------

--
-- Table structure for table `to_do_updates`
--

CREATE TABLE IF NOT EXISTS `to_do_updates` (
  `update_id` int(11) NOT NULL AUTO_INCREMENT,
  `to_do_id` int(11) NOT NULL,
  `developer_id` int(11) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0= canceld 1=active  2=done!',
  `details` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`update_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=154 ;

--
-- Dumping data for table `to_do_updates`
--

INSERT INTO `to_do_updates` (`update_id`, `to_do_id`, `developer_id`, `status`, `details`, `timestamp`) VALUES
(1, 0, 5, 1, '', '0000-00-00 00:00:00'),
(2, 0, 5, 2, '', '0000-00-00 00:00:00'),
(3, 0, 5, 1, '', '0000-00-00 00:00:00'),
(4, 0, 5, 1, 'SZDASF', '0000-00-00 00:00:00'),
(5, 0, 5, 1, 'this page needs alot of modifications', '0000-00-00 00:00:00'),
(6, 0, 5, 1, 'sdfsdlfjsdf', '0000-00-00 00:00:00'),
(7, 13, 5, 1, 'czvxxxc', '0000-00-00 00:00:00'),
(8, 13, 5, 1, 'czvxxxc', '0000-00-00 00:00:00'),
(9, 13, 5, 1, 'czvxxxc', '0000-00-00 00:00:00'),
(10, 13, 5, 1, 'czvxxxc', '0000-00-00 00:00:00'),
(11, 14, 5, 3, 'sad', '0000-00-00 00:00:00'),
(12, 14, 5, 2, 'works like a charm baby', '0000-00-00 00:00:00'),
(13, 10, 5, 1, 'ameen rulz', '0000-00-00 00:00:00'),
(14, 18, 5, 2, 'created : if(isset($_GET[''done''])) inside index.php', '0000-00-00 00:00:00'),
(15, 18, 5, 2, 'finished', '0000-00-00 00:00:00'),
(16, 17, 5, 2, 'added 	if(isset($_GET[''listfninshedtasks'']))\r\ncopied the orginal table\r\nchanged query to only display finshed tasks\r\nchanged the done field in the table from "X" to "yup".. basically made it only text', '0000-00-00 00:00:00'),
(17, 14, 5, 1, 'please add "-" to alloawed chars in first/last name', '0000-00-00 00:00:00'),
(18, 15, 5, 1, 'update test', '0000-00-00 00:00:00'),
(19, 14, 5, 2, '@mahmoud\r\nuse this tutorial to figure out how to make a "user name" validation instantly\r\n\r\nhttp://www.youtube.com/watch?v=IrFxLOffgNg&feature=relmfu\r\n\r\n/ali', '0000-00-00 00:00:00'),
(20, 19, 5, 1, 'Suggestion:\r\nuse Tags, and signtures for users..\r\nand task list for member profile page', '0000-00-00 00:00:00'),
(21, 19, 5, 1, 'Suggestion:\r\nuse Tags, and signtures for users..\r\nand task list for member profile page', '0000-00-00 00:00:00'),
(22, 19, 5, 1, 'login system finished, suggestion ID"20" will be moved to a new to-do thread', '0000-00-00 00:00:00'),
(23, 23, 5, 2, 'created and added menu for index.php and update.php', '0000-00-00 00:00:00'),
(24, 26, 5, 1, 'testing update', '0000-00-00 00:00:00'),
(25, 14, 5, 2, '@mahmoud\r\nfix passwords in this page. <br>\r\nif user enters 6+ letters.. in both field<br>\r\nregister button will be anabled, even if the 6 letters dont match...<br>\r\n\r\nmake sure ur validation dosent only include text.size, but that they are both the same too<br>\r\nnoob\r\n/ali', '0000-00-00 00:00:00'),
(26, 14, 5, 2, 'extracted javascript from main page, to js/register0form.js\r\n<br>', '0000-00-00 00:00:00'),
(27, 14, 5, 2, 'i have completed everything except "update id=17"', '0000-00-00 00:00:00'),
(28, 29, 5, 1, 'this was a wrong page, new page new to do', '0000-00-00 00:00:00'),
(29, 11, 5, 1, 'aheklamsf', '0000-00-00 00:00:00'),
(30, 11, 5, 1, '</div>', '0000-00-00 00:00:00'),
(31, 11, 5, 1, 'asfasgf', '0000-00-00 00:00:00'),
(32, 11, 5, 1, 'asfasgf', '0000-00-00 00:00:00'),
(33, 11, 5, 1, '</html>', '0000-00-00 00:00:00'),
(34, 11, 5, 1, '<div>', '0000-00-00 00:00:00'),
(35, 11, 5, 1, '</div> ajsdghag', '0000-00-00 00:00:00'),
(36, 11, 5, 1, '</div></div></div></div></div></div></div></div></div>', '0000-00-00 00:00:00'),
(37, 11, 5, 1, '</div></div></div></div></div></div></body></html>', '0000-00-00 00:00:00'),
(38, 11, 5, 1, '</div></div></div> asdasd </div></div></div>asdasd </div></div></div>asdasd </div></div></div> asdasd </body>', '0000-00-00 00:00:00'),
(39, 11, 5, 1, '</div></ul></div></div></div></div></body>', '0000-00-00 00:00:00'),
(40, 10, 5, 3, 'yes she rulz', '0000-00-00 00:00:00'),
(41, 10, 5, 2, '@asdas@', '0000-00-00 00:00:00'),
(42, 10, 5, 2, 'test2', '0000-00-00 00:00:00'),
(43, 22, 5, 1, '', '0000-00-00 00:00:00'),
(44, 14, 5, 3, 'Toz feek', '0000-00-00 00:00:00'),
(45, 10, 5, 3, 'testing 3', '0000-00-00 00:00:00'),
(46, 10, 5, 2, 'ssa', '0000-00-00 00:00:00'),
(47, 10, 5, 2, 'test4', '0000-00-00 00:00:00'),
(48, 10, 5, 2, 'test5', '0000-00-00 00:00:00'),
(49, 10, 5, 3, 'test 6', '0000-00-00 00:00:00'),
(50, 10, 5, 2, 'test 7', '0000-00-00 00:00:00'),
(51, 10, 5, 3, 'test 8', '0000-00-00 00:00:00'),
(52, 10, 5, 1, 'test9', '0000-00-00 00:00:00'),
(53, 10, 5, 1, 'test10', '0000-00-00 00:00:00'),
(54, 10, 5, 1, '', '0000-00-00 00:00:00'),
(55, 10, 5, 1, 'asf', '0000-00-00 00:00:00'),
(56, 10, 5, 1, 'fash', '0000-00-00 00:00:00'),
(57, 10, 5, 1, 'asf', '0000-00-00 00:00:00'),
(58, 10, 5, 1, 'agas', '0000-00-00 00:00:00'),
(59, 10, 5, 1, '@as agas', '0000-00-00 00:00:00'),
(60, 10, 5, 1, 'test 15', '0000-00-00 00:00:00'),
(61, 10, 5, 1, 'test 16', '0000-00-00 00:00:00'),
(62, 10, 5, 1, '', '0000-00-00 00:00:00'),
(63, 10, 5, 1, '', '0000-00-00 00:00:00'),
(64, 10, 5, 1, 'asdas', '0000-00-00 00:00:00'),
(65, 10, 5, 1, '', '0000-00-00 00:00:00'),
(66, 10, 5, 1, '', '0000-00-00 00:00:00'),
(67, 10, 5, 1, 'asd', '0000-00-00 00:00:00'),
(68, 10, 5, 1, '', '0000-00-00 00:00:00'),
(69, 10, 5, 2, 'test 69', '0000-00-00 00:00:00'),
(70, 10, 5, 2, 'as', '0000-00-00 00:00:00'),
(71, 10, 5, 2, '', '0000-00-00 00:00:00'),
(72, 10, 5, 1, 'asd', '0000-00-00 00:00:00'),
(73, 10, 5, 1, '73', '0000-00-00 00:00:00'),
(74, 10, 5, 1, '', '0000-00-00 00:00:00'),
(75, 10, 5, 1, 'asdf', '0000-00-00 00:00:00'),
(76, 10, 5, 1, '', '0000-00-00 00:00:00'),
(77, 10, 5, 1, 'asd', '0000-00-00 00:00:00'),
(78, 10, 5, 1, '', '0000-00-00 00:00:00'),
(79, 11, 5, 1, 'test1', '0000-00-00 00:00:00'),
(80, 11, 5, 1, '2 ASD', '0000-00-00 00:00:00'),
(81, 10, 5, 2, 'go fuck urselfs both of u', '0000-00-00 00:00:00'),
(82, 10, 5, 1, 'mewo', '0000-00-00 00:00:00'),
(83, 10, 5, 3, 'fuck you both bithces', '0000-00-00 00:00:00'),
(84, 10, 5, 2, 'asdjhasd', '0000-00-00 00:00:00'),
(85, 10, 11, 1, 'fuc u', '0000-00-00 00:00:00'),
(86, 13, 11, 1, 'ss', '0000-00-00 00:00:00'),
(87, 10, 11, 1, 'ff', '0000-00-00 00:00:00'),
(88, 26, 6, 1, 'kill me soon', '0000-00-00 00:00:00'),
(89, 26, 6, 1, 'kill me now', '0000-00-00 00:00:00'),
(90, 26, 11, 2, 'comment comment', '0000-00-00 00:00:00'),
(91, 32, 5, 2, 'created db.php, included some wrappers, ... \nstill didnt edit any of the existing code :)', '0000-00-00 00:00:00'),
(92, 10, 5, 2, 'testing from abdulla''s pc', '0000-00-00 00:00:00'),
(93, 34, 5, 1, 'testing again 1', '0000-00-00 00:00:00'),
(94, 34, 5, 1, 'from the east to ther westa ioshra', '0000-00-00 00:00:00'),
(95, 10, 5, 1, 'hellow world', '0000-00-00 00:00:00'),
(96, 10, 5, 1, 'hit me baby one more time', '0000-00-00 00:00:00'),
(97, 10, 5, 1, 'test 97 baby', '0000-00-00 00:00:00'),
(98, 32, 5, 1, 'addin and editing new database functions every now and then..', '0000-00-00 00:00:00'),
(99, 36, 11, 2, '3aml eh ya basha', '0000-00-00 00:00:00'),
(100, 36, 5, 3, 'screw u man', '0000-00-00 00:00:00'),
(101, 36, 5, 1, 'scew you man, test2', '0000-00-00 00:00:00'),
(102, 10, 5, 1, 'hello babe', '0000-00-00 00:00:00'),
(103, 20, 5, 2, 'all tables have timestamps now', '2012-12-31 04:49:33'),
(104, 10, 5, 1, 'hellow bitch, thanks for sucking dick', '2013-01-01 08:18:47'),
(105, 36, 5, 1, 'testing online tags', '2013-01-01 14:26:09'),
(106, 20, 11, 1, 'hello', '2013-01-01 15:09:46'),
(107, 10, 5, 1, 'as', '2013-01-03 15:59:52'),
(108, 10, 5, 1, 'ass', '2013-01-04 07:41:53'),
(109, 10, 5, 1, 'asdasd', '2013-01-04 07:55:39'),
(110, 11, 5, 1, 'asd', '2013-01-04 08:07:37'),
(111, 11, 5, 1, 'asd', '2013-01-04 08:08:20'),
(112, 11, 5, 1, 'asdasd', '2013-01-04 08:10:56'),
(113, 11, 5, 1, 'a', '2013-01-04 08:11:04'),
(114, 11, 5, 1, 'asd', '2013-01-04 09:40:25'),
(115, 10, 5, 1, 'asd', '2013-01-04 09:41:25'),
(116, 10, 5, 1, 'af', '2013-01-04 09:41:30'),
(117, 10, 5, 1, 'fasf', '2013-01-04 09:41:34'),
(118, 10, 5, 1, 'gasda', '2013-01-04 09:41:38'),
(119, 11, 5, 1, 'asd', '2013-01-04 09:44:34'),
(120, 11, 5, 1, 'asd', '2013-01-04 09:44:51'),
(121, 11, 5, 1, 'asd', '2013-01-04 09:45:29'),
(122, 11, 5, 1, '', '2013-01-04 09:46:27'),
(123, 11, 5, 1, 'ad', '2013-01-04 09:46:58'),
(124, 11, 5, 1, 'asd', '2013-01-04 09:47:20'),
(125, 11, 5, 1, 'asd', '2013-01-04 09:49:55'),
(126, 11, 5, 1, 'asd', '2013-01-04 09:50:11'),
(127, 10, 5, 1, 'asd', '2013-01-04 09:50:29'),
(128, 11, 5, 1, 'asd', '2013-01-04 09:51:17'),
(129, 11, 5, 1, 'ad', '2013-01-04 09:51:43'),
(130, 11, 5, 1, '', '2013-01-04 10:05:20'),
(131, 10, 5, 1, 'testing tags', '2013-01-04 12:01:14'),
(132, 10, 5, 1, 'asdasd', '2013-01-04 17:00:24'),
(133, 10, 5, 1, 'asdfa', '2013-01-04 17:00:37'),
(134, 10, 5, 1, '@asfasf', '2013-01-04 17:00:46'),
(135, 10, 5, 3, 'adasd', '2013-01-04 21:28:34'),
(136, 10, 5, 3, '@ada', '2013-01-04 21:28:51'),
(137, 10, 5, 3, '@ad', '2013-01-04 21:29:01'),
(138, 10, 5, 3, 'eq', '2013-01-04 21:30:50'),
(139, 34, 5, 1, 'asd', '2013-01-10 17:13:58'),
(140, 34, 5, 1, 'asd', '2013-01-10 17:14:03'),
(141, 34, 5, 1, 'asd', '2013-01-10 17:14:09'),
(142, 34, 5, 1, '%35', '2013-01-10 17:14:15'),
(143, 34, 5, 1, 'adfaf', '2013-01-10 17:14:22'),
(144, 34, 5, 1, 'agagag', '2013-01-10 17:14:27'),
(145, 34, 5, 1, 'adsasdasd', '2013-01-10 17:14:32'),
(146, 11, 5, 1, 'asd', '2013-01-10 17:15:18'),
(147, 10, 5, 2, '', '2013-01-10 17:15:27'),
(148, 51, 5, 2, 'the size of the background IS set in % :S..', '2013-01-16 22:05:35'),
(149, 50, 5, 3, 'fuck me zaki, im a hot girl', '2013-01-17 03:11:37'),
(150, 50, 5, 3, ':(', '2013-01-17 03:12:15'),
(151, 49, 5, 1, 'post jquery function NOT fucking working.. crazy :@', '2013-01-17 03:30:39'),
(152, 26, 7, 1, '', '2013-01-22 07:23:49'),
(153, 26, 7, 1, 'Killing attemp in progress', '2013-01-22 07:25:11');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
