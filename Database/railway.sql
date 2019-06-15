-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2019 at 10:49 AM
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
(2, 'Mercy', 'mercymumo@gmail.com', 'b91faeddd266fe5f6100c3c60cb5a22f');

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
(1, 'demo booking', 'ddemo train', 'demo station', 'demo destination', 'demo date', 'demo time', 1),
(2, 'Demo Passenger', 'Demo Train', 'Demo Station', 'Demo Destination', '2019-04-26', '13:00', 0),
(3, 'Demo Passenger', 'Demo Train', 'Demo Passenger', 'Demo Destination', '2019-01-26', '01:00', 0),
(4, 'Demo Passenger', 'Demo Train', 'Demo Station', 'Demo Destination', '2017-04-27', '01:00', 1),
(5, 'mercy', '001', 'Machackos', 'Mombasa', '2019-04-30', '00:00', 0),
(6, 'mercy', '001', 'Machackos', 'Mombasa', '2019-04-30', '00:00', 1),
(7, ' Martin Mbithi', 'Demo Train', 'Departure Station', 'Demo Station', '2019-04-30', '13:00', 0);

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
(3, 'Demo Employee', '127.0.0.1', 'Demo Address', '00', '09876543', 'demo@mail.com', 'demo', 'fe01ce2a7fbac8fafaed7c982a04e229');

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
  `passwordconf` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`id`, `name`, `age`, `gender`, `phoneno`, `date`, `email`, `username`, `password`, `passwordconf`) VALUES
(3, 'Demo Passenger', '20', 'Male', '1234567890', '2019-04-26 13:27:03.5664', 'martdevelopers254@gmail.com', 'demousername', 'demo', ''),
(4, 'mercy', '20', 'Female', '1234567890', '2019-04-29 11:27:29.6255', 'mercy@mail.com', 'Mercy254', 'Mercy', ''),
(5, 'Martin Mbithi', '   23', 'Male', '    +2540704031263', '2019-05-08 13:52:25.3834', 'martinezmbithi@gmail.com', 'Mart', '3dc0c26f3ebf52dc86d42d50b8d16e5a', '3dc0c26f3ebf52dc86d42d50b8d16e5a');

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
(1, 'Martin', 'Kes 1200', 'Transport Ticket'),
(2, 'Demo Passenger', 'Ksh 120 ,000', 'Train Ticket'),
(3, 'mercy', 'KSH 1200', 'Train Ticket');

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
  `number` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `train`
--

INSERT INTO `train` (`id`, `name`, `route`, `current`, `destination`, `time`, `passengers`, `number`) VALUES
(2, 'Demo Train', 'Demo Route', 'Demo Current Station', 'Demo Destination', '00:55', '200', 'T-002'),
(3, 'Demo Train one', 'Demo TRain Route', 'Demo Current Station', 'Demo Destination', '13:20', '100', 'T-078');

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
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `train`
--
ALTER TABLE `train`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
