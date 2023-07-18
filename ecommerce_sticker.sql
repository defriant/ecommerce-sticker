-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 18, 2023 at 04:43 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce_sticker`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `stock` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `terjual` bigint(20) NOT NULL,
  `dilihat` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `barang_img`
--

CREATE TABLE `barang_img` (
  `id` bigint(20) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` bigint(20) NOT NULL,
  `komplain_id` varchar(15) NOT NULL,
  `from_user` bigint(20) NOT NULL,
  `to_user` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `chat_summary`
--

CREATE TABLE `chat_summary` (
  `id` varchar(15) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `confirm_regis`
--

CREATE TABLE `confirm_regis` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` varchar(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_bahan`
--

CREATE TABLE `custom_bahan` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom_bahan`
--

INSERT INTO `custom_bahan` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(6, 'BIASA (NON MERK)', 60000, '2023-07-14 10:27:31', '2023-07-14 10:27:31'),
(7, 'CAMEL', 75000, '2023-07-14 10:27:36', '2023-07-14 10:27:36'),
(8, 'ORAJET', 85000, '2023-07-14 10:27:42', '2023-07-14 10:27:42'),
(9, 'MAXDECAL', 100000, '2023-07-14 10:27:48', '2023-07-14 10:27:48'),
(10, 'MAXDECALPREMIUM', 115000, '2023-07-14 10:27:58', '2023-07-14 10:27:58'),
(11, 'CHROME', 125000, '2023-07-14 10:28:04', '2023-07-14 10:28:04'),
(12, 'HOLOGRAM', 125000, '2023-07-14 10:28:11', '2023-07-14 10:28:11'),
(13, 'TRANSPARAN', 115000, '2023-07-14 10:28:17', '2023-07-14 10:28:17');

-- --------------------------------------------------------

--
-- Table structure for table `custom_desain`
--

CREATE TABLE `custom_desain` (
  `id` bigint(20) NOT NULL,
  `tipe_id` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `custom_general`
--

CREATE TABLE `custom_general` (
  `id` bigint(20) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom_general`
--

INSERT INTO `custom_general` (`id`, `tipe`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'upload_desain', 50000, '2023-07-16 17:57:56', '2023-07-16 17:58:03');

-- --------------------------------------------------------

--
-- Table structure for table `custom_laminasi`
--

CREATE TABLE `custom_laminasi` (
  `id` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom_laminasi`
--

INSERT INTO `custom_laminasi` (`id`, `nama`, `harga`, `created_at`, `updated_at`) VALUES
(2, 'GLOSSY 100', 10000, '2023-07-14 10:39:21', '2023-07-14 10:39:21'),
(3, 'DOFF 100', 10000, '2023-07-14 10:39:29', '2023-07-14 10:39:29'),
(4, 'GLOSSY 120', 15000, '2023-07-14 10:39:39', '2023-07-14 10:39:39'),
(5, 'DOFF 120', 15000, '2023-07-14 10:39:46', '2023-07-14 10:39:46'),
(6, 'GLITTER', 15000, '2023-07-14 10:39:54', '2023-07-14 10:39:54');

-- --------------------------------------------------------

--
-- Table structure for table `custom_tipe`
--

CREATE TABLE `custom_tipe` (
  `id` bigint(20) NOT NULL,
  `tipe` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `barang_id` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `notif` text NOT NULL,
  `url` varchar(255) NOT NULL,
  `is_read` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` varchar(25) NOT NULL,
  `type` varchar(255) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `catatan` text DEFAULT NULL,
  `ongkir` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `status` varchar(50) NOT NULL,
  `konfirmasi` datetime DEFAULT NULL,
  `menunggu_validasi` datetime DEFAULT NULL,
  `validasi` datetime DEFAULT NULL,
  `pengiriman` datetime DEFAULT NULL,
  `tiba_di_tujuan` datetime DEFAULT NULL,
  `bukti_pembayaran` varchar(255) DEFAULT NULL,
  `alasan_batal` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pesanan_barang`
--

CREATE TABLE `pesanan_barang` (
  `id` bigint(20) NOT NULL,
  `pesanan_id` varchar(50) NOT NULL,
  `barang_id` varchar(50) DEFAULT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` varchar(50) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `total` varchar(50) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `terjual` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `telp` varchar(30) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(10) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `telp`, `alamat`, `email`, `image`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(2, 'Admin', '081313131313', 'Bekasi Utara', 'admin@admin.com', NULL, NULL, '$2y$10$8zGFQ2nSWPE07QFBxjQqlul3DuSrTn/sp7.x.k5wcXH6Vwb6XXRda', 'admin', NULL, '2021-05-26 07:51:19', '2021-05-26 07:51:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barang_img`
--
ALTER TABLE `barang_img`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chat_summary`
--
ALTER TABLE `chat_summary`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `confirm_regis`
--
ALTER TABLE `confirm_regis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_bahan`
--
ALTER TABLE `custom_bahan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_desain`
--
ALTER TABLE `custom_desain`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_general`
--
ALTER TABLE `custom_general`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_laminasi`
--
ALTER TABLE `custom_laminasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_tipe`
--
ALTER TABLE `custom_tipe`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
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
-- AUTO_INCREMENT for table `barang_img`
--
ALTER TABLE `barang_img`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `custom_bahan`
--
ALTER TABLE `custom_bahan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `custom_desain`
--
ALTER TABLE `custom_desain`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `custom_general`
--
ALTER TABLE `custom_general`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `custom_laminasi`
--
ALTER TABLE `custom_laminasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `custom_tipe`
--
ALTER TABLE `custom_tipe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=280;

--
-- AUTO_INCREMENT for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
