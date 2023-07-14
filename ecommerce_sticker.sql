-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2023 at 10:41 PM
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

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id`, `jenis`, `nama`, `harga`, `stock`, `gambar`, `deskripsi`, `terjual`, `dilihat`, `created_at`, `updated_at`) VALUES
('impostor', 'obat', 'Impostor', 100000, 4, 'impostor-1689145720-image-1.png', 'Qwertyuiop\r\n- asd\r\n- fghjk\r\n- zxcvb', 1, 4, '2023-07-12 07:08:40', '2023-07-14 15:30:09'),
('obat-flu-kucing', 'obat', 'Obat flu kucing', 120000, 116, 'obat-flu-kucing-1654892009-image-1.png', 'obat flu kucing', 4, 4, '2022-06-10 20:13:29', '2023-07-14 06:51:42'),
('pedigree', 'makanan', 'Pedigree', 85000, 296, 'pedigree-1654891872-image-1.png', 'Makanan anjing pedigree', 4, 5, '2022-06-10 20:11:12', '2022-12-15 11:40:47'),
('royal-cannin', 'makanan', 'Royal Cannin', 50000, 498, 'royal-cannin-1654891583-image-1.jpg', 'Makanan kucing royal canning', 2, 2, '2022-06-10 20:06:23', '2023-07-12 11:42:29'),
('whiskas-junior', 'makanan', 'Whiskas junior', 40000, 700, 'whiskas-junior-1654891970-image-1.png', 'makanan kucing junior', 0, 1, '2022-06-10 20:12:50', '2022-06-10 21:31:17');

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

--
-- Dumping data for table `barang_img`
--

INSERT INTO `barang_img` (`id`, `id_barang`, `gambar`, `created_at`, `updated_at`) VALUES
(19, 'royal-cannin', 'royal-cannin-1654891583-image-1.jpg', '2022-06-10 20:06:23', '2022-06-10 20:06:23'),
(20, 'royal-cannin', 'royal-cannin-1654891583-image-2.jpg', '2022-06-10 20:06:23', '2022-06-10 20:06:23'),
(21, 'royal-cannin', 'royal-cannin-1654891583-image-3.jpg', '2022-06-10 20:06:23', '2022-06-10 20:06:23'),
(22, 'pedigree', 'pedigree-1654891872-image-1.png', '2022-06-10 20:11:12', '2022-06-10 20:11:12'),
(23, 'pedigree', 'pedigree-1654891872-image-2.png', '2022-06-10 20:11:12', '2022-06-10 20:11:12'),
(24, 'pedigree', 'pedigree-1654891872-image-3.png', '2022-06-10 20:11:12', '2022-06-10 20:11:12'),
(25, 'whiskas-junior', 'whiskas-junior-1654891970-image-1.png', '2022-06-10 20:12:50', '2022-06-10 20:12:50'),
(26, 'whiskas-junior', 'whiskas-junior-1654891970-image-2.png', '2022-06-10 20:12:50', '2022-06-10 20:12:50'),
(27, 'whiskas-junior', 'whiskas-junior-1654891970-image-3.png', '2022-06-10 20:12:50', '2022-06-10 20:12:50'),
(28, 'obat-flu-kucing', 'obat-flu-kucing-1654892009-image-1.png', '2022-06-10 20:13:29', '2022-06-10 20:13:29'),
(29, 'obat-flu-kucing', 'obat-flu-kucing-1654892009-image-2.png', '2022-06-10 20:13:29', '2022-06-10 20:13:29'),
(30, 'obat-flu-kucing', 'obat-flu-kucing-1654892009-image-3.png', '2022-06-10 20:13:29', '2022-06-10 20:13:29'),
(31, 'impostor', 'impostor-1689145720-image-1.png', '2023-07-12 07:08:40', '2023-07-12 07:08:40'),
(32, 'impostor', 'impostor-1689335682-image-2.png', '2023-07-12 07:08:40', '2023-07-14 11:54:42'),
(33, 'impostor', 'impostor-1689145720-image-3.jpg', '2023-07-12 07:08:41', '2023-07-12 07:08:41');

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

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `komplain_id`, `from_user`, `to_user`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(100, 'K42-1671104574', 42, 2, 'produk yang saya beli sudah kadaluarsa', 1, '2022-12-15 11:42:54', '2022-12-15 11:44:45'),
(101, 'K42-1671104574', 42, 2, 'halo bang', 1, '2022-12-15 11:44:32', '2022-12-15 11:44:45'),
(102, 'K42-1671104574', 2, 42, 'oh iya sorry bang', 1, '2022-12-15 11:45:55', '2022-12-15 11:45:55'),
(103, 'K42-1671105101', 42, 2, 'halooo', 1, '2022-12-15 11:51:41', '2022-12-15 11:52:14'),
(104, 'K42-1671105101', 2, 42, 'test', 1, '2022-12-15 11:52:19', '2022-12-15 11:52:20'),
(105, 'K42-1689146413', 42, 2, 'saya mau custom sticker buat pesawat', 1, '2023-07-12 07:20:13', '2023-07-12 07:20:36'),
(106, 'K42-1689146413', 42, 2, 'halloooooo....', 1, '2023-07-12 07:20:30', '2023-07-12 07:20:36'),
(107, 'K42-1689146413', 2, 42, 'ok silahkan melakukan custom sticker', 1, '2023-07-12 07:21:01', '2023-07-12 07:22:48'),
(108, 'K42-1689146413', 2, 42, 'halloooo', 1, '2023-07-12 07:22:15', '2023-07-12 07:22:48'),
(109, 'K43-1689348804', 43, 2, 'Testing', 1, '2023-07-14 15:33:24', '2023-07-14 15:33:37'),
(110, 'K43-1689348804', 2, 43, 'yess', 1, '2023-07-14 15:33:43', '2023-07-14 15:33:44');

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

--
-- Dumping data for table `confirm_regis`
--

INSERT INTO `confirm_regis` (`id`, `nama`, `telp`, `alamat`, `email`, `password`, `code`, `created_at`, `updated_at`) VALUES
('1672608947', 'tes', '123', 'asd', 'apiptes@mailinator.com', 'eyJpdiI6IlYrYk5uWHNNbm5BNDVrWmxUSEpXOVE9PSIsInZhbHVlIjoidnV0cmN2VGlSSjVPZW5IRVBycGFRUT09IiwibWFjIjoiYjE3YjFlMWJmYzUxODY1MmE2ODNhZWE5OTZhYWRlYTJiODJiNDhhYzlhMjQ0MmU4ZWE1NmI4Y2U1MjgzZWZlZCIsInRhZyI6IiJ9', '1236', '2023-01-01 21:35:47', '2023-01-01 21:35:47'),
('1689161945', 'Apip Tes', '123', 'Bekasi', 'defriant17@gmail.com', 'eyJpdiI6InhaWStET2gxejdQRUdDZ25ZUjdGSVE9PSIsInZhbHVlIjoibWsyYmo1bmdVQVNqUE1Cb3AxYW8yUT09IiwibWFjIjoiMGQxNWE5YWFiMTkyNDIzNjZjOWRiY2VkNzNiMGJmMjEwMmE0MzQwYjZiZDBjMDViZmQ5Mjk0MGViYmQyMzM3MiIsInRhZyI6IiJ9', '4816', '2023-07-12 11:39:05', '2023-07-12 11:39:05'),
('1689162064', 'Apip Tes', '08123123123', 'Jakarta', 'apip@mailinator.com', 'eyJpdiI6IkpOUWFBWTVIVWVJUVJtYUlRcW9FaHc9PSIsInZhbHVlIjoiYUlzL2NzMXZhaFFqcDg4SmkrMkZodz09IiwibWFjIjoiM2FlMzZjMjZmM2M4YTkxZDI0YTEzNTFkZTI2NzlhYWY5OWQ4NzAwODc5MTAxMmY5NTQ4OWUxN2I2N2NmZDk4YiIsInRhZyI6IiJ9', '3914', '2023-07-12 11:41:04', '2023-07-12 11:41:04');

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
  `part_id` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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

--
-- Dumping data for table `custom_tipe`
--

INSERT INTO `custom_tipe` (`id`, `tipe`, `nama`, `created_at`, `updated_at`) VALUES
(6, 'decal_motor', 'Test Update', '2023-07-14 19:34:42', '2023-07-14 19:36:53'),
(7, 'striping_motor', 'Striping motor 1', '2023-07-14 19:40:12', '2023-07-14 19:40:12'),
(8, 'striping_motor', 'Striping motor 2', '2023-07-14 19:40:18', '2023-07-14 19:40:18'),
(9, 'decal_mobil', 'Decal mobil 1', '2023-07-14 19:42:15', '2023-07-14 19:42:15'),
(10, 'decal_mobil', 'Decal mobil 2', '2023-07-14 19:42:21', '2023-07-14 19:42:21');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(20) NOT NULL,
  `barang_id` varchar(50) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` varchar(100) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `komplain`
