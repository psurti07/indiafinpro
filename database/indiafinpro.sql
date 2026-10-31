-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Oct 30, 2026 at 09:12 AM
-- Server version: 9.1.0
-- PHP Version: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indiafinpro`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

DROP TABLE IF EXISTS `administration`;
CREATE TABLE IF NOT EXISTS `administration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime DEFAULT NULL,
  `fullname` varchar(80) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int NOT NULL DEFAULT '1' COMMENT '0=Admin, 1=Employee',
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `rec_date`, `fullname`, `mobile`, `emailid`, `password`, `role`, `isActive`, `isDelete`) VALUES
(1, '2023-10-28 16:45:00', 'Developer', '9904466599', 'info@verloopweb.com', '3fdc2b96e5de6df321152e254d28ddac', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `administration_log`
--

DROP TABLE IF EXISTS `administration_log`;
CREATE TABLE IF NOT EXISTS `administration_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `adminid` int NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `administration_log`
--

INSERT INTO `administration_log` (`id`, `adminid`, `login_at`, `logout_at`, `server_ip`) VALUES
(1, 1, '2026-10-28 11:32:22', NULL, '::1'),
(2, 1, '2026-10-30 14:41:16', '2026-10-30 14:41:40', '::1'),
(3, 1, '2026-10-30 14:41:41', NULL, '::1');

-- --------------------------------------------------------

--
-- Table structure for table `adscontent`
--

DROP TABLE IF EXISTS `adscontent`;
CREATE TABLE IF NOT EXISTS `adscontent` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ad_type` tinyint NOT NULL DEFAULT '1' COMMENT '1=Text, 2=Image',
  `ad_content` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adsdata`
--

DROP TABLE IF EXISTS `adsdata`;
CREATE TABLE IF NOT EXISTS `adsdata` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `partnertype` int NOT NULL DEFAULT '1' COMMENT '1=Channel, 2=Associate',
  `partnerid` int NOT NULL DEFAULT '0',
  `fbpage` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `instapage` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `businessid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `pixelid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isVerified` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airpay_entry`
--

DROP TABLE IF EXISTS `airpay_entry`;
CREATE TABLE IF NOT EXISTS `airpay_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `entryfor` int NOT NULL DEFAULT '0' COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int NOT NULL,
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statuscode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transactionid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allremarks`
--

DROP TABLE IF EXISTS `allremarks`;
CREATE TABLE IF NOT EXISTS `allremarks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `module` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `linkid` int NOT NULL,
  `notetext` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bankapplylink`
--

DROP TABLE IF EXISTS `bankapplylink`;
CREATE TABLE IF NOT EXISTS `bankapplylink` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loantype` int NOT NULL,
  `bankid` int NOT NULL,
  `applyurl` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

DROP TABLE IF EXISTS `banks`;
CREATE TABLE IF NOT EXISTS `banks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `bank_name` varchar(100) NOT NULL,
  `bank_image` varchar(255) NOT NULL,
  `order_no` int NOT NULL DEFAULT '0',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `rec_date`, `bank_name`, `bank_image`, `order_no`, `isDelete`) VALUES
(1, '2019-12-21 16:57:32', 'Axis Bank', '001.png', 1, 0),
(2, '2019-12-21 16:57:32', 'Yes Bank', '002.png', 2, 1),
(3, '2019-12-21 16:58:04', 'ICICI Bank', '003.png', 3, 0),
(4, '2019-12-21 16:58:04', 'Kotak Mahindra Bank', '004.png', 4, 0),
(5, '2019-12-21 16:58:18', 'HDFC Bank', '005.png', 5, 0),
(6, '2019-12-21 16:59:08', 'TATA Capital', '006.png', 6, 0),
(7, '2019-12-21 16:59:08', 'Indusind Bank', '007.png', 7, 0),
(8, '2021-03-23 12:18:01', 'SBI Bank', '008.png', 8, 1),
(9, '2019-12-21 16:59:38', 'IDBI Bank', '009.png', 9, 1),
(10, '2019-12-21 17:00:10', 'Bandhan Bank', '010.png', 10, 1),
(11, '2019-12-21 17:00:10', 'Union Bank', '011.png', 11, 1),
(12, '2019-12-21 17:00:10', 'RBL Bank', '012.png', 12, 0),
(13, '2019-12-21 17:00:10', 'Aditya Birla Capital', '013.png', 13, 0),
(14, '2020-03-02 20:50:08', 'Indiabulls', '014.png', 14, 1),
(15, '2020-03-02 20:50:08', 'Faircent.com', '015.png', 15, 0),
(16, '2020-03-02 20:50:48', 'Fullertor India', '016.png', 16, 0),
(17, '2020-03-02 20:50:48', 'DCB Bank', '017.png', 17, 1),
(18, '2020-03-02 20:51:27', 'Grihashakti', '018.png', 18, 1),
(19, '2020-03-02 20:51:27', 'PaySense', '019.png', 19, 0),
(20, '2021-03-23 12:17:34', 'Lendingkart', '023.png', 20, 0),
(21, '2020-03-02 20:51:27', 'Indifi', '021.png', 21, 0),
(22, '2020-03-02 20:51:27', 'Money View', '022.png', 22, 0),
(26, '2021-10-22 13:00:49', 'Moneytap', '024.png', 24, 0),
(27, '2021-10-22 13:01:12', 'IDFC First Bank', '025.png', 25, 0),
(28, '2021-10-22 13:01:51', 'Bajaj Finserv', '026.png', 26, 0),
(29, '2021-10-22 13:01:51', 'Ziploan', '028.png', 28, 0),
(30, '2021-10-22 13:02:10', 'Other Bank', '099.jpg', 99, 1);

-- --------------------------------------------------------

--
-- Table structure for table `bulksms`
--

DROP TABLE IF EXISTS `bulksms`;
CREATE TABLE IF NOT EXISTS `bulksms` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(250) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mobileno` varchar(80) COLLATE utf8mb4_general_ci NOT NULL,
  `emailid` varchar(80) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cardoffer_order`
--

DROP TABLE IF EXISTS `cardoffer_order`;
CREATE TABLE IF NOT EXISTS `cardoffer_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `offerpage` int NOT NULL DEFAULT '1',
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `emailid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `card_number` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `isCustomer` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No. 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_enquiry`
--

DROP TABLE IF EXISTS `career_enquiry`;
CREATE TABLE IF NOT EXISTS `career_enquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `applyfor` varchar(255) NOT NULL,
  `resume` varchar(255) NOT NULL,
  `qualifications` varchar(255) NOT NULL,
  `experience` varchar(255) NOT NULL,
  `keyskills` longtext NOT NULL,
  `city` varchar(256) DEFAULT NULL,
  `server_ip` varchar(256) DEFAULT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `career_opening`
--

DROP TABLE IF EXISTS `career_opening`;
CREATE TABLE IF NOT EXISTS `career_opening` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `descriptions` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_log`
--

DROP TABLE IF EXISTS `channel_log`;
CREATE TABLE IF NOT EXISTS `channel_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `partnerid` int NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_partner`
--

DROP TABLE IF EXISTS `channel_partner`;
CREATE TABLE IF NOT EXISTS `channel_partner` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `firstname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `lastname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `mobileno` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `emailid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `persontype` int NOT NULL,
  `address` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `earnmoney` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `qualification` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `refcode` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `gstno` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isPartner` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDnd` int NOT NULL DEFAULT '0' COMMENT '0 = No, 1 = Yes',
  `iAgree` int NOT NULL DEFAULT '0',
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_partner_documents`
--

DROP TABLE IF EXISTS `channel_partner_documents`;
CREATE TABLE IF NOT EXISTS `channel_partner_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `partnerid` int NOT NULL,
  `gstdoc` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gstdoc_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cancelcheque` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isVerified` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

DROP TABLE IF EXISTS `ci_sessions`;
CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int UNSIGNED NOT NULL DEFAULT '0',
  `data` blob NOT NULL,
  PRIMARY KEY (`id`),
  KEY `ci_sessions_timestamp` (`timestamp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('1u173ouvr46i5r0s913p88mn1aki1flk', '::1', 1793006217, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333030363231363b),
('2gd1u9ur4k6n4ukdvi3ig88fepc1t2mv', '::1', 1792748700, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323734383730303b),
('5vdds8a67uu4lf84taflpbi7m1o6j192', '::1', 1792745726, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323734353732363b),
('62d3674r33vv0f415jbbjn292rkg3sog', '::1', 1792737099, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323733373039383b),
('6vl0oqsc50j9roffli5hsbpk732grks7', '::1', 1792406382, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323430363338323b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a313a7b733a31323a22636f6d70616e79656d61696c223b693a313739323430393033313b7d),
('7tj874snriqfvss2232glaj2j31va0l6', '::1', 1792997512, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323939373531323b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a313a7b733a31323a22636f6d70616e79656d61696c223b693a313739323939383438303b7d),
('8p5atfl8k89b37o9pjfhdgium5s7u39d', '::1', 1792587527, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323538373330303b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a343a7b733a31323a22636f6d70616e79656d61696c223b693a313739323539313036373b733a31343a22757365726c6f616e616d6f756e74223b693a313739323539303934373b733a31303a22757365726d6f62696c65223b693a313739323539303934373b733a373a226170706c796964223b693a313739323539313036373b7d757365726c6f616e616d6f756e747c733a363a22353730303030223b757365726d6f62696c657c733a31303a2239383735303030303030223b6170706c7969647c733a313a2233223b),
('9kq0mcbejvl570d84h8nom029l4f8680', '::1', 1792739336, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323733393333363b),
('9pj8us9vomg68g3tfjc872f0qaugpms1', '::1', 1792402632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323430323633323b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a313a7b733a31323a22636f6d70616e79656d61696c223b693a313739323430333933373b7d),
('alfv5j5p7kha63fb0kct1v7haps36j02', '::1', 1792397790, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323339373739303b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a313a7b733a31323a22636f6d70616e79656d61696c223b693a313739323339383439393b7d),
('amk70nqk0mmpvi900ma36g9f36a0dfah', '::1', 1793351511, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333335313530303b61646d696e6c6f6769647c693a333b61646d696e69647c733a313a2231223b61646d696e6e616d657c733a393a22446576656c6f706572223b61646d696e70617373776f72647c733a33323a223366646332623936653564653664663332313135326532353464323864646163223b61646d696e6163746976657c733a313a2231223b61646d696e64656c6574657c733a313a2230223b61646d696e747970657c733a313a2230223b),
('cmj39l2t9par9d4ump9f6hd22v90uabm', '::1', 1792409342, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323430363338323b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a333a7b733a31323a22636f6d70616e79656d61696c223b693a313739323431323934313b733a31343a22757365726c6f616e616d6f756e74223b693a313739323431323830373b733a31303a22757365726d6f62696c65223b693a313739323431323830373b7d757365726c6f616e616d6f756e747c733a363a22353730303030223b757365726d6f62696c657c733a31303a2239343038383831323134223b),
('cs4991t34o69tjqqicc244omh9mq7p9f', '::1', 1793254948, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333235343934383b),
('g40mrqm9t5k6q00peo1q87bg4t5gonr9', '::1', 1792477002, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323437373030323b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a343a7b733a31323a22636f6d70616e79656d61696c223b693a313739323437393238333b733a31343a22757365726c6f616e616d6f756e74223b693a313739323437363732353b733a31303a22757365726d6f62696c65223b693a313739323437363732353b733a373a226170706c796964223b693a313739323437393238333b7d757365726c6f616e616d6f756e747c733a363a22323930303030223b757365726d6f62696c657c733a31303a2239383630303030303030223b6170706c7969647c733a313a2232223b),
('gdl5n2anubpr444a5f2sbdhv01jkr54a', '::1', 1793098475, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333039373437353b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a313a7b733a31323a22636f6d70616e79656d61696c223b693a313739333130323037343b7d),
('gq2881n29nadun7rhrbfp13rlbn6qd8r', '::1', 1792478932, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323437373030323b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a323a7b733a31323a22636f6d70616e79656d61696c223b693a313739323438323533323b733a373a226170706c796964223b693a313739323438323436363b7d6170706c7969647c733a313a2232223b),
('hj5ekg1ra9q2hbc78t1jhm9rm6jfmuj6', '::1', 1792554893, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323535343839323b),
('jrjg4vjes5ocutpo1vm7kciph19q9aa1', '::1', 1792644413, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323634333937373b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a343a7b733a31323a22636f6d70616e79656d61696c223b693a313739323634373639313b733a31343a22757365726c6f616e616d6f756e74223b693a313739323634373635333b733a31303a22757365726d6f62696c65223b693a313739323634373635333b733a373a226170706c796964223b693a313739323634373639313b7d757365726c6f616e616d6f756e747c733a363a22353730303030223b757365726d6f62696c657c733a31303a2239393939393030383838223b6170706c7969647c733a313a2234223b),
('mdd6jddtfiundhmem5b7uteq62tht2ie', '::1', 1792561673, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323536313636393b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a313a7b733a31323a22636f6d70616e79656d61696c223b693a313739323536353237333b7d),
('o9r9474i4gsn0uhf6chts4mkf1qfe7v5', '::1', 1793182320, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333138323332303b),
('ohaqm715n6qpbmnknc95nt77o3155j3c', '::1', 1793343632, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333334313136303b),
('osv3hgbeaookq8vllvu580sfc8g7u9vc', '::1', 1793171307, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333136383532333b61646d696e6c6f6769647c693a313b61646d696e69647c733a313a2231223b61646d696e6e616d657c733a393a22446576656c6f706572223b61646d696e70617373776f72647c733a33323a226532316663613561653765326466616233663235306137303139373334626630223b61646d696e6163746976657c733a313a2231223b61646d696e64656c6574657c733a313a2230223b61646d696e747970657c733a313a2230223b),
('r743tn7mn33cgj3iicnbl4i4smvnianj', '::1', 1792414624, 0x757365726d6f62696c657c733a31303a2239343038383831323134223b5f5f63695f766172737c613a343a7b733a31303a22757365726d6f62696c65223b693a313739323431363634303b733a31343a22757365726c6f616e616d6f756e74223b693a313739323431363634303b733a31323a22636f6d70616e79656d61696c223b693a313739323431383231393b733a373a226170706c796964223b693a313739323431383231393b7d757365726c6f616e616d6f756e747c733a363a22353730303030223b5f5f63695f6c6173745f726567656e65726174657c693a313739323431333034303b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b6170706c7969647c733a313a2231223b),
('rk9plmeugt13pa7ot22ikv2ap0vfcskc', '::1', 1793168523, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333136383532333b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a313a7b733a31323a22636f6d70616e79656d61696c223b693a313739333137303736353b7d61646d696e6c6f6769647c693a313b61646d696e69647c733a313a2231223b61646d696e6e616d657c733a393a22446576656c6f706572223b61646d696e70617373776f72647c733a33323a226532316663613561653765326466616233663235306137303139373334626630223b61646d696e6163746976657c733a313a2231223b61646d696e64656c6574657c733a313a2230223b61646d696e747970657c733a313a2230223b),
('tlapf9u9vaoqf19d5hqhqjjkdd7bej1k', '::1', 1792997512, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739323939373531323b636f6d70616e79656d61696c7c733a32303a22696e666f40696e64696166696e70726f2e636f6d223b5f5f63695f766172737c613a313a7b733a31323a22636f6d70616e79656d61696c223b693a313739333030313131323b7d),
('tujb5ap56j04rjpeh76f05ag772qk4d9', '::1', 1793254948, 0x5f5f63695f6c6173745f726567656e65726174657c693a313739333235343934383b);

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

DROP TABLE IF EXISTS `contact_enquiry`;
CREATE TABLE IF NOT EXISTS `contact_enquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `server_ip` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `cp_account_manager`
--

DROP TABLE IF EXISTS `cp_account_manager`;
CREATE TABLE IF NOT EXISTS `cp_account_manager` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `partnerid` int NOT NULL,
  `manager_name` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `manager_mobile` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cp_social_media`
--

DROP TABLE IF EXISTS `cp_social_media`;
CREATE TABLE IF NOT EXISTS `cp_social_media` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `partnerid` int NOT NULL,
  `link_facebook` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `link_instagram` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `link_linkedin` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `link_twitter` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `link_pinterest` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_log`
--

DROP TABLE IF EXISTS `customer_log`;
CREATE TABLE IF NOT EXISTS `customer_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customerid` int NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

DROP TABLE IF EXISTS `email_list`;
CREATE TABLE IF NOT EXISTS `email_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `portal` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `module` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `subject` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` tinyint NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

DROP TABLE IF EXISTS `enquiry`;
CREATE TABLE IF NOT EXISTS `enquiry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `persontype` int NOT NULL DEFAULT '0' COMMENT '0=Salaried; 1=Self Employed',
  `loanamount` int NOT NULL DEFAULT '0',
  `loantype` int DEFAULT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `important_update`
--

DROP TABLE IF EXISTS `important_update`;
CREATE TABLE IF NOT EXISTS `important_update` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tags` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `descriptions` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `important_update`
--

INSERT INTO `important_update` (`id`, `rec_date`, `tags`, `descriptions`, `isActive`, `isDelete`) VALUES
(1, '2025-01-22 10:53:32', 'Pariatur Tempora do', '<p>Fuga Explicabo Dol</p>\r\n', 1, 0),
(2, '2025-01-22 10:53:32', 'Pariatur Tempora do', '<p>Fuga Explicabo Dol</p>\r\n', 1, 0),
(3, '2025-01-22 10:53:32', 'Pariatur Tempora do', '<p>Fuga Explicabo Dol</p>\r\n', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `cardid` int NOT NULL DEFAULT '0',
  `inv_for` int NOT NULL COMMENT '0=None, 1=PL, 2=BL, 3=Channel',
  `inv_prefix` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `inv_number` int NOT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_price` float(11,2) NOT NULL,
  `inv_cgst` float(11,2) NOT NULL,
  `inv_sgst` float(11,2) NOT NULL,
  `inv_igst` float(11,2) NOT NULL,
  `inv_grandtotal` float(11,2) NOT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loanlist`
--

DROP TABLE IF EXISTS `loanlist`;
CREATE TABLE IF NOT EXISTS `loanlist` (
  `id` int NOT NULL AUTO_INCREMENT,
  `loanname` varchar(255) NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus`
--

DROP TABLE IF EXISTS `loanstatus`;
CREATE TABLE IF NOT EXISTS `loanstatus` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statusname` varchar(256) NOT NULL,
  `priorityno` int NOT NULL DEFAULT '1',
  `colorclass` varchar(50) NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `loanstatus`
--

INSERT INTO `loanstatus` (`id`, `rec_date`, `statusname`, `priorityno`, `colorclass`, `isDelete`) VALUES
(1, '2020-10-13 19:30:40', 'Approved', 1, 'success', 0),
(2, '2020-10-13 19:30:40', 'Rejected', 2, 'danger', 0),
(3, '2020-10-13 19:30:40', 'In Process', 1, 'info', 0),
(4, '2021-08-28 08:03:33', 'Query Process', 4, 'warning', 0),
(5, '2021-10-29 11:04:29', 'File Reopen', 5, 'info', 0),
(6, '2024-08-30 09:58:10', 'Verification', 1, 'success', 0);

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus_remarks`
--

DROP TABLE IF EXISTS `loanstatus_remarks`;
CREATE TABLE IF NOT EXISTS `loanstatus_remarks` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `remarks` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `statusid` int NOT NULL DEFAULT '0',
  `isDelete` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_keywords`
--

DROP TABLE IF EXISTS `meta_keywords`;
CREATE TABLE IF NOT EXISTS `meta_keywords` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `slug` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `descriptions` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `keywords` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribe`
--

DROP TABLE IF EXISTS `newsletter_subscribe`;
CREATE TABLE IF NOT EXISTS `newsletter_subscribe` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subscribeemail` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

DROP TABLE IF EXISTS `otpverification`;
CREATE TABLE IF NOT EXISTS `otpverification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` date DEFAULT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `otpcode` varchar(10) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `otpverification`
--

INSERT INTO `otpverification` (`id`, `rec_date`, `mobile`, `email`, `otpcode`) VALUES
(1, '2026-10-19', '9408881214', '', '6827'),
(2, '2026-10-20', '9860000000', '', '2074'),
(3, '2026-10-21', '9875000000', '', '7700'),
(4, '2026-10-22', '9999900888', '', '1694');

-- --------------------------------------------------------

--
-- Table structure for table `partner_subscription_order`
--

DROP TABLE IF EXISTS `partner_subscription_order`;
CREATE TABLE IF NOT EXISTS `partner_subscription_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `partnerid` int NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `card_number` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonepe_entry`
--

DROP TABLE IF EXISTS `phonepe_entry`;
CREATE TABLE IF NOT EXISTS `phonepe_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productid` int DEFAULT NULL,
  `packageid` int DEFAULT NULL,
  `userid` int NOT NULL,
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referenceid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txstatus` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `productslug` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float(11,2) NOT NULL,
  `offeramount` float(11,2) NOT NULL,
  `inOffer` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `rec_date`, `productname`, `productslug`, `amount`, `offeramount`, `inOffer`) VALUES
