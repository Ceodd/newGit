-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2017 at 11:50 AM
-- Server version: 5.7.11
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestilling`
--

-- --------------------------------------------------------

--
-- Table structure for table `bestilling`
--

CREATE TABLE `bestilling` (
  `bestillingID` int(11) NOT NULL,
  `tid` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `antall` int(11) NOT NULL,
  `type` varchar(50) NOT NULL,
  `epost` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bestilling`
--

INSERT INTO `bestilling` (`bestillingID`, `tid`, `antall`, `type`, `epost`) VALUES
(1, '2017-03-28 09:14:45', 3, 'standard', ''),
(2, '2017-03-28 09:30:07', 3, 'standard', 'kimcjensen@gmail.com'),
(3, '2017-03-28 09:37:35', 3, 'standard', 'kimcjensen@gmail.com'),
(4, '2017-03-28 09:37:57', 3, 'standard', 'kimcjensen@gmail.com'),
(5, '2017-03-28 09:38:56', 5, 'komfort3D', 'TrulsHansen@Hotmail.com'),
(6, '2017-03-28 09:40:01', 5, 'komfort3D', 'TrulsHansen@Hotmail.com'),
(7, '2017-03-28 09:41:16', 5, 'komfort3D', 'TrulsHansen@Hotmail.com'),
(8, '2017-03-28 10:00:07', 5, 'komfort3D', 'TrulsHansen@Hotmail.com'),
(9, '2017-03-29 13:24:47', 2, 'komfort', 'kimcjensen@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `kunde`
--

CREATE TABLE `kunde` (
  `KundeID` int(11) NOT NULL,
  `epost` varchar(50) NOT NULL,
  `navn` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `telnr` varchar(8) NOT NULL,
  `postnr` varchar(4) NOT NULL,
  `poststed` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kunde`
--

INSERT INTO `kunde` (`KundeID`, `epost`, `navn`, `adresse`, `telnr`, `postnr`, `poststed`) VALUES
(17, 'kimcjensen@gmail.com', 'Kim Jensen', 'Eliesons gate 4', '47640489', '3044', 'Drammen'),
(18, 'kimcjensen@gmail.com', 'Kim Jensen', 'Eliesons gate 4', '47640489', '3044', 'Drammen'),
(19, 'kimcjensen@gmail.com', 'Kim Jensen', 'Eliesons gate 4', '47640489', '3044', 'Drammen'),
(20, 'kimcjensen@gmail.com', 'Kim Jensen', 'Eliesons gate 4', '47640489', '3044', 'Drammen'),
(21, 'TrulsHansen@Hotmail.com', 'Truls Hansen', 'Drammensveien 12', '32434343', '3055', 'Krokstadelva'),
(22, 'TrulsHansen@Hotmail.com', 'Truls Hansen', 'Drammensveien 12', '32434343', '3055', 'Krokstadelva'),
(23, 'TrulsHansen@Hotmail.com', 'Truls Hansen', 'Drammensveien 12', '32434343', '3055', 'Krokstadelva'),
(24, 'TrulsHansen@Hotmail.com', 'Truls Hansen', 'Drammensveien 12', '32434343', '3055', 'Krokstadelva'),
(25, 'kimcjensen@gmail.com', 'Kim Jensen', 'Eliesons gate 4', '47640489', '3044', 'Drammen');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bestilling`
--
ALTER TABLE `bestilling`
  ADD PRIMARY KEY (`bestillingID`);

--
-- Indexes for table `kunde`
--
ALTER TABLE `kunde`
  ADD PRIMARY KEY (`KundeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bestilling`
--
ALTER TABLE `bestilling`
  MODIFY `bestillingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `kunde`
--
ALTER TABLE `kunde`
  MODIFY `KundeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
