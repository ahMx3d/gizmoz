-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2020 at 01:39 AM
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
(1, 'admin', 'admin@admin.com', '$2y$10$DiSoqzBesFHlwoaBMNc/teb1DmUVTkyKgTkVzI.mEeFac8v3ZLrWi', '2020-09-27 07:04:46', '2020-09-27 07:04:46');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(10) UNSIGNED NOT NULL,
  `status` tinyint(1) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `status`, `image`, `created_at`, `updated_at`) VALUES
(1, 0, 'https://lorempixel.com/640/480/technics/?86677', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(2, 1, 'https://lorempixel.com/640/480/technics/?21359', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(3, 0, 'https://lorempixel.com/640/480/technics/?82265', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(4, 0, 'https://lorempixel.com/640/480/technics/?85017', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(5, 0, 'https://lorempixel.com/640/480/technics/?66288', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(6, 0, 'https://lorempixel.com/640/480/technics/?63324', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(7, 0, 'https://lorempixel.com/640/480/technics/?21228', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(8, 0, 'https://lorempixel.com/640/480/technics/?48459', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(9, 0, 'https://lorempixel.com/640/480/technics/?27592', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(10, 0, 'https://lorempixel.com/640/480/technics/?94163', '2020-09-27 07:04:47', '2020-09-27 07:04:47'),
(11, 0, 'https://lorempixel.com/640/480/technics/?60647', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(12, 1, 'https://lorempixel.com/640/480/technics/?15688', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(13, 1, 'https://lorempixel.com/640/480/technics/?73711', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(14, 1, 'https://lorempixel.com/640/480/technics/?82135', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(15, 1, 'https://lorempixel.com/640/480/technics/?69430', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(16, 0, 'https://lorempixel.com/640/480/technics/?64571', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(17, 0, 'https://lorempixel.com/640/480/technics/?47847', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(18, 1, 'https://lorempixel.com/640/480/technics/?95146', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(19, 1, 'https://lorempixel.com/640/480/technics/?12890', '2020-09-27 07:04:48', '2020-09-27 07:04:48'),
(20, 0, 'https://lorempixel.com/640/480/technics/?96405', '2020-09-27 07:04:49', '2020-09-27 07:04:49');

-- --------------------------------------------------------

--
-- Table structure for table `brand_translations`
--

CREATE TABLE `brand_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `brand_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brand_translations`
--

INSERT INTO `brand_translations` (`id`, `brand_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'accusantium'),
(2, 1, 'ar', 'اسحار'),
(3, 2, 'en', 'corrupti'),
(4, 2, 'ar', 'عبد الرحمن'),
(5, 3, 'en', 'minus'),
(6, 3, 'ar', 'دانا كريستيل جميلة'),
(7, 4, 'en', 'vitae'),
(8, 4, 'ar', 'شوقي'),
(9, 5, 'en', 'tempore'),
(10, 5, 'ar', 'يعقوب'),
(11, 6, 'en', 'nostrum'),
(12, 6, 'ar', 'مي'),
(13, 7, 'en', 'laboriosam'),
(14, 7, 'ar', 'لؤي الدين'),
(15, 8, 'en', 'officia'),
(16, 8, 'ar', 'المثنى'),
(17, 9, 'en', 'et'),
(18, 9, 'ar', 'عبدالله'),
(19, 10, 'en', 'reiciendis'),
(20, 10, 'ar', 'شذا'),
(21, 11, 'en', 'laborum'),
(22, 11, 'ar', 'المؤمن بالله'),
(23, 12, 'en', 'rerum'),
(24, 12, 'ar', 'عبير'),
(25, 13, 'en', 'est'),
(26, 13, 'ar', 'سرمد'),
(27, 14, 'en', 'alias'),
(28, 14, 'ar', 'سهيله'),
(29, 15, 'en', 'ipsa'),
(30, 15, 'ar', 'سارة'),
(31, 16, 'en', 'nulla'),
(32, 16, 'ar', 'رنا'),
(33, 17, 'en', 'laboriosam'),
(34, 17, 'ar', 'عوف'),
(35, 18, 'en', 'soluta'),
(36, 18, 'ar', 'تيسير'),
(37, 19, 'en', 'exercitationem'),
(38, 19, 'ar', 'انعام'),
(39, 20, 'en', 'fugiat'),
(40, 20, 'ar', 'رباب');

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
(1, NULL, 'cumque-repellendus-aut-voluptate-veniam', 0, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(2, NULL, 'quibusdam-minus-voluptatum-earum-illum-aspernatur-tenetur-libero', 0, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(3, NULL, 'minus-illum-laudantium-officia-vel-deleniti-beatae', 1, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(4, NULL, 'asperiores-velit-delectus-dolorem-molestiae', 1, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(5, NULL, 'et-asperiores-voluptatem-quis-corporis-dignissimos-facere-qui', 0, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(6, NULL, 'quo-earum-ab-placeat-quo-atque-non', 1, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(7, NULL, 'aut-voluptatum-neque-expedita', 0, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(8, NULL, 'cupiditate-et-sed-maxime-voluptatem-est-eos-est', 0, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(9, NULL, 'fugit-quas-ratione-soluta-pariatur', 1, '2020-09-27 07:04:49', '2020-09-27 07:04:49'),
(10, NULL, 'ea-id-autem-sapiente-repellendus', 1, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(11, NULL, 'voluptatem-aut-voluptatem-dignissimos-saepe-hic-ut', 1, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(12, NULL, 'qui-laudantium-aliquid-ea-illum', 1, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(13, NULL, 'facere-quod-et-maxime-esse-laborum', 1, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(14, NULL, 'fugiat-et-laboriosam-nesciunt-cumque-sint-unde-qui-neque', 1, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(15, NULL, 'omnis-laudantium-blanditiis-et', 1, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(16, NULL, 'id-totam-dolorem-quasi-quia-atque-ut', 0, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(17, NULL, 'sapiente-consequatur-qui-quaerat-nihil-totam-hic-cupiditate', 1, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(18, NULL, 'quis-velit-cupiditate-sapiente-dignissimos-ut', 1, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(19, NULL, 'explicabo-voluptas-sunt-temporibus-eos-fuga', 0, '2020-09-27 07:04:50', '2020-09-27 07:04:50'),
(20, NULL, 'sit-magni-hic-inventore', 0, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(21, 11, 'sit-enim-fugit-laborum-aut-ut-et-ut', 1, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(22, 15, 'a-magni-doloremque-deserunt', 1, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(23, 2, 'officiis-et-ut-id-non-qui', 1, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(24, 4, 'accusantium-maxime-nulla-optio-qui-velit-est', 1, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(25, 5, 'maxime-consectetur-et-delectus-fugiat-et-ex', 1, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(26, 12, 'suscipit-quo-error-repellendus-est-voluptates-autem-eius', 1, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(27, 7, 'eius-minima-consectetur-recusandae-itaque-modi-molestiae', 1, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(28, 3, 'et-repudiandae-tempora-molestiae-adipisci-nisi-rerum', 1, '2020-09-27 07:04:51', '2020-09-27 07:04:51'),
(29, 11, 'molestiae-sint-enim-odit-accusantium-quidem-eum-doloremque', 0, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(30, 12, 'officiis-mollitia-nemo-est', 0, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(31, 5, 'similique-earum-voluptatem-aperiam-explicabo-in-ut-perferendis', 0, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(32, 19, 'eligendi-ab-sapiente-iste-cupiditate-debitis-ducimus-possimus', 1, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(33, 20, 'omnis-cum-dignissimos-error-nesciunt-corporis-sunt', 1, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(34, 11, 'a-odit-veniam-nam-aut-inventore-voluptatem-tenetur', 0, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(35, 6, 'quisquam-autem-blanditiis-qui', 1, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(36, 8, 'repellat-consequatur-esse-maxime-qui-est-omnis', 1, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(37, 13, 'nihil-labore-et-ipsa-rerum', 0, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(38, 15, 'voluptatem-dolor-eum-beatae-animi-voluptas-autem-nisi', 1, '2020-09-27 07:04:52', '2020-09-27 07:04:52'),
(39, 6, 'beatae-tempore-rerum-nobis-et', 0, '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(40, 13, 'totam', 1, '2020-09-27 07:04:53', '2020-09-30 11:06:11');

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
(1, 1, 'en', 'odit'),
(2, 1, 'ar', 'لطيفة'),
(3, 2, 'en', 'quia'),
(4, 2, 'ar', 'عهد'),
(5, 3, 'en', 'fugiat'),
(6, 3, 'ar', 'راندي'),
(7, 4, 'en', 'laudantium'),
(8, 4, 'ar', 'جوسيت'),
(9, 5, 'en', 'aut'),
(10, 5, 'ar', 'جهاد'),
(11, 6, 'en', 'sint'),
(12, 6, 'ar', 'فيروز'),
(13, 7, 'en', 'ipsam'),
(14, 7, 'ar', 'البراء'),
(15, 8, 'en', 'tempore'),
(16, 8, 'ar', 'جبير'),
(17, 9, 'en', 'et'),
(18, 9, 'ar', 'أصاله'),
(19, 10, 'en', 'suscipit'),
(20, 10, 'ar', 'غانم'),
(21, 11, 'en', 'aut'),
(22, 11, 'ar', 'لارا'),
(23, 12, 'en', 'cumque'),
(24, 12, 'ar', 'حصه'),
(25, 13, 'en', 'quo'),
(26, 13, 'ar', 'شكري'),
(27, 14, 'en', 'voluptatem'),
(28, 14, 'ar', 'معاوية'),
(29, 15, 'en', 'molestias'),
(30, 15, 'ar', 'نورالدين'),
(31, 16, 'en', 'dolores'),
(32, 16, 'ar', 'اناهيد'),
(33, 17, 'en', 'iure'),
(34, 17, 'ar', 'ندين'),
(35, 18, 'en', 'soluta'),
(36, 18, 'ar', 'ريناتا'),
(37, 19, 'en', 'repellat'),
(38, 19, 'ar', 'تمارا'),
(39, 20, 'en', 'voluptate'),
(40, 20, 'ar', 'انتظار'),
(41, 21, 'en', 'omnis'),
(42, 21, 'ar', 'بلال'),
(43, 22, 'en', 'cumque'),
(44, 22, 'ar', 'فيروز'),
(45, 23, 'en', 'sunt'),
(46, 23, 'ar', 'رسلان'),
(47, 24, 'en', 'est'),
(48, 24, 'ar', 'منتصر'),
(49, 25, 'en', 'et'),
(50, 25, 'ar', 'إسلام'),
(51, 26, 'en', 'aut'),
(52, 26, 'ar', 'هيفاء'),
(53, 27, 'en', 'consequatur'),
(54, 27, 'ar', 'عفاف'),
(55, 28, 'en', 'voluptatum'),
(56, 28, 'ar', 'نوال'),
(57, 29, 'en', 'ex'),
(58, 29, 'ar', 'إسلام'),
(59, 30, 'en', 'saepe'),
(60, 30, 'ar', 'عبدالمطلب'),
(61, 31, 'en', 'voluptas'),
(62, 31, 'ar', 'عبدالرؤوف'),
(63, 32, 'en', 'nostrum'),
(64, 32, 'ar', 'اسماء'),
(65, 33, 'en', 'sed'),
(66, 33, 'ar', 'دانييل'),
(67, 34, 'en', 'laudantium'),
(68, 34, 'ar', 'ميار'),
(69, 35, 'en', 'aut'),
(70, 35, 'ar', 'انجليكا'),
(71, 36, 'en', 'dolorem'),
(72, 36, 'ar', 'رهف'),
(73, 37, 'en', 'excepturi'),
(74, 37, 'ar', 'قارس'),
(75, 38, 'en', 'voluptatem'),
(76, 38, 'ar', 'عدوان'),
(77, 39, 'en', 'eveniet'),
(78, 39, 'ar', 'دانيال'),
(79, 40, 'en', 'totam'),
(80, 40, 'ar', 'عائشة');

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
(5, '2020_08_27_132008_create_settings_table', 1),
(6, '2020_08_27_132112_create_setting_translations_table', 1),
(7, '2020_09_01_130450_create_cates_table', 1),
(8, '2020_09_01_130846_create_cate_translations_table', 1),
(9, '2020_09_21_093513_create_brands_table', 1),
(10, '2020_09_21_093547_create_brand_translations_table', 1),
(11, '2020_09_23_001849_add_image_column_to_brands_table', 1),
(12, '2020_09_26_074307_create_tags_table', 1),
(13, '2020_09_26_074542_create_tag_translations_table', 1);

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
(1, 'default_locale', 0, 'en', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(2, 'default_timezone', 0, 'Africa/Cairo', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(3, 'reviews_enabled', 0, '1', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(4, 'auto_approve_reviews', 0, '1', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(5, 'supported_currencies', 0, '[\"USD\",\"LE\",\"SAR\"]', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(6, 'default_currency', 0, 'USD', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(7, 'store_email', 0, 'admin@admin.com', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(8, 'search_engine', 0, 'mysql', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(9, 'free_shipping_cost', 0, '0', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(10, 'local_pickup_cost', 0, '0', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(11, 'flat_rate_cost', 0, '0', '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(12, 'store_name', 1, NULL, '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(13, 'free_shipping_label', 1, NULL, '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(14, 'local_pickup_label', 1, NULL, '2020-09-27 07:04:53', '2020-09-27 07:04:53'),
(15, 'flat_rate_label', 1, NULL, '2020-09-27 07:04:53', '2020-09-27 07:04:53');

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
(1, 12, 'en', 'Gizmoz'),
(2, 13, 'en', 'Free shipping'),
(3, 14, 'en', 'Local pickup'),
(4, 15, 'en', 'Flat rate');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`id`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'sequi-qui-quos-nemo-hic-distinctio', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(2, 'quos-commodi-corporis-dolores-dolores', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(3, 'omnis-in-ea-totam-in-veniam', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(4, 'consequuntur-aspernatur-id-unde-error-tempora-inventore-veritatis-similique', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(5, 'tempore-natus-quas-aut-molestiae', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(6, 'aut-dignissimos-est-maxime-in-voluptas-ea', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(7, 'aut-dignissimos-sunt-aspernatur-soluta-aut-quis-aut-est', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(8, 'suscipit-sapiente-ipsum-non', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(9, 'dicta-adipisci-autem-tenetur-ab-a-explicabo-quaerat', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(10, 'ipsum-esse-id-enim-aut-sit-et-ipsum', '2020-09-27 07:04:54', '2020-09-27 07:04:54'),
(11, 'et-omnis-non-excepturi-culpa-molestias', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(12, 'nihil-voluptatem-voluptas-dolorum-nobis-minus-veritatis', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(13, 'minus-velit-vero-ullam-aperiam-recusandae-est-quisquam', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(14, 'est-nobis-veritatis-nihil-magni-rerum-suscipit', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(15, 'voluptas-aliquam-dolores-repellat-soluta-omnis', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(16, 'eum-et-animi-voluptates-sunt', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(17, 'rem-a-id-enim-voluptatum', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(18, 'ea-adipisci-perferendis-sed-omnis-deleniti-omnis-corrupti', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(19, 'commodi-dolorum-ipsam-et-ipsum', '2020-09-27 07:04:55', '2020-09-27 07:04:55'),
(20, 'quis-ut-ipsam-sint-ad-rerum-commodi', '2020-09-27 07:04:56', '2020-09-27 07:04:56');

-- --------------------------------------------------------

--
-- Table structure for table `tag_translations`
--

CREATE TABLE `tag_translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `tag_id` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tag_translations`
--

INSERT INTO `tag_translations` (`id`, `tag_id`, `locale`, `name`) VALUES
(1, 1, 'en', 'ab'),
(2, 1, 'ar', 'لورنس'),
(3, 2, 'en', 'esse'),
(4, 2, 'ar', 'أروى'),
(5, 3, 'en', 'at'),
(6, 3, 'ar', 'امير'),
(7, 4, 'en', 'explicabo'),
(8, 4, 'ar', 'ميناس'),
(9, 5, 'en', 'architecto'),
(10, 5, 'ar', 'رافع'),
(11, 6, 'en', 'molestias'),
(12, 6, 'ar', 'معويه'),
(13, 7, 'en', 'nihil'),
(14, 7, 'ar', 'ميرفت'),
(15, 8, 'en', 'maiores'),
(16, 8, 'ar', 'فاروق'),
(17, 9, 'en', 'maiores'),
(18, 9, 'ar', 'بيا'),
(19, 10, 'en', 'dignissimos'),
(20, 10, 'ar', 'موسى'),
(21, 11, 'en', 'fuga'),
(22, 11, 'ar', 'طلال'),
(23, 12, 'en', 'non'),
(24, 12, 'ar', 'نهار'),
(25, 13, 'en', 'similique'),
(26, 13, 'ar', 'رائد'),
(27, 14, 'en', 'vero'),
(28, 14, 'ar', 'اياد الدين'),
(29, 15, 'en', 'est'),
(30, 15, 'ar', 'ايه'),
(31, 16, 'en', 'sunt'),
(32, 16, 'ar', 'لؤي'),
(33, 17, 'en', 'corrupti'),
(34, 17, 'ar', 'أنوار'),
(35, 18, 'en', 'mollitia'),
(36, 18, 'ar', 'هيفاء'),
(37, 19, 'en', 'omnis'),
(38, 19, 'ar', 'برهان'),
(39, 20, 'en', 'voluptas'),
(40, 20, 'ar', 'جبير');

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
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `brand_translations_brand_id_locale_unique` (`brand_id`,`locale`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tags_slug_unique` (`slug`);

--
-- Indexes for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tag_translations_tag_id_locale_unique` (`tag_id`,`locale`);

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `brand_translations`
--
ALTER TABLE `brand_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cates`
--
ALTER TABLE `cates`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cate_translations`
--
ALTER TABLE `cate_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `setting_translations`
--
ALTER TABLE `setting_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tag_translations`
--
ALTER TABLE `tag_translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `brand_translations`
--
ALTER TABLE `brand_translations`
  ADD CONSTRAINT `brand_translations_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`) ON DELETE CASCADE;

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

--
-- Constraints for table `tag_translations`
--
ALTER TABLE `tag_translations`
  ADD CONSTRAINT `tag_translations_tag_id_foreign` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
