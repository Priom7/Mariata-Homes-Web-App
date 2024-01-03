-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2023 at 08:53 PM
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
-- Database: `mariataHomeDB`
--

-- --------------------------------------------------------

--
-- Table structure for table `applications`
--

CREATE TABLE `applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `next_of_kin` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `passport_photo` varchar(255) NOT NULL,
  `illness` varchar(255) NOT NULL,
  `last_residence_address` varchar(255) NOT NULL,
  `recommended_source_address` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications`
--

INSERT INTO `applications` (`id`, `name`, `dob`, `email`, `telephone`, `next_of_kin`, `age`, `passport_photo`, `illness`, `last_residence_address`, `recommended_source_address`, `created_at`, `updated_at`) VALUES
(19, 'Akira Khan', '1980-02-27', 'akira@gmail.com', '2345435', 'Khan', '43', 'photos/EnqioeGRsMzYvciDn9FLDByPJAHLNWLerwLHa1MH.jpg', 'No', '3A Welling High Street', '150 Upper North Street', '2023-11-28 17:31:31', '2023-11-28 17:31:31'),
(21, 'Md Sharif Alam', '1993-03-03', 'sharif@gmail.com', '07434422445', 'Md. Hasan', '30', 'photos/TlXMXNOa1AH8OMXcjR14fPYI5LfKrtWrlfyR4XRU.jpg', 'Dust Allergies', '150 Upper North Street', '150, High Street, London, UK', '2023-11-29 14:53:52', '2023-11-29 14:53:52'),
(23, 'TestUser', '1971-02-09', 'Test@gmail.com', '324242342342', 'Test Test', '52', 'photos/PMYuYeTEbOLbJhnFRWfFzbLuHAh7cEvww1xCVnrJ.jpg', 'NO', 'USA', 'UK', '2023-11-29 15:13:25', '2023-11-29 15:13:25'),
(24, 'Test 3', '1950-03-01', 'test3@gmail.com', '12345678', 'sdgfsg', '73', 'photos/tnhPjyH0F5vOIga9XdgUjaybUfOvckCSDVBldjRf.jpg', 'wetwrtre', 'Nowhere, USA', 'Somewhere, UK', '2023-11-29 15:14:27', '2023-11-29 15:14:27'),
(25, 'TTTT', '1968-06-11', 'ttttt@gmail.com', '53425435', 'rewwgr', '55', 'photos/TOWRhJpx3YYy1VJJ3gkpHDa6E7Lno3XNvARAD4M0.jpg', 'rgerg', 'Germany', 'Wales', '2023-11-29 15:16:17', '2023-11-29 15:16:17'),
(26, 'ABC ABC', '1977-02-02', 'abcabc@gmail.com', '345345345345', 'bcdbcd', '46', 'photos/jCLIqC8AkBQS3KjmFIWEBAAmuQuxQGym4TDt2o5n.jpg', 'Not Applicable', 'NA', 'NA', '2023-11-29 15:17:19', '2023-11-29 15:17:19'),
(27, 'User 99', '1976-03-10', 'user99@gmai.com', '234234234', 'user99', '47', 'photos/8CgcXZppuIqA948nyQXCwpkuJdE1o8YWnVphhvSg.jpg', 'No', 'NA', 'NA', '2023-11-29 15:18:41', '2023-11-29 15:18:41'),
(28, 'TEst 99', '1988-03-02', 'test99@gmai.ocm', '23r42423', 'sgsg', '35', 'photos/HySOkNSAdncxqErG5MJluYEwBI0FCfZkygp0U5mA.jpg', 'no', 'NA', 'NA', '2023-11-29 15:19:22', '2023-11-29 15:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `applications_recommended_sources`
--

CREATE TABLE `applications_recommended_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `recommended_source_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `applications_recommended_sources`
--

INSERT INTO `applications_recommended_sources` (`id`, `application_id`, `recommended_source_id`, `created_at`, `updated_at`) VALUES
(2, 14, 1, '2023-11-28 11:14:34', '2023-11-28 11:14:34'),
(3, 15, 1, '2023-11-28 14:08:55', '2023-11-28 14:08:55'),
(4, 16, 2, '2023-11-28 16:22:40', '2023-11-28 16:22:40'),
(5, 17, 3, '2023-11-28 16:49:14', '2023-11-28 16:49:14'),
(6, 19, 4, '2023-11-28 17:31:31', '2023-11-28 17:31:31'),
(7, 20, 4, '2023-11-29 05:54:31', '2023-11-29 05:54:31'),
(8, 21, 1, '2023-11-29 14:53:52', '2023-11-29 14:53:52'),
(9, 22, 4, '2023-11-29 14:59:54', '2023-11-29 14:59:54'),
(10, 23, 4, '2023-11-29 15:13:25', '2023-11-29 15:13:25'),
(11, 24, 2, '2023-11-29 15:14:27', '2023-11-29 15:14:27'),
(12, 25, 1, '2023-11-29 15:16:17', '2023-11-29 15:16:17'),
(13, 26, 3, '2023-11-29 15:17:19', '2023-11-29 15:17:19'),
(14, 27, 2, '2023-11-29 15:18:41', '2023-11-29 15:18:41'),
(15, 28, 3, '2023-11-29 15:19:22', '2023-11-29 15:19:22');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_11_28_080031_create_roles_table', 2),
(7, '2023_11_28_080102_create_users_roles_table', 2),
(8, '2023_11_28_080212_create_applications_table', 3),
(9, '2023_11_28_080418_create_recommended_sources_table', 4),
(10, '2023_11_28_080457_create_applications_recommended_sources_table', 4),
(11, '2023_11_28_080607_create_users_applications_table', 5);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
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
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recommended_sources`
--

CREATE TABLE `recommended_sources` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recommended_sources`
--

INSERT INTO `recommended_sources` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Police', '2023-11-15 18:55:38', '2023-11-28 18:55:42'),
(2, 'Prison', '2023-11-02 18:55:46', '2023-11-21 18:55:50'),
(3, 'Immigration', '2023-11-08 18:55:53', '2023-11-22 18:55:57'),
(4, 'Others', '2023-11-08 18:56:02', '2023-11-28 18:56:05');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2023-11-01 18:53:10', '2023-11-01 18:53:17'),
(2, 'user', '2023-11-01 18:53:14', '2023-11-01 18:53:20');

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
(3, 'Md. Sharif Alam Update', 'sharif@gmail.com12', NULL, '$2y$12$m9Xz3hQwxoZ9spsIj96dBe9Nt1x2RbhFQCmk4GyF/zWrWXe1tocbK', NULL, '2023-11-28 12:52:26', '2023-11-28 13:19:10'),
(4, 'Sabbir Bangla', 'sabbir@gmail.com', NULL, '$2y$12$Po7.mhEiFZWofMAxxaU3F.2vZBswY8ofhmqecP.NrU4YPQTrGlXAq', NULL, '2023-11-28 13:07:13', '2023-11-28 13:07:13'),
(5, 'Test 3', 'test3@gmail.com', NULL, '$2y$12$.rBbw4x1od3LfvRiSkQBCeTWLU69e7gvpQNSjvjtUj.BOMIpv89i6', NULL, '2023-11-28 13:41:42', '2023-11-28 13:41:42'),
(6, 'Test 4', 'test4@gmail.com', NULL, '$2y$12$Tfw.Hu0.oN6SRgY.zjVg.e.FG.JkPn7HCSQqFavCCJ98T6mQBh1Kq', NULL, '2023-11-28 13:48:17', '2023-11-28 13:48:17'),
(7, 'test5', 'testbot101@gmail.com', NULL, '$2y$12$HXMbHmfIz7iSdMg1yKsU5emN1GZ9vyMwzeeaTcZ3Zy5O/Hh.rKHgy', NULL, '2023-11-28 13:48:37', '2023-11-28 13:48:37'),
(8, 'Md Sharif Alam', 'priom7@gmail.com', NULL, '$2y$12$Pk30TKdpsc1tjDz/2CBj9ON/B5jq3x.Im43g4XMfBR4D2LjnHlPHu', NULL, '2023-11-28 13:49:00', '2023-11-28 13:49:00'),
(9, 'TTTTT', 'Test@hotmail.com', NULL, '$2y$12$U3Z7.fgm0jLdMdFeT27E7uecS1iY09EzdlcsYO.nCUeAN96CniyBu', NULL, '2023-11-28 13:49:29', '2023-11-28 13:49:29'),
(10, 'ABC', 'abc@gmail.com', NULL, '$2y$12$1Oup213x47pdVa9satd18.zdCHcylsWCpcatLcoi8XJv4QH9YiwdG', NULL, '2023-11-28 13:49:50', '2023-11-28 13:49:50'),
(12, 'efds', 'Adfd@gmai.com', NULL, '$2y$12$blUa.gfyecI2btWcEFyyRez.6xZ5MFnXWOOfkFec5Rl53Mw5Jp9KW', NULL, '2023-11-28 13:50:29', '2023-11-28 13:50:29'),
(15, 'Whomi', 'whomi@gmail.com', NULL, '$2y$12$nw49yWVPn9dvmQ55XSTUsuV04zSCordSEIExZCCVjD3M.5.e54eGO', NULL, '2023-11-28 16:45:08', '2023-11-28 16:45:08'),
(16, 'test99', 'test99@gmail.com', NULL, '$2y$12$x.vSsYWup8ppgULC6p/XCeS/3YmQ4bp7xyVlV4Pxi4KAmdcC10e/u', NULL, '2023-11-28 16:46:55', '2023-11-28 16:46:55'),
(17, 'Akira', 'akira@gmail.com', NULL, '$2y$12$JVg82nCefffQv3nwpbFse.sLqNXQuEk6YqZ5pWjxQ7guV0UGQN8dO', NULL, '2023-11-28 17:17:03', '2023-11-28 17:17:03'),
(18, 'Delete Test', 'delete@gmail.com', NULL, '$2y$12$huIozS52LGZX1tRWFzHrWe2GgMLOXISxInn/ZHr7lYCN7nXwNQ0Di', NULL, '2023-11-29 05:28:27', '2023-11-29 05:28:27'),
(19, 'AppDelete', 'appdelete@gmail.com', NULL, '$2y$12$Zx0gcOxHcO3uaihBAKmd9ufUoDZxslmCHwiJ9XAF36.f9GjCsT84S', NULL, '2023-11-29 05:53:58', '2023-11-29 05:53:58'),
(20, 'User99', 'user99@gmail.com', NULL, '$2y$12$eZSd.Q3pdOx67APhjBBmqO0qUW505WPw0lNzeZiE0CBdlPHSI88sW', NULL, '2023-11-29 06:27:03', '2023-11-29 06:27:03'),
(21, 'Auth', 'auth@gmail.com', NULL, '$2y$12$OMHPM/YSYBFnvyj8R1YwfenbdVynaJwfoQrziiCSZ1qZpnSVt/A8O', NULL, '2023-11-29 07:10:16', '2023-11-29 07:10:16'),
(22, 'Md Sharif Alam', 'priom7197@gmail.com', NULL, '$2y$12$Lc/.4/MIbEuXdxu04xoH5ubVdkY6YMc4vJTW6kdfJPzPYmrEzvwvO', NULL, '2023-11-29 14:10:17', '2023-11-29 14:10:17');

-- --------------------------------------------------------

--
-- Table structure for table `users_applications`
--

CREATE TABLE `users_applications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `application_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_applications`
--

INSERT INTO `users_applications` (`id`, `user_id`, `application_id`, `created_at`, `updated_at`) VALUES
(12, 7, 15, '2023-11-28 14:08:55', '2023-11-28 14:08:55'),
(15, 17, 19, '2023-11-28 17:31:31', '2023-11-28 17:31:31'),
(17, 22, 21, '2023-11-29 14:53:52', '2023-11-29 14:53:52'),
(19, 3, 23, '2023-11-29 15:13:25', '2023-11-29 15:13:25'),
(20, 5, 24, '2023-11-29 15:14:27', '2023-11-29 15:14:27'),
(21, 9, 25, '2023-11-29 15:16:17', '2023-11-29 15:16:17'),
(22, 10, 26, '2023-11-29 15:17:19', '2023-11-29 15:17:19'),
(23, 20, 27, '2023-11-29 15:18:41', '2023-11-29 15:18:41'),
(24, 16, 28, '2023-11-29 15:19:22', '2023-11-29 15:19:22');

-- --------------------------------------------------------

--
-- Table structure for table `users_roles`
--

CREATE TABLE `users_roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_roles`
--

INSERT INTO `users_roles` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-11-01 18:54:04', '2023-11-01 18:54:08'),
(2, 15, 2, '2023-11-28 16:45:08', '2023-11-28 16:45:08'),
(3, 16, 2, '2023-11-28 16:46:55', '2023-11-28 16:46:55'),
(4, 17, 2, '2023-11-28 17:17:03', '2023-11-28 17:17:03'),
(5, 18, 2, '2023-11-29 05:28:27', '2023-11-29 05:28:27'),
(6, 19, 2, '2023-11-29 05:53:58', '2023-11-29 05:53:58'),
(7, 20, 2, '2023-11-29 06:27:03', '2023-11-29 06:27:03'),
(8, 21, 2, '2023-11-29 07:10:16', '2023-11-29 07:10:16'),
(9, 22, 1, '2023-11-29 14:10:17', '2023-11-29 14:10:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `applications`
--
ALTER TABLE `applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `applications_recommended_sources`
--
ALTER TABLE `applications_recommended_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recommended_sources`
--
ALTER TABLE `recommended_sources`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `users_applications`
--
ALTER TABLE `users_applications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_roles`
--
ALTER TABLE `users_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `applications`
--
ALTER TABLE `applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `applications_recommended_sources`
--
ALTER TABLE `applications_recommended_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recommended_sources`
--
ALTER TABLE `recommended_sources`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `users_applications`
--
ALTER TABLE `users_applications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users_roles`
--
ALTER TABLE `users_roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
