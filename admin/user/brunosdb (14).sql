-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2017 at 11:55 PM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `brunosdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE IF NOT EXISTS `addcart` (
`id` int(12) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `prod_id` int(12) NOT NULL,
  `prices` int(12) NOT NULL,
  `qty2` int(12) NOT NULL,
  `charges` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE IF NOT EXISTS `audittrail` (
`user_id` int(12) NOT NULL,
  `audit_user` varchar(200) NOT NULL,
  `audit_action` varchar(200) NOT NULL,
  `audit_page` varchar(200) NOT NULL,
  `a_date` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`user_id`, `audit_user`, `audit_action`, `audit_page`, `a_date`) VALUES
(50, 'admin', 'Edit Directory', 'Directory CMS', '2017/01/23 13:55:52'),
(51, '', 'Add Directory', 'Directory CMS', '2017/02/13 04:53:21'),
(52, '', 'Add Directory', 'Directory CMS', '2017/02/13 04:55:54'),
(53, '', '', '', ''),
(54, '', 'Add Directory', 'Directory CMS', '2017/03/03 19:18:12'),
(55, 'Admin  Admin', 'Add User', 'User', '2017/07/16 15:28:00'),
(56, '', 'Add Directory', 'Directory CMS', '2017/07/16 15:57:10'),
(57, '', 'Add Directory', 'Directory CMS', '2017/07/16 16:12:08'),
(58, 'Admin  Admin', 'Add User', 'User', '2017/07/16 16:12:36'),
(59, '', 'Add Directory', 'Directory CMS', '2017/07/16 16:13:22'),
(60, '', 'Add Directory', 'Directory CMS', '2017/07/16 16:14:14'),
(61, 'Admin  Admin', 'Add User', 'User', '2017/07/23 16:03:22'),
(62, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:08:07'),
(63, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:15:56'),
(64, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:16:35'),
(65, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:17:02'),
(66, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:17:30'),
(67, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:18:47'),
(68, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:19:15'),
(69, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:19:36'),
(70, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:20:17'),
(71, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:20:48'),
(72, '', 'Add Directory', 'Directory CMS', '2017/07/23 16:21:20'),
(73, '', 'Add Member', 'Employee Information', '2017/07/26 14:58:22'),
(74, '', 'Add Member', 'Employee Information', '2017/07/26 14:59:10'),
(75, '', 'Add Member', 'Employee Information', '2017/07/26 14:59:37'),
(76, '', 'Add Member', 'Employee Information', '2017/07/26 15:11:26'),
(77, '', 'Add Member', 'Employee Information', '2017/07/31 23:54:55'),
(78, '', 'Add Directory', 'Directory CMS', '2017/08/21 20:21:50'),
(79, '', 'Add Member', 'Employee Information', '2017/08/21 21:11:40'),
(80, '', 'Add Member', 'Employee Information', '2017/09/15 06:19:28'),
(81, '', 'Add Member', 'Employee Information', '2017/09/15 06:21:16');

-- --------------------------------------------------------

--
-- Table structure for table `collection`
--

CREATE TABLE IF NOT EXISTS `collection` (
`transaction_id` int(11) NOT NULL,
  `date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL,
  `balance` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  `membership_number` varchar(100) NOT NULL,
  `prod_name` varchar(550) NOT NULL,
  `expected_date` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `address`, `contact`, `membership_number`, `prod_name`, `expected_date`, `note`) VALUES
