-- phpMyAdmin SQL Dump
-- version 4.0.10.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jun 22, 2016 at 08:10 PM
-- Server version: 5.6.29-log
-- PHP Version: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `igoalo5_igoalo`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_not` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `user1_id`, `user2_id`, `created_at`, `updated_at`, `user_not`) VALUES
(1, 2, 1, '2016-05-22 08:14:11', '2016-06-23 19:05:29', 1),
(2, 2, 3, '2016-05-25 13:07:12', '2016-06-19 01:45:17', 3),
(3, 2, 8, '2016-06-05 04:46:11', '2016-06-13 10:07:53', 0),
(4, 13, 9, '2016-06-09 22:53:01', '2016-06-09 23:08:23', 9),
(5, 6, 2, '2016-06-14 00:32:45', '2016-06-20 07:01:29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `accepted` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `accepted`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, '2016-05-22 08:12:39', '2016-05-22 08:12:53'),
(2, 2, 3, 1, '2016-05-22 13:08:15', '2016-05-25 13:01:12'),
(3, 1, 3, 1, '2016-05-23 07:57:23', '2016-05-25 13:01:12'),
(7, 8, 2, 1, '2016-06-05 04:21:25', '2016-06-05 04:45:11'),
(9, 11, 9, 0, '2016-06-09 06:03:55', '0000-00-00 00:00:00'),
(10, 12, 9, 0, '2016-06-09 06:16:48', '0000-00-00 00:00:00'),
(11, 12, 10, 1, '2016-06-09 06:17:00', '2016-06-09 22:18:35'),
(12, 10, 9, 0, '2016-06-09 06:20:03', '0000-00-00 00:00:00'),
(13, 13, 12, 1, '2016-06-09 06:29:16', '2016-06-09 22:51:50'),
(14, 13, 9, 1, '2016-06-09 06:29:34', '2016-06-09 22:42:02'),
(15, 13, 11, 1, '2016-06-09 06:29:55', '2016-06-09 22:50:00'),
(18, 6, 2, 1, '2016-06-13 08:31:19', '2016-06-14 00:32:01'),
(19, 2, 15, 0, '2016-06-17 13:00:52', '0000-00-00 00:00:00'),
(20, 8, 3, 0, '2016-06-18 04:41:15', '0000-00-00 00:00:00'),
(21, 8, 1, 1, '2016-06-18 04:41:22', '2016-06-18 20:42:45'),
(23, 6, 9, 1, '2016-06-18 12:31:41', '2016-06-19 04:33:40'),
(25, 16, 15, 0, '2016-06-22 20:14:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `goals`
--

CREATE TABLE IF NOT EXISTS `goals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(1000) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `name` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `about` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `goal_completed` int(1) NOT NULL,
  `goal_per_completed` int(3) NOT NULL,
  `goal_10` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_20` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_30` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_40` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_50` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_60` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_70` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_80` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_90` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `goal_100` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `hide` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `goals`
--

