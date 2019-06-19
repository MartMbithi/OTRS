-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 19, 2019 at 04:12 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `railway`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`) VALUES
(3, 'admin', 'admin@rails.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `train` varchar(200) NOT NULL,
  `departure` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `name`, `train`, `departure`, `destination`, `date`, `time`, `status`) VALUES
(15, '  Martin Mbithi', 'Admiraal de Ruijter ', 'Nairobi', 'Kisumu', '2019-06-20', '01:00', 0),
(16, '   Martin Mbithi', ' Admiraal de Ruijter ', 'Nairobi', 'Kisumu', '2019-06-19 17:00:09.4837', '01:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `idno` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`, `idno`, `address`, `age`, `phone`, `email`, `username`, `password`) VALUES
(2, 'mercy', '1270001', 'Demo Adress', '29', '09876543', 'mercy@mail.com', 'Mercy254', 'Mercy'),
(3, 'Demo Employee', '127.0.0.1', 'Demo Address', '00', '09876543', 'demo@mail.com', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229'),
(4, 'Demo Employee', '127.0.0.1', 'Demo Address', '20', '09876543', 'martdevelopers254@gmail.com', 'mart', '1722a28089f91b73fff8708c26800a5e');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `age` varchar(200) NOT NULL,
  `gender` varchar(200) NOT NULL,
  `phoneno` varchar(200) NOT NULL,
  `date` timestamp(4) NOT NULL DEFAULT CURRENT_TIMESTAMP(4) ON UPDATE CURRENT_TIMESTAMP(4),
  `email` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `passwordconf` varchar(200) NOT NULL,
  `train` varchar(200) NOT NULL,
  `departure` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `date_travelling` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `name`, `age`, `gender`, `phoneno`, `date`, `email`, `username`, `password`, `passwordconf`, `train`, `departure`, `destination`, `date_travelling`, `time`, `status`) VALUES
(7, '  Martin Mbithi', '21', 'Male', '+254724947439', '2019-06-19 14:04:43.1128', 'martdevelopers254@gmail.com', 'mart', '1722a28089f91b73fff8708c26800a5e', '', 'Admiraal de Ruijter ', 'Nairobi', 'Kisumu', '2019-06-19 17:00:09.4837', '01:00', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `services` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `name`, `amount`, `services`) VALUES
(6, ' Martin Mbithi', '2500', 'Train Ticket');

-- --------------------------------------------------------

--
-- Table structure for table `train`
--

CREATE TABLE `train` (
  `id` int(20) NOT NULL,
  `name` varchar(200) NOT NULL,
  `route` varchar(200) NOT NULL,
  `current` varchar(200) NOT NULL,
  `destination` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `passengers` varchar(200) NOT NULL,
  `number` varchar(200) NOT NULL,
  `fare` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `name`, `route`, `current`, `destination`, `time`, `passengers`, `number`, `fare`) VALUES
(5, 'Admiraal de Ruijter', ' Nairobi-Kisumu', 'Nairobi', 'Kisumu', '01:00', '120', 'T-002', '2500'),
(6, 'Benjamin Britten', 'Nairobi-Nakuru', 'Nairobi', 'Nakuru', '06:00', '100', 'T-003', '1500'),
(7, 'Bon Accord', 'Nairobi-Mombasa', 'Nairobi', 'Mombasa', '09:00', '100', 'T-004', '3000'),
(8, 'Capitals United Express', 'Mombasa-Nairobi-Kampala', 'Mombasa', 'Kampala', '13:00', '300', 'T-005', '4500');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `train`
--
ALTER TABLE `train`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
