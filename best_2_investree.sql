-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 12:26 PM
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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `post_id` int(10) NOT NULL,
  `user_id` int(10) NOT NULL,
  `komen` varchar(255) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `komen`, `created_time`) VALUES
(3, 3, 1, 'Testing', '2022-11-25 14:47:02'),
(4, 3, 2, 'Hah?????', '2022-11-25 14:47:29'),
(5, 3, 2, 'Halo', '2022-11-25 15:05:26'),
(6, 3, 2, 'Halo', '2022-11-25 15:06:01'),
(7, 3, 1, 'Haiii semua', '2022-11-25 15:06:46'),
(8, 3, 1, 'Kakak', '2022-11-25 15:10:14'),
(9, 3, 1, 'sdadsdw', '2022-11-25 15:14:30'),
(10, 3, 1, 'hah', '2022-11-25 15:14:35'),
(11, 6, 1, 'Hai hai', '2022-11-25 15:15:07'),
(12, 5, 2, 'Hai', '2022-11-25 15:17:09');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(10) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `company_image` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `company_id` int(10) NOT NULL,
  `title` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `post_image` varchar(150) NOT NULL,
  `post_detail` text NOT NULL,
  `user_id` int(10) NOT NULL,
  `created_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `company_id`, `title`, `slug`, `category`, `post_image`, `post_detail`, `user_id`, `created_time`) VALUES
(3, 0, 'Tokopedia Gencarkan Persiapan Talenta Digital Masa Depan Lewat Program Devcamp', 'tokopedia-gencarkan-persiapan-talenta-digital-masa-depan-lewat-program-devcamp', 'Teknologi', '/assets/img/post/test.jpg', 'Kini siapa pun bisa mengasah keterampilan dan kemampuan diri dengan mudah lewat teknologi. Menemukan materi edukasi dan pembelajaran yang sesuai dengan minat dapat dilakukan kapan saja dan dimana saja.\r\n\r\nHal ini lah yang mendorong Tokopedia lewat Tokopedia Academy untuk terus berinovasi demi mewujudkan komitmen dalam menyediakan platform belajar inklusif yang dapat diakses oleh seluruh masyarakat Indonesia secara gratis, khususnya para talenta digital masa depan yang memiliki aspirasi untuk berkarya di industri teknologi.\r\n\r\nSalah satu program yang dibesut oleh Tokopedia Academy dan mendapatkan antusiasme tinggi dari pegiat teknologi adalah Devcamp. Program ini merupakan pelatihan eksklusif dan intensif selama tujuh hari penuh yang terbuka untuk mahasiswa tingkat akhir, lulusan baru, atau pun mereka yang memiliki pengalaman kerja maksimal dua tahun.', 2, '2022-11-24 16:15:46'),
(5, 0, 'Test Data', 'test-data', 'Teknologi', '/assets/img/post/ojk.webp', 'Seperti yang kita tahu, iklim di Indonesia bahkan di dunia sudah mulai mengalami perubahan dan sulit untuk diprediksi. Di periode ini kemudian muncul cuaca tak bersahabat yang membawa kuman dan mengancam kesehatan tubuh.\r\n\r\nSehingga mengakibatkan kita menjadi rentan terkena penyakit seperti batuk, radang maupun flu. Kita tentunya tak ingin sakit berlama-lama dan ingin segera kembali ke kondisi semula. Karena penyakit yang kelihatannya remeh ini sangat berpengaruh terhadap produktivitas.\r\n\r\nJangan biarkan flu berlama-lama mengganggu aktivitasmu sehari-hari. Selain istirahat cukup dan mengonsumsi vitamin, serta makan dengan nutrisi yang tepat. Obat flu bisa menjadi solusi jitu.', 1, '2022-11-24 16:45:28'),
(6, 1, 'Jangkau Belasan Ribu Pelaku UMKM di 2021, GoTo Kembali Gelar Konferensi Maju Digital 2022', 'goto-hadirkan-konferensi-maju-digital', 'Teknologi', '/assets/img/post/test.jpg', 'Indonesia, 27 Oktober 2022 - Grup GoTo, ekosistem digital terbesar Indonesia yang menaungi Gojek, Tokopedia dan GoTo Financial (GTF), tahun ini kembali menghadirkan Konferensi Maju Digital (KoMD) untuk para pegiat UMKM.\r\n\r\nKoMD 2022 merupakan edisi kedua, menyusul kesuksesan gelaran KoMD pertama pada 2021 yang menjangkau belasan ribu pelaku UMKM. Mengusung tema besar ‘Transformasi Usaha Digital dan Ramah Lingkungan’ yang selaras dengan misi pemerintah Indonesia dalam presidensi G20 2022, KoMD 2022 bertujuan mendorong kemajuan dan daya saing UMKM.\r\n\r\nSejumlah pakar dari berbagai bidang akan hadir dalam KoMD 2022 untuk berbagi pengalaman, berdiskusi dan memberikan pelatihan dalam rangkaian kelas yang dapat diikuti oleh pegiat UMKM untuk mengembangkan bisnisnya dengan memanfaatkan teknologi digital.\r\n\r\nBerbeda dengan tahun sebelumnya, kali ini konferensi berlangsung secara tatap muka (offline) di The Kasablanka Hall, Kota Kasablanka, Jakarta dan dapat disaksikan live melalui website Tokopedia Academy, YouTube Mitra Usaha Gojek, YouTube Tokopedia Seller, Tokopedia PLAY dan GoPlay.\r\n\r\nAcara dibuka oleh sambutan CEO Grup GoTo, Andre Soelistyo, dilanjutkan talkshow bersama Menteri Perdagangan RI, Zulkifli Hasan, Staf Ahli Menteri Bidang Produktivitas dan Daya Saing Kementerian Koperasi dan UKM, Eddy Satriya dan Kepala Grup Inovasi Keuangan Digital (IKD) Otoritas Jasa Keuangan, Triyono Gani.\r\n\r\nChief of Corporate Affairs Grup GoTo, Nila Marita menyatakan, “Bersama lebih dari 15 juta mitra usaha, 2,6 juta mitra pengemudi dan lebih dari 67 juta pengguna bertransaksi tahunan, ekosistem digital Grup GoTo berkontribusi sekitar 2% terhadap PDB Indonesia. Dampak ekonomi yang besar tersebut tidak lepas dari peran UMKM sebagai penggerak sektor riil ekonomi tanah air dan motor pendorong pemulihan ekonomi nasional. Grup GoTo menghadirkan KoMD untuk mendorong kemajuan para mitra UMKM melalui program edukasi dan pemberdayaan berkelanjutan.”\r\n\r\n“KoMD adalah konferensi UMKM nasional terbesar dari Grup GoTo untuk mendorong kapasitas pegiat UMKM Indonesia melalui berbagai inisiatif dan solusi teknologi, agar dapat terus beradaptasi dengan perkembangan dunia usaha masa kini. Kehadiran KoMD 2022 dilatarbelakangi oleh tingginya animo peserta rangkaian KoMD 2021,” jelas Group Head of Merchant Marketing Gojek dan GoTo Financial, Bayu Ramadhan.\r\n\r\n“Lebih dari 14 ribu peserta berpartisipasi dalam rangkaian KoMD 2021 dan mayoritas berasal dari Jabodetabek, Surabaya, Medan, Makassar dan Manado,” tambah Bayu.\r\n\r\nVP of Seller Experience Tokopedia, Puput Hidayat mengatakan, “Sebagai kelanjutan dari KoMD 2021, Grup GoTo telah secara rutin menyelenggarakan Kelas Maju Digital (KeMD) pada 2021. Melalui KeMD, Grup GoTo memberikan pembekalan terkait pengembangan usaha dan kompetensi kewirausahaan agar UMKM di seluruh penjuru Indonesia semakin menjadi pilihan masyarakat. KeMD dapat terlaksana melalui kolaborasi Grup GoTo dengan pemerintah daerah dan UMKM lokal untuk membantu pemulihan ekonomi daerah. KeMD 2021 telah diselenggarakan di berbagai wilayah, seperti Solo, Surabaya, Bandung, Semarang, Medan dan Jabodetabek.”\r\n\r\n“Tahun ini, KeMD 2022 menghadirkan berbagai topik sesuai kebutuhan UMKM dari berbagai skala, antara lain pemanfaatan media sosial, pengelolaan keuangan, hingga pembangunan bisnis yang ramah lingkungan. Banyak pegiat usaha lokal yang hadir sebagai narasumber dan siap berbagi inspirasi hari ini, seperti pemilik KEM Footwear, Buttonscarves, Erigo, SukkhaCitta, Teguk, Wakacao dan masih banyak lagi,” tambah Puput.\r\n\r\nSelain melalui KoMD dan KeMD, UMKM di berbagai daerah juga bisa memperoleh wawasan dari sesama UMKM melalui Komunitas Partner GoFood (KOMPAG), Keluarga Tokopedia (K-Top) dan Komunitas Retail GoTo Financial (KONTAG). Grup GoTo mencatat jumlah pegiat UMKM yang bergabung di KOMPAG, K-Top dan KONTAG bertambah lebih dari 80 ribu dalam setahun terakhir.\r\n\r\nKoMD dan KeMD adalah bagian dari upaya pemberdayaan UMKM yang telah menjadi mitra usaha Grup GoTo. Grup GoTo juga menyediakan solusi layanan digital yang holistik dan beragam guna membantu pegiat usaha khususnya UMKM menciptakan peluang dalam setiap fase pertumbuhan.', 2, '2022-11-25 11:16:38');

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
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'Rafie Akmal Haryanto', 'rafieakmalh', 'rafie1112.ra@gmail.com', 'user', '$2y$10$3nWF/CcVu/9m1NSgRjgyrewc483sGdPcTrPSuumhAXdt37glwyVhG', NULL, 0, NULL, NULL, '2022-11-23 22:17:01', '2022-11-23 22:17:01'),
(2, 'Aron Pendragon', 'aron_pendragon', 'aron_pendragon@gmail.com', 'user', '$2y$10$ZMzMfNgN1EpWfSxdZhGU9.tPg5rCXG7MX7oScbxlp3esT9qqyvjNu', NULL, 0, NULL, NULL, '2022-11-24 02:04:42', '2022-11-24 02:04:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
