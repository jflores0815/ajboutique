-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 10, 2018 at 01:53 PM
-- Server version: 10.2.17-MariaDB
-- PHP Version: 7.1.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u435243053_aj`
--


-- --------------------------------------------------------

--
-- Table structure for table `addcart`
--

CREATE TABLE `addcart` (
  `idd` int(12) NOT NULL,
  `user_id` varchar(100) NOT NULL,
  `prod_id` varchar(10) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` int(11) NOT NULL,
  `weight` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `addcart`
--

INSERT INTO `addcart` (`idd`, `user_id`, `prod_id`, `price`, `qty`, `weight`) VALUES
(121, '85', '93', '250.00', 3, '127.00');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `username`, `password`) VALUES
(1, 'Airha Jade Dela Cruz', 'ayajade@gmail.com', 'admin', '1');

-- --------------------------------------------------------

--
-- Table structure for table `audittrail`
--

CREATE TABLE `audittrail` (
  `user_id` int(12) NOT NULL,
  `audit_user` varchar(200) NOT NULL,
  `audit_action` varchar(200) NOT NULL,
  `audit_page` varchar(200) NOT NULL,
  `a_date` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audittrail`
--

INSERT INTO `audittrail` (`user_id`, `audit_user`, `audit_action`, `audit_page`, `a_date`) VALUES
(98, 'Admin  Admin', 'Add User', 'User', '2018/01/04 12:35:45'),
(122, 'Admin  Admin', 'Add User', 'User', '2018/02/03 18:42:57'),
(126, 'Admin  Admin', 'Add User', 'User', '2018/06/12 12:02:00'),
(127, 'Admin  Admin', 'Add User', 'User', '2018/06/12 12:04:55'),
(128, 'Admin  Admin', 'Add User', 'User', '2018/08/07 16:35:36'),
(129, '', 'Add Product', 'Product Product', '2018/08/07 21:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `name`, `description`) VALUES
(1, 'Dietary Supplement', 'Dietary Supplement'),
(2, 'Cetaphil Products', 'Cetaphil Products'),
(3, 'Perfume for Men', 'For Men Only'),
(4, 'Perfume for Women', 'For Women Only');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `nickname` varchar(40) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` varchar(140) NOT NULL,
  `region` varchar(40) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `birthday` date NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `address2` varchar(140) NOT NULL,
  `account_status` int(11) NOT NULL,
  `verification_code` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `last_name`, `first_name`, `nickname`, `username`, `password`, `email`, `address`, `region`, `contact_number`, `birthday`, `status`, `created_at`, `address2`, `account_status`, `verification_code`) VALUES
(37, 'jayvee', 'samonte', '', 'client', '1', 'jayveegsamonte@gmail.com', 'test', 'Metro Manila', '12345678901', '0000-00-00', 0, '2018-04-27 02:37:52', '', 1, '9372db81b5911467fd9813b0e44d0986'),
(39, 'faith', 'faith', '', 'faith', 'Faith_30', 'faith@yahoo.com', 'Quezon City', 'Metro Manila', '09897657575', '0000-00-00', 0, '2018-08-09 09:27:07', '', 1, '2b1b2b42ee41ee115e66ab59ed0ad829'),
(40, 'Rain', 'Rain', '', 'Usopp', 'Usopp_2018', 'usopp.martin@gmail.com', '', '', '09235467893', '0000-00-00', 0, '2018-09-19 01:52:59', '', 1, 'd92c0b5f79bdd799e46a13b2af30dc62'),
(41, 'sandy', 'sandy', '', 'sandy', 'Sandy_001', 'sandycorpuz.dev@gmail.com', '', '', '09345495435', '0000-00-00', 0, '2018-09-19 02:45:34', '', 1, 'a66f99c50df91ca6fcccd470e75bb6c0'),
(43, 'Rodaje', 'Paula', '', 'paula', 'Password123!', 'mrandmrsrodaje468@gmail.com', '244 kaingin 2, Pansol Balara Quezon City', 'Outside Metro Manila', '09163945076', '0000-00-00', 0, '2018-11-02 15:15:00', '', 1, '09c54cefc247f0cc8e0406bb09817039'),
(46, 'Jhin', 'Kada', '', 'kada.jhin', 'Guren@11', 'kada.jhin@yahoo.com', '33 B Mapagbigay st pinyahan qc', 'Metro Manila', '09275446576', '0000-00-00', 0, '2018-09-26 04:46:44', '', 1, '7ad8bd4588c4ad86687dc14ca27b725e'),
(47, 'Jade', 'Jade', '', 'jandy', 'Jandy_2018', 'jandy.corpuz@gmail.com', '', '', '09897657575', '0000-00-00', 0, '2018-09-25 09:25:06', '', 2, '6375299d358a98add18ee4766dd7a7d4'),
(48, 'samplelastanme', 'samplefirstname', '', 'sampleusername', 'Sample_2018', 'sandy30.corpuz@gmail.com', 'asda', 'Outside Metro Manila', '09897657575', '0000-00-00', 0, '2018-09-26 00:06:52', '', 1, 'ac28f18673f55a3603adda711d406dd0'),
(50, 'Mateo', 'Allen', '', 'Allen_Mateo', 'Password200', 'lordofcalamity27@gmail.com', 'San mateo', 'Outside Metro Manila', '09123456789', '0000-00-00', 0, '2018-10-16 08:27:29', '', 1, '25fbf5744218c087ca221d12f8198f1d'),
(62, 'Contreras', 'Mc', '', 'contreras088', 'Contreras08', 'stammermenard@yahoo.com', '', '', '09389849056', '0000-00-00', 0, '2018-10-25 12:25:33', '', 2, '9f9ef5e8ade9e928ac6f88c2383f8096'),
(66, 'Contreras', 'Lorna', '', 'lorna088', 'Lorna08', 'mcbryantxontreras08@gmail.com', '', '', '09109539669', '0000-00-00', 0, '2018-10-25 13:02:42', '', 2, 'f94cd8758fff2b7dd5ed66d7ec51f501'),
(67, 'Delfino', 'Miryan', '', 'yhanie088', 'Yhanie08', 'miryanjhane.delfino@yahoo.com', '', '', '09398603196', '0000-00-00', 0, '2018-10-25 13:32:15', '', 2, 'c3359f0047e4581caf518b69cf05569e'),
(78, 'Caleum', 'Noctis', '', 'asd123', 'Guren@11', 'satellizer11@gmail.com', 'Quezon Cit', 'Metro Manila', '09758998647', '0000-00-00', 0, '2018-11-05 06:22:38', '', 1, 'a88655a360b9fd277d0f548176fb3e90'),
(79, 'Sanchez', 'Anjelle', '', 'pimpongchi29', 'Chunchun21', 'rejicasamchii@gmail.com', '', '', '09676422816', '0000-00-00', 0, '2018-11-04 14:35:14', '', 2, '7f88c36609beb28a7e2713022c14496b'),
(80, 'Kaslana', 'Kiana', '', 'k.kaslana', 'Password123', 'samplesonly1@yahoo.com', '', '', '09123456789', '0000-00-00', 0, '2018-11-04 14:38:54', '', 2, '3a3fdd8b52b288a01bd5e50c89aaf8d8'),
(85, 'Cayabyab', 'Tjay', '', 'TjayGerald', 'Password123', 'gerald.cayabyab@gmail.com', 'Quezon city', 'Metro Manila', '09178142406', '0000-00-00', 0, '2018-11-05 10:09:33', '', 1, '0482081c66da47605d7c58c84de6792a'),
(90, 'Labrias', 'Mj', '', 'Mjlabrias', 'Abnoy123', 'mjlabrias0219@gmail.com', '', '', '09161605651', '0000-00-00', 0, '2018-11-07 13:34:44', '', 2, '46633cdd5b43305ebd92f198be212896'),
(91, 'Cruz', 'Aj', '', 'Airhadc', 'Airhadc1', 'airhadc@gmail.com', '', '', '09161605651', '0000-00-00', 0, '2018-11-07 13:41:57', '', 2, '0f21ef3dfcde163f23403551e3a6eedb'),
(92, 'Cruz', 'Mj', '', 'airhajade', 'Password1', 'airhajade@icloud.com', 'Dasma', 'Outside Metro Manila', '09773140348', '0000-00-00', 0, '2018-11-07 13:50:57', '', 1, '4acb27f2d24742585482adbfa939a40d');

