-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 09, 2022 at 10:48 AM
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
-- Database: `best_2_investree`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `Categories_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `Categories_name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Game', 'game', '2022-12-09 01:32:09', '2022-12-09 01:32:09');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `comments`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'hui', '2022-12-09 01:48:35', '2022-12-09 01:48:35');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_slug`, `company_image`, `created_at`, `updated_at`) VALUES
(1, 'Hoyoverse', 'hoyoverse', '/assets/img/company/1670574592_1670410786_Featured-Hoyo-Verse.jpg', '2022-12-09 01:29:52', '2022-12-09 01:29:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2022_11_25_093816_create_categories_table', 1),
(5, '2022_11_25_094757_create_posts_table', 1),
(6, '2022_11_25_102220_create_comments_table', 1),
(7, '2022_11_26_091925_create_companies_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `categori_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_detail` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `preview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `company_id`, `categori_id`, `title`, `slug`, `post_image`, `post_detail`, `preview`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '5 Splendid Reasons Why Genshin Impact Is Popular Amongst Gamers', '5-splendid-reasons-why-genshin-impact-is-popular-amongst-gamers', '/assets/img/post/1670575219_pasted-image-0-15.png', '<h3><strong>Genshin Impact is an amazing sport, and in the back of every extremely good recreation are several motives why game enthusiasts adore it.</strong></h3><p><br></p><p>Genshin Impact was released on 28 September 2020, and has long passed on as one of the most popular new games. It does not appear like its reputation will wane each time quickly, both. Genshin Impact isn’t always only a coy trend or something hopping off of the fashion of other games. There are legitimate reasons as to why lovers will preserve playing Genshin Impact for future years</p><p><br></p><p>Whether it’s its memorable characters, first rate art route, or stable gameplay, Genshin Impact has left its mark on gamers. It might not be each person’s cup of tea, but it is easy to recognize why Genshin Impact has succeeded. As it’s far from all lists, there are definitely more than five motives why Genshin Impact is famous among game enthusiasts, but these 5 motives are popular ones players can recognize without problems.</p><p><br></p><p><span style=\"color: rgb(65, 65, 65);\">Five tremendous reasons why Genshin Impact is famous amongst gamers</span></p><p><br></p><ul><li><strong>Solid middle gameplay</strong></li></ul><p><img src=\"https://i.ibb.co/H7rqKkB/1670574959-pasted-image-0-11-1670574959.png\"></p><p><br></p><p>As it’s far with most successful video games, Genshin Impact determined a recipe for achievement in regards to its core gameplay. Combat appears easy at the 	surface level, however it’s rather deep. There are several builds for gamers to attempt out, with several characters to feature to a celebration.</p><p><br></p><p>However, as it’s miles reminiscent of gacha video games, gamers do not have the right of entry to each character and weapon. Hence, they need to paint around their barriers in smart and innovative approaches. Other critical gameplay features consist of cooking, alchemy, and numerous battle pass demanding situations, and that is not even all of the relevant gameplay features.</p><p><br></p><ul><li><strong>Frequent updates</strong></li></ul><p><img src=\"https://i.ibb.co/FYn31Fz/1670575191-pasted-image-0-12-1670575191.png\"></p><p><br></p><p>A recreation without updates is a game that’ll inevitably lose players. This is actual for most video games (no longer all), so fortunately for Genshin Impact players, there are a whole lot of updates. Something as current as Mondstadt’s Windblume Festival is especially distinct from the replacement that introduced Dragonspine in Genshin Impact. The quality and quantity of these updates help preserve a stable participant count.</p><p><br></p><p>Sometimes, there are new quests, places to explore, and sports (which can sense substantially one-of-a-kind from normal gameplay in an awesome manner). As a result, Genshin Impact in no way feels stale.</p>', 'Genshin Impact is an amazing sport, and in the back of every extremely good recreation are several motives why game enthusiasts adore it.\r\n\r\nGenshin Impact was released on 28 September 2020, and has long passed on as one of the most popular new games. It does not appear like its reputation will wane each time quickly, both. Genshin Impact isn’t always only a coy trend or something hopping off of the fashion of other games. There are legitimate reasons as to why lovers will preserve playing Genshin Impact for future years\r\n\r\nWhether it’s its memorable characters, first rate art route, or stable gameplay, Genshin Impact has left its mark on gamers. It might not be each person’s cup of tea, but it is easy to recognize why Genshin Impact has succeeded. As it’s far from all lists, there are definitely more than five motives why Genshin Impact is famous among game enthusiasts, but these 5 motives are popular ones players can recognize without problems.', '2', '2022-12-09 01:40:19', '2022-12-09 01:40:19');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('admin','user') COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '/assets/img/profile/default.jpeg',
  `is_verified` tinyint(1) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email`, `role`, `password`, `image`, `is_verified`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rafie Akmal Haryanto', 'rafieakmalh', 'rafie1112.ra@gmail.com', 'user', '$2y$10$UVq5MEJ.XktlYeG.OuR6L.yYhbYSfMuKeBXRtnAP9XO2UuBnZWRLG', '/assets/img/profile/1670577368_dc8e521c67289fcd1c67a7881d1573e8.jpg', 0, NULL, NULL, '2022-12-09 01:27:38', '2022-12-09 01:27:38'),
(2, 'Admin', 'testadmin', 'admin@admin.com', 'admin', '$2y$10$Zh9kyd4sDrauyCt.eCeCRuB/jbKpoBOqEWLYB7FqPmv0PGRhmpsOi', '/assets/img/profile/1670574710_Wanderer-min.png', 0, NULL, NULL, '2022-12-09 01:28:09', '2022-12-09 01:31:38'),
(3, 'test', 'test', 'testname@gmail.com', 'user', '$2y$10$DgmC5WPfq3ajN/P2CxZJgOt4Vk64AkLX4xTrXhxlGAlG43CAMCR/6', '/assets/img/profile/1670577435_🌙 Usagi Tsukino - icon.jpeg', 0, NULL, NULL, '2022-12-09 08:57:40', '2022-12-09 08:57:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
