-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 02, 2018 at 10:11 AM
-- Server version: 5.7.21-20-beget-5.7.21-20-1-log
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `h77588vx_b`
--

-- --------------------------------------------------------

--
-- Table structure for table `all_time_slots`
--
-- Creation: Oct 15, 2018 at 08:38 AM
-- Last update: Nov 02, 2018 at 07:10 AM
--

DROP TABLE IF EXISTS `all_time_slots`;
CREATE TABLE `all_time_slots` (
  `id` int(11) NOT NULL,
  `dr_id` varchar(225) NOT NULL,
  `slot_id` varchar(225) NOT NULL,
  `slot_time` varchar(225) NOT NULL,
  `status` enum('booked','available') NOT NULL DEFAULT 'available',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `all_time_slots`
--

INSERT INTO `all_time_slots` (`id`, `dr_id`, `slot_id`, `slot_time`, `status`, `created_at`, `updated_at`) VALUES
(60, '16', '1', '11:54', 'available', '2018-10-12 06:24:44', '2018-10-12 06:24:44'),
(61, '16', '2', '12:24', 'available', '2018-10-12 06:24:45', '2018-10-12 06:24:45'),
(62, '16', '3', '12:54', 'available', '2018-10-12 06:24:45', '2018-10-12 06:24:45'),
(63, '16', '4', '13:24', 'available', '2018-10-12 06:24:45', '2018-10-12 06:24:45'),
(64, '16', '5', '13:54', 'available', '2018-10-12 06:24:45', '2018-10-12 06:24:45'),
(65, '16', '6', '14:24', 'available', '2018-10-12 06:24:45', '2018-10-12 06:24:45'),
(66, '16', '7', '14:54', 'booked', '2018-10-12 06:24:45', '2018-10-12 06:24:45'),
(67, '16', '8', '15:24', 'booked', '2018-10-12 06:24:45', '2018-10-12 06:24:45'),
(68, '16', '9', '15:54', 'available', '2018-10-12 06:24:45', '2018-10-12 06:24:45'),
(69, '16', '10', '16:24', 'available', '2018-10-12 06:24:46', '2018-10-12 06:24:46'),
(70, '16', '11', '16:54', 'available', '2018-10-12 06:24:46', '2018-10-12 06:24:46'),
(110, '23', '1', '13:08', 'available', '2018-10-17 07:38:30', '2018-10-17 07:38:30'),
(111, '23', '2', '13:38', 'booked', '2018-10-17 07:38:30', '2018-10-17 07:38:30'),
(112, '23', '3', '14:08', 'booked', '2018-10-17 07:38:30', '2018-10-17 07:38:30'),
(113, '23', '4', '14:38', 'available', '2018-10-17 07:38:30', '2018-10-17 07:38:30'),
(114, '23', '5', '15:08', 'available', '2018-10-17 07:38:30', '2018-10-17 07:38:30'),
(157, '57', '1', '10:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(158, '57', '2', '10:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(159, '57', '3', '11:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(160, '57', '4', '11:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(161, '57', '5', '12:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(162, '57', '6', '12:57', 'booked', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(163, '57', '7', '13:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(164, '57', '8', '13:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(165, '57', '9', '14:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(166, '57', '10', '14:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(167, '57', '11', '15:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(168, '57', '12', '15:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(169, '57', '13', '16:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(170, '57', '14', '16:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(171, '57', '15', '17:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(172, '57', '16', '17:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(173, '57', '17', '18:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(174, '57', '18', '18:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(175, '57', '19', '19:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(176, '57', '20', '19:57', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(177, '57', '21', '20:27', 'available', '2018-11-01 10:01:36', '2018-11-01 10:01:36'),
(178, '59', '1', '13:50', 'available', '2018-11-01 11:54:58', '2018-11-01 11:54:58'),
(179, '59', '2', '14:20', 'available', '2018-11-01 11:54:58', '2018-11-01 11:54:58'),
(180, '59', '3', '14:50', 'booked', '2018-11-01 11:54:58', '2018-11-01 11:54:58'),
(181, '59', '4', '15:20', 'available', '2018-11-01 11:54:58', '2018-11-01 11:54:58'),
(197, '15', '1', '20:07', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(198, '15', '2', '20:37', 'booked', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(199, '15', '3', '09:07', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(200, '15', '4', '09:37', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(201, '15', '5', '10:07', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(202, '15', '6', '10:37', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(203, '15', '7', '11:07', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(204, '15', '8', '11:37', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(205, '15', '9', '12:07', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(206, '15', '10', '12:37', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(207, '15', '11', '13:07', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(208, '15', '12', '13:37', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(209, '15', '13', '14:07', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(210, '15', '14', '14:37', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47'),
(211, '15', '15', '15:07', 'available', '2018-11-02 06:38:47', '2018-11-02 06:38:47');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--
-- Creation: Oct 15, 2018 at 08:38 AM
-- Last update: Nov 02, 2018 at 06:50 AM
--

DROP TABLE IF EXISTS `bookings`;
CREATE TABLE `bookings` (
  `booking_id` int(11) NOT NULL,
  `dr_id` varchar(225) NOT NULL,
  `patient_id` varchar(225) NOT NULL,
  `city` varchar(225) NOT NULL,
  `ailment_image` varchar(225) NOT NULL,
  `booking_date` varchar(225) NOT NULL,
  `booking_time` varchar(225) NOT NULL,
  `age` varchar(225) NOT NULL DEFAULT '18',
  `details` varchar(225) NOT NULL DEFAULT '',
  `gender` varchar(225) NOT NULL,
  `bookings_status` enum('pending','confirmed','done','cancel','booked','') NOT NULL DEFAULT 'booked',
  `timechanged` enum('0','1') DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `dr_id`, `patient_id`, `city`, `ailment_image`, `booking_date`, `booking_time`, `age`, `details`, `gender`, `bookings_status`, `timechanged`, `created_at`, `updated_at`) VALUES
(12, '16', '32', 'dl', '', '2018/10/17', '7', '2123', '', 'female', 'booked', '0', '2018-10-17 05:53:13', '0000-00-00 00:00:00'),
(17, '15', '35', 'lqak', '', '2018/10/17', '6', '25', '', 'male', 'booked', '0', '2018-10-17 07:36:32', '0000-00-00 00:00:00'),
(18, '23', '35', 'sss', '', '2018/10/17', '3', '24', '', 'male', 'booked', '0', '2018-10-17 07:39:22', '0000-00-00 00:00:00'),
(19, '23', '35', 'sbgsh', '', '2018/10/20', '2', '25', '', 'female', 'booked', '0', '2018-10-17 07:55:54', '0000-00-00 00:00:00'),
(20, '23', '35', 'sbgsh', 'under construction.png', '2018/10/20', '2', '25', '', 'female', 'booked', '0', '2018-10-17 07:57:42', '0000-00-00 00:00:00'),
(21, '16', '39', 'kokshetu', '', '2018/10/25', '8', '23', 'dwefefefeef2', 'female', 'booked', '0', '2018-10-19 07:04:28', '0000-00-00 00:00:00'),
(22, '15', '58', 'manchester', 'snow.png', '2018/11/8', '12', '34', 'Feel Cold', 'male', 'booked', '0', '2018-11-01 10:45:56', '0000-00-00 00:00:00'),
(23, '57', '58', 'Manchester', '', '2018/11/21', '6', '34', 'Feel vey cold', 'male', 'booked', '0', '2018-11-01 10:47:03', '0000-00-00 00:00:00'),
(24, '59', '60', 'Astana', '', '2018/11/22', '3', '18', 'Leg is broken', 'male', 'booked', '0', '2018-11-02 03:23:21', '0000-00-00 00:00:00'),
(25, '15', '50', 'jal', '', '2018/11/2', '2', '34', 'fever', 'male', 'booked', '0', '2018-11-02 06:25:18', '0000-00-00 00:00:00'),
(26, '15', '50', 'del', '', '2018/11/2', '2 Hrs', '23', 'Migrain', 'male', 'booked', '0', '2018-11-02 06:50:12', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `dr_booking_slots`
--
-- Creation: Oct 15, 2018 at 08:38 AM
-- Last update: Nov 02, 2018 at 06:38 AM
--

DROP TABLE IF EXISTS `dr_booking_slots`;
CREATE TABLE `dr_booking_slots` (
  `id` int(11) NOT NULL,
  `dr_id` varchar(225) NOT NULL,
  `start_time` varchar(225) NOT NULL,
  `end_time` varchar(225) NOT NULL,
  `status` enum('enable','disable') NOT NULL DEFAULT 'enable',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `duration` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dr_booking_slots`
--

INSERT INTO `dr_booking_slots` (`id`, `dr_id`, `start_time`, `end_time`, `status`, `created_at`, `updated_at`, `duration`) VALUES
(94, '16', '11:54', '16:54', 'enable', '2018-10-12 06:24:44', '2018-10-12 06:24:44', '30'),
(95, '22', '16:11', '18:11', 'enable', '2018-10-12 10:41:59', '2018-10-12 10:41:59', '30'),
(100, '23', '13:08', '15:08', 'enable', '2018-10-17 07:38:30', '2018-10-17 07:38:30', '30'),
(103, '57', '10:27', '20:27', 'enable', '2018-11-01 10:01:36', '2018-11-01 10:01:36', '30'),
(104, '59', '13:50', '15:49', 'enable', '2018-11-01 11:54:58', '2018-11-01 11:54:58', '30'),
(106, '15', '08:07', '15:07', 'enable', '2018-11-02 06:38:35', '2018-11-02 06:38:35', ''),
(107, '15', '08:07', '15:07', 'enable', '2018-11-02 06:38:47', '2018-11-02 06:38:47', '30');

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--
-- Creation: Oct 15, 2018 at 08:38 AM
-- Last update: Nov 02, 2018 at 03:21 AM
--

DROP TABLE IF EXISTS `logins`;
CREATE TABLE `logins` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `email` varchar(225) NOT NULL,
  `qualification` varchar(225) NOT NULL,
  `hospital` varchar(225) NOT NULL,
  `specialization` varchar(225) NOT NULL,
  `phone_no` varchar(225) NOT NULL,
  `hospital_address` text NOT NULL,
  `years_of_experience` varchar(225) NOT NULL,
  `image` varchar(225) NOT NULL,
  `user_type` enum('doctor','patient') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `logins`
--

INSERT INTO `logins` (`id`, `customer_id`, `username`, `password`, `email`, `qualification`, `hospital`, `specialization`, `phone_no`, `hospital_address`, `years_of_experience`, `image`, `user_type`) VALUES
(1, 1, 'parvez', '5e6a8d12704c428d47cd0dfa1a457326e590fd6f', '0', '', '0', '0', '0', '', '', '', ''),
(2, 2, 'galib', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0', '', '0', '0', '0', '', '', '', ''),
(3, 3, 'magna', '91d9f9fcfa4532b537188d1d220c7cf603b2a3a6', '0', '', '0', '0', '0', '', '', '', ''),
(4, 4, 'sun', '22fa6121da96f43a106e413e65d4f9089c53824c', '0', '', '0', '0', '0', '', '', '', ''),
(5, 5, 'hanif', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '0', '', '0', '0', '0', '', '', '', ''),
(6, 6, 'heena', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '0', '', '0', '0', '0', '', '', '', ''),
(7, 7, 'ria', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '0', '', '0', '0', '0', '', '', '', ''),
(8, 8, 'ria', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '0', '', '0', '0', '0', '', '', '', ''),
(9, 9, 'ria', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '0', '', '0', '0', '0', '', '', '', ''),
(10, 10, 'ria', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '0', '', '0', '0', '0', '', '', '', ''),
(11, 11, 'raman', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '0', '', '0', '0', '0', '', '', '', ''),
(14, 13, 'Siara', '6ea7ccdcf642953a24672d10b0d32cef576e0329', '', '', '', '', '', '', '', '', 'patient'),
(15, 14, 'Batra', '6ea7ccdcf642953a24672d10b0d32cef576e0329', 'satwantbambra@gmail.com', 'bath hospital', 'bath hospital', 'Skin Specialist', '9823846237', '54643, Keswick CT', '', 't2.jpg', 'doctor'),
(16, 15, 'Kandasamy', '6ea7ccdcf642953a24672d10b0d32cef576e0329', 'vikas@gmail.com', '', 'city hospital', 'Surgeon', '1234567890', '58, Model Town', '', 't3.jpg', 'doctor'),
(23, 16, 'Raina', '6ea7ccdcf642953a24672d10b0d32cef576e0329', 'rajwant@gmail.com', 'bds', 'civil', 'Psychiatrist', '87753357812', '546, Simi Valley', '13', 't1.jpg', 'doctor'),
(26, 17, 'test_patient', '6ea7ccdcf642953a24672d10b0d32cef576e0329', '', '', '', '', '', '', '', '', 'patient'),
(27, 18, 'faz', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '', '', '', '', '', 'patient'),
(28, 19, 'Lakhwinder', '6ea7ccdcf642953a24672d10b0d32cef576e0329', '', '', '', '', '', '', '', '', 'patient'),
(35, 24, 'navjot', '6ea7ccdcf642953a24672d10b0d32cef576e0329', '', '', '', '', '', '', '', '', 'patient'),
(37, 25, 'loveleen', 'cbdbe4936ce8be63184d9f2e13fc249234371b9a', '', '', '', '', '', '', '', '', 'patient'),
(38, 26, 'Galiya', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', '', '', '', '', '', '', '', '', 'patient'),
(39, 27, 'bean', 'aaf4c61ddcc5e8a2dabede0f3b482cd9aea9434d', '', '', '', '', '', '', '', '', 'patient'),
(40, 28, 'Suman', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '', '', '', '', '', '', '', '', 'patient'),
(41, 29, 'Kirti', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '', '', '', '', '', '', '', '', 'patient'),
(42, 30, 'Naman', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', '', '', '', '', '', '', '', '', 'patient'),
(43, 31, 'testuser', '45c571a156ddcef41351a713bcddee5ba7e95460', '', '', '', '', '', '', '', '', 'patient'),
(44, 32, 'test_new_user', '263c211f09512cef6b73d7ff3dcebfe5811fae4d', '', '', '', '', '', '', '', '', 'patient'),
(45, 33, 'custom', 'f9ac14b63a75faf57d8db6f919bfabb2502d273c', '', '', '', '', '', '', '', '', 'patient'),
(46, 34, 'custom2', '37319a17a76eb4a40782c2decd2b095b7cc1e9db', '', '', '', '', '', '', '', '', 'patient'),
(47, 35, 'custom3', '22d177c858bac2aec5f79a95fabedf0a4c0ed97c', '', '', '', '', '', '', '', '', 'patient'),
(48, 36, 'custom5', '3f8daeaf2935117734f8ca118f4bec4042e0cb31', '', '', '', '', '', '', '', '', 'patient'),
(49, 37, 'custom6', '3f8daeaf2935117734f8ca118f4bec4042e0cb31', '', '', '', '', '', '', '', '', 'patient'),
(50, 38, 'test123', '7288edd0fc3ffcbe93a0cf06e3568e28521687bc', '', '', '', '', '', '', '', '', 'patient'),
(51, 39, 'Maini Singhal', 'cbdbe4936ce8be63184d9f2e13fc249234371b9a', 'maini@yahoo.co.in', 'MBBS,MD', 'Vival', 'Cardiology', '7777788888', '34, V Sata  Colony', '15 years', 'vival.jpg', 'doctor'),
(52, 40, 'Maini Singhal', 'cbdbe4936ce8be63184d9f2e13fc249234371b9a', 'maini@yahoo.co.in', 'MBBS,MD', 'Vival', 'Cardiology', '7777788888', '34, V Sata  Colony', '15 years', 'vival.jpg', 'doctor'),
(54, 41, 'anothertest', 'f28eee78a788c857fb767fdfecf1bb1ccc750847', 'anothertest@gmail.com', 'BDS', 'city', 'surgen', '987654321', 'city center', '15 years', 's33.jpg', 'doctor'),
(55, 42, 'mathur', '57fbf42ed0931e1e6cb449ce239d038007ef60e3', 'mathur@gmail.com', 'bds', 'civil', 'bds', '98776654321', 'city center', '10 years', 'mathur.jpg', 'doctor'),
(56, 43, 'mathur', '57fbf42ed0931e1e6cb449ce239d038007ef60e3', 'mathur@gmail.com', 'bds', 'civil', 'bds', '98776654321', 'city center', '10 years', 'mathur.jpg', 'doctor'),
(57, 44, 'Nitika', '1f8ac10f23c5b5bc1167bda84b833e5c057a77d2', 'Nita@gmail.com', 'MBBS', 'Awal', 'Cardiac', '5667789899', 'Model Town', '12 years', 'nitika.jpg', 'doctor'),
(58, 45, 'Mr Snow', '4233137d1c510f2e55ba5cb220b864b11033f156', '', '', '', '', '', '', '', '', 'patient'),
(59, 46, 'Faz', '4233137d1c510f2e55ba5cb220b864b11033f156', 'faz7363@hello.com', 'Astana', 'Astana', 'ENT', '65456788', '23 Gorky Aven\r\nAstana', '80 years', 'dr.png', 'doctor'),
(60, 47, 'Ayan', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', '', '', '', '', '', '', '', 'patient');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `all_time_slots`
--
ALTER TABLE `all_time_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `dr_booking_slots`
--
ALTER TABLE `dr_booking_slots`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logins`
--
ALTER TABLE `logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `all_time_slots`
--
ALTER TABLE `all_time_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `dr_booking_slots`
--
ALTER TABLE `dr_booking_slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;

--
-- AUTO_INCREMENT for table `logins`
--
ALTER TABLE `logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