-- --------------------------------------------------------

--
-- Table structure for table `ip`
--

CREATE TABLE `ip` (
  `address` char(16) CHARACTER SET utf16 COLLATE utf16_bin NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `client_id` varchar(40) NOT NULL,
  `message` varchar(255) NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp(),
  `receiver` varchar(255) NOT NULL,
  `sender` varchar(255) NOT NULL,
  `sendto_id` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `client_id`, `message`, `time`, `receiver`, `sender`, `sendto_id`) VALUES
(45, '39', 'Hi. Goodevening!', '2018-08-09 09:26:34', 'faith', 'faith', '0'),
(44, '38', 'dsfdsf', '2018-08-09 09:07:34', 'sansan', 'sansan', '0'),
(43, '0', 'dasdasdsadsad', '2018-08-09 07:38:07', 'sansan', 'ayadlc', ''),
(42, '0', 'fhfghfg', '2018-08-09 07:29:02', 'sansan', 'ayadlc', ''),
(41, '0', 'sadasd', '2018-08-09 05:33:37', 'sansan', 'ayadlc', ''),
(40, '0', 'qwerty', '2018-08-09 05:14:37', 'sansan', 'ayadlc', ''),
(39, '0', 'qwerty', '2018-08-09 05:06:52', 'sansan', 'ayadlc', ''),
(38, '0', 'qwerty', '2018-08-09 05:06:39', 'sansan', 'ayadlc', ''),
(37, '0', 'asdsadads', '2018-08-09 05:03:46', 'sansan', 'ayadlc', ''),
(36, '0', 'hihihih', '2018-08-09 05:03:10', 'sansan', 'ayadlc', ''),
(35, '0', 'hihihih', '2018-08-09 05:03:05', 'sansan', 'ayadlc', ''),
(34, '0', 'hihihih', '2018-08-09 05:02:34', 'sansan', 'ayadlc', ''),
(33, '38', 'dfsd', '2018-08-09 03:47:34', 'sansan', 'sansan', '0'),
(32, '38', 'dasd', '2018-08-09 03:45:17', 'sansan', 'sansan', '0'),
(31, '38', 'fsdfsd', '2018-08-09 03:41:00', 'sansan', 'sansan', '0'),
(30, '0', 'Hi', '2018-08-09 02:02:17', 'sansan', 'ayadlc', ''),
(29, '38', 'hello', '2018-08-09 02:02:01', 'sansan', 'sansan', '0'),
(28, '0', 'hi', '2018-08-09 02:01:12', 'client', 'ayadlc', ''),
(27, '0', 'Yes sir?', '2018-08-09 01:59:36', 'sansan', 'ayadlc', ''),
(26, '38', 'hi sir', '2018-08-09 01:57:28', 'sansan', 'sansan', '0'),
(46, '48', 'hi', '2018-09-25 09:59:24', 'samplelastanme', 'samplelastanme', '0'),
(47, '46', 'asd\r\naasd\r\n', '2018-09-25 11:01:16', 'Jhin', 'Jhin', '0'),
(48, '0', 'dasdsa', '2018-09-25 11:02:10', 'kada.jhin', 'ayadlc', ''),
(49, '46', 'dada', '2018-09-25 11:02:21', 'Jhin', 'Jhin', '0'),
(50, '46', 'rjrj', '2018-09-25 15:31:50', 'Jhin', 'Jhin', '0'),
(51, '48', 'hi', '2018-09-26 00:06:59', 'samplelastanme', 'samplelastanme', '0'),
(52, '48', 'hi admin\r\n', '2018-09-26 00:10:57', '48', '48', '0'),
(53, '0', 'hi ', '2018-09-26 00:11:33', 'sampleusername', 'ayadlc', ''),
(54, '48', 'yes?\r\n', '2018-09-26 00:35:35', 'samplelastanme', 'samplelastanme', '0'),
(55, '0', 'hello', '2018-09-26 00:37:09', 'sampleusername', 'ayadlc', ''),
(56, '0', 'hi', '2018-09-26 00:43:23', 'sampleusername', 'ayadlc', ''),
(57, '0', 'yes?', '2018-09-26 00:46:27', 'sampleusername', 'ayadlc', ''),
(58, '0', 'hi din', '2018-09-26 01:04:07', 'samplelastanme', 'ayadlc', ''),
(59, '48', 'bakit po', '2018-09-26 01:04:29', 'samplelastanme', 'samplelastanme', '0'),
(60, '0', 'okay na', '2018-09-26 01:05:00', 'Jhin', 'ayadlc', ''),
(61, '46', 'asdas', '2018-09-26 04:45:35', 'Jhin', 'Jhin', '0'),
(62, '46', 'asdasd', '2018-09-26 04:45:40', 'Jhin', 'Jhin', '0'),
(63, '49', 'hello po madam', '2018-09-27 14:22:16', 'ramos', 'ramos', '0'),
(64, '0', 'asd', '2018-09-27 14:36:13', 'Jhin', 'ayadlc', ''),
(65, '46', 'asd', '2018-09-27 14:37:54', 'Jhin', 'Jhin', '0'),
(66, '46', 'das', '2018-09-27 14:38:09', 'Jhin', 'Jhin', '0'),
(67, '49', 'test', '2018-09-27 14:40:53', 'ramos', 'ramos', '0'),
(68, '46', 'asd', '2018-10-24 09:01:48', 'Jhin', 'Jhin', '0'),
(69, '43', 'Hi', '2018-11-02 15:14:44', 'Rodaje', 'Rodaje', '0'),
(70, '77', 'hi admin', '2018-11-05 05:34:40', 'Dela', 'Dela', '0'),
(71, '77', 'May concern po ako', '2018-11-05 05:35:37', 'Dela', 'Dela', '0'),
(72, '0', 'hi', '2018-11-05 05:37:05', 'Corn', 'ayadlc', ''),
(73, '0', 'hi', '2018-11-05 05:37:29', 'Corn', 'ayadlc', ''),
(74, '46', 'dasdsa', '2018-11-05 05:38:20', 'Jhin', 'Jhin', '0'),
(75, '0', 'fsdfds', '2018-11-05 05:39:03', 'Jhin', 'ayadlc', ''),
(76, '0', 'eqweq', '2018-11-05 05:39:33', 'sandy', 'ayadlc', ''),
(77, '0', 'hi', '2018-11-05 05:40:02', 'Corn', 'ayadlc', ''),
(78, '0', 'dasdas', '2018-11-05 05:44:24', 'jayvee', 'ayadlc', ''),
(79, '0', 'dsfs', '2018-11-05 05:45:00', 'sandy', 'ayadlc', ''),
(80, '78', 'dad', '2018-11-05 05:50:36', 'Caleum', 'Caleum', '0'),
(81, '0', 'asd', '2018-11-05 05:51:02', 'Caleum', 'ayadlc', ''),
(82, '0', 'may concern po me', '2018-11-05 05:52:34', 'Caleum', 'ayadlc', ''),
(83, '0', 'dsa', '2018-11-05 05:55:33', 'Caleum', 'ayadlc', ''),
(84, '0', 'dsa', '2018-11-05 05:55:33', 'Caleum', 'ayadlc', ''),
(85, '0', 'hi', '2018-11-05 05:55:56', 'Corn', 'ayadlc', ''),
(86, '0', 'hi', '2018-11-05 05:56:18', 'Corn', 'ayadlc', ''),
(87, '77', 'Type a message...', '2018-11-05 05:56:47', 'Dela cruz', 'Dela cruz', '0'),
(88, '0', 'hi', '2018-11-05 05:56:48', 'contreras088', 'ayadlc', ''),
(89, '77', 'dasdasda', '2018-11-05 05:56:52', 'Dela cruz', 'Dela cruz', '0'),
(90, '0', 'dsadasd', '2018-11-05 05:57:18', 'Dela cruz', 'ayadlc', ''),
(91, '77', 'hi', '2018-11-05 05:58:13', 'Dela', 'Dela', '0'),
(92, '0', 'hi', '2018-11-05 05:58:59', 'Dela cruz', 'ayadlc', ''),
(93, '77', 'hello', '2018-11-05 05:59:53', 'Dela', 'Dela', '0'),
(94, '0', 'test', '2018-11-05 08:24:33', 'Corn', 'ayadlc', ''),
(95, '0', 'test', '2018-11-05 08:24:50', 'Dela cruz', 'ayadlc', ''),
(96, '92', 'hi', '2018-11-07 15:27:14', 'Cruz', 'Cruz', '0'),
(97, '0', 'hello', '2018-11-07 15:27:39', 'Cruz', 'ayadlc', '');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `transaction_no` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `client_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `order_date` datetime NOT NULL,
  `quantity` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `use_address` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `transaction_no`, `client_id`, `product_id`, `order_date`, `quantity`, `status`, `use_address`) VALUES
(29, '00029', 37, 94, '2018-04-18 19:20:47', 1, 0, ''),
(75, '00030', 38, 97, '2018-08-07 09:22:53', 3, 0, ''),
(76, '00030', 38, 94, '2018-08-07 09:22:53', 2, 0, ''),
(77, '00031', 38, 93, '2018-08-07 09:23:23', 2, 0, ''),
(78, '00032', 38, 97, '2018-08-07 09:23:48', 2, 0, ''),
(79, '00032', 38, 94, '2018-08-07 09:23:48', 2, 0, ''),
(80, '00032', 38, 93, '2018-08-07 09:23:48', 2, 0, ''),
(81, '00033', 38, 97, '2018-08-07 09:24:22', 2, 0, ''),
(82, '00033', 38, 94, '2018-08-07 09:24:22', 2, 0, ''),
(83, '00034', 38, 97, '2018-08-07 14:33:14', 1, 0, ''),
(84, '00035', 38, 97, '2018-08-07 15:59:04', 1, 0, ''),
(85, '00035', 38, 94, '2018-08-07 15:59:04', 1, 0, ''),
(86, '00036', 38, 97, '2018-08-09 10:43:48', 1, 0, ''),
(87, '00037', 39, 94, '2018-08-09 17:27:29', 2, 0, ''),
(88, '00037', 39, 97, '2018-08-09 17:27:29', 2, 0, ''),
(89, '00038', 38, 94, '2018-09-19 11:56:39', 2, 0, ''),
(90, '00039', 38, 97, '2018-09-19 12:41:19', 1, 0, ''),
(91, '00040', 38, 93, '2018-09-19 12:53:21', 10, 0, ''),
(92, '00040', 38, 94, '2018-09-19 12:53:21', 3, 0, ''),
(93, '00041', 38, 94, '2018-09-23 22:04:16', 2, 0, ''),
(94, '00042', 38, 97, '2018-09-23 22:12:56', 4, 0, ''),
(95, '00043', 48, 97, '2018-09-26 09:07:59', 2, 0, ''),
(96, '00044', 46, 92, '2018-09-26 12:45:56', 4, 0, ''),
(99, '00045', 43, 91, '2018-09-26 12:48:29', 10, 0, ''),
(100, '00046', 43, 97, '2018-09-26 12:57:28', 5, 0, ''),
(101, '00047', 43, 90, '2018-09-26 12:59:51', 1, 0, ''),
(102, '00048', 43, 90, '2018-09-26 13:00:08', 2, 0, ''),
(103, '00049', 46, 89, '2018-09-26 13:00:29', 1, 0, ''),
(104, '00050', 46, 97, '2018-09-26 17:21:32', 2, 0, ''),
(105, '00051', 46, 92, '2018-09-26 17:54:23', 1, 0, ''),
(106, '00052', 46, 90, '2018-09-26 19:32:19', 1, 0, ''),
(107, '00053', 46, 88, '2018-09-26 21:58:22', 1, 0, ''),
(108, '00054', 48, 92, '2018-09-27 20:24:54', 1, 0, ''),
(109, '00054', 48, 92, '2018-09-27 20:24:54', 1, 0, ''),
(110, '00055', 49, 97, '2018-09-27 22:15:35', 6, 0, ''),
(111, '00056', 46, 77, '2018-09-27 22:35:03', 1, 0, ''),
(112, '00057', 46, 97, '2018-09-27 22:43:18', 1, 0, ''),
(113, '00058', 49, 82, '2018-09-27 22:44:43', 10, 0, ''),
(114, '00059', 46, 90, '2018-09-27 22:46:52', 4, 0, ''),
(115, '00059', 46, 89, '2018-09-27 22:46:52', 8, 0, ''),
(116, '00060', 46, 87, '2018-09-27 22:47:36', 10, 0, ''),
(117, '00061', 48, 97, '2018-09-27 23:31:28', 1, 0, ''),
(118, '00062', 48, 97, '2018-09-27 23:34:12', 1, 0, ''),
(119, '00062', 48, 92, '2018-09-27 23:34:12', 4, 0, ''),
(120, '00063', 48, 97, '2018-10-02 12:38:04', 1, 0, ''),
(121, '00064', 60, 94, '2018-10-16 16:29:07', -10, 0, ''),
(122, '00065', 50, 91, '2018-10-16 16:43:34', 15, 0, ''),
(123, '00065', 50, 97, '2018-10-16 16:43:34', 1, 0, ''),
(124, '00066', 50, 79, '2018-10-16 22:02:56', 10, 0, ''),
(125, '00067', 50, 94, '2018-10-19 13:56:50', -2, 0, ''),
(126, '00068', 46, 94, '2018-10-19 21:52:13', 2, 0, ''),
(127, '00068', 46, 78, '2018-10-19 21:52:13', 1, 0, ''),
(128, '00069', 50, 94, '2018-10-23 12:20:48', 6, 0, ''),
(129, '00070', 46, 88, '2018-10-23 12:32:23', 3, 0, ''),
(130, '00071', 46, 94, '2018-10-23 19:38:42', 6, 0, ''),
(131, '00072', 46, 93, '2018-10-23 20:00:26', 2, 0, ''),
(132, '00073', 46, 90, '2018-10-23 20:09:42', 1, 0, ''),
(133, '00074', 46, 90, '2018-10-23 20:12:24', 1, 0, ''),
(134, '00075', 43, 89, '2018-11-02 23:23:12', 1, 0, ''),
(135, '00076', 43, 89, '2018-11-02 23:23:31', 1, 0, ''),
(136, '00077', 43, 81, '2018-11-02 23:26:31', 1, 0, ''),
(137, '00078', 46, 90, '2018-11-02 23:34:24', 1, 0, ''),
(138, '00079', 50, 94, '2018-11-03 09:46:52', 3, 0, ''),
(139, '00079', 50, 93, '2018-11-03 09:46:52', 4, 0, ''),
(140, '00080', 50, 93, '2018-11-04 19:10:45', 1, 0, ''),
(141, '00080', 50, 90, '2018-11-04 19:10:45', 1, 0, ''),
(142, '00081', 50, 88, '2018-11-04 19:21:31', 1, 0, ''),
(143, '00081', 50, 82, '2018-11-04 19:21:31', 1, 0, ''),
(144, '00082', 77, 90, '2018-11-04 22:38:43', 11, 0, ''),
(145, '00083', 46, 94, '2018-11-05 00:06:47', 1, 0, ''),
(146, '00084', 46, 94, '2018-11-05 11:17:16', 1, 0, ''),
(147, '00085', 77, 93, '2018-11-05 13:10:35', 1, 0, ''),
(148, '00086', 46, 94, '2018-11-05 13:12:19', 1, 0, ''),
(149, '00087', 77, 93, '2018-11-05 13:16:00', 1, 0, ''),
(150, '00088', 77, 77, '2018-11-05 16:29:28', 1, 0, ''),
(151, '00088', 77, 91, '2018-11-05 16:29:28', 1, 0, ''),
(152, '00089', 85, 91, '2018-11-05 18:10:34', 14, 0, ''),
(153, '00090', 85, 91, '2018-11-05 18:11:45', 2, 0, ''),
(154, '00091', 86, 99, '2018-11-05 19:02:39', 17, 0, ''),
(155, '00092', 46, 78, '2018-11-05 19:04:13', 1, 0, ''),
(156, '00093', 86, 94, '2018-11-05 19:11:15', 2, 0, ''),
(157, '00094', 86, 88, '2018-11-05 19:20:32', 3, 0, ''),
(158, '00095', 86, 93, '2018-11-05 19:22:21', 1, 0, ''),
(159, '00096', 46, 92, '2018-11-07 00:01:31', 3, 0, ''),
(160, '00097', 46, 90, '2018-11-07 00:29:34', 4, 0, ''),
(161, '00098', 50, 94, '2018-11-07 21:01:45', 1, 0, ''),
(162, '00099', 50, 93, '2018-11-07 21:11:49', 1, 0, ''),
(163, '000100', 50, 90, '2018-11-07 21:14:02', 1, 0, ''),
(164, '000100', 50, 90, '2018-11-07 21:15:32', 1, 0, ''),
(165, '000100', 50, 90, '2018-11-07 21:15:40', 1, 0, ''),
(166, '000100', 50, 90, '2018-11-07 21:16:41', 2, 0, ''),
(167, '000100', 46, 93, '2018-11-07 21:17:38', 2, 0, ''),
(168, '000100', 46, 93, '2018-11-07 21:17:48', 2, 0, ''),
(169, '000100', 46, 93, '2018-11-07 21:18:04', 3, 0, ''),
(170, '000100', 46, 93, '2018-11-07 21:19:27', 3, 0, ''),
(171, '000100', 46, 93, '2018-11-07 21:19:50', 3, 0, ''),
(172, '000100', 46, 93, '2018-11-07 21:20:00', 2, 0, ''),
(173, '000100', 46, 93, '2018-11-07 21:24:34', 2, 0, ''),
(174, '000101', 46, 93, '2018-11-07 21:32:37', 2, 0, ''),
(175, '000101', 46, 93, '2018-11-07 21:32:45', 2, 0, ''),
(176, '000100', 46, 93, '2018-11-07 21:33:03', 2, 0, ''),
(177, '000100', 46, 93, '2018-11-07 21:35:10', 2, 0, ''),
(178, '000100', 46, 94, '2018-11-07 21:35:28', 1, 0, ''),
(179, '000100', 50, 90, '2018-11-07 21:40:18', 2, 0, ''),
(180, '000100', 46, 94, '2018-11-07 21:40:30', 1, 0, ''),
(181, '000100', 46, 94, '2018-11-07 21:47:29', 1, 0, ''),
(182, '000100', 46, 94, '2018-11-07 21:48:45', 1, 0, ''),
(183, '000100', 46, 94, '2018-11-07 21:49:26', 1, 0, ''),
(184, '000100', 46, 93, '2018-11-07 21:50:20', 1, 0, ''),
(185, '000100', 92, 92, '2018-11-07 21:51:09', 1, 0, ''),
(186, '000100', 92, 87, '2018-11-07 21:56:52', 1, 0, ''),
(187, '000100', 46, 93, '2018-11-07 22:10:26', 2, 0, ''),
(188, '000100', 46, 93, '2018-11-07 22:18:58', 2, 0, ''),
(189, '000100', 92, 87, '2018-11-07 22:26:33', 1, 0, ''),
(190, '000100', 46, 92, '2018-11-07 22:27:19', 1, 0, ''),
(191, '000100', 46, 92, '2018-11-07 22:30:04', 1, 0, ''),
(192, '000100', 46, 92, '2018-11-07 22:30:08', 1, 0, ''),
(193, '000193', 46, 92, '2018-11-07 22:30:33', 1, 0, ''),
(194, '000194', 46, 93, '2018-11-07 22:30:54', 1, 0, ''),
(195, '000195', 46, 92, '2018-11-07 22:31:25', 1, 0, ''),
(196, '000196', 92, 87, '2018-11-07 22:31:54', 1, 0, ''),
(197, '000197', 92, 94, '2018-11-07 22:41:44', 1, 0, ''),
(198, '000198', 92, 93, '2018-11-07 22:59:51', 1, 0, ''),
(199, '000199', 92, 94, '2018-11-07 23:13:28', 1, 0, ''),
(200, '000200', 92, 82, '2018-11-07 23:29:27', 1, 0, ''),
(201, '000201', 92, 91, '2018-11-07 23:34:57', 1, 0, ''),
(202, '000202', 50, 90, '2018-11-07 23:39:51', 1, 0, ''),
(203, '000203', 46, 94, '2018-11-07 23:42:07', 1, 0, ''),
(204, '000204', 92, 90, '2018-11-07 23:42:53', 1, 0, ''),
(205, '000205', 46, 99, '2018-11-07 23:58:28', 1, 0, ''),
(206, '000206', 46, 94, '2018-11-07 23:59:29', 1, 0, ''),
(207, '000207', 46, 90, '2018-11-08 00:03:46', 1, 0, ''),
(208, '000208', 46, 93, '2018-11-08 00:07:02', 1, 0, ''),
(209, '000209', 46, 99, '2018-11-08 00:36:13', 9, 0, ''),
(210, '000210', 92, 91, '2018-11-08 07:40:49', 1, 0, ''),
(211, '000211', 92, 90, '2018-11-08 07:47:26', 1, 0, ''),
(212, '000212', 92, 87, '2018-11-08 07:48:35', 1, 0, ''),
(213, '000213', 92, 90, '2018-11-08 07:51:19', 1, 0, ''),
(214, '000214', 92, 89, '2018-11-08 07:53:04', 1, 0, ''),
(215, '000215', 92, 90, '2018-11-08 09:13:58', 1, 0, ''),
(216, '000216', 50, 90, '2018-11-08 20:02:26', 1, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `transaction_no` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime DEFAULT NULL,
  `amount` float(11,2) NOT NULL,
  `image` tinyblob NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `transaction_no`, `date`, `amount`, `image`, `status`) VALUES
(1, '0001', '2018-04-12 14:09:31', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f303030312e6a7067, 0),
(2, '00050', '2018-04-18 19:46:30', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303035302e6a7067, 0),
(3, '00049', '2018-04-18 19:46:57', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303034392e6a7067, 0),
(4, '00052', '2018-08-03 07:40:18', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303035322e6a7067, 0),
(5, '00030', '2018-08-07 09:00:56', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303033302e6a7067, 0),
(6, '00034', '2018-08-07 15:57:03', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303033342e6a7067, 0),
(7, '00035', '2018-08-07 16:00:28', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303033352e6a7067, 0),
(8, '00033', '2018-08-07 16:05:14', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303033332e6a7067, 0),
(9, '00032', '2018-08-07 16:08:28', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303033322e6a7067, 0),
(10, '00031', '2018-08-08 21:26:54', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303033312e6a7067, 0),
(11, '00036', '2018-08-09 10:48:24', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303033362e6a7067, 0),
(12, '00043', '2018-09-26 09:09:12', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303034332e6a7067, 0),
(13, '00048', '2018-09-26 13:09:19', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303034382e6a7067, 0),
(14, '00056', '2018-09-27 22:37:32', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303035362e6a7067, 0),
(15, '00057', '2018-09-27 22:43:50', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303035372e6a7067, 0),
(16, '00061', '2018-09-27 23:31:49', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303036312e6a7067, 0),
(17, '00059', '2018-09-27 23:45:33', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303035392e6a7067, 0),
(18, '00058', '2018-09-27 23:55:09', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303035382e6a7067, 0),
(19, '00064', '2018-10-16 16:30:34', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303036342e6a7067, 0),
(20, '00065', '2018-10-16 16:44:21', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303036352e6a7067, 0),
(21, '00066', '2018-10-16 22:04:53', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303036362e6a7067, 0),
(22, '00068', '2018-10-19 21:52:31', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303036382e6a7067, 0),
(23, '00069', '2018-10-23 12:21:50', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303036392e6a7067, 0),
(24, '00070', '2018-10-23 12:33:05', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303037302e6a7067, 0),
(25, '00071', '2018-10-23 19:39:27', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303037312e6a7067, 0),
(26, '00072', '2018-10-23 20:07:16', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303037322e6a7067, 0),
(27, '00073', '2018-10-23 20:10:16', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303037332e6a7067, 0),
(28, '00074', '2018-10-23 20:12:54', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303037342e6a7067, 0),
(29, '00078', '2018-11-02 23:35:06', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303037382e6a7067, 0),
(30, '00079', '2018-11-03 10:00:38', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303037392e6a7067, 0),
(31, '00082', '2018-11-04 22:39:56', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303038322e6a7067, 0),
(32, '00083', '2018-11-05 00:07:33', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303038332e6a7067, 0),
(33, '00084', '2018-11-05 11:22:28', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303038342e6a7067, 0),
(34, '00087', '2018-11-05 13:18:01', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303038372e6a7067, 0),
(35, '00090', '2018-11-05 18:12:42', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303039302e6a7067, 0),
(36, '00091', '2018-11-05 19:04:02', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303039312e6a7067, 0),
(37, '00093', '2018-11-05 19:13:58', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303039332e6a7067, 0),
(38, '00098', '2018-11-07 21:02:16', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f30303039382e6a7067, 0),
(39, '000100', '2018-11-07 21:14:24', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303130302e6a7067, 0),
(40, '000100', '2018-11-07 21:50:07', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303130302e6a7067, 0),
(41, '000196', '2018-11-07 22:32:22', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303139362e6a7067, 0),
(42, '000197', '2018-11-07 22:42:18', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303139372e6a7067, 0),
(43, '000197', '2018-11-07 22:42:29', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303139372e6a7067, 0),
(44, '000198', '2018-11-07 23:00:54', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303139382e6a7067, 0),
(45, '000199', '2018-11-07 23:13:56', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303139392e6a7067, 0),
(46, '000200', '2018-11-07 23:30:11', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230302e6a7067, 0),
(47, '000201', '2018-11-07 23:35:23', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230312e6a7067, 0),
(48, '000203', '2018-11-07 23:42:22', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230332e6a7067, 0),
(49, '000204', '2018-11-07 23:43:45', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230342e6a7067, 0),
(50, '000202', '2018-11-07 23:49:06', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230322e6a7067, 0),
(51, '000206', '2018-11-08 00:01:02', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230362e6a7067, 0),
(52, '000205', '2018-11-08 00:02:34', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230352e6a7067, 0),
(53, '000207', '2018-11-08 00:04:04', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230372e6a7067, 0),
(54, '000208', '2018-11-08 00:07:30', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303230382e6a7067, 0),
(55, '000210', '2018-11-08 07:41:21', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303231302e6a7067, 0),
(56, '000212', '2018-11-08 07:49:08', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303231322e6a7067, 0),
(57, '000214', '2018-11-08 07:53:25', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303231342e6a7067, 0),
(58, '000215', '2018-11-08 09:48:45', 0.00, 0x2e2e2f696d616765732f7061796d656e7450726f6f66732f3030303231352e6a7067, 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `code` varchar(150) DEFAULT NULL,
  `name` varchar(140) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `price` float(11,2) NOT NULL,
  `weight` float(11,2) NOT NULL,
  `image` text NOT NULL,
  `stock` int(11) DEFAULT 0,
  `qty_left` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `code`, `name`, `description`, `price`, `weight`, `image`, `stock`, `qty_left`) VALUES
(77, 1, 'ITEM0007', 'Adidas', 'Adidas Perfume for Men', 60.00, 50.00, '../images/ITEM000021.jpg', 238, '10'),
(78, 3, 'ITEM0008', 'D&G', 'Dolce & Gabbana Perfume for Men', 1999.00, 50.00, '../images/PR2.jpg', 13, '10'),
(79, 3, 'ITEM0009', 'Eternity', 'Eternity Perfume for Men', 1999.00, 50.00, '../images/PR3.jpg', 15, '10'),
(80, 3, 'ITEM00010', 'Guess', 'Guess Perfume for Men', 4999.00, 50.00, '../images/PR4.jpg', 10, '10'),
(81, 3, 'ITEM00011', 'Hugo', 'Hugo Boss Perfume for Men', 5999.00, 50.00, '../images/PR5.jpg', 9, '10'),
(82, 3, 'ITEM00012', 'Versace', 'Versace Perfume for Men', 1999.00, 50.00, '../images/PR6.jpg', 13, '10'),
(85, 4, 'ITEM0001', 'Adidas', 'Adidas Perfume for Women', 600.00, 50.00, '../images/ITEM0001.jpg', 81, '10'),
(86, 4, 'ITEM0002', 'Bvlgari', 'Bvlgari Perfume for Women', 1999.00, 50.00, '../images/ITEM0002.jpg', 10, '10'),
(87, 4, 'ITEM0003', 'Chanel', 'Chanel Perfume for Women', 1999.00, 50.00, '../images/ITEM0003.jpg', 11, '10'),
(88, 4, 'ITEM0004', 'Daisy', 'Daisy Perfume for Women', 1999.00, 50.00, '../images/ITEM0004.jpg', 20, '10'),
(89, 4, 'ITEM0005', 'Dior', 'Dior Perfume for Women', 1999.00, 50.00, '../images/ITEM0005.jpg', 13, '10'),
(90, 4, 'ITEM0006', 'Gucci', 'Gucci Perfume for Women', 1999.00, 50.00, '../images/ITEM0006.jpg', 8, '10'),
(91, 1, 'ITEM00014', 'Detoxi', 'Detoxi Slim® Fast Slimming Capsule helps reduce appetite and fat absorption, while blocking starch and sugar. ', 500.00, 50.00, '../images/detoxi.jpg', 98, '10'),
(92, 1, 'ITEM00013', 'Kirkland Calcium w/ D3', 'Kirkland Calcium w/ D3 is essential for strong bones and teeth. Vitamin D3 is needed to help the body absorb calcium.', 699.00, 99.00, '../images/ITEM00013.jpg', 9, '10'),
(93, 2, 'ITEM00015', 'Gentle Cleansing Bar', 'Specially designed for dry, sensitive skin; leaves skin feeling soft, smooth and hydrated', 250.00, 127.00, '../images/soap.jpg', 38, '10'),
(94, 2, 'ITEM00016', 'Moisturizing Cream', 'Clinically proven to provide immediate, long-lasting hydration that soothes dry, sensitive skin', 450.00, 455.00, '../images/cream.jpg', 96, '10'),
(99, 1, 'ITEM00018', 'MySlim', 'My Slim', 350.00, 0.50, '../images/ITEM00018.jpg', 29, '10');

-- --------------------------------------------------------

--
-- Table structure for table `reserved`
--

CREATE TABLE `reserved` (
  `id` int(11) NOT NULL,
  `transaction_no` varchar(40) COLLATE utf8_unicode_ci DEFAULT NULL,
  `reserved_date` datetime DEFAULT NULL,
  `client_id` int(11) DEFAULT NULL,
  `product_id` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` float(11,2) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `reserved`
