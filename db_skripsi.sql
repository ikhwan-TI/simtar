-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2023 pada 06.05
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skripsi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_mahasiswa`
--

CREATE TABLE `data_mahasiswa` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `gender` enum('L','P') DEFAULT NULL,
  `angkatan` varchar(10) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_mahasiswa`
--

INSERT INTO `data_mahasiswa` (`id`, `user_id`, `gender`, `angkatan`, `tgl_lahir`) VALUES
(1, 7, NULL, NULL, NULL),
(2, 8, NULL, NULL, NULL),
(11, 22, 'L', '2020', '2023-07-03'),
(12, 23, NULL, NULL, NULL),
(14, 28, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_13_071031_create_skripsis_table', 1),
(4, '2023_05_26_183622_create_data_mahasiswa_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `skripsis`
--

CREATE TABLE `skripsis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `mhs_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pembimbing1_id` bigint(20) UNSIGNED NOT NULL,
  `pembimbing2_id` bigint(20) UNSIGNED NOT NULL,
  `tgl_judul` date NOT NULL,
  `tgl_ujian_proposal` datetime DEFAULT NULL,
  `tgl_ujian_hasil` datetime DEFAULT NULL,
  `tgl_ujian_skripsi` datetime DEFAULT NULL,
  `file_proposal` varchar(255) DEFAULT NULL,
  `file_hasil` varchar(255) DEFAULT NULL,
  `file_skripsi` varchar(255) DEFAULT NULL,
  `email_mahasiswa` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `skripsis`
--

INSERT INTO `skripsis` (`id`, `mhs_id`, `judul`, `pembimbing1_id`, `pembimbing2_id`, `tgl_judul`, `tgl_ujian_proposal`, `tgl_ujian_hasil`, `tgl_ujian_skripsi`, `file_proposal`, `file_hasil`, `file_skripsi`, `email_mahasiswa`) VALUES
(1, 8, 'Analisis dan Implementasi Algoritma Pencarian Optimal pada Sistem Pemetaan Lokasi Menggunakan Teknologi GPS', 5, 5, '2022-04-11', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, 9, 'Penerapan Algoritma Data Mining untuk Prediksi Kinerja Mahasiswa pada Sistem E-Learning', 5, 5, '2022-04-11', NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','dosen','mahasiswa') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `email`, `email_verified_at`, `password`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin', 'admin@gmail.com', NULL, '$2y$10$cUKAVayh8LufLoWOd1Qrae8GWFAJ4MfKHYo/cH.ro.z4lypZeY29q', 'admin', NULL, '2023-06-22 21:43:07', '2023-06-22 21:43:07'),
(2, 'Icang, ST., M.Kom.', '199104062018031022', 'ilmifaizan.22@gmail.com', NULL, '$2y$10$LrMoCcXa4kRYcA8/OYdBPO6u5b0cmVHvINkYLNCvrUtamVjxlHjrG', 'dosen', NULL, '2023-06-22 21:43:07', '2023-07-11 02:49:47'),
(3, 'Rizal Adi Saputra, ST., M.Kom.', '199104062018031021', 'rizaladisaputra@uho.ac.id', NULL, '$2y$10$XaevaHAAFk090O3/K8PZUun936VS6bcxYWCVXVfgFxP0yA2gMUdz.', 'dosen', NULL, '2023-06-22 21:43:08', '2023-06-22 21:43:08'),
(4, 'Bambang Pramono, S.Si., MT.', '197104252008011010', 'bambang.pramono@uho.ac.id', NULL, '$2y$10$Uks8YgFEYGxQ1P6RLRmATeen8.sU49SXWXI15cH2GDvJiEMgQeuoO', 'dosen', NULL, '2023-06-22 21:43:08', '2023-06-22 21:43:08'),
(5, 'Asa Hari Wibowo, ST., M.Eng.', '19940817202231014', 'asa.hari@uho.ac.id', NULL, '$2y$10$f6E6mmW7ryI3m42Xi/YSgeNokJetylwoUfxG/UyO.I2vmgTLbpRDq', 'dosen', NULL, '2023-06-22 21:43:08', '2023-06-22 21:43:08'),
(6, 'Jumadil Nangi, S.Kom., MT.', '198702062015041003', 'jumadilnangi@uho.ac.id', NULL, '$2y$10$O7.TDRC2l0XcV6ElaAeRAemEUUL0BdMYBOeYcWmZ4LFDW9FdCT9Lm', 'dosen', NULL, '2023-06-22 21:43:08', '2023-06-22 21:43:08'),
(7, 'Isnawaty, S.Si., MT.', '197611172008122001', 'isnawaty@uho.ac.id', NULL, '$2y$10$hL4ooU76U2G1RtZ4mC44S.Yx4MKi3U2S4kYc9yg1Q7EzwZkf7ZBTe', 'dosen', NULL, '2023-06-22 21:43:08', '2023-06-22 21:43:08'),
(8, 'Muhammad Ikhwan', 'e1e120082', 'ikhwan25.jun@gmail.com', NULL, '$2y$10$iz3tUCXG0Gwhcdqy.aND1ON2lioo4Xpre.5IKO/xYt7Fe4XhmG.fm', 'mahasiswa', NULL, '2023-06-22 21:43:08', '2023-06-25 19:08:05'),
(9, 'Andini Septiani', 'e1e120059', 'andiniseptianiiii02@gmail.com', NULL, '$2y$10$hU2gpXgViYl1kvS4mvimLuZzRnWaVG.mSMJh/V7bp2MYcs7vj4uJm', 'mahasiswa', NULL, '2023-06-22 21:43:08', '2023-07-11 03:01:05'),
(10, 'Ilmi Faizan', 'e1e120011', 'ilmifaizann1112@gmail.com', NULL, '$2y$10$zKEfrrN8j/V030EqQgv0S..VeRjuQJNX8TBHFJSpslQV2xTVjyVFC', 'mahasiswa', NULL, '2023-06-22 21:43:08', '2023-07-11 03:00:55'),
(11, 'Muhamad Amhar Rayadin', 'e1e120037', 'amharrayadin@gmail.com', NULL, '$2y$10$hz.b/ks4qcmyYNRuzO43aub1phlE0Hndh7QSKNE7HQ2OgRH1AbZbe', 'mahasiswa', NULL, '2023-06-22 21:43:08', '2023-06-22 21:43:08'),
(22, 'Deni', 'e1e120026', 'Deni@gmail.com', NULL, '$2y$10$tkT7UunBROK0u55RKuNH.ehAYAAswTjLfSEq//mB6i5C9djyyella', 'mahasiswa', NULL, NULL, NULL),
(23, 'Ishak', 'e1e120042', 'Ishak@gmail.com', NULL, '$2y$10$.TK.ajs/C0p3FkevVuRkPeo49ZdQTL4NjntWOGSvn7Mhx1G/jaXy6', 'mahasiswa', NULL, NULL, NULL),
(28, 'wan', '11111111', 'wan@gmail.com', NULL, '$2y$10$7slARZw9Vlur/6QbZlR00OeBTvV.1tPhDVqAxMDdK7NzVSHH2QUsK', 'mahasiswa', NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_mahasiswa_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `skripsis_mhs_id_foreign` (`mhs_id`),
  ADD KEY `skripsis_pembimbing1_id_foreign` (`pembimbing1_id`),
  ADD KEY `skripsis_pembimbing2_id_foreign` (`pembimbing2_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_mahasiswa`
--
ALTER TABLE `data_mahasiswa`
  ADD CONSTRAINT `data_mahasiswa_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skripsis`
--
ALTER TABLE `skripsis`
  ADD CONSTRAINT `skripsis_mhs_id_foreign` FOREIGN KEY (`mhs_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `skripsis_pembimbing1_id_foreign` FOREIGN KEY (`pembimbing1_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `skripsis_pembimbing2_id_foreign` FOREIGN KEY (`pembimbing2_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