(16, 'dad', 'asdsa', '265434', '232', 'dasdas', '2017-09-22', 'sdsa');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE IF NOT EXISTS `purchases` (
`transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `suplier` varchar(100) NOT NULL,
  `remarks` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `purchases_item`
--

CREATE TABLE IF NOT EXISTS `purchases_item` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `cost` varchar(100) NOT NULL,
  `invoice` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`reservation_id` int(12) NOT NULL,
  `prod_id` varchar(60) NOT NULL,
  `user_id` varchar(12) NOT NULL,
  `payable` varchar(60) NOT NULL,
  `quantities` varchar(300) NOT NULL,
  `confirmation` varchar(60) NOT NULL,
  `transaction_id` varchar(60) NOT NULL,
  `Now` varchar(60) NOT NULL,
  `status` varchar(100) NOT NULL,
  `status2` varchar(100) NOT NULL,
  `deposit` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `prod_id`, `user_id`, `payable`, `quantities`, `confirmation`, `transaction_id`, `Now`, `status`, `status2`, `deposit`) VALUES
(56, '72', '41', '2200', '11', 'p472nzzg', '0.1', '2017-09-10', 'Cash on Delivery', 'cancel', '0'),
(57, '72', '41', '400', '2', '0bs7zwmb', '0.2', '2017-09-10', 'Cash on Delivery', 'cancel', '0'),
(58, '72', '41', '200', '1', '83m3y2w5', '0.3', '2017-09-10', 'Cash on Delivery', 'cancel', '0'),
(59, '72', '41', '800', '4', 'fawewiaf', '0.4', '2017-09-14', 'Cash on Delivery', 'cancel', '0'),
(60, '72', '41', '200', '1', 'otpx7bjw', '0.5', '2017-09-14', 'Cash on Remittance', 'cancel', '100'),
(61, '72', '41', '200', '1', 'ynzw7tt3', '0.6', '2017-09-14', 'Cash on Remittance', 'cancel', '0'),
(62, '71', '41', '399', '1', 'jasgnuq7', '0.7', '2017-09-14', 'Cash on Delivery', 'cancel', '0'),
(63, '73', '41', '4000', '10', 'hybzx4rj', '0.8', '2017-09-18', 'Cash on Delivery', 'cancel', '0'),
(64, '73', '41', '400', '1', 'u2ysawtb', '0.9', '2017-09-21', 'Cash on Remittance', 'cancel', '0'),
(65, '71', '41', '1596', '4', 'ifbexnwr', '1', '2017-09-21', 'Cash on Delivery', 'pending', '0'),
(66, '75', '41', '800', '1', 'xrvrefsn', '1.1', '2017-09-21', 'Cash on Remittance', 'pending', '0'),
(67, '71', '41', '399', '1', '54qtobgy', '1.2', '2017-09-30', 'Cash on Remittance', 'pending', '0'),
(68, '71', '41', '399', '1', '4qfjt653', '1.3', '2017-09-23', 'Cash on Remittance', 'pending', '0'),
(69, '73', '42', '400', '1', '7qghyhcv', '1.4', '2017-09-27', 'Cash on Delivery', 'pending', '0'),
(70, '73', '42', '400', '1', '7qghyhcv', '1.4', '2017-09-27', 'Cash on Delivery', 'pending', '0'),
(71, '73', '42', '400', '1', '7qghyhcv', '1.4', '2017-09-27', 'Cash on Delivery', 'pending', '0'),
(72, '70', '42', '200', '1', '6g5zxfps', '1.5', '2017-09-27', 'Cash on Remittance', 'pending', '0'),
(73, '71', '42', '399', '1', '5xpuyqtu', '1.6', '2017-09-27', 'Cash on Pick-up', 'cancel', '0'),
(74, '71', '42', '399', '1', 'dufk4i48', '1.7', '2017-09-28', 'Bank Remittance', 'pending', '0'),
(75, '70', '42', '200', '1', 'dufk4i48', '1.7', '2017-09-28', 'Cash on Remittance', 'pending', '0'),
(76, '70', '42', '200', '1', 'dufk4i48', '1.7', '2017-09-28', 'Cash on Remittance', 'pending', '0'),
(77, '75', '43', '1600', '2', 'jpwf05mu', '1.8', '2017-09-29', 'Cash on Remittance', 'pending', '0'),
(78, '71', '43', '399', '1', 'v6q6qbk8', '1.9', '2017-09-29', 'Cash on Remittance', 'pending', '0'),
(79, '70', '43', '200', '1', 'rc6mnj3b', '2', '2017-09-29', 'Cash on Remittance', 'pending', '0'),
(80, '71', '41', '200', '1', 'ra5f86og', '2.1', '2017-09-30', 'Cash on Remittance', 'confirm', '0'),
(81, '71', '41', '200', '1', 'gsfbecco', '2.2', '2017-10-03', 'Bank Remittance', 'pending', '0'),
(82, '72', '41', '400', '1', 'gsfbecco', '2.2', '2017-10-03', 'Bank Remittance', 'pending', '0'),
(83, '72', '41', '400', '1', 'gsfbecco', '2.2', '2017-10-03', 'Bank Remittance', 'pending', '0'),
(84, '73', '41', '200', '1', 'xw53s30w', '2.3', '2017-10-03', 'Cash on Pick-up', 'pending', '0');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE IF NOT EXISTS `sales` (
`transaction_id` int(11) NOT NULL,
  `invoice_number` varchar(100) NOT NULL,
  `cashier` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `due_date` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=177 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice_number`, `cashier`, `date`, `type`, `amount`, `profit`, `due_date`, `name`, `balance`) VALUES
