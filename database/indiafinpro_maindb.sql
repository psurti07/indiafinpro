-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 22, 2025 at 08:08 PM
-- Server version: 10.6.20-MariaDB-cll-lve
-- PHP Version: 8.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myfinan1_maindb`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `id` int(11) NOT NULL,
  `rec_date` datetime DEFAULT NULL,
  `fullname` varchar(80) NOT NULL,
  `mobile` varchar(40) NOT NULL,
  `emailid` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '0=Admin, 1=Employee',
  `isActive` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`id`, `rec_date`, `fullname`, `mobile`, `emailid`, `password`, `role`, `isActive`, `isDelete`) VALUES
(1, '2023-10-28 16:45:00', 'Developer', '9904466599', 'info@verloopweb.com', 'e21fca5ae7e2dfab3f250a7019734bf0', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `administration_log`
--

CREATE TABLE `administration_log` (
  `id` int(11) NOT NULL,
  `adminid` int(11) NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adscontent`
--

CREATE TABLE `adscontent` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `ad_type` tinyint(4) NOT NULL DEFAULT 1 COMMENT '1=Text, 2=Image',
  `ad_content` longtext NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `adsdata`
--

CREATE TABLE `adsdata` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `partnertype` int(11) NOT NULL DEFAULT 1 COMMENT '1=Channel, 2=Associate',
  `partnerid` int(11) NOT NULL DEFAULT 0,
  `fbpage` varchar(256) NOT NULL,
  `instapage` varchar(256) NOT NULL,
  `businessid` varchar(256) NOT NULL,
  `pixelid` varchar(256) NOT NULL,
  `isVerified` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `airpay_entry`
--

CREATE TABLE `airpay_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `entryfor` int(11) NOT NULL DEFAULT 0 COMMENT '1=Customer, 2=Channel, 11=Digital PL, 12=Digital BL',
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `allremarks`
--

CREATE TABLE `allremarks` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `module` varchar(256) NOT NULL,
  `linkid` int(11) NOT NULL,
  `notetext` varchar(256) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `bankapplylink`
--

CREATE TABLE `bankapplylink` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `loantype` int(11) NOT NULL,
  `bankid` int(11) NOT NULL,
  `applyurl` varchar(256) NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `bank_name` varchar(100) NOT NULL,
  `bank_image` varchar(255) NOT NULL,
  `order_no` int(11) NOT NULL DEFAULT 0,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

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

CREATE TABLE `bulksms` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(250) DEFAULT NULL,
  `mobileno` varchar(80) NOT NULL,
  `emailid` varchar(80) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cardoffer_order`
--

CREATE TABLE `cardoffer_order` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `offerpage` int(11) NOT NULL DEFAULT 1,
  `fullname` varchar(256) NOT NULL,
  `mobile` varchar(256) NOT NULL,
  `emailid` varchar(256) DEFAULT NULL,
  `card_number` varchar(256) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(50) NOT NULL,
  `isCustomer` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isActive` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No. 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_enquiry`
--

CREATE TABLE `career_enquiry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
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
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `career_opening`
--

CREATE TABLE `career_opening` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL,
  `slug` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `descriptions` longtext NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_log`
--

