-- phpMyAdmin SQL Dump
-- version 5.2.1deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 01, 2024 at 02:34 PM
-- Server version: 10.11.6-MariaDB-0+deb12u1
-- PHP Version: 8.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tak23_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `simple`
--

CREATE TABLE `simple` (
  `id` int(11) UNSIGNED NOT NULL COMMENT 'Mina olen oluline väli! I am an important field!',
  `name` varchar(20) NOT NULL,
  `birth` date NOT NULL,
  `salary` int(5) DEFAULT NULL,
  `height` decimal(3,2) DEFAULT NULL,
  `added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `simple`
--

INSERT INTO `simple` (`id`, `name`, `birth`, `salary`, `height`, `added`) VALUES
(2, 'Mari Maasikas ', '1950-11-10', 20, 0.80, '2021-10-08 09:53:13'),
(3, ' Jüri Juurikas', '2005-01-10', 2220, 1.54, '2000-01-01 12:59:59'),
(4, 'Heli Kopter ', '1980-05-06', 2340, 1.59, '2010-05-05 00:00:00'),
(5, 'Ott Karu', '1999-01-30', 10000, 1.79, '2021-10-08 09:58:28'),
(6, 'Muru Muna', '1999-07-16', 12345, 1.60, '2021-10-08 10:04:48'),
(8, 'Juhan Juurikas', '2000-04-27', 800, 1.98, '2022-04-27 10:47:34'),
(9, 'Eino Muidugi', '1956-06-15', NULL, 1.95, '2023-03-11 19:28:18'),
(10, 'Aita-Leida Kuusepuu', '1994-09-01', 3215, NULL, '2023-03-11 19:28:18'),
(11, 'Kati Karu', '1983-01-11', 1234, 2.01, '2023-03-11 19:28:18'),
(12, 'Tuha Juhan', '1979-03-24', 975, 1.57, '2023-03-11 19:28:18'),
(13, 'Aia Maasikas', '1962-02-24', NULL, NULL, '2023-03-11 19:28:18'),
(14, 'Anna-Minna Kuusepuu', '1994-09-01', 5412, 1.95, '2023-03-11 19:28:18'),
(15, 'Kalju Kits', '1956-10-19', 7663, 1.89, '2023-03-11 19:28:18'),
(19, 'Cat Tom', '2023-03-13', NULL, NULL, '2023-03-13 15:55:35'),
(21, 'Shaun the Sheep', '2007-03-05', 9999, 0.60, '2023-03-14 12:52:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `simple`
--
ALTER TABLE `simple`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `simple`
--
ALTER TABLE `simple`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Mina olen oluline väli! I am an important field!', AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