(142, 'RS-402923', 'Admin', '09/01/17', 'cash', '4000', '-4000', '5000', 'sansan', ''),
(143, 'RS-25833273', 'Admin', '09/01/17', 'cash', '3000', '-3000', '5000', '', ''),
(144, 'RS-222233', 'Admin', '09/01/17', 'cash', '2793', '1297', '111', '', ''),
(145, 'RS-3227330', 'admin', '09/09/17', 'cash', '3433', '0', '4000', '', ''),
(146, 'RS-2790333', 'admin', '09/09/17', 'cash', '3434', '2222', '2000', 'sansan', ''),
(147, 'RS-236333', 'admin', '09/10/17', 'cash', '6846', '0', '34434', 'sample', ''),
(148, 'RS-30433', 'admin', '09/10/17', 'cash', '3423', '0', '4000', 'sansan', ''),
(149, 'RS-033229', 'admin', '09/10/17', 'cash', '3433', '0', '4000', 'qwerty', ''),
(150, '', 'admin', '09/10/17', 'cash', '972.64285714286', '9078', '10000', 'sansan', ''),
(151, '', 'admin', '09/10/17', 'cash', '972.64285714286', '9078', '10000', 'sansan', ''),
(152, 'RS-02330202', 'admin', '09/10/17', 'cash', '238.07142857143', '2222', '4000', '', ''),
(153, 'RS-2340030', 'admin', '09/10/17', 'cash', '238.07142857143', '2222', '3232', 'sansan', ''),
(154, 'RS-32342332', 'admin', '09/10/17', 'cash', '321.32142857143', '2999', '4000', '', ''),
(155, 'RS-4423272', 'admin', '09/10/17', 'cash', '36.964285714286', '345', '1000', '', ''),
(156, 'RS-833080', 'admin', '09/10/17', 'cash', '366.75', '3423', '4900', '', ''),
(157, 'RS-3022036', 'admin', '09/10/17', 'cash', '3433', '3433', '4000', '', ''),
(158, 'RS-35300320', 'admin', '09/10/17', 'cash', '11111', '11111', '15000', '', ''),
(159, 'RS-0625239', 'admin', '09/10/17', 'cash', '399', '399', '124', 'sansan', ''),
(160, 'RS-9307720', 'admin', '09/10/17', 'cash', '399', '399', '1111', '', ''),
(161, 'RS-022242', 'admin', '09/10/17', 'cash', '1596', '1596', '345454', '', ''),
(162, 'RS-0920220', 'admin', '09/10/17', 'cash', '399', '399', '45454', '', ''),
(163, 'RS-0320303', 'admin', '09/10/17', 'cash', '399', '399', '34343', '', ''),
(164, 'RS-0273396', 'admin', '09/10/17', 'cash', '798', '798', '4454', '', ''),
(165, 'RS-32035043', 'admin', '09/19/17', 'cash', '399', '441.75', '500', '', ''),
(166, 'RS-0336733', 'admin', '09/21/17', 'cash', '799', '884.60714285714', '1000', '', ''),
(167, 'RS-223220', 'admin', '09/21/17', 'cash', '399', '441.75', '2000', 'sansan', ''),
(168, 'RS-32035043', 'admin', '09/21/17', 'cash', '399', '441.75', '2000', 'sansan', ''),
(169, 'RS-52320', 'admin', '09/21/17', 'cash', '200', '221.42857142857', '400', '', ''),
(170, 'RS-240023', 'admin', '09/21/17', 'cash', '399', '441.75', '500', 'ingrd', ''),
(171, 'RS-5622', 'admin', '09/21/17', 'cash', '', '0', '1558.25', 'cname', ''),
(172, 'RS-23333333', 'admin', '09/30/17', 'cash', '599', '663.17857142857', '12345', 'jade', ''),
(173, 'RS-23333333', 'admin', '09/30/17', 'cash', '799', '884.60714285714', '1000', 'sadasdas', ''),
(174, 'RS-0704335', 'admin', '09/30/17', 'cash', '200', '221.42857142857', '1336.8214285714', 'faith', ''),
(175, 'RS-223220', 'admin', '09/30/17', 'cash', '399', '441.75', '1116.5', 'sadasdas', ''),
(176, 'RS-5203793', 'admin', '09/30/17', 'cash', '799', '884.60714285714', '1000', 'sansan', '');

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE IF NOT EXISTS `sales_order` (
`transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `product` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `amount` varchar(100) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `product_code` varchar(150) NOT NULL,
  `gen_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` varchar(100) NOT NULL,
  `discount` varchar(100) NOT NULL,
  `date` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=372 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales_order`
--

INSERT INTO `sales_order` (`transaction_id`, `invoice`, `product`, `qty`, `amount`, `profit`, `product_code`, `gen_name`, `name`, `price`, `discount`, `date`) VALUES
(315, 'RS-282392', '58', '1', '1000', '-1000', 'dsadas', 'dasdas', ' dasdasda', '1000', '', '09/01/17'),
(316, 'RS-402923', '58', '4', '4000', '-4000', 'dsadas', 'dasdas', ' dasdasda', '1000', '', '09/01/17'),
(317, 'RS-25833273', '58', '2', '2000', '-2000', 'dsadas', 'dasdas', ' dasdasda', '1000', '', '09/01/17'),
(318, 'RS-25833273', '58', '1', '1000', '-1000', 'dsadas', 'dasdas', ' dasdasda', '1000', '', '09/01/17'),
(319, 'RS-222233', '60', '5', '1995', '745', 'Bruno Lab Fiber Shiny', 'sample', ' This is Bruno Lab Fiber Shiny Description', '399', '', '09/01/17'),
(320, 'RS-222233', '64', '2', '798', '552', 'Bruno Lab Hair Loss concealer', 'sample', ' This is Bruno Lab Hair Loss concealer description', '399', '', '09/01/17'),
(321, 'RS-33962230', '61', '3', '1197', '897', ' Bruno Lab Wax Matte', 'sample', ' This is  Bruno Lab Wax Matte description.', '399', '', '09/01/17'),
(325, 'RS-23033303', '60', '1', '2222', '0', 'Bruno Lab Fiber Matte', '', 'This is Bruno Lab Fiber Matte Description', '2222', '', '09/09/17'),
(326, 'RS-326780', '67', '3', '1368', '11700', 'eerw', 'Bruno''s Lab', ' dsfsd ', '456', '', '09/09/17'),
(327, 'RS-232200', '64', '1', '1212', '2222', 'Product 9', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', '1212', '', '09/09/17'),
(328, 'RS-23256026', '64', '2', '2424', '4444', 'Product 9', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', '1212', '', '09/09/17'),
(333, 'RS-3227330', '55', '1', '3433', '0', 'Bruno Lab After Shave', '', 'This is Bruno Lab After Shave description', '3433', '', '09/09/17'),
(335, 'RS-2790333', '64', '1', '1212', '2222', 'Product 9', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. ', '1212', '', '09/09/17'),
(336, 'RS-2790333', '60', '1', '2222', '0', 'Bruno Lab Fiber Matte', '', 'This is Bruno Lab Fiber Matte Description', '2222', '', '09/09/17'),
(337, 'RS-236333', '56', '2', '6846', '0', 'Bruno Lab Foamless Shave Cream', '', 'This is Bruno Lab Foamless Shave Cream description', '3423', '', '09/10/17'),
(338, 'RS-30433', '56', '1', '3423', '0', 'Bruno Lab Foamless Shave Cream', '', 'This is Bruno Lab Foamless Shave Cream description', '3423', '', '09/10/17'),
(339, 'RS-033229', '55', '1', '3433', '0', 'Bruno Lab After Shave', '', 'This is Bruno Lab After Shave description', '3433', '', '09/10/17'),
(340, '', '55', '1', '3433', '0', 'Bruno Lab After Shave', '', 'This is Bruno Lab After Shave description', '3433', '', '09/10/17'),
(341, '', '56', '1', '3423', '0', 'Bruno Lab Foamless Shave Cream', '', 'This is Bruno Lab Foamless Shave Cream description', '3423', '', '09/10/17'),
(342, '', '57', '1', '2222', '0', 'Bruno Lab Wax Matte', '', 'This is Bruno Lab Wax Matte description.', '2222', '', '09/10/17'),
(343, 'RS-02330202', '57', '1', '2222', '0', 'Bruno Lab Wax Matte', '', 'This is Bruno Lab Wax Matte description.', '2222', '', '09/10/17'),
(344, 'RS-2340030', '60', '1', '2222', '0', 'Bruno Lab Fiber Matte', '', 'This is Bruno Lab Fiber Matte Description', '2222', '', '09/10/17'),
(345, 'RS-32342332', '63', '1', '2999', '2888', 'Product 8 ', '', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit.  ', '2999', '', '09/10/17'),
(346, 'RS-4423272', '69', '1', '345', '341', 'ito', 'sansan2', ' fdsfdsf', '345', '', '09/10/17'),
(347, 'RS-833080', '56', '1', '3423', '0', 'Bruno Lab Foamless Shave Cream', '', 'This is Bruno Lab Foamless Shave Cream description', '3423', '', '09/10/17'),
(348, 'RS-3022036', '55', '1', '3433', '0', 'Bruno Lab After Shave', '', 'This is Bruno Lab After Shave description', '3433', '', '09/10/17'),
(349, 'RS-35300320', '66', '1', '11111', '10000', 'sample12', 'Bruno''s Lab', 'sample1 2 ', '11111', '', '09/10/17'),
(350, 'RS-0625239', '70', '1', '399', '199', 'Hairstyling Fiber Shiny', 'Bruno''s Labs', 'Gives the right amouny of moldable hold for a sharp and polished look', '399', '', '09/10/17'),
(351, 'RS-9307720', '71', '1', '399', '199', 'Hairstyling Fiber Matte', 'Bruno''s Labs', 'Refresh your look with subtle and moldable hold depending on your mood.', '399', '', '09/10/17'),
(352, 'RS-022242', '70', '4', '1596', '796', 'Hairstyling Fiber Shiny', 'Bruno''s Labs', 'Gives the right amouny of moldable hold for a sharp and polished look', '399', '', '09/10/17'),
(353, 'RS-0920220', '70', '1', '399', '199', 'Hairstyling Fiber Shiny', 'Bruno''s Labs', 'Gives the right amouny of moldable hold for a sharp and polished look', '399', '', '09/10/17'),
(354, 'RS-0320303', '70', '1', '399', '199', 'Hairstyling Fiber Shiny', 'Bruno''s Labs', 'Gives the right amouny of moldable hold for a sharp and polished look', '399', '', '09/10/17'),
(355, 'RS-0273396', '70', '2', '798', '398', 'Hairstyling Fiber Shiny', 'Bruno''s Labs', 'Gives the right amouny of moldable hold for a sharp and polished look', '399', '', '09/10/17'),
(356, 'RS-0032282', '70', '1', '200', '199', 'Hairstyling Fiber Shiny', 'Bruno''s Labs', 'Gives the right amouny of moldable hold for a sharp and polished look         ', '200', '', '09/10/17'),
(357, 'RS-32035043', '71', '1', '399', '199', 'Hairstyling Fiber Matte', 'Bruno''s Labs', 'Refresh your look with subtle and moldable hold depending on your mood.', '399', '', '09/19/17'),
(358, 'RS-0072362', '71', '1', '399', '199', 'Hairstyling Fiber Matte', 'Bruno''s Labs', 'Refresh your look with subtle and moldable hold depending on your mood.', '399', '', '09/21/17'),
(359, 'RS-0336733', '71', '1', '399', '199', 'Hairstyling Fiber Matte', 'Bruno''s Labs', 'Refresh your look with subtle and moldable hold depending on your mood.', '399', '', '09/21/17'),
(360, 'RS-0336733', '73', '1', '400', '200', 'Hairstyling Fiber Wax shiny', 'Bruno''s Labs', 'Keeps your hair in check with a strong hold and sleek shine. ', '400', '', '09/21/17'),
(361, 'RS-223220', '71', '1', '399', '199', 'Hairstyling Fiber Matte', 'Bruno''s Labs', 'Refresh your look with subtle and moldable hold depending on your mood.', '399', '', '09/21/17'),
(362, 'RS-6242', '72', '10', '2000', '2000', 'Hairstyling Fiber Wax', 'Bruno''s Labs', 'Perfect for that high-impact hold without the shine.  ', '200', '', '09/21/17'),
(363, 'RS-52320', '72', '1', '200', '200', 'Hairstyling Fiber Wax', 'Bruno''s Labs', 'Perfect for that high-impact hold without the shine.  ', '200', '', '09/21/17'),
(364, 'RS-240023', '71', '1', '399', '199', 'Hairstyling Fiber Matte', 'Bruno''s Labs', 'Refresh your look with subtle and moldable hold depending on your mood.', '399', '', '09/21/17'),
(365, 'RS-90', '73', '1', '400', '200', 'Hairstyling Fiber Wax shiny', 'Bruno''s Labs', 'Keeps your hair in check with a strong hold and sleek shine. ', '400', '', '09/21/17'),
(366, 'RS-23333333', '71', '1', '399', '199', 'Hairstyling Fiber Matte', 'Bruno''s Labs', 'Refresh your look with subtle and moldable hold depending on your mood.', '399', '', '09/30/17'),
(367, 'RS-23333333', '72', '1', '200', '200', 'Hairstyling Fiber Wax', 'Bruno''s Labs', 'Perfect for that high-impact hold without the shine.  ', '200', '', '09/30/17'),
(368, 'RS-23333333', '72', '1', '200', '200', 'Hairstyling Fiber Wax', 'Bruno''s Labs', 'Perfect for that high-impact hold without the shine.  ', '200', '', '09/30/17'),
(369, 'RS-0704335', '72', '1', '200', '200', 'Hairstyling Fiber Wax', 'Bruno''s Labs', 'Perfect for that high-impact hold without the shine.  ', '200', '', '09/30/17'),
(370, 'RS-5203793', '71', '1', '399', '', '', '', '', '', '', ''),
(371, 'RS-5203793', '73', '1', '400', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `supliers`
--

CREATE TABLE IF NOT EXISTS `supliers` (
`suplier_id` int(11) NOT NULL,
  `suplier_name` varchar(100) NOT NULL,
  `suplier_address` varchar(100) NOT NULL,
  `suplier_contact` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `note` varchar(500) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supliers`
--

INSERT INTO `supliers` (`suplier_id`, `suplier_name`, `suplier_address`, `suplier_contact`, `contact_person`, `note`) VALUES
(5, 'sansan21', 'sansan21', 'sansan21', 'sansan21', 'sansan21'),
(6, 'Bruno''s Labs', 'Ortigas, Pasig citys', 'Managers', '096545454s', 'This is notes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE IF NOT EXISTS `tbl_admin` (
`admin_id` int(12) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `position` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `lname`, `fname`, `position`, `username`, `pass`, `image`) VALUES
(6, 'admin', 'Admin', 'admin', 'admin', 'admin', 'user/0338e1f.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_attendance`
--

CREATE TABLE IF NOT EXISTS `tbl_attendance` (
`attendance_id` int(11) NOT NULL,
  `employee_id` varchar(100) NOT NULL,
  `datenow` varchar(100) NOT NULL,
  `timeinout` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_attendance`
--

INSERT INTO `tbl_attendance` (`attendance_id`, `employee_id`, `datenow`, `timeinout`, `status`) VALUES
(48, '5', '2017-08-01', '00:10:05', 'Timein'),
(49, '1', '2017-08-01', '00:11:24', 'Timein'),
(50, '1', '2017-08-01', '00:11:29', 'Timeout'),
(51, '2', '2017-08-01', '00:11:38', 'Timein'),
(52, '3', '2017-08-01', '00:12:09', 'Timein'),
(53, '4', '2017-08-01', '00:12:33', 'Timein');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_contact`
--

CREATE TABLE IF NOT EXISTS `tbl_contact` (
`contact_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_contact`
--

INSERT INTO `tbl_contact` (`contact_id`, `name`, `email`, `subject`, `message`) VALUES
(1, 'sansan', 'ingrid@yahoo.com', 'hi', 'sample messagee'),
(2, 'sansan', 'dsasds', 'sdas', 'dasdas'),
(3, 'fsd', 'sdfsd', 'sdfsd', 'fdsfsd '),
(4, 'sanNamesan', 'SanNamesan', 'SanNamesan', ' SanNamesan'),
(5, '', '', '', ''),
(6, 'sample', 'Sample@yahoo.com', 'Sample', 'ddfgdfg\r\n ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE IF NOT EXISTS `tbl_employee` (
`employee_id` int(12) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `address` varchar(300) NOT NULL,
  `contact_no` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `age` varchar(300) NOT NULL,
  `position` varchar(300) NOT NULL,
  `image` varchar(300) NOT NULL,
  `employee_number` varchar(399) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`employee_id`, `firstname`, `lastname`, `address`, `contact_no`, `gender`, `age`, `position`, `image`, `employee_number`, `password`) VALUES
(1, 'Geraldine', 'Dela Paz', 'Makati City', '', 'Male', '23', 'Therapist', 'user/barbers.png', 'ewr4fg5', ''),
(2, 'Manuel', 'Bartolome', 'Quezon city', '', 'Female', '34', 'Barbers', 'user/barbers2.png', 'jkseett5', ''),
(3, 'Boy ', 'Marquez', 'Employee3 address', '0544342343', 'Female', '34', 'Barbers', 'user/barbers1.png', 'yjwtu4', ''),
(4, 'Juan', 'Dela Cruz', 'Quezon city', '', 'Male', '24', 'Barbers', 'user/barbers4.png', 'sansan', 'sansan'),
(5, 'Emelio ', 'Dela Cruz', 'pasig', '0565965406', 'Male', '21', 'Barbers', 'user/barbers5.png', ' dhxe37ez', ''),
(6, 'Robin', 'Sabado', 'konoha', '00545345', 'Male', '12', 'Stylist', 'user/barbers6.png', ' e2ke0y4t', ' yvihjddg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_featuredproduct`
--

CREATE TABLE IF NOT EXISTS `tbl_featuredproduct` (
`ID` int(12) NOT NULL,
  `image1` varchar(300) NOT NULL,
  `image2` varchar(300) NOT NULL,
  `image3` varchar(300) NOT NULL,
  `image4` varchar(300) NOT NULL,
  `title1` varchar(100) NOT NULL,
  `title2` varchar(100) NOT NULL,
  `title3` varchar(100) NOT NULL,
  `title4` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_featuredproduct`
--

INSERT INTO `tbl_featuredproduct` (`ID`, `image1`, `image2`, `image3`, `image4`, `title1`, `title2`, `title3`, `title4`) VALUES
(1, 'features/tshirt.jpg', 'features/motor.jpg', 'features/car.jpg', 'features/tshirt.jpg', 'Tshirts', 'Motor', 'Car', 'Tshirt');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE IF NOT EXISTS `tbl_feedback` (
`feedback_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dated_added` varchar(100) NOT NULL,
  `feedback` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_feedback`
--

INSERT INTO `tbl_feedback` (`feedback_id`, `name`, `dated_added`, `feedback`) VALUES
(2, 'Sansan Sansan', '2017-09-21', 'sample feedback\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gc`
--

CREATE TABLE IF NOT EXISTS `tbl_gc` (
`gc_id` int(12) NOT NULL,
  `controlno` varchar(100) NOT NULL,
  `dateissue` varchar(100) NOT NULL,
  `validuntil` varchar(100) NOT NULL,
  `branch` varchar(100) NOT NULL,
  `balance` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gc`
--

INSERT INTO `tbl_gc` (`gc_id`, `controlno`, `dateissue`, `validuntil`, `branch`, `balance`) VALUES
(1, '12345', '2017-09-10', '2017-09-21', 'MAgnolia', '1558.25');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_newproduct`
--

CREATE TABLE IF NOT EXISTS `tbl_newproduct` (
`ID` int(12) NOT NULL,
  `product1` varchar(200) NOT NULL,
  `product2` varchar(200) NOT NULL,
  `product3` varchar(200) NOT NULL,
  `product4` varchar(200) NOT NULL,
  `title1` varchar(12) NOT NULL,
  `title2` varchar(300) NOT NULL,
  `title3` varchar(300) NOT NULL,
  `title4` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_newproduct`
--

INSERT INTO `tbl_newproduct` (`ID`, `product1`, `product2`, `product3`, `product4`, `title1`, `title2`, `title3`, `title4`) VALUES
(1, 'newimage/01_iron_man_2.jpg', 'newimage/02_the_last_airbender.jpg', 'newimage/03_tron_legacy.jpg', 'newimage/dalailama446740.jpg', 'sample', 'sample2', 'sample 3', 'sample 4');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE IF NOT EXISTS `tbl_product` (
`ID` int(12) NOT NULL,
  `prod_name` varchar(200) NOT NULL,
  `prod_desc` varchar(200) NOT NULL,
  `supplier` varchar(199) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `date_added` varchar(300) NOT NULL,
  `expiry_date` varchar(100) NOT NULL,
  `quantity_left` varchar(300) NOT NULL,
  `prod_type` varchar(200) NOT NULL,
  `price` varchar(200) NOT NULL,
  `selling_price` varchar(200) NOT NULL,
  `profit` varchar(100) NOT NULL,
  `images` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`ID`, `prod_name`, `prod_desc`, `supplier`, `qty`, `date_added`, `expiry_date`, `quantity_left`, `prod_type`, `price`, `selling_price`, `profit`, `images`) VALUES
(70, 'Hairstyling Fiber Shiny', 'Gives the right amouny of moldable hold for a sharp and polished look          ', 'Bruno''s Labs', '16', '2017-09-10', '2017-09-30', '16', 'sample lang', '399', '200', '199', 'directory/2.jpg'),
(71, 'Hairstyling Fiber Matte', 'Refresh your look with subtle and moldable hold depending on your mood. ', 'Bruno''s Labs', '14', '2017-09-10', '2017-09-30', '15', 'sample lang', '200', '399', '199', 'directory/1.jpg'),
(72, 'Hairstyling Fiber Wax', 'Perfect for that high-impact hold without the shine.   ', 'Bruno''s Labs', '11', '2017-09-10', '2017-09-30', '12', 'sample lang', '400', '200', '200', 'directory/3.jpg'),
(73, 'Hairstyling Fiber Wax shiny', 'Keeps your hair in check with a strong hold and sleek shine.  ', 'Bruno''s Labs', '21', '2017-09-10', '2017-09-28', '22', 'sample lang', '200', '400', '200', 'directory/4.jpg'),
(75, 'Hairstyling Fiber Foaless Shaving cream', 'Razor burn issues? try our Foamless Shaving Cream for superior razor glide and a closer, more comfortable shave. ', 'Bruno''s Labs', '19', '2017-09-12', '2017-09-30', '22', 'sample lang', '800', '670', '130', 'directory/6.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_refno`
--

CREATE TABLE IF NOT EXISTS `tbl_refno` (
`ref_id` int(12) NOT NULL,
  `guest_name` varchar(60) NOT NULL,
  `guest_id` varchar(60) NOT NULL,
  `contact_no` varchar(60) NOT NULL,
  `email` varchar(60) NOT NULL,
  `address` varchar(60) NOT NULL,
  `prod_name` varchar(60) NOT NULL,
  `type` varchar(300) NOT NULL,
  `payment` varchar(60) NOT NULL,
  `transaction_no` varchar(60) NOT NULL,
  `refno` varchar(60) NOT NULL,
  `new` varchar(60) NOT NULL,
  `status` varchar(60) NOT NULL,
  `imagess` varchar(300) NOT NULL,
  `deposit` varchar(60) NOT NULL,
  `confirmation` varchar(60) NOT NULL,
  `balance` varchar(60) NOT NULL,
  `prod_id` varchar(60) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_refno`
--

INSERT INTO `tbl_refno` (`ref_id`, `guest_name`, `guest_id`, `contact_no`, `email`, `address`, `prod_name`, `type`, `payment`, `transaction_no`, `refno`, `new`, `status`, `imagess`, `deposit`, `confirmation`, `balance`, `prod_id`) VALUES
(1, 'Sansan  Sansan', '41', '+639098565534', 'sansan@yahoo.com', 'Sansan', 'Hairstyling Fiber Shiny', 'Western Union', '', '0.5', '3434234304340340', '2017-09-14', 'pending', '8.jpg', '0', 'otpx7bjw', '', '72'),
(2, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', 'Hairstyling Fiber Shiny', 'Western Union', '', '1.1', 'cdsfsd', '2017-09-23', 'pending', '2.jpg', '0', 'xrvrefsn', '', '75'),
(3, 'jade  solano', '42', '+639263614731', 'jade@yahoo.com', 'Quezon city', '', 'Cebuana Lhuillier', '', '', 'dsasas', '2017-09-27', 'pending', '16649430_1598718836819824_4007634727106215026_n.jpg', '0', '', '', ''),
(4, 'jade  solano', '42', '+639263614731', 'jade@yahoo.com', 'Quezon city', 'Hairstyling Fiber Shiny', 'Cebuana Lhuillier', '', '1.6', 'dasdsaasdas', '2017-09-27', 'pending', '19051547_1344029459050464_4198906860616548352_n.jpg', '0', '5xpuyqtu', '', '71'),
(5, 'jade  solano', '42', '+639263614731', 'jade@yahoo.com', 'Quezon city', '', 'Cebuana Lhuillier', '', '', 'dsaadasdas', '2017-09-27', 'pending', 'feedback.jpg', '0', '', '', ''),
(6, 'jade  solano', '42', '+639263614731', 'jade@yahoo.com', 'Quezon city', '', 'Smart Padala', '', '', 'dsfd', '2017-09-27', 'pending', '8.jpg', '0', '', '', ''),
(7, 'jade  solano', '42', '+639263614731', 'jade@yahoo.com', 'Quezon city', '', 'Smart Padala', '', '', 'sasdasdsad', '2017-09-27', 'pending', '15109363_1689907191338600_6018907104154096514_n.jpg', '0', '', '', ''),
(8, 'jade  solano', '42', '+639263614731', 'jade@yahoo.com', 'Quezon city', '', 'Smart Padala', '', '', '4567', '2017-09-28', 'pending', '9.jpg', '0', '', '', ''),
(9, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '', 'Cebuana Lhuillier', '', '', '4545', '2017-10-03', 'pending', 'one-piece-wallpaper-after-2-years-free-download.jpg', '0', '', '', ''),
(10, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '', 'Smart Padala', '', '', '3234323', '2017-10-03', 'pending', 'Naruto-Anime-Wallpaper-HD.jpg', '0', '', '', ''),
(11, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '<br />\r\n<b>Notice</b>:  Undefined index: prod_name in <b>C:x', 'Smart Padala', '', '<br />\r\n<b>Notice</b>:  Undefined index: transaction_id in <', '3456789', '2017-10-03', 'pending', 'one-piece-wallpaper-after-2-years-free-download.jpg', '0', '<br />\r\n<b>Notice</b>:  Undefined index: confirmation in <b>', '', '<br />\r\n<b>Notice</b>:  Undefined index: prod_id in <b>C:xam'),
(12, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '<br />\r\n<b>Notice</b>:  Undefined index: prod_name in <b>C:x', 'Cebuana Lhuillier', '', '<br />\r\n<b>Notice</b>:  Undefined index: transaction_id in <', '2345678', '2017-10-03', 'pending', 'Naruto-Anime-Wallpaper-HD.jpg', '0', '<br />\r\n<b>Notice</b>:  Undefined index: confirmation in <b>', '', '<br />\r\n<b>Notice</b>:  Undefined index: prod_id in <b>C:xam'),
(13, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '<br />\r\n<b>Notice</b>:  Undefined index: prod_name in <b>C:x', 'Cebuana Lhuillier', '', '<br />\r\n<b>Notice</b>:  Undefined index: transaction_id in <', '2345678', '2017-10-03', 'pending', 'Naruto-Anime-Wallpaper-HD.jpg', '0', '<br />\r\n<b>Notice</b>:  Undefined index: confirmation in <b>', '', '<br />\r\n<b>Notice</b>:  Undefined index: prod_id in <b>C:xam'),
(14, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '<br />\r\n<b>Notice</b>:  Undefined index: prod_name in <b>C:x', 'Cebuana Lhuillier', '', '<br />\r\n<b>Notice</b>:  Undefined index: transaction_id in <', '2345678', '2017-10-03', 'pending', 'Naruto-Anime-Wallpaper-HD.jpg', '0', '<br />\r\n<b>Notice</b>:  Undefined index: confirmation in <b>', '', '<br />\r\n<b>Notice</b>:  Undefined index: prod_id in <b>C:xam'),
(15, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '<br />\r\n<b>Notice</b>:  Undefined index: prod_name in <b>C:x', 'Cebuana Lhuillier', '', '<br />\r\n<b>Notice</b>:  Undefined index: transaction_id in <', '2345678', '2017-10-03', 'pending', 'Naruto-Anime-Wallpaper-HD.jpg', '0', '<br />\r\n<b>Notice</b>:  Undefined index: confirmation in <b>', '', '<br />\r\n<b>Notice</b>:  Undefined index: prod_id in <b>C:xam'),
(16, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '', 'Cebuana Lhuillier', '', '', '2345678', '2017-10-03', 'pending', 'Naruto-Anime-Wallpaper-HD.jpg', '0', '', '', ''),
(17, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '<br />\r\n<b>Notice</b>:  Undefined index: prod_name in <b>C:x', 'BPI Family Bank', '', '<br />\r\n<b>Notice</b>:  Undefined index: transaction_id in <', '', '2017-10-03', 'pending', 'Naruto-Anime-Wallpaper-HD.jpg', '0', '<br />\r\n<b>Notice</b>:  Undefined index: confirmation in <b>', '', '<br />\r\n<b>Notice</b>:  Undefined index: prod_id in <b>C:xam'),
(18, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', 'Hairstyling Fiber Shiny', 'Smart Padala', '', '0.7', '456', '2017-10-03', 'pending', 'Naruto-Anime-Wallpaper-HD.jpg', '0', 'jasgnuq7', '', '71'),
(19, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', 'Hairstyling Fiber Shiny', 'Smart Padala', '', '0.7', '345676', '2017-10-03', 'pending', 'validation/Naruto-Anime-Wallpaper-HD.jpg', '0', 'jasgnuq7', '', '71'),
(20, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', 'Hairstyling Fiber Shiny', 'Smart Padala', '', '2.1', '234567', '2017-10-03', 'pending', 'validation/', '0', 'ra5f86og', '', '71'),
(21, 'Sansan  Sansan', '41', '+639263614731', 'sansan@yahoo.com', 'Sansan', '', 'Cebuana Lhuillier', '', '', '2345680', '2017-10-03', 'pending', 'validation/', '0', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request`
--

CREATE TABLE IF NOT EXISTS `tbl_request` (
`request_id` int(12) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `now` varchar(100) NOT NULL,
  `statuss` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_request`
--

INSERT INTO `tbl_request` (`request_id`, `lname`, `fname`, `user_id`, `image`, `now`, `statuss`) VALUES
(43, 'user ', 'user ', '13 ', 'request/nNbbQmq (1).png', '2017-02-17', 'pending'),
(44, 'Santiago ', 'Ma. Cristina ', '35 ', 'request/11224685_480132275498188_3368267709489240147_n.jpg', '2017-03-03', 'pending'),
(45, 'user ', 'user ', '13 ', 'request/Naruto-Anime-Wallpaper-HD.jpg', '2017-03-27', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_service`
--

CREATE TABLE IF NOT EXISTS `tbl_service` (
`service_id` int(12) NOT NULL,
  `service_name` varchar(300) NOT NULL,
  `price` varchar(100) NOT NULL,
  `shipping_fee` varchar(100) NOT NULL,
  `barbers` varchar(300) NOT NULL,
  `service_date` varchar(300) NOT NULL,
  `start_time` varchar(300) NOT NULL,
  `end_time` varchar(300) NOT NULL,
  `user_name` varchar(300) NOT NULL,
  `datereserved` varchar(300) NOT NULL,
  `user_id` varchar(120) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_service`
--

INSERT INTO `tbl_service` (`service_id`, `service_name`, `price`, `shipping_fee`, `barbers`, `service_date`, `start_time`, `end_time`, `user_name`, `datereserved`, `user_id`, `status`) VALUES
(36, 'Deep Cleansing Facial', '3780', '0', '3 ', '2017-09-21', '12:45pm - 01:30pm', '', 'SansanSansan', '2017-09-15', '41', 'cancel'),
(38, 'Hand Massage 15 mins', '1300', '0', '3 ', '2017-09-27', '12:45pm - 01:30pm', '', 'SansanSansan', '2017-09-15', '41', 'cancel'),
(39, 'Foot Massage 15 mins', '1300', '0', '3 ', '2017-09-23', '11:45am - 12:30am', '', 'SansanSansan', '2017-09-18', '41', 'pending'),
(40, '--Select Services--', '', '250', '3 ', '2017-09-29', '03:15pm - 04:00pm', '', 'Sansan Sansan', '2017-09-21', '41', 'pending'),
(41, 'Shampoo', '', '250', '3 ', '2017-09-30', '02:30pm - 03:15pm', '', 'Sansan Sansan', '2017-09-21', '41', 'pending'),
(42, 'Hair Art', '', '250', '6 ', '2017-09-27', '01:45pm - 02:30pm', '11:45am - 12:30am', 'Sansan Sansan', '2017-09-21', '41', 'reschedule'),
(43, 'Hand Massage 15 mins', '', '250', '3 ', '2017-09-30', '--Select Time--', '', 'Sansan Sansan', '2017-09-23', '41', 'pending'),
(44, 'Hair Art', '', '250', '2 ', '2017-09-27', '12:15pm - 01:00pm', '', 'Sansan Sansan', '2017-09-23', '41', 'pending'),
(45, 'Blow Dry', '', '250', '3 ', '2017-09-30', '12:45pm - 01:30pm', '', 'Sansan Sansan', '2017-09-27', '41', 'pending'),
(46, 'Shampoo', '', '250', '3 ', '2017-10-04', '01:45pm - 02:30pm', '', 'jade solano', '2017-09-27', '42', 'cancel'),
(47, 'First Haircut Certificate', '', '250', '1 ', '2017-10-04', '01:00pm - 01:45pm', '', 'jade solano', '2017-09-27', '42', 'pending'),
(48, '6', '2680', '0', '3 ', '2017-10-10', '02:45pm - 03:30pm', '', 'jadesolano', '2017-09-27', '42', 'pending'),
(49, 'First Haircut Certificate', '1120', '0', '3 ', '2017-10-20', '12:15pm - 01:00pm', '', 'jadesolano', '2017-09-27', '42', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_serviceproduct`
--

CREATE TABLE IF NOT EXISTS `tbl_serviceproduct` (
`serviceproduct_id` int(12) NOT NULL,
  `valuename` varchar(300) NOT NULL,
  `price` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_serviceproduct`
--

INSERT INTO `tbl_serviceproduct` (`serviceproduct_id`, `valuename`, `price`) VALUES
(1, 'Mens Cut', '350'),
(2, 'Mens Cut with Shampoo and Blow Dry', '500'),
(3, 'Head Shave', '899'),
(4, 'Hair Art', '1085'),
(5, 'First Haircut Certificate', '1120'),
(6, 'Hypoallergenic Facial', '2680'),
(7, 'Deep Cleansing Facial', '3780'),
(8, 'Shampoo', '2700'),
(9, 'Blow Dry', '1260'),
(10, 'Iron', '1260'),
(11, 'Hair Relaxing', '1260'),
(12, 'Brazilian Blow Out', '1540'),
(13, 'Body Massage 30 mins', '1540'),
(14, 'Scalp Massage 15 mins', '1330'),
(15, 'Back Massage 15 mins', '1085'),
(16, 'Hand Massage 15 mins', '1300'),
(17, 'Foot Massage 15 mins', '1300');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
`user_id` int(12) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `mname` varchar(100) NOT NULL,
  `address` varchar(200) NOT NULL,
  `zipcode` varchar(300) NOT NULL,
  `gender` varchar(300) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(60) NOT NULL,
  `image` varchar(300) NOT NULL,
  `activation` varchar(300) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `lname`, `fname`, `mname`, `address`, `zipcode`, `gender`, `contact_no`, `email`, `password`, `image`, `activation`) VALUES
(41, 'Sansan', 'Sansan', '', 'Sansan', '', 'Male', '+639263614731', 'sansan@yahoo.com', 'sansan', 'sample', 'YES'),
(42, 'solano', 'jade', 'jade', 'Quezon city', '1243', 'Male', '+639263614731', 'jade@yahoo.com', 'Jade13sandy', 'sample', 'YES'),
(43, 'Corpuz', 'Jade', 'Solano', 'Quezon city', '1233', 'Female', '+639263614731', 'jade@yahoo.com', 'Sandy13jade', 'sample', 'YES');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
 ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `collection`
--
ALTER TABLE `collection`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `purchases_item`
--
ALTER TABLE `purchases_item`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`reservation_id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
 ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `supliers`
--
ALTER TABLE `supliers`
 ADD PRIMARY KEY (`suplier_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
 ADD PRIMARY KEY (`attendance_id`);

--
-- Indexes for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
 ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
 ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `tbl_featuredproduct`
--
ALTER TABLE `tbl_featuredproduct`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
 ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `tbl_gc`
--
ALTER TABLE `tbl_gc`
 ADD PRIMARY KEY (`gc_id`);

--
-- Indexes for table `tbl_newproduct`
--
ALTER TABLE `tbl_newproduct`
 ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
 ADD UNIQUE KEY `ID` (`ID`);

--
-- Indexes for table `tbl_refno`
--
ALTER TABLE `tbl_refno`
 ADD PRIMARY KEY (`ref_id`);

--
-- Indexes for table `tbl_request`
--
ALTER TABLE `tbl_request`
 ADD PRIMARY KEY (`request_id`);

--
-- Indexes for table `tbl_service`
--
ALTER TABLE `tbl_service`
 ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `tbl_serviceproduct`
--
ALTER TABLE `tbl_serviceproduct`
 ADD PRIMARY KEY (`serviceproduct_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
 ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
MODIFY `id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `audittrail`
--
ALTER TABLE `audittrail`
MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=82;
--
-- AUTO_INCREMENT for table `collection`
--
ALTER TABLE `collection`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `purchases_item`
--
ALTER TABLE `purchases_item`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `reservation_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=85;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=177;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=372;
--
-- AUTO_INCREMENT for table `supliers`
--
ALTER TABLE `supliers`
MODIFY `suplier_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_attendance`
--
ALTER TABLE `tbl_attendance`
MODIFY `attendance_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `tbl_contact`
--
ALTER TABLE `tbl_contact`
MODIFY `contact_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
MODIFY `employee_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_featuredproduct`
--
ALTER TABLE `tbl_featuredproduct`
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
MODIFY `feedback_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_gc`
--
ALTER TABLE `tbl_gc`
MODIFY `gc_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_newproduct`
--
ALTER TABLE `tbl_newproduct`
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
MODIFY `ID` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `tbl_refno`
--
ALTER TABLE `tbl_refno`
MODIFY `ref_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `tbl_request`
--
ALTER TABLE `tbl_request`
MODIFY `request_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `tbl_service`
--
ALTER TABLE `tbl_service`
MODIFY `service_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `tbl_serviceproduct`
--
ALTER TABLE `tbl_serviceproduct`
MODIFY `serviceproduct_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
