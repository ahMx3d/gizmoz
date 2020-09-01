-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2020 at 06:01 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gizmoz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `created_at`, `updated_at`) VALUES
(4, 'admin', 'admin@admin.com', '$2y$10$4uJuJZQTuIAb1EKQNKVwGOatjlwiqXgPwT26piNI8IIyfIBIYKRmC', '2020-08-20 02:32:13', '2020-08-31 22:50:16');

-- --------------------------------------------------------

--
-- Table structure for table `cates`
--

CREATE TABLE `cates` (
  `id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cates`
--

INSERT INTO `cates` (`id`, `parent_id`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(1, NULL, 'sed-consequatur-distinctio-reiciendis-laboriosam-quo-totam-provident', 0, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(2, NULL, 'perspiciatis-itaque-at-et-cumque-rerum-blanditiis-reiciendis-doloremque', 0, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(3, NULL, 'possimus-fugiat-accusantium-molestias-vitae', 1, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(4, NULL, 'voluptas-aut-ab-accusantium-molestiae-totam-ut', 1, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(5, NULL, 'commodi-assumenda-perspiciatis-cupiditate-hic-laudantium-non', 1, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(6, NULL, 'quasi-quaerat-distinctio-veritatis-non-dolor-unde-culpa', 1, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(7, NULL, 'fugit-animi-nulla-ut-optio-consequatur-soluta', 0, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(8, NULL, 'eum-in-quisquam-qui-et-non-similique-beatae-et', 0, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(9, NULL, 'excepturi-optio-occaecati-quo-temporibus-aperiam', 0, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(10, NULL, 'itaque-facilis-impedit-et-odit', 0, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(11, NULL, 'ab-minima-qui-dolor-reprehenderit-voluptates', 1, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(12, NULL, 'earum-at-est-mollitia', 1, '2020-09-01 12:24:57', '2020-09-01 12:24:57'),
(13, NULL, 'sint-aut-vitae-non-iusto-veritatis-doloremque', 0, '2020-09-01 12:24:58', '2020-09-01 12:24:58'),
(14, NULL, 'aut-molestiae-in-molestiae-porro-autem-libero-assumenda', 1, '2020-09-01 12:24:58', '2020-09-01 12:24:58'),
(15, NULL, 'aut-porro-suscipit-quia-aut-quia-nam-inventore', 1, '2020-09-01 12:24:58', '2020-09-01 12:24:58'),
(16, NULL, 'quia-doloribus-necessitatibus-rerum-maxime-est-totam', 0, '2020-09-01 12:24:58', '2020-09-01 12:24:58'),
(17, NULL, 'ea-non-eos-dolorem-occaecati', 0, '2020-09-01 12:24:58', '2020-09-01 12:24:58'),
(18, NULL, 'doloribus-quidem-minus-enim-voluptatem-est-molestiae-fugiat', 0, '2020-09-01 12:24:58', '2020-09-01 12:24:58'),
(19, NULL, 'nisi-voluptatem-dolores-quo-aut', 1, '2020-09-01 12:24:58', '2020-09-01 12:24:58'),
(20, NULL, 'omnis-ut-sit-soluta-vitae-provident-assumenda', 0, '2020-09-01 12:24:58', '2020-09-01 12:24:58');

-- --------------------------------------------------------

--
-- Table structure for table `cate_translations`
--

CREATE TABLE `cate_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `cate_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cate_translations`
--

INSERT INTO `cate_translations` (`id`, `cate_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'omnis'),
(2, 2, 'en', 'est'),
(3, 3, 'en', 'praesentium'),
(4, 4, 'en', 'et'),
(5, 5, 'en', 'sit'),
(6, 6, 'en', 'iusto'),
(7, 7, 'en', 'fugit'),
(8, 8, 'en', 'tempore'),
(9, 9, 'en', 'eum'),
(10, 10, 'en', 'minus'),
(11, 11, 'en', 'inventore'),
(12, 12, 'en', 'porro'),
(13, 13, 'en', 'tenetur'),
(14, 14, 'en', 'nihil'),
(15, 15, 'en', 'tempora'),
(16, 16, 'en', 'voluptates'),
(17, 17, 'en', 'esse'),
(18, 18, 'en', 'itaque'),
(19, 19, 'en', 'accusantium'),
(20, 20, 'en', 'quasi');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_08_20_033234_create_admins_table', 1),
(9, '2020_08_27_132008_create_settings_table', 2),
(10, '2020_08_27_132112_create_setting_translations_table', 2),
(11, '2020_09_01_130450_create_cates_table', 3),
(12, '2020_09_01_130846_create_cate_translations_table', 3);

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
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_translatable` tinyint(1) NOT NULL DEFAULT 0,
  `plain_value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `is_translatable`, `plain_value`, `created_at`, `updated_at`) VALUES
(16, 'default_locale', 0, 'en', '2020-08-27 20:03:04', '2020-08-28 19:44:19'),
(17, 'default_timezone', 0, 'Africa/Cairo', '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(18, 'reviews_enabled', 0, '1', '2020-08-27 20:03:04', '2020-08-28 19:44:19'),
(19, 'auto_approve_reviews', 0, '1', '2020-08-27 20:03:04', '2020-08-28 19:44:19'),
(20, 'supported_currencies', 0, '[\"USD\",\"LE\",\"SAR\"]', '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(21, 'default_currency', 0, 'USD', '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(22, 'store_email', 0, 'admin@admin.com', '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(23, 'search_engine', 0, 'mysql', '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(24, 'free_shipping_cost', 0, '0', '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(25, 'local_pickup_cost', 0, '0', '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(26, 'flat_rate_cost', 0, '0', '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(27, 'store_name', 1, NULL, '2020-08-27 20:03:04', '2020-08-27 20:03:04'),
(28, 'free_shipping_label', 1, NULL, '2020-08-27 20:03:04', '2020-08-29 14:25:58'),
(29, 'local_pickup_label', 1, NULL, '2020-08-27 20:03:04', '2020-08-29 14:26:29'),
(30, 'flat_rate_label', 1, NULL, '2020-08-27 20:03:04', '2020-08-29 14:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `setting_translations`
--

CREATE TABLE `setting_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `setting_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `setting_translations`
--

INSERT INTO `setting_translations` (`id`, `setting_id`, `locale`, `value`) VALUES
(5, 27, 'en', 'Gizmoz'),
(6, 28, 'en', 'Free shipping'),
(7, 29, 'en', 'Local pickup'),
(8, 30, 'en', 'Flat rate');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `cates`
--
ALTER TABLE `cates`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cates_slug_unique` (`slug`),
  ADD KEY `cates_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `cate_translations`
--
ALTER TABLE `cate_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cate_translations_cate_id_locale_unique` (`cate_id`,`locale`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `setting_translations_setting_id_locale_unique` (`setting_id`,`locale`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `cate_translations`
--
ALTER TABLE `cate_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cates`
--
ALTER TABLE `cates`
  ADD CONSTRAINT `cates_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `cate_translations`
--
ALTER TABLE `cate_translations`
  ADD CONSTRAINT `cate_translations_cate_id_foreign` FOREIGN KEY (`cate_id`) REFERENCES `cates` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `setting_translations`
--
ALTER TABLE `setting_translations`
  ADD CONSTRAINT `setting_translations_setting_id_foreign` FOREIGN KEY (`setting_id`) REFERENCES `settings` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