INSERT INTO `goals` (`id`, `type`, `name`, `about`, `user_id`, `created_at`, `updated_at`, `goal_completed`, `goal_per_completed`, `goal_10`, `goal_20`, `goal_30`, `goal_40`, `goal_50`, `goal_60`, `goal_70`, `goal_80`, `goal_90`, `goal_100`, `group_id`, `hide`) VALUES
(1, 'saving', '10million won', 'saving 10 million won for the UK', 1, '2016-05-22 08:09:00', '2016-06-15 03:01:24', 0, 10, '950000won', '', '', '', '', '', '', '', '', '', 0, 0),
(2, 'saving', 'Save money', 'I want to save money for when we move to the uk soon.', 2, '2016-05-22 12:04:35', '2016-05-25 00:29:23', 0, 80, 'Save 10% ', '', '', '', '', 'Save 60%', '', '', '', 'Saved enough', 0, 0),
(3, 'Career', 'Finish igoalo', 'Fix all the bugs with igoal and improve the user experience. ', 2, '2016-05-23 21:53:06', '2016-06-10 06:27:27', 0, 90, 'Fix bugs', 'Fix status goal u', 'Change timestamps', 'Add posted on', 'group/profile update', 'Change button color', 'Fix status goal c', 'Add chat id to url', 'Remove char r on reg', 'All fixed', 0, 0),
(4, 'Career', 'Coder member', 'We aim to have 10 members by next year.', 0, '2016-05-24 07:01:22', '2016-06-02 08:40:45', 0, 20, '1', '', '', '', '5', '', '', '', '', '10', 3, 0),
(7, 'Education', 'Ielts test', 'Try to get 7.5 point by end of this year', 1, '2016-05-25 11:06:22', '2016-05-25 11:06:22', 0, 60, '', '', '', '', '', '5.5', '', '', '', '', 0, 0),
(14, 'Career', 'dfs', 'fsda', 6, '2016-05-25 12:01:22', '2016-05-25 12:01:22', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0),
(17, 'Education', 'Learn java ', 'I want to learn Java to a good level in the next 3 months.', 2, '2016-06-02 05:36:48', '2016-06-20 22:58:01', 0, 30, 'Read half book', 'Watch half videos', 'Finish book', 'Finish videos', 'Make project', 'Make prohect', 'Intermediate vid', 'Finish intermediate', 'Project ', 'Project', 0, 0),
(18, 'travel', 'Visit 5 countries', '', 9, '2016-06-09 21:14:12', '2016-06-09 21:34:17', 0, 20, '', 'France', '', 'Belgium', '', 'UK', '', 'Ireland', '', 'Germany', 0, 0),
(19, 'travel', 'Visit 10 Countries', 'We want our members between them to go out and visit 10 Countries this year except for America.', 0, '2016-06-09 21:25:13', '2016-06-09 21:30:37', 0, 10, '1 Country', '2 Countries', '3 Countries', '4 Countries', '5 Countries', '6 Countries', '7 Countries', '8 Countries', '9 Countries', '10 Countries', 12, 0),
(20, 'travel', 'Visit Mexico', 'I have always wanted to visit Mexico. Hopefully if I can get enough information here on iGoalo I will know what not miss.', 10, '2016-06-09 21:37:40', '2016-06-09 21:40:23', 0, 0, 'Decide dates', '', '', '', 'Save', '', '', '', 'Tickets', 'hasta luego (bye)', 0, 0),
(21, 'members', 'get 10 members', '10 members is 10 sets of savings knowledge and ideas to share.', 0, '2016-06-09 21:43:45', '2016-06-09 21:43:45', 0, 10, '1 member', '2 members', '3 members', '4 members', '5  members', '6 members', '7 members', '8 members', '9 members', '10 members', 13, 0),
(22, 'savings', 'Save $1000', '', 10, '2016-06-09 21:45:39', '2016-06-09 21:45:39', 0, 30, 'Open savings acc', '', 'First 100', '', '$500', '', '', '', '$900 (so close)', 'Yes! $1000', 0, 0),
(23, 'Fitness', 'Win 2016 league cup', '', 0, '2016-06-09 21:49:17', '2016-06-09 21:49:17', 0, 10, 'Pre season training', '3 points', '15 points', '30 points', 'Relegation safe', 'Mid table', 'Top 4', 'Top 3', 'Top 2', 'Winners', 14, 0),
(24, 'Fitness', 'Run NY marathon', '', 11, '2016-06-09 22:04:03', '2016-06-09 22:05:28', 0, 40, 'Start training', '', '', '6 mile', '', '12 mile', '', '18 mile', '', '24 mile', 0, 0),
(25, 'Fitness', 'Weekly meet and run', '', 0, '2016-06-09 22:06:28', '2016-06-09 22:06:28', 0, 50, 'Planning', '', '', '', 'Set meeting place', '', '', 'Order refreshments', '', 'Meet up', 15, 0),
(26, 'Fitness', 'Caberiall Kickflip', '', 12, '2016-06-09 22:13:18', '2016-06-09 22:14:53', 0, 10, 'Research', '', '', '', 'Practice', '', '', '', '', 'Done', 0, 0),
(27, 'Education', 'Learn Java', 'I''m going to learn Java like a boss.', 13, '2016-06-09 22:22:14', '2016-06-09 22:23:38', 0, 50, 'Buy head first java', '', '', '', 'New Boston tutorials', 'Finish book', '', 'Finish tutoria', 'Do 5 projects', '', 0, 0),
(28, 'Fitness', 'Make team', '', 0, '2016-06-09 22:25:37', '2016-06-09 22:25:37', 0, 0, 'Advertise team', '', '', '', 'Try outs', '', '', 'Choose 10', '', 'First game', 16, 0),
(29, 'Fitness', 'Make group project', '', 0, '2016-06-09 22:27:22', '2016-06-09 22:27:22', 0, 10, 'Decide project', '', '', '', 'Decide jobs', 'Plan', 'Start', 'Collborate', 'Put together', 'Finished', 17, 0),
(30, 'Fitness', 'Yoga Class', 'I want to start a yoga class for everyone.', 14, '2016-06-09 22:33:34', '2016-06-09 22:39:40', 0, 20, 'Start Yoga class', '', 'Decide name', 'Advertise', '', 'Deide venue', '', 'Finalise members', '', 'Start', 0, 0),
(31, 'Music', 'Learn guitar', '', 14, '2016-06-09 22:34:52', '2016-06-09 22:34:52', 0, 0, 'Start ', '', 'Learn chords', '', 'Learn first song', '', '', 'Learn second song', '', 'Taken my first steps', 0, 0),
(32, 'Fitness', 'Run 10 miles', 'I want to do this in preparation for the new soccer season.', 9, '2016-06-09 22:40:03', '2016-06-09 23:14:52', 0, 10, 'Start training', '', '', '', 'Run 2 miles', '', '', 'Run 6 miles', '', 'Run 10 miles', 0, 0),
(33, 'Fitness', 'Beat NYFC in derby', 'Come on lets beat them', 0, '2016-06-09 22:47:06', '2016-06-09 22:47:06', 0, 0, '', '', '', '', '', '', '', '', '', '', 19, 0),
(34, 'Fitness', 'seam', 'to be a tank', 3, '2016-06-09 17:48:37', '2016-06-09 17:48:37', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0),
(35, 'Education', 'Finish grammar books', 'Finish grammar books that i have', 1, '2016-06-13 00:28:34', '2016-06-15 03:02:03', 0, 0, 'Basic', 'Intermediate ', 'Upper intermediate ', '', '', '', '', '', '', '', 0, 0),
(36, 'Education', 'Graduate Uni.', 'I want to graduate Uni at Southampton Solent, Football business', 8, '2016-06-18 20:47:26', '2016-06-18 20:47:48', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0),
(37, 'Career', 'iGoalo update 1.1.1', '', 2, '2016-06-21 03:57:26', '2016-06-23 00:56:06', 0, 50, 'Last login', '', '', 'fix index block 2', '', 'security', '', 'remember me', '', 'update 1.1.1', 0, 0),
(38, 'Career', 'Primary teacher', '', 16, '2016-06-23 04:05:08', '2016-06-23 04:05:08', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0),
(39, '', 'TRAVEL', '', 16, '2016-06-23 04:05:31', '2016-06-23 04:06:05', 0, 0, '', '', '', '', '', '', '', '', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_name` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `profile_pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `cover_pic` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `creater` int(11) NOT NULL,
  `group_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `about` varchar(150) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `main_goal` int(11) DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `country` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `city_town_village` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `group_name`, `profile_pic`, `cover_pic`, `creater`, `group_type`, `about`, `main_goal`, `state`, `country`, `city_town_village`, `created_at`, `updated_at`) VALUES
(2, 'Yeongwol savers', 'images/group_profile/1464048783image.jpeg', 'images/group_cover/1464176460cool.jpg', 2, 'saving', '', 0, 'Kangwon-do', 'Korea, South', 'YEONGWOL', '2016-05-23 07:13:41', '2016-05-25 11:40:41'),
(3, 'Coders', 'images/group_profile/1464068880image.png', 'images/group_cover/1464068773coders_cover.jpg', 2, 'Career', '', 0, 'Kerry', 'Ireland', 'Brosna', '2016-05-23 21:58:14', '2016-06-02 08:42:36'),
(5, 'English study buddies', '', '', 1, 'Education', '', 0, 'Kangwon-do', 'Korea, South', 'YEONGWOL', '2016-05-25 11:07:46', '2016-06-15 03:02:49'),
(12, 'NY Travel', 'images/group_profile/1465449908tropiclife-1257189-640x960.jpg', 'images/group_cover/1465449908jwp2.jpg', 9, 'travel', '', 0, 'New York', 'USA', 'Irvington', '2016-06-09 21:16:03', '2016-06-09 21:34:57'),
(13, 'NY Savers', 'images/group_profile/1465451020money-tin-1421115-639x852.jpg', 'images/group_cover/1465451020piggy-bank-1-1377929-639x574.jpg', 10, 'savings', 'We are going to share savings tips.', 0, 'New York', 'USA', 'Holtsville', '2016-06-09 21:40:35', '2016-06-09 21:43:19'),
(14, 'NYC FC', 'images/group_profile/1465451353soccer-1577759-639x426.jpg', 'images/group_cover/1465451353soccer-players-1240339-640x398.jpg', 10, 'Fitness', '', 0, 'New York', 'USA', 'Hotsville', '2016-06-09 21:47:38', '2016-06-09 21:49:00'),
(15, 'Runners', 'images/group_profile/1465452560running-track-1442219-640x960.jpg', 'images/group_cover/1465452560running-in-the-morning-1538848-639x426.jpg', 11, 'Fitness', '', 0, 'New York', 'USA', 'Mount Vernon', '2016-06-09 22:05:43', '2016-06-09 22:07:38'),
(16, 'Basketball ballers', 'images/group_profile/1465453532basketball-hoop-1425019-640x480.jpg', 'images/group_cover/1465453532p-squared-1535223-640x480.jpg', 13, 'Fitness', '', 0, 'New York', 'USA', 'Statan Island', '2016-06-09 22:23:50', '2016-06-09 22:24:38'),
(17, 'Java Learners', 'images/group_profile/1465453637sphere-1167759-640x640.jpg', 'images/group_cover/1465453637command-line-pt-1-2-1243745-640x480.jpg', 13, 'Education', '', 0, 'New York', 'USA', 'Statan Island', '2016-06-09 22:26:15', '2016-06-09 22:27:04'),
(18, 'Yoga you must', 'images/group_profile/1465454354yoga-1428634-639x713.jpg', 'images/group_cover/1465454354meditation-1-1236900-638x440.jpg', 14, 'Fitness', '', 0, 'New York', 'USA', 'Bronx', '2016-06-09 22:36:23', '2016-06-09 22:39:18'),
(19, 'NYC United', 'images/group_profile/1465454821fluminense-shirt-1464215-640x480.jpg', 'images/group_cover/1465454821galatasaray-1440574-640x480.jpg', 9, 'Fitness', '', 0, 'New York', 'USA', 'Irvington', '2016-06-09 22:44:03', '2016-06-09 22:45:20');

-- --------------------------------------------------------

--
-- Table structure for table `group_friends`
--

CREATE TABLE IF NOT EXISTS `group_friends` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `friend_id` int(11) NOT NULL,
  `accepted` int(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `group_members`
--

CREATE TABLE IF NOT EXISTS `group_members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `member_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `admin` int(1) DEFAULT NULL,
  `joined` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `accepted` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `group_members`
--

INSERT INTO `group_members` (`id`, `member_id`, `group_id`, `admin`, `joined`, `created_at`, `updated_at`, `accepted`) VALUES
(4, 2, 2, 1, '2016-05-23 07:13:41', '2016-05-23 07:13:41', '2016-05-23 07:13:41', 1),
(5, 1, 2, 0, '2016-05-23 08:19:54', '2016-05-23 07:57:42', '2016-05-23 08:19:51', 1),
(6, 2, 3, 1, '2016-05-23 21:58:14', '2016-05-23 21:58:14', '2016-05-23 21:58:14', 1),
(8, 1, 5, 1, '2016-05-25 11:07:46', '2016-05-25 11:07:46', '2016-05-25 11:07:46', 1),
(13, 3, 3, 0, '2016-05-25 13:03:52', '2016-05-25 13:03:47', '2016-05-25 13:03:48', 1),
(15, 2, 5, 0, '2016-05-27 09:42:42', '2016-05-27 08:26:22', '2016-05-27 09:42:40', 1),
(17, 9, 12, 1, '2016-06-09 21:16:03', '2016-06-09 21:16:03', '2016-06-09 21:16:03', 1),
(18, 10, 13, 1, '2016-06-09 21:40:35', '2016-06-09 21:40:35', '2016-06-09 21:40:35', 1),
(19, 10, 14, 1, '2016-06-09 21:47:38', '2016-06-09 21:47:38', '2016-06-09 21:47:38', 1),
(20, 10, 12, 0, '2016-06-09 05:52:49', '2016-06-09 05:52:49', '2016-06-09 05:52:49', 0),
(21, 11, 15, 1, '2016-06-09 22:05:43', '2016-06-09 22:05:43', '2016-06-09 22:05:43', 1),
(22, 12, 14, 0, '2016-06-09 06:18:36', '2016-06-09 06:15:46', '2016-06-09 22:18:35', 1),
(23, 13, 16, 1, '2016-06-09 22:23:50', '2016-06-09 22:23:50', '2016-06-09 22:23:50', 1),
(24, 13, 17, 1, '2016-06-09 22:26:15', '2016-06-09 22:26:15', '2016-06-09 22:26:15', 1),
(25, 14, 18, 1, '2016-06-09 22:36:23', '2016-06-09 22:36:23', '2016-06-09 22:36:23', 1),
(26, 9, 19, 1, '2016-06-09 22:44:03', '2016-06-09 22:44:03', '2016-06-09 22:44:03', 1),
(27, 14, 19, 0, '2016-06-09 06:48:07', '2016-06-09 06:48:07', '2016-06-09 06:48:07', 0),
(28, 11, 19, 0, '2016-06-09 06:50:49', '2016-06-09 06:50:49', '2016-06-09 06:50:49', 0),
(29, 12, 19, 0, '2016-06-09 06:52:18', '2016-06-09 06:52:18', '2016-06-09 06:52:18', 0),
(30, 8, 5, 0, '2016-06-18 04:42:50', '2016-06-18 04:41:54', '2016-06-18 20:42:45', 1);

-- --------------------------------------------------------

--
-- Table structure for table `images_videos_attachments`
--

CREATE TABLE IF NOT EXISTS `images_videos_attachments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file_type` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `location` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status_id` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=116 ;

--
-- Dumping data for table `images_videos_attachments`
--

INSERT INTO `images_videos_attachments` (`id`, `file_type`, `location`, `status_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'image/jpeg', 'images/user_profile/1463906006image.jpeg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'image/png', 'images/user_cover/1463906130MyPhoto_1143206523_0395.png', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'image/jpeg', 'images/user_profile/146390638220160424_174653.jpg', 0, 1, '2016-05-22 08:39:17', '2016-05-22 08:39:17'),
(4, 'image/jpeg', 'images/user_profile/1463906398image.jpeg', 0, 2, '2016-05-22 08:39:15', '2016-05-22 08:39:15'),
(5, 'image/jpeg', 'images/user_cover/1463906398image.jpeg', 0, 2, '2016-05-22 08:39:15', '2016-05-22 08:39:15'),
(6, 'image/jpeg', 'images/user_cover/1463906467IMG_20160508_202000_453.jpg', 0, 1, '2016-05-22 08:40:51', '2016-05-22 08:40:51'),
(7, 'image/jpeg', 'images/user_images/1463906611MyPhoto_1143206523_0371.jpg', 0, 1, '2016-05-22 08:43:08', '2016-05-22 08:43:08'),
(8, 'image/jpeg', 'images/user_images/1463913478image.jpeg', 0, 2, '2016-05-22 10:37:34', '2016-05-22 10:37:34'),
(9, 'image/jpeg', 'images/user_images/1463994980image.jpeg', 0, 2, '2016-05-23 09:15:29', '2016-05-23 09:15:29'),
(10, 'image/jpeg', 'images/group_cover/1464048763image.jpeg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(11, 'image/jpeg', 'images/group_profile/1464048783image.jpeg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(12, 'image/jpeg', 'images/group_cover/1464048799image.jpeg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(13, 'image/jpeg', 'images/group_cover/1464048811image.jpeg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(14, 'image/jpeg', 'images/group_cover/1464049023image.jpeg', 0, 2, '2016-05-24 00:16:50', '2016-05-24 00:16:50'),
(15, 'image/png', 'images/group_profile/1464058762image.png', 0, 2, '2016-05-24 02:58:34', '2016-05-24 02:58:34'),
(16, 'image/jpeg', 'images/group_cover/1464065871coders_cover.jpg', 0, 2, '2016-05-24 04:56:52', '2016-05-24 04:56:52'),
(17, 'image/jpeg', 'images/group_cover/1464066160coders_cover.jpg', 0, 2, '2016-05-24 05:02:29', '2016-05-24 05:02:29'),
(18, 'image/jpeg', 'images/user_cover/1464066530John.jpg', 0, 2, '2016-05-24 05:08:36', '2016-05-24 05:08:36'),
(19, 'image/png', 'images/group_profile/1464068754profile.png', 0, 2, '2016-05-24 05:40:23', '2016-05-24 05:40:23'),
(20, 'image/jpeg', 'images/group_cover/1464068754cover.jpg', 0, 2, '2016-05-24 05:40:23', '2016-05-24 05:40:23'),
(21, 'image/jpeg', 'images/group_cover/1464068773coders_cover.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(22, 'image/png', 'images/group_profile/1464068880image.png', 0, 2, '2016-05-24 05:47:37', '2016-05-24 05:47:37'),
(23, 'image/jpeg', 'images/user_cover/1464074762cool.jpg', 0, 2, '2016-05-24 07:25:45', '2016-05-24 07:25:45'),
(24, 'image/jpeg', 'images/user_images/1464075981image.jpg', 0, 2, '2016-05-24 07:46:00', '2016-05-24 07:46:00'),
(25, 'image/jpeg', 'images/user_profile/1464174625cool.jpg', 0, 2, '2016-05-25 11:10:10', '2016-05-25 11:10:10'),
(26, 'image/jpeg', 'images/user_cover/1464174625John.jpg', 0, 2, '2016-05-25 11:10:10', '2016-05-25 11:10:10'),
(27, 'image/jpeg', 'images/user_profile/1464174674cover.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(28, 'image/jpeg', 'images/user_cover/1464174687cover.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(29, 'image/jpeg', 'images/user_profile/1464175039image.jpeg', 0, 2, '2016-05-25 11:16:23', '2016-05-25 11:16:23'),
(30, 'image/jpeg', 'images/user_cover/1464175039image.jpeg', 0, 2, '2016-05-25 11:16:23', '2016-05-25 11:16:23'),
(31, 'image/jpeg', 'images/user_profile/1464175581cool.jpg', 0, 2, '2016-05-25 11:26:13', '2016-05-25 11:26:13'),
(32, 'image/jpeg', 'images/user_cover/1464175589cool.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(33, 'image/jpeg', 'images/user_profile/1464175599cover.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(34, 'image/jpeg', 'images/user_profile/1464175621cover.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(35, 'image/jpeg', 'images/user_profile/1464175636cool.jpg', 0, 2, '2016-05-25 11:27:07', '2016-05-25 11:27:07'),
(36, 'image/jpeg', 'images/user_profile/1464175866cover.jpg', 0, 2, '2016-05-25 11:30:56', '2016-05-25 11:30:56'),
(37, 'image/jpeg', 'images/user_cover/1464175880cover.jpg', 0, 2, '2016-05-25 11:31:10', '2016-05-25 11:31:10'),
(38, 'image/jpeg', 'images/user_profile/1464175949cover.jpg', 0, 2, '2016-05-25 11:31:46', '2016-05-25 11:31:46'),
(39, 'image/jpeg', 'images/user_cover/1464175949cover.jpg', 0, 2, '2016-05-25 11:31:46', '2016-05-25 11:31:46'),
(40, 'image/jpeg', 'images/user_profile/1464176020cool.jpg', 0, 2, '2016-05-25 11:33:31', '2016-05-25 11:33:31'),
(41, 'image/jpeg', 'images/user_profile/1464176047cover.jpg', 0, 2, '2016-05-25 11:33:56', '2016-05-25 11:33:56'),
(42, 'image/jpeg', 'images/user_cover/1464176087cool.jpg', 0, 2, '2016-05-25 11:34:40', '2016-05-25 11:34:40'),
(43, 'image/jpeg', 'images/user_profile/1464176101cool.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(44, 'image/jpeg', 'images/user_profile/1464176116cover.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(45, 'image/jpeg', 'images/user_cover/1464176116cover.jpg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(46, 'image/jpeg', 'images/user_profile/1464176182cool.jpg', 0, 2, '2016-05-25 11:36:14', '2016-05-25 11:36:14'),
(47, 'image/jpeg', 'images/user_cover/1464176191cool.jpg', 0, 2, '2016-05-25 11:36:23', '2016-05-25 11:36:23'),
(48, 'image/jpeg', 'images/user_profile/1464176205cover.jpg', 0, 2, '2016-05-25 11:36:32', '2016-05-25 11:36:32'),
(49, 'image/jpeg', 'images/user_cover/1464176205cover.jpg', 0, 2, '2016-05-25 11:36:32', '2016-05-25 11:36:32'),
(50, 'image/jpeg', 'images/group_cover/1464176460cool.jpg', 0, 2, '2016-05-25 11:40:41', '2016-05-25 11:40:41'),
(51, 'image/jpeg', 'images/user_profile/1464177144cover.jpg', 0, 5, '2016-05-25 11:52:07', '2016-05-25 11:52:07'),
(52, 'image/png', 'images/user_profile/1464177321Capture.PNG', 0, 6, '2016-05-25 11:55:12', '2016-05-25 11:55:12'),
(53, 'image/jpeg', 'images/user_profile/1464177335coders_cover.jpg', 0, 6, '2016-05-25 11:55:21', '2016-05-25 11:55:21'),
(54, 'image/jpeg', 'images/user_cover/1464177335cool.jpg', 0, 6, '2016-05-25 11:55:21', '2016-05-25 11:55:21'),
(55, 'image/png', 'images/group_profile/1464177504Capture.PNG', 0, 6, '2016-05-25 11:58:11', '2016-05-25 11:58:11'),
(56, 'image/jpeg', 'images/group_cover/1464177504me.jpg', 0, 6, '2016-05-25 11:58:11', '2016-05-25 11:58:11'),
(57, 'image/png', 'images/user_cover/1464177541MyPhoto_1143206523_0177.png', 0, 1, '2016-05-25 11:58:27', '2016-05-25 11:58:27'),
(58, 'image/jpeg', 'images/user_images/1464177814Snapchat-5798553434636471185.jpg', 0, 1, '2016-05-25 12:02:30', '2016-05-25 12:02:30'),
(59, 'image/jpeg', 'images/user_profile/1464339289John.jpg', 0, 7, '2016-05-27 08:54:33', '2016-05-27 08:54:33'),
(60, 'image/jpeg', 'images/user_cover/1464339289me.jpg', 0, 7, '2016-05-27 08:54:33', '2016-05-27 08:54:33'),
(61, 'image/jpeg', 'images/group_profile/1464339345Sinn1.jpg', 0, 7, '2016-05-27 08:55:28', '2016-05-27 08:55:28'),
(62, 'image/jpeg', 'images/group_cover/1464339345Sinn.jpg', 0, 7, '2016-05-27 08:55:28', '2016-05-27 08:55:28'),
(63, 'image/jpeg', 'images/user_images/1464339356cover.jpg', 0, 7, '2016-05-27 08:55:45', '2016-05-27 08:55:45'),
(64, 'image/jpeg', 'images/user_profile/1464339731image.jpeg', 0, 2, '2016-05-27 09:01:23', '2016-05-27 09:01:23'),
(65, 'image/jpeg', 'images/user_cover/1464339731image.jpeg', 0, 2, '2016-05-27 09:01:23', '2016-05-27 09:01:23'),
(66, 'image/jpeg', 'images/user_cover/1464345375IMG_20160519_084814_049.jpg', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'image/jpeg', 'images/user_profile/1464346172image.jpeg', 0, 2, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'image/jpeg', 'images/user_profile/146434619220160426_200903.jpg', 0, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'image/png', 'images/user_profile/1464346280MyPhoto_1143206523_0397.png', 0, 1, '2016-05-27 10:50:53', '2016-05-27 10:50:53'),
(70, 'image/jpeg', 'images/user_cover/1464346280IMG_20160508_202000_453.jpg', 0, 1, '2016-05-27 10:50:53', '2016-05-27 10:50:53'),
(71, 'image/jpeg', 'images/user_profile/1464346330image.jpeg', 0, 2, '2016-05-27 10:51:47', '2016-05-27 10:51:47'),
(72, 'image/jpeg', 'images/user_images/1464349746image.jpeg', 0, 2, '2016-05-27 11:48:53', '2016-05-27 11:48:53'),
(73, 'image/jpeg', 'images/user_images/1464846063image.jpg', 0, 2, '2016-06-02 05:40:07', '2016-06-02 05:40:07'),
(74, 'image/jpeg', 'images/user_profile/1464999745IMG_20160519_084814_049.jpg', 0, 1, '2016-06-04 00:22:02', '2016-06-04 00:22:02'),
(75, 'image/jpeg', 'images/user_images/1465046190image.jpeg', 0, 2, '2016-06-04 13:16:01', '2016-06-04 13:16:01'),
(76, 'image/jpeg', 'images/user_images/1465047029image.jpeg', 0, 2, '2016-06-04 13:29:49', '2016-06-04 13:29:49'),
(77, 'image/jpeg', 'images/user_profile/1465132699image.jpeg', 0, 2, '2016-06-05 13:17:52', '2016-06-05 13:17:52'),
(78, 'image/jpeg', 'images/user_profile/1465137723me.jpg', 0, 2, '2016-06-05 14:41:29', '2016-06-05 14:41:29'),
(79, 'image/jpeg', 'images/user_profile/1465412469DIT.jpg', 0, 3, '2016-06-09 03:00:50', '2016-06-09 03:00:50'),
(80, 'image/jpeg', 'images/user_profile/1465449248jsp.jpg', 0, 9, '2016-06-09 20:53:24', '2016-06-09 20:53:24'),
(81, 'image/jpeg', 'images/user_cover/1465449248jsc.jpg', 0, 9, '2016-06-09 20:53:24', '2016-06-09 20:53:24'),
(82, 'image/jpeg', 'images/group_profile/1465449908tropiclife-1257189-640x960.jpg', 0, 9, '2016-06-09 21:24:43', '2016-06-09 21:24:43'),
(83, 'image/jpeg', 'images/group_cover/1465449908jwp2.jpg', 0, 9, '2016-06-09 21:24:43', '2016-06-09 21:24:43'),
(84, 'image/jpeg', 'images/user_images/1465450178like-god-in-france-1542388-639x852.jpg', 0, 9, '2016-06-09 21:27:57', '2016-06-09 21:27:57'),
(85, 'image/jpeg', 'images/user_profile/1465450592kgp.jpg', 0, 10, '2016-06-09 21:36:19', '2016-06-09 21:36:19'),
(86, 'image/jpeg', 'images/user_cover/1465450648kgc.jpg', 0, 10, '2016-06-09 21:36:36', '2016-06-09 21:36:36'),
(87, 'image/jpeg', 'images/group_profile/1465450995piggy-bank-1-1377929-639x574.jpg', 0, 10, '2016-06-09 21:42:01', '2016-06-09 21:42:01'),
(88, 'image/jpeg', 'images/group_cover/1465450995money-tin-1421115-639x852.jpg', 0, 10, '2016-06-09 21:42:01', '2016-06-09 21:42:01'),
(89, 'image/jpeg', 'images/group_profile/1465451020money-tin-1421115-639x852.jpg', 0, 10, '2016-06-09 21:43:19', '2016-06-09 21:43:19'),
(90, 'image/jpeg', 'images/group_cover/1465451020piggy-bank-1-1377929-639x574.jpg', 0, 10, '2016-06-09 21:43:19', '2016-06-09 21:43:19'),
(91, 'image/jpeg', 'images/group_profile/1465451353soccer-1577759-639x426.jpg', 0, 10, '2016-06-09 21:49:00', '2016-06-09 21:49:00'),
(92, 'image/jpeg', 'images/group_cover/1465451353soccer-players-1240339-640x398.jpg', 0, 10, '2016-06-09 21:49:00', '2016-06-09 21:49:00'),
(93, 'image/jpeg', 'images/user_profile/1465452182jwp.jpg', 0, 11, '2016-06-09 22:02:37', '2016-06-09 22:02:37'),
(94, 'image/jpeg', 'images/user_cover/1465452182tcc.jpg', 0, 11, '2016-06-09 22:02:37', '2016-06-09 22:02:37'),
(95, 'image/jpeg', 'images/group_profile/1465452560running-track-1442219-640x960.jpg', 0, 11, '2016-06-09 22:07:38', '2016-06-09 22:07:38'),
(96, 'image/jpeg', 'images/group_cover/1465452560running-in-the-morning-1538848-639x426.jpg', 0, 11, '2016-06-09 22:07:38', '2016-06-09 22:07:38'),
(97, 'image/jpeg', 'images/user_profile/1465452794tjp.jpg', 0, 12, '2016-06-09 22:12:49', '2016-06-09 22:12:49'),
(98, 'image/jpeg', 'images/user_cover/1465452794tjc.jpg', 0, 12, '2016-06-09 22:12:49', '2016-06-09 22:12:49'),
(99, 'image/jpeg', 'images/user_profile/1465453329tp.jpg', 0, 13, '2016-06-09 22:21:40', '2016-06-09 22:21:40'),
(100, 'image/jpeg', 'images/user_cover/1465453329tcp.jpg', 0, 13, '2016-06-09 22:21:40', '2016-06-09 22:21:40'),
(101, 'image/jpeg', 'images/group_profile/1465453532basketball-hoop-1425019-640x480.jpg', 0, 13, '2016-06-09 22:24:38', '2016-06-09 22:24:38'),
(102, 'image/jpeg', 'images/group_cover/1465453532p-squared-1535223-640x480.jpg', 0, 13, '2016-06-09 22:24:38', '2016-06-09 22:24:38'),
(103, 'image/jpeg', 'images/group_profile/1465453637sphere-1167759-640x640.jpg', 0, 13, '2016-06-09 22:27:04', '2016-06-09 22:27:04'),
(104, 'image/jpeg', 'images/group_cover/1465453637command-line-pt-1-2-1243745-640x480.jpg', 0, 13, '2016-06-09 22:27:04', '2016-06-09 22:27:04'),
(105, 'image/jpeg', 'images/user_profile/1465454010waiting-woman-1575621-640x960.jpg', 0, 14, '2016-06-09 22:31:42', '2016-06-09 22:31:42'),
(106, 'image/jpeg', 'images/user_cover/1465454010music-3-1418397-639x387.jpg', 0, 14, '2016-06-09 22:31:42', '2016-06-09 22:31:42'),
(107, 'image/jpeg', 'images/group_profile/1465454354yoga-1428634-639x713.jpg', 0, 14, '2016-06-09 22:38:03', '2016-06-09 22:38:03'),
(108, 'image/jpeg', 'images/group_cover/1465454354meditation-1-1236900-638x440.jpg', 0, 14, '2016-06-09 22:38:03', '2016-06-09 22:38:03'),
(109, 'image/jpeg', 'images/group_profile/1465454821fluminense-shirt-1464215-640x480.jpg', 0, 9, '2016-06-09 22:45:20', '2016-06-09 22:45:20'),
(110, 'image/jpeg', 'images/group_cover/1465454821galatasaray-1440574-640x480.jpg', 0, 9, '2016-06-09 22:45:20', '2016-06-09 22:45:20'),
(111, 'image/jpeg', 'images/user_images/146570465920160611_113223.jpg', 0, 1, '2016-06-12 20:09:24', '2016-06-12 20:09:24'),
(112, 'image/jpeg', 'images/user_profile/146570471520160611_113201.jpg', 0, 1, '2016-06-12 20:11:02', '2016-06-12 20:11:02'),
(113, 'image/png', 'images/user_profile/1465812463IMG_7031.PNG', 0, 8, '2016-06-14 02:07:39', '2016-06-14 02:07:39'),
(114, 'image/jpeg', 'images/user_profile/1466626214kerryyyy.jpg', 0, 16, '2016-06-23 04:10:09', '2016-06-23 04:10:09'),
(115, 'image/jpeg', 'images/user_cover/1466626355background pic.jpg', 0, 16, '2016-06-23 04:12:32', '2016-06-23 04:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `likeable`
--

CREATE TABLE IF NOT EXISTS `likeable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `likeable_id` int(11) NOT NULL,
  `likeable_type` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=85 ;

--
-- Dumping data for table `likeable`
--

INSERT INTO `likeable` (`id`, `user_id`, `likeable_id`, `likeable_type`, `created_at`, `updated_at`) VALUES
(1, 2, 15, 1, '2016-05-23 21:50:11', '0000-00-00 00:00:00'),
(2, 2, 14, 1, '2016-05-23 21:50:36', '0000-00-00 00:00:00'),
(3, 2, 11, 1, '2016-05-23 21:51:16', '0000-00-00 00:00:00'),
(4, 2, 20, 1, '2016-05-23 23:35:22', '0000-00-00 00:00:00'),
(5, 1, 32, 1, '2016-05-24 02:18:59', '0000-00-00 00:00:00'),
(6, 1, 29, 1, '2016-05-24 02:19:09', '0000-00-00 00:00:00'),
(7, 1, 27, 1, '2016-05-24 02:19:37', '0000-00-00 00:00:00'),
(8, 1, 26, 1, '2016-05-24 02:19:42', '0000-00-00 00:00:00'),
(9, 1, 33, 2, '2016-05-24 02:19:56', '0000-00-00 00:00:00'),
(10, 2, 38, 1, '2016-05-24 02:50:35', '0000-00-00 00:00:00'),
(11, 2, 39, 1, '2016-05-24 02:50:45', '0000-00-00 00:00:00'),
(12, 1, 51, 1, '2016-05-24 08:23:37', '0000-00-00 00:00:00'),
(13, 1, 50, 1, '2016-05-24 08:23:43', '0000-00-00 00:00:00'),
(14, 1, 16, 1, '2016-05-24 08:23:47', '0000-00-00 00:00:00'),
(15, 1, 66, 1, '2016-05-24 23:49:49', '0000-00-00 00:00:00'),
(16, 1, 53, 1, '2016-05-25 01:05:42', '0000-00-00 00:00:00'),
(17, 1, 78, 1, '2016-05-25 11:10:37', '0000-00-00 00:00:00'),
(18, 2, 154, 1, '2016-05-25 12:07:08', '0000-00-00 00:00:00'),
(19, 3, 100, 1, '2016-05-25 13:03:08', '0000-00-00 00:00:00'),
(20, 1, 160, 1, '2016-05-25 23:08:42', '0000-00-00 00:00:00'),
(21, 2, 2, 1, '2016-05-26 12:50:32', '0000-00-00 00:00:00'),
(22, 2, 1, 1, '2016-05-26 12:50:35', '0000-00-00 00:00:00'),
(23, 2, 7, 1, '2016-05-26 12:50:43', '0000-00-00 00:00:00'),
(24, 2, 7, 1, '2016-05-26 12:50:43', '0000-00-00 00:00:00'),
(25, 2, 120, 1, '2016-05-26 13:24:16', '0000-00-00 00:00:00'),
(26, 2, 123, 1, '2016-05-26 13:24:43', '0000-00-00 00:00:00'),
(27, 2, 124, 1, '2016-05-26 13:24:44', '0000-00-00 00:00:00'),
(28, 1, 181, 1, '2016-05-27 07:05:48', '0000-00-00 00:00:00'),
(29, 1, 180, 1, '2016-05-27 07:05:50', '0000-00-00 00:00:00'),
(30, 2, 77, 1, '2016-05-27 08:26:08', '0000-00-00 00:00:00'),
(31, 2, 204, 1, '2016-05-27 10:52:46', '0000-00-00 00:00:00'),
(32, 2, 205, 1, '2016-05-27 10:52:49', '0000-00-00 00:00:00'),
(33, 2, 207, 1, '2016-05-27 11:47:08', '0000-00-00 00:00:00'),
(34, 3, 209, 1, '2016-05-27 11:49:50', '0000-00-00 00:00:00'),
(35, 1, 209, 1, '2016-05-27 12:16:49', '0000-00-00 00:00:00'),
(36, 1, 238, 1, '2016-05-29 12:34:55', '0000-00-00 00:00:00'),
(37, 1, 243, 1, '2016-06-02 09:15:10', '0000-00-00 00:00:00'),
(38, 1, 249, 1, '2016-06-02 11:18:09', '0000-00-00 00:00:00'),
(39, 1, 248, 1, '2016-06-02 11:18:12', '0000-00-00 00:00:00'),
(40, 1, 247, 1, '2016-06-02 11:18:16', '0000-00-00 00:00:00'),
(41, 1, 246, 1, '2016-06-02 11:18:20', '0000-00-00 00:00:00'),
(42, 1, 244, 1, '2016-06-02 11:18:23', '0000-00-00 00:00:00'),
(43, 2, 250, 1, '2016-06-03 05:52:45', '0000-00-00 00:00:00'),
(44, 2, 251, 2, '2016-06-04 09:05:56', '0000-00-00 00:00:00'),
(45, 2, 252, 1, '2016-06-04 13:15:09', '0000-00-00 00:00:00'),
(46, 1, 253, 1, '2016-06-04 13:17:33', '0000-00-00 00:00:00'),
(47, 2, 254, 1, '2016-06-05 05:24:28', '0000-00-00 00:00:00'),
(48, 1, 257, 1, '2016-06-05 14:06:01', '0000-00-00 00:00:00'),
(49, 1, 255, 2, '2016-06-05 14:06:08', '0000-00-00 00:00:00'),
(50, 1, 276, 1, '2016-06-06 02:10:36', '0000-00-00 00:00:00'),
(51, 1, 260, 1, '2016-06-06 02:10:48', '0000-00-00 00:00:00'),
(52, 1, 259, 1, '2016-06-06 02:10:51', '0000-00-00 00:00:00'),
(53, 2, 290, 1, '2016-06-09 05:56:01', '0000-00-00 00:00:00'),
(54, 9, 336, 1, '2016-06-09 06:43:15', '0000-00-00 00:00:00'),
(55, 9, 337, 1, '2016-06-09 06:43:19', '0000-00-00 00:00:00'),
(56, 2, 363, 1, '2016-06-09 09:50:33', '0000-00-00 00:00:00'),
(57, 1, 289, 1, '2016-06-09 11:03:02', '0000-00-00 00:00:00'),
(58, 1, 288, 1, '2016-06-09 11:03:07', '0000-00-00 00:00:00'),
(59, 2, 365, 1, '2016-06-09 12:10:39', '0000-00-00 00:00:00'),
(60, 2, 364, 1, '2016-06-09 13:30:20', '0000-00-00 00:00:00'),
(61, 1, 386, 1, '2016-06-09 22:20:59', '0000-00-00 00:00:00'),
(62, 1, 385, 1, '2016-06-09 22:21:10', '0000-00-00 00:00:00'),
(63, 1, 383, 1, '2016-06-09 22:21:24', '0000-00-00 00:00:00'),
(64, 1, 366, 1, '2016-06-09 22:21:45', '0000-00-00 00:00:00'),
(65, 1, 363, 1, '2016-06-09 22:22:01', '0000-00-00 00:00:00'),
(66, 2, 390, 1, '2016-06-12 08:18:53', '0000-00-00 00:00:00'),
(67, 2, 389, 2, '2016-06-12 08:18:56', '0000-00-00 00:00:00'),
(68, 2, 391, 1, '2016-06-12 08:19:02', '0000-00-00 00:00:00'),
(69, 1, 392, 1, '2016-06-12 08:26:18', '0000-00-00 00:00:00'),
(70, 2, 393, 1, '2016-06-12 09:04:53', '0000-00-00 00:00:00'),
(71, 1, 394, 1, '2016-06-12 09:16:11', '0000-00-00 00:00:00'),
(72, 2, 397, 1, '2016-06-13 11:22:09', '0000-00-00 00:00:00'),
(73, 2, 398, 1, '2016-06-13 11:22:32', '0000-00-00 00:00:00'),
(74, 1, 396, 1, '2016-06-13 11:49:47', '0000-00-00 00:00:00'),
(75, 2, 407, 1, '2016-06-18 07:28:41', '0000-00-00 00:00:00'),
(76, 9, 344, 1, '2016-06-18 09:42:21', '0000-00-00 00:00:00'),
(77, 9, 344, 1, '2016-06-18 09:42:21', '0000-00-00 00:00:00'),
(78, 1, 407, 1, '2016-06-18 12:49:27', '0000-00-00 00:00:00'),
(79, 1, 406, 1, '2016-06-18 12:49:32', '0000-00-00 00:00:00'),
(80, 1, 404, 1, '2016-06-18 12:49:39', '0000-00-00 00:00:00'),
(81, 1, 403, 1, '2016-06-18 12:49:41', '0000-00-00 00:00:00'),
(82, 2, 395, 1, '2016-06-20 11:58:26', '0000-00-00 00:00:00'),
(83, 1, 414, 1, '2016-06-22 13:04:03', '0000-00-00 00:00:00'),
(84, 2, 415, 1, '2016-06-22 13:47:48', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL,
  `chat_id` int(11) NOT NULL,
  `chat_text` longtext CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=216 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user1_id`, `user2_id`, `chat_id`, `chat_text`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, ' Hey, I just met you.', '2016-05-22 08:14:27', '2016-05-22 08:14:27'),
(2, 1, 2, 1, ' pug off', '2016-05-22 08:15:05', '2016-05-22 08:15:05'),
(3, 2, 1, 1, '???', '2016-05-22 08:15:14', '2016-05-22 08:15:14'),
(4, 2, 1, 1, '^_^', '2016-05-22 08:15:27', '2016-05-22 08:15:27'),
(5, 1, 2, 1, ' i love you', '2016-05-22 08:18:38', '2016-05-22 08:18:38'),
(6, 2, 1, 1, ' ???... ??? ??... ???? ?? ???... ', '2016-05-22 08:19:32', '2016-05-22 08:19:32'),
(7, 1, 2, 1, ' Hey', '2016-05-22 08:49:02', '2016-05-22 08:49:02'),
(8, 2, 1, 1, ' Hi', '2016-05-22 08:49:21', '2016-05-22 08:49:21'),
(9, 1, 2, 1, 'Chuuu', '2016-05-22 08:50:21', '2016-05-22 08:50:21'),
(10, 2, 1, 1, ' What you doing?', '2016-05-22 10:19:23', '2016-05-22 10:19:23'),
(11, 2, 1, 1, '????????????', '2016-05-22 11:45:54', '2016-05-22 11:45:54'),
(12, 1, 2, 1, ' Im not blocking you ... lol', '2016-05-22 12:22:31', '2016-05-22 12:22:31'),
(13, 2, 1, 1, ' Hahaha yeeeeaaaa.... ^_^ ', '2016-05-22 12:47:52', '2016-05-22 12:47:52'),
(14, 1, 2, 1, ' Im proud of you more than proud..', '2016-05-22 13:24:50', '2016-05-22 13:24:50'),
(15, 2, 1, 1, ' I always want to make you proud. You are my rock that everything good is built on. I love you so much. ', '2016-05-22 13:35:07', '2016-05-22 13:35:07'),
(16, 1, 2, 1, ' Thank you for saying that. It means a lot to me.. seriously! \nI love you a lot. Goodnight my genius...', '2016-05-22 13:43:38', '2016-05-22 13:43:38'),
(17, 1, 2, 1, 'And you are my rock.', '2016-05-22 13:44:10', '2016-05-22 13:44:10'),
(18, 1, 2, 1, 'Have a good day :*', '2016-05-23 03:24:04', '2016-05-23 03:24:04'),
(19, 2, 1, 1, ' You too boo... I''m having lunch now. How''s your day?', '2016-05-23 04:02:14', '2016-05-23 04:02:14'),
(20, 1, 2, 1, ' My day is ok... i miss you today.... <3', '2016-05-23 07:02:09', '2016-05-23 07:02:09'),
(21, 2, 1, 1, ' I miss you too... I wish it was still the weekend...', '2016-05-23 07:06:46', '2016-05-23 07:06:46'),
(22, 2, 1, 1, ':-(', '2016-05-23 07:06:58', '2016-05-23 07:06:58'),
(23, 2, 1, 1, 'Did you see that someone put the new game of thrones episode on the internet early??', '2016-05-23 07:07:42', '2016-05-23 07:07:42'),
(24, 1, 2, 1, ' I wish too.... :( oh no i didn''t. ... did you?  When do you want to watch it and fear the walking dead ???', '2016-05-23 07:36:12', '2016-05-23 07:36:12'),
(25, 2, 1, 1, 'I havnt watched it but I saw on Facebook that someone did that. How about tomorrow?? ', '2016-05-23 08:20:48', '2016-05-23 08:20:48'),
(26, 2, 1, 1, ' I made a big update to the page. It should changes pages correctly. If it don''t will you let me know? ', '2016-05-23 09:03:17', '2016-05-23 09:03:17'),
(27, 2, 1, 1, 'Thanks boo', '2016-05-23 09:03:23', '2016-05-23 09:03:23'),
(28, 1, 2, 1, ' Hey mine.. i can''t leave a comment on any... what''s wrong??', '2016-05-23 12:54:36', '2016-05-23 12:54:36'),
(29, 2, 1, 1, ' Oh really?? You can''t leave a comment on a page?', '2016-05-23 21:03:14', '2016-05-23 21:03:14'),
(30, 2, 1, 1, ' It''s fixed now. Thanks. ^_^', '2016-05-23 21:20:44', '2016-05-23 21:20:44'),
(31, 2, 1, 1, ' The like system is also back working. Thanks. Any problems keep telling me. These are only small things that only take about 5 minutes each but they make a huge difference. Also anything that looks weird let me know too. ^_^', '2016-05-23 21:52:55', '2016-05-23 21:52:55'),
(32, 2, 1, 1, ' Morning boo', '2016-05-23 23:18:17', '2016-05-23 23:18:17'),
(33, 1, 2, 1, ' I will... its amazing really.  . . Good morning Mr genius ???', '2016-05-24 00:29:53', '2016-05-24 00:29:53'),
(34, 2, 1, 1, 'Haha I''m glad you like it... What time did you get up?', '2016-05-24 01:54:04', '2016-05-24 01:54:04'),
(35, 1, 2, 1, ' i got up at 7:20... how''s your day going?', '2016-05-24 02:15:47', '2016-05-24 02:15:47'),
(36, 1, 2, 1, 'hey BAE!!!!! lol \nthis website doesnt show heart and star like special characters... :( ', '2016-05-24 02:18:31', '2016-05-24 02:18:31'),
(37, 2, 1, 1, ' Haha no it dosnt I need to program that... If I do a small bit everyday I''ll have it all perfect. You want to send emojis?? Hah', '2016-05-24 02:53:57', '2016-05-24 02:53:57'),
(38, 1, 2, 1, ' These are bugs that you were talking about? Yes of course i want ti send lots emojis to you... and i want to send some korean... like jagi yeobo.. stuff..', '2016-05-24 02:57:21', '2016-05-24 02:57:21'),
(39, 2, 1, 1, ' Haha I''ll get to that in time. There''s a few things I want to change first. Anything else you think would be cool??', '2016-05-24 03:00:50', '2016-05-24 03:00:50'),
(40, 1, 2, 1, ' ok... good... really? what things? hmm... i like the way it is now... :)', '2016-05-24 03:57:53', '2016-05-24 03:57:53'),
(41, 2, 1, 1, ' I need to fix the group information page and I need to fix the goals create and update. There''s small problems with both. Then I''ll add the emojis and Korean.', '2016-05-24 04:01:26', '2016-05-24 04:01:26'),
(42, 2, 1, 1, ';-)', '2016-05-24 04:01:36', '2016-05-24 04:01:36'),
(43, 1, 2, 1, ' yaayy emojis and korean.. can''t wait to use them on this amazing website... :* how are you?', '2016-05-24 04:53:22', '2016-05-24 04:53:22'),
(44, 2, 1, 1, ' I think I might be able to have that done by Monday.. I hope so.. It''s just getting the time to do it... ^_^ I''m good... Finished classes now so I''m just programming now.... How are you? ;-)', '2016-05-24 04:56:28', '2016-05-24 04:56:28'),
(45, 1, 2, 1, ' oh by next monday? stunning :D im okay.. just working... rain has stopped... yay', '2016-05-24 06:41:17', '2016-05-24 06:41:17'),
(46, 2, 1, 1, ' Ye I have another update nearly ready to go up. It will fix all the bugs that are caused from changing your statuses and uploading pictures. Yaaa thank god everyone is always so sad when it rains... haha ', '2016-05-24 07:01:08', '2016-05-24 07:01:08'),
(47, 1, 2, 1, ' oh... there are so many bugs that i didn''t even notice... yes.. maybe that''s why i feel so sad today... ;(.... phew... im sorry to make you wait an hour for me.. :/', '2016-05-24 08:21:03', '2016-05-24 08:21:03'),
(48, 1, 2, 1, 'oh jagi. when i send you a message it shows me 2 of same message that i just sent.... it just happen when i send it. when i comeback it is fine..', '2016-05-24 08:23:22', '2016-05-24 08:23:22'),
(49, 2, 1, 1, ' Thanks boo.', '2016-05-24 08:50:50', '2016-05-24 08:50:50'),
(50, 2, 1, 1, 'I added it to the list of stuff to do.', '2016-05-24 08:51:02', '2016-05-24 08:51:02'),
(51, 1, 2, 1, ' Did you have fun? ', '2016-05-24 12:20:33', '2016-05-24 12:20:33'),
(52, 2, 1, 1, ' I did.. Always', '2016-05-24 12:55:52', '2016-05-24 12:55:52'),
(53, 2, 1, 1, ' Morning boo\n', '2016-05-24 22:05:23', '2016-05-24 22:05:23'),
(54, 1, 2, 1, ' good morning my tough... :*', '2016-05-24 23:49:37', '2016-05-24 23:49:37'),
(55, 2, 1, 1, 'You''ll be happy to know boo... I''m working on adding Korean and emoticons now... ^_^', '2016-05-25 00:25:11', '2016-05-25 00:25:11'),
(56, 1, 2, 1, ' oh really????? yay... you work hard jagi... proud of you... when it''s done.. i will invite my friends... :)', '2016-05-25 01:05:34', '2016-05-25 01:05:34'),
(57, 2, 1, 1, ' ?? ?... (L)', '2016-05-25 10:45:39', '2016-05-25 10:45:39'),
(58, 2, 1, 1, ' 안녕 부... (L)(l)', '2016-05-25 10:48:05', '2016-05-25 10:48:05'),
(59, 2, 1, 1, ' :-(', '2016-05-25 10:52:24', '2016-05-25 10:52:24'),
(60, 2, 1, 1, ' :-(', '2016-05-25 10:52:24', '2016-05-25 10:52:24'),
(61, 1, 2, 1, ' 오... 한글! 이모지 어떻게해? :)', '2016-05-25 11:02:50', '2016-05-25 11:02:50'),
(62, 2, 1, 1, ' '':|''  => ''mellow'',\n    '':-|'' => ''mellow'',\n    '':-o'' => ''ohmy'',\n    '':-O'' => ''ohmy'',\n    '':o''  => ''ohmy'',\n    '':O''  => ''ohmy'',\n    '';)''  => ''wink'',\n    '';-)'' => ''wink'',\n    '':p''  => ''tongue'',\n    '':-p'' => ''tongue'',\n    '':P''  => ''tongue'',\n    '':-P'' => ''tongue'',\n    '':D''  => ''biggrin'',\n    '':-D'' => ''biggrin'',\n    ''8)''  => ''cool'',\n    ''8-)'' => ''cool'',\n    ''^_^'' => ''smile'',\n    '':)''  => ''smile'',\n    '':-)'' => ''smile'',\n    '':(''  => ''sad'',\n    '':-('' => ''sad'',\n    ''8ol'' => ''angry'',\n    ''(l)'' => ''love'',\n    ''(L)'' => ''love'',', '2016-05-25 11:08:18', '2016-05-25 11:08:18'),
(63, 2, 1, 1, 'These are all the emoticons it has... I will be adding more to the chat... And I will add a box below where you can click them but for now this will have to do... I also will add them to the whole site soon... :-P :-P', '2016-05-25 11:09:29', '2016-05-25 11:09:29'),
(64, 1, 2, 1, ' ''Love''', '2016-05-25 11:11:42', '2016-05-25 11:11:42'),
(65, 1, 2, 1, 'Love', '2016-05-25 11:11:48', '2016-05-25 11:11:48'),
(66, 1, 2, 1, '<3', '2016-05-25 11:12:03', '2016-05-25 11:12:03'),
(67, 2, 1, 1, '( and L and ) = (L)\n', '2016-05-25 11:15:14', '2016-05-25 11:15:14'),
(68, 1, 2, 1, ' (Love)', '2016-05-25 11:27:07', '2016-05-25 11:27:07'),
(69, 1, 2, 1, '(L)', '2016-05-25 11:27:22', '2016-05-25 11:27:22'),
(70, 2, 1, 1, ' Haha no ( + L + )', '2016-05-25 11:27:42', '2016-05-25 11:27:42'),
(71, 1, 2, 1, '(L)(L)(L) got it', '2016-05-25 11:27:47', '2016-05-25 11:27:47'),
(72, 2, 1, 1, ' Hahaha proud of you... Do you like?? :-P', '2016-05-25 11:37:15', '2016-05-25 11:37:15'),
(73, 2, 1, 1, 'This is my favorite:: :-(', '2016-05-25 11:37:26', '2016-05-25 11:37:26'),
(74, 2, 1, 1, 'Zoom in... He looks like the seal face... :-D', '2016-05-25 11:37:43', '2016-05-25 11:37:43'),
(75, 1, 2, 1, ' ㅋㅋㅋㄱ forgot about seal face... yes it does.... i love it! It''s blue and cool... ', '2016-05-25 11:39:18', '2016-05-25 11:39:18'),
(76, 2, 1, 1, ' Me too... I just fixed both those problems... thanks 부.. (L)', '2016-05-25 11:48:44', '2016-05-25 11:48:44'),
(77, 1, 2, 1, ' 좋아.... haha you''re welcome (L)', '2016-05-25 12:02:25', '2016-05-25 12:02:25'),
(78, 2, 3, 2, ' :-D', '2016-05-25 13:07:29', '2016-05-25 13:07:29'),
(79, 3, 2, 2, ' ', '2016-05-25 13:08:22', '2016-05-25 13:08:22'),
(80, 3, 2, 2, '', '2016-05-25 13:08:58', '2016-05-25 13:08:58'),
(81, 3, 2, 2, 'Nige', '2016-05-25 13:09:09', '2016-05-25 13:09:09'),
(82, 2, 3, 2, ' ^_^', '2016-05-25 13:09:18', '2016-05-25 13:09:18'),
(83, 2, 3, 2, 'Yes??', '2016-05-25 13:09:33', '2016-05-25 13:09:33'),
(84, 2, 3, 2, ' Hey Seam... sound for looking at the site... If you have more free time feel free to look around and if you see any of those pesky bugs shoot me a message and I''ll give them the boot... :-D :-D :-D :-D', '2016-05-25 13:51:13', '2016-05-25 13:51:13'),
(85, 1, 2, 1, ' Good morning 자기...좋은하루보내 (l)', '2016-05-25 23:52:12', '2016-05-25 23:52:12'),
(86, 2, 1, 1, ' 자기도 좋은 하루보내... (L) ^_^ (l)', '2016-05-26 00:27:01', '2016-05-26 00:27:01'),
(87, 1, 2, 1, ' 고마와~~~ :) 자기 곧 봐~~~', '2016-05-26 02:55:36', '2016-05-26 02:55:36'),
(88, 1, 2, 1, '(l)\n', '2016-05-26 02:55:44', '2016-05-26 02:55:44'),
(89, 2, 1, 1, ' :-)', '2016-05-26 05:26:37', '2016-05-26 05:26:37'),
(90, 1, 2, 1, ' 자기 열심히 하고있니? 힘내~~~ ', '2016-05-26 08:44:18', '2016-05-26 08:44:18'),
(91, 2, 1, 1, '(l)', '2016-05-26 13:18:38', '2016-05-26 13:18:38'),
(92, 2, 3, 2, ' ^_^', '2016-05-27 03:15:18', '2016-05-27 03:15:18'),
(93, 2, 3, 2, ':-(', '2016-05-27 03:15:38', '2016-05-27 03:15:38'),
(94, 1, 2, 1, ' 자기 식사했니?', '2016-05-27 03:20:51', '2016-05-27 03:20:51'),
(95, 2, 1, 1, '응 먹었어... 자기는?? 나는 졸려... :-P\n\n(l)', '2016-05-27 04:55:09', '2016-05-27 04:55:09'),
(96, 1, 2, 1, ' 나듀 졸려... 자기 곧 볼거야...(L)', '2016-05-27 06:31:55', '2016-05-27 06:31:55'),
(97, 2, 1, 1, ' 곧.... (L)', '2016-05-27 06:59:07', '2016-05-27 06:59:07'),
(98, 1, 2, 1, '자기 힘내 내일 토요일이야... (l)', '2016-05-27 07:05:34', '2016-05-27 07:05:34'),
(99, 3, 2, 2, ' I''m on the site', '2016-05-27 11:45:11', '2016-05-27 11:45:11'),
(100, 2, 3, 2, ' Wow...', '2016-05-27 11:45:49', '2016-05-27 11:45:49'),
(101, 2, 3, 2, ' 오늘 뭐해?? :-)', '2016-05-28 06:33:47', '2016-05-28 06:33:47'),
(102, 2, 1, 1, ' (L)', '2016-05-28 06:34:04', '2016-05-28 06:34:04'),
(103, 1, 2, 1, ' 자기 좋은하루보냈니?  (L)', '2016-05-28 11:41:52', '2016-05-28 11:41:52'),
(104, 2, 1, 1, ' 언제나 보냈니까 사랑해... (l)', '2016-05-28 13:45:18', '2016-05-28 13:45:18'),
(105, 1, 2, 1, ' 자기 오늘도 열심히 해... (l) 아마도 이따가볼거야?~', '2016-05-29 01:23:15', '2016-05-29 01:23:15'),
(106, 2, 1, 1, ' 자기 사랑해... (l) (l)', '2016-05-29 10:38:14', '2016-05-29 10:38:14'),
(107, 1, 2, 1, ' 나듀..사랑해 (l)', '2016-05-29 10:58:10', '2016-05-29 10:58:10'),
(108, 2, 1, 1, ' 자기 오늘 너무 많이 일직야... 진짜 힘들어... :-( :-(', '2016-05-29 22:35:13', '2016-05-29 22:35:13'),
(109, 1, 2, 1, ' ㅋㅋㅋㅋ 자기 힘들어? 힘내... 오늘 수업 없다....', '2016-05-29 22:51:01', '2016-05-29 22:51:01'),
(110, 2, 1, 1, ' 응 진짜 힘들어.... 다시 자고싶어... :-( ', '2016-05-29 23:37:58', '2016-05-29 23:37:58'),
(111, 1, 2, 1, ' ㅋㅋㅋ 귀요미... 그런데 조금 힘내 자기... 식사했니?(l)', '2016-05-30 03:21:25', '2016-05-30 03:21:25'),
(112, 2, 1, 1, '자기 뭐해?? (l)', '2016-05-31 06:24:24', '2016-05-31 06:24:24'),
(113, 1, 2, 1, ' 여보:*', '2016-05-31 13:04:08', '2016-05-31 13:04:08'),
(114, 2, 1, 1, ' 자기... ', '2016-06-01 05:12:59', '2016-06-01 05:12:59'),
(115, 1, 2, 1, ' 응?', '2016-06-01 07:47:46', '2016-06-01 07:47:46'),
(116, 2, 1, 1, '안녕... :-D', '2016-06-01 08:00:30', '2016-06-01 08:00:30'),
(117, 1, 2, 1, '안녕..  자기 뭐하니?', '2016-06-01 10:01:37', '2016-06-01 10:01:37'),
(118, 2, 1, 1, ' 나는 읽고있어... 자기는?? :-)', '2016-06-02 05:36:37', '2016-06-02 05:36:37'),
(119, 1, 2, 1, ' 자기 사랑해', '2016-06-02 11:18:54', '2016-06-02 11:18:54'),
(120, 2, 1, 1, ' 나두 언제나 사랑해... (L)', '2016-06-02 12:05:02', '2016-06-02 12:05:02'),
(121, 1, 2, 1, ' 페이스북 재미있니? :)', '2016-06-04 00:21:55', '2016-06-04 00:21:55'),
(122, 2, 1, 1, ' 페이스북 아니... 아이코로 맛있어... ㅋㅋㅋ', '2016-06-04 13:14:11', '2016-06-04 13:14:11'),
(123, 2, 8, 3, ':-)', '2016-06-05 04:46:44', '2016-06-05 04:46:44'),
(124, 1, 2, 1, ' 웅 너무좋아 아이골로....', '2016-06-05 11:27:04', '2016-06-05 11:27:04'),
(125, 2, 1, 1, '(L)', NULL, NULL),
(126, 2, 1, 1, ' (L)', '2016-06-06 20:21:54', '2016-06-06 20:21:54'),
(127, 1, 2, 1, ' 좋은하루보내 여봉...', '2016-06-07 18:24:14', '2016-06-07 18:24:14'),
(128, 2, 1, 1, ' 자기 사랑해... 오늘 900일... (L) (l)', '2016-06-07 19:26:28', '2016-06-07 19:26:28'),
(129, 1, 2, 1, ' 오늘은 901일...ㅋㅋ(l)', '2016-06-09 05:18:49', '2016-06-09 05:18:49'),
(134, 13, 9, 4, ' Hey John... How are you? :-) :-)', '2016-06-09 23:01:02', '2016-06-09 23:01:02'),
(135, 9, 13, 4, ' Hey Tommy.. I''m great... How''s the new group coming? :-P', '2016-06-09 23:01:51', '2016-06-09 23:01:51'),
(136, 13, 9, 4, ' It''s great... We are going to be sharing all sorts of awesome tips to make use better Java developers... You should join... We are going to start a group project soon.. :-D :-D', '2016-06-09 23:02:22', '2016-06-09 23:02:22'),
(137, 9, 13, 4, ' Oh wow definitely.. whats the groups name? I forgot... sorry... :-( :-(', '2016-06-09 23:03:31', '2016-06-09 23:03:31'),
(138, 13, 9, 4, ' That''s okay... it''s called Java Learners.... Looking forward to seeing you on it.. Send a join request when you can.. :-)', '2016-06-09 23:05:09', '2016-06-09 23:05:09'),
(139, 9, 13, 4, ' Definitely going to join... maybe we can discuss ideas to improve iGoalo.. I heard the admin team always appreciate feedback.. :-D :-) :-D', '2016-06-09 23:04:04', '2016-06-09 23:04:04'),
(140, 13, 9, 4, ' Bye.. :-)', '2016-06-09 23:08:23', '2016-06-09 23:08:23'),
(141, 1, 2, 1, ' 자기 너는 왜 igoalo 안뵈니?  :(', '2016-06-10 21:57:31', '2016-06-10 21:57:31'),
(142, 2, 1, 1, '하고있어...  그런데 메세지 못 봤어... :-)', '2016-06-11 03:39:21', '2016-06-11 03:39:21'),
(143, 1, 2, 1, ' 자기 열심히 공부해 im proud of you always... \nAnd i want you to enjoy every but of coding... ', '2016-06-12 20:13:14', '2016-06-12 20:13:14'),
(144, 2, 1, 1, '고마워 자기... 사랑해... 언제나... (L) (L) (L)\n', '2016-06-13 00:19:39', '2016-06-13 00:19:39'),
(145, 1, 2, 1, ' Oh i spelt wrong... i mean every bit of coding..ㅋㅋ 나도 언제나 사랑해 너를 (l)(l)(l)', '2016-06-13 00:26:52', '2016-06-13 00:26:52'),
(146, 2, 1, 1, 'I didn''t even notice.. hahaha :-D :-D ', '2016-06-13 00:29:52', '2016-06-13 00:29:52'),
(147, 1, 2, 1, ' I think i should use igoalo useful...!!!! It''s kinda motivation ', '2016-06-13 00:32:22', '2016-06-13 00:32:22'),
(148, 2, 1, 1, 'I hope that more people will start using someday... Then it will be more motivating because you will be sharing ideas with people who are trying to do the same thing as you... :-)', '2016-06-13 00:34:24', '2016-06-13 00:34:24'),
(149, 1, 2, 1, ' I hope so.... yes then i want to beat them all so very motivate situation... it''s an amazing website.... love it   and you fized problem that kept show me posts can''t be empty thingy like that...', '2016-06-13 02:43:24', '2016-06-13 02:43:24'),
(150, 2, 1, 1, 'I''ll fix that now soon... I''m really happy you like it.. :-)', '2016-06-13 03:45:15', '2016-06-13 03:45:15'),
(151, 1, 2, 1, ' Haha i like it more and more! I want to introduce this website to people... and are you going to make tag someone??', '2016-06-13 04:30:51', '2016-06-13 04:30:51'),
(152, 2, 1, 1, 'I saw you tried to do that... Ye I will but it might not be for a while.. I have a few things I must do first.. I''ll add it to the list... (L)', '2016-06-14 00:27:44', '2016-06-14 00:27:44'),
(153, 6, 2, 5, ' n', '2016-06-14 00:32:45', '2016-06-14 00:32:45'),
(154, 6, 2, 5, ' s', '2016-06-14 00:33:27', '2016-06-14 00:33:27'),
(155, 6, 2, 5, ' s', '2016-06-14 00:33:27', '2016-06-14 00:33:27'),
(156, 2, 6, 5, ' Ff', '2016-06-14 00:34:31', '2016-06-14 00:34:31'),
(157, 6, 2, 5, ' ds', '2016-06-14 00:36:00', '2016-06-14 00:36:00'),
(158, 2, 6, 5, 'Vdhe ', '2016-06-14 00:34:31', '2016-06-14 00:34:31'),
(159, 2, 6, 5, 'Vdhe ', '2016-06-14 00:34:31', '2016-06-14 00:34:31'),
(160, 2, 6, 5, 'Vdhe ', '2016-06-14 00:34:31', '2016-06-14 00:34:31'),
(161, 2, 6, 5, ' G', '2016-06-14 00:36:52', '2016-06-14 00:36:52'),
(162, 2, 6, 5, ' E', '2016-06-14 00:36:52', '2016-06-14 00:36:52'),
(163, 6, 2, 5, ' fds', '2016-06-14 00:37:32', '2016-06-14 00:37:32'),
(164, 2, 6, 5, 'Tff', '2016-06-14 00:36:52', '2016-06-14 00:36:52'),
(165, 2, 6, 5, ' Tg', '2016-06-14 00:36:52', '2016-06-14 00:36:52'),
(166, 2, 6, 5, ' x', '2016-06-14 00:40:08', '2016-06-14 00:40:08'),
(167, 6, 2, 5, ' z', '2016-06-14 00:37:32', '2016-06-14 00:37:32'),
(168, 2, 6, 5, 'y', '2016-06-14 00:40:08', '2016-06-14 00:40:08'),
(169, 6, 2, 5, 'r', '2016-06-14 00:37:32', '2016-06-14 00:37:32'),
(170, 2, 6, 5, ' d', '2016-06-14 00:41:16', '2016-06-14 00:41:16'),
(171, 6, 2, 5, ' s', '2016-06-14 00:41:19', '2016-06-14 00:41:19'),
(172, 2, 6, 5, 'a', '2016-06-14 00:41:16', '2016-06-14 00:41:16'),
(173, 6, 2, 5, 'q', '2016-06-14 00:41:19', '2016-06-14 00:41:19'),
(174, 2, 6, 5, ' a', '2016-06-14 00:51:53', '2016-06-14 00:51:53'),
(175, 6, 2, 5, ' ab', '2016-06-14 00:52:05', '2016-06-14 00:52:05'),
(176, 2, 6, 5, ' x', '2016-06-14 00:55:56', '2016-06-14 00:55:56'),
(177, 6, 2, 5, ' y', '2016-06-14 00:56:01', '2016-06-14 00:56:01'),
(178, 2, 6, 5, 'z', '2016-06-14 00:56:06', '2016-06-14 00:56:06'),
(179, 6, 2, 5, 'y', '2016-06-14 00:56:12', '2016-06-14 00:56:12'),
(180, 6, 2, 5, 'jj', '2016-06-14 01:00:21', '2016-06-14 01:00:21'),
(181, 6, 2, 5, 'aa', '2016-06-14 01:00:44', '2016-06-14 01:00:44'),
(182, 6, 2, 5, ' xcxc', '2016-06-14 01:06:45', '2016-06-14 01:06:45'),
(183, 2, 6, 5, ' Njd', '2016-06-14 01:08:57', '2016-06-14 01:08:57'),
(184, 6, 2, 5, ' sd', '2016-06-14 01:09:08', '2016-06-14 01:09:08'),
(185, 1, 2, 1, ' And im going to make a list of that i want you to add and fix...lol :)', '2016-06-14 03:49:52', '2016-06-14 03:49:52'),
(186, 2, 1, 1, ' Thank you 자기.... (L) (L)', '2016-06-14 04:02:53', '2016-06-14 04:02:53'),
(187, 6, 2, 5, 'Hey', '2016-06-14 04:19:04', '2016-06-14 04:19:04'),
(188, 6, 2, 5, ' hey', '2016-06-14 04:20:14', '2016-06-14 04:20:14'),
(189, 6, 2, 5, 'hey', '2016-06-14 04:20:49', '2016-06-14 04:20:49'),
(190, 1, 2, 1, ' You''re welcome (l)', '2016-06-14 05:40:35', '2016-06-14 05:40:35'),
(191, 2, 3, 2, ' Yo fool', '2016-06-14 23:44:11', '2016-06-14 23:44:11'),
(192, 2, 6, 5, ' s', '2016-06-14 23:44:20', '2016-06-14 23:44:20'),
(193, 2, 1, 1, ' 안녕', '2016-06-15 02:54:28', '2016-06-15 02:54:28'),
(194, 2, 1, 1, '자기', '2016-06-15 02:54:57', '2016-06-15 02:54:57'),
(195, 2, 1, 1, '여보', '2016-06-15 02:55:28', '2016-06-15 02:55:28'),
(196, 1, 2, 1, ' 안녕 자기... 내 천재', '2016-06-15 05:06:09', '2016-06-15 05:06:09'),
(197, 2, 1, 1, ' 안녕 네 천재... (L)', '2016-06-15 17:05:43', '2016-06-15 17:05:43'),
(198, 1, 2, 1, ' 자기 나는 졸려...', '2016-06-16 03:11:05', '2016-06-16 03:11:05'),
(199, 1, 2, 1, ':(', '2016-06-16 03:11:14', '2016-06-16 03:11:14'),
(200, 2, 1, 1, ' Haha hes my favorite emoticon.. :-( :-(  :-(', '2016-06-16 21:36:10', '2016-06-16 21:36:10'),
(201, 1, 2, 1, ' Sadness... it looks like sadness from inside out movie...ㅋㅋㅋ', '2016-06-17 02:33:11', '2016-06-17 02:33:11'),
(202, 2, 1, 1, ' Haha it does... It''s the best... :-P', '2016-06-17 04:32:12', '2016-06-17 04:32:12'),
(203, 1, 2, 1, ' Good morning.... :)', '2016-06-17 14:17:16', '2016-06-17 14:17:16'),
(204, 2, 1, 1, ' Good morning my 자기... (l)', '2016-06-18 19:52:12', '2016-06-18 19:52:12'),
(205, 1, 2, 1, ' Very late good morning....ㅋㅋ', '2016-06-18 20:43:24', '2016-06-18 20:43:24'),
(206, 2, 1, 1, ' Hahah one day late... 미안... ㅋㅋㅋ :-(', '2016-06-18 23:28:30', '2016-06-18 23:28:30'),
(207, 2, 3, 2, ' (L)', '2016-06-19 01:45:04', '2016-06-19 01:45:04'),
(208, 2, 3, 2, ':-(', '2016-06-19 01:45:17', '2016-06-19 01:45:17'),
(209, 1, 2, 1, ' ㅋㅋㅋ괜찮아...  자기 좋은하루보내고있니?', '2016-06-19 04:50:34', '2016-06-19 04:50:34'),
(210, 2, 1, 1, '응... 자기는?? 나를 보고싶니? (L)', '2016-06-19 04:53:24', '2016-06-19 04:53:24'),
(211, 1, 2, 1, ' 응 언제나 보고싶어...곧 볼거야...(l)', '2016-06-19 17:03:21', '2016-06-19 17:03:21'),
(212, 6, 2, 5, ' dsfdsaf', '2016-06-20 23:00:55', '2016-06-20 23:00:55'),
(213, 1, 2, 1, ' 자기 사랑해', '2016-06-23 05:04:31', '2016-06-23 05:04:31'),
(214, 1, 2, 1, ' 내메세지 왜 답장안하니? :/', '2016-06-23 16:37:48', '2016-06-23 16:37:48'),
(215, 2, 1, 1, ' 미안... 못 봤어... 나두 많이 사랑해... (L)', '2016-06-23 19:05:29', '2016-06-23 19:05:29');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE IF NOT EXISTS `notifications` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `notification_type` int(1) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `requesting_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status_id` int(11) DEFAULT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hide` int(1) DEFAULT NULL,
  `seen` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `notification_type`, `user_id`, `requesting_id`, `group_id`, `status_id`, `goal_id`, `created_at`, `updated_at`, `hide`, `seen`) VALUES
(13, 2, 0, 10, 12, 0, 0, '2016-06-09 05:52:49', '2016-06-09 05:52:49', 0, 0),
(15, 1, 9, 11, 0, 0, 0, '2016-06-09 06:03:55', '2016-06-09 06:03:55', 0, 0),
(17, 1, 9, 12, 0, 0, 0, '2016-06-09 06:16:48', '2016-06-09 06:16:48', 0, 0),
(19, 1, 9, 10, 0, 0, 0, '2016-06-09 06:20:03', '2016-06-09 06:20:03', 0, 0),
(23, 2, 0, 14, 19, 0, 0, '2016-06-09 06:48:07', '2016-06-09 06:48:07', 0, 0),
(24, 2, 0, 11, 19, 0, 0, '2016-06-09 06:50:49', '2016-06-09 06:50:49', 0, 0),
(25, 2, 0, 12, 19, 0, 0, '2016-06-09 06:52:18', '2016-06-09 06:52:18', 0, 0),
(29, 1, 15, 2, 0, 0, 0, '2016-06-17 13:00:52', '2016-06-17 13:00:52', 0, 0),
(30, 1, 3, 8, 0, 0, 0, '2016-06-18 04:41:15', '2016-06-18 04:41:15', 0, 0),
(36, 1, 15, 16, 0, 0, 0, '2016-06-22 20:14:39', '2016-06-22 20:14:39', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `recommend`
--

CREATE TABLE IF NOT EXISTS `recommend` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `friend_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `hide` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `remember_me`
--

CREATE TABLE IF NOT EXISTS `remember_me` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `series` varchar(100) COLLATE utf8_bin NOT NULL,
  `token` varchar(100) COLLATE utf8_bin NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=34 ;

--
-- Dumping data for table `remember_me`
--

INSERT INTO `remember_me` (`id`, `series`, `token`, `user_id`, `created_at`, `updated_at`) VALUES
(29, 'M12etTy6g/MBOLKSAx4kuovTajKONuQ//vszuCVbdp4=', 'LgTPUJQhtD6lMBkdyawdOudJ6S/F4zuKatxa7wymXGc=', 2, '2016-06-22 14:04:12', '2016-06-22 14:04:12'),
(31, '+flFzvP3axxSGo7sXWr9yKL1ndXieKw3YXsMOLm3iXk=', 'rhKZ96cEJ+CXb9f3JCiEQpHpCxYX6X0TLYxqjvUmNU0=', 2, '2016-06-23 06:18:47', '2016-06-23 06:18:47'),
(32, 'PpRPNlSmru4WJizgOZrukbBOsreKsmm9VgAg0VMXBgg=', 'byvjkiCp9Dl+bsWay8V7AQTQ4wJ9p8kj1ldR/vHlSok=', 2, '2016-06-23 16:24:58', '2016-06-23 16:24:58'),
(33, 'ZJzkkFJM+ZpPRIpq63uCi6HqQb+dZc0+y4hpDqxzG0g=', 'XuZIIGYIldz5bypMhoMq6HXOBxziq4EKCkVQYUuCNho=', 1, '2016-06-23 16:37:11', '2016-06-23 16:37:11');

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE IF NOT EXISTS `statuses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `page_id` int(11) DEFAULT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_bin,
  `attachment` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `video` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `goal_id` int(11) DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `group_status` int(11) DEFAULT NULL,
  `hide` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=421 ;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `user_id`, `parent_id`, `page_id`, `body`, `attachment`, `image`, `video`, `created_at`, `updated_at`, `goal_id`, `group_id`, `group_status`, `hide`) VALUES
(1, 1, 0, 1, 'DASOL created a new goal.', '', '', '', '2016-05-22 08:09:00', '2016-05-22 08:09:00', 1, 0, 0, 0),
(2, 1, 0, 1, 'DASOL updated a goal.', '', '', '', '2016-05-22 08:13:15', '2016-05-22 08:13:15', 1, 0, 0, 0),
(3, 1, 0, 2, 'congratulations! I knew you''d make an amazing website :* im so happy for you and proud of you =)', '', '', '', '2016-05-22 08:15:47', '2016-05-22 08:15:47', 0, 0, 0, 0),
(6, 1, 0, 1, 'DASOL updated a goal.', '', '', '', '2016-05-22 08:25:23', '2016-05-22 08:25:23', 1, 0, 0, 0),
(7, 1, 0, 1, 'DASOL updated a goal.', '', '', '', '2016-05-22 08:25:40', '2016-05-22 08:25:40', 1, 0, 0, 0),
(8, 1, 0, 0, 'hey let''s save a lot of money!', '', '', '', '2016-05-22 08:27:11', '2016-05-22 08:27:11', 0, 0, 1, 0),
(9, 2, 0, 2, 'Check out my new profile picture.', '', 'images/user_profile/1463906006image.jpeg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(10, 1, 0, 1, 'Check out my new cover picture.', '', 'images/user_cover/1463906130MyPhoto_1143206523_0395.png', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(11, 1, 0, 1, 'Check out my new profile picture.', '', 'images/user_profile/146390638220160424_174653.jpg', '', '2016-05-22 08:39:17', '2016-05-22 08:39:17', 0, 0, 0, 0),
(12, 2, 0, 2, 'We''re like super cool!!... ^_^', '', '', '', '2016-05-22 08:39:15', '2016-05-22 10:18:12', 0, 0, 0, 0),
(13, 2, 0, 2, 'Check out my new cover picture.', '', 'images/user_cover/1463906398image.jpeg', '', '2016-05-22 08:39:15', '2016-05-22 08:39:15', 0, 0, 0, 0),
(14, 1, 0, 1, 'Check out my new cover picture.', '', 'images/user_cover/1463906467IMG_20160508_202000_453.jpg', '', '2016-05-22 08:40:51', '2016-05-22 08:40:51', 0, 0, 0, 0),
(15, 1, 0, 1, 'When i have no money', '', 'images/user_images/1463906611MyPhoto_1143206523_0371.jpg', '', '2016-05-22 08:43:08', '2016-05-22 08:43:08', 0, 0, 0, 0),
(16, 2, 0, 2, 'This pug is super cool.', '', 'images/user_images/1463913478image.jpeg', '', '2016-05-22 10:37:34', '2016-05-24 07:12:43', 0, 0, 0, 0),
(17, 2, 3, 2, 'Thank you. ^_^', '', '', '', '2016-05-22 11:46:27', '2016-05-22 11:46:27', 0, 0, 0, 0),
(18, 2, 0, 2, 'Niall created a new goal.', '', '', '', '2016-05-22 12:04:35', '2016-05-22 12:04:35', 2, 0, 0, 0),
(19, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-22 12:09:03', '2016-05-22 12:09:03', 2, 0, 0, 0),
(20, 1, 12, 2, 'Yes we are', '', '', '', '2016-05-22 12:22:46', '2016-05-22 12:22:46', 0, 0, 0, 0),
(21, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-22 21:24:49', '2016-05-22 21:24:49', 2, 0, 0, 0),
(22, 2, 15, 1, 'Hahaha This picture is so cool.. ^_^', '', '', '', '2016-05-23 07:12:01', '2016-05-23 07:12:01', 0, 0, 0, 0),
(23, 2, 14, 1, 'This was so cool.. We should do it again soon..', '', '', '', '2016-05-23 07:12:01', '2016-05-23 07:12:01', 0, 0, 0, 0),
(24, 2, 0, 2, 'Check out my new group I just made!', '', '', '', '2016-05-23 07:13:41', '2016-05-23 07:13:41', 0, 2, 0, 0),
(25, 2, 0, 0, 'Hey welcome to the group. Let''s save some money. ^_^ Share any tips you have below.', '', '', '', '2016-05-23 07:15:32', '2016-05-23 11:41:38', 0, 0, 2, 0),
(26, 2, 0, 0, 'Welcome Dasol to the page.', '', '', '', '2016-05-23 09:09:00', '2016-05-23 09:09:00', 0, 0, 2, 0),
(27, 2, 0, 1, 'On my way', '', 'images/user_images/1463994980image.jpeg', '', '2016-05-23 09:15:29', '2016-05-23 09:15:29', 0, 0, 0, 0),
(29, 2, 0, 1, 'Hey boo it''s fixed.. ^_^', '', '', '', '2016-05-23 21:25:47', '2016-05-23 21:25:47', 0, 0, 0, 0),
(30, 2, 0, 2, 'Check out my new group I just made!', '', '', '', '2016-05-23 21:58:14', '2016-05-23 21:58:14', 0, 3, 0, 0),
(32, 2, 0, 2, 'Update has been activated that improves the mobile version of the site along with fixing the issues associated with the like button and redirect links. ', '', '', '', '2016-05-23 23:14:09', '2016-05-23 23:14:09', 0, 0, 0, 0),
(33, 2, 0, 0, NULL, '', 'images/group_cover/1464048763image.jpeg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 0),
(34, 2, 0, 0, ' updated their profile picture.', '', 'images/group_profile/1464048783image.jpeg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 0),
(35, 2, 0, 0, NULL, '', 'images/group_cover/1464048799image.jpeg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 0),
(36, 2, 0, 0, NULL, '', 'images/group_cover/1464048811image.jpeg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 2, 0),
(39, 1, 29, 1, 'wow now i give you some comments.. :)<br>', '', '', '', '2016-05-24 02:18:35', '2016-05-24 02:18:35', 0, 0, 0, 0),
(40, 1, 33, 0, 'omg i love it!', '', '', '', '2016-05-24 02:19:47', '2016-05-24 02:19:47', 0, 0, 0, 0),
(45, 2, 0, 2, 'Check out my new cover picture for my page.', '', 'images/user_cover/1464066530John.jpg', '', '2016-05-24 05:08:36', '2016-05-24 07:12:22', 0, 0, 0, 0),
(48, 2, 0, 0, 'We updated our cover picture.', '', 'images/group_cover/1464068773coders_cover.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 3, 0),
(49, 2, 0, 0, 'We updated our profile picture.', '', 'images/group_profile/1464068880image.png', '', '2016-05-24 05:47:37', '2016-05-24 05:47:37', 0, 0, 3, 0),
(50, 2, 0, 2, 'Version 1.0.0 released fixing issues with uploading images as statuses and editing statuses with images contained in them. Update 1.0.1 will look to fix issues with group recommendations and goal info redirect links.', '', '', '', '2016-05-24 07:12:44', '2016-05-24 07:25:27', 0, 0, 0, 0),
(51, 2, 0, 2, 'Haha I''m too cool for school... ', '', 'images/user_cover/1464074762cool.jpg', '', '2016-05-24 07:25:45', '2016-05-24 07:26:27', 0, 0, 0, 0),
(53, 2, 0, 1, 'Hello', '', 'images/user_images/1464075981image.jpg', '', '2016-05-24 07:46:00', '2016-05-24 07:48:23', 0, 0, 0, 0),
(54, 1, 16, 2, 'if he was fatter he''d be perfect.. :)', '', '', '', '2016-05-24 08:23:26', '2016-05-24 08:23:26', 0, 0, 0, 0),
(55, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 08:45:56', '2016-05-24 08:45:56', 2, 0, 0, 0),
(56, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 08:46:15', '2016-05-24 08:46:15', 2, 0, 0, 0),
(57, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 08:46:42', '2016-05-24 08:46:42', 2, 0, 0, 0),
(58, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 08:51:04', '2016-05-24 08:51:04', 2, 0, 0, 0),
(59, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 08:52:40', '2016-05-24 08:52:40', 2, 0, 0, 0),
(60, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 08:55:32', '2016-05-24 08:55:32', 2, 0, 0, 0),
(61, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 08:57:30', '2016-05-24 08:57:30', 2, 0, 0, 0),
(62, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 21:53:17', '2016-05-24 21:53:17', 2, 0, 0, 0),
(63, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 21:54:55', '2016-05-24 21:54:55', 2, 0, 0, 0),
(64, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 21:55:09', '2016-05-24 21:55:09', 3, 0, 0, 0),
(65, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 22:00:53', '2016-05-24 22:00:53', 2, 0, 0, 0),
(66, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-24 22:01:09', '2016-05-24 22:01:09', 3, 0, 0, 0),
(67, 2, 0, 2, 'Versions 1.0.1 is now active. This fixes problems associated with group recommendations and redirect links on the goal recommendations. Version 1.0.2 will add emoticons and different languages.', '', '', '', '2016-05-24 22:02:49', '2016-05-24 22:02:49', 0, 0, 0, 0),
(68, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-25 00:28:11', '2016-05-25 00:28:11', 2, 0, 0, 0),
(69, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-25 00:28:30', '2016-05-25 00:28:30', 3, 0, 0, 0),
(70, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-25 00:29:23', '2016-05-25 00:29:23', 2, 0, 0, 0),
(71, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-25 00:30:47', '2016-05-25 00:30:47', 3, 0, 0, 0),
(73, 2, 0, 2, 'Version 1.0.2 has now been uploaded allowing users to use multiple languages and the use of emoticons in the chat application.', '', '', '', '2016-05-25 10:53:42', '2016-05-25 10:53:42', 0, 0, 0, 0),
(75, 1, 0, 1, 'Profile and cover pictures can''t be changed..', '', '', '', '2016-05-25 11:04:42', '2016-05-25 11:04:42', 0, 0, 0, 0),
(76, 1, 53, 1, '♡', '', '', '', '2016-05-25 11:04:42', '2016-05-25 11:04:42', 0, 0, 0, 0),
(77, 1, 0, 1, 'Check out my new group I just made!', '', '', '', '2016-05-25 11:07:46', '2016-05-25 11:07:46', 0, 5, 0, 0),
(80, 2, 0, 2, 'Check out my new profile picture.', '', 'images/user_profile/1464174674cover.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(81, 2, 0, 2, 'Check out my new cover picture.', '', 'images/user_cover/1464174687cover.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(83, 2, 0, 2, 'Check out my new cover picture.', '', 'images/user_cover/1464175039image.jpeg', '', '2016-05-25 11:16:23', '2016-05-25 11:16:23', 0, 0, 0, 0),
(100, 2, 0, 2, 'Check out my new cover picture.', '', 'images/user_cover/1464176191cool.jpg', '', '2016-05-25 11:36:23', '2016-05-25 11:36:23', 0, 0, 0, 0),
(101, 2, 0, 2, 'Check out my new profile picture.', '', 'images/user_profile/1464176205cover.jpg', '', '2016-05-25 11:36:32', '2016-05-25 11:36:32', 0, 0, 0, 0),
(103, 2, 0, 0, 'We updated our cover picture.', '', 'images/group_cover/1464176460cool.jpg', '', '2016-05-25 11:40:41', '2016-05-25 11:40:41', 0, 0, 2, 0),
(106, 5, 0, 5, 'Check out my new profile picture.', '', 'images/user_profile/1464177144cover.jpg', '', '2016-05-25 11:52:07', '2016-05-25 11:52:07', 0, 0, 0, 0),
(107, 6, 0, 6, 'Check out my new profile picture.', '', 'images/user_profile/1464177321Capture.PNG', '', '2016-05-25 11:55:12', '2016-05-25 11:55:12', 0, 0, 0, 0),
(108, 6, 0, 6, 'Check out my new profile picture.', '', 'images/user_profile/1464177335coders_cover.jpg', '', '2016-05-25 11:55:21', '2016-05-25 11:55:21', 0, 0, 0, 0),
(109, 6, 0, 6, 'Check out my new cover picture.', '', 'images/user_cover/1464177335cool.jpg', '', '2016-05-25 11:55:21', '2016-05-25 11:55:21', 0, 0, 0, 0),
(114, 6, 0, 6, 'dsfasss', '', '', '', '2016-05-25 11:56:28', '2016-05-25 11:56:39', 0, 0, 0, 0),
(118, 6, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1464177504Capture.PNG', '', '2016-05-25 11:58:11', '2016-05-25 11:58:11', 0, 0, 6, 0),
(119, 6, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1464177504me.jpg', '', '2016-05-25 11:58:11', '2016-05-25 11:58:11', 0, 0, 6, 0),
(120, 1, 0, 1, 'DASOL updated a goal.', '', '', '', '2016-05-25 11:57:23', '2016-05-25 11:57:23', 1, 0, 0, 0),
(123, 1, 0, 1, 'Check out my new cover picture.', '', 'images/user_cover/1464177541MyPhoto_1143206523_0177.png', '', '2016-05-25 11:58:27', '2016-05-25 11:58:27', 0, 0, 0, 0),
(124, 1, 123, 1, 'Yay', '', '', '', '2016-05-25 11:59:01', '2016-05-25 11:59:01', 0, 0, 0, 0),
(126, 6, 0, 6, 'erwe', '', '', '', '2016-05-25 11:59:48', '2016-05-25 11:59:48', 0, 0, 0, 0),
(127, 6, 0, 6, 'erwe', '', '', '', '2016-05-25 11:59:48', '2016-05-25 11:59:48', 0, 0, 0, 0),
(128, 6, 0, 6, 'erwe', '', '', '', '2016-05-25 11:59:48', '2016-05-25 11:59:48', 0, 0, 0, 0),
(129, 6, 0, 6, 'erwe', '', '', '', '2016-05-25 11:59:48', '2016-05-25 11:59:48', 0, 0, 0, 0),
(130, 6, 0, 6, 'erwe', '', '', '', '2016-05-25 11:59:48', '2016-05-25 11:59:48', 0, 0, 0, 0),
(131, 6, 0, 6, 'asdasda', '', '', '', '2016-05-25 12:00:02', '2016-05-25 12:00:02', 0, 0, 0, 0),
(132, 6, 0, 6, 'asdasda', '', '', '', '2016-05-25 12:00:02', '2016-05-25 12:00:02', 0, 0, 0, 0),
(133, 6, 0, 6, 'asdasda', '', '', '', '2016-05-25 12:00:02', '2016-05-25 12:00:02', 0, 0, 0, 0),
(134, 6, 0, 6, 'asdasda', '', '', '', '2016-05-25 12:00:02', '2016-05-25 12:00:02', 0, 0, 0, 0),
(135, 6, 0, 6, 'asdasda', '', '', '', '2016-05-25 12:00:02', '2016-05-25 12:00:02', 0, 0, 0, 0),
(136, 6, 0, 6, 'asdasda', '', '', '', '2016-05-25 12:00:02', '2016-05-25 12:00:02', 0, 0, 0, 0),
(137, 6, 0, 6, 'asdasda', '', '', '', '2016-05-25 12:00:02', '2016-05-25 12:00:02', 0, 0, 0, 0),
(138, 6, 0, 6, 'grgfdgfdgfd', '', '', '', '2016-05-25 12:00:06', '2016-05-25 12:00:06', 0, 0, 0, 0),
(139, 6, 0, 6, 'grgfdgfdgfd', '', '', '', '2016-05-25 12:00:06', '2016-05-25 12:00:06', 0, 0, 0, 0),
(140, 6, 0, 6, 'grgfdgfdgfd', '', '', '', '2016-05-25 12:00:06', '2016-05-25 12:00:06', 0, 0, 0, 0),
(141, 6, 0, 6, 'grgfdgfdgfd', '', '', '', '2016-05-25 12:00:06', '2016-05-25 12:00:06', 0, 0, 0, 0),
(142, 6, 0, 6, 'grgfdgfdgfd', '', '', '', '2016-05-25 12:00:06', '2016-05-25 12:00:06', 0, 0, 0, 0),
(143, 6, 0, 6, 'grgfdgfdgfd', '', '', '', '2016-05-25 12:00:06', '2016-05-25 12:00:06', 0, 0, 0, 0),
(144, 6, 0, 6, 'grgfdgfdgfd', '', '', '', '2016-05-25 12:00:06', '2016-05-25 12:00:06', 0, 0, 0, 0),
(145, 6, 0, 6, 'grgfdgfdgfd<br>', '', '', '', '2016-05-25 12:00:06', '2016-05-25 12:00:06', 0, 0, 0, 0),
(146, 6, 0, 6, 'ss', '', '', '', '2016-05-25 12:00:13', '2016-05-25 12:00:13', 0, 0, 0, 0),
(147, 6, 0, 6, 'ss', '', '', '', '2016-05-25 12:00:13', '2016-05-25 12:00:13', 0, 0, 0, 0),
(148, 6, 0, 6, 'ss', '', '', '', '2016-05-25 12:00:13', '2016-05-25 12:00:13', 0, 0, 0, 0),
(149, 6, 0, 6, 'ss', '', '', '', '2016-05-25 12:00:13', '2016-05-25 12:00:13', 0, 0, 0, 0),
(150, 6, 0, 6, 'ss', '', '', '', '2016-05-25 12:00:13', '2016-05-25 12:00:13', 0, 0, 0, 0),
(151, 6, 0, 6, 'ss', '', '', '', '2016-05-25 12:00:13', '2016-05-25 12:00:13', 0, 0, 0, 0),
(152, 6, 0, 6, 'ss', '', '', '', '2016-05-25 12:00:13', '2016-05-25 12:00:13', 0, 0, 0, 0),
(153, 6, 0, 6, '2 created a new goal.', '', '', '', '2016-05-25 12:01:22', '2016-05-25 12:01:22', 14, 0, 0, 0),
(154, 1, 0, 1, 'Uploaded a picture', '', 'images/user_images/1464177814Snapchat-5798553434636471185.jpg', '', '2016-05-25 12:02:30', '2016-05-25 12:02:30', 0, 0, 0, 0),
(157, 6, 0, 6, 'Check out my new group I just made!', '', '', '', '2016-05-25 12:32:17', '2016-05-25 12:32:17', 0, 9, 0, 0),
(159, 2, 146, 6, 'ss', '', '', '', '2016-05-25 13:11:11', '2016-05-25 13:11:11', 0, 0, 0, 0),
(160, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-05-25 13:51:38', '2016-05-25 13:51:38', 3, 0, 0, 0),
(162, 2, 0, 2, 'aa', '', '', '', '2016-05-26 04:17:37', '2016-05-26 04:17:37', 0, 0, 0, 0),
(178, 6, 0, 6, 's', '', '', '', '2016-05-26 12:48:31', '2016-05-26 12:48:31', 0, 0, 0, 0),
(179, 6, 0, 0, 'sdfsd', '', '', '', '2016-05-26 12:49:52', '2016-05-26 12:49:52', 0, 0, 9, 0),
(180, 2, 0, 2, 'Version 1.0.3 has now been released fixing issues with the timeline and minor bugs.', '', '', '', '2016-05-26 12:52:22', '2016-05-26 12:52:22', 0, 0, 0, 0),
(181, 2, 0, 0, 'Check it out! We just updated our groups goal.', '', '', '', '2016-05-26 15:23:26', '2016-05-26 15:23:26', 4, 0, 3, 0),
(183, 2, 0, 1, '안녕', '', '', '', '2016-05-27 08:14:03', '2016-05-27 08:14:03', 0, 0, 0, 0),
(184, 2, 0, 2, 'Version 1.0.4 has now been released improving the users timeline.', '', '', '', '2016-05-27 08:24:39', '2016-05-27 08:28:04', 0, 0, 0, 0),
(185, 7, 0, 7, 'fds', '', '', '', '2016-05-27 08:54:25', '2016-05-27 08:54:25', 0, 0, 0, 0),
(186, 7, 0, 7, 'Check out my new profile picture.', '', 'images/user_profile/1464339289John.jpg', '', '2016-05-27 08:54:33', '2016-05-27 08:54:33', 0, 0, 0, 0),
(187, 7, 0, 7, 'Check out my new cover picture.', '', 'images/user_cover/1464339289me.jpg', '', '2016-05-27 08:54:33', '2016-05-27 08:54:33', 0, 0, 0, 0),
(191, 7, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1464339345Sinn1.jpg', '', '2016-05-27 08:55:28', '2016-05-27 08:55:28', 0, 0, 11, 0),
(192, 7, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1464339345Sinn.jpg', '', '2016-05-27 08:55:28', '2016-05-27 08:55:28', 0, 0, 11, 0),
(193, 7, 0, 0, 'dwa', '', '', '', '2016-05-27 08:55:45', '2016-05-27 08:55:45', 0, 0, 11, 0),
(194, 7, 0, 0, 'Uploaded a picture', '', 'images/user_images/1464339356cover.jpg', '', '2016-05-27 08:55:45', '2016-05-27 08:55:45', 0, 0, 11, 0),
(199, 2, 0, 2, 'Check out my new profile picture.', '', 'images/user_profile/1464339731image.jpeg', '', '2016-05-27 09:01:23', '2016-05-27 09:01:23', 0, 0, 0, 0),
(200, 2, 0, 2, 'Check out my new cover picture.', '', 'images/user_cover/1464339731image.jpeg', '', '2016-05-27 09:01:23', '2016-05-27 09:01:23', 0, 0, 0, 0),
(201, 1, 0, 1, 'Check out my new cover picture.', '', 'images/user_cover/1464345375IMG_20160519_084814_049.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(203, 1, 0, 1, NULL, '', 'images/user_profile/146434619220160426_200903.jpg', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0, 0, 0),
(204, 1, 0, 1, 'Check out my new profile picture.', '', 'images/user_profile/1464346280MyPhoto_1143206523_0397.png', '', '2016-05-27 10:50:53', '2016-05-27 10:50:53', 0, 0, 0, 0),
(205, 1, 0, 1, 'Check out my new cover picture.', '', 'images/user_cover/1464346280IMG_20160508_202000_453.jpg', '', '2016-05-27 10:50:53', '2016-05-27 10:50:53', 0, 0, 0, 0),
(207, 3, 0, 3, 'Legs crippled after last nights game', '', '', '', '2016-05-27 11:45:15', '2016-05-27 11:45:15', 0, 0, 0, 0),
(208, 2, 207, 3, 'My hero', '', '', '', '2016-05-27 11:47:01', '2016-05-27 11:47:01', 0, 0, 0, 0),
(209, 2, 0, 3, 'Uploaded a picture', '', 'images/user_images/1464349746image.jpeg', '', '2016-05-27 11:48:53', '2016-05-27 11:48:53', 0, 0, 0, 0),
(211, 3, 209, 3, 'Who''s that tank going up for the ball?<br>', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(215, 3, 209, 3, 'Who''s that tank going up for the ball?<br>', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(216, 3, 209, 3, 'Who''s that tank going up for the ball?<br>', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(217, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(218, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(219, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(220, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(221, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(222, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(223, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(224, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(225, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(226, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(227, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(228, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(229, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(230, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(231, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(232, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(233, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(234, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(235, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(236, 3, 209, 3, 'Who''s the tank at 12?', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(237, 3, 209, 3, 'tank', '', '', '', '2016-05-27 11:49:33', '2016-05-27 11:49:33', 0, 0, 0, 0),
(238, 2, 0, 2, 'Version 1.0.5 now active making improvements to landing and register pages.', '', '', '', '2016-05-29 12:08:39', '2016-05-29 12:08:39', 0, 0, 0, 0),
(240, 2, 0, 0, 'Hey Seamus welcome to the group. ', '', '', '', '2016-06-01 08:00:48', '2016-06-01 08:02:15', 0, 0, 3, 0),
(242, 2, 0, 2, 'Niall created a new goal.', '', '', '', '2016-06-02 05:36:48', '2016-06-02 05:36:48', 17, 0, 0, 0),
(243, 2, 0, 1, '공부 싫어', '', 'images/user_images/1464846063image.jpg', '', '2016-06-02 05:40:07', '2016-06-02 05:41:23', 0, 0, 0, 0),
(244, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-06-02 05:41:55', '2016-06-02 05:41:55', 17, 0, 0, 0),
(246, 2, 0, 0, 'Check it out! We just updated our groups goal.', '', '', '', '2016-06-02 08:40:45', '2016-06-02 08:40:45', 4, 0, 3, 0),
(247, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-06-02 08:42:00', '2016-06-02 08:42:00', 3, 0, 0, 0),
(248, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-06-02 08:42:58', '2016-06-02 08:42:58', 3, 0, 0, 0),
(249, 2, 0, 2, 'Version 1.0.6 now active redesigning the logo for mobile use as well as tab logo for mobile and desktop. Also adding ''posted to'' functionality for timelines.', '', '', '', '2016-06-02 09:08:34', '2016-06-02 09:08:34', 0, 0, 0, 0),
(250, 1, 243, 1, '귀요미 힘내(l)', '', '', '', '2016-06-02 09:14:44', '2016-06-02 09:14:44', 0, 0, 0, 0),
(251, 1, 0, 1, NULL, '', 'images/user_profile/1464999745IMG_20160519_084814_049.jpg', '', '2016-06-04 00:22:02', '2016-06-04 00:22:02', 0, 0, 0, 0),
(252, 1, 0, 1, 'DASOL updated a goal.', '', '', '', '2016-06-04 13:13:25', '2016-06-04 13:13:25', 1, 0, 0, 0),
(253, 2, 0, 1, '이 사진 좋아... ㅎㅎ~', '', 'images/user_images/1465046190image.jpeg', '', '2016-06-04 13:16:01', '2016-06-04 13:17:14', 0, 0, 0, 0),
(254, 1, 253, 1, '나는 시러...ㅋㅋㅋ', '', '', '', '2016-06-04 13:17:26', '2016-06-04 13:17:26', 0, 0, 0, 0),
(255, 2, 0, 1, NULL, '', 'images/user_images/1465047029image.jpeg', '', '2016-06-04 13:29:49', '2016-06-04 13:29:49', 0, 0, 0, 0),
(256, 2, 0, 8, '안녕... :-)', '', '', '', '2016-06-05 04:45:29', '2016-06-05 04:45:29', 0, 0, 0, 0),
(257, 2, 0, 2, 'Check out my new profile picture.', '', 'images/user_profile/1465132699image.jpeg', '', '2016-06-05 13:17:52', '2016-06-05 13:17:52', 0, 0, 0, 0),
(258, 1, 257, 2, '좋아...', '', '', '', '2016-06-05 14:05:40', '2016-06-05 14:05:40', 0, 0, 0, 0),
(259, 2, 0, 2, 'Check out my new profile picture.', '', 'images/user_profile/1465137723me.jpg', '', '2016-06-05 14:41:29', '2016-06-05 14:41:29', 0, 0, 0, 0),
(260, 2, 0, 2, 'Niall updated a goal. 70% there.', '', '', '', '2016-06-05 15:11:18', '2016-06-05 15:12:08', 3, 0, 0, 0),
(276, 2, 0, 1, 'Sleep well 자기... ', '', '', '', '2016-06-05 16:01:48', '2016-06-05 16:01:48', 0, 0, 0, 0),
(288, 2, 0, 2, 'Version 1.0.7 now active fixing time stamps, status position, improving the timeline, and adding an info box on registration page.', '', '', '', '2016-06-06 20:23:58', '2016-06-06 04:29:07', 0, 0, 0, 0),
(289, 2, 0, 2, 'Niall updated a goal. 80%. Getting there slowly but surely.', '', '', '', '2016-06-06 20:29:33', '2016-06-06 04:30:30', 3, 0, 0, 0),
(290, 3, 0, 3, 'Check out my new profile picture.', '', 'images/user_profile/1465412469DIT.jpg', '', '2016-06-09 03:00:50', '2016-06-09 03:00:50', 0, 0, 0, 0),
(291, 3, 0, 2, 'Niall I can''t set myself a goal on igoalo.... everytime I create a goal it doesn''t save properly.....', '', '', '', '2016-06-09 03:01:40', '2016-06-09 03:01:40', 0, 0, 0, 0),
(292, 9, 0, 9, 'Check out my new profile picture.', '', 'images/user_profile/1465449248jsp.jpg', '', '2016-06-09 20:53:24', '2016-06-09 20:53:24', 0, 0, 0, 0),
(293, 9, 0, 9, 'Check out my new cover picture.', '', 'images/user_cover/1465449248jsc.jpg', '', '2016-06-09 20:53:24', '2016-06-09 20:53:24', 0, 0, 0, 0),
(294, 9, 0, 9, 'John created a new goal.', '', '', '', '2016-06-09 21:14:12', '2016-06-09 21:14:12', 18, 0, 0, 0),
(295, 9, 0, 9, 'Anyone want to join a group for travel? I''m going to make one. Feel free to join.', '', '', '', '2016-06-09 21:16:03', '2016-06-09 21:16:03', 0, 0, 0, 0),
(296, 9, 0, 9, 'Check out my new group I just made!', '', '', '', '2016-06-09 21:16:03', '2016-06-09 21:16:03', 0, 12, 0, 0),
(297, 9, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1465449908tropiclife-1257189-640x960.jpg', '', '2016-06-09 21:24:43', '2016-06-09 21:24:43', 0, 0, 12, 0),
(298, 9, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1465449908jwp2.jpg', '', '2016-06-09 21:24:43', '2016-06-09 21:24:43', 0, 0, 12, 0),
(299, 9, 0, 0, 'Check out the groups new goal!', '', '', '', '2016-06-09 21:25:13', '2016-06-09 21:25:13', 19, 0, 12, 0),
(300, 9, 0, 0, 'Snapped this picture in France last Month. Amazing trip.', '', 'images/user_images/1465450178like-god-in-france-1542388-639x852.jpg', '', '2016-06-09 21:27:57', '2016-06-09 05:30:07', 0, 0, 12, 0),
(302, 9, 0, 9, 'John updated a goal.', '', '', '', '2016-06-09 21:34:17', '2016-06-09 21:34:17', 18, 0, 0, 0),
(303, 10, 0, 10, 'Check out my new profile picture.', '', 'images/user_profile/1465450592kgp.jpg', '', '2016-06-09 21:36:19', '2016-06-09 21:36:19', 0, 0, 0, 0),
(304, 10, 0, 10, 'Just joined and I''m excited to find people like me to share my goals with.', '', '', '', '2016-06-09 21:36:36', '2016-06-09 21:36:36', 0, 0, 0, 0),
(305, 10, 0, 10, 'Check out my new cover picture.', '', 'images/user_cover/1465450648kgc.jpg', '', '2016-06-09 21:36:36', '2016-06-09 21:36:36', 0, 0, 0, 0),
(306, 10, 0, 10, 'Stacey created a new goal.', '', '', '', '2016-06-09 21:37:40', '2016-06-09 21:37:40', 20, 0, 0, 0),
(308, 10, 0, 10, 'Check out my new group I just made!', '', '', '', '2016-06-09 21:40:35', '2016-06-09 21:40:35', 0, 13, 0, 0),
(309, 10, 0, 10, 'Come and join the savers group so we can share tips on saving in NYC.', '', '', '', '2016-06-09 21:41:25', '2016-06-09 21:41:25', 0, 0, 0, 0),
(312, 10, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1465451020money-tin-1421115-639x852.jpg', '', '2016-06-09 21:43:19', '2016-06-09 21:43:19', 0, 0, 13, 0),
(313, 10, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1465451020piggy-bank-1-1377929-639x574.jpg', '', '2016-06-09 21:43:19', '2016-06-09 21:43:19', 0, 0, 13, 0),
(314, 10, 0, 0, 'Check out the groups new goal!', '', '', '', '2016-06-09 21:43:45', '2016-06-09 21:43:45', 21, 0, 13, 0),
(315, 10, 0, 10, 'Stacey created a new goal.', '', '', '', '2016-06-09 21:45:39', '2016-06-09 21:45:39', 22, 0, 0, 0),
(316, 10, 0, 10, 'Check out my new group I just made!', '', '', '', '2016-06-09 21:47:38', '2016-06-09 21:47:38', 0, 14, 0, 0),
(317, 10, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1465451353soccer-1577759-639x426.jpg', '', '2016-06-09 21:49:00', '2016-06-09 21:49:00', 0, 0, 14, 0),
(318, 10, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1465451353soccer-players-1240339-640x398.jpg', '', '2016-06-09 21:49:00', '2016-06-09 21:49:00', 0, 0, 14, 0),
(319, 10, 0, 0, 'It''ll be a long season but this is our aim for this year. Come on everyone. If we do it together nothing can stop us.', '', '', '', '2016-06-09 21:49:17', '2016-06-09 05:52:15', 23, 0, 14, 0),
(320, 11, 0, 11, 'Check out my new profile picture.', '', 'images/user_profile/1465452182jwp.jpg', '', '2016-06-09 22:02:37', '2016-06-09 22:02:37', 0, 0, 0, 0),
(321, 11, 0, 11, 'Check out my new cover picture.', '', 'images/user_cover/1465452182tcc.jpg', '', '2016-06-09 22:02:37', '2016-06-09 22:02:37', 0, 0, 0, 0),
(322, 11, 0, 11, 'Jimmy created a new goal.', '', '', '', '2016-06-09 22:04:03', '2016-06-09 22:04:03', 24, 0, 0, 0),
(324, 11, 0, 11, 'Check out my new group I just made!', '', '', '', '2016-06-09 22:05:43', '2016-06-09 22:05:43', 0, 15, 0, 0),
(325, 11, 0, 0, 'Check out the groups new goal!', '', '', '', '2016-06-09 22:06:28', '2016-06-09 22:06:28', 25, 0, 15, 0),
(326, 11, 0, 0, 'We are going to meet by taco bell on 5th avenue. Send me a message if you need directions.', '', '', '', '2016-06-09 22:07:38', '2016-06-09 22:07:38', 0, 0, 15, 0),
(327, 11, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1465452560running-track-1442219-640x960.jpg', '', '2016-06-09 22:07:38', '2016-06-09 22:07:38', 0, 0, 15, 0),
(328, 11, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1465452560running-in-the-morning-1538848-639x426.jpg', '', '2016-06-09 22:07:38', '2016-06-09 22:07:38', 0, 0, 15, 0),
(329, 12, 0, 12, 'Check out my new profile picture.', '', 'images/user_profile/1465452794tjp.jpg', '', '2016-06-09 22:12:49', '2016-06-09 22:12:49', 0, 0, 0, 0),
(330, 12, 0, 12, 'Check out my new cover picture.', '', 'images/user_cover/1465452794tjc.jpg', '', '2016-06-09 22:12:49', '2016-06-09 22:12:49', 0, 0, 0, 0),
(331, 12, 0, 12, 'Toby created a new goal.', '', '', '', '2016-06-09 22:13:18', '2016-06-09 22:13:18', 26, 0, 0, 0),
(332, 12, 0, 12, 'Toby updated a goal.', '', '', '', '2016-06-09 22:14:53', '2016-06-09 22:14:53', 26, 0, 0, 0),
(333, 13, 0, 13, 'Check out my new profile picture.', '', 'images/user_profile/1465453329tp.jpg', '', '2016-06-09 22:21:40', '2016-06-09 22:21:40', 0, 0, 0, 0),
(334, 13, 0, 13, 'Check out my new cover picture.', '', 'images/user_cover/1465453329tcp.jpg', '', '2016-06-09 22:21:40', '2016-06-09 22:21:40', 0, 0, 0, 0),
(335, 13, 0, 13, 'Tommy created a new goal.', '', '', '', '2016-06-09 22:22:14', '2016-06-09 22:22:14', 27, 0, 0, 0),
(336, 13, 0, 13, 'Tommy updated a goal.', '', '', '', '2016-06-09 22:23:38', '2016-06-09 22:23:38', 27, 0, 0, 0),
(337, 13, 0, 13, 'Check out my new group I just made!', '', '', '', '2016-06-09 22:23:50', '2016-06-09 22:23:50', 0, 16, 0, 0),
(338, 13, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1465453532basketball-hoop-1425019-640x480.jpg', '', '2016-06-09 22:24:38', '2016-06-09 22:24:38', 0, 0, 16, 0),
(339, 13, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1465453532p-squared-1535223-640x480.jpg', '', '2016-06-09 22:24:38', '2016-06-09 22:24:38', 0, 0, 16, 0),
(340, 13, 0, 0, 'Check out the groups new goal!', '', '', '', '2016-06-09 22:25:37', '2016-06-09 22:25:37', 28, 0, 16, 0),
(341, 13, 0, 13, 'Check out my new group I just made!', '', '', '', '2016-06-09 22:26:15', '2016-06-09 22:26:15', 0, 17, 0, 0),
(342, 13, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1465453637sphere-1167759-640x640.jpg', '', '2016-06-09 22:27:04', '2016-06-09 22:27:04', 0, 0, 17, 0),
(343, 13, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1465453637command-line-pt-1-2-1243745-640x480.jpg', '', '2016-06-09 22:27:04', '2016-06-09 22:27:04', 0, 0, 17, 0),
(344, 13, 0, 0, 'Check out the groups new goal!', '', '', '', '2016-06-09 22:27:22', '2016-06-09 22:27:22', 29, 0, 17, 0),
(345, 13, 0, 0, 'We have decided to make a simple Java customer invoice project. Any ideas on how to start?', '', '', '', '2016-06-09 22:28:24', '2016-06-09 22:28:24', 0, 0, 17, 0),
(346, 14, 0, 14, 'Check out my new profile picture.', '', 'images/user_profile/1465454010waiting-woman-1575621-640x960.jpg', '', '2016-06-09 22:31:42', '2016-06-09 22:31:42', 0, 0, 0, 0),
(347, 14, 0, 14, 'Check out my new cover picture.', '', 'images/user_cover/1465454010music-3-1418397-639x387.jpg', '', '2016-06-09 22:31:42', '2016-06-09 22:31:42', 0, 0, 0, 0),
(348, 14, 0, 14, 'Kylie created a new goal.', '', '', '', '2016-06-09 22:33:34', '2016-06-09 22:33:34', 30, 0, 0, 0),
(349, 14, 0, 14, 'Kylie created a new goal.', '', '', '', '2016-06-09 22:34:52', '2016-06-09 22:34:52', 31, 0, 0, 0),
(350, 14, 0, 14, 'Check out my new group I just made!', '', '', '', '2016-06-09 22:36:23', '2016-06-09 22:36:23', 0, 18, 0, 0),
(352, 14, 0, 14, 'Kylie updated a goal.', '', '', '', '2016-06-09 22:37:24', '2016-06-09 22:37:24', 30, 0, 0, 0),
(353, 14, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1465454354yoga-1428634-639x713.jpg', '', '2016-06-09 22:38:03', '2016-06-09 22:38:03', 0, 0, 18, 0),
(354, 14, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1465454354meditation-1-1236900-638x440.jpg', '', '2016-06-09 22:38:03', '2016-06-09 22:38:03', 0, 0, 18, 0),
(355, 14, 0, 14, 'Kylie updated a goal.', '', '', '', '2016-06-09 22:39:40', '2016-06-09 22:39:40', 30, 0, 0, 0),
(356, 9, 0, 9, 'John created a new goal.', '', '', '', '2016-06-09 22:40:03', '2016-06-09 22:40:03', 32, 0, 0, 0),
(357, 9, 0, 9, 'John updated a goal.', '', '', '', '2016-06-09 22:41:08', '2016-06-09 22:41:08', 32, 0, 0, 0),
(358, 9, 0, 9, 'Check out my new group I just made!', '', '', '', '2016-06-09 22:44:03', '2016-06-09 22:44:03', 0, 19, 0, 0),
(359, 9, 0, 0, 'We added a new profile picture.', '', 'images/group_profile/1465454821fluminense-shirt-1464215-640x480.jpg', '', '2016-06-09 22:45:20', '2016-06-09 22:45:20', 0, 0, 19, 0),
(360, 9, 0, 0, 'We added a new cover picture.', '', 'images/group_cover/1465454821galatasaray-1440574-640x480.jpg', '', '2016-06-09 22:45:20', '2016-06-09 22:45:20', 0, 0, 19, 0),
(361, 9, 0, 0, 'Check out the groups new goal!', '', '', '', '2016-06-09 22:47:06', '2016-06-09 22:47:06', 33, 0, 19, 0),
(362, 9, 0, 9, 'John updated a goal.', '', '', '', '2016-06-09 23:14:52', '2016-06-09 23:14:52', 32, 0, 0, 0),
(363, 3, 0, 3, 'Seamus created a new goal.', '', '', '', '2016-06-09 17:48:37', '2016-06-09 17:48:37', 34, 0, 0, 0),
(364, 3, 0, 3, 'Seams new awesome post!!! :D', '', '', '', '2016-06-09 17:55:56', '2016-06-09 17:55:56', 0, 0, 0, 0),
(365, 1, 0, 2, '자기', '', '', '', '2016-06-10 03:03:17', '2016-06-10 03:03:17', 0, 0, 0, 0),
(366, 2, 365, 2, '여보', '', '', '', '2016-06-09 12:10:33', '2016-06-09 12:11:23', 0, 0, 0, 0),
(381, 2, 364, 3, 'All working well now. Turns out when I changed some code before because one of the stackoverlords said it was best practice turned out to actually break the code and wouldnt work because of it. Changed it back and the timeline is kicking again.. Thanks for helping.', '', '', '', '2016-06-09 14:18:20', '2016-06-09 14:18:20', 0, 0, 0, 0),
(382, 2, 0, 2, 'Version 1.0.9 now active fixing issues with timelines and friend lists.', '', '', '', '2016-06-10 06:24:56', '2016-06-10 06:24:56', 0, 0, 0, 0),
(383, 2, 0, 2, 'I''m going to redesign the landing page(the first page you see when you go to igoalo.com) Any suggestions on what it should look like??', '', '', '', '2016-06-10 06:25:52', '2016-06-10 06:25:52', 0, 0, 0, 0),
(385, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-06-10 06:27:27', '2016-06-10 06:27:27', 3, 0, 0, 0),
(386, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-06-10 06:27:41', '2016-06-10 06:27:41', 17, 0, 0, 0),
(387, 2, 386, 2, 'Finished half of head first java and half of the new boston youtube videos.', '', '', '', '2016-06-09 14:27:51', '2016-06-09 14:27:51', 0, 0, 0, 0),
(388, 2, 290, 3, 'That beard is just majestic', '', '', '', '2016-06-09 14:29:05', '2016-06-09 14:29:05', 0, 0, 0, 0),
(389, 1, 0, 1, NULL, '', 'images/user_images/146570465920160611_113223.jpg', '', '2016-06-12 20:09:24', '2016-06-12 20:09:24', 0, 0, 0, 0),
(390, 1, 0, 1, 'Check out my new profile picture.', '', 'images/user_profile/146570471520160611_113201.jpg', '', '2016-06-12 20:11:02', '2016-06-12 20:11:02', 0, 0, 0, 0),
(391, 1, 389, 1, '자기 when i post it i wrote "on the train to jecheon" but it''s not showing that', '', '', '', '2016-06-12 04:11:56', '2016-06-12 08:26:37', 0, 0, 0, 0),
(392, 2, 389, 1, 'Haha I''ve added it to the list of things to check out... :-)', '', '', '', '2016-06-12 08:18:48', '2016-06-12 08:18:48', 0, 0, 0, 0),
(393, 1, 0, 1, 'DASOL created a new goal.', '', '', '', '2016-06-13 00:28:34', '2016-06-13 00:28:34', 35, 0, 0, 0),
(394, 2, 393, 1, '할수있다.... ', '', '', '', '2016-06-12 09:04:50', '2016-06-12 09:04:50', 0, 0, 0, 0),
(395, 1, 393, 1, '@poolio123 고맙다', '', '', '', '2016-06-12 09:16:06', '2016-06-12 09:16:06', 0, 0, 0, 0),
(396, 2, 0, 2, 'Version 1.0.9 now active bringing live notifications with sound bites. This update also solves the problems associated with time for private messaging. As of now private messaging is instant with only a 1 second delay between time sent and time received. The menu button for mobile use has been updated to change color when a notification is present so users don''t need to click it to see anymore. ', '', '', '', '2016-06-14 00:59:52', '2016-06-14 00:59:52', 0, 0, 0, 0),
(397, 8, 0, 8, 'Check out my new profile picture.', '', 'images/user_profile/1465812463IMG_7031.PNG', '', '2016-06-14 02:07:39', '2016-06-14 02:07:39', 0, 0, 0, 0),
(398, 8, 256, 8, '완전 반갑구만!!!!!! <br>TOTALLY WELCOME !!!^^ <br><br>', '', '', '', '2016-06-13 10:08:11', '2016-06-13 10:08:11', 0, 0, 0, 0),
(403, 2, 0, 2, 'Version 1.1.0 now active redesigning the landing page.', '', '', '', '2016-06-18 19:51:22', '2016-06-18 19:51:22', 0, 0, 0, 0),
(404, 8, 0, 8, 'HELLO', '', '', '', '2016-06-18 20:39:56', '2016-06-18 20:39:56', 0, 0, 0, 0),
(405, 8, 0, 8, 'Doyun created a new goal.', '', '', '', '2016-06-18 20:47:26', '2016-06-18 20:47:26', 36, 0, 0, 0),
(406, 8, 0, 8, 'Doyun updated a goal.', '', '', '', '2016-06-18 20:47:48', '2016-06-18 20:47:48', 36, 0, 0, 0),
(407, 8, 0, 0, 'Hello __ from  DOYUN & NIALL <br>', '', '', '', '2016-06-18 20:49:02', '2016-06-18 20:49:02', 0, 0, 5, 0),
(411, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-06-20 22:58:01', '2016-06-20 22:58:01', 17, 0, 0, 0),
(413, 2, 0, 2, 'Version 1.1.1 will be available by 06/25', '', '', '', '2016-06-21 03:57:26', '2016-06-20 11:59:22', 37, 0, 0, 0),
(414, 2, 0, 2, 'Niall updated a goal.', '', '', '', '2016-06-23 00:56:06', '2016-06-23 00:56:06', 37, 0, 0, 0),
(415, 1, 414, 2, 'Remember me', '', '', '', '2016-06-22 13:03:58', '2016-06-22 13:03:58', 0, 0, 0, 0),
(416, 16, 0, 16, 'Kerry created a new goal.', '', '', '', '2016-06-23 04:05:08', '2016-06-23 04:05:08', 38, 0, 0, 0),
(417, 16, 0, 16, 'Kerry created a new goal.', '', '', '', '2016-06-23 04:05:31', '2016-06-23 04:05:31', 39, 0, 0, 0),
(418, 16, 0, 16, 'Kerry updated a goal.', '', '', '', '2016-06-23 04:06:05', '2016-06-23 04:06:05', 39, 0, 0, 0),
(419, 16, 0, 16, 'Check out my new profile picture.', '', 'images/user_profile/1466626214kerryyyy.jpg', '', '2016-06-23 04:10:09', '2016-06-23 04:10:09', 0, 0, 0, 0),
(420, 16, 0, 16, 'Check out my new cover picture.', '', 'images/user_cover/1466626355background pic.jpg', '', '2016-06-23 04:12:32', '2016-06-23 04:12:32', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `password` varchar(20) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `firstname` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `surname` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `gender` varchar(6) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `age` varchar(16) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `address` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `state` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `country` varchar(40) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `post` varchar(15) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `phone` varchar(30) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `cover_image_upload_location` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `profile_image_upload_location` varchar(100) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `main_goal` int(11) DEFAULT NULL,
  `about` varchar(250) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_login` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `activated` int(1) NOT NULL,
  `terms` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `firstname`, `surname`, `gender`, `age`, `address`, `state`, `country`, `post`, `phone`, `email`, `cover_image_upload_location`, `profile_image_upload_location`, `main_goal`, `about`, `created_at`, `updated_at`, `last_login`, `activated`, `terms`) VALUES
(1, 'dslovely4375', '$2y$10$58bihzBaTQcfj', 'DASOL', 'KIM', 'female', '27/01/1992', 'YEONGWOL', 'Kangwon-do', 'Korea, South', '', '821021112168', 'dslovely4375@gmail.com', 'images/user_cover/1464346280IMG_20160508_202000_453.jpg', 'images/user_profile/146570471520160611_113201.jpg', 35, '', '2016-06-23 00:37:17', '2016-06-14 11:00:21', '2016-06-23 16:37:11', 0, 1),
(2, 'poolio123', '$2y$10$eqiERfrRkE.s1', 'Niall', 'O Connor', 'male', '04/09/1990', 'Brosna', 'Kerry', 'Ireland', '', '', 'nialloc9@gmail.com', 'images/user_cover/1464339731image.jpeg', 'images/user_profile/1465137723me.jpg', 17, '', '2016-06-23 00:25:01', '2016-06-05 14:41:29', '2016-06-23 16:24:58', 0, 1),
(3, 'Seamo123', '$2y$10$N.7zer0g9iVM3', 'Seamus', 'O Connor', 'male', '04/09/1990', '4 The Cross', 'Kerry', 'Ireland', '', '', 'seamo123@gmail.com', '', 'images/user_profile/1465412469DIT.jpg', 0, '', '2016-06-08 19:01:09', '2016-06-09 03:00:50', '2016-06-08 19:01:09', 0, 1),
(4, 'iGoalo', '$2y$10$zVJuxGnWiDWll', 'iGoalo', 'Admin', 'on', '24/05/2016', 'Brosna', 'Kerry', 'Ireland', '', '', 'info@igoalo.com', '', '', 0, '', '2016-05-24 04:34:01', '2016-05-24 04:34:01', '2016-05-24 04:34:01', 0, 1),
(5, 'igoalo', '$2y$10$HRMQcm2oMK6v0', 'igoalo', 'igoalo', 'male', '25/05/2016', 'Brosna', 'Kerry', 'Ireland', '', '', 'igoalo@igoalo.com', '', 'images/user_profile/1464177144cover.jpg', 0, '', '2016-05-25 11:52:24', '2016-05-25 11:52:07', '2016-05-25 11:52:24', 0, 1),
(6, '2', '$2y$10$nebkWf0fzeYiv', '2', '2', 'male', '25/05/2016', '2', 'South Australia', 'Australia', '2', '2', '22@22.com', 'images/user_cover/1464177335cool.jpg', 'images/user_profile/1464177335coders_cover.jpg', 12, '', '2016-05-25 11:56:04', '2016-05-25 11:55:21', '2016-05-25 11:55:35', 0, 1),
(7, '3', '$2y$10$zFB3VrN7ix1Js', '3', '3', 'male', '05/04/2016', '3', 'Delvine', 'Albania', '3', '3', '33@3.com', 'images/user_cover/1464339289me.jpg', 'images/user_profile/1464339289John.jpg', 15, '', '2016-05-27 08:55:07', '2016-05-27 08:54:33', '2016-05-27 08:54:49', 0, 1),
(8, 'dykwon23', '$2y$10$Nm.btBDkQUPR3', 'Doyun', 'Kwon', 'male', '14/03/1993', 'Yeongwol hasongro 115', 'Kangwon-do', 'Korea, South', '', '', 'dykwon23@gmail.com', '', 'images/user_profile/1465812463IMG_7031.PNG', 36, '', '2016-06-18 04:47:48', '2016-06-14 02:07:39', '2016-06-13 10:07:43', 0, 1),
(9, 'js24', '$2y$10$zaYeoJbXFnCpC', 'John', 'Smith', 'male', '05/06/1985', 'Irvington', 'New York', 'USA', '10533', '1-212-509-6995', 'jsmith@gmail.com', 'images/user_cover/1465449248jsc.jpg', 'images/user_profile/1465449248jsp.jpg', 32, '', '2016-06-22 09:19:34', '2016-06-09 20:53:24', '2016-06-22 09:19:34', 0, 1),
(10, 'staceyp', '$2y$10$6sGEs8Ns1n0Z0', 'Stacey', 'Portman', 'female', '14/08/1990', 'Holtsville', 'New York', 'USA', '00501', '1-212-509-6995', 'staeyp@hotmail.com', 'images/user_cover/1465450648kgc.jpg', 'images/user_profile/1465450592kgp.jpg', 20, '', '2016-06-09 05:40:30', '2016-06-09 21:36:36', '2016-06-09 05:37:28', 0, 1),
(11, 'JimmyWalker26', '$2y$10$Ce5dWDZS0nVUb', 'Jimmy', 'Walker', 'male', '09/11/1988', 'Mount Vernon', 'New York', 'USA', '10551', '', 'jwalker@icloud.com', 'images/user_cover/1465452182tcc.jpg', 'images/user_profile/1465452182jwp.jpg', 24, '', '2016-06-09 06:05:38', '2016-06-09 22:02:37', '2016-06-09 06:03:02', 0, 1),
(12, 'Tobyc', '$2y$10$QoZt2Kn0NwLAg', 'Toby', 'Crawley', 'male', '11/04/1989', 'New Rochelle', 'New York', 'USA', '', '', 'tobyc@gmail.com', 'images/user_cover/1465452794tjc.jpg', 'images/user_profile/1465452794tjp.jpg', 26, '', '2016-06-09 06:14:56', '2016-06-09 22:12:49', '2016-06-09 06:13:14', 0, 1),
(13, 'TommyJ', '$2y$10$G/dExny4C.t2s', 'Tommy', 'Jones', 'male', '17/04/1985', 'Staten Island', 'New York', 'USA', '', '', 'tommyj98@gmail.com', 'images/user_cover/1465453329tcp.jpg', 'images/user_profile/1465453329tp.jpg', 27, '', '2016-06-09 06:23:46', '2016-06-09 22:21:40', '2016-06-09 06:22:09', 0, 1),
(14, 'kylieg', '$2y$10$kJ3VsLAAQNlGq', 'Kylie', 'Gray', 'female', '14/06/1994', 'Bronx', 'New York', 'USA', '', '', 'kylieg@gmail.com', 'images/user_cover/1465454010music-3-1418397-639x387.jpg', 'images/user_profile/1465454010waiting-woman-1575621-640x960.jpg', 30, '', '2016-06-09 06:37:04', '2016-06-09 22:31:42', '2016-06-09 06:33:30', 0, 1),
(15, 'timoballer', '$2y$10$z02MPM60xjx6E', 'Tim', 'O''Connor', 'male', '30/04/1989', 'Toronto', 'Ontario', 'Canada', '', '', 'toc777@gmail.com', '', '', 0, '', '2016-06-16 14:36:00', '2016-06-16 14:36:00', '2016-06-16 14:36:00', 0, 1),
(16, 'kerry123', '$2y$10$12.CCeFkwp8NK', 'Kerry', 'O Connor', 'female', '26/02/1993', 'Summerstown Drive', 'Cork', 'Ireland', '', '', 'kerryoconnor10@yahoo.ie', 'images/user_cover/1466626355background pic.jpg', 'images/user_profile/1466626214kerryyyy.jpg', 0, '', '2016-06-22 20:12:35', '2016-06-23 04:12:32', '2016-06-22 20:12:35', 0, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
