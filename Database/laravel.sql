-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220420.d842c89d5c
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2022 pada 06.59
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel`
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
-- Struktur dari tabel `feedback`
--

CREATE TABLE `feedback` (
  `id_feedback` bigint(20) UNSIGNED NOT NULL,
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `isi_feedback` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `feedback`
--

INSERT INTO `feedback` (`id_feedback`, `id_pesanan`, `isi_feedback`, `created_at`, `updated_at`) VALUES
(4, 1, 'tes', '2022-07-18 23:21:17', '2022-07-18 23:21:17'),
(5, 1, 'tes 34', '2022-07-18 23:24:13', '2022-07-18 23:24:13'),
(6, 1, 'fffer', '2022-07-18 23:31:41', '2022-07-18 23:31:41'),
(7, 1, 'ddsdssdf', '2022-07-19 00:58:49', '2022-07-19 00:58:49'),
(8, 1, 'ddsdssdf', '2022-07-19 01:00:38', '2022-07-19 01:00:38'),
(9, 1, 'ddsdssdf', '2022-07-19 01:02:15', '2022-07-19 01:02:15'),
(10, 1, 'ddsdssdf', '2022-07-19 01:02:32', '2022-07-19 01:02:32'),
(11, 1, 'ddsdssdf', '2022-07-19 01:06:15', '2022-07-19 01:06:15'),
(12, 1, 'ddsdssdf', '2022-07-19 01:06:21', '2022-07-19 01:06:21'),
(13, 1, 'tes aja', '2022-07-19 01:06:43', '2022-07-19 01:06:43'),
(14, 1, '12', '2022-07-19 21:39:09', '2022-07-19 21:39:09'),
(15, 1, 's', '2022-07-19 21:39:14', '2022-07-19 21:39:14'),
(16, 1, 's', '2022-07-19 21:42:27', '2022-07-19 21:42:27'),
(17, 1, 'tes', '2022-07-19 21:42:33', '2022-07-19 21:42:33'),
(18, 1, 'tes', '2022-07-19 21:46:02', '2022-07-19 21:46:02'),
(19, 1, 's', '2022-07-19 21:47:26', '2022-07-19 21:47:26'),
(20, 1, 's', '2022-07-19 21:48:39', '2022-07-19 21:48:39'),
(21, 1, 'ss', '2022-07-19 21:51:52', '2022-07-19 21:51:52'),
(22, 1, 'ss', '2022-07-19 21:52:58', '2022-07-19 21:52:58'),
(23, 1, 's', '2022-07-19 21:55:52', '2022-07-19 21:55:52'),
(24, 1, 's', '2022-07-19 21:58:26', '2022-07-19 21:58:26'),
(25, 1, 's', '2022-07-19 21:58:38', '2022-07-19 21:58:38'),
(26, 1, 'wwwwq', '2022-07-19 21:58:47', '2022-07-19 21:58:47'),
(27, 1, 'wwwwq', '2022-07-19 21:58:53', '2022-07-19 21:58:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `no_meja` bigint(20) UNSIGNED NOT NULL,
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_masuk`
--