--

CREATE TABLE `komplain` (
  `id` varchar(15) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `subjek` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `komplain`
--

INSERT INTO `komplain` (`id`, `user_id`, `subjek`, `created_at`, `updated_at`) VALUES
('K42-1671104574', 42, 'Produk kadaluarsa', '2022-12-15 11:42:54', '2022-12-15 11:42:54'),
('K42-1671105101', 42, 'Halo Admin', '2022-12-15 11:51:41', '2022-12-15 11:51:41'),
('K42-1689146413', 42, 'Saya mau custom sticker', '2023-07-12 07:20:13', '2023-07-12 07:20:13'),
('K43-1689348804', 43, 'Tes', '2023-07-14 15:33:24', '2023-07-14 15:33:24');

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

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `user_id`, `jenis`, `notif`, `url`, `is_read`, `created_at`, `updated_at`) VALUES
(251, '42', 'pesanan', 'Pesananmu telah dikonfirmasi oleh admin', '/pesanan/4201119271', 1, '2023-01-11 14:31:24', '2023-07-12 07:22:23'),
(252, '42', 'pesanan', 'Pesananmu telah dikonfirmasi oleh admin', '/pesanan/4207121224', 1, '2023-07-12 07:12:55', '2023-07-12 07:22:23'),
(253, '42', 'pembayaran', 'Bukti pembayaran tidak valid', '/pesanan/4207121224', 1, '2023-07-12 07:14:10', '2023-07-12 07:22:23'),
(254, '42', 'pembayaran', 'Pembayaran telah divalidasi', '/pesanan/4207121224', 1, '2023-07-12 07:15:54', '2023-07-12 07:22:23'),
(255, '42', 'pesanan', 'Pesananmu sedang dikirim ke Bekasi', '/pesanan/4207121224', 1, '2023-07-12 07:17:08', '2023-07-12 07:22:23'),
(256, '42', 'pesanan', 'Pesananmu telah tiba di tujuan, pesanan selesai', '/pesanan/4207121224', 1, '2023-07-12 07:18:31', '2023-07-12 07:22:23');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` varchar(25) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
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

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `user_id`, `nama`, `telp`, `alamat`, `ongkir`, `total`, `status`, `konfirmasi`, `menunggu_validasi`, `validasi`, `pengiriman`, `tiba_di_tujuan`, `bukti_pembayaran`, `alasan_batal`, `created_at`, `updated_at`) VALUES
('4201119271', '42', 'Afif', '12345', 'Bekasi', 20000, 140000, 'konfirmasi', '2023-01-11 21:31:24', NULL, NULL, NULL, NULL, NULL, NULL, '2023-01-11 14:31:05', '2023-01-11 14:31:24'),
('4207121224', '42', 'Afif', '12345', 'Bekasi', 10000, 470000, 'selesai', '2023-07-12 14:12:55', '2023-07-12 14:15:26', '2023-07-12 14:15:54', '2023-07-12 14:17:08', '2023-07-12 14:18:31', '20220323_203143_4207121224.jpg', NULL, '2023-07-12 07:11:58', '2023-07-12 07:18:31');

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
  `gambar` varchar(255) NOT NULL,
  `url` varchar(255) DEFAULT NULL,
  `terjual` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan_barang`
