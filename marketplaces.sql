-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2022 at 08:21 PM
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
-- Table structure for table `marketplaces`
--

CREATE TABLE `marketplaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `tingkat_keberhasilan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industri` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pinjaman` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pinjaman_terkumpul` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `metode_pengembalian` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jatuh_tempo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jangka_waktu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `marketplaces`
--

INSERT INTO `marketplaces` (`id`, `tingkat_keberhasilan`, `nama_perusahaan`, `industri`, `jumlah_pinjaman`, `pinjaman_terkumpul`, `metode_pengembalian`, `jatuh_tempo`, `jangka_waktu`, `created_at`, `updated_at`) VALUES
(2, '4', 'PT TORCH.ID', 'TEKSTIL', '100000000', '0', 'Cicilan pertahun', '22, July, 2026', '300', '2022-09-22 02:34:40', '2022-09-22 03:16:36'),
(4, '2', 'PT INI', 'Creative', '10000000000', '0', 'Cicilan perbulan', '22, July, 2025', '141', '2022-09-22 03:13:54', '2022-09-22 03:13:54'),
(14, '4', 'PT INI EDITED', 'Tekpang', '18000000000', '0', 'Cicilan perbulan', '13, July, 2024', '300', '2022-10-12 00:36:52', '2022-10-13 02:36:18'),
(23, '1', 'PT RAFIE', 'Teknologi', '167000000', '0', 'Cicilan perbulan', '13, July, 2025', '160', '2022-10-13 00:11:52', '2022-10-13 00:11:52'),
(27, '1', 'PT TEST', 'Makanan', '5000000', '0', 'Cicilan perbulan', '08, December, 2022', '360', '2022-10-22 10:42:14', '2022-10-22 10:42:14'),
(29, '4', 'TEST ADD NEW', 'Pangan', '100000000', '0', 'Cicilan perbulan', '23, November, 2022', '300', '2022-10-22 11:04:58', '2022-10-22 11:04:58'),
(31, '7', 'sfeff EDITED', 'Makanan', '1000000', '0', 'Cicilan perbulan', '15, December, 2022', '10', '2022-10-22 11:11:27', '2022-10-22 11:20:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `marketplaces`
--
ALTER TABLE `marketplaces`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `marketplaces`
--
ALTER TABLE `marketplaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