--

INSERT INTO `reserved` (`id`, `transaction_no`, `reserved_date`, `client_id`, `product_id`, `quantity`, `total`, `status`) VALUES
(1, '37-ITEM00018-0', '2018-04-27 09:55:35', 37, 'ITEM00018', 2, NULL, 7),
(2, '-ITEM00018-1', '2018-09-24 20:01:14', 0, 'ITEM00018', 10, NULL, 7),
(3, '-ITEM00018-2', '2018-09-24 20:01:23', 0, 'ITEM00018', 10, NULL, 7),
(4, '-ITEM00016-3', '2018-09-25 18:01:08', 0, 'ITEM00016', 2, NULL, 7),
(5, '-ITEM00016-4', '2018-09-25 18:01:18', 0, 'ITEM00016', 2, NULL, 7),
(6, '-ITEM00016-5', '2018-09-25 18:01:24', 0, 'ITEM00016', 2, NULL, 7),
(7, '-ITEM00015-6', '2018-09-27 22:59:45', 0, 'ITEM00015', 3, NULL, 7),
(8, '-ITEM00015-7', '2018-09-27 23:00:02', 0, 'ITEM00015', 3, NULL, 7),
(9, '-ITEM00016-8', '2018-09-27 23:19:03', 0, 'ITEM00016', 1, NULL, 7),
(10, '-ITEM00016-9', '2018-09-27 23:19:13', 0, 'ITEM00016', 2, NULL, 7),
(11, '48-ITEM00016-10', '2018-09-27 23:28:51', 48, 'ITEM00016', 3, NULL, 7),
(12, '43-ITEM00014-11', '2018-11-02 23:25:09', 43, 'ITEM00014', 1, NULL, 7),
(13, '43-ITEM00014-12', '2018-11-02 23:25:55', 43, 'ITEM00014', 11, NULL, 7),
(14, '43-ITEM0009-13', '2018-11-02 23:36:54', 43, 'ITEM0009', 12, NULL, 7),
(15, '77-ITEM00014-14', '2018-11-05 13:29:18', 77, 'ITEM00014', 2, NULL, 7),
(16, '92-ITEM00014-15', '2018-11-07 23:33:48', 92, 'ITEM00014', 1, NULL, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(12) NOT NULL,
  `lname` varchar(60) NOT NULL,
  `fname` varchar(60) NOT NULL,
  `position` varchar(60) NOT NULL,
  `username` varchar(60) NOT NULL,
  `pass` varchar(60) NOT NULL,
  `image` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `lname`, `fname`, `position`, `username`, `pass`, `image`) VALUES