(1, '2023-02-01 16:43:01', 'Personal Subscription Plan', 'personal-subscription-plan', 1999.00, 999.00, 1),
(2, '2023-02-01 16:43:01', 'Business Subscription Plan', 'business-subscription-plan', 1999.00, 999.00, 1),
(3, '2023-02-01 17:33:47', 'Channel Partner Plan', 'channel-partner-plan', 29999.00, 9999.00, 1),
(4, '2023-02-01 13:35:15', 'Card Offer', 'card-offer', 1999.00, 999.00, 1),
(5, '2023-02-01 13:35:15', 'IVRpayment offer', 'ivrpayment-offer', 1999.00, 999.00, 1),
(6, '2023-02-01 13:35:15', 'Festival Offer', 'festival-offer', 1999.00, 999.00, 1),
(7, '2023-02-01 13:35:15', 'Super Offer', 'super-offer', 1999.00, 999.00, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products_package`
--

DROP TABLE IF EXISTS `products_package`;
CREATE TABLE IF NOT EXISTS `products_package` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productid` int NOT NULL,
  `package_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `package_slug` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `package_amount` float(11,2) NOT NULL DEFAULT '0.00',
  `package_offer` float(11,2) NOT NULL DEFAULT '0.00',
  `package_validity` int NOT NULL DEFAULT '0',
  `package_description` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `package_order` int NOT NULL DEFAULT '1',
  `inOffer` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

DROP TABLE IF EXISTS `refund`;
CREATE TABLE IF NOT EXISTS `refund` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ref_for` int NOT NULL,
  `userid` int NOT NULL,
  `invoiceid` int NOT NULL,
  `ref_date` date DEFAULT NULL,
  `ref_number` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `ref_price` float(11,2) NOT NULL,
  `ref_cgst` float(11,2) NOT NULL,
  `ref_sgst` float(11,2) NOT NULL,
  `ref_igst` float(11,2) NOT NULL,
  `ref_grandtotal` float(11,2) NOT NULL,
  `paymentid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roipackages`
--

DROP TABLE IF EXISTS `roipackages`;
CREATE TABLE IF NOT EXISTS `roipackages` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `loantype` int NOT NULL,
  `bankid` int NOT NULL,
  `roi` float(11,2) NOT NULL,
  `termsyears` float(11,2) NOT NULL,
  `termsmonths` int NOT NULL,
  `isPreapproval` int NOT NULL DEFAULT '0',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roipackages`
--

INSERT INTO `roipackages` (`id`, `rec_date`, `loantype`, `bankid`, `roi`, `termsyears`, `termsmonths`, `isPreapproval`, `isDelete`) VALUES
(1, '2021-10-23 14:14:14', 11, 6, 10.99, 6.00, 72, 0, 0),
(2, '2021-10-23 14:14:14', 11, 30, 9.50, 5.00, 60, 0, 0),
(3, '2021-10-23 14:16:03', 11, 25, 10.49, 5.00, 60, 0, 0),
(4, '2021-10-23 14:16:03', 11, 31, 7.73, 4.00, 48, 0, 0),
(5, '2021-10-23 14:17:16', 12, 6, 10.99, 5.00, 72, 0, 0),
(6, '2021-10-23 14:17:16', 12, 21, 10.00, 5.00, 60, 0, 0),
(7, '2021-10-23 14:20:04', 12, 30, 10.50, 5.00, 60, 0, 0),
(8, '2021-10-23 14:20:04', 12, 20, 15.00, 3.00, 36, 0, 0),
(9, '2021-10-23 14:20:51', 12, 25, 11.50, 5.00, 60, 0, 0),
(10, '2021-10-23 14:20:51', 12, 32, 13.00, 1.50, 18, 0, 0),
(11, '2021-10-23 14:21:28', 12, 29, 14.00, 3.00, 36, 0, 0),
(12, '2021-10-23 14:21:28', 12, 28, 10.00, 5.00, 60, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `site_faqs`
--

DROP TABLE IF EXISTS `site_faqs`;
CREATE TABLE IF NOT EXISTS `site_faqs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `faq_type` int NOT NULL DEFAULT '1',
  `faq_question` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `faq_answer` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` tinyint NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_options`
--

DROP TABLE IF EXISTS `site_options`;
CREATE TABLE IF NOT EXISTS `site_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `option_key` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `option_value` longtext COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_options`
--

INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(25, '2026-10-28 11:40:39', 'privacy-policy', '<p dir=\"ltr\">The privacy of every user of &nbsp;Indiafinpro is important for the company. This Privacy Policy mentions the data and information we collect about you, how we treat it, with whom we share it, and how we preserve and protect it.</p>\r\n\r\n<p dir=\"ltr\">In the regular course of our business through this website, we gather your personal information through several sources, including:</p>\r\n\r\n<ul>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Information from you, such as applications or other sources which includes your name, address, marital status, employment, assets and income; and</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\">We&#39;re also dedicated to protecting the users of our website by addressing potential privacy concerns. Our privacy guidelines apply to all users globally. This policy applies to all information, in whatever form, relating to &nbsp;Indiafinpro&#39;s business activities across the world, and to all information handled by &nbsp;Indiafinpro relating to other companies and organizations with whom it deals. It also covers all IT and information communications facilities operated by &nbsp;Indiafinpro or on its behalf.</p>\r\n\r\n<p dir=\"ltr\">This Privacy Policy covers the security, information, IT equipment and use of &nbsp;Indiafinpro, a company incorporated under the laws presently in force in India and has its registered office at Surat, Gujarat and its affiliates. It also includes the use of email, internet, voice and mobile IT equipment. This policy applies to all &nbsp;Indiafinpro Users, Clients, and employees (hereafter referred to as &#39;individuals&#39;).</p>\r\n\r\n<p dir=\"ltr\">Subject to arbitration, only the courts and tribunals of Surat, India, shall have exclusive jurisdiction with respect to any suit, action or any other proceedings arising out of or in relation to the Loan Documents. Nothing contained in this clause shall limit any right of the Lender to commence any legal action or proceedings arising in relation to the Loan or the Loan Documents in any other court, tribunal or another appropriate forum, competent jurisdiction and the Borrower and/or the Guarantor hereby consent to that jurisdiction.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">How &nbsp;Indiafinpro manages and protects Your Personal Information?</h3>\r\n\r\n<p dir=\"ltr\">&nbsp;Indiafinpro doesn&rsquo;t sell or trade information about current or former clients to third parties. We may disclose your personal information as necessary to:<br />\r\n&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Effect, administer, or enforce a transaction that you request or authorize;</p>\r\n\r\n<p dir=\"ltr\">Process or service a financial product or service that you request or authorize; or</p>\r\n\r\n<p dir=\"ltr\">Maintain or service your account with us or with another entity.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\">&nbsp;Indiafinpro may also disclose your personal information and data for everyday business purposes to organizations or firms who provide consulting, technology or other services for us and agree to maintain its confidentiality; others, such as attorneys, trustees, family members, or others who are authorized to represent you, your estate, or a joint or co-owner of your account; regulatory agencies; or as we are otherwise permitted or required by law or process of law.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;Indiafinpro restricts access to your personal information to our employees and to permitted third-parties who need to know that information to provide products or services for us, or to provide, process, or maintain any security, account, or investment product, service or program for you or your benefit. To protect your personal information from unauthorized access and use, we have adopted administrative, technical, and physical security procedures that comply with the Laws in India. These measures include computer safeguards and secured files and buildings.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">What &nbsp;Indiafinpro can do with your personal information:</h3>\r\n\r\n<p dir=\"ltr\">We may use your personal information that we collect or that is provided to us for the following reasons:</p>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Considering any application for an account or service;</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Carrying out our business functions and activities;</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Collecting amounts you owe us, including taking enforcement action;</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Exercising our rights and fulfilling our obligations under any agreement with you;</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Exercising our rights and fulfilling our obligations for the purposes of complying with all applicable laws, including those relating to money laundering, terrorist financing, bribery, corruption, tax evasion, fraud, and similar; and managing all economic and trade sanction risks;</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Generally administering and monitoring services provided to you (or any related entity); and</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Providing you with information about our other services, or the services of selected third parties in which we think you may have an interest, including by post, telephone and electronic message &ndash; you can opt-out of receiving information about our other services and/or the services of selected third parties by informing us in writing.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">Sharing of Personal Information with Third Parties:</h3>\r\n\r\n<p dir=\"ltr\">&nbsp;Indiafinpro does not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect our or others&#39; rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">Security and Confidentiality:</h3>\r\n\r\n<p dir=\"ltr\">The protection and security of your personal information are important to us. We generally follow industry-standard information security tools and measures, as well as internal procedures and strict guidelines to prevent information submitted to us, both during transmission and once we receive it from misuse and data leakage. No method of transmission over the internet, or method of electronic storage, is 100% secure, however. Therefore, while we strive to use commercially acceptable means to protect your personal information, which considerably reduces the risks of data misuse, we cannot guarantee its absolute security. To notify the Company about any security vulnerability or potential data breach, please contact us at: info@ Indiafinpro .com and we will take the appropriate measures to address such an incident, as deemed necessary.</p>\r\n\r\n<p dir=\"ltr\">Our employees can access the information on a &quot;need-to-know&quot; basis and are subject to confidentiality obligations.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">DATA ACCURACY</h3>\r\n\r\n<p dir=\"ltr\">Personal Data must be accurate and, where necessary, kept up to date. It must be corrected or deleted without delay when inaccurate. It is advisable that you ensure that the Personal Data we use and hold is accurate, complete, kept up to date and relevant to the purpose for which we collected it. You must check the accuracy of any Personal Data at the point of collection and at regular intervals afterwards. You must take all reasonable steps to destroy or amend inaccurate or out-of-date Personal Data.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">LIMIT OF LIABILITY</h3>\r\n\r\n<p dir=\"ltr\">We shall not be liable for any confusion caused as a result of any of your actions or omission of any action, anything as a result of your viewing, reading or listening of any content. Although we will do our best to provide constant, uninterrupted access to our website, we accept no responsibility or liability for any interruption or delay.<br />\r\nIn no event will our total liability to you for all damages arising from your use of the service or information, materials or products included on or otherwise made available to you through the service exceed the amount you paid for the service related to your claim.<br />\r\n&nbsp;</p>\r\n\r\n<p dir=\"ltr\">We have no liability for any loss, damage or misappropriation of your files under any circumstances or for any consequences related to changes, restrictions, suspension or termination of your service or the agreement. These liabilities shall apply to you even if their remedies shall fail their essential purpose.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">USAGE OF ADVERTISING ID</h3>\r\n\r\n<p dir=\"ltr\">When you are using our application that incorporates our Services, we may also automatically record your Google and/or any other Advertising ID (if you are using an Android device) or your Advertising Identifier (IDFA - if you are using an IOS device; together with the Google and/or any other Advertising ID-&quot;Mobile Advertising IDs&quot;), for advertising or analytics purposes. The said Advertising ID is an anonymous identifier, provided by Google. If your device has an Advertising ID, we may collect and use it for advertising and user analytics purposes. If your device does not have an Advertising ID, we may use other persistent identifiers. The information collected may also be stored on your device. You can reset your mobile Advertising ID or opt-out of receiving targeted ads through your mobile Advertising IDs which are provided in our settings.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">COMPLIANCE &amp; COOPERATION WITH REGULATORS</h3>\r\n\r\n<p dir=\"ltr\">We regularly review this Privacy Policy and make sure that we process your personal information in ways that comply with regulations currently in force in India. We firmly comply with legal frameworks including data protection laws relating to the transfer of data.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">CONSENT</h3>\r\n\r\n<p dir=\"ltr\">By using our website, you consent to our website&#39;s Privacy Policy. The usage of the website shall be construed as an acceptance of the Privacy Policy.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">GRIEVANCES</h3>\r\n\r\n<p dir=\"ltr\">For any complaints and/or inquiries, you can send us formal written inquiries or complaints at info@Indiafinpro.com. All inquiries and/or complaints shall be examined and will be resolved expeditiously. Our team of experts will respond by contacting the person who made such inquiries and/or complaints. We work with the appropriate regulatory authorities, including local data protection authorities, to resolve any complaints regarding the transfer of your data that we cannot resolve with you directly.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">MODIFICATION OF THE POLICY</h3>\r\n\r\n<p dir=\"ltr\">We reserve the right to modify this Privacy Policy at our own independent decision at any time. If the changes are significant, the Company shall spare no efforts to apprise its clientele and provide a prominent notice (including, for certain services, email notification of Privacy Policy changes). It is pertinent to remember that it shall be the Clients&#39; responsibility to read the Policy as amended every once in a while.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">USAGE OF COOKIES/COOKIES POLICY</h3>\r\n\r\n<p dir=\"ltr\">Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n');
INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(26, '2026-10-28 11:42:58', 'terms-conditions', '<p dir=\"ltr\">In these Terms &amp; Conditions, the words such as &quot;we,&quot; &quot;our,&quot; &quot;company,&quot; and &ldquo;us&rdquo; refer to Indiafinpro and its undertaken system. And the words such as &quot;you&quot; and &ldquo;your&rdquo; refer to Indiafinpro users, customers, etc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Here are the terms and conditions for customers, employees, and every user of our website - Indiafinpro.com. So, the terms and conditions are applied as per your role. You must read all the below-mentioned Terms &amp; Conditions carefully.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\">The company wishes to offer the services under the terms and conditions set forth, and the user/customer wishes to be associated unconditionally with these terms and conditions.<br />\r\nTherefore, in consideration of the agreements contained in this, the parties, intending to be legally bound, agree to the correctness and authenticity of the following details given to the company:</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Information from you, such as applications or other forms (which include your name, address, marital status, employment, assets and income); and</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\">Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p dir=\"ltr\">If the company by any source finds out anyone bad-mouthing or defaming the company&#39;s reputation or company&#39;s members, then strict legal action will be taken against the individual or group.</p>\r\n\r\n<p dir=\"ltr\"><br />\r\nWe&#39;re also serious about protecting our users by addressing potential privacy concerns. Our terms and condition guidelines apply to all users across the world. These terms and conditions apply to all information, in whatever form, relating to Indiafinpro&#39;s business activities worldwide and to all information handled by Indiafinpro relating to other organizations with whom it deals. It also covers all IT and information communications facilities operated by Indiafinpro or on its behalf.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">SUBSCRIPTION TERMS AND CONDITIONS:</h3>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The payment of subscription fees is refundable only in accordance with the company&#39;s Cancellation &amp; Refund Policy.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Indiafinpro subscription is not transferable and is only valid up to its date of expiry (valid as per subscription), and the subscription may not be used by any person other than the purchaser.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;Renewal terms and conditions are at the discretion of Indiafinpro.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The subscription can only be used on/for our website.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">&nbsp;</h3>\r\n\r\n<h3 dir=\"ltr\">CUSTOMER TERMS AND CONDITIONS:</h3>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The payment of subscription fees is refundable only in accordance with the company&#39;s Cancellation &amp; Refund Policy.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company only takes the cost of the subscription. No other tip of service is charged.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Customers can use the subscription only for loan purposes with given benefits. Also, buying a subscription lets you apply for a loan, and it doesn&rsquo;t guarantee loan approval as the final loan approval depends on the banks and the customer profile. If the loan is rejected, you can still avail other benefits of the subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer is viewing any advertisement/promotional content of the company and then approaching the company thinking that he/she will get the loan approval based on the advertisement, then it must be noted that a loan application will only be submitted once the customer buys Indiafinpro&rsquo;s Subscription. Even after buying the Subscription, the final loan approval depends on the bank(s) and customer profile. If the customer&rsquo;s profile doesn&rsquo;t match loan eligibility criteria, he/she won&rsquo;t be able to get a loan. Still, they can avail other benefits of the Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Subscription can be used only by the persons who have purchased it and not by any other person(s), source or third party.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer reference does payment through the customer&#39;s own referral link which is provided by the company and if that shows in the customer&#39;s portal then the only company will give the reference payout of that customer.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer loan is approved in our company and he/she denies that loan approval then also Subscription payment would not be refundable.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The documents, cheques, and OTP that the company&#39;s employee asks the customer are for the processing of the loan only and the company never misuses them. Just for security, after completing the loan process, the customer can go to the concerned bank and cancel their cheque. The company is not responsible if any problems/disputes arise in the future.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If you do not give the OTP, documents, or document query for verification to the company&#39;s employee for the loan process, then your file will be rejected. (According to the criteria, if your file matches without OTP, your loan will be processed).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If our company&#39;s executive asks you for any payment transaction OTP, do not provide it. If the customer pays any charges other than the charge of the Subscription, the company won&rsquo;t be responsible for the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer has any queries regarding the loan process then he/she would have to contact the department where their files are in process.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. For example, if your file will match in 2 banks then our company&#39;s login department will login your document only in that 2 banks. The verification is done by the company&#39;s employee and there is no proof available for the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The document will be verified by the company in multiple banks. If your documents match the criteria of the bank, then the login process will be done in that bank. If your documents do not match the criteria of a bank, the company will give you a solution. You can take the solution and reapply after a certain period (as per Subscription) - and this will be shown on the customer portal.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">It is not fixed that the customer file will be logged in only in the banks listed on the company website. It may be logged in/verified in other banks also, depending on the customer file.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company is not taking extra charges other than Subscription charges. If any third-party charges you then our company is not responsible for that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">There are no processing or file charges for customer loan approval. There is only one charge and that&#39;s only for the Subscription - validity as per Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company will log in customer files as per their requirements. (Example: If customer requirement is INR 1 lakh and if some bank criteria is up to INR 50,000 then we will not log in their file in that bank).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Wherever the customer file is logged in by the company, these details will not be given to any customer in written or digital form.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Loan offers and the pre-approval loans process depend only on the bank&#39;s rules and that type of loan is given only on customer behaviour. So, there is so much difference between that type of process and the company&#39;s process. If that loan is rejected in our company but gets approved by another company/source then the customer can&#39;t blame our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Loan approval depends on your profile so if your documents are perfect and as per the bank criteria then you will get a loan through our company</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The loan information is only given to the person who has applied for the loan.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If your file is rejected in our company, then the customer has to make sure that they have to re-submit their documents, with the implemented company-suggested solution, in our company after a certain period (as per Subscription).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company is not responsible if the customer loan is rejected by any queries.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them a reason and solution for that. So at re-applying time if the customer will not resubmit a file with the solution implemented then the file will be again rejected in our company for the same reason. Still, the final loan approval will depend on the customer profile and the bank&#39;s criteria and rules &amp; regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will provide only the reason for rejection to the customer and it would not be provided in the form of hard or soft copy - it will only be shown in the customer portal. Some banks only provide general reasons, they don&#39;t give us any specific reason so the customer should not complain about that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer has to give correct information about their CIBIL SCORE and PROFILE. If the customer gives wrong information, then the company will not be responsible for loan rejection.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will not be providing any CIBIL REPORT in digital or hard copy to any customer in any situation.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Bank charges are applicable as per banks&#39; rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will take legal action against the customer who submitted fake documents. And the company won&rsquo;t take any responsibility for the loan process in this case.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">After the customer&rsquo;s file is logged in, the customer has to contact only the login department and coordinate with them &ndash; not any telecaller or other department of the company. The further process has to be done according to the login department.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan process if the rules of any bank change, then we have to follow those new rules.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer has to give their registered phone number for being contacted by the login department.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan processing time, if the company gets any queries and it is not solving that in the given time, then the company has the authority to take more time to address the query. So, the customer must not complain about the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer wants to reapply in our company after file rejection or approval, then he/she has to re-submit their documents in the customer portal.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final loan approval. Approval only depends on your documents and the banks&#39; rules and regulations. We are not giving you any guarantee for the final loan approval.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services. If any person has confusion, they can call on the company&rsquo;s customer care number to gain clarity before availing company&rsquo;s services.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer&#39;s payment is executed by third-party payment sources. So whenever payment would be received by the company then only a Subscription will be activated for the customer. If a customer&#39;s payment would be debited from his/her account but we don&#39;t receive any payment in the company&#39;s account then the company will not be responsible for that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For any reference customer&#39;s payout, their account verification is compulsory. After verification, if the payout amount is debited from the company&rsquo;s account and if it does not credit/reflect in the reference customer&rsquo;s account &ndash; the company won&rsquo;t be responsible for this issue.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company is a private limited company and we are tied up with banks and corporate DSA. We are providing loans through banks only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Multiple partnered banks&#39; logos are shown on our website and our promotional content across many mediums &ndash; these are shown only for our company&#39;s marketing purpose. It might be possible that certain banks, whose logos are shown on our website/promotional content, are not partnered with our company. Also, these should not be assumed as any bank&#39;s advertisement.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, India, will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The eligibility age for buying a Subscription is 18 - 62 years. The persons in this age bracket can avail benefits of the Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customer will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Every reference payout will have a deduction of 5% TDS.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For the loan process, the company will only coordinate with the person who has purchased the Subscription and has an ongoing loan process &ndash; the company won&rsquo;t coordinate with any third party.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Every bank payout will have tax deductions as per the bank&rsquo;s rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will provide the appropriate loan services but the responsibility of customer handling will be of the reference customer.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any bank&#39;s rules or company&#39;s rules are changing during the processing time of the loan then the customer has to follow those new rules.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our promotional content may communicate messages like &#39;Get Personal Loan in 30 mins&#39; or &#39;Get Rs.5,00,000 in 5 mins&#39; on our company&rsquo;s social media, blogs/articles, ads, websites, emails, SMS, or any other medium &ndash; it must be carefully noted that these messages are only meant for marketing and promotional purposes. All the numerical values that depict time/number of steps/number of clicks &ndash; are for marketing and promotional purposes only. The final loan approval and process depend on the customer profile and the bank/NBFCs&rsquo; rules, regulations and criteria. If you have any sort of doubt before starting the process, you can call our customer care number (10 am to 5 pm &ndash; Monday to Saturday).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">As per the details/information entered by the user, even if the actual pre-approved amount is lesser than 2 Lakhs, the pre-approved amount shown on the website will be Rs.2 Lakhs (minimum). And, even if the actual pre-approved amount is more than 8.5 Lakhs, the pre-approved amount shown on the website will be Rs.8.5 Lakhs (maximum). The pre-approved amount/pre-approved loan offers are tentative &ndash; the final loan approval, loan sanction, and disbursement depend on the customer profile and the NBFCs&rsquo; rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The first login of the customer&rsquo;s file will be handled and executed by the company. To avail the reapplying option, the customer will have to perform the self-login(s).</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3 dir=\"ltr\">&nbsp;</h3>\r\n\r\n<h3 dir=\"ltr\">REFERENCE TERMS AND CONDITIONS:</h3>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Reference payout would be given to reference customers as per rules and regulations of our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company will give payout only on Subscription; it does not depend on the reference customer&#39;s loan approval or rejection.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Whether the customer loan will be approved or not depends on the customer profile and the company does not give any guarantee for that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If customers are giving a reference in our company for loan purposes, for that we have some criteria. The customer has to give a reference based on that criteria. The company is not giving you any type of guarantee for the loan approval in any situation at any cost so customers who give a reference have to agree with the decision of that file&#39;s login department.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will take legal action against the reference partner/customer who submitted fake documents. And the company won&rsquo;t take any responsibility for the loan process in this case.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;The Customer&#39;s terms and conditions are also applicable to the reference person&#39;s customers.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;Reference customer&#39;s payment is done through third-party payment sources. So whenever payment would be received by the company then only the Subscription will be activated. If the customer&#39;s payment is debited from his/her account but the company doesn&#39;t receive any payment in the company&#39;s account then the company will not be responsible for any queries.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;During loan offers, if any reference person will do the online loan process then the company will give the payout up to 35% per Subscription to the reference person. But before that, invoice generation is most important for any payout process.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If the customer of reference will do an online process then the customer&#39;s payout will be given to the referral partner. But during processing time, if the company would refund that amount to the customer for any reason, then that customer&#39;s payout will be cut out from the reference person&#39;s next payout.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;Whatever documents are submitted by a reference person, they will be secure in our company. If documents will be misused by any other sources in future then our company is not responsible for that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customer will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If anyone takes any legal action against the company then only our legal advisor would be dealing with that, and Surat, India, remains the only junction for any legal procedure. No one can contact any employee or director of our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;Every reference payout will have a deduction of 5% TDS.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Company will have no responsibility for the promotions conducted and undertaken by the Customer Reference. The Customer Reference agrees that the promotions done by them are at their own risk, and the Customer Reference cannot hold the Company responsible for any sort of losses faced due to the promotions.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3 dir=\"ltr\">&nbsp;</h3>\r\n\r\n<h3 dir=\"ltr\">GENERAL TERMS AND CONDITIONS:</h3>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the login department fails to solve the customer queries with accuracy, dedication and responsibility, then the login department agency will be cancelled by the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Customer&#39;s loan process will take more days due to any festival.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If anyone has GST then they have to add the GST number in their portal so that the company can provide a GST Return to them. If you haven&rsquo;t received your GST Return &ndash; you can raise a request or call on company&rsquo;s customer care number between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Company is using Blogs for their advertising, so that content could be of the third party, so the company doesn&#39;t take guarantee of the information to be correct or incorrect.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If customers, employees, any other person, or any other party has a problem with the company then they have to inform that problem to our company through notice; so, we can try to give you a solution of that but after that, any of them want to take a legal action then they have to inform the company through notice. Only then, the legal process will be started.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If customers, employees, any other person, any other third party has a problem/dispute/misunderstanding with the company, the right to take the final decision over the concerned issue is reserved with the company and the concerned person will have to accept the solution provided by the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The documents, cheques, and OTP that the company&#39;s employee asks the customer are for the processing of the loan, the company is not responsible if any problems/disputes arise in the future.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During any process on the website, if there is any kind of mistake that happens due to the software or website technical problems, the final decision on such disputes can only be taken by the company and it has to be accepted by anyone concerned.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">All the commitments made by the company&rsquo;s employees (any employee/person from the company), telecallers, or salespersons, etc. should be cross-checked by any concerned person (customer/any other person) from the Terms &amp; Conditions section of Indiafinpro.com before availing any of the company&rsquo;s services. Only the rules and regulations stated on the company website will be considered official.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services. If any person has confusion, they can call on the company&rsquo;s customer care number to gain clarity before availing company&rsquo;s services.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any Customer Referral&rsquo;s customer gets a refund (due to any dispute like payment gateway problem or any other issue) then the referral payout will not be provided (if provided, it would be deducted from the next payout of the customer referral).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">While generating the payout for Customer Referrals, the company uses a third-party payment gateway. So, if the payout is stuck and put on hold due to any payment gateway issue (or any other issue), then the payout would be delayed and all the terms and conditions of the third-party payment gateway would be applied. In such cases, the payout will be released only when the third-party payment gateway releases the stuck payment. In case of a payout dispute with any bank, the bank&rsquo;s criteria will be applied and the payout will be released only when the bank approves the payment.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If there is any dispute that arises between any concerned user (customer, customer referral, etc.) and the company, their account will be disabled immediately by the company. In such a case, the user would be needed to contact the company for any query.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;All of the promotional content put and shared by the company, either on its website or any platform, is only for advertisement purposes. Any person should not assume it as the final loan approval or details of the loan. The final loan approval and specifics of the loan depend on the rules and regulations of various banks (or the concerned bank) and the customer profile. Every customer, or any other user must accept this clause and consider the bank&rsquo;s loan processing time only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The loan-related figures, rates, and information used in the promotional content of the company are general and for promotional purposes. The final nature and specifics of the loan in terms of the loan amount, interest rate, repayment tenure, loan processing fees, loan insurance, etc., depends solely on the customer profile and the rules and regulations stated by the concerned bank. The final loan details depend on the criteria set by the concerned bank(s).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Indiafinpro&#39;s company name, logo, content, business concept, software and system, pattern, website structure and design, and business process and offers are copyrighted with the company. If any individual or organization uses/copies any of the above-mentioned by even 1%, legal action may be taken against them.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any person (customer, employee, etc.) is involved in any of the company&#39;s processes then the company is authorized to record the phone calls with that person.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If any customer applies for a loan in our company and if any other external person/organization commits fraud with that customer in terms of taking money from you or in any other way then, it will not be the company&rsquo;s responsibility for any kind of loss faced by the customer.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Whatever loan offer is given to the customer is according to the customer profile. The customer will have to compulsorily accept the loan offer &ndash; he/she cannot deny the loan offer.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company has full authority to use the customer&rsquo;s information for purposes such as testimonials, advertisements, marketing, SMS, etc. The customer agrees that regulations of Do Not Disturb(DND)/National Do Not Call(NDNC) won&rsquo;t be applied in such practices.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If any person (user, customer, etc.) visits our website and indulges in any activity &ndash; like clicking a button, link, filling forms, or any other activity on the website, it will clearly mean and express that the person agrees to and acknowledges all terms &amp; conditions, rules &amp; regulations, and policies of the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">After the loan approval, the bank charges will be applied as per the bank&rsquo;s rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;No customer can contact the bank&rsquo;s employees to inquire about/get any information on the loan file processes.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer, whose loan has been approved, must read and understand the bank agreement and the bank&rsquo;s terms and conditions carefully. After the loan process is done, the company can&rsquo;t be held responsible or liable for anything.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will take legal action against the customer, reference customer, or any other person who submitted fake documents. And the company won&#39;t take any responsibility for the loan process in this case.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;Multiple partnered banks&#39; logos are shown on our website and our promotional content across many mediums &ndash; these are shown only for our company&#39;s marketing purpose. It might be possible that certain banks, whose logos are shown on our website/promotional content, are not partnered with our company. Also, these should not be assumed as any bank&#39;s advertisement.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If anyone takes any legal action against the company then only our legal advisor would be dealing with that and&nbsp; Surat, India, will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Any wrong/fake commitment or vocal statement given by the company&rsquo;s employees, etc. would be considered invalid. Only the solutions or solution-related vocal statements would be considered valid. All the company&rsquo;s Terms &amp; Conditions, Privacy Policy, Disclaimer, all other rules will be final and have to be followed.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Loan processing time might get delayed because of any public holiday, technical problems, customer issues, etc.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Company will not be providing any proof for rejection in hard or soft copy.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">It might be possible that the content/figures/information shown on our website are not updated. So, to get the exact information regarding any of our website&rsquo;s content, Terms &amp; Conditions, Privacy Policy, Disclaimer, etc., you can call on our customer care number.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;After the purchase of the Subscription, the Company Executive will call the concerned person within 24-48 hours (it could be delayed due to any reason) for the loan process or partner process. If the concerned person doesn&rsquo;t get a call, they can call on the company&rsquo;s customer care number.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If the login process is going on and there has been no response from the login department, then the customer can call on the company&rsquo;s customer care number.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The content and any process on the website can be changed or modified at any instance. So, the older version of the content and process won&rsquo;t be functional, valid, or a subject of argument for any person &ndash; and the customers, users, etc. have to stay timely updated and accept all the changes unconditionally. Only the current content and process of the website will be considered valid.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;By accessing our website, you affirm your age as 18 years or more. If you&rsquo;re someone below 18 years, we advise you not to access our website or the services</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;Any processes regarding the loan might get delayed due to public holidays, technical problems/software issues, etc.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;In case the update email/message regarding the processes of loan is not received by the customer due to a delay because of technical problems, software issues, or any other issue &ndash; they can call on the company&rsquo;s customer care between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;In case the user, customer, any other person, or organization has a query/problem/issue or wants to raise a dispute with the company &ndash; they can either raise a request ticket or call on the company&rsquo;s customer care number between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Due to a software/system issue, it might happen that the dates mentioned in the Loan Status are late by 3-4 days.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">To get the TDS Return, the reference customer has to submit all the details/documents asked in their portal. Note: The TDS Return will be given starting from the financial year in which all the details/documents are submitted. The TDS Return won&rsquo;t be provided for the financial year(s) that are prior to the financial year in which the details/documents were submitted.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The general criteria to apply for a personal loan by a salaried individual are &ndash; Min. Age: 21 years; Min. Salary: Rs.15,000/month (credited in the bank account); Salary Slips available; and Job Stability proof available. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;The general criteria to apply for a personal loan by a self-employed individual are &ndash; Min. Age: 21 years; IT Returns available (min. 1 year); Business Stability proof available; and Current Account in a bank. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The general criteria to apply for a business loan by a small business person are &ndash; Min. Age: 21 years; IT Returns available (min. 1 year); and Business Stability proof available (min. 1 year). Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The general criteria to apply for a business loan by an audited report business person are &ndash; Min. Age: 21 years; Min. Rs.1 Crore+ Yearly Turnover; and Min. 2 Years Audited Report. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;The eligible age for buying a Subscription is 18 - 62 years. The persons in this age bracket can avail benefits of the Subscription offered by the company. The company only offers Subscription and provides its benefits to the customers. The final loan approval depends on the customer profile and the bank&rsquo;s rules and criteria.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customers will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;Any information/flow/system regarding our website shown in the videos posted on social media (or any platform) may be inaccurate, outdated, or different from our actual website. Only the most updated version of the website, terms &amp; conditions, and other policies shall be valid.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The banks&rsquo; logos used in our ads, social media posts, blogs, emails, or any other medium is for promotional purposes only. The process will be done in that bank only under whose criteria the customer profile gets matched. The final loan approval and final loan process completely depend on the customer profile and the bank&rsquo;s criteria and rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The banks&rsquo; logos shown on our website and the pre-approved offer displayed on our website are tentative only. The process will be done in that bank only under whose criteria the customer profile gets matched. The final loan approval and final loan process completely depend on the customer profile and the bank&rsquo;s criteria and rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">By purchasing the company&rsquo;s Subscription, the customer is applying to get the company&rsquo;s services. All the benefits of the Subscription will be given to the customer by the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any customer data &amp; information, KYC documents, or OTP is misused in future by any third-party, our company and its directors, employees, or any individuals associated with the company cannot be held responsible for the same in any matter whatsoever including any loss, harm, or damage due to the usage of information from the portal. Customers are advised to bring in their own discretion in such matters. The information provided on the website is of financial nature. It is a mutual understanding that customers association with the website will be at the customer&#39;s will, preference and risk.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any customer&rsquo;s documents are found to be fraud by the bank/financial institution or there&rsquo;s any sort of an issue with any customer&rsquo;s repayment of the loan to the banks/financial institution &ndash; then these matters have to be solely between the customer and the bank/financial institution. Our company and its directors, employees, or any other individual associated with the company cannot be held responsible in such cases. If the customer documents are found to be fake and fraud and are used anywhere for any purpose, the company cannot be held responsible for the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If any third-party gets a loan approved on someone else&rsquo;s identity and documents, then our company and its directors, employees, or any other individual associated with the company cannot be held responsible.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any of the company&rsquo;s customers or any third-party wants a legal course, action and proceedings with the company, then only the company&rsquo;s legal team can be involved. There will absolutely be no involvement of the company&rsquo;s directors, any other individual associated with the company, or employees in any legal proceeding. For any legal action or proceeding involving our company, Surat, India, shall remain the only jurisdiction.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">TDS will be given only to the ones whose referral payout has been generated. If your TDS is deducted, you can contact your CA. If your TDS has been deducted and it&rsquo;s not showing, then you can contact the company&rsquo;s customer care number between 10 AM to 5 PM &ndash; Monday to Saturday (only business days).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;If any person enters incorrect information and starts the loan process on our website, and if this leads to any sort of fraud in future, the company, its directors, employees, any other individual associated with the company cannot be held responsible for the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The pre-approved loan offers shown are from those banks/NBFCs that have eligibility criteria to which the customer&rsquo;s profile matches (profile evaluated as per the information entered by the customer). These pre-approved loan offers are tentative only &ndash; the final loan approval, loan sanction, and disbursement depend on the NBFC(s) and their rules and regulations. The company will only log in the customer&rsquo;s file in those NBFCs with which the company has tie-ups/partnerships/collaborations and where the customer&rsquo;s profile matches the NBFC eligibility criteria.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company&rsquo;s services are strictly for the residents of India only &ndash; not for the non-residents. If any non-resident purchases our Subscription, they can request for a refund as per the company&rsquo;s Cancellation &amp; Refund Policy.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">In case a customer has mistakenly made more than a single payment, the customer will be eligible to get a refund. The customer will have to request a refund within 48 hours of the payment through the Raising A Request section of the website or by calling on the company&rsquo;s registered contact number.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">In case a customer has bought Subscriptions from multiple companies that belong to our group of companies, the customer will be eligible to get a refund. The customer will have to request a refund within 48 hours of the payment through the Raising A Request section of the website or by calling on the company&rsquo;s registered contact number.</p>\r\n	</li>\r\n</ol>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">PRE-APPROVAL LOAN OFFER TERMS AND CONDITIONS:</h3>\r\n\r\n<p dir=\"ltr\">The Pre-Approved Loan Offer and the amount mentioned in it are solely shown based on the software calculation done on Monthly Income and Current Monthly EMI entered by the person. This &quot;Pre-Approved Loan Offer&quot; is tentative and not the final loan approval (this is already mentioned on the Pre-Approved loan Offer page) &ndash; as the final loan approval is given by the bank only; based on the bank&rsquo;s rules and regulations and the customer profile. And this is clearly stated in the company&rsquo;s Terms &amp; Conditions which is agreed by the person before registration.</p>\r\n\r\n<p dir=\"ltr\">Here&#39;s an example to know how the &lsquo;Pre-Approved Loan Offer&rsquo; is shown:<br />\r\nConsider that a person (named &lsquo;Rajesh&rsquo;) enters the following details in our website:<br />\r\nMonthly Income: Rs.1,00,000<br />\r\nCurrent Monthly EMI: Rs.30,000</p>\r\n\r\n<p dir=\"ltr\">Based on these details, Rajesh is left with Rs.70,000 in hand (deducting current EMI) every month. So, according to the general rules of the banks, the EMI of 50% of the in-hand amount can be approved. So, the loan amount that allows a maximum of Rs.35,000 (70,000/2) EMI can be approved. And based on the EMI and rate of interest (11% tentatively), the eligible amount is shown in the Pre-Approved Loan Offer. And based on this Rs.1903/lakh EMI is shown.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">CANDIDATE TERMS AND CONDITIONS</h3>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The interview time is fixed.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The interview can&#39;t be taken any other time than the time decided by the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;The Company can ask any questions in the interview.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The candidate will have to appear for the interview as many times as the company asks.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">A resume (Xerox) will be mandatory for the interview. The resume will not be returned. There will be no misuse of the resume.</p>\r\n	</li>\r\n</ol>\r\n\r\n<h3 dir=\"ltr\">&nbsp;</h3>\r\n\r\n<h3 dir=\"ltr\">USAGE OF COOKIES / COOKIES POLICY</h3>\r\n\r\n<p dir=\"ltr\">Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.<br />\r\n&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">USAGE OF WEBSITE</h3>\r\n\r\n<p dir=\"ltr\">The user agrees not to misuse the company&rsquo;s website or indulge in any unauthorized or illegal activity while accessing the website. The prohibited activities include, but are not limited to:</p>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Hacking or attempting unauthorized access to the website, system, or user accounts</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Spreading or transmitting any malware or viruses</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;Spamming, fraudulent activity, misrepresentation, or any activity that may harm the company, website, or any other user</p>\r\n	</li>\r\n</ol>\r\n\r\n<p dir=\"ltr\">If any person is found involved in any such activity, the company reserves the right to terminate or restrict access to the website and may take strict legal action against the concerned person.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<h3 dir=\"ltr\">PAYMENT TERMS</h3>\r\n\r\n<p dir=\"ltr\">The company accepts multiple payment methods for transactions made on the website. The available payment methods include, but are not limited to:</p>\r\n\r\n<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Credit Cards</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Debit Cards</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;UPI</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Net Banking</p>\r\n	</li>\r\n</ol>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\">The user, customer, or any other person accessing our website clearly expresses and agrees that they have fully read and understood the Terms &amp; Conditions and Privacy Policy of Indiafinpro &ndash; and they accept them unconditionally.</p>\r\n');
INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(27, '2021-07-25 07:52:01', 'welcome-status', '0'),
(28, '2021-07-25 07:52:01', 'welcome-message', '<h2>Welcome Message</h2>'),
(29, '2026-10-28 11:42:10', 'disclaimer', '<p dir=\"ltr\">&nbsp;Indiafinpro and its customers and employees use and present &nbsp;Indiafinpro.com&nbsp; for personal and informational purposes only. In addition, we further expressly disclaim any warranties or representations (expressed or implied) in respect of quality, suitability, accuracy, reliability, completeness, timeliness, performance for a particular purpose or legality of the services listed or displayed or transacted or the content on the website. You must not perceive and construe any such information or other material as legal, tax, investment, financial, or other advice. You completely acknowledge and undertake that you are accessing the services on the &nbsp;Indiafinpro website and transacting at your own risk only and are using your best and prudent judgement before entering into and making any transactions through the website. You alone assume the sole responsibility of evaluating the merits and risks associated with the use of any information or other Content contained on the &nbsp;Indiafinpro Website before making any decisions based on such information or other Content.</p>\r\n\r\n<p dir=\"ltr\">Nothing contained on our Website constitutes a solicitation, recommendation, endorsement, or offer by &nbsp;Indiafinpro to buy or sell any securities or other financial instruments in this or in any other jurisdiction in which such solicitation or offer would be unlawful under the securities laws of such jurisdiction. You further acknowledge that at no time shall any right, title or interest in the services sold through or displayed on the website vest with &nbsp;Indiafinpro, nor shall &nbsp;Indiafinpro have any obligations or liabilities in respect of any transactions on the website.<br />\r\n&nbsp;</p>\r\n\r\n<p dir=\"ltr\">After you enter your details on our website for any purpose, the company takes no responsibility in case you come across instances of data misusage of any form.</p>\r\n'),
(30, '2026-10-28 11:34:36', 'facebookpixel', '#'),
(31, '2026-10-28 11:34:34', 'facebookdomain', '#'),
(32, '2021-07-25 07:52:42', 'account-msg-customer', ''),
(33, '2021-07-25 07:52:52', 'account-msg-channel', ''),
(34, '2025-02-28 15:37:22', 'newinvoiceno', '53'),
(35, '2026-10-28 11:41:42', 'refund-policy', '<p dir=\"ltr\">We believe in putting customer satisfaction first!</p>\r\n\r\n<p dir=\"ltr\">Under what circumstances is the Indiafinpro subscription plan fee refundable?</p>\r\n\r\n<ul>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">&nbsp;A customer can be eligible for a refund if an e-mail requesting a refund is done by the customer (with the registered email id) to info@Indiafinpro.com within 30 days of purchasing the subscription plan. The refund will be received by the customer (if eligible for a refund) within 24 to 48 hours of receiving the mail.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">There are certain areas/locations in which our company does not provide its services. If any person who has bought the subscription plan and belongs to such areas/locations can apply for a refund within 30 days of purchasing the subscription plan. To know the areas where our company does not provide services, please call on +91-73835 26761.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">A customer might get a refund of the subscription plan fee if the company hasn&rsquo;t started the &lsquo;Customer Service Initiation&rsquo; (explained below) within 48 hours of the payment and a request for the same has been raised through Raise A Request within 30 days of the payment.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer is unable to communicate with the company in English, Hindi, or Gujarati, they can apply for a refund within 30 days of purchasing the Subscription Plan.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\">What does &quot;customer service initiation&quot; mean?</p>\r\n\r\n<p dir=\"ltr\">It is the first process done by the company that includes calling the customer for verification within 24-48 hours of the subscription plan payment. Even if the customer does not respond to the verification call, the Customer Service Initiation is considered as started and the update has been shown in the customer portal.</p>\r\n\r\n<p dir=\"ltr\">&nbsp;</p>\r\n\r\n<p dir=\"ltr\">If you have any questions about our Cancellation and Refund Policy, please contact us between 10 am - 5 pm (only business days):</p>\r\n\r\n<p dir=\"ltr\">● By email: info@Indiafinpro.com<br />\r\n● By call: +91-96241-85521</p>\r\n'),
(36, '2026-10-28 11:44:07', 'customer-legal-agreement', '<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The payment of Subscription fees is refundable only in accordance with the company&#39;s Cancellation &amp; Refund Policy.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company only takes the cost of the Subscription. No other tip of service is charged.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Customers can use the Subscription only for loan purposes with given benefits. Also, buying a Subscription lets you apply for a loan and it doesn&rsquo;t guarantee loan approval as the final loan approval depends on the banks and the customer profile. If the loan is rejected, you can still avail other benefits of the Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer is viewing any advertisement/promotional content of the company and then approaching the company thinking that he/she will get the loan approval based on the advertisement, then it must be noted that a loan application will only be submitted once the customer buys&nbsp; Indiafinpro&rsquo;s Subscription. Even after buying the Subscription, the final loan approval depends on the bank(s) and customer profile. If the customer&rsquo;s profile doesn&rsquo;t match loan eligibility criteria, he/she won&rsquo;t be able to get a loan. Still, they can avail other benefits of the Subscription.</p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\">&nbsp;</p>\r\n\r\n	<p dir=\"ltr\">The Customer clearly expresses and agrees that they have fully read and understood the Terms &amp; Conditions mentioned in this Agreement &ndash; and they accept them unconditionally.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Subscription can be used only by the persons who have purchased it and not by any other person(s), source or third party.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer reference does payment through the customer&#39;s own referral link which is provided by the company and if that shows in the customer&#39;s portal then the only company will give the reference payout of that customer.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer loan is approved in our company and he/she denies that loan approval then also Subscription payment would not be refundable.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The documents, cheques, and OTP that the company&#39;s employee asks the customer are for the processing of the loan only and the company never misuses them. Just for security, after completing the loan process, the customer can go to the concerned bank and cancel their cheque. The company is not responsible if any problems/disputes arise in the future.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If you do not give the OTP, documents, or document query for verification to the company&#39;s employee for the loan process, then your file will be rejected. (According to the criteria, if your file matches without OTP, your loan will be processed).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If our company&#39;s executive asks you for any payment transaction OTP, do not provide it. If the customer pays any charges other than the charge of the Subscription, the company won&rsquo;t be responsible for the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer has any queries regarding the loan process then he/she would have to contact the department where their files are in process.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. For example, if your file will match in 2 banks then our company&#39;s login department will login your document only in that 2 banks. The verification is done by the company&#39;s employee and there is no proof available for the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The document will be verified by the company in multiple banks. If your documents match the criteria of the bank, then the login process will be done in that bank. If your documents do not match the criteria of a bank, the company will give you a solution. You can take the solution and reapply after a certain period (as per Subscription) - and this will be shown on the customer portal.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">It is not fixed that the customer file will be logged in only in the banks listed on the company website. It may be logged in/verified in other banks also, depending on the customer file.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company is not taking extra charges other than Subscription charges. If any third-party charges you then our company is not responsible for that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">There are no processing or file charges for customer loan approval. There is only one charge and that&#39;s only for the Subscription - validity as per Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company will log in customer files as per their requirements. (Example: If customer requirement is INR 1 lakh and if some bank criteria is up to INR 50,000 then we will not log in their file in that bank).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Wherever the customer file is logged in by the company, these details will not be given to any customer in written or digital form.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Loan offers and the pre-approval loans process depend only on the bank&#39;s rules and that type of loan is given only on customer behaviour. So, there is so much difference between that type of process and the company&#39;s process. If that loan is rejected in our company but gets approved by another company/source then the customer can&#39;t blame our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Loan approval depends on your profile so if your documents are perfect and as per the bank criteria then you will get a loan through our company</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The loan information is only given to the person who has applied for the loan.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If your file is rejected in our company, then the customer has to make sure that they have to re-submit their documents, with the implemented company-suggested solution, in our company after a certain period (as per Subscription).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company is not responsible if the customer loan is rejected by any queries.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them a reason and solution for that. So at re-applying time if the customer will not resubmit a file with the solution implemented then the file will be again rejected in our company for the same reason. Still, the final loan approval will depend on the customer profile and the bank&#39;s criteria and rules &amp; regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will provide only the reason for rejection to the customer and it would not be provided in the form of hard or soft copy - it will only be shown in the customer portal. Some banks only provide general reasons, they don&#39;t give us any specific reason so the customer should not complain about that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer has to give correct information about their CIBIL SCORE and PROFILE. If the customer gives wrong information, then the company will not be responsible for loan rejection.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will not be providing any CIBIL REPORT in digital or hard copy to any customer in any situation.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Bank charges are applicable as per banks&#39; rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will take legal action against the customer who submitted fake documents. And the company won&rsquo;t take any responsibility for the loan process in this case.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">After the customer&rsquo;s file is logged in, the customer has to contact only the login department and coordinate with them &ndash; not any telecaller or other department of the company. The further process has to be done according to the login department.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan process if the rules of any bank change, then we have to follow those new rules.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer has to give their registered phone number for being contacted by the login department.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan processing time, if the company gets any queries and it is not solving that in the given time, then the company has the authority to take more time to address the query. So, the customer must not complain about the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer wants to reapply in our company after file rejection or approval, then he/she has to re-submit their documents in the customer portal.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final loan approval. Approval only depends on your documents and the banks&#39; rules and regulations. We are not giving you any guarantee for the final loan approval.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services. If any person has confusion, they can call on the company&rsquo;s customer care number to gain clarity before availing company&rsquo;s services.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer&#39;s payment is executed by third-party payment sources. So whenever payment would be received by the company then only a Subscription will be activated for the customer. If a customer&#39;s payment would be debited from his/her account but we don&#39;t receive any payment in the company&#39;s account then the company will not be responsible for that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For any reference customer&#39;s payout, their account verification is compulsory. After verification, if the payout amount is debited from the company&rsquo;s account and if it does not credit/reflect in the reference customer&rsquo;s account &ndash; the company won&rsquo;t be responsible for this issue.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company is a private limited company and we are tied up with banks and corporate DSA. We are providing loans through banks only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Multiple partnered banks&#39; logos are shown on our website and our promotional content across many mediums &ndash; these are shown only for our company&#39;s marketing purpose. It might be possible that certain banks, whose logos are shown on our website/promotional content, are not partnered with our company. Also, these should not be assumed as any bank&#39;s advertisement.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If anyone takes any legal action against the company then only our legal advisor would be dealing with that and {#VAR_CITY#}, India, will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The eligibility age for buying a Subscription is 18 - 62 years. The persons in this age bracket can avail benefits of the Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customer will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Every reference payout will have a deduction of 5% TDS.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For the loan process, the company will only coordinate with the person who has purchased the Subscription and has an ongoing loan process &ndash; the company won&rsquo;t coordinate with any third party.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Every bank payout will have tax deductions as per the bank&rsquo;s rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will provide the appropriate loan services but the responsibility of customer handling will be of the reference customer.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any bank&#39;s rules or company&#39;s rules are changing during the processing time of the loan then the customer has to follow those new rules.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our promotional content may communicate messages like &#39;Get Personal Loan in 30 mins&#39; or &#39;Get Rs.5,00,000 in 5 mins&#39; on our company&rsquo;s social media, blogs/articles, ads, websites, emails, SMS, or any other medium &ndash; it must be carefully noted that these messages are only meant for marketing and promotional purposes. All the numerical values that depict time/number of steps/number of clicks &ndash; are for marketing and promotional purposes only. The final loan approval and process depend on the customer profile and the bank/NBFCs&rsquo; rules, regulations and criteria. If you have any sort of doubt before starting the process, you can call our customer care number (10 am to 5 pm &ndash; Monday to Saturday).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">As per the details/information entered by the user, even if the actual pre-approved amount is lesser than 2 Lakhs, the pre-approved amount shown on the website will be Rs.2 Lakhs (minimum). And, even if the actual pre-approved amount is more than 8.5 Lakhs, the pre-approved amount shown on the website will be Rs.8.5 Lakhs (maximum). The pre-approved amount/pre-approved loan offers are tentative &ndash; the final loan approval, loan sanction, and disbursement depend on the customer profile and the NBFCs&rsquo; rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The first login of the customer&rsquo;s file will be handled and executed by the company. To avail the reapplying option, the customer will have to perform the self-login(s).</p>\r\n	</li>\r\n</ol>\r\n'),
(37, '2023-02-18 17:52:56', 'channel-legal-agreement', '<h3>CHANNEL TERMS AND CONDITIONS</h3>'),
(38, '2026-10-28 11:34:31', 'smssenderid', '#'),
(39, '2022-03-12 00:11:33', 'pl-remarketing-sms', ''),
(40, '2022-02-01 13:15:20', 'bl-remarketing-sms', ''),
(41, '2022-02-01 13:15:20', 'pl-process-sms', 'Dear Customer, Your Personal Loan Application is Processed. Get Pre-Approved Loan Offer in Just 3 Steps. Apply Now https://google.com flexicread'),
(42, '2022-02-01 13:15:20', 'bl-process-sms', 'Dear Customer, Your Business Loan Application is Processed. Get Pre-Approved Loan Offer in Just 3 Steps. Apply Now https://google.com flexicread'),
(43, '2022-02-23 15:29:28', 'pl-offer-sms', ''),
(44, '2022-02-01 13:44:38', 'bl-offer-sms', ''),
(45, '2022-02-01 14:07:12', 'account-sms', 'Dear Customer, Congrats! Submission of your loan application is done. Kindly check your registered email and login into the customer portal for submitting the required documents. Regards, flexicread'),
(46, '2022-02-01 14:07:12', 'cp-account-sms', 'Congrats! Your Partner Application is successfully submitted. Kindly check your Registered Email and login into the Channel Partner Portal. Please submit the required documents for account activation. Our Company Executive will be in touch soon. Regards, flexicread'),
(47, '2022-03-25 12:05:49', 'cp-offer-sms', ''),
(48, '2022-11-08 13:07:22', 'payment-fail-sms', 'Sorry! Your payment for flexicread Subscription was not successful. Try Another Payment Method here https://google.com/ flexicread'),
(49, '2026-10-28 11:34:39', 'fbaccesstokendigital', '#'),
(50, '2026-10-28 11:34:42', 'fbeventnamedigital', '#'),
(51, '2026-10-28 11:34:44', 'fbeventiddigital', '#'),
(52, '2023-11-03 10:53:46', 'fbaccesstokenpartner', 'fbaccesstokenpartner'),
(53, '2023-11-03 10:53:58', 'fbeventnamepartner', 'fbeventnamepartner'),
(54, '2023-11-03 10:53:58', 'fbeventidpartner', 'fbeventidpartner'),
(55, '2026-10-28 11:36:38', 'wpcampaignmain', '#'),
(56, '2026-10-28 11:36:38', 'wpcampaignoffer', '#'),
(57, '2026-10-28 11:36:51', 'wpcampaignsuccess', '#'),
(58, '2026-10-28 11:37:33', 'intekt_get_offer_name', '#'),
(59, '2026-10-28 11:37:33', 'intekt_rm_offer_name', '#'),
(60, '2026-10-28 11:37:33', 'intkt_userwelcomename', '#'),
(61, '2026-10-28 11:37:33', 'intkt_payment_success', '#');

-- --------------------------------------------------------

--
-- Table structure for table `sms_list`
--

DROP TABLE IF EXISTS `sms_list`;
CREATE TABLE IF NOT EXISTS `sms_list` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `portal` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `module` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `title` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `message` mediumtext COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` tinyint NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_log`
--

DROP TABLE IF EXISTS `sms_log`;
CREATE TABLE IF NOT EXISTS `sms_log` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `crontype` varchar(50) COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'company',
  `parentid` int NOT NULL DEFAULT '1',
  `cronname` varchar(256) COLLATE utf8mb3_unicode_ci NOT NULL,
  `msgcount` int NOT NULL,
  `msgresponse` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_order`
--

DROP TABLE IF EXISTS `subscription_order`;
CREATE TABLE IF NOT EXISTS `subscription_order` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `productid` int NOT NULL DEFAULT '0',
  `packageid` int NOT NULL DEFAULT '0',
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `card_number` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isActive` int NOT NULL DEFAULT '1',
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_request`
--

DROP TABLE IF EXISTS `support_request`;
CREATE TABLE IF NOT EXISTS `support_request` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL,
  `ticketno` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `usertype` tinyint NOT NULL COMMENT '1=CUSTOMER, 0=GUEST',
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `mobile` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `emailid` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cardnumber` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `issuetype` varchar(100) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `server_ip` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isDelete` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_request_chat`
--

DROP TABLE IF EXISTS `support_request_chat`;
CREATE TABLE IF NOT EXISTS `support_request_chat` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `requestid` int NOT NULL,
  `remarks` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `staffid` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE IF NOT EXISTS `testimonials` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `reviewpage` int NOT NULL DEFAULT '1' COMMENT '1=Site,2=Customer, 3=Partner',
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `ratings` float(11,2) NOT NULL DEFAULT '0.00',
  `photo` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'placeholder.jpg',
  `reviews` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `rec_date`, `reviewpage`, `fullname`, `ratings`, `photo`, `reviews`, `isDelete`) VALUES
