-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2018 at 01:57 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `delivery_service_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(69, '2014_10_12_000000_create_users_table', 1),
(70, '2014_10_12_100000_create_password_resets_table', 1),
(71, '2016_06_01_000001_create_oauth_auth_codes_table', 1),
(72, '2016_06_01_000002_create_oauth_access_tokens_table', 1),
(73, '2016_06_01_000003_create_oauth_refresh_tokens_table', 1),
(74, '2016_06_01_000004_create_oauth_clients_table', 1),
(75, '2016_06_01_000005_create_oauth_personal_access_clients_table', 1),
(76, '2018_03_25_012117_alter_users_table_add_phone_column', 1),
(77, '2018_03_25_040742_create_order_table', 1),
(78, '2018_03_25_092357_create_order_type_table', 1),
(79, '2018_03_25_092434_create_order_address_table', 1),
(80, '2018_03_25_092503_create_order_origin_table', 1),
(81, '2018_03_25_092518_create_order_destination_table', 1),
(82, '2018_03_25_112116_add_description_to_order_type_table', 1),
(83, '2018_03_25_113847_drop_email_index_from_users_table', 1),
(84, '2018_03_25_114919_change_name_nullable_from_users_table', 1),
(85, '2018_03_25_114937_change_email_nullable_from_users_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_access_tokens`
--

