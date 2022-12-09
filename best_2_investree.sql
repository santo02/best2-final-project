-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2022 at 12:45 PM
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
(2, 'Teknologi', 'teknologi', '2022-12-07 18:36:21', '2022-12-07 18:36:21'),
(3, 'Pendidikan', 'pendidikan', '2022-12-07 18:36:50', '2022-12-07 18:36:50'),
(4, 'Game', 'game', '2022-12-07 18:37:06', '2022-12-07 18:37:06');

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
(1, '2', '1', 'test', '2022-12-07 18:42:06', '2022-12-07 18:42:06'),
(2, '2', '1', 'hi', '2022-12-07 18:42:19', '2022-12-07 18:42:19'),
(3, '2', '3', 'hah', '2022-12-07 19:26:57', '2022-12-07 19:26:57');

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
(1, 'Hoyoverse', 'hoyoverse', '/assets/img/company/1670462440_Featured-Hoyo-Verse.jpg', '2022-12-07 18:20:40', '2022-12-07 18:20:40'),
(3, 'Google Indonesia', 'google-indonesia', '/assets/img/company/1670471752_google-logo.jpg', '2022-12-07 20:55:52', '2022-12-07 20:55:52');

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
(8, '2014_10_12_000000_create_users_table', 1),
(9, '2014_10_12_100000_create_password_resets_table', 1),
(10, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(11, '2022_11_25_093816_create_categories_table', 1),
(12, '2022_11_25_094757_create_posts_table', 1),
(13, '2022_11_25_102220_create_comments_table', 1),
(14, '2022_11_26_091925_create_companies_table', 1);

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
  `user_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `company_id`, `categori_id`, `title`, `slug`, `post_image`, `post_detail`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '1', '1', 'Genshin Impact Version 3.2 Arrives November 2', 'genshin-impact-version-32-arrives-november-2', '/assets/img/post/1670462803_20e2459cd05dce761217a409103905a8_339547909977338277.jpg', 'Global interactive entertainment brand HoYoverse has announced Genshin Impact\'s Version 3.2 \"Akasha Pulses, the Kalpa Flame Rises\" will arrive on November 2. With the latest update, Sumeru\'s main storyline will culminate in a climax before coming to a grand finale, and more local allies, including Nahida and Layla, will be ready to join as playable characters. Meanwhile, more formidable opponents and fun events, including one to catch and train Fungi, will further enrich players\' adventures in the fantasy world of Teyvat.', '1', '2022-12-07 18:26:43', '2022-12-07 18:26:43'),
(2, '1', '4', 'Genshin Impact Version 3.2 Arrives November 2', 'genshin-impact-version-32-arrives-november-2', '/assets/img/post/1670463472_20e2459cd05dce761217a409103905a8_339547909977338277.jpg', 'Global interactive entertainment brand HoYoverse has announced Genshin Impact\'s Version 3.2 \"Akasha Pulses, the Kalpa Flame Rises\" will arrive on November 2. With the latest update, Sumeru\'s main storyline will culminate in a climax before coming to a grand finale, and more local allies, including Nahida and Layla, will be ready to join as playable characters. Meanwhile, more formidable opponents and fun events, including one to catch and train Fungi, will further enrich players\' adventures in the fantasy world of Teyvat.', '1', '2022-12-07 18:37:52', '2022-12-07 18:37:52'),
(3, '3', '2', 'For the first time, Waze navigation is built in to your car', 'for-the-first-time-waze-navigation-is-built-in-to-your-car', '/assets/img/post/1670471826_Renault_PR_Hero_1200x628__WithoutLockup_2x.max-1000x1000.jpg', 'For the first time ever, Waze is launching a new, dedicated app on select cars with Google built-in. The experience is rolling out today, starting with select Renault vehicles. With this new experience, Renault drivers will have all Waze real-time routing, navigation and alerts, plus settings, preferences and saved places, built into their car display. Drivers can now enjoy a bigger, bolder navigation display right at eye level without using their phone.', '3', '2022-12-07 20:57:06', '2022-12-07 20:57:06');

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
(1, 'Rafie Akmal Haryanto', 'rafieakmalharyanto', 'testname@gmail.com', 'user', '$2y$10$7Q5MgrEtxb3VeszeSSwVBeE3sfzO8Rg56JYyBDVQ/n.Jc4BJSwDpq', '/assets/img/profile/1670470754_save = follow _3.jpg', 0, NULL, NULL, '2022-12-07 18:16:09', '2022-12-07 20:13:35'),
(2, 'admin', 'admin', 'admin@admin.com', 'admin', '$2y$10$nrzrIwdIlpZGsN.EGeLq..BdSqSuaqPQUOV0fXSGdGCpCoZgr.C1u', '/assets/img/profile/default.jpeg', 0, NULL, NULL, '2022-12-07 18:19:11', '2022-12-07 18:19:11'),
(3, 'Pendragon', 'rafie', 'rafie1112.ra@gmail.com', 'user', '$2y$10$/mrm1/jZ0M5E5oazYHaY3ecRKy1nTdACXFpoUo5iPrOMRuHAPGor.', '/assets/img/profile/1670499652_24d2100cfcc45f4fd45bf6fa98ca372f.jpg', 0, NULL, NULL, '2022-12-07 19:26:37', '2022-12-07 21:02:23');

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

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
