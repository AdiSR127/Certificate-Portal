-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2021 at 01:47 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `part`
--

-- --------------------------------------------------------

--
-- Table structure for table `nprint`
--

CREATE TABLE `nprint` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `event` text NOT NULL,
  `name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nprint`
--

INSERT INTO `nprint` (`id`, `email`, `event`, `name`) VALUES
(1, 'adiusingh127@gmail.com', 'Talent Hunt', 'Aditya Singh'),
(2, 'adiusingh127@gmail.com', 'Executive', 'Aditya Singh'),
(3, 'adiusingh137@gmail.com', 'Talent Hunt', 'Adi Singh'),
(4, 'adiusingh127@gmail.com', 'Open mic', 'Aditya Singh');

-- --------------------------------------------------------

--
-- Table structure for table `print`
--

CREATE TABLE `print` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `nprint`
--
ALTER TABLE `nprint`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `print`
--
ALTER TABLE `print`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `nprint`
--
ALTER TABLE `nprint`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `print`
--
ALTER TABLE `print`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
