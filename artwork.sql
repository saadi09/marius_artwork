-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 30, 2020 at 08:22 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `artwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `log_id` int(22) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action_controller` text,
  `action_method` text,
  `action_url` text,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ip` varchar(25) DEFAULT NULL,
  `browser` text,
  `os` text,
  `device` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`log_id`, `user_id`, `action_controller`, `action_method`, `action_url`, `date_time`, `ip`, `browser`, `os`, `device`) VALUES
(1, 1, NULL, NULL, NULL, '2020-11-26 18:35:11', NULL, NULL, NULL, NULL),
(2, 1, NULL, NULL, NULL, '2020-11-26 18:35:12', NULL, NULL, NULL, NULL),
(3, 1, NULL, NULL, NULL, '2020-11-26 18:35:12', NULL, NULL, NULL, NULL),
(4, 1, NULL, NULL, NULL, '2020-11-26 18:35:12', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `company_information`
--

CREATE TABLE `company_information` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `website` varchar(100) NOT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company_information`
--

INSERT INTO `company_information` (`id`, `name`, `email`, `contact`, `address`, `website`, `logo`, `date_time`) VALUES
(1, 'kimberly Transport', 'info@kimberlytransport.com', '604.521.9315', '669 Derwent Way Delta, BC V3M 5P7', 'kimberlytransport.com', NULL, '2018-06-12 22:18:06');

-- --------------------------------------------------------

--
-- Table structure for table `email_settings`
--

