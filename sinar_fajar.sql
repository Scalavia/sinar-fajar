-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2021 at 01:49 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sinar_fajar`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_barang` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_kategori` tinyint(4) DEFAULT NULL,
  `nama_barang` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deskripsi` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `kode_barang`, `id_kategori`, `nama_barang`, `deskripsi`, `stok`, `harga`, `gambar`, `created_at`, `updated_at`) VALUES
(1, 'BR1', 1, 'Kursi Minimalis', 'Terbuat dari pohon rambutan', 2, 100000, '1636474547_kursi.jpg', '2021-11-09 09:15:47', '2021-12-23 06:51:44'),
(2, 'BR2', 1, 'Meja Sudut', 'Terbuat dari kayu jati', 5, 100000, '1636474571_meja.jpg', '2021-11-09 09:16:11', '2021-12-15 19:54:37');

-- --------------------------------------------------------

--
-- Table structure for table `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_transaksi` tinyint(4) DEFAULT NULL,
  `id_barang` tinyint(4) DEFAULT NULL,
  `jumlah` tinyint(4) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id`, `id_transaksi`, `id_barang`, `jumlah`, `harga`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, 2, 3, 100000, 300000, '2021-11-21 04:21:11', '2021-11-21 04:21:11'),
(2, 3, 2, 3, 100000, 300000, '2021-11-21 04:23:35', '2021-11-21 04:23:35'),
(3, 4, 2, 3, 100000, 300000, '2021-11-21 04:55:09', '2021-11-21 04:55:09'),
(4, 5, 1, 2, 50000, 100000, NULL, NULL),
(5, 5, 2, 2, 100000, 200000, NULL, NULL),
(6, 5, 2, 3, 100000, 300000, NULL, NULL),
(7, 6, 1, 2, 50000, 100000, NULL, NULL),
(8, 6, 2, 2, 100000, 200000, NULL, NULL),
(9, 6, 2, 3, 100000, 300000, NULL, NULL),
(10, 7, 1, 3, 50000, 150000, NULL, NULL),
(11, 8, 2, 5, 100000, 500000, NULL, NULL),
(12, 9, 1, 1, 50000, 50000, '2021-12-06 10:42:06', NULL),
(13, 9, 2, 2, 100000, 200000, '2021-12-06 10:42:06', NULL),
(14, 10, 2, 5, 100000, 500000, '2021-12-15 19:48:38', NULL),
(15, 10, 1, 10, 100000, 1000000, '2021-12-15 19:48:38', NULL),
(16, 11, 1, 5, 100000, 500000, '2021-12-21 00:04:36', NULL),
(17, 11, 1, 2, 100000, 200000, '2021-12-21 00:04:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dump_transaksi`
--

CREATE TABLE `dump_transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` tinyint(4) DEFAULT NULL,
  `jumlah` tinyint(4) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `subtotal` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dump_transaksi`
--

INSERT INTO `dump_transaksi` (`id`, `id_barang`, `jumlah`, `harga`, `subtotal`, `created_at`, `updated_at`) VALUES
(17, 1, 2, 100000, 200000, '2021-12-23 06:33:09', '2021-12-23 06:33:09');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Meja', '2021-11-09 09:14:56', '2021-11-09 09:14:56'),
(2, 'Kursi', '2021-11-09 09:15:01', '2021-11-09 09:15:01'),
(3, 'Lemari', '2021-12-07 18:31:28', '2021-12-07 18:31:28');

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
(133, '2014_10_12_000000_create_users_table', 1),
(134, '2014_10_12_100000_create_password_resets_table', 1),
(135, '2019_08_19_000000_create_failed_jobs_table', 1),
(136, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(137, '2021_08_31_115402_create_barang_table', 1),
(138, '2021_08_31_120419_create_transaksi_table', 1),
(139, '2021_08_31_161842_create_dump_transaksi_table', 1),
(140, '2021_08_31_163059_create_kategori_table', 1),
(141, '2021_08_31_163127_create_stok_table', 1),
(142, '2021_10_04_125114_create_detail_transaksi_table', 1),
(143, '2021_10_08_141646_create_supplier_table', 1);

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
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` tinyint(4) DEFAULT NULL,
  `id_supplier` tinyint(4) DEFAULT NULL,
  `stok_masuk` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stok`
--

INSERT INTO `stok` (`id`, `id_barang`, `id_supplier`, `stok_masuk`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 5, '2021-11-24 08:40:54', '2021-11-24 08:40:54'),
(2, 1, NULL, 5, '2021-11-24 10:16:44', '2021-11-24 10:16:44'),
(3, 1, NULL, 5, '2021-11-24 18:55:17', '2021-11-24 18:55:17'),
(4, 1, NULL, 1, '2021-12-07 18:25:53', '2021-12-07 18:25:53'),
(5, 2, NULL, 2, '2021-12-07 18:27:56', '2021-12-07 18:27:56'),
(6, 2, NULL, 5, '2021-12-15 19:53:32', '2021-12-15 19:53:32'),
(7, 1, NULL, 8, '2021-12-21 00:20:01', '2021-12-21 00:20:01'),
(8, 1, NULL, 5, '2021-12-23 06:49:02', '2021-12-23 06:49:02');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_supplier` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` tinyint(4) DEFAULT NULL,
  `invoice` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `kembalian` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_user`, `invoice`, `keterangan`, `total_bayar`, `jumlah_bayar`, `kembalian`, `created_at`, `updated_at`) VALUES
