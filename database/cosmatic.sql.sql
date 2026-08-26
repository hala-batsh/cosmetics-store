-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2026 at 12:25 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `building` varchar(255) DEFAULT NULL,
  `floor` varchar(255) DEFAULT NULL,
  `phone` varchar(255) NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `user_id`, `street`, `city`, `area`, `building`, `floor`, `phone`, `is_default`, `created_at`, `updated_at`) VALUES
(2, 1, 'Salah Ad-Deen', 'Aleppo', 'jnkjbj', NULL, NULL, '0951675437', 0, '2026-04-01 20:13:23', '2026-04-01 20:13:23'),
(3, 1, 'Salah Ad-Deen', 'Aleppo', 'cAc', NULL, NULL, '0951675437', 0, '2026-04-01 20:26:32', '2026-04-01 20:26:32'),
(4, 1, 'Salah Ad-Deen', 'Aleppo', 'hjv', NULL, NULL, '0951675437', 0, '2026-04-01 20:36:32', '2026-04-01 20:36:32'),
(5, 1, 'Salah Ad-Deen', 'Aleppo', 'ugiuyg', NULL, NULL, '0951675437', 0, '2026-04-03 16:54:45', '2026-04-03 16:54:45'),
(6, 1, 'Salah Ad-Deen', 'Aleppo', 'afawf', NULL, NULL, '0951675437', 0, '2026-04-03 18:04:41', '2026-04-03 18:04:41'),
(7, 1, 'Salah Ad-Deen', 'Aleppo', 'hbkhjk', NULL, NULL, '0951675437', 0, '2026-04-03 18:45:41', '2026-04-03 18:45:41'),
(8, 1, 'Salah Ad-Deen', 'Aleppo', 'jnknb', NULL, NULL, '0951675437', 0, '2026-04-03 18:46:10', '2026-04-03 18:46:10'),
(9, 1, 'Salah Ad-Deen', 'Aleppo', 'jkhkjh', NULL, NULL, '0951675437', 0, '2026-04-03 18:57:36', '2026-04-03 18:57:36'),
(10, 1, 'Salah Ad-Deen', 'Aleppo', 'jnbk', NULL, NULL, '0951675437', 0, '2026-04-03 19:06:49', '2026-04-03 19:06:49'),
(11, 1, 'Salah Ad-Deen', 'Aleppo', 'khvjh', NULL, NULL, '0951675437', 0, '2026-04-03 19:07:36', '2026-04-03 19:07:36'),
(12, 1, 'Salah Ad-Deen', 'Aleppo', 'bjhbjhb', NULL, NULL, '0951675437', 0, '2026-04-03 19:09:16', '2026-04-03 19:09:16'),
(13, 1, 'Salah Ad-Deen', 'Aleppo', 'jnkjbj', NULL, NULL, '0951675437', 0, '2026-04-05 18:02:52', '2026-04-05 18:02:52'),
(14, 1, 'Salah Ad-Deen', 'Aleppo', 'acac', NULL, NULL, '0951675437', 0, '2026-04-05 18:03:33', '2026-04-05 18:03:33'),
(15, 1, 'Salah Ad-Deen', 'Aleppo', 'jhgvy', NULL, NULL, '0951675437', 0, '2026-04-05 21:09:05', '2026-04-05 21:09:05'),
(16, 2, 'Salah Ad-Deen', 'Aleppo', 'kkkkkk', NULL, NULL, '0951675437', 0, '2026-04-07 16:31:51', '2026-04-07 16:31:51'),
(17, 2, 'Salah Ad-Deen', 'Aleppo', 'hbj j', NULL, NULL, '0955454499', 0, '2026-04-07 19:04:50', '2026-04-07 19:04:50'),
(18, 2, 'Salah Ad-Deen', 'Aleppo', 'njunk', NULL, NULL, '0955454499', 0, '2026-04-07 19:29:35', '2026-04-07 19:29:35'),
(19, 1, 'Salah Ad-Deen', 'Aleppo', 'hghg', NULL, NULL, '0951675437', 0, '2026-04-07 19:46:04', '2026-04-07 19:46:04'),
(20, 1, 'Salah Ad-Deen', 'Aleppo', 'hghc', NULL, NULL, '0951675437', 0, '2026-04-07 19:57:40', '2026-04-07 19:57:40'),
(21, 1, 'Salah Ad-Deen', 'Aleppo', 'hbjhb', NULL, NULL, '0951675437', 0, '2026-04-07 20:02:26', '2026-04-07 20:02:26'),
(22, 1, 'Salah Ad-Deen', 'Aleppo', 'gju', NULL, NULL, '0951675437', 0, '2026-04-07 20:30:21', '2026-04-07 20:30:21'),
(23, 1, 'Salah Ad-Deen', 'Aleppo', 'jnkjbj', NULL, NULL, '0951675437', 0, '2026-04-11 17:56:39', '2026-04-11 17:56:39'),
(24, 1, 'Salah Ad-Deen', 'Aleppo', 'jnkjbj', NULL, NULL, '0951675437', 0, '2026-04-17 16:10:17', '2026-04-17 16:10:17'),
(25, 1, 'Salah Ad-Deen', 'Aleppo', 'nhbuvg', NULL, NULL, '0951675437', 0, '2026-04-17 16:14:19', '2026-04-17 16:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `name`, `description`, `logo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'loreal', 'It contains all cosmetics and body care products.', 'LR', 1, NULL, NULL),
(2, 'Dior Beauty', 'It contains all cosmetics and body care products.It contains all cosmetics and body care products, in addition to body care products.', 'DR', 1, NULL, NULL),
(3, 'Swarovski', 'A global brand featuring renowned, beautiful, and distinctive accessories.', 'SW', 1, NULL, NULL),
(4, 'sali nails', 'This company provides all nail supplies', 'SNl', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Makeup', 'This section contains all local and international beauty products.', 1, NULL, '2026-04-07 20:33:43'),
(2, 'Skincare', 'This section contains skincare products including creams, oils, exfoliators, and moisturizers.', 1, NULL, NULL),
(3, 'Haircare', 'This section contains many hair products including serums, oils, and creams.', 1, NULL, NULL),
(4, 'Nailcare', 'This section contains a range of Nailcare products from international brands.', 1, NULL, NULL),
(5, 'Fragrance', 'The finest French perfumes', 1, NULL, NULL),
(6, 'Accessories', 'This section contains elegant and perfect jewelry.', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `delivery_companies_table`
--

CREATE TABLE `delivery_companies_table` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `name_company` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `delivery_price` decimal(8,2) NOT NULL,
  `estimated_time` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `delivery_companies_table`
--

INSERT INTO `delivery_companies_table` (`id`, `created_at`, `updated_at`, `name_company`, `phone`, `delivery_price`, `estimated_time`, `status`) VALUES
(1, NULL, NULL, 'DHL', '+999356543535', 5.00, '5days', 'Available'),
(2, NULL, NULL, 'FedEx', '+999965165065', 3.00, '2', '');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_02_06_132526_create_categories_table', 1),
(5, '2026_02_06_133312_create_brands_table', 1),
(6, '2026_02_06_134422_create_delivery_companies_table', 1),
(7, '2026_02_06_182249_create_addresses_table', 1),
(8, '2026_02_06_183203_create_products_table', 1),
(9, '2026_02_06_185309_create_photos_table', 1),
(10, '2026_02_06_191235_create_reviews_table', 1),
(11, '2026_02_06_191429_create_orders_table', 1),
(12, '2026_02_06_191659_create_order_products_table', 1),
(13, '2026_03_30_194126_add_user_id_to_orders_table', 1),
(14, '2026_03_30_195123_make_delivery_companies_table_id_nullable_in_orders', 1),
(15, '2026_03_31_213818_rename_delivery_price_column_in_delivery_companies_table', 1),
(16, '2026_03_31_215047_drop_delivery_companies_table', 1),
(17, '2026_04_01_202511_add_columns_to_delivery_companies_table', 2),
(18, '2026_04_06_231822_add_status_columns_to_orders_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `address_id` bigint(20) UNSIGNED NOT NULL,
  `delivery_companies_table_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payment_method_id` varchar(255) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `order_status` varchar(255) NOT NULL,
  `processing` tinyint(1) NOT NULL DEFAULT 0,
  `delivery_price` decimal(8,2) NOT NULL,
  `subtotal` decimal(8,2) NOT NULL,
  `total_price` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `address_id`, `delivery_companies_table_id`, `payment_method_id`, `payment_status`, `order_status`, `processing`, `delivery_price`, `subtotal`, `total_price`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 2, 1, 'cash', 'completed', 'completed', 0, 5.00, 60.00, 65.00, '2026-04-01 20:13:23', '2026-04-07 20:40:54', 1),
(2, 3, 2, 'cash', 'pending', 'pending', 0, 3.00, 20.00, 23.00, '2026-04-01 20:26:32', '2026-04-01 20:26:32', 1),
(3, 4, 2, 'cash', 'pending', 'pending', 0, 3.00, 20.00, 23.00, '2026-04-01 20:36:32', '2026-04-01 20:36:32', 1),
(4, 5, 1, 'cash', 'pending', 'pending', 0, 5.00, 40.00, 45.00, '2026-04-03 16:54:45', '2026-04-03 16:54:45', 1),
(5, 6, 1, 'cash', 'pending', 'pending', 0, 5.00, 40.00, 45.00, '2026-04-03 18:04:41', '2026-04-03 18:04:41', 1),
(6, 7, 1, 'cash', 'pending', 'pending', 0, 5.00, 20.00, 25.00, '2026-04-03 18:45:41', '2026-04-03 18:45:41', 1),
(7, 8, 2, 'cash', 'pending', 'pending', 0, 3.00, 20.00, 23.00, '2026-04-03 18:46:10', '2026-04-03 18:46:10', 1),
(8, 9, 1, 'cash', 'pending', 'pending', 0, 5.00, 5.00, 10.00, '2026-04-03 18:57:36', '2026-04-03 18:57:36', 1),
(9, 10, 1, 'cash', 'pending', 'shipped', 0, 5.00, 55.00, 60.00, '2026-04-03 19:06:49', '2026-04-07 17:44:14', 1),
(10, 11, 2, 'cash', 'pending', 'pending', 0, 3.00, 160.00, 163.00, '2026-04-03 19:07:36', '2026-04-03 19:07:36', 1),
(11, 12, 1, 'cash', 'pending', 'pending', 0, 5.00, 160.00, 165.00, '2026-04-03 19:09:16', '2026-04-03 19:09:16', 1),
(12, 13, 1, 'cash', 'pending', 'pending', 0, 5.00, 20.00, 25.00, '2026-04-05 18:02:52', '2026-04-05 18:02:52', 1),
(13, 14, 1, 'cash', 'pending', 'shipped', 0, 5.00, 90.00, 95.00, '2026-04-05 18:03:33', '2026-04-07 17:44:43', 1),
(14, 15, 1, 'cash', 'pending', 'delivered', 0, 5.00, 100.00, 105.00, '2026-04-05 21:09:05', '2026-04-07 17:40:13', 1),
(16, 16, 2, 'cash', 'completed', 'completed', 0, 3.00, 80.00, 83.00, '2026-04-07 16:31:51', '2026-04-07 17:19:44', 2),
(17, 17, 2, 'cash', 'pending', 'pending', 0, 3.00, 5.00, 8.00, '2026-04-07 19:04:50', '2026-04-07 19:04:50', 2),
(18, 18, 2, 'cash', 'pending', 'pending', 0, 3.00, 290.00, 293.00, '2026-04-07 19:29:35', '2026-04-07 19:29:35', 2),
(19, 19, 2, 'cash', 'pending', 'pending', 0, 3.00, 30.00, 33.00, '2026-04-07 19:46:04', '2026-04-07 19:46:04', 1),
(20, 20, 1, 'cash', 'pending', 'pending', 0, 5.00, 30.00, 35.00, '2026-04-07 19:57:40', '2026-04-07 19:57:40', 1),
(21, 21, 1, 'cash', 'pending', 'pending', 0, 5.00, 30.00, 35.00, '2026-04-07 20:02:26', '2026-04-07 20:02:26', 1),
(22, 22, 2, 'cash', 'pending', 'completed', 0, 3.00, 190.00, 193.00, '2026-04-07 20:30:21', '2026-04-07 21:00:58', 1),
(23, 23, 1, 'cash', 'pending', 'completed', 0, 5.00, 80.00, 85.00, '2026-04-11 17:56:39', '2026-04-17 16:03:57', 1),
(24, 24, 1, 'cash', 'pending', 'pending', 0, 5.00, 113.00, 118.00, '2026-04-17 16:10:17', '2026-04-17 16:10:17', 1),
(25, 25, 1, 'cash', 'pending', 'pending', 0, 5.00, 800.00, 805.00, '2026-04-17 16:14:19', '2026-04-17 16:14:19', 1);

-- --------------------------------------------------------

--
-- Table structure for table `order_product`
--

CREATE TABLE `order_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price_at_order` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_product`
--

INSERT INTO `order_product` (`id`, `order_id`, `product_id`, `quantity`, `price_at_order`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 4, 5.00, '2026-04-01 20:13:23', '2026-04-01 20:13:23'),
(2, 1, 2, 2, 20.00, '2026-04-01 20:13:23', '2026-04-01 20:13:23'),
(3, 2, 2, 1, 20.00, '2026-04-01 20:26:32', '2026-04-01 20:26:32'),
(4, 3, 2, 1, 20.00, '2026-04-01 20:36:32', '2026-04-01 20:36:32'),
(5, 4, 2, 2, 20.00, '2026-04-03 16:54:45', '2026-04-03 16:54:45'),
(6, 5, 2, 2, 20.00, '2026-04-03 18:04:41', '2026-04-03 18:04:41'),
(7, 6, 2, 1, 20.00, '2026-04-03 18:45:41', '2026-04-03 18:45:41'),
(8, 7, 2, 1, 20.00, '2026-04-03 18:46:10', '2026-04-03 18:46:10'),
(9, 8, 1, 1, 5.00, '2026-04-03 18:57:36', '2026-04-03 18:57:36'),
(10, 9, 1, 3, 5.00, '2026-04-03 19:06:49', '2026-04-03 19:06:49'),
(11, 9, 2, 2, 20.00, '2026-04-03 19:06:49', '2026-04-03 19:06:49'),
(12, 10, 2, 8, 20.00, '2026-04-03 19:07:36', '2026-04-03 19:07:36'),
(13, 11, 2, 8, 20.00, '2026-04-03 19:09:16', '2026-04-03 19:09:16'),
(14, 12, 1, 1, 5.00, '2026-04-05 18:02:52', '2026-04-05 18:02:52'),
(15, 12, 3, 1, 15.00, '2026-04-05 18:02:52', '2026-04-05 18:02:52'),
(16, 13, 9, 1, 90.00, '2026-04-05 18:03:33', '2026-04-05 18:03:33'),
(17, 14, 6, 1, 80.00, '2026-04-05 21:09:05', '2026-04-05 21:09:05'),
(18, 14, 5, 1, 15.00, '2026-04-05 21:09:05', '2026-04-05 21:09:05'),
(19, 14, 1, 1, 5.00, '2026-04-05 21:09:05', '2026-04-05 21:09:05'),
(20, 16, 6, 1, 80.00, '2026-04-07 16:31:51', '2026-04-07 16:31:51'),
(21, 17, 1, 1, 5.00, '2026-04-07 19:04:50', '2026-04-07 19:04:50'),
(22, 18, 2, 2, 20.00, '2026-04-07 19:29:35', '2026-04-07 19:29:35'),
(23, 18, 9, 2, 90.00, '2026-04-07 19:29:35', '2026-04-07 19:29:35'),
(24, 18, 7, 1, 40.00, '2026-04-07 19:29:35', '2026-04-07 19:29:35'),
(25, 18, 8, 1, 30.00, '2026-04-07 19:29:35', '2026-04-07 19:29:35'),
(26, 19, 8, 1, 30.00, '2026-04-07 19:46:04', '2026-04-07 19:46:04'),
(27, 20, 8, 1, 30.00, '2026-04-07 19:57:40', '2026-04-07 19:57:40'),
(28, 21, 8, 1, 30.00, '2026-04-07 20:02:26', '2026-04-07 20:02:26'),
(29, 22, 4, 1, 25.00, '2026-04-07 20:30:21', '2026-04-07 20:30:21'),
(30, 22, 6, 1, 80.00, '2026-04-07 20:30:21', '2026-04-07 20:30:21'),
(31, 22, 1, 1, 5.00, '2026-04-07 20:30:21', '2026-04-07 20:30:21'),
(32, 22, 7, 2, 40.00, '2026-04-07 20:30:21', '2026-04-07 20:30:21'),
(33, 23, 6, 1, 80.00, '2026-04-11 17:56:39', '2026-04-11 17:56:39'),
(34, 24, 3, 1, 15.00, '2026-04-17 16:10:17', '2026-04-17 16:10:17'),
(35, 24, 7, 1, 40.00, '2026-04-17 16:10:17', '2026-04-17 16:10:17'),
(36, 24, 18, 1, 8.00, '2026-04-17 16:10:17', '2026-04-17 16:10:17'),
(37, 24, 14, 1, 50.00, '2026-04-17 16:10:17', '2026-04-17 16:10:17'),
(38, 25, 16, 1, 800.00, '2026-04-17 16:14:19', '2026-04-17 16:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image_pathe` varchar(255) NOT NULL,
  `is_main` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `product_id`, `image_pathe`, `is_main`, `created_at`, `updated_at`) VALUES
(1, 1, 'products\\lipstick.jpg', 1, NULL, NULL),
(2, 2, 'products\\Face Wash.jpg', 1, NULL, NULL),
(3, 3, 'products/redlipstck.jpg', 1, NULL, NULL),
(4, 4, 'products\\poder.jpg', 0, NULL, NULL),
(5, 5, 'products\\Blush powder.jpg', 1, NULL, NULL),
(6, 6, 'products\\Serum.jpg', 1, NULL, NULL),
(7, 7, 'products\\Eyeliner.jpg', 0, NULL, NULL),
(8, 8, 'products\\Mascara.jpg', 0, NULL, NULL),
(9, 9, 'products\\Sun cream.jpg', 0, NULL, NULL),
(10, 10, 'products\\ax2.jpg', 1, NULL, NULL),
(11, 11, 'products\\fra1.jpg', 1, NULL, NULL),
(12, 12, 'products\\Silver earring.jpg', 1, NULL, NULL),
(13, 13, 'products\\Jorgina.jpg', 1, NULL, NULL),
(14, 14, 'products\\shado.jpg', 1, NULL, NULL),
(15, 15, 'products\\lipsticks.jpg', 0, NULL, NULL),
(16, 16, 'products\\Emerald ring.jpg', 1, NULL, NULL),
(17, 17, 'products\\red nail polish.jpg', 1, NULL, NULL),
(18, 18, 'products\\haifacosmatick.jpg', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(8,2) NOT NULL,
  `discount_price` decimal(8,2) DEFAULT NULL,
  `stock` int(11) NOT NULL,
  `sku` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_id`, `brand_id`, `name`, `description`, `price`, `discount_price`, `stock`, `sku`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'lipstick', 'Glossy lipstick', 5.00, 4.00, 19, 'GL001', 1, NULL, '2026-04-07 20:31:33'),
(2, 2, 2, 'Face Wash', 'Full coverage cosmetic face cream', 20.00, 18.00, 0, 'FW001', 1, NULL, '2026-04-07 18:41:27'),
(3, 1, 2, 'redlipstck', 'Lipstick that lasts for 8 hours', 15.00, 14.00, 49, 'lip8001', 1, NULL, '2026-04-17 16:10:17'),
(4, 1, 1, 'powder', 'Shimmery body powder', 25.00, 23.00, 19, 'po002', 0, NULL, '2026-04-07 20:30:21'),
(5, 1, 2, 'Blush powder', 'Blush with a subtle shimmer', 15.00, 14.00, 40, 'Bp00', 1, NULL, NULL),
(6, 3, 2, 'Serum', 'Nourishing hair serum', 80.00, 75.00, 38, 'SM004', 1, NULL, '2026-04-11 17:56:39'),
(7, 1, 2, 'Eyeliner', 'Black eyeliner with high staying power', 40.00, 37.00, 17, 'EY009', 1, NULL, '2026-04-17 16:10:17'),
(8, 1, 2, 'Mascara', 'Do not be affected or harmed, but rather be water.', 30.00, 29.00, 0, 'MS008', 1, NULL, '2026-04-07 20:02:26'),
(9, 2, 2, 'Sun cream', 'Sunscreen with high protection against the sun and UV rays, lasting for 6 hours.', 90.00, 88.00, 0, 'SK008', 1, NULL, NULL),
(10, 6, 3, 'Diamond set', 'Diamond set made of zircon', 50.00, 49.00, 20, 'AX001', 1, NULL, NULL),
(11, 5, 2, 'Gold dust', 'A pleasant and lasting scent', 20.00, 18.00, 20, 'GD001', 1, NULL, NULL),
(12, 6, 3, 'Silver earring', 'silver earring', 10.00, 9.00, 35, 'SE002', 1, NULL, NULL),
(13, 5, 2, 'Georgina perfume', 'Jogina perfume, a global trend', 100.00, 100.00, 50, 'JO005', 1, NULL, NULL),
(14, 1, 1, 'Shadow colors', 'Light and long-lasting eyeshadow colors', 50.00, 49.00, 39, 'SH008', 1, NULL, '2026-04-17 16:10:17'),
(15, 1, 1, 'lipsticks', 'Lipsticks for defining the lips', 9.00, 5.00, 30, 'LIPS001', 1, NULL, NULL),
(16, 6, 3, 'Emerald ring', 'Emerald ring with a green stone', 800.00, 800.00, 89, 'ER005', 1, NULL, '2026-04-17 16:14:19'),
(17, 4, 4, 'red nail polish', 'dry red nail polish', 20.00, 18.00, 50, 'NR009', 1, NULL, NULL),
(18, 4, 2, 'Haifa Cosmetics', 'adhesive nails', 8.00, 5.00, 19, 'NA007', 1, NULL, '2026-04-17 16:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `user_id`, `product_id`, `rating`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, '2026-04-05 17:01:03', '2026-04-05 17:01:03'),
(2, 1, 1, 3, 'good', '2026-04-05 17:01:39', '2026-04-05 17:01:39'),
(3, 1, 2, 2, 'good', '2026-04-05 17:38:08', '2026-04-05 17:38:08'),
(4, 1, 2, 5, 'very  cood', '2026-04-05 17:38:55', '2026-04-05 17:38:55'),
(5, 1, 2, 4, 'good', '2026-04-05 17:50:26', '2026-04-05 17:50:26'),
(6, 1, 2, 1, 'hbjhj', '2026-04-05 17:51:33', '2026-04-05 17:51:33'),
(7, 1, 2, 1, 'no', '2026-04-05 17:54:19', '2026-04-05 17:54:19'),
(8, 1, 2, 1, 'nkjnk', '2026-04-05 17:54:49', '2026-04-05 17:54:49'),
(9, 1, 2, 4, 'kjkjk', '2026-04-05 17:58:11', '2026-04-05 17:58:11'),
(10, 1, 2, 5, 'njkjbk', '2026-04-05 18:00:15', '2026-04-05 18:00:15'),
(11, 1, 18, 3, 'drgaegawe', '2026-04-17 15:58:13', '2026-04-17 15:58:13'),
(12, 1, 16, 2, 'hugtydrfty', '2026-04-17 16:13:21', '2026-04-17 16:13:21');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('PCJZGJSvZKk3eaBSFTDtWfABMKKXy2w8AiMfQtNF', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/147.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiVENWTXF0dlM0MEdkTXBWb2EwQzU3SWFpTUFveUViMldIUTd5YmYzbSI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7czo1OiJyb3V0ZSI7czo0OiJob21lIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo2OiJsb2NhbGUiO3M6MjoiZW4iO30=', 1776208523);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_phone` varchar(255) DEFAULT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `mobile_phone`, `role`, `created_at`, `updated_at`) VALUES
(1, 'حلا بطش', 'halabatesh11111@gmail.com', NULL, '$2y$12$SlMOMUv9LL/Qn7K3DX3fh.l9wob/eYEwJHVg5khyEx0OqsIAmpQH6', '0951675437', 'admin', '2026-04-01 18:13:12', '2026-04-01 18:13:12'),
(2, 'rana', 'ranabatesh11111@gmail.com', NULL, '$2y$12$u0ujNAWLeQk9jmyyds9VF.rZxbU6DqFvF97Y7GSIjy9bauzKtBPR.', '0955454499', 'user', '2026-04-07 16:31:13', '2026-04-07 16:31:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `addresses_user_id_foreign` (`user_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `delivery_companies_table`
--
ALTER TABLE `delivery_companies_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_address_id_foreign` (`address_id`),
  ADD KEY `orders_delivery_companies_table_id_foreign` (`delivery_companies_table_id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Indexes for table `order_product`
--
ALTER TABLE `order_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_product_order_id_foreign` (`order_id`),
  ADD KEY `order_product_product_id_foreign` (`product_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `photos_product_id_foreign` (`product_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `products_sku_unique` (`sku`),
  ADD KEY `products_category_id_foreign` (`category_id`),
  ADD KEY `products_brand_id_foreign` (`brand_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reviews_user_id_foreign` (`user_id`),
  ADD KEY `reviews_product_id_foreign` (`product_id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `delivery_companies_table`
--
ALTER TABLE `delivery_companies_table`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `order_product`
--
ALTER TABLE `order_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_address_id_foreign` FOREIGN KEY (`address_id`) REFERENCES `addresses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_delivery_companies_table_id_foreign` FOREIGN KEY (`delivery_companies_table_id`) REFERENCES `delivery_companies_table` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_product_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `order_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `photos`
--
ALTER TABLE `photos`
  ADD CONSTRAINT `photos_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`),
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reviews_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
