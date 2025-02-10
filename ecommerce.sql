-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2025 at 02:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

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
  `categories_name` varchar(255) NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `categories_name`, `product_id`) VALUES
(1, 'Dresses', 1),
(3, 'T-shirts and Polos', 2),
(4, 'Shirts', 2),
(5, 'Casual shoes', 5),
(6, 'Jewlery box', 4),
(7, 'Rompers', 3),
(8, 'Skirts', 1),
(9, 'Watches', 4),
(10, 'Glasses', 4),
(11, 'Sweaters', 1),
(12, 'Hoodies', 1),
(13, 'Sarees', 1),
(14, 'Jeans', 2),
(15, 'Trousers', 2),
(16, 'Leggings', 3),
(17, 'Uniform Shirts', 3),
(18, 'Rompers', 3),
(19, 'Sports Shoes', 5),
(20, 'Boots', 5);

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
-- Table structure for table `markets`
--

CREATE TABLE `markets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `market_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `markets`
--

INSERT INTO `markets` (`id`, `market_name`, `created_at`, `updated_at`) VALUES
(1, 'Shaheen Arcade', NULL, NULL),
(2, 'Gol Building', NULL, NULL),
(3, 'Al Raheem Market', NULL, NULL),
(4, 'Gul center', NULL, NULL);

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
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2024_08_29_131441_create_products_table', 1),
(5, '2024_08_29_133101_create_categories_table', 2),
(6, '2024_08_29_140724_sub_categories_color', 3),
(7, '2024_08_29_140910_sub_categories_sizes', 3),
(19, '2024_09_08_062110_create_checkout_table', 12),
(21, '2024_09_15_072014_create_markets_table', 13),
(25, '2024_08_29_134632_create_sub_categories_table', 15),
(26, '0001_01_01_000000_create_users_table', 16),
(28, '2024_09_15_072118_create_shops_table', 17),
(29, '2024_09_01_134854_create_shoping_cart_table', 18),
(30, '2024_09_03_160940_create_shopping_wishlist_table', 19),
(33, '2024_08_29_145046_sub_categories_images', 21),
(34, '2024_10_04_070035_create_orders_table', 22);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `street_address` varchar(255) NOT NULL,
  `app_sui_unit` varchar(255) DEFAULT NULL,
  `zip_code` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_quantity` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `total_price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`) VALUES
(1, 'women'),
(2, 'men'),
(3, 'childern'),
(4, 'accessories'),
(5, 'shoes');

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
('ip9WfsPxP8qWPnJFwG5BnytWlqtIHhN6E4cEDQf8', 25, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiTG9GSXVwRlhlU3BnSTlCSzZCV0dCcVZkcUttS2ZuVG5GU3d5QmZjSyI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL2FkZC1wcm9kdWN0cyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI1O30=', 1729330748),
('McWGyLyMa4aT9EgaMlj88Js7wo3KHneI3esIfR3l', 26, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36 Edg/129.0.0.0', 'YTo2OntzOjY6Il90b2tlbiI7czo0MDoiZ0FtTlRUWGdTMHZGRVZqaHNMdkQxV0JtUVpOTEVkNlFsY0o0SVlIWCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czozNDoiaHR0cDovL2xvY2FsaG9zdDo4MDAwL3Nob3BpbmctY2FydCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6MTM6ImNoZWNrb3V0SXRlbXMiO2E6Mjp7aTowO2E6Njp7czoxNzoic3ViX2NhdGVnb3JpZXNfaWQiO2k6MjU7czo3OiJzaG9wX2lkIjtpOjM7czoxMzoicHJvZHVjdF90aXRsZSI7czoyNjoiTHV4dXJ5IENsYXNzaWMgTWVuJ3MgV2F0Y2giO3M6MTY6InByb2R1Y3RfcXVhbnRpdHkiO3M6MToiMSI7czoxMzoicHJvZHVjdF9wcmljZSI7czo0OiI2MDAwIjtzOjExOiJ0b3RhbF9wcmljZSI7aTo2MDAwO31pOjE7YTo2OntzOjE3OiJzdWJfY2F0ZWdvcmllc19pZCI7aToyNztzOjc6InNob3BfaWQiO2k6MztzOjEzOiJwcm9kdWN0X3RpdGxlIjtzOjI4OiJDbGFzc2ljIENsZWFyIFZpc2lvbiBHbGFzc2VzIjtzOjE2OiJwcm9kdWN0X3F1YW50aXR5IjtzOjE6IjEiO3M6MTM6InByb2R1Y3RfcHJpY2UiO3M6MzoiMzAwIjtzOjExOiJ0b3RhbF9wcmljZSI7aTozMDA7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToyNjt9', 1729335161),
('tLu6WfsoPH24ZF5YR841qZqaMMIlPtPOkoUnduS9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36 Edg/131.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiU3JNWWs3Vm9WRTdyc1RHMk5YZHVkakhub3VkNnY4U1dTQnE3ZFJlOSI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1736327866),
('UHehlTirHR6o853fC4WyhZC3VHmfwK7eIhUAQlgw', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/132.0.0.0 Safari/537.36 Edg/132.0.0.0', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiT2kzMkFkMlQ4VW1KTEVOekE3cEVCTjlGV29tSDBMZHVMMDJ2ZVk1TCI7czoxODoiZmxhc2hlcjo6ZW52ZWxvcGVzIjthOjA6e31zOjk6Il9wcmV2aW91cyI7YToxOntzOjM6InVybCI7czoyMToiaHR0cDovL2xvY2FsaG9zdDo4MDAwIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1739191636);

-- --------------------------------------------------------

--
-- Table structure for table `shoping_cart`
--

CREATE TABLE `shoping_cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_categories_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shoping_cart`
--

INSERT INTO `shoping_cart` (`id`, `sub_categories_id`, `user_id`, `created_at`, `updated_at`) VALUES
(21, 25, 26, '2024-10-13 03:05:45', '2024-10-13 03:05:45');

-- --------------------------------------------------------

--
-- Table structure for table `shopping_wishlist`
--

CREATE TABLE `shopping_wishlist` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_categories_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `market_id` bigint(20) UNSIGNED NOT NULL,
  `reg_num` varchar(255) NOT NULL,
  `shop_name` varchar(255) NOT NULL,
  `owner_fname` varchar(255) NOT NULL,
  `owner_lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `shop_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `market_id`, `reg_num`, `shop_name`, `owner_fname`, `owner_lname`, `email`, `phone`, `shop_address`, `created_at`, `updated_at`) VALUES
(2, 3, '54321', 'Muskan Collections', 'Abdullah', 'Khan', 'abdullahkhan12@gmail.com', '03186302851', 'Shop no:456 , Block-A , Latifabad no:08', NULL, NULL),
(3, 4, '54871', 'Khusham garments', 'Khaald', 'Shaikh', 'khusham613@gmail.com', '03183537625', 'BlockD House No 204', '2024-10-09 02:49:39', '2024-10-09 02:49:39'),
(4, 4, '42642', 'Hani collections', 'Hani', 'Siddique', 'hanisiddique123@gmail.com', '03115652223', 'Market road , hyderabad', '2024-10-18 23:23:32', '2024-10-18 23:23:32');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `categories_id` bigint(20) UNSIGNED NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_description` varchar(500) NOT NULL,
  `shop_id` bigint(20) UNSIGNED DEFAULT NULL,
  `market_id` bigint(20) UNSIGNED DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `color` varchar(255) NOT NULL,
  `sizes_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `product_id`, `categories_id`, `product_title`, `product_description`, `shop_id`, `market_id`, `price`, `color`, `sizes_id`) VALUES
(25, 4, 9, 'Luxury Classic Men\'s Watch', 'Elevate your style with this classic men\'s watch, crafted with precision and elegance.', 3, NULL, '6000', '#9e5757', 1),
(27, 4, 10, 'Classic Clear Vision Glasses', 'Enjoy crystal-clear vision with our classic glasses, designed with comfort and style in mind.', 3, NULL, '300', '#a9e6ea', 2),
(28, 1, 1, 'Bohemian Maxi Dress', 'Embrace your free spirit with our Bohemian Maxi Dress, a must-have for any boho lover.', 2, NULL, '6000', '#e92525', 1),
(29, 2, 3, 'V-Neck Slim Fit T-Shirt', 'Add a touch of sophistication to your casual wear with our V-Neck Slim Fit T-Shirt.', 2, NULL, '2000', '#782f93', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_images`
--

