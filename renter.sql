-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 25, 2024 at 10:21 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `atema`
--

-- --------------------------------------------------------

--
-- Table structure for table `renter`
--

CREATE TABLE `renter` (
  `rid` int(15) NOT NULL,
  `remail` varchar(255) DEFAULT NULL,
  `rname` varchar(255) DEFAULT NULL,
  `rpassword` varchar(255) DEFAULT NULL,
  `raddress` varchar(255) DEFAULT NULL,
  `rnic` varchar(15) DEFAULT NULL,
  `rdob` date DEFAULT NULL,
  `rtel` varchar(15) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `renter`
--

INSERT INTO `renter` (`rid`, `remail`, `rname`, `rpassword`, `raddress`, `rnic`, `rdob`, `rtel`) VALUES
(1, 'renter@gmail.com', 'Test renter', '123', 'house 12 ', '0000000000', '2000-01-01', '0120000000'),
(20, 'k1@gmail.com', 'Kelvin  Moses', '123', '10', '90191919', '1990-12-12', '0700001111'),
(21, 'wanene@gmail.com', 'James wanene', '123', '12', '35517122', '1997-12-12', '0700000999'),
(17, 'k@gmail.com', 'ALEXANDER MAINA', '123', '340', '3500000', '0122-12-12', '0700000133'),
(18, 'njoki@gmail.com', 'Nancy Njoki m', '123', '12', '8787987', '1962-12-12', '0721554725'),
(19, 'bm@gmail.com', 'Brian  moho ', '123', '12 ', '12121212', '1212-12-12', '0700000100'),
(22, 'm1arkmuimi@gmail.com', 'Mark  m', '123', '12 ', '12121212', '1990-10-12', '0721554121'),
(23, 'brianwafula@gmail.com', 'brian  WAFULA', '123', '120', '10101010101', '2022-02-12', '0700001212');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `renter`
--
ALTER TABLE `renter`
  ADD PRIMARY KEY (`rid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `renter`
--
ALTER TABLE `renter`
  MODIFY `rid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
