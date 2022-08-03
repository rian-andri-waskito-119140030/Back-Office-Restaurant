-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220420.d842c89d5c
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Agu 2022 pada 06.22
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
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `id_diskon` bigint(20) UNSIGNED NOT NULL,
  `id_menu` bigint(20) UNSIGNED NOT NULL,
  `nama_diskon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `diskon` double(20,4) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`id_diskon`, `id_menu`, `nama_diskon`, `diskon`, `created_at`, `updated_at`) VALUES
(1, 1, 'Diskon Lebaran', 0.0500, '2022-07-20 21:34:41', '2022-07-20 21:34:41'),
(2, 1, 'Diskon Lebaran', 0.0500, '2022-07-20 21:38:18', '2022-07-20 21:38:18'),
(3, 1, 'Diskon Lebaran', 0.0500, '2022-07-20 21:39:30', '2022-07-20 21:39:30'),
(4, 16, 'Diskon Tahun Baru', 0.1000, '2022-07-20 21:40:40', '2022-07-20 21:40:40'),
(5, 13, 'Diskon Lebaran', 0.5000, '2022-07-21 00:43:56', '2022-07-21 00:43:56'),
(6, 19, 'Diskon Natal', 0.0090, '2022-07-21 00:55:42', '2022-07-21 00:55:42'),
(7, 27, 'Diskon 17 Agustus', 0.0200, '2022-07-21 21:27:06', '2022-07-21 21:27:06'),
(8, 28, 'Diskon Lebaran', 0.0500, '2022-07-25 21:12:02', '2022-07-25 21:12:02');

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
(31, 1, 'fffer', '2022-07-21 02:13:56', '2022-07-21 02:13:56'),
(32, 1, 'fffer', '2022-07-21 02:28:47', '2022-07-21 02:28:47'),
(33, 156, 'hahahahahaha', '2022-07-22 02:12:23', '2022-07-22 02:12:23'),
(34, 1, 'sipp makanan anda enak', '2022-07-21 20:55:16', '2022-07-21 20:55:16'),
(35, 1, 'sipp makanan anda enak', '2022-07-21 20:57:42', '2022-07-21 20:57:42'),
(36, 1, 'segfjhdytukyugrhf', '2022-07-25 00:21:31', '2022-07-25 00:21:31'),
(37, 1, 'makanannya enak lohhh :)', '2022-07-26 21:09:54', '2022-07-26 21:09:54'),
(38, 195, 'enak banget gesssssssssssssss', '2022-08-02 21:06:43', '2022-08-02 21:06:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kasir`
--