(6, 'admin', 'Admin', 'Super-Admin', 'admin', 'admin', 'Active'),
(16, 'sansan', 'sansan', 'Admin', 'sansan', 'sansan', 'user/');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countorder`
--

CREATE TABLE `tbl_countorder` (
  `order_id` int(12) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_countorder`
--

INSERT INTO `tbl_countorder` (`order_id`, `name`, `type`) VALUES
(122, '00051', '7'),
(181, '000199', '7'),
(207, '000212', '7'),
(214, '000216', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notification`
--

CREATE TABLE `tbl_notification` (
  `notification_id` int(12) NOT NULL,
  `message` text NOT NULL,
  `type` varchar(300) NOT NULL,
  `status` varchar(300) NOT NULL,
  `username` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_notification`
--

INSERT INTO `tbl_notification` (`notification_id`, `message`, `type`, `status`, `username`) VALUES
(6, 'hi din', 'message', 'pending', 'samplelastanme'),
(7, 'okay na', 'message', 'pending', 'Jhin'),
(8, 'asd', 'message', 'pending', 'Jhin'),
(9, 'fsdfds', 'message', 'pending', 'Jhin'),
(10, 'eqweq', 'message', 'pending', 'sandy'),
(11, 'dasdas', 'message', 'pending', 'jayvee'),
(12, 'dsfs', 'message', 'pending', 'sandy'),
(13, 'asd', 'message', 'pending', 'Caleum'),
(14, 'may concern po me', 'message', 'pending', 'Caleum'),
(15, 'dsa', 'message', 'pending', 'Caleum'),
(16, 'dsa', 'message', 'pending', 'Caleum'),
(17, 'dsadasd', 'message', 'pending', 'Dela cruz'),
(18, 'hi', 'message', 'pending', 'Dela cruz'),
(19, 'test', 'message', 'pending', 'Dela cruz'),
(20, 'hello', 'message', 'pending', 'Cruz');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_no` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `client_id` int(11) NOT NULL,
  `total` float(11,2) NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `tracking_no` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `BC` varchar(200) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'None',
  `shipping_fee` float(11,2) NOT NULL,
  `status` int(1) NOT NULL,
  `use_address` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `remarks` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_no`, `date`, `timestamp`, `updated_timestamp`, `client_id`, `total`, `payment_date`, `tracking_no`, `BC`, `shipping_fee`, `status`, `use_address`, `remarks`) VALUES
