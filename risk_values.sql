-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2022 at 08:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investree_merdeka`
--

-- --------------------------------------------------------

--
-- Table structure for table `risk_values`
--

CREATE TABLE `risk_values` (
  `risk_id` int(10) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `risk_values`
--

INSERT INTO `risk_values` (`risk_id`, `value`, `score`) VALUES
(1, '12', 'A+'),
(2, '13', 'A'),
(3, '14', 'A'),
(4, '15', 'B'),
(5, '16', 'B'),
(6, '17', 'C'),
(7, '18', 'C'),
(8, '19', 'C-'),
(9, '20', 'C-');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `risk_values`
--
ALTER TABLE `risk_values`
  ADD PRIMARY KEY (`risk_id`),
  ADD UNIQUE KEY `risk_values_value_unique` (`value`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `risk_values`
--
ALTER TABLE `risk_values`
  MODIFY `risk_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
