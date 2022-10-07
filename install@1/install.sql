-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2021 at 03:15 PM
-- Server version: 5.6.38
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sausage`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topup_amount` varchar(11) COLLATE utf8_unicode_ci DEFAULT '0',
  `transaction` varchar(14) COLLATE utf8_unicode_ci NOT NULL,
  `phone` int(10) NOT NULL,
  `buyname` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `points` int(11) NOT NULL,
  `rp` int(11) NOT NULL,
  `event` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `uid`, `username`, `action`, `date`, `topup_amount`, `transaction`, `phone`, `buyname`, `points`, `rp`, `event`) VALUES
(1, '1', 'porsuwapap', 'Buy Item #1', '2021-05-08 03:53', '0', '1', 0, '', 0, 0, 0),
(2, '1', 'porsuwapap', 'Buy Item #1', '2021-05-08 05:08', '0', '1', 0, '', 0, 0, 0),
(3, '1', 'porsuwapap', 'Buy Item #1', '2021-05-08 05:12', '0', '1', 0, '', 0, 0, 0),
(4, '1', 'porsuwapap', 'Buy Item #1', '2021-05-08 05:12', '0', '1', 0, '', 0, 0, 0),
(5, '1', 'Admin', 'Buy Item #1', '2021-07-27 13:39', '0', '1', 0, '', 0, 0, 0),
(6, '1', 'Admin', 'Buy #1', '2021-07-27 14:28', '0', '1', 0, '', 0, 0, 0),
(7, '1', 'Admin', 'Buy #1', '2021-07-27 14:31', '0', '1', 0, '', 0, 0, 0),
(8, '1', 'Admin', 'Buy #1', '', '0', '1', 0, '', 0, 0, 0),
(9, '1', 'Admin', 'Buy #2', '', '0', '2', 0, '', 0, 0, 0),
(10, '1', 'Admin', 'Buy #2', '2021-07-27 14:48', '0', '555', 0, '', 0, 0, 0),
(11, '1', 'Admin', 'Buy #3', '2021-07-27 14:50', '0', 'test@...', 1122334455, '', 0, 0, 0),
(12, '1', 'Admin', 'ซื้อ3', '2021-07-27 15:12', '0', 'test@...', 1122334455, '', 0, 0, 0),
(13, '1', 'Admin', 'ซื้อ', '2021-07-27 15:13', '0', 'test@...', 1122334455, '', 0, 0, 0),
(14, '1', 'Admin', 'ซื้อ', '2021-07-29 18:39', '0', '', 0, '', 0, 0, 0),
(15, '1', 'Admin', 'เงินออก#', '2021-08-13 13:22', '0', '', 0, '', 0, 0, 0),
(16, '1', 'Admin', 'เงินออก#', '2021-08-13 13:22', '0', '', 0, '', 0, 0, 0),
(17, '1', 'Admin', 'ซื้อ', '2021-11-14 15:18', '0', '', 0, '', 0, 0, 0),
(18, '1', 'Admin', 'ซื้อ', '2021-11-14 15:20', '0', '', 0, '', 0, 0, 0),
(19, '1', 'Admin', 'ซื้อ', '2021-11-14 15:21', '0', '', 0, '', 0, 0, 0),
(20, '1', 'Admin', 'ซื้อ', '2021-11-14 15:23', '0', 'USER', 0, '', 0, 0, 0),
(21, '1', 'Admin', 'ซื้อ', '2021-11-14 15:25', '0', 'USER', 19132, '', 0, 0, 0),
(22, '1', 'Admin', 'ซื้อ', '2021-11-14 15:45', '0', 'USER', 19132, '', 0, 0, 0),
(23, '1', 'Admin', 'ซื้อ', '2021-11-14 15:50', '0', 'USER', 19132, '', 0, 0, 0),
(24, '1', 'Admin', 'ซื้อ', '2021-11-14 15:51', '0', 'USER', 19132, '', 0, 0, 0),
(25, '1', 'Admin', 'ซื้อ', '2021-11-14 15:54', '0', 'USER', 19132, '', 0, 0, 0),
(26, '1', 'Admin', 'ซื้อ', '2021-11-14 16:02', '0', 'USER', 19132, '', 0, 0, 0),
(27, '1', 'Admin', 'ซื้อ', '2021-11-16 16:16', '0', 'USER', 19132, '', 0, 0, 0),
(28, '1', 'Admin', 'ซื้อ', '2021-11-16 16:19', '0', 'USER', 19132, '', 0, 0, 0),
(29, '1', 'Admin', 'ซื้อ', '2021-11-16 16:20', '0', 'USER', 19132, '', 0, 0, 0),
(30, '1', 'Admin', 'ซื้อ', '2021-11-16 16:22', '0', 'USER', 19132, '', 0, 0, 0),
(31, '1', 'Admin', 'ซื้อ', '2021-11-16 16:24', '0', 'USER', 19132, '', 0, 0, 0),
(32, '1', 'Admin', 'ซื้อ', '2021-11-16 16:25', '0', 'USER', 19132, '', 0, 0, 0),
(33, '1', 'Admin', 'ซื้อ', '2021-11-16 16:25', '0', 'USER', 19132, '', 0, 0, 0),
(34, '1', 'Admin', 'ซื้อ', '2021-11-16 16:27', '0', 'USER', 19132, '', 0, 0, 0),
(35, '1', 'Admin', 'ซื้อ', '2021-11-16 16:29', '0', 'USER', 19132, '', 0, 0, 0),
(36, '1', 'Admin', 'ซื้อ', '2021-11-16 16:29', '0', 'USER', 19132, '', 0, 0, 0),
(37, '1', 'Admin', 'ซื้อ', '2021-11-16 16:29', '0', 'USER', 19132, '', 0, 0, 0),
(38, '1', 'Admin', 'ซื้อ', '2021-11-16 16:30', '0', 'USER', 19132, '', 0, 0, 0),
(39, '1', 'Admin', 'ซื้อ', '2021-11-16 16:30', '0', 'USER', 19132, '', 0, 0, 0),
(40, '1', 'Admin', 'ซื้อ', '2021-11-16 16:31', '0', 'USER', 19132, '', 0, 0, 0),
(41, '1', 'Admin', 'ซื้อ', '2021-11-16 16:31', '0', 'USER', 19132, '', 0, 0, 0),
(42, '1', 'Admin', 'ซื้อ', '2021-11-16 16:35', '0', 'USER', 19132, '', 0, 0, 0),
(43, '1', 'Admin', 'ซื้อ', '2021-11-16 16:36', '0', 'USER', 19132, '', 0, 0, 0),
(44, '1', 'Admin', 'ซื้อ', '2021-11-16 16:44', '0', 'USER', 19132, '', 0, 0, 0),
(45, '1', 'Admin', 'ซื้อ', '2021-11-16 16:44', '0', 'USER', 19132, '', 0, 0, 0),
(46, '1', 'Admin', 'ซื้อ', '2021-11-16 16:46', '0', 'USER', 19132, '', 0, 0, 0),
(47, '1', 'Admin', 'ซื้อ', '2021-11-16 16:47', '0', 'USER', 19132, '', 0, 0, 0),
(48, '1', 'Admin', 'ซื้อ', '2021-11-16 16:48', '0', 'USER', 19132, '', 0, 0, 0),
(49, '1', 'Admin', 'ซื้อ', '2021-11-16 16:48', '0', 'USER', 19132, '', 0, 0, 0),
(50, '1', 'Admin', 'ซื้อ', '2021-11-16 16:48', '0', 'USER', 19132, '', 0, 0, 0),
(51, '1', 'Admin', 'ซื้อ', '2021-11-16 16:48', '0', 'USER', 19132, '', 0, 0, 0),
(52, '1', 'Admin', 'ซื้อ', '2021-11-16 16:48', '0', 'USER', 19132, '', 0, 0, 0),
(53, '1', 'Admin', 'ซื้อ', '2021-11-16 16:48', '0', 'USER', 19132, '', 0, 0, 0),
(54, '1', 'Admin', 'ซื้อ', '2021-11-16 16:48', '0', 'USER', 19132, '', 0, 0, 0),
(55, '1', 'Admin', 'ซื้อ', '2021-11-16 16:50', '0', 'USER', 19132, '', 0, 0, 0),
(56, '1', 'Admin', 'ซื้อ', '2021-11-16 17:48', '0', 'USER', 19132, '', 0, 0, 0),
(57, '1', 'Admin', 'ซื้อ', '2021-11-16 17:49', '0', 'USER', 19132, '', 0, 0, 0),
(58, '1', 'Admin', 'ซื้อ', '2021-11-16 17:49', '0', 'USER', 19132, '', 0, 0, 0),
(59, '1', 'Admin', 'ซื้อ', '2021-11-16 17:52', '0', 'USER', 19132, '', 0, 0, 0),
(60, '1', 'Admin', 'ซื้อ', '2021-11-16 17:52', '0', 'USER', 19132, '', 0, 0, 0),
(61, '1', 'Admin', 'ซื้อ', '2021-11-16 17:52', '0', 'USER', 19132, '', 0, 0, 0),
(62, '1', 'Admin', 'ซื้อ', '2021-11-16 17:53', '0', 'USER', 19132, '', 0, 0, 0),
(63, '1', 'Admin', 'ซื้อ', '2021-11-16 17:54', '0', 'USER', 19132, '', 0, 0, 0),
(64, '1', 'Admin', 'ซื้อ', '2021-11-16 17:54', '0', 'USER', 19132, '', 0, 0, 0),
(65, '1', 'Admin', 'ซื้อ', '2021-11-16 17:57', '0', 'USER', 19132, '', 0, 0, 0),
(66, '1', 'Admin', 'ซื้อ', '2021-11-16 17:57', '0', 'USER', 19132, '', 0, 0, 0),
(67, '1', 'Admin', 'ซื้อ', '2021-11-16 17:57', '0', 'USER', 19132, '', 0, 0, 0),
(68, '1', 'Admin', 'ซื้อ', '2021-11-16 17:58', '0', 'USER', 19132, '', 0, 0, 0),
(69, '1', 'Admin', 'ซื้อ', '2021-11-16 18:01', '0', 'USER', 19132, '', 0, 0, 0),
(70, '1', 'Admin', 'ซื้อ', '2021-11-16 18:02', '0', 'USER', 19132, '', 0, 0, 0),
(71, '1', 'Admin', 'ซื้อ', '2021-11-16 18:02', '0', 'USER', 19132, '', 0, 0, 0),
(72, '1', 'Admin', 'ซื้อ', '2021-11-16 18:03', '0', 'USER', 19132, '', 0, 0, 0),
(73, '1', 'Admin', 'ซื้อ', '2021-11-16 18:03', '0', 'USER', 19132, '', 0, 0, 0),
(74, '1', 'Admin', 'ซื้อ', '2021-11-16 18:04', '0', 'USER', 19132, '', 0, 0, 0),
(75, '1', 'Admin', 'ซื้อ', '2021-11-16 18:04', '0', 'USER', 19132, '', 0, 0, 0),
(76, '1', 'Admin', 'ซื้อ', '2021-11-16 18:10', '0', 'USER', 19132, '', 0, 0, 0),
(77, '1', 'Admin', 'ซื้อ', '2021-11-16 18:10', '0', 'USER', 19132, '', 0, 0, 0),
(78, '1', 'Admin', 'ซื้อ', '2021-11-16 18:14', '0', 'USER', 19132, '', 0, 0, 0),
(79, '1', 'Admin', 'ซื้อ', '2021-11-16 18:15', '0', 'USER', 19132, '', 0, 0, 0),
(80, '1', 'Admin', 'ซื้อ', '2021-11-16 18:15', '0', 'USER', 19132, '', 0, 0, 0),
(81, '1', 'Admin', 'ซื้อ', '2021-11-16 21:00', '0', 'RTZRG', 19132, '', 0, 0, 0),
(82, '1', 'Admin', 'ซื้อ', '2021-11-16 21:09', '0', '', 0, '', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `announce`
--

CREATE TABLE `announce` (
  `id` int(11) NOT NULL,
  `html` text COLLATE utf8_unicode_ci NOT NULL,
  `date_create` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `announce`
--

INSERT INTO `announce` (`id`, `html`, `date_create`) VALUES
(5, 'โปรโมชั่นเฉพาะช่วงนี้เท่านั้น เติมเงิน X2 ทุกราคาบัตร ห้ามพลาดดด !!', '15/10/2019 20:42:28');

-- --------------------------------------------------------

--
-- Table structure for table `authme`
--

CREATE TABLE `authme` (
  `id` int(11) NOT NULL,
  `user_img` text,
  `username` varchar(255) NOT NULL,
  `realname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ip` varchar(40) NOT NULL DEFAULT '127.0.0.1',
  `lastlogin` bigint(20) DEFAULT '0',
  `x` double NOT NULL DEFAULT '0',
  `y` double NOT NULL DEFAULT '0',
  `z` double NOT NULL DEFAULT '0',
  `world` varchar(255) DEFAULT 'world',
  `email` varchar(255) DEFAULT 'your@email.com',
  `isLogged` smallint(6) NOT NULL DEFAULT '0',
  `hasSession` smallint(6) NOT NULL DEFAULT '0',
  `points` varchar(255) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `status` enum('member','admin','ban') NOT NULL DEFAULT 'member',
  `rp` varchar(255) NOT NULL DEFAULT '0',
  `topup` double(62,2) NOT NULL DEFAULT '0.00',
  `regdate` bigint(20) NOT NULL DEFAULT '0',
  `regip` varchar(40) CHARACTER SET ascii COLLATE ascii_bin DEFAULT NULL,
  `yaw` float DEFAULT NULL,
  `pitch` float DEFAULT NULL,
  `topup_m` double(64,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `authme`
--

INSERT INTO `authme` (`id`, `user_img`, `username`, `realname`, `password`, `ip`, `lastlogin`, `x`, `y`, `z`, `world`, `email`, `isLogged`, `hasSession`, `points`, `status`, `rp`, `topup`, `regdate`, `regip`, `yaw`, `pitch`, `topup_m`) VALUES
(1, 'id1_f37f87_img.jpg', 'Admin', 'Admin', '$SHA$gdxJavyyFPPhyzgS$68e47195a98643442ffb567945d29161df2f4cd8d3947679b160f5a947c29416', '127.0.0.1', 0, 0, 0, 0, 'world', 'admin@gmail.com', 0, 0, '1171', 'admin', '0', 20.00, 0, NULL, NULL, NULL, 0.00),
(9, 'id9_6f951c_img.jpg', 'f41zz', 'F41ZZ', '$SHA$9SJi7glRkqtIgE5c$2c2f29b9ac5e14a088d69945d560fb95179ca71dac43862c9effc699f3c4cfaa', '127.0.0.1', 0, 0, 0, 0, 'world', '0839158135@truemoneywallet.com', 0, 0, '9998', 'member', '0', 0.00, 0, NULL, NULL, NULL, 0.00),
(10, 'id10_46d7bc_img.jpg', 'porsuwapap', 'PorSuwapap', '$SHA$SVWfekhSUIXbU26P$361eba565ccb9737d592553f20bda1e6390ed0d1360722aada3ca7e50bdb32fc', '127.0.0.1', 0, 0, 0, 0, 'world', '1122334455@gmail.com', 0, 0, '0', 'member', '0', 0.00, 0, NULL, NULL, NULL, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, '1'),
(3, 'เช่ายศ'),
(5, 'ไอเท็ม'),
(6, 'อื่นๆ');

-- --------------------------------------------------------

--
-- Table structure for table `redeem`
--

CREATE TABLE `redeem` (
  `id` int(11) NOT NULL,
  `code` varchar(256) NOT NULL DEFAULT '@amc',
  `cmd` varchar(256) NOT NULL DEFAULT '9999',
  `status` varchar(256) NOT NULL DEFAULT '0',
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `redeem`
--

INSERT INTO `redeem` (`id`, `code`, `cmd`, `status`, `date`) VALUES
(2, '124', '100', '1', '2021-10-01 11:07'),
(6, '128', '100', '1', '2021-10-01 11:07'),
(7, '129', '100', '1', '2021-10-01 11:07'),
(8, '120', '100', '1', '2021-10-01 11:07');

-- --------------------------------------------------------

--
-- Table structure for table `redeemlog`
--

CREATE TABLE `redeemlog` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topup_amount` varchar(11) COLLATE utf8_unicode_ci DEFAULT '0',
  `transaction` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id` int(11) NOT NULL,
  `backend_password` varchar(255) NOT NULL,
  `name_server` varchar(255) NOT NULL,
  `www` varchar(255) NOT NULL,
  `youtube_watch` varchar(255) NOT NULL,
  `discord_id` varchar(255) NOT NULL,
  `announce` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `ip_server` varchar(255) NOT NULL,
  `port_server` varchar(255) NOT NULL,
  `version_server` varchar(255) NOT NULL,
  `page_facebook` varchar(255) NOT NULL,
  `detail_server` varchar(255) NOT NULL,
  `max_reg` varchar(255) NOT NULL,
  `query_port` varchar(255) NOT NULL,
  `slash` enum('slash','slash_off') NOT NULL,
  `bg` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id`, `backend_password`, `name_server`, `www`, `youtube_watch`, `discord_id`, `announce`, `icon`, `ip_server`, `port_server`, `version_server`, `page_facebook`, `detail_server`, `max_reg`, `query_port`, `slash`, `bg`) VALUES
(1, '', 'ชื่อเว็ป SHOP', 'http://localhost:8080/', '_zE-8T0pY8Y', 'discord_id', '9999', 'img/1.png', '', '', '', '', 'คำอธิบาย หน้าเว็ป', '9999999', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop`
--

CREATE TABLE `shop` (
  `id` int(225) NOT NULL,
  `name` text NOT NULL,
  `price` text NOT NULL,
  `img` text NOT NULL,
  `mail` text NOT NULL,
  `order` text NOT NULL,
  `pic1` text NOT NULL,
  `pic2` text NOT NULL,
  `pic3` text NOT NULL,
  `category` text NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `shop`
--

INSERT INTO `shop` (`id`, `name`, `price`, `img`, `mail`, `order`, `pic1`, `pic2`, `pic3`, `category`, `username`, `password`) VALUES
(1, 'ประหยัด', '10', 'sausage.png', 'test.mp4', '1', 'img/1.png', 'img/1.png', 'img/1.png', '', 'RTZRG', '19132');

-- --------------------------------------------------------

--
-- Table structure for table `topuplog`
--

CREATE TABLE `topuplog` (
  `id` int(11) NOT NULL,
  `uid` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `date` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `topup_amount` varchar(11) COLLATE utf8_unicode_ci DEFAULT '0',
  `transaction` varchar(14) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `xpoint`
--

CREATE TABLE `xpoint` (
  `xpoint` int(11) DEFAULT NULL,
  `x1` int(11) DEFAULT NULL,
  `x2` int(11) DEFAULT NULL,
  `x3` int(11) DEFAULT NULL,
  `x4` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `xpoint`
--

INSERT INTO `xpoint` (`xpoint`, `x1`, `x2`, `x3`, `x4`) VALUES
(5, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `announce`
--
ALTER TABLE `announce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authme`
--
ALTER TABLE `authme`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeem`
--
ALTER TABLE `redeem`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `redeemlog`
--
ALTER TABLE `redeemlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop`
--
ALTER TABLE `shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topuplog`
--
ALTER TABLE `topuplog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `announce`
--
ALTER TABLE `announce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `authme`
--
ALTER TABLE `authme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `redeem`
--
ALTER TABLE `redeem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `redeemlog`
--
ALTER TABLE `redeemlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shop`
--
ALTER TABLE `shop`
  MODIFY `id` int(225) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `topuplog`
--
ALTER TABLE `topuplog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