CREATE TABLE `email_settings` (
  `id` int(1) NOT NULL,
  `host` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `port` int(3) NOT NULL,
  `email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `sent_email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `sent_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `reply_email` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `reply_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `email_settings`
--

INSERT INTO `email_settings` (`id`, `host`, `port`, `email`, `password`, `sent_email`, `sent_title`, `reply_email`, `reply_title`) VALUES
(1, 'mail.technologicx.com', 465, 'admin@technologicx.com', 'saadi123*', 'admin@technologicx.com', 'Kimberly Transport', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_login_attempts`
--

CREATE TABLE `failed_login_attempts` (
  `fla_id` int(11) NOT NULL,
  `user_email` varchar(55) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failed_login_attempts`
--

INSERT INTO `failed_login_attempts` (`fla_id`, `user_email`, `user_id`, `date_time`) VALUES
(1, 'cyberasad09@gmail.com', 1, '2020-10-20 02:57:25'),
(2, 'cyberasad09@gmail.com', 1, '2020-10-21 15:55:04'),
(3, 'cyberasad09@gmail.com', 1, '2020-10-21 19:10:22'),
(4, 'cyberasad09@gmail.com', 1, '2020-10-26 23:24:35'),
(5, 'cyberasad09@gmail.com', 1, '2020-10-27 15:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_otp_attempts`
--

CREATE TABLE `failed_otp_attempts` (
  `foa_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failed_otp_attempts`
--

INSERT INTO `failed_otp_attempts` (`foa_id`, `user_id`, `date_time`) VALUES
(1, NULL, '2020-10-15 21:53:16'),
(2, NULL, '2020-10-15 21:53:23');

-- --------------------------------------------------------

--
-- Table structure for table `fonts`
--

CREATE TABLE `fonts` (
  `id` int(11) NOT NULL,
  `label` varchar(25) DEFAULT NULL,
  `class` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fonts`
--

INSERT INTO `fonts` (`id`, `label`, `class`) VALUES
(1, 'Th', 'fa-th'),
(2, 'Pie Chart', 'fa-chart-pie'),
(3, 'Cube', 'fa fa-cube'),
(4, 'Cubes', 'fa fa-cubes'),
(5, 'Database', 'fa fa-database'),
(6, 'Desktop', 'fa fa-desktop'),
(7, 'Folder Open', 'fa fa-folder-open'),
(8, 'Folder', 'fa fa-folder'),
(9, 'Settings gear', 'fa fa-gear'),
(10, 'Settings', 'fa fa-gears'),
(11, 'Line Chart', 'fa fa-line-chart'),
(12, 'Qr Code', 'fa fa-qrcode'),
(13, 'Recycle', 'fa fa-recycle'),
(14, 'Sitemap', 'fa fa-sitemap'),
(15, 'Tasks', 'fa fa-tasks'),
(16, 'Envelope', 'fa fa-envelope'),
(17, 'Dashboard', 'fa fa-dashboard'),
(18, 'Fork', 'fa fa-code-fork'),
(19, 'History', 'fa fa-history'),
(20, 'Print', 'fa fa-print'),
(21, 'User', 'fa fa-user'),
(22, 'Users', 'fa fa-users'),
(23, 'Search', 'fa fa-search');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` tinyint(1) NOT NULL,
  `type` varchar(35) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `type`, `created_at`) VALUES
(1, 'Admin', '2018-08-15 03:33:17'),
(2, 'User', '2018-08-15 04:54:36'),
(3, 'Managerzz', '2020-10-15 00:06:42'),
(4, 'AQ', '2020-11-24 16:55:24');

-- --------------------------------------------------------

--
-- Table structure for table `login_otp`
--

CREATE TABLE `login_otp` (
  `login_otp_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` varchar(55) DEFAULT NULL,
  `otp_pin` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('0','1') NOT NULL DEFAULT '1' COMMENT '''1=active'',''0=expired'''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_otp`
--

INSERT INTO `login_otp` (`login_otp_id`, `user_id`, `session_id`, `otp_pin`, `created_at`, `status`) VALUES
(1, 1, 'aiobk19ue72hsqep1l7cne73hmgbpiqe', 534917, '2020-10-15 21:52:09', '1');

-- --------------------------------------------------------

--
-- Table structure for table `login_settings`
--

CREATE TABLE `login_settings` (
  `login_setting_id` int(11) NOT NULL,
  `two_factor_auth` enum('1','0') NOT NULL DEFAULT '1' COMMENT '"1 = enabled","0 = disabled"',
  `failed_login_limit` tinyint(2) DEFAULT NULL,
  `otp_expire_time` tinyint(2) DEFAULT NULL COMMENT '"Value in minutes"',
  `failed_otp_limit` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login_settings`
--

INSERT INTO `login_settings` (`login_setting_id`, `two_factor_auth`, `failed_login_limit`, `otp_expire_time`, `failed_otp_limit`) VALUES
(1, '0', 5, 5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(3) NOT NULL,
  `parent` int(3) NOT NULL,
  `name` varchar(25) NOT NULL,
  `class` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `display_order` int(11) DEFAULT NULL,
  `status` enum('System','User') NOT NULL DEFAULT 'User'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `parent`, `name`, `class`, `url`, `display_order`, `status`) VALUES
(18, 14, 'Art Work Listing', '', 'list_artwork', 0, 'User'),
(17, 14, 'Add New Art Work', '', 'create_artwork', 0, 'User'),
(16, 0, 'User Managment', 'fa fa-users', '', 0, 'User'),
(13, 0, 'Auctions', 'fa fa-tasks', '', 1, 'User'),
(14, 0, 'Art Works', 'fa fa-code-fork', '', 0, 'User');

-- --------------------------------------------------------

--
-- Table structure for table `menus_routes`
--

CREATE TABLE `menus_routes` (
  `id` int(11) NOT NULL,
  `label` varchar(55) DEFAULT NULL,
  `route` text,
  `added_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus_routes`
--

INSERT INTO `menus_routes` (`id`, `label`, `route`, `added_at`) VALUES
(1, 'Menu Manager', 'menu_manager', '2020-11-24 13:00:53'),
(2, 'Add New Menu', 'menu_create', '2020-11-24 13:01:30'),
(3, 'Add New Menu Route', 'menu_routes', '2020-11-24 13:01:44'),
(10, 'Menu Routing List', 'menu_route_listing', '2020-11-24 16:34:22'),
(11, 'Add Groups', 'add_groups', '2020-11-24 16:40:00'),
(12, 'Add Permission', 'add_permission', '2020-11-24 16:40:21'),
(13, 'User Activity Logs', 'activity_logs', '2020-11-26 12:57:31'),
(14, 'Add New Art Work', 'create_artwork', '2020-11-27 15:42:16'),
(15, 'Art work Listing', 'list_artwork', '2020-11-27 17:39:45');

-- --------------------------------------------------------

--
-- Table structure for table `oa_art_works`
--

CREATE TABLE `oa_art_works` (
  `id_artwork` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `description` text,
  `price` double(16,2) NOT NULL DEFAULT '0.00',
  `type_id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `status` enum('Pending','Approved','Disapproved','Cancelled','Deleted') NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oa_art_works`
--

INSERT INTO `oa_art_works` (`id_artwork`, `title`, `description`, `price`, `type_id`, `author_id`, `created_at`, `updated_at`, `deleted_at`, `status`) VALUES
(1, 'My Art work', 'Test', 2500.00, 1, 1, '2020-11-27 12:35:39', '2020-11-27 12:35:39', NULL, 'Approved'),
(2, 'Paiting', 'This is a testing message', 3000.00, 2, 1, '2020-11-27 12:52:33', '2020-11-27 12:52:33', NULL, 'Pending'),
(3, 'Test', 'test', 2500.00, 1, 1, '2020-11-27 13:39:22', '2020-11-27 13:39:22', NULL, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `oa_art_work_images`
--

CREATE TABLE `oa_art_work_images` (
  `id` int(11) NOT NULL,
  `art_work_id` int(11) NOT NULL,
  `image` text,
  `status` enum('Active','Inactive') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oa_art_work_images`
--

INSERT INTO `oa_art_work_images` (`id`, `art_work_id`, `image`, `status`) VALUES
(1, 1, '1606480539_997a8c6fbfd9fe676831.jpg', 'Active'),
(2, 1, '1606480539_b203af2d1fe4e62f8a01.jpg', 'Active'),
(3, 1, '1606480539_328c135a72f622f2f744.jpg', 'Active'),
(4, 1, '1606480539_d2440cfb2e31b666ebe5.jpg', 'Active'),
(5, 1, '1606480539_7956c2d93bb442dc5ca6.jpg', 'Active'),
(6, 1, '1606480539_d5a418aea58fb37ec925.jpg', 'Active'),
(7, 1, '1606480539_68d0f8027090100b801b.jpg', 'Active'),
(8, 1, '1606480539_7c2f12a24ea09f436ebf.jpg', 'Active'),
(9, 2, '1606481553_0933a6eae12ff89bfc4a.jpg', 'Active'),
(10, 2, '1606481553_024b99db49e80f457772.jpg', 'Active'),
(11, 2, '1606481553_eba6de628f3ff0d7c373.jpg', 'Active'),
(12, 2, '1606481553_374c18384675248cacf2.jpg', 'Active'),
(13, 2, '1606481553_c72fb0ee7ea9f6f7be50.jpg', 'Active'),
(14, 2, '1606481553_594cf3071f9bea6e8a9a.jpg', 'Active'),
(15, 2, '1606481553_29013368edb21fd459b1.jpg', 'Active'),
(16, 2, '1606481553_12fd32231882f3b4a295.jpg', 'Active'),
(17, 0, '1606481681_d1ef7efdaabfb3c7c0a2.jpg', 'Active'),
(18, 0, '1606481681_0e486dc78bb21ac59180.jpg', 'Active'),
(19, 0, '1606481681_911a32803bf390defc7a.jpg', 'Active'),
(20, 0, '1606481681_ee27ade9e6330e19a4b0.jpg', 'Active'),
(21, 0, '1606481681_b8b81abacc2495440cba.jpg', 'Active'),
(22, 0, '1606481681_dacf8606a5760542b600.jpg', 'Active'),
(23, 0, '1606481681_24cb5778c0b3687e7157.jpg', 'Active'),
(24, 0, '1606481681_3ecef4cea7abac3955f4.jpg', 'Active'),
(25, 0, '1606483838_857fef0a61ba31e84f18.jpg', 'Active'),
(26, 0, '1606483838_eb5ee36b054d4eb9f1b9.jpg', 'Active'),
(27, 0, '1606483838_4beba1489fed7baceaa6.jpg', 'Active'),
(28, 0, '1606483838_0556a72f860dbcd75c0c.jpg', 'Active'),
(29, 0, '1606483838_1370320b1a8c787e0c8f.jpg', 'Active'),
(30, 0, '1606483838_101cab52dc18d1cf32c7.jpg', 'Active'),
(31, 0, '1606483838_f1ddb3e5f33c7c21c53d.jpg', 'Active'),
(32, 0, '1606483838_b9cb2fd1b7f9b096ab22.jpg', 'Active'),
(33, 0, '1606483922_8345c3f9dffe28091057.jpg', 'Active'),
(34, 0, '1606483922_e31be34a0eec045f8909.jpg', 'Active'),
(35, 0, '1606483922_a44e67fac9d5b30eb725.jpg', 'Active'),
(36, 0, '1606483922_2e6e9ef9eb0b8fc6ec12.jpg', 'Active'),
(37, 0, '1606483922_9cbbc00fa426e73e588c.jpg', 'Active'),
(38, 0, '1606483922_b16a865a6b5025811057.jpg', 'Active'),
(39, 0, '1606483922_b77d2d9f6df67b67068e.jpg', 'Active'),
(40, 0, '1606483922_cb5a57d20fe27d046689.jpg', 'Active'),
(41, 0, '1606484260_806ed1c657726c036889.jpg', 'Active'),
(42, 0, '1606484260_52d6e6089b1d126c5c2f.jpg', 'Active'),
(43, 0, '1606484260_eb236e3641d933a32084.jpg', 'Active'),
(44, 0, '1606484260_d310082e5eb94a45e9fb.jpg', 'Active'),
(45, 0, '1606484260_db28cf6f3a0e0994b93f.jpg', 'Active'),
(46, 0, '1606484260_1d08a864108a24194816.jpg', 'Active'),
(47, 0, '1606484301_f890675b82960e942d1c.jpg', 'Active'),
(48, 0, '1606484301_e28e3b76edb294c3c218.jpg', 'Active'),
(49, 0, '1606484301_ac6a5a48ce5b68f9f765.jpg', 'Active'),
(50, 0, '1606484301_6072746e34d9c81b76d1.jpg', 'Active'),
(51, 0, '1606484301_c749ec0a8005527b0c32.jpg', 'Active'),
(52, 0, '1606484301_c4d1e8f7c9094b1468e4.jpg', 'Active'),
(53, 3, '1606484362_ebbe550dd122b6ce9f42.jpg', 'Active'),
(54, 3, '1606484362_798d141e8e582f50c3bc.jpg', 'Active'),
(55, 3, '1606484362_bf5c2d4ab2a2f6f07e1f.jpg', 'Active'),
(56, 3, '1606484362_6180808b9f0c441bbfc1.jpg', 'Active'),
(57, 3, '1606484362_c985fb656b499ed7f8f1.jpg', 'Active'),
(58, 3, '1606484362_6f5dad69171bd320ca07.jpg', 'Active'),
(59, 0, '1606484377_8d387050bb27f704e68f.jpg', 'Active'),
(60, 0, '1606484377_ffdf484e53f954fbe778.jpg', 'Active'),
(61, 0, '1606484377_9299dcbcbcddcd606ad1.jpg', 'Active'),
(62, 0, '1606484377_12095d61b367be5a626a.jpg', 'Active'),
(63, 0, '1606484377_a4820504b174efcae907.jpg', 'Active'),
(64, 0, '1606484377_dcf87e1ce97dd66bf638.jpg', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `oa_art_work_types`
--

CREATE TABLE `oa_art_work_types` (
  `id` int(11) NOT NULL,
  `awt_title` varchar(255) DEFAULT NULL,
  `awt_description` text,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oa_art_work_types`
--

INSERT INTO `oa_art_work_types` (`id`, `awt_title`, `awt_description`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Abstract Expressionism', 'Abstract Expressionism', 0, '2020-11-27 12:33:13', NULL),
(2, 'Art Nouveau', 'Art Nouveau', 0, '2020-11-27 12:33:13', NULL),
(3, 'Avant-garde', 'Avant-garde', 0, '2020-11-27 12:33:13', NULL),
(4, 'Futurism', 'Futurism', 0, '2020-11-27 12:33:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `oa_auctions`
--

CREATE TABLE `oa_auctions` (
  `id` int(11) NOT NULL,
  `auction_title` varchar(255) DEFAULT NULL,
  `auction_desc` text,
  `auction_start_date` timestamp NULL DEFAULT NULL,
  `auction_end_date` timestamp NULL DEFAULT NULL,
  `auction_result` varchar(255) DEFAULT NULL,
  `auction_status` enum('Active','Inactive') NOT NULL DEFAULT 'Active',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `oa_bids`
--

CREATE TABLE `oa_bids` (
  `id` int(11) NOT NULL,
  `auction_id` int(11) NOT NULL,
  `lot_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bid_amount` decimal(16,2) NOT NULL DEFAULT '0.00',
  `bid_time` datetime DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` enum('Active','Inactive') NOT NULL DEFAULT 'Active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` int(2) NOT NULL,
  `hash` varchar(100) NOT NULL,
  `user_status` enum('Active','suspend','Blocked') NOT NULL DEFAULT 'Active',
  `user_type` enum('Admin','Artist','Member','Guest') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` datetime DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `hash`, `user_status`, `user_type`, `created_at`, `update_at`, `image`) VALUES
(1, 'AQ', 'jqsystech@gmail.com', '$2y$10$cLsmmMcXBtzCn7qJxl0.2uHbsSTs4ggE9OjwkeYYN/FU8CPCL3kZ6', 0, '', 'Active', 'Admin', '2020-11-23 20:38:46', NULL, NULL),
(2, 'Ali', 'ali@gmai.com', '$2y$10$bZtXtM8q0qdwLk7XqgT3LeRABrn.QIyD2Og4Jb2l3S7haKCk92Fwa', 0, '', 'Active', 'Admin', '2020-11-26 03:38:19', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_logs`
--

CREATE TABLE `user_logs` (
  `log_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `session_id` text,
  `user_ip` text,
  `user_browser` text,
  `user_os` text,
  `user_device` text,
  `login_at` varchar(25) DEFAULT NULL,
  `logout_at` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_logs`
--

INSERT INTO `user_logs` (`log_id`, `user_id`, `session_id`, `user_ip`, `user_browser`, `user_os`, `user_device`, `login_at`, `logout_at`) VALUES
(1, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(2, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_permission`
--

CREATE TABLE `user_permission` (
  `per_id` int(11) NOT NULL,
  `group_id` tinyint(2) NOT NULL,
  `main_menu_id` int(11) DEFAULT NULL,
  `permission` enum('NO','YES') DEFAULT NULL,
  `sub_menu_id` int(11) DEFAULT NULL,
  `date_time` datetime DEFAULT CURRENT_TIMESTAMP,
  `added_by` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_permission`
--

INSERT INTO `user_permission` (`per_id`, `group_id`, `main_menu_id`, `permission`, `sub_menu_id`, `date_time`, `added_by`) VALUES
(25, 2, 11, 'YES', 12, '2020-11-26 14:49:54', 'aq'),
(40, 2, 1, 'YES', 2, '2020-11-26 16:49:08', 'aq'),
(41, 2, 1, 'YES', 3, '2020-11-26 16:49:08', 'aq'),
(42, 2, 1, 'YES', 4, '2020-11-26 16:49:08', 'aq'),
(43, 2, 1, 'YES', 5, '2020-11-26 16:49:08', 'aq'),
(44, 2, 8, 'YES', 9, '2020-11-26 16:49:15', 'aq'),
(45, 2, 8, 'YES', 10, '2020-11-26 16:49:15', 'aq'),
(47, 2, 14, 'YES', 17, '2020-11-27 17:40:37', 'aq'),
(48, 2, 14, 'YES', 18, '2020-11-27 17:40:37', 'aq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `company_information`
--
ALTER TABLE `company_information`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_settings`
--
ALTER TABLE `email_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_login_attempts`
--
ALTER TABLE `failed_login_attempts`
  ADD PRIMARY KEY (`fla_id`);

--
-- Indexes for table `failed_otp_attempts`
--
ALTER TABLE `failed_otp_attempts`
  ADD PRIMARY KEY (`foa_id`);

--
-- Indexes for table `fonts`
--
ALTER TABLE `fonts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_otp`
--
ALTER TABLE `login_otp`
  ADD PRIMARY KEY (`login_otp_id`);

--
-- Indexes for table `login_settings`
--
ALTER TABLE `login_settings`
  ADD PRIMARY KEY (`login_setting_id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_routes`
--
ALTER TABLE `menus_routes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oa_art_works`
--
ALTER TABLE `oa_art_works`
  ADD PRIMARY KEY (`id_artwork`);

--
-- Indexes for table `oa_art_work_images`
--
ALTER TABLE `oa_art_work_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oa_art_work_types`
--
ALTER TABLE `oa_art_work_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oa_auctions`
--
ALTER TABLE `oa_auctions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oa_bids`
--
ALTER TABLE `oa_bids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_logs`
--
ALTER TABLE `user_logs`
  ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `user_permission`
--
ALTER TABLE `user_permission`
  ADD PRIMARY KEY (`per_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `log_id` int(22) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `company_information`
--
ALTER TABLE `company_information`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_settings`
--
ALTER TABLE `email_settings`
  MODIFY `id` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_login_attempts`
--
ALTER TABLE `failed_login_attempts`
  MODIFY `fla_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_otp_attempts`
--
ALTER TABLE `failed_otp_attempts`
  MODIFY `foa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `fonts`
--
ALTER TABLE `fonts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `login_otp`
--
ALTER TABLE `login_otp`
  MODIFY `login_otp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `login_settings`
--
ALTER TABLE `login_settings`
  MODIFY `login_setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `menus_routes`
--
ALTER TABLE `menus_routes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `oa_art_works`
--
ALTER TABLE `oa_art_works`
  MODIFY `id_artwork` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `oa_art_work_images`
--
ALTER TABLE `oa_art_work_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `oa_art_work_types`
--
ALTER TABLE `oa_art_work_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oa_auctions`
--
ALTER TABLE `oa_auctions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `oa_bids`
--
ALTER TABLE `oa_bids`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_logs`
--
ALTER TABLE `user_logs`
  MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_permission`
--
ALTER TABLE `user_permission`
  MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
