-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 01 Mar 2023 pada 11.27
-- Versi server: 8.0.30
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bubble`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `acara`
--

CREATE TABLE `acara` (
  `id` bigint UNSIGNED NOT NULL,
  `id_booking` bigint UNSIGNED DEFAULT NULL,
  `tanggal_acara` date DEFAULT NULL,
  `nama_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_pengantin_pria` date DEFAULT NULL,
  `pengantin_pria_anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_saudara_pengantin_pria_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_saudara_pengantin_pria_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_pengantin_pria` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tempat_lahir_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_lahir_pengantin_wanita` date DEFAULT NULL,
  `pengantin_wanita_anak_ke` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ayah_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_ibu_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_saudara_pengantin_wanita_1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama_saudara_pengantin_wanita_2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alamat_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telepon_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pekerjaan_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram_pengantin_wanita` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'super_admin@email.com', NULL, '$2y$10$Dg2kwXXgb0pGTh3b1vRjp.qxlTQjlFOf/wSNp9pNlDmRt1dBEDhoS', 'AIw0l6qv9pm6QUlu3fx3UEWIDL62opAJSTCJspP5zBMRdhPj3WvL4TCJoR9v', '2023-02-05 10:34:56', '2023-02-05 10:34:56'),
(2, 'Admin', 'admin@email.com', NULL, '$2y$10$VQMoE68utNAWNMKKsolqoOz/g/Za5Ct8fCpIa5xh3EaYltcIidD/S', NULL, '2023-02-05 10:34:56', '2023-02-05 10:34:56'),
(3, 'Manager', 'manager@email.com', NULL, '$2y$10$wz3Aav.nJmNAuM9jN3pBf.5EwRMiAnLbdepo72Z0YtqnFY8XF/5.i', NULL, '2023-02-05 10:34:56', '2023-02-05 10:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` bigint UNSIGNED NOT NULL,
  `no_booking` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_user` bigint UNSIGNED DEFAULT NULL,
  `id_paket` bigint UNSIGNED DEFAULT NULL,
  `status` int DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` bigint UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `image`, `created_at`, `updated_at`) VALUES
(1, 'http://localhost/bubble/public/uploads/ee8a8ca0-d9ca-4976-ac32-0e4af31d9d90.jpg', '2023-02-06 05:14:59', '2023-02-06 05:14:59'),
(2, 'http://localhost/bubble/public/uploads/6d0681dc-b1d3-47e2-8369-6821663c9f6a.jpg', '2023-02-06 05:15:07', '2023-02-06 05:15:07'),
(3, 'http://localhost/bubble/public/uploads/8a8c17a9-48c4-496c-90c3-8a1b0b916532.jpg', '2023-02-06 05:15:13', '2023-02-06 05:15:13'),
(4, 'http://localhost/bubble/public/uploads/b61742b4-f3a7-4fef-b7b1-50dda8b96c50.jpg', '2023-02-06 05:15:22', '2023-02-06 05:15:22'),
(5, 'http://localhost/bubble/public/uploads/55fa7b50-b2b0-4305-91e2-23434abcd571.jpg', '2023-02-06 05:15:32', '2023-02-06 05:15:32'),
(6, 'http://localhost/bubble/public/uploads/301576b4-388f-4d7a-8988-e2629726aced.jpg', '2023-02-06 05:15:40', '2023-02-06 05:15:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_admin_table', 1),
(2, '2014_10_12_000000_create_user_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_28_130632_create_permission_tables', 1),
(7, '2023_01_28_201234_create_paket_table', 1),
(8, '2023_01_28_201312_create_galeri_table', 1),
(9, '2023_02_05_171321_create_booking_table', 1),
(10, '2023_02_05_171555_create_acara_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\Admin', 1),
(2, 'App\\Models\\Admin', 2),
(3, 'App\\Models\\Admin', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id` bigint UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `diskon` double DEFAULT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id`, `nama`, `harga`, `diskon`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'The Day Only', 7000000, 20, '<ul><li><strong>3 Profesional Crew</strong></li><li><strong>urasi Kerja 3 Jam Acara</strong></li><li><strong>Organisir Saat Hari H</strong></li></ul>', '2023-02-06 05:18:34', '2023-02-06 05:22:37'),
(2, 'The Organizer', 13000000, 20, '<ul><li><strong>6 Profesional Crew</strong></li><li><strong>Durasi Kerja 4 Jam Acara</strong></li><li><strong>Membuat Rundown Acara</strong></li><li><strong>Mengatur Dan Mendampingi Technical Meeting Keluarga</strong></li><li><strong>Mengatur Dan Mendampingi Technical Meeting Vendor</strong></li><li><strong>Mempersiapkan Text-Text Kebutuhan Acara</strong></li><li><strong>Mempersiapkan Signage - Signage Kebutuhan Acara</strong></li></ul>', '2023-02-06 05:20:18', '2023-02-06 05:20:18'),
(3, 'The Planner', 37000000, 20, '<ul><li><strong>Membuat Konsep Acara, Timeline Kerja, Detail Checklist &amp; Budgeting Acara</strong></li><li><strong>Memberikan Laporan Progres Acara Setiap Minggu</strong></li><li><strong>Dealing Dan Negosiasi Kepada Vendor</strong></li><li><strong>Mendampingi Calon Pengantin Saat Mempersiapkan Kebutuhan Acara</strong></li><li><strong>Membuat Laporan Detail Akhir Acara</strong></li><li><strong>6 Profesional Crew</strong></li><li><strong>Durasi Kerja 4 Jam Acara</strong></li><li><strong>Membuat Rundown Acara</strong></li><li><strong>Mengatur Dan Mendampingi Technical Meeting Keluarga</strong></li><li><strong>Mengatur Dan Mendampingi Technical Meeting Vendor</strong></li><li><strong>Mempersiapkan Text-Text Kebutuhan Acara</strong></li><li><strong>Mempersiapkan Signage - Signage Kebutuhan Acara</strong></li></ul>', '2023-02-06 05:22:16', '2023-02-06 05:22:16');

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin', '2023-02-05 10:34:56', '2023-02-05 10:34:56'),
(2, 'Admin', 'admin', '2023-02-05 10:34:56', '2023-02-05 10:34:56'),
(3, 'Manager', 'admin', '2023-02-05 10:34:56', '2023-02-05 10:34:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint UNSIGNED NOT NULL,
  `role_id` bigint UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD PRIMARY KEY (`id`),
  ADD KEY `acara_id_booking_index` (`id_booking`);

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admin_email_unique` (`email`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_no_booking_unique` (`no_booking`),
  ADD KEY `booking_id_user_index` (`id_user`),
  ADD KEY `booking_id_paket_index` (`id_paket`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indeks untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `acara`
--
ALTER TABLE `acara`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `acara`
--
ALTER TABLE `acara`
  ADD CONSTRAINT `acara_id_booking_foreign` FOREIGN KEY (`id_booking`) REFERENCES `booking` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_id_paket_foreign` FOREIGN KEY (`id_paket`) REFERENCES `paket` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `booking_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
