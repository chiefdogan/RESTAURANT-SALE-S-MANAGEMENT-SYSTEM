-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2020 at 12:37 PM
-- Server version: 10.4.11-MariaDB
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
-- Database: `menu_mpya`
--

-- --------------------------------------------------------

--
-- Table structure for table `acc_receive`
--

CREATE TABLE `acc_receive` (
  `id` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `Afisa_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Amount_recv` int(100) NOT NULL,
  `Section_from` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Signature` varchar(500) CHARACTER SET latin1 NOT NULL,
  `Time_recv` time NOT NULL,
  `Date_recv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8u;

--
-- Dumping data for table `acc_receive`
--

INSERT INTO `acc_receive` (`id`, `user_id`, `Afisa_name`, `Amount_recv`, `Section_from`, `Signature`, `Time_recv`, `Date_recv`) VALUES
(1, 18, 'Malima Deo', 12000, 'Kitchen', '', '20:27:55', '2018-06-09'),
(2, 18, 'Malima Deo', 200000, 'Kitchen', '', '10:07:16', '2018-06-14'),
(3, 18, 'Malima Deo', 200000, 'Chakula', '', '10:07:29', '2018-06-14'),
(4, 18, 'Deogratius Kibaji', 3000000, 'Dukani', '', '10:07:50', '2018-06-14'),
(5, 18, 'Debora Japhet', 1000000, 'Baa', '', '10:08:04', '2018-06-14'),
(6, 18, 'Deogratius Kibaji', 12000, 'Baa', '', '10:08:15', '2018-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `food_add`
--

CREATE TABLE `food_add` (
  `food_add_id` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `food_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `food_aded` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mboga_mnt_aded` smallint(5) UNSIGNED NOT NULL,
  `mboga_added_salio` int(100) UNSIGNED NOT NULL,
  `alet_icon` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `date_entered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=hebrew ROW_FORMAT=COMPACT;

--
-- Dumping data for table `food_add`
--

INSERT INTO `food_add` (`food_add_id`, `user_id`, `food_type`, `food_aded`, `mboga_mnt_aded`, `mboga_added_salio`, `alet_icon`, `date_entered`) VALUES
(1, 18, 'Wanga', 'Ugali dona', 120, 102, '1', '2018-06-18 06:33:32'),
(2, 18, 'Mboga', 'Maharage', 120, 88, '1', '2018-06-18 06:33:32'),
(4, 18, 'Wanga', 'Ugali sembe', 19, 19, '1', '2018-06-14 11:35:05'),
(5, 18, 'Wanga', 'Wali pilau', 100, 99, '0', '2018-06-14 06:34:10'),
(8, 18, 'Mboga', 'Kibua', 100, 71, '0', '2018-06-14 11:31:56'),
(9, 18, 'Mboga', 'Nyama rost', 100, 46, '1', '2018-06-14 11:35:10'),
(11, 18, 'Mboga', 'Nyama choma', 10, 10, '0', '2018-06-14 06:29:32'),
(12, 18, 'Mboga', 'Kuku choma', 15, 13, '1', '2018-06-14 11:35:13'),
(22, 18, 'Wanga', 'Ndizi', 12, 12, '1', '2018-06-18 08:31:23'),
(23, 18, 'Wanga', 'Viazi', 120, 120, '1', '2018-06-14 11:35:08'),
(24, 18, 'Wanga', 'Wali mweupe', 100, 100, '0', '2018-06-18 02:48:18');

-- --------------------------------------------------------

--
-- Table structure for table `food_deleted`
--

CREATE TABLE `food_deleted` (
  `ID` int(100) UNSIGNED NOT NULL,
  `food_add_id` int(11) UNSIGNED NOT NULL,
  `mboga` varchar(100) CHARACTER SET latin1 NOT NULL,
  `food_type` varchar(100) CHARACTER SET latin1 COLLATE latin1_danish_ci NOT NULL,
  `alet_icon` varchar(10) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `deleted_time` time NOT NULL,
  `deleted_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8r ROW_FORMAT=COMPACT;

--
-- Dumping data for table `food_deleted`
--

INSERT INTO `food_deleted` (`ID`, `food_add_id`, `mboga`, `food_type`, `alet_icon`, `deleted_time`, `deleted_date`) VALUES
(2, 12, 'Ugali muhogo', 'Wanga', '0', '13:39:36', '2018-06-14'),
(3, 12, 'Kuku rost', 'Mboga', '0', '13:41:16', '2018-06-14'),
(4, 12, 'Ndizi', 'Wanga', '1', '14:19:12', '2018-06-14'),
(5, 12, 'Viazi', 'Wanga', '0', '14:20:10', '2018-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `food_pchs`
--

CREATE TABLE `food_pchs` (
  `id` mediumint(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `Order_no` int(100) UNSIGNED NOT NULL,
  `wanga` varchar(100) CHARACTER SET latin1 NOT NULL,
  `mboga` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Mnt_pd` mediumint(100) UNSIGNED NOT NULL,
  `Plt_no` mediumint(100) UNSIGNED NOT NULL,
  `Cost` mediumint(100) UNSIGNED NOT NULL,
  `T_cost` mediumint(100) UNSIGNED NOT NULL,
  `Chng` mediumint(100) UNSIGNED NOT NULL,
  `Pchs_id` mediumint(100) UNSIGNED NOT NULL,
  `alet_icon` varchar(10) CHARACTER SET latin7 NOT NULL DEFAULT '0',
  `date_entered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin2 COLLATE=latin2_croatian_ci;

--
-- Dumping data for table `food_pchs`
--

INSERT INTO `food_pchs` (`id`, `user_id`, `Order_no`, `wanga`, `mboga`, `Mnt_pd`, `Plt_no`, `Cost`, `T_cost`, `Chng`, `Pchs_id`, `alet_icon`, `date_entered`) VALUES
(1, 18, 1894941, 'UGALI DONA', 'MAHARAGE', 1000, 1, 1000, 1000, 0, 1, '0', '2018-06-14'),
(2, 18, 1894942, 'UGALI DONA', 'MAHARAGE', 3000, 3, 1000, 3000, 0, 2, '0', '2018-06-14'),
(3, 18, 1894943, 'NDIZI', 'NYAMA ROST', 10000, 3, 2000, 6000, 4000, 3, '1', '2018-06-14'),
(4, 18, 1894944, 'WALI PILAU', 'KUKU CHOMA', 5000, 1, 3000, 3000, 2000, 4, '0', '2018-06-14'),
(5, 18, 1894941, 'TAMBI', 'SANGARA ROST', 50000, 3, 5000, 15000, 35000, 5, '0', '2018-06-14'),
(6, 18, 1894942, 'TAMBI', 'MAHARAGE', 2000, 1, 1000, 1000, 1000, 6, '0', '2018-06-14'),
(7, 18, 1894943, 'UGALI DONA', 'MAHARAGE', 1000, 1, 1000, 1000, 0, 7, '0', '2018-06-14'),
(8, 18, 1894944, 'UGALI MUHOGO', 'MAHARAGE', 21000, 12, 1000, 12000, 9000, 8, '0', '2018-06-14'),
(9, 18, 1894945, 'UGALI DONA', 'KUKU ROST', 120000, 12, 3000, 36000, 84000, 9, '0', '2018-06-14'),
(10, 18, 1894946, 'TAMBI', 'KUKU CHOMA', 5000, 1, 3000, 3000, 2000, 10, '0', '2018-06-14'),
(11, 18, 1894947, 'TAMBI', 'MAHARAGE', 200000, 11, 1000, 11000, 189000, 11, '0', '2018-06-14'),
(12, 18, 1894948, 'NDIZI', 'KIBUA', 10000000, 27, 1500, 40500, 9959500, 12, '0', '2018-06-14'),
(13, 18, 1894949, 'VIAZI', 'NYAMA ROST', 1000000, 50, 2000, 100000, 900000, 13, '0', '2018-06-14'),
(14, 18, 1894950, 'TAMBI', 'NYAMA ROST', 3000, 1, 2000, 2000, 1000, 14, '0', '2018-06-14'),
(15, 18, 1894951, 'TAMBI', 'MAHARAGE', 10000, 1, 1000, 1000, 9000, 15, '1', '2018-06-14'),
(16, 18, 1894952, 'TAMBI', 'MAHARAGE', 1000, 1, 1000, 1000, 0, 16, '0', '2018-06-14'),
(17, 18, 1894953, 'TAMBI', 'KIBUA', 10000, 1, 1500, 1500, 8500, 17, '1', '2018-06-14'),
(18, 18, 1894954, 'TAMBI', 'KIBUA', 2000, 1, 1500, 1500, 500, 18, '1', '2018-06-14'),
(19, 18, 1894941, 'UGALI DONA', 'MAHARAGE', 5000, 1, 1000, 1000, 4000, 19, '1', '2018-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `good_rcved_nt`
--

CREATE TABLE `good_rcved_nt` (
  `ID` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `Supplier_name` varchar(100) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `Qty_received` varchar(100) NOT NULL,
  `kizio` varchar(100) NOT NULL,
  `Cost_per_unit` varchar(100) NOT NULL,
  `Total_cost` varchar(100) NOT NULL,
  `Time_ent` time NOT NULL,
  `Date_ent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `good_rcved_nt`
--

INSERT INTO `good_rcved_nt` (`ID`, `user_id`, `Supplier_name`, `item_name`, `Qty_received`, `kizio`, `Cost_per_unit`, `Total_cost`, `Time_ent`, `Date_ent`) VALUES
(1, 18, 'Mafuru Boniphasi', 'Kuku', '100', 'KG', '10000', '1000000', '19:12:47', '2018-06-09'),
(2, 18, 'Deogratias Kibaji', 'Kuku', '1200', 'KG', '1200', '1440000', '09:42:10', '2018-06-14'),
(3, 18, 'Deogratias Kibaji', 'Cooking oil', '200', 'LITER', '1000', '200000', '09:42:59', '2018-06-14'),
(4, 18, 'Boneka', 'Cooking oil', '500', 'LITER', '1400', '700000', '09:43:34', '2018-06-14'),
(5, 18, 'Deogratias Kibaji', 'Vituguu', '1000', 'KG', '2000', '2000000', '09:44:35', '2018-06-14'),
(6, 18, 'Mafuru Boniphasi', 'Vituguu', '120', 'KG', '2000', '240000', '09:51:25', '2018-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `grn_prnt_form`
--

CREATE TABLE `grn_prnt_form` (
  `id` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `Supplier_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `pinted_id` varchar(100) CHARACTER SET latin1 NOT NULL DEFAULT '0',
  `time_ent` time NOT NULL,
  `date_ent` date NOT NULL
) ENGINE=MEMORY DEFAULT CHARSET=latin1 COLLATE=latin1_german1_ci;

-- --------------------------------------------------------

--
-- Table structure for table `loged_in`
--

CREATE TABLE `loged_in` (
  `ID` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `Fr_name` varchar(100) NOT NULL,
  `Last_name` varchar(100) NOT NULL,
  `gender` enum('M','F') NOT NULL,
  `cheo` varchar(100) NOT NULL,
  `Time_enta` time NOT NULL,
  `Date_enta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loged_in`
--

INSERT INTO `loged_in` (`ID`, `user_id`, `Fr_name`, `Last_name`, `gender`, `cheo`, `Time_enta`, `Date_enta`) VALUES
(1, 0, 'deo', 'Lunyungu', 'M', 'admin', '11:13:28', '2018-06-08'),
(3, 11, 'deogratias', 'kibaji', 'M', 'admin', '12:49:36', '2018-06-08'),
(4, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '12:55:37', '2018-06-08'),
(5, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '16:41:43', '2018-06-08'),
(6, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '16:42:42', '2018-06-08'),
(7, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '16:43:27', '2018-06-08'),
(8, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '16:44:50', '2018-06-08'),
(9, 11, 'deogratias', 'kibaji', 'M', 'admin', '16:45:46', '2018-06-08'),
(10, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '17:17:14', '2018-06-08'),
(11, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '08:41:38', '2018-06-09'),
(12, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '08:49:14', '2018-06-09'),
(13, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '08:50:01', '2018-06-09'),
(14, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '08:50:16', '2018-06-09'),
(15, 11, 'deogratias', 'kibaji', 'M', 'admin', '08:58:03', '2018-06-09'),
(16, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '09:12:22', '2018-06-09'),
(17, 11, 'deogratias', 'kibaji', 'M', 'admin', '12:27:55', '2018-06-09'),
(18, 11, 'deogratias', 'kibaji', 'M', 'admin', '13:12:28', '2018-06-09'),
(19, 11, 'deogratias', 'kibaji', 'M', 'admin', '13:31:34', '2018-06-09'),
(20, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '14:07:09', '2018-06-09'),
(21, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '14:08:50', '2018-06-09'),
(22, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '14:09:10', '2018-06-09'),
(23, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '14:09:25', '2018-06-09'),
(24, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '14:09:39', '2018-06-09'),
(25, 15, 'Hatibu', 'Msangi', 'M', 'muhasibu', '14:09:52', '2018-06-09'),
(26, 11, 'deogratias', 'kibaji', 'M', 'admin', '14:10:11', '2018-06-09'),
(27, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '14:50:56', '2018-06-09'),
(28, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '14:51:39', '2018-06-09'),
(29, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '14:55:42', '2018-06-09'),
(30, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '14:55:56', '2018-06-09'),
(31, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '14:56:29', '2018-06-09'),
(32, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '14:56:53', '2018-06-09'),
(33, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '15:08:46', '2018-06-09'),
(34, 11, 'deogratias', 'kibaji', 'M', 'admin', '15:09:07', '2018-06-09'),
(35, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '16:02:56', '2018-06-09'),
(36, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '16:04:05', '2018-06-09'),
(37, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '16:17:23', '2018-06-09'),
(38, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '16:18:13', '2018-06-09'),
(39, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '16:18:59', '2018-06-09'),
(40, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '16:22:27', '2018-06-09'),
(41, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '16:26:23', '2018-06-09'),
(42, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '16:27:00', '2018-06-09'),
(43, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '16:28:26', '2018-06-09'),
(44, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '16:34:01', '2018-06-09'),
(45, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '16:40:40', '2018-06-09'),
(46, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '17:11:10', '2018-06-09'),
(47, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '17:17:47', '2018-06-09'),
(48, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '17:20:24', '2018-06-09'),
(49, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '17:28:42', '2018-06-09'),
(50, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '17:57:46', '2018-06-09'),
(51, 11, 'deogratias', 'kibaji', 'M', 'admin', '17:58:45', '2018-06-09'),
(52, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '18:09:54', '2018-06-09'),
(53, 11, 'deogratias', 'kibaji', 'M', 'admin', '19:08:25', '2018-06-09'),
(54, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '19:08:47', '2018-06-09'),
(55, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '19:09:17', '2018-06-09'),
(56, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '19:09:31', '2018-06-09'),
(57, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '19:10:01', '2018-06-09'),
(58, 15, 'Hatibu', 'Msangi', 'M', 'muhasibu', '19:10:18', '2018-06-09'),
(59, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '19:18:04', '2018-06-09'),
(60, 11, 'deogratias', 'kibaji', 'M', 'admin', '19:22:10', '2018-06-09'),
(61, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '19:25:52', '2018-06-09'),
(62, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '19:26:25', '2018-06-09'),
(63, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '19:27:03', '2018-06-09'),
(64, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '19:38:14', '2018-06-09'),
(65, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '19:38:41', '2018-06-09'),
(66, 11, 'deogratias', 'kibaji', 'M', 'admin', '19:43:19', '2018-06-09'),
(67, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '19:45:17', '2018-06-09'),
(68, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '19:46:24', '2018-06-09'),
(69, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '19:47:03', '2018-06-09'),
(70, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '19:47:19', '2018-06-09'),
(71, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '21:32:12', '2018-06-09'),
(72, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '21:36:18', '2018-06-09'),
(73, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '21:36:30', '2018-06-09'),
(74, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '21:44:54', '2018-06-09'),
(75, 15, 'Hatibu', 'Msangi', 'M', 'muhasibu', '22:18:00', '2018-06-09'),
(76, 11, 'deogratias', 'kibaji', 'M', 'admin', '22:18:17', '2018-06-09'),
(77, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '20:21:37', '2018-06-10'),
(78, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '20:28:29', '2018-06-10'),
(79, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '20:35:08', '2018-06-10'),
(80, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '06:39:34', '2018-06-11'),
(81, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '06:45:51', '2018-06-11'),
(82, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '07:03:38', '2018-06-11'),
(83, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '12:29:24', '2018-06-11'),
(84, 11, 'deogratias', 'kibaji', 'M', 'admin', '12:29:56', '2018-06-11'),
(85, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '20:27:47', '2018-06-11'),
(86, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '20:59:14', '2018-06-11'),
(87, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '20:59:48', '2018-06-11'),
(88, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '21:02:18', '2018-06-11'),
(89, 15, 'Hatibu', 'Msangi', 'M', 'muhasibu', '21:03:07', '2018-06-11'),
(90, 11, 'deogratias', 'kibaji', 'M', 'admin', '21:03:55', '2018-06-11'),
(91, 11, 'deogratias', 'kibaji', 'M', 'admin', '14:50:31', '2018-06-13'),
(92, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '14:54:34', '2018-06-13'),
(93, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '14:55:26', '2018-06-13'),
(94, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '14:55:47', '2018-06-13'),
(95, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '14:56:03', '2018-06-13'),
(96, 15, 'Hatibu', 'Msangi', 'M', 'muhasibu', '14:57:55', '2018-06-13'),
(97, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '09:17:43', '2018-06-14'),
(98, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '09:18:07', '2018-06-14'),
(99, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '09:18:44', '2018-06-14'),
(100, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '09:19:03', '2018-06-14'),
(101, 15, 'Hatibu', 'Msangi', 'M', 'muhasibu', '09:19:15', '2018-06-14'),
(102, 11, 'deogratias', 'kibaji', 'M', 'admin', '09:19:30', '2018-06-14'),
(103, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '13:00:06', '2018-06-14'),
(104, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '13:29:08', '2018-06-14'),
(105, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '13:29:27', '2018-06-14'),
(106, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '13:29:46', '2018-06-14'),
(107, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '05:43:29', '2018-06-18'),
(108, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '05:44:09', '2018-06-18'),
(109, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '05:44:31', '2018-06-18'),
(110, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '05:45:38', '2018-06-18'),
(111, 15, 'Hatibu', 'Msangi', 'M', 'muhasibu', '05:45:59', '2018-06-18'),
(112, 11, 'deogratias', 'kibaji', 'M', 'admin', '05:46:25', '2018-06-18'),
(113, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '06:24:18', '2018-06-18'),
(114, 11, 'deogratias', 'kibaji', 'M', 'admin', '09:30:10', '2018-06-18'),
(115, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '09:32:44', '2018-06-18'),
(116, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '09:34:13', '2018-06-18'),
(117, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '09:35:49', '2018-06-18'),
(118, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '11:28:00', '2018-06-18'),
(119, 11, 'deogratias', 'kibaji', 'M', 'admin', '11:28:20', '2018-06-18'),
(120, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '11:29:15', '2018-06-18'),
(121, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '11:32:50', '2018-06-18'),
(122, 11, 'deogratias', 'kibaji', 'M', 'admin', '10:29:26', '2018-07-02'),
(123, 11, 'deogratias', 'kibaji', 'M', 'admin', '10:30:18', '2018-07-02'),
(124, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '10:30:50', '2018-07-02'),
(125, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '10:38:17', '2018-07-02'),
(126, 11, 'deogratias', 'kibaji', 'M', 'admin', '10:48:03', '2018-07-02'),
(127, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '10:57:19', '2018-07-02'),
(128, 15, 'Hatibu', 'Msangi', 'M', 'muhasibu', '05:06:38', '2019-07-05'),
(129, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '05:06:55', '2019-07-05'),
(130, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '05:07:34', '2019-07-05'),
(131, 11, 'deogratias', 'kibaji', 'M', 'admin', '05:09:33', '2019-07-05'),
(132, 14, 'Elton', 'Lunyungu', 'M', 'stoo', '05:10:52', '2019-07-05'),
(133, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '05:11:15', '2019-07-05'),
(134, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '05:12:02', '2019-07-05'),
(135, 12, 'Lawton', 'Emmanuel', 'M', 'mpakuaji', '05:12:27', '2019-07-05'),
(136, 16, 'deogratias', 'Noverty', 'M', 'muuzaji', '16:03:01', '2019-07-05'),
(137, 13, 'Brenda', 'Meagie', 'F', 'mpikaji', '14:44:30', '2019-10-12');

-- --------------------------------------------------------

--
-- Table structure for table `main_store`
--

CREATE TABLE `main_store` (
  `ID` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `ITEMS` varchar(100) NOT NULL,
  `TOTAL_AMOUNT` varchar(100) NOT NULL,
  `BALANCE` varchar(100) NOT NULL,
  `UNIT_MESSURE` varchar(100) NOT NULL,
  `UNIT_COST` int(100) UNSIGNED NOT NULL,
  `TOTAL_COST` int(100) UNSIGNED NOT NULL,
  `Total_cost_balance` varchar(100) NOT NULL,
  `Time_enta` time NOT NULL,
  `date_enta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `main_store`
--

INSERT INTO `main_store` (`ID`, `user_id`, `ITEMS`, `TOTAL_AMOUNT`, `BALANCE`, `UNIT_MESSURE`, `UNIT_COST`, `TOTAL_COST`, `Total_cost_balance`, `Time_enta`, `date_enta`) VALUES
(1, 18, 'Kuku', '100', '90', 'KG', 10000, 1000000, '900000', '19:12:47', '2018-06-09'),
(2, 18, 'Kuku', '1200', '1200', 'KG', 1200, 1440000, '1440000', '09:42:10', '2018-06-14'),
(3, 18, 'Cooking oil', '200', '200', 'LITER', 1000, 200000, '200000', '09:42:59', '2018-06-14'),
(4, 18, 'Cooking oil', '500', '500', 'LITER', 1400, 700000, '700000', '09:43:34', '2018-06-14'),
(5, 18, 'Vitunguu', '1120', '1100', 'KG', 2000, 2240000, '2200000', '09:44:35', '2018-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `purche_order_rpt`
--

CREATE TABLE `purche_order_rpt` (
  `ID` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `vifaa_aina` varchar(100) NOT NULL,
  `balance_open` varchar(100) NOT NULL DEFAULT '0',
  `Amount_rqsted` varchar(100) NOT NULL,
  `Amount_rcved` varchar(100) NOT NULL,
  `Toatal_good_available` varchar(100) NOT NULL,
  `Cost_per_unit` varchar(100) NOT NULL,
  `kizio` varchar(10) NOT NULL,
  `Total_cost` varchar(100) NOT NULL,
  `signature` varchar(200) NOT NULL,
  `Time_ent` time NOT NULL,
  `Date_ent` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purche_order_rpt`
--

INSERT INTO `purche_order_rpt` (`ID`, `user_id`, `vifaa_aina`, `balance_open`, `Amount_rqsted`, `Amount_rcved`, `Toatal_good_available`, `Cost_per_unit`, `kizio`, `Total_cost`, `signature`, `Time_ent`, `Date_ent`) VALUES
(1, 18, 'Kuku', '1', '10', '10', '11', '10000', 'KG', '100000', '', '19:21:07', '2018-06-09'),
(2, 18, 'Vitunguu', '10', '120', '120', '130', '2000', 'KG', '240000', '', '09:49:20', '2018-06-14'),
(3, 18, 'Vitunguu', '12', '100', '100', '112', '2000', 'KG', '200000', '', '09:50:36', '2018-06-14'),
(4, 18, 'Vitunguu', '12', '100', '100', '112', '2000', 'KG', '200000', '', '09:59:32', '2018-06-14'),
(5, 18, 'Vitunguu', '12', '20', '20', '32', '2000', 'KG', '40000', '', '10:00:13', '2018-06-14');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `name`, `user_name`) VALUES
(121, 'muuzaji', ''),
(122, 'mpakuaji', ''),
(123, 'mpikaji', ''),
(124, 'stoo', ''),
(125, 'muhasibu', ''),
(126, 'admin', '');

-- --------------------------------------------------------

--
-- Table structure for table `sms_all`
--

CREATE TABLE `sms_all` (
  `ID` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `message` varchar(500) CHARACTER SET latin1 NOT NULL,
  `time_enta` time NOT NULL,
  `date_enta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=koi8u;

--
-- Dumping data for table `sms_all`
--

INSERT INTO `sms_all` (`ID`, `user_id`, `message`, `time_enta`, `date_enta`) VALUES
(2, 18, 'Leo Kukatua Na Kikao Cha Staff Wote Saa Kumi Kamili Jioni', '20:01:24', '2018-06-09');

-- --------------------------------------------------------

--
-- Table structure for table `stock_sheet`
--

CREATE TABLE `stock_sheet` (
  `ID` int(100) UNSIGNED NOT NULL,
  `user_id` int(100) UNSIGNED NOT NULL,
  `Item_name` varchar(100) NOT NULL,
  `Ordered_ptn` int(100) UNSIGNED NOT NULL,
  `Issued_ptn` int(100) UNSIGNED NOT NULL,
  `Total_ptn_produced` int(100) UNSIGNED NOT NULL,
  `Sale_ptn` int(100) UNSIGNED NOT NULL,
  `Trans_reject` int(100) UNSIGNED NOT NULL,
  `Sales_price` int(100) UNSIGNED NOT NULL,
  `C_balance` int(100) UNSIGNED NOT NULL,
  `S_amount` int(100) UNSIGNED NOT NULL,
  `C_stock_value` int(100) UNSIGNED NOT NULL,
  `Variance` int(100) UNSIGNED NOT NULL,
  `Time_entered` time NOT NULL,
  `Date_entered` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stock_sheet`
--

INSERT INTO `stock_sheet` (`ID`, `user_id`, `Item_name`, `Ordered_ptn`, `Issued_ptn`, `Total_ptn_produced`, `Sale_ptn`, `Trans_reject`, `Sales_price`, `C_balance`, `S_amount`, `C_stock_value`, `Variance`, `Time_entered`, `Date_entered`) VALUES
(1, 16, 'Kuku', 12, 12, 120, 100, 12, 1200, 8, 120000, 9600, 0, '17:47:02', '2018-06-08'),
(2, 18, 'Viazi', 120, 120, 400, 400, 0, 1000, 0, 400000, 0, 0, '09:37:40', '2018-06-14'),
(3, 18, 'Nyama', 100, 100, 500, 400, 90, 1000, 10, 400000, 10000, 0, '09:39:14', '2018-06-14'),
(4, 18, 'Ndizi', 100, 100, 400, 400, 0, 1000, 0, 400000, 0, 0, '09:40:44', '2018-06-14'),
(5, 18, 'Kuku', 120, 110, 200, 150, 50, 1000, 0, 150000, 0, 0, '05:50:08', '2018-06-18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(100) UNSIGNED NOT NULL,
  `Fr_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Last_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Ur_name` varchar(100) CHARACTER SET latin1 NOT NULL,
  `cheo` varchar(100) CHARACTER SET latin1 NOT NULL,
  `role_id` int(100) NOT NULL,
  `gender` enum('M','F') CHARACTER SET latin1 NOT NULL,
  `image` varchar(500) CHARACTER SET latin1 NOT NULL,
  `pwd` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Cnfm_pwd` varchar(100) CHARACTER SET latin1 NOT NULL,
  `Time_enta` time NOT NULL,
  `Date_enta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_general_cs ROW_FORMAT=COMPACT;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `Fr_name`, `Last_name`, `Ur_name`, `cheo`, `role_id`, `gender`, `image`, `pwd`, `Cnfm_pwd`, `Time_enta`, `Date_enta`) VALUES
(0, 'deo', 'Lunyungu', 'deo', 'admin', 126, 'M', '.5b19395aac9e25.80266905.mimi2.jpg', 'mimi1234', 'mimi1234', '16:55:38', '2018-06-07'),
(11, 'deogratias', 'kibaji', 'deo1', 'admin', 126, 'M', '.5b1a50d419b873.06396480.mimi2.jpg', '8265a63ec2fffedd8a11f527bdbf4a7c44486304f54b5df79b57d24c5ac9c87b', '', '12:48:04', '2018-06-08'),
(12, 'Lawton', 'Emmanuel', 'emma', 'mpakuaji', 122, 'M', '.5b1a5158959497.40322445.pst.jpg', '8265a63ec2fffedd8a11f527bdbf4a7c44486304f54b5df79b57d24c5ac9c87b', '', '12:50:16', '2018-06-08'),
(13, 'Brenda', 'Meagie', 'nansi', 'mpikaji', 123, 'F', '.5b1a518880b142.56109017.Naaaa.jpg', '8265a63ec2fffedd8a11f527bdbf4a7c44486304f54b5df79b57d24c5ac9c87b', '', '12:51:04', '2018-06-08'),
(14, 'Elton', 'Lunyungu', 'mimi', 'stoo', 124, 'M', '.5b1a51d11c6503.77793780.mimi3.jpg', '8265a63ec2fffedd8a11f527bdbf4a7c44486304f54b5df79b57d24c5ac9c87b', '', '12:52:17', '2018-06-08'),
(15, 'Hatibu', 'Msangi', 'hatibu', 'muhasibu', 125, 'M', '.5b1a51f89411e8.18309274.pst.jpg', '8265a63ec2fffedd8a11f527bdbf4a7c44486304f54b5df79b57d24c5ac9c87b', '', '12:52:56', '2018-06-08'),
(16, 'deogratias', 'Noverty', 'bonny', 'muuzaji', 121, 'M', '.5b1a524c48c319.80079937.mimi2.jpg', '8265a63ec2fffedd8a11f527bdbf4a7c44486304f54b5df79b57d24c5ac9c87b', '', '12:54:20', '2018-06-08'),
(17, 'malima', 'kibaji', 'kibaji1', 'muuzaji', 121, 'M', '.5b1ba8b48798f6.17276286.sign1.png', '8265a63ec2fffedd8a11f527bdbf4a7c44486304f54b5df79b57d24c5ac9c87b', '', '13:15:16', '2018-06-09'),
(18, 'Lawton', 'Emmanuel', 'mimi1', 'mpikaji', 123, 'M', '.5b1bab0d3facf3.82172585.sign3.png', '8265a63ec2fffedd8a11f527bdbf4a7c44486304f54b5df79b57d24c5ac9c87b', '', '13:25:17', '2018-06-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acc_receive`
--
ALTER TABLE `acc_receive`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `food_add`
--
ALTER TABLE `food_add`
  ADD PRIMARY KEY (`food_add_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `food_deleted`
--
ALTER TABLE `food_deleted`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `food_add_id` (`food_add_id`);

--
-- Indexes for table `food_pchs`
--
ALTER TABLE `food_pchs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `good_rcved_nt`
--
ALTER TABLE `good_rcved_nt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `grn_prnt_form`
--
ALTER TABLE `grn_prnt_form`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `loged_in`
--
ALTER TABLE `loged_in`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `main_store`
--
ALTER TABLE `main_store`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `purche_order_rpt`
--
ALTER TABLE `purche_order_rpt`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `sms_all`
--
ALTER TABLE `sms_all`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `stock_sheet`
--
ALTER TABLE `stock_sheet`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `acc_receive`
--
ALTER TABLE `acc_receive`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `food_add`
--
ALTER TABLE `food_add`
  MODIFY `food_add_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `food_deleted`
--
ALTER TABLE `food_deleted`
  MODIFY `ID` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `food_pchs`
--
ALTER TABLE `food_pchs`
  MODIFY `id` mediumint(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `good_rcved_nt`
--
ALTER TABLE `good_rcved_nt`
  MODIFY `ID` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `grn_prnt_form`
--
ALTER TABLE `grn_prnt_form`
  MODIFY `id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `loged_in`
--
ALTER TABLE `loged_in`
  MODIFY `ID` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `main_store`
--
ALTER TABLE `main_store`
  MODIFY `ID` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `purche_order_rpt`
--
ALTER TABLE `purche_order_rpt`
  MODIFY `ID` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=127;

--
-- AUTO_INCREMENT for table `sms_all`
--
ALTER TABLE `sms_all`
  MODIFY `ID` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stock_sheet`
--
ALTER TABLE `stock_sheet`
  MODIFY `ID` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `acc_receive`
--
ALTER TABLE `acc_receive`
  ADD CONSTRAINT `acc_receive_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_add`
--
ALTER TABLE `food_add`
  ADD CONSTRAINT `food_add_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_deleted`
--
ALTER TABLE `food_deleted`
  ADD CONSTRAINT `food_deleted_ibfk_1` FOREIGN KEY (`food_add_id`) REFERENCES `food_add` (`food_add_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `food_pchs`
--
ALTER TABLE `food_pchs`
  ADD CONSTRAINT `food_pchs_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `good_rcved_nt`
--
ALTER TABLE `good_rcved_nt`
  ADD CONSTRAINT `good_rcved_nt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `loged_in`
--
ALTER TABLE `loged_in`
  ADD CONSTRAINT `loged_in_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `main_store`
--
ALTER TABLE `main_store`
  ADD CONSTRAINT `main_store_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `purche_order_rpt`
--
ALTER TABLE `purche_order_rpt`
  ADD CONSTRAINT `purche_order_rpt_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sms_all`
--
ALTER TABLE `sms_all`
  ADD CONSTRAINT `sms_all_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `stock_sheet`
--
ALTER TABLE `stock_sheet`
  ADD CONSTRAINT `stock_sheet_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