CREATE TABLE `channel_log` (
  `id` int(11) NOT NULL,
  `partnerid` int(11) NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_partner`
--

CREATE TABLE `channel_partner` (
  `id` int(11) NOT NULL,
  `rec_date` datetime DEFAULT current_timestamp(),
  `firstname` varchar(256) NOT NULL,
  `lastname` varchar(256) NOT NULL,
  `mobileno` varchar(256) NOT NULL,
  `emailid` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  `persontype` int(11) NOT NULL,
  `address` varchar(256) DEFAULT NULL,
  `city` varchar(256) NOT NULL,
  `state` varchar(256) DEFAULT NULL,
  `earnmoney` varchar(256) NOT NULL,
  `qualification` varchar(256) NOT NULL,
  `refcode` varchar(256) NOT NULL,
  `gstno` varchar(256) DEFAULT NULL,
  `isPartner` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDnd` int(11) NOT NULL DEFAULT 0 COMMENT '0 = No, 1 = Yes',
  `iAgree` int(11) NOT NULL DEFAULT 0,
  `isActive` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `channel_partner_documents`
--

CREATE TABLE `channel_partner_documents` (
  `id` int(11) NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `partnerid` int(11) NOT NULL,
  `gstdoc` varchar(256) DEFAULT NULL,
  `gstdoc_number` varchar(256) DEFAULT NULL,
  `aadharcard` varchar(256) DEFAULT NULL,
  `aadharcard_number` varchar(256) DEFAULT NULL,
  `pancard` varchar(256) DEFAULT NULL,
  `pancard_number` varchar(256) DEFAULT NULL,
  `cancelcheque` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) NOT NULL,
  `isVerified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contact_enquiry`
--

CREATE TABLE `contact_enquiry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `server_ip` varchar(256) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cp_account_manager`
--

CREATE TABLE `cp_account_manager` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `partnerid` int(11) NOT NULL,
  `manager_name` varchar(100) DEFAULT NULL,
  `manager_mobile` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cp_social_media`
--

CREATE TABLE `cp_social_media` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `partnerid` int(11) NOT NULL,
  `link_facebook` varchar(256) NOT NULL,
  `link_instagram` varchar(256) NOT NULL,
  `link_linkedin` varchar(256) NOT NULL,
  `link_twitter` varchar(256) NOT NULL,
  `link_pinterest` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer_log`
--

CREATE TABLE `customer_log` (
  `id` int(11) NOT NULL,
  `customerid` int(11) NOT NULL,
  `login_at` datetime DEFAULT NULL,
  `logout_at` datetime DEFAULT NULL,
  `server_ip` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `email_list`
--

CREATE TABLE `email_list` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `portal` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(256) NOT NULL,
  `subject` varchar(256) NOT NULL,
  `content` longtext NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `enquiry`
--

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime DEFAULT current_timestamp(),
  `fullname` varchar(256) NOT NULL,
  `email` varchar(256) DEFAULT NULL,
  `mobile` varchar(50) NOT NULL,
  `persontype` int(11) NOT NULL DEFAULT 0 COMMENT '0=Salaried; 1=Self Employed',
  `loanamount` int(11) NOT NULL DEFAULT 0,
  `loantype` int(11) DEFAULT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `important_update`
--

CREATE TABLE `important_update` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `tags` varchar(256) NOT NULL,
  `descriptions` longtext NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `rec_date` datetime DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `cardid` int(11) NOT NULL DEFAULT 0,
  `inv_for` int(11) NOT NULL COMMENT '0=None, 1=PL, 2=BL, 3=Channel',
  `inv_prefix` varchar(50) NOT NULL,
  `inv_number` int(11) NOT NULL,
  `inv_date` date DEFAULT NULL,
  `inv_price` float(11,2) NOT NULL,
  `inv_cgst` float(11,2) NOT NULL,
  `inv_sgst` float(11,2) NOT NULL,
  `inv_igst` float(11,2) NOT NULL,
  `inv_grandtotal` float(11,2) NOT NULL,
  `remarks` varchar(256) DEFAULT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loanlist`
--

CREATE TABLE `loanlist` (
  `id` int(11) NOT NULL,
  `loanname` varchar(255) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus`
--

CREATE TABLE `loanstatus` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `statusname` varchar(256) NOT NULL,
  `priorityno` int(11) NOT NULL DEFAULT 1,
  `colorclass` varchar(50) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loanstatus_remarks`
--

CREATE TABLE `loanstatus_remarks` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `title` varchar(256) NOT NULL,
  `remarks` longtext NOT NULL,
  `statusid` int(11) NOT NULL DEFAULT 0,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `meta_keywords`
--

CREATE TABLE `meta_keywords` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `slug` varchar(100) NOT NULL,
  `title` varchar(256) NOT NULL,
  `descriptions` mediumtext NOT NULL,
  `keywords` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `newsletter_subscribe`
--

CREATE TABLE `newsletter_subscribe` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `subscribeemail` varchar(256) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `otpverification`
--

CREATE TABLE `otpverification` (
  `id` int(11) NOT NULL,
  `rec_date` date DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `otpcode` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `partner_subscription_order`
--

CREATE TABLE `partner_subscription_order` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `partnerid` int(11) NOT NULL,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `card_number` varchar(256) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `phonepe_entry`
--

CREATE TABLE `phonepe_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `productid` int(11) DEFAULT NULL,
  `packageid` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `productname` varchar(256) NOT NULL,
  `productslug` varchar(256) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `offeramount` float(11,2) NOT NULL,
  `inOffer` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `products_package` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `productid` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `package_slug` varchar(256) NOT NULL,
  `package_amount` float(11,2) NOT NULL DEFAULT 0.00,
  `package_offer` float(11,2) NOT NULL DEFAULT 0.00,
  `package_validity` int(11) NOT NULL DEFAULT 0,
  `package_description` longtext NOT NULL,
  `package_order` int(11) NOT NULL DEFAULT 1,
  `inOffer` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `refund`
--

CREATE TABLE `refund` (
  `id` int(11) NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `ref_for` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `invoiceid` int(11) NOT NULL,
  `ref_date` date DEFAULT NULL,
  `ref_number` varchar(256) NOT NULL,
  `ref_price` float(11,2) NOT NULL,
  `ref_cgst` float(11,2) NOT NULL,
  `ref_sgst` float(11,2) NOT NULL,
  `ref_igst` float(11,2) NOT NULL,
  `ref_grandtotal` float(11,2) NOT NULL,
  `paymentid` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) DEFAULT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roipackages`
--

CREATE TABLE `roipackages` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `loantype` int(11) NOT NULL,
  `bankid` int(11) NOT NULL,
  `roi` float(11,2) NOT NULL,
  `termsyears` float(11,2) NOT NULL,
  `termsmonths` int(11) NOT NULL,
  `isPreapproval` int(11) NOT NULL DEFAULT 0,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

CREATE TABLE `site_faqs` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `faq_type` int(11) NOT NULL DEFAULT 1,
  `faq_question` varchar(256) NOT NULL,
  `faq_answer` longtext NOT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `site_options`
--

CREATE TABLE `site_options` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `option_key` varchar(255) NOT NULL,
  `option_value` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `site_options`
--

INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(25, '2025-02-18 17:06:55', 'privacy-policy', '<p>The privacy of every user of indiafinpro is crucial for the company. This Privacy Policy mentions the data and information we gather about you, how we treat it, with whom we share it, and how we preserve and protect it.</p>\r\n\r\n<p>In the regular course of our business through this website, we gather your personal information through several sources, including:</p>\r\n\r\n<ul>\r\n	<li>Information from you, such as applications or other sources which includes your name, address, marital status, employment, assets and income; and</li>\r\n	<li>Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</li>\r\n</ul>\r\n\r\n<p>We&#39;re also dedicated to protecting the users of our website by addressing potential privacy concerns. Our privacy guidelines apply to all users globally. This policy applies to all information, in whatever form, relating to indiafinpro&rsquo;s business activities across the world, and to all information handled by indiafinpro, relating to other companies and organizations with whom it deals. It also covers all IT and information communications facilities operated by indiafinpro or on its behalf.</p>\r\n\r\n<p>This Privacy Policy covers the security, information, IT equipment and use of indiafinproo, a company incorporated under the laws, presently in force in India and has its registered office at Surat, Gujarat and all its affiliates. It also includes the use of email, internet, voice and mobile IT equipment. This policy applies to all indiafinpro Users, Clients, and employees (hereafter referred to as &#39;individuals&#39;).</p>\r\n\r\n<p>Subject to arbitration, only the courts and tribunals of Surat, Gujarat shall have exclusive jurisdiction with respect to any suit, action or any other proceedings arising out of or in relation to the Loan Documents. Nothing contained in this clause shall limit any right of the Lender to commence any legal action or proceedings arising in relation to the Loan or the Loan Documents in any other court, tribunal or another appropriate forum, competent jurisdiction and the Borrower and/or the Guarantor hereby consent to that jurisdiction.</p>\r\n\r\n<p><strong>How indiafinpro manages and protects Your Personal Information?</strong></p>\r\n\r\n<p>indiafinpro doesn&rsquo;t sell or trade information about current or former clients to third parties. We may disclose your personal information as necessary to:</p>\r\n\r\n<ul>\r\n	<li>Effect, administer, or enforce a transaction that you request or authorize;</li>\r\n	<li>Process or service a financial product or service that you request or authorize; or</li>\r\n	<li>Maintain or service your account with us or with another entity.</li>\r\n</ul>\r\n\r\n<p>indiafinpro may also disclose your personal information and data for everyday business purposes to organizations or firms who provide consulting, technology or other services for us and agree to maintain its confidentiality; others, such as attorneys, trustees, family members, or others who are authorized to represent you, your estate, or a joint or co-owner of your account; regulatory agencies; or as we are otherwise permitted or required by law or process of law.</p>\r\n\r\n<p>indiafinpro restricts access to your personal information to our employees and to permitted third-parties who need to know that information to provide products or services for us, or to provide, process, or maintain any security, account, or investment product, service or program for you or your benefit. To protect your personal information from unauthorized access and use, we have adopted administrative, technical, and physical security procedures that comply with the Laws in India. These measures include computer safeguards and secured files and buildings.</p>\r\n\r\n<p><strong>What indiafinpro can do with your personal information:</strong></p>\r\n\r\n<p>We may use your personal information that we collect, or that is provided to us for the following reasons:</p>\r\n\r\n<ol>\r\n	<li>Considering any application for an account or service;</li>\r\n	<li>Carrying out our business functions and activities;</li>\r\n	<li>Collecting amounts you owe us, including taking enforcement action;</li>\r\n	<li>Exercising our rights and fulfilling our obligations under any agreement with you;</li>\r\n	<li>Exercising our rights and fulfilling our obligations for the purposes of complying with all applicable laws, including those relating to money laundering, terrorist financing, bribery, corruption, tax evasion, fraud, and similar; and managing all economic and trade sanction risks;</li>\r\n	<li>Generally administering and monitoring services provided to you (or any related entity); and</li>\r\n	<li>Providing you with information about our other services, or the services of selected third parties in which we think you may have an interest, including by post, telephone and electronic message &ndash; you can opt-out of receiving information about our other services and/or the services of selected third parties by informing us in writing.</li>\r\n</ol>\r\n\r\n<p><strong>Sharing of Personal Information with Third Parties:</strong></p>\r\n\r\n<p>indiafinpro does not sell, trade, or otherwise transfer to outside parties your personally identifiable information. This does not include trusted third parties who assist us in operating our website, conducting our business, or servicing you, so long as those parties agree to keep this information confidential. We may also release your information when we believe release is appropriate to comply with the law, enforce our site policies, or protect our or others&#39; rights, property, or safety. However, non-personally identifiable visitor information may be provided to other parties for marketing, advertising, or other uses.</p>\r\n\r\n<p><strong>Security and Confidentiality:</strong></p>\r\n\r\n<p>The protection and security of your personal information are important to us. We generally follow industry-standard information security tools and measures, as well as internal procedures and strict guidelines to prevent information submitted to us, both during transmission and once we receive it from misuse and data leakage. No method of transmission over the internet, or method of electronic storage, is 100% secure, however. Therefore, while we strive to use commercially acceptable means to protect your personal information, which considerably reduces the risks of data misuse, we cannot guarantee its absolute security. To notify the Company about any security vulnerability or potential data breach, please contact us at: <a href=\"mailto:info@indiafinpro.com\">info@indiafinpro.com</a> and we will take the appropriate measures to address such an incident, as deemed necessary.</p>\r\n\r\n<p>Our employees can access the information on a &quot;need-to-know&quot; basis and are subject to confidentiality obligations.</p>\r\n\r\n<p><strong>DATA ACCURACY</strong></p>\r\n\r\n<p>Personal Data must be accurate and, where necessary, kept up to date. It must be corrected or deleted without delay when inaccurate. It is advisable that you ensure that the Personal Data we use and hold is accurate, complete, kept up to date and relevant to the purpose for which we collected it. You must check the accuracy of any Personal Data at the point of collection and at regular intervals afterwards. You must take all reasonable steps to destroy or amend inaccurate or out-of-date Personal Data.</p>\r\n\r\n<p><strong>LIMIT OF LIABILITY</strong></p>\r\n\r\n<p>We shall not be liable for any confusion caused as a result of any of your actions or omission of any action, anything as a result of your viewing, reading or listening of any content. Although we will do our best to provide constant, uninterrupted access to our website, we accept no responsibility or liability for any interruption or delay.<br />\r\nIn no event will our total liability to you for all damages arising from your use of the service or information, materials or products included on or otherwise made available to you through the service exceed the amount you paid for the service related to your claim.</p>\r\n\r\n<p>We have no liability for any loss, damage or misappropriation of your files under any circumstances or for any consequences related to changes, restrictions, suspension or termination of your service or the agreement. These liabilities shall apply to you even if their remedies shall fail their essential purpose.</p>\r\n\r\n<p><strong>USAGE OF ADVERTISING ID</strong></p>\r\n\r\n<p>When you are using our application that incorporates our Services, we may also automatically record your Google and/or any other Advertising ID (if you are using an Android device) or your Advertising Identifier (IDFA - if you are using an IOS device; together with the Google and/or any other Advertising ID-&quot;Mobile Advertising IDs&quot;), for advertising or analytics purposes. The said Advertising ID is an anonymous identifier, provided by Google. If your device has an Advertising ID, we may collect and use it for advertising and user analytics purposes. If your device does not have an Advertising ID, we may use other persistent identifiers. The information collected may also be stored on your device. You can reset your mobile Advertising ID or opt-out of receiving targeted ads through your mobile Advertising IDs which are provided in our settings.</p>\r\n\r\n<p><strong>COMPLIANCE &amp; COOPERATION WITH REGULATORS</strong></p>\r\n\r\n<p>We regularly review this Privacy Policy and make sure that we process your personal information in ways that comply with regulations currently in force in India. We firmly comply with legal frameworks including data protection laws relating to the transfer of data.</p>\r\n\r\n<p><strong>CONSENT</strong></p>\r\n\r\n<p>By using our website, you consent to our website&#39;s Privacy Policy. The usage of the website shall be construed as an acceptance of the Privacy Policy.</p>\r\n\r\n<p><strong>GRIEVANCES</strong></p>\r\n\r\n<p>For any complaints and/or inquiries, you can send us formal written inquiries or complaints at <a href=\"mailto:info@indiafinpro.com\">info@indiafinpro.com</a>. All inquiries and/or complaints shall be examined and will be resolved expeditiously. Our team of experts will respond by contacting the person who made such inquiries and/or complaints. We work with the appropriate regulatory authorities, including local data protection authorities, to resolve any complaints regarding the transfer of your data that we cannot resolve with you directly.</p>\r\n\r\n<p><strong>MODIFICATION OF THE POLICY</strong></p>\r\n\r\n<p>We reserve the right to modify this Privacy Policy at our own independent decision at any time. If the changes are significant, the Company shall spare no efforts to apprise its clientele and provide a prominent notice (including, for certain services, email notification of Privacy Policy changes). It is pertinent to remember that it shall be the Clients&#39; responsibility to read the Policy as amended every once in a while.</p>\r\n\r\n<p><strong>USAGE OF COOKIES/COOKIES POLICY</strong></p>\r\n\r\n<p>Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n\r\n<p>&nbsp;</p>\r\n');
INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(26, '2025-02-18 17:40:00', 'terms-conditions', '<p>In these Terms &amp; Conditions, the words such as &ldquo;we&rdquo;, &ldquo;our&rdquo;, &ldquo;company&rdquo;, and &ldquo;us&rdquo; refer to indiafinpro and its undertaken system. And the words such as &ldquo;you&rdquo;, &ldquo;your&rdquo; refer to indiafinpro users, customers, etc.</p>\r\n\r\n<p>Here are the terms and conditions for Customers, Employees, and every user of our website - <a href=\"https://indiafinpro.com\">https://indiafinpro.com</a>. So, the terms and conditions are applied as per your role. You must read all the below-mentioned Terms &amp; Conditions carefully.</p>\r\n\r\n<p>The Company wishes to offer the services under the terms and conditions set forth and the user/customer wishes to be associated unconditionally with these terms and conditions.<br />\r\nTherefore, in consideration of the agreements contained in this, the parties, intending to be legally bound, agree to the correctness and authenticity of the following details given to the company:</p>\r\n\r\n<ul>\r\n	<li>Information from you, such as applications or other forms (which include your name, address, marital status, employment, assets and income); and</li>\r\n	<li>Information about you, your accounts, and your holdings and transactions that we receive from you or others, such as account custodians, brokers, and other financial services firms, banks, etc.</li>\r\n</ul>\r\n\r\n<p>If the company by any source finds out anyone bad-mouthing or defaming the company&#39;s reputation or company&#39;s members then strict legal action will be taken against the individual or group.<br />\r\n<br />\r\nWe&#39;re also serious about protecting our users by addressing potential privacy concerns. Our terms and condition guidelines apply to all users across the world. These terms and conditions apply to all information, in whatever form, relating to indiafinpro&#39;s business activities worldwide, and to all information handled by indiafinpro, relating to other organizations with whom it deals. It also covers all IT and information communications facilities operated by indiafinpro or on its behalf.</p>\r\n\r\n<p><strong>SUBSCRIPTION TERMS AND CONDITIONS:</strong></p>\r\n\r\n<ol>\r\n	<li>The payment of subscription fees is refundable only in accordance with the company&#39;s Cancellation &amp; Refund Policy.</li>\r\n	<li>indiafinpro subscription is not transferable and is only valid up to its date of expiry (valid as per subscription) and the subscription may not be used by any person other than the purchaser.</li>\r\n	<li>&nbsp;Renewal terms and conditions are at the discretion of indiafinpro.</li>\r\n	<li>The subscription can only be used on/for our website.</li>\r\n</ol>\r\n\r\n<p><strong>CUSTOMER TERMS AND CONDITIONS:</strong></p>\r\n\r\n<ol>\r\n	<li>The payment of Subscription fees is refundable only in accordance with the company&#39;s Cancellation &amp; Refund Policy.</li>\r\n	<li>The company only takes the cost of the Subscription. No other tip of service is charged.</li>\r\n	<li>Customers can use the Subscription only for loan purposes with given benefits. Also, buying a Subscription lets you apply for a loan and it doesn&rsquo;t guarantee loan approval as the final loan approval depends on the banks and the customer profile. If the loan is rejected, you can still avail other benefits of the Subscription.</li>\r\n	<li>If a customer is viewing any advertisement/promotional content of the company and then approaching the company thinking that he/she will get the loan approval based on the advertisement, then it must be noted that a loan application will only be submitted once the customer buys indiafinpro&rsquo;s Subscription. Even after buying the Subscription, the final loan approval depends on the bank(s) and customer profile. If the customer&rsquo;s profile doesn&rsquo;t match loan eligibility criteria, he/she won&rsquo;t be able to get a loan. Still, they can avail other benefits of the Subscription.</li>\r\n	<li>Subscription can be used only by the persons who have purchased it and not by any other person(s), source or third party.</li>\r\n	<li>If a customer reference does payment through the customer&#39;s own referral link which is provided by the company and if that shows in the customer&#39;s portal then the only company will give the reference payout of that customer.</li>\r\n	<li>If the customer loan is approved in our company and he/she denies that loan approval then also Subscription payment would not be refundable.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer are for the processing of the loan only and the company never misuses them. Just for security, after completing the loan process, the customer can go to the concerned bank and cancel their cheque. The company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>If you do not give the OTP, documents, or document query for verification to the company&#39;s employee for the loan process, then your file will be rejected. (According to the criteria, if your file matches without OTP, your loan will be processed).</li>\r\n	<li>If our company&#39;s executive asks you for any payment transaction OTP, do not provide it. If the customer pays any charges other than the charge of the Subscription, the company won&rsquo;t be responsible for the same.</li>\r\n	<li>If a customer has any queries regarding the loan process then he/she would have to contact the department where their files are in process.</li>\r\n	<li>We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. For example, if your file will match in 2 banks then our company&#39;s login department will login your document only in that 2 banks. The verification is done by the company&#39;s employee and there is no proof available for the same.</li>\r\n	<li>The document will be verified by the company in multiple banks. If your documents match the criteria of the bank, then the login process will be done in that bank. If your documents do not match the criteria of a bank, the company will give you a solution. You can take the solution and reapply after a certain period (as per Subscription) - and this will be shown on the customer portal.</li>\r\n	<li>It is not fixed that the customer file will be logged in only in the banks listed on the company website. It may be logged in/verified in other banks also, depending on the customer file.</li>\r\n	<li>Our company is not taking extra charges other than Subscription charges. If any third-party charges you then our company is not responsible for that.</li>\r\n	<li>There are no processing or file charges for customer loan approval. There is only one charge and that&#39;s only for the Subscription - validity as per Subscription.</li>\r\n	<li>Our company will log in customer files as per their requirements. (Example: If customer requirement is INR 1 lakh and if some bank criteria is up to INR 50,000 then we will not log in their file in that bank).</li>\r\n	<li>Wherever the customer file is logged in by the company, these details will not be given to any customer in written or digital form.</li>\r\n	<li>Loan offers and the pre-approval loans process depend only on the bank&#39;s rules and that type of loan is given only on customer behaviour. So, there is so much difference between that type of process and the company&#39;s process. If that loan is rejected in our company but gets approved by another company/source then the customer can&#39;t blame our company.</li>\r\n	<li>Loan approval depends on your profile so if your documents are perfect and as per the bank criteria then you will get a loan through our company</li>\r\n	<li>The loan information is only given to the person who has applied for the loan.</li>\r\n	<li>During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</li>\r\n	<li>If your file is rejected in our company, then the customer has to make sure that they have to re-submit their documents, with the implemented company-suggested solution, in our company after a certain period (as per Subscription).</li>\r\n	<li>The company is not responsible if the customer loan is rejected by any queries.</li>\r\n	<li>If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them a reason and solution for that. So at re-applying time if the customer will not resubmit a file with the solution implemented then the file will be again rejected in our company for the same reason. Still, the final loan approval will depend on the customer profile and the bank&#39;s criteria and rules &amp; regulations.</li>\r\n	<li>The company will provide only the reason for rejection to the customer and it would not be provided in the form of hard or soft copy - it will only be shown in the customer portal. Some banks only provide general reasons, they don&#39;t give us any specific reason so the customer should not complain about that.</li>\r\n	<li>The customer has to give correct information about their CIBIL SCORE and PROFILE. If the customer gives wrong information, then the company will not be responsible for loan rejection.</li>\r\n	<li>The company will not be providing any CIBIL REPORT in digital or hard copy to any customer in any situation.</li>\r\n	<li>Bank charges are applicable as per banks&#39; rules and regulations.</li>\r\n	<li>The company will take legal action against the customer who submitted fake documents. And the company won&rsquo;t take any responsibility for the loan process in this case.</li>\r\n	<li>After the customer&rsquo;s file is logged in, the customer has to contact only the login department and coordinate with them &ndash; not any telecaller or other department of the company. The further process has to be done according to the login department.</li>\r\n	<li>During the loan process if the rules of any bank change, then we have to follow those new rules.</li>\r\n	<li>The customer has to give their registered phone number for being contacted by the login department.</li>\r\n	<li>During the loan processing time, if the company gets any queries and it is not solving that in the given time, then the company has the authority to take more time to address the query. So, the customer must not complain about the same.</li>\r\n	<li>If the customer wants to reapply in our company after file rejection or approval, then he/she has to re-submit their documents in the customer portal.</li>\r\n	<li>When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final loan approval. Approval only depends on your documents and the banks&#39; rules and regulations. We are not giving you any guarantee for the final loan approval.</li>\r\n	<li>All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services. If any person has confusion, they can call on the company&rsquo;s customer care number to gain clarity before availing company&rsquo;s services.</li>\r\n	<li>The customer&#39;s payment is executed by third-party payment sources. So whenever payment would be received by the company then only a Subscription will be activated for the customer. If a customer&#39;s payment would be debited from his/her account but we don&#39;t receive any payment in the company&#39;s account then the company will not be responsible for that.</li>\r\n	<li>For any reference customer&#39;s payout, their account verification is compulsory. After verification, if the payout amount is debited from the company&rsquo;s account and if it does not credit/reflect in the reference customer&rsquo;s account &ndash; the company won&rsquo;t be responsible for this issue.</li>\r\n	<li>Our company is a private limited company and we are tied up with banks and corporate DSA. We are providing loans through banks only.</li>\r\n	<li>Multiple partnered banks&#39; logos are shown on our website and our promotional content across many mediums &ndash; these are shown only for our company&#39;s marketing purpose. It might be possible that certain banks, whose logos are shown on our website/promotional content, are not partnered with our company. Also, these should not be assumed as any bank&#39;s advertisement.</li>\r\n	<li>If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\r\n	<li>If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</li>\r\n	<li>The eligibility age for buying a Subscription is 18 - 62 years. The persons in this age bracket can avail benefits of the Subscription.</li>\r\n	<li>For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customer will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</li>\r\n	<li>Every reference payout will have a deduction of 5% TDS.</li>\r\n	<li>For the loan process, the company will only coordinate with the person who has purchased the Subscription and has an ongoing loan process &ndash; the company won&rsquo;t coordinate with any third party.</li>\r\n	<li>Every bank payout will have tax deductions as per the bank&rsquo;s rules and regulations.</li>\r\n	<li>The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</li>\r\n	<li>The company will provide the appropriate loan services but the responsibility of customer handling will be of the reference customer.</li>\r\n	<li>If any bank&#39;s rules or company&#39;s rules are changing during the processing time of the loan then the customer has to follow those new rules.</li>\r\n	<li>The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</li>\r\n	<li>Our promotional content may communicate messages like &#39;Get Personal Loan in 30 mins&#39; or &#39;Get Rs.5,00,000 in 5 mins&#39; on our company&rsquo;s social media, blogs/articles, ads, websites, emails, SMS, or any other medium &ndash; it must be carefully noted that these messages are only meant for marketing and promotional purposes. All the numerical values that depict time/number of steps/number of clicks &ndash; are for marketing and promotional purposes only. The final loan approval and process depend on the customer profile and the bank/NBFCs&rsquo; rules, regulations and criteria. If you have any sort of doubt before starting the process, you can call our customer care number (10 am to 5 pm &ndash; Monday to Saturday).</li>\r\n	<li>As per the details/information entered by the user, even if the actual pre-approved amount is lesser than 2 Lakhs, the pre-approved amount shown on the website will be Rs.2 Lakhs (minimum). And, even if the actual pre-approved amount is more than 8.5 Lakhs, the pre-approved amount shown on the website will be Rs.8.5 Lakhs (maximum). The pre-approved amount/pre-approved loan offers are tentative &ndash; the final loan approval, loan sanction, and disbursement depend on the customer profile and the NBFCs&rsquo; rules and regulations.</li>\r\n	<li>The first login of the customer&rsquo;s file will be handled and executed by the company. To avail the reapplying option, the customer will have to perform the self-login(s).</li>\r\n</ol>\r\n\r\n<p><strong>REFERENCE TERMS AND CONDITIONS:</strong></p>\r\n\r\n<ol>\r\n	<li>Reference payout would be given to reference customers as per rules and regulations of our company.</li>\r\n	<li>Our company will give payout only on Subscription; it does not depend on the reference customer&#39;s loan approval or rejection.</li>\r\n	<li>Whether the customer loan will be approved or not depends on the customer profile and the company does not give any guarantee for that.</li>\r\n	<li>If customers are giving a reference in our company for loan purposes, for that we have some criteria. The customer has to give a reference based on that criteria. The company is not giving you any type of guarantee for the loan approval in any situation at any cost so customers who give a reference have to agree with the decision of that file&#39;s login department.</li>\r\n	<li>The company will take legal action against the reference partner/customer who submitted fake documents. And the company won&rsquo;t take any responsibility for the loan process in this case.</li>\r\n	<li>&nbsp;The Customer&#39;s terms and conditions are also applicable to the reference person&#39;s customers.</li>\r\n	<li>&nbsp;Reference customer&#39;s payment is done through third-party payment sources. So whenever payment would be received by the company then only the Subscription will be activated. If the customer&#39;s payment is debited from his/her account but the company doesn&#39;t receive any payment in the company&#39;s account then the company will not be responsible for any queries.</li>\r\n	<li>&nbsp;During loan offers, if any reference person will do the online loan process then the company will give the payout up to 40% per Subscription to the reference person. But before that, invoice generation is most important for any payout process.</li>\r\n	<li>&nbsp;If the customer of reference will do an online process then the customer&#39;s payout will be given to the referral partner. But during processing time, if the company would refund that amount to the customer for any reason, then that customer&#39;s payout will be cut out from the reference person&#39;s next payout.</li>\r\n	<li>&nbsp;Whatever documents are submitted by a reference person, they will be secure in our company. If documents will be misused by any other sources in future then our company is not responsible for that.</li>\r\n	<li>For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customer will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</li>\r\n	<li>&nbsp;If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat remains the only junction for any legal procedure. No one can contact any employee or director of our company.</li>\r\n	<li>&nbsp;If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</li>\r\n	<li>&nbsp;Every reference payout will have a deduction of 5% TDS.</li>\r\n	<li>The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</li>\r\n	<li>The Company will have no responsibility for the promotions conducted and undertaken by the Customer Reference. The Customer Reference agrees that the promotions done by them are at their own risk, and the Customer Reference cannot hold the Company responsible for any sort of losses faced due to the promotions.</li>\r\n</ol>\r\n\r\n<p><strong>GENERAL TERMS AND CONDITIONS:</strong></p>\r\n\r\n<ol>\r\n	<li>If the login department fails to solve the customer queries with accuracy, dedication and responsibility, then the login department agency will be cancelled by the company.</li>\r\n	<li>The Customer&#39;s loan process will take more days due to any festival.</li>\r\n	<li>If anyone has GST then they have to add the GST number in their portal so that the company can provide a GST Return to them. If you haven&rsquo;t received your GST Return &ndash; you can raise a request or call on company&rsquo;s customer care number between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</li>\r\n	<li>The Company is using Blogs for their advertising, so that content could be of the third party, so the company doesn&#39;t take guarantee of the information to be correct or incorrect.</li>\r\n	<li>If customers, employees, any other person, or any other party has a problem with the company then they have to inform that problem to our company through notice; so, we can try to give you a solution of that but after that, any of them want to take a legal action then they have to inform the company through notice. Only then, the legal process will be started.</li>\r\n	<li>&nbsp;If customers, employees, any other person, any other third party has a problem/dispute/misunderstanding with the company, the right to take the final decision over the concerned issue is reserved with the company and the concerned person will have to accept the solution provided by the company.</li>\r\n	<li>The documents, cheques, and OTP that the company&#39;s employee asks the customer are for the processing of the loan, the company is not responsible if any problems/disputes arise in the future.</li>\r\n	<li>During any process on the website, if there is any kind of mistake that happens due to the software or website technical problems, the final decision on such disputes can only be taken by the company and it has to be accepted by anyone concerned.</li>\r\n	<li>The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</li>\r\n	<li>All the commitments made by the company&rsquo;s employees (any employee/person from the company), telecallers, or salespersons, etc. should be cross-checked by any concerned person (customer/any other person) from the Terms &amp; Conditions section of <a href=\"https://indiafinpro.com\">https://indiafinpro</a> before availing any of the company&rsquo;s services. Only the rules and regulations stated on the company website will be considered official.</li>\r\n	<li>All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services. If any person has confusion, they can call on the company&rsquo;s customer care number to gain clarity before availing company&rsquo;s services.</li>\r\n	<li>If any Customer Referral&rsquo;s customer gets a refund (due to any dispute like payment gateway problem or any other issue) then the referral payout will not be provided (if provided, it would be deducted from the next payout of the customer referral).</li>\r\n	<li>While generating the payout for Customer Referrals, the company uses a third-party payment gateway. So, if the payout is stuck and put on hold due to any payment gateway issue (or any other issue), then the payout would be delayed and all the terms and conditions of the third-party payment gateway would be applied. In such cases, the payout will be released only when the third-party payment gateway releases the stuck payment. In case of a payout dispute with any bank, the bank&rsquo;s criteria will be applied and the payout will be released only when the bank approves the payment.</li>\r\n	<li>&nbsp;If there is any dispute that arises between any concerned user (customer, customer referral, etc.) and the company, their account will be disabled immediately by the company. In such a case, the user would be needed to contact the company for any query.</li>\r\n	<li>&nbsp;All of the promotional content put and shared by the company, either on its website or any platform, is only for advertisement purposes. Any person should not assume it as the final loan approval or details of the loan. The final loan approval and specifics of the loan depend on the rules and regulations of various banks (or the concerned bank) and the customer profile. Every customer, or any other user must accept this clause and consider the bank&rsquo;s loan processing time only.</li>\r\n	<li>The loan-related figures, rates, and information used in the promotional content of the company are general and for promotional purposes. The final nature and specifics of the loan in terms of the loan amount, interest rate, repayment tenure, loan processing fees, loan insurance, etc., depends solely on the customer profile and the rules and regulations stated by the concerned bank. The final loan details depend on the criteria set by the concerned bank(s).</li>\r\n	<li>indiafinpro&#39;s company name, logo, content, business concept, software and system, pattern, website structure and design, and business process and offers are copyrighted with the company. If any individual or organization uses/copies any of the above-mentioned by even 1%, legal action may be taken against them.</li>\r\n	<li>If any person (customer, employee, etc.) is involved in any of the company&#39;s processes then the company is authorized to record the phone calls with that person.</li>\r\n	<li>&nbsp;If any customer applies for a loan in our company and if any other external person/organization commits fraud with that customer in terms of taking money from you or in any other way then, it will not be the company&rsquo;s responsibility for any kind of loss faced by the customer.</li>\r\n	<li>Whatever loan offer is given to the customer is according to the customer profile. The customer will have to compulsorily accept the loan offer &ndash; he/she cannot deny the loan offer.</li>\r\n	<li>The company has full authority to use the customer&rsquo;s information for purposes such as testimonials, advertisements, marketing, SMS, etc. The customer agrees that regulations of Do Not Disturb(DND)/National Do Not Call(NDNC) won&rsquo;t be applied in such practices.</li>\r\n	<li>&nbsp;If any person (user, customer, etc.) visits our website and indulges in any activity &ndash; like clicking a button, link, filling forms, or any other activity on the website, it will clearly mean and express that the person agrees to and acknowledges all terms &amp; conditions, rules &amp; regulations, and policies of the company.</li>\r\n	<li>After the loan approval, the bank charges will be applied as per the bank&rsquo;s rules and regulations.</li>\r\n	<li>&nbsp;No customer can contact the bank&rsquo;s employees to inquire about/get any information on the loan file processes.</li>\r\n	<li>The customer, whose loan has been approved, must read and understand the bank agreement and the bank&rsquo;s terms and conditions carefully. After the loan process is done, the company can&rsquo;t be held responsible or liable for anything.</li>\r\n	<li>The company will take legal action against the customer, reference customer, or any other person who submitted fake documents. And the company won&#39;t take any responsibility for the loan process in this case.</li>\r\n	<li>&nbsp;Multiple partnered banks&#39; logos are shown on our website and our promotional content across many mediums &ndash; these are shown only for our company&#39;s marketing purpose. It might be possible that certain banks, whose logos are shown on our website/promotional content, are not partnered with our company. Also, these should not be assumed as any bank&#39;s advertisement.</li>\r\n	<li>&nbsp;If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat, will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</li>\r\n	<li>Any wrong/fake commitment or vocal statement given by the company&rsquo;s employees, etc. would be considered invalid. Only the solutions or solution-related vocal statements would be considered valid. All the company&rsquo;s Terms &amp; Conditions, Privacy Policy, Disclaimer, all other rules will be final and have to be followed.</li>\r\n	<li>&nbsp;If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</li>\r\n	<li>&nbsp;The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</li>\r\n	<li>Loan processing time might get delayed because of any public holiday, technical problems, customer issues, etc.</li>\r\n	<li>The Company will not be providing any proof for rejection in hard or soft copy.</li>\r\n	<li>It might be possible that the content/figures/information shown on our website are not updated. So, to get the exact information regarding any of our website&rsquo;s content, Terms &amp; Conditions, Privacy Policy, Disclaimer, etc., you can call on our customer care number.</li>\r\n	<li>&nbsp;After the purchase of the Subscription, the Company Executive will call the concerned person within 24-48 hours (it could be delayed due to any reason) for the loan process or partner process. If the concerned person doesn&rsquo;t get a call, they can call on the company&rsquo;s customer care number.</li>\r\n	<li>&nbsp;If the login process is going on and there has been no response from the login department, then the customer can call on the company&rsquo;s customer care number.</li>\r\n	<li>The content and any process on the website can be changed or modified at any instance. So, the older version of the content and process won&rsquo;t be functional, valid, or a subject of argument for any person &ndash; and the customers, users, etc. have to stay timely updated and accept all the changes unconditionally. Only the current content and process of the website will be considered valid.</li>\r\n	<li>&nbsp;By accessing our website, you affirm your age as 18 years or more. If you&rsquo;re someone below 18 years, we advise you not to access our website or the services</li>\r\n	<li>&nbsp;Any processes regarding the loan might get delayed due to public holidays, technical problems/software issues, etc.</li>\r\n	<li>&nbsp;In case the update email/message regarding the processes of loan is not received by the customer due to a delay because of technical problems, software issues, or any other issue &ndash; they can call on the company&rsquo;s customer care between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</li>\r\n	<li>&nbsp;In case the user, customer, any other person, or organization has a query/problem/issue or wants to raise a dispute with the company &ndash; they can either raise a request ticket or call on the company&rsquo;s customer care number between 10 AM to 5 PM (Monday to Saturday &ndash; only business days).</li>\r\n	<li>Due to a software/system issue, it might happen that the dates mentioned in the Loan Status are late by 3-4 days.</li>\r\n	<li>To get the TDS Return, the reference customer has to submit all the details/documents asked in their portal. Note: The TDS Return will be given starting from the financial year in which all the details/documents are submitted. The TDS Return won&rsquo;t be provided for the financial year(s) that are prior to the financial year in which the details/documents were submitted.</li>\r\n	<li>The general criteria to apply for a personal loan by a salaried individual are &ndash; Min. Age: 21 years; Min. Salary: Rs.15,000/month (credited in the bank account); Salary Slips available; and Job Stability proof available. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>&nbsp;The general criteria to apply for a personal loan by a self-employed individual are &ndash; Min. Age: 21 years; IT Returns available (min. 1 year); Business Stability proof available; and Current Account in a bank. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>The general criteria to apply for a business loan by a small business person are &ndash; Min. Age: 21 years; IT Returns available (min. 1 year); and Business Stability proof available (min. 1 year). Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>The general criteria to apply for a business loan by an audited report business person are &ndash; Min. Age: 21 years; Min. Rs.1 Crore+ Yearly Turnover; and Min. 2 Years Audited Report. Final loan approval completely depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>&nbsp;The eligible age for buying a Subscription is 18 - 62 years. The persons in this age bracket can avail benefits of the Subscription offered by the company. The company only offers Subscription and provides its benefits to the customers. The final loan approval depends on the customer profile and the bank&rsquo;s rules and criteria.</li>\r\n	<li>For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customers will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</li>\r\n	<li>&nbsp;Any information/flow/system regarding our website shown in the videos posted on social media (or any platform) may be inaccurate, outdated, or different from our actual website. Only the most updated version of the website, terms &amp; conditions, and other policies shall be valid.</li>\r\n	<li>The banks&rsquo; logos used in our ads, social media posts, blogs, emails, or any other medium is for promotional purposes only. The process will be done in that bank only under whose criteria the customer profile gets matched. The final loan approval and final loan process completely depend on the customer profile and the bank&rsquo;s criteria and rules and regulations.</li>\r\n	<li>The banks&rsquo; logos shown on our website and the pre-approved offer displayed on our website are tentative only. The process will be done in that bank only under whose criteria the customer profile gets matched. The final loan approval and final loan process completely depend on the customer profile and the bank&rsquo;s criteria and rules and regulations.</li>\r\n	<li>By purchasing the company&rsquo;s Subscription, the customer is applying to get the company&rsquo;s services. All the benefits of the Subscription will be given to the customer by the company.</li>\r\n	<li>If any customer data &amp; information, KYC documents, or OTP is misused in future by any third-party, our company and its directors, employees, or any individuals associated with the company cannot be held responsible for the same in any matter whatsoever including any loss, harm, or damage due to the usage of information from the portal. Customers are advised to bring in their own discretion in such matters. The information provided on the website is of financial nature. It is a mutual understanding that customers association with the website will be at the customer&#39;s will, preference and risk.</li>\r\n	<li>If any customer&rsquo;s documents are found to be fraud by the bank/financial institution or there&rsquo;s any sort of an issue with any customer&rsquo;s repayment of the loan to the banks/financial institution &ndash; then these matters have to be solely between the customer and the bank/financial institution. Our company and its directors, employees, or any other individual associated with the company cannot be held responsible in such cases. If the customer documents are found to be fake and fraud and are used anywhere for any purpose, the company cannot be held responsible for the same.</li>\r\n	<li>&nbsp;If any third-party gets a loan approved on someone else&rsquo;s identity and documents, then our company and its directors, employees, or any other individual associated with the company cannot be held responsible.</li>\r\n	<li>If any of the company&rsquo;s customers or any third-party wants a legal course, action and proceedings with the company, then only the company&rsquo;s legal team can be involved. There will absolutely be no involvement of the company&rsquo;s directors, any other individual associated with the company, or employees in any legal proceeding. For any legal action or proceeding involving our company, Surat, Gujarat, shall remain the only jurisdiction.</li>\r\n	<li>TDS will be given only to the ones whose referral payout has been generated. If your TDS is deducted, you can contact your CA. If your TDS has been deducted and it&rsquo;s not showing, then you can contact the company&rsquo;s customer care number between 10 AM to 5 PM &ndash; Monday to Saturday (only business days).</li>\r\n	<li>&nbsp;If any person enters incorrect information and starts the loan process on our website, and if this leads to any sort of fraud in future, the company, its directors, employees, any other individual associated with the company cannot be held responsible for the same.</li>\r\n	<li>The pre-approved loan offers shown are from those banks/NBFCs that have eligibility criteria to which the customer&rsquo;s profile matches (profile evaluated as per the information entered by the customer). These pre-approved loan offers are tentative only &ndash; the final loan approval, loan sanction, and disbursement depend on the NBFC(s) and their rules and regulations. The company will only log in the customer&rsquo;s file in those NBFCs with which the company has tie-ups/partnerships/collaborations and where the customer&rsquo;s profile matches the NBFC eligibility criteria.</li>\r\n	<li>Our company&rsquo;s services are strictly for the residents of India only &ndash; not for the non-residents. If any non-resident purchases our Subscription, they can request for a refund as per the company&rsquo;s Cancellation &amp; Refund Policy.</li>\r\n	<li>In case a customer has mistakenly made more than a single payment, the customer will be eligible to get a refund. The customer will have to request a refund within 48 hours of the payment through the Raising A Request section of the website or by calling on the company&rsquo;s registered contact number.</li>\r\n	<li>In case a customer has bought Subscriptions from multiple companies that belong to our group of companies, the customer will be eligible to get a refund. The customer will have to request a refund within 48 hours of the payment through the Raising A Request section of the website or by calling on the company&rsquo;s registered contact number.</li>\r\n</ol>\r\n\r\n<p><strong>PRE-APPROVAL LOAN OFFER TERMS AND CONDITIONS:</strong></p>\r\n\r\n<p>The Pre-Approved Loan Offer and the amount mentioned in it are solely shown based on the software calculation done on Monthly Income and Current Monthly EMI entered by the person. This &quot;Pre-Approved Loan Offer&quot; is tentative and not the final loan approval (this is already mentioned on the Pre-Approved loan Offer page) &ndash; as the final loan approval is given by the bank only; based on the bank&rsquo;s rules and regulations and the customer profile. And this is clearly stated in the company&rsquo;s Terms &amp; Conditions which is agreed by the person before registration.</p>\r\n\r\n<p>Here&#39;s an example to know how the &lsquo;Pre-Approved Loan Offer&rsquo; is shown:</p>\r\n\r\n<p>Consider that a person (named &lsquo;Manish&rsquo;) enters the following details in our website:</p>\r\n\r\n<p>Monthly Income: Rs.1,00,000<br />\r\nCurrent Monthly EMI: Rs.30,000</p>\r\n\r\n<p>Based on these details, Manish is left with Rs.70,000 in hand (deducting current EMI) every month. So, according to the general rules of the banks, the EMI of 50% of the in-hand amount can be approved. So, the loan amount that allows a maximum of Rs.35,000 (70,000/2) EMI can be approved. And based on the EMI and rate of interest (11% tentatively), the eligible amount is shown in the Pre-Approved Loan Offer. And based on this Rs.1903/lakh EMI is shown.</p>\r\n\r\n<p><strong>CANDIDATE TERMS AND CONDITIONS</strong></p>\r\n\r\n<ol>\r\n	<li>The interview time is fixed.</li>\r\n	<li>The interview can&#39;t be taken any other time than the time decided by the company.</li>\r\n	<li>&nbsp;The Company can ask any questions in the interview.</li>\r\n	<li>The candidate will have to appear for the interview as many times as the company asks.</li>\r\n	<li>A resume (Xerox) will be mandatory for the interview. The resume will not be returned. There will be no misuse of the resume.</li>\r\n</ol>\r\n\r\n<p><strong>USAGE OF COOKIES / COOKIES POLICY</strong></p>\r\n\r\n<p>Cookies are small files that a site or its service provider transfers to your computer&#39;s hard drive through your web browser with your permission which enables the site or service provider&#39;s systems to recognize your browser and capture and remember certain information. We use cookies to help us understand and save your preferences for future visits, keep track of advertisements and compile aggregate data about site traffic and site interaction so that we can offer better site experiences and tools in the future.</p>\r\n\r\n<p>The user, customer, or any other person accessing our website clearly expresses and agrees that they have fully read and understood the Terms &amp; Conditions and Privacy Policy of indiafinpro &ndash; and they accept them unconditionally.</p>\r\n'),
(27, '2021-07-25 07:52:01', 'welcome-status', '0'),
(28, '2021-07-25 07:52:01', 'welcome-message', '<h2>Welcome Message</h2>'),
(29, '2025-02-17 17:34:15', 'disclaimer', '<p>indiafinpro customers and employees use and present <a href=\"https://indiafinpro.com/\">https://indiafinpro.com</a>&nbsp;(the &ldquo;Website&rdquo;) for personal and informational purposes only. In addition, we further expressly disclaim any warranties or representations (expressed or implied) in respect of quality, suitability, accuracy, reliability, completeness, timeliness, performance for a particular purpose or legality of the services listed or displayed or transacted or the content on the website. You must not perceive and construe any such information or other material as legal, tax, investment, financial, or other advice. You completely acknowledge and undertake that you are accessing the services on the indiafinpro website and transacting at your own risk only and are using your best and prudent judgement before entering into and making any transactions through the website. You alone assume the sole responsibility of evaluating the merits and risks associated with the use of any information or other Content contained on the indiafinpro Website before making any decisions based on such information or other Content.</p>\r\n\r\n<p>Nothing contained on our Website constitutes a solicitation, recommendation, endorsement, or offer by indiafinpro to buy or sell any securities or other financial instruments in this or in any other jurisdiction in which such solicitation or offer would be unlawful under the securities laws of such jurisdiction. You further acknowledge that at no time shall any right, title or interest in the services sold through or displayed on the website vest with indiafinpro nor shall indiafinpro have any obligations or liabilities in respect of any transactions on the website.</p>\r\n\r\n<p>After you enter your details on our website for any purpose, the company takes no responsibility in case you come across instances of data misusage of any form.</p>\r\n'),
(30, '2023-02-09 15:22:27', 'facebookpixel', '1234567890'),
(31, '2023-02-09 15:23:47', 'facebookdomain', 'facebook_domain'),
(32, '2021-07-25 07:52:42', 'account-msg-customer', ''),
(33, '2021-07-25 07:52:52', 'account-msg-channel', ''),
(34, '2025-02-28 15:37:22', 'newinvoiceno', '53'),
(35, '2025-02-17 17:23:45', 'refund-policy', '<p><strong>What are the criteria for our customers to Request a Refund?</strong></p>\r\n\r\n<p>1. A customer can be eligible for a refund if an email requesting a refund is sent by the customer (with the registered email id) to <a href=\"mailto:info@indiafinpro.com\">info@indiafinpro.com​​​​​​​</a> within 48 hours of purchasing the Subscription plan. The payment mode for the refund will be the same as the mode through which the customer&#39;s payment was received. As per the banks, the refund can be received within 7 to 8 working days.</p>\r\n\r\n<p>2. If the customer is unable to communicate with the company in English, Hindi, or Gujarati, they can apply for a refund within 48 hours of purchasing the Subscription plan.</p>\r\n\r\n<p>3. There are certain areas/locations in which our company does not provide its services. If any customer has bought our Subscription plan and belongs to such areas/locations, they can apply for a refund within 48 hours of purchasing the Subscription plan.</p>\r\n\r\n<p>If you have any query/doubt regarding our policy, please contact us by writing at <a href=\"mailto:info@indiafinpro.com​​​​​​​\">info@indiafinpro.com​​​​​​​</a><strong><em> </em></strong>or calling on +91-79906-02205​​​​​​​ between 10 AM to 5 PM (business days only).</p>\r\n');
INSERT INTO `site_options` (`id`, `rec_date`, `option_key`, `option_value`) VALUES
(36, '2025-01-31 15:16:06', 'customer-legal-agreement', '<ol>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company only takes the cost of the Subscription. No other tip of service is charged.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Customers can use the Subscription only for loan purposes with given benefits. Also, buying a Subscription lets you apply for a loan and it doesn&rsquo;t guarantee loan approval as the final loan approval depends on the banks and the customer profile. If the loan is rejected, you can still avail other benefits of the Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer is viewing any advertisement/promotional content of the company and then approaching the company thinking that he/she will get the loan approval based on the advertisement, then it must be noted that a loan application will only be submitted once the customer buys Urban Small Finance&rsquo;s Subscription. Even after buying the Subscription, the final loan approval depends on the bank(s) and customer profile. If the customer&rsquo;s profile doesn&rsquo;t match loan eligibility criteria, he/she won&rsquo;t be able to get a loan. Still, they can avail other benefits of the Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Subscription can be used only by the persons who have purchased it and not by any other person(s), source or third party.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer reference does payment through the customer&#39;s own referral link which is provided by the company and if that shows in the customer&#39;s portal then the only company will give the reference payout of that customer.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer loan is approved in our company and he/she denies that loan approval then also Subscription payment would not be refundable.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The documents, cheques, and OTP that the company&#39;s employee asks the customer are for the processing of the loan only and the company never misuses them. Just for security, after completing the loan process, the customer can go to the concerned bank and cancel their cheque. The company is not responsible if any problems/disputes arise in the future.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If you do not give the OTP, documents, or document query for verification to the company&#39;s employee for the loan process, then your file will be rejected. (According to the criteria, if your file matches without OTP, your loan will be processed).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If our company&#39;s executive asks you for any payment transaction OTP, do not provide it. If the customer pays any charges other than the charge of the Subscription, the company won&rsquo;t be responsible for the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If a customer has any queries regarding the loan process then he/she would have to contact the department where their files are in process.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">We will verify your documents in multiple banks; so whatever documents are submitted by customers in our company that will match with any bank criteria, in that bank only we will proceed with the loan process. For example, if your file will match in 2 banks then our company&#39;s login department will login your document only in that 2 banks. The verification is done by the company&#39;s employee and there is no proof available for the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The document will be verified by the company in multiple banks. If your documents match the criteria of the bank, then the login process will be done in that bank. If your documents do not match the criteria of a bank, the company will give you a solution. You can take the solution and reapply after a certain period (as per Subscription) - and this will be shown on the customer portal.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">It is not fixed that the customer file will be logged in only in the banks listed on the company website. It may be logged in/verified in other banks also, depending on the customer file.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company is not taking extra charges other than Subscription charges. If any third-party charges you then our company is not responsible for that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">There are no processing or file charges for customer loan approval. There is only one charge and that&#39;s only for the Subscription - validity as per Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company will log in customer files as per their requirements. (Example: If customer requirement is INR 1 lakh and if some bank criteria is up to INR 50,000 then we will not log in their file in that bank).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Wherever the customer file is logged in by the company, these details will not be given to any customer in written or digital form.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Loan offers and the pre-approval loans process depend only on the bank&#39;s rules and that type of loan is given only on customer behaviour. So, there is so much difference between that type of process and the company&#39;s process. If that loan is rejected in our company but gets approved by another company/source then the customer can&#39;t blame our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Loan approval depends on your profile so if your documents are perfect and as per the bank criteria then you will get a loan through our company</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The loan information is only given to the person who has applied for the loan.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan processing time, if any customer would not be in contact with us for 3 days, then that file will be rejected by our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If your file is rejected in our company, then the customer has to make sure that they have to re-submit their documents, with the implemented company-suggested solution, in our company after a certain period (as per Subscription).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company is not responsible if the customer loan is rejected by any queries.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer will apply for the first time but his/her loan is rejected in our company then the company will give them a reason and solution for that. So at re-applying time if the customer will not resubmit a file with the solution implemented then the file will be again rejected in our company for the same reason. Still, the final loan approval will depend on the customer profile and the bank&#39;s criteria and rules &amp; regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will provide only the reason for rejection to the customer and it would not be provided in the form of hard or soft copy - it will only be shown in the customer portal. Some banks only provide general reasons, they don&#39;t give us any specific reason so the customer should not complain about that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer has to give correct information about their CIBIL SCORE and PROFILE. If the customer gives wrong information, then the company will not be responsible for loan rejection.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will not be providing any CIBIL REPORT in digital or hard copy to any customer in any situation.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Bank charges are applicable as per banks&#39; rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will take legal action against the customer who submitted fake documents. And the company won&rsquo;t take any responsibility for the loan process in this case.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">After the customer&rsquo;s file is logged in, the customer has to contact only the login department and coordinate with them &ndash; not any telecaller or other department of the company. The further process has to be done according to the login department.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan process if the rules of any bank change, then we have to follow those new rules.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer has to give their registered phone number for being contacted by the login department.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">During the loan processing time, if the company gets any queries and it is not solving that in the given time, then the company has the authority to take more time to address the query. So, the customer must not complain about the same.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If the customer wants to reapply in our company after file rejection or approval, then he/she has to re-submit their documents in the customer portal.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">When you are applying for a loan on our website, we are showing you only your Eligibility for the loan. So whatever details you enter on the website are accepted by software only, and that only shows your pre-approval and not your final loan approval. Approval only depends on your documents and the banks&#39; rules and regulations. We are not giving you any guarantee for the final loan approval.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">All the detailed criteria, terms, and information behind any of the company&rsquo;s concise promotional content (social media ads, banners, SMS, advertisements, emails, etc.) are stated in the Terms &amp; Conditions and Privacy Policy sections of the website. Any concerned person (customer, employee, etc.) must check and accept all the rules and regulations before availing any of the company&rsquo;s services. If any person has confusion, they can call on the company&rsquo;s customer care number to gain clarity before availing company&rsquo;s services.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The customer&#39;s payment is executed by third-party payment sources. So whenever payment would be received by the company then only a Subscription will be activated for the customer. If a customer&#39;s payment would be debited from his/her account but we don&#39;t receive any payment in the company&#39;s account then the company will not be responsible for that.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For any reference customer&#39;s payout, their account verification is compulsory. After verification, if the payout amount is debited from the company&rsquo;s account and if it does not credit/reflect in the reference customer&rsquo;s account &ndash; the company won&rsquo;t be responsible for this issue.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our company is a private limited company and we are tied up with banks and corporate DSA. We are providing loans through banks only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Multiple partnered banks&#39; logos are shown on our website and our promotional content across many mediums &ndash; these are shown only for our company&#39;s marketing purpose. It might be possible that certain banks, whose logos are shown on our website/promotional content, are not partnered with our company. Also, these should not be assumed as any bank&#39;s advertisement.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If anyone takes any legal action against the company then only our legal advisor would be dealing with that and Surat, Gujarat will only remain the junction for any legal procedure. No one would be able to contact any employee or director of our company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any person has a doubt/question regarding any of the company&rsquo;s terms and conditions, they can contact the company.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The eligibility age for buying a Subscription is 18 - 62 years. The persons in this age bracket can avail benefits of the Subscription.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For the Reference Customers who have given customer referrals to the company, it would be compulsory for them to submit their Payout Documents to the company within 30 days. If not submitted, all the payouts of the Reference Customer will be automatically cancelled. To get the cancelled payout, you can contact the company and discuss it.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Every reference payout will have a deduction of 5% TDS.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">For the loan process, the company will only coordinate with the person who has purchased the Subscription and has an ongoing loan process &ndash; the company won&rsquo;t coordinate with any third party.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Every bank payout will have tax deductions as per the bank&rsquo;s rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The Company&#39;s authorized person can change any rules and regulations at any time; the concerned person must be regularly updated with the company&rsquo;s terms and conditions and has to accept them unconditionally.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The company will provide the appropriate loan services but the responsibility of customer handling will be of the reference customer.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">If any bank&#39;s rules or company&#39;s rules are changing during the processing time of the loan then the customer has to follow those new rules.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The office holidays and bank holidays will not be counted as working days/business days. The company&rsquo;s office work will be done on working days only.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">Our promotional content may communicate messages like &#39;Get Personal Loan in 30 mins&#39; or &#39;Get Rs.5,00,000 in 5 mins&#39; on our company&rsquo;s social media, blogs/articles, ads, websites, emails, SMS, or any other medium &ndash; it must be carefully noted that these messages are only meant for marketing and promotional purposes. All the numerical values that depict time/number of steps/number of clicks &ndash; are for marketing and promotional purposes only. The final loan approval and process depend on the customer profile and the bank/NBFCs&rsquo; rules, regulations and criteria. If you have any sort of doubt before starting the process, you can call our customer care number (10 am to 5 pm &ndash; Monday to Saturday).</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">As per the details/information entered by the user, even if the actual pre-approved amount is lesser than 2 Lakhs, the pre-approved amount shown on the website will be Rs.2 Lakhs (minimum). And, even if the actual pre-approved amount is more than 8.5 Lakhs, the pre-approved amount shown on the website will be Rs.8.5 Lakhs (maximum). The pre-approved amount/pre-approved loan offers are tentative &ndash; the final loan approval, loan sanction, and disbursement depend on the customer profile and the NBFCs&rsquo; rules and regulations.</p>\r\n	</li>\r\n	<li dir=\"ltr\">\r\n	<p dir=\"ltr\">The first login of the customer&rsquo;s file will be handled and executed by the company. To avail the reapplying option, the customer will have to perform the self-login(s).</p>\r\n	</li>\r\n	<li>\r\n	<p dir=\"ltr\">The Customer clearly expresses and agrees that they have fully read and understood the Terms &amp; Conditions mentioned in this Agreement &ndash; and they accept them unconditionally.</p>\r\n	</li>\r\n</ol>\r\n'),
(37, '2023-02-18 17:52:56', 'channel-legal-agreement', '<h3>CHANNEL TERMS AND CONDITIONS</h3>'),
(38, '2022-02-21 12:58:01', 'smssenderid', 'KRDTBE'),
(39, '2022-03-12 00:11:33', 'pl-remarketing-sms', ''),
(40, '2022-02-01 13:15:20', 'bl-remarketing-sms', ''),
(41, '2022-02-01 13:15:20', 'pl-process-sms', 'Dear Customer, Your Personal Loan Application is Processed. Get Pre-Approved Loan Offer in Just 3 Steps. Apply Now https://google.com indiafinpro'),
(42, '2022-02-01 13:15:20', 'bl-process-sms', 'Dear Customer, Your Business Loan Application is Processed. Get Pre-Approved Loan Offer in Just 3 Steps. Apply Now https://google.com indiafinpro'),
(43, '2022-02-23 15:29:28', 'pl-offer-sms', ''),
(44, '2022-02-01 13:44:38', 'bl-offer-sms', ''),
(45, '2022-02-01 14:07:12', 'account-sms', 'Dear Customer, Congrats! Submission of your loan application is done. Kindly check your registered email and login into the customer portal for submitting the required documents. Regards, indiafinpro'),
(46, '2022-02-01 14:07:12', 'cp-account-sms', 'Congrats! Your Partner Application is successfully submitted. Kindly check your Registered Email and login into the Channel Partner Portal. Please submit the required documents for account activation. Our Company Executive will be in touch soon. Regards, indiafinpro'),
(47, '2022-03-25 12:05:49', 'cp-offer-sms', ''),
(48, '2022-11-08 13:07:22', 'payment-fail-sms', 'Sorry! Your payment for indiafinpro Subscription was not successful. Try Another Payment Method here https://google.com/ indiafinpro'),
(49, '2023-11-03 10:53:15', 'fbaccesstokendigital', 'fbaccesstokendigital'),
(50, '2023-11-03 10:53:15', 'fbeventnamedigital', 'fbeventnamedigital'),
(51, '2023-11-03 10:53:46', 'fbeventiddigital', 'fbeventiddigital'),
(52, '2023-11-03 10:53:46', 'fbaccesstokenpartner', 'fbaccesstokenpartner'),
(53, '2023-11-03 10:53:58', 'fbeventnamepartner', 'fbeventnamepartner'),
(54, '2023-11-03 10:53:58', 'fbeventidpartner', 'fbeventidpartner');

-- --------------------------------------------------------

--
-- Table structure for table `sms_list`
--

CREATE TABLE `sms_list` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `portal` varchar(50) NOT NULL,
  `module` varchar(50) NOT NULL,
  `title` varchar(256) NOT NULL,
  `message` mediumtext NOT NULL,
  `isActive` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sms_log`
--

CREATE TABLE `sms_log` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `crontype` varchar(50) NOT NULL DEFAULT 'company',
  `parentid` int(11) NOT NULL DEFAULT 1,
  `cronname` varchar(256) NOT NULL,
  `msgcount` int(11) NOT NULL,
  `msgresponse` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscription_order`
--

CREATE TABLE `subscription_order` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `productid` int(11) NOT NULL DEFAULT 0,
  `packageid` int(11) NOT NULL DEFAULT 0,
  `registration_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `card_number` varchar(256) NOT NULL,
  `amount` float(11,2) NOT NULL,
  `paymentid` varchar(256) NOT NULL,
  `isActive` int(11) NOT NULL DEFAULT 1,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_request`
--

CREATE TABLE `support_request` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL,
  `ticketno` varchar(50) NOT NULL,
  `usertype` tinyint(4) NOT NULL COMMENT '1=CUSTOMER, 0=GUEST',
  `fullname` varchar(256) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `emailid` varchar(100) NOT NULL,
  `cardnumber` varchar(50) DEFAULT NULL,
  `issuetype` varchar(100) DEFAULT NULL,
  `message` varchar(256) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `server_ip` varchar(256) DEFAULT NULL,
  `isDelete` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `support_request_chat`
--

CREATE TABLE `support_request_chat` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `requestid` int(11) NOT NULL,
  `remarks` longtext NOT NULL,
  `staffid` int(11) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `reviewpage` int(11) NOT NULL DEFAULT 1 COMMENT '1=Site,2=Customer, 3=Partner',
  `fullname` varchar(256) NOT NULL,
  `ratings` float(11,2) NOT NULL DEFAULT 0.00,
  `photo` varchar(256) NOT NULL DEFAULT 'placeholder.jpg',
  `reviews` longtext NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `rec_date`, `reviewpage`, `fullname`, `ratings`, `photo`, `reviews`, `isDelete`) VALUES
(1, '2021-07-07 12:01:12', 1, 'Shubhashish Haldar', 4.00, 'shubhashis.webp', 'The support system is strong.It\'s good to associate with them. i received a quick response for my personal loan, it get disbursed within week.', 0),
(2, '2021-07-07 12:10:49', 1, 'Jayesh Joshi', 4.50, 'jayesh_joshi.webp', 'Very good service and most of all the Director of company is very kind heart and helping nature and he make understand things better.', 0),
(3, '2021-07-07 12:11:24', 1, 'Vijay Kumar', 5.00, 'vijay_kumar.webp', 'Great Service i personally experienced, highly recommended. Instatnt preapproval and disbursed loan with in 7 working days.', 0),
(4, '2021-07-07 12:12:55', 1, 'Kunal Sharma', 3.50, 'kunal_sharma.webp', 'indiafinpro gave me quick response to query. that was best of the call. They understood what i wanted and provide me with good service', 0),
(5, '2022-07-30 15:36:43', 1, 'Ashok G Prajapati', 4.30, 'ashok_prajapatri.webp', 'indiafinpro.com is very good company and very professional. i am recivced very qyick response for my business loan there employees are very co-operative.', 0),
(6, '2022-08-13 10:22:51', 1, 'Dinesh Yellappa', 4.50, 'dinesh_yellapa.webp', 'Very good service and most of all the Directorof company is very kind heart and helping nature and he make understand things better.', 0),
(7, '2022-09-24 12:07:35', 1, 'Bikas Lama', 4.50, 'bikas_lama.webp', 'Great Service I personally experienced, highly recommended instant preapproval and disbursed loan with in 7 working days. Thank you indiafinpro.com!!', 0),
(8, '2022-09-24 12:07:59', 1, 'Kiran Dnyandev', 4.50, 'kiran_dnyandev.webp', 'indiafinpro.com is very good company and very professional. i am recivced very quick response for my business loan there empoloyees are very co-operative.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `unsubscription_logs`
--

CREATE TABLE `unsubscription_logs` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `user_type` int(11) NOT NULL COMMENT '1=PL, 2=BL, 3=Channel',
  `mobile_no` varchar(55) NOT NULL,
  `reason` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_application`
--

CREATE TABLE `user_application` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `loantype` int(11) NOT NULL,
  `loanamount` bigint(20) NOT NULL,
  `cibilscore` varchar(256) NOT NULL,
  `loanpurpose` varchar(256) NOT NULL,
  `income` bigint(20) NOT NULL,
  `currentemi` int(11) NOT NULL,
  `emibounce` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `loantenure` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1 COMMENT '1=New, 2=Approve, 3=Reject',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_application_status`
--

CREATE TABLE `user_application_status` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `applicationid` int(11) NOT NULL,
  `statusid` int(11) NOT NULL,
  `statusdate` date DEFAULT NULL,
  `bankid` int(11) NOT NULL,
  `loanamount` int(11) NOT NULL,
  `loanroi` varchar(256) NOT NULL,
  `loanterms` varchar(256) NOT NULL,
  `processfees` int(11) NOT NULL,
  `insurance` varchar(256) NOT NULL,
  `monthlyemi` int(11) NOT NULL,
  `remarks` varchar(256) NOT NULL,
  `sanction_letter` longtext NOT NULL,
  `staffid` int(11) NOT NULL,
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_documents`
--

CREATE TABLE `user_documents` (
  `id` int(11) NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `profilephoto` varchar(256) DEFAULT NULL,
  `aadharcard` varchar(256) DEFAULT NULL,
  `aadharcard_number` varchar(256) DEFAULT NULL,
  `pancard` varchar(256) DEFAULT NULL,
  `pancard_number` varchar(256) DEFAULT NULL,
  `cancelcheque` varchar(256) DEFAULT NULL,
  `lightbill` varchar(256) DEFAULT NULL,
  `bankstatement` varchar(256) DEFAULT NULL,
  `formsixteen` varchar(256) DEFAULT NULL,
  `salaryslip` varchar(256) DEFAULT NULL,
  `businessproof` varchar(256) DEFAULT NULL,
  `itreturn` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) NOT NULL,
  `isVerified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payout_documents`
--

CREATE TABLE `user_payout_documents` (
  `id` int(11) NOT NULL,
  `rec_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `userid` int(11) NOT NULL,
  `gstdoc` varchar(256) DEFAULT NULL,
  `gstdoc_number` varchar(256) DEFAULT NULL,
  `aadharcard` varchar(256) DEFAULT NULL,
  `aadharcard_number` varchar(256) DEFAULT NULL,
  `pancard` varchar(256) DEFAULT NULL,
  `pancard_number` varchar(256) DEFAULT NULL,
  `cancelcheque` varchar(256) DEFAULT NULL,
  `remarks` varchar(256) NOT NULL,
  `isVerified` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `update_date` datetime NOT NULL DEFAULT current_timestamp(),
  `fullname` varchar(256) NOT NULL DEFAULT 'noname',
  `mobile` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(256) NOT NULL,
  `city` varchar(255) NOT NULL,
  `state` varchar(256) DEFAULT NULL,
  `usertype` int(11) NOT NULL,
  `cardtype` int(11) DEFAULT NULL,
  `refcode` varchar(50) DEFAULT NULL,
  `gstno` varchar(256) DEFAULT NULL,
  `process_step` int(11) NOT NULL DEFAULT 1,
  `isUser` int(11) NOT NULL DEFAULT 0 COMMENT '0=None, 1=Steps, 2=Register',
  `isDnd` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `iAgree` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `isActive` int(11) NOT NULL DEFAULT 1 COMMENT '0=No, 1=Yes',
  `isDelete` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_tree`
--

CREATE TABLE `user_tree` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `refferaltype` int(11) NOT NULL DEFAULT 1 COMMENT '1=Customer, 2=Channel',
  `refferaluserid` int(11) NOT NULL,
  `subuserid` int(11) NOT NULL,
  `payout` int(11) NOT NULL DEFAULT 0 COMMENT '0=No, 1=Yes',
  `payout_date` date DEFAULT NULL,
  `payout_amount` float(11,2) NOT NULL,
  `order_amount` float(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `worldline_entry`
--

CREATE TABLE `worldline_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `productid` int(11) DEFAULT NULL,
  `packageid` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `referenceid` varchar(256) DEFAULT NULL,
  `txstatus` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `zaakpay_entry`
--

CREATE TABLE `zaakpay_entry` (
  `id` int(11) NOT NULL,
  `rec_date` datetime NOT NULL DEFAULT current_timestamp(),
  `productid` int(11) DEFAULT NULL,
  `packageid` int(11) DEFAULT NULL,
  `userid` int(11) NOT NULL,
  `orderid` varchar(50) NOT NULL,
  `orderamount` float(11,2) NOT NULL,
  `ordernote` varchar(256) DEFAULT NULL,
  `statuscode` varchar(256) DEFAULT NULL,
  `transactionid` varchar(256) DEFAULT NULL,
  `paymentmode` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `administration_log`
--
ALTER TABLE `administration_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adscontent`
--
ALTER TABLE `adscontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adsdata`
--
ALTER TABLE `adsdata`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `airpay_entry`
--
ALTER TABLE `airpay_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `allremarks`
--
ALTER TABLE `allremarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bankapplylink`
--
ALTER TABLE `bankapplylink`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bulksms`
--
ALTER TABLE `bulksms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cardoffer_order`
--
ALTER TABLE `cardoffer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_enquiry`
--
ALTER TABLE `career_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `career_opening`
--
ALTER TABLE `career_opening`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_log`
--
ALTER TABLE `channel_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_partner`
--
ALTER TABLE `channel_partner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `channel_partner_documents`
--
ALTER TABLE `channel_partner_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indexes for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cp_account_manager`
--
ALTER TABLE `cp_account_manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cp_social_media`
--
ALTER TABLE `cp_social_media`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_log`
--
ALTER TABLE `customer_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `email_list`
--
ALTER TABLE `email_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiry`
--
ALTER TABLE `enquiry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `important_update`
--
ALTER TABLE `important_update`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanlist`
--
ALTER TABLE `loanlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanstatus`
--
ALTER TABLE `loanstatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loanstatus_remarks`
--
ALTER TABLE `loanstatus_remarks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `meta_keywords`
--
ALTER TABLE `meta_keywords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletter_subscribe`
--
ALTER TABLE `newsletter_subscribe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `otpverification`
--
ALTER TABLE `otpverification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partner_subscription_order`
--
ALTER TABLE `partner_subscription_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phonepe_entry`
--
ALTER TABLE `phonepe_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products_package`
--
ALTER TABLE `products_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refund`
--
ALTER TABLE `refund`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roipackages`
--
ALTER TABLE `roipackages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_faqs`
--
ALTER TABLE `site_faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_options`
--
ALTER TABLE `site_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_list`
--
ALTER TABLE `sms_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sms_log`
--
ALTER TABLE `sms_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscription_order`
--
ALTER TABLE `subscription_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_request`
--
ALTER TABLE `support_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `support_request_chat`
--
ALTER TABLE `support_request_chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unsubscription_logs`
--
ALTER TABLE `unsubscription_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_application`
--
ALTER TABLE `user_application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_application_status`
--
ALTER TABLE `user_application_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_documents`
--
ALTER TABLE `user_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payout_documents`
--
ALTER TABLE `user_payout_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tree`
--
ALTER TABLE `user_tree`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `worldline_entry`
--
ALTER TABLE `worldline_entry`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `zaakpay_entry`
--
ALTER TABLE `zaakpay_entry`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `administration_log`
--
ALTER TABLE `administration_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adscontent`
--
ALTER TABLE `adscontent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `adsdata`
--
ALTER TABLE `adsdata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `airpay_entry`
--
ALTER TABLE `airpay_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `allremarks`
--
ALTER TABLE `allremarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bankapplylink`
--
ALTER TABLE `bankapplylink`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `bulksms`
--
ALTER TABLE `bulksms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cardoffer_order`
--
ALTER TABLE `cardoffer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_enquiry`
--
ALTER TABLE `career_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `career_opening`
--
ALTER TABLE `career_opening`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `channel_log`
--
ALTER TABLE `channel_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `channel_partner`
--
ALTER TABLE `channel_partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `channel_partner_documents`
--
ALTER TABLE `channel_partner_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contact_enquiry`
--
ALTER TABLE `contact_enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cp_account_manager`
--
ALTER TABLE `cp_account_manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cp_social_media`
--
ALTER TABLE `cp_social_media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer_log`
--
ALTER TABLE `customer_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `email_list`
--
ALTER TABLE `email_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `enquiry`
--
ALTER TABLE `enquiry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `important_update`
--
ALTER TABLE `important_update`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loanlist`
--
ALTER TABLE `loanlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loanstatus`
--
ALTER TABLE `loanstatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `loanstatus_remarks`
--
ALTER TABLE `loanstatus_remarks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `meta_keywords`
--
ALTER TABLE `meta_keywords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `newsletter_subscribe`
--
ALTER TABLE `newsletter_subscribe`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `otpverification`
--
ALTER TABLE `otpverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `partner_subscription_order`
--
ALTER TABLE `partner_subscription_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `phonepe_entry`
--
ALTER TABLE `phonepe_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products_package`
--
ALTER TABLE `products_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `refund`
--
ALTER TABLE `refund`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roipackages`
--
ALTER TABLE `roipackages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `site_faqs`
--
ALTER TABLE `site_faqs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site_options`
--
ALTER TABLE `site_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `sms_list`
--
ALTER TABLE `sms_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sms_log`
--
ALTER TABLE `sms_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscription_order`
--
ALTER TABLE `subscription_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_request`
--
ALTER TABLE `support_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `support_request_chat`
--
ALTER TABLE `support_request_chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `unsubscription_logs`
--
ALTER TABLE `unsubscription_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_application`
--
ALTER TABLE `user_application`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_application_status`
--
ALTER TABLE `user_application_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_documents`
--
ALTER TABLE `user_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payout_documents`
--
ALTER TABLE `user_payout_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_tree`
--
ALTER TABLE `user_tree`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `worldline_entry`
--
ALTER TABLE `worldline_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `zaakpay_entry`
--
ALTER TABLE `zaakpay_entry`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