(1, '2021-07-07 12:01:12', 1, 'Shubhashish Haldar', 4.00, 'shubhashis.webp', 'The support system is strong.It\'s good to associate with them. i received a quick response for my personal loan, it get disbursed within week.', 0),
(2, '2021-07-07 12:10:49', 1, 'Jayesh Joshi', 4.50, 'jayesh_joshi.webp', 'Very good service and most of all the Director of company is very kind heart and helping nature and he make understand things better.', 0),
(3, '2021-07-07 12:11:24', 1, 'Vijay Kumar', 5.00, 'vijay_kumar.webp', 'Great Service i personally experienced, highly recommended. Instatnt preapproval and disbursed loan with in 7 working days.', 0),
(4, '2021-07-07 12:12:55', 1, 'Kunal Sharma', 3.50, 'kunal_sharma.webp', 'flexicread gave me quick response to query. that was best of the call. They understood what i wanted and provide me with good service', 0),
(5, '2022-07-30 15:36:43', 1, 'Ashok G Prajapati', 4.30, 'ashok_prajapatri.webp', 'flexicread.com is very good company and very professional. i am recivced very qyick response for my business loan there employees are very co-operative.', 0),
(6, '2022-08-13 10:22:51', 1, 'Dinesh Yellappa', 4.50, 'dinesh_yellapa.webp', 'Very good service and most of all the Directorof company is very kind heart and helping nature and he make understand things better.', 0),
(7, '2022-09-24 12:07:35', 1, 'Bikas Lama', 4.50, 'bikas_lama.webp', 'Great Service I personally experienced, highly recommended instant preapproval and disbursed loan with in 7 working days. Thank you flexicread.com!!', 0),
(8, '2022-09-24 12:07:59', 1, 'Kiran Dnyandev', 4.50, 'kiran_dnyandev.webp', 'flexicread.com is very good company and very professional. i am recivced very quick response for my business loan there empoloyees are very co-operative.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unsubscription_logs`
--

DROP TABLE IF EXISTS `unsubscription_logs`;
CREATE TABLE IF NOT EXISTS `unsubscription_logs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int NOT NULL,
  `user_type` int NOT NULL COMMENT '1=PL, 2=BL, 3=Channel',
  `mobile_no` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `reason` text COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_application`
--

DROP TABLE IF EXISTS `user_application`;
CREATE TABLE IF NOT EXISTS `user_application` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `loantype` int NOT NULL,
  `loanamount` bigint NOT NULL,
  `cibilscore` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `loanpurpose` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `income` bigint NOT NULL,
  `currentemi` int NOT NULL,
  `emibounce` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `loantenure` int DEFAULT NULL,
  `status` int NOT NULL DEFAULT '1' COMMENT '1=New, 2=Approve, 3=Reject',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_application`
--

INSERT INTO `user_application` (`id`, `rec_date`, `userid`, `loantype`, `loanamount`, `cibilscore`, `loanpurpose`, `income`, `currentemi`, `emibounce`, `loantenure`, `status`, `isDelete`) VALUES
(1, '2026-10-19 18:20:31', 1, 11, 570000, '650 - 700', 'Personal Use', 35000, 1000, 0, 12, 1, 0),
(2, '2026-10-20 10:42:26', 2, 11, 290000, '', '', 0, 0, 0, NULL, 1, 0),
(3, '2026-10-21 18:27:47', 3, 11, 570000, 'Below 650', 'Personal Use', 35000, 1000, 0, 12, 1, 0),
(4, '2026-10-22 10:11:30', 4, 11, 570000, '650 - 700', 'Personal Use', 35000, 1000, 0, 12, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_application_status`
--

DROP TABLE IF EXISTS `user_application_status`;
CREATE TABLE IF NOT EXISTS `user_application_status` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `applicationid` int NOT NULL,
  `statusid` int NOT NULL,
  `statusdate` date DEFAULT NULL,
  `bankid` int NOT NULL,
  `loanamount` int NOT NULL,
  `loanroi` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `loanterms` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `processfees` int NOT NULL,
  `insurance` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `monthlyemi` int NOT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `sanction_letter` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `staffid` int NOT NULL,
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

DROP TABLE IF EXISTS `user_documents`;
CREATE TABLE IF NOT EXISTS `user_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `profilephoto` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cancelcheque` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `lightbill` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bankstatement` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `formsixteen` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `salaryslip` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `businessproof` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `itreturn` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isVerified` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payout_documents`
--

DROP TABLE IF EXISTS `user_payout_documents`;
CREATE TABLE IF NOT EXISTS `user_payout_documents` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userid` int NOT NULL,
  `gstdoc` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gstdoc_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `aadharcard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `pancard_number` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `cancelcheque` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `remarks` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `isVerified` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

DROP TABLE IF EXISTS `user_registration`;
CREATE TABLE IF NOT EXISTS `user_registration` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fullname` varchar(256) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'noname',
  `mobile` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_general_ci NOT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `state` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `usertype` int NOT NULL,
  `cardtype` int DEFAULT NULL,
  `refcode` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gstno` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `process_step` int NOT NULL DEFAULT '1',
  `isUser` int NOT NULL DEFAULT '0' COMMENT '0=None, 1=Steps, 2=Register',
  `isDnd` tinyint NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `iAgree` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `isActive` int NOT NULL DEFAULT '1' COMMENT '0=No, 1=Yes',
  `isDelete` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `rec_date`, `update_date`, `fullname`, `mobile`, `email`, `password`, `pincode`, `city`, `state`, `usertype`, `cardtype`, `refcode`, `gstno`, `process_step`, `isUser`, `isDnd`, `iAgree`, `isActive`, `isDelete`) VALUES
(1, '2026-10-19 18:05:49', '2026-10-19 18:20:31', 'test', '9408881214', 'test@g.com', '', '395007', 'surat', 'Gujarat', 1, 11, NULL, NULL, 3, 1, 0, 0, 1, 0),
(2, '2026-10-20 10:42:26', '2026-10-20 10:42:26', 'test', '9860000000', 'test@g.com', '', NULL, '', NULL, 1, 11, NULL, NULL, 1, 1, 0, 0, 1, 0),
(3, '2026-10-21 18:27:26', '2026-10-21 18:27:47', 'test', '9875000000', 'test@g.com', '', '395007', 'surat', 'Gujarat', 1, 11, NULL, NULL, 3, 1, 0, 0, 1, 0),
(4, '2026-10-22 10:11:11', '2026-10-22 10:11:30', 'test', '9999900888', 'test@g.com', '', '395007', 'surat', 'Gujarat', 1, 11, NULL, NULL, 3, 1, 0, 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tree`
--

DROP TABLE IF EXISTS `user_tree`;
CREATE TABLE IF NOT EXISTS `user_tree` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `refferaltype` int NOT NULL DEFAULT '1' COMMENT '1=Customer, 2=Channel',
  `refferaluserid` int NOT NULL,
  `subuserid` int NOT NULL,
  `payout` int NOT NULL DEFAULT '0' COMMENT '0=No, 1=Yes',
  `payout_date` date DEFAULT NULL,
  `payout_amount` float(11,2) NOT NULL,
  `order_amount` float(11,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worldline_entry`
--

DROP TABLE IF EXISTS `worldline_entry`;
CREATE TABLE IF NOT EXISTS `worldline_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productid` int DEFAULT NULL,
  `packageid` int DEFAULT NULL,
  `userid` int NOT NULL,
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `referenceid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `txstatus` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zaakpay_entry`
--

DROP TABLE IF EXISTS `zaakpay_entry`;
CREATE TABLE IF NOT EXISTS `zaakpay_entry` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rec_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `productid` int DEFAULT NULL,
  `packageid` int DEFAULT NULL,
  `userid` int NOT NULL,
  `orderid` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `statuscode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `transactionid` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `paymentmode` varchar(256) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