INSERT INTO `oauth_access_tokens` (`id`, `user_id`, `client_id`, `name`, `scopes`, `revoked`, `created_at`, `updated_at`, `expires_at`) VALUES
('2c8d46b2eec08acf6082a7f80b75b65a2e5bff8f8a631745ca1e1e5beedb62196d9f0fa2a7e71ea3', 2, 2, NULL, '[]', 0, '2018-03-26 16:49:56', '2018-03-26 16:49:56', '2018-03-26 23:59:56'),
('83e5cc9cd94a205ea3e93001449849f1ba2a81c97f3cd1f9151da518b5dd5f498ae2c6e9600d085e', 2, 2, NULL, '[]', 1, '2018-03-26 16:35:11', '2018-03-26 16:35:11', '2018-03-26 23:45:11'),
('a2c61f554e76269206ffa9a83c3fb186ef8b7ff968947d3616e9705ca458988f9be24728940dd10b', 2, 2, NULL, '[]', 1, '2018-03-26 16:25:26', '2018-03-26 16:25:26', '2018-03-26 23:35:26'),
('acb872ed326a9d59c488dea59451aad8a36b680b9b32e9df580d9fd0b1b4c3063fd4a2584bfb4d0e', 2, 2, NULL, '[]', 0, '2018-03-26 16:13:03', '2018-03-26 16:13:03', '2018-03-26 23:23:03'),
('bef0776792c767bd66f9488f2f4d57c37a449b62a0d8fd343adb4b77e7291594e038f213d39b2708', 2, 2, NULL, '[]', 1, '2018-03-26 16:25:30', '2018-03-26 16:25:30', '2018-03-26 23:35:30'),
('e0804b0f0141ecc90c492f96a156d0dbec3c2117fc4b24051c5eaf58ba5f9e0b02e07fc0e97d7246', 2, 2, NULL, '[]', 1, '2018-03-26 16:03:10', '2018-03-26 16:03:10', '2018-03-26 23:13:10');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `scopes` text COLLATE utf8mb4_unicode_ci,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `secret` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `redirect` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'TtiPdOs3v63Apc9EFZgF7PyLWUfvaHnvgCHGaCRN', 'http://localhost', 1, 0, 0, '2018-03-26 16:01:11', '2018-03-26 16:01:11'),
(2, NULL, 'Laravel Password Grant Client', 'owMwIJ7LdBOxojp1jwX8tqHsq1Rt1F9ynSH8UIhp', 'http://localhost', 0, 1, 0, '2018-03-26 16:01:11', '2018-03-26 16:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` int(10) UNSIGNED NOT NULL,
  `client_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2018-03-26 16:01:11', '2018-03-26 16:01:11');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `access_token_id` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_refresh_tokens`
--

INSERT INTO `oauth_refresh_tokens` (`id`, `access_token_id`, `revoked`, `expires_at`) VALUES
('004ac2b2c61069834986ddb35cbcb23cddb9a7ecfa3e6475f4d7ebfe3d4dbcce7ab5b06c3eb458d1', '2c8d46b2eec08acf6082a7f80b75b65a2e5bff8f8a631745ca1e1e5beedb62196d9f0fa2a7e71ea3', 0, '2018-04-05 23:49:56'),
('2bb2f6997d84af032a4684d3d08668d7ed09c23814bb722596457af93f329c3863835fed028b6ea9', 'acb872ed326a9d59c488dea59451aad8a36b680b9b32e9df580d9fd0b1b4c3063fd4a2584bfb4d0e', 0, '2018-04-05 23:13:03'),
('4d83ed6c5f6c243db76a2e0960b374c97cdf31925a4f04a66dafeb23638aa44e7864bca65a67704e', '83e5cc9cd94a205ea3e93001449849f1ba2a81c97f3cd1f9151da518b5dd5f498ae2c6e9600d085e', 1, '2018-04-05 23:35:11'),
('d50aeceb87cf2faadcfb7a179e0292e72e65caf1debb55540e1463ed44e76af932e9a37e1fe1aa8b', 'bef0776792c767bd66f9488f2f4d57c37a449b62a0d8fd343adb4b77e7291594e038f213d39b2708', 1, '2018-04-05 23:25:30'),
('d540a61265d3bd8b79a978eebd150205729f2b85ddddddd2c83fdb9a03624aba947297a03dcc85f7', 'a2c61f554e76269206ffa9a83c3fb186ef8b7ff968947d3616e9705ca458988f9be24728940dd10b', 1, '2018-04-05 23:25:26'),
('efbcf3f372c9d9967b55abf47579df4b17df33f58cbfb5d5c2d73b0535f26df6895626f6c94a0510', 'e0804b0f0141ecc90c492f96a156d0dbec3c2117fc4b24051c5eaf58ba5f9e0b02e07fc0e97d7246', 1, '2018-04-05 23:03:10');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contact` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `order_address_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `reference`, `contact`, `user_id`, `order_address_id`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, 2, 1, '2018-03-26 16:35:37', '2018-03-26 16:35:37'),
(2, NULL, NULL, NULL, 2, 2, '2018-03-26 16:50:17', '2018-03-26 16:50:17'),
(3, NULL, NULL, NULL, 2, 3, '2018-03-26 16:50:38', '2018-03-26 16:50:38'),
(4, NULL, NULL, NULL, 2, 4, '2018-03-26 16:50:50', '2018-03-26 16:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_address`
--

CREATE TABLE `order_address` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_origin_id` int(11) NOT NULL,
  `order_destination_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_address`
--

INSERT INTO `order_address` (`id`, `order_origin_id`, `order_destination_id`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '2018-03-26 16:35:37', '2018-03-26 16:35:37'),
(2, 2, 2, 1, '2018-03-26 16:50:17', '2018-03-26 16:50:17'),
(3, 3, 3, 3, '2018-03-26 16:50:38', '2018-03-26 16:50:38'),
(4, 4, 4, 1, '2018-03-26 16:50:50', '2018-03-26 16:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_destination`
--

CREATE TABLE `order_destination` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_destination`
--

INSERT INTO `order_destination` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Test Destination Addrees 1', '2018-03-26 16:35:36', '2018-03-26 16:35:36'),
(2, NULL, 'Test Destination Addrees 2', '2018-03-26 16:50:17', '2018-03-26 16:50:17'),
(3, NULL, 'Test Destination Addrees 3', '2018-03-26 16:50:38', '2018-03-26 16:50:38'),
(4, NULL, 'Test Destination Addrees 4', '2018-03-26 16:50:50', '2018-03-26 16:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_origin`
--

CREATE TABLE `order_origin` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_origin`
--

INSERT INTO `order_origin` (`id`, `name`, `address`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Test Origin Address 1', '2018-03-26 16:35:37', '2018-03-26 16:35:37'),
(2, NULL, 'Test Origin Address 2', '2018-03-26 16:50:17', '2018-03-26 16:50:17'),
(3, NULL, 'Test Origin Address 3', '2018-03-26 16:50:38', '2018-03-26 16:50:38'),
(4, NULL, 'Test Origin Address 4', '2018-03-26 16:50:50', '2018-03-26 16:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `order_type`
--

CREATE TABLE `order_type` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_type`
--

INSERT INTO `order_type` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'PLA', 'Origin Locker, Destination Address', NULL, NULL),
(2, 'PAL', 'Origin Address, Destination Locker', NULL, NULL),
(3, 'PLL', 'Origin Locker, Destination Locker', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'rn', 'rn@rn.com', '999888777665', '$2y$10$ixdGN.mEWiPQmHSlMIR4eON82xXo9hbrq.dnY9WeWi6AlpAKS0mJm', NULL, NULL, NULL),
(2, NULL, NULL, '098080808556', '$2y$10$Tx3Poc5vQjVGV0xc.HrX3OSPsHyx5yrpfKTggGibxl8wGfc.qxSme', NULL, '2018-03-26 15:46:57', '2018-03-26 15:46:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_personal_access_clients_client_id_index` (`client_id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_address`
--
ALTER TABLE `order_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_destination`
--
ALTER TABLE `order_destination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_origin`
--
ALTER TABLE `order_origin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_type`
--
ALTER TABLE `order_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_address`
--
ALTER TABLE `order_address`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_destination`
--
ALTER TABLE `order_destination`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_origin`
--
ALTER TABLE `order_origin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `order_type`
--
ALTER TABLE `order_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
