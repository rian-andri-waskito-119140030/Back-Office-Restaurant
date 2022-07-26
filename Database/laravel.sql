-- phpMyAdmin SQL Dump
-- version 5.1.4-dev+20220420.d842c89d5c
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Jul 2022 pada 04.07
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
(7, 27, 'Diskon 17 Agustus', 0.0200, '2022-07-21 21:27:06', '2022-07-21 21:27:06');

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
(36, 1, 'segfjhdytukyugrhf', '2022-07-25 00:21:31', '2022-07-25 00:21:31');

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
(7, 'Jumat', '2022-07-22 11:28:26', 12000000, '2022-07-22 04:28:26', '2022-07-22 04:28:26');

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
(1, 'LnGcY1ojyVM9pS1O3exE759WpzGgV6RPS1E47I1C.jpg', 'nasi goreng', 'makanan', 10000, 12000, 56, 'nasi, ayam, timun, sambal', '2022-06-28 22:33:05', '2022-07-25 07:15:35'),
(12, 'RXRtJr15lojvB5djZA8c20Git92A5v5VvVoY5LMo.jpg', 'Jus', 'Minuman', 7000, 10000, 82, 'Jus Apel', '2022-07-12 19:39:34', '2022-07-25 06:42:30'),
(13, 'Wk2h8tDvwL4YYMVYJEEghJ1P4YxNbaG1Cuw1lYj4.jpg', 'Sate', 'Makanan', 7000, 10000, 96, 'Sate Sapi, Sate Ayam, Sate Kambing', '2022-07-13 19:34:36', '2022-07-25 03:25:39'),
(16, 'Wr3ojtGMZhsvwPwjV2J2IouLLc0MYyvj3BEO08Bh.jpg', 'Ayam Geprek', 'Makanan', 8000, 12000, 297, 'Pedes, Enak, Nagih', '2022-07-13 23:17:22', '2022-07-21 06:38:21'),
(17, 'EqV9cbtyVodws0UL9ZmHz4umikLz2Wv7RKjdV1Co.jpg', 'Es Krim', 'Dessert', 5000, 10000, 690, 'Coklat, Vanilla', '2022-07-17 19:28:01', '2022-07-25 03:22:38'),
(18, 'WRmxysZzU64SM55yGEZZh3ngSKok0gdI7jSbjdR5.jpg', 'Boba', 'Minuman', 7000, 10000, 133, 'boba', '2022-07-18 00:58:57', '2022-07-25 06:42:30'),
(19, 'tXatFPzPOMNzjZaO5CZm6tUD660UZcrYbuRjBvoo.jpg', 'Ayam Bensu', 'Makanan', 10000, 12000, 99, 'Ayam lezat', '2022-07-18 01:50:01', '2022-07-25 07:08:09'),
(20, '9AUmbNsLWXQYFsNI21DL5W3FFJTGI7vxq3HKrsAI.jpg', 'Nasi Goreng', 'makanan', 5000, 10000, 77, 'Nasi Goreng Enak', '2022-07-18 19:41:08', '2022-07-21 08:05:28'),
(21, 'qdeenKFRrQHfivv37cPFtTBYkPkJOdrAe4SDXS46.jpg', 'Cokelat', 'dessert', 5000, 7000, 39, 'Dessert Box Chocolate', '2022-07-19 01:10:20', '2022-07-21 07:19:53'),
(22, 'QIsMhb2ShmmIH4ueJjUjmHQvvcOpqraMjozEsVPZ.jpg', 'pop sugar', 'dessert', 7000, 12000, 79, 'Dessert Nikmat, Mulai dari Stroberi Hingga Krim Karamel', '2022-07-19 01:12:42', '2022-07-21 08:02:36'),
(23, 'ptk5VABXzj0hurtIhiQqig9FeDX597mOPPvmBX7P.jpg', 'Es Teler Dessert Box', 'dessert', 5000, 7000, 86, 'Dessert Enak', '2022-07-19 01:15:46', '2022-07-21 06:38:22'),
(24, 'DgUujiP2lnh3FcgoVTmSQP7OfKi2VfwXgPH7P3mc.jpg', 'kue kotak', 'dessert', 50000, 60000, 95, 'makanan cokelat manis', '2022-07-19 01:53:01', '2022-07-21 08:55:06'),
(25, 'Cnq4J1cXawAOcdYTyIuVqeeZYE8FvBJT6kiMQiAG.jpg', 'Outrider\'s Champion Steak!', 'makanan', 5000, 10000, 49, 'Amber\'s specialty. One side is obviously uncooked.', '2022-07-19 19:58:44', '2022-07-24 23:48:41'),
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
(168, 1, 6, 72000, '2022-07-25 07:15:35', '2022-07-25 07:15:35');

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
(27, '2022_07_21_025211_create_diskons_table', 12);

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
(156, 2, '2022-07-21 03:55:04', 'di pesan', 434000, '2022-07-21 08:55:04', '2022-07-21 02:11:54'),
(157, 2, '2022-07-22 10:22:53', 'di pesan', 46000, '2022-07-22 03:22:53', '2022-07-22 03:22:54'),
(158, 2, '2022-07-22 10:24:14', 'di pesan', 46000, '2022-07-22 03:24:14', '2022-07-22 03:24:14'),
(159, 2, '2022-07-22 10:29:39', 'di pesan', 46000, '2022-07-22 03:29:40', '2022-07-22 03:29:40'),
(160, 2, '2022-07-25 09:58:15', 'di pesan', 22000, '2022-07-25 02:58:15', '2022-07-25 02:58:15'),
(161, 2, '2022-07-25 10:20:55', 'di pesan', 50000, '2022-07-25 03:20:55', '2022-07-25 03:20:55'),
(162, 2, '2022-07-25 10:22:38', 'di pesan', 20000, '2022-07-25 03:22:38', '2022-07-25 03:22:38'),
(163, 2, '2022-07-25 10:25:38', 'di pesan', 10000, '2022-07-25 03:25:38', '2022-07-25 03:25:39'),
(164, 2, '2022-07-25 13:31:01', 'di pesan', 12000, '2022-07-25 06:31:01', '2022-07-25 06:31:02'),
(165, 2, '2022-07-25 13:41:53', 'di pesan', 12000, '2022-07-25 06:41:53', '2022-07-25 06:41:53'),
(166, 2, '2022-07-25 13:42:30', 'di pesan', 27000, '2022-07-25 06:42:30', '2022-07-25 06:42:30'),
(167, 2, '2022-07-25 14:08:09', 'di pesan', 12000, '2022-07-25 07:08:09', '2022-07-25 07:08:09'),
(168, 2, '2022-07-25 14:15:35', 'di pesan', 72000, '2022-07-25 07:15:35', '2022-07-25 07:15:35');

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
  `status_transaksi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `riwayat_transaksi`
--

INSERT INTO `riwayat_transaksi` (`id_pesanan`, `status_transaksi`, `created_at`, `updated_at`) VALUES
(156, 'belum_dibayar', '2022-07-21 08:55:06', '2022-07-21 08:55:06'),
(157, 'belum_dibayar', '2022-07-22 03:22:54', '2022-07-22 03:22:54'),
(158, 'belum_dibayar', '2022-07-22 03:24:14', '2022-07-22 03:24:14'),
(159, 'belum_dibayar', '2022-07-22 03:29:40', '2022-07-22 03:29:40'),
(160, 'belum_dibayar', '2022-07-25 02:58:15', '2022-07-25 02:58:15'),
(161, 'belum dibayar', '2022-07-25 03:20:55', '2022-07-25 03:20:55'),
(162, 'belum dibayar', '2022-07-25 03:22:38', '2022-07-25 03:22:38'),
(163, 'belum dibayar', '2022-07-25 03:25:39', '2022-07-25 03:25:39'),
(164, 'belum dibayar', '2022-07-25 06:31:02', '2022-07-25 06:31:02'),
(165, 'belum dibayar', '2022-07-25 06:41:53', '2022-07-25 06:41:53'),
(166, 'belum dibayar', '2022-07-25 06:42:31', '2022-07-25 06:42:31'),
(167, 'belum dibayar', '2022-07-25 07:08:09', '2022-07-25 07:08:09'),
(168, 'belum dibayar', '2022-07-25 07:15:35', '2022-07-25 07:15:35');

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
  MODIFY `id_diskon` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id_feedback` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT untuk tabel `laporan_masuk`
--
ALTER TABLE `laporan_masuk`
  MODIFY `id_laporan_masuk` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

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
