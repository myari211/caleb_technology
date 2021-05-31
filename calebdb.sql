-- phpMyAdmin SQL Dump
-- version 4.6.6deb5ubuntu0.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 07, 2021 at 05:02 PM
-- Server version: 10.1.47-MariaDB-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calebdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `cms_setting`
--

CREATE TABLE `cms_setting` (
  `setting_name` varchar(255) NOT NULL,
  `setting_parameter` varchar(255) NOT NULL,
  `setting_last_time` datetime NOT NULL,
  `setting_by` int(11) NOT NULL,
  `valueadded_field` varchar(255) NOT NULL,
  `valueadded_fieldtext` text NOT NULL,
  `valueadded_image` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms_setting`
--

INSERT INTO `cms_setting` (`setting_name`, `setting_parameter`, `setting_last_time`, `setting_by`, `valueadded_field`, `valueadded_fieldtext`, `valueadded_image`) VALUES
('log', 'text_file', '2012-03-19 15:27:34', 3, '', '', ''),
('meta home', 'Telkomsel', '0000-00-00 00:00:00', 2, 'telkomsel,telekomunikasi,seluler,kartu as ,simpati,kartu halo', 'Telkomsel is the leading operator of cellular telecommunications services in Indonesia by market share and revenue share', ''),
('information', 'information', '2012-03-19 15:18:58', 3, 'Content Management System', '', 'Setting-icon.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_about`
--

CREATE TABLE `tbl_about` (
  `about_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `page_type` int(1) NOT NULL,
  `about_title` varchar(255) NOT NULL,
  `about_short_desc` varchar(500) DEFAULT NULL,
  `about_desc` text NOT NULL,
  `about_image` varchar(255) DEFAULT NULL,
  `about_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `about_alias` varchar(255) DEFAULT NULL,
  `about_order` int(11) NOT NULL DEFAULT '1',
  `about_meta_description` varchar(250) DEFAULT NULL,
  `about_meta_keywords` varchar(250) DEFAULT NULL,
  `about_create_date` datetime NOT NULL,
  `about_create_by` int(11) NOT NULL,
  `about_update_date` datetime DEFAULT NULL,
  `about_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access`
--

CREATE TABLE `tbl_access` (
  `access_id` int(11) NOT NULL,
  `user_level_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `access_active_status` tinyint(1) NOT NULL,
  `access_create_date` datetime NOT NULL,
  `access_create_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_access`
--

INSERT INTO `tbl_access` (`access_id`, `user_level_id`, `module_id`, `access_active_status`, `access_create_date`, `access_create_by`) VALUES
(1, 1, 1, 1, '2015-10-07 13:09:47', 1),
(2, 1, 2, 1, '2015-10-07 13:11:09', 1),
(3, 1, 3, 1, '2015-10-07 13:13:30', 1),
(4, 1, 4, 1, '2015-10-07 13:15:30', 1),
(5, 1, 5, 1, '2015-10-07 13:16:46', 1),
(6, 4, 4, 1, '2015-10-08 19:56:24', 1),
(7, 3, 8, 1, '2015-10-15 16:16:21', 1),
(8, 3, 9, 1, '2015-10-25 03:09:43', 1),
(9, 1, 9, 1, '2015-10-25 03:10:05', 1),
(10, 1, 10, 1, '2015-10-25 03:19:34', 1),
(11, 1, 11, 1, '2015-10-26 13:06:42', 1),
(12, 1, 12, 1, '2015-10-26 13:10:58', 1),
(13, 1, 13, 1, '2015-10-26 15:45:05', 1),
(14, 1, 14, 1, '2015-10-28 14:43:24', 1),
(15, 1, 15, 1, '2015-10-29 13:20:37', 1),
(16, 1, 16, 1, '2015-10-29 13:27:12', 1),
(17, 1, 17, 1, '2015-10-29 15:05:03', 1),
(18, 1, 18, 1, '2015-10-29 15:05:11', 1),
(19, 1, 19, 1, '2015-11-11 16:24:51', 1),
(20, 1, 21, 1, '2016-04-14 16:05:44', 1),
(21, 1, 22, 1, '2016-04-29 01:47:10', 1),
(22, 1, 23, 1, '2016-05-10 16:33:25', 1),
(23, 1, 24, 1, '2016-05-16 12:54:09', 1),
(24, 1, 25, 1, '2016-05-16 23:27:34', 1),
(25, 1, 26, 1, '2016-06-14 15:16:58', 1),
(26, 3, 27, 1, '2016-08-13 01:24:39', 1),
(27, 1, 27, 1, '2016-08-13 01:25:18', 1),
(28, 1, 28, 1, '2016-08-15 13:54:29', 1),
(29, 3, 28, 1, '2016-08-15 13:55:29', 1),
(30, 1, 29, 1, '2016-08-31 15:34:21', 1),
(31, 3, 29, 1, '2016-08-31 19:50:46', 1),
(32, 1, 30, 1, '2016-08-31 19:52:34', 1),
(33, 3, 30, 1, '2016-08-31 19:53:53', 1),
(34, 1, 31, 1, '2016-09-01 02:35:03', 1),
(35, 3, 31, 1, '2016-09-01 03:18:38', 1),
(36, 1, 32, 1, '2016-09-01 14:26:56', 1),
(37, 1, 33, 1, '2016-09-01 18:37:05', 1),
(38, 1, 34, 1, '2016-09-01 18:39:10', 1),
(39, 1, 35, 1, '2016-09-05 14:58:33', 1),
(40, 1, 36, 1, '2016-09-13 17:22:49', 1),
(41, 3, 36, 1, '2016-09-13 17:23:41', 1),
(42, 1, 37, 1, '2016-09-13 17:24:49', 1),
(43, 3, 37, 1, '2016-09-13 17:25:23', 1),
(44, 1, 38, 1, '2016-09-17 22:43:28', 1),
(45, 3, 38, 1, '2016-09-17 22:44:19', 1),
(46, 1, 39, 1, '2016-09-29 01:40:42', 1),
(47, 3, 39, 1, '2016-09-29 01:41:47', 1),
(48, 6, 39, 1, '2017-10-25 13:57:21', 4),
(49, 6, 35, 1, '2017-10-25 13:57:21', 4),
(50, 3, 15, 1, '2018-10-09 10:35:34', 4),
(51, 3, 23, 1, '2018-10-09 10:35:34', 4),
(52, 3, 24, 1, '2018-10-09 10:35:34', 4),
(53, 3, 35, 1, '2018-10-09 10:35:34', 4),
(54, 3, 17, 1, '2018-10-09 10:35:34', 4),
(55, 3, 26, 1, '2018-10-09 10:35:34', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_access_privilege`
--

CREATE TABLE `tbl_access_privilege` (
  `access_privilege_id` int(11) NOT NULL,
  `access_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `access_privilege_status` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_access_privilege`
--

INSERT INTO `tbl_access_privilege` (`access_privilege_id`, `access_id`, `privilege_id`, `access_privilege_status`) VALUES
(1, 1, 1, 1),
(2, 1, 2, 0),
(3, 1, 3, 0),
(4, 1, 4, 1),
(5, 1, 5, 0),
(6, 1, 6, 0),
(7, 1, 7, 0),
(8, 1, 8, 0),
(9, 2, 1, 1),
(10, 2, 2, 0),
(11, 2, 3, 0),
(12, 2, 4, 0),
(13, 2, 5, 0),
(14, 2, 6, 0),
(15, 2, 7, 0),
(16, 2, 8, 0),
(17, 3, 1, 1),
(18, 3, 2, 1),
(19, 3, 3, 1),
(20, 3, 4, 1),
(21, 3, 5, 1),
(22, 3, 6, 1),
(23, 3, 7, 1),
(24, 3, 8, 1),
(25, 4, 1, 1),
(26, 4, 2, 0),
(27, 4, 3, 1),
(28, 4, 4, 1),
(29, 4, 5, 0),
(30, 4, 6, 1),
(31, 4, 7, 1),
(32, 4, 8, 1),
(33, 5, 1, 1),
(34, 5, 2, 0),
(35, 5, 3, 1),
(36, 5, 4, 1),
(37, 5, 5, 0),
(38, 5, 6, 1),
(39, 5, 7, 1),
(40, 5, 8, 0),
(41, 6, 1, 1),
(42, 6, 2, 0),
(43, 6, 3, 1),
(44, 6, 4, 1),
(45, 6, 5, 0),
(46, 6, 6, 1),
(47, 6, 7, 1),
(48, 6, 8, 1),
(49, 7, 1, 1),
(50, 7, 2, 1),
(51, 7, 3, 1),
(52, 7, 4, 1),
(53, 7, 5, 1),
(54, 7, 6, 1),
(55, 7, 7, 1),
(56, 7, 8, 1),
(57, 8, 1, 0),
(58, 8, 2, 0),
(59, 8, 3, 0),
(60, 8, 4, 0),
(61, 8, 5, 0),
(62, 8, 6, 0),
(63, 8, 7, 0),
(64, 8, 8, 0),
(65, 9, 1, 1),
(66, 9, 2, 1),
(67, 9, 3, 1),
(68, 9, 4, 1),
(69, 9, 5, 1),
(70, 9, 6, 1),
(71, 9, 7, 1),
(72, 9, 8, 1),
(73, 10, 1, 1),
(74, 10, 2, 1),
(75, 10, 3, 1),
(76, 10, 4, 1),
(77, 10, 5, 1),
(78, 10, 6, 1),
(79, 10, 7, 1),
(80, 10, 8, 1),
(81, 11, 1, 1),
(82, 11, 2, 1),
(83, 11, 3, 1),
(84, 11, 4, 1),
(85, 11, 5, 1),
(86, 11, 6, 1),
(87, 11, 7, 1),
(88, 11, 8, 1),
(89, 12, 1, 1),
(90, 12, 2, 1),
(91, 12, 3, 1),
(92, 12, 4, 1),
(93, 12, 5, 1),
(94, 12, 6, 1),
(95, 12, 7, 1),
(96, 12, 8, 1),
(97, 13, 1, 1),
(98, 13, 2, 1),
(99, 13, 3, 1),
(100, 13, 4, 1),
(101, 13, 5, 1),
(102, 13, 6, 1),
(103, 13, 7, 1),
(104, 13, 8, 1),
(105, 14, 1, 1),
(106, 14, 2, 1),
(107, 14, 3, 1),
(108, 14, 4, 1),
(109, 14, 5, 1),
(110, 14, 6, 1),
(111, 14, 7, 1),
(112, 14, 8, 1),
(113, 15, 1, 1),
(114, 15, 2, 1),
(115, 15, 3, 1),
(116, 15, 4, 1),
(117, 15, 5, 1),
(118, 15, 6, 1),
(119, 15, 7, 1),
(120, 15, 8, 1),
(121, 16, 1, 1),
(122, 16, 2, 1),
(123, 16, 3, 1),
(124, 16, 4, 1),
(125, 16, 5, 1),
(126, 16, 6, 1),
(127, 16, 7, 1),
(128, 16, 8, 1),
(129, 17, 1, 1),
(130, 17, 2, 1),
(131, 17, 3, 1),
(132, 17, 4, 1),
(133, 17, 5, 1),
(134, 17, 6, 1),
(135, 17, 7, 1),
(136, 17, 8, 1),
(137, 18, 1, 1),
(138, 18, 2, 1),
(139, 18, 3, 1),
(140, 18, 4, 1),
(141, 18, 5, 1),
(142, 18, 6, 1),
(143, 18, 7, 1),
(144, 18, 8, 1),
(145, 19, 1, 1),
(146, 19, 2, 1),
(147, 19, 3, 1),
(148, 19, 4, 1),
(149, 19, 5, 1),
(150, 19, 6, 1),
(151, 19, 7, 1),
(152, 19, 8, 1),
(153, 20, 1, 1),
(154, 20, 2, 1),
(155, 20, 3, 1),
(156, 20, 4, 1),
(157, 20, 5, 1),
(158, 20, 6, 1),
(159, 20, 7, 1),
(160, 20, 8, 1),
(161, 21, 1, 1),
(162, 21, 2, 1),
(163, 21, 3, 1),
(164, 21, 4, 1),
(165, 21, 5, 1),
(166, 21, 6, 1),
(167, 21, 7, 1),
(168, 21, 8, 1),
(169, 22, 1, 1),
(170, 22, 2, 1),
(171, 22, 3, 1),
(172, 22, 4, 1),
(173, 22, 5, 1),
(174, 22, 6, 1),
(175, 22, 7, 1),
(176, 22, 8, 1),
(177, 23, 1, 1),
(178, 23, 2, 1),
(179, 23, 3, 1),
(180, 23, 4, 1),
(181, 23, 5, 1),
(182, 23, 6, 1),
(183, 23, 7, 1),
(184, 23, 8, 1),
(185, 24, 1, 1),
(186, 24, 2, 1),
(187, 24, 3, 1),
(188, 24, 4, 1),
(189, 24, 5, 1),
(190, 24, 6, 1),
(191, 24, 7, 1),
(192, 24, 8, 1),
(193, 25, 1, 1),
(194, 25, 2, 1),
(195, 25, 3, 1),
(196, 25, 4, 1),
(197, 25, 5, 1),
(198, 25, 6, 1),
(199, 25, 7, 1),
(200, 25, 8, 1),
(201, 26, 1, 1),
(202, 26, 2, 1),
(203, 26, 3, 1),
(204, 26, 4, 1),
(205, 26, 5, 1),
(206, 26, 6, 1),
(207, 26, 7, 1),
(208, 26, 8, 1),
(209, 27, 1, 1),
(210, 27, 2, 1),
(211, 27, 3, 1),
(212, 27, 4, 1),
(213, 27, 5, 1),
(214, 27, 6, 1),
(215, 27, 7, 1),
(216, 27, 8, 1),
(217, 28, 1, 1),
(218, 28, 2, 1),
(219, 28, 3, 1),
(220, 28, 4, 1),
(221, 28, 5, 1),
(222, 28, 6, 1),
(223, 28, 7, 1),
(224, 28, 8, 1),
(225, 29, 1, 1),
(226, 29, 2, 1),
(227, 29, 3, 1),
(228, 29, 4, 1),
(229, 29, 5, 1),
(230, 29, 6, 1),
(231, 29, 7, 1),
(232, 29, 8, 1),
(233, 30, 1, 1),
(234, 30, 2, 1),
(235, 30, 3, 1),
(236, 30, 4, 1),
(237, 30, 5, 1),
(238, 30, 6, 1),
(239, 30, 7, 1),
(240, 30, 8, 1),
(241, 31, 1, 1),
(242, 31, 2, 1),
(243, 31, 3, 1),
(244, 31, 4, 1),
(245, 31, 5, 1),
(246, 31, 6, 1),
(247, 31, 7, 1),
(248, 31, 8, 1),
(249, 32, 1, 1),
(250, 32, 2, 1),
(251, 32, 3, 1),
(252, 32, 4, 1),
(253, 32, 5, 1),
(254, 32, 6, 1),
(255, 32, 7, 1),
(256, 32, 8, 1),
(257, 33, 1, 1),
(258, 33, 2, 1),
(259, 33, 3, 1),
(260, 33, 4, 1),
(261, 33, 5, 1),
(262, 33, 6, 1),
(263, 33, 7, 1),
(264, 33, 8, 1),
(265, 34, 1, 1),
(266, 34, 2, 1),
(267, 34, 3, 1),
(268, 34, 4, 1),
(269, 34, 5, 1),
(270, 34, 6, 1),
(271, 34, 7, 1),
(272, 34, 8, 1),
(273, 35, 1, 1),
(274, 35, 2, 1),
(275, 35, 3, 1),
(276, 35, 4, 1),
(277, 35, 5, 1),
(278, 35, 6, 1),
(279, 35, 7, 1),
(280, 35, 8, 1),
(281, 36, 1, 1),
(282, 36, 2, 1),
(283, 36, 3, 1),
(284, 36, 4, 1),
(285, 36, 5, 1),
(286, 36, 6, 1),
(287, 36, 7, 1),
(288, 36, 8, 1),
(289, 37, 1, 1),
(290, 37, 2, 1),
(291, 37, 3, 1),
(292, 37, 4, 1),
(293, 37, 5, 1),
(294, 37, 6, 1),
(295, 37, 7, 1),
(296, 37, 8, 1),
(297, 38, 1, 1),
(298, 38, 2, 1),
(299, 38, 3, 1),
(300, 38, 4, 1),
(301, 38, 5, 1),
(302, 38, 6, 1),
(303, 38, 7, 1),
(304, 38, 8, 1),
(305, 39, 1, 1),
(306, 39, 2, 1),
(307, 39, 3, 1),
(308, 39, 4, 1),
(309, 39, 5, 1),
(310, 39, 6, 1),
(311, 39, 7, 1),
(312, 39, 8, 1),
(313, 40, 1, 1),
(314, 40, 2, 1),
(315, 40, 3, 1),
(316, 40, 4, 1),
(317, 40, 5, 1),
(318, 40, 6, 1),
(319, 40, 7, 1),
(320, 40, 8, 1),
(321, 41, 1, 1),
(322, 41, 2, 1),
(323, 41, 3, 1),
(324, 41, 4, 1),
(325, 41, 5, 1),
(326, 41, 6, 1),
(327, 41, 7, 1),
(328, 41, 8, 1),
(329, 42, 1, 1),
(330, 42, 2, 1),
(331, 42, 3, 1),
(332, 42, 4, 1),
(333, 42, 5, 1),
(334, 42, 6, 1),
(335, 42, 7, 1),
(336, 42, 8, 1),
(337, 43, 1, 1),
(338, 43, 2, 1),
(339, 43, 3, 1),
(340, 43, 4, 1),
(341, 43, 5, 1),
(342, 43, 6, 1),
(343, 43, 7, 1),
(344, 43, 8, 1),
(345, 44, 1, 1),
(346, 44, 2, 1),
(347, 44, 3, 1),
(348, 44, 4, 1),
(349, 44, 5, 1),
(350, 44, 6, 1),
(351, 44, 7, 1),
(352, 44, 8, 1),
(353, 45, 1, 1),
(354, 45, 2, 1),
(355, 45, 3, 1),
(356, 45, 4, 1),
(357, 45, 5, 1),
(358, 45, 6, 1),
(359, 45, 7, 1),
(360, 45, 8, 1),
(361, 46, 1, 1),
(362, 46, 2, 1),
(363, 46, 3, 1),
(364, 46, 4, 1),
(365, 46, 5, 1),
(366, 46, 6, 1),
(367, 46, 7, 1),
(368, 46, 8, 1),
(369, 47, 1, 1),
(370, 47, 2, 1),
(371, 47, 3, 1),
(372, 47, 4, 1),
(373, 47, 5, 1),
(374, 47, 6, 1),
(375, 47, 7, 1),
(376, 47, 8, 1),
(377, 48, 1, 1),
(378, 48, 2, 1),
(379, 48, 3, 1),
(380, 48, 4, 1),
(381, 48, 5, 1),
(382, 48, 6, 1),
(383, 48, 7, 1),
(384, 48, 8, 1),
(385, 49, 1, 1),
(386, 49, 2, 1),
(387, 49, 3, 1),
(388, 49, 4, 1),
(389, 49, 5, 1),
(390, 49, 6, 1),
(391, 49, 7, 1),
(392, 49, 8, 1),
(393, 50, 1, 1),
(394, 50, 2, 1),
(395, 50, 3, 1),
(396, 50, 4, 1),
(397, 50, 5, 1),
(398, 50, 6, 1),
(399, 50, 7, 1),
(400, 50, 8, 1),
(401, 51, 1, 1),
(402, 51, 2, 1),
(403, 51, 3, 1),
(404, 51, 4, 1),
(405, 51, 5, 1),
(406, 51, 6, 1),
(407, 51, 7, 1),
(408, 51, 8, 1),
(409, 52, 1, 1),
(410, 52, 2, 1),
(411, 52, 3, 1),
(412, 52, 4, 1),
(413, 52, 5, 1),
(414, 52, 6, 1),
(415, 52, 7, 1),
(416, 52, 8, 1),
(417, 53, 1, 1),
(418, 53, 2, 1),
(419, 53, 3, 1),
(420, 53, 4, 1),
(421, 53, 5, 1),
(422, 53, 6, 1),
(423, 53, 7, 1),
(424, 53, 8, 1),
(425, 54, 1, 1),
(426, 54, 2, 1),
(427, 54, 3, 1),
(428, 54, 4, 1),
(429, 54, 5, 1),
(430, 54, 6, 1),
(431, 54, 7, 1),
(432, 54, 8, 1),
(433, 55, 1, 1),
(434, 55, 2, 1),
(435, 55, 3, 1),
(436, 55, 4, 1),
(437, 55, 5, 1),
(438, 55, 6, 1),
(439, 55, 7, 1),
(440, 55, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_accordion`
--

CREATE TABLE `tbl_accordion` (
  `accordion_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `accordion_title` varchar(255) NOT NULL,
  `accordion_desc` text NOT NULL,
  `accordion_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `accordion_order` int(11) NOT NULL DEFAULT '1',
  `accordion_create_date` datetime NOT NULL,
  `accordion_create_by` int(11) NOT NULL,
  `accordion_update_date` datetime DEFAULT NULL,
  `accordion_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_accordion`
--

INSERT INTO `tbl_accordion` (`accordion_id`, `content_id`, `accordion_title`, `accordion_desc`, `accordion_active_status`, `accordion_order`, `accordion_create_date`, `accordion_create_by`, `accordion_update_date`, `accordion_update_by`) VALUES
(0, 2, '', '', 1, 1, '2016-04-14 10:38:17', 1, '0000-00-00 00:00:00', 0),
(0, 3, '', '', 1, 1, '2016-04-14 10:48:58', 1, '0000-00-00 00:00:00', 0),
(0, 4, '', '', 1, 1, '2016-04-14 10:50:20', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_alias`
--

CREATE TABLE `tbl_alias` (
  `alias_id` int(11) NOT NULL,
  `alias_category` varchar(25) NOT NULL,
  `key_id` int(11) NOT NULL,
  `web_alias` varchar(255) NOT NULL,
  `web_ori` varchar(255) NOT NULL,
  `alias_active_status` tinyint(1) NOT NULL,
  `alias_create_date` datetime NOT NULL,
  `alias_update_date` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_alias`
--

INSERT INTO `tbl_alias` (`alias_id`, `alias_category`, `key_id`, `web_alias`, `web_ori`, `alias_active_status`, `alias_create_date`, `alias_update_date`) VALUES
(48, 'Works', 43, 'femeeninbranding', 'Works/detail/43', 1, '2016-06-08 13:29:03', '2016-06-19 21:05:09'),
(60, 'Services', 5, 'digital-development', 'services/detail/5', 1, '2016-06-27 01:03:53', '2016-06-27 01:23:07'),
(10, 'Works', 14, 'cupcakessociety', 'Works/detail/14', 1, '2016-05-23 02:55:27', '2016-06-19 21:05:24'),
(12, 'Works', 16, 'pre-ownedwatch', 'Works/detail/16', 1, '2016-05-23 03:19:02', '2016-06-23 21:19:06'),
(13, 'Works', 17, 'gestaltdb', 'Works/detail/17', 1, '2016-05-23 03:59:36', '2016-06-27 01:33:23'),
(14, 'Works', 18, 'klinikmatanusantara', 'Works/detail/18', 1, '2016-05-23 04:22:39', '2016-06-05 11:21:05'),
(15, 'Works', 19, 'infraconindo', 'Works/detail/19', 1, '2016-05-23 05:11:49', '2016-06-24 13:46:59'),
(20, '', 18, 'ira-hardani---pt-yuanta-securities-indonesia', 'aboutlsaf/detail/18', 1, '2016-05-27 23:21:23', '2016-06-05 00:02:37'),
(49, 'Works', 44, 'comprowam', 'Works/detail/44', 1, '2016-06-08 15:25:17', '2016-06-23 21:12:13'),
(27, 'pages', 12, 'privacypolicy', 'pages/detail/12', 1, '2016-05-31 16:35:32', '2016-06-01 13:31:04'),
(69, 'News', 6, 'test22', 'News/detail/6', 1, '2016-09-13 01:46:02', NULL),
(29, '', 19, 'edward-setiadi---pre-owned-watch', 'aboutlsaf/detail/19', 1, '2016-06-01 13:20:12', '2016-06-23 15:57:14'),
(30, 'pages', 14, 'sitemap', 'pages/detail/14', 1, '2016-06-01 14:16:27', '2016-06-04 22:51:54'),
(31, 'pages', 15, 'faq', 'pages/detail/15', 1, '2016-06-01 14:18:40', '2016-06-24 14:32:47'),
(32, 'Works', 30, 'tafel21', 'Works/detail/30', 1, '2016-06-02 12:47:04', '2016-06-02 13:30:28'),
(35, 'Works', 32, 'femeenin', 'Works/detail/32', 1, '2016-06-02 14:52:13', '2016-06-19 21:06:55'),
(36, 'Works', 33, 'wam', 'Works/detail/33', 1, '2016-06-02 14:54:28', '2016-06-02 21:03:08'),
(37, 'Works', 34, 'karve', 'Works/detail/34', 1, '2016-06-02 14:57:31', '2016-06-27 00:28:20'),
(38, 'Works', 35, 'corsa', 'Works/detail/35', 1, '2016-06-02 15:01:54', '2016-06-19 21:08:01'),
(39, 'Works', 36, 'edconnect', 'Works/detail/36', 1, '2016-06-02 15:20:03', '2016-06-08 21:07:16'),
(40, 'Works', 37, 'yuanta', 'Works/detail/37', 1, '2016-06-02 15:25:39', '2016-06-08 20:59:04'),
(41, 'Works', 38, 'agm', 'Works/detail/38', 1, '2016-06-02 15:28:02', '2016-06-23 22:11:45'),
(42, 'Works', 39, 'lsaf', 'Works/detail/39', 1, '2016-06-02 15:40:16', '2016-06-08 21:10:11'),
(43, 'Works', 40, 'harumenergy', 'Works/detail/40', 1, '2016-06-02 15:47:22', '2016-06-07 12:50:59'),
(44, 'Works', 41, 'ppmmanajemen', 'Works/detail/41', 1, '2016-06-02 15:49:28', '2016-06-27 01:33:08'),
(45, 'Works', 42, 'gki-kb', 'Works/detail/42', 1, '2016-06-02 15:54:12', '2016-06-08 14:43:40'),
(59, 'Blog', 5, '2016-brand-identity-trends', 'Blog/detail/5', 1, '2016-06-23 15:30:30', '2016-06-23 15:49:26'),
(55, 'Works', 46, 'webcorsa', 'Works/detail/46', 1, '2016-06-23 09:11:42', '2016-06-27 01:55:18'),
(56, 'Blog', 4, '10-design-trends-2016', 'Blog/detail/4', 1, '2016-06-23 13:38:25', '2016-06-23 15:49:59'),
(57, 'Works', 47, 'preowndeswatchid', 'Works/detail/47', 1, '2016-06-23 14:53:19', '2016-06-23 21:43:28'),
(58, 'Works', 48, 'edconnectui', 'Works/detail/48', 1, '2016-06-23 15:01:20', '2016-06-23 22:01:45'),
(61, 'Services', 6, 'merchandising', 'services/detail/6', 1, '2016-06-27 01:54:41', '2016-06-27 02:05:02'),
(62, '', 20, 'material-4', 'Material/detail/20', 1, '2016-08-10 00:10:27', '2017-10-24 12:22:46'),
(63, '', 21, 'dasdsa', 'Career/detail/21', 1, '2016-08-16 15:14:51', NULL),
(64, '', 22, 'abcd', 'Services/detail/22', 1, '2016-08-16 15:46:03', '2016-09-20 15:49:32'),
(65, '', 23, 'header-about', 'About/detail/23', 1, '2016-08-31 18:47:53', '2017-10-24 11:33:21'),
(66, 'Training', 24, 'improve-your-skills-attend-our-trainings-keep-updated-with-the-latest-control-system-engineering-practices-and-use-valuable-technical-education-resources', 'Training/detail/24', 1, '2016-09-07 18:26:49', '2017-10-26 10:08:48'),
(67, 'Training', 3, 'test-training1', 'training/detail/3', 1, '2016-09-07 18:31:32', '2016-09-19 14:37:09'),
(85, 'Career', 7, 'contractor-representative', 'Career/detail/7', 1, '2017-11-13 16:25:37', '2019-06-28 16:21:01'),
(70, 'Training', 4, 'training-dcs-experion-lxc300', 'training/detail/4', 1, '2016-09-20 16:12:02', '2016-09-20 21:43:27'),
(71, '', 26, 'material-2', 'Material/detail/26', 1, '2016-09-29 02:43:21', '2016-10-14 04:50:06'),
(72, '', 27, 'material-3', 'Material/detail/27', 1, '2016-10-14 05:08:48', NULL),
(73, '', 28, 'material-1', 'Material/detail/28', 1, '2016-10-21 07:23:09', '2017-10-24 12:22:59'),
(74, 'Training', 5, 'training-dcs-experion-lxc300---2', 'training/detail/5', 1, '2016-11-09 11:56:39', '2016-11-09 12:34:29'),
(75, 'Training', 6, 'training-dcs-experion-lx-c300', 'training/detail/6', 1, '2017-10-16 15:14:01', NULL),
(76, 'News', 7, 'test-lagi', 'News/detail/7', 1, '2017-10-23 15:18:46', NULL),
(84, 'Career', 6, 'sis-engineer', 'Career/detail/6', 1, '2017-11-07 16:33:12', '2019-06-28 15:35:03'),
(79, 'News', 8, 'sample-news', 'News/detail/8', 1, '2017-10-24 13:01:05', '2017-10-24 13:01:37'),
(82, 'News', 9, 'beritahari', 'News/detail/9', 1, '2017-10-25 14:22:16', NULL),
(86, 'Career', 8, 'instrument--control-engineer', 'Career/detail/8', 1, '2017-11-13 16:40:43', '2017-11-13 16:48:58'),
(87, 'Career', 9, 'teknisi', 'Career/detail/9', 1, '2017-11-13 16:47:54', '2018-02-01 17:16:44'),
(88, 'Career', 10, 'sales-and-procurement-supervisory', 'Career/detail/10', 1, '2018-02-01 15:28:16', '2018-02-01 15:30:08'),
(89, 'Career', 11, 'spi-engineer', 'Career/detail/11', 1, '2018-02-01 16:34:11', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `banner_id` int(11) NOT NULL,
  `banner_name` text,
  `banner_images` varchar(100) NOT NULL,
  `banner_type` tinyint(2) NOT NULL,
  `banner_url` varchar(255) DEFAULT NULL,
  `banner_order` int(10) DEFAULT '1',
  `banner_desc` text NOT NULL,
  `banner_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `banner_create_date` datetime NOT NULL,
  `banner_create_by` int(11) NOT NULL,
  `banner_update_date` datetime DEFAULT NULL,
  `banner_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_banner`
--

INSERT INTO `tbl_banner` (`banner_id`, `banner_name`, `banner_images`, `banner_type`, `banner_url`, `banner_order`, `banner_desc`, `banner_active_status`, `banner_create_date`, `banner_create_by`, `banner_update_date`, `banner_update_by`) VALUES
(16, 'HomeBanner 01', '/assets/file_upload/admin/images/banner/caleb00001.jpg', 1, '', 1, '&lt;h1&gt;We do much more than to simply deliver solutions and provide managed services.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;span style=&quot;color:#FFF0F5;font-size: 25px; text-shadow: 2px 2px 4px #000000&quot;&gt;Our business is helping yours. Our focus is helping our customers realize optimum results through innovative solutions and managed services&lt;/span&gt;&lt;/h1&gt;', 1, '2016-06-02 14:41:19', 1, '2016-11-09 07:05:10', 1),
(17, 'Homebanner 02', '/assets/file_upload/admin/images/banner/caleb00003.jpg', 1, '', 2, '&lt;h1&gt;We&amp;#39;re dedicated professionals committed in delivering all of our projects at the highest standard in Safety &amp;amp; Quality.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;span style=&quot;color:#FFF0F5;font-size: 25px; text-shadow: 2px 2px 4px #000000&quot;&gt;Our expertise extends from Engineering, Construction, Commissioning, Materials supply, Maintenance, to the Hiring of Professionals&lt;/span&gt;&lt;/h1&gt;', 1, '2016-09-02 18:09:48', 1, '2018-10-05 14:08:24', 4),
(18, 'Homebanner 03', '/assets/file_upload/admin/images/banner/caleb00002.jpg', 1, 'https://caleb-technology.com/about', 3, '&lt;h1&gt;Systems Integrator with unparalleled Industry Experience and Professional Team ready to serve and tackle any projects big or small.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;span style=&quot;color:#FFF0F5;font-size: 25px; text-shadow: 2px 2px 4px #000000&quot;&gt;We provide the right mix of services, expertise, and experience to help increase productivity, optimize plant assets and improve financial performance across your enterprise&lt;/span&gt;&lt;/h1&gt;', 1, '2016-09-27 16:15:47', 1, '2018-10-05 14:06:02', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog`
--

CREATE TABLE `tbl_blog` (
  `blog_id` int(11) NOT NULL,
  `category_id` int(2) NOT NULL,
  `blog_title` varchar(255) NOT NULL,
  `blog_short_desc` varchar(1000) DEFAULT NULL,
  `blog_desc` text NOT NULL,
  `blog_image` varchar(255) DEFAULT NULL,
  `blog_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `blog_alias` varchar(255) DEFAULT NULL,
  `blog_order` int(11) NOT NULL DEFAULT '1',
  `blog_publish_date` datetime NOT NULL,
  `blog_meta_description` varchar(250) DEFAULT NULL,
  `blog_meta_keywords` varchar(250) DEFAULT NULL,
  `blog_create_date` datetime NOT NULL,
  `blog_create_by` int(11) NOT NULL,
  `blog_update_date` datetime DEFAULT NULL,
  `blog_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog`
--

INSERT INTO `tbl_blog` (`blog_id`, `category_id`, `blog_title`, `blog_short_desc`, `blog_desc`, `blog_image`, `blog_active_status`, `blog_alias`, `blog_order`, `blog_publish_date`, `blog_meta_description`, `blog_meta_keywords`, `blog_create_date`, `blog_create_by`, `blog_update_date`, `blog_update_by`) VALUES
(5, 1, '8 Brand Identity Trends 2016', '8 Brand Identity Trends to be watchful for in 2016.&nbsp;', '<img alt=\"\" src=\"https://d3ui957tjb5bqd.cloudfront.net/uploads/2016/01/identity-001.jpg\" style=\"width: 680px; height: 5592px;\" /><br />\r\n&nbsp;\r\n<hr /><br />\r\nCredit: DesignMantic<br />\r\nSource:&nbsp;https://creativemarket.com/blog/2016/01/08/eight-brand-identity-trends-for-2016/', '/assets/file_upload/admin/images/BALKAT/Blog/32083.pic.jpg', 1, '2016-brand-identity-trends', 1, '2016-06-23 00:00:00', '', '', '2016-06-23 15:30:30', 1, '2016-06-23 15:49:26', 1),
(4, 1, 'Top 10 Design Trends 2016', 'Trends come and go, they emerge, some stay for years, others are more of a flash in the pan. They shift until they fade out. Check out these 10 Brilliant Graphic Design Trends of 2016.', '<h2>1. Flat 2.0.</h2>\r\n\r\n<p>The flat design trend is characterised by a clean, colorful look, big typography, white space, and subtle gradients. It&rsquo;s influenced by minimalism, Bauhaus and the Swiss Style. Flat design was introduced in 2006 with Microsoft&rsquo;s Zune mp3 player, refreshed by Apple&rsquo;s iOS 7 in 2013, and further refined by Google&rsquo;s Material design in 2014. A beautiful example can be found in the award-winning indie game Monument Valley.</p>\r\n\r\n<p><img alt=\"Monument Valley Game\" class=\"aligncenter size-full wp-image-33590\" height=\"1057\" src=\"https://d3ui957tjb5bqd.cloudfront.net/uploads/2016/02/Monument_Valley.jpg\" style=\"color: rgb(80, 78, 75); font-family: Georgia, serif; font-size: 18px; line-height: 32px; box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto; background-color: rgb(245, 245, 244);\" width=\"1300\" /></p>\r\n\r\n<p style=\"box-sizing: border-box; font-family: Georgia, serif; font-size: 18px; line-height: 32px; margin: 0px 0px 20px; position: relative; color: rgb(80, 78, 75); background-color: rgb(245, 245, 244);\"><a href=\"http://www.monumentvalleygame.com/\" target=\"_blank\">Monument Valley Game</a></p>\r\n\r\n<h2><br />\r\n2. Bold, Playful Typography</h2>\r\n\r\n<p>The Flat Design trend together with tools like the Glyphs app that make the production of fonts more easy and inexpensive, pave the way for dramatic and creative typography. Bold statements, playful sans-serif typefaces, and letter stacking. Possibly also the Serif will make a return performance, encouraged by the higher resolution screens. We&rsquo;ll continue to see new crops of handwritten fonts in 2016. Huge, interesting drop caps like&nbsp;<a href=\"https://www.washingtonpost.com/news/style/wp/2015/06/03/behind-the-cover-how-the-favorites-issue-art-was-made/\" target=\"_blank\">SNASKs hand-crafted, 3D letters</a>.</p>\r\n\r\n<p style=\"box-sizing: border-box; font-family: Georgia, serif; font-size: 18px; line-height: 32px; margin: 0px 0px 20px; position: relative; color: rgb(80, 78, 75); background-color: rgb(245, 245, 244);\"><span class=\"pinit-blog normal-image full\" data-module=\"Image Embed\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-bottom: 30px; max-width: 100%;\"><img alt=\"The Washington Post\" class=\"aligncenter size-full wp-image-33584\" height=\"532\" src=\"https://d3ui957tjb5bqd.cloudfront.net/uploads/2016/02/The-Washington-Post.jpg\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto;\" width=\"800\" /></span><br style=\"box-sizing: border-box;\" />\r\nSNASK typography for The Washington Post</p>\r\n\r\n<h2><br />\r\n3. Whimsical Illustrations</h2>\r\n\r\n<p>Whimsical, hand drawn illustrations aren&rsquo;t just for kids anymore. An example can be seen in Dropbox&rsquo;s friendly doodles that inject a playful human element. Illustrators continue to explore sketchy lines and brushstrokes, mixing their tools and techniques, digital and analog, and this leads to a broader range of illustration styles and use, including isometric projections and illustrated hero images.</p>\r\n\r\n<p style=\"box-sizing: border-box; font-family: Georgia, serif; font-size: 18px; line-height: 32px; margin: 0px 0px 20px; position: relative; color: rgb(80, 78, 75); background-color: rgb(245, 245, 244);\"><span class=\"pinit-blog normal-image full\" data-module=\"Image Embed\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-bottom: 30px; max-width: 100%;\"><img alt=\"Dropbox\" class=\"aligncenter size-full wp-image-33594\" height=\"1629\" src=\"https://d3ui957tjb5bqd.cloudfront.net/uploads/2016/02/Dropbox.jpg\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto;\" width=\"2318\" /></span></p>\r\n\r\n<h2><br />\r\n4. The New Retro</h2>\r\n\r\n<p>Retro styles are inspired by the 80s and 90s, Think about bold colors, pixel art, playful geometric designs and patterns. Take a look at&nbsp;<a href=\"http://timcolmant.com/\" target=\"_blank\">Tim Colmant&#39;s work</a>&nbsp;for examples.</p>\r\n\r\n<p style=\"box-sizing: border-box; font-family: Georgia, serif; font-size: 18px; line-height: 32px; margin: 0px 0px 20px; position: relative; color: rgb(80, 78, 75); background-color: rgb(245, 245, 244);\"><span class=\"pinit-blog normal-image full\" data-module=\"Image Embed\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-bottom: 30px; max-width: 100%;\"><img alt=\"Tim Colmant\" class=\"aligncenter size-full wp-image-33585\" height=\"812\" src=\"https://d3ui957tjb5bqd.cloudfront.net/uploads/2016/02/Tim-Colmant.jpg\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto;\" width=\"1300\" /></span><br style=\"box-sizing: border-box;\" />\r\nhttp://timcolmant.com</p>\r\n\r\n<h2><br />\r\n5. Motion</h2>\r\n\r\n<p>Photos and illustrations come to life with 2D animation and cinemagraphs. With just a flicker of movement, enough to catch our attention without distracting from the content, this is a hybrid of motion and still. For amazing cinemagraph examples, check out&nbsp;<a href=\"https://creativemarket.com/blog/2016/01/30/artist-creates-stunning-cinemagraphs-of-animals-and-nature\" target=\"_blank\">this article</a>&nbsp;we shared featuring artist Said Dagdeviren.</p>\r\n\r\n<p style=\"box-sizing: border-box; font-family: Georgia, serif; font-size: 18px; line-height: 32px; margin: 0px 0px 20px; position: relative; color: rgb(80, 78, 75); background-color: rgb(245, 245, 244);\"><span class=\"pinit-blog normal-image full\" data-module=\"Image Embed\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-bottom: 30px; max-width: 100%;\"><img alt=\"cinemagraph-02\" class=\"aligncenter size-full wp-image-33587\" height=\"480\" src=\"https://d3ui957tjb5bqd.cloudfront.net/uploads/2016/02/cinemagraph-02.gif\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto;\" width=\"480\" /></span></p>\r\n\r\n<h2><br />\r\n6. Minimalist Logotypes</h2>\r\n\r\n<p>Minimalism, flat design, negative space, subtle gradients, kinetic logos and crisp mono line styles.</p>\r\n\r\n<div background-color:=\"\" class=\"product-embed full has-pinit\" color:=\"\" data-module=\"Product Embed\" font-size:=\"\" helvetica=\"\" line-height:=\"\" max-width:=\"\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-bottom: 30px; font-family: \"><a data-tracking=\"Product\" href=\"https://creativemarket.com/Piotr%C5%81apa/233294-1000-Logos-Badges-SALE\" style=\"box-sizing: border-box; transition: color 0.1s; text-decoration: none; color: rgb(139, 167, 83); outline: 0px;\" target=\"_blank\"><img alt=\"\" class=\"thumbnail inline full\" src=\"https://d3ui957tjb5bqd.cloudfront.net/images/screenshots/products/134/1344/1344355/200hl-f.jpg?1465290723\" style=\"box-sizing: border-box; border: none; vertical-align: middle; display: inline-block; position: relative; border-radius: 2px 2px 0px 0px; box-shadow: transparent 0px 0px 0px, transparent 0px 0px 0px, transparent 0px 0px 0px; max-width: 100%; height: auto; padding: 3px; width: auto; margin-bottom: -3px; background: rgb(255, 255, 255);\" /></a>\r\n\r\n<div class=\"meta clearfix\" style=\"box-sizing: border-box; margin: 0px; color: rgb(148, 146, 145); font-size: inherit; position: relative; padding: 10px 85px 10px 10px; white-space: nowrap; border-radius: 0px 0px 2px 2px; box-shadow: rgba(148, 146, 145, 0.0980392) 0px 1px 4px, rgba(148, 146, 145, 0.34902) 0px -1px 0px inset, transparent 0px 0px 0px, transparent 0px 0px 0px; background: rgb(255, 255, 255);\">\r\n<h3 class=\"title\" style=\"box-sizing: border-box; text-rendering: optimizeLegibility; color: rgb(56, 56, 54); font-weight: 700; margin: 0px; font-size: inherit; line-height: 1.3; overflow: hidden; text-overflow: ellipsis;\"><a data-tracking=\"Product\" href=\"https://creativemarket.com/Piotr%C5%81apa/233294-1000-Logos-Badges-SALE\" style=\"box-sizing: border-box; transition: color 0.1s; text-decoration: none; color: rgb(97, 95, 92); outline: 0px;\" target=\"_blank\">1000 Logos &amp; Badges SALE</a></h3>\r\n\r\n<div class=\"byline\" style=\"box-sizing: border-box; font-size: 0.9em; overflow: hidden; text-overflow: ellipsis;\">By&nbsp;<a data-user-card=\"391232\" href=\"https://creativemarket.com/Piotr%C5%81apa\" style=\"box-sizing: border-box; transition: color 0.1s; text-decoration: none; color: rgb(97, 95, 92); outline: 0px; max-width: 45%; display: inline-block; vertical-align: bottom; overflow: hidden; text-overflow: ellipsis;\">Piotr Łapa</a>&nbsp;in&nbsp;<a href=\"https://creativemarket.com/templates\" style=\"box-sizing: border-box; transition: color 0.1s; text-decoration: none; color: rgb(97, 95, 92); outline: 0px; max-width: 45%; display: inline-block; vertical-align: bottom; overflow: hidden; text-overflow: ellipsis;\">Templates</a></div>\r\n\r\n<div class=\"pinit\" style=\"box-sizing: border-box; right: 10px; position: absolute; top: 31.5px; transform: translateY(-50%);\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<h2>7. Geometric Shapes</h2>\r\n\r\n<p>The geo trend continues in 2016. Low-poly effects and sacred geometry shift into layered geometries and blend with the 80&#39;s influences of the Memphis Group&rsquo;s design. Expected to be strong in packaging design. We recently explored the idea of how geometric shapes might be the new trend in web design for 2016.&nbsp;<a href=\"https://creativemarket.com/blog/2016/02/12/are-geometric-shapes-a-new-trend-in-web-design\" target=\"_blank\">Read all about it here</a>.</p>\r\n\r\n<div background-color:=\"\" class=\"product-embed full has-pinit\" color:=\"\" data-module=\"Product Embed\" font-size:=\"\" helvetica=\"\" line-height:=\"\" max-width:=\"\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-bottom: 30px; font-family: \"><a data-tracking=\"Product\" href=\"https://creativemarket.com/kloroform/54857-Isometry-Galore-1\" style=\"box-sizing: border-box; transition: color 0.1s; text-decoration: none; color: rgb(139, 167, 83); outline: 0px;\" target=\"_blank\"><img alt=\"\" class=\"thumbnail inline full\" src=\"https://d3ui957tjb5bqd.cloudfront.net/images/screenshots/products/61/610/610204/geometrygalore01mockups-f.jpg?1452799312\" style=\"box-sizing: border-box; border: none; vertical-align: middle; display: inline-block; position: relative; border-radius: 2px 2px 0px 0px; box-shadow: transparent 0px 0px 0px, transparent 0px 0px 0px, transparent 0px 0px 0px; max-width: 100%; height: auto; padding: 3px; width: auto; margin-bottom: -3px; background: rgb(255, 255, 255);\" /></a>\r\n\r\n<div class=\"meta clearfix\" style=\"box-sizing: border-box; margin: 0px; color: rgb(148, 146, 145); font-size: inherit; position: relative; padding: 10px 85px 10px 10px; white-space: nowrap; border-radius: 0px 0px 2px 2px; box-shadow: rgba(148, 146, 145, 0.0980392) 0px 1px 4px, rgba(148, 146, 145, 0.34902) 0px -1px 0px inset, transparent 0px 0px 0px, transparent 0px 0px 0px; background: rgb(255, 255, 255);\">\r\n<h3 class=\"title\" style=\"box-sizing: border-box; text-rendering: optimizeLegibility; color: rgb(56, 56, 54); font-weight: 700; margin: 0px; font-size: inherit; line-height: 1.3; overflow: hidden; text-overflow: ellipsis;\"><a data-tracking=\"Product\" href=\"https://creativemarket.com/kloroform/54857-Isometry-Galore-1\" style=\"box-sizing: border-box; transition: color 0.1s; text-decoration: none; color: rgb(97, 95, 92); outline: 0px;\" target=\"_blank\">Isometry Galore 1</a></h3>\r\n\r\n<div class=\"byline\" style=\"box-sizing: border-box; font-size: 0.9em; overflow: hidden; text-overflow: ellipsis;\">By&nbsp;<a data-user-card=\"285561\" href=\"https://creativemarket.com/kloroform\" style=\"box-sizing: border-box; transition: color 0.1s; text-decoration: none; color: rgb(97, 95, 92); outline: 0px; max-width: 45%; display: inline-block; vertical-align: bottom; overflow: hidden; text-overflow: ellipsis;\">kloroform</a>&nbsp;in&nbsp;<a href=\"https://creativemarket.com/graphics\" style=\"box-sizing: border-box; transition: color 0.1s; text-decoration: none; color: rgb(97, 95, 92); outline: 0px; max-width: 45%; display: inline-block; vertical-align: bottom; overflow: hidden; text-overflow: ellipsis;\">Graphics</a></div>\r\n\r\n<div class=\"pinit\" style=\"box-sizing: border-box; right: 10px; position: absolute; top: 31.5px; transform: translateY(-50%);\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<h2>8. Print-inspired</h2>\r\n\r\n<p>The print-inspired trend is likely to continue this year. Inspired by pre-digital printing processes, it displays slabs of colour, rich textures, and mis-print effects. In 2016, we&rsquo;ll see this style evolve to take its cue from the Risograph with it&rsquo;s bright, neon colors and fun, unpredictable overprint effects.</p>\r\n\r\n<p style=\"box-sizing: border-box; font-family: Georgia, serif; font-size: 18px; line-height: 32px; margin: 0px 0px 20px; position: relative; color: rgb(80, 78, 75); background-color: rgb(245, 245, 244);\"><span class=\"pinit-blog normal-image full\" data-module=\"Image Embed\" style=\"box-sizing: border-box; display: inline-block; position: relative; margin-bottom: 30px; max-width: 100%;\"><img alt=\"Paperpusher-Calendar\" class=\"aligncenter size-full wp-image-33588\" height=\"1024\" src=\"https://d3ui957tjb5bqd.cloudfront.net/uploads/2016/02/Paperpusher-Calendar.jpg\" style=\"box-sizing: border-box; border: 0px; vertical-align: middle; max-width: 100%; height: auto;\" width=\"839\" /></span><br style=\"box-sizing: border-box;\" />\r\nPaperPusher&#39;s 2016 Isometric Risograph Calendar by JP King</p>\r\n\r\n<h2><br />\r\n9. Abstract Swiss</h2>\r\n\r\n<p>In contrast to the more excessive, 80&#39;s inspired styles, a rebellious, minimalist trend is evolving. Unlike the popular card layout trend, this trend aims to break the rules. Deconstruct and distorting layouts in a seemingly random way.</p>\r\n\r\n<div class=\"embedly-card\" style=\"box-sizing: border-box;\">\r\n<div class=\"embedly-card-hug\" style=\"box-sizing: border-box; width: 600px; padding: 0px; position: relative; max-width: 100%; margin: 5px auto;\"><img alt=\"\" src=\"http://balkat.com/assets/file_upload/admin/images/crop.jpg\" />\r\n<div class=\"embdscl0\" style=\"box-sizing: border-box; visibility: hidden; opacity: 0; height: 0px; width: 60px; position: absolute; top: 13px; right: -58px; z-index: 2147483647; transition: opacity 0.25s ease-in-out 0s;\">&nbsp;</div>\r\n</div>\r\n</div>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h2>10. Movies and Cartoons</h2>\r\n\r\n<p>The superhero film has been trending in Hollywood since 2001. Other trends in film and TV include Game of Thrones, sci-fi such as Her, Under The Skin and Ex Machina, and the spy genre with tv-series such as Homeland and London Spy. The Outer Space trend is trending just now in the children&rsquo;s market. Will film and TV influence graphic design further in 2016? We shall see.<br />\r\n<br />\r\n&nbsp;</p>\r\n\r\n<hr /><br />\r\n<em>Credits: Kate England<br />\r\nSource:&nbsp;​https://creativemarket.com/blog/2016/02/22/10-brilliant-graphic-design-trends-of-2016</em><br />\r\n<br />\r\n&nbsp;', '/assets/file_upload/admin/images/BALKAT/Blog/33579.pic.jpg', 1, '10-design-trends-2016', 1, '2016-06-16 00:00:00', '', '', '2016-06-23 13:38:25', 1, '2016-06-23 15:49:59', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_blog_category`
--

CREATE TABLE `tbl_blog_category` (
  `category_id` int(2) NOT NULL,
  `category_title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_blog_category`
--

INSERT INTO `tbl_blog_category` (`category_id`, `category_title`) VALUES
(1, 'Design'),
(2, 'Event'),
(3, 'News'),
(4, 'Tutorial');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_career`
--

CREATE TABLE `tbl_career` (
  `career_id` int(11) NOT NULL,
  `career_title` varchar(255) NOT NULL,
  `career_short_desc` varchar(1000) DEFAULT NULL,
  `career_desc` text NOT NULL,
  `career_image` varchar(255) DEFAULT NULL,
  `career_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `career_alias` varchar(255) DEFAULT NULL,
  `career_order` int(11) NOT NULL DEFAULT '1',
  `career_publish_date` datetime NOT NULL,
  `career_meta_description` varchar(250) DEFAULT NULL,
  `career_meta_keywords` varchar(250) DEFAULT NULL,
  `career_create_date` datetime NOT NULL,
  `career_create_by` int(11) NOT NULL,
  `career_update_date` datetime DEFAULT NULL,
  `career_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_career`
--

INSERT INTO `tbl_career` (`career_id`, `career_title`, `career_short_desc`, `career_desc`, `career_image`, `career_active_status`, `career_alias`, `career_order`, `career_publish_date`, `career_meta_description`, `career_meta_keywords`, `career_create_date`, `career_create_by`, `career_update_date`, `career_update_by`) VALUES
(6, 'SIS Engineer', 'We&#39;re looking for competent SIS Engineers', 'Have experienced at least 2 years as SIS engineer with responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up.', NULL, 1, 'sis-engineer', 1, '2018-02-28 00:00:00', 'SIS Engineer', 'SIS Engineer', '2017-11-07 16:33:12', 1, '2019-06-28 16:16:05', 1),
(7, 'Contractor Representative', 'PT. CALEB TECHNOLOGY sedang mencari Candidate untuk posisi sebagai <u>CONTRACTOR Representative</u>, dalam pelaksanaan Pekerjaan ICMS (Provision of Instrument Control Maintenance Services)', '<strong><u>Tugas &amp; Tanggung Jawab Utama:</u></strong><br />\r\n<br />\r\na. Sebagai Koordinator dan Wakil KONTRAKTOR.<br />\r\nb. Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN.<br />\r\nc. Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi<br />\r\npekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.<br />\r\nd. Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAAN,<br />\r\ntermasuk didalamnya CHSEMS, ERP, EMT, Compliance, dll.<br />\r\ne. Berkantor di area Gresik/Surabaya.<br />\r\n&nbsp;<br />\r\n<strong><u>Svarat Kompetensi:</u></strong><br />\r\n<br />\r\na. Lulusan Sarjana Teknik Elektro/ Instrumentasi atau sederajat dan memiliki pengalaman sebagai<br />\r\nProject Manager/Supervisor/Team Leader/Sejenis dibidang engineering atau<br />\r\nproyek minimal 5 tahun.<br />\r\nb. Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses,<br />\r\nmemahami prosedur standar, spesifikasi, dan metode kerja.<br />\r\nc. Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan<br />\r\ndatasheet.<br />\r\nd. Memiliki pengetahuan lanjut mengenai keselamatan kerja.<br />\r\n&nbsp;<br />\r\nSilahkan mengirimkan CV ter update ke alamat email admin@caleb-technology.com', NULL, 1, 'contractor-representative', 1, '2019-07-13 00:00:00', 'Contractor Representative', 'job, career, work, karir, kerja, oil, gas, instrument, control, services', '2017-11-13 16:25:37', 1, '2019-06-28 16:21:01', 1),
(8, 'Instrument &amp; Control Engineer', 'Dibutuhkan lulusan Sarjana Teknik/Sederajat yang berpengalaman sebagai Instrument dan Control Engineer minimal 4 tahun', 'Tugas dan Tanggung Jawab Utama :\r\n<ol>\r\n	<li>Mengontrol dan mengkoordinasikan keseluruhan pelaksanaan pekerjaan dilapangan, termasuk memberikan technical support.</li>\r\n	<li>Membuat dan melaporkan hasil assessment, rekomendasi dan tindak lanjut pekerjaan serta kebutuhan material dari suatu program/proyek kepada Wakil Perusahaan dan Wakil Kontraktor.</li>\r\n	<li>Membuat, mengontrol, dan melaporkan perencanaan pekerjaan dan implementasi prosedur kerja kontraktor kepada Wakil Perusahaan dan Wail Kontraktor.</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Lulusan Sarjana Teknik atau sederajat dan memiliki pengalaman sebagai Instrument &amp; Control Engineer/sejenis minimal 4 tahun.</li>\r\n	<li>Memiliki kompetensi terkait life cycle system, cost assesment, alarm benchmarking, proses kontrol security, functional safety survey, troubleshoot and root cause analysis, control power system, system assessment.</li>\r\n	<li>Berkompeten dibidang instrumentasi dan proses khususnya field instrument devices.</li>\r\n	<li>Memiliki kompetensi dalam pemprograman PLC AB, wonderware, termasuk lokal control system.</li>\r\n	<li>Familiar dengan spesifikasi, datasheet, diagram, dan gambar teknik.</li>\r\n	<li>Memiliki Pengetahuan lanjut mengenai keselamatan kerja</li>\r\n</ol>', NULL, 1, 'instrument--control-engineer', 1, '2017-12-31 00:00:00', '', '', '2017-11-13 16:40:43', 1, '2017-11-13 16:48:58', 1),
(9, 'Teknisi', 'Dibutuhkan lulusan Diploma III/SMU sederajat dengan pengalaman sebagai Teknisi 4-6 tahun.', 'Tugas dan Tanggung Jawab :\r\n<ol>\r\n	<li>Mengontrol dan mengkoordinasikan keseluruhan pelaksanaan pekerjaan dilapangan.</li>\r\n	<li>Sebagai pimpinan pelaksanaan pekerjaan dari Team Kontraktor, baik di lapangan maupun di kantor.</li>\r\n	<li>Memastikan dan melaksanakan pekerjaan sesuai dengan standar Perusahaan, serta taat pada peraturan Perusahaan.</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Diploma III atau setara dengan pengalaman minimal 4 tahun, atau SMU/sederajat dengan pengalaman minimal 6 tahun.</li>\r\n	<li>Memiliki kompetensi dibidang instrumentasi dan proses khususnya field instrument devices &amp; control system (khususnya PLC AB).</li>\r\n	<li>Familiar dengan spesifikasi, datasheet, diagram, dan gambar teknik.</li>\r\n	<li>Memiliki pengetahuan keselamatan kerja.</li>\r\n</ol>', NULL, 1, 'teknisi', 1, '2018-02-28 00:00:00', '', '', '2017-11-13 16:47:54', 1, '2018-02-01 17:16:44', 1),
(10, 'SALES AND PROCUREMENT SUPERVISORY', 'Looking for Sales and Procurement Supervisory', 'Sales &amp; Procurement Supervisory<br />\r\nRequirement:<br />\r\n- Good knowledge and connection in oil-gas/Instrument engineering product<br />\r\n- Proven sales and procurement experience Oil &amp; Gas<br />\r\n- Pricing stategy negotiation<br />\r\n- Good communication and organizational skills<br />\r\n- Ability to build relationships with suppliers and customers<br />\r\n- Able to drive vehicle<br />\r\n- Technical background degree education<br />\r\n<br />\r\nJob Description:<br />\r\n- Build customer supplying material<br />\r\n- Manage the third party procurement customer oil-gas<br />\r\n- Develop sales strategies for the third party<br />\r\n- Negotiate for the best prices for all orders<br />\r\n- Arrange achieve target per month', NULL, 1, 'sales-and-procurement-supervisory', 1, '2018-02-28 00:00:00', '', '', '2018-02-01 15:28:16', 1, '2018-02-01 15:30:08', 1),
(11, 'SPI Engineer', 'We need SPI Engineer immediately', 'SPI Engineer\r\n<p>-Knowledge and Experience with instrument design database software e.g. INTOOLS/SmartPlant Instrumentation (SPI)</p>\r\n\r\n<p>- Familiar with P&amp;ID</p>\r\n\r\n<p>- Famiiar with related documents like Instrument Index, I/O list &amp; Termination</p>\r\n\r\n<p>- Working experience in oil &amp; gas industries</p>\r\n\r\n<p>- Possess logical and analytical approach to problem solving</p>\r\n\r\n<p>&nbsp;</p>', NULL, 1, 'spi-engineer', 1, '2018-02-28 00:00:00', '', '', '2018-02-01 16:34:11', 1, '2018-02-01 16:34:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `postal_code` varchar(10) NOT NULL,
  `province_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_client`
--

CREATE TABLE `tbl_client` (
  `client_id` int(11) NOT NULL,
  `client_title` varchar(255) NOT NULL,
  `client_image` varchar(255) DEFAULT NULL,
  `client_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `client_highlight` int(1) NOT NULL DEFAULT '0',
  `client_order` int(11) NOT NULL DEFAULT '1',
  `client_meta_description` varchar(250) DEFAULT NULL,
  `client_meta_keywords` varchar(250) DEFAULT NULL,
  `client_create_date` datetime NOT NULL,
  `client_create_by` int(11) NOT NULL,
  `client_update_date` datetime DEFAULT NULL,
  `client_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_client`
--

INSERT INTO `tbl_client` (`client_id`, `client_title`, `client_image`, `client_active_status`, `client_highlight`, `client_order`, `client_meta_description`, `client_meta_keywords`, `client_create_date`, `client_create_by`, `client_update_date`, `client_update_by`) VALUES
(5, 'CV. Kadytra Mulya Sejati', '', 1, 0, 5, 'CV. Kadytra Mulya Sejati', 'CV. Kadytra Mulya Sejati', '2016-09-01 00:00:00', 1, '2016-09-11 00:00:00', 1),
(4, 'BSP (Bumi Siak Pusako)', '', 1, 0, 4, 'BSP (Bumi Siak Pusako)', 'BSP (Bumi Siak Pusako)', '2016-09-01 00:00:00', 1, '2016-09-10 00:00:00', 1),
(3, 'Blue Scope Steel', '', 1, 0, 3, 'Blue Scope Steel', 'Blue Scope Steel', '2016-09-07 00:00:00', 1, '2016-09-09 00:00:00', 1),
(2, 'ARSynergy Resources', '', 1, 0, 2, 'ARSynergy Resources', 'ARSynergy Resources', '2016-09-07 00:00:00', 1, '2016-09-08 00:00:00', 1),
(1, 'PT. ADHI KARYA', '/assets/file_upload/admin/images/Logos/AK.png', 1, 1, 4, '', 'PT. ADHI KARYA', '2016-08-02 00:00:00', 1, '2016-09-22 15:45:22', 1),
(13, 'Pertamina (Persero)', '', 1, 0, 1, '', 'Pertamina (Persero)', '2016-09-07 00:00:00', 1, '2016-09-22 15:44:58', 1),
(12, 'Pearl Oil', '/assets/file_upload/admin/images/Logos/pearl.png', 1, 1, 5, '', 'Pearl Oil', '2016-09-07 00:00:00', 1, '2016-09-22 15:45:22', 1),
(6, 'Dwisolar Sdn Bhd', '/assets/file_upload/admin/images/Logos/dwisolar.png', 1, 1, 6, '', 'Dwisolar Sdn Bhd', '2016-09-01 00:00:00', 1, '2016-09-22 15:45:22', 1),
(7, 'Emerald Maritime', '', 1, 0, 7, 'Emerald Maritime', 'Emerald Maritime', '2016-09-02 00:00:00', 1, '2016-09-13 00:00:00', 1),
(8, 'IntisariMulia Engineering ', '', 1, 0, 8, 'IntisariMulia Engineering ', 'IntisariMulia Engineering ', '2016-09-07 00:00:00', 1, '2016-09-14 00:00:00', 1),
(9, 'KCS ', '', 1, 0, 9, 'KCS ', 'KCS ', '2016-09-07 00:00:00', 1, '2016-09-15 00:00:00', 1),
(10, 'Menara Gading Putih', '', 1, 0, 10, 'Menara Gading Putih', 'Menara Gading Putih', '2016-09-07 00:00:00', 1, '2016-09-16 00:00:00', 1),
(11, 'Mutiara Energy', '', 1, 0, 11, 'Mutiara Energy', 'Mutiara Energy', '2016-08-02 00:00:00', 1, '2016-09-17 00:00:00', 1),
(14, 'PHE-ONWJ', '', 1, 0, 14, 'PHE-ONWJ', 'PHE-ONWJ', '2016-09-01 00:00:00', 1, '2016-09-20 00:00:00', 1),
(15, 'PHE-WMO', '/assets/file_upload/admin/images/Logos/phewmo.png', 1, 1, 1, '', 'PHE-WMO', '2016-09-01 00:00:00', 1, '2016-09-22 15:45:22', 1),
(16, 'PLTU KALTIM (Teluk Balikpapan)', '', 1, 0, 16, 'PLTU KALTIM (Teluk Balikpapan)', 'PLTU KALTIM (Teluk Balikpapan)', '2016-09-01 00:00:00', 1, '2016-09-22 00:00:00', 1),
(17, 'PPS', '', 1, 0, 17, 'PPS', 'PPS', '2016-09-02 00:00:00', 1, '2016-09-23 00:00:00', 1),
(18, 'Premier Oil', '/assets/file_upload/admin/images/Logos/premieroil.png', 1, 1, 2, '', 'Premier Oil', '2016-09-07 00:00:00', 1, '2016-09-22 15:45:22', 1),
(19, 'PT. Grama Bazita', '', 1, 0, 19, 'PT. Grama Bazita', 'PT. Grama Bazita', '2016-09-07 00:00:00', 1, '2016-09-25 00:00:00', 1),
(20, 'PT. Grama Bazita Tenaga', '', 1, 0, 20, 'PT. Grama Bazita Tenaga', 'PT. Grama Bazita Tenaga', '2016-09-07 00:00:00', 1, '2016-09-26 00:00:00', 1),
(21, 'PT. Honeywell Indonesia', '/assets/file_upload/admin/images/Logos/honeywell.png', 1, 1, 3, '', 'PT. Honeywell Indonesia', '2016-08-02 00:00:00', 1, '2016-09-22 15:45:22', 1),
(22, 'PT. Kuarta Powerindo Perkasa', '', 1, 0, 22, 'PT. Kuarta Powerindo Perkasa', 'PT. Kuarta Powerindo Perkasa', '2016-09-07 00:00:00', 1, '2016-09-28 00:00:00', 1),
(23, 'PT. Lontar Papirus Pulp and Paper', '', 1, 0, 23, 'PT. Lontar Papirus Pulp and Paper', 'PT. Lontar Papirus Pulp and Paper', '2016-09-07 00:00:00', 1, '2016-09-29 00:00:00', 1),
(24, 'PT. Megaron Semesta', '', 1, 0, 24, 'PT. Megaron Semesta', 'PT. Megaron Semesta', '2016-09-01 00:00:00', 1, '2016-09-30 00:00:00', 1),
(25, 'PT. Premier', '', 1, 0, 25, 'PT. Premier', 'PT. Premier', '2016-09-01 00:00:00', 1, '2016-10-01 00:00:00', 1),
(26, 'PT. ZUG', '', 1, 0, 26, 'PT. ZUG', 'PT. ZUG', '2016-09-01 00:00:00', 1, '2016-10-02 00:00:00', 1),
(28, 'SAIPEM ', '', 1, 0, 28, 'SAIPEM ', 'SAIPEM ', '2016-09-07 00:00:00', 1, '2016-10-04 00:00:00', 1),
(29, 'Shell Sabah Petroleum Company', '', 1, 0, 29, 'Shell Sabah Petroleum Company', 'Shell Sabah Petroleum Company', '2016-09-07 00:00:00', 1, '2016-10-05 00:00:00', 1),
(30, 'SINOHYDRO ', '', 1, 0, 30, 'SINOHYDRO ', 'SINOHYDRO ', '2016-09-07 00:00:00', 1, '2016-10-06 00:00:00', 1),
(31, 'Tripatra ', '', 1, 0, 31, 'Tripatra ', 'Tripatra ', '2016-09-07 00:00:00', 1, '2016-10-07 00:00:00', 1),
(32, 'Yusonda Mahayasa Nusantara', '', 1, 0, 32, 'Yusonda Mahayasa Nusantara', 'Yusonda Mahayasa Nusantara', '2016-09-07 00:00:00', 1, '2016-10-08 00:00:00', 1),
(33, 'Eni Muara Bakau B.V', '', 1, 0, 1, 'Eni Muara Bakau B.V', 'Eni Muara Bakau B.V', '2017-02-01 05:36:40', 1, '2017-02-01 05:36:46', 1),
(34, 'Petronas Carigali Sdn, Bhd', '', 1, 0, 1, 'Petronas Carigali Sdn, Bhd', 'Petronas Carigali Sdn, Bhd', '2017-02-01 05:41:59', 1, '2017-02-01 05:42:06', 1),
(35, 'BLT Brotojoyo', '', 1, 0, 1, 'BLT Brotojoyo', 'BLT Brotojoyo', '2017-02-01 05:44:31', 1, '2017-02-01 05:44:38', 1),
(36, 'PHE WMO', NULL, 0, 0, 1, NULL, NULL, '2017-10-25 14:41:21', 1, NULL, NULL),
(37, 'PHE WMO', NULL, 0, 0, 1, NULL, NULL, '2017-10-25 14:41:40', 1, NULL, NULL),
(38, 'PHE WMO', NULL, 0, 0, 1, NULL, NULL, '2017-10-25 14:41:40', 1, NULL, NULL),
(39, 'PHE WMO', NULL, 0, 0, 1, NULL, NULL, '2017-10-25 14:42:44', 1, NULL, NULL),
(40, 'PHE WMO', NULL, 0, 0, 1, NULL, NULL, '2017-10-25 14:42:44', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE `tbl_contact` (
  `contact_id` int(11) NOT NULL,
  `contact_title` varchar(100) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `contact_email` varchar(100) DEFAULT NULL,
  `contact_phone` varchar(30) NOT NULL,
  `contact_fax` varchar(100) DEFAULT NULL,
  `contact_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `contact_order` int(11) NOT NULL DEFAULT '1',
  `contact_create_date` datetime NOT NULL,
  `contact_create_by` int(11) NOT NULL,
  `contact_update_date` datetime DEFAULT NULL,
  `contact_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `contact_title`, `contact_name`, `contact_email`, `contact_phone`, `contact_fax`, `contact_active_status`, `contact_order`, `contact_create_date`, `contact_create_by`, `contact_update_date`, `contact_update_by`) VALUES
(3, 'SALES &amp; MARKETING', 'Mr. M Reza Fahlevi', 'reza@caleb-technology.com', '+62 853 2930 9900', '', 1, 1, '2016-09-18 04:37:25', 1, '2017-10-19 17:14:46', 1),
(2, 'ENGINEERING &amp; SERVICE', 'Mrs. Erni Permanasari', 'admin@caleb-technology.com', '+62 813 1287 8823', '', 1, 3, '2016-09-18 04:23:42', 1, '2016-09-21 15:10:25', 1),
(4, 'PROJECT &amp; SERVICE', 'Mr. Febri Nugraha', 'febri@caleb-technology.com', '+62 812 8001 1772', '', 1, 2, '2016-09-18 04:38:37', 1, '2016-09-20 06:59:09', 1),
(5, 'PROCUREMENT &amp; MATERIAL SUPPORT', 'Mrs. Fithri Grahaningsih', 'fithri@caleb-technology.com', '+62 878 8881 3637', '', 1, 4, '2016-09-20 06:57:37', 1, '2017-10-19 17:14:08', 1),
(7, 'HSE &amp; BUSINESS DEVELOPMENT', 'Mr. Muhammad Rifki Asfari', 'rifki@caleb-technology.com', '+62 821 1005 7474', '', 1, 6, '2016-09-20 06:58:53', 1, '2016-09-20 06:59:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content`
--

CREATE TABLE `tbl_content` (
  `content_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `content_title` varchar(255) NOT NULL,
  `content_short_desc` varchar(1000) DEFAULT NULL,
  `content_desc` text NOT NULL,
  `content_image` varchar(255) DEFAULT NULL,
  `content_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `content_order` int(11) NOT NULL DEFAULT '1',
  `content_alias` varchar(255) DEFAULT NULL,
  `content_meta_description` varchar(250) DEFAULT NULL,
  `content_meta_keywords` varchar(250) DEFAULT NULL,
  `content_create_date` datetime NOT NULL,
  `content_create_by` int(11) NOT NULL,
  `content_update_date` datetime DEFAULT NULL,
  `content_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_content`
--

INSERT INTO `tbl_content` (`content_id`, `menu_id`, `content_title`, `content_short_desc`, `content_desc`, `content_image`, `content_active_status`, `content_order`, `content_alias`, `content_meta_description`, `content_meta_keywords`, `content_create_date`, `content_create_by`, `content_update_date`, `content_update_by`) VALUES
(20, 60, 'material 4', '', '', '/assets/file_upload/admin/images/banner/material03.jpg', 1, 3, '', 'ABC', 'ABC', '2016-08-10 00:10:27', 1, '2017-10-24 12:22:46', 4),
(21, 61, 'Work With US', '', '', '/assets/file_upload/admin/images/Oil well pict.jpeg', 1, 1, 'https://images.search.yahoo.com/search/images;_ylt=AwrTcXzXeAFaUVsAu2KJzbkF;_ylu=X3oDMTBsZ29xY3ZzBHNlYwNzZWFyY2gEc2xrA2J1dHRvbg--;_ylc=X1MDOTYwNjI4NTcEX3IDMgRhY3RuA2NsawRiY2sDNG9ldGRtMWNwbmZlOCUyNmIlM0QzJTI2cyUzRGVqBGNzcmNwdmlkAzM0RWFCVEV3TGpKTU82MndXWnU5', 'Career PT Caleb Technology', 'job, career, teamwork, work, salary, positive', '2016-08-16 15:14:51', 1, '2019-06-28 15:41:38', 1),
(22, 59, '&quot;We ensure good results that are on-schedule and in-budget&quot;', '', '', '/assets/file_upload/admin/images/banner/service002.jpg', 1, 1, 'abcd', 'abcd', 'abcd', '2016-08-16 15:46:03', 1, '2016-09-20 15:49:32', 1),
(23, 62, 'header-about', '', '', '/assets/file_upload/admin/images/banner/about001.jpg', 1, 1, '', '', '', '2016-08-31 18:47:53', 1, '2017-10-24 11:33:21', 4),
(24, 64, 'Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources', '<span style=\"color:#0000FF;\">Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources</span>', 'Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources', '/assets/file_upload/admin/images/banner/trainingaaa.jpg', 1, 1, '', '', '', '2016-09-07 18:26:49', 1, '2017-10-26 10:08:51', 1),
(25, 65, 'test news', '', '---', '/assets/file_upload/admin/images/banner/training-image-detail.jpg', 1, 1, '', '', '', '2016-09-13 01:41:02', 1, '2016-09-13 01:41:56', 1),
(26, 60, 'material 2', '', '', '/assets/file_upload/admin/images/banner/mat-caleb-1', 1, 1, '', '', '', '2016-09-29 02:43:21', 1, '2016-10-14 05:09:09', 1),
(27, 60, 'material 3', '', '', '/assets/file_upload/admin/images/banner/material02.jpg', 0, 2, '', '', '', '2016-10-14 05:08:48', 1, '2017-10-06 16:04:44', 1),
(28, 60, 'material 1', '', '', '/assets/file_upload/admin/images/banner/material04.jpg', 1, 1, '', '', '', '2016-10-21 07:23:09', 1, '2017-10-24 12:22:59', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_page`
--

CREATE TABLE `tbl_content_page` (
  `content_page_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `page_type` int(11) NOT NULL,
  `content_page_title` varchar(255) NOT NULL,
  `content_page_short_desc` varchar(1000) DEFAULT NULL,
  `content_page_desc` text NOT NULL,
  `content_page_image` varchar(255) DEFAULT NULL,
  `content_page_file` varchar(250) NOT NULL,
  `content_page_order` int(11) NOT NULL DEFAULT '1',
  `content_page_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `content_page_meta_description` varchar(250) DEFAULT NULL,
  `content_page_meta_keywords` varchar(250) DEFAULT NULL,
  `content_page_create_date` datetime NOT NULL,
  `content_page_create_by` int(11) NOT NULL,
  `content_page_update_date` datetime DEFAULT NULL,
  `content_page_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_content_page`
--

INSERT INTO `tbl_content_page` (`content_page_id`, `menu_id`, `page_type`, `content_page_title`, `content_page_short_desc`, `content_page_desc`, `content_page_image`, `content_page_file`, `content_page_order`, `content_page_active_status`, `content_page_meta_description`, `content_page_meta_keywords`, `content_page_create_date`, `content_page_create_by`, `content_page_update_date`, `content_page_update_by`) VALUES
(2, 60, 2, 'MATERIAL SUPPORT DIVISION', '<p>dadsadad</p>', 'Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and Maintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors. Our vast product portfolio enables us to fulfill all types of requests you may have - from supply of standard components to design and manufacturing of complex application solutions', '', '', 1, 1, 'sdadadsa', 'dadadsadsa', '2016-08-11 13:03:57', 1, '2017-10-24 12:33:01', 4),
(9, 59, 3, 'EXPERIENCE LIST', '', 'TABEL', '', '', 2, 1, 'fafa', 'fdafa', '2016-09-02 20:40:51', 1, '2017-10-25 14:44:46', 4),
(5, 61, 999, 'cdadsadadsa', 'dasdadsadsa', 'dasdadsadsadsa', '', '', 1, 1, 'dsadadsa', 'dsadsadsadsadsa', '2016-08-16 15:26:37', 1, '2016-08-16 15:36:21', 1),
(6, 61, 999, 'dasdsadsadsa', 'dsadsadsadsadsa', 'dsadsadsadsadsa', '', '', 1, 1, 'dsadsa', 'dasdsadsa', '2016-08-16 15:27:13', 1, '2016-08-16 15:36:17', 1),
(7, 59, 1, 'ENGINEERING &amp; SERVICE DIVISION', 'dasdsadadasdsadsa', 'As a longstanding partner to various industries we can draw on experienced project teams at our locations with outstanding levels of expertise. Our teams are the guarantee for a high-level of professionalism from conceptual development through to system commissioning. By providing the right mix of services that help increase productivity, optimize plant assets and improve financial, we have successfully completed and delivered numerous projects that meets and exceeds our client&#39;s expectation. You can rely on our team to provide a full scope of capabilities to deliver the solutions and services you need now and in the future<br />\r\n&nbsp;', '', '', 1, 1, '', '', '2016-08-16 15:48:04', 1, '2017-10-25 14:44:27', 4),
(8, 62, 1, 'About CALEB', '', 'Established in 2010 by veterans in the industry, Caleb Technology has quickly evolved to become a leading independent Systems Integrator by providing a broad range of process automation solutions and services.<br />\r\nOur advanced expertise in nearly every major automation platform, control system, human interface, and information management solution enables us to help businesses reach new levels of success.<br />\r\n<br />\r\nWe provide a complete range of services that encompass the whole scope of a project:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Supply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries served:\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul>', '/assets/file_upload/admin/images/banner/aboutcaleb.png', 'http://caleb-technology.com/assets/file_upload/admin/files/Company Profile PT  Caleb Technology.pdf', 1, 1, '', '', '2016-08-31 18:39:58', 1, '2017-10-24 09:15:58', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_content_subpage`
--

CREATE TABLE `tbl_content_subpage` (
  `content_subpage_id` int(11) NOT NULL,
  `content_page_id` int(11) NOT NULL,
  `content_subpage_title` varchar(255) NOT NULL,
  `content_subpage_desc` text NOT NULL,
  `content_subpage_image` text NOT NULL,
  `content_subpage_order` int(11) NOT NULL DEFAULT '1',
  `content_subpage_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `content_subpage_create_date` datetime NOT NULL,
  `content_subpage_create_by` int(11) NOT NULL,
  `content_subpage_update_date` datetime DEFAULT NULL,
  `content_subpage_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_content_subpage`
--

INSERT INTO `tbl_content_subpage` (`content_subpage_id`, `content_page_id`, `content_subpage_title`, `content_subpage_desc`, `content_subpage_image`, `content_subpage_order`, `content_subpage_active_status`, `content_subpage_create_date`, `content_subpage_create_by`, `content_subpage_update_date`, `content_subpage_update_by`) VALUES
(1, 4, '', '<p>dsadsadsssssssssssa</p>\n', 'http://localhost/caleb/assets/file_upload/admin/images/Content/1366x768-balkat-wallpaper.jpg', 2, 0, '2016-08-15 08:12:29', 1, '2016-08-16 09:43:05', 1),
(2, 4, 'dadasdsa dasdsa', '&lt;p&gt;dsadsadsa&lt;/p&gt;', '', 1, 0, '2016-08-18 00:00:00', 1, '2016-08-19 00:00:00', 1),
(3, 2, 'DCS/ PLC & Fire Alarm & Flow Computer', 'Honeywell, Rockwell Automation, Autronica, OMNI', '', 1, 1, '2016-08-16 09:31:45', 1, '2016-09-07 09:46:38', 1),
(4, 7, 'dsadsadsa', 'dsadsadsa', 'http://caleb-technology.com/assets/file_upload/admin/images/Content/psdiv01.jpg', 1, 1, '2016-08-16 10:48:04', 1, '2016-11-10 06:39:29', 1),
(5, 9, 'dsadsadsasssssssssssssssssssssssssss', '', 'http://caleb-technology.com/assets/file_upload/admin/images/Projects/1474364570728.jpg', 1, 1, '2016-09-02 15:40:51', 1, '2017-10-25 07:16:45', 4),
(6, 9, 'das', '', 'http://caleb-technology.com/assets/file_upload/admin/images/Projects/Landing-lv.jpg', 1, 1, '2016-09-02 15:40:51', 1, '2017-10-25 07:17:30', 4),
(7, 9, 'dasdsadsadsa', '', 'http://localhost/caleb/assets/file_upload/admin/images/Content/honeywell.jpg', 1, 0, '2016-09-02 15:40:51', 1, '2016-09-03 02:06:44', 1),
(8, 9, 'gafdaffdfad', '', 'http://localhost/caleb/assets/file_upload/admin/images/Content/icstriplex.jpg', 1, 1, '2016-09-02 15:40:51', 1, '0000-00-00 00:00:00', 0),
(9, 9, 'gdgfdgfdgd', '', 'http://localhost/caleb/assets/file_upload/admin/images/Content/omni.jpg', 1, 1, '2016-09-02 15:40:51', 1, '0000-00-00 00:00:00', 0),
(10, 2, 'HMI & SCADA', 'Honeywell Rockwell Automation, Wonderware, Kinco', '', 2, 1, '2016-09-02 21:42:34', 1, '2017-10-25 07:54:53', 4),
(11, 2, 'JUNCTION BOX, TERMINAL BLOCK, POWER SUPPLY & ACCESSORIES', 'Phoenix Contact, Weidmuller, ABB Entrelec', '', 3, 1, '2016-09-02 21:42:34', 1, '2016-09-07 09:48:18', 1),
(12, 2, 'CABLE POWER, CABLE INSTRUMENT & TELECOMMUNICATION CABLE', 'Pysmian, Okonite, Olex, Pirelli, Calvicel, Belden, Sumi Indo, Jembo', '', 4, 1, '2016-09-02 21:43:24', 1, '2016-09-07 09:48:52', 1),
(13, 2, 'CONDUIT , FITTING & ACCESSORIES', 'Thomas and Betts, Crouse Hinds', '', 5, 1, '2016-09-07 09:53:47', 1, '2016-09-07 09:55:15', 1),
(14, 2, 'ENCLOSURE SYSTEM & ACCESSORIES', 'Rittal, Alfa Electric, KSS', '', 6, 1, '2016-09-07 09:53:47', 1, '2016-09-07 09:55:19', 1),
(15, 2, 'CABLE TRAY & ACCESSORIES', 'Lion, Trias, and others', '', 7, 1, '2016-09-07 09:53:47', 1, '2016-09-07 09:55:23', 1),
(16, 2, 'LIGHTING FIXTURES & ACCESSORIES', 'Chalmit, Killark, DTS & Thomas and Betts', '', 8, 1, '2016-09-07 09:53:47', 1, '2016-09-07 09:55:26', 1),
(17, 2, 'CABLE GLAND , MCT & ACCESSORIES', 'Hawke, CCG, CMP, Thomas and Betts', '', 9, 1, '2016-09-07 09:53:47', 1, '2016-09-07 09:55:30', 1),
(18, 2, 'GAS, SMOKE, & HEAT DETECTOR', 'Autronica, Crowcon', '', 10, 1, '2016-09-07 09:53:47', 1, '2016-09-07 09:55:37', 1),
(19, 2, 'FLOW, LEVEL, &amp; PRESSURE TRANSMITTER', 'Honeywell, Yokogawa, Rosemount, Yamatake', '', 7, 0, '2016-09-07 09:53:47', 1, '0000-00-00 00:00:00', 0),
(20, 2, 'TESTING &amp; CALIBRATION EQUIPMENT', 'Fluke, Druck, Ascroft', '', 8, 0, '2016-09-07 09:53:47', 1, '0000-00-00 00:00:00', 0),
(21, 2, 'HEAT TRACING TUBE', 'O&amp;#39;brien', '', 9, 0, '2016-09-07 09:53:47', 1, '0000-00-00 00:00:00', 0),
(22, 2, 'CONTROL, SAFETY, CHECK, &amp; BALL VALVE', 'N-LINE Valve, Velan ABV, HOKE Valve, Gyrolok, Swagelok', '', 10, 0, '2016-09-07 09:53:47', 1, '0000-00-00 00:00:00', 0),
(23, 2, 'FLOW, LEVEL, &amp; PRESSURE TRANSMITTER', '', '', 1, 0, '2016-09-07 09:56:38', 1, '0000-00-00 00:00:00', 0),
(24, 7, '', '', 'http://caleb-technology.com/assets/file_upload/admin/images/Content/psdiv03.jpg', 1, 1, '2016-09-07 16:14:29', 1, '2016-11-10 06:39:54', 1),
(25, 7, '', '', 'http://caleb-technology.com/assets/file_upload/admin/images/Content/psdiv02.jpg', 1, 1, '2016-09-20 08:32:48', 1, '2016-11-10 06:41:00', 1),
(26, 7, '', '', 'http://caleb-technology.com/assets/file_upload/admin/images/Content/psdiv04.jpg', 1, 1, '2016-09-20 08:34:42', 1, '2016-11-10 06:40:25', 1),
(27, 10, '', '', '', 1, 1, '2017-10-25 07:18:29', 4, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_country`
--

CREATE TABLE `tbl_country` (
  `country_id` int(10) UNSIGNED NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `country_active_status` tinyint(4) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_about`
--

CREATE TABLE `tbl_gallery_about` (
  `gallery_id` int(11) NOT NULL,
  `about_id` int(11) NOT NULL,
  `gallery_title` varchar(100) NOT NULL,
  `gallery_desc` varchar(100) NOT NULL,
  `gallery_image` text NOT NULL,
  `gallery_order` int(11) NOT NULL DEFAULT '1',
  `gallery_link1` text NOT NULL,
  `gallery_link2` text NOT NULL,
  `gallery_active_status` int(11) NOT NULL,
  `gallery_create_by` int(11) NOT NULL,
  `gallery_create_date` datetime NOT NULL,
  `gallery_update_by` int(11) NOT NULL,
  `gallery_update_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gallery_works`
--

CREATE TABLE `tbl_gallery_works` (
  `gallery_id` int(11) NOT NULL,
  `works_id` int(11) NOT NULL,
  `gallery_title` varchar(100) NOT NULL,
  `gallery_desc` varchar(100) NOT NULL,
  `gallery_image` text NOT NULL,
  `gallery_order` int(11) NOT NULL DEFAULT '1',
  `gallery_active_status` int(11) NOT NULL,
  `gallery_create_by` int(11) NOT NULL,
  `gallery_create_date` datetime NOT NULL,
  `gallery_update_by` int(11) NOT NULL,
  `gallery_update_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gallery_works`
--

INSERT INTO `tbl_gallery_works` (`gallery_id`, `works_id`, `gallery_title`, `gallery_desc`, `gallery_image`, `gallery_order`, `gallery_active_status`, `gallery_create_by`, `gallery_create_date`, `gallery_update_by`, `gallery_update_date`) VALUES
(1, 6, 'no tddasdasdasadsaitle', 'dasdas', '4.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-05-17 12:58:36'),
(2, 13, 'CLIENT', 'Beer Can Automation, California, Usa', 'work-1px-2.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-05-16 19:41:44'),
(3, 13, 'ABOUT WORK', 'Because those who do not know how a puIse pleasure and tionally encounter consequences that are', 'woman.png', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-05-16 19:41:18'),
(4, 12, 'no title', 'no remarks', 'blog-mas-img-3.jpg', 2, 1, 0, '0000-00-00 00:00:00', 1, '2016-05-17 12:57:33'),
(5, 12, 'no title', 'no remarks', 'blog-mas-img-2.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-05-17 12:57:33'),
(6, 6, 'no title', 'no remarks', 'keyboard.png', 2, 1, 0, '0000-00-00 00:00:00', 1, '2016-05-17 12:58:36'),
(7, 14, 'test 0002 ', 'remarkes yes lagi', 'cs0001.jpg', 2, 1, 0, '0000-00-00 00:00:00', 1, '2016-05-23 02:56:34'),
(8, 14, 'test 001', 'remarks yes', 'cs002.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-05-23 02:56:34'),
(9, 43, 'no title', 'no remarks', 'femeenin-single-img-sub-1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-08 14:10:32'),
(10, 43, 'no title', 'no remarks', 'femini-single-img-sub-1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-08 14:10:29'),
(11, 34, 'no title', 'no remarks', 'karve0002.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 17:40:33'),
(12, 34, 'no title', 'no remarks', 'karve001.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 17:40:31'),
(13, 44, 'no title', 'no remarks', 'wamcom002.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 19:57:27'),
(14, 44, 'no title', 'no remarks', 'wamcompro-00001.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 19:57:25'),
(15, 33, 'no title', 'no remarks', 'wam01.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 20:35:30'),
(16, 33, 'no title', 'no remarks', 'wam002.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 20:35:28'),
(17, 19, 'no title', 'no remarks', 'ic001.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 20:42:01'),
(18, 19, 'no title', 'no remarks', 'ic002.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 20:42:00'),
(19, 38, 'no title', 'no remarks', 'agmbmw001.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 20:59:25'),
(20, 38, 'no title', 'no remarks', 'agmbmw02.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 20:59:23'),
(21, 16, 'no title', 'no remarks', 'prow1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 21:36:55'),
(22, 16, 'no title', 'no remarks', 'prow2.jpg', 2, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-22 21:36:55'),
(23, 17, 'no title', 'no remarks', 'g001.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 08:39:44'),
(24, 17, 'no title', 'no remarks', 'g002.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 08:39:42'),
(25, 32, 'no title', 'no remarks', 'fmn2.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 08:45:42'),
(26, 32, 'no title', 'no remarks', 'fmn1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 08:45:41'),
(28, 36, 'no title', 'no remarks', 'edc01.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 12:03:37'),
(29, 36, 'no title', 'no remarks', 'edc02.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 12:03:20'),
(31, 36, 'no title', 'no remarks', 'edc01.jpg', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(32, 36, 'no title', 'no remarks', 'edc02.jpg', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(33, 46, 'no title', 'no remarks', 'webcorsa1.jpg', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(34, 46, 'no title', 'no remarks', 'WEBC02.jpg', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(35, 46, 'no title', 'no remarks', 'webcorsa1.jpg', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(36, 46, 'no title', 'no remarks', 'WEBC02.jpg', 1, 0, 0, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00'),
(37, 46, 'no title', 'no remarks', 'webcorsa1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 12:21:34'),
(38, 46, 'no title', 'no remarks', 'WEBC02.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 12:21:31'),
(39, 35, 'no title', 'no remarks', 'CP01.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 12:42:13'),
(40, 35, 'no title', 'no remarks', 'CP02.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 12:42:10'),
(41, 37, 'no title', 'no remarks', 'Y01.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 12:48:46'),
(42, 37, 'no title', 'no remarks', 'Y02.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 12:48:43'),
(43, 39, 'no title', 'no remarks', 'lsaf1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:12:33'),
(44, 39, 'no title', 'no remarks', 'lsaf2.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:12:19'),
(45, 30, 'no title', 'no remarks', 'tafel21.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:19:45'),
(46, 30, 'no title', 'no remarks', 'tfl21.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:19:42'),
(47, 40, 'no title', 'no remarks', 'h01.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:29:46'),
(48, 40, 'no title', 'no remarks', 'h02.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:29:43'),
(49, 42, 'no title', 'no remarks', 'gki1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:45:40'),
(50, 42, 'no title', 'no remarks', 'gki2.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:45:38'),
(58, 41, 'no title', 'no remarks', 'ppmw2.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 14:05:16'),
(59, 41, 'no title', 'no remarks', 'ppmw1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 14:05:14'),
(56, 18, 'no title', 'no remarks', 'kmn3.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:51:08'),
(57, 18, 'no title', 'no remarks', 'kmn12.jpg', 2, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 13:51:08'),
(60, 48, 'no title', 'no remarks', 'EDC1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 15:03:31'),
(61, 48, 'no title', 'no remarks', 'EDC2.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 15:03:29'),
(62, 47, 'no title', 'no remarks', 'PROWW2.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 15:28:26'),
(63, 47, 'no title', 'no remarks', 'PROWW1.jpg', 1, 1, 0, '0000-00-00 00:00:00', 1, '2016-06-23 15:28:24');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_general`
--

CREATE TABLE `tbl_general` (
  `general_id` int(11) NOT NULL,
  `general_title` varchar(100) NOT NULL,
  `general_description` varchar(255) NOT NULL,
  `general_keyword` varchar(255) NOT NULL,
  `general_facebook` varchar(50) DEFAULT NULL,
  `general_twitter` varchar(50) DEFAULT NULL,
  `general_cs_phonenumber` varchar(50) DEFAULT NULL,
  `general_cs_email` varchar(150) DEFAULT NULL,
  `general_update_date` datetime DEFAULT NULL,
  `general_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_general`
--

INSERT INTO `tbl_general` (`general_id`, `general_title`, `general_description`, `general_keyword`, `general_facebook`, `general_twitter`, `general_cs_phonenumber`, `general_cs_email`, `general_update_date`, `general_update_by`) VALUES
(1, 'Title', 'Desciption', 'keyword1, keyword2', 'tukarpoin', 'tukarpoin', '021-5888888', 'cs[@]tukarpoin.com', '2015-09-10 10:13:41', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_language`
--

CREATE TABLE `tbl_language` (
  `language_id` int(11) NOT NULL,
  `language_title` varchar(50) NOT NULL,
  `language_image` varchar(255) NOT NULL,
  `language_default` tinyint(1) NOT NULL,
  `language_active_status` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_language`
--

INSERT INTO `tbl_language` (`language_id`, `language_title`, `language_image`, `language_default`, `language_active_status`) VALUES
(1, 'Indonesia', '/assets/file_upload/admin/images/language/lang-ind.jpg', 0, 1),
(2, 'English', '/assets/file_upload/admin/images/language/lang-eng.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_latest_training`
--

CREATE TABLE `tbl_latest_training` (
  `latest_training_id` int(11) NOT NULL,
  `latest_training_title` varchar(255) NOT NULL,
  `latest_training_image` varchar(255) DEFAULT NULL,
  `latest_training_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `latest_training_highlight` int(1) NOT NULL DEFAULT '0',
  `latest_training_order` int(11) NOT NULL DEFAULT '1',
  `latest_training_meta_description` varchar(250) DEFAULT NULL,
  `latest_training_meta_keywords` varchar(250) DEFAULT NULL,
  `latest_training_create_date` datetime NOT NULL,
  `latest_training_create_by` int(11) NOT NULL,
  `latest_training_update_date` datetime DEFAULT NULL,
  `latest_training_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_latest_training`
--

INSERT INTO `tbl_latest_training` (`latest_training_id`, `latest_training_title`, `latest_training_image`, `latest_training_active_status`, `latest_training_highlight`, `latest_training_order`, `latest_training_meta_description`, `latest_training_meta_keywords`, `latest_training_create_date`, `latest_training_create_by`, `latest_training_update_date`, `latest_training_update_by`) VALUES
(1, 'training 1', '/assets/file_upload/admin/images/Content/training01.jpg', 1, 1, 1, '', '', '2016-09-29 16:48:55', 1, '2016-10-01 10:35:35', 1),
(2, 'training 2', '/assets/file_upload/admin/images/Content/training02.jpg', 1, 1, 1, '', '', '2016-09-29 16:49:09', 1, '2016-10-01 10:35:43', 1),
(3, 'training 3', '/assets/file_upload/admin/images/Content/training03.jpg', 1, 1, 1, '', '', '2016-09-29 16:49:21', 1, '2016-10-01 10:35:56', 1),
(4, 'training 4', '/assets/file_upload/admin/images/Content/training04.jpg', 1, 1, 1, '', '', '2016-09-29 16:49:34', 1, '2016-10-01 10:36:05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_log_cms`
--

CREATE TABLE `tbl_log_cms` (
  `log_id_cms` int(11) NOT NULL,
  `log_module` varchar(50) NOT NULL,
  `log_value` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `log_create_date` datetime NOT NULL,
  `ip` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_log_cms`
--

INSERT INTO `tbl_log_cms` (`log_id_cms`, `log_module`, `log_value`, `user_id`, `log_create_date`, `ip`) VALUES
(1, 'Login', 'superadmin | 1', 1, '2016-06-26 22:39:33', '::1'),
(2, 'Edit ', '4 | DIGITAL DEVELOPMENT | <span style=\"color: rgb(0, 0, 0); font-family: myriadpro, sans-serif; font-size: medium; line-height: normal;\">Working with the latest technology we design and build pixel perfect, user-centric websites.</span> | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-03.png |  | Digital Development, UI/UX, Apps | Website Development', 1, '2016-06-26 22:41:31', '::1'),
(3, 'Edit ', '3 | Merchandising | <span style=\"color: rgb(0, 0, 0); font-family: myriadpro, sans-serif; font-size: medium; line-height: normal;\">Expand your digital presence with memorable items that are both functional and unique. Get your brand remembered!</span> | <p>Expand your digital presence with memorable items that are both functional and unique. Get your brand remembered!</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-01.png |  | merchandise, t-shirt, souvenir, promotional item | merchandise, t-shirt, souvenir, promotional item', 1, '2016-06-26 22:41:49', '::1'),
(4, 'Edit ', '1 | VISUALISATION | <span style=\"color: rgb(0, 0, 0); font-family: myriadpro, sans-serif; font-size: medium; line-height: normal;\">Stop wasting time and money! Create stunning visualisations and mock-ups to see how everything will be beforehand.</span> | <p>Stop wasting time and money! Create stunning visualisations and mock-ups to see how everything will be beforehand.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-04.png |  | 3D modeling, mock up, booth, preview, sketch, render | 3D modeling, mock up, booth, preview, sketch, render', 1, '2016-06-26 22:42:20', '::1'),
(5, 'Edit ', '2 | Brand Communication | <span style=\"color: rgb(0, 0, 0); font-family: myriadpro, sans-serif; font-size: medium; line-height: normal;\">We pinpoint what makes you unique to create everything your brand needs to stand out and thrive.</span> | <p>We pinpoint what makes you unique to create everything your brand needs to stand out and thrive.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-02.png |  | branding, corporate identity, design, Logo, GSM, CIS | branding, corporate identity, design, Logo, GSM, CIS', 1, '2016-06-26 22:42:33', '::1'),
(6, 'Edit ', '4 | DIGITAL DEVELOPMENT | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-03.png |  | Digital Development, UI/UX, Apps | Website Development', 1, '2016-06-26 22:43:28', '::1'),
(7, 'Edit ', '3 | Merchandising | <p>Expand your digital presence with memorable items that are both functional and unique. Get your brand remembered!</p> | <p>Expand your digital presence with memorable items that are both functional and unique. Get your brand remembered!</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-01.png |  | merchandise, t-shirt, souvenir, promotional item | merchandise, t-shirt, souvenir, promotional item', 1, '2016-06-26 22:44:11', '::1'),
(8, 'Edit ', '2 | Brand Communication | <p>We pinpoint what makes you unique to create everything your brand needs to stand out and thrive.</p> | <p>We pinpoint what makes you unique to create everything your brand needs to stand out and thrive.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-02.png |  | branding, corporate identity, design, Logo, GSM, CIS | branding, corporate identity, design, Logo, GSM, CIS', 1, '2016-06-26 22:44:26', '::1'),
(9, 'Edit ', '1 | VISUALISATION | <p>Stop wasting time and money! Create stunning visualisations and mock-ups to see how everything will be beforehand.</p> | <p>Stop wasting time and money! Create stunning visualisations and mock-ups to see how everything will be beforehand.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-04.png |  | 3D modeling, mock up, booth, preview, sketch, render | 3D modeling, mock up, booth, preview, sketch, render', 1, '2016-06-26 22:44:50', '::1'),
(10, 'Edit ', '4 | DIGITAL DEVELOPMENT | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-03.png |  | Digital Development, UI/UX, Apps | Website Development', 1, '2016-06-26 23:14:48', '::1'),
(11, 'Edit ', '4 | DIGITAL DEVELOPMENT | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-03.png |  | Digital Development, UI/UX, Apps | Website Development', 1, '2016-06-26 23:16:38', '::1'),
(12, 'Edit ', '4 | DIGITAL DEVELOPMENT | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-03.png |  | Digital Development, UI/UX, Apps | Website Development', 1, '2016-06-26 23:32:52', '::1'),
(13, 'Edit ', '3 | Merchandising | <p>Expand your digital presence with memorable items that are both functional and unique. Get your brand remembered!</p> | <p>Expand your digital presence with memorable items that are both functional and unique. Get your brand remembered!</p> |  |  | merchandise, t-shirt, souvenir, promotional item | merchandise, t-shirt, souvenir, promotional item', 1, '2016-06-26 23:34:01', '::1'),
(14, 'Edit ', '3 | Merchandising | <p>Expand your digital presence with memorable items that are both functional and unique. Get your brand remembered!</p> | <p>Expand your digital presence with memorable items that are both functional and unique. Get your brand remembered!</p> |  |  | merchandise, t-shirt, souvenir, promotional item | merchandise, t-shirt, souvenir, promotional item', 1, '2016-06-26 23:34:49', '::1'),
(15, 'Edit ', '4 | DIGITAL DEVELOPMENT | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-03.png |  | Digital Development, UI/UX, Apps | Website Development', 1, '2016-06-26 23:45:34', '::1'),
(16, 'Edit ', '4 | DIGITAL DEVELOPMENT | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-03.png | digitaldevelopment | Digital Development, UI/UX, Apps | Website Development', 1, '2016-06-26 23:54:35', '::1'),
(17, 'Inactive ', '34 | KARVE | 0', 1, '2016-06-27 00:00:42', '::1'),
(18, 'Edit ', '34 | KARVE | WEB DESIGN | Karve which means &quot;Cow&quot; in English is a Lithuanian producer of milk-based products. Company X which acts as a distributor for their product in Indonesia, requested us to design a simple website that showcase their products. The tone of the website is a combination of fun and modern.&nbsp; | /assets/file_upload/admin/images/BALKAT/Works/KARVE.jpg | karve | Website design for Karve | karve, milk, web design development', 1, '2016-06-27 00:28:20', '::1'),
(19, 'Edit ', '4 | DIGITAL DEVELOPMENT | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | <p>Working with the latest technology we design and build pixel perfect, user-centric websites.</p> | /assets/file_upload/admin/images/BALKAT/Icons/serviceicon-03.png | digitaldevelopment | Digital Development, UI/UX, Apps | Website Development', 1, '2016-06-27 01:00:39', '::1'),
(20, 'Delete ', '4 | DIGITAL DEVELOPMENT', 1, '2016-06-27 01:02:42', '::1'),
(21, 'Delete ', '3 | Merchandising', 1, '2016-06-27 01:02:48', '::1'),
(22, 'Delete ', '2 | Brand Communication', 1, '2016-06-27 01:02:53', '::1'),
(23, 'Delete ', '1 | VISUALISATION', 1, '2016-06-27 01:02:58', '::1'),
(24, 'Add ', '5 | digital development |  | dsadsadsadsadsa | /assets/file_upload/admin/images/blog-mas-img-1.jpg | digitaldevelopment |  | ', 1, '2016-06-27 01:03:53', '::1'),
(25, 'Edit ', '5 | digital development |  | dsadsadsadsadsa | /assets/file_upload/admin/images/blog-mas-img-1.jpg | digitaldevelopment |  | ', 1, '2016-06-27 01:04:16', '::1'),
(26, 'Edit ', '5 | digital development |  | dsadsadsadsadsa | /assets/file_upload/admin/images/blog-mas-img-1.jpg | digitaldevelopment |  | ', 1, '2016-06-27 01:09:55', '::1'),
(27, 'Inactive ', '5 | digital development | 0', 1, '2016-06-27 01:13:01', '::1'),
(28, 'Active ', '5 | digital development | 1', 1, '2016-06-27 01:13:05', '::1'),
(29, 'Edit ', '5 | digital development |  | dsadsadsadsadsa | /assets/file_upload/admin/images/blog-mas-img-1.jpg | digital-development |  | ', 1, '2016-06-27 01:13:18', '::1'),
(30, 'Edit ', '5 | digital development |  | dsadsadsadsadsa | /assets/file_upload/admin/images/blog-mas-img-1.jpg | digital-development |  | ', 1, '2016-06-27 01:23:07', '::1'),
(31, 'Inactive ', '34 | KARVE | 0', 1, '2016-06-27 01:30:33', '::1'),
(32, 'Edit ', '41 | PPM School of Management | Web Design | For decades, PPM Management (PPM) has become a partner to managers and manager candidates in Indonesia in sharing experiences in the study of theory and practice of management studies.<br />\r\n<br />\r\nWe had the opprtunity to update their website. One that would better represent the institution in today&#39;s digital world.&nbsp; | /assets/file_upload/admin/images/BALKAT/Works/aappm.jpg | ppmmanajemen | Web Design for PPM School of Management | web design, education, school, university', 1, '2016-06-27 01:33:08', '::1'),
(33, 'Edit ', '17 | GESTALT D+B | Web Development | Gestalt Design and Build is an architectural design firm based in Kelapa Gading, Jakarta that focuses on interesting out of the box design coupled with build level that is unsurpassed in quality.<br />\r\n<br />\r\nThe company developed their old website in 2012 but feel that they need a new one. One that would better represent their design language and is easy to maintain. The new website also needs to be mobile responsive considering that the majority of visits nowadays are through mobile devices. | /assets/file_upload/admin/images/BALKAT/Works/gestalt-cover.jpg | gestaltdb | WEBSITE DEVELOPMENT | ', 1, '2016-06-27 01:33:23', '::1'),
(34, 'Add ', '6 | Merchandising | dsadsadsadsad | Merchandising | /assets/file_upload/admin/images/foto-3.png | merchandising | Merchandising | Merchandising', 1, '2016-06-27 01:54:41', '::1'),
(35, 'Active ', '6 | Merchandising | 1', 1, '2016-06-27 01:54:47', '::1'),
(36, 'Edit ', '46 | CORSA. | WEB DESIGN | w | /assets/file_upload/admin/images/BALKAT/Works/corsa01.jpg | webcorsa | Web Design for Corsa Motorcycle Tires | Web Design, Motorcycle Tires, Tyres, Corsa,', 1, '2016-06-27 01:55:18', '::1'),
(37, 'Edit ', '6 | Merchandising | dsadsadsadsad | Merchandising | /assets/file_upload/admin/images/foto-3.png | merchandising | Merchandising | Merchandising', 1, '2016-06-27 02:05:02', '::1'),
(38, 'Login', 'superadmin | 1', 1, '2016-07-14 14:25:57', '::1'),
(39, 'Inactive Banner', '16 | &lt;span style=&quot;color:#FFFFFF;&quot;&gt;EXPERIENCE THE DESIGN&lt;/span&gt; | 0', 1, '2016-07-14 14:31:25', '::1'),
(40, 'Active Banner', '16 | &lt;span style=&quot;color:#FFFFFF;&quot;&gt;EXPERIENCE THE DESIGN&lt;/span&gt; | 1', 1, '2016-07-14 14:31:29', '::1'),
(41, 'Delete Banner', '13 | ASPIRING INNOVATION', 1, '2016-07-14 14:31:39', '::1'),
(42, 'Delete Banner', '14 | DIGITAL STORYTELLING', 1, '2016-07-14 14:31:45', '::1'),
(43, 'Delete Module', '22 | Banner_gallery', 1, '2016-07-14 15:01:54', '::1'),
(44, 'Delete ', '7 | 6 PRINCIPLES', 1, '2016-07-14 15:52:24', '::1'),
(45, 'Delete ', '8 | About Us', 1, '2016-07-14 15:52:29', '::1'),
(46, 'Delete ', '9 | MEET THE PEOPLE', 1, '2016-07-14 15:52:34', '::1'),
(47, 'Delete ', '10 | WHY US?', 1, '2016-07-14 15:55:59', '::1'),
(48, 'Login', 'superadmin | 1', 1, '2016-07-15 12:16:17', '::1'),
(49, 'Login', 'superadmin | 1', 1, '2016-07-18 13:22:41', '::1'),
(50, 'Active Module Group', '10 | Project Management | 1', 1, '2016-07-18 15:48:03', '::1'),
(51, 'Login', 'superadmin | 1', 1, '2016-07-19 15:05:01', '::1'),
(52, 'Login', 'superadmin | 1', 1, '2016-07-21 12:28:16', '::1'),
(53, 'Add ', '0 | FSG | dasdasdsadsa | dada&nbsp; | /assets/file_upload/admin/images/Content/Capture.PNG | Jakarta | dsadsa | dadsadsa', 1, '2016-07-21 15:42:23', '::1'),
(54, 'Login', 'superadmin | 1', 1, '2016-08-02 13:15:01', '::1'),
(55, 'Add ', '0 | dadadsadsa | dadadsa | dadsadsadsadsa | /assets/file_upload/admin/images/Content/construction1.jpg | medan |  | ', 1, '2016-08-02 14:57:06', '::1'),
(56, 'Add ', '1 | dadadsada | adsdsadsadsa | dsadsdsaadsa | /assets/file_upload/admin/images/Content/construction1.jpg | medan |  | ', 1, '2016-08-02 15:05:26', '::1'),
(57, 'Active ', '1 | dadadsada | 1', 1, '2016-08-02 15:05:32', '::1'),
(58, 'Add ', '2 | dadadsadsa | dadsadadadsa | ddaddsa | /assets/file_upload/admin/images/Content/construction1.jpg | Surabaya |  | ', 1, '2016-08-02 16:15:25', '::1'),
(59, 'Login', 'superadmin | 1', 1, '2016-08-02 23:36:09', '::1'),
(60, 'Add ', '2 | dadsadadsa | /assets/file_upload/admin/images/Content/construction1.jpg |   | ', 1, '2016-08-03 01:07:50', '::1'),
(61, 'Edit ', '2 | PT XYX | /assets/file_upload/admin/images/Content/construction1.jpg | dsaad | dasdas', 1, '2016-08-03 01:30:48', '::1'),
(62, 'Login', 'superadmin | 1', 1, '2016-08-03 15:56:22', '::1'),
(63, 'Login', 'superadmin | 1', 1, '2016-08-03 22:20:33', '::1'),
(64, 'Login', 'superadmin | 1', 1, '2016-08-04 14:38:39', '::1'),
(65, 'Edit Menu', '60 | Material |  | 0', 1, '2016-08-04 15:09:10', '::1'),
(66, 'Active Menu', '60 | Material | 1', 1, '2016-08-04 15:09:22', '::1'),
(67, 'Edit Menu', '54 | Projects |  | 0', 1, '2016-08-04 15:22:34', '::1'),
(68, 'Login', 'superadmin | 1', 1, '2016-08-09 18:21:02', '::1'),
(69, 'Add ', '20 | dasdsadsa |  | dsadsadsadsadasdsa | /assets/file_upload/admin/images/Content/construction1.jpg | dassad | dsaadsads | dsadsadasdsa', 1, '2016-08-10 00:10:27', '::1'),
(70, 'Active ', '20 | dasdsadsa | 1', 1, '2016-08-10 00:13:46', '::1'),
(71, 'Inactive ', '20 | dasdsadsa | 0', 1, '2016-08-10 00:13:54', '::1'),
(72, 'Active ', '20 | dasdsadsa | 1', 1, '2016-08-10 00:13:58', '::1'),
(73, 'Edit ', '20 | dasdsadsa |  | dsadsadsadsadasdsa | /assets/file_upload/admin/images/Content/construction1.jpg | dassad | dsaadsads | dsadsadasdsa', 1, '2016-08-10 01:02:00', '::1'),
(74, 'Active ', '20 | dasdsadsa | 1', 1, '2016-08-10 01:02:08', '::1'),
(75, 'Edit ', '20 | dasdsadsass |  | dsadsadsadsadasdsa | /assets/file_upload/admin/images/Content/construction1.jpg | dassadsssssssssss | dsaadsads | dsadsadasdsa', 1, '2016-08-10 01:10:53', '::1'),
(76, 'Active ', '20 | dasdsadsass | 1', 1, '2016-08-10 01:11:01', '::1'),
(77, 'Add ', '0 | dadsads | dsadsadsadsadsa | dsadsadsa |  | ddddddddddd | aaaaaaaaaaaaaaaaaa', 1, '2016-08-10 01:34:00', '::1'),
(78, 'Login', 'superadmin | 1', 1, '2016-08-10 12:55:19', '::1'),
(79, 'Login', 'superadmin | 1', 1, '2016-08-11 00:02:08', '::1'),
(80, 'Active ', '1 | dadsads | 1', 1, '2016-08-11 00:13:32', '::1'),
(81, 'Edit ', '1 | dadsadssssssssssssssssssssssss | dsadsadsadsadsa | dsadsadsa |  | ddddddddddd | aaaaaaaaaaaaaaaaaa', 1, '2016-08-11 00:33:48', '::1'),
(82, 'Delete ', '1 | ', 1, '2016-08-11 01:02:23', '::1'),
(83, 'Login', 'superadmin | 1', 1, '2016-08-11 12:51:55', '::1'),
(84, 'Add ', '2 | dsaadasda | dadsadad | dasdsadsadsa |  | sdadadsa | dadadsadsa', 1, '2016-08-11 13:03:57', '::1'),
(85, 'Active ', '2 | dsaadasda | 1', 1, '2016-08-11 13:04:02', '::1'),
(86, 'Login', 'superadmin | 1', 1, '2016-08-11 20:08:24', '::1'),
(87, 'Add ', '3 | ddddddddddddd', 1, '2016-08-12 00:39:12', '::1'),
(88, 'Login', 'superadmin | 1', 1, '2016-08-12 14:16:49', '::1'),
(89, 'Active ', '3 |  | 1', 1, '2016-08-12 15:26:31', '::1'),
(90, 'Login', 'superadmin | 1', 1, '2016-08-12 23:46:23', '::1'),
(91, 'Active ', '3 | ddddddddddddd | 1', 1, '2016-08-12 23:57:10', '::1'),
(92, 'Edit ', '3 | ddddssd | /assets/file_upload/admin/images/Content/akses.png', 1, '2016-08-12 23:57:52', '::1'),
(93, 'Active Module', '27 | Material_file | 1', 1, '2016-08-13 01:23:49', '::1'),
(94, 'Inactive Module', '27 | Material_file | 0', 1, '2016-08-13 01:26:37', '::1'),
(95, 'Delete Module', '27 | Material_file', 1, '2016-08-13 01:29:55', '::1'),
(96, 'Login', 'superadmin | 1', 1, '2016-08-14 00:46:38', '::1'),
(97, 'Delete ', '1 | ', 1, '2016-08-14 01:04:27', '::1'),
(98, 'Inactive ', '4 | dsadsadsss | 0', 1, '2016-08-14 01:18:23', '::1'),
(99, 'Active ', '4 | dsadsadsss | 1', 1, '2016-08-14 01:18:29', '::1'),
(100, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | <p>dasdsadsadsa</p> |  | sdadadsa | dadadsadsa', 1, '2016-08-14 01:50:14', '::1'),
(101, 'Login', 'superadmin | 1', 1, '2016-08-15 13:06:57', '::1'),
(102, 'Delete ', '3 | ', 1, '2016-08-15 13:11:47', '::1'),
(103, 'Add ', '4 | dsadsad | <p>dsadsadsadsadsa</p> | <p>dsadsadsadsadsa</p> |  | ggsgdf | dfgfdgdfg', 1, '2016-08-15 13:12:29', '::1'),
(104, 'Active ', '4 | dsadsad | 1', 1, '2016-08-15 13:13:46', '::1'),
(105, 'Active Module', '28 | Content_subpage | 1', 1, '2016-08-15 13:53:59', '::1'),
(106, 'Inactive Module', '28 | Content_subpage | 0', 1, '2016-08-15 14:03:28', '::1'),
(107, 'Active Module', '28 | Content_subpage | 1', 1, '2016-08-15 14:04:10', '::1'),
(108, 'Delete Module', '28 | Content_subpage', 1, '2016-08-15 14:04:15', '::1'),
(109, 'Login', 'superadmin | 1', 1, '2016-08-16 13:50:27', '::1'),
(110, 'Add Menu', '61 | Career |  | 0 | 0', 1, '2016-08-16 15:10:08', '::1'),
(111, 'Edit Menu', '59 | Services | http://localhost/balkatweb/Services | 0', 1, '2016-08-16 15:13:22', '::1'),
(112, 'Active Menu', '61 | Career | 1', 1, '2016-08-16 15:13:33', '::1'),
(113, 'Add ', '21 | dasdsadsadsadsadsadsa |  | dsadsadsadsadsadsadsa | /assets/file_upload/admin/images/Content/1366x768-balkat-wallpaper.jpg | dasdsa | dsadsadsa | dasdasd dasdsa', 1, '2016-08-16 15:14:51', '::1'),
(114, 'Active ', '21 | dasdsadsadsadsadsadsa | 1', 1, '2016-08-16 15:14:59', '::1'),
(115, 'Add ', '5 | cdadsadadsa | dasdadsadsa | dasdadsadsadsa |  | dsadadsa | dsadsadsadsadsa', 1, '2016-08-16 15:26:37', '::1'),
(116, 'Add ', '6 | dasdsadsadsa | dsadsadsadsadsa | dsadsadsadsadsa |  | dsadsa | dasdsadsa', 1, '2016-08-16 15:27:13', '::1'),
(117, 'Active ', '6 | dasdsadsadsa | 1', 1, '2016-08-16 15:36:17', '::1'),
(118, 'Active ', '5 | cdadsadadsa | 1', 1, '2016-08-16 15:36:21', '::1'),
(119, 'Add ', '22 | dasdsadsa |  | dasdsadsa | /assets/file_upload/admin/images/Content/construction1.jpg | dasdsadsa | dasdsadas | dadsadsa', 1, '2016-08-16 15:46:03', '::1'),
(120, 'Active ', '22 | dasdsadsa | 1', 1, '2016-08-16 15:46:09', '::1'),
(121, 'Add ', '7 | PROJECT &amp; SERVICE DIVISION | dasdsadadasdsadsa | Various project has been accomplished with good result and delivered as project schedule meet standard and expectation by<br />\r\ncustomer, we have been accomplished some project from various company such as : Honeywell, PHE WMO, Dwisolar Sdn. Bhd. For<br />\r\nsome project are on going such as Fire alarm system, Gas Metering skid, fire suppresion system etc. |  |  | ', 1, '2016-08-16 15:48:04', '::1'),
(122, 'Active ', '7 | PROJECT &amp; SERVICE DIVISION | 1', 1, '2016-08-16 15:48:10', '::1'),
(123, 'Login', 'superadmin | 1', 1, '2016-08-17 15:41:53', '::1'),
(124, 'Login', 'superadmin | 1', 1, '2016-08-30 15:43:59', '::1'),
(125, 'Login', 'superadmin | 1', 1, '2016-08-31 15:26:49', '::1'),
(126, 'Active Module Group', '11 | About | 1', 1, '2016-08-31 15:31:51', '::1'),
(127, 'Active Module', '29 | About | 1', 1, '2016-08-31 15:33:55', '::1'),
(128, 'Add Menu', '62 | About |  | 0 | 0', 1, '2016-08-31 15:40:32', '::1'),
(129, 'Add ', '8 | fdadsadsa |  | dadsadsadsa | /assets/file_upload/admin/images/Content/Capture.PNG |  | ', 1, '2016-08-31 18:39:58', '::1'),
(130, 'Active ', '8 | fdadsadsa | 1', 1, '2016-08-31 18:40:02', '::1'),
(131, 'Add ', '23 | dsadad |  | dsada | /assets/file_upload/admin/images/Content/construction1.jpg |  |  | ', 1, '2016-08-31 18:47:53', '::1'),
(132, 'Active ', '23 | dsadad | 1', 1, '2016-08-31 18:47:56', '::1'),
(133, 'Add ', '1 | Vision |  | dsadsa<br />\r\ndsadsa', 1, '2016-08-31 19:38:28', '::1'),
(134, 'Active ', '1 | Vision | 1', 1, '2016-08-31 19:41:45', '::1'),
(135, 'Edit ', '1 | Vision |  | dsadsa<br />\r\ndsadsa', 1, '2016-08-31 19:44:47', '::1'),
(136, 'Active Module', '30 | Team | 1', 1, '2016-08-31 19:52:02', '::1'),
(137, 'Login', 'superadmin | 1', 1, '2016-08-31 21:09:21', '::1'),
(138, 'Add Menu', '63 | Team |  | 0 | 0', 1, '2016-08-31 21:10:07', '::1'),
(139, 'Login', 'superadmin | 1', 1, '2016-09-01 01:19:57', '::1'),
(140, 'Add ', '1 | SONI TULUNG | Managing Director | dssdadsadsa', 1, '2016-09-01 01:22:08', '::1'),
(141, 'Active ', '1 | SONI TULUNG | 1', 1, '2016-09-01 01:25:48', '::1'),
(142, 'Edit ', '1 | SONI TULUNGss | Managing Director | dssdadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-01 01:33:59', '::1'),
(143, 'Edit ', '1 | SONI TULUNGss | Managing Director | dssdadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-01 01:36:27', '::1'),
(144, 'Edit ', '1 | SONI TULUNGss | Managing Director | dssdadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-01 01:39:39', '::1'),
(145, 'Edit ', '1 | SONI TULUNGss | Managing Director | dssdadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-01 01:40:45', '::1'),
(146, 'Add ', '2 | dasdsadsa | dsadsadsa | dadsada', 1, '2016-09-01 01:43:41', '::1'),
(147, 'Active ', '2 | dasdsadsa | 1', 1, '2016-09-01 01:44:35', '::1'),
(148, 'Edit ', '2 | dasdsadsa | dsadsadsa | dadsada | /assets/file_upload/admin/images/Content/akses.png |  |  | ', 1, '2016-09-01 01:45:34', '::1'),
(149, 'Delete ', '2 | dasdsadsa', 1, '2016-09-01 01:46:11', '::1'),
(150, 'Active ', '2 | dadadsadsa | 1', 1, '2016-09-01 01:48:44', '::1'),
(151, 'Active ', '1 | Pt abc | 1', 1, '2016-09-01 01:49:41', '::1'),
(152, 'Active ', '2 | PT XYX | 1', 1, '2016-09-01 01:49:47', '::1'),
(153, 'Inactive ', '2 | dadadsadsa | 0', 1, '2016-09-01 01:49:59', '::1'),
(154, 'Active ', '2 | dadadsadsa | 1', 1, '2016-09-01 01:51:38', '::1'),
(155, 'Active ', '4 |  | 1', 1, '2016-09-01 01:56:34', '::1'),
(156, 'Inactive ', '4 |  | 0', 1, '2016-09-01 01:56:42', '::1'),
(157, 'Active ', '4 |  | 1', 1, '2016-09-01 01:56:51', '::1'),
(158, 'Inactive ', '4 | dsadsadsa | 0', 1, '2016-09-01 02:00:45', '::1'),
(159, 'Active Module Group', '12 | News Management | 1', 1, '2016-09-01 02:34:08', '::1'),
(160, 'Active Module', '31 | News | 1', 1, '2016-09-01 02:34:34', '::1'),
(161, 'Login', 'superadmin | 1', 1, '2016-09-01 14:21:38', '::1'),
(162, 'Active Module', '32 | Quote | 1', 1, '2016-09-01 14:26:30', '::1'),
(163, 'Add Partner', 'Partner | dsadadsa | dsadsadsadsa', 1, '2016-09-01 14:41:09', '::1'),
(164, 'Add Partner', 'Partner | dasdsa | dasdsa', 1, '2016-09-01 14:43:04', '::1'),
(165, 'Active Module', '33 | Quote | 1', 1, '2016-09-01 18:36:33', '::1'),
(166, 'Add Quote', 'Quote |  | dsadsadsas', 1, '2016-09-01 18:37:49', '::1'),
(167, 'Active Module', '34 | Testimonial | 1', 1, '2016-09-01 18:38:49', '::1'),
(168, 'Add Quote', 'Quote |  | dsadsadsa', 1, '2016-09-01 18:41:14', '::1'),
(169, 'Add Quote', 'Quote |  | rrrrrrrrrrrrrrrrr', 1, '2016-09-01 18:41:30', '::1'),
(170, 'Login', 'superadmin | 1', 1, '2016-09-01 19:20:16', '::1'),
(171, 'Add Quote', 'Quote |  | dasdsa', 1, '2016-09-01 19:20:41', '::1'),
(172, 'Add Quote', 'Quote |  | dasdsa', 1, '2016-09-01 19:22:12', '::1'),
(173, 'Add Testimonial', 'Testimonial |  | dadsad dasdsadsa', 1, '2016-09-01 19:27:28', '::1'),
(174, 'Add Testimonial', 'Testimonial |  | dasdsadsa', 1, '2016-09-01 19:28:05', '::1'),
(175, 'Add Partner', 'Partner | PARTNERS | As a part of our business strategy, a partnership was strong recomended to build our business to be a global player supporting to each other. Established Trusting is our bussiness motto to build our collaboration. We offer products confirming to System Integration, thus facilitating our clients/ partners to globalize their applications. Our solutions of Automation Systems are advance enough to support the customer in building Process Control System &#40;PCS&#41; for Oil and Gas, Safety Instrumented System &#40;SIS/ESD/FGS&#41; and SCADA System also GasMetering System package.', 1, '2016-09-01 19:30:45', '::1'),
(176, 'Add Testimonial', 'Testimonial |  | &quot;ON BEHALF ON MANAGEMENT PT.CALEN TECHNOLOGY OUR COMMITMENT TO DELIVER EVERY SINGLE OF OUR PROJECT AND SERVICES FROM SMALL TO LARGE AND ALL ASSIGNMENT WITH HIGH STANDARD IN SAFETY AND QUALITY&quot;', 1, '2016-09-01 19:31:05', '::1'),
(177, 'Add Quote', 'Quote |  | PT. CALEB TECHNOLOGY is engaged in full range of All activities covering Engineering services for Commissioning phase, Engineering phase, Construction, both Skill and Labour and also we are capable for services, Opeartion Maintenance &amp; Supply material and spare part from the smallest up to the large project in all fields for Oil &amp; Gas, Power Generation, Chemical &amp; Petrochemical, Pulp &amp; Paper and Other Industrial.', 1, '2016-09-01 19:31:26', '::1'),
(178, 'Add ', '3 | ABB | /assets/file_upload/admin/images/Content/abb.jpg |   | ', 1, '2016-09-01 19:32:57', '::1'),
(179, 'Active ', '3 | ABB | 1', 1, '2016-09-01 19:33:01', '::1'),
(180, 'Add ', '4 | Autonica | /assets/file_upload/admin/images/Content/autronica.jpg |   | ', 1, '2016-09-01 19:33:25', '::1'),
(181, 'Active ', '4 | Autonica | 1', 1, '2016-09-01 19:33:33', '::1'),
(182, 'Edit ', '4 | Autonica | /assets/file_upload/admin/images/Content/autronica.jpg |  | ', 1, '2016-09-01 19:33:43', '::1'),
(183, 'Edit ', '2 | PT XYX | /assets/file_upload/admin/images/Content/construction1.jpg |  | dasdas', 1, '2016-09-01 19:57:13', '::1'),
(184, 'Edit ', '2 | PT XYX | /assets/file_upload/admin/images/Content/construction1.jpg |  | dasdas', 1, '2016-09-01 19:57:44', '::1'),
(185, 'Inactive ', '2 | PT XYX | 0', 1, '2016-09-01 19:59:24', '::1'),
(186, 'Active ', '2 | PT XYX | 1', 1, '2016-09-01 19:59:28', '::1'),
(187, 'Add ', '5 | asdsa dasdsad | /assets/file_upload/admin/images/Content/cameron.jpg |   | ', 1, '2016-09-01 20:02:21', '::1'),
(188, 'Active ', '5 | asdsa dasdsad | 1', 1, '2016-09-01 20:02:25', '::1'),
(189, 'Inactive ', '3 | ddddssd | 0', 1, '2016-09-01 20:16:39', '::1'),
(190, 'Active ', '3 | ddddssd | 1', 1, '2016-09-01 20:16:43', '::1'),
(191, 'Delete ', '3 | ddddssd', 1, '2016-09-01 20:21:23', '::1'),
(192, 'Delete ', '4 | ', 1, '2016-09-01 20:21:49', '::1'),
(193, 'Add ', '4 | dsadsadsadsa', 1, '2016-09-01 20:24:29', '::1'),
(194, 'Active ', '6 | dsadsadsa | 1', 1, '2016-09-01 20:24:41', '::1'),
(195, 'Active ', '5 | dsadsadsadsa | 1', 1, '2016-09-01 20:24:45', '::1'),
(196, 'Active ', '4 | dsadsadsadsa | 1', 1, '2016-09-01 20:24:57', '::1'),
(197, 'Inactive ', '4 | dsadsadsadsa | 0', 1, '2016-09-01 20:25:33', '::1'),
(198, 'Active ', '4 | dsadsadsadsa | 1', 1, '2016-09-01 20:26:30', '::1'),
(199, 'Add ', '5 | ddasdsadsa', 1, '2016-09-01 20:31:25', '::1'),
(200, 'Active ', '5 | ddasdsadsa | 1', 1, '2016-09-01 20:31:29', '::1'),
(201, 'Edit ', '5 | ddasdsadsa | /assets/file_upload/admin/images/Content/emerson.jpg', 1, '2016-09-01 20:31:55', '::1'),
(202, 'Edit ', '4 | dsadsadsadsa | /assets/file_upload/admin/images/Content/cameron.jpg', 1, '2016-09-01 20:32:08', '::1'),
(203, 'Edit ', '5 | ddasdsadsa | /assets/file_upload/admin/images/Content/abb.jpg', 1, '2016-09-01 20:35:23', '::1'),
(204, 'Edit ', '4 | dsadsadsadsa | /assets/file_upload/admin/images/Content/fisher.jpg', 1, '2016-09-01 20:35:52', '::1'),
(205, 'Delete Pages', '17 | 404', 1, '2016-09-01 20:39:32', '::1'),
(206, 'Login', 'superadmin | 1', 1, '2016-09-01 21:42:54', '::1'),
(207, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/Content/construction1.jpg | 1 | ', 1, '2016-09-01 21:45:44', '::1'),
(208, 'Inactive ', '1 | SONI TULUNGss | 0', 1, '2016-09-01 22:09:35', '::1'),
(209, 'Active ', '1 | SONI TULUNGss | 1', 1, '2016-09-01 22:11:47', '::1'),
(210, 'Inactive ', '2 | dadadsadsa | 0', 1, '2016-09-01 22:12:10', '::1'),
(211, 'Active ', '2 | dadadsadsa | 1', 1, '2016-09-01 22:12:14', '::1'),
(212, 'Inactive ', '2 | PT XYX | 0', 1, '2016-09-01 22:12:22', '::1'),
(213, 'Active ', '2 | PT XYX | 1', 1, '2016-09-01 22:12:25', '::1'),
(214, 'Inactive ', '5 | ddasdsadsa | 0', 1, '2016-09-01 23:03:31', '::1'),
(215, 'Active ', '5 | ddasdsadsa | 1', 1, '2016-09-01 23:03:36', '::1'),
(216, 'Inactive ', '5 | ddasdsadsa | 0', 1, '2016-09-01 23:05:18', '::1'),
(217, 'Active ', '5 | ddasdsadsa | 1', 1, '2016-09-01 23:05:24', '::1'),
(218, 'Login', 'superadmin | 1', 1, '2016-09-02 15:48:25', '::1'),
(219, 'Add Partner', 'Partner | PARTNERS | As a part of our business strategy, a partnership was strong recomended to build our business to be a global player supporting to each other. Established Trusting is our bussiness&amp;nbsp;', 1, '2016-09-02 15:48:39', '::1'),
(220, 'Add Quote', 'Quote |  | PT. CALEB TECHNOLOGY is engaged in full range of All activities covering Engineering services for Commissioning phase, Engineering phase, Construction, both Skill and Labour and also&amp;nbsp;', 1, '2016-09-02 15:48:49', '::1'),
(221, 'Add Testimonial', 'Testimonial |  | NAGEMENT PT.CALEN TECHNOLOGY OUR COMMITMENT TO DELIVER EVERY SINGLE OF OUR PROJECT AND SERVICES FROM SMALL TO LARGE AND ALL ASSIGNMENT WITH HIGH STANDARD&amp;nbsp;', 1, '2016-09-02 15:49:07', '::1'),
(222, 'Add Testimonial', 'Testimonial |  | NAGEMENT PT.CALEN TECHNOLOGY OUR COMMITMENT TO DELIVER EVERY SINGLE OF OUR PROJECT AND SERVICES FROM SMALL TO LARGE AND ALL ASSIGNMENT WITH HIGH STANDARD&amp;nbsp;', 1, '2016-09-02 16:18:06', '::1'),
(223, 'Add ', '6 | ddasadadsa | /assets/file_upload/admin/images/Content/honeywell.jpg |  dasdadsa | dadsad', 1, '2016-09-02 17:52:05', '::1'),
(224, 'Active ', '6 | ddasadadsa | 1', 1, '2016-09-02 17:52:10', '::1'),
(225, 'Add ', '3 | dasdsadsasa | dsadsadsadsa | dsadsadsadsadsa', 1, '2016-09-02 17:55:22', '::1'),
(226, 'Active ', '3 | dasdsadsasa | 1', 1, '2016-09-02 17:55:25', '::1'),
(227, 'Add ', '4 | dasda | dsadsa | dsadsa', 1, '2016-09-02 17:55:46', '::1'),
(228, 'Active ', '4 | dasda | 1', 1, '2016-09-02 17:55:49', '::1'),
(229, 'Add Banner', '17 | dasdsadsasssssssss | /assets/file_upload/admin/images/Content/1366x768-balkat-wallpaper.jpg | 1 | ', 1, '2016-09-02 18:09:48', '::1'),
(230, 'Active Banner', '17 | dasdsadsasssssssss | 1', 1, '2016-09-02 18:09:52', '::1'),
(231, 'Active ', '4 | dsadsadsa | 1', 1, '2016-09-02 20:38:37', '::1'),
(232, 'Inactive ', '7 | PROJECT &amp; SERVICE DIVISION | 0', 1, '2016-09-02 20:39:36', '::1'),
(233, 'Active ', '7 | PROJECT &amp; SERVICE DIVISION | 1', 1, '2016-09-02 20:39:39', '::1'),
(234, 'Add ', '9 | ENGINEERING &amp; SERVICE DIVISION |  | fafafsafsaf fsafafa |  | fafa | fdafa', 1, '2016-09-02 20:40:51', '::1'),
(235, 'Active ', '9 | ENGINEERING &amp; SERVICE DIVISION | 1', 1, '2016-09-02 20:40:56', '::1'),
(236, 'Edit ', '22 | dasdsadsa |  | content_title | /assets/file_upload/admin/images/Content/construction1.jpg | dasdsadsa | dasdsadas | dadsadsa', 1, '2016-09-02 20:51:16', '::1'),
(237, 'Inactive ', '7 | dasdsadsadsa | 0', 1, '2016-09-03 02:06:44', '::1'),
(238, 'Active ', '3 | dasddsa | 1', 1, '2016-09-03 02:07:35', '::1'),
(239, 'Inactive ', '3 | dasddsa | 0', 1, '2016-09-03 02:07:35', '::1'),
(240, 'Active ', '3 | dasddsa | 1', 1, '2016-09-03 02:07:49', '::1'),
(241, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | To support Project Division we also develop Material Supply Division to supply materials for internal project as well as material supply for operation and maintenance purpose. Currently we established partner with some vendor and manufacture for system and bulk material such Honeywell, Rockwell, ICS Triplex, Autronica, Omni, ABV-Velan, Etc.<br />\r\nThrough our experience in material and spare part supply for various Oil and Gas Industries such as Premier oil, Pearl Oil, Pertamina, ENI and more Oil and Gas Company and general industies we commit to serve our customer to kept their operation smoothly with effective cost. | /assets/file_upload/admin/images/Content/Capture.PNG | sdadadsa | dadadsadsa', 1, '2016-09-03 02:26:21', '::1'),
(242, 'Active ', '11 | dasdsadsadsa | 1', 1, '2016-09-03 02:42:43', '::1'),
(243, 'Active ', '10 | dasdsadsadsa | 1', 1, '2016-09-03 02:42:48', '::1'),
(244, 'Active ', '12 | dadsadsadsadsadsa | 1', 1, '2016-09-03 02:43:36', '::1'),
(245, 'Active ', '8 | dasdaasa | 1', 1, '2016-09-03 03:14:00', '::1'),
(246, 'Active ', '7 | dasdss | 1', 1, '2016-09-03 03:14:05', '::1'),
(247, 'Edit ', '5 | ddasdsadsa | /assets/file_upload/admin/images/Content/fisher.jpg', 1, '2016-09-03 03:45:11', '::1'),
(248, 'Edit ', '5 | ddasdsadsa | /assets/file_upload/admin/images/Content/fisher.jpg', 1, '2016-09-03 03:45:11', '::1'),
(249, 'Logout', 'superadmin | 1', 1, '2016-09-03 04:08:52', '::1'),
(250, 'Login', 'superadmin | 1', 1, '2016-09-03 18:46:41', '::1'),
(251, 'Add ', '3 | ffdfds | fdsfds | fdsfdsfdsfds | /assets/file_upload/admin/images/Content/teledyne.jpg | fdsfdsfds |  | ', 1, '2016-09-03 18:48:52', '::1'),
(252, 'Active ', '3 | ffdfds | 1', 1, '2016-09-03 18:48:56', '::1'),
(253, 'Inactive ', '2 | dadadsadsa | 0', 1, '2016-09-03 18:58:07', '::1'),
(254, 'Active ', '2 | dadadsadsa | 1', 1, '2016-09-03 18:58:40', '::1'),
(255, 'Add ', '4 | dasdadsa | dddsa | dsadsadsa | /assets/file_upload/admin/images/Content/sample3.jpg | dsasdada | dsad | dsadsa', 1, '2016-09-03 21:02:59', '::1'),
(256, 'Active ', '4 | dasdadsa | 1', 1, '2016-09-03 21:03:03', '::1'),
(257, 'Edit ', '2 | dadadsadsa | dadsadadadsa | ddaddsa | /assets/file_upload/admin/images/Content/sample2.jpg |  |  | ', 1, '2016-09-03 21:05:16', '::1'),
(258, 'Edit ', '3 | ffdfds | fdsfds | fdsfdsfdsfds | /assets/file_upload/admin/images/Content/sample1.jpg |  |  | ', 1, '2016-09-03 21:05:31', '::1'),
(259, 'Inactive ', '4 | dasdadsa | 0', 1, '2016-09-03 21:05:34', '::1'),
(260, 'Active ', '4 | dasdadsa | 1', 1, '2016-09-03 21:05:37', '::1'),
(261, 'Edit ', '2 | dadadsadsa | dadsadadadsa | ddaddsa | /assets/file_upload/admin/images/Content/sample2.jpg |  |  | ', 1, '2016-09-03 21:44:01', '::1'),
(262, 'Login', 'superadmin | 1', 1, '2016-09-05 01:02:07', '::1'),
(263, 'Edit ', '2 | dadadsadsa | dadsadadadsa | ddaddsa | /assets/file_upload/admin/images/Content/sample2.jpg |  |  | ', 1, '2016-09-05 02:37:09', '::1'),
(264, 'Edit ', '2 | dadadsadsa | dadsadadadsa | ddaddsa | /assets/file_upload/admin/images/Content/sample2.jpg |  |  | ', 1, '2016-09-05 02:37:49', '::1'),
(265, 'Edit ', '2 | dadadsadsa | dadsadadadsa | ddaddsa | /assets/file_upload/admin/images/Content/sample2.jpg | ddadasdas das |  | ', 1, '2016-09-05 02:47:40', '::1'),
(266, 'Edit ', '3 | ffdfds | fdsfds | fdsfdsfdsfds | /assets/file_upload/admin/images/Content/sample1.jpg | fafsa fafas |  | ', 1, '2016-09-05 02:48:28', '::1'),
(267, 'Login', 'superadmin | 1', 1, '2016-09-05 13:36:35', '::1'),
(268, 'Active Module Group', '13 | Training Management | 1', 1, '2016-09-05 14:57:30', '::1'),
(269, 'Active Module', '35 | Training | 1', 1, '2016-09-05 14:58:00', '::1'),
(270, 'Login', 'superadmin | 1', 1, '2016-09-07 15:37:03', '36.79.114.152'),
(271, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/Content/1366x768-balkat-wallpaper.jpg | 1 | ', 1, '2016-09-07 16:00:26', '36.79.114.152'),
(272, 'Add Quote', 'Quote |  | Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.', 1, '2016-09-07 16:05:54', '36.79.114.152'),
(273, 'Add Partner', 'Partner | PARTNERS | &amp;quot;Establishing trust to form strong collaboration between partners&amp;quot; is our business motto and thus we are proud to showcase a wide selection of products related to Systems Integration. We hope that in doing so, we could facilitate our partners in providing solutions in our projects.&lt;br /&gt;\r\n&lt;br /&gt;\r\nOur expertise &amp;amp; knowledge of Automation Systems made us more than capable in supporing our clients in the Oil &amp;amp; Gas Industry in building Process Control System &#40;PCS&#41;, Safety Instrumentation System &#40;SIS/ ESD/ FGS&#41;, SCADA System, and Gas Metering System.', 1, '2016-09-07 16:09:18', '36.79.114.152'),
(274, 'Add Partner', 'Partner | PARTNERS | &amp;quot;Establishing trust to form strong collaboration between partners&amp;quot; is our business motto and thus we are proud to showcase a wide selection of products related to Systems Integration. We hope that in doing so, we could facilitate our partners in providing solutions in our projects.&lt;br /&gt;\r\n&lt;br /&gt;\r\nOur expertise &amp;amp; knowledge of Automation Systems made us more than capable in supporing our clients in the Oil &amp;amp; Gas Industry in building Process Control System &#40;PCS&#41;, Safety Instrumentation System &#40;SIS/ ESD/ FGS&#41;, SCADA System, and Gas Metering System.', 1, '2016-09-07 16:09:21', '36.79.114.152'),
(275, 'Edit ', '1 | SONI TULUNGss | Managing Director | dssdadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-07 16:12:08', '36.79.114.152'),
(276, 'Edit ', '1 | M. RIFKI ASFARI | Managing Director | dssdadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-07 16:13:05', '36.79.114.152'),
(277, 'Edit ', '4 | GORGA SIMANULLANG | MANAGING DIRECTOR | dsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-07 16:13:22', '36.79.114.152'),
(278, 'Edit ', '3 | JOELIANTI DWI SUPRAPTININGSIH | dsadsadsadsa | dsadsadsadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-07 16:13:40', '36.79.114.152'),
(279, 'Edit ', '4 | GORGA SIMANULLANG | PRESIDENT DIRECTOR | dsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-07 16:18:40', '36.79.114.152'),
(280, 'Edit ', '3 | JOELIANTI DWI SUPRAPTININGSIH | COMMISSIONER | dsadsadsadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-07 16:18:50', '36.79.114.152'),
(281, 'Edit ', '1 | M. RIFKI ASFARI | Health & Safety Co-ordinator | dssdadsadsa | /assets/file_upload/admin/images/Content/contoh-pp.jpg |  |  | ', 1, '2016-09-07 16:19:08', '36.79.114.152'),
(282, 'Add ', '5 | Irfan Ichwan | Engineer | ', 1, '2016-09-07 16:20:06', '36.79.114.152'),
(283, 'Add ', '6 | Amy Syarfan | Engineer | ', 1, '2016-09-07 16:21:55', '36.79.114.152'),
(284, 'Add ', '7 | Febri Nugraha | Engineer | ', 1, '2016-09-07 16:22:13', '36.79.114.152'),
(285, 'Add ', '8 | Rahmat Adiwiryanto | Engineer | ', 1, '2016-09-07 16:22:26', '36.79.114.152'),
(286, 'Add ', '9 | Budi Oktaria Kamil | Engineer | ', 1, '2016-09-07 16:22:39', '36.79.114.152'),
(287, 'Add ', '10 | Deden Rahmat Hidayat | Engineer | ', 1, '2016-09-07 16:22:54', '36.79.114.152'),
(288, 'Add ', '11 | Dony Adibrata | Engineer | ', 1, '2016-09-07 16:23:06', '36.79.114.152'),
(289, 'Add ', '12 | Dede Surya Kusumah | Engineer | ', 1, '2016-09-07 16:23:28', '36.79.114.152'),
(290, 'Add ', '13 | Wargo Karestuono | Engineer | ', 1, '2016-09-07 16:23:42', '36.79.114.152'),
(291, 'Add ', '14 | Tri Yudo Harisasono | Engineer | ', 1, '2016-09-07 16:23:54', '36.79.114.152'),
(292, 'Add ', '15 | Jandri Hasibuan | Engineer | ', 1, '2016-09-07 16:24:08', '36.79.114.152'),
(293, 'Add ', '16 | Hadi Priyanto | Engineer | ', 1, '2016-09-07 16:24:31', '36.79.114.152'),
(294, 'Add ', '17 | Fremgky | Engineer | ', 1, '2016-09-07 16:24:41', '36.79.114.152'),
(295, 'Add ', '18 | Weriansyah Putra | Engineer | ', 1, '2016-09-07 16:24:51', '36.79.114.152'),
(296, 'Add ', '19 | Emos Arapenta Ginting | Engineer | ', 1, '2016-09-07 16:25:07', '36.79.114.152'),
(297, 'Add ', '20 | Sukadi | Engineer | ', 1, '2016-09-07 16:25:16', '36.79.114.152'),
(298, 'Add ', '21 | M.Rifki | Engineer | ', 1, '2016-09-07 16:25:26', '36.79.114.152'),
(299, 'Add ', '22 | Deki Joko Pratomo | Engineer | ', 1, '2016-09-07 16:25:39', '36.79.114.152'),
(300, 'Add ', '23 | Agus Muharam | Engineer | ', 1, '2016-09-07 16:25:52', '36.79.114.152'),
(301, 'Add ', '24 | Ardhi Sofyan Hilmi | Engineer | ', 1, '2016-09-07 16:26:06', '36.79.114.152'),
(302, 'Active ', '24 | Ardhi Sofyan Hilmi | 1', 1, '2016-09-07 16:26:11', '36.79.114.152'),
(303, 'Active ', '23 | Agus Muharam | 1', 1, '2016-09-07 16:26:13', '36.79.114.152'),
(304, 'Active ', '22 | Deki Joko Pratomo | 1', 1, '2016-09-07 16:26:15', '36.79.114.152'),
(305, 'Active ', '21 | M.Rifki | 1', 1, '2016-09-07 16:26:16', '36.79.114.152'),
(306, 'Active ', '20 | Sukadi | 1', 1, '2016-09-07 16:26:18', '36.79.114.152'),
(307, 'Active ', '19 | Emos Arapenta Ginting | 1', 1, '2016-09-07 16:26:20', '36.79.114.152'),
(308, 'Active ', '18 | Weriansyah Putra | 1', 1, '2016-09-07 16:26:22', '36.79.114.152'),
(309, 'Active ', '17 | Fremgky | 1', 1, '2016-09-07 16:26:25', '36.79.114.152'),
(310, 'Active ', '16 | Hadi Priyanto | 1', 1, '2016-09-07 16:26:27', '36.79.114.152'),
(311, 'Active ', '15 | Jandri Hasibuan | 1', 1, '2016-09-07 16:26:30', '36.79.114.152'),
(312, 'Active ', '14 | Tri Yudo Harisasono | 1', 1, '2016-09-07 16:26:42', '36.79.114.152'),
(313, 'Active ', '13 | Wargo Karestuono | 1', 1, '2016-09-07 16:26:48', '36.79.114.152'),
(314, 'Active ', '12 | Dede Surya Kusumah | 1', 1, '2016-09-07 16:26:53', '36.79.114.152'),
(315, 'Active ', '11 | Dony Adibrata | 1', 1, '2016-09-07 16:26:59', '36.79.114.152'),
(316, 'Active ', '10 | Deden Rahmat Hidayat | 1', 1, '2016-09-07 16:27:03', '36.79.114.152'),
(317, 'Active ', '9 | Budi Oktaria Kamil | 1', 1, '2016-09-07 16:27:08', '36.79.114.152'),
(318, 'Active ', '8 | Rahmat Adiwiryanto | 1', 1, '2016-09-07 16:27:23', '36.79.114.152'),
(319, 'Active ', '7 | Febri Nugraha | 1', 1, '2016-09-07 16:27:27', '36.79.114.152'),
(320, 'Active ', '6 | Amy Syarfan | 1', 1, '2016-09-07 16:27:30', '36.79.114.152'),
(321, 'Active ', '5 | Irfan Ichwan | 1', 1, '2016-09-07 16:27:33', '36.79.114.152'),
(322, 'Add Testimonial', 'Testimonial |  | &amp;quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&amp;quot;', 1, '2016-09-07 16:31:18', '36.79.114.152'),
(323, 'Add Testimonial', 'Testimonial |  | We are committed in serving our customers by keeping their operations running smoothly and cost effectively.', 1, '2016-09-07 16:31:49', '36.79.114.152'),
(324, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | To keep up with the constantly increasing demand from our Project Division, we have established partnerships with vendors, manufacturers of system and suppliers of bulk materials such as Honeywell, Rockwell, ICS Triplex, Autronica, Omni, ABV-Velan, and many more.<br />\r\n<br />\r\nWe hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operation and Maintenance of our clients which includes many in the OIl &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors. | /assets/file_upload/admin/images/Content/Capture.PNG | sdadadsa | dadadsadsa', 1, '2016-09-07 16:34:14', '36.79.114.152'),
(325, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | dsadsadsadsadasdsa | /assets/file_upload/admin/images/Content/construction1.jpg | ABC | ABC | ABC', 1, '2016-09-07 16:36:27', '36.79.114.152'),
(326, 'Active ', '18 | GAS, SMOKE, &amp; HEAT DETECTOR | 1', 1, '2016-09-07 16:54:31', '36.79.114.152'),
(327, 'Active ', '17 | CABLE GLAND , MCT &amp; ACCESSORIES | 1', 1, '2016-09-07 16:54:36', '36.79.114.152'),
(328, 'Active ', '13 | CONDUIT , FITTING &amp; ACCESSORIES | 1', 1, '2016-09-07 16:54:41', '36.79.114.152'),
(329, 'Active ', '14 | ENCLOSURE SYSTEM &amp; ACCESSORIES | 1', 1, '2016-09-07 16:54:48', '36.79.114.152'),
(330, 'Active ', '15 | CABLE TRAY &amp; ACCESSORIES | 1', 1, '2016-09-07 16:54:55', '36.79.114.152'),
(331, 'Active ', '16 | LIGHTING FIXTURES &amp; ACCESSORIES | 1', 1, '2016-09-07 16:55:02', '36.79.114.152'),
(332, 'Add ', '7 | PT ARSYNERGY RESOURCES |  |   | ', 1, '2016-09-07 17:00:05', '36.79.114.152'),
(333, 'Active ', '7 | PT ARSYNERGY RESOURCES | 1', 1, '2016-09-07 17:00:11', '36.79.114.152'),
(334, 'Edit ', '3 | LPG Plant Custody Transfer Orifice Gas Meter | fdsfds | Gas Metering Skid 3 Stream 8&quot; Pipeline, integrated with OMNI Flow Computer Panel and HMI Wonderware InTouch | /assets/file_upload/admin/images/Content/sample1.jpg | Bukit Tua, Gresik, Jawa Timur |  | ', 1, '2016-09-07 17:02:15', '36.79.114.152'),
(335, 'Edit ', '3 | LPG Plant Custody Transfer Orifice Gas Meter | LPG Plant Custody Transfer Orifice Gas Meter | Gas Metering Skid 3 Stream 8&quot; Pipeline, integrated with OMNI Flow Computer Panel and HMI Wonderware InTouch | /assets/file_upload/admin/images/Content/sample1.jpg | Bukit Tua, Gresik, Jawa Timur |  | ', 1, '2016-09-07 17:03:33', '36.79.114.152'),
(336, 'Delete ', '2 | PT XYX', 1, '2016-09-07 17:04:46', '36.79.114.152'),
(337, 'Add ', '8 | ENI MUARA BAKAU B.V |  |   | ', 1, '2016-09-07 17:05:09', '36.79.114.152'),
(338, 'Active ', '8 | ENI MUARA BAKAU B.V | 1', 1, '2016-09-07 17:05:14', '36.79.114.152'),
(339, 'Add ', '9 | PETRONAS CARIGALI SDN, BHD |  |   | ', 1, '2016-09-07 17:05:30', '36.79.114.152'),
(340, 'Add ', '10 | PT HOKASA MANDIRI |  |   | ', 1, '2016-09-07 17:05:50', '36.79.114.152'),
(341, 'Add ', '11 | BLT BROTOJOYO |  |   | ', 1, '2016-09-07 17:06:00', '36.79.114.152'),
(342, 'Edit ', '2 | Addressable Fire Detection System for Jangkrik Complex Project | Addressable Fire Detection System for Jangkrik Complex Project | Fire Addressable Detection Panel using Autronica Fire Alarm Controller Series BS-420 Certified SIL-2 integrated with Autronica Detector | /assets/file_upload/admin/images/Content/sample2.jpg | Jangkrik |  | ', 1, '2016-09-07 17:08:08', '36.79.114.152'),
(343, 'Add ', '5 | Fire Suppression Panel System &#40;FSPS&#41; | Fire Suppression Panel System (FSPS) | Fire Suppression Panel System using Advance ICS Triplex Rockwell |  | Dulang & Angsi, Malaysia |  | ', 1, '2016-09-07 17:15:32', '36.79.114.152'),
(344, 'Active ', '5 | Fire Suppression Panel System &#40;FSPS&#41; | 1', 1, '2016-09-07 17:15:36', '36.79.114.152'),
(345, 'Edit ', '22 | &quot;We ensure good results that are on-schedule and in-budget&quot; |  | content_title | /assets/file_upload/admin/images/Content/construction1.jpg | abcd | abcd | abcd', 1, '2016-09-07 17:19:08', '36.79.114.152'),
(346, 'Login', 'superadmin | 1', 1, '2016-09-07 17:21:07', '36.77.204.110'),
(347, 'Login', 'superadmin | 1', 1, '2016-09-07 18:19:51', '36.77.204.110'),
(348, 'Add Menu', '64 | Training |  | 0 | 0', 1, '2016-09-07 18:22:23', '36.77.204.110'),
(349, 'Add Menu', '65 | News |  | 0 | 0', 1, '2016-09-07 18:23:02', '36.77.204.110'),
(350, 'Active Menu', '64 | Training | 1', 1, '2016-09-07 18:23:09', '36.77.204.110'),
(351, 'Active Menu', '62 | About | 1', 1, '2016-09-07 18:23:15', '36.77.204.110'),
(352, 'Active Menu', '63 | Team | 1', 1, '2016-09-07 18:23:18', '36.77.204.110'),
(353, 'Active Menu', '65 | News | 1', 1, '2016-09-07 18:23:24', '36.77.204.110'),
(354, 'Inactive ', '1 | dasdsadssassssss | 0', 1, '2016-09-07 18:26:25', '36.77.204.110'),
(355, 'Active ', '1 | dasdsadssassssss | 1', 1, '2016-09-07 18:26:29', '36.77.204.110'),
(356, 'Add ', '24 | sadsadsa |  | dsadsa | /assets/file_upload/admin/images/Content/construction1.jpg |  |  | ', 1, '2016-09-07 18:26:49', '36.77.204.110'),
(357, 'Active ', '24 | sadsadsa | 1', 1, '2016-09-07 18:26:52', '36.77.204.110'),
(358, 'Add ', 'TrainingQuote | dasdasdddddddddddddddd ddddddddddddddd | dadsadsa ddddddddddddddddd dddddddddddd', 1, '2016-09-07 18:27:12', '36.77.204.110'),
(359, 'Edit ', '1 | dasdsadssassssss | dsad adsd dsa | d asd sa das | /assets/file_upload/admin/images/Content/sample5.jpg | dddddddddaain1sss | dsadasdsa | dsadddddddddd', 1, '2016-09-07 18:29:39', '36.77.204.110'),
(360, 'Delete ', '2 | test 2', 1, '2016-09-07 18:29:51', '36.77.204.110'),
(361, 'Delete ', '1 | dasdsadssassssss', 1, '2016-09-07 18:30:05', '36.77.204.110'),
(362, 'Add ', '3 | test event a | tets training | testsss | /assets/file_upload/admin/images/Content/sample4.jpg | test-training1 | dasd asd | das das das', 1, '2016-09-07 18:31:32', '36.77.204.110'),
(363, 'Active ', '3 | test event a | 1', 1, '2016-09-07 18:31:36', '36.77.204.110'),
(364, 'Inactive ', '1 | M. RIFKI ASFARI | 0', 1, '2016-09-07 18:39:04', '36.77.204.110'),
(365, 'Active ', '1 | M. RIFKI ASFARI | 1', 1, '2016-09-07 18:39:15', '36.77.204.110'),
(366, 'Edit ', '24 | Ardhi Sofyan Hilmi | Engineer | - |  |  |  | ', 1, '2016-09-07 18:40:48', '36.77.204.110'),
(367, 'Edit ', '24 | Ardhi Sofyan Hilmi | Engineer | - |  |  |  | ', 1, '2016-09-07 18:52:55', '36.77.204.110'),
(368, 'Login', 'superadmin | 1', 1, '2016-09-07 22:14:05', '139.193.247.59'),
(369, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/banner-home.jpg | 1 | ', 1, '2016-09-07 22:15:02', '139.193.247.59'),
(370, 'Inactive Banner', '16 | dassdasda | 0', 1, '2016-09-07 22:15:45', '139.193.247.59'),
(371, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | dsadsadsadsadasdsa | /assets/file_upload/admin/images/banner/banner-material.jpg | ABC | ABC | ABC', 1, '2016-09-07 22:17:02', '139.193.247.59'),
(372, 'Edit ', '4 | GORGA SIMANULLANG | PRESIDENT DIRECTOR | dsadsa | /assets/file_upload/admin/images/banner/caleb-gorga |  |  | ', 1, '2016-09-07 22:21:56', '139.193.247.59');
INSERT INTO `tbl_log_cms` (`log_id_cms`, `log_module`, `log_value`, `user_id`, `log_create_date`, `ip`) VALUES
(373, 'Edit ', '3 | JOELIANTI DWI SUPRAPTININGSIH | COMMISSIONER | dsadsadsadsadsa | /assets/file_upload/admin/images/banner/caleb-joelianti |  |  | ', 1, '2016-09-07 22:23:15', '139.193.247.59'),
(374, 'Edit ', '1 | M. RIFKI ASFARI | Health & Safety Co-ordinator | dssdadsadsa | /assets/file_upload/admin/images/banner/paspoto (1).jpg |  |  | ', 1, '2016-09-07 22:28:06', '139.193.247.59'),
(375, 'Edit ', '3 | LPG Plant Custody Transfer Orifice Gas Meter | LPG Plant Custody Transfer Orifice Gas Meter | Gas Metering Skid 3 Stream 8&quot; Pipeline, integrated with OMNI Flow Computer Panel and HMI Wonderware InTouch | /assets/file_upload/admin/images/Projects/WhatsApp Image 2016-08-05 at 9.01.54 PM (1).jpeg | Bukit Tua, Gresik, Jawa Timur |  | ', 1, '2016-09-07 22:35:00', '139.193.247.59'),
(376, 'Edit ', '24 | sadsadsa |  | dsadsa | /assets/file_upload/admin/images/banner/banner-training.jpg |  |  | ', 1, '2016-09-07 22:36:26', '139.193.247.59'),
(377, 'Edit ', '23 | dsadad |  | dsada | /assets/file_upload/admin/images/banner/banner-about.jpg |  |  | ', 1, '2016-09-07 22:37:40', '139.193.247.59'),
(378, 'Edit ', '23 | WE ARE COMMITTED IN DELIVERING ALL OF OUR PROJECTS BIG OR SMALL AT THE HIGHEST STANDARD IN SAFETY AND QUALITY |  | dsada | /assets/file_upload/admin/images/banner/banner-about.jpg |  |  | ', 1, '2016-09-07 22:39:25', '139.193.247.59'),
(379, 'Edit ', '8 | fdadsadsa |  | dadsadsadsa | /assets/file_upload/admin/images/banner/about-images01.jpg |  | ', 1, '2016-09-07 22:41:07', '139.193.247.59'),
(380, 'Edit ', '1 | Vision |  | To be a recognized Systems Integrator company in the region by focusing on our core business ofControl System &amp; Instrumentation,&nbsp;Fire &amp; Gas Alarm System,&nbsp;Gas Metering Package, and&nbsp;Power Plant Generation&nbsp;and provides value for our customers through improvements in their business performance.', 1, '2016-09-07 22:43:23', '139.193.247.59'),
(381, 'Edit ', '1 | Vision |  | To be a recognized Systems Integrator company in the region by focusing on our core business of Control System &amp; Instrumentation,&nbsp;Fire &amp; Gas Alarm System,&nbsp;Gas Metering Package, and&nbsp;Power Plant Generation&nbsp;and provides value for our customers through improvements in their business performance.', 1, '2016-09-07 22:43:34', '139.193.247.59'),
(382, 'Add ', '2 | MISSION |  | Imbuing all our operations with the motto of fair business practices,&nbsp;family values and high growth-high profitability', 1, '2016-09-07 22:44:22', '139.193.247.59'),
(383, 'Active ', '2 | MISSION | 1', 1, '2016-09-07 22:44:26', '139.193.247.59'),
(384, 'Edit ', '4 | GORGA SIMANULLANG | President Director | dsadsa | /assets/file_upload/admin/images/banner/caleb-gorga |  |  | ', 1, '2016-09-07 22:45:24', '139.193.247.59'),
(385, 'Edit ', '3 | JOELIANTI DWI SUPRAPTININGSIH | Commissioner | dsadsadsadsadsa | /assets/file_upload/admin/images/banner/caleb-joelianti |  |  | ', 1, '2016-09-07 22:45:45', '139.193.247.59'),
(386, 'Edit ', '1 | M. RIFKI ASFARI | Health & Safety Co-ordinator | Responsible to Develop, Maintain and Protect Health, Safety &amp; Environment Management System standards within company organisations in accordance with current Health And Safety Legislation. | /assets/file_upload/admin/images/banner/paspoto (1).jpg |  |  | ', 1, '2016-09-07 22:48:24', '139.193.247.59'),
(387, 'Edit ', '8 | fdadsadsa |  | Our services encompass the entire phases of a project from:\r\n<ul>\r\n	<li>COMMISSIONING</li>\r\n	<li>ENGINEERING</li>\r\n	<li>CONSTRUCTION</li>\r\n	<li>HIRING OF PROFESSIONALS</li>\r\n	<li>MAINTENANCE OPERATION</li>\r\n	<li>SUPPLY OF MATERIALS &amp; SPARE PARTS</li>\r\n</ul>\r\nIndustries that we have experience with\r\n\r\n<ul>\r\n	<li>OIL &amp; GAS,&nbsp;</li>\r\n	<li>POWER GENERATION,&nbsp;</li>\r\n	<li>CHEMICAL &amp; PETROCHEMICAL,&nbsp;</li>\r\n	<li>PULP &amp;&nbsp;PAPER</li>\r\n	<li>AND MANY OTHERS...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/about-images01.jpg |  | ', 1, '2016-09-07 22:52:33', '139.193.247.59'),
(388, 'Edit ', '5 | Fisher | /assets/file_upload/admin/images/Content/fisher.jpg', 1, '2016-09-07 22:55:42', '139.193.247.59'),
(389, 'Edit ', '4 | Cameron | /assets/file_upload/admin/images/Logos/cameron.jpg', 1, '2016-09-07 22:56:23', '139.193.247.59'),
(390, 'Active ', '24 |  | 1', 1, '2016-09-07 23:15:14', '139.193.247.59'),
(391, 'Edit ', '22 | &quot;We ensure good results that are on-schedule and in-budget&quot; |  | content_title | /assets/file_upload/admin/images/banner/training-image-detail.jpg | abcd | abcd | abcd', 1, '2016-09-07 23:16:45', '139.193.247.59'),
(392, 'Edit ', '7 | PROJECT &amp; SERVICE DIVISION | dasdsadadasdsadsa | Our division have successfully completed and delivered numerous projects that meets and exceeds our client&#39;s expectation. |  |  | ', 1, '2016-09-07 23:17:19', '139.193.247.59'),
(393, 'Login', 'superadmin | 1', 1, '2016-09-08 01:43:15', '112.215.65.208'),
(394, 'Active Module Group', '14 | Career Management | 1', 1, '2016-09-08 01:43:45', '112.215.65.208'),
(395, 'Login', 'superadmin | 1', 1, '2016-09-08 15:35:52', '159.253.145.183'),
(396, 'Edit ', '1 | dsadsa | dasdsadsa | sa | dsadsa--sadsadssadsa | dsadsadsadsa | dsadsadsadsa', 1, '2016-09-08 16:13:55', '112.215.152.48'),
(397, 'Edit ', '2 | ddasdasc2 | dsadsadsa | ddddddddddddddddddddddddddddddddd | ddasd---asc2 |  | ', 1, '2016-09-08 16:14:06', '112.215.152.48'),
(398, 'Delete ', '2 | ddasdasc2', 1, '2016-09-08 16:14:51', '112.215.152.48'),
(399, 'Delete ', '1 | dsadsa', 1, '2016-09-08 16:14:56', '112.215.152.48'),
(400, 'Add ', '3 | test career1 | test career1 | test career1 | testcareer1 | test career1 | test career1', 1, '2016-09-08 16:15:27', '112.215.152.48'),
(401, 'Active ', '3 | test career1 | 1', 1, '2016-09-08 16:15:30', '112.215.152.48'),
(402, 'Login', 'superadmin | 1', 1, '2016-09-11 20:37:51', '125.160.111.78'),
(403, 'Inactive Menu', '54 | Projects | 0', 1, '2016-09-11 20:38:00', '125.160.111.78'),
(404, 'Active Menu', '54 | Projects | 1', 1, '2016-09-11 20:38:02', '125.160.111.78'),
(405, 'Inactive Pages', '15 | FAQ | 0', 1, '2016-09-11 20:38:08', '125.160.111.78'),
(406, 'Active Pages', '15 | FAQ | 1', 1, '2016-09-11 20:38:10', '125.160.111.78'),
(407, 'Inactive Pages', '15 | FAQ | 0', 1, '2016-09-11 20:38:16', '125.160.111.78'),
(408, 'Active Pages', '15 | FAQ | 1', 1, '2016-09-11 20:38:18', '125.160.111.78'),
(409, 'Delete Pages', '13 | Careers', 1, '2016-09-11 20:38:22', '125.160.111.78'),
(410, 'Login', 'superadmin | 1', 1, '2016-09-12 00:04:51', '139.193.247.59'),
(411, 'Edit ', '5 | Fisher | /assets/file_upload/admin/images/Logos/fisher.png', 1, '2016-09-12 00:09:45', '139.193.247.59'),
(412, 'Edit ', '4 | Cameron | /assets/file_upload/admin/images/Logos/cameron.png', 1, '2016-09-12 00:09:56', '139.193.247.59'),
(413, 'Add ', '6 | ABB', 1, '2016-09-12 00:11:06', '139.193.247.59'),
(414, 'Add ', '7 | Autronica', 1, '2016-09-12 00:11:24', '139.193.247.59'),
(415, 'Add ', '8 | Emerson', 1, '2016-09-12 00:11:38', '139.193.247.59'),
(416, 'Active ', '6 | ABB | 1', 1, '2016-09-12 00:11:53', '139.193.247.59'),
(417, 'Active ', '7 | Autronica | 1', 1, '2016-09-12 00:11:55', '139.193.247.59'),
(418, 'Active ', '8 | Emerson | 1', 1, '2016-09-12 00:11:57', '139.193.247.59'),
(419, 'Add ', '9 | Honeywell', 1, '2016-09-12 00:12:42', '139.193.247.59'),
(420, 'Add ', '10 | ICS Triplex', 1, '2016-09-12 00:13:02', '139.193.247.59'),
(421, 'Add ', '11 | N-Line Valves', 1, '2016-09-12 00:13:20', '139.193.247.59'),
(422, 'Add ', '12 | Rockwell Automation', 1, '2016-09-12 00:13:35', '139.193.247.59'),
(423, 'Add ', '13 | Teledyne', 1, '2016-09-12 00:13:47', '139.193.247.59'),
(424, 'Add ', '14 | Velan', 1, '2016-09-12 00:13:59', '139.193.247.59'),
(425, 'Add ', '15 | Yokogawa', 1, '2016-09-12 00:14:12', '139.193.247.59'),
(426, 'Active ', '9 | Honeywell | 1', 1, '2016-09-12 00:14:16', '139.193.247.59'),
(427, 'Active ', '10 | ICS Triplex | 1', 1, '2016-09-12 00:14:19', '139.193.247.59'),
(428, 'Active ', '11 | N-Line Valves | 1', 1, '2016-09-12 00:14:22', '139.193.247.59'),
(429, 'Active ', '12 | Rockwell Automation | 1', 1, '2016-09-12 00:14:25', '139.193.247.59'),
(430, 'Active ', '14 | Velan | 1', 1, '2016-09-12 00:14:27', '139.193.247.59'),
(431, 'Active ', '13 | Teledyne | 1', 1, '2016-09-12 00:14:29', '139.193.247.59'),
(432, 'Edit ', '21 | dasdsadsadsadsadsadsa |  | dsadsadsadsadsadsadsa | /assets/file_upload/admin/images/banner/applyhere.jpg | dasdsa | dsadsadsa | dasdasd dasdsa', 1, '2016-09-12 01:30:01', '139.193.247.59'),
(433, 'Edit ', '21 | dasdsadsadsadsadsadsa |  | dsadsadsadsadsadsadsa | /assets/file_upload/admin/images/banner/carreer.jpg | dasdsa | dsadsadsa | dasdasd dasdsa', 1, '2016-09-12 01:33:30', '139.193.247.59'),
(434, 'Edit ', '21 | dasdsadsadsadsadsadsa |  | dsadsadsadsadsadsadsa | /assets/file_upload/admin/images/banner/banner-career.jpg | dasdsa | dsadsadsa | dasdasd dasdsa', 1, '2016-09-12 01:34:58', '139.193.247.59'),
(435, 'Login', 'superadmin | 1', 1, '2016-09-12 22:34:15', '139.193.247.59'),
(436, 'Edit ', '5 | Fisher | /assets/file_upload/admin/images/Logos/fisher.jpg', 1, '2016-09-12 22:46:57', '139.193.247.59'),
(437, 'Edit ', '14 | Velan | /assets/file_upload/admin/images/Logos/velan.jpg', 1, '2016-09-12 22:47:05', '139.193.247.59'),
(438, 'Edit ', '13 | Teledyne | /assets/file_upload/admin/images/Logos/teledyne.jpg', 1, '2016-09-12 22:47:13', '139.193.247.59'),
(439, 'Edit ', '12 | Rockwell Automation | /assets/file_upload/admin/images/Logos/rockwell.jpg', 1, '2016-09-12 22:47:21', '139.193.247.59'),
(440, 'Edit ', '11 | N-Line Valves | /assets/file_upload/admin/images/Logos/n-linevalves.jpg', 1, '2016-09-12 22:47:29', '139.193.247.59'),
(441, 'Edit ', '9 | Honeywell | /assets/file_upload/admin/images/Logos/honeywell.jpg', 1, '2016-09-12 22:48:36', '139.193.247.59'),
(442, 'Edit ', '8 | Emerson | /assets/file_upload/admin/images/Logos/emerson.jpg', 1, '2016-09-12 22:48:44', '139.193.247.59'),
(443, 'Edit ', '7 | Autronica | /assets/file_upload/admin/images/Logos/autronica.jpg', 1, '2016-09-12 22:48:51', '139.193.247.59'),
(444, 'Edit ', '6 | ABB | /assets/file_upload/admin/images/Logos/abb.jpg', 1, '2016-09-12 22:48:59', '139.193.247.59'),
(445, 'Edit ', '4 | Cameron | /assets/file_upload/admin/images/Logos/cameron.jpg', 1, '2016-09-12 22:49:41', '139.193.247.59'),
(446, 'Edit ', '15 | Yokogawa | /assets/file_upload/admin/images/Logos/yokogawa.jpg', 1, '2016-09-12 22:49:50', '139.193.247.59'),
(447, 'Active ', '15 | Yokogawa | 1', 1, '2016-09-12 22:49:55', '139.193.247.59'),
(448, 'Edit ', '1 | M. RIFKI ASFARI | Health & Safety Co-ordinator | Responsible to Develop, Maintain and Protect Health, Safety &amp; Environment Management System standards within company organisations in accordance with current Health And Safety Legislation. | /assets/file_upload/admin/images/Team/calebteam001.jpg |  |  | ', 1, '2016-09-12 22:50:52', '139.193.247.59'),
(449, 'Edit ', '3 | JOELIANTI DWI SUPRAPTININGSIH | Commissioner | dsadsadsadsadsa | /assets/file_upload/admin/images/Team/calebteam002.jpg |  |  | ', 1, '2016-09-12 22:51:02', '139.193.247.59'),
(450, 'Edit ', '4 | GORGA SIMANULLANG | President Director | dsadsa | /assets/file_upload/admin/images/Team/calebteam003.jpg |  |  | ', 1, '2016-09-12 22:51:12', '139.193.247.59'),
(451, 'Edit ', '8 | fdadsadsa |  | Our services encompass the entire phases of a project from:\r\n<ul>\r\n	<li>COMMISSIONING</li>\r\n	<li>ENGINEERING</li>\r\n	<li>CONSTRUCTION</li>\r\n	<li>HIRING OF PROFESSIONALS</li>\r\n	<li>MAINTENANCE OPERATION</li>\r\n	<li>SUPPLY OF MATERIALS &amp; SPARE PARTS</li>\r\n</ul>\r\nIndustries that we have experience with\r\n\r\n<ul>\r\n	<li>OIL &amp; GAS,&nbsp;</li>\r\n	<li>POWER GENERATION,&nbsp;</li>\r\n	<li>CHEMICAL &amp; PETROCHEMICAL,&nbsp;</li>\r\n	<li>PULP &amp;&nbsp;PAPER</li>\r\n	<li>AND MANY OTHERS...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2016-09-12 22:51:50', '139.193.247.59'),
(452, 'Login', 'superadmin | 1', 1, '2016-09-13 01:39:02', '125.160.108.241'),
(453, 'Add ', '25 | test news |  | --- | http://caleb.balkat.com/assets/file_upload/admin/images/banner/banner-career.jpg |  |  | ', 1, '2016-09-13 01:41:02', '125.160.108.241'),
(454, 'Active ', '25 | test news | 1', 1, '2016-09-13 01:41:07', '125.160.108.241'),
(455, 'Edit ', '25 | test news |  | --- | /assets/file_upload/admin/images/banner/training-image-detail.jpg |  |  | ', 1, '2016-09-13 01:41:56', '125.160.108.241'),
(456, 'Add ', '6 | test news1 | test | test222 | /assets/file_upload/admin/images/banner/banner-about.jpg | test22 | test22 | test22', 1, '2016-09-13 01:46:02', '125.160.108.241'),
(457, 'Active ', '6 | test news1 | 1', 1, '2016-09-13 01:46:06', '125.160.108.241'),
(458, 'Active Module Group', '15 | Material Management | 1', 1, '2016-09-13 01:55:15', '125.160.108.241'),
(459, 'Login', 'superadmin | 1', 1, '2016-09-13 12:47:26', '180.246.201.20'),
(460, 'Edit ', '10 | ICS Triplex | /assets/file_upload/admin/images/Logos/ics.jpg', 1, '2016-09-13 12:49:01', '180.246.201.20'),
(461, 'Inactive ', '10 | ICS Triplex | 0', 1, '2016-09-13 12:50:39', '180.246.201.20'),
(462, 'Active ', '10 | ICS Triplex | 1', 1, '2016-09-13 12:50:44', '180.246.201.20'),
(463, 'Login', 'superadmin | 1', 1, '2016-09-13 17:21:25', '125.160.98.233'),
(464, 'Active Module', '36 | Privacy_policy | 1', 1, '2016-09-13 17:21:57', '125.160.98.233'),
(465, 'Active Module', '37 | Faq | 1', 1, '2016-09-13 17:24:23', '125.160.98.233'),
(466, 'Add ', 'Privacy_policyQuote | Privacy policy Title | Privacy policy Title &amp;nbsp;:\r\n&lt;ul&gt;\r\n &lt;li&gt;test a&lt;/li&gt;\r\n &lt;li&gt;test b&lt;/li&gt;\r\n &lt;li&gt;test c&lt;/li&gt;\r\n&lt;/ul&gt;', 1, '2016-09-13 17:36:16', '125.160.98.233'),
(467, 'Add ', 'Privacy_policyQuote | Privacy policy Title | Privacy policy desc &amp;nbsp;:\r\n&lt;ul&gt;\r\n &lt;li&gt;test a&lt;/li&gt;\r\n &lt;li&gt;test b&lt;/li&gt;\r\n &lt;li&gt;test c&lt;/li&gt;\r\n&lt;/ul&gt;', 1, '2016-09-13 17:39:46', '125.160.98.233'),
(468, 'Add ', 'FaqQuote | dsadsa | &lt;span style=&quot;line-height: 20.8px;&quot;&gt;Faq desc &amp;nbsp;:&lt;/span&gt;\r\n&lt;ul style=&quot;line-height: 20.8px;&quot;&gt;\r\n &lt;li&gt;test a&lt;/li&gt;\r\n &lt;li&gt;test b&lt;/li&gt;\r\n &lt;li&gt;test c&lt;/li&gt;\r\n&lt;/ul&gt;', 1, '2016-09-13 17:40:01', '125.160.98.233'),
(469, 'Login', 'superadmin | 1', 1, '2016-09-15 20:53:49', '112.215.152.191'),
(470, 'Login', 'superadmin | 1', 1, '2016-09-16 18:38:29', '36.70.11.176'),
(471, 'Edit ', '21 | PT. Honeywell Indonesia | /assets/file_upload/admin/images/Content/honeywell.jpg |  | PT. Honeywell Indonesia', 1, '2016-09-16 18:43:32', '36.70.11.176'),
(472, 'Edit ', '13 | Pertamina (Persero) | /assets/file_upload/admin/images/Content/18-Logo-Pertamina.png |  | Pertamina (Persero)', 1, '2016-09-16 18:58:30', '36.70.11.176'),
(473, 'Edit ', '1 | PT. ADHI KARYA | /assets/file_upload/admin/images/Content/Adhikarya.jpg |  | PT. ADHI KARYA', 1, '2016-09-16 18:59:45', '36.70.11.176'),
(474, 'Edit ', '15 | PHE-WMO | /assets/file_upload/admin/images/Content/phewmo.png |  | PHE-WMO', 1, '2016-09-16 19:01:00', '36.70.11.176'),
(475, 'Edit ', '18 | Premier Oil | /assets/file_upload/admin/images/Content/Premier Oil.jpg |  | Premier Oil', 1, '2016-09-16 19:01:29', '36.70.11.176'),
(476, 'Edit ', '13 | Pertamina (Persero) | /assets/file_upload/admin/images/Content/Pertamina.png |  | Pertamina (Persero)', 1, '2016-09-16 19:03:39', '36.70.11.176'),
(477, 'Login', 'superadmin | 1', 1, '2016-09-17 22:42:06', '112.215.45.115'),
(478, 'Active Module', '38 | Contact | 1', 1, '2016-09-17 22:42:49', '112.215.45.115'),
(479, 'Inactive ', '3 | Office | 0', 1, '2016-09-17 22:48:20', '112.215.45.115'),
(480, 'Active ', '3 | Office | 1', 1, '2016-09-17 22:48:23', '112.215.45.115'),
(481, 'Logout', 'superadmin | 1', 1, '2016-09-17 22:52:55', '112.215.45.115'),
(482, 'Login', 'superadmin | 1', 1, '2016-09-19 14:36:04', '36.70.11.176'),
(483, 'Edit ', '3 | test event a | tets training | testsss | /assets/file_upload/admin/images/Content/sample4.jpg | test-training1 | dasd asd | das das das', 1, '2016-09-19 14:37:09', '36.70.11.176'),
(484, 'Inactive ', '3 | test event a | 0', 1, '2016-09-19 14:53:29', '36.70.11.176'),
(485, 'Active ', '3 | test event a | 1', 1, '2016-09-19 14:53:32', '36.70.11.176'),
(486, 'Logout', 'superadmin | 1', 1, '2016-09-19 15:11:19', '36.70.11.176'),
(487, 'Login', 'superadmin | 1', 1, '2016-09-20 06:43:08', '125.161.125.209'),
(488, 'Login', 'superadmin | 1', 1, '2016-09-20 06:52:53', '125.161.125.209'),
(489, 'Edit ', '3 | Sales/ Marketing | Mr. Djoko Puji Riyanto | djoko@caleb-technology.com | +62 896 2962 9565', 1, '2016-09-20 06:55:18', '125.161.125.209'),
(490, 'Edit ', '4 | PROJECT &amp; SERVICE | Mr. Febri Nugraha | febri@caleb-technology.com | +62 812 8001 1772', 1, '2016-09-20 06:56:03', '125.161.125.209'),
(491, 'Edit ', '2 | ENGINEERING &amp; SERVICE | Mrs. Erni Permanasari | admin@caleb-technology.com | +62 818 0812 1332', 1, '2016-09-20 06:57:00', '125.161.125.209'),
(492, 'Add ', '5 | PROCUREMENT &amp; MATERIAL SUPPORT | Mrs. Anisa Fitria Lestari |  +62 812 8433 1121 | ', 1, '2016-09-20 06:57:37', '125.161.125.209'),
(493, 'Add ', '6 | POWER PLANT DIVISION | Mr. Simon Dedi Haryadi |  +62 811 1871 871 | ', 1, '2016-09-20 06:58:20', '125.161.125.209'),
(494, 'Add ', '7 | HSE &amp; BUSINESS DEVELOPMENT | Mr. Muhammad Rifki Asfari |  +62 821 1005 7474 | ', 1, '2016-09-20 06:58:53', '125.161.125.209'),
(495, 'Active ', '5 | PROCUREMENT &amp; MATERIAL SUPPORT | 1', 1, '2016-09-20 06:59:12', '125.161.125.209'),
(496, 'Active ', '6 | POWER PLANT DIVISION | 1', 1, '2016-09-20 06:59:14', '125.161.125.209'),
(497, 'Active ', '7 | HSE &amp; BUSINESS DEVELOPMENT | 1', 1, '2016-09-20 06:59:17', '125.161.125.209'),
(498, 'Edit ', '3 | SALES &amp; MARKETING | Mr. Djoko Puji Riyanto | djoko@caleb-technology.com | +62 896 2962 9565', 1, '2016-09-20 06:59:33', '125.161.125.209'),
(499, 'Login', 'superadmin | 1', 1, '2016-09-20 07:09:30', '125.161.125.209'),
(500, 'Login', 'superadmin | 1', 1, '2016-09-20 07:13:43', '125.161.125.209'),
(501, 'Login', 'superadmin | 1', 1, '2016-09-20 07:14:24', '125.161.125.209'),
(502, 'Login', 'superadmin | 1', 1, '2016-09-20 07:16:04', '125.161.125.209'),
(503, 'Login', 'superadmin | 1', 1, '2016-09-20 07:17:37', '125.161.125.209'),
(504, 'Login', 'superadmin | 1', 1, '2016-09-20 07:20:45', '125.161.125.209'),
(505, 'Login', 'superadmin | 1', 1, '2016-09-20 07:39:30', '125.161.125.209'),
(506, 'Login', 'superadmin | 1', 1, '2016-09-20 13:49:40', '125.161.125.209'),
(507, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/home-0001.jpg | 1 | ', 1, '2016-09-20 13:51:26', '125.161.125.209'),
(508, 'Login', 'superadmin | 1', 1, '2016-09-20 13:53:43', '125.161.125.209'),
(509, 'Inactive ', '3 | SALES &amp; MARKETING | 0', 1, '2016-09-20 13:54:13', '125.161.125.209'),
(510, 'Active ', '3 | SALES &amp; MARKETING | 1', 1, '2016-09-20 13:54:15', '125.161.125.209'),
(511, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/homebanner01.jpg | 1 | ', 1, '2016-09-20 13:58:28', '125.161.125.209'),
(512, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/banner/homebanner001.jpg | 1 | ', 1, '2016-09-20 14:00:57', '125.161.125.209'),
(513, 'Active Banner', '16 | dassdasda | 1', 1, '2016-09-20 14:01:01', '125.161.125.209'),
(514, 'Inactive Banner', '17 | BANNER 1 | 0', 1, '2016-09-20 14:03:49', '125.161.125.209'),
(515, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/banner/1920x1080.jpg | 1 | ', 1, '2016-09-20 14:08:48', '125.161.125.209'),
(516, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/banner/1920x1080.jpg | 1 | ', 1, '2016-09-20 14:11:08', '125.161.125.209'),
(517, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/banner/1920x1080.jpg | 1 | ', 1, '2016-09-20 14:12:09', '125.161.125.209'),
(518, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/banner/1920x1080.jpg | 1 | ', 1, '2016-09-20 14:13:04', '125.161.125.209'),
(519, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/hb02.jpg | 1 | ', 1, '2016-09-20 14:17:50', '125.161.125.209'),
(520, 'Active Banner', '17 | BANNER 1 | 1', 1, '2016-09-20 14:17:53', '125.161.125.209'),
(521, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/hb02.jpg | 1 | ', 1, '2016-09-20 14:19:54', '125.161.125.209'),
(522, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/hb02.jpg | 1 | ', 1, '2016-09-20 14:20:27', '125.161.125.209'),
(523, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/hb02.jpg | 1 | ', 1, '2016-09-20 14:20:59', '125.161.125.209'),
(524, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/hb02.jpg | 1 | ', 1, '2016-09-20 14:21:33', '125.161.125.209'),
(525, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/banner/1920x1080.jpg | 1 | ', 1, '2016-09-20 14:22:06', '125.161.125.209'),
(526, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/banner/1920x1080.jpg | 1 | ', 1, '2016-09-20 14:23:21', '125.161.125.209'),
(527, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | &nbsp; | /assets/file_upload/admin/images/banner/banner-material.jpg | ABC | ABC | ABC', 1, '2016-09-20 14:37:37', '125.161.125.209'),
(528, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; | /assets/file_upload/admin/images/banner/banner-material.jpg | ABC | ABC | ABC', 1, '2016-09-20 14:38:55', '125.161.125.209'),
(529, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | <span style=\"font-size:32px;\">We are committed in serving our customers<br />\r\nby keeping their operations running<br />\r\nsmoothlyand cost effectively</span> | /assets/file_upload/admin/images/banner/banner-material.jpg | ABC | ABC | ABC', 1, '2016-09-20 14:40:25', '125.161.125.209'),
(530, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | <span style=\"font-size:26px;\">We are committed in serving our customers<br />\r\nby keeping their operations running<br />\r\nsmoothlyand cost effectively</span> | /assets/file_upload/admin/images/banner/banner-material.jpg | ABC | ABC | ABC', 1, '2016-09-20 14:40:52', '125.161.125.209'),
(531, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | <span style=\"font-size:26px;\">We are committed in serving our customers<br />\r\nby keeping their operations running<br />\r\nsmoothlyand cost effectively</span> | /assets/file_upload/admin/images/banner/material-b.jpg | ABC | ABC | ABC', 1, '2016-09-20 14:49:21', '125.161.125.209'),
(532, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | <span style=\"font-size:26px;\">We are committed in serving our customers<br />\r\nby keeping their operations running<br />\r\nsmoothlyand cost effectively</span> | /assets/file_upload/admin/images/banner/MATERIAL.jpg | ABC | ABC | ABC', 1, '2016-09-20 14:52:23', '125.161.125.209'),
(533, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  | <span style=\"font-size:26px;\">We are committed in serving our customers<br />\r\nby keeping their operations running<br />\r\nsmoothlyand cost effectively</span> | /assets/file_upload/admin/images/banner/1366X300.jpg | ABC | ABC | ABC', 1, '2016-09-20 14:54:03', '125.161.125.209'),
(534, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  |  | /assets/file_upload/admin/images/banner/1366X300.jpg | ABC | ABC | ABC', 1, '2016-09-20 14:54:59', '125.161.125.209'),
(535, 'Edit ', '23 | WE ARE COMMITTED IN DELIVERING ALL OF OUR PROJECTS BIG OR SMALL AT THE HIGHEST STANDARD IN SAFETY AND QUALITY |  | dsada | /assets/file_upload/admin/images/banner/about.jpg |  |  | ', 1, '2016-09-20 15:16:12', '125.161.125.209'),
(536, 'Edit ', '23 | WE ARE COMMITTED IN DELIVERING ALL OF OUR PROJECTS BIG OR SMALL AT THE HIGHEST STANDARD IN SAFETY AND QUALITY |  |  | /assets/file_upload/admin/images/banner/about.jpg |  |  | ', 1, '2016-09-20 15:16:26', '125.161.125.209'),
(537, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/home003.jpg | 1 | ', 1, '2016-09-20 15:20:00', '125.161.125.209'),
(538, 'Edit ', '23 | WE ARE COMMITTED IN DELIVERING ALL OF OUR PROJECTS BIG OR SMALL AT THE HIGHEST STANDARD IN SAFETY AND QUALITY |  |  | /assets/file_upload/admin/images/banner/about001.jpg |  |  | ', 1, '2016-09-20 15:24:08', '125.161.125.209'),
(539, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  |  | /assets/file_upload/admin/images/banner/370px-materiual.jpg | ABC | ABC | ABC', 1, '2016-09-20 15:28:07', '125.161.125.209'),
(540, 'Active ', '25 |  | 1', 1, '2016-09-20 15:34:03', '125.161.125.209'),
(541, 'Active ', '26 |  | 1', 1, '2016-09-20 15:34:54', '125.161.125.209'),
(542, 'Edit ', '77 | Commissioning Works | Commissioning Works | Commissioning Works |  | Balikpapan |  | ', 1, '2016-09-20 15:41:28', '125.161.125.209'),
(543, 'Inactive ', '1 | E&I Work for Gajah Baru (GBCPP) Condensate Storage Vessel & Transfer Pumps | 0', 1, '2016-09-20 15:42:05', '125.161.125.209'),
(544, 'Active ', '1 | E&I Work for Gajah Baru (GBCPP) Condensate Storage Vessel & Transfer Pumps | 1', 1, '2016-09-20 15:42:08', '125.161.125.209'),
(545, 'Edit ', '22 | &quot;We ensure good results that are on-schedule and in-budget&quot; |  |  | /assets/file_upload/admin/images/banner/service002.jpg | abcd | abcd | abcd', 1, '2016-09-20 15:49:32', '125.161.125.209'),
(546, 'Edit ', '21 | Content Title |  |  | /assets/file_upload/admin/images/banner/banner-career.jpg | dasdsa | dsadsadsa | dasdasd dasdsa', 1, '2016-09-20 16:03:40', '125.161.125.209'),
(547, 'Add ', '4 | Training DCS Experion LXC300 |  | <strong>FASILITAS</strong>\r\n<ul>\r\n	<li>Sertifikat</li>\r\n	<li>Training Kit</li>\r\n	<li>Snack</li>\r\n</ul>\r\n<strong>WAKTU &amp; TEMPAT</strong><br />\r\nSenin, 29/08/16 - Jumat, 02/09/16<br />\r\n09.00 - 16.00<br />\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143<br />\r\n+6221 29572257<br />\r\n<br />\r\nREGISTRASI BY EMAIL\r\n<ol>\r\n	<li>NAMA LENGKAP</li>\r\n	<li>ALAMAT LENGKAP</li>\r\n	<li>NOMOR TELP</li>\r\n	<li>ASAL KAMPUS</li>\r\n	<li>CV TERBARU</li>\r\n</ol>\r\n<br />\r\n&nbsp; | /assets/file_upload/admin/images/Content/1474361924964.jpg | training-dcs-experion-lxc300 |  | ', 1, '2016-09-20 16:12:02', '125.161.125.209'),
(548, 'Active ', '4 | Training DCS Experion LXC300 | 1', 1, '2016-09-20 16:12:05', '125.161.125.209'),
(549, 'Edit ', '65 | LPG Plant Custody Transfer Orifice Gas Meter | test | Bukit Tua LPG Plant ? Custody Transfer Orifice Gas Meter | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474363486702.jpg | Bukit Tua |  | ', 1, '2016-09-20 16:26:50', '125.161.125.209'),
(550, 'Edit ', '56 | Upgrade PLC HIMA | Upgrade PLC HIMA | Upgrade PLC HIMA | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364006153.jpg | FPSO Brotojoyo |  | ', 1, '2016-09-20 16:35:17', '125.161.125.209'),
(551, 'Edit ', '56 | Upgrade PLC HIMA | Upgrade PLC HIMA | Upgrade PLC HIMA | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364269673.jpg | FPSO Brotojoyo |  | ', 1, '2016-09-20 16:39:28', '125.161.125.209'),
(552, 'Edit ', '65 | LPG Plant Custody Transfer Orifice Gas Meter | test | Bukit Tua LPG Plant ? Custody Transfer Orifice Gas Meter | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364269637.jpg | Bukit Tua |  | ', 1, '2016-09-20 16:40:02', '125.161.125.209'),
(553, 'Edit ', '24 | content-title |  |  | /assets/file_upload/admin/images/banner/trainingaaa.jpg |  |  | ', 1, '2016-09-20 16:50:36', '125.161.125.209'),
(554, 'Login', 'superadmin | 1', 1, '2016-09-20 21:37:42', '36.70.2.7'),
(555, 'Login', 'superadmin | 1', 1, '2016-09-20 21:42:05', '111.95.135.134'),
(556, 'Edit ', '4 | Training DCS Experion LXC300 |  | <h1><strong>FASILITAS</strong></h1>\r\n\r\n<ul>\r\n	<li>Sertifikat</li>\r\n	<li>Training Kit</li>\r\n	<li>Snack</li>\r\n</ul>\r\n\r\n<h1><br />\r\n<strong>WAKTU &amp; TEMPAT</strong></h1>\r\nSenin, 29/08/16 - Jumat, 02/09/16<br />\r\n09.00 - 16.00<br />\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143<br />\r\n+6221 29572257<br />\r\n<br />\r\nREGISTRASI BY EMAIL\r\n<ol>\r\n	<li>NAMA LENGKAP</li>\r\n	<li>ALAMAT LENGKAP</li>\r\n	<li>NOMOR TELP</li>\r\n	<li>ASAL KAMPUS</li>\r\n	<li>CV TERBARU</li>\r\n</ol>\r\n<br />\r\n&nbsp; | /assets/file_upload/admin/images/Content/1474361924964.jpg | training-dcs-experion-lxc300 |  | ', 1, '2016-09-20 21:42:35', '111.95.135.134'),
(557, 'Edit ', '4 | Training DCS Experion LXC300 |  | <h2><strong>FASILITAS</strong></h2>\r\n\r\n<ul>\r\n	<li>Sertifikat</li>\r\n	<li>Training Kit</li>\r\n	<li>Snack</li>\r\n</ul>\r\n&nbsp;\r\n\r\n<h2><strong>WAKTU &amp; TEMPAT</strong></h2>\r\nSenin, 29/08/16 - Jumat, 02/09/16<br />\r\n09.00 - 16.00<br />\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143<br />\r\n+6221 29572257<br />\r\n<br />\r\nREGISTRASI BY EMAIL\r\n<ol>\r\n	<li>NAMA LENGKAP</li>\r\n	<li>ALAMAT LENGKAP</li>\r\n	<li>NOMOR TELP</li>\r\n	<li>ASAL KAMPUS</li>\r\n	<li>CV TERBARU</li>\r\n</ol>\r\n<br />\r\n&nbsp; | /assets/file_upload/admin/images/Content/1474361924964.jpg | training-dcs-experion-lxc300 |  | ', 1, '2016-09-20 21:43:03', '111.95.135.134'),
(558, 'Edit ', '4 | Training DCS Experion LXC300 |  | <h3><strong>FASILITAS</strong></h3>\r\n\r\n<ul>\r\n	<li>Sertifikat</li>\r\n	<li>Training Kit</li>\r\n	<li>Snack</li>\r\n</ul>\r\n&nbsp;\r\n\r\n<h3><strong>WAKTU &amp; TEMPAT</strong></h3>\r\nSenin, 29/08/16 - Jumat, 02/09/16<br />\r\n09.00 - 16.00<br />\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143<br />\r\n+6221 29572257<br />\r\n<br />\r\nREGISTRASI BY EMAIL\r\n<ol>\r\n	<li>NAMA LENGKAP</li>\r\n	<li>ALAMAT LENGKAP</li>\r\n	<li>NOMOR TELP</li>\r\n	<li>ASAL KAMPUS</li>\r\n	<li>CV TERBARU</li>\r\n</ol>\r\n<br />\r\n&nbsp; | /assets/file_upload/admin/images/Content/1474361924964.jpg | training-dcs-experion-lxc300 |  | ', 1, '2016-09-20 21:43:27', '111.95.135.134'),
(559, 'Add ', '79 | Fire Suppression System Upgrade | Fire Suppression System | desc | /assets/file_upload/admin/images/Projects/1474364570728.jpg | Malaysia |  | ', 1, '2016-09-20 21:50:09', '111.95.135.134'),
(560, 'Active ', '79 | Fire Suppression System Upgrade | 1', 1, '2016-09-20 21:50:13', '111.95.135.134'),
(561, 'Add ', '80 | Addressable Fire Detection System | Addressable Fire Detection System | test | /assets/file_upload/admin/images/Projects/1474364502405.jpg | Jangkrik |  | ', 1, '2016-09-20 21:52:58', '111.95.135.134'),
(562, 'Active ', '80 | Addressable Fire Detection System | 1', 1, '2016-09-20 21:53:02', '111.95.135.134'),
(563, 'Edit ', '65 | LPG Plant Custody Transfer Orifice Gas Meter | test | Gas Metering Skid 3 Stream 8&quot; Pipeline integrated with Omni Flow Computer Panel and HMI Wonderware Intouch | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364269637.jpg | Bukit Tua |  | ', 1, '2016-09-20 21:56:46', '111.95.135.134'),
(564, 'Edit ', '79 | Fire Suppression System Upgrade | Fire Suppression System | Fire Suppression Panel System using Aadvance ICS Triplex Rockwell | /assets/file_upload/admin/images/Projects/1474364570728.jpg | Tapis-Dulang-Angsi, Malaysia |  | ', 1, '2016-09-20 21:59:49', '111.95.135.134'),
(565, 'Edit ', '80 | Addressable Fire Detection System | Addressable Fire Detection System | Fire Addressable Detection Panel using Autronica Fire Alarm Controller Series BS-420 Certified SIL-2 integrated with Autronica Detector | /assets/file_upload/admin/images/Projects/1474364502405.jpg | Jangkrik |  | ', 1, '2016-09-20 22:01:04', '111.95.135.134'),
(566, 'Edit ', '56 | Upgrade PLC HIMA | Upgrade PLC HIMA | Upgrade PLC HIMA on Fire and Gas and ESD System Brotojoyo | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364269673.jpg | Brotojoyo Vessel |  | ', 1, '2016-09-20 22:01:59', '111.95.135.134'),
(567, 'Edit ', '56 | FPSO Brotojoyo Fire Gas and ESD System | Upgrade PLC HIMA | Upgrade PLC HIMA on Fire and Gas and ESD System Brotojoyo | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364269673.jpg | Brotojoyo Vessel |  | ', 1, '2016-09-20 22:03:59', '111.95.135.134'),
(568, 'Edit ', '79 | Fire Suppression Panel System &#40;FSPS&#41; | Fire Suppression System | Fire Suppression Panel System using Aadvance ICS Triplex Rockwell | /assets/file_upload/admin/images/Projects/1474364570728.jpg | Tapis-Dulang-Angsi, Malaysia |  | ', 1, '2016-09-20 22:04:47', '111.95.135.134'),
(569, 'Login', 'superadmin | 1', 1, '2016-09-21 08:53:31', '182.253.163.12'),
(570, 'Edit ', '21 | Content Title |  |  | /assets/file_upload/admin/images/banner/career-caleb.jpg | dasdsa | dsadsadsa | dasdasd dasdsa', 1, '2016-09-21 08:54:15', '182.253.163.12'),
(571, 'Edit ', '21 | Content Title |  |  | /assets/file_upload/admin/images/banner/career-caleb.jpg | dasdsa | Lowongan pekerjaan PT Caleb Technology | job, career, teamwork, work, salary, positive', 1, '2016-09-21 09:02:36', '182.253.163.12'),
(572, 'Add ', 'CareerQuote | Career with Caleb Technology | We offers you the opportunity to join us and expand the talent, professionalism and experience in the Mechanical Electrical industry.', 1, '2016-09-21 09:05:16', '182.253.163.12'),
(573, 'Login', 'superadmin | 1', 1, '2016-09-21 15:09:40', '125.161.125.209'),
(574, 'Edit ', '2 | ENGINEERING &amp; SERVICE | Mrs. Erni Permanasari | admin@caleb-technology.com | +62 813 1287 8823', 1, '2016-09-21 15:10:25', '125.161.125.209'),
(575, 'Login', 'superadmin | 1', 1, '2016-09-22 14:42:42', '182.253.163.14'),
(576, 'Login', 'superadmin | 1', 1, '2016-09-22 15:12:12', '125.161.125.209'),
(577, 'Edit ', '14 | Velan | /assets/file_upload/admin/images/Logos/velan.png', 1, '2016-09-22 15:19:09', '125.161.125.209'),
(578, 'Edit ', '13 | Teledyne | /assets/file_upload/admin/images/Logos/teledyne.png', 1, '2016-09-22 15:19:27', '125.161.125.209'),
(579, 'Edit ', '12 | Rockwell Automation | /assets/file_upload/admin/images/Logos/rockwell.png', 1, '2016-09-22 15:19:40', '125.161.125.209'),
(580, 'Edit ', '11 | N-Line Valves | /assets/file_upload/admin/images/Logos/nline.png', 1, '2016-09-22 15:20:00', '125.161.125.209'),
(581, 'Edit ', '10 | ICS Triplex | /assets/file_upload/admin/images/Logos/ics.png', 1, '2016-09-22 15:20:18', '125.161.125.209'),
(582, 'Edit ', '8 | Emerson | /assets/file_upload/admin/images/Logos/emerson.png', 1, '2016-09-22 15:20:46', '125.161.125.209'),
(583, 'Edit ', '9 | Honeywell | /assets/file_upload/admin/images/Logos/honeywell.png', 1, '2016-09-22 15:21:03', '125.161.125.209'),
(584, 'Edit ', '7 | Autronica | /assets/file_upload/admin/images/Logos/autronika.png', 1, '2016-09-22 15:21:19', '125.161.125.209'),
(585, 'Edit ', '6 | ABB | /assets/file_upload/admin/images/Logos/ABB.png', 1, '2016-09-22 15:21:32', '125.161.125.209'),
(586, 'Edit ', '4 | Cameron | /assets/file_upload/admin/images/Logos/cameron.png', 1, '2016-09-22 15:22:09', '125.161.125.209'),
(587, 'Edit ', '15 | Yokogawa | /assets/file_upload/admin/images/Logos/yokogawa.png', 1, '2016-09-22 15:22:25', '125.161.125.209'),
(588, 'Add ', '16 | Premier oil', 1, '2016-09-22 15:25:12', '125.161.125.209'),
(589, 'Active ', '16 | Premier oil | 1', 1, '2016-09-22 15:25:20', '125.161.125.209'),
(590, 'Edit ', '5 | Adhi Karya | /assets/file_upload/admin/images/Logos/AK.png', 1, '2016-09-22 15:26:08', '125.161.125.209'),
(591, 'Inactive ', '5 | Adhi Karya | 0', 1, '2016-09-22 15:27:00', '125.161.125.209'),
(592, 'Active ', '5 | Adhi Karya | 1', 1, '2016-09-22 15:27:05', '125.161.125.209'),
(593, 'Add ', '17 | Ametek', 1, '2016-09-22 15:28:17', '125.161.125.209'),
(594, 'Add ', '18 | Conoco Phillips', 1, '2016-09-22 15:28:58', '125.161.125.209'),
(595, 'Add ', '19 | Dwisolar', 1, '2016-09-22 15:29:29', '125.161.125.209'),
(596, 'Active ', '17 | Ametek | 1', 1, '2016-09-22 15:29:36', '125.161.125.209'),
(597, 'Active ', '18 | Conoco Phillips | 1', 1, '2016-09-22 15:29:43', '125.161.125.209'),
(598, 'Active ', '19 | Dwisolar | 1', 1, '2016-09-22 15:29:51', '125.161.125.209'),
(599, 'Add ', '20 | PHE WMO', 1, '2016-09-22 15:38:49', '125.161.125.209'),
(600, 'Add ', '21 | Azbil', 1, '2016-09-22 15:39:56', '125.161.125.209'),
(601, 'Add ', '22 | Rockwel lab', 1, '2016-09-22 15:40:30', '125.161.125.209'),
(602, 'Add ', '23 | Pearl', 1, '2016-09-22 15:41:45', '125.161.125.209'),
(603, 'Active ', '22 | Rockwel lab | 1', 1, '2016-09-22 15:41:51', '125.161.125.209'),
(604, 'Active ', '21 | Azbil | 1', 1, '2016-09-22 15:41:54', '125.161.125.209'),
(605, 'Active ', '20 | PHE WMO | 1', 1, '2016-09-22 15:41:57', '125.161.125.209'),
(606, 'Active ', '23 | Pearl | 1', 1, '2016-09-22 15:42:03', '125.161.125.209'),
(607, 'Edit ', '1 | PT. ADHI KARYA | /assets/file_upload/admin/images/Logos/AK.png |  | PT. ADHI KARYA', 1, '2016-09-22 15:43:08', '125.161.125.209'),
(608, 'Edit ', '15 | PHE-WMO | /assets/file_upload/admin/images/Logos/phewmo.png |  | PHE-WMO', 1, '2016-09-22 15:43:24', '125.161.125.209'),
(609, 'Edit ', '18 | Premier Oil | /assets/file_upload/admin/images/Logos/premieroil.png |  | Premier Oil', 1, '2016-09-22 15:43:38', '125.161.125.209'),
(610, 'Edit ', '21 | PT. Honeywell Indonesia | /assets/file_upload/admin/images/Logos/honeywell.png |  | PT. Honeywell Indonesia', 1, '2016-09-22 15:43:54', '125.161.125.209'),
(611, 'Edit ', '12 | Pearl Oil | /assets/file_upload/admin/images/Logos/pearl.png |  | Pearl Oil', 1, '2016-09-22 15:44:12', '125.161.125.209'),
(612, 'Edit ', '6 | Dwisolar Sdn Bhd | /assets/file_upload/admin/images/Logos/dwisolar.png |  | Dwisolar Sdn Bhd', 1, '2016-09-22 15:44:47', '125.161.125.209'),
(613, 'Edit ', '13 | Pertamina (Persero) |  |  | Pertamina (Persero)', 1, '2016-09-22 15:44:58', '125.161.125.209'),
(614, 'Login', 'superadmin | 1', 1, '2016-09-23 11:44:26', '125.161.125.209'),
(615, 'Add Quote', 'Quote |  | Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.&lt;br /&gt;\r\nWe Offer Product, System, Process and Technology Designed for Oil &amp;amp; gas Industry, Power Plant, and Automation Industry.', 1, '2016-09-23 11:46:07', '125.161.125.209'),
(616, 'Add Quote', 'Quote |  | Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.&lt;br /&gt;\r\n&lt;br /&gt;\r\nWe Offer Product, System, Process and Technology Designed for Oil &amp;amp; gas Industry, Power Plant, and Automation Industry.', 1, '2016-09-23 11:46:17', '125.161.125.209'),
(617, 'Add Quote', 'Quote |  | Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.&amp;nbsp;We Offer Product, System, Process and Technology Designed for Oil &amp;amp; gas Industry, Power Plant, and Automation Industry.', 1, '2016-09-23 11:46:34', '125.161.125.209'),
(618, 'Add Quote', 'Quote |  | Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.&amp;nbsp;We Offer Product, System, Process and Technology Designed for Oil &amp;amp; gas Industry, Power Plant, and Automation Industry.', 1, '2016-09-23 11:47:15', '125.161.125.209'),
(619, 'Add Quote', 'Quote |  | Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients. We Offer Product, System, Process and Technology Designed for Oil &amp;amp; gas Industry, Power Plant, and Automation Industry.', 1, '2016-09-23 11:47:29', '125.161.125.209'),
(620, 'Add Quote', 'Quote |  | Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients. &lt;br&gt; We Offer Product, System, Process and Technology Designed for Oil &amp; gas Industry, Power Plant, and Automation Industry.', 1, '2016-09-23 11:47:59', '125.161.125.209'),
(621, 'Add Quote', 'Quote |  | Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.', 1, '2016-09-23 11:48:20', '125.161.125.209'),
(622, 'Edit ', '8 | About CALEB |  | Our services encompass the entire phases of a project from:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Ssupply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries that we have experience with\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2016-09-23 11:50:38', '125.161.125.209'),
(623, 'Edit ', '4 | GORGA SIMANULLANG | President Director | Experienced in Oil &amp; Gas and others Industries more than 20 years, Bachelor Degree from ISTN Majoring in Electronics Engineering Physics , Diploma engineering from Polytechnic&ndash;ITB | /assets/file_upload/admin/images/Team/calebteam003.jpg |  |  | ', 1, '2016-09-23 11:53:49', '125.161.125.209'),
(624, 'Edit ', '3 | JOELIANTI DWI SUPRAPTININGSIH | Commissioner | Having lot of experience in Financial Management, also working part time as Lecturer in more University in Jakarta | /assets/file_upload/admin/images/Team/calebteam002.jpg |  |  | ', 1, '2016-09-23 11:54:35', '125.161.125.209'),
(625, 'Edit ', '1 | M. RIFKI ASFARI | Health & Safety Co-ordinator | Experienced in Safety Management System and Business Development more than 2 years. | /assets/file_upload/admin/images/Team/calebteam001.jpg |  |  | ', 1, '2016-09-23 11:54:59', '125.161.125.209'),
(626, 'Edit ', '24 | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources |  |  | /assets/file_upload/admin/images/banner/trainingaaa.jpg |  |  | ', 1, '2016-09-23 13:42:30', '125.161.125.209'),
(627, 'Edit ', '9 | ENGINEERING &amp; SERVICE DIVISION |  | Some Commissioning Job and Engineering Design has been Accomplished. Fully Staff by Engineering Team with Huge Experience in System Control Such as Honeywell Experion PKS, Experion LX, C300, Safety Manager/ Fail Safe Controller, Networking, Hardware Engineer, Software Engineer, Drafter as well as Project Management |  | fafa | fdafa', 1, '2016-09-23 13:44:52', '125.161.125.209'),
(628, 'Edit ', '7 | PROJECT &amp; SERVICE DIVISION | dasdsadadasdsadsa | Our division have successfully completed and delivered numerous projects that meets and exceeds our client&#39;s expectation.<br />\r\nWe provide the right mix of services to help increase productivity, optimize plant assets and improve financial &nbsp;performance across your enterprise<br />\r\nYou can rely on our team to provide a full scope of capabilities to deliver the solutions and services you need now and in the future<br />\r\n&nbsp; |  |  | ', 1, '2016-09-23 13:45:25', '125.161.125.209'),
(629, 'Add ', 'FaqQuote | FREQUENTLY ASKED QUESTIONS (FAQ) | &lt;strong&gt;What is PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nPT Caleb Technology is a company that focusing in System integrator to integrated Instrument System and PCS/ Process Control System, SIS Safety Instrumented System, SCADA System, Metering Package and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Whai is the main business of PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nOur main business are Control System &amp;amp; Instrumentation, Fire and Gas Alarm System, Gas Metering Package, and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is PT Caleb Technology capabalities?&lt;/strong&gt;&lt;br /&gt;\r\nOur capabilities are developing an integrated system for FGS (Fire and Gas System), PCS (Process Control System), SIS (Safety Instrumented System), SCADA System, Metering Package and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;How to make partnership with PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nYou can contact us on the Contact Us Page to make partnership with us.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Who Should I contact to business?&lt;/strong&gt;&lt;br /&gt;\r\nIf you are interested in establishing business with us on the Contact Us page there is also the contact person for each Department Manager who can be contacted directly that might be relevant on your business scope.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is PT Caleb Technology Product?&lt;/strong&gt;&lt;br /&gt;\r\nWe offer products confirming to System Integration, thus facilitating our clients to globalize their applications for Oil and Gas industrial, Power Plant &amp;amp; Automation including design, installation and services after sales.', 1, '2016-09-23 13:58:30', '125.161.125.209'),
(630, 'Add ', 'FaqQuote | FREQUENTLY ASKED QUESTIONS (FAQ) | &lt;ul&gt;\r\n &lt;li&gt;&lt;strong&gt;What is PT Caleb Technology?&lt;/strong&gt;&lt;/li&gt;\r\n&lt;/ul&gt;\r\nPT Caleb Technology is a company that focusing in System integrator to integrated Instrument System and PCS/ Process Control System, SIS Safety Instrumented System, SCADA System, Metering Package and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Whai is the main business of PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nOur main business are Control System &amp;amp; Instrumentation, Fire and Gas Alarm System, Gas Metering Package, and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is PT Caleb Technology capabalities?&lt;/strong&gt;&lt;br /&gt;\r\nOur capabilities are developing an integrated system for FGS (Fire and Gas System), PCS (Process Control System), SIS (Safety Instrumented System), SCADA System, Metering Package and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;How to make partnership with PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nYou can contact us on the Contact Us Page to make partnership with us.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Who Should I contact to business?&lt;/strong&gt;&lt;br /&gt;\r\nIf you are interested in establishing business with us on the Contact Us page there is also the contact person for each Department Manager who can be contacted directly that might be relevant on your business scope.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is PT Caleb Technology Product?&lt;/strong&gt;&lt;br /&gt;\r\nWe offer products confirming to System Integration, thus facilitating our clients to globalize their applications for Oil and Gas industrial, Power Plant &amp;amp; Automation including design, installation and services after sales.', 1, '2016-09-23 13:59:29', '125.161.125.209');
INSERT INTO `tbl_log_cms` (`log_id_cms`, `log_module`, `log_value`, `user_id`, `log_create_date`, `ip`) VALUES
(631, 'Add ', 'FaqQuote | FREQUENTLY ASKED QUESTIONS (FAQ) | &lt;strong&gt;What is PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nPT Caleb Technology is a company that focusing in System integrator to integrated Instrument System and PCS/ Process Control System, SIS Safety Instrumented System, SCADA System, Metering Package and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Whai is the main business of PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nOur main business are Control System &amp;amp; Instrumentation, Fire and Gas Alarm System, Gas Metering Package, and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is PT Caleb Technology capabalities?&lt;/strong&gt;&lt;br /&gt;\r\nOur capabilities are developing an integrated system for FGS (Fire and Gas System), PCS (Process Control System), SIS (Safety Instrumented System), SCADA System, Metering Package and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;How to make partnership with PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nYou can contact us on the Contact Us Page to make partnership with us.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Who Should I contact to business?&lt;/strong&gt;&lt;br /&gt;\r\nIf you are interested in establishing business with us on the Contact Us page there is also the contact person for each Department Manager who can be contacted directly that might be relevant on your business scope.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is PT Caleb Technology Product?&lt;/strong&gt;&lt;br /&gt;\r\nWe offer products confirming to System Integration, thus facilitating our clients to globalize their applications for Oil and Gas industrial, Power Plant &amp;amp; Automation including design, installation and services after sales.', 1, '2016-09-23 13:59:43', '125.161.125.209'),
(632, 'Login', 'superadmin | 1', 1, '2016-09-23 16:22:54', '125.161.125.209'),
(633, 'Login', 'superadmin | 1', 1, '2016-09-27 16:12:22', '182.253.163.14'),
(634, 'Add Banner', '18 | PROFISIONAL | /assets/file_upload/admin/images/banner/homecaleb.jpg | 1 | ', 1, '2016-09-27 16:15:47', '182.253.163.14'),
(635, 'Active Banner', '18 | PROFISIONAL | 1', 1, '2016-09-27 16:15:53', '182.253.163.14'),
(636, 'Edit ', '80 | Addressable Fire Detection System | Addressable Fire Detection System | Fire Addressable Detection Panel using Autronica Fire Alarm Controller Series BS-420 Certified SIL-2 integrated with Autronica Detector | /assets/file_upload/admin/images/banner/Addressable-Fire-Detection-SystemAddressable-Fire-Detection-System.jpg | Jangkrik |  | ', 1, '2016-09-27 22:26:27', '182.253.163.14'),
(637, 'Edit ', '79 | Fire Suppression Panel System &#40;FSPS&#41; | Fire Suppression System | Fire Suppression Panel System using Aadvance ICS Triplex Rockwell | /assets/file_upload/admin/images/banner/Fire-Suppresion-Panel-System.jpg | Tapis-Dulang-Angsi, Malaysia |  | ', 1, '2016-09-27 22:27:01', '182.253.163.14'),
(638, 'Edit ', '65 | LPG Plant Custody Transfer Orifice Gas Meter | test | Gas Metering Skid 3 Stream 8&quot; Pipeline integrated with Omni Flow Computer Panel and HMI Wonderware Intouch | /assets/file_upload/admin/images/banner/LPG-Plant-Custody-Transfer.jpg | Bukit Tua |  | ', 1, '2016-09-27 22:27:20', '182.253.163.14'),
(639, 'Login', 'superadmin | 1', 1, '2016-09-28 15:08:44', '182.253.163.7'),
(640, 'Login', 'superadmin | 1', 1, '2016-09-29 00:34:26', '112.215.170.212'),
(641, 'Active Module', '39 | Latest_training | 1', 1, '2016-09-29 01:40:12', '112.215.152.32'),
(642, 'Add ', '26 | material 2 |  | material 2 | /assets/file_upload/admin/images/banner/banner-home.jpg |  |  | ', 1, '2016-09-29 02:43:21', '112.215.152.32'),
(643, 'Active ', '26 | material 2 | 1', 1, '2016-09-29 02:43:25', '112.215.152.32'),
(644, 'Inactive ', '26 | material 2 | 0', 1, '2016-09-29 02:46:00', '112.215.152.32'),
(645, 'Active ', '26 | material 2 | 1', 1, '2016-09-29 02:46:39', '112.215.152.32'),
(646, 'Logout', 'superadmin | 1', 1, '2016-09-29 02:49:46', '112.215.152.32'),
(647, 'Login', 'superadmin | 1', 1, '2016-09-29 14:54:41', '180.246.201.128'),
(648, 'Edit ', '5 | Adhi Karya | /assets/file_upload/admin/images/Logos/AK.png', 1, '2016-09-29 15:02:01', '180.246.201.128'),
(649, 'Delete ', '15 | Yokogawa', 1, '2016-09-29 15:03:09', '180.246.201.128'),
(650, 'Edit ', '22 | Rockwel lab | /assets/file_upload/admin/images/Logos/rockwell.png', 1, '2016-09-29 15:03:32', '180.246.201.128'),
(651, 'Delete ', '21 | Azbil', 1, '2016-09-29 15:03:44', '180.246.201.128'),
(652, 'Edit ', '19 | Dwisolar | /assets/file_upload/admin/images/Logos/dwisolar.png', 1, '2016-09-29 15:04:00', '180.246.201.128'),
(653, 'Edit ', '20 | PHE WMO | /assets/file_upload/admin/images/Logos/phewmo.png', 1, '2016-09-29 15:04:27', '180.246.201.128'),
(654, 'Delete ', '18 | Conoco Phillips', 1, '2016-09-29 15:04:44', '180.246.201.128'),
(655, 'Edit ', '16 | Premier oil | /assets/file_upload/admin/images/Logos/premieroil.png', 1, '2016-09-29 15:05:10', '180.246.201.128'),
(656, 'Delete ', '13 | Teledyne', 1, '2016-09-29 15:05:21', '180.246.201.128'),
(657, 'Delete ', '10 | ICS Triplex', 1, '2016-09-29 15:05:32', '180.246.201.128'),
(658, 'Edit ', '9 | Honeywell | /assets/file_upload/admin/images/Logos/honeywell.png', 1, '2016-09-29 15:05:52', '180.246.201.128'),
(659, 'Delete ', '11 | N-Line Valves', 1, '2016-09-29 15:06:02', '180.246.201.128'),
(660, 'Delete ', '17 | Ametek', 1, '2016-09-29 15:06:11', '180.246.201.128'),
(661, 'Edit ', '23 | Pearl | /assets/file_upload/admin/images/Logos/pearl.png', 1, '2016-09-29 15:06:29', '180.246.201.128'),
(662, 'Delete ', '14 | Velan', 1, '2016-09-29 15:06:36', '180.246.201.128'),
(663, 'Delete ', '8 | Emerson', 1, '2016-09-29 15:06:45', '180.246.201.128'),
(664, 'Delete ', '7 | Autronica', 1, '2016-09-29 15:06:56', '180.246.201.128'),
(665, 'Delete ', '6 | ABB', 1, '2016-09-29 15:07:06', '180.246.201.128'),
(666, 'Delete ', '4 | Cameron', 1, '2016-09-29 15:07:15', '180.246.201.128'),
(667, 'Delete ', '8 | ', 1, '2016-09-29 15:07:47', '180.246.201.128'),
(668, 'Delete ', '7 | ', 1, '2016-09-29 15:07:52', '180.246.201.128'),
(669, 'Add ', '24 | Autronica', 1, '2016-09-29 15:11:13', '180.246.201.128'),
(670, 'Active ', '24 | Autronica | 1', 1, '2016-09-29 15:11:22', '180.246.201.128'),
(671, 'Add ', '25 | N-Line Valves', 1, '2016-09-29 15:11:57', '180.246.201.128'),
(672, 'Active ', '25 | N-Line Valves | 1', 1, '2016-09-29 15:12:05', '180.246.201.128'),
(673, 'Add ', '26 | Velan', 1, '2016-09-29 15:12:27', '180.246.201.128'),
(674, 'Active ', '26 | Velan | 1', 1, '2016-09-29 15:12:35', '180.246.201.128'),
(675, 'Login', 'superadmin | 1', 1, '2016-09-29 16:48:13', '180.246.201.128'),
(676, 'Add ', '1 | training 1 | /assets/file_upload/admin/images/Logos/AK.png |   | ', 1, '2016-09-29 16:48:55', '180.246.201.128'),
(677, 'Add ', '2 | training 2 | /assets/file_upload/admin/images/Logos/autronika.png |   | ', 1, '2016-09-29 16:49:09', '180.246.201.128'),
(678, 'Add ', '3 | training 3 | /assets/file_upload/admin/images/Logos/dwisolar.png |   | ', 1, '2016-09-29 16:49:21', '180.246.201.128'),
(679, 'Add ', '4 | training 4 | /assets/file_upload/admin/images/Logos/honeywell.png |   | ', 1, '2016-09-29 16:49:34', '180.246.201.128'),
(680, 'Add ', '5 | training 5 | /assets/file_upload/admin/images/Logos/nline.png |   | ', 1, '2016-09-29 16:49:47', '180.246.201.128'),
(681, 'Active ', '1 | training 1 | 1', 1, '2016-09-29 16:49:50', '180.246.201.128'),
(682, 'Active ', '3 | training 3 | 1', 1, '2016-09-29 16:49:52', '180.246.201.128'),
(683, 'Active ', '2 | training 2 | 1', 1, '2016-09-29 16:49:53', '180.246.201.128'),
(684, 'Active ', '4 | training 4 | 1', 1, '2016-09-29 16:49:56', '180.246.201.128'),
(685, 'Active ', '5 | training 5 | 1', 1, '2016-09-29 16:49:59', '180.246.201.128'),
(686, 'Login', 'superadmin | 1', 1, '2016-10-01 10:35:05', '182.253.163.12'),
(687, 'Delete ', '5 | training 5', 1, '2016-10-01 10:35:15', '182.253.163.12'),
(688, 'Edit ', '1 | training 1 | /assets/file_upload/admin/images/Content/training01.jpg |  | ', 1, '2016-10-01 10:35:35', '182.253.163.12'),
(689, 'Edit ', '2 | training 2 | /assets/file_upload/admin/images/Content/training02.jpg |  | ', 1, '2016-10-01 10:35:43', '182.253.163.12'),
(690, 'Edit ', '3 | training 3 | /assets/file_upload/admin/images/Content/training03.jpg |  | ', 1, '2016-10-01 10:35:56', '182.253.163.12'),
(691, 'Edit ', '4 | training 4 | /assets/file_upload/admin/images/Content/training04.jpg |  | ', 1, '2016-10-01 10:36:05', '182.253.163.12'),
(692, 'Login', 'superadmin | 1', 1, '2016-10-07 07:13:45', '36.79.98.16'),
(693, 'Add ', 'material_head_quote | Material Head Quote Here', 1, '2016-10-07 07:14:39', '36.79.98.16'),
(694, 'Add ', 'About_head_quote | NEWS Head Quote Here', 1, '2016-10-07 07:15:24', '36.79.98.16'),
(695, 'Add ', 'About_head_quote | Training Head Quote Here', 1, '2016-10-07 07:15:39', '36.79.98.16'),
(696, 'Add ', 'TrainingQuote | Still Awaiting Content | Still Awaiting Content', 1, '2016-10-07 07:16:09', '36.79.98.16'),
(697, 'Add ', 'About_head_quote | Careers Head Content Here', 1, '2016-10-07 07:16:46', '36.79.98.16'),
(698, 'Add ', 'About_head_quote | Service Head Quote Here', 1, '2016-10-07 07:24:57', '36.79.98.16'),
(699, 'Logout', 'superadmin | 1', 1, '2016-10-07 08:40:10', '36.79.98.16'),
(700, 'Login', 'superadmin | 1', 1, '2016-10-11 07:27:19', '36.79.123.64'),
(701, 'Add ', 'About_head_quote | About Header Quote', 1, '2016-10-11 07:27:43', '36.79.123.64'),
(702, 'Logout', 'superadmin | 1', 1, '2016-10-11 07:27:50', '36.79.123.64'),
(703, 'Login', 'superadmin | 1', 1, '2016-10-14 03:10:31', '182.253.163.7'),
(704, 'Edit Banner', '18 | PROFESIONAL | /assets/file_upload/admin/images/banner/hb-caleb1.jpg | 1 | ', 1, '2016-10-14 03:13:58', '182.253.163.7'),
(705, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/hb-caleb2.jpg | 1 | ', 1, '2016-10-14 03:14:24', '182.253.163.7'),
(706, 'Edit Banner', '16 | dassdasda | /assets/file_upload/admin/images/banner/hb-caleb3.jpg | 1 | ', 1, '2016-10-14 03:14:34', '182.253.163.7'),
(707, 'Edit Banner', '18 | PROFESIONAL | /assets/file_upload/admin/images/banner/hb-caleb1.jpg | 1 | ', 1, '2016-10-14 03:15:24', '182.253.163.7'),
(708, 'Edit Banner', '18 | PROFESIONAL | /assets/file_upload/admin/images/banner/hb-caleb1.jpg | 1 | ', 1, '2016-10-14 03:17:10', '182.253.163.7'),
(709, 'Edit Banner', '18 | PROFESIONAL | /assets/file_upload/admin/images/banner/hb-caleb1.jpg | 1 | ', 1, '2016-10-14 03:21:28', '182.253.163.7'),
(710, 'Edit Banner', '18 | PROFESIONAL | /assets/file_upload/admin/images/banner/hb-caleb1.jpg | 1 | ', 1, '2016-10-14 03:22:30', '182.253.163.7'),
(711, 'Edit Banner', '18 | PROFESIONAL | /assets/file_upload/admin/images/banner/hb-caleb1.jpg | 1 | ', 1, '2016-10-14 03:22:47', '182.253.163.7'),
(712, 'Edit ', '26 | material 2 |  | material 2 | /assets/file_upload/admin/images/banner/material-caleb1.jpg |  |  | ', 1, '2016-10-14 04:48:03', '182.253.163.7'),
(713, 'Edit ', '26 | material 2 |  |  | /assets/file_upload/admin/images/banner/mat-caleb-1 |  |  | ', 1, '2016-10-14 04:50:06', '182.253.163.7'),
(714, 'Add ', '27 | material 3 |  |  | /assets/file_upload/admin/images/banner/material02.jpg |  |  | ', 1, '2016-10-14 05:08:48', '182.253.163.7'),
(715, 'Active ', '27 | material 3 | 1', 1, '2016-10-14 05:08:55', '182.253.163.7'),
(716, 'Login', 'superadmin | 1', 1, '2016-10-21 04:48:57', '36.79.96.35'),
(717, 'Login', 'superadmin | 1', 1, '2016-10-21 04:48:57', '36.79.96.35'),
(718, 'Edit Banner', '16 | HomeBanner | /assets/file_upload/admin/images/banner/hb-caleb3.jpg | 1 | ', 1, '2016-10-21 04:53:28', '36.79.96.35'),
(719, 'Inactive Banner', '18 | PROFESIONAL | 0', 1, '2016-10-21 04:53:40', '36.79.96.35'),
(720, 'Inactive Banner', '17 | BANNER 1 | 0', 1, '2016-10-21 04:53:47', '36.79.96.35'),
(721, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-10-21 05:07:58', '36.79.96.35'),
(722, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-10-21 05:11:11', '36.79.96.35'),
(723, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-10-21 05:20:44', '36.79.96.35'),
(724, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-10-21 05:21:12', '36.79.96.35'),
(725, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-10-21 05:21:54', '36.79.96.35'),
(726, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-10-21 05:22:24', '36.79.96.35'),
(727, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:40:35', '36.79.96.35'),
(728, 'Edit Banner', '17 | BANNER 1 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:40:52', '36.79.96.35'),
(729, 'Active Banner', '17 | BANNER 1 | 1', 1, '2016-10-21 05:40:57', '36.79.96.35'),
(730, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:41:11', '36.79.96.35'),
(731, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:41:54', '36.79.96.35'),
(732, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:42:27', '36.79.96.35'),
(733, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-10-21 05:42:45', '36.79.96.35'),
(734, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:42:59', '36.79.96.35'),
(735, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-10-21 05:44:05', '36.79.96.35'),
(736, 'Active Banner', '18 | Homebanner 03 | 1', 1, '2016-10-21 05:44:10', '36.79.96.35'),
(737, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-10-21 05:44:51', '36.79.96.35'),
(738, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-10-21 05:45:22', '36.79.96.35'),
(739, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-10-21 05:45:57', '36.79.96.35'),
(740, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:46:05', '36.79.96.35'),
(741, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:46:24', '36.79.96.35'),
(742, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-10-21 05:47:03', '36.79.96.35'),
(743, 'Edit ', '20 | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot; |  |  | /assets/file_upload/admin/images/banner/material03.jpg | ABC | ABC | ABC', 1, '2016-10-21 07:03:45', '36.79.96.35'),
(744, 'Add ', '28 |  |  |  | /assets/file_upload/admin/images/banner/material04.jpg |  |  | ', 1, '2016-10-21 07:23:09', '36.79.96.35'),
(745, 'Active ', '28 |  | 1', 1, '2016-10-21 07:23:12', '36.79.96.35'),
(746, 'Login', 'superadmin | 1', 1, '2016-10-21 21:30:20', '112.215.152.57'),
(747, 'Login', 'superadmin | 1', 1, '2016-11-09 04:06:11', '36.79.111.184'),
(748, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-11-09 04:26:43', '36.79.111.184'),
(749, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-11-09 04:28:09', '36.79.111.184'),
(750, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-11-09 04:30:21', '36.79.111.184'),
(751, 'Login', 'superadmin | 1', 1, '2016-11-09 05:46:09', '36.79.111.184'),
(752, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-11-09 05:55:26', '36.79.111.184'),
(753, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:08:26', '36.79.111.184'),
(754, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-11-09 06:09:13', '36.79.111.184'),
(755, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-11-09 06:10:05', '36.79.111.184'),
(756, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-11-09 06:10:23', '36.79.111.184'),
(757, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:10:54', '36.79.111.184'),
(758, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:25:22', '36.79.111.184'),
(759, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:29:27', '36.79.111.184'),
(760, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:30:49', '36.79.111.184'),
(761, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:32:27', '36.79.111.184'),
(762, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:33:59', '36.79.111.184'),
(763, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:34:25', '36.79.111.184'),
(764, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-11-09 06:40:00', '36.79.111.184'),
(765, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-11-09 06:46:02', '36.79.111.184'),
(766, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-11-09 06:49:32', '36.79.111.184'),
(767, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:54:11', '36.79.111.184'),
(768, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-11-09 06:55:05', '36.79.111.184'),
(769, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | ', 1, '2016-11-09 06:56:42', '36.79.111.184'),
(770, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 1, '2016-11-09 06:59:44', '36.79.111.184'),
(771, 'Edit Banner', '16 | HomeBanner 01 | /assets/file_upload/admin/images/banner/caleb00001.jpg | 1 | ', 1, '2016-11-09 07:05:10', '36.79.111.184'),
(772, 'Add Quote', 'Quote |  | &lt;h1&gt;Caleb Technology is a full-range Engineering company that engages in all activities related to Engineering. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.&lt;/h1&gt;', 1, '2016-11-09 08:46:21', '36.79.111.184'),
(773, 'Add Quote', 'Quote |  | Caleb Technology is a premier Systems Integration company with full-range Engineering expertise. Our services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.', 1, '2016-11-09 08:48:49', '36.79.111.184'),
(774, 'Add Quote', 'Quote |  | Caleb Technology is a premier Systems Integration company with full-range Engineering expertise. With a combined experience of more than 70 years in the industry, we have sucessfully completed numerous projects in varied industries such as Oil &amp;amp; Gas, Power Generation, Chemical &amp;amp; Petrochemical, Pulp &amp;amp; Paper and many more.&lt;br /&gt;\r\n&lt;br /&gt;\r\nOur services encompass all phases of a project from Commissioning, Engineering, Construction and even to the Hiring of skilled professionals for our clients.', 1, '2016-11-09 08:53:49', '36.79.111.184'),
(775, 'Add Quote', 'Quote |  | Caleb Technology is Indonesia&amp;#39;s leading independent systems integrator company with full-range Engineering expertise in Industrial Automation. Enterprise Integration and STrategic Manufacturing Solutions. With more than 100 professionals on staff in 5 different countries, we work with clients across a wide range of manufacturing and process industries - such as Oil and Gas, Power Generation, Chemical &amp;amp; Petrochemical, Pulp and Paper and many more. Our people, process and technical capabilities ensure delivery of the right solution, using the most appropriate technology.', 1, '2016-11-09 09:17:52', '36.79.111.184'),
(776, 'Add Quote', 'Quote |  | Caleb Technology is Indonesia leading independent systems integrator company with full-range Engineering expertise in Industrial Automation. Enterprise Integration and STrategic Manufacturing Solutions. With more than 100 professionals on staff in 5 different countries, we work with clients across a wide range of manufacturing and process industries - such as Oil and Gas, Power Generation, Chemical &amp;amp; Petrochemical, Pulp and Paper and many more. Our people, process and technical capabilities ensure delivery of the right solution, using the most appropriate technology.', 1, '2016-11-09 09:18:15', '36.79.111.184'),
(777, 'Add Quote', 'Quote |  | Caleb Technology is Indonesia leading independent systems integrator company with full-range Engineering expertise in Industrial Automation, Enterprise Integration and Strategic Manufacturing Solutions. With more than 100 professionals on staff in 5 different countries, we work with clients across a wide range of manufacturing and process industries - such as Oil and Gas, Power Generation, Chemical and Petrochemical, Pulp and Paper and many more. Our people, process and technical capabilities ensure delivery of the right solution, using the most appropriate technology.', 1, '2016-11-09 09:18:57', '36.79.111.184'),
(778, 'Add Quote', 'Quote |  | Caleb Technology is Indonesia leading independent systems integrator company with full-range Engineering expertise in Industrial Automation, Enterprise Integration and Strategic Manufacturing Solutions. With more than 100 professionals both full-time and contractors in 5 different countries, we work with clients across a wide range of manufacturing and process industries - such as Oil and Gas, Power Generation, Chemical and Petrochemical, Pulp and Paper and many more. Our people, process and technical capabilities ensure delivery of the right solution, using the most appropriate technology.', 1, '2016-11-09 09:19:31', '36.79.111.184'),
(779, 'Add ', 'About_head_quote | We&#039;ll work with you to identify sub-optimal operations and improve safety, efficiency and overall profitability', 1, '2016-11-09 09:29:35', '36.79.111.184'),
(780, 'Add ', 'About_head_quote | We work with you to identify sub-optimal operations and improve safety, efficiency and overall profitability', 1, '2016-11-09 09:31:03', '36.79.111.184'),
(781, 'Add ', 'About_head_quote | Working with you to identify sub-optimal operations and improve safety, efficiency and overall profitability', 1, '2016-11-09 09:31:34', '36.79.111.184'),
(782, 'Add ', 'About_head_quote | We&#039;ll work with you to identify sub-optimal operations and improve your safety, efficiency and overall profitability', 1, '2016-11-09 09:33:21', '36.79.111.184'),
(783, 'Add ', 'About_head_quote | Where potential meets performance', 1, '2016-11-09 09:33:49', '36.79.111.184'),
(784, 'Add ', 'About_head_quote | Caleb Technology is where potential meets performance', 1, '2016-11-09 09:34:26', '36.79.111.184'),
(785, 'Add ', 'About_head_quote | &quot;where potential meets performance&quot;', 1, '2016-11-09 09:35:04', '36.79.111.184'),
(786, 'Add ', 'material_head_quote | Our vast product portfolio enables us to fulfill all types of requests you may have - from supply of standard components to design and manufacturing of complex application solutions', 1, '2016-11-09 09:41:11', '36.79.111.184'),
(787, 'Edit ', '9 | ENGINEERING &amp; SERVICE DIVISION |  | As a longstanding partner to the oil and gas industry we can draw on expereinced project teams at our locations with outstanding levels of expertise. Our teams are the guarantee for a high-level of professionalism from conceptual development through to system commissioning.<br />\r\n<br />\r\nSome Commissioning Job and Engineering Design has been Accomplished. Fully Staff by Engineering Team with Huge Experience in System Control Such as Honeywell Experion PKS, Experion LX, C300, Safety Manager/ Fail Safe Controller, Networking, Hardware Engineer, Software Engineer, Drafter as well as Project Management |  | fafa | fdafa', 1, '2016-11-09 09:46:00', '36.79.111.184'),
(788, 'Edit ', '7 | PROJECT &amp; SERVICE DIVISION | dasdsadadasdsadsa | As a longstanding partner to various industries we can draw on expereinced project teams at our locations with outstanding levels of expertise. Our teams are the guarantee for a high-level of professionalism from conceptual development through to system commissioning.<br />\r\nWe have successfully completed and delivered numerous projects that meets and exceeds our client&#39;s expectation.<br />\r\nWe provide the right mix of services to help increase productivity, optimize plant assets and improve financial &nbsp;performance across your enterprise<br />\r\nYou can rely on our team to provide a full scope of capabilities to deliver the solutions and services you need now and in the future<br />\r\n&nbsp; |  |  | ', 1, '2016-11-09 10:15:27', '36.79.111.184'),
(789, 'Edit ', '7 | PROJECT &amp; SERVICE DIVISION | dasdsadadasdsadsa | As a longstanding partner to various industries we can draw on experienced project teams at our locations with outstanding levels of expertise. Our teams are the guarantee for a high-level of professionalism from conceptual development through to system commissioning;<br />\r\nTogether, we have successfully completed and delivered numerous projects that meets and exceeds our client&#39;s expectation by providing the right mix of services to help increase productivity, optimize plant assets and improve financial &nbsp;performance.<br />\r\nYou can rely on our team to provide a full scope of capabilities to deliver the solutions and services you need now and in the future<br />\r\n&nbsp; |  |  | ', 1, '2016-11-09 10:18:42', '36.79.111.184'),
(790, 'Edit ', '7 | PROJECT &amp; SERVICE DIVISION | dasdsadadasdsadsa | As a longstanding partner to various industries we can draw on experienced project teams at our locations with outstanding levels of expertise. Our teams are the guarantee for a high-level of professionalism from conceptual development through to system commissioning.<br />\r\nBy providing the right mix of services that help increase productivity, optimize plant assets and improve financial, we have successfully completed and delivered numerous projects that meets and exceeds our client&#39;s expectation.<br />\r\nYou can rely on our team to provide a full scope of capabilities to deliver the solutions and services you need now and in the future<br />\r\n&nbsp; |  |  | ', 1, '2016-11-09 10:20:38', '36.79.111.184'),
(791, 'Edit ', '7 | PROJECT &amp; SERVICE DIVISION | dasdsadadasdsadsa | As a longstanding partner to various industries we can draw on experienced project teams at our locations with outstanding levels of expertise. Our teams are the guarantee for a high-level of professionalism from conceptual development through to system commissioning. By providing the right mix of services that help increase productivity, optimize plant assets and improve financial, we have successfully completed and delivered numerous projects that meets and exceeds our client&#39;s expectation. You can rely on our team to provide a full scope of capabilities to deliver the solutions and services you need now and in the future<br />\r\n&nbsp; |  |  | ', 1, '2016-11-09 10:21:04', '36.79.111.184'),
(792, 'Edit ', '9 | ENGINEERING &amp; SERVICE DIVISION |  | With a combined experience of more than 50+ years, our team continue to become trusted advisors to our clients by providing a superior level of service, value and commitment to total client satisfaction. &nbsp;We combine our acclaimed expertise with our segmentation approach and leveraging our network to develop efficient, creative and customised solutions.&nbsp;<br />\r\nSome Commissioning Job and Engineering Design has been Accomplished. Fully Staff by Engineering Team with Huge Experience in System Control Such as Honeywell Experion PKS, Experion LX, C300, Safety Manager/ Fail Safe Controller, Networking, Hardware Engineer, Software Engineer, Drafter as well as Project Management |  | fafa | fdafa', 1, '2016-11-09 10:28:44', '36.79.111.184'),
(793, 'Edit ', '9 | ENGINEERING &amp; SERVICE DIVISION |  | With a combined experience of more than 50+ years, our team continue to become trusted advisors to our clients by providing a superior level of service, value and commitment to total client satisfaction. Our team of engineers are experts in Control Systems such as Honeywell Experion PKS, Experion Lx, C300. &nbsp;&nbsp;We combine our acclaimed expertise with our segmentation approach and leveraging our network to develop efficient, creative and customised solutions.&nbsp; |  | fafa | fdafa', 1, '2016-11-09 10:34:13', '36.79.111.184'),
(794, 'Edit ', '8 | About CALEB |  | We provide a complete range of services that encompass the whole scope of a project:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Ssupply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries that we have experience with\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2016-11-09 10:37:30', '36.79.111.184'),
(795, 'Edit ', '8 | About CALEB |  | Established in 2009 by veterans in the industry, Caleb Technology has quickly evolved to become a leading independent Systems Integrator by providing a broad range of process automation solutions and services.<br />\r\nOur advanced expertise in nearly every major automation platform, control system, human interface, and information management solution enables us that<br />\r\n<br />\r\nWe utilizes a proven project management and collaboration methodology to complete your projects on time and within budget&nbsp;<br />\r\n<br />\r\nCertified Systems Integrator for a variety of hardware and software product manufacturers.<br />\r\n<br />\r\nWe provide a complete range of services that encompass the whole scope of a project:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Ssupply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries served:\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2016-11-09 10:47:37', '36.79.111.184'),
(796, 'Add Partner', 'Partner | PARTNERS | Our advanced expertise in nearly every major automation platform, control system, human interface, and information management solution available enables&lt;br /&gt;\r\nus to earn the title of Certified Systems Integrator for a&amp;nbsp;&amp;nbsp;variety of hardware and software product manufacturers, we are able to provide you with additional project and installation options and has access to all required resources including factory support services.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&amp;quot;Establishing trust to form strong collaboration between partners&amp;quot; is our business motto and thus we are proud to showcase a wide selection of products related to Systems Integration. We hope that in doing so, we could facilitate our partners in providing solutions in our projects.&lt;br /&gt;\r\n&lt;br /&gt;\r\nOur expertise &amp;amp; knowledge of Automation Systems made us more than capable in supporing our clients in the Oil &amp;amp; Gas Industry in building Process Control System &#40;PCS&#41;, Safety Instrumentation System &#40;SIS/ ESD/ FGS&#41;, SCADA System, and Gas Metering System.', 1, '2016-11-09 10:58:25', '36.79.111.184'),
(797, 'Add Partner', 'Partner | PARTNERS | Our advanced expertise in nearly every major automation platform, control system, human interface, and information management solution available enables us to earn the title of Certified Systems Integrator for a&amp;nbsp;&amp;nbsp;variety of hardware and software product manufacturers, we are able to provide you with additional project and installation options and has access to all required resources including factory support services.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&amp;quot;Establishing trust to form strong collaboration between partners&amp;quot; is our business motto and thus we are proud to showcase a wide selection of products related to Systems Integration. We hope that in doing so, we could facilitate our partners in providing solutions in our projects.&lt;br /&gt;\r\n&lt;br /&gt;\r\nOur expertise &amp;amp; knowledge of Automation Systems made us more than capable in supporing our clients in the Oil &amp;amp; Gas Industry in building Process Control System &#40;PCS&#41;, Safety Instrumentation System &#40;SIS/ ESD/ FGS&#41;, SCADA System, and Gas Metering System.', 1, '2016-11-09 10:59:00', '36.79.111.184'),
(798, 'Add Partner', 'Partner | PARTNERS | Our advanced expertise in nearly every major automation platform, control system, human interface, and information management solution available enables us to earn the title of Certified Systems Integrator for a&amp;nbsp;&amp;nbsp;variety of hardware and software product manufacturers, Thus enabling us to provide you with additional project and installation options unavailable to other firms and access to all required resources including factory support services.', 1, '2016-11-09 11:01:23', '36.79.111.184'),
(799, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | To keep up with the constantly increasing demand from our Project Division, we have established partnerships with vendors, manufacturers of system and suppliers of bulk materials such as Honeywell, Rockwell, ICS Triplex, Autronica, Omni, ABV-Velan, and many more.<br />\r\n<br />\r\nWe hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operation and Maintenance of our clients which includes many in the OIl &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors.<br />\r\n<br />\r\n<br style=\"color: rgb(51, 51, 51); font-family: proxima_nova_cn_rgregular, sans-serif; font-size: 13px;\" />\r\n<span style=\"color: rgb(51, 51, 51); font-family: proxima_nova_cn_rgregular, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">&quot;Establishing trust to form strong collaboration between partners&quot; is our business motto and thus we are proud to showcase a wide selection of products related to Systems Integration. We hope that in doing so, we could facilitate our partners in providing solutions in our projects.</span><br style=\"color: rgb(51, 51, 51); font-family: proxima_nova_cn_rgregular, sans-serif; font-size: 13px;\" />\r\n<br style=\"color: rgb(51, 51, 51); font-family: proxima_nova_cn_rgregular, sans-serif; font-size: 13px;\" />\r\n<span style=\"color: rgb(51, 51, 51); font-family: proxima_nova_cn_rgregular, sans-serif; font-size: 13px; background-color: rgb(255, 255, 255);\">Our expertise &amp; knowledge of Automation Systems made us more than capable in supporing our clients in the Oil &amp; Gas Industry in building Process Control System (PCS), Safety Instrumentation System (SIS/ ESD/ FGS), SCADA System, and Gas Metering System.</span> | /assets/file_upload/admin/images/Content/Capture.PNG | sdadadsa | dadadsadsa', 1, '2016-11-09 11:01:38', '36.79.111.184'),
(800, 'Add Testimonial', 'Testimonial |  | Caleb Technology utilizes a proven project management and collaboration methodology to complete your projects on-time and within budget.', 1, '2016-11-09 11:05:29', '36.79.111.184'),
(801, 'Add Testimonial', 'Testimonial |  | &lt;h1&gt;Caleb Technology utilizes a proven project management and collaboration methodology to complete your projects on-time and within budget.&lt;/h1&gt;', 1, '2016-11-09 11:06:22', '36.79.111.184'),
(802, 'Add Testimonial', 'Testimonial |  | &lt;h1&gt;Caleb Technology utilizes a proven project management and collaboration methodology to complete your projects on-time and within budget.&lt;/h1&gt;\r\n&lt;span style=&quot;color:#FFF0F5;font-size: 25px; text-shadow: 2px 2px 4px #000000&quot;&gt;We provide the right mix of services, expertise, and experience to help increase productivity, optimize plant assets and improve financial performance across your enterprise&lt;/span&gt;&lt;/h1&gt;', 1, '2016-11-09 11:07:32', '36.79.111.184'),
(803, 'Add Testimonial', 'Testimonial |  | &lt;span style=&quot;color:#FFF0F5;font-size: 25px;&quot;&gt;We utilizes a proven project management and collaboration methodology to complete your projects on-time and within budget.&lt;/span&gt;', 1, '2016-11-09 11:08:24', '36.79.111.184'),
(804, 'Add Testimonial', 'Testimonial |  | &lt;span style=&quot;font-size: 25px;&quot;&gt;We utilizes a proven project management and collaboration methodology to complete your projects on-time and within budget.&lt;/span&gt;', 1, '2016-11-09 11:08:39', '36.79.111.184'),
(805, 'Add Testimonial', 'Testimonial |  | &lt;span style=&quot;font-size: 25px;&quot;&gt;We utilize a proven project management and collaboration methodology to complete your projects on-time and within budget.&lt;/span&gt;', 1, '2016-11-09 11:10:05', '36.79.111.184'),
(806, 'Add Testimonial', 'Testimonial |  | &lt;span style=&quot;font-size: 25px;&quot;&gt;We utilize on proven project management and collaboration methodology to complete your projects on-time and within budget.&lt;/span&gt;', 1, '2016-11-09 11:10:13', '36.79.111.184'),
(807, 'Add Testimonial', 'Testimonial |  | &lt;span style=&quot;font-size: 20px;&quot;&gt;We utilize on proven project management and collaboration methodology to complete your projects on-time and within budget.&lt;/span&gt;', 1, '2016-11-09 11:10:31', '36.79.111.184'),
(808, 'Login', 'superadmin | 1', 1, '2016-11-09 11:36:55', '36.79.111.184'),
(809, 'Add ', '5 | Training DCS Experion LXC300 - 2 |  | <h3><strong>FASILITAS</strong></h3>\r\n\r\n<ul>\r\n	<li>Sertifikat</li>\r\n	<li>Training Kit</li>\r\n	<li>Snack</li>\r\n</ul>\r\n&nbsp;\r\n\r\n<h3><strong>WAKTU &amp; TEMPAT</strong></h3>\r\nSenin, 29/08/16 - Jumat, 02/09/16<br />\r\n09.00 - 16.00<br />\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143<br />\r\n+6221 29572257<br />\r\n<br />\r\nREGISTRASI BY EMAIL\r\n<ol>\r\n	<li>NAMA LENGKAP</li>\r\n	<li>ALAMAT LENGKAP</li>\r\n	<li>NOMOR TELP</li>\r\n	<li>ASAL KAMPUS</li>\r\n	<li>CV TERBARU</li>\r\n</ol>\r\n<br />\r\n&nbsp; |  | training-dcs-experion-lxc300---2 |  | ', 1, '2016-11-09 11:56:39', '36.79.111.184'),
(810, 'Active ', '5 | Training DCS Experion LXC300 - 2 | 1', 1, '2016-11-09 11:56:42', '36.79.111.184'),
(811, 'Edit ', '5 | Training DCS Experion LXC300 - 2 |  | <h3><strong>5 Days Training : 2 day Theory &amp; 3 Day Practice</strong><br />\r\n<br />\r\n<strong>TRAINING COST</strong></h3>\r\n- Rp. 5.000.000,- (training)\r\n\r\n<h3><strong>FACILITY</strong></h3>\r\n\r\n<ul>\r\n	<li>Laptop</li>\r\n	<li>Certificate&nbsp;</li>\r\n	<li>Coffe Break</li>\r\n	<li>Seminar Kit</li>\r\n	<li>Lunch</li>\r\n</ul>\r\n\r\n<h3><strong>LOCATION</strong></h3>\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143\r\n<h3><strong>CONTACT</strong></h3>\r\n\r\n<ul>\r\n	<li>Office &nbsp;(021) 2928 5708</li>\r\n	<li>email (training@caleb-technology.com) &nbsp;</li>\r\n</ul>\r\n\r\n<h3><strong>REGISTRATION</strong></h3>\r\nOpen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Nov 09-30, 2016 (09.00-15.00)<br />\r\nContact &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Office -(021) 2928 5708<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sukandi 081210960082<br />\r\nAcc Nbr &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : BRI (0423-01-000260-30-5)<br />\r\nBeneficiary name : PT Caleb Technolog<br />\r\n<br />\r\n<em><strong>*** 5% &nbsp;Discount For The First 5 Registration (just Rp 4.500.000,-)***</strong></em><br />\r\n<br />\r\n<br />\r\n&nbsp; |  | training-dcs-experion-lxc300---2 |  | ', 1, '2016-11-09 12:21:54', '36.79.111.184'),
(812, 'Edit ', '5 | Training DCS Experion LXC300 - 2 |  | <h3><strong>5 Days Training : 2 day Theory &amp; 3 Day Practice</strong><br />\r\n<br />\r\n<strong>TRAINING COST</strong></h3>\r\n- Rp. 5.000.000,- (training)\r\n\r\n<h3><strong>FACILITY</strong></h3>\r\n\r\n<ul>\r\n	<li>Laptop</li>\r\n	<li>Certificate&nbsp;</li>\r\n	<li>Coffe Break</li>\r\n	<li>Seminar Kit</li>\r\n	<li>Lunch</li>\r\n</ul>\r\n\r\n<h3><strong>LOCATION</strong></h3>\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143\r\n<h3><strong>CONTACT</strong></h3>\r\n\r\n<ul>\r\n	<li>Office &nbsp;(021) 2928 5708</li>\r\n	<li>email (training@caleb-technology.com) &nbsp;</li>\r\n</ul>\r\n\r\n<h3><strong>REGISTRATION</strong></h3>\r\nOpen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Nov 09-30, 2016 (09.00-15.00)<br />\r\nContact &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Office -(021) 2928 5708<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sukandi 081210960082<br />\r\nAcc Nbr &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : BRI (0423-01-000260-30-5)<br />\r\nBeneficiary name : PT Caleb Technology<br />\r\n<br />\r\n<em><strong>*** 5% &nbsp;Discount For The First 5 Registration (just Rp 4.500.000,-)***</strong></em><br />\r\n<br />\r\n<br />\r\n&nbsp; |  | training-dcs-experion-lxc300---2 |  | ', 1, '2016-11-09 12:23:15', '36.79.111.184'),
(813, 'Edit ', '5 | Training DCS Experion LXC300 - 2 |  | <h3><strong>5 Days Training : 2 day Theory &amp; 3 Day Practice</strong><br />\r\n<br />\r\n<strong>TRAINING COST</strong></h3>\r\n- Rp. 5.000.000,- (training)\r\n\r\n<h3><strong>FACILITY</strong></h3>\r\n\r\n<ul>\r\n	<li>Laptop</li>\r\n	<li>Certificate&nbsp;</li>\r\n	<li>Coffe Break</li>\r\n	<li>Seminar Kit</li>\r\n	<li>Lunch</li>\r\n</ul>\r\n\r\n<h3><strong>LOCATION</strong></h3>\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143\r\n<h3><strong>CONTACT</strong></h3>\r\n\r\n<ul>\r\n	<li>Office &nbsp;(021) 2928 5708</li>\r\n	<li>email (training@caleb-technology.com) &nbsp;</li>\r\n</ul>\r\n\r\n<h3><strong>REGISTRATION</strong></h3>\r\nOpen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Nov 09-30, 2016 (09.00-15.00)<br />\r\nContact &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Office -(021) 2928 5708<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sukandi 081210960082<br />\r\nAcc Nbr &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : BRI (0423-01-000260-30-5)<br />\r\nBeneficiary name : PT Caleb Technology<br />\r\n<br />\r\n<em><strong>*** 5% &nbsp;Discount For The First 5 Registration (just Rp 4.500.000,-)***</strong></em><br />\r\n<br />\r\n<br />\r\n&nbsp; | /assets/file_upload/admin/images/Training/tarining.jpg | training-dcs-experion-lxc300---2 |  | ', 1, '2016-11-09 12:27:47', '36.79.111.184'),
(814, 'Edit ', '5 | Training DCS Experion LXC300 - 2 |  | <h3><strong>5 Days Training : 2 day Theory &amp; 3 Day Practice</strong><br />\r\n<br />\r\n<strong>TRAINING COST</strong></h3>\r\n- Rp. 5.000.000,- (training)\r\n\r\n<h3><strong>FACILITY</strong></h3>\r\n\r\n<ul>\r\n	<li>Laptop</li>\r\n	<li>Certificate&nbsp;</li>\r\n	<li>Coffe Break</li>\r\n	<li>Seminar Kit</li>\r\n	<li>Lunch</li>\r\n</ul>\r\n\r\n<h3><strong>LOCATION</strong></h3>\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143\r\n<h3><strong>CONTACT</strong></h3>\r\n\r\n<ul>\r\n	<li>Office &nbsp;(021) 2928 5708</li>\r\n	<li>email (training@caleb-technology.com) &nbsp;</li>\r\n</ul>\r\n\r\n<h3><strong>REGISTRATION</strong></h3>\r\nOpen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Nov 09-30, 2016 (09.00-15.00)<br />\r\nContact &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Office -(021) 2928 5708<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sukandi 081210960082<br />\r\nAcc Nbr &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : BRI (0423-01-000260-30-5)<br />\r\nBeneficiary name : PT Caleb Technology<br />\r\n<br />\r\n<em><strong>*** 5% &nbsp;Discount For The First 5 Registration (just Rp 4.500.000,-)***</strong></em><br />\r\n<br />\r\n<br />\r\n&nbsp; | /assets/file_upload/admin/images/Training/tarining.jpg | training-dcs-experion-lxc300---2 |  | ', 1, '2016-11-09 12:32:54', '36.79.111.184'),
(815, 'Edit ', '5 | Training DCS Experion LXC300 - 2 |  | <h3><strong>5 Days Training : 2 day Theory &amp; 3 Day Practice</strong><br />\r\n<br />\r\n<strong>TRAINING COST</strong></h3>\r\n- Rp. 5.000.000,- (training)\r\n\r\n<h3><strong>FACILITY</strong></h3>\r\n\r\n<ul>\r\n	<li>Laptop</li>\r\n	<li>Certificate&nbsp;</li>\r\n	<li>Coffe Break</li>\r\n	<li>Seminar Kit</li>\r\n	<li>Lunch</li>\r\n</ul>\r\n\r\n<h3><strong>LOCATION</strong></h3>\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143\r\n<h3><strong>CONTACT</strong></h3>\r\n\r\n<ul>\r\n	<li>Office &nbsp;(021) 2928 5708</li>\r\n	<li>email (training@caleb-technology.com) &nbsp;</li>\r\n</ul>\r\n\r\n<h3><strong>REGISTRATION</strong></h3>\r\nOpen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Nov 09-30, 2016 (09.00-15.00)<br />\r\nContact &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Office -(021) 2928 5708<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sukandi 081210960082<br />\r\nAcc Nbr &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : BRI (0423-01-000260-30-5)<br />\r\nBeneficiary name : PT Caleb Technology<br />\r\n<br />\r\n<em><strong>*** 5% &nbsp;Discount For The First 5 Registration (just Rp 4.500.000,-)***</strong></em><br />\r\n<br />\r\n<br />\r\n&nbsp; | /assets/file_upload/admin/images/Training/trainings.jpg | training-dcs-experion-lxc300---2 |  | ', 1, '2016-11-09 12:34:29', '36.79.111.184'),
(816, 'Login', 'superadmin | 1', 1, '2016-11-10 06:37:29', '36.79.111.184'),
(817, 'Inactive ', '24 |  | 0', 1, '2016-11-10 06:39:32', '36.79.111.184'),
(818, 'Active ', '24 |  | 1', 1, '2016-11-10 06:39:44', '36.79.111.184'),
(819, 'Login', 'superadmin | 1', 1, '2016-11-24 09:22:38', '112.215.45.207'),
(820, 'Login', 'superadmin | 1', 1, '2016-11-29 06:44:43', '36.79.96.89'),
(821, 'Edit ', '8 | About CALEB |  | Established in 2009 by veterans in the industry, Caleb Technology has quickly evolved to become a leading independent Systems Integrator by providing a broad range of process automation solutions and services.<br />\r\nOur advanced expertise in nearly every major automation platform, control system, human interface, and information management solution enables us to help businesses reach new levels of success.<br />\r\n<br />\r\nWe provide a complete range of services that encompass the whole scope of a project:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Supply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries served:\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2016-11-29 06:50:32', '36.79.96.89'),
(822, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and MAintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors.<br />\r\n<br />\r\nTo keep up with the constantly increasing demand from our Project Division, we have established partnerships with vendors, manufacturers of system and suppliers of bulk materials such as Honeywell, Rockwell, ICS Triplex, Autronica, Omni, ABV-Velan, and many more. | /assets/file_upload/admin/images/Content/Capture.PNG | sdadadsa | dadadsadsa', 1, '2016-11-29 07:30:50', '36.79.96.89');
INSERT INTO `tbl_log_cms` (`log_id_cms`, `log_module`, `log_value`, `user_id`, `log_create_date`, `ip`) VALUES
(823, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and Maintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors.<br />\r\n<br />\r\nTo keep up with the constantly increasing demand from our Project Division, we have established partnerships with vendors, manufacturers of system and suppliers of bulk materials such as Honeywell, Rockwell, ICS Triplex, Autronica, Omni, ABV-Velan, and many more. | /assets/file_upload/admin/images/Content/Capture.PNG | sdadadsa | dadadsadsa', 1, '2016-11-29 07:32:42', '36.79.96.89'),
(824, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and Maintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors. | /assets/file_upload/admin/images/Content/Capture.PNG | sdadadsa | dadadsadsa', 1, '2016-11-29 07:37:47', '36.79.96.89'),
(825, 'Edit ', '24 | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | /assets/file_upload/admin/images/banner/trainingaaa.jpg |  |  | ', 1, '2016-11-29 08:24:55', '36.79.96.89'),
(826, 'Add ', 'About_head_quote | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources', 1, '2016-11-29 08:25:08', '36.79.96.89'),
(827, 'Login', 'superadmin | 1', 1, '2016-11-29 08:27:25', '36.79.96.89'),
(828, 'Add ', 'About_head_quote | Continuing education is a shared responsibility at Caleb Technology, and we make every effort to facilitate a learning environment by continually adding new programs and looking for new ways to learn', 1, '2016-11-29 08:27:42', '36.79.96.89'),
(829, 'Add ', 'TrainingQuote | Continuing education is a shared responsibility at Caleb Technology, and we make every effort to facilitate a learning environment by continually adding new programs and looking for new ways to learn | Still Awaiting Content', 1, '2016-11-29 08:28:18', '36.79.96.89'),
(830, 'Add ', 'TrainingQuote | Continuing education is a shared responsibility at Caleb Technology, and we make every effort to facilitate a learning environment by continually adding new programs and looking for new ways to learn | Continuing education is a shared responsibility at Caleb Technology, and we make every effort to facilitate a learning environment by continually adding new programs and looking for new ways to learn', 1, '2016-11-29 08:28:31', '36.79.96.89'),
(831, 'Edit ', '8 | About CALEB |  | Established in 2009 by veterans in the industry, Caleb Technology has quickly evolved to become a leading independent Systems Integrator by providing a broad range of process automation solutions and services.<br />\r\nOur advanced expertise in nearly every major automation platform, control system, human interface, and information management solution enables us to help businesses reach new levels of success.<br />\r\n<br />\r\nWe provide a complete range of services that encompass the whole scope of a project:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Supply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries served:\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2016-11-29 08:32:26', '36.79.96.89'),
(832, 'Logout', 'superadmin | 1', 1, '2016-11-29 08:42:31', '36.79.96.89'),
(833, 'Login', 'superadmin | 1', 1, '2016-11-30 03:02:46', '36.79.96.89'),
(834, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and Maintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors.<br />\r\nOur vast product portfolio enables us to fulfill all types of requests you may have - from supply of standard components to design and manufacturing of complex application solutions | /assets/file_upload/admin/images/Content/Capture.PNG | sdadadsa | dadadsadsa', 1, '2016-11-30 03:03:18', '36.79.96.89'),
(835, 'Add ', 'material_head_quote | Certified Systems Integrator for a variety of hardware &amp; software product manufacturers', 1, '2016-11-30 03:04:04', '36.79.96.89'),
(836, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and Maintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors. Our vast product portfolio enables us to fulfill all types of requests you may have - from supply of standard components to design and manufacturing of complex application solutions | /assets/file_upload/admin/images/Content/Capture.PNG | sdadadsa | dadadsadsa', 1, '2016-11-30 03:04:23', '36.79.96.89'),
(837, 'Login', 'superadmin | 1', 1, '2016-12-22 06:02:31', '36.70.139.214'),
(838, 'Login', 'superadmin | 1', 1, '2016-12-25 18:58:12', '180.252.41.219'),
(839, 'Login', 'superadmin | 1', 1, '2017-01-03 05:22:48', '125.161.3.74'),
(840, 'Inactive ', '26 | Velan | 0', 1, '2017-01-03 05:23:56', '125.161.3.74'),
(841, 'Active ', '26 | Velan | 1', 1, '2017-01-03 05:24:02', '125.161.3.74'),
(842, 'Inactive ', '16 | Premier oil | 0', 1, '2017-01-03 05:24:14', '125.161.3.74'),
(843, 'Inactive ', '19 | Dwisolar | 0', 1, '2017-01-03 05:24:20', '125.161.3.74'),
(844, 'Inactive ', '20 | PHE WMO | 0', 1, '2017-01-03 05:24:27', '125.161.3.74'),
(845, 'Inactive ', '22 | Rockwel lab | 0', 1, '2017-01-03 05:24:33', '125.161.3.74'),
(846, 'Inactive ', '5 | Adhi Karya | 0', 1, '2017-01-03 05:24:38', '125.161.3.74'),
(847, 'Active ', '12 | Field Instruments | 1', 1, '2017-01-03 05:45:15', '125.161.3.74'),
(848, 'Inactive ', '23 | Pearl | 0', 1, '2017-01-03 05:56:47', '125.161.3.74'),
(849, 'Edit ', '26 | Velan | /assets/file_upload/admin/images/Logos/velan.png', 1, '2017-01-03 06:10:46', '125.161.3.74'),
(850, 'Edit ', '25 | N-Line Valves | /assets/file_upload/admin/images/Logos/nline.png', 1, '2017-01-03 06:10:53', '125.161.3.74'),
(851, 'Edit ', '24 | Autronica | /assets/file_upload/admin/images/Logos/autronika.png', 1, '2017-01-03 06:11:04', '125.161.3.74'),
(852, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nSummary&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nLiability Restrictions&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nUsage Restrictions&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.harindo.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nApplicability of Content&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nPolicy Changes&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nYour Feedback&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback. You may email us or write to us at PT. Caleb Technology.\r\n&lt;p&gt;Komplek Surya Permata Indah&lt;/p&gt;\r\n\r\n&lt;p&gt;Blok D1 No.26 RT.005/003&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelurahan Sepanjang Jaya,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kecamatan Rawalumbu, Kota Bekasi 17114&lt;/p&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:17:42', '125.161.3.74'),
(853, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;br /&gt;\r\n&amp;bull;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp;&amp;nbsp; We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nSummary&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nLiability Restrictions&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nUsage Restrictions&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.harindo.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nApplicability of Content&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nPolicy Changes&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\nYour Feedback&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback. You may email us or write to us at PT. Caleb Technology.\r\n&lt;p&gt;Komplek Surya Permata Indah&lt;/p&gt;\r\n\r\n&lt;p&gt;Blok D1 No.26 RT.005/003&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelurahan Sepanjang Jaya,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kecamatan Rawalumbu, Kota Bekasi 17114&lt;/p&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:17:46', '125.161.3.74'),
(854, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.harindo.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback. You may email us or write to us at PT. Caleb Technology.\r\n&lt;p&gt;Komplek Surya Permata Indah&lt;/p&gt;\r\n\r\n&lt;p&gt;Blok D1 No.26 RT.005/003&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelurahan Sepanjang Jaya,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kecamatan Rawalumbu, Kota Bekasi 17114&lt;/p&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:19:45', '125.161.3.74'),
(855, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.harindo.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback. You may email us or write to us at PT. Caleb Technology.\r\n&lt;p&gt;Komplek Surya Permata Indah&lt;/p&gt;\r\n\r\n&lt;p&gt;Blok D1 No.26 RT.005/003&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelurahan Sepanjang Jaya,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kecamatan Rawalumbu, Kota Bekasi 17114&lt;/p&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:20:03', '125.161.3.74'),
(856, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.harindo.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback. You may email us or write to us at PT. Caleb Technology.\r\n&lt;p&gt;Komplek Surya Permata Indah&lt;/p&gt;\r\n\r\n&lt;p&gt;Blok D1 No.26 RT.005/003&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelurahan Sepanjang Jaya,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kecamatan Rawalumbu, Kota Bekasi 17114&lt;/p&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:20:17', '125.161.3.74'),
(857, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.caleb-technology.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback. You may email us or write to us at PT. Caleb Technology.\r\n&lt;p&gt;Komplek Surya Permata Indah&lt;/p&gt;\r\n\r\n&lt;p&gt;Blok D1 No.26 RT.005/003&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelurahan Sepanjang Jaya,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kecamatan Rawalumbu, Kota Bekasi 17114&lt;/p&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:20:40', '125.161.3.74'),
(858, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;br&gt;\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.caleb-technology.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback. You may email us or write to us at PT. Caleb Technology.\r\n&lt;p&gt;Komplek Surya Permata Indah&lt;/p&gt;\r\n\r\n&lt;p&gt;Blok D1 No.26 RT.005/003&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelurahan Sepanjang Jaya,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kecamatan Rawalumbu, Kota Bekasi 17114&lt;/p&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:21:10', '125.161.3.74');
INSERT INTO `tbl_log_cms` (`log_id_cms`, `log_module`, `log_value`, `user_id`, `log_create_date`, `ip`) VALUES
(859, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.caleb-technology.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback.&lt;br /&gt;\r\nYou may email us or write to us at PT. Caleb Technology.\r\n&lt;p&gt;Komplek Surya Permata Indah&lt;/p&gt;\r\n\r\n&lt;p&gt;Blok D1 No.26 RT.005/003&lt;/p&gt;\r\n\r\n&lt;p&gt;Kelurahan Sepanjang Jaya,&lt;/p&gt;\r\n\r\n&lt;p&gt;Kecamatan Rawalumbu, Kota Bekasi 17114&lt;/p&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:22:08', '125.161.3.74'),
(860, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.caleb-technology.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback.&lt;br /&gt;\r\nYou may email us or write to us at&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;PT. Caleb Technology&lt;/strong&gt;&lt;br /&gt;\r\nKomplek Surya Permata Indah&lt;br /&gt;\r\nBlok D1 No.26 RT.005/003&lt;br /&gt;\r\nKelurahan Sepanjang Jaya,&lt;br /&gt;\r\nKecamatan Rawalumbu, Kota Bekasi 17114&lt;br /&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:23:20', '125.161.3.74'),
(861, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.caleb-technology.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback.&lt;br /&gt;\r\nYou may email us or write to us at&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;PT. Caleb Technology&lt;/strong&gt;&lt;br /&gt;\r\nKomplek Surya Permata Indah&lt;br /&gt;\r\nBlok D1 No.26 RT.005/003&lt;br /&gt;\r\nKelurahan Sepanjang Jaya,&lt;br /&gt;\r\nKecamatan Rawalumbu, Kota Bekasi 17114&lt;br /&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:23:29', '125.161.3.74'),
(862, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@harindo.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.caleb-technology.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback.&lt;br /&gt;\r\nYou may email us or write to us at&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;PT. Caleb Technology&lt;/strong&gt;&lt;br /&gt;\r\nKomplek Surya Permata Indah&lt;br /&gt;\r\nBlok D1 No.26 RT.005/003&lt;br /&gt;\r\nKelurahan Sepanjang Jaya,&lt;br /&gt;\r\nKecamatan Rawalumbu, Kota Bekasi 17114&lt;br /&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:23:34', '125.161.3.74'),
(863, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at info@caleb-technology.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.caleb-technology.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback.&lt;br /&gt;\r\nYou may email us or write to us at&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;PT. Caleb Technology&lt;/strong&gt;&lt;br /&gt;\r\nKomplek Surya Permata Indah&lt;br /&gt;\r\nBlok D1 No.26 RT.005/003&lt;br /&gt;\r\nKelurahan Sepanjang Jaya,&lt;br /&gt;\r\nKecamatan Rawalumbu, Kota Bekasi 17114&lt;br /&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:24:35', '125.161.3.74'),
(864, 'Add ', 'Privacy_policyQuote | Privacy Policy | PT. Caleb Technology values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.\r\n&lt;ul&gt;\r\n &lt;li&gt;Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.&lt;/li&gt;\r\n &lt;li&gt;We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.&lt;/li&gt;\r\n &lt;li&gt;Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.&lt;/li&gt;\r\n &lt;li&gt;We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.&lt;/li&gt;\r\n &lt;li&gt;Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.&lt;/li&gt;\r\n &lt;li&gt;We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.&lt;/li&gt;\r\n &lt;li&gt;Gravitate uses data from Google&amp;amp;rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.&lt;/li&gt;\r\n &lt;li&gt;We will make readily available to customers information about our policies and practices relating to the management of personal information.&lt;/li&gt;\r\n&lt;/ul&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Summary&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at admin@caleb-technology.com.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Liability Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nPT. Caleb Technology is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Caleb Technology be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Caleb Technology may provide links to other sites that are not maintained by PT. Caleb Technology, but PT. Caleb Technology does not endorse those sites and is not responsible for the content of such other sites.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Usage Restrictions&lt;/strong&gt;&lt;br /&gt;\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.caleb-technology.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Caleb Technology All material on this site is provided for lawful purposes only.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Applicability of Content&lt;/strong&gt;&lt;br /&gt;\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Caleb Technology makes no representation that content provided is applicable or appropriate for use in other locations.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Policy Changes&lt;/strong&gt;&lt;br /&gt;\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.&lt;br /&gt;\r\n&amp;nbsp;&lt;br /&gt;\r\n&lt;strong&gt;Your Feedback&lt;/strong&gt;&lt;br /&gt;\r\nTo help us improve our privacy policy and practice, please give us your feedback.&lt;br /&gt;\r\nYou may email us or write to us at&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;PT. Caleb Technology&lt;/strong&gt;&lt;br /&gt;\r\nKomplek Surya Permata Indah&lt;br /&gt;\r\nBlok D1 No.26 RT.005/003&lt;br /&gt;\r\nKelurahan Sepanjang Jaya,&lt;br /&gt;\r\nKecamatan Rawalumbu, Kota Bekasi 17114&lt;br /&gt;\r\nTel : (62 21) 2928 5708', 1, '2017-01-03 06:24:44', '125.161.3.74'),
(865, 'Login', 'superadmin | 1', 1, '2017-01-03 17:49:41', '112.215.171.106'),
(866, 'Login', 'superadmin | 1', 1, '2017-01-10 06:31:25', '112.215.152.148'),
(867, 'Login', 'superadmin | 1', 1, '2017-01-10 06:31:33', '125.160.111.33'),
(868, 'Active ', '15 | Testing | 1', 1, '2017-01-10 06:35:01', '125.160.111.33'),
(869, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and Maintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors. Our vast product portfolio enables us to fulfill all types of requests you may have - from supply of standard components to design and manufacturing of complex application solutions |  | sdadadsa | dadadsadsa', 1, '2017-01-10 06:35:15', '112.215.152.148'),
(870, 'Login', 'superadmin | 1', 1, '2017-01-11 03:34:42', '36.77.210.168'),
(871, 'Login', 'superadmin | 1', 1, '2017-02-01 05:17:22', '36.69.161.74'),
(872, 'Login', 'superadmin | 1', 1, '2017-02-01 05:31:27', '112.215.200.98'),
(873, 'Edit ', '65 | LPG Plant Custody Transfer Orifice Gas Meter | Bukit Tua LPG Plant Custody Transfer Orifice Gas Meter | Gas Metering Skid 3 Stream 8&quot; Pipeline integrated with Omni Flow Computer Panel and HMI Wonderware Intouch | /assets/file_upload/admin/images/banner/LPG-Plant-Custody-Transfer.jpg | Bukit Tua |  | ', 1, '2017-02-01 05:33:16', '112.215.200.98'),
(874, 'Edit ', '65 | LPG Plant Custody Transfer Orifice Gas Meter | Bukit Tua LPG Plant Custody Transfer Orifice Gas Meter | Gas Metering Skid 3 Stream 8&quot; Pipeline integrated with Omni Flow Computer Panel and HMI Wonderware Intouch | /assets/file_upload/admin/images/banner/LPG-Plant-Custody-Transfer.jpg | Bukit Tua, Gresik, Jawa Timur |  | ', 1, '2017-02-01 05:34:11', '112.215.200.98'),
(875, 'Add ', '33 | Eni Muara Bakau B.V |  |  Eni Muara Bakau B.V | Eni Muara Bakau B.V', 1, '2017-02-01 05:36:40', '112.215.200.98'),
(876, 'Active ', '33 | Eni Muara Bakau B.V | 1', 1, '2017-02-01 05:36:47', '112.215.200.98'),
(877, 'Edit ', '80 | Addressable Fire Detection System | Adressable Fire Detection System For Jangkrik Complex Project | Fire Addressable Detection Panel using Autronica Fire Alarm Controller Series BS-420 Certified SIL-2 integrated with Autronica Detector | /assets/file_upload/admin/images/banner/Addressable-Fire-Detection-SystemAddressable-Fire-Detection-System.jpg | Jangkrik - Karimun |  | ', 1, '2017-02-01 05:39:45', '112.215.200.98'),
(878, 'Add ', '34 | Petronas Carigali Sdn, Bhd |  |  Petronas Carigali Sdn, Bhd | Petronas Carigali Sdn, Bhd', 1, '2017-02-01 05:41:59', '112.215.200.98'),
(879, 'Active ', '34 | Petronas Carigali Sdn, Bhd | 1', 1, '2017-02-01 05:42:06', '112.215.200.98'),
(880, 'Edit ', '79 | Fire Suppression Panel System &#40;FSPS&#41; | Fire Suppression System | Fire Suppression Panel System using Aadvance ICS Triplex Rockwell | /assets/file_upload/admin/images/banner/Fire-Suppresion-Panel-System.jpg | Dulang & Angsi, Malaysia |  | ', 1, '2017-02-01 05:43:43', '112.215.200.98'),
(881, 'Add ', '35 | BLT Brotojoyo |  |  BLT Brotojoyo | BLT Brotojoyo', 1, '2017-02-01 05:44:31', '112.215.200.98'),
(882, 'Active ', '35 | BLT Brotojoyo | 1', 1, '2017-02-01 05:44:38', '112.215.200.98'),
(883, 'Edit ', '56 | FPSO Brotojoyo Fire Gas and ESD System | Upgrade PLC HIMA | Upgrade PLC HIMA on Fire and Gas and ESD System Brotojoyo | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364269673.jpg | Kapal Brotojoyo |  | ', 1, '2017-02-01 05:45:52', '112.215.200.98'),
(884, 'Logout', 'superadmin | 1', 1, '2017-02-01 05:49:24', '112.215.200.98'),
(885, 'Login', 'superadmin | 1', 1, '2017-02-01 07:27:15', '36.69.161.74'),
(886, 'Login', 'superadmin | 1', 1, '2017-02-02 08:41:30', '36.69.161.74'),
(887, 'Login', 'superadmin | 1', 1, '2017-02-02 09:52:33', '36.69.161.74'),
(888, 'Edit ', '56 | FPSO Brotojoyo Fire Gas and ESD System | Upgrade PLC HIMA | Upgrade PLC HIMA on Fire and Gas and ESD System Brotojoyo | /assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364269673.jpg | Kapal Brotojoyo |  | ', 1, '2017-02-02 09:53:27', '36.69.161.74'),
(889, 'Edit ', '80 | Addressable Fire Detection System | Addressable Fire Detection System For Jangkrik Complex Project | Fire Addressable Detection Panel using Autronica Fire Alarm Controller Series BS-420 Certified SIL-2 integrated with Autronica Detector | /assets/file_upload/admin/images/banner/Addressable-Fire-Detection-SystemAddressable-Fire-Detection-System.jpg | Jangkrik - Karimun |  | ', 1, '2017-02-02 09:54:37', '36.69.161.74'),
(890, 'Login', 'superadmin | 1', 1, '2017-10-06 15:56:06', '120.188.78.36'),
(891, 'Login', 'superadmin | 1', 1, '2017-10-06 16:02:17', '112.215.238.243'),
(892, 'Inactive ', '24 | Autronica | 0', 1, '2017-10-06 16:03:37', '112.215.238.243'),
(893, 'Inactive ', '27 | material 3 | 0', 1, '2017-10-06 16:04:44', '112.215.238.243'),
(894, 'Login', 'superadmin | 1', 1, '2017-10-16 15:04:09', '182.253.163.24'),
(895, 'Add ', '6 | Training DCS Experion LX C300 | test | <h3><strong>FASILITAS</strong></h3>\r\n\r\n<ul>\r\n	<li>Sertifikat</li>\r\n	<li>Training Kit</li>\r\n	<li>Snack</li>\r\n</ul>\r\n&nbsp;\r\n\r\n<h3><strong>WAKTU &amp; TEMPAT</strong></h3>\r\nSenin, 29/08/16 - Jumat, 02/09/16<br />\r\n09.00 - 16.00<br />\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143<br />\r\n+6221 29572257<br />\r\n<br />\r\nREGISTRASI BY EMAIL\r\n<ol>\r\n	<li>NAMA LENGKAP</li>\r\n	<li>ALAMAT LENGKAP</li>\r\n	<li>NOMOR TELP</li>\r\n	<li>ASAL KAMPUS</li>\r\n	<li>CV TERBARU</li>\r\n</ol>\r\n<br />\r\n&nbsp; | /assets/file_upload/admin/images/Training/TrainingDCSNov.jpg | training-dcs-experion-lx-c300 |  | ', 1, '2017-10-16 15:14:01', '182.253.163.24'),
(896, 'Active ', '6 | Training DCS Experion LX C300 | 1', 1, '2017-10-16 15:14:07', '182.253.163.24'),
(897, 'Login', 'superadmin | 1', 1, '2017-10-19 14:33:26', '182.253.163.19'),
(898, 'Login', 'superadmin | 1', 1, '2017-10-19 14:53:22', '182.253.163.19'),
(899, 'Login', 'superadmin | 1', 1, '2017-10-19 15:34:28', '222.124.56.15'),
(900, 'Edit ', '8 | About CALEB |  | Established in 2009 by veterans in the industry, Caleb Technology has quickly evolved to become a leading independent Systems Integrator by providing a broad range of process automation solutions and services.<br />\r\nOur advanced expertise in nearly every major automation platform, control system, human interface, and information management solution enables us to help businesses reach new levels of success.<br />\r\n<br />\r\nWe provide a complete range of services that encompass the whole scope of a project:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Supply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries served:\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2017-10-19 15:57:00', '222.124.56.15'),
(901, 'Login', 'superadmin | 1', 1, '2017-10-19 16:37:49', '222.124.56.15'),
(902, 'Edit ', '8 | About CALEB |  | Established in 2009 by veterans in the industry, Caleb Technology has quickly evolved to become a leading independent Systems Integrator by providing a broad range of process automation solutions and services.<br />\r\nOur advanced expertise in nearly every major automation platform, control system, human interface, and information management solution enables us to help businesses reach new levels of success.<br />\r\n<br />\r\nWe provide a complete range of services that encompass the whole scope of a project:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Supply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries served:\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2017-10-19 16:44:34', '222.124.56.15'),
(903, 'Edit ', '5 | PROCUREMENT &amp; MATERIAL SUPPORT | Mrs. Fithri Grahaningsih | fithri@caleb-technology.com | +62 878 8881 3637', 1, '2017-10-19 17:14:08', '222.124.56.15'),
(904, 'Edit ', '3 | SALES &amp; MARKETING | Mr. M Reza Fahlevi | reza@caleb-technology.com | +62 853 2930 9900', 1, '2017-10-19 17:14:46', '222.124.56.15'),
(905, 'Delete ', '6 | POWER PLANT DIVISION', 1, '2017-10-19 17:14:55', '222.124.56.15'),
(906, 'Add ', 'FaqQuote | FREQUENTLY ASKED QUESTIONS (FAQ) | &lt;strong&gt;What is PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nPT Caleb Technology is a company that focusing in System integrator to integrated Instrument System and PCS/ Process Control System, SIS Safety Instrumented System, SCADA System, Metering Package and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is the main business of PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nOur main business are Control System &amp;amp; Instrumentation, Fire and Gas Alarm System, Gas Metering Package, and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is PT Caleb Technology capabalities?&lt;/strong&gt;&lt;br /&gt;\r\nOur capabilities are developing an integrated system for FGS (Fire and Gas System), PCS (Process Control System), SIS (Safety Instrumented System), SCADA System, Metering Package and Power Generation.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;How to make partnership with PT Caleb Technology?&lt;/strong&gt;&lt;br /&gt;\r\nYou can contact us on the Contact Us Page to make partnership with us.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;Who Should I contact to business?&lt;/strong&gt;&lt;br /&gt;\r\nIf you are interested in establishing business with us on the Contact Us page there is also the contact person for each Department Manager who can be contacted directly that might be relevant on your business scope.&lt;br /&gt;\r\n&lt;br /&gt;\r\n&lt;strong&gt;What is PT Caleb Technology Product?&lt;/strong&gt;&lt;br /&gt;\r\nWe offer products confirming to System Integration, thus facilitating our clients to globalize their applications for Oil and Gas industrial, Power Plant &amp;amp; Automation including design, installation and services after sales.', 1, '2017-10-19 17:15:11', '222.124.56.15'),
(907, 'Login', 'superadmin | 1', 1, '2017-10-23 08:54:40', '222.124.56.15'),
(908, 'Login', 'superadmin | 1', 1, '2017-10-23 10:57:24', '182.253.163.21'),
(909, 'Login', 'superadmin | 1', 1, '2017-10-23 10:59:19', '182.253.163.21'),
(910, 'Login', 'superadmin | 1', 1, '2017-10-23 10:59:20', '182.253.163.21'),
(911, 'Login', 'superadmin | 1', 1, '2017-10-23 11:15:24', '222.124.56.15'),
(912, 'Inactive ', '80 | Addressable Fire Detection System | 0', 1, '2017-10-23 11:19:14', '222.124.56.15'),
(913, 'Active ', '80 | Addressable Fire Detection System | 1', 1, '2017-10-23 11:19:20', '222.124.56.15'),
(914, 'Login', 'superadmin | 1', 1, '2017-10-23 13:37:46', '182.253.163.21'),
(915, 'Inactive Pages', '12 | Privacy Policy | 0', 1, '2017-10-23 13:47:22', '182.253.163.21'),
(916, 'Inactive Pages', '14 | Sitemap | 0', 1, '2017-10-23 13:47:36', '182.253.163.21'),
(917, 'Inactive Pages', '15 | FAQ | 0', 1, '2017-10-23 13:47:47', '182.253.163.21'),
(918, 'Login', 'superadmin | 1', 1, '2017-10-23 14:00:47', '182.253.163.21'),
(919, 'Inactive Module', '15 | Services | 0', 1, '2017-10-23 14:01:16', '182.253.163.21'),
(920, 'Inactive Module', '36 | Privacy_policy | 0', 1, '2017-10-23 14:01:23', '182.253.163.21'),
(921, 'Active Module', '36 | Privacy_policy | 1', 1, '2017-10-23 14:02:10', '182.253.163.21'),
(922, 'Add User', '1 | Balkat | info@balkat.com', 1, '2017-10-23 14:02:12', '182.253.163.21'),
(923, 'Active Module', '15 | Services | 1', 1, '2017-10-23 14:02:16', '182.253.163.21'),
(924, 'Active User', '4 | Balkat | 1', 1, '2017-10-23 14:02:16', '182.253.163.21'),
(925, 'Logout', 'superadmin | 1', 1, '2017-10-23 14:02:19', '182.253.163.21'),
(926, 'Inactive Module', '5 | Pages | 0', 1, '2017-10-23 14:02:23', '182.253.163.21'),
(927, 'Login', 'Balkat | 1', 4, '2017-10-23 14:02:34', '182.253.163.21'),
(928, 'Logout', 'superadmin | 1', 1, '2017-10-23 14:03:24', '182.253.163.21'),
(929, 'Login', 'superadmin | 1', 1, '2017-10-23 14:03:46', '222.124.63.61'),
(930, 'Edit Menu', '54 | Projects |  | 0', 4, '2017-10-23 14:22:53', '182.253.163.21'),
(931, 'Login', 'Balkat | 1', 4, '2017-10-23 15:12:17', '182.253.163.21'),
(932, 'Inactive Module', '4 | Menu | 0', 4, '2017-10-23 15:12:28', '182.253.163.21'),
(933, 'Add ', '7 | test lagi | awcohoaiuwrbcuoqrhc043j1vopjr3pov | caafetbvwetby5uyn6unuynnebtyntyrenhetn | /assets/file_upload/admin/images/banner/1920x1080.jpg |  |  | ', 4, '2017-10-23 15:18:46', '182.253.163.21'),
(934, 'Active ', '7 | test lagi | 1', 4, '2017-10-23 15:18:49', '182.253.163.21'),
(935, 'Login', 'superadmin | 1', 1, '2017-10-24 09:05:11', '222.124.63.61'),
(936, 'Add Quote', 'Quote |  | Caleb Technology is Indonesia leading independent systems integrator company with full-range Engineering expertise in Industrial Automation, Enterprise Integration and Strategic Manufacturing Solutions. With more than 100 professionals engineer and various partners and clients in industrial fields, we work with clients across a wide range of manufacturing and process industries - such as Oil and Gas, Power Generation, Chemical and Petrochemical, Pulp and Paper and many more. Our people, process and technical capabilities ensure delivery of the right solution, using the most appropriate technology.', 1, '2017-10-24 09:07:35', '222.124.63.61'),
(937, 'Edit ', '8 | About CALEB |  | Established in 2010 by veterans in the industry, Caleb Technology has quickly evolved to become a leading independent Systems Integrator by providing a broad range of process automation solutions and services.<br />\r\nOur advanced expertise in nearly every major automation platform, control system, human interface, and information management solution enables us to help businesses reach new levels of success.<br />\r\n<br />\r\nWe provide a complete range of services that encompass the whole scope of a project:\r\n<ul>\r\n	<li>Engineering</li>\r\n	<li>Construction</li>\r\n	<li>Commissioning</li>\r\n	<li>Hiring Of Professionals</li>\r\n	<li>Maintenance Operation</li>\r\n	<li>Supply of Materials &amp; Spare Parts</li>\r\n</ul>\r\nIndustries served:\r\n\r\n<ul>\r\n	<li>Oil &amp; Gas Industry</li>\r\n	<li>Power Generation</li>\r\n	<li>Chemical &amp; Petrochemical</li>\r\n	<li>Pulp &amp; Paper,</li>\r\n	<li>And Many Others...</li>\r\n</ul> | /assets/file_upload/admin/images/banner/aboutcaleb.png |  | ', 1, '2017-10-24 09:15:58', '222.124.63.61'),
(938, 'Login', 'superadmin | 1', 1, '2017-10-24 10:28:15', '182.253.163.21'),
(939, 'Login', 'Balkat | 1', 4, '2017-10-24 11:30:13', '182.253.163.21'),
(940, 'Edit ', '23 | header-about |  |  | /assets/file_upload/admin/images/banner/about001.jpg |  |  | ', 4, '2017-10-24 11:33:21', '182.253.163.21'),
(941, 'Add ', '3 | test |  | apa aja ajaj ada', 4, '2017-10-24 11:40:20', '182.253.163.21'),
(942, 'Active ', '3 | test | 1', 4, '2017-10-24 11:40:23', '182.253.163.21'),
(943, 'Delete ', '3 | test', 4, '2017-10-24 11:41:16', '182.253.163.21'),
(944, 'Edit ', '20 | material 4 |  |  | /assets/file_upload/admin/images/banner/material03.jpg |  | ABC | ABC', 4, '2017-10-24 12:22:46', '182.253.163.21'),
(945, 'Edit ', '28 | material 1 |  |  | /assets/file_upload/admin/images/banner/material04.jpg |  |  | ', 4, '2017-10-24 12:22:59', '182.253.163.21'),
(946, 'Add ', 'About_head_quote | &quot;We are committed in serving our customers by keeping their operations running smoothly and cost effectively.&quot;', 4, '2017-10-24 12:23:07', '182.253.163.21'),
(947, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and Maintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors. Our vast product portfolio enables us to fulfill all types of requests you may have - from supply of standard components to design and manufacturing of complex application solutions | /assets/file_upload/admin/images/banner/1366X300.jpg | sdadadsa | dadadsadsa', 4, '2017-10-24 12:32:41', '182.253.163.21'),
(948, 'Edit ', '2 | MATERIAL SUPPORT DIVISION | <p>dadsadad</p> | Caleb Technology is a Certified Systems Integrator for a variety of hardware &amp; software product manufacturers. We hope that through these partnerships, we would be able to ensure availability of materials for Internal Projects as well as for Operations and Maintenance of our clients which includes many in the Oil &amp; Gas Industry (Premier Oil, Pearl Oil, Pertamina, ENI) and other industrial sectors. Our vast product portfolio enables us to fulfill all types of requests you may have - from supply of standard components to design and manufacturing of complex application solutions |  | sdadadsa | dadadsadsa', 4, '2017-10-24 12:33:01', '182.253.163.21'),
(949, 'Add ', '29 |  |  |  | /assets/file_upload/admin/images/banner/1366X300.jpg |  |  | ', 4, '2017-10-24 12:34:59', '182.253.163.21'),
(950, 'Active ', '29 |  | 1', 4, '2017-10-24 12:35:01', '182.253.163.21'),
(951, 'Delete ', '29 | ', 4, '2017-10-24 12:35:13', '182.253.163.21');
INSERT INTO `tbl_log_cms` (`log_id_cms`, `log_module`, `log_value`, `user_id`, `log_create_date`, `ip`) VALUES
(952, 'Add ', '4 | supervisor | sample lowongan<br />\r\nlorem ipsum dolor sit amet | Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. |  |  | ', 4, '2017-10-24 12:53:48', '182.253.163.21'),
(953, 'Active ', '4 | supervisor | 1', 4, '2017-10-24 12:53:52', '182.253.163.21'),
(954, 'Add ', '8 | sample news | Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. | Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. | /assets/file_upload/admin/images/banner/Landing-lv.jpg |  |  | ', 4, '2017-10-24 13:01:05', '182.253.163.21'),
(955, 'Active ', '8 | sample news | 1', 4, '2017-10-24 13:01:09', '182.253.163.21'),
(956, 'Edit ', '8 | sample news | Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit.&nbsp; | Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.<br />\r\n<br />\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.<br />\r\n<br />\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. | /assets/file_upload/admin/images/banner/Landing-lv.jpg | sample-news |  | ', 4, '2017-10-24 13:01:37', '182.253.163.21'),
(957, 'Add ', '7 | latihan tester | company profile pdf | Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Proin eget tortor risus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor volutpat. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Pellentesque in ipsum id orci porta dapibus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. | /assets/file_upload/admin/images/banner/carreer.jpg | latihan-tester |  | ', 4, '2017-10-24 13:05:11', '182.253.163.21'),
(958, 'Active ', '7 | latihan tester | 1', 4, '2017-10-24 13:05:14', '182.253.163.21'),
(959, 'Delete ', '7 | latihan tester', 4, '2017-10-24 13:06:28', '182.253.163.21'),
(960, 'Inactive ', '3 | test career1 | 0', 4, '2017-10-24 13:08:26', '182.253.163.21'),
(961, 'Inactive ', '4 | supervisor | 0', 4, '2017-10-24 13:08:28', '182.253.163.21'),
(962, 'Active ', '4 | supervisor | 1', 4, '2017-10-24 13:08:38', '182.253.163.21'),
(963, 'Edit ', '4 | supervisor | sample lowongan<br />\r\nlorem ipsum dolor sit amet | Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. | supervisor |  | ', 4, '2017-10-24 13:41:56', '182.253.163.25'),
(964, 'Login', 'superadmin | 1', 1, '2017-10-24 13:44:24', '182.253.163.25'),
(965, 'Edit ', '4 | supervisor | sample lowongan, lorem ipsum dolor sit amet&nbsp;<span style=\"color: rgb(0, 0, 0); font-family: Times; font-size: medium;\">Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Cura</span> | Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. | supervisor |  | ', 4, '2017-10-24 13:58:48', '182.253.163.25'),
(966, 'Edit ', '3 | test career1 | Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Lorem ipsum dolor sit amet, consectetur adipiscing elit. | Vivamus suscipit tortor eget felis porttitor volutpat. Curabitur aliquet quam id dui posuere blandit. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. |  | test career1 | test career1', 4, '2017-10-24 14:00:45', '182.253.163.25'),
(967, 'Edit ', '4 | supervisor | sample lowongan, lorem ipsum dolor sit amet | Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. | supervisor |  | ', 4, '2017-10-24 14:01:08', '182.253.163.25'),
(968, 'Login', 'superadmin | 1', 1, '2017-10-25 09:33:43', '222.124.63.61'),
(969, 'Login', 'Balkat | 1', 4, '2017-10-25 12:53:00', '112.215.238.144'),
(970, 'Add Banner', '19 | BANNER04 | /assets/file_upload/admin/images/banner/Landing-lv.jpg | 1 | WWW.GOOGLE.COM', 4, '2017-10-25 13:02:43', '112.215.238.144'),
(971, 'Active Banner', '19 | BANNER04 | 1', 4, '2017-10-25 13:02:47', '112.215.238.144'),
(972, 'Delete Banner', '19 | BANNER04', 4, '2017-10-25 13:03:15', '112.215.238.144'),
(973, 'Login', 'superadmin | 1', 1, '2017-10-25 13:19:06', '36.69.229.147'),
(974, 'Logout', 'Balkat | 1', 4, '2017-10-25 13:40:32', '222.124.63.61'),
(975, 'Login', 'Balkat | 1', 4, '2017-10-25 13:49:36', '222.124.63.61'),
(976, 'Login', 'superadmin | 1', 1, '2017-10-25 13:51:56', '222.124.63.61'),
(977, 'Login', 'superadmin | 1', 1, '2017-10-25 13:54:32', '222.124.63.61'),
(978, 'Add User Level', 'training admin | training', 4, '2017-10-25 13:56:17', '222.124.63.61'),
(979, 'Active User Level', '6 | training admin | 1', 4, '2017-10-25 13:56:20', '222.124.63.61'),
(980, 'Add User', '6 | training | david@balkat.com', 4, '2017-10-25 13:56:51', '222.124.63.61'),
(981, 'Active User', '5 | training | 1', 4, '2017-10-25 13:56:56', '222.124.63.61'),
(982, 'Logout', 'Balkat | 1', 4, '2017-10-25 13:57:46', '222.124.63.61'),
(983, 'Login', 'training | 6', 5, '2017-10-25 13:57:59', '222.124.63.61'),
(984, 'Logout', 'training | 6', 5, '2017-10-25 13:58:13', '222.124.63.61'),
(985, 'Login', 'Balkat | 1', 4, '2017-10-25 13:58:24', '222.124.63.61'),
(986, 'Delete User Level', '6 | training admin', 4, '2017-10-25 13:59:17', '222.124.63.61'),
(987, 'Add Banner', '20 | test banner | /assets/file_upload/admin/images/banner/banner-career.jpg | 1 | ', 4, '2017-10-25 14:03:23', '222.124.63.61'),
(988, 'Add Banner', '21 | test banner | /assets/file_upload/admin/images/banner/banner-career.jpg | 1 | ', 4, '2017-10-25 14:03:35', '222.124.63.61'),
(989, 'Add Banner', '22 | test banner | /assets/file_upload/admin/images/banner/banner-career.jpg | 1 | ', 4, '2017-10-25 14:03:55', '222.124.63.61'),
(990, 'Add Banner', '23 | test banner | /assets/file_upload/admin/images/banner/banner-career.jpg | 1 | ', 4, '2017-10-25 14:04:58', '222.124.63.61'),
(991, 'Delete Banner', '21 | test banner', 4, '2017-10-25 14:05:13', '222.124.63.61'),
(992, 'Delete Banner', '22 | test banner', 4, '2017-10-25 14:05:17', '222.124.63.61'),
(993, 'Delete Banner', '23 | test banner', 4, '2017-10-25 14:05:19', '222.124.63.61'),
(994, 'Active Banner', '20 | test banner | 1', 4, '2017-10-25 14:05:23', '222.124.63.61'),
(995, 'Add ', '30 | banner 2 |  |  | /assets/file_upload/admin/images/banner/1366X300.jpg |  |  | ', 4, '2017-10-25 14:13:39', '112.215.238.144'),
(996, 'Active ', '30 | banner 2 | 1', 4, '2017-10-25 14:13:47', '112.215.238.144'),
(997, 'Delete ', '30 | banner 2', 4, '2017-10-25 14:15:28', '112.215.238.144'),
(998, 'Add ', '10 | test |  | lorem ipsum |  |  | ', 4, '2017-10-25 14:18:29', '112.215.238.144'),
(999, 'Active ', '10 | test | 1', 4, '2017-10-25 14:18:32', '112.215.238.144'),
(1000, 'Delete ', '10 | ', 4, '2017-10-25 14:18:56', '112.215.238.144'),
(1001, 'Add ', '9 | contoh newss | lorem iposum dolor sit amet | Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus.<br />\r\n<br />\r\nQuisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan tincidunt. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus.<br />\r\n<br />\r\nDonec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada.<br />\r\n<br />\r\nNulla porttitor accumsan tincidunt. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta. | /assets/file_upload/admin/images/Projects/5cepu.jpg | beritahari |  | ', 4, '2017-10-25 14:22:16', '112.215.238.144'),
(1002, 'Active ', '9 | contoh newss | 1', 4, '2017-10-25 14:23:24', '112.215.238.144'),
(1003, 'Edit ', '4 | GORGA SIMANULLANG | President Director | Experienced in Oil &amp; Gas and others Industries more than 20 years, Bachelor Degree from ISTN Majoring in Electronics Engineering Physics , Diploma engineering from Polytechnic&ndash;ITB |  |  |  | ', 4, '2017-10-25 14:26:30', '112.215.238.144'),
(1004, 'Edit ', '4 | GORGA SIMANULLANG | President Director | Experienced in Oil &amp; Gas and others Industries more than 20 years, Bachelor Degree from ISTN Majoring in Electronics Engineering Physics , Diploma engineering from Polytechnic&ndash;ITB |  |  |  | ', 4, '2017-10-25 14:26:35', '112.215.238.144'),
(1005, 'Edit ', '1 | M. RIFKI ASFARI | Health & Safety Co-ordinator | Experienced in Safety Management System and Business Development more than 2 years. |  |  |  | ', 4, '2017-10-25 14:26:57', '112.215.238.144'),
(1006, 'Edit ', '3 | JOELIANTI DWI SUPRAPTININGSIH | Commissioner | Having lot of experience in Financial Management, also working part time as Lecturer in more University in Jakarta |  |  |  | ', 4, '2017-10-25 14:27:10', '112.215.238.144'),
(1007, 'Add ', '81 | test aja | maintenance | lajbcoubroiwecp |  | 2revjakarta |  | pertamina, konstruksi', 4, '2017-10-25 14:35:09', '112.215.238.144'),
(1008, 'Active ', '81 | test aja | 1', 4, '2017-10-25 14:35:18', '112.215.238.144'),
(1009, 'Edit ', '81 | test aja | maintenance | lajbcoubroiwecp |  | 2revjakarta |  | pertamina, konstruksi', 4, '2017-10-25 14:35:53', '112.215.238.144'),
(1010, 'Delete ', '81 | test aja', 4, '2017-10-25 14:37:00', '112.215.238.144'),
(1011, 'Add ', '82 | Fire &amp; Gas Detection | Fire & Gas Detection | Fire &amp; Gas Detection Installation |  | PHE WMO KE #5 | PHEWMO | PHEWMO', 1, '2017-10-25 14:42:44', '110.137.207.253'),
(1012, 'Edit ', '7 | ENGINEERING &amp; SERVICE DIVISION | dasdsadadasdsadsa | As a longstanding partner to various industries we can draw on experienced project teams at our locations with outstanding levels of expertise. Our teams are the guarantee for a high-level of professionalism from conceptual development through to system commissioning. By providing the right mix of services that help increase productivity, optimize plant assets and improve financial, we have successfully completed and delivered numerous projects that meets and exceeds our client&#39;s expectation. You can rely on our team to provide a full scope of capabilities to deliver the solutions and services you need now and in the future<br />\r\n&nbsp; |  |  | ', 4, '2017-10-25 14:44:27', '112.215.238.144'),
(1013, 'Edit ', '9 | EXPERIENCE LIST |  | TABEL |  | fafa | fdafa', 4, '2017-10-25 14:44:46', '112.215.238.144'),
(1014, 'Active ', '82 | Fire &amp; Gas Detection | 1', 1, '2017-10-25 14:45:52', '110.137.207.253'),
(1015, 'Add ', '5 | driver | dibutuhkan sopir 24 jam | Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Nulla quis lorem ut libero malesuada feugiat. Nulla quis lorem ut libero malesuada feugiat. Sed porttitor lectus nibh. Quisque velit nisi, pretium ut lacinia in, elementum id enim. Vivamus suscipit tortor eget felis porttitor volutpat. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Nulla quis lorem ut libero malesuada feugiat. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui.<br />\r\n<br />\r\nNulla porttitor accumsan tincidunt. Curabitur aliquet quam id dui posuere blandit. Nulla quis lorem ut libero malesuada feugiat. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Donec sollicitudin molestie malesuada. Curabitur aliquet quam id dui posuere blandit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem.<br />\r\n<br />\r\nMauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Curabitur aliquet quam id dui posuere blandit. Donec sollicitudin molestie malesuada. Sed porttitor lectus nibh. Curabitur aliquet quam id dui posuere blandit. Proin eget tortor risus. Proin eget tortor risus. Cras ultricies ligula sed magna dictum porta. Vivamus suscipit tortor eget felis porttitor volutpat. Sed porttitor lectus nibh.<br />\r\n<br />\r\nDonec rutrum congue leo eget malesuada. Curabitur arcu erat, accumsan id imperdiet et, porttitor at sem. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Proin eget tortor risus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Proin eget tortor risus. |  |  | ', 4, '2017-10-25 14:47:42', '112.215.238.144'),
(1016, 'Active ', '5 | driver | 1', 4, '2017-10-25 14:47:47', '112.215.238.144'),
(1017, 'Delete ', '30 | ', 4, '2017-10-25 14:56:51', '112.215.238.144'),
(1018, 'Delete ', '3 | test career1', 4, '2017-10-25 15:01:10', '112.215.238.144'),
(1019, 'Add Banner', '24 | tttt | /assets/file_upload/admin/images/banner/banner-career.jpg | 1 | http://caleb-technology.com/training-dcs-experion-lx-c300', 4, '2017-10-25 15:10:52', '112.215.238.144'),
(1020, 'Active Banner', '24 | tttt | 1', 4, '2017-10-25 15:13:49', '112.215.238.144'),
(1021, 'Login', 'superadmin | 1', 1, '2017-10-26 09:16:24', '110.137.207.253'),
(1022, 'Delete Banner', '24 | tttt', 1, '2017-10-26 09:17:51', '110.137.207.253'),
(1023, 'Delete Banner', '20 | test banner', 1, '2017-10-26 09:17:56', '110.137.207.253'),
(1024, 'Login', 'superadmin | 1', 1, '2017-10-26 09:41:22', '110.137.207.253'),
(1025, 'Edit ', '24 | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | <span style=\"background-color:#0000FF;\">Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources</span> | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | /assets/file_upload/admin/images/banner/trainingaaa.jpg |  |  | ', 1, '2017-10-26 10:06:36', '110.137.207.253'),
(1026, 'Inactive ', '24 | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | 0', 1, '2017-10-26 10:07:21', '110.137.207.253'),
(1027, 'Edit ', '24 | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | <span style=\"color:#0000FF;\">Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources</span> | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | /assets/file_upload/admin/images/banner/trainingaaa.jpg |  |  | ', 1, '2017-10-26 10:08:48', '110.137.207.253'),
(1028, 'Active ', '24 | Improve Your Skills, Attend Our Trainings, Keep Updated with the Latest Control System Engineering Practices and Use Valuable Technical Education Resources | 1', 1, '2017-10-26 10:08:51', '110.137.207.253'),
(1029, 'Logout', 'superadmin | 1', 1, '2017-10-26 10:13:22', '110.137.207.253'),
(1030, 'Login', 'superadmin | 1', 1, '2017-10-26 10:14:07', '110.137.207.253'),
(1031, 'Inactive ', '21 | Content Title | 0', 1, '2017-10-26 10:15:58', '110.137.207.253'),
(1032, 'Edit ', '21 | Content Title |  |  | /assets/file_upload/admin/images/banner/career-caleb.jpg | dasdsa | Lowongan pekerjaan PT Caleb Technology | job, career, teamwork, work, salary, positive', 1, '2017-10-26 10:16:27', '110.137.207.253'),
(1033, 'Active ', '21 | Content Title | 1', 1, '2017-10-26 10:16:33', '110.137.207.253'),
(1034, 'Add ', 'About_head_quote | Careers Head Content Here', 1, '2017-10-26 10:16:36', '110.137.207.253'),
(1035, 'Login', 'superadmin | 1', 1, '2017-10-30 15:13:51', '182.253.163.25'),
(1036, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | http://caleb-technology.com', 1, '2017-10-30 15:14:36', '182.253.163.25'),
(1037, 'Inactive Banner', '18 | Homebanner 03 | 0', 1, '2017-10-30 15:14:39', '182.253.163.25'),
(1038, 'Active Banner', '18 | Homebanner 03 | 1', 1, '2017-10-30 15:14:40', '182.253.163.25'),
(1039, 'Login', 'Balkat | 1', 4, '2017-10-30 15:25:58', '182.253.163.25'),
(1040, 'Login', 'superadmin | 1', 1, '2017-10-31 15:24:45', '180.244.167.47'),
(1041, 'Inactive ', '5 | driver | 0', 1, '2017-10-31 15:26:14', '180.244.167.47'),
(1042, 'Inactive ', '4 | supervisor | 0', 1, '2017-10-31 15:26:19', '180.244.167.47'),
(1043, 'Add ', 'About_head_quote | Currently No Vacancies', 1, '2017-10-31 15:33:51', '180.244.167.47'),
(1044, 'Login', 'superadmin | 1', 1, '2017-11-01 10:17:20', '118.96.36.241'),
(1045, 'Login', 'superadmin | 1', 1, '2017-11-01 17:06:11', '222.124.57.82'),
(1046, 'Login', 'superadmin | 1', 1, '2017-11-03 09:03:01', '110.136.35.225'),
(1047, 'Login', 'superadmin | 1', 1, '2017-11-07 16:07:11', '180.242.129.209'),
(1048, 'Edit ', '21 | Content Title |  |  | /assets/file_upload/admin/images/Oil well pict.jpeg | https://images.search.yahoo.com/search/images;_ylt=AwrTcXzXeAFaUVsAu2KJzbkF;_ylu=X3oDMTBsZ29xY3ZzBHNlYwNzZWFyY2gEc2xrA2J1dHRvbg--;_ylc=X1MDOTYwNjI4NTcEX3IDMgRhY3RuA2NsawRiY2sDNG9ldGRtMWNwbmZlOCUyNmIlM0QzJTI2cyUzRGVqBGNzcmNwdmlkAzM0RWFCVEV3TGpKTU82MndXWnU5eUFIeE1UZ3dMZ0FBQUFEMklybUgEZnIDdGlnaHRyb3BldGIEZnIyA3NhLWdwBGdwcmlkAwRtdGVzdGlkA251bGwEbl9zdWdnAzAEb3JpZ2luA2ltYWdlcy5zZWFyY2gueWFob28uY29tBHBvcwMwBHBxc3RyAwRwcXN0cmwDBHFzdHJsAzE1BHF1ZXJ5A29pbCBnYXMgY29tcGFueQR0X3N0bXADMTUxMDA0NTkxNAR2dGVzdGlkA251bGw-?pvid=34EaBTEwLjJMO62wWZu9yAHxMTgwLgAAAAD2IrmH&amp;p=oil+gas+company&amp;fr=tightropetb&amp;fr2=sb-top-images.search.yahoo.com&amp;ei=UTF-8&amp;n=60&amp;x=wrt#id=43&amp;iurl=http://oil-and-gas.regionaldirectory.us/oil-well-720.jpg&amp;action=click | Lowongan pekerjaan PT Caleb Technology | job, career, teamwork, work, salary, positive', 1, '2017-11-07 16:19:52', '180.242.129.209'),
(1049, 'Delete ', '5 | driver', 1, '2017-11-07 16:20:15', '180.242.129.209'),
(1050, 'Add ', 'About_head_quote | We&#039;re looking for a competent SIS Engineer', 1, '2017-11-07 16:29:11', '180.242.129.209'),
(1051, 'Edit ', '4 | supervisor |  | Responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. |  |  | ', 1, '2017-11-07 16:32:00', '180.242.129.209'),
(1052, 'Delete ', '4 | supervisor', 1, '2017-11-07 16:32:18', '180.242.129.209'),
(1053, 'Add ', '6 | SIS Engineer |  | Responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. |  |  | ', 1, '2017-11-07 16:33:12', '180.242.129.209'),
(1054, 'Add ', 'About_head_quote | Continuing education is a shared responsibility at Caleb Technology, and we make every effort to facilitate a learning environment by continually adding new programs and looking for new ways to learn', 1, '2017-11-07 16:34:52', '180.242.129.209'),
(1055, 'Active ', '6 | SIS Engineer | 1', 1, '2017-11-07 16:35:49', '180.242.129.209'),
(1056, 'Inactive ', '6 | SIS Engineer | 0', 1, '2017-11-07 16:37:04', '180.242.129.209'),
(1057, 'Active ', '6 | SIS Engineer | 1', 1, '2017-11-07 16:37:09', '180.242.129.209'),
(1058, 'Add ', 'About_head_quote | We&#039;re looking for a competent SIS Engineer', 1, '2017-11-07 16:37:19', '180.242.129.209'),
(1059, 'Add ', 'CareerQuote | Career with Caleb Technology | We offers you the opportunity to join us and expand the talent, professionalism and experience in the Mechanical Electrical industry.', 1, '2017-11-07 16:37:25', '180.242.129.209'),
(1060, 'Inactive ', '6 | SIS Engineer | 0', 1, '2017-11-07 16:40:04', '180.242.129.209'),
(1061, 'Active ', '6 | SIS Engineer | 1', 1, '2017-11-07 16:40:11', '180.242.129.209'),
(1062, 'Edit ', '6 | SIS Engineer |  | Responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis-engineer |  | ', 1, '2017-11-07 16:40:57', '180.242.129.209'),
(1063, 'Inactive ', '6 | SIS Engineer | 0', 1, '2017-11-07 16:41:36', '180.242.129.209'),
(1064, 'Active ', '6 | SIS Engineer | 1', 1, '2017-11-07 16:41:42', '180.242.129.209'),
(1065, 'Edit ', '6 | SIS Engineer | SIS Engineer | Responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis-engineer |  | ', 1, '2017-11-07 16:43:08', '180.242.129.209'),
(1066, 'Inactive ', '6 | SIS Engineer | 0', 1, '2017-11-07 16:44:22', '180.242.129.209'),
(1067, 'Active ', '6 | SIS Engineer | 1', 1, '2017-11-07 16:44:32', '180.242.129.209'),
(1068, 'Inactive ', '6 | SIS Engineer | 0', 1, '2017-11-07 16:44:50', '180.242.129.209'),
(1069, 'Active ', '6 | SIS Engineer | 1', 1, '2017-11-07 16:45:02', '180.242.129.209'),
(1070, 'Edit ', '6 | SIS Engineer | Looking For SIS Engineer | Responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis-engineer |  | ', 1, '2017-11-07 16:46:11', '180.242.129.209'),
(1071, 'Edit ', '6 | SIS Engineer | Looking For SIS Engineer | Responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis engineer | SIS Engineer | SIS Engineer', 1, '2017-11-07 16:48:38', '180.242.129.209'),
(1072, 'Edit ', '6 | SIS Engineer | We&#39;re looking for a competent SIS Engineer | Have experienced at least 2 years as SIS engineer with responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis-engineer | SIS Engineer | SIS Engineer', 1, '2017-11-07 16:58:26', '180.242.129.209'),
(1073, 'Add ', 'About_head_quote | Vacancies', 1, '2017-11-07 17:00:14', '180.242.129.209'),
(1074, 'Login', 'superadmin | 1', 1, '2017-11-08 07:57:26', '180.242.129.209'),
(1075, 'Edit ', '6 | SIS Engineer | We&#39;re looking for competent SIS Engineers | Have experienced at least 2 years as SIS engineer with responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis-engineer | SIS Engineer | SIS Engineer', 1, '2017-11-08 08:00:12', '180.242.129.209'),
(1076, 'Login', 'superadmin | 1', 1, '2017-11-13 16:01:34', '110.138.149.159'),
(1077, 'Add ', '7 | Contractor Representative | Dibutuhkan lulusan Sarjana Teknik dengan pengalaman sebagai Project Manager/Team Leader | Tugas &amp; Tanggung Jawab&nbsp; Utama :\r\n<ol>\r\n	<li>Sebagai Koordinasi dan Wakil KONTRAKTOR</li>\r\n	<li>Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN</li>\r\n	<li>Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi pekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.</li>\r\n	<li>Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAN, termasuk didalamnya CHSEMS, ERP, EMT, Compliance dll</li>\r\n	<li>Berkantor di area Gresik/ Surabaya</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Lulusan Sarjana Teknik atau sederajat dan memiliki pengalaman sebagai Project Manager/Supervisor/Team Leader/Sejenis di bidang engineering atau proyek minimal 5 tahun.</li>\r\n	<li>Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses, memahami prosedur standar, spesifikasi dan metode kerja.</li>\r\n	<li>Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan datasheet.</li>\r\n	<li>Memiliki pengetahuan lanjut mengenai keselamatan kerja.</li>\r\n</ol> |  |  | ', 1, '2017-11-13 16:25:37', '110.138.149.159'),
(1078, 'Active ', '7 | Contractor Representative | 1', 1, '2017-11-13 16:25:59', '110.138.149.159'),
(1079, 'Edit ', '7 | Contractor Representative | Dibutuhkan lulusan Sarjana Teknik/Sederajat dengan pengalaman sebagai Project Manager/Team Leader | Tugas &amp; Tanggung Jawab&nbsp; Utama :\r\n<ol>\r\n	<li>Sebagai Koordinasi dan Wakil KONTRAKTOR</li>\r\n	<li>Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN</li>\r\n	<li>Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi pekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.</li>\r\n	<li>Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAN, termasuk didalamnya CHSEMS, ERP, EMT, Compliance dll</li>\r\n	<li>Berkantor di area Gresik/ Surabaya</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Lulusan Sarjana Teknik atau sederajat dan memiliki pengalaman sebagai Project Manager/Supervisor/Team Leader/Sejenis di bidang engineering atau proyek minimal 5 tahun.</li>\r\n	<li>Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses, memahami prosedur standar, spesifikasi dan metode kerja.</li>\r\n	<li>Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan datasheet.</li>\r\n	<li>Memiliki pengetahuan lanjut mengenai keselamatan kerja.</li>\r\n</ol> | contractor-representative |  | ', 1, '2017-11-13 16:28:40', '110.138.149.159'),
(1080, 'Add ', '8 | Instrument &amp; Control Engineer | Dibutuhkan Sarjana Teknik/Sederajat yang berpengalaman sebagai Instrument dan Control Engineer minimal 4 tahun | Tugas dan Tanggung Jawab Utama :\r\n<ol>\r\n	<li>Mengontrol dan mengkoordinasikan keseluruhan pelaksanaan pekerjaan dilapangan, termasuk memberikan technical support.</li>\r\n	<li>Membuat dan melaporkan hasil assessment, rekomendasi dan tindak lanjut pekerjaan serta kebutuhan material dari suatu program/proyek kepada Wakil Perusahaan dan Wakil Kontraktor.</li>\r\n	<li>Membuat, mengontrol, dan melaporkan perencanaan pekerjaan dan implementasi prosedur kerja kontraktor kepada Wakil Perusahaan dan Wail Kontraktor.</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Lulusan Sarjana Teknik atau sederajat dan memiliki pengalaman sebagai Instrument &amp; Control Engineer/sejenis minimal 4 tahun.</li>\r\n	<li>Memiliki kompetensi terkait life cycle system, cost assesment, alarm benchmarking, proses kontrol security, functional safety survey, troubleshoot and root cause analysis, control power system, system assessment.</li>\r\n	<li>Berkompeten dibidang instrumentasi dan proses khususnya field instrument devices.</li>\r\n	<li>Memiliki kompetensi dalam pemprograman PLC AB, wonderware, termasuk lokal control system.</li>\r\n	<li>Familiar dengan spesifikasi, datasheet, diagram, dan gambar teknik.</li>\r\n	<li>Memiliki Pengetahuan lanjut mengenai keselamatan kerja</li>\r\n</ol> |  |  | ', 1, '2017-11-13 16:40:43', '110.138.149.159'),
(1081, 'Active ', '8 | Instrument &amp; Control Engineer | 1', 1, '2017-11-13 16:40:53', '110.138.149.159'),
(1082, 'Add ', '9 | Teknisi | Dibutuhkan lulusan Diploma III/SMU sederajat dengan pengalaman sebagai Teknisi 4-6 tahun. | Tugas dan Tanggung Jawab :\r\n<ol>\r\n	<li>Mengontrol dan mengkoordinasikan keseluruhan pelaksanaan pekerjaan dilapangan.</li>\r\n	<li>Sebagai pimpinan pelaksanaan pekerjaan dari Team Kontraktor, baik di lapangan maupun di kantor.</li>\r\n	<li>Memastikan dan melaksanakan pekerjaan sesuai dengan standar Perusahaan, serta taat pada peraturan Perusahaan.</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Diploma III atau setara dengan pengalaman minimal 4 tahun, atau SMU/sederajat dengan pengalaman minimal 6 tahun.</li>\r\n	<li>Memiliki kompetensi dibidang instrumentasi dan proses khususnya field instrument devices &amp; control system (khususnya PLC AB).</li>\r\n	<li>Familiar dengan spesifikasi, datasheet, diagram, dan gambar teknik.</li>\r\n	<li>Memiliki pengetahuan keselamatan kerja.</li>\r\n</ol> |  |  | ', 1, '2017-11-13 16:47:54', '110.138.149.159'),
(1083, 'Active ', '9 | Teknisi | 1', 1, '2017-11-13 16:47:59', '110.138.149.159'),
(1084, 'Edit ', '8 | Instrument &amp; Control Engineer | Dibutuhkan lulusan Sarjana Teknik/Sederajat yang berpengalaman sebagai Instrument dan Control Engineer minimal 4 tahun | Tugas dan Tanggung Jawab Utama :\r\n<ol>\r\n	<li>Mengontrol dan mengkoordinasikan keseluruhan pelaksanaan pekerjaan dilapangan, termasuk memberikan technical support.</li>\r\n	<li>Membuat dan melaporkan hasil assessment, rekomendasi dan tindak lanjut pekerjaan serta kebutuhan material dari suatu program/proyek kepada Wakil Perusahaan dan Wakil Kontraktor.</li>\r\n	<li>Membuat, mengontrol, dan melaporkan perencanaan pekerjaan dan implementasi prosedur kerja kontraktor kepada Wakil Perusahaan dan Wail Kontraktor.</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Lulusan Sarjana Teknik atau sederajat dan memiliki pengalaman sebagai Instrument &amp; Control Engineer/sejenis minimal 4 tahun.</li>\r\n	<li>Memiliki kompetensi terkait life cycle system, cost assesment, alarm benchmarking, proses kontrol security, functional safety survey, troubleshoot and root cause analysis, control power system, system assessment.</li>\r\n	<li>Berkompeten dibidang instrumentasi dan proses khususnya field instrument devices.</li>\r\n	<li>Memiliki kompetensi dalam pemprograman PLC AB, wonderware, termasuk lokal control system.</li>\r\n	<li>Familiar dengan spesifikasi, datasheet, diagram, dan gambar teknik.</li>\r\n	<li>Memiliki Pengetahuan lanjut mengenai keselamatan kerja</li>\r\n</ol> | instrument--control-engineer |  | ', 1, '2017-11-13 16:48:58', '110.138.149.159'),
(1085, 'Login', 'superadmin | 1', 1, '2018-02-01 11:01:51', '180.252.118.109'),
(1086, 'Edit ', '6 | SIS Engineer | We&#39;re looking for competent SIS Engineers | Have experienced at least 2 years as SIS engineer with responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis-engineer | SIS Engineer | SIS Engineer', 1, '2018-02-01 11:04:34', '180.252.118.109'),
(1087, 'Edit ', '7 | Contractor Representative | Dibutuhkan lulusan Sarjana Teknik/Sederajat dengan pengalaman sebagai Project Manager/Team Leader | Tugas &amp; Tanggung Jawab&nbsp; Utama :\r\n<ol>\r\n	<li>Sebagai Koordinasi dan Wakil KONTRAKTOR</li>\r\n	<li>Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN</li>\r\n	<li>Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi pekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.</li>\r\n	<li>Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAN, termasuk didalamnya CHSEMS, ERP, EMT, Compliance dll</li>\r\n	<li>Berkantor di area Gresik/ Surabaya</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Lulusan Sarjana Teknik atau sederajat dan memiliki pengalaman sebagai Project Manager/Supervisor/Team Leader/Sejenis di bidang engineering atau proyek minimal 5 tahun.</li>\r\n	<li>Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses, memahami prosedur standar, spesifikasi dan metode kerja.</li>\r\n	<li>Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan datasheet.</li>\r\n	<li>Memiliki pengetahuan lanjut mengenai keselamatan kerja.</li>\r\n</ol> | contractor-representative |  | ', 1, '2018-02-01 11:09:07', '180.252.118.109'),
(1088, 'Edit ', '6 | SIS Engineer | We&#39;re looking for competent SIS Engineers | Have experienced at least 2 years as SIS engineer with responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis-engineer | SIS Engineer | SIS Engineer', 1, '2018-02-01 11:10:10', '180.252.118.109'),
(1089, 'Login', 'superadmin | 1', 1, '2018-02-01 11:10:46', '180.252.118.109'),
(1090, 'Login', 'superadmin | 1', 1, '2018-02-01 15:12:43', '180.252.118.109'),
(1091, 'Add ', '10 | SALES AND PROCUREMENT SUPERVISORY | Looking for Sales and Procurement Supervisory | Sales &amp; Procurement Supervisory<br />\r\nRequirement:<br />\r\n- Good knowledge and connection in oil-gas/Instrument engineering product<br />\r\n- Proven sales and procurement experience Oil &amp; Gas<br />\r\n- Pricing stategy negotiation<br />\r\n- Good communication and organizational skills<br />\r\n- Ability to build relationships with suppliers and customers<br />\r\n- Able to drive vehicle<br />\r\n- Technical background degree education<br />\r\n<br />\r\nJob Description:<br />\r\n- Build customer supplying material<br />\r\n- Manage the third party procurement customer oil-gas<br />\r\n- Develop sales strategies for the third party<br />\r\n- Negotiate for the best prices for all orders<br />\r\n- Arrange achieve target per month |  |  | ', 1, '2018-02-01 15:28:16', '180.252.118.109'),
(1092, 'Edit ', '10 | SALES AND PROCUREMENT SUPERVISORY | Looking for Sales and Procurement Supervisory | Sales &amp; Procurement Supervisory<br />\r\nRequirement:<br />\r\n- Good knowledge and connection in oil-gas/Instrument engineering product<br />\r\n- Proven sales and procurement experience Oil &amp; Gas<br />\r\n- Pricing stategy negotiation<br />\r\n- Good communication and organizational skills<br />\r\n- Ability to build relationships with suppliers and customers<br />\r\n- Able to drive vehicle<br />\r\n- Technical background degree education<br />\r\n<br />\r\nJob Description:<br />\r\n- Build customer supplying material<br />\r\n- Manage the third party procurement customer oil-gas<br />\r\n- Develop sales strategies for the third party<br />\r\n- Negotiate for the best prices for all orders<br />\r\n- Arrange achieve target per month | sales-and-procurement-supervisory |  | ', 1, '2018-02-01 15:29:05', '180.252.118.109'),
(1093, 'Edit ', '10 | SALES AND PROCUREMENT SUPERVISORY | Looking for Sales and Procurement Supervisory | Sales &amp; Procurement Supervisory<br />\r\nRequirement:<br />\r\n- Good knowledge and connection in oil-gas/Instrument engineering product<br />\r\n- Proven sales and procurement experience Oil &amp; Gas<br />\r\n- Pricing stategy negotiation<br />\r\n- Good communication and organizational skills<br />\r\n- Ability to build relationships with suppliers and customers<br />\r\n- Able to drive vehicle<br />\r\n- Technical background degree education<br />\r\n<br />\r\nJob Description:<br />\r\n- Build customer supplying material<br />\r\n- Manage the third party procurement customer oil-gas<br />\r\n- Develop sales strategies for the third party<br />\r\n- Negotiate for the best prices for all orders<br />\r\n- Arrange achieve target per month | sales-and-procurement-supervisory |  | ', 1, '2018-02-01 15:30:08', '180.252.118.109'),
(1094, 'Login', 'superadmin | 1', 1, '2018-02-01 16:01:24', '180.252.118.109'),
(1095, 'Login', 'superadmin | 1', 1, '2018-02-01 16:31:35', '180.252.118.109'),
(1096, 'Add ', '11 | SPI Engineer | We need SPI Engineer immediately | SPI Engineer\r\n<p>-Knowledge and Experience with instrument design database software e.g. INTOOLS/SmartPlant Instrumentation (SPI)</p>\r\n\r\n<p>- Familiar with P&amp;ID</p>\r\n\r\n<p>- Famiiar with related documents like Instrument Index, I/O list &amp; Termination</p>\r\n\r\n<p>- Working experience in oil &amp; gas industries</p>\r\n\r\n<p>- Possess logical and analytical approach to problem solving</p>\r\n\r\n<p>&nbsp;</p> |  |  | ', 1, '2018-02-01 16:34:11', '180.252.118.109'),
(1097, 'Active ', '11 | SPI Engineer | 1', 1, '2018-02-01 16:34:33', '180.252.118.109'),
(1098, 'Edit ', '9 | Teknisi | Dibutuhkan lulusan Diploma III/SMU sederajat dengan pengalaman sebagai Teknisi 4-6 tahun. | Tugas dan Tanggung Jawab :\r\n<ol>\r\n	<li>Mengontrol dan mengkoordinasikan keseluruhan pelaksanaan pekerjaan dilapangan.</li>\r\n	<li>Sebagai pimpinan pelaksanaan pekerjaan dari Team Kontraktor, baik di lapangan maupun di kantor.</li>\r\n	<li>Memastikan dan melaksanakan pekerjaan sesuai dengan standar Perusahaan, serta taat pada peraturan Perusahaan.</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Diploma III atau setara dengan pengalaman minimal 4 tahun, atau SMU/sederajat dengan pengalaman minimal 6 tahun.</li>\r\n	<li>Memiliki kompetensi dibidang instrumentasi dan proses khususnya field instrument devices &amp; control system (khususnya PLC AB).</li>\r\n	<li>Familiar dengan spesifikasi, datasheet, diagram, dan gambar teknik.</li>\r\n	<li>Memiliki pengetahuan keselamatan kerja.</li>\r\n</ol> | teknisi |  | ', 1, '2018-02-01 16:45:59', '180.252.118.109'),
(1099, 'Edit ', '9 | Teknisi | Dibutuhkan lulusan Diploma III/SMU sederajat dengan pengalaman sebagai Teknisi 4-6 tahun. | Tugas dan Tanggung Jawab :\r\n<ol>\r\n	<li>Mengontrol dan mengkoordinasikan keseluruhan pelaksanaan pekerjaan dilapangan.</li>\r\n	<li>Sebagai pimpinan pelaksanaan pekerjaan dari Team Kontraktor, baik di lapangan maupun di kantor.</li>\r\n	<li>Memastikan dan melaksanakan pekerjaan sesuai dengan standar Perusahaan, serta taat pada peraturan Perusahaan.</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Diploma III atau setara dengan pengalaman minimal 4 tahun, atau SMU/sederajat dengan pengalaman minimal 6 tahun.</li>\r\n	<li>Memiliki kompetensi dibidang instrumentasi dan proses khususnya field instrument devices &amp; control system (khususnya PLC AB).</li>\r\n	<li>Familiar dengan spesifikasi, datasheet, diagram, dan gambar teknik.</li>\r\n	<li>Memiliki pengetahuan keselamatan kerja.</li>\r\n</ol> | teknisi |  | ', 1, '2018-02-01 17:16:44', '180.252.118.109'),
(1100, 'Login', 'superadmin | 1', 1, '2018-09-03 09:05:30', '115.178.211.237'),
(1101, 'Change Password', 'superadmin | 4b899c080a9caf3f6db724841dedf29a', 1, '2018-09-03 09:06:36', '115.178.211.237'),
(1102, 'Login', 'superadmin | 1', 1, '2018-09-03 09:07:03', '115.178.211.237'),
(1103, 'Logout', 'superadmin | 1', 1, '2018-09-03 09:09:29', '115.178.211.237'),
(1104, 'Login', 'superadmin | 1', 1, '2018-09-03 09:15:18', '115.178.211.237'),
(1105, 'Logout', 'superadmin | 1', 1, '2018-09-03 09:15:32', '115.178.211.237'),
(1106, 'Login', 'superadmin | 1', 1, '2018-09-03 09:18:01', '115.178.211.237'),
(1107, 'Logout', 'superadmin | 1', 1, '2018-09-03 09:23:08', '115.178.211.237'),
(1108, 'Login', 'superadmin | 1', 1, '2018-09-03 09:23:31', '115.178.211.237'),
(1109, 'Logout', 'superadmin | 1', 1, '2018-09-03 09:24:41', '115.178.211.237'),
(1110, 'Login', 'superadmin | 1', 1, '2018-09-03 09:25:05', '115.178.211.237'),
(1111, 'Logout', 'superadmin | 1', 1, '2018-09-03 09:26:26', '115.178.211.237'),
(1112, 'Login', 'superadmin | 1', 1, '2018-09-10 15:24:57', '203.142.78.4'),
(1113, 'Logout', 'superadmin | 1', 1, '2018-09-10 15:25:22', '203.142.78.4'),
(1114, 'Login', 'Balkat | 1', 4, '2018-10-05 14:05:07', '182.253.163.25'),
(1115, 'Edit Banner', '18 | Homebanner 03 | /assets/file_upload/admin/images/banner/caleb00002.jpg | 1 | https://caleb-technology.com/about', 4, '2018-10-05 14:06:02', '182.253.163.25'),
(1116, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | www.google.com', 4, '2018-10-05 14:06:53', '182.253.163.25'),
(1117, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | htpps://www.google.com', 4, '2018-10-05 14:07:15', '182.253.163.25'),
(1118, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | https://www.google.com', 4, '2018-10-05 14:07:55', '182.253.163.25'),
(1119, 'Edit Banner', '17 | Homebanner 02 | /assets/file_upload/admin/images/banner/caleb00003.jpg | 1 | ', 4, '2018-10-05 14:08:24', '182.253.163.25'),
(1120, 'Login', 'Balkat | 1', 4, '2018-10-09 10:32:08', '182.253.96.151'),
(1121, 'Delete User', '3 | admin', 4, '2018-10-09 10:33:02', '182.253.96.151'),
(1122, 'Add User', '3 | caleb | admin@caleb-technology.com', 4, '2018-10-09 10:34:09', '182.253.96.151');
INSERT INTO `tbl_log_cms` (`log_id_cms`, `log_module`, `log_value`, `user_id`, `log_create_date`, `ip`) VALUES
(1123, 'Active User', '6 | caleb | 1', 4, '2018-10-09 10:34:14', '182.253.96.151'),
(1124, 'Logout', 'Balkat | 1', 4, '2018-10-09 10:34:18', '182.253.96.151'),
(1125, 'Login', 'caleb | 3', 6, '2018-10-09 10:34:27', '182.253.96.151'),
(1126, 'Logout', 'caleb | 3', 6, '2018-10-09 10:34:44', '182.253.96.151'),
(1127, 'Login', 'Balkat | 1', 4, '2018-10-09 10:34:53', '182.253.96.151'),
(1128, 'Logout', 'Balkat | 1', 4, '2018-10-09 10:37:19', '182.253.96.151'),
(1129, 'Login', 'caleb | 3', 6, '2018-10-09 10:37:28', '182.253.96.151'),
(1130, 'Login', 'caleb | 3', 6, '2018-10-09 10:39:37', '180.244.137.71'),
(1131, 'Change Password', 'caleb | d7e6f7268da287ac9866e583761033f7', 6, '2018-10-09 10:41:25', '180.244.137.71'),
(1132, 'Login', 'caleb | 3', 6, '2018-10-09 10:41:41', '180.244.137.71'),
(1133, 'Login', 'caleb | 3', 6, '2018-10-09 15:37:42', '180.244.137.71'),
(1134, 'Login', 'superadmin | 1', 1, '2019-06-28 13:43:00', '158.140.187.213'),
(1135, 'Logout', 'superadmin | 1', 1, '2019-06-28 13:43:45', '158.140.187.213'),
(1136, 'Login', 'superadmin | 1', 1, '2019-06-28 15:05:41', '110.138.149.133'),
(1137, 'Edit ', '21 | Candidate For Contractor Representative | PT. CALEB TECHNOLOGY sedang mencari kandidat untuk posisi sebagai <u>CONTRACTOR Representative</u>, dalam pelaksanaan Pekerjaan Maintenance dan Service yg kami sebut ICMS (Provision of Instrument &amp; Control Maintenance Services) | <strong>Tugas &amp; Tanggung Jawab Utama:</strong><br />\r\na. Sebagai Koordinator dan Wakil KONTRAKTOR.<br />\r\nb. Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN.<br />\r\nc. Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi<br />\r\npekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.<br />\r\nd. Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAAN,<br />\r\ntermasuk didalamnya CHSEMS, ERP, EMT, Compliance, dll.<br />\r\ne. Berkantor di area Gresik/Surabaya.<br />\r\n&nbsp;<br />\r\n<strong><u>Svarat Kompetensi:</u></strong><br />\r\na. Lulusan Sarjana Teknik Elektro/ Instrumentasi atau sederajat dan memiliki pengalaman sebagai<br />\r\nProject Manager/Supervisor/Team Leader/Sejenis dibidang engineering atau<br />\r\nproyek minimal 5 tahun.<br />\r\nb. Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses,<br />\r\nmemahami prosedur standar, spesifikasi, dan metode kerja.<br />\r\nc. Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan<br />\r\ndatasheet.<br />\r\nd. Memiliki pengetahuan lanjut mengenai keselamatan kerja.<br />\r\n&nbsp;<br />\r\nSilahkan mengirimkan CV ter update ke alamat email admin@caleb-technology.com | /assets/file_upload/admin/images/Oil well pict.jpeg | https://images.search.yahoo.com/search/images;_ylt=AwrTcXzXeAFaUVsAu2KJzbkF;_ylu=X3oDMTBsZ29xY3ZzBHNlYwNzZWFyY2gEc2xrA2J1dHRvbg--;_ylc=X1MDOTYwNjI4NTcEX3IDMgRhY3RuA2NsawRiY2sDNG9ldGRtMWNwbmZlOCUyNmIlM0QzJTI2cyUzRGVqBGNzcmNwdmlkAzM0RWFCVEV3TGpKTU82MndXWnU5 | Candidate For Contractor&#039;s Representative | job, career, teamwork, work, salary, positive', 1, '2019-06-28 15:25:37', '110.138.149.133'),
(1138, 'Edit ', '21 | Candidate For Contractor Representative | <strong>Tugas &amp; Tanggung Jawab Utama:</strong><br />\r\na. Sebagai Koordinator dan Wakil KONTRAKTOR.<br />\r\nb. Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN.<br />\r\nc. Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi<br />\r\npekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.<br />\r\nd. Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAAN,<br />\r\ntermasuk didalamnya CHSEMS, ERP, EMT, Compliance, dll.<br />\r\ne. Berkantor di area Gresik/Surabaya.<br />\r\n&nbsp;<br />\r\n<strong><u>Svarat Kompetensi:</u></strong><br />\r\na. Lulusan Sarjana Teknik Elektro/ Instrumentasi atau sederajat dan memiliki pengalaman sebagai<br />\r\nProject Manager/Supervisor/Team Leader/Sejenis dibidang engineering atau<br />\r\nproyek minimal 5 tahun.<br />\r\nb. Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses,<br />\r\nmemahami prosedur standar, spesifikasi, dan metode kerja.<br />\r\nc. Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan<br />\r\ndatasheet.<br />\r\nd. Memiliki pengetahuan lanjut mengenai keselamatan kerja.<br />\r\n&nbsp;<br />\r\nSilahkan mengirimkan CV ter update ke alamat email admin@caleb-technology.com | PT. CALEB TECHNOLOGY sedang mencari kandidat untuk posisi sebagai <u>CONTRACTOR Representative</u>, dalam pelaksanaan Pekerjaan Maintenance dan Service yg kami sebut ICMS (Provision of Instrument &amp; Control Maintenance Services) | /assets/file_upload/admin/images/Oil well pict.jpeg | https://images.search.yahoo.com/search/images;_ylt=AwrTcXzXeAFaUVsAu2KJzbkF;_ylu=X3oDMTBsZ29xY3ZzBHNlYwNzZWFyY2gEc2xrA2J1dHRvbg--;_ylc=X1MDOTYwNjI4NTcEX3IDMgRhY3RuA2NsawRiY2sDNG9ldGRtMWNwbmZlOCUyNmIlM0QzJTI2cyUzRGVqBGNzcmNwdmlkAzM0RWFCVEV3TGpKTU82MndXWnU5 | Candidate For Contractor&#039;s Representative | job, career, teamwork, work, salary, positive', 1, '2019-06-28 15:29:05', '110.138.149.133'),
(1139, 'Add ', 'About_head_quote | Vacancies', 1, '2019-06-28 15:33:46', '110.138.149.133'),
(1140, 'Inactive ', '21 | Candidate For Contractor Representative | 0', 1, '2019-06-28 15:34:14', '110.138.149.133'),
(1141, 'Active ', '21 | Candidate For Contractor Representative | 1', 1, '2019-06-28 15:34:25', '110.138.149.133'),
(1142, 'Edit ', '6 | SIS Engineer | We&#39;re looking for competent SIS Engineers | Have experienced at least 2 years as SIS engineer with responsibilities :<br />\r\n1. To develop logic of safety system according to Customer Standard and documents.<br />\r\n2. To integrate safety system with field instrumentation.<br />\r\n3. To integrate safety system with DCS and HMI using SCADA points.<br />\r\n4. To prepare and conduct FAT, SAT, Commissioning and Start-up on safety system.<br />\r\n5. To deliver training to customer about Honeywell safety system.<br />\r\n6. To assist in field instrument pre-comm, commissioning, and plant start-up. | sis-engineer | SIS Engineer | SIS Engineer', 1, '2019-06-28 15:35:03', '110.138.149.133'),
(1143, 'Edit ', '21 | Work With US |  |  | /assets/file_upload/admin/images/Oil well pict.jpeg | https://images.search.yahoo.com/search/images;_ylt=AwrTcXzXeAFaUVsAu2KJzbkF;_ylu=X3oDMTBsZ29xY3ZzBHNlYwNzZWFyY2gEc2xrA2J1dHRvbg--;_ylc=X1MDOTYwNjI4NTcEX3IDMgRhY3RuA2NsawRiY2sDNG9ldGRtMWNwbmZlOCUyNmIlM0QzJTI2cyUzRGVqBGNzcmNwdmlkAzM0RWFCVEV3TGpKTU82MndXWnU5 | Career PT Caleb Technology | job, career, teamwork, work, salary, positive', 1, '2019-06-28 15:41:38', '110.138.149.133'),
(1144, 'Inactive ', '6 | SIS Engineer | 0', 1, '2019-06-28 15:54:39', '110.138.149.133'),
(1145, 'Inactive ', '7 | Contractor Representative | 0', 1, '2019-06-28 15:54:47', '110.138.149.133'),
(1146, 'Active ', '7 | Contractor Representative | 1', 1, '2019-06-28 15:54:55', '110.138.149.133'),
(1147, 'Edit ', '7 | Contractor Representative | Dibutuhkan lulusan Sarjana Teknik/Sederajat dengan pengalaman sebagai Project Manager/Team Leader | Tugas &amp; Tanggung Jawab&nbsp; Utama :\r\n<ol>\r\n	<li>Sebagai Koordinasi dan Wakil KONTRAKTOR</li>\r\n	<li>Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN</li>\r\n	<li>Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi pekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.</li>\r\n	<li>Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAN, termasuk didalamnya CHSEMS, ERP, EMT, Compliance dll</li>\r\n	<li>Berkantor di area Gresik/ Surabaya</li>\r\n</ol>\r\nSyarat Kompetensi :\r\n\r\n<ol>\r\n	<li>Diutamakan berdomisili di Gresik dan sekitarnya.</li>\r\n	<li>Lulusan Sarjana Teknik atau sederajat dan memiliki pengalaman sebagai Project Manager/Supervisor/Team Leader/Sejenis di bidang engineering atau proyek minimal 5 tahun.</li>\r\n	<li>Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses, memahami prosedur standar, spesifikasi dan metode kerja.</li>\r\n	<li>Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan datasheet.</li>\r\n	<li>Memiliki pengetahuan lanjut mengenai keselamatan kerja.</li>\r\n</ol> |  |  | job, career, work, karir, kerja, oil, gas, instrument, control, services', 1, '2019-06-28 16:02:59', '110.138.149.133'),
(1148, 'Edit ', '7 | Contractor Representative | PT. CALEB TECHNOLOGY sedang mencari Candidate untuk posisi sebagai <u>CONTRACTOR Representative</u>, dalam pelaksanaan Pekerjaan ICMS (Provision of Instrument Control Maintenance Services) | <strong><u>Tugas &amp; Tanggung Jawab Utama:</u></strong><br />\r\n<br />\r\na. Sebagai Koordinator dan Wakil KONTRAKTOR.<br />\r\nb. Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN.<br />\r\nc. Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi<br />\r\npekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.<br />\r\nd. Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAAN,<br />\r\ntermasuk didalamnya CHSEMS, ERP, EMT, Compliance, dll.<br />\r\ne. Berkantor di area Gresik/Surabaya.<br />\r\n&nbsp;<br />\r\n<strong><u>Svarat Kompetensi:</u></strong><br />\r\n<br />\r\na. Lulusan Sarjana Teknik Elektro/ Instrumentasi atau sederajat dan memiliki pengalaman sebagai<br />\r\nProject Manager/Supervisor/Team Leader/Sejenis dibidang engineering atau<br />\r\nproyek minimal 5 tahun.<br />\r\nb. Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses,<br />\r\nmemahami prosedur standar, spesifikasi, dan metode kerja.<br />\r\nc. Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan<br />\r\ndatasheet.<br />\r\nd. Memiliki pengetahuan lanjut mengenai keselamatan kerja.<br />\r\n&nbsp;<br />\r\nSilahkan mengirimkan CV ter update ke alamat email admin@caleb-technology.com | https://caleb-technology.com/contractor-representative | Contractor Representative | job, career, work, karir, kerja, oil, gas, instrument, control, services', 1, '2019-06-28 16:14:28', '110.138.149.133'),
(1149, 'Active ', '6 | SIS Engineer | 1', 1, '2019-06-28 16:16:05', '110.138.149.133'),
(1150, 'Edit ', '7 | Contractor Representative | PT. CALEB TECHNOLOGY sedang mencari Candidate untuk posisi sebagai <u>CONTRACTOR Representative</u>, dalam pelaksanaan Pekerjaan ICMS (Provision of Instrument Control Maintenance Services) | <strong><u>Tugas &amp; Tanggung Jawab Utama:</u></strong><br />\r\n<br />\r\na. Sebagai Koordinator dan Wakil KONTRAKTOR.<br />\r\nb. Secara periodik melaporkan status pekerjaan kepada PERUSAHAAN.<br />\r\nc. Memonitor dan mengontrol pelaksanaan pekerjaan di site, termasuk eksekusi<br />\r\npekerjaan, perencanaan dan penjadwalan, analisa dan dokumentasi.<br />\r\nd. Sebagai single contact untuk koordinasi dengan Field HSE PERUSAHAAN,<br />\r\ntermasuk didalamnya CHSEMS, ERP, EMT, Compliance, dll.<br />\r\ne. Berkantor di area Gresik/Surabaya.<br />\r\n&nbsp;<br />\r\n<strong><u>Svarat Kompetensi:</u></strong><br />\r\n<br />\r\na. Lulusan Sarjana Teknik Elektro/ Instrumentasi atau sederajat dan memiliki pengalaman sebagai<br />\r\nProject Manager/Supervisor/Team Leader/Sejenis dibidang engineering atau<br />\r\nproyek minimal 5 tahun.<br />\r\nb. Memiliki kompetensi dibidang engineering khususnya instrumentasi / proses,<br />\r\nmemahami prosedur standar, spesifikasi, dan metode kerja.<br />\r\nc. Familiar dengan spesifikasi material instrument, gambar teknis, proses, dan<br />\r\ndatasheet.<br />\r\nd. Memiliki pengetahuan lanjut mengenai keselamatan kerja.<br />\r\n&nbsp;<br />\r\nSilahkan mengirimkan CV ter update ke alamat email admin@caleb-technology.com |  | Contractor Representative | job, career, work, karir, kerja, oil, gas, instrument, control, services', 1, '2019-06-28 16:21:01', '110.138.149.133');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material`
--

CREATE TABLE `tbl_material` (
  `material_id` int(5) NOT NULL,
  `material_title` varchar(200) NOT NULL,
  `material_image` varchar(250) CHARACTER SET latin1 NOT NULL,
  `material_order` int(2) NOT NULL DEFAULT '1',
  `material_highlight` tinyint(1) NOT NULL,
  `material_active_status` tinyint(1) NOT NULL,
  `material_create_date` datetime NOT NULL,
  `material_update_date` datetime NOT NULL,
  `material_create_by` int(1) NOT NULL,
  `material_update_by` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_material`
--

INSERT INTO `tbl_material` (`material_id`, `material_title`, `material_image`, `material_order`, `material_highlight`, `material_active_status`, `material_create_date`, `material_update_date`, `material_create_by`, `material_update_by`) VALUES
(5, 'Adhi Karya', '/assets/file_upload/admin/images/Logos/AK.png', 10, 1, 0, '2016-09-01 20:31:25', '2017-01-11 03:40:58', 1, 1),
(24, 'Autronica', '/assets/file_upload/admin/images/Logos/autronika.png', 3, 1, 0, '2016-09-29 15:11:13', '2017-10-06 16:03:37', 1, 1),
(25, 'N-Line Valves', '/assets/file_upload/admin/images/Logos/nline.png', 5, 1, 1, '2016-09-29 15:11:57', '2017-01-11 03:40:58', 1, 1),
(26, 'Velan', '/assets/file_upload/admin/images/Logos/velan.png', 4, 1, 1, '2016-09-29 15:12:27', '2017-01-11 03:40:58', 1, 1),
(9, 'Honeywell', '/assets/file_upload/admin/images/Logos/honeywell.png', 1, 1, 1, '2016-09-12 00:12:42', '2017-01-11 03:40:58', 1, 1),
(12, 'Rockwell Automation', '/assets/file_upload/admin/images/Logos/rockwell.png', 2, 1, 1, '2016-09-12 00:13:35', '2017-01-11 03:40:58', 1, 1),
(16, 'Premier oil', '/assets/file_upload/admin/images/Logos/premieroil.png', 6, 1, 0, '2016-09-22 15:25:12', '2017-01-11 03:40:58', 1, 1),
(19, 'Dwisolar', '/assets/file_upload/admin/images/Logos/dwisolar.png', 7, 1, 0, '2016-09-22 15:29:29', '2017-01-11 03:40:58', 1, 1),
(20, 'PHE WMO', '/assets/file_upload/admin/images/Logos/phewmo.png', 8, 1, 0, '2016-09-22 15:38:49', '2017-01-11 03:40:58', 1, 1),
(22, 'Rockwel lab', '/assets/file_upload/admin/images/Logos/rockwell.png', 9, 1, 0, '2016-09-22 15:40:30', '2017-01-11 03:40:58', 1, 1),
(23, 'Pearl', '/assets/file_upload/admin/images/Logos/pearl.png', 1, 1, 0, '2016-09-22 15:41:45', '2017-01-03 05:56:47', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_material_file`
--

CREATE TABLE `tbl_material_file` (
  `material_file_id` int(11) NOT NULL,
  `material_id` int(11) NOT NULL,
  `material_file_title` varchar(255) NOT NULL,
  `material_file` text NOT NULL,
  `material_file_order` int(11) NOT NULL DEFAULT '1',
  `material_file_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `material_file_create_date` datetime NOT NULL,
  `material_file_create_by` int(11) NOT NULL,
  `material_file_update_date` datetime DEFAULT NULL,
  `material_file_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_material_file`
--

INSERT INTO `tbl_material_file` (`material_file_id`, `material_id`, `material_file_title`, `material_file`, `material_file_order`, `material_file_active_status`, `material_file_create_date`, `material_file_create_by`, `material_file_update_date`, `material_file_update_by`) VALUES
(5, 4, 'dsadsadsadsa', 'http://localhost/caleb/assets/file_upload/admin/files/PRIVPOL_SITEMAP_D.pdf', 1, 1, '2016-09-01 15:24:29', 1, '2016-09-01 20:24:45', 1),
(2, 3, 'dsadsadsadsa', 'http://localhost/caleb/assets/file_upload/admin/files/PRIVPOL_SITEMAP_D.pdf', 0, 1, '2016-08-13 20:01:09', 1, '0000-00-00 00:00:00', 0),
(3, 3, 'sadsasa', 'http://localhost/caleb/assets/file_upload/admin/files/PRIVPOL_SITEMAP_D.pdf', 1, 1, '2016-08-13 20:02:52', 1, '0000-00-00 00:00:00', 0),
(4, 3, 'dsadsadsssssssssssssssssssssssss', 'http://localhost/caleb/assets/file_upload/admin/files/CAREER_D.pdf', 1, 1, '2016-08-13 20:02:52', 1, '2016-08-13 20:29:01', 1),
(6, 4, 'dsadsadsa', 'http://localhost/caleb/assets/file_upload/admin/files/CAREER_D.pdf', 1, 1, '2016-09-01 15:24:29', 1, '2016-09-01 20:24:41', 1),
(27, 24, 'Petrochemical Oil Gas ', 'https://1drv.ms/b/s!Anqd-bm1973LgakCJHGSPFgFf4agBQ', 1, 0, '2016-09-29 08:11:13', 1, '2017-01-11 03:37:18', 1),
(28, 25, 'Valves Catalogue', 'https://1drv.ms/b/s!Anqd-bm1973LgakDScd1tD0Rf2lEXw', 1, 0, '2016-09-29 08:11:57', 1, '2017-01-11 03:37:49', 1),
(29, 26, 'General Catalogue', 'https://1drv.ms/b/s!Anqd-bm1973LgakBxFXSRU5Bt_r9Ow', 1, 0, '2016-09-29 08:12:27', 1, '2017-01-11 03:38:12', 1),
(9, 6, '', '', 1, 0, '2016-09-11 17:11:06', 1, '0000-00-00 00:00:00', 0),
(10, 7, '', '', 1, 0, '2016-09-11 17:11:24', 1, '0000-00-00 00:00:00', 0),
(11, 8, '', '', 1, 0, '2016-09-11 17:11:38', 1, '0000-00-00 00:00:00', 0),
(12, 9, 'Field Products', 'https://1drv.ms/b/s!Anqd-bm1973LgakAjDv8DEiK3NyQEA', 1, 1, '2016-09-11 17:12:42', 1, '2017-01-11 03:36:43', 1),
(13, 10, '', '', 1, 0, '2016-09-11 17:13:02', 1, '0000-00-00 00:00:00', 0),
(14, 11, '', '', 1, 0, '2016-09-11 17:13:20', 1, '0000-00-00 00:00:00', 0),
(15, 12, 'Integrated Architecture', 'https://1drv.ms/b/s!Anqd-bm1973LgakE7dAWAVFK9eXpfA', 1, 1, '2016-09-11 17:13:35', 1, '2017-01-11 03:35:43', 1),
(16, 13, '', '', 1, 0, '2016-09-11 17:13:47', 1, '0000-00-00 00:00:00', 0),
(17, 14, '', '', 1, 0, '2016-09-11 17:13:59', 1, '0000-00-00 00:00:00', 0),
(18, 15, '', '', 1, 0, '2016-09-11 17:14:12', 1, '0000-00-00 00:00:00', 0),
(19, 16, '', '', 1, 0, '2016-09-22 08:25:12', 1, '0000-00-00 00:00:00', 0),
(20, 17, '', '', 1, 0, '2016-09-22 08:28:17', 1, '0000-00-00 00:00:00', 0),
(21, 18, '', '', 1, 0, '2016-09-22 08:28:58', 1, '0000-00-00 00:00:00', 0),
(22, 19, '', '', 1, 0, '2016-09-22 08:29:29', 1, '0000-00-00 00:00:00', 0),
(23, 20, '', '', 1, 0, '2016-09-22 08:38:49', 1, '0000-00-00 00:00:00', 0),
(24, 21, '', '', 1, 0, '2016-09-22 08:39:56', 1, '0000-00-00 00:00:00', 0),
(25, 22, '', '', 1, 0, '2016-09-22 08:40:30', 1, '0000-00-00 00:00:00', 0),
(26, 23, '', '', 1, 0, '2016-09-22 08:41:45', 1, '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_menu`
--

CREATE TABLE `tbl_menu` (
  `menu_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `menu_title` varchar(50) NOT NULL,
  `menu_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `menu_url` varchar(500) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `menu_alias` varchar(200) NOT NULL,
  `menu_parent` tinyint(2) NOT NULL DEFAULT '0',
  `menu_sub_parent` int(10) NOT NULL,
  `menu_order` tinyint(2) NOT NULL DEFAULT '1',
  `menu_create_date` datetime NOT NULL,
  `menu_create_by` int(11) NOT NULL,
  `menu_update_date` datetime DEFAULT NULL,
  `menu_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_menu`
--

INSERT INTO `tbl_menu` (`menu_id`, `module_id`, `menu_title`, `menu_active_status`, `menu_url`, `menu_alias`, `menu_parent`, `menu_sub_parent`, `menu_order`, `menu_create_date`, `menu_create_by`, `menu_update_date`, `menu_update_by`) VALUES
(60, 26, 'Material', 1, 'http://localhost/caleb/Material/60/Material', '', 0, 0, 1, '2016-05-16 14:59:05', 1, '2016-08-04 15:09:22', 1),
(59, 15, 'Services', 1, 'http://localhost/balkatweb/Services', 'services', 0, 0, 1, '2016-05-11 14:51:18', 1, '2016-08-16 15:13:22', 1),
(54, 15, 'Projects', 1, 'http://caleb-technology.com/Services/54/Projects', 'projects', 0, 0, 1, '2016-04-14 15:13:42', 1, '2017-10-23 14:22:53', 4),
(55, 15, 'Works', 1, 'http://localhost/balkatweb/Works', '', 0, 0, 2, '2016-04-14 15:17:29', 1, '2016-05-11 00:54:49', 1),
(61, 17, 'Career', 1, 'http://localhost/caleb/Career/61/Career', 'career', 0, 0, 1, '2016-08-16 15:10:08', 1, '2016-08-16 15:13:33', 1),
(62, 29, 'About', 1, 'http://localhost/caleb/About/62/About', 'about', 0, 0, 1, '2016-08-31 15:40:32', 1, '2016-09-07 18:23:15', 1),
(63, 30, 'Team', 1, 'http://localhost/caleb/Team/63/Team', 'team', 0, 0, 1, '2016-08-31 21:10:07', 1, '2016-09-07 18:23:18', 1),
(64, 35, 'Training', 1, 'http://devcaleb.balkat.com/Training/64/Training', 'training', 0, 0, 1, '2016-09-07 18:22:23', 1, '2016-09-07 18:23:09', 1),
(65, 31, 'News', 1, 'http://devcaleb.balkat.com/News/65/News', 'news', 0, 0, 1, '2016-09-07 18:23:02', 1, '2016-09-07 18:23:24', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module`
--

CREATE TABLE `tbl_module` (
  `module_id` int(11) NOT NULL,
  `module_name` varchar(255) NOT NULL,
  `module_path` varchar(255) NOT NULL,
  `module_active_status` int(1) NOT NULL,
  `module_order_value` int(5) NOT NULL DEFAULT '1',
  `module_create_date` datetime NOT NULL,
  `module_create_by` int(11) NOT NULL,
  `module_update_date` datetime DEFAULT NULL,
  `module_update_by` int(11) DEFAULT NULL,
  `module_group_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_module`
--

INSERT INTO `tbl_module` (`module_id`, `module_name`, `module_path`, `module_active_status`, `module_order_value`, `module_create_date`, `module_create_by`, `module_update_date`, `module_update_by`, `module_group_id`) VALUES
(1, 'General', 'general', 0, 1, '2015-10-07 13:09:17', 1, '2016-07-14 15:02:31', 1, 2),
(2, 'Log CMS', 'Log_cms', 1, 2, '2015-10-07 13:10:39', 1, '2016-07-14 15:02:31', 1, 2),
(3, 'Banner', 'Banner', 1, 1, '2015-10-07 13:12:57', 1, '2016-07-14 15:02:31', 1, 3),
(4, 'Menu', 'Menu_frontend', 0, 2, '2015-10-07 13:14:50', 1, '2016-07-14 15:02:31', 1, 3),
(5, 'Pages', 'Pages', 0, 3, '2015-10-07 13:16:09', 1, '2016-07-14 15:02:31', 1, 3),
(7, 'courcse', 'courcse', 1, 1, '2015-10-13 16:08:43', 1, NULL, NULL, 4),
(11, 'Subject List', 'Subject', 1, 1, '2015-11-12 01:38:51', 1, '2015-10-26 15:46:11', 1, 5),
(15, 'Services', 'Services', 1, 2, '2016-08-16 15:12:56', 1, '2016-09-16 18:39:04', 1, 8),
(17, 'Career', 'Career', 1, 1, '2016-09-08 01:44:25', 1, '2016-09-16 18:39:04', 1, 14),
(23, 'Projects', 'Projects', 1, 2, '2016-07-18 15:48:27', 1, '2016-09-16 18:39:04', 1, 10),
(24, 'Client', 'Client', 1, 1, '2016-07-18 15:49:54', 1, '2016-09-16 18:39:04', 1, 10),
(26, 'Material', 'Material', 1, 1, '2016-09-13 01:56:24', 1, '2016-09-16 18:39:04', 1, 15),
(29, 'About', 'About', 1, 1, '2016-08-31 15:33:47', 1, '2016-09-16 18:39:04', 1, 11),
(30, 'Team', 'Team', 1, 1, '2016-08-31 19:51:52', 1, '2016-09-16 18:39:04', 1, 11),
(31, 'News', 'News', 1, 1, '2016-09-01 02:34:25', 1, '2016-09-16 18:39:04', 1, 12),
(32, 'Partner', 'Partner', 1, 1, '2016-09-01 14:36:10', 1, NULL, NULL, 3),
(33, 'Quote', 'Quote', 1, 1, '2016-09-01 18:36:24', 1, NULL, NULL, 3),
(34, 'Testimonial', 'Testimonial', 1, 1, '2016-09-01 18:38:45', 1, NULL, NULL, 3),
(35, 'Training', 'Training', 1, 1, '2016-09-05 14:57:46', 1, '2016-09-16 18:39:04', 1, 13),
(36, 'Privacy_policy', 'Privacy_policy', 1, 1, '2016-09-13 17:21:52', 1, NULL, NULL, 8),
(37, 'Faq', 'Faq', 1, 1, '2016-09-13 17:24:19', 1, NULL, NULL, 8),
(38, 'Contact', 'Contact', 1, 1, '2016-09-17 22:42:42', 1, NULL, NULL, 8),
(39, 'Latest_training', 'Latest_training', 1, 1, '2016-09-29 01:36:10', 1, NULL, NULL, 13);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_group`
--

CREATE TABLE `tbl_module_group` (
  `module_group_id` int(11) NOT NULL,
  `module_group_name` varchar(255) NOT NULL,
  `module_group_active_status` int(1) NOT NULL,
  `module_group_order_value` int(5) NOT NULL DEFAULT '1',
  `module_group_images` varchar(255) DEFAULT NULL,
  `module_group_create_date` datetime NOT NULL,
  `module_group_create_by` int(11) NOT NULL,
  `module_group_update_date` datetime DEFAULT NULL,
  `module_group_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_module_group`
--

INSERT INTO `tbl_module_group` (`module_group_id`, `module_group_name`, `module_group_active_status`, `module_group_order_value`, `module_group_images`, `module_group_create_date`, `module_group_create_by`, `module_group_update_date`, `module_group_update_by`) VALUES
(2, 'Configuration Management', 1, 1, NULL, '2015-10-07 13:07:34', 1, '2016-09-13 01:55:32', 1),
(3, 'Home Management', 1, 2, NULL, '2015-10-07 13:12:23', 1, '2016-11-24 09:22:58', 1),
(8, 'Content Management', 1, 3, NULL, '2015-10-29 13:18:22', 1, '2016-09-13 01:55:32', 1),
(10, 'Project Management', 1, 5, NULL, '2016-07-18 15:47:49', 1, '2016-09-13 01:55:32', 1),
(11, 'About Management', 1, 4, NULL, '2016-08-31 15:31:48', 1, '2016-09-13 01:55:32', 1),
(12, 'News Management', 1, 6, NULL, '2016-09-01 02:34:04', 1, '2016-09-13 01:55:32', 1),
(13, 'Training Management', 1, 8, NULL, '2016-09-05 14:57:14', 1, '2016-09-13 01:55:32', 1),
(14, 'Career Management', 1, 9, NULL, '2016-09-08 01:43:31', 1, '2016-09-13 01:55:32', 1),
(15, 'Material Management', 1, 7, NULL, '2016-09-13 01:55:06', 1, '2016-09-13 01:55:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_module_privilege`
--

CREATE TABLE `tbl_module_privilege` (
  `module_privilege_id` int(11) NOT NULL,
  `module_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  `module_privilege_create_date` datetime NOT NULL,
  `module_privilege_create_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_module_privilege`
--

INSERT INTO `tbl_module_privilege` (`module_privilege_id`, `module_id`, `privilege_id`, `module_privilege_create_date`, `module_privilege_create_by`) VALUES
(1, 1, 1, '2015-10-07 13:09:36', 1),
(2, 1, 4, '2015-10-07 13:09:36', 1),
(3, 2, 1, '2015-10-07 13:11:00', 1),
(136, 3, 5, '2016-04-21 15:22:18', 1),
(135, 3, 4, '2016-04-21 15:22:18', 1),
(134, 3, 3, '2016-04-21 15:22:18', 1),
(133, 3, 2, '2016-04-21 15:22:18', 1),
(132, 3, 1, '2016-04-21 15:22:18', 1),
(9, 4, 1, '2015-10-07 13:15:20', 1),
(10, 4, 3, '2015-10-07 13:15:20', 1),
(11, 4, 4, '2015-10-07 13:15:20', 1),
(12, 4, 6, '2015-10-07 13:15:20', 1),
(13, 4, 7, '2015-10-07 13:15:20', 1),
(14, 4, 8, '2015-10-07 13:15:20', 1),
(15, 5, 1, '2015-10-07 13:16:37', 1),
(16, 5, 3, '2015-10-07 13:16:37', 1),
(17, 5, 4, '2015-10-07 13:16:37', 1),
(18, 5, 6, '2015-10-07 13:16:37', 1),
(19, 5, 7, '2015-10-07 13:16:37', 1),
(20, 8, 1, '2015-10-15 16:12:01', 1),
(21, 8, 2, '2015-10-15 16:12:01', 1),
(22, 8, 3, '2015-10-15 16:12:01', 1),
(23, 8, 4, '2015-10-15 16:12:01', 1),
(24, 8, 5, '2015-10-15 16:12:01', 1),
(25, 8, 6, '2015-10-15 16:12:01', 1),
(26, 8, 7, '2015-10-15 16:12:01', 1),
(27, 8, 8, '2015-10-15 16:12:01', 1),
(28, 9, 1, '2015-10-25 03:15:39', 1),
(29, 9, 2, '2015-10-25 03:15:39', 1),
(30, 9, 3, '2015-10-25 03:15:39', 1),
(31, 9, 4, '2015-10-25 03:15:39', 1),
(32, 9, 5, '2015-10-25 03:15:39', 1),
(33, 9, 6, '2015-10-25 03:15:39', 1),
(34, 9, 7, '2015-10-25 03:15:39', 1),
(35, 9, 8, '2015-10-25 03:15:39', 1),
(36, 10, 1, '2015-10-25 03:18:50', 1),
(37, 10, 2, '2015-10-25 03:18:50', 1),
(38, 10, 3, '2015-10-25 03:18:50', 1),
(39, 10, 4, '2015-10-25 03:18:50', 1),
(40, 10, 5, '2015-10-25 03:18:50', 1),
(41, 10, 6, '2015-10-25 03:18:50', 1),
(42, 10, 7, '2015-10-25 03:18:50', 1),
(43, 10, 8, '2015-10-25 03:18:50', 1),
(44, 11, 1, '2015-10-26 13:06:28', 1),
(45, 11, 2, '2015-10-26 13:06:28', 1),
(46, 11, 3, '2015-10-26 13:06:28', 1),
(47, 11, 4, '2015-10-26 13:06:28', 1),
(48, 11, 5, '2015-10-26 13:06:28', 1),
(49, 11, 6, '2015-10-26 13:06:28', 1),
(50, 11, 7, '2015-10-26 13:06:28', 1),
(51, 11, 8, '2015-10-26 13:06:28', 1),
(52, 12, 1, '2015-10-26 13:10:34', 1),
(53, 12, 2, '2015-10-26 13:10:34', 1),
(54, 12, 3, '2015-10-26 13:10:34', 1),
(55, 12, 4, '2015-10-26 13:10:34', 1),
(56, 12, 5, '2015-10-26 13:10:34', 1),
(57, 12, 6, '2015-10-26 13:10:34', 1),
(58, 12, 7, '2015-10-26 13:10:34', 1),
(59, 12, 8, '2015-10-26 13:10:34', 1),
(60, 13, 1, '2015-10-26 15:44:50', 1),
(61, 13, 2, '2015-10-26 15:44:50', 1),
(62, 13, 3, '2015-10-26 15:44:50', 1),
(63, 13, 4, '2015-10-26 15:44:50', 1),
(64, 13, 5, '2015-10-26 15:44:50', 1),
(65, 13, 6, '2015-10-26 15:44:50', 1),
(66, 13, 7, '2015-10-26 15:44:50', 1),
(67, 13, 8, '2015-10-26 15:44:50', 1),
(68, 14, 1, '2015-10-28 14:43:00', 1),
(69, 14, 2, '2015-10-28 14:43:00', 1),
(70, 14, 3, '2015-10-28 14:43:00', 1),
(71, 14, 4, '2015-10-28 14:43:00', 1),
(72, 14, 5, '2015-10-28 14:43:00', 1),
(73, 14, 6, '2015-10-28 14:43:00', 1),
(74, 14, 7, '2015-10-28 14:43:00', 1),
(75, 14, 8, '2015-10-28 14:43:00', 1),
(91, 15, 8, '2015-10-29 13:22:28', 1),
(90, 15, 7, '2015-10-29 13:22:28', 1),
(89, 15, 6, '2015-10-29 13:22:28', 1),
(88, 15, 5, '2015-10-29 13:22:28', 1),
(87, 15, 4, '2015-10-29 13:22:28', 1),
(86, 15, 3, '2015-10-29 13:22:28', 1),
(85, 15, 2, '2015-10-29 13:22:28', 1),
(84, 15, 1, '2015-10-29 13:22:28', 1),
(92, 16, 1, '2015-10-29 13:26:51', 1),
(93, 16, 2, '2015-10-29 13:26:51', 1),
(94, 16, 3, '2015-10-29 13:26:51', 1),
(95, 16, 4, '2015-10-29 13:26:51', 1),
(96, 16, 5, '2015-10-29 13:26:51', 1),
(97, 16, 6, '2015-10-29 13:26:51', 1),
(98, 16, 7, '2015-10-29 13:26:51', 1),
(99, 16, 8, '2015-10-29 13:26:51', 1),
(100, 18, 1, '2015-10-29 15:04:20', 1),
(101, 18, 2, '2015-10-29 15:04:20', 1),
(102, 18, 3, '2015-10-29 15:04:20', 1),
(103, 18, 4, '2015-10-29 15:04:20', 1),
(104, 18, 5, '2015-10-29 15:04:20', 1),
(105, 18, 6, '2015-10-29 15:04:20', 1),
(106, 18, 7, '2015-10-29 15:04:20', 1),
(107, 18, 8, '2015-10-29 15:04:20', 1),
(108, 17, 1, '2015-10-29 15:04:32', 1),
(109, 17, 2, '2015-10-29 15:04:32', 1),
(110, 17, 3, '2015-10-29 15:04:32', 1),
(111, 17, 4, '2015-10-29 15:04:32', 1),
(112, 17, 5, '2015-10-29 15:04:32', 1),
(113, 17, 6, '2015-10-29 15:04:32', 1),
(114, 17, 7, '2015-10-29 15:04:32', 1),
(115, 17, 8, '2015-10-29 15:04:32', 1),
(116, 19, 1, '2015-11-11 16:23:36', 1),
(117, 19, 2, '2015-11-11 16:23:36', 1),
(118, 19, 3, '2015-11-11 16:23:36', 1),
(119, 19, 4, '2015-11-11 16:23:36', 1),
(120, 19, 5, '2015-11-11 16:23:36', 1),
(121, 19, 6, '2015-11-11 16:23:36', 1),
(122, 19, 7, '2015-11-11 16:23:36', 1),
(123, 19, 8, '2015-11-11 16:23:36', 1),
(124, 21, 1, '2016-04-14 16:04:58', 1),
(125, 21, 2, '2016-04-14 16:04:58', 1),
(126, 21, 3, '2016-04-14 16:04:58', 1),
(127, 21, 4, '2016-04-14 16:04:58', 1),
(128, 21, 5, '2016-04-14 16:04:58', 1),
(129, 21, 6, '2016-04-14 16:04:58', 1),
(130, 21, 7, '2016-04-14 16:04:58', 1),
(131, 21, 8, '2016-04-14 16:04:58', 1),
(137, 3, 6, '2016-04-21 15:22:18', 1),
(138, 3, 7, '2016-04-21 15:22:18', 1),
(139, 3, 8, '2016-04-21 15:22:18', 1),
(171, 23, 8, '2016-05-10 16:33:03', 1),
(170, 23, 7, '2016-05-10 16:33:03', 1),
(169, 23, 6, '2016-05-10 16:33:03', 1),
(168, 23, 5, '2016-05-10 16:33:03', 1),
(167, 23, 4, '2016-05-10 16:33:03', 1),
(166, 23, 3, '2016-05-10 16:33:03', 1),
(165, 23, 2, '2016-05-10 16:33:03', 1),
(164, 23, 1, '2016-05-10 16:33:03', 1),
(172, 24, 1, '2016-05-16 12:53:54', 1),
(173, 24, 2, '2016-05-16 12:53:54', 1),
(174, 24, 3, '2016-05-16 12:53:54', 1),
(175, 24, 4, '2016-05-16 12:53:54', 1),
(176, 24, 5, '2016-05-16 12:53:54', 1),
(177, 24, 6, '2016-05-16 12:53:54', 1),
(178, 24, 7, '2016-05-16 12:53:54', 1),
(179, 24, 8, '2016-05-16 12:53:54', 1),
(180, 25, 1, '2016-05-16 23:27:12', 1),
(181, 25, 2, '2016-05-16 23:27:12', 1),
(182, 25, 3, '2016-05-16 23:27:12', 1),
(183, 25, 4, '2016-05-16 23:27:12', 1),
(184, 25, 5, '2016-05-16 23:27:12', 1),
(185, 25, 6, '2016-05-16 23:27:12', 1),
(186, 25, 7, '2016-05-16 23:27:12', 1),
(187, 25, 8, '2016-05-16 23:27:12', 1),
(188, 26, 1, '2016-06-14 15:16:25', 1),
(189, 26, 2, '2016-06-14 15:16:25', 1),
(190, 26, 3, '2016-06-14 15:16:25', 1),
(191, 26, 4, '2016-06-14 15:16:25', 1),
(192, 26, 5, '2016-06-14 15:16:25', 1),
(193, 26, 6, '2016-06-14 15:16:25', 1),
(194, 26, 7, '2016-06-14 15:16:25', 1),
(195, 26, 8, '2016-06-14 15:16:25', 1),
(196, 27, 1, '2016-08-13 01:24:06', 1),
(197, 27, 2, '2016-08-13 01:24:06', 1),
(198, 27, 3, '2016-08-13 01:24:06', 1),
(199, 27, 4, '2016-08-13 01:24:06', 1),
(200, 27, 5, '2016-08-13 01:24:06', 1),
(201, 27, 6, '2016-08-13 01:24:06', 1),
(202, 27, 7, '2016-08-13 01:24:06', 1),
(203, 27, 8, '2016-08-13 01:24:06', 1),
(204, 28, 1, '2016-08-15 13:54:12', 1),
(205, 28, 2, '2016-08-15 13:54:12', 1),
(206, 28, 3, '2016-08-15 13:54:12', 1),
(207, 28, 4, '2016-08-15 13:54:12', 1),
(208, 28, 5, '2016-08-15 13:54:12', 1),
(209, 28, 6, '2016-08-15 13:54:12', 1),
(210, 28, 7, '2016-08-15 13:54:12', 1),
(211, 28, 8, '2016-08-15 13:54:12', 1),
(212, 29, 1, '2016-08-31 15:34:11', 1),
(213, 29, 2, '2016-08-31 15:34:11', 1),
(214, 29, 3, '2016-08-31 15:34:11', 1),
(215, 29, 4, '2016-08-31 15:34:11', 1),
(216, 29, 5, '2016-08-31 15:34:11', 1),
(217, 29, 6, '2016-08-31 15:34:11', 1),
(218, 29, 7, '2016-08-31 15:34:11', 1),
(219, 29, 8, '2016-08-31 15:34:11', 1),
(220, 30, 1, '2016-08-31 19:52:20', 1),
(221, 30, 2, '2016-08-31 19:52:20', 1),
(222, 30, 3, '2016-08-31 19:52:20', 1),
(223, 30, 4, '2016-08-31 19:52:20', 1),
(224, 30, 5, '2016-08-31 19:52:20', 1),
(225, 30, 6, '2016-08-31 19:52:20', 1),
(226, 30, 7, '2016-08-31 19:52:20', 1),
(227, 30, 8, '2016-08-31 19:52:20', 1),
(228, 31, 1, '2016-09-01 02:34:49', 1),
(229, 31, 2, '2016-09-01 02:34:49', 1),
(230, 31, 3, '2016-09-01 02:34:49', 1),
(231, 31, 4, '2016-09-01 02:34:49', 1),
(232, 31, 5, '2016-09-01 02:34:49', 1),
(233, 31, 6, '2016-09-01 02:34:49', 1),
(234, 31, 7, '2016-09-01 02:34:49', 1),
(235, 31, 8, '2016-09-01 02:34:49', 1),
(236, 32, 1, '2016-09-01 14:26:42', 1),
(237, 32, 2, '2016-09-01 14:26:42', 1),
(238, 32, 3, '2016-09-01 14:26:42', 1),
(239, 32, 4, '2016-09-01 14:26:42', 1),
(240, 32, 5, '2016-09-01 14:26:42', 1),
(241, 32, 6, '2016-09-01 14:26:42', 1),
(242, 32, 7, '2016-09-01 14:26:42', 1),
(243, 32, 8, '2016-09-01 14:26:42', 1),
(244, 33, 1, '2016-09-01 18:36:46', 1),
(245, 33, 2, '2016-09-01 18:36:46', 1),
(246, 33, 3, '2016-09-01 18:36:46', 1),
(247, 33, 4, '2016-09-01 18:36:46', 1),
(248, 33, 5, '2016-09-01 18:36:46', 1),
(249, 33, 6, '2016-09-01 18:36:46', 1),
(250, 33, 7, '2016-09-01 18:36:46', 1),
(251, 33, 8, '2016-09-01 18:36:46', 1),
(252, 34, 1, '2016-09-01 18:38:59', 1),
(253, 34, 2, '2016-09-01 18:38:59', 1),
(254, 34, 3, '2016-09-01 18:38:59', 1),
(255, 34, 4, '2016-09-01 18:38:59', 1),
(256, 34, 5, '2016-09-01 18:38:59', 1),
(257, 34, 6, '2016-09-01 18:38:59', 1),
(258, 34, 7, '2016-09-01 18:38:59', 1),
(259, 34, 8, '2016-09-01 18:38:59', 1),
(260, 35, 1, '2016-09-05 14:58:18', 1),
(261, 35, 2, '2016-09-05 14:58:18', 1),
(262, 35, 3, '2016-09-05 14:58:18', 1),
(263, 35, 4, '2016-09-05 14:58:18', 1),
(264, 35, 5, '2016-09-05 14:58:18', 1),
(265, 35, 6, '2016-09-05 14:58:18', 1),
(266, 35, 7, '2016-09-05 14:58:18', 1),
(267, 35, 8, '2016-09-05 14:58:18', 1),
(268, 36, 1, '2016-09-13 17:22:30', 1),
(269, 36, 2, '2016-09-13 17:22:30', 1),
(270, 36, 3, '2016-09-13 17:22:30', 1),
(271, 36, 4, '2016-09-13 17:22:30', 1),
(272, 36, 5, '2016-09-13 17:22:30', 1),
(273, 36, 6, '2016-09-13 17:22:30', 1),
(274, 36, 7, '2016-09-13 17:22:30', 1),
(275, 36, 8, '2016-09-13 17:22:30', 1),
(276, 37, 1, '2016-09-13 17:24:36', 1),
(277, 37, 2, '2016-09-13 17:24:36', 1),
(278, 37, 3, '2016-09-13 17:24:36', 1),
(279, 37, 4, '2016-09-13 17:24:36', 1),
(280, 37, 5, '2016-09-13 17:24:36', 1),
(281, 37, 6, '2016-09-13 17:24:36', 1),
(282, 37, 7, '2016-09-13 17:24:36', 1),
(283, 37, 8, '2016-09-13 17:24:36', 1),
(284, 38, 1, '2016-09-17 22:43:03', 1),
(285, 38, 2, '2016-09-17 22:43:03', 1),
(286, 38, 3, '2016-09-17 22:43:03', 1),
(287, 38, 4, '2016-09-17 22:43:03', 1),
(288, 38, 5, '2016-09-17 22:43:03', 1),
(289, 38, 6, '2016-09-17 22:43:03', 1),
(290, 38, 7, '2016-09-17 22:43:03', 1),
(291, 38, 8, '2016-09-17 22:43:03', 1),
(292, 39, 1, '2016-09-29 01:40:29', 1),
(293, 39, 2, '2016-09-29 01:40:29', 1),
(294, 39, 3, '2016-09-29 01:40:29', 1),
(295, 39, 4, '2016-09-29 01:40:29', 1),
(296, 39, 5, '2016-09-29 01:40:29', 1),
(297, 39, 6, '2016-09-29 01:40:29', 1),
(298, 39, 7, '2016-09-29 01:40:29', 1),
(299, 39, 8, '2016-09-29 01:40:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news`
--

CREATE TABLE `tbl_news` (
  `news_id` int(11) NOT NULL,
  `category_id` int(2) NOT NULL,
  `news_title` varchar(255) NOT NULL,
  `news_short_desc` varchar(1000) DEFAULT NULL,
  `news_desc` text NOT NULL,
  `news_image` varchar(255) DEFAULT NULL,
  `news_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `news_alias` varchar(255) DEFAULT NULL,
  `news_tagging` varchar(300) NOT NULL,
  `news_order` int(11) NOT NULL DEFAULT '1',
  `news_publish_date` datetime NOT NULL,
  `news_meta_description` varchar(250) DEFAULT NULL,
  `news_meta_keywords` varchar(250) DEFAULT NULL,
  `news_create_date` datetime NOT NULL,
  `news_create_by` int(11) NOT NULL,
  `news_update_date` datetime DEFAULT NULL,
  `news_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news`
--

INSERT INTO `tbl_news` (`news_id`, `category_id`, `news_title`, `news_short_desc`, `news_desc`, `news_image`, `news_active_status`, `news_alias`, `news_tagging`, `news_order`, `news_publish_date`, `news_meta_description`, `news_meta_keywords`, `news_create_date`, `news_create_by`, `news_update_date`, `news_update_by`) VALUES
(6, 1, 'test news1', 'test', 'test222', '/assets/file_upload/admin/images/banner/banner-about.jpg', 1, 'test22', 'PERTAMINA,PIPELINE,POWERPLANT', 1, '2016-09-05 00:00:00', 'test22', 'test22', '2016-09-13 01:46:02', 1, '2016-09-13 01:46:06', 1),
(7, 2, 'test lagi', 'awcohoaiuwrbcuoqrhc043j1vopjr3pov', 'caafetbvwetby5uyn6unuynnebtyntyrenhetn', '/assets/file_upload/admin/images/banner/1920x1080.jpg', 1, 'test-lagi', 'SMARTHOME', 1, '2017-10-10 00:00:00', '', '', '2017-10-23 15:18:46', 4, '2017-10-23 15:18:49', 4),
(8, 5, 'sample news', 'Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit.&nbsp;', 'Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.<br />\r\n<br />\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.<br />\r\n<br />\r\nVestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Curabitur aliquet quam id dui posuere blandit. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus.', '/assets/file_upload/admin/images/banner/Landing-lv.jpg', 1, 'sample-news', 'PERTAMINA,PIPELINE,COMPUTER,POWERPLANT,SMARTHOME,SCHADA,PERTAMINA,HONEYWELL,GAS,PIPELINE,COMPUTER,POWERPLANT,SMARTHOME', 1, '2017-10-23 00:00:00', '', '', '2017-10-24 13:01:05', 4, '2017-10-24 13:01:37', 4),
(9, 6, 'contoh newss', 'lorem iposum dolor sit amet', 'Quisque velit nisi, pretium ut lacinia in, elementum id enim. Cras ultricies ligula sed magna dictum porta. Nulla quis lorem ut libero malesuada feugiat. Vivamus suscipit tortor eget felis porttitor volutpat. Cras ultricies ligula sed magna dictum porta. Pellentesque in ipsum id orci porta dapibus. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Donec velit neque, auctor sit amet aliquam vel, ullamcorper sit amet ligula. Nulla porttitor accumsan tincidunt. Vivamus suscipit tortor eget felis porttitor volutpat. Proin eget tortor risus.<br />\r\n<br />\r\nQuisque velit nisi, pretium ut lacinia in, elementum id enim. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Donec sollicitudin molestie malesuada. Cras ultricies ligula sed magna dictum porta. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Nulla porttitor accumsan tincidunt. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus.<br />\r\n<br />\r\nDonec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Sed porttitor lectus nibh. Vestibulum ac diam sit amet quam vehicula elementum sed sit amet dui. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec sollicitudin molestie malesuada.<br />\r\n<br />\r\nNulla porttitor accumsan tincidunt. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Donec rutrum congue leo eget malesuada. Sed porttitor lectus nibh. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus. Curabitur aliquet quam id dui posuere blandit. Donec rutrum congue leo eget malesuada. Donec rutrum congue leo eget malesuada. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Cras ultricies ligula sed magna dictum porta.', '/assets/file_upload/admin/images/Projects/5cepu.jpg', 1, 'beritahari', 'COMPUTER,POWERPLANT,SMARTHOME', 1, '2017-10-24 00:00:00', '', '', '2017-10-25 14:22:16', 4, '2017-10-25 14:23:24', 4);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_news_category`
--

CREATE TABLE `tbl_news_category` (
  `category_id` int(2) NOT NULL,
  `category_title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_news_category`
--

INSERT INTO `tbl_news_category` (`category_id`, `category_title`) VALUES
(1, 'NEWS'),
(2, 'EVENT'),
(3, 'RECENT DEAL'),
(4, 'EDUCATION'),
(5, 'test'),
(6, 'training');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `pages_id` int(11) NOT NULL,
  `pages_title` varchar(255) NOT NULL,
  `pages_short_desc` varchar(1000) DEFAULT NULL,
  `pages_desc` text NOT NULL,
  `pages_image` varchar(255) DEFAULT NULL,
  `pages_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `pages_alias` varchar(255) DEFAULT NULL,
  `pages_meta_description` varchar(250) DEFAULT NULL,
  `pages_meta_keywords` varchar(250) DEFAULT NULL,
  `pages_create_date` datetime NOT NULL,
  `pages_create_by` int(11) NOT NULL,
  `pages_update_date` datetime DEFAULT NULL,
  `pages_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`pages_id`, `pages_title`, `pages_short_desc`, `pages_desc`, `pages_image`, `pages_active_status`, `pages_alias`, `pages_meta_description`, `pages_meta_keywords`, `pages_create_date`, `pages_create_by`, `pages_update_date`, `pages_update_by`) VALUES
(12, 'Privacy Policy', 'Our privacy and Policy', '<div style=\"text-align: justify;\">PT. Balkat Communication values your trust and we take your privacy very seriously. We know that long lasting relationships start with trust, which is why we care so much about keeping your personal information confidential. As a visitor to our website, please be assured that you do not have to worry about your privacy being compromised.</div>\r\n\r\n<ul>\r\n	<li style=\"text-align: justify;\">Before, or at the time of collecting personal information, we will identify the purposed for which information is being collected.</li>\r\n	<li style=\"text-align: justify;\">We will collect information by lawful and fair means and, where appropriate, with the knowledge or consent of the individual concerned.</li>\r\n	<li style=\"text-align: justify;\">Personal data should be relevant to the purposes for which it is to be used, and, to the extent necessary for those purposes, should be accurate, complete, and current.</li>\r\n	<li style=\"text-align: justify;\">We will protect personal information by reasonable security safeguards against loss or theft, as well as unauthorized access, disclosure, copying, use or modification.</li>\r\n	<li style=\"text-align: justify;\">Gravitate links to other sites that may be of interest to our visitors. The privacy policies on those linked sites may be different from our privacy policy. You access these linked sites at your own risk. You should always review the privacy policy of any site before disclosing any personal information.</li>\r\n	<li style=\"text-align: justify;\">We will collect and use personal information solely with the objective of fulfilling those purposes specified by Gravitate and for other compatible purposes, unless we obtain the consent of the individual concerned or as required by law.</li>\r\n	<li style=\"text-align: justify;\">Gravitate uses data from Google&rsquo;s interest-based advertising or 3rd-party audience data (such as age, gender and interests) with Google Analytics.</li>\r\n	<li style=\"text-align: justify;\">We will make readily available to customers information about our policies and practices relating to the management of personal information.</li>\r\n</ul>\r\n\r\n<div style=\"text-align: justify;\"><br />\r\n<strong>Summary</strong><br />\r\nPT. Balkat Communication always respects your privacy and values your trust. We want you to have an enjoyable and safe experience when on our website. If you have any questions or concerns about our Privacy Policy, please contact us at&nbsp;hello@balkat.com.<br />\r\n<br />\r\n<strong>Liability Restrictions</strong><br />\r\nPT. Balkat Communication is not responsible for technical, hardware or software failures of any kind; lost or unavailable network connections; and/or incomplete, garbled or delayed computer transmissions. Under no circumstances will PT. Balkat Communication be liable for any damages or injury that may result from the use of the materials on this site. Some jurisdictions prohibit the exclusion or limitation of liability for consequential or incidental damages, in which case the above limitation may not apply to you. The materials on this site are provided &ldquo;as is&rdquo; and without warranties of any kind to the fullest extent permissible pursuant to applicable laws. PT. Balkat Communication may provide links to other sites that are not maintained by PT. Balkat Communication, but PT. Balkat Communication does not endorse those sites and is not responsible for the content of such other sites.<br />\r\n<br />\r\n<strong>Usage Restrictions</strong><br />\r\nThe entire contents of this site are copyrighted under the laws of Indonesia and protected by worldwide copyright laws and treaty provisions. Materials from the www.balkat.com website may not be copied, distributed or transmitted in any way without prior written consent of PT. Balkat Communication All material on this site is provided for lawful purposes only.<br />\r\n<br />\r\n<strong>Applicability of Content</strong><br />\r\nInformation on this site includes descriptions of products and services available in Indonesia only. This site is operated in Jakarta, Indonesia, and PT. Balkat Communication makes no representation that content provided is applicable or appropriate for use in other locations.<br />\r\n<br />\r\n<strong>Policy Changes</strong><br />\r\nIf we change our privacy policy in whole or in part, we will inform you by posting a notice on this website. Those changes will go into effect on the date posted in the notice. The new policy will apply to all current and past users of our website and will replace any prior policies which are inconsistent.<br />\r\n<br />\r\n<strong>Your Feedback</strong><br />\r\nTo help us improve our privacy policy and practice, please give us your feedback. You may email us or write to us at PT. Balkat Communication. Jl. Sukarjo Wiryopranoto no. 55a, Jakarta, Indonesia.</div>', '', 0, 'privacypolicy', '', '', '2016-05-31 16:35:32', 1, '2017-10-23 13:47:22', 1),
(14, 'Sitemap', 'Can&#39;t find what you&#39;re looking for? Here are a list of all the pages in our site.', '<a href=\"http://balkat.com\">PT. Balkat Komunika Indonesia</a>\r\n<ul>\r\n	<li style=\"margin-left: 40px;\"><a href=\"http://balkat.com/about\">About</a></li>\r\n	<li style=\"margin-left: 40px;\">Blog</li>\r\n	<li style=\"margin-left: 40px;\"><a href=\"http://balkat.com/works\">Works</a></li>\r\n	<li style=\"margin-left: 40px;\"><a href=\"http://balkat.com/location\">Contact Us</a></li>\r\n	<li style=\"margin-left: 40px;\"><a href=\"http://careers\">Careers</a></li>\r\n	<li style=\"margin-left: 40px;\"><a href=\"http://faq\">FAQ</a></li>\r\n	<li style=\"margin-left: 40px;\"><a href=\"http://balkat.com/privacypolicy\">Privacy Policy</a></li>\r\n</ul>', '', 0, '', '', '', '2016-06-01 14:16:27', 1, '2017-10-23 13:47:36', 1),
(15, 'FAQ', 'Frequently Asked Question', 'A collaborative team of designers, strategist, developers, copywriter, illustrators and engineers focusing on helping&nbsp;others communicate a clear message.<br />\r\n<br />\r\nQ: What does Balkat stands for?<br />\r\n<br />\r\nA: The word Balkat stands for <em>Balon Kata</em>, which translates to &quot;Bubble Talk&quot;, at Balkat we strive to help others communicate a clear and concise message through the use of various media.<br />\r\n<br />\r\n<strong>Q: What is it that Balkat do?</strong><br />\r\n<br />\r\nA:&nbsp; We provide 3 main services:\r\n<ul>\r\n	<li><strong>BRAND COMMUNICATION</strong></li>\r\n</ul>\r\n\r\n<div style=\"margin-left: 40px;\">We pinpoint what makes you unique to create everything your brand needs to stand out and trive</div>\r\n\r\n<ul>\r\n	<li><strong>DIGITAL DEVELOPMENT</strong></li>\r\n</ul>\r\n\r\n<div style=\"margin-left: 40px;\">Working with the latest technology we design and build pixel perfect, user-centric websites</div>\r\n\r\n<ul>\r\n	<li><strong>MERCHANDISING</strong></li>\r\n</ul>\r\n\r\n<div style=\"margin-left: 40px;\">Printing &amp; Production service</div>\r\n<br />\r\n<br />\r\n<strong>Q: What are processes involved when starting a project?</strong><br />\r\n<br />\r\nA: There are 3 processes that we go through in a typical project:\r\n<div style=\"margin-left: 20px;\"><br />\r\n1. &nbsp;DETERMINE</div>\r\n\r\n<ul>\r\n	<li style=\"margin-left: 40px;\">Current Position</li>\r\n	<li style=\"margin-left: 40px;\">Competitor Analysis</li>\r\n	<li style=\"margin-left: 40px;\">Current Industry&#39;s Issues/ Trends</li>\r\n</ul>\r\n\r\n<div style=\"margin-left: 20px;\">2. &nbsp;DEFINE</div>\r\n\r\n<ul>\r\n	<li style=\"margin-left: 40px;\">Create Formula w/ Creative Approach</li>\r\n	<li style=\"margin-left: 40px;\">Develop Big Idea</li>\r\n	<li style=\"margin-left: 40px;\">Develop Integrated Communication</li>\r\n</ul>\r\n\r\n<div style=\"margin-left: 20px;\">3.&nbsp;DESIGN</div>\r\n\r\n<ul>\r\n	<li style=\"margin-left: 40px;\">Key Visual Design</li>\r\n	<li style=\"margin-left: 40px;\">Digital Development</li>\r\n	<li style=\"margin-left: 40px;\">Brand Communication</li>\r\n</ul>\r\n<br />\r\n<strong>Q: How can we reach Balkat Communication to inquire about a project?</strong><br />\r\n<br />\r\nA: You can reach us through e-mail :&nbsp;hello@balkat.com<br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; And phone call&nbsp;<a href=\"tel:+ 6221 629 6302\">+ 6221 629 6302</a><br />\r\n<br />\r\n&nbsp;&nbsp;&nbsp;&nbsp; Or simply click on this link http://balkat.com/contactus<br />\r\n<br />\r\n<strong>Q: What are the phases on making a project with Balkat Communication?</strong><br />\r\n<br />\r\nA: &nbsp;<strong>DIGITAL DEVELOPMENT</strong><br />\r\n&nbsp;\r\n<ul>\r\n	<li>&nbsp;Firstly, we propose a couple or designs from brief we got from the client depending on types of project.</li>\r\n	<li>&nbsp;Secondly, we meet up with client to discuss on any revision from the proposal design; once we received the full revision then we will work on it for the time we have agreed.</li>\r\n	<li>Thirdly, after all the revision has been approved, we will continue on making the CSS (front-end) to let clients has the feel on what kind of website it will become.</li>\r\n	<li>&nbsp;Last but not least, once clients has approved the CSS we sent them, then we will work on the programming (backend) to finish up the project before it goes live.</li>\r\n</ul>\r\n<br />\r\n<br />\r\n<strong>BRAND COMMUNICATION<br />\r\n<img alt=\"\" src=\"http://balkat.com/assets/file_upload/admin/images/testlago-01.jpg\" style=\"width: 332px; height: 750px;\" /><br />\r\n<br />\r\n<br />\r\nMERCHANDISING</strong><br />\r\n<br />\r\n<br />\r\n<strong>VISUALISATION</strong><br />\r\n&nbsp;', '', 0, 'faq', '', '', '2016-06-01 14:18:40', 1, '2017-10-23 13:47:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_page_view`
--

CREATE TABLE `tbl_page_view` (
  `page_type` int(1) NOT NULL,
  `page_title` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_page_view`
--

INSERT INTO `tbl_page_view` (`page_type`, `page_title`) VALUES
(3, 'Gallery'),
(2, 'Sub Pages'),
(1, 'Default');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_position`
--

CREATE TABLE `tbl_position` (
  `position_id` int(11) NOT NULL,
  `position_title` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_position`
--

INSERT INTO `tbl_position` (`position_id`, `position_title`) VALUES
(1, 'BOD'),
(2, 'Engineer');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_privilege`
--

CREATE TABLE `tbl_privilege` (
  `privilege_id` int(11) NOT NULL,
  `privilege_name` varchar(255) NOT NULL,
  `privilege_create_date` datetime NOT NULL,
  `privilege_create_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_privilege`
--

INSERT INTO `tbl_privilege` (`privilege_id`, `privilege_name`, `privilege_create_date`, `privilege_create_by`) VALUES
(1, 'List', '2012-01-04 21:13:59', 1),
(3, 'Add', '2012-01-04 21:14:27', 1),
(4, 'Edit', '2012-01-04 21:14:27', 1),
(2, 'View', '2012-01-04 21:15:18', 1),
(6, 'Approve', '2012-01-04 21:15:34', 1),
(7, 'Delete', '2012-01-04 21:15:34', 1),
(5, 'Publish', '2012-01-04 21:16:17', 1),
(8, 'Order', '2012-01-04 21:16:17', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_projects`
--

CREATE TABLE `tbl_projects` (
  `projects_id` int(11) NOT NULL,
  `client_id` int(1) NOT NULL,
  `user_id` int(11) NOT NULL,
  `projects_title` varchar(255) NOT NULL,
  `projects_desc` text,
  `projects_services` varchar(1000) DEFAULT NULL,
  `projects_image` varchar(255) DEFAULT NULL,
  `projects_start_date` datetime NOT NULL,
  `projects_end_date` datetime NOT NULL,
  `projects_location` varchar(200) NOT NULL,
  `projects_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `projects_highlight` int(1) NOT NULL DEFAULT '0',
  `projects_order` int(11) NOT NULL DEFAULT '1',
  `projects_alias` varchar(100) NOT NULL,
  `projects_meta_description` varchar(250) DEFAULT NULL,
  `projects_meta_keywords` varchar(250) DEFAULT NULL,
  `projects_create_date` datetime NOT NULL,
  `projects_create_by` int(11) NOT NULL,
  `projects_update_date` datetime DEFAULT NULL,
  `projects_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_projects`
--

INSERT INTO `tbl_projects` (`projects_id`, `client_id`, `user_id`, `projects_title`, `projects_desc`, `projects_services`, `projects_image`, `projects_start_date`, `projects_end_date`, `projects_location`, `projects_active_status`, `projects_highlight`, `projects_order`, `projects_alias`, `projects_meta_description`, `projects_meta_keywords`, `projects_create_date`, `projects_create_by`, `projects_update_date`, `projects_update_by`) VALUES
(1, 24, 25, 'E&I Work for Gajah Baru (GBCPP) Condensate Storage Vessel & Transfer Pumps', 'E&I Work for Gajah Baru (GBCPP) Condensate Storage Vessel & Transfer Pumps', 'E&I Work for Gajah Baru (GBCPP) Condensate Storage Vessel & Transfer Pumps', '', '2010-05-01 00:00:00', '2010-12-01 00:00:00', 'Batam', 1, 0, 1, '', '', '', '2010-05-01 00:00:00', 1, '2016-09-20 15:42:08', 1),
(78, 30, 16, 'Performance Test', 'Performance Test', 'Performance Test', '', '2016-06-01 00:00:00', '0000-00-00 00:00:00', 'Teluk Balikpapan - KALTIM', 1, 0, 1, '', '', '', '2016-06-01 00:00:00', 1, '2016-06-01 00:00:00', 1),
(77, 30, 16, 'Commissioning Works', 'Commissioning Works', 'Commissioning Works', '', '2016-06-01 00:00:00', '0000-00-00 00:00:00', 'Balikpapan', 1, 0, 1, '', '', '', '2016-06-01 00:00:00', 1, '2016-09-20 15:41:28', 1),
(76, 1, 16, 'Mechanical Erection', 'Mechanical Erection', 'Mechanical Erection', '', '2016-03-01 00:00:00', '0000-00-00 00:00:00', 'Teluk Balikpapan - KALTIM', 1, 0, 1, '', '', '', '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(75, 28, 21, 'Engineering-FAT-SAT DCS, F&G, Fire Alarm System for Jangkrik Project', 'Engineering-FAT-SAT DCS, F&G, Fire Alarm System for Jangkrik Project', 'Engineering-FAT-SAT DCS, F&G, Fire Alarm System for Jangkrik Project', '', '2015-05-01 00:00:00', '0000-00-00 00:00:00', 'Jakarta ? Korea - Karimun', 1, 0, 1, '', '', '', '2015-05-01 00:00:00', 1, '2015-05-01 00:00:00', 1),
(74, 31, 21, 'Commisioning MICC -MCL', 'Commisioning MICC -MCL', 'Commisioning MICC -MCL', '', '2015-02-01 00:00:00', '0000-00-00 00:00:00', 'Cepu Bojonegoro', 1, 0, 1, '', '', '', '2015-02-01 00:00:00', 1, '2015-02-01 00:00:00', 1),
(73, 15, 15, 'Retrofit F & G System PHE#5', 'Retrofit F & G System PHE#5', 'Retrofit F & G System PHE#5', '', '2016-01-01 00:00:00', '0000-00-00 00:00:00', 'Jakarta ? OffShore Madura', 1, 0, 1, '', '', '', '2016-01-01 00:00:00', 1, '2016-01-01 00:00:00', 1),
(72, 15, 15, 'Scada Pack', 'Scada Pack', 'Scada Pack', '', '2016-03-01 00:00:00', '0000-00-00 00:00:00', 'OffShore Madura', 1, 0, 1, '', '', '', '2016-03-01 00:00:00', 1, '2016-03-01 00:00:00', 1),
(71, 22, 22, 'Staging Secure Area', 'Staging Secure Area', 'Staging Secure Area', '', '2016-02-01 00:00:00', '2016-02-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2016-02-01 00:00:00', 1, '2016-02-01 00:00:00', 1),
(70, 11, 11, 'Orifice Gas Metering System Package (Double Stream)', 'Orifice Gas Metering System Package (Double Stream)', 'Orifice Gas Metering System Package (Double Stream)', '', '2015-08-01 00:00:00', '0000-00-00 00:00:00', 'Karawang', 1, 0, 1, '', '', '', '2015-08-01 00:00:00', 1, '2015-08-01 00:00:00', 1),
(69, 10, 10, 'Supply Material Insulation Joint', 'Supply Material Insulation Joint', 'Supply Material Insulation Joint', '', '2015-07-01 00:00:00', '2015-07-21 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-07-01 00:00:00', 1, '2015-07-01 00:00:00', 1),
(68, 10, 10, 'Supply Material Pressure Transmitter', 'Supply Material Pressure Transmitter', 'Supply Material Pressure Transmitter', '', '2015-07-01 00:00:00', '2015-07-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-07-01 00:00:00', 1, '2015-07-01 00:00:00', 1),
(67, 6, 6, 'Supply Material Aadvance Processor Base Unit', 'Supply Material Aadvance Processor Base Unit', 'Supply Material Aadvance Processor Base Unit', '', '2015-06-01 00:00:00', '2015-06-01 00:00:00', 'Malaysia', 1, 0, 1, '', '', '', '2015-06-01 00:00:00', 1, '2015-06-01 00:00:00', 1),
(66, 12, 12, 'Supply Material Wiring Board', 'Supply Material Wiring Board', 'Supply Material Wiring Board', '', '2015-06-01 00:00:00', '2015-06-01 00:00:00', 'Balikpapan', 1, 0, 1, '', '', '', '2015-06-01 00:00:00', 1, '2015-06-01 00:00:00', 1),
(65, 2, 2, 'LPG Plant Custody Transfer Orifice Gas Meter', 'Gas Metering Skid 3 Stream 8&quot; Pipeline integrated with Omni Flow Computer Panel and HMI Wonderware Intouch', 'Bukit Tua LPG Plant Custody Transfer Orifice Gas Meter', '/assets/file_upload/admin/images/banner/LPG-Plant-Custody-Transfer.jpg', '2015-05-01 00:00:00', '2015-12-31 00:00:00', 'Bukit Tua, Gresik, Jawa Timur', 1, 1, 1, '', '', '', '2015-05-01 00:00:00', 1, '2017-02-01 05:34:11', 1),
(64, 10, 10, 'Engineering & Supply Control Valve', 'Engineering & Supply Control Valve', 'Engineering & Supply Control Valve', '', '2015-05-01 00:00:00', '2015-06-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-05-01 00:00:00', 1, '2015-05-01 00:00:00', 1),
(63, 6, 6, 'Fire Suppresion System for Tapis Platform', 'Fire Suppresion System for Tapis Platform', 'Fire Suppresion System for Tapis Platform', '', '2015-05-01 00:00:00', '2015-06-01 00:00:00', 'Malaysia', 1, 0, 1, '', '', '', '2015-05-01 00:00:00', 1, '2015-05-01 00:00:00', 1),
(62, 10, 10, 'Engineering & Supply Pressure Safety Valve', 'Engineering & Supply Pressure Safety Valve', 'Engineering & Supply Pressure Safety Valve', '', '2015-04-01 00:00:00', '2015-05-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-04-01 00:00:00', 1, '2015-04-01 00:00:00', 1),
(61, 6, 6, 'Fire Suppresion System Upgrade for Dulang & Angsi Platform', 'Fire Suppresion System Upgrade for Dulang & Angsi Platform', 'Fire Suppresion System Upgrade for Dulang & Angsi Platform', '', '2015-03-01 00:00:00', '2015-06-01 00:00:00', 'Malaysia', 1, 0, 1, '', '', '', '2015-03-01 00:00:00', 1, '2015-03-01 00:00:00', 1),
(60, 18, 18, 'Supply Material  Portable Lightning and Shim Set', 'Supply Material  Portable Lightning and Shim Set', 'Supply Material  Portable Lightning and Shim Set', '', '2015-03-01 00:00:00', '2015-06-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-03-01 00:00:00', 1, '2015-03-01 00:00:00', 1),
(59, 10, 10, 'Engineering & Supply Level Transmitter, Level Indicator/Gauge, Pressure Switch and Union Flange Orifice Meter', 'Engineering & Supply Level Transmitter, Level Indicator/Gauge, Pressure Switch and Union Flange Orifice Meter', 'Engineering & Supply Level Transmitter, Level Indicator/Gauge, Pressure Switch and Union Flange Orifice Meter', '', '2015-03-01 00:00:00', '2015-06-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-03-01 00:00:00', 1, '2015-03-01 00:00:00', 1),
(58, 22, 22, 'FADP (Autronica), Addressable Fire Detection System for Jangkrik Complex Project', 'FADP (Autronica), Addressable Fire Detection System for Jangkrik Complex Project', 'FADP (Autronica), Addressable Fire Detection System for Jangkrik Complex Project', '', '2015-02-01 00:00:00', '0000-00-00 00:00:00', 'Jangkrik', 1, 0, 1, '', '', '', '2015-02-01 00:00:00', 1, '2015-02-01 00:00:00', 1),
(57, 32, 32, 'Panel Metering for Mini LPG Plant JATA Project', 'Panel Metering for Mini LPG Plant JATA Project', 'Panel Metering for Mini LPG Plant JATA Project', '', '2015-02-01 00:00:00', '2015-06-01 00:00:00', 'Banyuasin- Sumsel', 1, 0, 1, '', '', '', '2015-02-01 00:00:00', 1, '2015-02-01 00:00:00', 1),
(56, 35, 35, 'FPSO Brotojoyo Fire Gas and ESD System', 'Upgrade PLC HIMA on Fire and Gas and ESD System Brotojoyo', 'Upgrade PLC HIMA', '/assets/file_upload/admin/images/projectpage/bukit tua lpg/1474364269673.jpg', '2015-02-01 00:00:00', '2015-03-01 00:00:00', 'Kapal Brotojoyo', 1, 1, 2, '', '', '', '2015-02-01 00:00:00', 1, '2017-02-02 09:53:27', 1),
(55, 12, 12, 'Supply Material Filter 2 Mikron', 'Supply Material Filter 2 Mikron', 'Supply Material Filter 2 Mikron', '', '2015-02-01 00:00:00', '2015-02-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-02-01 00:00:00', 1, '2015-02-01 00:00:00', 1),
(54, 12, 12, 'Supply Material Fisher Valve Parts', 'Supply Material Fisher Valve Parts', 'Supply Material Fisher Valve Parts', '', '2015-01-01 00:00:00', '2015-01-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-01-01 00:00:00', 1, '2015-01-01 00:00:00', 1),
(53, 12, 12, 'Supply Material Calibration Head and Screw', 'Supply Material Calibration Head and Screw', 'Supply Material Calibration Head and Screw', '', '2015-01-01 00:00:00', '2015-01-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2015-01-01 00:00:00', 1, '2015-01-01 00:00:00', 1),
(52, 9, 9, 'Engineering & Supply Pressure Regulator Valve', 'Engineering & Supply Pressure Regulator Valve', 'Engineering & Supply Pressure Regulator Valve', '', '2014-11-01 00:00:00', '2015-01-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-11-01 00:00:00', 1, '2014-11-01 00:00:00', 1),
(51, 12, 12, 'Supply Material Solenoid Valve', 'Supply Material Solenoid Valve', 'Supply Material Solenoid Valve', '', '2014-11-01 00:00:00', '2014-11-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-11-01 00:00:00', 1, '2014-11-01 00:00:00', 1),
(50, 12, 12, 'Supply Material Gland Packing FisherValve', 'Supply Material Gland Packing FisherValve', 'Supply Material Gland Packing FisherValve', '', '2014-10-01 00:00:00', '2014-10-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-10-01 00:00:00', 1, '2014-10-01 00:00:00', 1),
(49, 15, 15, 'ORF# Provision Moisture Analyzer', 'ORF# Provision Moisture Analyzer', 'ORF# Provision Moisture Analyzer', '', '2014-07-01 00:00:00', '2014-12-01 00:00:00', 'Gresik', 1, 0, 1, '', '', '', '2014-07-01 00:00:00', 1, '2014-07-01 00:00:00', 1),
(48, 12, 12, 'Supply Material Spacer Ring', 'Supply Material Spacer Ring', 'Supply Material Spacer Ring', '', '2014-07-01 00:00:00', '2014-07-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-07-01 00:00:00', 1, '2014-07-01 00:00:00', 1),
(47, 22, 22, 'Pengadaan Material dan Jasa Pengerjaan Warehose Thp. 2', 'Pengadaan Material dan Jasa Pengerjaan Warehose Thp. 2', 'Pengadaan Material dan Jasa Pengerjaan Warehose Thp. 2', '', '2014-05-01 00:00:00', '2014-05-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-05-01 00:00:00', 1, '2014-05-01 00:00:00', 1),
(46, 22, 22, 'Pengadaan Material dan Jasa Pembangunan Warehose', 'Pengadaan Material dan Jasa Pembangunan Warehose', 'Pengadaan Material dan Jasa Pembangunan Warehose', '', '2014-05-01 00:00:00', '2014-05-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-05-01 00:00:00', 1, '2014-05-01 00:00:00', 1),
(45, 22, 22, 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6812', 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6812', 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6812', '', '2014-05-01 00:00:00', '2014-05-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-05-01 00:00:00', 1, '2014-05-01 00:00:00', 1),
(44, 22, 22, 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6823', 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6823', 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6823', '', '2014-05-01 00:00:00', '2014-05-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-05-01 00:00:00', 1, '2014-05-01 00:00:00', 1),
(43, 22, 22, 'Service Engineer Contract ID2-E-6822', 'Service Engineer Contract ID2-E-6822', 'Service Engineer Contract ID2-E-6822', '', '2014-05-01 00:00:00', '2014-05-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-05-01 00:00:00', 1, '2014-05-01 00:00:00', 1),
(42, 22, 22, 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6871', 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6871', 'SVC-PROF ENGRG Material dan Jasa Pengerjaan PO No. ID2-E-6871', '', '2014-05-01 00:00:00', '2014-05-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-05-01 00:00:00', 1, '2014-05-01 00:00:00', 1),
(41, 22, 22, 'Service Supporting for FAT ORF ID2-E-6957', 'Service Supporting for FAT ORF ID2-E-6957', 'Service Supporting for FAT ORF ID2-E-6957', '', '2014-05-01 00:00:00', '2014-05-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-05-01 00:00:00', 1, '2014-05-01 00:00:00', 1),
(40, 12, 12, 'Supply Material PCV Self Contain Regulator', 'Supply Material PCV Self Contain Regulator', 'Supply Material PCV Self Contain Regulator', '', '2014-04-01 00:00:00', '2014-04-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-04-01 00:00:00', 1, '2014-04-01 00:00:00', 1),
(39, 12, 12, 'Supply Material Pneutrol Instrumentation Valve SS', 'Supply Material Pneutrol Instrumentation Valve SS', 'Supply Material Pneutrol Instrumentation Valve SS', '', '2014-04-01 00:00:00', '2014-04-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2014-04-01 00:00:00', 1, '2014-04-01 00:00:00', 1),
(38, 4, 4, 'SCADA Package (PCS, SIS, RTU)', 'SCADA Package (PCS, SIS, RTU)', 'SCADA Package (PCS, SIS, RTU)', '', '2014-02-01 00:00:00', '2014-10-01 00:00:00', 'SIAK ', 1, 0, 1, '', '', '', '2014-02-01 00:00:00', 1, '2014-02-01 00:00:00', 1),
(37, 15, 15, 'HIPPS (High-integrity pressure protection system', 'HIPPS (High-integrity pressure protection system', 'HIPPS (High-integrity pressure protection system', '', '2013-11-03 00:00:00', '2014-02-01 00:00:00', 'Gresik', 1, 0, 1, '', '', '', '2013-11-03 00:00:00', 1, '2013-11-03 00:00:00', 1),
(36, 15, 15, 'ORF - Fire and Gas System Controller Assessment for Retrofit', 'ORF - Fire and Gas System Controller Assessment for Retrofit', 'ORF - Fire and Gas System Controller Assessment for Retrofit', '', '2013-11-03 00:00:00', '2013-11-03 00:00:00', 'Gresik', 1, 0, 1, '', '', '', '2013-11-03 00:00:00', 1, '2013-11-03 00:00:00', 1),
(35, 15, 15, 'PPP ? Fire and Gas detection System Assessment', 'PPP ? Fire and Gas detection System Assessment', 'PPP ? Fire and Gas detection System Assessment', '', '2013-11-03 00:00:00', '2013-11-03 00:00:00', 'Offshore PHE WMO', 1, 0, 1, '', '', '', '2013-11-03 00:00:00', 1, '2013-11-03 00:00:00', 1),
(34, 15, 15, 'KE5-CPP - Fire and Gas System Controller Assessment for Retrofit', 'KE5-CPP - Fire and Gas System Controller Assessment for Retrofit', 'KE5-CPP - Fire and Gas System Controller Assessment for Retrofit', '', '2013-11-03 00:00:00', '2013-11-03 00:00:00', 'Offshore PHE WMO', 1, 0, 1, '', '', '', '2013-11-03 00:00:00', 1, '2013-11-03 00:00:00', 1),
(33, 23, 23, 'E & I Man Power Supply For Maintenance Contract at  PT. Lontar Papirus Pulp and Paper', 'E & I Man Power Supply For Maintenance Contract at  PT. Lontar Papirus Pulp and Paper', 'E & I Man Power Supply For Maintenance Contract at  PT. Lontar Papirus Pulp and Paper', '', '2013-09-03 00:00:00', '2013-09-03 00:00:00', 'Jambi', 1, 0, 1, '', '', '', '2013-09-03 00:00:00', 1, '2013-09-03 00:00:00', 1),
(32, 26, 26, 'I & C Man Power Supply for Engineering, Commissioning and Startup.', 'I & C Man Power Supply for Engineering, Commissioning and Startup.', 'I & C Man Power Supply for Engineering, Commissioning and Startup.', '', '2012-12-03 00:00:00', '2014-08-01 00:00:00', 'PLTU SANGGAU 2 X 7 MW, KALIMANTAN BARAT ', 1, 0, 1, '', '', '', '2012-12-03 00:00:00', 1, '2012-12-03 00:00:00', 1),
(31, 26, 26, 'I & C Man Power Supply for Engineering, Design graphic for HMI, create logic and Assembly DCS, TSI, ETS system cabinet', 'I & C Man Power Supply for Engineering, Design graphic for HMI, create logic and Assembly DCS, TSI, ETS system cabinet', 'I & C Man Power Supply for Engineering, Design graphic for HMI, create logic and Assembly DCS, TSI, ETS system cabinet', '', '2012-12-03 00:00:00', '2014-08-01 00:00:00', 'PLTU SUMBAWA 2 X 7 MW, NUSA TENGGARA BARAT', 1, 0, 1, '', '', '', '2012-12-03 00:00:00', 1, '2012-12-03 00:00:00', 1),
(30, 26, 26, 'I & C Man Power Supply for Engineering, Design Graphic for HMI, Create Logic Control and Design TSI,ETS,DCS System Cabinet ', 'I & C Man Power Supply for Engineering, Design Graphic for HMI, Create Logic Control and Design TSI,ETS,DCS System Cabinet ', 'I & C Man Power Supply for Engineering, Design Graphic for HMI, Create Logic Control and Design TSI,ETS,DCS System Cabinet ', '', '2012-12-03 00:00:00', '2014-08-01 00:00:00', 'PLTU  SINTANG 3 X 7 MW, KALIMANTAN BARAT ', 1, 0, 1, '', '', '', '2012-12-03 00:00:00', 1, '2012-12-03 00:00:00', 1),
(29, 26, 26, 'I & C Man Power Supply for Engineering, Design Graphic for HMI, Create Logic Control and Design TSI,ETS,DCS System Cabinet ', 'I & C Man Power Supply for Engineering, Design Graphic for HMI, Create Logic Control and Design TSI,ETS,DCS System Cabinet ', 'I & C Man Power Supply for Engineering, Design Graphic for HMI, Create Logic Control and Design TSI,ETS,DCS System Cabinet ', '', '2012-12-03 00:00:00', '2014-08-01 00:00:00', 'PLTU  ROTE 2 X 3 MW, NUSA TENGGARA TIMUR ', 1, 0, 1, '', '', '', '2012-12-03 00:00:00', 1, '2012-12-03 00:00:00', 1),
(28, 14, 17, 'Tie In New Metering System with Master Logic Existing PHE ONWJ Cilamaya Plant', 'Tie In New Metering System with Master Logic Existing PHE ONWJ Cilamaya Plant', 'Tie In New Metering System with Master Logic Existing PHE ONWJ Cilamaya Plant', '', '2012-12-03 00:00:00', '2013-01-01 00:00:00', 'Cilamaya', 1, 0, 1, '', '', '', '2012-12-03 00:00:00', 1, '2012-12-03 00:00:00', 1),
(27, 19, 19, 'Material Supply for Power Control New Oil', 'Material Supply for Power Control New Oil', 'Material Supply for Power Control New Oil', '', '2012-07-03 00:00:00', '2012-07-03 00:00:00', 'Cikarang', 1, 0, 1, '', '', '', '2012-07-03 00:00:00', 1, '2012-07-03 00:00:00', 1),
(26, 19, 19, 'Material Supply For Unilever Project', 'Material Supply For Unilever Project', 'Material Supply For Unilever Project', '', '2012-06-03 00:00:00', '2012-06-03 00:00:00', 'Cikarang', 1, 0, 1, '', '', '', '2012-06-03 00:00:00', 1, '2012-06-03 00:00:00', 1),
(25, 19, 19, 'Material Supply For Unilever Liquid', 'Material Supply For Unilever Liquid', 'Material Supply For Unilever Liquid', '', '2012-04-03 00:00:00', '2012-04-03 00:00:00', 'Cikarang', 1, 0, 1, '', '', '', '2012-04-03 00:00:00', 1, '2012-04-03 00:00:00', 1),
(24, 8, 30, 'Instrument Commissioning For SSPC (Shell Sabah Petroleum Company) Malaysia Through IME (IntisariMulia Engineering)', 'Instrument Commissioning For SSPC (Shell Sabah Petroleum Company) Malaysia Through IME (IntisariMulia Engineering)', 'Instrument Commissioning For SSPC (Shell Sabah Petroleum Company) Malaysia Through IME (IntisariMulia Engineering)', '', '2012-03-03 00:00:00', '2012-03-03 00:00:00', 'Malaysia', 1, 0, 1, '', '', '', '2012-03-03 00:00:00', 1, '2012-03-03 00:00:00', 1),
(23, 20, 20, 'Modification 6 Unit Truck loading matering Skid Tanjung Sekong', 'Modification 6 Unit Truck loading matering Skid Tanjung Sekong', 'Modification 6 Unit Truck loading matering Skid Tanjung Sekong', '', '2011-08-01 00:00:00', '2011-08-01 00:00:00', 'Serang-Banten', 1, 0, 1, '', '', '', '2011-08-01 00:00:00', 1, '2011-08-01 00:00:00', 1),
(22, 20, 20, 'Matering Skid for Depot Mini LPG Banjarmasin (AgrabudiKonsorsium?s Project)', 'Matering Skid for Depot Mini LPG Banjarmasin (AgrabudiKonsorsium?s Project)', 'Matering Skid for Depot Mini LPG Banjarmasin (AgrabudiKonsorsium?s Project)', '', '2011-07-01 00:00:00', '2011-08-01 00:00:00', 'Banjarmasin', 1, 0, 1, '', '', '', '2011-07-01 00:00:00', 1, '2011-07-01 00:00:00', 1),
(21, 19, 19, 'Desuperheater and Heatrecovery System For TanjungEnim Lestari', 'Desuperheater and Heatrecovery System For TanjungEnim Lestari', 'Desuperheater and Heatrecovery System For TanjungEnim Lestari', '', '2011-07-01 00:00:00', '2011-08-01 00:00:00', 'Palembang', 1, 0, 1, '', '', '', '2011-07-01 00:00:00', 1, '2011-07-01 00:00:00', 1),
(20, 20, 20, 'Electrical & Instrument Work for Truck Loading and Ship Loading for Tanjung', 'Electrical & Instrument Work for Truck Loading and Ship Loading for Tanjung', 'Electrical & Instrument Work for Truck Loading and Ship Loading for Tanjung', '', '2011-07-01 00:00:00', '2011-08-01 00:00:00', 'Cikarang', 1, 0, 1, '', '', '', '2011-07-01 00:00:00', 1, '2011-07-01 00:00:00', 1),
(19, 22, 22, 'Survey Installation Material at Bandara Soekarno Hatta', 'Survey Installation Material at Bandara Soekarno Hatta', 'Survey Installation Material at Bandara Soekarno Hatta', '', '2011-03-01 00:00:00', '2011-03-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2011-03-01 00:00:00', 1, '2011-03-01 00:00:00', 1),
(18, 22, 22, 'Bulk Material And Consumable', 'Bulk Material And Consumable', 'Bulk Material And Consumable', '', '2011-03-01 00:00:00', '2011-03-01 00:00:00', 'Jambi', 1, 0, 1, '', '', '', '2011-03-01 00:00:00', 1, '2011-03-01 00:00:00', 1),
(17, 19, 19, 'ATG Kualanamu', 'ATG Kualanamu', 'ATG Kualanamu', '', '2011-02-01 00:00:00', '2011-07-01 00:00:00', 'Medan', 1, 0, 1, '', '', '', '2011-02-01 00:00:00', 1, '2011-02-01 00:00:00', 1),
(16, 22, 22, 'Instrument Installation and Calibration Service as Well as Electrical', 'Instrument Installation and Calibration Service as Well as Electrical', 'Instrument Installation and Calibration Service as Well as Electrical', '', '2011-01-01 00:00:00', '2011-05-01 00:00:00', 'Jambi', 1, 0, 1, '', '', '', '2011-01-01 00:00:00', 1, '2011-01-01 00:00:00', 1),
(15, 22, 22, 'Supply And Fabrication Steel Support For North Geragai Project', 'Supply And Fabrication Steel Support For North Geragai Project', 'Supply And Fabrication Steel Support For North Geragai Project', '', '2011-01-01 00:00:00', '2011-03-01 00:00:00', 'Jambi', 1, 0, 1, '', '', '', '2011-01-01 00:00:00', 1, '2011-01-01 00:00:00', 1),
(14, 21, 21, 'Developing logic from HIMA to SM Application FAT', 'Developing logic from HIMA to SM Application FAT', 'Developing logic from HIMA to SM Application FAT', '', '2010-10-01 00:00:00', '2011-02-01 00:00:00', 'Jakarta', 1, 0, 1, '', '', '', '2010-10-01 00:00:00', 1, '2010-10-01 00:00:00', 1),
(13, 5, 3, 'Hydrotest Tube 6mm', 'Hydrotest Tube 6mm', 'Hydrotest Tube 6mm', '', '2010-09-01 00:00:00', '2010-09-01 00:00:00', 'Cilegon-Serang', 1, 0, 1, '', '', '', '2010-09-01 00:00:00', 1, '2010-09-01 00:00:00', 1),
(12, 24, 25, 'Additional Installation Shut Down Valve 3220', 'Additional Installation Shut Down Valve 3220', 'Additional Installation Shut Down Valve 3220', '', '2010-09-01 00:00:00', '2010-09-01 00:00:00', 'Batam', 1, 0, 1, '', '', '', '2010-09-01 00:00:00', 1, '2010-09-01 00:00:00', 1),
(11, 1, 1, 'I & C Man Power Supply for Engineering, Commissioning and Startup.', 'I & C Man Power Supply for Engineering, Commissioning and Startup.', 'I & C Man Power Supply for Engineering, Commissioning and Startup.', '', '2010-08-01 00:00:00', '2013-08-01 00:00:00', 'PLTU SEBALANG 2 X 100 MW, LAMPUNG ', 1, 0, 1, '', '', '', '2010-08-01 00:00:00', 1, '2010-08-01 00:00:00', 1),
(10, 5, 3, 'Throttle Check Valves', 'Throttle Check Valves', 'Throttle Check Valves', '', '2010-08-01 00:00:00', '2013-09-01 00:00:00', 'Cilegon-Serang', 1, 0, 1, '', '', '', '2010-08-01 00:00:00', 1, '2010-08-01 00:00:00', 1),
(9, 5, 5, 'Supply Material And Demolition And Installation Clamp', 'Supply Material And Demolition And Installation Clamp', 'Supply Material And Demolition And Installation Clamp', '', '2010-08-01 00:00:00', '2010-08-01 00:00:00', 'Cilengon-Serang', 1, 0, 1, '', '', '', '2010-08-01 00:00:00', 1, '2010-08-01 00:00:00', 1),
(8, 5, 3, 'Hydrotest, Pickle oil and Remount Pipe', 'Hydrotest, Pickle oil and Remount Pipe', 'Hydrotest, Pickle oil and Remount Pipe', '', '2010-08-01 00:00:00', '2010-08-01 00:00:00', 'Cilegon-Serang', 1, 0, 1, '', '', '', '2010-08-01 00:00:00', 1, '2010-08-01 00:00:00', 1),
(7, 5, 5, 'Supply Material Plat SS', 'Supply Material Plat SS', 'Supply Material Plat SS', '', '2010-07-01 00:00:00', '2010-07-01 00:00:00', 'Cilengon-Serang', 1, 0, 1, '', '', '', '2010-07-01 00:00:00', 1, '2010-07-01 00:00:00', 1),
(6, 5, 5, 'Supply Material Tube Connector And Instalation', 'Supply Material Tube Connector And Instalation', 'Supply Material Tube Connector And Instalation', '', '2010-07-01 00:00:00', '2010-09-01 00:00:00', 'Cilengon-Serang', 1, 0, 1, '', '', '', '2010-07-01 00:00:00', 1, '2010-07-01 00:00:00', 1),
(5, 5, 5, 'Supply Material And Instrument', 'Supply Material And Instrument', 'Supply Material And Instrument', '', '2010-07-01 00:00:00', '2010-09-01 00:00:00', 'Cilengon-Serang', 1, 0, 1, '', '', '', '2010-07-01 00:00:00', 1, '2010-07-01 00:00:00', 1),
(4, 5, 3, 'Supply Material and Instrument Tubing Installation', 'Supply Material and Instrument Tubing Installation', 'Supply Material and Instrument Tubing Installation', '', '2010-07-01 00:00:00', '2010-09-01 00:00:00', 'Cilegon-Serang', 1, 0, 1, '', '', '', '2010-07-01 00:00:00', 1, '2010-07-01 00:00:00', 1),
(3, 5, 5, 'Supply Material And Hydraulic Pipe Installation', 'Supply Material And Hydraulic Pipe Installation', 'Supply Material And Hydraulic Pipe Installation', '', '2010-06-01 00:00:00', '2010-06-01 00:00:00', 'Cilengon-Serang', 1, 0, 1, '', '', '', '2010-06-01 00:00:00', 1, '2010-06-01 00:00:00', 1),
(2, 19, 13, 'Instrument Man Power Supply For Maintenance Contract at  Pertamina Cilacap Through Grama Bazita', 'Instrument Man Power Supply For Maintenance Contract at  Pertamina Cilacap Through Grama Bazita', 'Instrument Man Power Supply For Maintenance Contract at  Pertamina Cilacap Through Grama Bazita', '', '2010-06-01 00:00:00', '2010-06-01 00:00:00', 'Cil acap', 1, 0, 1, '', '', '', '2010-06-01 00:00:00', 1, '2010-06-01 00:00:00', 1),
(79, 34, 34, 'Fire Suppression Panel System &#40;FSPS&#41;', 'Fire Suppression Panel System using Aadvance ICS Triplex Rockwell', 'Fire Suppression System', '/assets/file_upload/admin/images/banner/Fire-Suppresion-Panel-System.jpg', '2015-03-01 00:00:00', '2015-06-01 00:00:00', 'Dulang & Angsi, Malaysia', 1, 1, 3, '', '', '', '2016-09-20 21:50:09', 1, '2017-02-01 05:43:43', 1),
(80, 33, 33, 'Addressable Fire Detection System', 'Fire Addressable Detection Panel using Autronica Fire Alarm Controller Series BS-420 Certified SIL-2 integrated with Autronica Detector', 'Addressable Fire Detection System For Jangkrik Complex Project', '/assets/file_upload/admin/images/banner/Addressable-Fire-Detection-SystemAddressable-Fire-Detection-System.jpg', '2015-02-01 00:00:00', '2015-12-22 00:00:00', 'Jangkrik - Karimun', 1, 1, 1, '', '', '', '2016-09-20 21:52:58', 1, '2017-10-23 11:19:20', 1),
(82, 39, 40, 'Fire &amp; Gas Detection', 'Fire &amp; Gas Detection Installation', 'Fire & Gas Detection', '', '2017-06-10 00:00:00', '2017-09-28 00:00:00', 'PHE WMO KE #5', 1, 0, 1, '', 'PHEWMO', 'PHEWMO', '2017-10-25 14:42:44', 1, '2017-10-25 14:45:52', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_province`
--

CREATE TABLE `tbl_province` (
  `province_id` int(11) NOT NULL,
  `province_name` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_province`
--

INSERT INTO `tbl_province` (`province_id`, `province_name`) VALUES
(1, 'Bali'),
(2, 'Bangka Belitung'),
(3, 'Banten'),
(4, 'Bengkulu'),
(5, 'DI Yogyakarta'),
(6, 'DKI Jakarta'),
(7, 'Gorontalo'),
(8, 'Jambi'),
(9, 'Jawa Barat'),
(10, 'Jawa Tengah'),
(11, 'Jawa Timur'),
(12, 'Kalimantan Barat'),
(13, 'Kalimantan Selatan'),
(14, 'Kalimantan Tengah'),
(15, 'Kalimantan Timur'),
(16, 'Kalimantan Utara'),
(17, 'Kepulauan Riau'),
(18, 'Lampung'),
(19, 'Maluku'),
(20, 'Maluku Utara'),
(21, 'Nanggroe Aceh Darussalam (NAD)'),
(22, 'Nusa Tenggara Barat (NTB)'),
(23, 'Nusa Tenggara Timur (NTT)'),
(24, 'Papua'),
(25, 'Papua Barat'),
(26, 'Riau'),
(27, 'Sulawesi Barat'),
(28, 'Sulawesi Selatan'),
(29, 'Sulawesi Tengah'),
(30, 'Sulawesi Tenggara'),
(31, 'Sulawesi Utara'),
(32, 'Sumatera Barat'),
(33, 'Sumatera Selatan'),
(34, 'Sumatera Utara');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `services_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `page_type` int(1) NOT NULL,
  `services_title` varchar(255) NOT NULL,
  `services_short_desc` varchar(1000) DEFAULT NULL,
  `services_desc` text NOT NULL,
  `services_image` varchar(255) DEFAULT NULL,
  `services_background1` varchar(300) NOT NULL,
  `services_background2` varchar(300) NOT NULL,
  `services_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `services_alias` varchar(255) DEFAULT NULL,
  `services_order` int(11) NOT NULL DEFAULT '1',
  `services_meta_description` varchar(250) DEFAULT NULL,
  `services_meta_keywords` varchar(250) DEFAULT NULL,
  `services_create_date` datetime NOT NULL,
  `services_create_by` int(11) NOT NULL,
  `services_update_date` datetime DEFAULT NULL,
  `services_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`services_id`, `menu_id`, `page_type`, `services_title`, `services_short_desc`, `services_desc`, `services_image`, `services_background1`, `services_background2`, `services_active_status`, `services_alias`, `services_order`, `services_meta_description`, `services_meta_keywords`, `services_create_date`, `services_create_by`, `services_update_date`, `services_update_by`) VALUES
(5, 59, 1, 'digital development', '', 'dsadsadsadsadsa', '/assets/file_upload/admin/images/blog-mas-img-1.jpg', 'http://localhost/balkatweb/assets/file_upload/admin/images/glass.png', 'http://localhost/balkatweb/assets/file_upload/admin/images/finalprint2.jpg', 1, 'digital-development', 1, '', '', '2016-06-27 01:03:53', 1, '2016-06-27 01:54:55', 1),
(6, 59, 1, 'Merchandising', 'dsadsadsadsad', 'Merchandising', '/assets/file_upload/admin/images/foto-3.png', 'http://localhost/balkatweb/assets/file_upload/admin/images/kmn(1).PNG', 'http://localhost/balkatweb/assets/file_upload/admin/images/kmn.PNG', 1, 'merchandising', 2, 'Merchandising', 'Merchandising', '2016-06-27 01:54:41', 1, '2016-06-27 02:05:02', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_signup`
--

CREATE TABLE `tbl_signup` (
  `signup_id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `date_of_birth` date NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) NOT NULL,
  `postal_code` int(10) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `country_id` int(3) NOT NULL,
  `status` int(3) NOT NULL,
  `step` int(3) NOT NULL,
  `signup_date` datetime NOT NULL,
  `email_verification_code` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_signup`
--

INSERT INTO `tbl_signup` (`signup_id`, `full_name`, `email`, `password`, `date_of_birth`, `address1`, `address2`, `postal_code`, `phone`, `country_id`, `status`, `step`, `signup_date`, `email_verification_code`) VALUES
(1, 'Test Aply', 'aplly@test.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1950-01-01', 'dfa', 'ss', 43242432, '33332232', 46, 1, 1, '2015-10-22 14:40:54', 'BGL5fClnyDP7qA4x02V9');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subject`
--

CREATE TABLE `tbl_subject` (
  `subject_id` int(5) NOT NULL,
  `subject_title` varchar(50) NOT NULL,
  `level_id` int(1) NOT NULL,
  `lecturer_id` int(5) NOT NULL,
  `module` varchar(5) NOT NULL,
  `subject_order` int(2) NOT NULL,
  `subject_create_date` datetime NOT NULL,
  `subject_update_date` datetime NOT NULL,
  `subject_active_status` int(1) NOT NULL,
  `subject_create_by` int(1) NOT NULL,
  `subject_update_by` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subject`
--

INSERT INTO `tbl_subject` (`subject_id`, `subject_title`, `level_id`, `lecturer_id`, `module`, `subject_order`, `subject_create_date`, `subject_update_date`, `subject_active_status`, `subject_create_by`, `subject_update_by`) VALUES
(5, 'ddssssssss', 2, 1, '', 5, '2015-11-10 15:33:14', '2015-11-11 01:46:36', 1, 1, 1),
(3, 'das', 1, 2, '', 3, '2015-11-10 15:24:59', '2015-11-11 01:39:03', 1, 1, 1),
(4, 'vggggggggg', 2, 1, '', 2, '2015-11-10 15:25:09', '2015-11-11 01:39:03', 1, 1, 1),
(6, 'fadfadfafdfda', 2, 3, '', 4, '2015-11-11 01:38:51', '2015-11-11 01:39:03', 1, 1, 1),
(7, 'fffffffffffffffff', 2, 3, '', 1, '2015-11-12 01:28:40', '2015-11-12 01:45:22', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_tagging`
--

CREATE TABLE `tbl_tagging` (
  `tagging_id` int(11) NOT NULL,
  `tagging_title` varchar(100) NOT NULL,
  `tagging_create_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_tagging`
--

INSERT INTO `tbl_tagging` (`tagging_id`, `tagging_title`, `tagging_create_date`) VALUES
(1, 'SCHADA', '0000-00-00 00:00:00'),
(2, 'PERTAMINA', '0000-00-00 00:00:00'),
(3, 'HONEYWELL', '0000-00-00 00:00:00'),
(4, 'GAS', '0000-00-00 00:00:00'),
(5, 'PIPELINE', '0000-00-00 00:00:00'),
(6, 'COMPUTER', '0000-00-00 00:00:00'),
(7, 'POWERPLANT', '0000-00-00 00:00:00'),
(8, 'SMARTHOME', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_team`
--

CREATE TABLE `tbl_team` (
  `team_id` int(11) NOT NULL,
  `position_id` int(11) NOT NULL,
  `team_title` varchar(255) NOT NULL,
  `team_position` varchar(255) NOT NULL,
  `team_desc` text NOT NULL,
  `team_image` varchar(255) DEFAULT NULL,
  `team_order` int(11) NOT NULL DEFAULT '1',
  `team_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `team_create_date` datetime NOT NULL,
  `team_create_by` int(11) NOT NULL,
  `team_update_date` datetime DEFAULT NULL,
  `team_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_team`
--

INSERT INTO `tbl_team` (`team_id`, `position_id`, `team_title`, `team_position`, `team_desc`, `team_image`, `team_order`, `team_active_status`, `team_create_date`, `team_create_by`, `team_update_date`, `team_update_by`) VALUES
(1, 1, 'M. RIFKI ASFARI', 'Health & Safety Co-ordinator', 'Experienced in Safety Management System and Business Development more than 2 years.', '', 3, 1, '2016-09-01 01:22:08', 1, '2017-10-25 14:26:57', 4),
(3, 1, 'JOELIANTI DWI SUPRAPTININGSIH', 'Commissioner', 'Having lot of experience in Financial Management, also working part time as Lecturer in more University in Jakarta', '', 2, 1, '2016-09-02 17:55:22', 1, '2017-10-25 14:27:10', 4),
(4, 1, 'GORGA SIMANULLANG', 'President Director', 'Experienced in Oil &amp; Gas and others Industries more than 20 years, Bachelor Degree from ISTN Majoring in Electronics Engineering Physics , Diploma engineering from Polytechnic&ndash;ITB', '', 1, 1, '2016-09-02 17:55:46', 1, '2017-10-25 14:26:35', 4),
(5, 2, 'Irfan Ichwan', 'Engineer', '', '', 1, 1, '2016-09-07 16:20:06', 1, '2016-09-07 16:27:33', 1),
(6, 2, 'Amy Syarfan', 'Engineer', '', '', 1, 1, '2016-09-07 16:21:55', 1, '2016-09-07 16:27:30', 1),
(7, 2, 'Febri Nugraha', 'Engineer', '', '', 1, 1, '2016-09-07 16:22:13', 1, '2016-09-07 16:27:27', 1),
(8, 2, 'Rahmat Adiwiryanto', 'Engineer', '', '', 1, 1, '2016-09-07 16:22:26', 1, '2016-09-07 16:27:23', 1),
(9, 2, 'Budi Oktaria Kamil', 'Engineer', '', '', 1, 1, '2016-09-07 16:22:39', 1, '2016-09-07 16:27:08', 1),
(10, 2, 'Deden Rahmat Hidayat', 'Engineer', '', '', 1, 1, '2016-09-07 16:22:54', 1, '2016-09-07 16:27:03', 1),
(11, 2, 'Dony Adibrata', 'Engineer', '', '', 1, 1, '2016-09-07 16:23:06', 1, '2016-09-07 16:26:59', 1),
(12, 2, 'Dede Surya Kusumah', 'Engineer', '', '', 1, 1, '2016-09-07 16:23:28', 1, '2016-09-07 16:26:53', 1),
(13, 2, 'Wargo Karestuono', 'Engineer', '', '', 1, 1, '2016-09-07 16:23:42', 1, '2016-09-07 16:26:48', 1),
(14, 2, 'Tri Yudo Harisasono', 'Engineer', '', '', 1, 1, '2016-09-07 16:23:54', 1, '2016-09-07 16:26:42', 1),
(15, 2, 'Jandri Hasibuan', 'Engineer', '', '', 1, 1, '2016-09-07 16:24:08', 1, '2016-09-07 16:26:30', 1),
(16, 2, 'Hadi Priyanto', 'Engineer', '', '', 1, 1, '2016-09-07 16:24:31', 1, '2016-09-07 16:26:27', 1),
(17, 2, 'Fremgky', 'Engineer', '', '', 1, 1, '2016-09-07 16:24:41', 1, '2016-09-07 16:26:25', 1),
(18, 2, 'Weriansyah Putra', 'Engineer', '', '', 1, 1, '2016-09-07 16:24:51', 1, '2016-09-07 16:26:22', 1),
(19, 2, 'Emos Arapenta Ginting', 'Engineer', '', '', 1, 1, '2016-09-07 16:25:07', 1, '2016-09-07 16:26:20', 1),
(20, 2, 'Sukadi', 'Engineer', '', '', 1, 1, '2016-09-07 16:25:16', 1, '2016-09-07 16:26:18', 1),
(21, 2, 'M.Rifki', 'Engineer', '', '', 1, 1, '2016-09-07 16:25:26', 1, '2016-09-07 16:26:16', 1),
(22, 2, 'Deki Joko Pratomo', 'Engineer', '', '', 1, 1, '2016-09-07 16:25:39', 1, '2016-09-07 16:26:15', 1),
(23, 2, 'Agus Muharam', 'Engineer', '', '', 1, 1, '2016-09-07 16:25:52', 1, '2016-09-07 16:26:13', 1),
(24, 2, 'Ardhi Sofyan Hilmi', 'Engineer', '-', '', 1, 1, '2016-09-07 16:26:06', 1, '2016-09-07 18:52:55', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_training`
--

CREATE TABLE `tbl_training` (
  `training_id` int(11) NOT NULL,
  `training_brand` varchar(250) NOT NULL,
  `training_brand_image` varchar(250) NOT NULL,
  `training_type` int(11) NOT NULL,
  `training_title` varchar(255) NOT NULL,
  `training_location` varchar(200) NOT NULL,
  `training_short_desc` varchar(1000) DEFAULT NULL,
  `training_desc` text,
  `training_image` varchar(255) DEFAULT NULL,
  `training_date` date NOT NULL,
  `training_start_time` time NOT NULL,
  `training_end_time` time NOT NULL,
  `training_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `training_order` int(11) NOT NULL DEFAULT '1',
  `training_alias` varchar(100) NOT NULL,
  `training_meta_description` varchar(250) DEFAULT NULL,
  `training_meta_keywords` varchar(250) DEFAULT NULL,
  `training_create_date` datetime NOT NULL,
  `training_create_by` int(11) NOT NULL,
  `training_update_date` datetime DEFAULT NULL,
  `training_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_training`
--

INSERT INTO `tbl_training` (`training_id`, `training_brand`, `training_brand_image`, `training_type`, `training_title`, `training_location`, `training_short_desc`, `training_desc`, `training_image`, `training_date`, `training_start_time`, `training_end_time`, `training_active_status`, `training_order`, `training_alias`, `training_meta_description`, `training_meta_keywords`, `training_create_date`, `training_create_by`, `training_update_date`, `training_update_by`) VALUES
(4, 'HONEYWELL', '/assets/file_upload/admin/images/Content/honeywell.jpg', 1, 'Training DCS Experion LXC300', 'PT Caleb Technology', '', '<h3><strong>FASILITAS</strong></h3>\r\n\r\n<ul>\r\n	<li>Sertifikat</li>\r\n	<li>Training Kit</li>\r\n	<li>Snack</li>\r\n</ul>\r\n&nbsp;\r\n\r\n<h3><strong>WAKTU &amp; TEMPAT</strong></h3>\r\nSenin, 29/08/16 - Jumat, 02/09/16<br />\r\n09.00 - 16.00<br />\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143<br />\r\n+6221 29572257<br />\r\n<br />\r\nREGISTRASI BY EMAIL\r\n<ol>\r\n	<li>NAMA LENGKAP</li>\r\n	<li>ALAMAT LENGKAP</li>\r\n	<li>NOMOR TELP</li>\r\n	<li>ASAL KAMPUS</li>\r\n	<li>CV TERBARU</li>\r\n</ol>\r\n<br />\r\n&nbsp;', '/assets/file_upload/admin/images/Content/1474361924964.jpg', '2016-08-29', '09:00:00', '16:00:00', 1, 1, 'training-dcs-experion-lxc300', '', '', '2016-09-20 16:12:02', 1, '2016-09-20 21:43:27', 1),
(5, '', '', 1, 'Training DCS Experion LXC300 - 2', 'PT Caleb Technology', '', '<h3><strong>5 Days Training : 2 day Theory &amp; 3 Day Practice</strong><br />\r\n<br />\r\n<strong>TRAINING COST</strong></h3>\r\n- Rp. 5.000.000,- (training)\r\n\r\n<h3><strong>FACILITY</strong></h3>\r\n\r\n<ul>\r\n	<li>Laptop</li>\r\n	<li>Certificate&nbsp;</li>\r\n	<li>Coffe Break</li>\r\n	<li>Seminar Kit</li>\r\n	<li>Lunch</li>\r\n</ul>\r\n\r\n<h3><strong>LOCATION</strong></h3>\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143\r\n<h3><strong>CONTACT</strong></h3>\r\n\r\n<ul>\r\n	<li>Office &nbsp;(021) 2928 5708</li>\r\n	<li>email (training@caleb-technology.com) &nbsp;</li>\r\n</ul>\r\n\r\n<h3><strong>REGISTRATION</strong></h3>\r\nOpen &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Nov 09-30, 2016 (09.00-15.00)<br />\r\nContact &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : Office -(021) 2928 5708<br />\r\n&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Sukandi 081210960082<br />\r\nAcc Nbr &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; : BRI (0423-01-000260-30-5)<br />\r\nBeneficiary name : PT Caleb Technology<br />\r\n<br />\r\n<em><strong>*** 5% &nbsp;Discount For The First 5 Registration (just Rp 4.500.000,-)***</strong></em><br />\r\n<br />\r\n<br />\r\n&nbsp;', '/assets/file_upload/admin/images/Training/trainings.jpg', '2016-12-05', '09:00:00', '16:00:00', 1, 1, 'training-dcs-experion-lxc300---2', '', '', '2016-11-09 11:56:39', 1, '2016-11-09 12:34:29', 1),
(6, '', '', 1, 'Training DCS Experion LX C300', 'PT Caleb Technology', 'test', '<h3><strong>FASILITAS</strong></h3>\r\n\r\n<ul>\r\n	<li>Sertifikat</li>\r\n	<li>Training Kit</li>\r\n	<li>Snack</li>\r\n</ul>\r\n&nbsp;\r\n\r\n<h3><strong>WAKTU &amp; TEMPAT</strong></h3>\r\nSenin, 29/08/16 - Jumat, 02/09/16<br />\r\n09.00 - 16.00<br />\r\nSINPASA COMMERCIAL, Blok B.01<br />\r\nSummarecon Bekasi<br />\r\nBekasi Kota Jawa Barat Indonesia 17143<br />\r\n+6221 29572257<br />\r\n<br />\r\nREGISTRASI BY EMAIL\r\n<ol>\r\n	<li>NAMA LENGKAP</li>\r\n	<li>ALAMAT LENGKAP</li>\r\n	<li>NOMOR TELP</li>\r\n	<li>ASAL KAMPUS</li>\r\n	<li>CV TERBARU</li>\r\n</ol>\r\n<br />\r\n&nbsp;', '/assets/file_upload/admin/images/Training/TrainingDCSNov.jpg', '2017-11-06', '08:30:00', '16:00:00', 1, 1, 'training-dcs-experion-lx-c300', '', '', '2017-10-16 15:14:01', 1, '2017-10-16 15:14:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(40) NOT NULL,
  `user_pass` varchar(32) NOT NULL,
  `user_active_status` int(1) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_contact` varchar(15) NOT NULL,
  `user_expired` date NOT NULL,
  `user_create_date` datetime NOT NULL,
  `user_create_by` int(11) NOT NULL,
  `user_update_date` datetime NOT NULL,
  `user_update_by` int(11) NOT NULL,
  `user_change_password_date` datetime DEFAULT NULL,
  `user_level_id` int(11) NOT NULL,
  `token` varchar(128) DEFAULT NULL,
  `token_expired` datetime NOT NULL,
  `ip` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_name`, `user_pass`, `user_active_status`, `user_email`, `user_contact`, `user_expired`, `user_create_date`, `user_create_by`, `user_update_date`, `user_update_by`, `user_change_password_date`, `user_level_id`, `token`, `token_expired`, `ip`) VALUES
(1, 'superadmin', '4b899c080a9caf3f6db724841dedf29a', 1, '', '', '0000-00-00', '0000-00-00 00:00:00', 0, '2018-09-03 09:06:36', 1, NULL, 1, NULL, '0000-00-00 00:00:00', NULL),
(6, 'caleb', 'd7e6f7268da287ac9866e583761033f7', 1, 'admin@caleb-technology.com', '', '0000-00-00', '2018-10-09 10:34:09', 4, '2018-10-09 10:41:25', 6, NULL, 3, NULL, '0000-00-00 00:00:00', NULL),
(4, 'Balkat', '29311637fab34a77115d9de4f01bda07', 1, 'info@balkat.com', '', '0000-00-00', '2017-10-23 14:02:12', 1, '0000-00-00 00:00:00', 0, NULL, 1, NULL, '0000-00-00 00:00:00', NULL),
(5, 'training', 'fcea920f7412b5da7be0cf42b8c93759', 1, 'david@balkat.com', '', '0000-00-00', '2017-10-25 13:56:51', 4, '0000-00-00 00:00:00', 0, NULL, 6, NULL, '0000-00-00 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_level`
--

CREATE TABLE `tbl_user_level` (
  `user_level_id` int(11) NOT NULL,
  `user_level_name` varchar(255) NOT NULL,
  `user_level_desc` varchar(200) NOT NULL,
  `user_level_active_status` int(1) NOT NULL,
  `user_level_create_date` datetime NOT NULL,
  `user_level_create_by` int(11) NOT NULL,
  `user_level_update_date` datetime DEFAULT NULL,
  `user_level_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user_level`
--

INSERT INTO `tbl_user_level` (`user_level_id`, `user_level_name`, `user_level_desc`, `user_level_active_status`, `user_level_create_date`, `user_level_create_by`, `user_level_update_date`, `user_level_update_by`) VALUES
(1, 'Super Administrator', 'Super Administrator', 1, '2011-08-19 10:49:45', 1, '2015-08-11 15:18:22', 1),
(3, 'Administrator', 'Administrator', 1, '2015-08-24 15:49:07', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_vimis`
--

CREATE TABLE `tbl_vimis` (
  `vimis_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `vimis_title` varchar(255) NOT NULL,
  `vimis_short_desc` varchar(1000) DEFAULT NULL,
  `vimis_desc` text NOT NULL,
  `vimis_order` int(11) NOT NULL DEFAULT '1',
  `vimis_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `vimis_meta_description` varchar(250) DEFAULT NULL,
  `vimis_meta_keywords` varchar(250) DEFAULT NULL,
  `vimis_create_date` datetime NOT NULL,
  `vimis_create_by` int(11) NOT NULL,
  `vimis_update_date` datetime DEFAULT NULL,
  `vimis_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_vimis`
--

INSERT INTO `tbl_vimis` (`vimis_id`, `menu_id`, `vimis_title`, `vimis_short_desc`, `vimis_desc`, `vimis_order`, `vimis_active_status`, `vimis_meta_description`, `vimis_meta_keywords`, `vimis_create_date`, `vimis_create_by`, `vimis_update_date`, `vimis_update_by`) VALUES
(1, 0, 'Vision', '', 'To be a recognized Systems Integrator company in the region by focusing on our core business of Control System &amp; Instrumentation,&nbsp;Fire &amp; Gas Alarm System,&nbsp;Gas Metering Package, and&nbsp;Power Plant Generation&nbsp;and provides value for our customers through improvements in their business performance.', 1, 1, NULL, NULL, '2016-08-31 19:38:28', 1, '2016-09-07 22:43:34', 1),
(2, 0, 'MISSION', '', 'Imbuing all our operations with the motto of fair business practices,&nbsp;family values and high growth-high profitability', 1, 1, NULL, NULL, '2016-09-07 22:44:22', 1, '2016-09-07 22:44:26', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_works`
--

CREATE TABLE `tbl_works` (
  `works_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  `category_id` int(1) NOT NULL,
  `works_title` varchar(255) NOT NULL,
  `works_short_desc` varchar(1000) DEFAULT NULL,
  `works_desc` text NOT NULL,
  `works_image` varchar(255) DEFAULT NULL,
  `works_active_status` tinyint(1) NOT NULL DEFAULT '0',
  `works_highlight` int(1) NOT NULL DEFAULT '0',
  `works_alias` varchar(255) DEFAULT NULL,
  `works_order` int(11) NOT NULL DEFAULT '1',
  `works_meta_description` varchar(250) DEFAULT NULL,
  `works_about` text NOT NULL,
  `works_client` text NOT NULL,
  `works_meta_keywords` varchar(250) DEFAULT NULL,
  `works_create_date` datetime NOT NULL,
  `works_create_by` int(11) NOT NULL,
  `works_update_date` datetime DEFAULT NULL,
  `works_update_by` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_works`
--

INSERT INTO `tbl_works` (`works_id`, `menu_id`, `services_id`, `category_id`, `works_title`, `works_short_desc`, `works_desc`, `works_image`, `works_active_status`, `works_highlight`, `works_alias`, `works_order`, `works_meta_description`, `works_about`, `works_client`, `works_meta_keywords`, `works_create_date`, `works_create_by`, `works_update_date`, `works_update_by`) VALUES
(16, 55, 0, 6, 'PREOWNEDWATCH', 'Branding', 'Pre-Owned Watch Indonesia is one of the leading marketplace for buying and selling high-end preowned luxury watch in Indonesia with clients as far as Singapore, Malaysia, and United States. Started in 2012, they have managed to gain client&#39;s trusts and conduct sales surpassing many retail establishments without any visible brand identity.<br />\r\n<br />\r\nAlong with their success, they feel the need to unify their brand under a single identity that would be easily recognizable and also establish what is it that they are doing and hopefully further establish their presence as a premium luxury watch marketplace.', '/assets/file_upload/admin/images/BALKAT/Works/prow-cover(1).jpg', 1, 1, 'pre-ownedwatch', 6, 'branding and stationery for preownedwatch-id', 'Branding, Stationery, Minimalist Design', 'Pre-Owned Watch<br />\r\nJakarta, Indonesia', 'logo design, branding, stationery, placing', '2016-05-23 03:19:02', 1, '2016-06-23 21:19:06', 1),
(17, 55, 5, 5, 'GESTALT D+B', 'Web Development', 'Gestalt Design and Build is an architectural design firm based in Kelapa Gading, Jakarta that focuses on interesting out of the box design coupled with build level that is unsurpassed in quality.<br />\r\n<br />\r\nThe company developed their old website in 2012 but feel that they need a new one. One that would better represent their design language and is easy to maintain. The new website also needs to be mobile responsive considering that the majority of visits nowadays are through mobile devices.', '/assets/file_upload/admin/images/BALKAT/Works/gestalt-cover.jpg', 1, 1, 'gestaltdb', 2, 'WEBSITE DEVELOPMENT', 'Website Design, Website Development, PHP, CodeIgniter, HTML5, CSS3', 'GESTALT design build<br />\r\nJakarta, Indonesia<br />\r\nwww.gestalt-db.com', '', '2016-05-23 03:59:36', 1, '2016-06-27 01:33:23', 1),
(18, 55, 0, 4, 'KLINIK MATA NUSANTARA', 'Web Development', '<p>LOREM IPSUM DOLOR SIT AMET</p>', '/assets/file_upload/admin/images/BALKAT/Works/cover-kmn.jpg', 1, 1, 'klinikmatanusantara', 8, 'WEBSITE DEVELOPMENT', '', '', 'WEBSITE', '2016-05-23 04:22:39', 1, '2016-06-17 16:25:26', 1),
(19, 55, 0, 5, 'INFRACONINDO', 'Branding', '<p>Infraconindo is a fast growing infrastructure contractor specializing in the provision of full services for the deployment of networks infrastructures and other telecommunication related project in Indonesia. In 2013, Infraconindo decided to expand their services to cover other infrastructure services such as roads, bridges, highways, sewer, etc and therefore, in need of a new image that could represent their new interest in other construction fields while still portraying their focus in network infrastructures and telecommunication.<br />\r\n<br />\r\nThe client wanted a logo that shows excellence, strength, trust and integrity. The logo should also represent their current focus in network infrastructures and telecommunication while at the same time does not limit their scope to other infrastructure services such as roads, bridges, highways, etc.<br />\r\n<br />\r\nWe created a logo that is modern and could be interpreted in different ways:</p>\r\n\r\n<ol>\r\n	<li>At a glance, it appears to be a tower emitting its signal/ influence.</li>\r\n	<li>Looking at it from a slighly different perspective, one could also interpret it as a road that leads to a destination.</li>\r\n</ol>\r\n\r\n<p><br />\r\nThe use of blue as the dominant color symbolizes trust, honesty, reliability, responsibility.&nbsp;Two shades of blue are used the lighter blue inspires determination and ambition to achieve great things, a sense of purpose in striving for goals. While the darker blue represents knowledge, power, integrity and responsibility.</p>\r\n\r\n<p>&nbsp;</p>', '/assets/file_upload/admin/images/BALKAT/Works/COVER-INFRACONINDO.jpg', 1, 1, 'infraconindo', 4, 'logo design for Infraconindo', 'BRANDING, LOGO DEVELOPMENT, STATIONERY', 'PT INFRACONINDO<br />\r\nJakarta, Indonesia', 'branding, Logo Design, stationery', '2016-05-23 05:11:49', 1, '2016-06-24 13:46:59', 1),
(14, 55, 0, 6, 'CUPCAKES SOCIETY', 'Branding', 'Cupcakes Society&nbsp;is a shop that sells cakes, cupcakes, and cookies. established in 2013, Cupcakes Society plans to&nbsp;open its first outlet at a mall in Jakarta.&nbsp;This logo design is an early stage for branding structure of Cupcakes Society.<br />\r\n<br />\r\npreviously, Cupcakes Society already&nbsp;have a logo, but to convey a clearer vision of the mission, the client was in need of a new brand image that can represent&nbsp;the characteristics of their business<br />\r\n<br />\r\n&nbsp;Brief<br />\r\nThe client wanted a logo display vitorian style character, elegant yet modern, with predominantly shades of pink, white and brown color that is representative of cupcakes and cakes they offer<br />\r\n<br />\r\nSolution<br />\r\nDeveloping a communication message based by a brief and compare with visual interface in a similar business. then applying it equally effective media such as websites, packaging, brochure, banner, etc.', '/assets/file_upload/admin/images/BALKAT/Works/cover-cs.jpg', 1, 1, 'cupcakessociety', 5, 'branding', 'Branding, Promotional item, Packaging Design', 'Cupcakes Society<br />\r\nMall Cipinang Indah<br />\r\nJakarta, Indonesia', 'branding, packaging', '2016-05-23 02:55:27', 1, '2016-06-19 21:05:24', 1),
(30, 55, 0, 6, 'TAFEL 21', 'BRANDING', 'Nulla porttitor accumsan tincidunt. Mauris blandit aliquet elit, eget tincidunt nibh pulvinar a. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Vivamus magna justo, lacinia eget consectetur sed, convallis at tellus. Proin eget tortor risus. Praesent sapien massa, convallis a pellentesque nec, egestas non nisi. Nulla porttitor accumsan tincidunt. Donec sollicitudin molestie malesuada. Pellentesque in ipsum id orci porta dapibus. Curabitur non nulla sit amet nisl tempus convallis quis ac lectus.', '/assets/file_upload/admin/images/BALKAT/Works/work-tafel.jpg', 1, 1, 'tafel21', 7, 'branding', 'Branding Development and Newsletter Template Design', 'TAFEL 21<br />\r\ntableware, kithenware, gifts<br />\r\nJakarta, Indonesia', 'branding, Logo Design, newsletter', '2016-06-02 12:47:04', 1, '2016-06-17 16:25:26', 1),
(43, 55, 0, 6, 'FEMEENIN', 'BRANDING', 'desc', '/assets/file_upload/admin/images/BALKAT/Works/femeeninbranding.jpg', 1, 0, 'femeeninbranding', 3, 'branding', 'branding', 'femeen.in', 'branding, Logo Design', '2016-06-08 13:29:03', 1, '2016-06-19 21:05:09', 1),
(32, 55, 0, 6, 'FEMEEN.IN', 'WEB DESIGN', 'desc', '/assets/file_upload/admin/images/BALKAT/Works/FEMEENIN.jpg', 1, 0, 'femeenin', 2, 'femeenin', 'Branding, Webdesign online store', 'Femeen.in', 'femeenin, online shop, fashion', '2016-06-02 14:52:13', 1, '2016-06-19 21:06:55', 1),
(33, 55, 0, 5, 'WAM', 'BRANDING', 'desc', '/assets/file_upload/admin/images/BALKAT/Works/wam-cover.jpg', 1, 1, 'wam', 3, 'wam, wira agung mandiri, contractor, kontraktor', 'Branding, Corporate identity, Company profile (Book &amp; Folder), Uniform Design, Merchandising', '<p>PT WIRA AGUNG MANDIRI<br />\r\nGENERAL CONTRACTOR &amp; SUPPLIER</p>\r\n\r\n<p>BEKASI, INDONESIA</p>', 'wam, wira agung mandiri, contractor, kontraktor, branding, company profile, print', '2016-06-02 14:54:28', 1, '2016-06-17 16:25:26', 1),
(34, 55, 1, 7, 'KARVE', 'WEB DESIGN', 'Karve which means &quot;Cow&quot; in English is a Lithuanian producer of milk-based products. Company X which acts as a distributor for their product in Indonesia, requested us to design a simple website that showcase their products. The tone of the website is a combination of fun and modern.&nbsp;', '/assets/file_upload/admin/images/BALKAT/Works/KARVE.jpg', 0, 0, 'karve', 1, 'Website design for Karve', 'Website Design, Parallax Website, Fun &amp; Bright Colors', 'KARVE', 'karve, milk, web design development', '2016-06-02 14:57:31', 1, '2016-06-27 01:30:33', 1),
(35, 55, 0, 7, 'CORSA', 'RE-BRANDING', 'description', '/assets/file_upload/admin/images/BALKAT/Works/corsa.jpg', 1, 0, 'corsa', 8, 'corsa', '<span style=\"line-height: 20.8px;\">Branding Corsa Platinum</span>', 'PT MULTISTRADA ARAH SARANA, TBK<br />\r\n&nbsp;', 'branding, launch campaign, web design', '2016-06-02 15:01:54', 1, '2016-06-19 21:08:01', 1),
(36, 55, 0, 8, 'EDCONNECT', 'Marketing Kit', '<span style=\"line-height: 20.8px;\">EdConnect is a StartUp in the field of Education Technology (EdTech) with a mission to empower the education system in Indonesia.<br />\r\n<br />\r\nSince the beginning of 2012, EdConnect entrusted us with all their branding needs which includes the development of their Logo, Stationery and Marketing Kit.<br />\r\n<br />\r\nWe continue to work with them in developing their User-Interface (UI) for their Web and Mobile Apps for multiple roles (Institution, Principals, Administration, Teachers, Students, and Parents). We develop multiple UI that is role specific with information that is only relevant to the user. &nbsp;Only then can we ensure the best User-Experience (UX) possible. &nbsp;</span>', '/assets/file_upload/admin/images/BALKAT/Works/edconnect.jpg', 1, 0, 'edconnect', 7, 'branding, marketing kit, website, ui/ux for a web based school management system', 'Adobe Photoshop, Adobe Illustrator, Digital Imaging', 'PT EDCONNECT SOLUSI INTEGRASI', 'Branding, Marketing Kit, Web Design, Web Development, User Interface (UI), User Experience (UX), Brochure, Printing,', '2016-06-02 15:20:03', 1, '2016-06-17 16:25:26', 1),
(37, 55, 0, 3, 'YUANTA SECURITIES', 'Web Development', 'Yuanta is a Taiwan based multinational finance company that is involved in securities trading in Indonesia.<br />\r\n<br />\r\nIn order to comply with their strict corporate governance, we had to work closely with their corporate office in Singapore, their IT team and all departments within their organization. All the while making sure that every design element follow their Corporate Identity System (CIS).<br />\r\n<br />\r\nThrough their website, the company hopes to be able to:\r\n<ol>\r\n	<li>Educate the public on all of their products,</li>\r\n	<li>Serve as a resource portal for their clients to access daily and industry specific reports generated from their team of excellent researchers.&nbsp;</li>\r\n	<li>Facilitate interested candidate to use their online trading platform by automatically generated Demo accounts linked to their Online Trading platform.</li>\r\n	<li>Digitalize their Opening Account with automatic linking to their ERP system.&nbsp;</li>\r\n</ol>', '/assets/file_upload/admin/images/BALKAT/Works/yuantaaa.jpg', 1, 0, 'yuanta', 6, 'Taiwan based securities companies', 'Web Design, Web Development, C#, ASP.Net, HML5, CSS3', 'PT YUANTA SECURITIES INDONESIA<br />\r\nwww.yuanta.co.id', 'marketing kit, company profile, web design, web development, securities, stock broker, stock exchange', '2016-06-02 15:25:39', 1, '2016-06-17 16:25:26', 1),
(38, 55, 0, 7, 'ASTRA GAYA MOTOR (AGM)', '3D MODELING', 'Gaya Motor is a company that is responsible for the assembly of BMW in Indonesia. In conjunction with the launch of the new BMW X1 crossover, Gaya Motor plans to expand their office space.<br />\r\n<br />\r\nOur team was assigned to transform the provided blueprint and design into 3D models to print on banners for visitors to visualize their new office.', '/assets/file_upload/admin/images/BALKAT/Works/agm.jpg', 1, 0, 'agm', 5, 'astra gaya motor interior office design 3D modeling', 'INTERIOR DESIGN OFFICE, 3D MODELING, LARGE FORMAT PRINTING', 'PT. Gaya Motor<br />\r\nJakarta, Indonesia', 'astra gaya motor, bmw, office planning, event, large format printing', '2016-06-02 15:28:02', 1, '2016-06-23 22:11:45', 1),
(39, 55, 0, 2, 'LONDON SCHOOL OF ACCOUNTING &amp; FINANCE (LSAF)', 'Web Development', 'London School of Accounting and Finance (LSAF) is an ACCA Gold Accredited partner that is responsible for the success of many students seeking a professional degree in accounting.&nbsp;<br />\r\n<br />\r\nTo keep with the current trend in learning technologies, LSAF contacted us to create a website that is not only informative, but also interactive. Our solution is to create a website in which prospective students can Apply Online, take Entrance Test and submit relevant documents through their website.<br />\r\n<br />\r\nThis saves time and resources by automating the current labor and time intensive process. Once accepted, students are able to access a specialized portal where they can view their current academic standings, Take Tests, view A, Lecture Videos, and attend Online Classroom.', '/assets/file_upload/admin/images/BALKAT/Works/lsaf.jpg', 1, 1, 'lsaf', 4, '', 'Distant Learning, Student Portal, Online Test, Online Registration', 'London School of Accounting and Finance', 'website development, online portal, online test, online classroom', '2016-06-02 15:40:16', 1, '2016-06-17 16:25:26', 1),
(40, 55, 0, 5, 'HARUM ENERGY', '', 'DESC', '/assets/file_upload/admin/images/BALKAT/Works/harum.jpg', 1, 0, 'harumenergy', 3, '', 'ABOUT', 'PT Harum Energy Tbk', 'annual report, mining, coal, energy', '2016-06-02 15:47:22', 1, '2016-06-17 16:25:26', 1),
(41, 55, 5, 2, 'PPM School of Management', 'Web Design', 'For decades, PPM Management (PPM) has become a partner to managers and manager candidates in Indonesia in sharing experiences in the study of theory and practice of management studies.<br />\r\n<br />\r\nWe had the opprtunity to update their website. One that would better represent the institution in today&#39;s digital world.&nbsp;', '/assets/file_upload/admin/images/BALKAT/Works/aappm.jpg', 1, 0, 'ppmmanajemen', 1, 'Web Design for PPM School of Management', 'Web Design, Education Institution', 'Yayasan PPM Manajemen', 'web design, education, school, university', '2016-06-02 15:49:28', 1, '2016-06-27 01:33:08', 1),
(42, 55, 0, 2, 'GKI - Kebayoran Baru', 'WEBDESIGN', 'desc', '/assets/file_upload/admin/images/BALKAT/Works/gki.jpg', 1, 0, 'gki-kb', 2, '', 'abot', 'client', '', '2016-06-02 15:54:12', 1, '2016-06-17 16:25:26', 1),
(44, 55, 0, 5, 'WIRA AGUNG MANDIRI', 'COMPANY PROFILE', 'As an established contractor firm, Wira Agung Mandiri (WAM) approached to us to help re-design their existing company profile. WAM wanted to switch from a complete book-style profile to one that is simple, cost effective and also usable.<br />\r\n<br />\r\nOur team came out with a 3-fold brochure design that doubles as a folder. Links to official documents are presented in both QR code and shortened links. By attaching the links instead of the actual copy, enables the company to save paper and also simplify potential clients to access paperwork for review.<br />\r\n<br />\r\n<br />\r\n<a href=\"https://drive.google.com/open?id=0B19-DEwx3mV4dFB6aEZ1ZkZqNjA\" target=\"_blank\">preview (PDF)</a><br />\r\n&nbsp;', '/assets/file_upload/admin/images/BALKAT/Works/wamcompro.jpg', 1, 0, 'comprowam', 1, 'company profile, folder design, marketing kit for Wira Agung Mandiri', 'Marketing Tools', '<p>PT WIRA AGUNG MANDIRI</p>\r\n\r\n<p>GENERAL CONTRACTOR _ SUPPLIER<br />\r\nBekasi, Indonesia</p>', 'brochure, company profile, folding, print', '2016-06-08 15:25:17', 1, '2016-06-23 21:12:13', 1),
(46, 55, 6, 7, 'CORSA.', 'WEB DESIGN', 'w', '/assets/file_upload/admin/images/BALKAT/Works/corsa01.jpg', 1, 0, 'webcorsa', 1, 'Web Design for Corsa Motorcycle Tires', 'Web Design', 'PT MULTISTRADA ARAH SARANA, TBK<br />\r\n&nbsp;', 'Web Design, Motorcycle Tires, Tyres, Corsa,', '2016-06-23 09:11:42', 1, '2016-06-27 01:55:18', 1),
(47, 55, 0, 6, 'preownedwatch-id', 'WEB DESIGN', 'Pre-Owned Watch Indonesia is one of the leading marketplace for buying and selling high-end preowned luxury watch in Indonesia with clients as far as Singapore, Malaysia, and United States. Started in 2012, they have managed to gain client&#39;s trusts and conduct sales surpassing many retail establishments without any visible brand identity.<br />\r\n<br />\r\nAs a continuation to unify their Branding, we are appointed to update their website which utilizes Google&#39;s Blogger platform to suit their current Branding style. This poses a challenge as there are many design and feature limitations in Blogger.<br />\r\n<br />\r\nWhat we did:\r\n<ol>\r\n	<li>Reduce the space consumed by pictures by transforming them as a collage style</li>\r\n	<li>Removing unnecessary widgets and information to reduce clutter</li>\r\n	<li>Update the colors and fonts for it to match with their current branding &nbsp;</li>\r\n</ol>', '/assets/file_upload/admin/images/BALKAT/Works/prowweb.jpg', 1, 0, 'preowndeswatchid', 1, 'Blogger redesign for Preownedwatch-id.com', 'Web Design, Web Development, Blogger, Front-End Development', 'Pre-Owned Watch ID<br />\r\nJakarta, Indonesia', 'blogger, google blogger.com, web design,', '2016-06-23 14:53:19', 1, '2016-06-23 21:43:28', 1),
(48, 55, 0, 8, 'EDCONNECT.', 'UI/ UX', 'EdConnect is a StartUp in the field of Education Technology (EdTech) with a mission to empower the education system in Indonesia.<br />\r\n<br />\r\nSince the beginning of 2012, EdConnect entrusted us with all their branding needs which includes the development of their Logo, Stationery and Marketing Kit.<br />\r\n<br />\r\nWe continue to work with them in developing their User-Interface (UI) for their Web and Mobile Apps for multiple roles (Institution, Principals, Administration, Teachers, Students, and Parents). We develop multiple UI that is role specific with information that is only relevant to the user. &nbsp;Only then can we ensure the best User-Experience (UX) possible. &nbsp;', '/assets/file_upload/admin/images/BALKAT/Works/edcui.jpg', 1, 0, 'edconnectui', 1, 'UI/UX', 'UI/ UX Design, Process Flow Analysis', 'EDCONNECT<br />\r\nPT EDCONNECT SOLUSI INTEGRASI', 'UI', '2016-06-23 15:01:20', 1, '2016-06-23 22:01:45', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cms_setting`
--
ALTER TABLE `cms_setting`
  ADD PRIMARY KEY (`setting_name`);

--
-- Indexes for table `tbl_about`
--
ALTER TABLE `tbl_about`
  ADD PRIMARY KEY (`about_id`);

--
-- Indexes for table `tbl_access`
--
ALTER TABLE `tbl_access`
  ADD PRIMARY KEY (`access_id`),
  ADD KEY `user_level_id` (`user_level_id`,`module_id`);

--
-- Indexes for table `tbl_access_privilege`
--
ALTER TABLE `tbl_access_privilege`
  ADD PRIMARY KEY (`access_privilege_id`),
  ADD KEY `access_id` (`access_id`,`privilege_id`);

--
-- Indexes for table `tbl_alias`
--
ALTER TABLE `tbl_alias`
  ADD PRIMARY KEY (`alias_id`),
  ADD KEY `alias_category` (`alias_category`),
  ADD KEY `alias_active_status` (`alias_active_status`);

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indexes for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_career`
--
ALTER TABLE `tbl_career`
  ADD PRIMARY KEY (`career_id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`city_id`),
  ADD KEY `kota_id` (`city_id`,`province_id`);

--
-- Indexes for table `tbl_client`
--
ALTER TABLE `tbl_client`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_content`
--
ALTER TABLE `tbl_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `tbl_content_page`
--
ALTER TABLE `tbl_content_page`
  ADD PRIMARY KEY (`content_page_id`);

--
-- Indexes for table `tbl_content_subpage`
--
ALTER TABLE `tbl_content_subpage`
  ADD PRIMARY KEY (`content_subpage_id`);

--
-- Indexes for table `tbl_country`
--
ALTER TABLE `tbl_country`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `tbl_gallery_about`
--
ALTER TABLE `tbl_gallery_about`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_gallery_works`
--
ALTER TABLE `tbl_gallery_works`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `tbl_general`
--
ALTER TABLE `tbl_general`
  ADD PRIMARY KEY (`general_id`);

--
-- Indexes for table `tbl_language`
--
ALTER TABLE `tbl_language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `tbl_latest_training`
--
ALTER TABLE `tbl_latest_training`
  ADD PRIMARY KEY (`latest_training_id`);

--
-- Indexes for table `tbl_log_cms`
--
ALTER TABLE `tbl_log_cms`
  ADD PRIMARY KEY (`log_id_cms`);

--
-- Indexes for table `tbl_material`
--
ALTER TABLE `tbl_material`
  ADD PRIMARY KEY (`material_id`);

--
-- Indexes for table `tbl_material_file`
--
ALTER TABLE `tbl_material_file`
  ADD PRIMARY KEY (`material_file_id`);

--
-- Indexes for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  ADD PRIMARY KEY (`menu_id`),
  ADD KEY `menu_parent` (`menu_parent`,`menu_order`),
  ADD KEY `menu_active_status` (`menu_active_status`);

--
-- Indexes for table `tbl_module`
--
ALTER TABLE `tbl_module`
  ADD PRIMARY KEY (`module_id`);

--
-- Indexes for table `tbl_module_group`
--
ALTER TABLE `tbl_module_group`
  ADD PRIMARY KEY (`module_group_id`);

--
-- Indexes for table `tbl_module_privilege`
--
ALTER TABLE `tbl_module_privilege`
  ADD PRIMARY KEY (`module_privilege_id`),
  ADD KEY `module_id` (`module_id`,`privilege_id`);

--
-- Indexes for table `tbl_news`
--
ALTER TABLE `tbl_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`pages_id`),
  ADD KEY `pages_title` (`pages_title`,`pages_active_status`,`pages_create_date`);

--
-- Indexes for table `tbl_page_view`
--
ALTER TABLE `tbl_page_view`
  ADD PRIMARY KEY (`page_type`);

--
-- Indexes for table `tbl_position`
--
ALTER TABLE `tbl_position`
  ADD PRIMARY KEY (`position_id`);

--
-- Indexes for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  ADD PRIMARY KEY (`privilege_id`);

--
-- Indexes for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  ADD PRIMARY KEY (`projects_id`);

--
-- Indexes for table `tbl_province`
--
ALTER TABLE `tbl_province`
  ADD PRIMARY KEY (`province_id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`services_id`);

--
-- Indexes for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  ADD PRIMARY KEY (`signup_id`);

--
-- Indexes for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tbl_tagging`
--
ALTER TABLE `tbl_tagging`
  ADD PRIMARY KEY (`tagging_id`);

--
-- Indexes for table `tbl_team`
--
ALTER TABLE `tbl_team`
  ADD PRIMARY KEY (`team_id`);

--
-- Indexes for table `tbl_training`
--
ALTER TABLE `tbl_training`
  ADD PRIMARY KEY (`training_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  ADD PRIMARY KEY (`user_level_id`);

--
-- Indexes for table `tbl_vimis`
--
ALTER TABLE `tbl_vimis`
  ADD PRIMARY KEY (`vimis_id`);

--
-- Indexes for table `tbl_works`
--
ALTER TABLE `tbl_works`
  ADD PRIMARY KEY (`works_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_about`
--
ALTER TABLE `tbl_about`
  MODIFY `about_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_access`
--
ALTER TABLE `tbl_access`
  MODIFY `access_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT for table `tbl_access_privilege`
--
ALTER TABLE `tbl_access_privilege`
  MODIFY `access_privilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=441;
--
-- AUTO_INCREMENT for table `tbl_alias`
--
ALTER TABLE `tbl_alias`
  MODIFY `alias_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_blog`
--
ALTER TABLE `tbl_blog`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_blog_category`
--
ALTER TABLE `tbl_blog_category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_career`
--
ALTER TABLE `tbl_career`
  MODIFY `career_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_client`
--
ALTER TABLE `tbl_client`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_content`
--
ALTER TABLE `tbl_content`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_content_page`
--
ALTER TABLE `tbl_content_page`
  MODIFY `content_page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tbl_content_subpage`
--
ALTER TABLE `tbl_content_subpage`
  MODIFY `content_subpage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `tbl_country`
--
ALTER TABLE `tbl_country`
  MODIFY `country_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_gallery_about`
--
ALTER TABLE `tbl_gallery_about`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_gallery_works`
--
ALTER TABLE `tbl_gallery_works`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `tbl_general`
--
ALTER TABLE `tbl_general`
  MODIFY `general_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_language`
--
ALTER TABLE `tbl_language`
  MODIFY `language_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_latest_training`
--
ALTER TABLE `tbl_latest_training`
  MODIFY `latest_training_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tbl_log_cms`
--
ALTER TABLE `tbl_log_cms`
  MODIFY `log_id_cms` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1151;
--
-- AUTO_INCREMENT for table `tbl_material`
--
ALTER TABLE `tbl_material`
  MODIFY `material_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `tbl_material_file`
--
ALTER TABLE `tbl_material_file`
  MODIFY `material_file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `tbl_menu`
--
ALTER TABLE `tbl_menu`
  MODIFY `menu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `tbl_module`
--
ALTER TABLE `tbl_module`
  MODIFY `module_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- AUTO_INCREMENT for table `tbl_module_group`
--
ALTER TABLE `tbl_module_group`
  MODIFY `module_group_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `tbl_module_privilege`
--
ALTER TABLE `tbl_module_privilege`
  MODIFY `module_privilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300;
--
-- AUTO_INCREMENT for table `tbl_news`
--
ALTER TABLE `tbl_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_news_category`
--
ALTER TABLE `tbl_news_category`
  MODIFY `category_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `pages_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tbl_page_view`
--
ALTER TABLE `tbl_page_view`
  MODIFY `page_type` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1000;
--
-- AUTO_INCREMENT for table `tbl_position`
--
ALTER TABLE `tbl_position`
  MODIFY `position_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_privilege`
--
ALTER TABLE `tbl_privilege`
  MODIFY `privilege_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_projects`
--
ALTER TABLE `tbl_projects`
  MODIFY `projects_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
--
-- AUTO_INCREMENT for table `tbl_province`
--
ALTER TABLE `tbl_province`
  MODIFY `province_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `services_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_signup`
--
ALTER TABLE `tbl_signup`
  MODIFY `signup_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_subject`
--
ALTER TABLE `tbl_subject`
  MODIFY `subject_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_tagging`
--
ALTER TABLE `tbl_tagging`
  MODIFY `tagging_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_team`
--
ALTER TABLE `tbl_team`
  MODIFY `team_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `tbl_training`
--
ALTER TABLE `tbl_training`
  MODIFY `training_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_user_level`
--
ALTER TABLE `tbl_user_level`
  MODIFY `user_level_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_vimis`
--
ALTER TABLE `tbl_vimis`
  MODIFY `vimis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_works`
--
ALTER TABLE `tbl_works`
  MODIFY `works_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
