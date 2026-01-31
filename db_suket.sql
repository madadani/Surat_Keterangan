-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 31, 2026 at 03:43 AM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_suket`
--

-- --------------------------------------------------------

--
-- Table structure for table `dokters`
--

CREATE TABLE `dokters` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_dokter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spesialis` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dokters`
--

INSERT INTO `dokters` (`id`, `nama_dokter`, `sip`, `nip`, `spesialis`, `jabatan`, `created_at`, `updated_at`) VALUES
(1, 'dr. WIYOSA WALUYAN RUSDI, Sp.PD', NULL, '19870211 201503 1 002', 'Penyakit Dalam', NULL, '2026-01-12 20:30:13', '2026-01-27 20:23:27'),
(2, 'dr.Sigit Bayudono, Sp.OT', NULL, '3314.57274/DS/III/449.1/19/IV/2023', 'Orthopedi', NULL, '2026-01-14 20:51:46', '2026-01-14 20:51:46'),
(3, 'dr.Seno Aji Saputro Sp.T.H.T.B.K.L.', NULL, '3314.57274/DS/I/449.1/56/VIII/2022', 'THT', NULL, '2026-01-14 20:54:14', '2026-01-14 20:54:14'),
(4, 'dr. LISYATI KHOIRIYAH', NULL, '196909252007012008', 'Psikiatri', NULL, '2026-01-14 20:55:47', '2026-01-14 21:18:16'),
(5, 'dr. Mayasari Ayu Hendrawati, MM', NULL, '198105172010012026', 'Manajemen', 'Kepala Bidang Pelayanan RSUD dr. Soeratno Gemolong Kabupaten Sragen', '2026-01-14 21:10:17', '2026-01-14 21:10:17'),
(6, 'dr. YUSA AMIN NURHUDA, Sp. JP', NULL, '11111109876543212', 'Jantung', NULL, '2026-01-18 21:11:53', '2026-01-18 21:11:53'),
(8, 'dr. WIDAYANTO, Sp.P, M.Kes', NULL, '1111110987654324637', 'Paru', NULL, '2026-01-18 21:19:47', '2026-01-18 21:19:47'),
(9, 'dr. DANANG YOGA WIGUNA, Sp.M, M.ked', NULL, '2222098765443567', 'Mata', NULL, '2026-01-18 21:23:10', '2026-01-18 21:23:10'),
(10, 'dr. DINA LISTYOWATI, Sp.Ort', '08734567893247', '33330987645667', 'Gigi', NULL, '2026-01-18 21:24:06', '2026-01-30 20:05:25'),
(11, 'drg. BETY HERLINAWATI', NULL, '444444098762546', 'Gigi', NULL, '2026-01-18 21:24:32', '2026-01-18 21:24:32'),
(12, 'drg. ITA ARAFATIS SYARIFAH', NULL, '5555555555555557653', 'Gigi', NULL, '2026-01-18 21:25:01', '2026-01-18 21:25:01'),
(13, 'dr. WIYOSA WALUYAN RUSDI, Sp.PD', NULL, '6666666666666353242', 'Penyakit Dalam', NULL, '2026-01-18 21:25:33', '2026-01-18 21:25:33'),
(14, 'dr. ANITA WIJAYANTI, Sp.PD, M.Kes', NULL, '56453243178674635', 'Penyakit Dalam', NULL, '2026-01-18 21:26:01', '2026-01-18 21:26:01'),
(15, 'dr. SRI WAHYUNI, Sp. KJ', NULL, '57645427365323523', 'Psikiatri', NULL, '2026-01-18 21:26:34', '2026-01-18 21:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2026_01_13_000001_create_pendaftar_table', 1),
(6, '2026_01_13_000002_create_dokters_table', 1),
(7, '2026_01_13_000003_create_surat_keterangan_table', 1),
(8, '2026_01_13_042505_add_physical_stats_to_pendaftar_table', 2),
(9, '2026_01_13_043238_add_details_to_surat_keterangan_table', 3),
(10, '2026_01_13_043655_add_pekerjaan_to_pendaftar_table', 4),
(11, '2026_01_13_065428_add_tipe_berkas_to_surat_keterangan_table', 5),
(12, '2026_01_13_072158_add_extra_fields_to_surat_keterangan_table', 6),
(13, '2026_01_13_072635_add_pendidikan_to_pendaftar_table', 7),
(14, '2026_01_13_151944_update_status_enum_in_pendaftar_table', 8),
(15, '2026_01_15_033037_add_specialist_fields_to_surat_keterangan_table', 9),
(16, '2026_01_15_040920_add_jabatan_to_dokters_table', 10),
(17, '2026_01_19_041608_make_nip_nullable_in_dokters_table', 11),
(18, '2026_01_19_054938_add_mcu_fields_to_surat_keterangan_table', 12),
(19, '2026_01_19_055313_add_perusahaan_to_pendaftar_table', 13),
(20, '2026_01_26_072910_add_no_rm_to_pendaftar_table', 14),
(21, '2026_01_28_071347_change_hasil_pemeriksaan_to_text_in_surat_keterangan_table', 15),
(22, '2026_01_29_152443_create_prices_table', 15),
(23, '2026_01_31_023951_add_sip_to_dokters_table', 16);

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
-- Table structure for table `pendaftar`
--

CREATE TABLE `pendaftar` (
  `id` bigint UNSIGNED NOT NULL,
  `no_registrasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_rm` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_lengkap` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tinggi_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `berat_badan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keperluan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_test` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `prices`