--

INSERT INTO `pesanan_barang` (`id`, `pesanan_id`, `barang_id`, `nama`, `harga`, `jumlah`, `total`, `gambar`, `url`, `terjual`, `created_at`, `updated_at`) VALUES
(155, '4201119271', 'obat-flu-kucing', 'Obat flu kucing', '120000', 1, '120000', 'obat-flu-kucing-1654892009-image-1.png', '/produk/obat-flu-kucing', NULL, '2023-01-11 14:31:05', '2023-01-11 14:31:05'),
(156, '4207121224', 'obat-flu-kucing', 'Obat flu kucing', '120000', 3, '360000', 'obat-flu-kucing-1654892009-image-1.png', '/produk/obat-flu-kucing', 'terjual', '2023-07-12 07:11:58', '2023-07-12 07:15:54'),
(157, '4207121224', 'impostor', 'Impostor', '100000', 1, '100000', 'impostor-1689145720-image-1.png', '/produk/impostor', 'terjual', '2023-07-12 07:11:58', '2023-07-12 07:15:54');

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
(2, 'Admin', '081313131313', 'Bekasi Utara', 'admin@admin.com', NULL, NULL, '$2y$10$8zGFQ2nSWPE07QFBxjQqlul3DuSrTn/sp7.x.k5wcXH6Vwb6XXRda', 'admin', NULL, '2021-05-26 07:51:19', '2021-05-26 07:51:19'),
(42, 'Afif', '12345', 'Bekasi', 'tes@tes.com', NULL, NULL, '$2y$10$2/EO1ebWZNmxifh.wtHP2.Iagytu19tWFo9UFeHK3v/LUTI/yixMq', 'user', NULL, '2022-12-15 11:39:01', '2022-12-15 11:39:01'),
(43, 'Afif Defriant', '12345', 'Bekasi', 'defriant17@gmail.com', NULL, NULL, '$2y$10$ioPC73nlzf.aXaOak56Bw.wq.bZbUqCvIucO/uHPiMt2veW4KLkR.', 'user', NULL, '2023-07-14 15:29:11', '2023-07-14 15:29:11');

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
-- Indexes for table `komplain`
--
ALTER TABLE `komplain`
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
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `custom_bahan`
--
ALTER TABLE `custom_bahan`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `custom_desain`
--
ALTER TABLE `custom_desain`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `custom_laminasi`
--
ALTER TABLE `custom_laminasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `custom_tipe`
--
ALTER TABLE `custom_tipe`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=257;

--
-- AUTO_INCREMENT for table `pesanan_barang`
--
ALTER TABLE `pesanan_barang`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=158;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
