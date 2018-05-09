-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 04:17 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 7.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skivm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `fornavn` varchar(30) NOT NULL,
  `etternavn` varchar(30) NOT NULL,
  `telefonnummer` varchar(30) NOT NULL,
  `brukernavn` varchar(30) NOT NULL,
  `passord` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`fornavn`, `etternavn`, `telefonnummer`, `brukernavn`, `passord`) VALUES
('Fornavn', 'Etternavn', '12345678', 'admin', '43b207c695de67a7b0fa59b42c2092009ac9e7e4');

-- --------------------------------------------------------

--
-- Table structure for table `ovelse`
--

CREATE TABLE `ovelse` (
  `ovelseid` int(11) NOT NULL,
  `type` varchar(30) NOT NULL,
  `sted` varchar(30) NOT NULL,
  `dato` varchar(30) NOT NULL,
  `tid` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ovelse`
--

INSERT INTO `ovelse` (`ovelseid`, `type`, `sted`, `dato`, `tid`) VALUES
(1, 'Langrenn', 'Trysil', '30.06.2017', '14:45'),
(2, 'Skiskyting', 'Holmekollen', '14.05.2017', '15:00'),
(3, 'Klassisk Herrer', 'Oslo', '24.12.2017', '12:00'),
(4, 'Klassisk Damer', 'Oslo', '25.12.2017', '13:00');

-- --------------------------------------------------------

--
-- Table structure for table `publikum`
--

CREATE TABLE `publikum` (
  `publikumid` int(11) NOT NULL,
  `fornavn` varchar(30) NOT NULL,
  `etternavn` varchar(30) NOT NULL,
  `epost` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telefonnummer` int(11) NOT NULL,
  `ovelseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publikum`
--

INSERT INTO `publikum` (`publikumid`, `fornavn`, `etternavn`, `epost`, `adresse`, `telefonnummer`, `ovelseid`) VALUES
(1, 'TorbjÃ¸rn', 'Holtmon', 'torbjorn@gmail.com', 'Helsetdammen 34', 97713548, 1),
(2, 'Eirin', 'Holm', 'eirin@live.no', 'Hamarveien 26', 23456322, 1),
(3, 'Oline', 'Holtmon', 'Oline@gmail.com', 'Oline Holtmonsveg 7', 38281923, 1),
(4, 'Thomas', 'Ek Pedersen', 'Thomas@email.com', 'Oslosvingen 12', 58238212, 1),
(5, 'Haakon', 'Bjeltnes', 'Haakon@live.com', 'Toppenhaugen 21', 28328567, 1),
(6, 'Bjarte', 'Isachseen', 'Bjarte@hotmail.com', 'Skigaten 6', 49235678, 2),
(7, 'Sonja', 'Haraldsen', 'Sonja@gmail.no', 'Slottet', 22335522, 2),
(8, 'Harald', 'Haarfagre', 'Harald@jotunheimen.no', 'Rokkegaten 67', 39776655, 2),
(9, 'Jorun', 'Borgenesse', 'Jorun@hotmail.com', 'Kongsvingergaten 2', 98766423, 2),
(10, 'Kirsten', 'Ester', 'Kirsten@live.com', 'Rundeveien 4', 55442211, 2),
(11, 'Tordis', 'Hjamar', 'Tordis@email.com', 'Spanjolveien 8', 45231235, 3),
(12, 'Dennis', 'Sveinsen', 'Dennis@live.no', 'Askergaten 7', 23785345, 3),
(13, 'Anders', 'Gunnersen', 'Anders@gmail.com', 'Haldengaten 5', 12923456, 3),
(14, 'Gard', 'Lien', 'Gard@live.com', 'Hansegaten 4', 65823842, 3),
(15, 'Kim', 'Jensen', 'Kim@online.com', 'Blomstergaten 1', 48293023, 3),
(16, 'Even', 'Eidsvaag', 'Even@email.com', 'Gulgaten 5', 56786534, 4),
(17, 'Mari', 'Evensen', 'Mari@live.no', 'Teltplassen 1', 76934323, 4),
(18, 'Eirik', 'Olsen', 'Eirik@gmail.no', 'Ullevollsvingen 5', 56431234, 4),
(19, 'Fredrik', 'Korneliussen', 'Fredrik@live.com', 'Fjellgaten 9', 32134952, 4),
(20, 'Sander', 'Samuelsen', 'Sander@live.no', 'Smellveien 5', 89234521, 4);

-- --------------------------------------------------------

--
-- Table structure for table `utover`
--

CREATE TABLE `utover` (
  `utoverid` int(11) NOT NULL,
  `fornavn` varchar(30) NOT NULL,
  `etternavn` varchar(30) NOT NULL,
  `epost` varchar(30) NOT NULL,
  `adresse` varchar(30) NOT NULL,
  `telefonnummer` int(11) NOT NULL,
  `ovelseid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `utover`
--

INSERT INTO `utover` (`utoverid`, `fornavn`, `etternavn`, `epost`, `adresse`, `telefonnummer`, `ovelseid`) VALUES
(1, 'Anita', 'Krogstad', 'Anita@online.no', 'Holmekollveien 23', 54235234, 4),
(2, 'Bjorg', 'Bakke', 'Bjorg@live.no', 'Oslogaten 21', 30230232, 4),
(3, 'Elin', 'nygard', 'Elina@hotmail.com', 'Gateveien 56', 54232312, 4),
(4, 'Randi', 'Kromeleie', 'Randi@gmail.com', 'Hovedveien 52', 52502932, 4),
(5, 'Kristin', 'Berntsen', 'Kristin@yahoo.com', 'Helsettgaten 42', 49293012, 4),
(6, 'Endre', 'Bjartnass', 'Endre@gmail.com', 'Lommedalen 11', 49293921, 3),
(7, 'Knut', 'Knutsen', 'Knutepunkt@live.no', 'Karl Johansgate 21', 45633254, 3),
(8, 'Eldar', 'Ronning', 'eldar@gmail.com', 'Trondheimsveien 21', 48283929, 3),
(9, 'Thomas', 'Gjertsen', 'Thomas@gmail.com', 'Penneveien 65', 28362832, 3),
(10, 'Nils', 'Hansen', 'Nils@live.no', 'Gulaggaten', 23052032, 3),
(11, 'Ketil', 'Komstad', 'Ketil@yahoo.no', 'Bislettgaten 52', 52392932, 2),
(12, 'Halvor', 'Halveisen', 'Halvor@hotmail.com', 'Gateveien 21', 42320421, 2),
(13, 'Andreas', 'Spisstad', 'Andreas@online.no', 'Bergensveien 59', 49283294, 2),
(14, 'Marius', 'Banestad', 'Marius@gmail.eu', 'Kongehuset', 58282812, 2),
(15, 'Magnus', 'Samstad', 'Magnus@live.no', 'Drammensveien 67', 66554433, 2),
(16, 'Roar', 'Larsen', 'Roar@gmail.com', 'Skolegaten 1', 12838281, 1),
(17, 'Helge', 'Hansen', 'Helge@live.no', 'Skogveien 1', 47727722, 1),
(18, 'Vemund', 'Kristiansen', 'Vemund@hotmail.no', 'Kongsvingerveien 4', 77228822, 1),
(19, 'Geir', 'Jacobsen', 'Geir@online.no', 'Soloveien 3', 21238462, 1),
(20, 'Thor', 'Hammersen', 'Thor@yahoo.no', 'Fijolsvingen 1', 47283812, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ovelse`
--
ALTER TABLE `ovelse`
  ADD PRIMARY KEY (`ovelseid`);

--
-- Indexes for table `publikum`
--
ALTER TABLE `publikum`
  ADD PRIMARY KEY (`publikumid`);

--
-- Indexes for table `utover`
--
ALTER TABLE `utover`
  ADD PRIMARY KEY (`utoverid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ovelse`
--
ALTER TABLE `ovelse`
  MODIFY `ovelseid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `publikum`
--
ALTER TABLE `publikum`
  MODIFY `publikumid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `utover`
--
ALTER TABLE `utover`
  MODIFY `utoverid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