CREATE TABLE `sub_categories_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sub_categories_id` bigint(20) UNSIGNED NOT NULL,
  `shop_id` bigint(20) UNSIGNED NOT NULL,
  `image1` varchar(255) NOT NULL,
  `image2` varchar(255) NOT NULL,
  `image3` varchar(255) NOT NULL,
  `image4` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories_images`
--

INSERT INTO `sub_categories_images` (`id`, `sub_categories_id`, `shop_id`, `image1`, `image2`, `image3`, `image4`) VALUES
(10, 25, 3, 'uploads/sub_categories/Image11728492045.jpeg', 'uploads/sub_categories/Image21728492045.jpeg', 'uploads/sub_categories/Image31728492045.jpeg', 'uploads/sub_categories/Image41728492045.jpeg'),
(12, 27, 3, 'uploads/sub_categories/Image11729305003.png', 'uploads/sub_categories/Image21729305003.png', 'uploads/sub_categories/Image31729305003.png', 'uploads/sub_categories/Image41729305003.png'),
(13, 28, 2, 'uploads/sub_categories/Image11729305834.jpg', 'uploads/sub_categories/Image21729305834.jpg', 'uploads/sub_categories/Image31729305834.jpg', 'uploads/sub_categories/Image41729305834.jpg'),
(14, 29, 2, 'uploads/sub_categories/Image11729306007.jpg', 'uploads/sub_categories/Image21729306007.jpg', 'uploads/sub_categories/Image31729306007.jpg', 'uploads/sub_categories/Image41729306007.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories_sizes`
--

