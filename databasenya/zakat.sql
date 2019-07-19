-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2019 at 04:25 AM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zakat`
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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_03_28_144500_penyesuaian_table_users', 1),
(4, '2019_04_01_071122_create_table_kategori_mustahiks', 2),
(5, '2019_04_01_071710_create_table_tipemustahiks', 3),
(6, '2019_04_01_071856_create_table_tipemustahiks', 4),
(7, '2019_04_08_150900_create_mustahik_table', 5),
(8, '2019_04_10_035022_create_muzaki_table', 6),
(9, '2019_04_10_112712_add_votes_to_mustahik_table', 7),
(10, '2019_04_10_113609_create_muzaki_table', 8),
(11, '2019_04_10_113903_add_votes_to_mustahik2_table', 9),
(12, '2019_04_11_221039_create_pembarayanzakat_table', 10),
(13, '2019_04_11_230204_create_pembarayanzakat_table', 11),
(14, '2019_04_15_014513_create_pembagian_table', 12);

-- --------------------------------------------------------

--
-- Table structure for table `mustahik`
--

CREATE TABLE `mustahik` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_mustahik` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tipe_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `kelamin` enum('PRIA','WANITA') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mustahik`
--

INSERT INTO `mustahik` (`id`, `nama_mustahik`, `alamat`, `no_hp`, `foto`, `tipe_id`, `deleted_at`, `created_at`, `updated_at`, `kelamin`) VALUES
(4, 'sasa', 'sasaasa', '212', NULL, 4, '2019-04-09 01:42:06', '2019-04-09 01:28:19', '2019-04-09 01:42:06', NULL),
(5, 'wewq', 'qweqw', 'qeq2', NULL, 2, '2019-04-09 01:38:19', '2019-04-09 01:29:27', '2019-04-09 01:38:19', NULL),
(6, 'dfdsf', 'sfsdfs', 'sfer', NULL, 3, '2019-04-11 05:58:10', '2019-04-09 03:39:04', '2019-04-11 05:58:10', 'PRIA'),
(12, 'asdasd', 'sdljfhjs kdskfjsn kkfs kekfhewkb  sdhflsbh jwhfjwe jwegfjew jwhfw  bwjfwe bfwjfh jhfw', '442', NULL, 8, NULL, '2019-04-11 13:33:10', '2019-04-24 05:37:40', 'WANITA'),
(13, 'dwawda', 'wqeq', '242132', NULL, 8, NULL, '2019-04-11 13:33:33', '2019-04-23 05:47:09', 'PRIA'),
(14, 'jkjfd', 'jkjfkdjfk', 'jksjfks', 'foto_mustahik/7rFxasmZ3SjNxibsjRay5I1Yx8LH7zTT5bIiit5L.jpeg', 7, '2019-04-22 15:36:14', '2019-04-16 13:32:56', '2019-04-22 15:36:14', 'PRIA'),
(15, 'Mdfs', 'dfsefew', '343', 'foto_mustahik/fjrhAx22E3FcB2ytp2E2WdlIPYZnf0tCGwKM8sLR.jpeg', 3, NULL, '2019-04-19 10:45:38', '2019-04-23 09:46:12', 'WANITA'),
(16, 'Mahmud', 'jl jalan dari monas', '083820121', 'foto_mustahik/b8cXvOFgMQAbpMpp6lEMJkrFJMkT0aqnJQBu4RFH.jpeg', 13, NULL, '2019-04-22 15:39:02', '2019-04-22 15:39:02', 'PRIA'),
(17, 'Mulyano', 'dfdjfka dfnkan dfak dfkn', '00977988', 'foto_mustahik/aX7dl0r2wL2R7yAtGfvvKBstDqQHgMJgLNiZjr0P.jpeg', 8, NULL, '2019-04-24 16:50:51', '2019-04-24 16:50:51', 'WANITA'),
(18, 'Muhammad Jabir', 'jl stimk', '08883942', 'foto_mustahik/epbd4XjWGMUPjgJtblmCr2LlrOPnhA73GkZwyb9p.jpeg', 7, NULL, '2019-05-19 16:44:56', '2019-05-19 16:46:17', 'PRIA'),
(19, 'Muhammad jabir dua', 'jksdkfds', '093090332', 'foto_mustahik/hKwi13GkrUrFIiYs4SiZtN54zYZYiO2bGZoPeuGT.jpeg', 9, NULL, '2019-05-27 02:29:28', '2019-05-27 02:29:28', 'PRIA');

-- --------------------------------------------------------

--
-- Table structure for table `muzaki`
--

CREATE TABLE `muzaki` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_muzaki` char(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(13) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelamin` enum('PRIA','WANITA') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `muzaki`
--

INSERT INTO `muzaki` (`id`, `nama_muzaki`, `alamat`, `no_hp`, `kelamin`, `foto`, `deleted_at`, `created_at`, `updated_at`) VALUES
(2, 'ksfkjsk', 'fsdfsdkfjaa', '089502342641', 'PRIA', 'foto_muzaki/ROdbZprmSnF8McAaaOXbFrIOmzoRK8TQmusdHGrH.jpeg', NULL, '2019-04-11 13:40:33', '2019-04-23 06:09:04'),
(4, 'jugong', 'huyfyu gyutyu  jgiugyu giu', '08978768', 'PRIA', 'foto_muzaki/0LWiIxG0WmMOJJv6IkI7d6M9SlKsVDLA61wji4Ui.jpeg', NULL, '2019-04-23 06:51:38', '2019-04-23 06:51:38'),
(5, 'Terstersf', 'jlm jdkjf sdddken ksjf kajd', '03439223', 'PRIA', 'foto_muzaki/imdIxq55PFEDAV8I2RLLajertxfMtTNnQQdpCImP.jpeg', NULL, '2019-04-24 16:46:29', '2019-04-24 16:46:29'),
(6, 'Muhammad Jabir', 'jl sfskdhkds', '08850305', 'PRIA', 'foto_muzaki/mKheVnIW3CJMTnacYXacIkzpyLwMcLP22qgG6HjL.jpeg', NULL, '2019-05-27 02:26:33', '2019-05-27 02:26:33');

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
-- Table structure for table `pembagian_zakat`
--

CREATE TABLE `pembagian_zakat` (
  `id` int(10) UNSIGNED NOT NULL,
  `beras` float(4,2) NOT NULL,
  `uang` double(11,2) NOT NULL,
  `mustahik_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembagian_zakat`
--

INSERT INTO `pembagian_zakat` (`id`, `beras`, `uang`, `mustahik_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(9, 0.00, 100000.00, 12, '2019-04-20 07:55:05', '2019-04-23 09:44:52', NULL),
(10, 2.00, 210000.00, 13, '2019-04-22 13:15:01', '2019-04-23 05:47:10', NULL),
(11, 0.00, 1000000.00, 12, '2019-04-23 09:37:35', '2019-04-23 09:41:54', NULL),
(12, 2.00, 220000.00, 15, '2019-04-24 05:43:53', '2019-04-24 05:43:53', NULL),
(13, 1.00, 4000000.00, 12, '2019-04-24 16:46:58', '2019-04-24 16:46:58', NULL),
(14, 2.00, 1000000.00, 18, '2019-05-19 16:51:22', '2019-05-19 16:51:22', NULL),
(15, 2.00, 5000000.00, 19, '2019-05-27 02:29:49', '2019-05-27 02:29:49', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran_zakat`
--

CREATE TABLE `pembayaran_zakat` (
  `id` int(10) UNSIGNED NOT NULL,
  `bayar` double(11,2) NOT NULL,
  `tipe_zakat` enum('FITRAH','MAL') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `muzaki_id` int(10) UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran_zakat`
--

INSERT INTO `pembayaran_zakat` (`id`, `bayar`, `tipe_zakat`, `muzaki_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(7, 1750000.00, 'MAL', 2, NULL, '2019-04-12 13:55:21', '2019-04-23 09:30:42'),
(15, 1500000.00, 'MAL', 2, NULL, '2019-04-22 13:53:17', '2019-04-23 09:30:46'),
(16, 30000.00, 'FITRAH', 2, NULL, '2019-04-23 06:42:11', '2019-04-23 06:42:11'),
(17, 3.00, 'FITRAH', 2, NULL, '2019-04-23 06:42:15', '2019-04-23 06:42:15'),
(18, 1500000.00, 'MAL', 2, NULL, '2019-04-23 06:42:27', '2019-04-23 06:42:27'),
(19, 1250000.00, 'MAL', 2, NULL, '2019-04-23 06:42:40', '2019-04-23 06:42:40'),
(20, 2000000.00, 'MAL', 4, NULL, '2019-04-23 06:51:58', '2019-04-23 09:30:38'),
(21, 3.00, 'FITRAH', 4, NULL, '2019-04-23 06:55:52', '2019-04-23 06:55:52'),
(22, 17500000.00, 'MAL', 4, '2019-04-25 15:50:36', '2019-04-24 03:18:59', '2019-04-25 15:50:36'),
(23, 250000000.00, 'MAL', 4, '2019-04-25 15:50:27', '2019-04-25 15:37:33', '2019-04-25 15:50:27'),
(24, 3000000.00, 'MAL', 2, NULL, '2019-04-25 15:43:54', '2019-04-25 15:43:54'),
(25, 250000000.00, 'MAL', 2, '2019-04-25 15:49:57', '2019-04-25 15:47:26', '2019-04-25 15:49:57'),
(26, 250000000.00, 'MAL', 2, '2019-04-25 15:50:02', '2019-04-25 15:48:50', '2019-04-25 15:50:02'),
(27, 3.00, 'FITRAH', 4, NULL, '2019-05-12 17:13:32', '2019-05-12 17:13:32'),
(28, 250000000.00, 'MAL', 6, NULL, '2019-05-27 02:27:24', '2019-05-27 02:27:24'),
(29, 3.00, 'FITRAH', 6, NULL, '2019-05-27 02:27:43', '2019-05-27 02:27:43');

-- --------------------------------------------------------

--
-- Table structure for table `tipemustahiks`
--

CREATE TABLE `tipemustahiks` (
  `id` int(10) UNSIGNED NOT NULL,
  `tipe_mustahik` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tipemustahiks`
--

INSERT INTO `tipemustahiks` (`id`, `tipe_mustahik`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'ddere', '2019-04-01 02:08:17', '2019-04-08 07:17:08', '2019-04-08 07:17:08'),
(2, 'tipefef', '2019-04-01 02:15:35', '2019-04-09 01:30:01', '2019-04-09 01:30:01'),
(3, 'derere', '2019-04-08 07:13:51', '2019-04-21 02:49:37', '2019-04-21 02:49:37'),
(4, 'sasa', '2019-04-08 07:54:33', '2019-04-09 20:47:43', '2019-04-09 20:47:43'),
(5, 'ewew2', '2019-04-08 08:02:15', '2019-04-09 04:22:29', '2019-04-09 04:22:29'),
(6, 'rerew', '2019-04-09 03:52:15', '2019-04-09 04:20:43', '2019-04-09 04:20:43'),
(7, 'qw1qwq', '2019-04-09 08:15:58', '2019-04-09 08:15:58', NULL),
(8, 'Sabilillah', '2019-04-10 04:41:30', '2019-04-28 12:37:06', '2019-04-28 12:37:06'),
(9, 'Gharim', '2019-04-10 09:56:57', '2019-04-10 09:56:57', NULL),
(10, 'wewe', '2019-04-21 02:43:16', '2019-04-21 02:49:29', '2019-04-21 02:49:29'),
(11, 'wewew', '2019-04-21 02:43:43', '2019-04-21 02:46:41', '2019-04-21 02:46:41'),
(12, 'wrfef', '2019-04-21 02:44:06', '2019-04-21 02:46:32', '2019-04-21 02:46:32'),
(13, 'sds', '2019-04-21 02:44:45', '2019-04-21 02:44:45', NULL),
(14, 'wewee', '2019-04-21 02:45:07', '2019-04-21 02:49:13', '2019-04-21 02:49:13'),
(15, 'sdsd', '2019-04-21 02:45:45', '2019-04-21 02:45:45', NULL),
(16, 'sdfssf3343', '2019-04-21 02:48:40', '2019-04-21 02:48:40', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `roles` enum('ADMIN','MASTER') COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `username`, `roles`, `foto`) VALUES
(1, 'Muhammad Jabir', NULL, '$2y$10$fCHQ75egXO4NKmfddRE/geWxGAkF64RaCoijzbm6EHjWouVm02fb6', NULL, '2019-03-28 08:37:04', '2019-03-28 08:37:04', 'MASTER', 'MASTER', NULL),
(2, 'Khalil Abernathy', '2019-03-29 01:21:45', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZpNEsWNMrG', '2019-03-29 01:21:45', '2019-03-29 01:21:45', 'zbeer', 'ADMIN', NULL),
(3, 'Edwin Stehr', '2019-03-29 01:21:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XmHw3vLO1V', '2019-03-29 01:21:54', '2019-03-29 01:21:54', 'alberto62', 'ADMIN', NULL),
(4, 'Dr. Alva Spencer', '2019-03-29 01:21:54', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5gJEfRveoa', '2019-03-29 01:21:54', '2019-03-29 01:21:54', 'tnikolaus', 'ADMIN', NULL),
(5, 'Julianne Ward', '2019-03-29 01:22:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1GmgKCWS8z', '2019-03-29 01:22:17', '2019-03-29 01:22:17', 'garland36', 'ADMIN', NULL),
(6, 'Prof. Kobe Upton', '2019-03-29 01:22:17', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NQjCWhFtd2', '2019-03-29 01:22:17', '2019-03-29 01:22:17', 'joan41', 'ADMIN', NULL),
(7, 'Dr. Alf Sawayn DVM', '2019-03-29 01:23:02', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'sFLtURPmL6', '2019-03-29 01:23:02', '2019-03-29 01:23:02', 'rachelle40', 'ADMIN', NULL),
(8, 'Ms. Myrtle Larson DVM', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'a4j3HQooqV', '2019-03-29 01:25:38', '2019-03-29 01:25:38', 'claudia.treutel', 'ADMIN', NULL),
(9, 'Carissa Lowe', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'BM3fz66uaV', '2019-03-29 01:25:38', '2019-03-29 01:25:38', 'juliet18', 'ADMIN', NULL),
(10, 'Brook Lubowitz MD', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'UArYfETfBd', '2019-03-29 01:25:38', '2019-03-29 01:25:38', 'hfisher', 'ADMIN', NULL),
(11, 'Mr. Hoyt Will', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '5fHMMdppfT', '2019-03-29 01:25:38', '2019-03-29 01:25:38', 'bernice.kuvalis', 'ADMIN', NULL),
(12, 'Tianna Schuster Jr.', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'yp169dyZjm', '2019-03-29 01:25:38', '2019-03-29 01:25:38', 'weissnat.keith', 'ADMIN', NULL),
(13, 'Euna Bergstrom', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HD48DB6lbA', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'jeremie66', 'ADMIN', NULL),
(15, 'Pearline Waelchi', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TkyWRsStCt', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'esther.witting', 'ADMIN', NULL),
(16, 'Leilani Lemke', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'D3bm9ia9eG', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'aimee.weissnat', 'ADMIN', NULL),
(17, 'Minnie Mayer II', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'c7D9ng9C2i', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'grover13', 'ADMIN', NULL),
(18, 'Dr. Jacinto Anderson', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'tr55pGEIGs', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'xcartwright', 'ADMIN', NULL),
(19, 'Kaylee Kilback', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4O2rrCoAjb', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'tod02', 'ADMIN', NULL),
(20, 'Laury Kuphal', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bK6IZNcqk6', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'schumm.sebastian', 'ADMIN', NULL),
(21, 'Triston Predovic', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'uHkdPrNJ4J', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'njerde', 'ADMIN', NULL),
(22, 'Shemar McGlynn', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cjI6N1jhlW', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'uhegmann', 'ADMIN', NULL),
(23, 'Gaetano Koepp', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Aj7URxROLP', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'elyse.smitham', 'ADMIN', NULL),
(24, 'Chloe Roberts', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Uy65NGEitb', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'aosinski', 'ADMIN', NULL),
(25, 'Prof. Doris Eichmann DVM', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aCWotBF8gK', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'emanuel.greenholt', 'ADMIN', NULL),
(26, 'Prof. Jocelyn Mayert PhD', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pxIG8rA4UW', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'kreiger.lindsay', 'ADMIN', NULL),
(28, 'Laurence Hodkiewicz', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'TBTCl38Tcx', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'monty08', 'ADMIN', NULL),
(29, 'Taya Okuneva', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'kIzRopPSAb', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'eking', 'ADMIN', NULL),
(30, 'Maureen Gutkowski', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ZBeJO0nBUl', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'hank73', 'ADMIN', NULL),
(31, 'Ebony Daniel', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Z2Mo3SiRhL', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'rodger00', 'ADMIN', NULL),
(32, 'Miss Angelina Erdman', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'qqMwLsiji3', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'milford.king', 'ADMIN', NULL),
(33, 'Brenda Pacocha', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OjaISXIHkB', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'rutherford.delphine', 'ADMIN', NULL),
(34, 'Richmond Rolfson', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9Yl92PDEwq', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'tlakin', 'ADMIN', NULL),
(35, 'Name Reichel', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'u2nS4lYeyL', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'price.elaina', 'ADMIN', NULL),
(36, 'Macie Mante', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Tx5XGip0LG', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'aspencer', 'ADMIN', NULL),
(37, 'Donato Champlin', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '6bp8SA6Fkp', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'lind.dena', 'ADMIN', NULL),
(38, 'Rogers Hilpert', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Q2DtiGETLu', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'oconnell.marquise', 'ADMIN', NULL),
(39, 'Mr. Denis Willms MD', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'JYr2xN8TBk', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'erna79', 'ADMIN', NULL),
(40, 'Ashley Bradtke I', '2019-03-29 01:25:38', '123456', '7Hyn3m6tk3', '2019-03-29 01:25:39', '2019-04-01 02:01:32', 'fcarter', 'ADMIN', 'avatars/2i3CaA7U2ed4y9vlEgjqgdRKFuSSzicXvpTUpHUI.jpeg'),
(41, 'Rylan Erdman', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ce7pJcFvic', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'april.murray', 'ADMIN', NULL),
(42, 'Mckenzie Kreiger', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'DKUMzwHj98', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'adolphus.monahan', 'ADMIN', NULL),
(43, 'Summer Sipes', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'h7QKg8HCQT', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'mcglynn.delta', 'ADMIN', NULL),
(44, 'Bernie Walsh', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Bp10ClSTKU', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'emilia73', 'ADMIN', NULL),
(45, 'Julianne Gulgowski Jr.', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '0inXlExYQs', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'pauline.koepp', 'ADMIN', NULL),
(46, 'Osbaldo Feeney III', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '01NIEjl0qs', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'kuhic.yesenia', 'ADMIN', NULL),
(48, 'Mr. Dorthy Kuvalis Jr.', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'Ly7VFuNqyz', '2019-03-29 01:25:39', '2019-03-29 01:25:39', 'otromp', 'ADMIN', NULL),
(49, 'Mrs. Aryanna Collier Jr.', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iHS9wsuE28', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'strosin.milford', 'ADMIN', NULL),
(50, 'Prof. Austin Halvorson', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'GUt2LTHuIa', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'khodkiewicz', 'ADMIN', NULL),
(51, 'Ladarius Brakus', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'rI0x97Gh3D', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'ostroman', 'ADMIN', NULL),
(52, 'Mara Wuckert', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'eveb4bzfeQ', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'catharine04', 'ADMIN', NULL),
(53, 'Jerry Thompson', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NcYCdHNOgQ', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'susan.bernier', 'ADMIN', NULL),
(54, 'Maybelle Collins PhD', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'D7lQp5Z5F2', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'davon05', 'ADMIN', NULL),
(55, 'Coty Stroman', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '7zjp0dGysN', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'ukulas', 'ADMIN', NULL),
(56, 'Dr. Tess Wyman', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '9QqxMit4LA', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'pprice', 'ADMIN', NULL),
(57, 'dfdkj wswd', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2IcbkItCH3', '2019-03-29 01:25:40', '2019-04-19 12:31:18', 'kunde.dwight', 'MASTER', NULL),
(58, 'Lura Gleason', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YLJ5UQSrpO', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'gleichner.heath', 'ADMIN', NULL),
(59, 'Lonnie Goodwin Sr.', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OjdKOSVsq4', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'uoconnell', 'ADMIN', NULL),
(60, 'Aurelie Medhurst', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'YmdhKRF9Mb', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'nigel84', 'ADMIN', NULL),
(61, 'Everette Lakin', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'D311EmXUsp', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'yyost', 'ADMIN', NULL),
(62, 'Jakayla McKenzie', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'hH75erics5', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'cornelius.friesen', 'ADMIN', NULL),
(63, 'Mrs. Mattie Hoppe V', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'NMGFO7fLmq', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'muller.grace', 'ADMIN', NULL),
(64, 'Prof. Gloria Turcotte PhD', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ER6iEZeOmQ', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'alvah.adams', 'ADMIN', NULL),
(65, 'Johann Rath', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XTnRNbPvlJ', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'kimberly.corwin', 'ADMIN', NULL),
(66, 'Mrs. Dina Oberbrunner I', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'vCNjIrfIF9', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'lacey07', 'ADMIN', NULL),
(67, 'Sadye Von III', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'mSaDkfERBQ', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'pamela.turner', 'ADMIN', NULL),
(68, 'Prof. Vernice Kuhlman II', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '63mxlis1cR', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'fadel.alejandrin', 'ADMIN', NULL),
(69, 'Rose Donnelly', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'simsC20e9L', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'spowlowski', 'ADMIN', NULL),
(70, 'Jules Schumm', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'g08GTNWcDK', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'nikolaus.wendell', 'ADMIN', NULL),
(71, 'Therese Collins', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'EALCLgmW9A', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'renner.lillie', 'ADMIN', NULL),
(72, 'Barton Stark', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'HXNFXJAhFe', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'jackeline.hessel', 'ADMIN', NULL),
(73, 'Hubert Ebert', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8s9Hqeu6nh', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'jprohaska', 'ADMIN', NULL),
(74, 'Gabrielle Runolfsdottir V', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'exUKNecknk', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'moore.gia', 'ADMIN', NULL),
(75, 'Miss Cordia Crist', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '4Y8utZlX3R', '2019-03-29 01:25:40', '2019-03-29 01:25:40', 'bennett41', 'ADMIN', NULL),
(76, 'Oswaldo Windler', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iiWv4VraGh', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'hayes.lucie', 'ADMIN', NULL),
(77, 'Mortimer Davis', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'nJk9M2UnYj', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'pgoyette', 'ADMIN', NULL),
(78, 'Mohammad Olson', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aJfHk2UvK6', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'langworth.alberto', 'ADMIN', NULL),
(79, 'Ladarius Casper', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'LKSDfnRg0d', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'connelly.lucinda', 'ADMIN', NULL),
(80, 'Prof. Chloe Trantow DVM', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2JWXSIpi2A', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'fsawayn', 'ADMIN', NULL),
(81, 'Fay Bogisich', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'j0jLv5sxAv', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'estefania31', 'ADMIN', NULL),
(82, 'Nadia Feeney', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '2JWPDHsii9', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'koch.rozella', 'ADMIN', NULL),
(83, 'Dr. Jon Bayer', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'wbG0GhT4H6', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'elvera15', 'ADMIN', NULL),
(84, 'Daryl Wisoky', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XG5XOH0bdy', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'bo96', 'ADMIN', NULL),
(86, 'Jewell Cronin III', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'gjGfDoeAhs', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'mertz.samir', 'ADMIN', NULL),
(88, 'Gaetano Robel IV', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'ENUY3CKhWZ', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'kkiehn', 'ADMIN', NULL),
(89, 'Miss Chelsea Huels', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AIRkgACV2L', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'nblanda', 'ADMIN', NULL),
(90, 'Prof. Lacy Denesik I', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'pP3noq5vn3', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'matilde37', 'ADMIN', NULL),
(91, 'Ryleigh Bernier', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'OEJT8lCQdJ', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'oconner.kennedi', 'ADMIN', NULL),
(92, 'Ramiro Johnson MD', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '07vUdR9vZP', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'carter.taya', 'ADMIN', NULL),
(93, 'Elizabeth Kiehn', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'bro8boQYVN', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'valentina99', 'ADMIN', NULL),
(94, 'Zella Langworth', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'U0Ae16MrJh', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'predovic.alejandra', 'ADMIN', NULL),
(95, 'Sally Ullrich', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '95gE13uiwG', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'tgreen', 'ADMIN', NULL),
(96, 'Herta Swift I', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iU3e36aZeE', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'bartoletti.ulises', 'ADMIN', NULL),
(97, 'Velda Rutherford', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 't7iz8qfkIO', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'jrunolfsdottir', 'ADMIN', NULL),
(98, 'Dr. Mauricio Beer V', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'oplBn3iTs9', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'jimmy40', 'ADMIN', NULL),
(99, 'Prof. Jamarcus Tillman', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'iKVJbkMwtK', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'suzanne65', 'ADMIN', NULL),
(100, 'Marilou Harber', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'WmakGlHp2l', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'bechtelar.arjun', 'ADMIN', NULL),
(101, 'Rickie Skiles', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'AoOpGIN1zE', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'grayson15', 'ADMIN', NULL),
(102, 'Gilda Borer IV', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'VPTeSdIdTA', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'greenfelder.robert', 'ADMIN', NULL),
(103, 'Shana Reinger', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'XVrNb0tTtV', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'ymante', 'ADMIN', NULL),
(104, 'Terrance Koepp IV', '2019-03-29 01:25:38', '121232', 'DQ4dfpTnp7', '2019-03-29 01:25:41', '2019-03-30 06:27:33', 'rutherford.petra', 'ADMIN', NULL),
(105, 'Erik Brown', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '1MeCAGAFb4', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'cartwright.daisy', 'ADMIN', NULL),
(106, 'Lisette Watsica', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'q1G8wmyayV', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'alysa95', 'ADMIN', NULL),
(107, 'Jeremy Orn', '2019-03-29 01:25:38', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'aD1lvGipph', '2019-03-29 01:25:41', '2019-03-29 01:25:41', 'jerde.luciano', 'ADMIN', NULL),
(108, 'terkasih', NULL, '$2y$10$4ftaCYxXu/PH9ZIOZAmtK.HBIN0cf1o/hRHOcPV1RC3khAboI5Dqe', NULL, '2019-03-29 08:04:16', '2019-03-29 08:04:16', 'jumanji223', 'ADMIN', NULL),
(109, 'usmun', NULL, '$2y$10$Hny8gtyP40QZZY1n6Bz2Te/9HAxKtqs.XU9AaAsjEu9J9L4KmLwr6', NULL, '2019-03-29 08:07:12', '2019-03-29 08:07:12', 'fjdkjfiwj123', 'ADMIN', 'avatars/NLYKUunj5fjLEhnrh0KMovIzcaCr4HBkbXSg0KY0.jpeg'),
(110, 'fjdkjfeiw', NULL, '$2y$10$KIVPFIGvtBYVCY2OWvRpqu0gvustcG/Ca/GEwv7pU10MjxyyIwab6', NULL, '2019-03-29 08:10:49', '2019-03-29 08:10:49', 'sjdiwji334', 'MASTER', 'avatars/Q6TBqavvpxpCtwqOcV0IIbIVpbuy4WHuLLg4NXv7.jpeg'),
(111, 'jriwejriwe@fdkfj', NULL, '$2y$10$9UtrUuSdZSztSSWBOsDIfeKDr3rHEeHq.stOXAOdN1SgT3/Ytla36', NULL, '2019-03-29 08:11:49', '2019-03-29 08:11:49', 'fisdjafian3424', 'MASTER', 'avatars/d7FAusgR4yhZFi6LKLNyn53g7uLqg1ewjeLqj5lv.jpeg'),
(113, 'djfksjfk', NULL, '$2y$10$ElLS4aUMtrO.eiEsppv6G.vOxjT6gwB.GKXA1QQ3hRNSMOetlZZ9q', NULL, '2019-03-29 08:13:45', '2019-03-29 08:13:45', 'jkjdskfjksk32', 'MASTER', NULL),
(114, 'orjjti2nknd', NULL, '$2y$10$Q7s.o6InWrOAVh7nfyPvVeH5HrnwVFztPAZcQJXKuwV9q1YPscEkW', NULL, '2019-03-29 08:14:32', '2019-03-29 08:14:32', 'sasasaqw', 'MASTER', NULL),
(115, 'sasalsj', NULL, '$2y$10$cDdSwAK117WqEYqVXLpWo.D9/kH0hXCSs8Plkh.o3UCUoDSYuIuiG', NULL, '2019-03-29 08:15:35', '2019-03-29 08:15:35', 'lsjdfljldjfa', 'MASTER', NULL),
(116, 'jidsf', NULL, '$2y$10$.YJDiKKuNQwOKLqeRjRv3.MHwR4vVd1ZuCqZfofrJoD7gQGnS/z1G', NULL, '2019-03-29 08:17:15', '2019-03-29 08:17:15', 'idsfisi3', 'MASTER', NULL),
(117, 'djfihdiwh', NULL, '$2y$10$2//iaEyV6fKlVTx0yJqLQukwDUfNRNazMHqwPlcvCHnyJ4tGHsvlS', NULL, '2019-03-29 15:54:51', '2019-03-29 15:54:51', 'uweiwuieu23', 'MASTER', NULL),
(118, 'jijdkjieijfi', NULL, '$2y$10$PCUc8v8Ni4gKBwszpLRhG.ca4bS/7T7m4o/nOofNbNwp2PT4qmJRy', NULL, '2019-03-29 15:58:04', '2019-03-29 15:58:04', 'wjewjidiq', 'MASTER', 'avatars/ExOyXs1PyF9rAGSS3yDQ8FckwfxkBCy8UVpGkBXH.jpeg'),
(119, 'jrksjdk', NULL, '$2y$10$HEV5FjA9q.6uZa9vOdi17ODW5o.O/blyoK2A5610xq3Pg/Hau05c.', NULL, '2019-03-29 15:58:51', '2019-03-29 15:58:51', 'wijeiwqjie2321', 'MASTER', NULL),
(120, 'sfjksdjfk', NULL, '$2y$10$YNC.pxG8ZVRljnrEhJ7QounmWDNfIuug3nuxLThOpL5cTJULcaq6i', NULL, '2019-03-29 15:59:26', '2019-03-29 15:59:26', 'fsdfksdf3', 'MASTER', NULL),
(121, 'jikdjfds', NULL, '$2y$10$7TOgwAZrHfSAoCzs1sHXwuEIBjWanWj9Ogb5AXpLvxUeW3cUTTXXS', NULL, '2019-03-29 16:00:55', '2019-03-29 16:00:55', 'fewjfw', 'MASTER', NULL),
(122, 'orgila', NULL, '$2y$10$P.glb7td8xJRjiKXI6smjuNkOLP6SINhrHbNQP2oppgMX4AyW8Rs2', NULL, '2019-03-29 16:16:00', '2019-03-29 16:16:00', 'orgilla22', 'MASTER', 'avatars/t61nVc9KDFxD4ZH9lxJCt76yLQPGwkYQnTr4zB41.jpeg'),
(123, 'jdfksjfk', NULL, '$2y$10$rd2rBOXpiy9V3AGsjqF2mO.JvSVK.tGU7jx0YtEr01Al9qEBk3lKm', NULL, '2019-03-29 23:03:04', '2019-03-29 23:03:04', 'ksjdijwid@dfkmk', 'MASTER', 'avatars/HgwowlHH7nhjxCCZz4RBl9IweE9cBgzvjxUE39g1.jpeg'),
(124, 'kdoask', NULL, '$2y$10$ewbHgsAHfs.BJjF1Zf6Lfu6LS5VT5FgzwjZZW1JlkLaLdWNgECUtq', NULL, '2019-03-29 23:04:06', '2019-03-29 23:04:06', 'jsidjisjiw232', 'MASTER', NULL),
(125, 'jiajdiw', NULL, '$2y$10$hJZFMcc3GlB30dlVAEVVSec01cDPsReOvTbWjaGZu2T18xYBzbXHy', NULL, '2019-03-29 23:05:11', '2019-03-29 23:05:11', 'jisdjijdiw', 'MASTER', 'avatars/8fcr5lntBsqugFExkSxETegzreg9PHxsm4ktyMbb.jpeg'),
(126, 'ewjieorjoiw', NULL, '$2y$10$kt/5gGmS74luVL0xsVmBjutAu3iiDwHckGcPKD0lNL9RR5FsT4NtG', NULL, '2019-03-29 23:06:08', '2019-03-29 23:06:08', 'dmfjsifjiowew', 'MASTER', NULL),
(127, 'jekwqje', NULL, '$2y$10$VulR.2li18q/9Hb3/4BTxO7DLzjcSPZ7BQ1eRly0AwHXWKoyDLgU6', NULL, '2019-03-29 23:07:44', '2019-03-29 23:07:44', 'dqwjwqodwqj', 'MASTER', NULL),
(128, 'elwoprioiwefo', NULL, '$2y$10$jEZFLoqMgO5RmG9mBvT4E.PnbTDxrSMnKs3oRJiQu87bKNePCmPeO', NULL, '2019-03-30 09:21:37', '2019-03-30 09:21:37', 'makdsamma232', 'MASTER', NULL),
(129, 'kjfksdjf', NULL, '$2y$10$SBxQGzo0RNMiCqcY25KYUuK/4kFybtESSb2WeDenjqx0gayemxDGq', NULL, '2019-03-30 10:13:05', '2019-03-30 10:13:05', 'iwjdiwji23', 'MASTER', NULL),
(130, 'sjdksds', NULL, '$2y$10$IziVYt/F6v/ELH.fIEQT/O5./Gf3ZAbNmC6D93hpVRDTOZzVFDtUO', NULL, '2019-03-30 10:13:51', '2019-03-30 10:13:51', 'jwjwojeoww2', 'MASTER', NULL),
(131, 'mdlsmdwl', NULL, '$2y$10$HfuT/arrboTl2QrUsXBuSe8FMJoCZypj7e72O6qdmxjB.AQsVfwGu', NULL, '2019-03-30 10:18:21', '2019-03-30 10:18:21', 'wkjojrow23', 'MASTER', NULL),
(132, 'Terlalu Tampan', NULL, '$2y$10$Pg2.Y9SISCmdiHHe/rJhy.pc6YodqNU5NISYGWT38JLA8F2ztrQFu', NULL, '2019-04-19 11:57:05', '2019-04-19 11:57:05', 'Mdfd23', 'ADMIN', 'avatars/IgmGcP19kazHUjF8F1FrNlg3HoOhxf86ytvq31OD.jpeg'),
(133, 'ocong', NULL, '$2y$10$xqmDfASzeW/NcEzSswxd7.wUWJBk/9dkFfmm3WOCp6qudsnXiQvya', NULL, '2019-04-21 11:47:26', '2019-04-21 11:47:26', 'admin3', 'ADMIN', NULL),
(134, 'admin', NULL, '$2y$10$2PDUuFJUp2dXThiZdhMsbeyTp5WkIymqfAUg1fQjuEs78Pd9tYLxq', NULL, '2019-04-24 16:07:55', '2019-04-24 16:07:55', 'admin1', 'ADMIN', 'avatars/Jve78teuPm6R2c62w7fxCjq6EGBHVOwLzUYF1QJJ.jpeg'),
(135, 'Amira Hane', NULL, '$2y$10$njSg1vMWDsEky5Pwuz14Lel49s3G.GkS1KcY5qELsMuLXuRC.7Uma', NULL, '2019-04-25 15:17:51', '2019-04-25 15:17:51', 'admin2', 'ADMIN', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mustahik`
--
ALTER TABLE `mustahik`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mustahik_tipe_id_foreign` (`tipe_id`);

--
-- Indexes for table `muzaki`
--
ALTER TABLE `muzaki`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pembagian_zakat`
--
ALTER TABLE `pembagian_zakat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembagian_zakat_mustahik_id_foreign` (`mustahik_id`);

--
-- Indexes for table `pembayaran_zakat`
--
ALTER TABLE `pembayaran_zakat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_zakat_muzaki_id_foreign` (`muzaki_id`);

--
-- Indexes for table `tipemustahiks`
--
ALTER TABLE `tipemustahiks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `mustahik`
--
ALTER TABLE `mustahik`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `muzaki`
--
ALTER TABLE `muzaki`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pembagian_zakat`
--
ALTER TABLE `pembagian_zakat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `pembayaran_zakat`
--
ALTER TABLE `pembayaran_zakat`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tipemustahiks`
--
ALTER TABLE `tipemustahiks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `mustahik`
--
ALTER TABLE `mustahik`
  ADD CONSTRAINT `mustahik_tipe_id_foreign` FOREIGN KEY (`tipe_id`) REFERENCES `tipemustahiks` (`id`);

--
-- Constraints for table `pembagian_zakat`
--
ALTER TABLE `pembagian_zakat`
  ADD CONSTRAINT `pembagian_zakat_mustahik_id_foreign` FOREIGN KEY (`mustahik_id`) REFERENCES `mustahik` (`id`);

--
-- Constraints for table `pembayaran_zakat`
--
ALTER TABLE `pembayaran_zakat`
  ADD CONSTRAINT `pembayaran_zakat_muzaki_id_foreign` FOREIGN KEY (`muzaki_id`) REFERENCES `muzaki` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