--

CREATE TABLE `prices` (
  `id` bigint UNSIGNED NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prices`
--

INSERT INTO `prices` (`id`, `test_name`, `price`, `created_at`, `updated_at`) VALUES
(2, 'Kesehatan Jiwa', 20000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(3, 'Bebas Narkoba', 20000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(4, 'THT', 30000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(5, 'Mata', 30000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(6, 'Orthopedi', 30000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(7, 'Paru', 30000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(8, 'Dalam', 40000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(9, 'Gigi', 40000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(10, 'Jantung', 40000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(11, 'MCU', 50000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(12, 'TKHI', 50000, '2026-01-29 08:25:20', '2026-01-29 22:48:03'),
(19, 'Kesehatan', 15000, '2026-01-29 21:03:18', '2026-01-29 22:48:03');

-- --------------------------------------------------------

--
-- Table structure for table `surat_keterangan`
--

CREATE TABLE `surat_keterangan` (
  `id` bigint UNSIGNED NOT NULL,
  `tipe_berkas` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendaftar_id` bigint UNSIGNED NOT NULL,
  `pekerjaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pada_tanggal` date DEFAULT NULL,
  `tinggi_badan` int UNSIGNED DEFAULT NULL,
  `berat_badan` int UNSIGNED DEFAULT NULL,
  `tensi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nadi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `suhu` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `respirasi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `buta_warna` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keperluan` text COLLATE utf8mb4_unicode_ci,
  `nomor_surat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hasil_pemeriksaan` text COLLATE utf8mb4_unicode_ci,
  `morphine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Negatif',
  `canabinoid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Negatif',
  `amphetamine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Negatif',
  `benzodiazepine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Negatif',
  `metamfetamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Negatif',
  `cocaine` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Negatif',
  `saran` text COLLATE utf8mb4_unicode_ci,
  `kesimpulan` text COLLATE utf8mb4_unicode_ci,
  `visus_kanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `visus_kiri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `segmen_anterior` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `golongan_darah` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tes_bisik` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telinga_kiri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telinga_kanan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `hidung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tenggorokan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tindakan_gigi` text COLLATE utf8mb4_unicode_ci,
  `kontrol_ulang` date DEFAULT NULL,
  `dokter_id` bigint UNSIGNED NOT NULL,
  `tanggal_cetak` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `perusahaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `no_lab` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mcu_data` json DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'admin', NULL, '$2y$10$UjSP32WX4mAdqGF9AKCG9uqGAHg97FbvBfmpkCTC93Xu647WI1Yqm', NULL, '2026-01-12 20:30:13', '2026-01-12 20:30:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dokters`
--
ALTER TABLE `dokters`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dokters_nip_unique` (`nip`);

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
-- Indexes for table `pendaftar`
--
ALTER TABLE `pendaftar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pendaftar_no_registrasi_unique` (`no_registrasi`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `prices`
--
ALTER TABLE `prices`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `prices_test_name_unique` (`test_name`);

--
-- Indexes for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `surat_keterangan_pendaftar_id_foreign` (`pendaftar_id`),
  ADD KEY `surat_keterangan_dokter_id_foreign` (`dokter_id`);

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
-- AUTO_INCREMENT for table `dokters`
--
ALTER TABLE `dokters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pendaftar`
--
ALTER TABLE `pendaftar`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prices`
--
ALTER TABLE `prices`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `surat_keterangan`
--
ALTER TABLE `surat_keterangan`
  ADD CONSTRAINT `surat_keterangan_dokter_id_foreign` FOREIGN KEY (`dokter_id`) REFERENCES `dokters` (`id`) ON DELETE RESTRICT,
  ADD CONSTRAINT `surat_keterangan_pendaftar_id_foreign` FOREIGN KEY (`pendaftar_id`) REFERENCES `pendaftar` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