CREATE TABLE `sub_categories_sizes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sizes` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories_sizes`
--

INSERT INTO `sub_categories_sizes` (`id`, `sizes`) VALUES
(1, 'XL'),
(2, 'L');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `shop_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_type`, `first_name`, `last_name`, `phone`, `email`, `shop_id`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(22, 'admin', 'Muhammad', 'Momin', '03113027341', 'sheikhmomin836@gmail.com', NULL, NULL, '$2y$12$R3rZMkJPU/FSU14P2L/ITuhMteODuTBFrtbMnSPdqxucU5jXeUGHG', NULL, '2024-10-09 03:54:33', '2024-10-09 03:54:33'),
(25, 'seller', 'khusham', 'Ali', '03183537625', 'khusham613@gmail.com', 3, NULL, '$2y$12$kABwppGelZMSmmOhgvIvYe3mpQ8okmzUf4xQZJOwCgNYLQEdLD2R.', NULL, '2024-10-09 09:11:38', '2024-10-09 09:11:38'),
(26, 'customer', 'Alishba', 'Khan', '03116302224', 'alishbakhanjan18@gmail.com', NULL, NULL, '$2y$12$DavnbBtWc643irBPkyxNMuxB5t3NEjZ.ydsZL61u006/xoKWxYnqq', NULL, '2024-10-13 03:05:34', '2024-10-13 03:05:34'),
(27, 'seller', 'Abdullah', 'Khan', '03186302851', 'abdullahkhan12@gmail.com', 2, NULL, '$2y$12$q6jzDuQHUa30peGtiP1VRug/86NDrzQ1rR3xrRRJwNIX9wX2ltbpm', NULL, '2024-10-18 21:36:16', '2024-10-18 21:36:16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_product_id_foreign` (`product_id`);

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
-- Indexes for table `markets`
--
ALTER TABLE `markets`
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
  ADD KEY `orders_user_id_foreign` (`user_id`),
  ADD KEY `orders_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `shoping_cart`
--
ALTER TABLE `shoping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shoping_cart_sub_categories_id_foreign` (`sub_categories_id`),
  ADD KEY `shoping_cart_user_id_foreign` (`user_id`);

--
-- Indexes for table `shopping_wishlist`
--
ALTER TABLE `shopping_wishlist`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shopping_wishlist_sub_categories_id_foreign` (`sub_categories_id`),
  ADD KEY `shopping_wishlist_user_id_foreign` (`user_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shops_market_id_foreign` (`market_id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_product_id_foreign` (`product_id`),
  ADD KEY `sub_categories_categories_id_foreign` (`categories_id`),
  ADD KEY `sub_categories_market_id_foreign` (`market_id`),
  ADD KEY `sub_categories_color_id_foreign` (`color`),
  ADD KEY `sub_categories_sizes_id_foreign` (`sizes_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `sub_categories_images`
--
ALTER TABLE `sub_categories_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_categories_images_sub_categories_id_foreign` (`sub_categories_id`),
  ADD KEY `sub_categories_images_shop_id_foreign` (`shop_id`);

--
-- Indexes for table `sub_categories_sizes`
--
ALTER TABLE `sub_categories_sizes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `shop_id` (`shop_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
-- AUTO_INCREMENT for table `markets`
--
ALTER TABLE `markets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `shoping_cart`
--
ALTER TABLE `shoping_cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `shopping_wishlist`
--
ALTER TABLE `shopping_wishlist`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `sub_categories_images`
--
ALTER TABLE `sub_categories_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `sub_categories_sizes`
--
ALTER TABLE `sub_categories_sizes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shoping_cart`
--
ALTER TABLE `shoping_cart`
  ADD CONSTRAINT `shoping_cart_sub_categories_id_foreign` FOREIGN KEY (`sub_categories_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shoping_cart_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shopping_wishlist`
--
ALTER TABLE `shopping_wishlist`
  ADD CONSTRAINT `shopping_wishlist_sub_categories_id_foreign` FOREIGN KEY (`sub_categories_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `shopping_wishlist_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `shops`
--
ALTER TABLE `shops`
  ADD CONSTRAINT `shops_market_id_foreign` FOREIGN KEY (`market_id`) REFERENCES `markets` (`id`);

--
-- Constraints for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD CONSTRAINT `sub_categories_categories_id_foreign` FOREIGN KEY (`categories_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `sub_categories_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  ADD CONSTRAINT `sub_categories_market_id_foreign` FOREIGN KEY (`market_id`) REFERENCES `markets` (`id`),
  ADD CONSTRAINT `sub_categories_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `sub_categories_sizes_id_foreign` FOREIGN KEY (`sizes_id`) REFERENCES `sub_categories_sizes` (`id`);

--
-- Constraints for table `sub_categories_images`
--
ALTER TABLE `sub_categories_images`
  ADD CONSTRAINT `sub_categories_images_shop_id_foreign` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`),
  ADD CONSTRAINT `sub_categories_images_sub_categories_id_foreign` FOREIGN KEY (`sub_categories_id`) REFERENCES `sub_categories` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
