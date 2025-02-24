-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2024 at 02:11 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `thesis`
--

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `file_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `file_path` varchar(255) NOT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `section_no` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`file_id`, `folder_id`, `file_name`, `file_path`, `barangay`, `section_no`) VALUES
(92, 95, 'Jamabalud_1_1709367678_025dbfe458c58951.png', 'Jamabalud/Jamabalud_1_1709367678_025dbfe458c58951.png', 'Jamabalud', '1'),
(93, 95, 'Screenshot 2023-06-14 141039.png', 'uploads/Screenshot 2023-06-14 141039.png', 'Jamabalud', '5');

-- --------------------------------------------------------

--
-- Table structure for table `folders`
--

CREATE TABLE `folders` (
  `folder_id` int(11) NOT NULL,
  `folder_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `folders`
--

INSERT INTO `folders` (`folder_id`, `folder_name`) VALUES
(95, 'Jamabalud');

-- --------------------------------------------------------

--
-- Table structure for table `landinfo`
--

CREATE TABLE `landinfo` (
  `land_id` int(11) NOT NULL,
  `district` varchar(50) DEFAULT NULL,
  `barangay` varchar(50) DEFAULT NULL,
  `section_no` varchar(50) DEFAULT NULL,
  `lot_no` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `classification` varchar(50) DEFAULT NULL,
  `kinds` varchar(50) DEFAULT NULL,
  `subclass` varchar(50) DEFAULT NULL,
  `assess_level` varchar(50) DEFAULT NULL,
  `unit_val` decimal(10,2) DEFAULT NULL,
  `assess_val` decimal(10,2) DEFAULT NULL,
  `market_val` decimal(10,2) DEFAULT NULL,
  `payables` decimal(10,2) DEFAULT NULL,
  `structures` int(10) DEFAULT NULL,
  `machinery` int(10) DEFAULT NULL,
  `cluster` varchar(50) DEFAULT NULL,
  `factors` varchar(50) DEFAULT NULL,
  `current_loc` text NOT NULL,
  `longitude` text NOT NULL,
  `latitude` text NOT NULL,
  `altitude` text NOT NULL,
  `accuracy` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `landinfo`
--

INSERT INTO `landinfo` (`land_id`, `district`, `barangay`, `section_no`, `lot_no`, `area`, `classification`, `kinds`, `subclass`, `assess_level`, `unit_val`, `assess_val`, `market_val`, `payables`, `structures`, `machinery`, `cluster`, `factors`, `current_loc`, `longitude`, `latitude`, `altitude`, `accuracy`, `date`) VALUES
(1, 'Pototan', 'Jamabalud', '', '0000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Low Value', '', '10.8865925, 122.6224100, 93, 8', '122.6224100', '10.8865925', ' 8', '93', '2024-04-21 13:20:13'),
(2, 'Pototan', 'Jamabalud', '9', '5590', '0.3114', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 41803.11, 238874.94, 836.06, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8925355, 122.6266680, 43, 11', '122.6266680', '10.8925355', ' 11', '43', '2024-04-22 08:13:01'),
(4, 'Pototan', 'Jamabalud', '9', '5590-B', '0.7576', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 58653.39, 335162.24, 1173.07, 0, 0, 'Low Value', 'National Roads, Water Resources, School', '10.8928163, 122.6151916, 48, 2', '122.6151916', '10.8928163', ' 2', '48', '2024-04-22 08:13:01'),
(5, 'Pototan', 'Jamabalud', '9', '5590-D', '0.0573', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1403.85, 28077.00, 28.08, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8840281, 122.6213269, 100, 6', '122.6213269', '10.8840281', ' 6', '100', '2024-04-21 13:20:13'),
(6, 'Pototan', 'Jamabalud', '9', '5590-E', '2.2425', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 301038.81, 1720221.75, 6020.78, 0, 0, 'High Value', 'Creeks, Water Resources, Markets', '10.8869045, 122.6153090, 43, 8', '122.6153090', '10.8869045', ' 8', '43', '2024-04-21 13:20:13'),
(7, 'Pototan', 'Jamabalud', '9', '5590-F', '1.222', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 164044.33, 937396.20, 3280.89, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8853570, 122.6141941, 41, 7', '122.6141941', '10.8853570', ' 7', '41', '2024-04-21 13:20:13'),
(8, 'Pototan', 'Jamabalud', '9', '5590-G', '0.085', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 2082.50, 41650.00, 41.65, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8815833, 122.6192670, 91, 1', '122.6192670', '10.8815833', ' 1', '91', '2024-04-21 13:20:13'),
(9, 'Pototan', 'Jamabalud', '9', '5591-F', '1.8618', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 249932.69, 1428186.78, 4998.65, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8938079, 122.6262848, 86, 7', '122.6262848', '10.8938079', ' 7', '86', '2024-04-21 13:20:13'),
(10, 'Pototan', 'Jamabalud', '9', '5623-C', '0.4168', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 55952.27, 319727.28, 1119.05, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8863337, 122.6304981, 96, 9', '122.6304981', '10.8863337', ' 9', '96', '2024-04-22 08:13:01'),
(11, 'Pototan', 'Jamabalud', '9', '5628', '1.99', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 267142.58, 1526529.00, 5342.85, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8966210, 122.6189530, 71, 5', '122.6189530', '10.8966210', ' 5', '71', '2024-04-21 13:20:13'),
(12, 'Pototan', 'Jamabalud', '9', '5626', '0.99', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 76645.80, 437976.00, 1532.92, 0, 0, 'Low Value', 'National Roads, School, Markets', '10.8853601, 122.6162493, 71, 10', '122.6162493', '10.8853601', ' 10', '71', '2024-04-22 08:13:01'),
(13, 'Pototan', 'Jamabalud', '9', '5624', '1.5135', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 203176.02, 1161005.85, 4063.52, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8859912, 122.6292009, 80, 7', '122.6292009', '10.8859912', ' 7', '80', '2024-04-21 13:20:13'),
(14, '5623-A', 'Jamabalud', '9', '5623-A', '2.0392', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 273747.31, 1564270.32, 5474.95, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8917268, 122.6150905, 57, 9', '122.6150905', '10.8917268', ' 9', '57', '2024-04-21 13:20:13'),
(15, 'Pototan', 'Jamabalud', '9', '5621', '0.761', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 95300.03, 544571.60, 1906.00, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8990043, 122.6273612, 55, 10', '122.6273612', '10.8990043', ' 10', '55', '2024-04-21 13:20:13'),
(16, 'Pototan', 'Jamabalud', '9', '5591-A', '0.99', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 132900.07, 759429.00, 2658.00, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8925678, 122.6295651, 86, 2', '122.6295651', '10.8925678', ' 2', '86', '2024-04-21 13:20:13'),
(17, 'Pototan', 'Jamabalud', '9', '5586', '8.3115', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 1115756.54, 6375751.65, 22315.13, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8838303, 122.6311435, 69, 5', '122.6311435', '10.8838303', ' 5', '69', '2024-04-21 13:20:13'),
(18, 'Pototan', 'Jamabalud', '9', '1-A', '0.01', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 245.00, 4900.00, 4.90, 0, 0, 'Low Value', 'National Roads, School, Markets', '10.8849314, 122.6143353, 47, 2', '122.6143353', '10.8849314', ' 2', '47', '2024-04-21 13:20:13'),
(19, 'Pototan', 'Jamabalud', '9', '5584', '1.1403', 'agriculture', 'coconut', '2', '0.175', 190300.00, 37974.84, 216999.09, 759.50, 0, 0, 'Low Value', 'Creeks, Water Resources', '10.8894403, 122.6124231, 97, 7', '122.6124231', '10.8894403', ' 7', '97', '2024-04-22 08:13:01'),
(20, 'Pototan', 'Jamabalud', '9', '5580-A', '1.1896', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 92098.83, 526279.04, 1841.98, 0, 0, 'High Value', 'National Roads, Creeks, School, Markets', '10.8814519, 122.6155638, 96, 2', '122.6155638', '10.8814519', ' 2', '96', '2024-04-21 13:20:13'),
(21, 'Pototan', 'Jamabalud', '9', '5592', '1.7493', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 234830.41, 1341888.03, 4696.61, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8924410, 122.6158593, 62, 2', '122.6158593', '10.8924410', ' 2', '62', '2024-04-21 13:20:13'),
(22, 'Pototan', 'Jamabalud', '9', '5591-B', '1.4148', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 177175.40, 1012430.88, 3543.51, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8859104, 122.6309060, 46, 7', '122.6309060', '10.8859104', ' 7', '46', '2024-04-21 13:20:13'),
(23, 'Pototan', 'Jamabalud', '9', '5591-C', '1.443', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 193711.93, 1106925.30, 3874.24, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8926797, 122.6166734, 72, 10', '122.6166734', '10.8926797', ' 10', '72', '2024-04-21 13:20:13'),
(24, 'Pototan', 'Jamabalud', '9', '5593-A-2', '1.5', 'agriculture', 'upland', '1', '0.175', 162600.00, 42682.50, 243900.00, 853.65, 0, 0, 'Low Value', 'Creeks, Water Resources', '10.8922307, 122.6213827, 87, 5', '122.6213827', '10.8922307', ' 5', '87', '2024-04-22 08:13:01'),
(25, 'Pototan', 'Jamabalud', '9', '5593-C', '1.317', 'agriculture', 'upland', '1', '0.175', 162600.00, 37475.24, 214144.20, 749.50, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources', '10.8908247, 122.6203506, 84, 4', '122.6203506', '10.8908247', ' 4', '84', '2024-04-22 08:13:01'),
(26, 'Pototan', 'Jamabalud', '9', '5593-D', '0.2541', 'agriculture', 'irrigated', '', '0.175', 767100.00, 34111.02, 194920.11, 682.22, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8855748, 122.6189473, 50, 8', '122.6189473', '10.8855748', ' 8', '50', '2024-04-21 13:20:13'),
(27, 'Pototan', 'Jamabalud', '10', '5597-A-2-A', '0.0257', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 629.65, 12593.00, 12.59, 0, 0, 'Low Value', 'Creeks, School, Markets', '10.8850528, 122.6156220, 65, 5', '122.6156220', '10.8850528', ' 5', '65', '2024-04-21 13:20:13'),
(28, 'Pototan', 'Jamabalud', '10', '5597-A-2-B', '2.0068', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 251311.56, 1436066.08, 5026.23, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, Markets', '10.8973038, 122.6299438, 49, 11', '122.6299438', '10.8973038', ' 11', '49', '2024-04-21 13:20:13'),
(29, 'Pototan', 'Jamabalud', '10', '5597-A-1', '0.025', 'residential', 'pototan1', 'R2', '0.05', 4300.00, 537.50, 10750.00, 10.75, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8987557, 122.6212235, 85, 4', '122.6212235', '10.8987557', ' 4', '85', '2024-04-21 13:20:13'),
(30, 'Pototan', 'Jamabalud', '10', '5599', '2.6443', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 331145.69, 1892261.08, 6622.91, 0, 0, 'High Value', 'Creeks, Water Resources, School', '10.8893137, 122.6160462, 93, 8', '122.6160462', '10.8893137', ' 8', '93', '2024-04-21 13:20:13'),
(31, 'Pototan', 'Jamabalud', '10', '5600-A', '0.9708', 'agriculture', 'coconut', '1', '0.175', 217500.00, 36951.07, 211149.00, 739.02, 0, 0, 'Low Value', 'Creeks, Water Resources', '10.8963830, 122.6290836, 45, 8', '122.6290836', '10.8963830', ' 8', '45', '2024-04-21 13:20:13'),
(32, 'Pototan', 'Jamabalud', '10', '5600-B', '2.2', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 295333.50, 1687620.00, 5906.67, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School', '10.8883621, 122.6266290, 80, 1', '122.6266290', '10.8883621', ' 1', '80', '2024-04-21 13:20:13'),
(34, 'Pototan', 'Jamabalud', '10', '5600-C', '1.1566', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 155264.88, 887227.86, 3105.30, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, Markets', '10.8845627, 122.6286895, 85, 3', '122.6286895', '10.8845627', ' 3', '85', '2024-04-21 13:20:13'),
(35, 'Pototan', 'Jamabalud', '10', '5600-D', '0.0326', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 798.70, 15974.00, 15.97, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8910641, 122.6142354, 50, 5', '122.6142354', '10.8910641', ' 5', '50', '2024-04-21 13:20:13'),
(36, 'Pototan', 'Jamabalud', '10', '5600-F', '4.47', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 559778.10, 3198732.00, 11195.56, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources', '10.8888253, 122.6295793, 60, 10', '122.6295793', '10.8888253', ' 10', '60', '2024-04-21 13:20:13'),
(37, 'Pototan', 'Jamabalud', '10', '5601-A', '3', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 402727.50, 2301300.00, 8054.55, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School', '10.8942669, 122.6233371, 98, 11', '122.6233371', '10.8942669', ' 11', '98', '2024-04-21 13:20:13'),
(38, 'Pototan', 'Jamabalud', '10', '5601-B', '1.2536', 'agriculture', 'nonirrigated', '2', '0.175', 405500.00, 88958.59, 508334.80, 1779.17, 0, 0, 'Mid Value', 'National Roads, Creeks', '10.8821087, 122.6194058, 88, 9', '122.6194058', '10.8821087', ' 9', '88', '2024-04-21 13:20:13'),
(39, 'Pototan', 'Jamabalud', '10', '5531-C', '0.0998', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 13397.40, 76556.58, 267.95, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8819336, 122.6198710, 97, 5', '122.6198710', '10.8819336', ' 5', '97', '2024-04-21 13:20:13'),
(40, 'Pototan', 'Jamabalud', '10', '5531-B', '0.0541', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 6774.94, 38713.96, 135.50, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8918491, 122.6119713, 69, 4', '122.6119713', '10.8918491', ' 4', '69', '2024-04-21 13:20:13'),
(41, 'Pototan', 'Jamabalud', '10', '5531-A', '0.1243', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 3045.35, 60907.00, 60.91, 0, 0, 'Low Value', 'National Roads, School, Markets', '10.8889593, 122.6199628, 95, 4', '122.6199628', '10.8889593', ' 4', '95', '2024-04-21 13:20:13'),
(42, 'Pototan', 'Jamabalud', '10', '5532', '0.51', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 68463.68, 391221.00, 1369.27, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8868326, 122.6167855, 66, 5', '122.6167855', '10.8868326', ' 5', '66', '2024-04-22 08:13:01'),
(43, 'Pototan', 'Jamabalud', '10', '5538-A PT.', '1.3152', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 176555.74, 1008889.92, 3531.11, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8821229, 122.6241564, 99, 11', '122.6241564', '10.8821229', ' 11', '99', '2024-04-21 13:20:13'),
(44, 'Pototan', 'Jamabalud', '10', '5538, 5539 PT.', '2.29', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 307415.32, 1756659.00, 6148.31, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8872851, 122.6239604, 50, 10', '122.6239604', '10.8872851', ' 10', '50', '2024-04-21 13:20:13'),
(45, 'Pototan', 'Jamabalud', '11', '5629-C', '0.7511', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 100829.54, 576168.81, 2016.59, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8913044, 122.6297928, 41, 4', '122.6297928', '10.8913044', ' 4', '41', '2024-04-21 13:20:13'),
(46, 'Pototan', 'Jamabalud', '11', '5629-D', '1.2057', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 161856.18, 924892.47, 3237.12, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, Markets', '10.8909222, 122.6240866, 79, 4', '122.6240866', '10.8909222', ' 4', '79', '2024-04-21 13:20:13'),
(47, 'Pototan', 'Jamabalud', '11', '5629-K', '0.0998', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 2445.10, 48902.00, 48.90, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8948590, 122.6215122, 65, 6', '122.6215122', '10.8948590', ' 6', '65', '2024-04-21 13:20:13'),
(48, 'Pototan', 'Jamabalud', '11', '5629-H', '1.9', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 255060.75, 1457490.00, 5101.21, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School', '10.8940607, 122.6191874, 97, 7', '122.6191874', '10.8940607', ' 7', '97', '2024-04-21 13:20:13'),
(49, 'Pototan', 'Jamabalud', '11', '5629-I', '1.7943', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 240871.32, 1376407.53, 4817.43, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School', '10.8815048, 122.6209814, 57, 11', '122.6209814', '10.8815048', ' 11', '57', '2024-04-21 13:20:13'),
(50, 'Pototan', 'Jamabalud', '11', '5629-J', '0.078', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1911.00, 38220.00, 38.22, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8806220, 122.6131496, 68, 1', '122.6131496', '10.8806220', ' 1', '68', '2024-04-21 13:20:13'),
(52, 'Pototan', 'Jamabalud', '11', '5617-A-4', '1.6788', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 225366.31, 1287807.48, 4507.33, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School', '10.8811911, 122.6249618, 60, 7', '122.6249618', '10.8811911', ' 7', '60', '2024-04-21 13:20:13'),
(53, 'Pototan', 'Jamabalud', '11', '5617-B-5', '3.0125', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 404405.53, 2310888.75, 8088.11, 0, 0, 'High Value', 'Creeks, Water Resources, Markets', '10.8924219, 122.6205637, 73, 4', '122.6205637', '10.8924219', ' 4', '73', '2024-04-21 13:20:13'),
(54, 'Pototan', 'Jamabalud', '11', '5617-B-3', '1.4995', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 201296.63, 1150266.45, 4025.93, 0, 0, 'Mid Value', 'Creeks, Water Resources', '10.8994566, 122.6305050, 98, 11', '122.6305050', '10.8994566', ' 11', '98', '2024-04-21 13:20:13'),
(55, 'Pototan', 'Jamabalud', '11', '5617-B-4', '1.7347', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 217236.48, 1241351.32, 4344.73, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.9005394, 122.6120139, 51, 9', '122.6120139', '10.9005394', ' 9', '51', '2024-04-21 13:20:13'),
(56, 'Pototan', 'Jamabalud', '11', '5517-D', '0.4531', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 56741.71, 324238.36, 1134.83, 0, 0, 'Low Value', 'Creeks, Water Resources', '10.8916615, 122.6232834, 60, 10', '122.6232834', '10.8916615', ' 10', '60', '2024-04-22 08:13:01'),
(57, 'Pototan', 'Jamabalud', '11', '5517-B-2', '2.6492', 'agriculture', 'coconut', '1', '0.175', 217500.00, 100835.17, 576201.00, 2016.70, 0, 0, 'High Value', 'Creeks, Water Resources, Markets', '10.8901253, 122.6279118, 83, 2', '122.6279118', '10.8901253', ' 2', '83', '2024-04-21 13:20:13'),
(58, 'Pototan', 'Jamabalud', '11', '5517-B-1', '2.9241', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 392538.49, 2243077.11, 7850.77, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources', '10.8921767, 122.6223904, 42, 6', '122.6223904', '10.8921767', ' 6', '42', '2024-04-21 13:20:13'),
(59, 'Pototan', 'Jamabalud', '11', '5517-C', '2.6307', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 329442.56, 1882528.92, 6588.85, 0, 0, 'High Value', 'National Roads, Creeks, School, Markets', '10.8900537, 122.6308264, 68, 5', '122.6308264', '10.8900537', ' 5', '68', '2024-04-21 13:20:13'),
(60, 'Pototan', 'Jamabalud', '11', '5618-A', '2.7523', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 344670.53, 1969545.88, 6893.41, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School', '10.9004118, 122.6309365, 96, 8', '122.6309365', '10.9004118', ' 8', '96', '2024-04-21 13:20:13'),
(61, 'Pototan', 'Jamabalud', '11', '5618-B', '0.085', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 11410.61, 65203.50, 228.21, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8984861, 122.6162544, 73, 1', '122.6162544', '10.8984861', ' 1', '73', '2024-04-21 13:20:13'),
(62, 'Pototan', 'Jamabalud', '11', '5619-D', '2.1878', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 293695.74, 1678261.38, 5873.91, 0, 0, 'High Value', 'Creeks, Water Resources, School, Markets', '10.8993845, 122.6222283, 95, 10', '122.6222283', '10.8993845', ' 10', '95', '2024-04-21 13:20:13'),
(63, 'Pototan', 'Jamabalud', '11', '5619-C', '2.3873', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 320477.12, 1831297.83, 6409.54, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8897938, 122.6136745, 53, 8', '122.6136745', '10.8897938', ' 8', '53', '2024-04-21 13:20:13'),
(64, 'Pototan', 'Jamabalud', '11', '5619-A', '2.1812', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 292809.74, 1673198.52, 5856.19, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8907798, 122.6200870, 80, 1', '122.6200870', '10.8907798', ' 1', '80', '2024-04-21 13:20:13'),
(65, 'Pototan', 'Jamabalud', '11', '5619-B', '0.0873', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 11719.37, 66967.83, 234.39, 0, 0, 'Low Value', 'Creeks, Water Resources, School', '10.8834973, 122.6239359, 83, 8', '122.6239359', '10.8834973', ' 8', '83', '2024-04-21 13:20:13'),
(66, 'Pototan', 'Jamabalud', '12', '1', '0.4551', 'agriculture', 'nonirrigated', '2', '0.175', 405500.00, 32295.03, 184543.05, 645.90, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8957012, 122.6203633, 40, 7', '122.6203633', '10.8957012', ' 7', '40', '2024-04-21 13:20:13'),
(67, 'Pototan', 'Jamabalud', '12', '3', '0.288', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 7056.00, 141120.00, 141.12, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8935920, 122.6311912, 41, 2', '122.6311912', '10.8935920', ' 2', '41', '2024-04-21 13:20:13'),
(68, 'Pototan', 'Jamabalud', '12', '4', '0.079', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1935.50, 38710.00, 38.71, 0, 0, 'Low Value', 'National Roads, Creeks, Markets', '10.8862218, 122.6194854, 52, 9', '122.6194854', '10.8862218', ' 9', '52', '2024-04-21 13:20:13'),
(69, 'Pototan', 'Jamabalud', '12', '5', '2.155', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 289292.59, 1653100.50, 5785.85, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School', '10.8989994, 122.6293331, 85, 1', '122.6293331', '10.8989994', ' 1', '85', '2024-04-21 13:20:13'),
(70, 'Pototan', 'Jamabalud', '12', '6', '1.1124', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 139305.85, 796033.44, 2786.12, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, Markets', '10.8962974, 122.6130088, 44, 2', '122.6130088', '10.8962974', ' 2', '44', '2024-04-21 13:20:13'),
(71, 'Pototan', 'Jamabalud', '12', '7', '4.0163', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 539158.15, 3080903.73, 10783.16, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School', '10.8840371, 122.6281221, 81, 10', '122.6281221', '10.8840371', ' 10', '81', '2024-04-21 13:20:13'),
(72, 'Pototan', 'Jamabalud', '12', '8', '1.5353', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 206102.51, 1177728.63, 4122.05, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8815711, 122.6183081, 76, 11', '122.6183081', '10.8815711', ' 11', '76', '2024-04-21 13:20:13'),
(73, 'Pototan', 'Jamabalud', '12', '9', '3.1177', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 418527.84, 2391587.67, 8370.56, 0, 0, 'High Value', 'National Roads, Water Resources, School, Markets', '10.8974098, 122.6203455, 84, 4', '122.6203455', '10.8974098', ' 4', '84', '2024-04-21 13:20:13'),
(74, 'Pototan', 'Jamabalud', '12', '10', '0.9903', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 132940.35, 759659.13, 2658.81, 0, 0, 'High Value', 'National Roads, Water Resources, School, Markets', '10.8830811, 122.6182888, 63, 9', '122.6182888', '10.8830811', ' 9', '63', '2024-04-21 13:20:13'),
(75, 'Pototan', 'Jamabalud', '12', '11', '1.322', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 165554.06, 946023.20, 3311.08, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8816489, 122.6192406, 90, 10', '122.6192406', '10.8816489', ' 10', '90', '2024-04-24 13:33:16'),
(76, 'Pototan', 'Jamabalud', '12', '14', '0.205', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 27519.71, 157255.50, 550.39, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8844769, 122.6236096, 70, 7', '122.6236096', '10.8844769', ' 7', '70', '2024-04-21 13:20:13'),
(77, 'Pototan', 'Jamabalud', '12', '16', '0.1368', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 18364.37, 104939.28, 367.29, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8903955, 122.6280336, 83, 2', '122.6280336', '10.8903955', ' 2', '83', '2024-04-21 13:20:13'),
(78, 'Pototan', 'Jamabalud', '12', '5616', '0.36', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 48327.30, 276156.00, 966.55, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8828704, 122.6229888, 75, 3', '122.6229888', '10.8828704', ' 3', '75', '2024-04-22 08:13:01'),
(79, 'Pototan', 'Jamabalud', '12', '5615', '2.9', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 389303.25, 2224590.00, 7786.07, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, Markets', '10.8899598, 122.6216160, 51, 4', '122.6216160', '10.8899598', ' 4', '51', '2024-04-21 13:20:13'),
(80, 'Pototan', 'Jamabalud', '12', '5614', '24.1006', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 3235324.80, 18487570.26, 64706.50, 0, 0, 'High Value', 'National Roads, Water Resources, School, Markets', '10.8910710, 122.6165679, 85, 10', '122.6165679', '10.8910710', ' 10', '85', '2024-04-21 13:20:13'),
(81, 'Pototan', 'Jamabalud', '12', '3642', '1.4759', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 198128.51, 1132162.89, 3962.57, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8951889, 122.6303367, 74, 11', '122.6303367', '10.8951889', ' 11', '74', '2024-04-21 13:20:13'),
(82, 'Pototan', 'Jamabalud', '12', '5630-B', '4.3438', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 583122.57, 3332128.98, 11662.45, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8896619, 122.6242616, 93, 6', '122.6242616', '10.8896619', ' 6', '93', '2024-04-21 13:20:13'),
(83, 'Pototan', 'Jamabalud', '12', '5632', '0.6454', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 86640.11, 495086.34, 1732.80, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources', '10.8938654, 122.6299478, 80, 7', '122.6299478', '10.8938654', ' 7', '80', '2024-04-21 13:20:13'),
(84, 'Pototan', 'Jamabalud', '12', '5629-A', '1.56', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 209418.30, 1196676.00, 4188.37, 0, 0, 'Mid Value', 'Creeks, Water Resources', '10.8902455, 122.6153769, 74, 4', '122.6153769', '10.8902455', ' 4', '74', '2024-04-21 13:20:13'),
(85, 'Pototan', 'Jamabalud', '7', '6111', '1.80', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 241636.50, 1380780.00, 4832.73, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8960034, 122.6163533, 97, 1', '122.6163533', '10.8960034', ' 1', '97', '2024-04-21 13:20:13'),
(86, 'Pototan', 'Jamabalud', '7', '6110-A', '0.63', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 84572.77, 483273.00, 1691.46, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8886041, 122.6185508, 77, 11', '122.6185508', '10.8886041', ' 11', '77', '2024-04-22 08:13:01'),
(87, 'Pototan', 'Jamabalud', '7', '6110-B', '1.66', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 222842.55, 1273386.00, 4456.85, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8811584, 122.6157217, 41, 5', '122.6157217', '10.8811584', ' 5', '41', '2024-04-21 13:20:13'),
(88, 'Pototan', 'Jamabalud', '7', '6110-C', '1.86', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 249691.05, 1426806.00, 4993.82, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8838089, 122.6206388, 91, 10', '122.6206388', '10.8838089', ' 10', '91', '2024-04-21 13:20:13'),
(89, 'Pototan', 'Jamabalud', '7', '6067-A', '2.252', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 282017.96, 1611531.20, 5640.36, 0, 0, 'High Value', 'Creeks, Water Resources, School', '10.8826052, 122.6212421, 51, 5', '122.6212421', '10.8826052', ' 5', '51', '2024-04-21 13:20:13'),
(90, 'Pototan', 'Jamabalud', '7', '6066', '1.2394', 'agriculture', 'upland', '1', '0.175', 162600.00, 35267.13, 201526.44, 705.34, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8857311, 122.6302543, 98, 1', '122.6302543', '10.8857311', ' 1', '98', '2024-04-21 13:20:13'),
(91, 'Pototan', 'Jamabalud', '7', '6067-B', '2.1028', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 282285.13, 1613057.88, 5645.70, 0, 0, 'High Value', 'Creeks, Water Resources, Markets', '10.8927587, 122.6261471, 93, 3', '122.6261471', '10.8927587', ' 3', '93', '2024-04-21 13:20:13'),
(92, 'Pototan', 'Jamabalud', '7', '6063', '0.06', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1470.00, 29400.00, 29.40, 0, 0, 'Low Value', 'National Roads, Creeks, School', '10.8895740, 122.6219116, 58, 10', '122.6219116', '10.8895740', ' 10', '58', '2024-04-21 13:20:13'),
(93, 'Pototan', 'Jamabalud', '7', '6062-C', '2.13', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 285936.52, 1633923.00, 5718.73, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.9001340, 122.6142286, 88, 7', '122.6142286', '10.9001340', ' 7', '88', '2024-04-21 13:20:13'),
(94, 'Pototan', 'Jamabalud', '7', '6062-A', '0.0583', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1428.35, 28567.00, 28.57, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8865443, 122.6220537, 88, 5', '122.6220537', '10.8865443', ' 5', '88', '2024-04-21 13:20:13'),
(95, 'Pototan', 'Jamabalud', '7', '6061', '0.1652', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 4047.40, 80948.00, 80.95, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8871386, 122.6293789, 72, 11', '122.6293789', '10.8871386', ' 11', '72', '2024-04-21 13:20:13'),
(96, 'Pototan', 'Jamabalud', '7', '6062-B', '0.0316', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 4242.06, 24240.36, 84.84, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8898741, 122.6154224, 78, 7', '122.6154224', '10.8898741', ' 7', '78', '2024-04-21 13:20:13'),
(97, 'Pototan', 'Jamabalud', '7', '6064', '0.8207', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 110172.82, 629558.97, 2203.46, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8964211, 122.6138675, 56, 11', '122.6138675', '10.8964211', ' 11', '56', '2024-04-21 13:20:13'),
(98, 'Pototan', 'Jamabalud', '7', '6065', '0.7208', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 96761.99, 552925.68, 1935.24, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.9003278, 122.6124281, 59, 5', '122.6124281', '10.9003278', ' 5', '59', '2024-04-21 13:20:13'),
(99, 'Pototan', 'Jamabalud', '8', '5640-A', '0.4037', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 54193.70, 309678.27, 1083.87, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8987887, 122.6228810, 50, 2', '122.6228810', '10.8987887', ' 2', '50', '2024-04-22 08:13:01'),
(100, 'Pototan', 'Jamabalud', '8', '5640-B', '0.4038', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 54207.12, 309754.98, 1084.14, 0, 0, 'Low Value', 'National Roads, Water Resources, Markets', '10.9003432, 122.6241598, 55, 4', '122.6241598', '10.9003432', ' 4', '55', '2024-04-22 08:13:01'),
(101, 'Pototan', 'Jamabalud', '8', '5640-D', '0.4037', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 54193.70, 309678.27, 1083.87, 0, 0, 'Low Value', 'Creeks, Water Resources, School', '10.8992270, 122.6241342, 65, 2', '122.6241342', '10.8992270', ' 2', '65', '2024-04-22 08:13:01'),
(102, 'Pototan', 'Jamabalud', '8', '5633-D', '0.4641', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 58119.24, 332109.96, 1162.38, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources', '10.8817322, 122.6278875, 99, 5', '122.6278875', '10.8817322', ' 5', '99', '2024-04-22 08:13:01'),
(103, 'Pototan', 'Jamabalud', '8', '5533-H', '2.3839', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 184561.54, 1054637.36, 3691.23, 0, 0, 'High Value', 'National Roads, Creeks, School, Markets', '10.8903712, 122.6185798, 61, 8', '122.6185798', '10.8903712', ' 8', '61', '2024-04-21 13:20:13'),
(104, 'Pototan', 'Jamabalud', '8', '5934', '2.6849', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 360427.69, 2059586.79, 7208.55, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8966934, 122.6229090, 69, 8', '122.6229090', '10.8966934', ' 8', '69', '2024-04-21 13:20:13'),
(105, 'Pototan', 'Jamabalud', '8', '5633-I', '0.0437', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1070.65, 21413.00, 21.41, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8946615, 122.6117868, 41, 11', '122.6117868', '10.8946615', ' 11', '41', '2024-04-21 13:20:13'),
(106, 'Pototan', 'Jamabalud', '8', '5633-E', '1.9933', 'agriculture', 'nonirrigated', '2', '0.175', 405500.00, 141449.55, 808283.15, 2828.99, 0, 0, 'Mid Value', 'National Roads, Creeks', '10.8816923, 122.6129322, 55, 11', '122.6129322', '10.8816923', ' 11', '55', '2024-04-21 13:20:13'),
(107, 'Pototan', 'Jamabalud', '8', '5633-B', '2.1864', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 293507.80, 1677187.44, 5870.16, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8825071, 122.6254264, 55, 2', '122.6254264', '10.8825071', ' 2', '55', '2024-04-21 13:20:13'),
(108, 'Pototan', 'Jamabalud', '8', '5633-C', '0.0431', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1055.95, 21119.00, 21.12, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8967388, 122.6254715, 47, 6', '122.6254715', '10.8967388', ' 6', '47', '2024-04-21 13:20:13'),
(109, 'Pototan', 'Jamabalud', '8', '5633-A', '0.1002', 'agriculture', 'coconut', '1', '0.175', 217500.00, 3813.86, 21793.50, 76.28, 0, 0, 'Low Value', 'National Roads, Water Resources, School, Markets', '10.8966245, 122.6176108, 50, 10', '122.6176108', '10.8966245', ' 10', '50', '2024-04-21 13:20:13'),
(110, 'Pototan', 'Jamabalud', '8', '5633-H', '0.0264', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 646.80, 12936.00, 12.94, 0, 0, 'Low Value', 'National Roads, School, Markets', '10.8897965, 122.6174161, 49, 9', '122.6174161', '10.8897965', ' 9', '49', '2024-04-21 13:20:13'),
(111, 'Pototan', 'Jamabalud', '8', '5633-G', '0.9794', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 131477.10, 751297.74, 2629.54, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8835670, 122.6275633, 77, 8', '122.6275633', '10.8835670', ' 8', '77', '2024-04-21 13:20:13'),
(112, 'Pototan', 'Jamabalud', '3', '5982', '0.14', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 3430.00, 68600.00, 68.60, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8968706, 122.6147690, 66, 7', '122.6147690', '10.8968706', ' 7', '66', '2024-04-21 13:20:13'),
(113, 'Pototan', 'Jamabalud', '3', '5981', '0.1597', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 4136.23, 23635.60, 82.72, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8999223, 122.6286847, 67, 7', '122.6286847', '10.8999223', ' 7', '67', '2024-04-21 13:20:13'),
(114, 'Pototan', 'Jamabalud', '3', '11', '0.0691', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1692.95, 33859.00, 33.86, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8857300, 122.6200707, 65, 9', '122.6200707', '10.8857300', ' 9', '65', '2024-04-24 13:33:16'),
(115, 'Pototan', 'Jamabalud', '3', '12', '0.099', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 2425.50, 48510.00, 48.51, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8952318, 122.6164462, 46, 8', '122.6164462', '10.8952318', ' 8', '46', '2024-04-21 13:20:13'),
(116, 'Pototan', 'Jamabalud', '3', '13', '0.0779', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1908.55, 38171.00, 38.17, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8837910, 122.6260362, 52, 9', '122.6260362', '10.8837910', ' 9', '52', '2024-04-21 13:20:13'),
(117, 'Pototan', 'Jamabalud', '3', '25', '0.3174', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 42608.57, 243477.54, 852.17, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8814442, 122.6196382, 97, 6', '122.6196382', '10.8814442', ' 6', '97', '2024-04-24 13:33:17'),
(118, 'Pototan', 'Jamabalud', '3', '5977', '0.1051', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 2574.95, 51499.00, 51.50, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8971742, 122.6129292, 95, 5', '122.6129292', '10.8971742', ' 5', '95', '2024-04-21 13:20:13'),
(119, 'Pototan', 'Jamabalud', '3', '5976', '0.0938', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 2298.10, 45962.00, 45.96, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8954649, 122.6156964, 92, 8', '122.6156964', '10.8954649', ' 8', '92', '2024-04-21 13:20:13'),
(120, 'Pototan', 'Jamabalud', '3', '5975', '0.0939', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 2300.55, 46011.00, 46.01, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8897615, 122.6222424, 62, 3', '122.6222424', '10.8897615', ' 3', '62', '2024-04-21 13:20:13'),
(121, 'Pototan', 'Jamabalud', '3', '5974', '0.1239', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 3209.01, 18337.20, 64.18, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8816807, 122.6249893, 56, 3', '122.6249893', '10.8816807', ' 3', '56', '2024-04-21 13:20:13'),
(122, 'Pototan', 'Jamabalud', '3', '5980', '0.7159', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 17539.55, 350791.00, 350.79, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8814800, 122.6140095, 73, 4', '122.6140095', '10.8814800', ' 4', '73', '2024-04-22 08:13:01'),
(123, 'Pototan', 'Jamabalud', '3', '24', '0.0605', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 1482.25, 29645.00, 29.64, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8869351, 122.6119207, 52, 10', '122.6119207', '10.8869351', ' 10', '52', '2024-04-21 13:20:13'),
(124, 'Pototan', 'Jamabalud', '3', '31', '0.2917', 'agriculture', 'nonirrigated', '2', '0.175', 405500.00, 20699.76, 118284.35, 414.00, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8894688, 122.6211940, 49, 3', '122.6211940', '10.8894688', ' 3', '49', '2024-04-21 13:20:13'),
(125, 'Pototan', 'Jamabalud', '3', '30', '1.4607', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 196088.02, 1120502.97, 3921.76, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8927901, 122.6240728, 62, 10', '122.6240728', '10.8927901', ' 10', '62', '2024-04-21 13:20:13'),
(126, 'Pototan', 'Jamabalud', '3', '5947-B-16', '0.03', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 735.00, 14700.00, 14.70, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8831758, 122.6208417, 100, 7', '122.6208417', '10.8831758', ' 7', '100', '2024-04-21 13:20:13'),
(127, 'Pototan', 'Jamabalud', '1', '15 6009 PT.', '1.0488', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 140793.53, 804534.48, 2815.87, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8941388, 122.6210196, 64, 6', '122.6210196', '10.8941388', ' 6', '64', '2024-04-24 10:38:52'),
(128, 'Pototan', 'Jamabalud', '1', '17 6009 PT.', '0.3663', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 49173.03, 280988.73, 983.46, 0, 0, 'Low Value', 'Market, School, National Road, Creeks, Water Resou', '10.8837955, 122.6236531, 77, 3', '122.6236531', '10.8837955', ' 3', '77', '2024-04-22 08:13:01'),
(129, 'Pototan', 'Jamabalud', '1', '13 (6009PT.)', '1.20703', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 162034.72, 925912.71, 3240.69, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8899363, 122.6289850, 41, 6', '122.6289850', '10.8899363', ' 6', '41', '2024-04-21 13:20:13'),
(130, 'Pototan', 'Jamabalud', '1', '6029-C', '1.71', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 229554.67, 1311741.00, 4591.09, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8897911, 122.6118264, 85, 8', '122.6118264', '10.8897911', ' 8', '85', '2024-04-21 13:20:13'),
(131, 'Pototan', 'Jamabalud', '1', '20 (6009PT.)', '1.206', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 161896.45, 925122.60, 3237.93, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8831266, 122.6295869, 52, 3', '122.6295869', '10.8831266', ' 3', '52', '2024-04-21 13:20:13'),
(132, 'Pototan', 'Jamabalud', '1', '19 (6009PT.)', '1.2233', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 164218.85, 938393.43, 3284.38, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8832377, 122.6129838, 42, 10', '122.6129838', '10.8832377', ' 10', '42', '2024-04-21 13:20:13'),
(134, 'Pototan', 'Jamabalud', '1', '2', '0.9449', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 126845.74, 724832.79, 2536.91, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8864781, 122.6282524, 61, 3', '122.6282524', '10.8864781', ' 3', '61', '2024-04-24 10:38:52'),
(136, 'Pototan', 'Jamabalud', '1', '6037-A', '2.9901', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 401398.50, 2293705.71, 8027.97, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8889596, 122.6258749, 63, 9', '122.6258749', '10.8889596', ' 9', '63', '2024-04-21 13:20:13'),
(137, 'Pototan', 'Jamabalud', '1', '6037-B', '1.357', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 182167.07, 1040954.70, 3643.34, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8934802, 122.6299410, 84, 9', '122.6299410', '10.8934802', ' 9', '84', '2024-04-21 13:20:13'),
(138, 'Pototan', 'Jamabalud', '1', '6035', '0.3589', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 48179.63, 275312.19, 963.59, 0, 0, 'Low Value', 'Market, School, National Road, Creeks, Water Resou', '10.8965810, 122.6229117, 70, 9', '122.6229117', '10.8965810', ' 9', '70', '2024-04-22 08:13:02'),
(139, 'Pototan', 'Jamabalud', '1', '6034', '0.5575', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 69815.72, 398947.00, 1396.31, 0, 0, 'Low Value', 'Market, School, National Road, Creeks, Water Resou', '10.8933547, 122.6276978, 51, 6', '122.6276978', '10.8933547', ' 6', '51', '2024-04-22 08:13:02'),
(140, 'Pototan', 'Jamabalud', '1', '6052-B', '1.8081', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 242723.86, 1386993.51, 4854.48, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8830684, 122.6132250, 47, 4', '122.6132250', '10.8830684', ' 4', '47', '2024-04-21 13:20:13'),
(141, 'Pototan', 'Jamabalud', '1', '6052-A', '1.7194', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 230816.55, 1318951.74, 4616.33, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8910532, 122.6310092, 62, 9', '122.6310092', '10.8910532', ' 9', '62', '2024-04-21 13:20:13'),
(142, 'Pototan', 'Jamabalud', '1', '7 (6051 PT.)', '0.9566', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 128416.38, 733807.86, 2568.33, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8918518, 122.6119694, 69, 4', '122.6119694', '10.8918518', ' 4', '69', '2024-04-24 10:38:52'),
(143, 'Pototan', 'Jamabalud', '1', '6 (6051 PT.)', '0.9366', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 125731.53, 718465.86, 2514.63, 0, 0, 'High Value', 'Market, School, National Road, Creeks, Water Resou', '10.8869073, 122.6164387, 60, 10', '122.6164387', '10.8869073', ' 10', '60', '2024-04-24 10:38:52'),
(144, 'Pototan', 'Jamabalud', '4', '5947 PT.', '1.38', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 185254.65, 1058598.00, 3705.09, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8812902, 122.6127603, 56, 2', '122.6127603', '10.8812902', ' 2', '56', '2024-04-21 13:20:13'),
(145, 'Pototan', 'Jamabalud', '4', '5947-B-3', '0.9465', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 127060.53, 726060.15, 2541.21, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8970554, 122.6197382, 78, 10', '122.6197382', '10.8970554', ' 10', '78', '2024-04-21 13:20:13'),
(146, 'Pototan', 'Jamabalud', '4', '5947-B-4', '2.4432', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 305961.94, 1748353.92, 6119.24, 0, 0, 'High Value', 'National Roads, Creeks, Markets', '10.8961672, 122.6127115, 41, 10', '122.6127115', '10.8961672', ' 10', '41', '2024-04-21 13:20:13'),
(147, 'Pototan', 'Jamabalud', '4', '5947-B-5', '0.1426', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 19142.98, 109388.46, 382.86, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8872541, 122.6119376, 50, 8', '122.6119376', '10.8872541', ' 8', '50', '2024-04-21 13:20:13'),
(148, 'Pototan', 'Jamabalud', '4', '5947-B-7', '0.0607', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 8148.52, 46562.97, 162.97, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8820047, 122.6156743, 93, 9', '122.6156743', '10.8820047', ' 9', '93', '2024-04-21 13:20:13'),
(149, 'Pototan', 'Jamabalud', '4', '5947-B-10', '0.0726', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 5620.69, 32118.24, 112.41, 0, 0, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8937734, 122.6118476, 50, 8', '122.6118476', '10.8937734', ' 8', '50', '2024-04-21 13:20:13'),
(150, 'Pototan', 'Jamabalud', '4', '5949', '0.29', 'agriculture', 'coconut', '1', '0.175', 217500.00, 11038.13, 63075.00, 220.76, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources', '10.8834446, 122.6200330, 85, 6', '122.6200330', '10.8834446', ' 6', '85', '2024-04-21 13:20:13'),
(151, 'Pototan', 'Jamabalud', '5', '5969', '0.1585', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 4105.15, 23458.00, 82.10, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, Markets', '10.9002560, 122.6127324, 65, 9', '122.6127324', '10.9002560', ' 9', '65', '2024-04-21 13:20:13'),
(152, 'Pototan', 'Jamabalud', '5', '5967-B', '0.08', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 2072.00, 11840.00, 41.44, 0, 0, 'Low Value', 'National Roads, Water Resources, School, Markets', '10.8976083, 122.6268750, 61, 5', '122.6268750', '10.8976083', ' 5', '61', '2024-04-21 13:20:13'),
(153, 'Pototan', 'Jamabalud', '5', '5967-A', '0.117', 'agriculture', 'coconut', '1', '0.175', 217500.00, 4453.31, 25447.50, 89.07, 0, 0, 'Low Value', 'Creeks, Water Resources, Markets', '10.8909303, 122.6169717, 92, 6', '122.6169717', '10.8909303', ' 6', '92', '2024-04-21 13:20:13'),
(154, 'Pototan', 'Jamabalud', '5', '5968', '0.35', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 9065.00, 51800.00, 181.30, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, Markets', '10.8976767, 122.6141076, 48, 4', '122.6141076', '10.8976767', ' 4', '48', '2024-04-21 13:20:13'),
(155, 'Pototan', 'Jamabalud', '5', '5966', '0.0399', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 1033.41, 5905.20, 20.67, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, Markets', '10.8962332, 122.6193223, 80, 2', '122.6193223', '10.8962332', ' 2', '80', '2024-04-21 13:20:13'),
(156, 'Pototan', 'Jamabalud', '5', '5964-D', '0.117', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 3030.30, 17316.00, 60.61, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8960550, 122.6219912, 61, 3', '122.6219912', '10.8960550', ' 3', '61', '2024-04-21 13:20:13'),
(157, 'Pototan', 'Jamabalud', '5', '5964-B', '0.11', 'agriculture', 'orchard', '1', '0.175', 298400.00, 5744.20, 32824.00, 114.88, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, Markets', '10.8902967, 122.6310415, 69, 5', '122.6310415', '10.8902967', ' 5', '69', '2024-04-21 13:20:13'),
(158, 'Pototan', 'Jamabalud', '5', '5951', '1.179', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 158271.91, 904410.90, 3165.44, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8813262, 122.6267028, 85, 5', '122.6267028', '10.8813262', ' 5', '85', '2024-04-21 13:20:13'),
(159, 'Pototan', 'Jamabalud', '5', '5950', '0.21', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 28190.92, 161091.00, 563.82, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8824984, 122.6124160, 100, 9', '122.6124160', '10.8824984', ' 9', '100', '2024-04-21 13:20:13'),
(160, 'Pototan', 'Jamabalud', '5', '5952-C', '0.0234', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 3141.27, 17950.14, 62.83, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8959343, 122.6240673, 94, 6', '122.6240673', '10.8959343', ' 6', '94', '2024-04-21 13:20:13'),
(161, 'Pototan', 'Jamabalud', '5', '5953-C-7', '0.7457', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 100104.63, 572026.47, 2002.09, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8839001, 122.6222721, 55, 7', '122.6222721', '10.8839001', ' 7', '55', '2024-04-21 13:20:13'),
(162, 'Pototan', 'Jamabalud', '5', '5954', '0.1725', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 23156.83, 132324.75, 463.14, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8851429, 122.6183603, 45, 5', '122.6183603', '10.8851429', ' 5', '45', '2024-04-21 13:20:13'),
(163, 'Pototan', 'Jamabalud', '5', '5956', '0.4417', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 59294.91, 338828.07, 1185.90, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8914971, 122.6242363, 76, 2', '122.6242363', '10.8914971', ' 2', '76', '2024-04-22 08:13:02'),
(164, 'Pototan', 'Jamabalud', '5', '5963-U', '0.1309', 'agriculture', 'coconut', '1', '0.175', 217500.00, 4982.38, 28470.75, 99.65, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources', '10.8985077, 122.6263695, 45, 2', '122.6263695', '10.8985077', ' 2', '45', '2024-04-21 13:20:13'),
(165, 'Pototan', 'Jamabalud', '5', '5960', '0.4136', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 55522.70, 317272.56, 1110.45, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8973709, 122.6263600, 55, 11', '122.6263600', '10.8973709', ' 11', '55', '2024-04-22 08:13:02'),
(166, 'Pototan', 'Jamabalud', '5', '5959', '0.1369', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 18377.80, 105015.99, 367.56, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School', '10.8903360, 122.6165563, 91, 6', '122.6165563', '10.8903360', ' 6', '91', '2024-04-21 13:20:13'),
(167, 'Pototan', 'Jamabalud', '5', '5953', '0.6426', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 86264.23, 492938.46, 1725.28, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8814320, 122.6228601, 86, 2', '122.6228601', '10.8814320', ' 2', '86', '2024-04-23 06:15:40'),
(168, 'Pototan', 'Jamabalud', '5', '5962', '0.774', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 103903.69, 593735.40, 2078.07, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8921724, 122.6123923, 72, 6', '122.6123923', '10.8921724', ' 6', '72', '2024-04-21 13:20:13'),
(169, 'Pototan', 'Jamabalud', '5', '5863-T/5563-K', '0.128', 'agriculture', 'orchard', '2', '0.175', 261000.00, 5846.40, 33408.00, 116.93, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources', '10.8904685, 122.6117991, 79, 2', '122.6117991', '10.8904685', ' 2', '79', '2024-04-21 13:20:13'),
(170, 'Pototan', 'Jamabalud', '5', '5963-C-3', '0.9959', 'agriculture', 'nonirrigated', '2', '0.175', 405500.00, 70671.55, 403837.45, 1413.43, 0, 0, 'Low Value', 'Creeks, Water Resources', '10.8861338, 122.6217349, 87, 4', '122.6217349', '10.8861338', ' 4', '87', '2024-04-22 08:13:02');
INSERT INTO `landinfo` (`land_id`, `district`, `barangay`, `section_no`, `lot_no`, `area`, `classification`, `kinds`, `subclass`, `assess_level`, `unit_val`, `assess_val`, `market_val`, `payables`, `structures`, `machinery`, `cluster`, `factors`, `current_loc`, `longitude`, `latitude`, `altitude`, `accuracy`, `date`) VALUES
(171, 'Pototan', 'Jamabalud', '6', '5963-A-2-B-1', '0.0825', 'agriculture', 'upland', '1', '0.175', 162600.00, 2347.54, 13414.50, 46.95, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8847464, 122.6279134, 72, 3', '122.6279134', '10.8847464', ' 3', '72', '2024-04-21 13:20:13'),
(172, 'Pototan', 'Jamabalud', '6', '5963-A-2-B-3', '0.1508', 'agriculture', 'upland', '1', '0.175', 162600.00, 4291.01, 24520.08, 85.82, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8852133, 122.6244683, 76, 1', '122.6244683', '10.8852133', ' 1', '76', '2024-04-24 13:33:17'),
(173, 'Pototan', 'Jamabalud', '6', '4', '0.097', 'agriculture', 'upland', '1', '0.175', 162600.00, 2760.13, 15772.20, 55.20, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8871707, 122.6169007, 65, 3', '122.6169007', '10.8871707', ' 3', '65', '2024-04-21 13:20:13'),
(174, 'Pototan', 'Jamabalud', '6', '5963-A-2-B-6', '0.897', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 120415.52, 688088.70, 2408.31, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8893563, 122.6135200, 54, 10', '122.6135200', '10.8893563', ' 10', '54', '2024-04-21 13:20:13'),
(175, 'Pototan', 'Jamabalud', '6', '5963-A-2-B-5', '0.3443', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 46219.69, 264112.53, 924.39, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8992470, 122.6291890, 81, 8', '122.6291890', '10.8992470', ' 8', '81', '2024-04-22 08:13:02'),
(176, 'Pototan', 'Jamabalud', '6', '5963-A-2-B-7', '2.9452', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 228017.38, 1302956.48, 4560.35, 0, 0, 'High Value', 'National Roads, Creeks, School, Markets', '10.8935877, 122.6237497, 50, 11', '122.6237497', '10.8935877', ' 11', '50', '2024-04-21 13:20:13'),
(177, 'Pototan', 'Jamabalud', '6', '5972-A', '0.2698', 'agriculture', 'orchard', '1', '0.175', 298400.00, 14088.96, 80508.32, 281.78, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8837171, 122.6174476, 44, 5', '122.6174476', '10.8837171', ' 5', '44', '2024-04-21 13:20:13'),
(178, 'Pototan', 'Jamabalud', '6', '5971', '0.1761', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 4560.99, 26062.80, 91.22, 0, 0, 'Low Value', 'National Roads, Creeks, Water Resources, School, M', '10.8901170, 122.6276288, 79, 9', '122.6276288', '10.8901170', ' 9', '79', '2024-04-21 13:20:13'),
(179, 'Pototan', 'Jamabalud', '6', '5970', '0.12', 'agriculture', 'coconut', '1', '0.175', 217500.00, 4567.50, 26100.00, 91.35, 0, 0, 'Low Value', 'National Roads, Water Resources, Markets', '10.8993803, 122.6151844, 49, 3', '122.6151844', '10.8993803', ' 3', '49', '2024-04-21 13:20:13'),
(180, 'Pototan', 'Jamabalud', '6', '5972-C', '2.1183', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 284365.89, 1624947.93, 5687.32, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8988903, 122.6172815, 85, 10', '122.6172815', '10.8988903', ' 10', '85', '2024-04-21 13:20:13'),
(181, 'Pototan', 'Jamabalud', '6', '5963-H', '3', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 402727.50, 2301300.00, 8054.55, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8866821, 122.6220297, 86, 3', '122.6220297', '10.8866821', ' 3', '86', '2024-04-21 13:20:13'),
(182, 'Pototan', 'Jamabalud', '6', '5963-A-1', '1', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 134242.50, 767100.00, 2684.85, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.9005850, 122.6198949, 49, 6', '122.6198949', '10.9005850', ' 6', '49', '2024-04-21 13:20:13'),
(183, 'Pototan', 'Jamabalud', '6', '5963-A-2', '1', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 134242.50, 767100.00, 2684.85, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8981013, 122.6308708, 56, 5', '122.6308708', '10.8981013', ' 5', '56', '2024-04-21 13:20:13'),
(184, 'Pototan', 'Jamabalud', '6', '5963-A-2-B-3', '2.1563', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 289467.10, 1654097.73, 5789.34, 0, 0, 'High Value', 'National Roads, Creeks, Water Resources, School, M', '10.8871082, 122.6223336, 87, 4', '122.6223336', '10.8871082', ' 4', '87', '2024-04-24 13:33:17'),
(185, 'Pototan', 'Jamabalud', '2', '21 (6009 PT.)', '1.1795', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 91316.89, 521810.80, 1826.34, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8911000, 122.6305615, 54, 4', '122.6305615', '10.8911000', ' 4', '54', '2024-04-21 13:20:13'),
(186, 'Pototan', 'Jamabalud', '2', '23 (6009 PT.)', '0.7345', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 56864.99, 324942.80, 1137.30, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8865348, 122.6193337, 47, 5', '122.6193337', '10.8865348', ' 5', '47', '2024-04-22 08:13:02'),
(187, 'Pototan', 'Jamabalud', '2', '25', '0.8647', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 116079.49, 663311.37, 2321.59, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8970086, 122.6210128, 98, 5', '122.6210128', '10.8970086', ' 5', '98', '2024-04-24 13:33:17'),
(188, 'Pototan', 'Jamabalud', '2', '28(6009 PT.)', '0.0088', 'agriculture', 'upland', '1', '0.175', 162600.00, 250.40, 1430.88, 5.01, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.9003560, 122.6274169, 44, 10', '122.6274169', '10.9003560', ' 10', '44', '2024-04-21 13:20:13'),
(189, 'Pototan', 'Jamabalud', '2', '6008-A', '1.191', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 159882.82, 913616.10, 3197.66, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8924971, 122.6154582, 55, 8', '122.6154582', '10.8924971', ' 8', '55', '2024-04-24 13:33:18'),
(190, 'Pototan', 'Jamabalud', '2', '6008-A', '0.0262', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 641.90, 12838.00, 12.84, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8904170, 122.6213157, 42, 8', '122.6213157', '10.8904170', ' 8', '42', '2024-04-24 13:33:18'),
(191, 'Pototan', 'Jamabalud', '2', '6032-B', '1.2577', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 168836.79, 964781.67, 3376.74, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8840000, 122.6271538, 67, 10', '122.6271538', '10.8840000', ' 10', '67', '2024-04-24 13:33:18'),
(192, 'Pototan', 'Jamabalud', '2', '9', '2.0201', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 271183.27, 1549618.71, 5423.67, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8904706, 122.6200945, 83, 4', '122.6200945', '10.8904706', ' 4', '83', '2024-04-21 13:20:13'),
(194, 'Pototan', 'Jamabalud', '2', '6040', '0.229', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 5931.10, 33892.00, 118.62, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8910071, 122.6297981, 44, 6', '122.6297981', '10.8910071', ' 6', '44', '2024-04-21 13:20:13'),
(195, 'Pototan', 'Jamabalud', '2', '6039', '0.22', 'agriculture', 'bamboo', '1', '0.175', 148000.00, 5698.00, 32560.00, 113.96, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8899726, 122.6172895, 45, 7', '122.6172895', '10.8899726', ' 7', '45', '2024-04-21 13:20:13'),
(196, 'Pototan', 'Jamabalud', '2', '6038', '0.4333', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 33546.09, 191691.92, 670.92, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8813950, 122.6245825, 52, 1', '122.6245825', '10.8813950', ' 1', '52', '2024-04-21 13:20:13'),
(197, 'Pototan', 'Jamabalud', '2', '10(6051 PT)', '0.9567', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 128429.80, 733884.57, 2568.60, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8807808, 122.6225946, 88, 4', '122.6225946', '10.8807808', ' 4', '88', '2024-04-21 13:20:13'),
(198, 'Pototan', 'Jamabalud', '2', '8(6051 PT)', '0.9567', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 128429.80, 733884.57, 2568.60, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8822777, 122.6208531, 48, 4', '122.6208531', '10.8822777', ' 4', '48', '2024-04-21 13:20:13'),
(199, 'Pototan', 'Jamabalud', '2', '6052-D', '8.226', 'agriculture', 'nonirrigated', '1', '0.175', 442400.00, 636856.92, 3639182.40, 12737.14, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.9005606, 122.6151309, 98, 3', '122.6151309', '10.9005606', ' 3', '98', '2024-04-21 13:20:13'),
(200, 'Pototan', 'Jamabalud', '2', '21(6009 PT)', '1.179', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 158271.91, 904410.90, 3165.44, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8974409, 122.6167467, 90, 5', '122.6167467', '10.8974409', ' 5', '90', '2024-04-21 13:20:13'),
(201, 'Pototan', 'Jamabalud', '2', '23(6009 PT)', '0.7345', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 98601.12, 563434.95, 1972.02, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8921074, 122.6256771, 92, 3', '122.6256771', '10.8921074', ' 3', '92', '2024-04-21 13:20:13'),
(203, 'Pototan', 'Jamabalud', '2', '29(6009 PT)', '0.3467', 'agriculture', 'irrigated', '2', '0.175', 715600.00, 43417.24, 248098.52, 868.34, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8878106, 122.6126567, 55, 2', '122.6126567', '10.8878106', ' 2', '55', '2024-04-22 08:13:02'),
(204, 'Pototan', 'Jamabalud', '2', '6008-A', '1.191', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 159882.82, 913616.10, 3197.66, 0, 0, 'High Value', 'Water Resources, Market, School, National Road', '10.8841696, 122.6298767, 47, 9', '122.6298767', '10.8841696', ' 9', '47', '2024-04-24 13:33:18'),
(205, 'Pototan', 'Jamabalud', '2', '6032-B', '0.0262', 'residential', 'pototan1', 'R1', '0.05', 4900.00, 641.90, 12838.00, 12.84, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8823147, 122.6265203, 73, 6', '122.6265203', '10.8823147', ' 6', '73', '2024-04-24 13:33:18'),
(206, 'Pototan', 'Jamabalud', '2', '5960', '0.4136', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 55522.70, 317272.56, 1110.45, 0, 0, 'Low Value', 'Water Resources, Market, School, National Road', '10.8844193, 122.6311279, 63, 10', '122.6311279', '10.8844193', ' 10', '63', '2024-04-22 08:13:02'),
(207, 'Pototan', 'Jamabalud', '5', '5111', '0.117', 'agriculture', 'irrigated', '1', '0.175', 767100.00, 15706.37, 89750.70, 314.13, 1, 12, 'Low Value', 'National Roads, Creeks, School, Markets', '10.8993811, 122.6229961, 46, 9', '122.6229961', '10.8993811', ' 9', '46', '2024-04-21 13:20:13'),
(210, 'Pototan', 'Jamabalud', '1', '0909', '0.356', 'agriculture', 'salt', 'salt_1', '0.175', 510500.00, 31804.15, 181738.00, 636.08, 2, 1, 'Low Value', 'Market, School, National Road, Creeks, Water Resou', '10.9005431, 122.6274194, 42, 9', '122.6274194', '10.9005431', ' 9', '42', '2024-04-21 13:20:13');

-- --------------------------------------------------------

--
-- Table structure for table `land_record`
--

CREATE TABLE `land_record` (
  `record_id` int(11) NOT NULL,
  `land_id` int(11) DEFAULT NULL,
  `classification` varchar(50) DEFAULT NULL,
  `kinds` varchar(50) DEFAULT NULL,
  `subclass` varchar(50) DEFAULT NULL,
  `area` varchar(50) DEFAULT NULL,
  `unit_val` varchar(50) DEFAULT NULL,
  `assess_level` decimal(10,2) DEFAULT NULL,
  `assess_val` decimal(10,2) DEFAULT NULL,
  `market_val` decimal(10,2) DEFAULT NULL,
  `payables` decimal(10,2) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `land_record`
--

INSERT INTO `land_record` (`record_id`, `land_id`, `classification`, `kinds`, `subclass`, `area`, `unit_val`, `assess_level`, `assess_val`, `market_val`, `payables`, `date`) VALUES
(1, 73, 'residential', 'pototan1', 'R1', '0.02', '4900', 0.05, 490.00, 9800.00, 9.80, '2024-01-09 07:34:03'),
(2, 73, 'residential', 'pototan1', 'R1', '0.1377', '4900', 0.05, 3373.65, 67473.00, 67.47, '2024-01-09 07:34:03'),
(3, 48, 'residential', 'pototan1', 'R1', '0.0129', '4900', 0.05, 316.05, 6321.00, 6.32, '2024-01-09 07:34:03'),
(4, 44, 'residential', 'pototan1', 'R1', '0.01', '4900', 0.05, 245.00, 4900.00, 4.90, '2024-01-09 07:34:03'),
(5, 32, 'residential', 'pototan1', 'R1', '0.0295', '4900', 0.05, 722.75, 14455.00, 14.46, '2024-01-09 07:34:03'),
(6, 11, 'residential', 'pototan1', 'R1', '0.0104', '4900', 0.05, 254.80, 5096.00, 5.10, '2024-01-09 07:34:03'),
(7, 85, 'residential', 'pototan1', 'R1', '0.0334', '4900', 0.05, 818.30, 16366.00, 16.37, '2024-01-09 07:34:03'),
(8, 86, 'residential', 'pototan1', 'R1', '0.0136', '4900', 0.05, 333.20, 6664.00, 6.66, '2024-01-09 07:34:03'),
(9, 87, 'residential', 'pototan1', 'R1', '0.0136', '4900', 0.05, 333.20, 6664.00, 6.66, '2024-01-09 07:34:03'),
(10, 88, 'residential', 'pototan1', 'R1', '0.0226', '4900', 0.05, 553.70, 11074.00, 11.07, '2024-01-09 07:34:03'),
(11, 89, 'residential', 'pototan1', 'R1', '0.0190', '4900', 0.05, 465.50, 9310.00, 9.31, '2024-01-09 07:34:03'),
(12, 90, 'residential', 'pototan1', 'R1', '0.02', '4900', 0.05, 490.00, 9800.00, 9.80, '2024-01-09 07:34:03'),
(13, 94, 'residential', 'pototan1', 'R1', '0.04', '4900', 0.05, 980.00, 19600.00, 19.60, '2024-01-09 07:34:03'),
(14, 113, 'residential', 'pototan1', 'R1', '0.04', '4900', 0.05, 980.00, 19600.00, 19.60, '2024-01-09 07:34:03'),
(15, 117, 'agriculture', 'bamboo', 'bamboo_1', '0.03', '148000', 0.18, 777.00, 4440.00, 15.54, '2024-01-09 07:34:03'),
(16, 194, 'residential', 'pototan1', 'R1', '0.016', '4900', 0.05, 392.00, 7840.00, 7.84, '2024-01-09 07:34:03'),
(17, 195, 'residential', 'pototan1', 'R1', '0.0458', '4900', 0.05, 1122.10, 22442.00, 22.44, '2024-01-09 07:34:03'),
(18, 195, 'commercial', 'pototan2', 'C1', '0', '6000', 0.15, 0.00, 0.00, 0.00, '2024-01-09 07:34:03'),
(19, 199, 'residential', 'pototan1', 'R1', '0.15', '4900', 0.05, 3675.00, 73500.00, 73.50, '2024-01-09 07:34:03'),
(20, 205, 'agriculture', 'irrigated', 'irrigated_1', '1.2577', '767100', 0.18, 168836.79, 964781.67, 3376.74, '2024-01-09 07:34:03'),
(21, 2, 'agriculture', 'irrigated', 'irrigated_2', '0.117', '715600', 0.18, 14651.91, 83725.20, 293.04, '2024-01-09 07:34:03'),
(23, 136, 'residential', 'pototan1', 'R1', '0.0201', '4900', 0.05, 22.00, 442.00, 9.85, '2024-01-09 07:34:03'),
(24, 194, 'residential', 'pototan1', 'R1', '0.0160', '4900', 0.05, 392.00, 7840.00, 7.84, '2024-01-09 07:34:03'),
(25, 195, 'residential', 'pototan1', 'R1', '0.0458', '4900', 0.05, 1122.10, 22442.00, 22.44, '2024-01-09 07:34:03'),
(26, 199, 'residential', 'pototan1', 'R1', '0.1500', '4900', 0.05, 3675.00, 73500.00, 73.50, '2024-01-09 07:34:03'),
(27, 112, 'residential', 'pototan1', 'R1', '0.0400', '4900', 0.05, 980.00, 19600.00, 19.60, '2024-01-09 07:34:03'),
(28, 113, 'residential', 'pototan1', 'R1', '0.0400', '4900', 0.05, 980.00, 19600.00, 19.60, '2024-01-09 07:34:03'),
(29, 150, 'residential', 'pototan1', 'R1', '0.0625', '4900', 0.05, 1531.25, 30625.00, 30.63, '2024-01-09 07:34:03'),
(30, 151, 'residential', 'pototan1', 'R1', '0.0715', '4900', 0.05, 1751.75, 35035.00, 35.04, '2024-01-09 07:34:03'),
(31, 152, 'residential', 'pototan1', 'R1', '0.0175', '4900', 0.05, 428.75, 8575.00, 8.58, '2024-01-09 07:34:03'),
(32, 154, 'residential', 'pototan1', 'R1', '0.0136', '4900', 0.05, 333.20, 6664.00, 6.66, '2024-01-09 07:34:03'),
(33, 155, 'agriculture', 'irrigated', 'irrigated_1', '0.3200', '767100', 0.18, 42957.60, 245472.00, 859.15, '2024-01-09 07:34:03'),
(34, 155, 'residential', 'pototan1', 'R1', '0.0200', '4900', 0.05, 490.00, 9800.00, 9.80, '2024-01-09 07:34:03'),
(35, 156, 'residential', 'pototan1', 'R1', '0.0208', '4900', 0.05, 509.60, 10192.00, 10.19, '2024-01-09 07:34:03'),
(36, 157, 'residential', 'pototan1', 'R1', '0.0277', '4900', 0.05, 678.65, 13573.00, 13.57, '2024-01-09 07:34:03'),
(37, 158, 'residential', 'pototan1', 'R1', '0.1200', '4900', 0.05, 2940.00, 58800.00, 58.80, '2024-01-09 07:34:03'),
(38, 159, 'residential', 'pototan1', 'R1', '0.0125', '4900', 0.05, 306.25, 6125.00, 6.13, '2024-01-09 07:34:03'),
(39, 163, 'residential', 'pototan1', 'R1', '0.1000', '4900', 0.05, 2450.00, 49000.00, 49.00, '2024-01-09 07:34:03'),
(40, 177, 'residential', 'pototan1', 'R1', '0.0311', '4900', 0.05, 761.95, 15239.00, 15.24, '2024-01-09 07:34:03'),
(41, 179, 'residential', 'pototan1', 'R1', '0.0203', '4900', 0.05, 497.35, 9947.00, 9.95, '2024-01-09 07:34:03'),
(42, 85, 'residential', 'pototan1', 'R1', '0.0334', '4900', 0.05, 818.30, 16366.00, 16.37, '2024-01-09 07:34:03'),
(43, 86, 'residential', 'pototan1', 'R1', '0.0136', '4900', 0.05, 333.20, 6664.00, 6.66, '2024-01-09 07:34:03'),
(44, 87, 'residential', 'pototan1', 'R1', '0.0136', '4900', 0.05, 333.20, 6664.00, 6.66, '2024-01-09 07:34:03'),
(46, 92, 'residential', 'pototan1', 'R1', '0.0600', '4900', 0.05, 1470.00, 29400.00, 29.40, '2024-01-09 07:34:03'),
(47, 97, 'residential', 'pototan1', 'R1', '0.0316', '4900', 0.05, 774.20, 15484.00, 15.48, '2024-01-09 07:34:03'),
(48, 16, 'residential', 'pototan1', 'R1', '0.0102', '4900', 0.05, 249.90, 4998.00, 5.00, '2024-01-09 07:34:03'),
(49, 18, 'residential', 'pototan1', 'R1', '0.0100', '4900', 0.05, 245.00, 4900.00, 4.90, '2024-01-09 07:34:03'),
(50, 36, 'residential', 'pototan1', 'R1', '0.0193', '4900', 0.05, 472.85, 9457.00, 9.46, '2024-01-09 07:34:03'),
(51, 42, 'residential', 'pototan1', 'R1', '0.0264', '4900', 0.05, 646.80, 12936.00, 12.94, '2024-01-09 07:34:03'),
(52, 48, 'residential', 'pototan1', 'R1', '0.0219', '4900', 0.05, 536.55, 10731.00, 10.73, '2024-01-09 07:34:03'),
(53, 77, 'residential', 'pototan1', 'R1', '0.0100', '4900', 0.05, 245.00, 4900.00, 4.90, '2024-01-09 07:34:03'),
(54, 78, 'residential', 'pototan1', 'R1', '0.0186', '4900', 0.05, 455.70, 9114.00, 9.11, '2024-01-09 07:34:03'),
(55, 79, 'residential', 'pototan1', 'R1', '0.0452', '4900', 0.05, 1107.40, 22148.00, 22.15, '2024-01-09 07:34:03'),
(56, 80, 'agriculture', 'nonirrigated', 'nonirrigated_1', '0.2487', '442400', 0.18, 19254.35, 110024.88, 385.09, '2024-01-09 07:34:03'),
(57, 80, 'residential', 'pototan1', 'R1', '0.0194', '4900', 0.05, 475.30, 9506.00, 9.51, '2024-01-09 07:34:03'),
(58, 82, 'residential', 'pototan1', 'R1', '0.0262', '4900', 0.05, 641.90, 12838.00, 12.84, '2024-01-09 07:34:03');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `visible` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = yes, 0 = no '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `image_path`, `created_at`, `updated_at`, `visible`) VALUES
(2, 'Employees Christmas Party', 'Good day, assessors!\r\n\r\nWe are hosting our Christmas Party on December 20 at 8:00 p.m. at The Mansion Hotel. We are looking forward to celebrating this holiday with you. Thank you!', 'uploads/christmas-party-lettering-frame_1262-6893.avif', '2023-12-14 07:50:50', '2024-04-22 13:43:40', 0),
(3, 'First Day of 2024', 'Lorem ipsum dolor sit aLorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.met Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.Lorem ipsum dolor sit amet consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.consectetur adipisicing elit. Est, qui laudantium ea hic vel voluptatem autem eum optio natus, quia culpa exercitationem nulla soluta fugit deleniti tenetur voluptates magnam? Reprehenderit.', 'uploads/christmas-announcements-concept-design-santa-claus-vector-illustration-258478654.jpg', '2024-01-09 09:21:43', '2024-04-22 13:43:46', 1);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL,
  `lot_no` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `usertype` varchar(50) DEFAULT NULL,
  `verify_token` varchar(200) DEFAULT NULL,
  `verify_status` tinyint(2) DEFAULT 0 COMMENT '1=yes, 0=no'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `fname`, `lname`, `username`, `address`, `lot_no`, `email`, `password`, `usertype`, `verify_token`, `verify_status`) VALUES
(22, 'Hope', 'Tabunlupa', 'holajava', 'Villa', '12', 'holajava@gmail.com', '$2y$10$SZQQkUfKVhk7TX18obrD7eEtE6NlTeRRDuHE83f2O0Q.5TLCs87oS', 'user', '8793181539dc299dcf9b196f36ff2573', 1),
(23, 'Admin', 'Juan', 'adminjuan', 'Pototan', '0000', 'pototanassessorsoffice@gmail.com', '$2y$10$rA2E3szRSwMIbSw7vAc5HeOV4WZR2OAM/E8HtZXRDPcmCG2MWZ6e6', 'admin', '91cb24b089e52f5515072e73f783bef6', 1),
(49, 'test', 'test', 'testtest', 'Arevalo', '1', 'maryhope.tabunlupa@wvsu.edu.ph', '$2y$10$C7roPPa3m5IJXt7dx6RYc.0BgsRFnh5RZty2.czVvatKcd5OHjIXK', 'user', '874a2598eee2634c01e2e3ff48ea93c6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saved_sections`
--

CREATE TABLE `saved_sections` (
  `id` int(11) NOT NULL,
  `barangay` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `factors` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saved_sections`
--

INSERT INTO `saved_sections` (`id`, `barangay`, `section`, `factors`) VALUES
(18, 'Jamabalud', '1', 'Market, School, National Road, Creeks, Water Resources'),
(19, 'Jamabalud', '2', 'Water Resources, Market, School, National Road'),
(20, 'Abangay', '', ''),
(21, 'Abangay', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `tax_payment_history`
--

CREATE TABLE `tax_payment_history` (
  `id` int(11) NOT NULL,
  `lot_no` varchar(50) DEFAULT NULL,
  `payables` decimal(10,2) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tax_payment_history`
--

INSERT INTO `tax_payment_history` (`id`, `lot_no`, `payables`, `date`, `timestamp`) VALUES
(2, '5590', 836.06, '2024-01-08', '2024-01-09 09:26:16'),
(3, '5969', 82.10, '2024-01-09', '2024-01-10 01:22:36'),
(4, '12', 42.57, '2024-01-27', '2024-02-06 08:54:35'),
(5, '0000', 0.00, '2023-11-03', '2024-02-07 00:38:10'),
(6, '8', 4122.05, '2024-02-19', '2024-03-11 02:58:22'),
(7, '12', 48.51, '2024-02-17', '2024-03-17 15:04:47'),
(8, '6052-D', 12737.14, '2024-02-19', '2024-03-17 15:12:32'),
(9, '5966', 20.67, '2024-02-19', '2024-03-17 15:15:21'),
(10, '5', 5785.85, '2024-02-19', '2024-03-19 00:56:57'),
(11, '1', 645.90, '2024-04-21', '2024-04-24 04:59:58');

-- --------------------------------------------------------

--
-- Table structure for table `threshold_values`
--

CREATE TABLE `threshold_values` (
  `id` int(11) NOT NULL,
  `high` int(11) NOT NULL,
  `mid_max` int(11) NOT NULL,
  `mid_min` int(11) NOT NULL,
  `low` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `threshold_values`
--

INSERT INTO `threshold_values` (`id`, `high`, `mid_max`, `mid_min`, `low`) VALUES
(1, 3, 3, 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`file_id`),
  ADD KEY `folder_id` (`folder_id`);

--
-- Indexes for table `folders`
--
ALTER TABLE `folders`
  ADD PRIMARY KEY (`folder_id`);

--
-- Indexes for table `landinfo`
--
ALTER TABLE `landinfo`
  ADD PRIMARY KEY (`land_id`),
  ADD KEY `idx_lot_no` (`lot_no`);

--
-- Indexes for table `land_record`
--
ALTER TABLE `land_record`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `land_id` (`land_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_no` (`lot_no`);

--
-- Indexes for table `saved_sections`
--
ALTER TABLE `saved_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tax_payment_history`
--
ALTER TABLE `tax_payment_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lot_no` (`lot_no`);

--
-- Indexes for table `threshold_values`
--
ALTER TABLE `threshold_values`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `file_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `folders`
--
ALTER TABLE `folders`
  MODIFY `folder_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `landinfo`
--
ALTER TABLE `landinfo`
  MODIFY `land_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `land_record`
--
ALTER TABLE `land_record`
  MODIFY `record_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `saved_sections`
--
ALTER TABLE `saved_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tax_payment_history`
--
ALTER TABLE `tax_payment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `threshold_values`
--
ALTER TABLE `threshold_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `files`
--
ALTER TABLE `files`
  ADD CONSTRAINT `files_ibfk_1` FOREIGN KEY (`folder_id`) REFERENCES `folders` (`folder_id`) ON DELETE CASCADE;

--
-- Constraints for table `land_record`
--
ALTER TABLE `land_record`
  ADD CONSTRAINT `land_record_ibfk_1` FOREIGN KEY (`land_id`) REFERENCES `landinfo` (`land_id`);

--
-- Constraints for table `register`
--
ALTER TABLE `register`
  ADD CONSTRAINT `register_ibfk_1` FOREIGN KEY (`lot_no`) REFERENCES `landinfo` (`lot_no`);

--
-- Constraints for table `tax_payment_history`
--
ALTER TABLE `tax_payment_history`
  ADD CONSTRAINT `tax_payment_history_ibfk_1` FOREIGN KEY (`lot_no`) REFERENCES `landinfo` (`lot_no`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
