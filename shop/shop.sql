-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2015 at 04:48 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `shop_category`
--

CREATE TABLE IF NOT EXISTS `shop_category` (
`category_cid` int(11) NOT NULL,
  `category_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_category`
--

INSERT INTO `shop_category` (`category_cid`, `category_name`) VALUES
(1, 'PHPSCript'),
(2, 'เทสๆ'),
(5, 'test'),
(6, 'xx'),
(7, 'undefined'),
(8, 'undefined');

-- --------------------------------------------------------

--
-- Table structure for table `shop_data`
--

CREATE TABLE IF NOT EXISTS `shop_data` (
`shop_did` int(11) NOT NULL,
  `shop_name` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shop_details` varchar(2000) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shop_desc` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shop_category` int(11) NOT NULL,
  `shop_image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shop_price` int(11) NOT NULL,
  `shop_keyword` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `shop_contact` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_data`
--

INSERT INTO `shop_data` (`shop_did`, `shop_name`, `shop_details`, `shop_desc`, `shop_category`, `shop_image`, `shop_price`, `shop_keyword`, `shop_contact`) VALUES
(1, 'BBS V2', 'xzcasdqwrwqrwqewqewqewqewqewqewqewqewqewqeqwewqewqewqewqeweqwqaszxcxzcxzcxzc', '<p>asdsadsxzcxzasfqwrqwwqtqw ewq ewq e wqe wq e as xc b vc r e retqwewq</p>', 1, 'http://www.hollandlift.com/wp-content/themes/hollandlift/assets/images/no_image.jpg', 5000, 'test', ''),
(2, 'BBS V1', '', 'qweqwecxzas\r\nwqrwqrqweqw\r\nczxczx', 1, '', 3000, '', ''),
(3, 'Shop Script', 'asd', '<p>qweasxzcrqwrwq ewqewqzxc</p>', 1, 'http://www.hollandlift.com/wp-content/themes/hollandlift/assets/images/no_image.jpg', 2000, 'eee', ''),
(4, 'dfewrqwwq', 'test', '<p>czxasqwe</p>', 1, 'http://cdn.akamai.steamstatic.com/steam/apps/239220/capsule_616x353.jpg?t=1421543006', 1000, 'test', ''),
(9, 'qwewq', 'easdsad', '', 6, '1', 10000, 'ads', 'wqrwq'),
(10, 'test', 'test', '', 1, 'test', 1000, 'test', '');

-- --------------------------------------------------------

--
-- Table structure for table `shop_order`
--

CREATE TABLE IF NOT EXISTS `shop_order` (
`order_oid` int(11) NOT NULL,
  `shop_did` int(11) NOT NULL,
  `order_ipaddress` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `order_invoice` varchar(10) NOT NULL,
  `order_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `order_tel` varchar(10) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=193 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop_order`
--

INSERT INTO `shop_order` (`order_oid`, `shop_did`, `order_ipaddress`, `order_time`, `order_invoice`, `order_name`, `order_email`, `order_tel`) VALUES
(1, 1, '', '2015-01-18 17:58:13', '', '', '', '0'),
(2, 4, '', '2015-01-18 17:58:13', '', '', '', '0'),
(3, 2, '', '2015-01-18 17:58:37', '', '', '', '0'),
(4, 3, '', '2015-01-18 17:58:37', '', '', '', '0'),
(5, 4, '', '2015-01-18 18:01:51', '', '', '', '0'),
(6, 2, '', '2015-01-18 18:01:51', '', '', '', '0'),
(7, 4, '127.0.0.1', '2015-01-19 09:52:35', '', '', '', '0'),
(8, 4, '127.0.0.1', '2015-01-19 10:09:22', '', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(9, 10, '127.0.0.1', '2015-01-22 17:35:04', '', 'Thwww', 'wqeqw', '456465'),
(10, 10, '127.0.0.1', '2015-01-22 17:36:38', '', 'tsd', 'eqwe', '1234586'),
(11, 9, '127.0.0.1', '2015-01-22 17:36:38', '', 'tsd', 'eqwe', '1234586'),
(12, 4, '127.0.0.1', '2015-01-22 17:36:38', '', 'tsd', 'eqwe', '1234586'),
(13, 10, '127.0.0.1', '2015-01-23 05:04:15', '060415cr4z', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(14, 9, '127.0.0.1', '2015-01-23 05:04:15', '060415cr4z', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(15, 4, '127.0.0.1', '2015-01-23 05:04:15', '060415cr4z', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(16, 4, '127.0.0.1', '2015-01-23 05:05:53', '060553TEST', 'test', 'test', 'test'),
(17, 10, '127.0.0.1', '2015-01-23 19:57:37', '1422043057', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(18, 1, '127.0.0.1', '2015-01-23 19:57:37', '1422043057', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(19, 3, '127.0.0.1', '2015-01-23 19:57:37', '1422043057', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(20, 10, '127.0.0.1', '2015-01-24 18:18:29', '1422123509', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(21, 9, '127.0.0.1', '2015-01-24 19:09:09', '1422126549', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(22, 4, '127.0.0.1', '2015-01-24 19:09:09', '1422126549', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(23, 2, '127.0.0.1', '2015-01-24 19:09:09', '1422126549', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(24, 10, '127.0.0.1', '2015-01-25 16:03:38', '1422201818', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(25, 2, '127.0.0.1', '2015-01-25 16:03:38', '1422201818', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(26, 4, '127.0.0.1', '2015-01-25 16:03:38', '1422201818', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(27, 10, '127.0.0.1', '2015-01-25 16:46:51', '1422204411', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(28, 9, '127.0.0.1', '2015-01-25 16:46:51', '1422204411', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(29, 2, '127.0.0.1', '2015-01-25 16:46:51', '1422204411', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(30, 9, '127.0.0.1', '2015-01-25 16:47:32', '1422204452', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(31, 4, '127.0.0.1', '2015-01-25 16:47:32', '1422204452', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(32, 10, '127.0.0.1', '2015-01-25 16:47:32', '1422204452', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(33, 10, '127.0.0.1', '2015-01-25 16:48:33', '1422204513', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(34, 9, '127.0.0.1', '2015-01-25 16:48:33', '1422204513', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(35, 10, '127.0.0.1', '2015-01-25 16:50:38', '1422204638', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(36, 9, '127.0.0.1', '2015-01-25 16:50:38', '1422204638', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(37, 10, '127.0.0.1', '2015-01-25 16:55:26', '1422204926', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(38, 9, '127.0.0.1', '2015-01-25 16:55:26', '1422204926', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(39, 4, '127.0.0.1', '2015-01-25 16:56:26', '1422204986', 'Thanapat', 'mrhop3r@gmail.com', '0904428499'),
(40, 9, '127.0.0.1', '2015-01-25 16:56:26', '1422204986', 'Thanapat', 'mrhop3r@gmail.com', '0904428499'),
(41, 9, '127.0.0.1', '2015-01-25 16:58:06', '1422205086', 'Thanapat', 'mrhop3r@gmail.com', '0904428499'),
(42, 10, '127.0.0.1', '2015-01-25 16:58:06', '1422205086', 'Thanapat', 'mrhop3r@gmail.com', '0904428499'),
(43, 10, '127.0.0.1', '2015-01-25 16:58:55', '1422205135', 'wqeqwe', 'cr4zyco3@yahoo.com', 'qwewqe'),
(44, 10, '127.0.0.1', '2015-01-25 17:00:21', '1422205221', 'qwewe', 'cr4zyco3@yahoo.com', '0904428499'),
(45, 9, '127.0.0.1', '2015-01-25 17:00:21', '1422205221', 'qwewe', 'cr4zyco3@yahoo.com', '0904428499'),
(46, 9, '127.0.0.1', '2015-01-25 17:01:33', '1422205293', 'qwewqe', 'cr4zyco3@yahoo.com', '0904428499'),
(47, 4, '127.0.0.1', '2015-01-25 17:01:33', '1422205293', 'qwewqe', 'cr4zyco3@yahoo.com', '0904428499'),
(48, 10, '127.0.0.1', '2015-01-25 17:03:13', '1422205393', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(49, 9, '127.0.0.1', '2015-01-25 17:03:13', '1422205393', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(50, 10, '127.0.0.1', '2015-01-25 17:09:26', '6675022241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(51, 9, '127.0.0.1', '2015-01-25 17:09:27', '6675022241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(52, 10, '127.0.0.1', '2015-01-26 17:54:38', '8784922241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(53, 9, '127.0.0.1', '2015-01-26 17:54:38', '8784922241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(54, 10, '127.0.0.1', '2015-01-26 17:55:17', '7194922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(55, 9, '127.0.0.1', '2015-01-26 17:56:12', '2794922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(56, 4, '127.0.0.1', '2015-01-26 17:56:12', '2794922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(57, 9, '127.0.0.1', '2015-01-26 17:57:27', '7405922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(58, 10, '127.0.0.1', '2015-01-26 17:57:27', '7405922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(59, 9, '127.0.0.1', '2015-01-26 17:58:08', '8805922241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(60, 10, '127.0.0.1', '2015-01-26 17:58:08', '8805922241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(61, 10, '127.0.0.1', '2015-01-26 18:11:57', '7195922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(62, 9, '127.0.0.1', '2015-01-26 18:11:57', '7195922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(63, 9, '127.0.0.1', '2015-01-26 18:13:19', '9995922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(64, 10, '127.0.0.1', '2015-01-26 18:13:19', '9995922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(65, 9, '127.0.0.1', '2015-01-26 18:15:34', '4316922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(66, 10, '127.0.0.1', '2015-01-26 18:15:34', '4316922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(67, 4, '127.0.0.1', '2015-01-26 18:16:27', '7816922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(68, 2, '127.0.0.1', '2015-01-26 18:16:27', '7816922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(69, 3, '127.0.0.1', '2015-01-26 18:17:27', '7426922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(70, 4, '127.0.0.1', '2015-01-26 18:18:05', '5826922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(71, 2, '127.0.0.1', '2015-01-26 18:18:05', '5826922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(72, 10, '127.0.0.1', '2015-01-26 18:21:26', '6846922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(73, 9, '127.0.0.1', '2015-01-26 18:21:26', '6846922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(74, 10, '127.0.0.1', '2015-01-26 18:22:58', '8756922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(75, 9, '127.0.0.1', '2015-01-26 18:22:58', '8756922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(76, 9, '127.0.0.1', '2015-01-26 18:25:23', '3276922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(77, 4, '127.0.0.1', '2015-01-26 18:25:23', '3276922241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(78, 4, '127.0.0.1', '2015-01-26 19:19:51', '1999922241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(79, 9, '127.0.0.1', '2015-01-26 19:19:51', '1999922241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(80, 10, '127.0.0.1', '2015-01-26 19:20:54', '4500032241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(81, 9, '127.0.0.1', '2015-01-26 19:20:54', '4500032241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(82, 4, '127.0.0.1', '2015-01-26 19:25:37', '7330032241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(83, 10, '127.0.0.1', '2015-01-26 19:42:16', '6331032241', 'ธนภัทร', 'cr4zyco3@yahoo.com', '0904428499'),
(84, 9, '127.0.0.1', '2015-01-26 19:47:27', '7461032241', 'ธนภัทร', 'mrhop3r@gmail.com', '0904428499'),
(85, 4, '127.0.0.1', '2015-01-26 19:47:27', '7461032241', 'ธนภัทร', 'mrhop3r@gmail.com', '0904428499'),
(86, 2, '127.0.0.1', '2015-01-26 19:47:27', '7461032241', 'ธนภัทร', 'mrhop3r@gmail.com', '0904428499'),
(87, 3, '127.0.0.1', '2015-01-26 19:47:27', '7461032241', 'ธนภัทร', 'mrhop3r@gmail.com', '0904428499'),
(88, 1, '127.0.0.1', '2015-01-26 19:47:27', '7461032241', 'ธนภัทร', 'mrhop3r@gmail.com', '0904428499'),
(89, 10, '127.0.0.1', '2015-01-26 19:58:11', '1922032241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(90, 9, '127.0.0.1', '2015-01-26 19:58:11', '1922032241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(91, 10, '127.0.0.1', '2015-01-26 19:59:47', '7832032241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(92, 4, '127.0.0.1', '2015-01-26 19:59:47', '7832032241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(93, 9, '127.0.0.1', '2015-01-26 20:02:53', '3752032241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(94, 4, '127.0.0.1', '2015-01-26 20:06:15', '5772032241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(95, 9, '127.0.0.1', '2015-01-26 20:06:15', '5772032241', 'ธนภัทร เลารุจิราลัย', 'cr4zyco3@yahoo.com', '0904428499'),
(96, 9, '127.0.0.1', '2015-01-26 20:10:29', '9203032241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(97, 4, '127.0.0.1', '2015-01-26 20:10:29', '9203032241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(98, 9, '127.0.0.1', '2015-01-26 20:13:22', '2023032241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '090428849'),
(99, 10, '127.0.0.1', '2015-01-26 20:13:22', '2023032241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '090428849'),
(100, 2, '127.0.0.1', '2015-01-26 20:14:25', '5623032241', 'qewqe', 'wqewqe', 'wqeqwewq'),
(101, 10, '127.0.0.1', '2015-01-26 20:16:48', '8043032241', 'wqeqw', 'ewqeqwe', 'qweqwe'),
(102, 9, '127.0.0.1', '2015-01-26 20:16:48', '8043032241', 'wqeqw', 'ewqeqwe', 'qweqwe'),
(103, 10, '127.0.0.1', '2015-01-26 20:17:36', '6543032241', 'wqewq', 'ewqewqe', 'qwewqe'),
(104, 9, '127.0.0.1', '2015-01-26 20:17:36', '6543032241', 'wqewq', 'ewqewqe', 'qwewqe'),
(105, 10, '127.0.0.1', '2015-01-26 20:18:20', '0053032241', 'rqwewqzcxqw', 'qwr', 'wqewq'),
(106, 9, '127.0.0.1', '2015-01-26 20:18:20', '0053032241', 'rqwewqzcxqw', 'qwr', 'wqewq'),
(107, 9, '127.0.0.1', '2015-01-26 20:20:05', '5063032241', 'rrr', 'eee', 'www'),
(108, 4, '127.0.0.1', '2015-01-26 20:20:05', '5063032241', 'rrr', 'eee', 'www'),
(109, 9, '127.0.0.1', '2015-01-26 20:20:47', '7463032241', 'ee', 'qwe', 'wqe'),
(110, 10, '127.0.0.1', '2015-01-26 20:24:23', '3683032241', 'eer', 'wqe', 'qwe'),
(111, 10, '127.0.0.1', '2015-01-26 20:25:02', '2093032241', 'eqw', 'eqwe', 'wqeqw'),
(112, 9, '127.0.0.1', '2015-01-26 20:25:02', '2093032241', 'eqw', 'eqwe', 'wqeqw'),
(113, 10, '127.0.0.1', '2015-01-26 20:25:36', '6393032241', 'wqe', 'wqewqewq', 'wqeqwe'),
(114, 10, '127.0.0.1', '2015-01-26 20:25:54', '4593032241', 'asd', 'swq', 'ewqe'),
(115, 10, '127.0.0.1', '2015-01-26 20:26:11', '1793032241', 'rqwewqzcxwqe', 'wqewq', 'qweqwewq'),
(116, 9, '127.0.0.1', '2015-01-26 20:27:14', '4304032241', 'qweqweqwe', 'qwewq', 'eqwew'),
(117, 10, '127.0.0.1', '2015-01-26 20:28:08', '8804032241', 'qwewq', 'wqeqw', 'wqeqwe'),
(118, 10, '127.0.0.1', '2015-01-26 20:51:26', '6845032241', 'eqwewq', 'wqewqe', 'asdsd'),
(119, 2, '127.0.0.1', '2015-01-26 20:51:26', '6845032241', 'eqwewq', 'wqewqe', 'asdsd'),
(120, 1, '127.0.0.1', '2015-01-26 20:51:26', '6845032241', 'eqwewq', 'wqewqe', 'asdsd'),
(121, 3, '127.0.0.1', '2015-01-26 20:51:26', '6845032241', 'eqwewq', 'wqewqe', 'asdsd'),
(122, 10, '127.0.0.1', '2015-01-26 20:51:51', '1155032241', 'wwqe', 'wqewq', 'wqew'),
(123, 9, '127.0.0.1', '2015-01-26 20:51:51', '1155032241', 'wwqe', 'wqewq', 'wqew'),
(124, 4, '127.0.0.1', '2015-01-26 20:51:51', '1155032241', 'wwqe', 'wqewq', 'wqew'),
(125, 2, '127.0.0.1', '2015-01-26 20:51:51', '1155032241', 'wwqe', 'wqewq', 'wqew'),
(126, 3, '127.0.0.1', '2015-01-26 20:51:51', '1155032241', 'wwqe', 'wqewq', 'wqew'),
(127, 10, '127.0.0.1', '2015-01-26 20:52:48', '8655032241', 'zxcxdwq', 'sad', 'wqr'),
(128, 9, '127.0.0.1', '2015-01-26 20:52:48', '8655032241', 'zxcxdwq', 'sad', 'wqr'),
(129, 2, '127.0.0.1', '2015-01-26 20:52:48', '8655032241', 'zxcxdwq', 'sad', 'wqr'),
(130, 3, '127.0.0.1', '2015-01-26 20:52:48', '8655032241', 'zxcxdwq', 'sad', 'wqr'),
(131, 9, '127.0.0.1', '2015-01-26 20:54:18', '8565032241', 'qwew', 'wqeqw', 'wqeqw'),
(132, 10, '127.0.0.1', '2015-01-26 20:54:18', '8565032241', 'qwew', 'wqeqw', 'wqeqw'),
(133, 2, '127.0.0.1', '2015-01-26 20:54:18', '8565032241', 'qwew', 'wqeqw', 'wqeqw'),
(134, 3, '127.0.0.1', '2015-01-26 20:54:18', '8565032241', 'qwew', 'wqeqw', 'wqeqw'),
(135, 4, '127.0.0.1', '2015-01-26 20:55:29', '9275032241', 'rqwewqzcxewq', 'wqe', 'wqe'),
(136, 9, '127.0.0.1', '2015-01-26 20:55:29', '9275032241', 'rqwewqzcxewq', 'wqe', 'wqe'),
(137, 10, '127.0.0.1', '2015-01-26 20:55:29', '9275032241', 'rqwewqzcxewq', 'wqe', 'wqe'),
(138, 2, '127.0.0.1', '2015-01-26 20:55:29', '9275032241', 'rqwewqzcxewq', 'wqe', 'wqe'),
(139, 10, '127.0.0.1', '2015-01-26 20:57:07', '7285032241', 'eqwe', 'qwewq', 'eqwewq'),
(140, 9, '127.0.0.1', '2015-01-26 20:57:07', '7285032241', 'eqwe', 'qwewq', 'eqwewq'),
(141, 9, '127.0.0.1', '2015-01-26 20:57:44', '4685032241', 'qwewqeqwe', 'wqewq', 'eqwewq'),
(142, 10, '127.0.0.1', '2015-01-26 20:57:44', '4685032241', 'qwewqeqwe', 'wqewq', 'eqwewq'),
(143, 9, '127.0.0.1', '2015-01-26 20:57:59', '9785032241', 'qwewqwqeqw', 'wqe', 'qwewqewqe'),
(144, 10, '127.0.0.1', '2015-01-26 20:57:59', '9785032241', 'qwewqwqeqw', 'wqe', 'qwewqewqe'),
(145, 2, '127.0.0.1', '2015-01-26 20:57:59', '9785032241', 'qwewqwqeqw', 'wqe', 'qwewqewqe'),
(146, 10, '127.0.0.1', '2015-01-26 20:59:54', '4995032241', 'wqewq', 'asdas', 'zxcxzcasd'),
(147, 9, '127.0.0.1', '2015-01-26 20:59:54', '4995032241', 'wqewq', 'asdas', 'zxcxzcasd'),
(148, 4, '127.0.0.1', '2015-01-26 20:59:54', '4995032241', 'wqewq', 'asdas', 'zxcxzcasd'),
(149, 2, '127.0.0.1', '2015-01-26 20:59:54', '4995032241', 'wqewq', 'asdas', 'zxcxzcasd'),
(150, 3, '127.0.0.1', '2015-01-26 20:59:54', '4995032241', 'wqewq', 'asdas', 'zxcxzcasd'),
(151, 1, '127.0.0.1', '2015-01-26 20:59:54', '4995032241', 'wqewq', 'asdas', 'zxcxzcasd'),
(152, 10, '127.0.0.1', '2015-01-26 21:15:23', '3296032241', 'qwewq', 'qwewq', 'wqeqwe'),
(153, 9, '127.0.0.1', '2015-01-26 21:15:23', '3296032241', 'qwewq', 'qwewq', 'wqeqwe'),
(154, 2, '127.0.0.1', '2015-01-26 21:15:23', '3296032241', 'qwewq', 'qwewq', 'wqeqwe'),
(155, 10, '127.0.0.1', '2015-01-26 21:19:54', '4917032241', 'wqeqw', 'wqewq', 'wqeqwe'),
(156, 9, '127.0.0.1', '2015-01-26 21:19:54', '4917032241', 'wqeqw', 'wqewq', 'wqeqwe'),
(157, 9, '127.0.0.1', '2015-01-26 21:39:04', '4438032241', 'Thanapat laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(158, 4, '127.0.0.1', '2015-01-26 21:39:04', '4438032241', 'Thanapat laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(159, 2, '127.0.0.1', '2015-01-26 21:39:04', '4438032241', 'Thanapat laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(160, 10, '127.0.0.1', '2015-01-27 09:41:37', '7961532241', 'qweqw', 'qwewqe', 'wqewqew'),
(161, 9, '127.0.0.1', '2015-01-27 10:09:14', '4533532241', 'Thanapat', 'wqe', 'qwe'),
(162, 10, '127.0.0.1', '2015-01-27 10:09:14', '4533532241', 'Thanapat', 'wqe', 'qwe'),
(163, 1, '127.0.0.1', '2015-01-27 10:09:14', '4533532241', 'Thanapat', 'wqe', 'qwe'),
(164, 3, '127.0.0.1', '2015-01-27 10:09:14', '4533532241', 'Thanapat', 'wqe', 'qwe'),
(165, 2, '127.0.0.1', '2015-01-27 10:09:14', '4533532241', 'Thanapat', 'wqe', 'qwe'),
(166, 4, '127.0.0.1', '2015-01-27 10:09:14', '4533532241', 'Thanapat', 'wqe', 'qwe'),
(167, 10, '127.0.0.1', '2015-01-27 10:14:04', '4463532241', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(168, 9, '127.0.0.1', '2015-01-27 10:14:04', '4463532241', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(169, 4, '127.0.0.1', '2015-01-27 10:14:04', '4463532241', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(170, 9, '127.0.0.1', '2015-01-27 10:28:01', '1844532241', 'JImmy Lowrax', 'mrhop3r@gmail.com', '0904228499'),
(171, 4, '127.0.0.1', '2015-01-27 10:28:02', '1844532241', 'JImmy Lowrax', 'mrhop3r@gmail.com', '0904228499'),
(172, 2, '127.0.0.1', '2015-01-27 10:28:02', '1844532241', 'JImmy Lowrax', 'mrhop3r@gmail.com', '0904228499'),
(173, 4, '127.0.0.1', '2015-01-27 10:28:37', '7154532241', 'JImmy Lowrax', 'mrhop3r@gmail.com', '0904428499'),
(174, 9, '127.0.0.1', '2015-01-27 10:28:37', '7154532241', 'JImmy Lowrax', 'mrhop3r@gmail.com', '0904428499'),
(175, 10, '127.0.0.1', '2015-01-27 10:28:37', '7154532241', 'JImmy Lowrax', 'mrhop3r@gmail.com', '0904428499'),
(176, 10, '127.0.0.1', '2015-01-27 11:06:37', '7976532241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(177, 9, '127.0.0.1', '2015-01-27 11:06:37', '7976532241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(178, 9, '127.0.0.1', '2015-01-27 11:07:23', '3486532241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(179, 10, '127.0.0.1', '2015-01-27 11:07:23', '3486532241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(180, 4, '127.0.0.1', '2015-01-27 11:07:23', '3486532241', 'Thanapat Laorujiralai', 'cr4zyco3@yahoo.com', '0904428499'),
(181, 10, '127.0.0.1', '2015-01-27 16:49:08', '8437732241', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(182, 9, '127.0.0.1', '2015-01-27 16:49:08', '8437732241', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(183, 4, '127.0.0.1', '2015-01-27 16:49:08', '8437732241', 'Thanapat', 'cr4zyco3@yahoo.com', '0904428499'),
(184, 10, '127.0.0.1', '2015-01-27 16:51:08', '8647732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(185, 9, '127.0.0.1', '2015-01-27 16:51:08', '8647732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(186, 4, '127.0.0.1', '2015-01-27 16:51:08', '8647732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(187, 10, '127.0.0.1', '2015-01-27 16:51:34', '4947732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(188, 9, '127.0.0.1', '2015-01-27 16:51:34', '4947732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(189, 4, '127.0.0.1', '2015-01-27 16:51:34', '4947732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(190, 4, '127.0.0.1', '2015-01-27 16:53:04', '4857732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(191, 2, '127.0.0.1', '2015-01-27 16:53:04', '4857732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499'),
(192, 3, '127.0.0.1', '2015-01-27 16:53:04', '4857732241', 'cr4zyco3', 'cr4zyco3@yahoo.com', '0904428499');

-- --------------------------------------------------------

--
-- Table structure for table `shop_paydata`
--

CREATE TABLE IF NOT EXISTS `shop_paydata` (
`paydata_pid` int(11) NOT NULL,
  `paydata_invoice` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paydata_type` text COLLATE utf8_unicode_ci NOT NULL,
  `paydata_date` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paydata_money` int(11) NOT NULL,
  `paydata_msg` text COLLATE utf8_unicode_ci NOT NULL,
  `paydata_status` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_paydata`
--

INSERT INTO `shop_paydata` (`paydata_pid`, `paydata_invoice`, `paydata_type`, `paydata_date`, `paydata_money`, `paydata_msg`, `paydata_status`) VALUES
(1, '4463532241', 'Bank', '27/01/2015', 20000, '', 0),
(2, '7154532241', 'Bank', '27/01/2015', 12000, '', 0),
(3, '3486532241', 'Bank', '27/01/2015', 12000, '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop_payments`
--

CREATE TABLE IF NOT EXISTS `shop_payments` (
`payments_pid` int(11) NOT NULL,
  `payments_icon` text COLLATE utf8_unicode_ci NOT NULL,
  `payments_data` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `shop_payments`
--

INSERT INTO `shop_payments` (`payments_pid`, `payments_icon`, `payments_data`) VALUES
(1, 'images/SCB-1.png', 'ธนคารไทยพาณิชย์ 769-227533-0 สาขา กำแพงแสน');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `shop_category`
--
ALTER TABLE `shop_category`
 ADD PRIMARY KEY (`category_cid`);

--
-- Indexes for table `shop_data`
--
ALTER TABLE `shop_data`
 ADD PRIMARY KEY (`shop_did`);

--
-- Indexes for table `shop_order`
--
ALTER TABLE `shop_order`
 ADD PRIMARY KEY (`order_oid`);

--
-- Indexes for table `shop_paydata`
--
ALTER TABLE `shop_paydata`
 ADD PRIMARY KEY (`paydata_pid`);

--
-- Indexes for table `shop_payments`
--
ALTER TABLE `shop_payments`
 ADD PRIMARY KEY (`payments_pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `shop_category`
--
ALTER TABLE `shop_category`
MODIFY `category_cid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `shop_data`
--
ALTER TABLE `shop_data`
MODIFY `shop_did` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `shop_order`
--
ALTER TABLE `shop_order`
MODIFY `order_oid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=193;
--
-- AUTO_INCREMENT for table `shop_paydata`
--
ALTER TABLE `shop_paydata`
MODIFY `paydata_pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `shop_payments`
--
ALTER TABLE `shop_payments`
MODIFY `payments_pid` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
