-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Feb 2024 pada 08.51
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_fintechficky`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `kategori` enum('makanan','minuman','peralatan') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menus`
--

INSERT INTO `menus` (`id`, `image`, `name`, `harga`, `stok`, `kategori`, `created_at`, `updated_at`) VALUES
(1, 'xxw0MSPWMgoue1BoxU49EPUqYqBUzq722tnUQCoO.jpg', 'TISU PASEO', 10000, 46, 'peralatan', '2024-02-05 00:23:34', '2024-02-05 03:27:45'),
(2, '8su7jKntUyW8WKj4BU8NiDzqhYVGSANA3a7nbXCC.jpg', 'PENSIL 2B', 5000, 95, 'peralatan', '2024-02-05 03:25:32', '2024-02-05 03:27:45'),
(3, 'P1Muc2KBWhanlYyJXePC7SZj3w3zawfyz1ieV2y6.jpg', 'BENG-BENG', 3000, 100, 'makanan', '2024-02-05 19:24:06', '2024-02-05 19:24:06'),
(4, '6O7V6ihlgPgZ7SiKqExDmjQgVOUX0bBJjrDYeX0C.jpg', 'YAKULT', 2500, 50, 'makanan', '2024-02-05 19:24:30', '2024-02-05 20:17:53'),
(5, 'Wxw9SnADwnRz0yMtuGd9fsruVqhNdeZLNxtr9rRD.jpg', 'POPMIE', 7000, 48, 'makanan', '2024-02-05 20:39:40', '2024-02-05 20:51:29'),
(6, 'YTEAZb9TmCa7pzSUsD8qYPRmP6hABkZ0R2ltmCfk.jpg', 'TEH PUCUK', 3000, 50, 'makanan', '2024-02-05 20:46:02', '2024-02-05 20:46:02'),
(7, 'FzdnB49p2c8Pc3Qqe1mD1jkvjrhAnsDa0et30s0P.jpg', 'NABATI KEJU', 3000, 100, 'makanan', '2024-02-05 20:46:20', '2024-02-05 20:46:20'),
(8, 'OcCPMO6vWnMkYURynOhPT7t3zRXDpmP908xRSyfL.jpg', 'NABATI CHARCOAL', 3500, 98, 'makanan', '2024-02-05 20:46:43', '2024-02-05 21:13:40'),
(9, 'TUSwqNLphq0CPzsofT7QrLwm63c2Q9s34MbKjSUZ.jpg', 'RISOL MAYO', 2500, 100, 'makanan', '2024-02-05 20:47:03', '2024-02-06 00:23:49'),
(11, '02ZcJG18RCDW8Pgw5au8INv9s7S0cKkQ4U0geMHh.jpg', 'VIT AIR MINERAL', 3000, 100, 'makanan', '2024-02-05 21:02:48', '2024-02-05 21:02:48'),
(12, 'IVnY7n4O5hyINiJ2rbZp0k7oNeybFzH1gWNfkuJH.jpg', 'TISU PASEO', 2500, 100, 'makanan', '2024-02-05 21:15:52', '2024-02-05 21:16:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_02_05_031540_create_menus_table', 2),
(8, '2024_02_05_031549_create_pesanans_table', 3),
(9, '2024_02_05_031610_create_transaksis_table', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `menu_id`, `user_id`, `quantity`, `total_price`, `invoice`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 2, '20000.00', 'TRS#1_1707127378', 'disetujui', '2024-02-05 03:02:58', '2024-02-05 03:17:31'),
(3, 1, 1, 2, '20000.00', 'TRS#1_1707128613', 'disetujui', '2024-02-05 03:23:33', '2024-02-05 03:23:35'),
(5, 1, 1, 2, '20000.00', 'TRS#1_1707128829', 'disetujui', '2024-02-05 03:27:11', '2024-02-05 03:27:45'),
(6, 2, 1, 5, '25000.00', 'TRS#1_1707128829', 'disetujui', '2024-02-05 03:27:40', '2024-02-05 03:27:45'),
(7, 9, 1, 5, '25000.00', 'TRS#1_1707191475', 'disetujui', '2024-02-05 20:51:15', '2024-02-05 20:51:29'),
(8, 5, 1, 2, '14000.00', 'TRS#1_1707191475', 'disetujui', '2024-02-05 20:51:22', '2024-02-05 20:51:29'),
(9, 9, 1, 5, '25000.00', 'TRS#1_1707192804', 'disetujui', '2024-02-05 21:13:24', '2024-02-05 21:13:40'),
(10, 8, 1, 2, '7000.00', 'TRS#1_1707192804', 'disetujui', '2024-02-05 21:13:31', '2024-02-05 21:13:40'),
(15, 9, 1, 40, '200000.00', 'TRS#1_1707204170', 'disetujui', '2024-02-06 00:22:50', '2024-02-06 00:22:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksis`
--

CREATE TABLE `transaksis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `type` enum('topup','withdraw') COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Menunggu Persetujuan',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksis`
--

INSERT INTO `transaksis` (`id`, `users_id`, `amount`, `type`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '100000.00', 'topup', 'Disetujui', '2024-02-05 03:01:42', '2024-02-05 03:01:59'),
(2, 1, '200000.00', 'topup', 'Disetujui', '2024-02-05 18:00:32', '2024-02-05 18:24:38'),
(3, 1, '15000.00', 'withdraw', 'Disetujui', '2024-02-05 18:00:45', '2024-02-05 18:24:39'),
(4, 1, '10000.00', 'topup', 'Disetujui', '2024-02-05 21:12:37', '2024-02-05 21:12:56'),
(5, 1, '15000.00', 'withdraw', 'Disetujui', '2024-02-05 21:13:56', '2024-02-05 21:14:10'),
(6, 1, '100000.00', 'withdraw', 'Disetujui', '2024-02-05 23:39:31', '2024-02-05 23:39:48'),
(7, 1, '280000.00', 'topup', 'Disetujui', '2024-02-06 00:13:20', '2024-02-06 00:13:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT 0.00,
  `role` enum('bank','kantin','user') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'user',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `no_hp`, `balance`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ficky sandika', 'user@gmail.com', '$2y$12$o8MgcnU9xRHl0UZWKgizRuZz6b3bENPUQDqGZFkqrOFMx7FvR.nqK', '089787', '104000.00', 'user', NULL, '2024-02-04 20:03:10', '2024-02-06 00:22:55'),
(2, 'bank', 'bank@gmail.com', '$2y$12$olhLrVkjeXIbgKXQ7nMes.NQPmR5avbrD9zP9S2Ea3YqSsD36Yw26', '089899898', '0.00', 'bank', NULL, '2024-02-04 20:07:26', '2024-02-04 20:07:26'),
(3, 'kantin', 'kantin@gmail.com', '$2y$12$vGnkHr1f9ZRQqBOFFmhcMOafmyrOOX45qeKRJ3wg4O.kYC4lODUFm', '08977878', '0.00', 'kantin', NULL, '2024-02-04 20:07:49', '2024-02-04 20:07:49');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pesanans_menu_id_foreign` (`menu_id`),
  ADD KEY `pesanans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksis_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_fullname_unique` (`fullname`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `transaksis`
--
ALTER TABLE `transaksis`
  ADD CONSTRAINT `transaksis_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
