-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Apr 2025 pada 06.32
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
-- Database: `db_fitri_store`
--

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
-- Struktur dari tabel `keranjangs`
--

CREATE TABLE `keranjangs` (
  `id` bigint UNSIGNED NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `jumlah_pesanan` int NOT NULL,
  `uk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `keranjangs`
--

INSERT INTO `keranjangs` (`id`, `user_id`, `title`, `foto_produk`, `sub_title`, `harga`, `jumlah_pesanan`, `uk`, `created_at`, `updated_at`) VALUES
(2, 8, 'Kaos Paradise', 'baju13.jpg', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 240000, 4, 'XXL', '2025-04-14 19:38:01', '2025-04-14 19:38:01'),
(3, 8, 'Kaos Guru 27 Jam', 'baju3.jpg', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, 1, 'S', '2025-04-14 19:42:53', '2025-04-14 19:42:53');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_04_13_133630_create_produks_table', 1),
(6, '2025_04_13_133649_create_keranjangs_table', 1),
(7, '2025_04_13_133657_create_pesanans_table', 1);

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanans`
--

CREATE TABLE `pesanans` (
  `id` bigint UNSIGNED NOT NULL,
  `nama_lengkap` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `alamat` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_hp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bukti_pembayaran` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pesan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estimasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanans`
--

INSERT INTO `pesanans` (`id`, `nama_lengkap`, `user_id`, `alamat`, `no_hp`, `bukti_pembayaran`, `tanggal_pesan`, `estimasi`, `status`, `uk`, `title`, `foto_produk`, `jumlah_pesanan`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'Bintang Agustiano', 4, 'Jalan Tanjung Duren Raya No. 1, RT 003/RW 004, Kelurahan Tanjung Duren Utara, Kecamatan Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta, 11470, Indonesia', '087864802104', '1744632027_download.jpeg', '2025-04-14', '2025-04-19 00:00:00', 'Pesanan diterima', 'XXL', 'Kaos Cak Lecak', 'baju7-remove.png', '2', 120000, '2025-04-14 05:00:28', '2025-04-14 05:18:03'),
(2, 'Bintang Agustiano', 4, 'Jalan Tanjung Duren Raya No. 1, RT 003/RW 004, Kelurahan Tanjung Duren Utara, Kecamatan Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta, 11470, Indonesia', '087864802104', '1744632064_download.jpeg', '2025-04-14', '-', 'Pesanan ditolak', 'XXL', 'Kaos DeKaVe', 'baju4-remove.png', '4', 240000, '2025-04-14 05:01:04', '2025-04-14 05:18:07'),
(3, 'Hilmy Yanti', 7, 'Jalan Tanjung Duren Raya No. 1, RT 003/RW 004, Kelurahan Tanjung Duren Utara, Kecamatan Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta, 11470, Indonesia', '087864802104', '1744632408_download.jpeg', '2025-04-14', '2025-04-19 00:00:00', 'Pesanan diterima', 'XXL', 'Kaos Paradise', 'baju13.jpg', '8', 480000, '2025-04-14 05:06:48', '2025-04-14 05:18:13'),
(4, 'Radhit', 8, 'Jalan Tanjung Duren Raya No. 1, RT 003/RW 004, Kelurahan Tanjung Duren Utara, Kecamatan Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta, 11470, Indonesia', '087864802104', '1744684708_download.jpeg', '2025-04-15', '2025-04-20 00:00:00', 'Pesanan diterima', 'XXL', 'Kaos Paradise', 'baju13.jpg', '4', 240000, '2025-04-14 19:38:28', '2025-04-14 19:39:51'),
(5, 'Yusuf', 9, 'Jalan Tanjung Duren Raya No. 1, RT 003/RW 004, Kelurahan Tanjung Duren Utara, Kecamatan Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta, 11470, Indonesia', '087864802104', '1744957743_download.jpeg', '2025-04-18', '2025-04-23 00:00:00', 'Pesanan diterima', 'XXL', 'Kaos Beda Bos', 'baju2-remove.png', '2', 120000, '2025-04-17 23:29:03', '2025-04-17 23:30:18'),
(6, 'Bintang Agustiano', 9, 'Jalan Tanjung Duren Raya No. 1, RT 003/RW 004, Kelurahan Tanjung Duren Utara, Kecamatan Grogol Petamburan, Kota Jakarta Barat, DKI Jakarta, 11470, Indonesia', '087864802104', '1744957772_download.jpeg', '2025-04-18', '2025-04-23 00:00:00', 'Pesanan diterima', 'S', 'Kaos Guru 27 Jam', 'baju3.jpg', '4', 200000, '2025-04-17 23:29:32', '2025-04-17 23:30:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produks`
--

CREATE TABLE `produks` (
  `id` bigint UNSIGNED NOT NULL,
  `foto_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `motif` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `produks`
--

INSERT INTO `produks` (`id`, `foto_produk`, `motif`, `title`, `sub_title`, `harga`, `created_at`, `updated_at`) VALUES
(1, 'baju1.jpg', 'Motif Quote Madura', 'Kaos Ngakan Ateh', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(2, 'baju2-remove.png', 'Motif Kaos Costum', 'Kaos Beda Bos', 'Tampil beda dengan sentuhan lokal yang penuh makna!\r\n', 50000, NULL, NULL),
(3, 'baju3.jpg', 'Motif Kaos Costum', 'Kaos Guru 27 Jam', 'Tampil beda dengan sentuhan lokal yang penuh makna!\r\n', 50000, NULL, NULL),
(4, 'baju4-remove.png', 'Motif Kaos Costum', 'Kaos DeKaVe', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(5, 'baju5-remove.png', 'Motif Kaos Costum', 'Kaos Merdeka Belajar', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(6, 'baju6.jpg', 'Motif Quote Madura', 'Kaos Tretan Dibik', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(7, 'baju7-remove.png', 'Motif Quote Madura', 'Kaos Cak Lecak', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(8, 'baju8.jpg', 'Motif Quote Madura', 'Kaos Je\'akal Pokal', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(9, 'baju9.jpg', 'Motif Kaos Bondowoso', 'Kaos Bondowoso Sae', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(10, 'baju10-remove.png', 'Motif Kaos Bondowoso', 'Kaos Buana Kerta', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(11, 'baju11.jpg', 'Motif Kaos Bondowoso', 'Kaos Gunung Ijen', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(12, 'baju12.jpg', 'Motif Kaos Bondowoso', 'Kaos Secangkir Kopi', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL),
(13, 'baju13.jpg', 'Motif Kaos Bondowoso', 'Kaos Paradise', 'Tampil beda dengan sentuhan lokal yang penuh makna!', 50000, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `role`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Fitri Yunita', '$2y$10$ATmB.FTwyU5JffUlLxKg8.J/ft4K2ZlBBoCdPBWVr0o1APMqsVLzm', NULL, NULL, '2025-04-17 23:30:42'),
(4, 'user', 'Bintang Agustiano', '$2y$10$FgV3vnRfrbJs3pcgjQefnO4Xh67Wv6n6Npb4WZIaSpvNHVD6XhwBO', NULL, '2025-04-13 09:48:20', '2025-04-13 09:48:20'),
(7, 'user', 'Hilmy Yanti', '$2y$10$CyBtC8PqYo/m45d0ue/N8uuk3PFh3eQYqRVeXSJk05awSvjaoGxwK', NULL, '2025-04-14 05:06:12', '2025-04-14 05:06:12'),
(8, 'user', 'Radhit', '$2y$10$xtWTYcazqI0eXWDUgy5l8.89GNhMPV6N8BdMxz8bEf1MUeFcAvkMe', NULL, '2025-04-14 19:37:21', '2025-04-14 19:37:21'),
(9, 'user', 'Yusuf', '$2y$10$KohYynm6QN8eNL.JI3EEMer3L0dKg23htyeAqGsyrggh.sJfBdBcu', NULL, '2025-04-17 23:28:27', '2025-04-17 23:28:27');

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
-- Indeks untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `keranjangs_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `pesanans_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `produks`
--
ALTER TABLE `produks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `produks`
--
ALTER TABLE `produks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjangs`
--
ALTER TABLE `keranjangs`
  ADD CONSTRAINT `keranjangs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pesanans`
--
ALTER TABLE `pesanans`
  ADD CONSTRAINT `pesanans_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
