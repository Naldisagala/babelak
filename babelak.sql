-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2023 at 09:51 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babelak`
--

-- --------------------------------------------------------

--
-- Table structure for table `alamats`
--

CREATE TABLE `alamats` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `provinsi` varchar(255) NOT NULL,
  `kota` varchar(255) NOT NULL,
  `kec` varchar(255) NOT NULL,
  `kode_pos` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `long` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `alamats`
--

INSERT INTO `alamats` (`id`, `id_user`, `provinsi`, `kota`, `kec`, `kode_pos`, `alamat`, `jenis`, `lat`, `long`, `created_at`, `updated_at`) VALUES
(1, '1', 'Sumatera Utara', 'Medan', 'Medan Timur', '23112', 'Depan Simpang Koramil', 'Rumah', '', '', NULL, NULL),
(2, '2', 'Sumatera Utara', 'Binjai', 'Binjai Utara', '23112', 'Disamping Indomaret', 'Kos-Kosan putra', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_seller` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `status_tawar` varchar(255) NOT NULL DEFAULT 'no',
  `status_barang` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `id_seller`, `nama_barang`, `gambar`, `deskripsi`, `harga`, `status_tawar`, `status_barang`, `created_at`, `updated_at`) VALUES
(1, '1', 'Kursi Plastik Merah', 'http://localhost:8000/image/kursimerah.jpg', 'Description: Plastic Chair. Dimensi (P x L x T) : 42 x 46 x 85 Cm. Colour: Red\nKeunggulan :Cocok untuk apapun, ruang makan , ruang belajar dsb Tidak jamur, awet. kursiplastik kursiolymplast kursi101 kursibelajar', 48000, 'no', 'Bekas, 5 bulan Pemakaian', NULL, NULL),
(2, '1', 'Helm Bogo Original', 'http://localhost:8000/image/helm.jpg', 'HELM RETRO GARIS KACA FLAT ANTI GORES. Packing bubble  Chat dulu sebelum checkout untuk menanyakan ketersediaan barang Variasi PET  TIDAK ADA KACANYA', 500000, 'no', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(3, '1', 'Setrika Jhonson', 'http://localhost:8000/image/setrika.jpg', 'Barang bagus berjaya', 150000, 'no', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(4, '2', 'Meja Olympus Red', 'http://localhost:8000/image/mejamerah.jpg', 'Meja lipat polos berbahan multiplex dengan kaki alumunium tebal beralas karet desain simpel dan minimalis. Engsel galvalum custom Made. Bahan pelapis hpl premium anti air.', 65000, 'yes', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(5, '1', 'Teflon Serbaguna', 'http://localhost:8000/image/teflon3.jpg', 'Barang bagus berjaya', 650000, 'yes', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(6, '2', 'Kuali Anti Lengket', 'http://localhost:8000/image/Kuali.jpg', 'Barang bagus berjaya', 500000, 'no', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(7, '1', 'Kursi Indoor', 'http://localhost:8000/image/kursimaroon.jpg', 'Barang bagus berjaya', 150000, 'no', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(8, '1', 'Gas Elpiji 3kg', 'http://localhost:8000/image/gas.jpg', 'Barang bagus berjaya', 65000, 'yes', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(9, '2', 'Galon Air Depot', 'http://localhost:8000/image/galon.jpg', 'Barang bagus berjaya', 650000, 'yes', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(10, '1', 'Cobek Ulekan', 'http://localhost:8000/image/cobek.jpg', 'Barang bagus berjaya', 500000, 'no', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(11, '1', 'Kipas Yamoto ', 'http://localhost:8000/image/kipas.jpg', 'Barang bagus berjaya', 150000, 'no', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(12, '2', 'Bangku bermain', 'http://localhost:8000/image/bangku_kecil.jpeg', 'Barang bagus berjaya', 65000, 'yes', 'Bekas, 1 Hari Pemakaian', NULL, NULL),
(13, '1', 'RiceCooker Omiko', 'http://localhost:8000/image/rice.jpg', 'Barang bagus berjaya', 650000, 'yes', 'Bekas, 1 Hari Pemakaian', NULL, NULL);

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
-- Table structure for table `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `id_tawar` varchar(255) NOT NULL,
  `aktif` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `id_seller` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `id_barang`, `id_user`, `gambar`, `id_tawar`, `aktif`, `created_at`, `updated_at`, `id_seller`) VALUES
(1, '3', '1', '', '', '1', NULL, NULL, 1),
(2, '2', '1', '', '', '1', NULL, NULL, 1),
(3, '5', '1', '', '', '', NULL, NULL, 1);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_03_23_091826_create_alamat_table', 2),
(6, '2023_03_23_092517_create_barang_table', 3),
(7, '2023_03_23_093025_create_seller_table', 3),
(8, '2023_03_23_093229_create_tawar_table', 3),
(9, '2023_03_23_093358_create_keranjang_table', 3),
(10, '2014_10_12_100000_create_password_resets_table', 4),
(11, '2023_05_29_070405_rename_table_barang_to_barang', 4),
(12, '2023_05_29_070624_rename_table_alamat_to_alamats', 4),
(13, '2023_05_29_070722_rename_table_keranjang_to_keranjangs', 4),
(14, '2023_05_29_070808_rename_table_seller_to_sellers', 4),
(15, '2023_05_29_070858_rename_table_tawar_to_tawars', 4),
(16, '2023_06_30_080028_add_id_seller_to_keranjangs', 4),
(17, '2023_07_02_070719_add_username_and_role_to_users', 5),
(18, '2023_07_02_093802_create_transaksis_table', 5);

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
-- Table structure for table `sellers`
--

CREATE TABLE `sellers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `nama_toko` varchar(255) NOT NULL,
  `saldo` int(11) NOT NULL,
  `rekening` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sellers`
--

INSERT INTO `sellers` (`id`, `id_user`, `nama_toko`, `saldo`, `rekening`, `created_at`, `updated_at`) VALUES
(1, '1', 'Putra Ada Jaya', 0, '12345', NULL, NULL),
(2, '2', 'Sinar Barokah', 0, '12345', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tawars`
--

CREATE TABLE `tawars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `id_seller` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `harga_tawar` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tawars`
--

INSERT INTO `tawars` (`id`, `id_user`, `id_seller`, `id_barang`, `harga_tawar`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '13', 45000, 'waiting', '2023-07-01 00:45:01', '2023-07-01 00:45:01'),
(2, '1', '1', '8', 55250, 'ditolak', '2023-07-01 00:49:12', '2023-07-01 00:49:12'),
(3, '1', '1', '8', 58500, 'ditolak', '2023-07-01 00:50:57', '2023-07-01 00:50:57'),
(4, '1', '2', '4', 55250, 'waiting', '2023-07-02 20:30:08', '2023-07-02 20:30:08'),
(5, '1', '2', '4', 50000, 'waiting', '2023-07-02 20:30:47', '2023-07-02 20:30:47'),
(6, '1', '2', '4', 30000, 'diterima', '2023-07-02 22:05:10', '2023-07-02 22:05:10');

-- --------------------------------------------------------

--
-- Table structure for table `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_cart` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED NOT NULL,
  `code_payment` varchar(255) NOT NULL,
  `number_payment` varchar(255) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
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

INSERT INTO `users` (`id`, `name`, `username`, `role`, `hp`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Putra', '', '', '', 'putra@mail.com', NULL, 'e10adc3949ba59abbe56e057f20f883e', NULL, '2023-07-01 07:35:05', '2023-07-01 07:35:05'),
(2, 'naldi', 'naldis', 'user', '08123456789', 'sagala@gmail.com', NULL, '$2y$10$JyEYEd6KWK2UJ6Ci3iNzZOclbd/pKZLspvDy8GpLiqAvuRUPy43Jm', NULL, '2023-07-02 09:12:32', '2023-07-02 09:12:32');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alamats`
--
ALTER TABLE `alamats`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `keranjangs`
--
ALTER TABLE `keranjangs`
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
-- Indexes for table `sellers`
--
ALTER TABLE `sellers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tawars`
--
ALTER TABLE `tawars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksis`
--
ALTER TABLE `transaksis`
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
-- AUTO_INCREMENT for table `alamats`
--
ALTER TABLE `alamats`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sellers`
--
ALTER TABLE `sellers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tawars`
--
ALTER TABLE `tawars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