CREATE TABLE `kasir` (
  `id_kasir` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `kasir`
--

INSERT INTO `kasir` (`id_kasir`, `name`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Putu Ary Kusuma Yudha', 'putuary', '$2y$10$buyNoRxUmmlCYC56oUTXeuZ0X2hU23xU5DOhe/5LmQy0fih4lUz8.', NULL, '2022-08-02 01:05:12', '2022-08-02 01:05:12');

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
(1, 'senin', '1970-01-01 00:00:00', 13000, '2022-07-01 03:14:51', '2022-07-20 08:45:31'),
(2, 'senin', '2022-07-01 00:00:00', 30000, '2022-07-01 03:15:44', '2022-07-04 04:21:08'),
(3, 'senin', '2022-07-01 10:17:52', 20000, '2022-07-01 03:17:52', '2022-07-01 03:17:52'),
(4, 'selasa', '2022-07-19 13:16:50', 30000, '2022-07-19 06:16:50', '2022-07-19 06:16:50'),
(6, 'rabu', '2022-07-20 16:21:17', 150000, '2022-07-20 09:21:17', '2022-07-20 09:21:17'),
(7, 'Jumat', '2022-07-22 11:28:26', 12000000, '2022-07-22 04:28:26', '2022-07-22 04:28:26'),
(8, 'senin', '2022-08-01 11:13:28', 30000, '2022-08-01 04:13:28', '2022-08-01 04:13:28');

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
(2, 'Meja 2', '2022-07-06 02:42:07', '2022-07-06 02:42:07'),
(3, 'Meja 3', NULL, NULL);

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
(1, 'LnGcY1ojyVM9pS1O3exE759WpzGgV6RPS1E47I1C.jpg', 'nasi goreng', 'makanan', 10000, 12000, 100, 'nasi, ayam, timun, sambal', '2022-06-28 22:33:05', '2022-08-02 21:03:22'),
(12, '1659498324.jpg', 'Jus', 'Minuman', 7000, 10000, 69, 'Jus Apel', '2022-07-12 19:39:34', '2022-08-02 20:45:24'),
(13, 'Wk2h8tDvwL4YYMVYJEEghJ1P4YxNbaG1Cuw1lYj4.jpg', 'Sate', 'Makanan', 7000, 10000, 95, 'Sate Sapi, Sate Ayam, Sate Kambing', '2022-07-13 19:34:36', '2022-07-26 07:46:03'),
(16, 'Wr3ojtGMZhsvwPwjV2J2IouLLc0MYyvj3BEO08Bh.jpg', 'Ayam Geprek', 'Makanan', 8000, 12000, 296, 'Pedes, Enak, Nagih', '2022-07-13 23:17:22', '2022-08-01 06:11:45'),
(17, 'EqV9cbtyVodws0UL9ZmHz4umikLz2Wv7RKjdV1Co.jpg', 'Es Krim', 'Dessert', 5000, 10000, 685, 'Coklat, Vanilla', '2022-07-17 19:28:01', '2022-08-03 03:45:10'),
(18, 'WRmxysZzU64SM55yGEZZh3ngSKok0gdI7jSbjdR5.jpg', 'Boba', 'Minuman', 7000, 10000, 126, 'boba', '2022-07-18 00:58:57', '2022-08-02 03:40:38'),
(19, 'tXatFPzPOMNzjZaO5CZm6tUD660UZcrYbuRjBvoo.jpg', 'Ayam Bensu', 'Makanan', 10000, 12000, 99, 'Ayam lezat', '2022-07-18 01:50:01', '2022-07-25 07:08:09'),
(20, '9AUmbNsLWXQYFsNI21DL5W3FFJTGI7vxq3HKrsAI.jpg', 'Nasi Goreng', 'makanan', 5000, 10000, 77, 'Nasi Goreng Enak', '2022-07-18 19:41:08', '2022-07-21 08:05:28'),
(21, 'qdeenKFRrQHfivv37cPFtTBYkPkJOdrAe4SDXS46.jpg', 'Cokelat', 'dessert', 5000, 7000, 38, 'Dessert Box Chocolate', '2022-07-19 01:10:20', '2022-07-28 04:25:57'),
(23, 'ptk5VABXzj0hurtIhiQqig9FeDX597mOPPvmBX7P.jpg', 'Es Teler Dessert Box', 'dessert', 5000, 7000, 86, 'Dessert Enak', '2022-07-19 01:15:46', '2022-07-21 06:38:22'),
(24, 'DgUujiP2lnh3FcgoVTmSQP7OfKi2VfwXgPH7P3mc.jpg', 'kue kotak', 'dessert', 50000, 60000, 89, 'makanan cokelat manis', '2022-07-19 01:53:01', '2022-08-03 03:45:10'),
(25, 'Cnq4J1cXawAOcdYTyIuVqeeZYE8FvBJT6kiMQiAG.jpg', 'Outrider\'s Champion Steak!', 'makanan', 5000, 10000, 48, 'Amber\'s specialty. One side is obviously uncooked.', '2022-07-19 19:58:44', '2022-07-26 03:38:32'),
(26, 'rA4Elow11pJ2BRqacsq0LNI8s8TErR0fJk9dWNfJ.jpg', 'Laksa', 'makanan', 7000, 10000, 43, 'Laksa Singapura', '2022-07-19 23:27:52', '2022-07-25 03:22:38'),
(27, 'ptsWPoSg9tMrwjLYXIsba1ZJjqraA14nkGVlf7JI.jpg', 'Soto Lamongan', 'makanan', 10000, 25000, 55, 'Soto Lamongan', '2022-07-21 21:25:56', '2022-07-21 21:25:56'),
(28, 'HebMcg0OeNqQ44H0rEDbbzYX5hG9u1XoNOwWQcj3.jpg', 'Tricolor Dango', 'dessert', 5000, 7000, 99, 'A soft, glutinous snack.', '2022-07-24 20:46:30', '2022-07-25 06:42:30');

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
(156, 1, 7, 84000, '2022-07-21 08:55:05', '2022-07-21 08:55:05'),
(156, 12, 5, 50000, '2022-07-21 08:55:06', '2022-07-21 08:55:06'),
(156, 24, 5, 300000, '2022-07-21 08:55:06', '2022-07-21 08:55:06'),
(1, 25, 1, 10000, NULL, NULL),
(157, 1, 3, 36000, '2022-07-22 03:22:54', '2022-07-22 03:22:54'),
(157, 12, 1, 10000, '2022-07-22 03:22:54', '2022-07-22 03:22:54'),
(158, 1, 3, 36000, '2022-07-22 03:24:14', '2022-07-22 03:24:14'),
(158, 12, 1, 10000, '2022-07-22 03:24:14', '2022-07-22 03:24:14'),
(159, 1, 3, 36000, '2022-07-22 03:29:40', '2022-07-22 03:29:40'),
(159, 12, 1, 10000, '2022-07-22 03:29:40', '2022-07-22 03:29:40'),
(2, 1, 1, 12000, NULL, NULL),
(160, 1, 1, 12000, '2022-07-25 02:58:15', '2022-07-25 02:58:15'),
(160, 18, 1, 10000, '2022-07-25 02:58:15', '2022-07-25 02:58:15'),
(161, 13, 3, 30000, '2022-07-25 03:20:55', '2022-07-25 03:20:55'),
(161, 18, 2, 20000, '2022-07-25 03:20:55', '2022-07-25 03:20:55'),
(162, 26, 1, 10000, '2022-07-25 03:22:38', '2022-07-25 03:22:38'),
(162, 17, 1, 10000, '2022-07-25 03:22:38', '2022-07-25 03:22:38'),
(163, 13, 1, 10000, '2022-07-25 03:25:38', '2022-07-25 03:25:38'),
(164, 1, 1, 12000, '2022-07-25 06:31:02', '2022-07-25 06:31:02'),
(165, 1, 1, 12000, '2022-07-25 06:41:53', '2022-07-25 06:41:53'),
(166, 28, 1, 7000, '2022-07-25 06:42:30', '2022-07-25 06:42:30'),
(166, 12, 1, 10000, '2022-07-25 06:42:30', '2022-07-25 06:42:30'),
(166, 18, 1, 10000, '2022-07-25 06:42:30', '2022-07-25 06:42:30'),
(167, 19, 1, 12000, '2022-07-25 07:08:09', '2022-07-25 07:08:09'),
(168, 1, 6, 72000, '2022-07-25 07:15:35', '2022-07-25 07:15:35'),
(169, 25, 1, 10000, '2022-07-26 03:38:32', '2022-07-26 03:38:32'),
(170, 17, 1, 10000, '2022-07-26 03:42:23', '2022-07-26 03:42:23'),
(170, 12, 1, 10000, '2022-07-26 03:42:23', '2022-07-26 03:42:23'),
(171, 13, 1, 10000, '2022-07-26 07:46:03', '2022-07-26 07:46:03'),
(172, 12, 1, 10000, '2022-07-27 04:23:49', '2022-07-27 04:23:49'),
(173, 18, 1, 10000, '2022-07-28 03:58:38', '2022-07-28 03:58:38'),
(174, 18, 1, 10000, '2022-07-28 03:59:04', '2022-07-28 03:59:04'),
(175, 21, 1, 7000, '2022-07-28 04:25:57', '2022-07-28 04:25:57'),
(180, 1, 1, 12000, '2022-08-01 04:41:14', '2022-08-01 04:41:14'),
(180, 12, 1, 10000, '2022-08-01 04:41:14', '2022-08-01 04:41:14'),
(181, 1, 2, 24000, '2022-08-01 04:45:50', '2022-08-01 04:45:50'),
(181, 12, 4, 40000, '2022-08-01 04:45:50', '2022-08-01 04:45:50'),
(182, 16, 1, 12000, '2022-08-01 06:11:45', '2022-08-01 06:11:45'),
(183, 12, 1, 10000, '2022-08-02 03:08:39', '2022-08-02 03:08:39'),
(184, 12, 1, 10000, '2022-08-02 03:09:27', '2022-08-02 03:09:27'),
(184, 24, 1, 60000, '2022-08-02 03:09:27', '2022-08-02 03:09:27'),
(185, 12, 1, 10000, '2022-08-02 03:09:52', '2022-08-02 03:09:52'),
(185, 24, 1, 60000, '2022-08-02 03:09:52', '2022-08-02 03:09:52'),
(186, 12, 1, 10000, '2022-08-02 03:10:17', '2022-08-02 03:10:17'),
(186, 24, 1, 60000, '2022-08-02 03:10:18', '2022-08-02 03:10:18'),
(190, 12, 1, 10000, '2022-08-02 03:29:38', '2022-08-02 03:29:38'),
(190, 12, 1, 10000, '2022-08-02 03:29:38', '2022-08-02 03:29:38'),
(191, 1, 1, 12000, '2022-08-02 03:31:36', '2022-08-02 03:31:36'),
(191, 18, 1, 10000, '2022-08-02 03:31:36', '2022-08-02 03:31:36'),
(192, 1, 1, 12000, '2022-08-02 03:34:26', '2022-08-02 03:34:26'),
(192, 18, 1, 10000, '2022-08-02 03:34:26', '2022-08-02 03:34:26'),
(193, 1, 1, 12000, '2022-08-02 03:36:42', '2022-08-02 03:36:42'),
(193, 18, 1, 10000, '2022-08-02 03:36:42', '2022-08-02 03:36:42'),
(194, 1, 1, 12000, '2022-08-02 03:38:55', '2022-08-02 03:38:55'),
(194, 18, 1, 10000, '2022-08-02 03:38:55', '2022-08-02 03:38:55'),
(195, 1, 1, 12000, '2022-08-02 03:40:38', '2022-08-02 03:40:38'),
(195, 18, 1, 10000, '2022-08-02 03:40:38', '2022-08-02 03:40:38'),
(196, 24, 3, 180000, '2022-08-03 03:45:10', '2022-08-03 03:45:10'),
(196, 17, 4, 40000, '2022-08-03 03:45:10', '2022-08-03 03:45:10'),
(197, 1, 48, 576000, '2022-08-03 03:56:30', '2022-08-03 03:56:30'),
(198, 1, 1, 12000, '2022-08-03 03:58:23', '2022-08-03 03:58:23'),
(199, 1, 99, 1188000, '2022-08-03 03:59:14', '2022-08-03 03:59:14');

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
(25, '2022_07_02_031207_create_riwayat_transaksis_table', 11),
(27, '2022_07_21_025211_create_diskons_table', 12),
(29, '2022_08_02_000000_create_kasir_table', 13);

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
(1, 2, '2022-07-21 11:13:15', 'selesai', 10000, NULL, NULL),
(2, 1, '2022-07-22 10:52:04', 'selesai', 12000, NULL, '2022-07-25 02:11:58'),
(156, 2, '2022-07-21 03:55:04', 'selesai', 434000, '2022-07-21 08:55:04', '2022-07-26 21:50:21'),
(157, 2, '2022-07-22 10:22:53', 'selesai', 46000, '2022-07-22 03:22:53', '2022-07-26 21:57:18'),
(158, 2, '2022-07-22 10:24:14', 'selesai', 46000, '2022-07-22 03:24:14', '2022-07-27 20:40:59'),
(159, 2, '2022-07-22 10:29:39', 'selesai', 46000, '2022-07-22 03:29:40', '2022-07-29 01:12:03'),
(160, 2, '2022-07-25 09:58:15', 'selesai', 22000, '2022-07-25 02:58:15', '2022-07-29 01:21:38'),
(161, 2, '2022-07-25 10:20:55', 'selesai', 50000, '2022-07-25 03:20:55', '2022-07-30 01:27:16'),
(162, 2, '2022-07-25 10:22:38', 'selesai', 20000, '2022-07-25 03:22:38', '2022-08-01 00:57:08'),
(163, 2, '2022-07-25 10:25:38', 'selesai', 10000, '2022-07-25 03:25:38', '2022-08-01 22:17:38'),
(164, 2, '2022-07-25 13:31:01', 'di masak', 12000, '2022-07-25 06:31:01', '2022-07-31 21:07:51'),
(165, 2, '2022-07-25 13:41:53', 'selesai', 12000, '2022-07-25 06:41:53', '2022-07-31 21:08:19'),
(166, 2, '2022-07-25 13:42:30', 'di masak', 27000, '2022-07-25 06:42:30', '2022-07-31 22:09:42'),
(167, 2, '2022-07-25 14:08:09', 'selesai', 12000, '2022-07-25 07:08:09', '2022-07-31 22:10:24'),
(168, 2, '2022-07-25 14:15:35', 'di pesan', 72000, '2022-07-25 07:15:35', '2022-07-25 07:15:35'),
(169, 2, '2022-07-26 10:38:32', 'di pesan', 10000, '2022-07-26 03:38:32', '2022-07-26 03:38:32'),
(170, 2, '2022-07-26 10:42:23', 'di pesan', 20000, '2022-07-26 03:42:23', '2022-07-26 03:42:23'),
(171, 2, '2022-07-26 14:46:03', 'di pesan', 10000, '2022-07-26 07:46:03', '2022-07-26 07:46:03'),
(172, 2, '2022-07-27 11:23:49', 'di pesan', 10000, '2022-07-27 04:23:49', '2022-07-27 04:23:49'),
(173, 2, '2022-07-28 10:58:35', 'di pesan', 10000, '2022-07-28 03:58:35', '2022-07-28 03:58:38'),
(174, 2, '2022-07-28 10:59:03', 'di pesan', 10000, '2022-07-28 03:59:03', '2022-07-28 03:59:04'),
(175, 2, '2022-07-28 11:25:57', 'selesai', 7000, '2022-07-28 04:25:57', '2022-07-29 02:03:02'),
(180, 2, '2022-08-01 11:41:14', 'di pesan', 22000, '2022-08-01 04:41:14', '2022-08-01 04:41:14'),
(181, 2, '2022-08-01 11:45:49', 'di pesan', 64000, '2022-08-01 04:45:49', '2022-08-01 04:45:50'),
(182, 2, '2022-08-01 13:11:45', 'di pesan', 12000, '2022-08-01 06:11:45', '2022-08-01 06:11:45'),
(183, 2, '2022-08-02 10:08:39', 'di pesan', 10000, '2022-08-02 03:08:39', '2022-08-02 03:08:39'),
(184, 2, '2022-08-02 10:09:27', 'di pesan', 70000, '2022-08-02 03:09:27', '2022-08-02 03:09:27'),
(185, 2, '2022-08-02 10:09:51', 'di pesan', 70000, '2022-08-02 03:09:51', '2022-08-02 03:09:52'),
(186, 2, '2022-08-02 10:10:16', 'di pesan', 70000, '2022-08-02 03:10:16', '2022-08-02 03:10:18'),
(190, 2, '2022-08-02 10:29:38', 'di pesan', 20000, '2022-08-02 03:29:38', '2022-08-02 03:29:38'),
(191, 2, '2022-08-02 10:31:36', 'di pesan', 22000, '2022-08-02 03:31:36', '2022-08-02 03:31:36'),
(192, 2, '2022-08-02 10:34:26', 'di pesan', 22000, '2022-08-02 03:34:26', '2022-08-02 03:34:26'),
(193, 2, '2022-08-02 10:36:42', 'di pesan', 22000, '2022-08-02 03:36:42', '2022-08-02 03:36:42'),
(194, 2, '2022-08-02 10:38:55', 'di pesan', 22000, '2022-08-02 03:38:55', '2022-08-02 03:38:55'),
(195, 2, '2022-08-02 10:40:38', 'di pesan', 22000, '2022-08-02 03:40:38', '2022-08-02 03:40:38'),
(196, 3, '2022-08-03 10:45:10', 'di pesan', 220000, '2022-08-03 03:45:10', '2022-08-03 03:45:10'),
(197, 3, '2022-08-03 10:56:29', 'di pesan', 576000, '2022-08-03 03:56:29', '2022-08-03 03:56:30'),
(198, 3, '2022-08-03 10:58:23', 'di pesan', 12000, '2022-08-03 03:58:23', '2022-08-03 03:58:23'),
(199, 3, '2022-08-03 10:59:14', 'di pesan', 1188000, '2022-08-03 03:59:14', '2022-08-03 03:59:14');

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
  `uang_bayar` int(11) NOT NULL,
  `uang_kembalian` int(11) NOT NULL,
  `status_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id_pesanan`, `uang_bayar`, `uang_kembalian`, `status_transaksi`, `created_at`, `updated_at`) VALUES
(156, 10000, 5000, 'Lunas', '2022-07-21 08:55:06', '2022-08-01 19:53:31'),
(157, 50000, 4000, 'Lunas', '2022-07-22 03:22:54', '2022-08-01 20:22:55'),
(158, 0, 0, 'belum_dibayar', '2022-07-22 03:24:14', '2022-07-22 03:24:14'),
(159, 0, 0, 'belum_dibayar', '2022-07-22 03:29:40', '2022-07-22 03:29:40'),
(160, 0, 0, 'belum_dibayar', '2022-07-25 02:58:15', '2022-07-25 02:58:15'),
(161, 0, 0, 'belum dibayar', '2022-07-25 03:20:55', '2022-07-25 03:20:55'),
(162, 0, 0, 'belum dibayar', '2022-07-25 03:22:38', '2022-07-25 03:22:38'),
(163, 0, 0, 'belum dibayar', '2022-07-25 03:25:39', '2022-07-25 03:25:39'),
(164, 0, 0, 'belum dibayar', '2022-07-25 06:31:02', '2022-07-25 06:31:02'),
(165, 0, 0, 'belum dibayar', '2022-07-25 06:41:53', '2022-07-25 06:41:53'),
(166, 0, 0, 'belum dibayar', '2022-07-25 06:42:31', '2022-07-25 06:42:31'),
(167, 0, 0, 'belum dibayar', '2022-07-25 07:08:09', '2022-07-25 07:08:09'),
(168, 0, 0, 'belum dibayar', '2022-07-25 07:15:35', '2022-07-25 07:15:35'),
(169, 0, 0, 'belum dibayar', '2022-07-26 03:38:32', '2022-07-26 03:38:32'),
(170, 0, 0, 'belum dibayar', '2022-07-26 03:42:23', '2022-07-26 03:42:23'),
(171, 0, 0, 'belum dibayar', '2022-07-26 07:46:03', '2022-07-26 07:46:03'),
(172, 0, 0, 'belum dibayar', '2022-07-27 04:23:49', '2022-07-27 04:23:49'),
(173, 0, 0, 'belum dibayar', '2022-07-28 03:58:38', '2022-07-28 03:58:38'),
(174, 0, 0, 'belum dibayar', '2022-07-28 03:59:04', '2022-07-28 03:59:04'),
(175, 0, 0, 'belum dibayar', '2022-07-28 04:25:57', '2022-07-28 04:25:57'),
(180, 0, 0, 'belum dibayar', '2022-08-01 04:41:14', '2022-08-01 04:41:14'),
(181, 0, 0, 'belum dibayar', '2022-08-01 04:45:50', '2022-08-01 04:45:50'),
(182, 0, 0, 'belum dibayar', '2022-08-01 06:11:46', '2022-08-01 06:11:46'),
(194, 0, 0, 'belum dibayar', '2022-08-02 03:38:55', '2022-08-02 03:38:55'),
(195, 0, 0, 'belum dibayar', '2022-08-02 03:40:38', '2022-08-02 03:40:38'),
(196, 0, 0, 'Belum dibayar', '2022-08-03 03:45:10', '2022-08-03 03:45:10'),
(197, 0, 0, 'Belum dibayar', '2022-08-03 03:56:30', '2022-08-03 03:56:30'),
(198, 0, 0, 'Belum dibayar', '2022-08-03 03:58:23', '2022-08-03 03:58:23'),
(199, 0, 0, 'Belum dibayar', '2022-08-03 03:59:14', '2022-08-03 03:59:14');

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
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Rian Andri', 'uchihaitachi1304@gmail.com', NULL, '$2y$10$WF8WkOax8MU.jEbWRYob/uPcOBlki7Fbndp097jnUOIu/wsuMX1oS', NULL, '2022-08-01 19:34:50', '2022-08-01 19:34:50'),
(2, 'Elly', 'Elly12@gmail.com', NULL, '$2y$10$3kwqPV1tXzFI6A6rSK/pUuwmHef7QtLuZBimr7wi3sAvI2CBh/fwO', NULL, '2022-08-01 20:42:48', '2022-08-01 20:42:48'),
(3, 'Radha', 'radha@gmail.com', NULL, '$2y$10$vRDe7oTQZwpMqgoDayb7meAEjLiuPSHzHyu./QNWRZUlnSImIX10W', NULL, '2022-08-01 21:29:53', '2022-08-01 21:29:53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`id_diskon`),
  ADD KEY `diskon_id_menu_foreign` (`id_menu`);

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
-- Indeks untuk tabel `kasir`
--
ALTER TABLE `kasir`
  ADD PRIMARY KEY (`id_kasir`),
  ADD UNIQUE KEY `kasir_username_unique` (`username`);

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
-- AUTO_INCREMENT untuk tabel `diskon`
--
ALTER TABLE `diskon`
  MODIFY `id_diskon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `kasir`
--
ALTER TABLE `kasir`
  MODIFY `id_kasir` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `laporan_masuk`
--
ALTER TABLE `laporan_masuk`
  MODIFY `id_laporan_masuk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=200;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD CONSTRAINT `diskon_id_menu_foreign` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

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