CREATE TABLE `laporan_masuk` (
  `id_laporan_masuk` bigint(20) UNSIGNED NOT NULL,
  `hari` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` datetime NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_masuk`
--

INSERT INTO `laporan_masuk` (`id_laporan_masuk`, `hari`, `tanggal`, `pemasukan`, `created_at`, `updated_at`) VALUES
(1, 'senin', '1970-01-01 00:00:00', 10000, '2022-07-01 03:14:51', '2022-07-01 03:14:51'),
(2, 'senin', '2022-07-01 00:00:00', 30000, '2022-07-01 03:15:44', '2022-07-04 04:21:08'),
(3, 'senin', '2022-07-01 10:17:52', 20000, '2022-07-01 03:17:52', '2022-07-01 03:17:52'),
(4, 'selasa', '2022-07-19 13:16:50', 30000, '2022-07-19 06:16:50', '2022-07-19 06:16:50'),
(5, 'rabu', '2022-07-19 13:58:04', 12, '2022-07-19 06:58:04', '2022-07-19 06:58:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `meja`
--

CREATE TABLE `meja` (
  `no_meja` bigint(20) UNSIGNED NOT NULL,
  `nama_meja` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `meja`
--

INSERT INTO `meja` (`no_meja`, `nama_meja`, `created_at`, `updated_at`) VALUES
(1, 'Meja 1', '2022-07-06 02:34:53', '2022-07-06 02:34:53'),
(2, 'Meja 2', '2022-07-06 02:42:07', '2022-07-06 02:42:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_menu` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipe_produk` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `harga_modal` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `gambar`, `nama_menu`, `tipe_produk`, `harga_modal`, `harga_jual`, `stok`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'LnGcY1ojyVM9pS1O3exE759WpzGgV6RPS1E47I1C.jpg', 'nasi goreng', 'makanan', 10000, 12000, 110, 'nasi, ayam, timun, sambal', '2022-06-28 22:33:05', '2022-07-13 23:17:40'),
(12, 'RXRtJr15lojvB5djZA8c20Git92A5v5VvVoY5LMo.jpg', 'Jus', 'Minuman', 7000, 10000, 700, 'Jus Apel', '2022-07-12 19:39:34', '2022-07-12 19:39:50'),
(13, 'Wk2h8tDvwL4YYMVYJEEghJ1P4YxNbaG1Cuw1lYj4.jpg', 'Sate', 'Makanan', 7000, 10000, 100, 'Sate Sapi, Sate Ayam, Sate Kambing', '2022-07-13 19:34:36', '2022-07-13 19:34:36'),
(16, 'Wr3ojtGMZhsvwPwjV2J2IouLLc0MYyvj3BEO08Bh.jpg', 'Ayam Geprek', 'Makanan', 8000, 12000, 300, 'Pedes, Enak, Nagih', '2022-07-13 23:17:22', '2022-07-13 23:17:22'),
(17, 'EqV9cbtyVodws0UL9ZmHz4umikLz2Wv7RKjdV1Co.jpg', 'Es Krim', 'Dessert', 5000, 10000, 700, 'Coklat, Vanilla', '2022-07-17 19:28:01', '2022-07-17 19:28:01'),
(18, 'WRmxysZzU64SM55yGEZZh3ngSKok0gdI7jSbjdR5.jpg', 'Boba', 'Minuman', 7000, 10000, 150, 'boba', '2022-07-18 00:58:57', '2022-07-18 00:59:15'),
(19, 'tXatFPzPOMNzjZaO5CZm6tUD660UZcrYbuRjBvoo.jpg', 'Ayam Bensu', 'Makanan', 10000, 12000, 2, 'Ayam lezat', '2022-07-18 01:50:01', '2022-07-18 01:50:01'),
(20, '9AUmbNsLWXQYFsNI21DL5W3FFJTGI7vxq3HKrsAI.jpg', 'Nasi Goreng', 'makanan', 5000, 10000, 90, 'Nasi Goreng Enak', '2022-07-18 19:41:08', '2022-07-18 19:41:08'),
(21, 'qdeenKFRrQHfivv37cPFtTBYkPkJOdrAe4SDXS46.jpg', 'Cokelat', 'dessert', 5000, 7000, 50, 'Dessert Box Chocolate', '2022-07-19 01:10:20', '2022-07-19 01:10:20'),
(22, 'QIsMhb2ShmmIH4ueJjUjmHQvvcOpqraMjozEsVPZ.jpg', 'pop sugar', 'dessert', 7000, 12000, 90, 'Dessert Nikmat, Mulai dari Stroberi Hingga Krim Karamel', '2022-07-19 01:12:42', '2022-07-19 01:12:42'),
(23, 'ptk5VABXzj0hurtIhiQqig9FeDX597mOPPvmBX7P.jpg', 'Es Teler Dessert Box', 'dessert', 5000, 7000, 90, 'Dessert Enak', '2022-07-19 01:15:46', '2022-07-19 01:15:46'),
(24, 'DgUujiP2lnh3FcgoVTmSQP7OfKi2VfwXgPH7P3mc.jpg', 'kue kotak', 'dessert', 50000, 60000, 100, 'makanan cokelat manis', '2022-07-19 01:53:01', '2022-07-19 01:53:01'),
(25, 'Cnq4J1cXawAOcdYTyIuVqeeZYE8FvBJT6kiMQiAG.jpg', 'Outrider\'s Champion Steak!', 'makanan', 5000, 10000, 55, 'Amber\'s specialty. One side is obviously uncooked. The other side gives off a subtle scent of something burnt. Close your eyes and have a big mouthful, just to keep Amber happy if nothing else.', '2022-07-19 19:58:44', '2022-07-19 19:58:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu_dipesan`
--

CREATE TABLE `menu_dipesan` (
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL,
  `harga_peritem` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `menu_dipesan`
--

INSERT INTO `menu_dipesan` (`id_pesanan`, `id_menu`, `jumlah`, `harga_peritem`, `created_at`, `updated_at`) VALUES
(101, 1, 2, 24000, '2022-07-15 03:27:46', '2022-07-15 03:27:46'),
(102, 12, 1, 10000, '2022-07-15 03:29:56', '2022-07-15 03:29:56'),
(103, 13, 2, 20000, '2022-07-15 03:31:11', '2022-07-15 03:31:11'),
(104, 16, 1, 12000, NULL, NULL),
(1, 1, 2, 24000, '2022-07-20 04:18:51', '2022-07-20 04:18:51');

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
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_28_085519_create_menus_table', 1),
(10, '2022_06_28_030256_create_pesanans_table', 2),
(11, '2022_06_29_031207_create_transaksis_table', 3),
(15, '2022_06_29_030504_create_tiket_pesanans_table', 4),
(16, '2022_06_30_022621_create_pesanan_selesais_table', 5),
(17, '2022_07_01_022607_create_keranjangs_table', 6),
(20, '2022_07_01_023002_create_laporan_masuks_table', 7),
(21, '2022_06_27_070816_create_mejas_table', 8),
(22, '2022_07_06_062546_create_feedback_table', 9),
(23, '2022_06_29_010054_create_menu__dipesans_table', 10),
(25, '2022_07_02_031207_create_riwayat_transaksis_table', 11);

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
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `no_meja` bigint(20) UNSIGNED NOT NULL,
  `waktu_pesan` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `no_meja`, `waktu_pesan`, `status`, `total_harga`, `created_at`, `updated_at`) VALUES
(1, 1, '2022-07-19 08:07:53', '', 0, NULL, NULL),
(101, 1, '2022-07-06 04:35:49', 'selesai', 40000, '2022-07-06 09:35:49', '2022-07-18 19:32:37'),
(102, 2, '2022-07-06 04:42:15', 'selesai', 40000, '2022-07-06 09:42:15', '2022-07-18 19:27:56'),
(103, 2, '2022-07-06 04:42:55', 'selesai', 40000, '2022-07-06 09:42:55', '2022-07-19 00:28:28'),
(104, 2, '2022-07-14 02:18:12', 'selesai', 0, '2022-07-14 07:18:13', '2022-07-19 02:17:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_selesai`
--

CREATE TABLE `pesanan_selesai` (
  `id_pesanan_selesai` bigint(20) UNSIGNED NOT NULL,
  `id_tiket` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_transaksi`
--

CREATE TABLE `riwayat_transaksi` (
  `id_pesanan` bigint(20) UNSIGNED NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tiket_pesanan`
--

CREATE TABLE `tiket_pesanan` (
  `id_tiketpesanan` bigint(20) UNSIGNED NOT NULL,
  `id` bigint(20) UNSIGNED NOT NULL,
  `status_pesanan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
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
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id_feedback`),
  ADD KEY `feedback_id_pesanan_foreign` (`id_pesanan`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `keranjang_id_menu_foreign` (`id_menu`),
  ADD KEY `keranjang_no_meja_foreign` (`no_meja`);

--
-- Indeks untuk tabel `laporan_masuk`
--
ALTER TABLE `laporan_masuk`
  ADD PRIMARY KEY (`id_laporan_masuk`);

--
-- Indeks untuk tabel `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`no_meja`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `menu_dipesan`
--
ALTER TABLE `menu_dipesan`
  ADD KEY `menu_dipesan_id_pesanan_foreign` (`id_pesanan`),
  ADD KEY `menu_dipesan_id_menu_foreign` (`id_menu`);

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
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `Pesanan_no_meja_foreign` (`no_meja`);

--
-- Indeks untuk tabel `pesanan_selesai`
--
ALTER TABLE `pesanan_selesai`
  ADD PRIMARY KEY (`id_pesanan_selesai`),
  ADD KEY `pesanan_selesai_id_tiket_foreign` (`id_tiket`);

--
-- Indeks untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD KEY `riwayat_transaksi_id_pesanan_foreign` (`id_pesanan`);

--
-- Indeks untuk tabel `tiket_pesanan`
--
ALTER TABLE `tiket_pesanan`
  ADD PRIMARY KEY (`id_tiketpesanan`),
  ADD KEY `tiket_pesanan_id_foreign` (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
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
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `laporan_masuk`
--
ALTER TABLE `laporan_masuk`
  MODIFY `id_laporan_masuk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT untuk tabel `pesanan_selesai`
--
ALTER TABLE `pesanan_selesai`
  MODIFY `id_pesanan_selesai` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tiket_pesanan`
--
ALTER TABLE `tiket_pesanan`
  MODIFY `id_tiketpesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `feedback`
--
ALTER TABLE `feedback`
  ADD CONSTRAINT `feedback_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `keranjang_no_meja_foreign` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`);

--
-- Ketidakleluasaan untuk tabel `menu_dipesan`
--
ALTER TABLE `menu_dipesan`
  ADD CONSTRAINT `menu_dipesan_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `menu_dipesan_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `Pesanan_no_meja_foreign` FOREIGN KEY (`no_meja`) REFERENCES `meja` (`no_meja`);

--
-- Ketidakleluasaan untuk tabel `pesanan_selesai`
--
ALTER TABLE `pesanan_selesai`
  ADD CONSTRAINT `pesanan_selesai_id_tiket_foreign` FOREIGN KEY (`id_tiket`) REFERENCES `tiket_pesanan` (`id_tiketpesanan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_transaksi`
--
ALTER TABLE `riwayat_transaksi`
  ADD CONSTRAINT `riwayat_transaksi_id_pesanan_foreign` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Ketidakleluasaan untuk tabel `tiket_pesanan`
--
ALTER TABLE `tiket_pesanan`
  ADD CONSTRAINT `tiket_pesanan_id_foreign` FOREIGN KEY (`id`) REFERENCES `pesanan` (`id_pesanan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