(0, '000100', '2018-11-07 22:18:58', '2018-11-07 16:20:28', '2018-11-07 16:20:28', 46, 500.00, NULL, '0', '0', 0.00, 5, '', ''),
(0, '000193', '2018-11-07 22:30:33', '2018-11-07 16:32:46', '2018-11-07 16:32:46', 46, 699.00, NULL, '0', '0', 0.00, 5, '', ''),
(0, '000194', '2018-11-07 22:30:54', '2018-11-07 16:30:29', '2018-11-07 16:30:29', 46, 250.00, NULL, '0', '0', 0.00, 5, '', ''),
(0, '000195', '2018-11-07 22:31:25', '2018-11-07 16:33:07', '2018-11-07 16:33:07', 46, 699.00, NULL, '0', '0', 0.00, 5, '', ''),
(0, '000196', '2018-11-07 22:31:54', '2018-11-07 14:39:43', '2018-11-07 14:39:43', 92, 1999.00, '2018-11-07 22:32:22', '0', '0', 0.00, 5, '', ''),
(0, '000197', '2018-11-07 22:41:44', '2018-11-07 16:24:55', '2018-11-07 16:24:55', 92, 450.00, '2018-11-07 22:42:29', '0', '0', 0.00, 5, '', ''),
(0, '000198', '2018-11-07 22:59:51', '2018-11-07 15:03:29', '2018-11-07 15:03:29', 92, 250.00, '2018-11-07 23:00:54', '0', '0', 0.00, 5, '', ''),
(0, '000199', '2018-11-07 23:13:28', '2018-11-07 15:15:41', '2018-11-07 15:15:41', 92, 450.00, '2018-11-07 23:13:56', '0', '0', 0.00, 7, '', ''),
(0, '000200', '2018-11-07 23:29:27', '2018-11-07 15:31:05', '2018-11-07 15:31:05', 92, 1999.00, '2018-11-07 23:30:11', '0', '0', 0.00, 6, '', ''),
(0, '000201', '2018-11-07 23:34:57', '2018-11-07 15:35:59', '2018-11-07 15:35:59', 92, 500.00, '2018-11-07 23:35:23', '24234234', '3453453', 0.00, 3, '', ''),
(0, '000202', '2018-11-07 23:39:51', '2018-11-07 15:55:25', '2018-11-07 15:55:25', 50, 1999.00, '2018-11-07 23:49:06', '123456', '654321', 0.00, 3, '', ''),
(0, '000203', '2018-11-07 23:42:07', '2018-11-07 15:43:03', '2018-11-07 15:43:03', 46, 450.00, '2018-11-07 23:42:22', '0', '0', 0.00, 3, '', ''),
(0, '000204', '2018-11-07 23:42:53', '2018-11-07 15:55:33', '2018-11-07 15:55:33', 92, 1999.00, '2018-11-07 23:43:45', '0', '0', 0.00, 3, '', ''),
(0, '000205', '2018-11-07 23:58:28', '2018-11-07 16:02:53', '2018-11-07 16:02:53', 46, 350.00, '2018-11-08 00:02:34', '123123123', '1231231231', 0.00, 3, '', ''),
(0, '000206', '2018-11-07 23:59:29', '2018-11-07 16:03:32', '2018-11-07 16:03:32', 46, 450.00, '2018-11-08 00:01:02', '0', '0', 0.00, 6, '', ''),
(0, '000207', '2018-11-08 00:03:46', '2018-11-07 16:04:24', '2018-11-07 16:04:24', 46, 1999.00, '2018-11-08 00:04:04', '92913', '92913', 0.00, 3, '', ''),
(0, '000208', '2018-11-08 00:07:02', '2018-11-07 16:08:48', '2018-11-07 16:08:48', 46, 250.00, '2018-11-08 00:07:30', '092913', '092913', 0.00, 3, '', ''),
(0, '000209', '2018-11-08 00:36:13', '2018-11-07 16:36:24', '2018-11-07 16:36:24', 46, 3150.00, NULL, 'None', 'None', 0.00, 5, '', ''),
(0, '000210', '2018-11-08 07:40:49', '2018-11-07 23:45:16', '2018-11-07 23:45:16', 92, 500.00, '2018-11-08 07:41:21', '133451', 'Bgsdf1', 0.00, 5, '', ''),
(0, '000211', '2018-11-08 07:47:26', '2018-11-07 23:48:04', '2018-11-07 23:48:04', 92, 1999.00, NULL, 'None', 'None', 0.00, 5, '', ''),
(0, '000212', '2018-11-08 07:48:35', '2018-11-07 23:49:54', '2018-11-07 23:49:54', 92, 1999.00, '2018-11-08 07:49:08', '234234', 'sdfsdf3', 0.00, 7, '', ''),
(0, '000213', '2018-11-08 07:51:19', '2018-11-07 23:52:17', '2018-11-07 23:52:17', 92, 1999.00, NULL, 'None', 'None', 0.00, 5, '', ''),
(0, '000214', '2018-11-08 07:53:04', '2018-11-07 23:54:33', '2018-11-07 23:54:33', 92, 1999.00, '2018-11-08 07:53:25', '12324', '34ere', 0.00, 5, '', ''),
(0, '000215', '2018-11-08 09:13:58', '2018-11-08 01:52:22', '2018-11-08 01:52:22', 92, 1999.00, '2018-11-08 09:48:45', '1234', 'Abc123', 0.00, 5, '', ''),
(0, '000216', '2018-11-08 20:02:26', '2018-11-08 12:02:26', '2018-11-08 12:02:26', 50, 1999.00, NULL, 'None', 'None', 0.00, 0, '', ''),
(0, '00030', '2018-08-07 09:22:53', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 1950.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00031', '2018-08-07 09:23:23', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 500.00, '2018-08-08 21:26:54', '0', '0', 0.00, 4, '', 'dasdassdas'),
(0, '00032', '2018-08-07 09:23:48', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 2100.00, '2018-08-07 16:08:28', '0', '0', 0.00, 4, '', ''),
(0, '00033', '2018-08-07 09:24:22', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 1600.00, '2018-08-07 16:05:14', '0', '0', 0.00, 4, '', ''),
(0, '00034', '2018-08-07 14:33:14', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 350.00, '2018-08-07 15:57:03', '123', '12', 0.00, 4, '', 'sd'),
(0, '00035', '2018-08-07 15:59:04', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 800.00, '2018-08-07 16:00:28', '32', '32', 0.00, 4, '', ''),
(0, '00036', '2018-08-09 10:43:48', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 350.00, '2018-08-09 10:48:24', '0', '0', 0.00, 4, '', 'ffasfs'),
(0, '00037', '2018-08-09 17:27:29', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 39, 1600.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00038', '2018-09-19 11:56:39', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 900.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00039', '2018-09-19 12:41:19', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 350.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00040', '2018-09-19 12:53:21', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 3850.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00041', '2018-09-23 22:04:16', '2018-09-23 14:04:21', '2018-09-23 14:04:21', 38, 900.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00042', '2018-09-23 22:12:56', '2018-09-26 04:59:01', '2018-09-26 04:59:01', 38, 1400.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00043', '2018-09-26 09:07:59', '2018-09-26 04:59:01', '2018-09-26 04:59:01', 48, 700.00, '2018-09-26 09:09:12', '0', '0', 0.00, 4, '', 'good'),
(0, '00044', '2018-09-26 12:45:56', '2018-09-26 04:59:01', '2018-09-26 04:59:01', 46, 3146.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00045', '2018-09-26 12:48:29', '2018-09-26 04:59:01', '2018-09-26 04:59:01', 43, 24990.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00046', '2018-09-26 12:57:28', '2018-09-26 04:59:01', '2018-09-26 04:59:01', 43, 1750.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00047', '0000-00-00 00:00:00', '2018-11-05 15:46:19', '2018-11-05 15:46:19', 46, 0.00, NULL, '0', '0', 0.00, 6, '', ''),
(0, '00048', '2018-09-26 13:00:08', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 43, 1999.00, '2018-09-26 13:09:19', '0', '0', 0.00, 4, '', ''),
(0, '00049', '2018-09-26 13:00:29', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 46, 1999.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00050', '2018-09-26 17:21:32', '2018-11-06 13:53:26', '2018-11-06 13:53:26', 46, 700.00, NULL, '0', '0', 0.00, 6, '', ''),
(0, '00051', '2018-09-26 17:54:23', '2018-11-05 15:47:27', '2018-11-05 15:47:27', 46, 699.00, NULL, '0', '0', 0.00, 7, '', ''),
(0, '00052', '2018-09-26 19:32:19', '2018-11-07 13:27:08', '2018-11-07 13:27:08', 46, 1999.00, NULL, '0', '0', 0.00, 3, '', ''),
(0, '00053', '2018-09-26 21:58:22', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 46, 1999.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00054', '2018-09-27 20:24:54', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 48, 1398.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00055', '2018-09-27 22:15:35', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 49, 2100.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00056', '2018-09-27 22:35:03', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 46, 60.00, '2018-09-27 22:37:32', '0', '0', 0.00, 4, '', ''),
(0, '00057', '2018-09-27 22:43:18', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 46, 350.00, '2018-09-27 22:43:50', '0', '0', 0.00, 4, '', ''),
(0, '00058', '2018-09-27 22:44:43', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 49, 19990.00, '2018-09-27 23:55:09', '0', '0', 0.00, 4, '', ''),
(0, '00059', '2018-09-27 22:46:52', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 46, 23988.00, '2018-09-27 23:45:33', '0', '0', 0.00, 4, '', ''),
(0, '00060', '2018-09-27 22:47:36', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 46, 19990.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00061', '2018-09-27 23:31:28', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 48, 350.00, '2018-09-27 23:31:49', '0', '0', 0.00, 4, '', ''),
(0, '00062', '2018-09-27 23:34:12', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 48, 3146.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00063', '2018-10-02 12:38:04', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 48, 350.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00064', '2018-10-16 16:29:07', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 60, -4500.00, '2018-10-16 16:30:34', '0', '0', 0.00, 4, '', ''),
(0, '00065', '2018-10-16 16:43:34', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 50, 7850.00, '2018-10-16 16:44:21', '0', '0', 0.00, 4, '', ''),
(0, '00066', '2018-10-16 22:02:56', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 50, 19990.00, '2018-10-16 22:04:53', '0', '0', 0.00, 4, '', ''),
(0, '00067', '2018-10-19 13:56:50', '2018-10-19 13:51:34', '2018-10-19 13:51:34', 50, -900.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00068', '2018-10-19 21:52:13', '2018-11-02 15:15:49', '2018-11-02 15:15:49', 46, 2899.00, '2018-10-19 21:52:31', '0', '0', 0.00, 4, '', ''),
(0, '00069', '2018-10-23 12:20:48', '2018-11-02 15:15:49', '2018-11-02 15:15:49', 50, 2700.00, '2018-10-23 12:21:50', '0', '0', 0.00, 4, '', 'all good'),
(0, '00070', '2018-10-23 12:32:23', '2018-11-02 15:15:49', '2018-11-02 15:15:49', 46, 5997.00, '2018-10-23 12:33:05', '0', '0', 0.00, 4, '', ''),
(0, '00071', '2018-10-23 19:38:42', '2018-11-02 15:15:49', '2018-11-02 15:15:49', 46, 2700.00, '2018-10-23 19:39:27', '0', '0', 0.00, 4, '', ''),
(0, '00072', '2018-10-23 20:00:26', '2018-11-02 15:15:49', '2018-11-02 15:15:49', 46, 500.00, '2018-10-23 20:07:16', '0', '0', 0.00, 4, '', ''),
(0, '00073', '2018-10-23 20:09:42', '2018-11-02 15:15:49', '2018-11-02 15:15:49', 46, 1999.00, '2018-10-23 20:10:16', '0', '0', 0.00, 4, '', ''),
(0, '00074', '2018-10-23 20:12:24', '2018-11-02 15:15:49', '2018-11-02 15:15:49', 46, 1999.00, '2018-10-23 20:12:54', '0', '0', 0.00, 4, '', ''),
(0, '00075', '0000-00-00 00:00:00', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 43, 0.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00076', '2018-11-02 23:23:31', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 43, 1999.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00077', '2018-11-02 23:26:31', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 43, 5999.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00078', '2018-11-02 23:34:24', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 46, 1999.00, '2018-11-02 23:35:06', '0', '0', 0.00, 4, '', ''),
(0, '00079', '2018-11-03 09:46:52', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 50, 2350.00, '2018-11-03 10:00:38', '123456', '654321', 0.00, 4, '', ''),
(0, '00080', '2018-11-04 19:10:45', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 50, 2249.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00081', '2018-11-04 19:21:31', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 50, 3998.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00082', '2018-11-04 22:38:43', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 77, 21989.00, '2018-11-04 22:39:56', '1233412', '234235', 0.00, 4, '', ''),
(0, '00083', '2018-11-05 00:06:47', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 46, 450.00, '2018-11-05 00:07:33', '0', '0', 0.00, 4, '', ''),
(0, '00084', '2018-11-05 11:17:16', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 46, 450.00, '2018-11-05 11:22:28', '0', '0', 0.00, 4, '', ''),
(0, '00085', '2018-11-05 13:10:35', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 77, 250.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00086', '2018-11-05 13:12:19', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 46, 450.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00087', '2018-11-05 13:16:00', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 77, 250.00, '2018-11-05 13:18:01', '0', '1234', 0.00, 4, '', ''),
(0, '00088', '2018-11-05 16:29:28', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 77, 560.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00089', '2018-11-05 18:10:34', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 85, 7000.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00090', '2018-11-05 18:11:45', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 85, 1000.00, '2018-11-05 18:12:42', '123456', '0', 0.00, 4, '', ''),
(0, '00091', '2018-11-05 19:02:39', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 86, 5950.00, '2018-11-05 19:04:02', '123456', '654321', 0.00, 4, '', ''),
(0, '00092', '2018-11-05 19:04:13', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 46, 1999.00, NULL, '0', '0', 0.00, 5, '', ''),
(0, '00093', '2018-11-05 19:11:15', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 86, 900.00, '2018-11-05 19:13:58', '123456', '654321', 0.00, 4, '', ''),
(0, '00094', '2018-11-05 19:20:32', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 86, 5997.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00095', '2018-11-05 19:22:21', '2018-11-05 15:41:24', '2018-11-05 15:41:24', 86, 250.00, NULL, '0', '0', 0.00, 4, '', ''),
(0, '00096', '2018-11-07 00:01:31', '2018-11-07 13:29:23', '2018-11-07 13:29:23', 46, 2097.00, NULL, '0', '0', 0.00, 5, '', ''),
(0, '00097', '2018-11-07 00:29:34', '2018-11-07 13:29:49', '2018-11-07 13:29:49', 46, 7996.00, NULL, '0', '0', 0.00, 5, '', ''),
(0, '00098', '2018-11-07 21:01:45', '2018-11-07 13:07:32', '2018-11-07 13:07:32', 50, 450.00, '2018-11-07 21:02:16', '1234', '324325', 0.00, 6, '', ''),
(0, '00099', '2018-11-07 21:11:49', '2018-11-07 13:11:59', '2018-11-07 13:11:59', 50, 250.00, NULL, '0', '0', 0.00, 5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `lastname` varchar(100) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `fbname` varchar(100) NOT NULL,
  `address` varchar(100) NOT NULL,
  `contact` int(20) NOT NULL,
  `region` varchar(100) NOT NULL,
  `birthdate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `created_at`, `lastname`, `firstname`, `fbname`, `address`, `contact`, `region`, `birthdate`) VALUES
(1, 'ayadc', 'password', 'aya@gmail.com', '2017-11-13 16:53:32', '', '', '', '', 0, '', ''),
(101, 'leda', 'password', 'leda@yahoo.com', '2018-01-07 13:38:24', '', '', '', '', 0, '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addcart`
--
ALTER TABLE `addcart`
  ADD PRIMARY KEY (`idd`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `audittrail`
--
ALTER TABLE `audittrail`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `reserved`
--
ALTER TABLE `reserved`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_countorder`
--
ALTER TABLE `tbl_countorder`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`transaction_no`) USING BTREE;

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addcart`
--
ALTER TABLE `addcart`
  MODIFY `idd` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `audittrail`
--
ALTER TABLE `audittrail`
  MODIFY `user_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=217;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `reserved`
--
ALTER TABLE `reserved`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tbl_countorder`
--
ALTER TABLE `tbl_countorder`
  MODIFY `order_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=215;

--
-- AUTO_INCREMENT for table `tbl_notification`
--
ALTER TABLE `tbl_notification`
  MODIFY `notification_id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
