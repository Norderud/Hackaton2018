-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2018 at 03:17 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kart`
--

-- --------------------------------------------------------

--
-- Table structure for table `bruker`
--

CREATE TABLE `bruker` (
  `id` int(11) NOT NULL,
  `etternavn` varchar(255) NOT NULL,
  `fornavn` varchar(255) DEFAULT NULL,
  `epost` varchar(255) DEFAULT NULL,
  `passord` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sted`
--

CREATE TABLE `sted` (
  `navn` varchar(255) NOT NULL,
  `lengdegrad` double NOT NULL,
  `breddegrad` double NOT NULL,
  `pris` double NOT NULL,
  `beskrivelse` varchar(255) NOT NULL,
  `epost` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bruker`
--
ALTER TABLE `bruker`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sted`
--
ALTER TABLE `sted`
  ADD PRIMARY KEY (`navn`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bruker`
--
ALTER TABLE `bruker`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
