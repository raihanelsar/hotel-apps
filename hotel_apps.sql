-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2025 at 08:32 AM
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
-- Database: `hotel_apps`
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
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Junior Room', 'junior-room', NULL, NULL),
(2, 'Superior', 'superior', NULL, NULL),
(3, 'Deluxe Room', 'deluxe-room', NULL, NULL),
(4, 'Suite', 'suite', NULL, NULL),
(5, 'Deluxe Suite', 'deluxe-suite', NULL, NULL);

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
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `no_kamar` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `status_tamu` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kebutuhan_khusus` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(8, '0001_01_01_000000_create_users_table', 1),
(9, '0001_01_01_000001_create_cache_table', 1),
(10, '0001_01_01_000002_create_jobs_table', 1),
(11, '2025_08_20_034448_create_categories_table', 1),
(12, '2025_08_20_064428_create_rooms_table', 1),
(13, '2025_08_22_020957_create_guests_table', 1);

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
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) NOT NULL,
  `reservation_number` varchar(50) DEFAULT '',
  `guest_name` varchar(255) NOT NULL,
  `guest_email` varchar(50) DEFAULT NULL,
  `guest_phone` varchar(15) DEFAULT NULL,
  `guest_status` varchar(50) DEFAULT NULL,
  `guest_id` varchar(100) DEFAULT NULL,
  `guest_qty` varchar(10) DEFAULT NULL,
  `guest_check_in` date NOT NULL,
  `guest_check_out` date NOT NULL,
  `guest_note` text NOT NULL,
  `isOnline` tinyint(4) DEFAULT 0,
  `isReserve` tinyint(4) DEFAULT 0,
  `subtotal` decimal(15,2) NOT NULL DEFAULT 0.00,
  `totalAmount` decimal(15,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guest_room_number` varchar(20) NOT NULL,
  `payment_method` varchar(50) NOT NULL,
  `nights` decimal(15,2) NOT NULL,
  `tax` decimal(15,2) NOT NULL,
  `roomRate` decimal(15,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `room_id`, `reservation_number`, `guest_name`, `guest_email`, `guest_phone`, `guest_status`, `guest_id`, `guest_qty`, `guest_check_in`, `guest_check_out`, `guest_note`, `isOnline`, `isReserve`, `subtotal`, `totalAmount`, `created_at`, `updated_at`, `guest_room_number`, `payment_method`, `nights`, `tax`, `roomRate`) VALUES
(1, 1, '', 'asdasdaa', 'sdaxqwe@example.com', '123413432', '', '', '', '2025-08-27', '2025-08-30', 'asfasdad', 0, 0, 150000.00, 150000.00, '2025-08-27 00:32:04', '2025-08-27 00:32:04', '1', 'cash', 0.00, 0.00, 0.00),
(3, 2, 'RSV-270893-001', 'zxczxc', 'axczxc@example.com', '123123424', NULL, NULL, NULL, '2025-08-27', '2025-08-29', 'asdasdas', 0, 0, 200000.00, 200000.00, '2025-08-27 19:42:26', '2025-08-27 19:42:26', '2', 'cash', 2.00, 20000.00, 100000.00),
(8, 3, 'RSV-270893-001', 'asdsdfsf', 'sdaxqwe@example.com', '2234123', NULL, NULL, NULL, '2025-08-21', '2025-08-24', 'scscfasdf', 0, 0, 600000.00, 660000.00, '2025-08-27 20:11:58', '2025-08-27 20:11:58', '3', 'cash', 3.00, 60000.00, 200000.00),
(9, 4, 'RSV-270893-001', 'xzczvaswd', 'asdaczx@umar.com', '12314324', NULL, NULL, NULL, '2025-08-22', '2025-08-25', 'vcvbsdfaf', 0, 0, 750000.00, 825000.00, '2025-08-27 20:15:58', '2025-08-27 20:15:58', '4', 'cash', 3.00, 75000.00, 250000.00),
(11, 1, 'RSV-270893-001', 'asdasdaa', 'sdaxqwe@example.com', '0899421', NULL, NULL, NULL, '2025-08-29', '2025-08-30', 'asasa', 0, 0, 50000.00, 55000.00, '2025-08-27 20:25:58', '2025-08-27 20:25:58', '1', 'cc', 1.00, 5000.00, 50000.00),
(12, 1, 'RSV-270893-001', 'asdasdaa', 'sdaxqwe@example.com', '0899421', NULL, NULL, NULL, '2025-08-29', '2025-08-30', 'asasa', 0, 0, 50000.00, 55000.00, '2025-08-27 20:26:49', '2025-08-27 20:26:49', '1', 'cc', 1.00, 5000.00, 50000.00),
(13, 1, 'RSV-270893-001', 'asdasdaa', 'sdaxqwe@example.com', '1212', NULL, NULL, NULL, '2025-08-28', '2025-08-29', 'asas', 0, 0, 50000.00, 55000.00, '2025-08-27 20:30:12', '2025-08-27 20:30:12', '2', 'cc', 1.00, 5000.00, 50000.00);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(15,2) NOT NULL,
  `facility` text NOT NULL,
  `description` text NOT NULL,
  `image_cover` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `category_id`, `name`, `price`, `facility`, `description`, `image_cover`, `created_at`, `updated_at`) VALUES
(1, 1, 'Warga', 50000.00, 'asasa', 'asasa', 'rooms/lhhUAVZO0Nnhdt8ABvKHy9bR14bX3mxFCfSrk5hv.jpg', '2025-08-26 00:01:10', '2025-08-26 00:01:10'),
(2, 2, 'Bangsawan', 100000.00, 'zxczxcas', 'asdrqweq', 'rooms/CCiKNxNH22vl97H12Z5OTP2Ao5szIS6TnTRDyWfc.jpg', '2025-08-26 00:51:24', '2025-08-26 00:51:24'),
(3, 3, 'Andalusia', 200000.00, 'asdadfasd', 'asdasdafas', 'rooms/6vbdRXCLuOLmXyIY1c7bngxsEOu2LMl16zOc0Aww.jpg', '2025-08-27 20:11:17', '2025-08-27 20:11:17'),
(4, 4, 'Rashkan', 250000.00, 'dfsfasfasda', 'sdazxc', 'rooms/wfoeGxc4i3oujrMw4w8wExH1AwppfAokqqVSNL9t.jpg', '2025-08-27 20:15:19', '2025-08-27 20:15:19');

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
('ArrUNbiMUp2A64SewGep1VxftEYHvn5ftNoIM7ZR', 2, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/139.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoia2E3Z0NYSlcyUmtLN1ZJQzlBTkRZT0R3UGg4Tk5RMFFQakIxcmc3SyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MzM6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9yZXNlcnZhdGlvbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7fQ==', 1756354522);

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
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '12345678', NULL, NULL, NULL),
(2, 'Admin User', 'admin@example.com', NULL, '$2y$12$jRKI04DSOKFygvkN8X5el.ueoZ.4Z46IjoFlfg.wZRdk78kHDW8UC', NULL, '2025-08-25 21:12:38', '2025-08-25 21:12:38');

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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guests_email_unique` (`email`),
  ADD UNIQUE KEY `guests_no_telp_unique` (`no_telp`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_category_id_foreign` (`category_id`);

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
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