(1, 1, 'INV21112021F8052', NULL, 600000, 600000, 0, '2021-11-21 04:20:15', '2021-11-21 04:20:15'),
(2, 1, 'INV2111202182468', NULL, 600000, 600000, 0, '2021-11-21 04:21:11', '2021-11-21 04:21:11'),
(3, 1, 'INV21112021D8BFA', NULL, 600000, 600000, 0, '2021-11-21 04:23:35', '2021-11-21 04:23:35'),
(4, 1, 'INV2111202199E81', NULL, 600000, 600000, 0, '2021-11-21 04:55:09', '2021-11-21 04:55:09'),
(5, 1, 'INV2111202162872', NULL, 600000, 600000, 0, '2021-11-21 04:57:58', '2021-11-21 04:57:58'),
(6, 1, 'INV211120217B0BE', NULL, 600000, 600000, 0, '2021-11-21 04:59:30', '2021-11-21 04:59:30'),
(7, 1, 'INV241120212BBA9', NULL, 150000, 150000, 0, '2021-11-24 06:30:58', '2021-11-24 06:30:58'),
(8, 1, 'INV25112021ED7B3', NULL, 500000, 1000000, 500000, '2021-11-24 18:53:01', '2021-11-24 18:53:01'),
(9, 1, 'INV612202111E65', NULL, 250000, 250000, 0, '2021-12-06 10:42:06', '2021-12-06 10:42:06'),
(10, 1, 'INV16122021E0C1D', NULL, 1500000, 1500000, 0, '2021-12-15 19:48:38', '2021-12-15 19:48:38'),
(11, 1, 'INV211220215C9F7', NULL, 700000, 700000, 0, '2021-12-21 00:04:36', '2021-12-21 00:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notelp` varchar(15) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `name`, `notelp`, `alamat`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'tiara', 'Tiara', '088217643825', 'JL.KH.HASYIM ASYARI GG.PUSKESMAS NO.9', 'tiara@gmail.com', NULL, '$2y$10$XOFSh.09npPsN2eJQEcgfuKW.DkUZMKL6ImXaiCaW8wG/tCX.wH72', NULL, '2021-11-15 18:02:34', '2021-12-07 18:38:08'),
(3, 'karyawan', 'dedi', 'Dedi', '085735115655', 'Jl. Veteran', 'dedi@gmail.com', NULL, '$2y$10$kP.c63dSTyuPGF4h45VV2.HyeDeTeeAGybGwkT9P3mTQwfawcs1/O', NULL, '2021-11-24 10:11:39', '2021-11-24 10:11:39'),
(4, 'karyawan', 'marsu20', 'marsu', '08888888', 'veteran', 'marsu@gmail.com', NULL, '$2y$10$xHi3bGqXUfWe68SpKJEH6OEWWwOrIlr2aMU1Ee7wgifTRzurTKVuK', NULL, '2021-12-15 19:51:33', '2021-12-15 19:52:14');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_barang` (`nama_barang`);

--
-- Indexes for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dump_transaksi`
--
ALTER TABLE `dump_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
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
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
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
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `dump_transaksi`
--
ALTER TABLE `dump_transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=144;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stok`
--
ALTER TABLE `stok`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
