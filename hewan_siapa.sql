-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Nov 2021 pada 16.45
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hewan_siapa`
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
-- Struktur dari tabel `jenis_hewans`
--

CREATE TABLE `jenis_hewans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_hewan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` bigint(20) UNSIGNED NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `jenis_hewans`
--

INSERT INTO `jenis_hewans` (`id`, `nama_jenis_hewan`, `parent_id`, `created_at`, `updated_at`) VALUES
(1, 'Anjing', 0, NULL, NULL),
(2, 'Kucing', 0, NULL, NULL),
(5, 'garnierasdasf', 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_transaksi_adopsi`
--

CREATE TABLE `laporan_transaksi_adopsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LTA_nama_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_nama_owner_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_nama_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_jenis_hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_ras_hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_type_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_alamat_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_contact_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_alasan_memilih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTA_konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_transaksi_adopsi`
--

INSERT INTO `laporan_transaksi_adopsi` (`id`, `LTA_nama_post`, `LTA_nama_owner_post`, `LTA_nama_pengaju`, `LTA_jenis_hewan`, `LTA_ras_hewan`, `LTA_type_post`, `LTA_alamat_pengaju`, `LTA_contact_pengaju`, `LTA_alasan_memilih`, `LTA_konfirmasi`, `post_id`, `created_at`, `updated_at`) VALUES
(72, 'Kucing Kampung', 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Cihuahua', 'adopsi', 'Klaten', '+628989045550', 'Karena lucu', 'diterima', 31, '2021-07-20 02:56:20', '2021-07-20 02:56:20'),
(73, 'Kucing Kampung', 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Cihuahua', 'adopsi', 'Klaten', '+628989045550', 'Lucu', 'ditolak', 31, '2021-07-20 02:57:15', '2021-07-20 02:57:15'),
(74, 'Kucing Kampung', 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Cihuahua', 'adopsi', 'asdsad', '+628989045550', 'asdas', 'diterima', 31, '2021-07-20 03:00:21', '2021-07-20 03:00:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `laporan_transaksi_pemacakan`
--

CREATE TABLE `laporan_transaksi_pemacakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `LTP_nama_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_nama_owner_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_jenis_hewan_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_ras_hewan_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_type_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_nama_pengaju_pemacakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_jenis_hewan_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_ras_hewan_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_alamat_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_contact_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_alasan_memilih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LTP_konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `laporan_transaksi_pemacakan`
--

INSERT INTO `laporan_transaksi_pemacakan` (`id`, `LTP_nama_post`, `LTP_nama_owner_post`, `LTP_jenis_hewan_post`, `LTP_ras_hewan_post`, `LTP_type_post`, `LTP_nama_pengaju_pemacakan`, `LTP_jenis_hewan_pengaju`, `LTP_ras_hewan_pengaju`, `LTP_alamat_pengaju`, `LTP_contact_pengaju`, `LTP_alasan_memilih`, `LTP_konfirmasi`, `post_id`, `created_at`, `updated_at`) VALUES
(376, 'Gecko', 'Admin Role', 'Anjing', 'Alaskan Malamute', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'ditolak', 7, '2021-07-19 07:21:42', '2021-07-19 07:21:42'),
(377, 'Gecko', 'Admin Role', 'Anjing', 'Alaskan Malamute', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'ditolak', 7, '2021-07-19 07:22:41', '2021-07-19 07:22:41'),
(378, 'Gecko', 'Admin Role', 'Anjing', 'Alaskan Malamute', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'ditolak', 7, '2021-07-19 07:23:40', '2021-07-19 07:23:40'),
(379, 'Gecko', 'Admin Role', 'Anjing', 'Alaskan Malamute', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'ditolak', 7, '2021-07-19 07:23:41', '2021-07-19 07:23:41'),
(380, 'Gecko', 'Admin Role', 'Anjing', 'Alaskan Malamute', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'ditolak', 7, '2021-07-19 07:24:34', '2021-07-19 07:24:34'),
(381, 'Gecko', 'Admin Role', 'Anjing', 'Alaskan Malamute', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'ditolak', 7, '2021-07-19 07:24:35', '2021-07-19 07:24:35'),
(382, 'Gecko', 'Admin Role', 'Anjing', 'Alaskan Malamute', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'ditolak', 7, '2021-07-19 07:24:43', '2021-07-19 07:24:43'),
(383, 'Gecko', 'Admin Role', 'Anjing', 'Alaskan Malamute', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'ditolak', 7, '2021-07-19 07:24:48', '2021-07-19 07:24:48'),
(389, 'Herder', 'Daffa Raka', 'Kucing', 'Anggora', 'Pemacakan', 'Daffa Raka', 'Kucing', 'Anggora', 'Klaten Sleatan', '+628989045550', 'Begitulah', 'ditolak', 8, '2021-07-20 02:03:54', '2021-07-20 02:03:54'),
(390, 'Herder', 'Daffa Raka', 'Kucing', 'Anggora', 'pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Klaten Sleatan', '+628989045550', 'COcok dengan hewan saya', 'diterima', 8, '2021-07-20 03:03:33', '2021-07-20 03:03:33'),
(391, 'Herder', 'Daffa Raka', 'Kucing', 'Anggora', 'pemacakan', 'Daffa Raka', 'Kucing', 'Anggora', 'Klaten Sleatan', '+628989045550', 'Begini begitu', 'diterima', 8, '2021-07-20 03:07:56', '2021-07-20 03:07:56'),
(392, 'Herder', 'Daffa Raka', 'Kucing', 'Anggora', 'Pemacakan', 'Daffa Raka', 'Anjing', 'Pitbull', 'Klaten Sleatan', '+628989045550', 'COcok', 'ditolak', 8, '2021-07-20 03:08:17', '2021-07-20 03:08:17');

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
(5, '2021_04_06_070511_create_jenis_hewans_table', 1),
(6, '2021_04_06_072410_create_ras_hewans_table', 1),
(7, '2021_04_06_091620_create_customers_table', 1),
(8, '2021_04_06_092848_create_kecamatans_table', 1),
(9, '2021_04_25_120001_create_sessions_table', 1),
(10, '2021_04_28_100817_create_pemacakan_table', 1),
(11, '2021_04_28_100853_create_adopsi_table', 1),
(12, '2021_05_22_060341_alter_table_drop_slug_jenis_hewan_from_jenishewans_table', 1),
(13, '2021_05_23_055101_add_size_column_at_adopsi_table', 1),
(14, '2021_06_01_124844_alter_change_status-adopsi_in_post_adopsi_table', 1),
(15, '2021_06_02_094303_add_path-storage_column_in_adopsi_table', 1),
(16, '2021_06_04_172037_create_permission_tables', 1),
(17, '2021_06_24_172637_create_laporan-transaksi_table', 1),
(18, '2021_06_25_033122_create_laporan-transaksi-pemacakan_tables', 1),
(19, '2021_06_25_040723_add_foreign_at_laporans_table', 1),
(20, '2021_06_30_152454_add_path-storage_column_at_post_pemacakan_table', 2),
(21, '2021_07_01_080727_create_transaksi_adopsis_table', 3),
(22, '2021_07_01_113327_add_konfirmasi_column_in_transaksi_adopsi', 4),
(23, '2021_07_01_120731_change_column_to_nullable_in_transaksi_adopsi', 5),
(24, '2021_07_01_132346_create_transaksi_pemacakan', 6),
(25, '2021_07_02_130555_update_laporan-transaksi-adopsi', 7),
(26, '2021_07_02_173156_add_jenis_hewan_id_and_ras_hewan_id_in_transaksi_pemacakan', 8),
(27, '2021_07_19_060633_add_kontak_in_post_adopsi_table', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 4),
(2, 'App\\Models\\User', 2),
(3, 'App\\Models\\User', 3),
(3, 'App\\Models\\User', 4);

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'role-list', 'web', '2021-06-27 10:51:31', '2021-06-27 10:51:31'),
(2, 'role-create', 'web', '2021-06-27 10:51:31', '2021-06-27 10:51:31'),
(3, 'role-edit', 'web', '2021-06-27 10:51:31', '2021-06-27 10:51:31'),
(4, 'role-delete', 'web', '2021-06-27 10:51:31', '2021-06-27 10:51:31'),
(5, 'product-list', 'web', '2021-06-27 10:51:31', '2021-06-27 10:51:31'),
(6, 'product-create', 'web', '2021-06-27 10:51:31', '2021-06-27 10:51:31'),
(7, 'product-edit', 'web', '2021-06-27 10:51:31', '2021-06-27 10:51:31'),
(8, 'product-delete', 'web', '2021-06-27 10:51:31', '2021-06-27 10:51:31');

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
-- Struktur dari tabel `post_adopsi`
--

CREATE TABLE `post_adopsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_post_adopsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_adopsi_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner-adopsi_id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_hewan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_hewan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_ras_hewan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ras_hewan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_post_adps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_post_adps` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_adopsi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_post_adps` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path-storage` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_adopsi` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `size-file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size-hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur-hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_adopsi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_adopsi`
--

INSERT INTO `post_adopsi` (`id`, `nama_post_adopsi`, `owner_adopsi_name`, `owner-adopsi_id`, `nama_jenis_hewan`, `jenis_hewan_id`, `nama_ras_hewan`, `ras_hewan_id`, `jenis_post`, `deskripsi_post_adps`, `lokasi_post_adps`, `syarat_adopsi`, `image_post_adps`, `path-storage`, `status_adopsi`, `created_at`, `updated_at`, `size-file`, `color`, `size-hewan`, `umur-hewan`, `kontak_adopsi`) VALUES
(30, 'tess', 'Admin Role', 1, 'Kucing', 1, 'British Short Hair', 6, 'adopsi', 'begitulah', 'Klaten', 'asdsa', 'kabutomushi-beetle.jpg', 'public/post/adopsi/tess-kabutomushi-beetle.jpg', 'aktif', '2021-07-19 00:28:26', '2021-07-19 00:43:42', '98688', 'Hitam', 'Kecil', 'Kitten', '+628989045550'),
(31, 'Kadal Sana', 'Daffa Raka', 4, 'Anjing', 2, 'Pitbull', 4, 'adopsi', 'DIlepaskan kucing kampung', 'Klaten', 'harus rajin memberi makan', '_99391952_gettyimages-475503632.jpg', 'public/post/adopsi/Kadal Sana-_99391952_gettyimages-475503632.jpg', 'aktif', '2021-07-19 11:09:03', '2021-07-21 23:17:03', '52147', 'Coklat', 'Besar', 'Dewasa', '+628989045550'),
(32, 'Cihuahua', 'Daffa Raka', 4, 'Anjing', 1, 'Pitbull', 6, 'adopsi', 'Anjing lucu imut', 'Klaten', 'Bisa memberi makan dengan baik', 'images.jpeg', 'public/post/adopsi/Cihuahua-images.jpeg', 'aktif', '2021-07-20 01:03:17', '2021-07-20 01:03:17', NULL, 'Hitam', 'Kecil', 'Kitten', '+628989045550');

-- --------------------------------------------------------

--
-- Struktur dari tabel `post_pemacakan`
--

CREATE TABLE `post_pemacakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_post_pemacakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner_pemacakan_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner-pemacakan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_jenis_hewan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_hewan_id` bigint(20) UNSIGNED NOT NULL,
  `nama_ras_hewan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ras_hewan_id` bigint(20) UNSIGNED NOT NULL,
  `jenis_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi_post_pm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lokasi_post_pm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `syarat_pemacakan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_post_pm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_pm` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `path-storage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size-file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size-hewan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `umur-hewan-pm` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kontak_pemacakan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `post_pemacakan`
--

INSERT INTO `post_pemacakan` (`id`, `nama_post_pemacakan`, `owner_pemacakan_name`, `owner-pemacakan_id`, `nama_jenis_hewan`, `jenis_hewan_id`, `nama_ras_hewan`, `ras_hewan_id`, `jenis_post`, `deskripsi_post_pm`, `lokasi_post_pm`, `syarat_pemacakan`, `image_post_pm`, `status_pm`, `created_at`, `updated_at`, `path-storage`, `size-file`, `color`, `size-hewan`, `umur-hewan-pm`, `kontak_pemacakan`) VALUES
(7, 'Gecko', 'Admin Role', 1, 'Anjing', 1, 'Alaskan Malamute', 11, 'pemacakan', 'anu', 'sini', 'sana', '765cc07e8d138453090e15ae17f59f13.jpg', 'aktif', '2021-07-03 02:38:57', '2021-07-03 02:38:57', 'public/post/pemacakan/Gecko-765cc07e8d138453090e15ae17f59f13.jpg', '389622', 'Hitam', 'Kecil', 'Kitten', ''),
(8, 'Ular Putiiiihhhh', 'Daffa Raka', 4, 'Kucing', 2, 'Maine Coon', 4, 'pemacakan', 'Dilepaskan anjing', 'Klaten', 'Tidak nakal', 'Choosing the Best Pet Snake.jpg', 'aktif', '2021-07-20 01:14:36', '2021-07-22 00:09:46', 'public/post/pemacakan/Ular Putiiiihhhh-Choosing the Best Pet Snake.jpg', '33480', 'Hitam', 'Kecil', 'Kitten', '+628989045550'),
(9, 'Lilyalallala', 'Daffa Raka', 4, 'Anjing', 1, 'Cihuahua', 2, 'pemacakan', 'Dicari kucing untuk pasangan kucing saya.', 'Klaten', 'Harus persia', 'anjing3.jpg', 'aktif', '2021-07-20 01:31:51', '2021-07-20 01:37:00', 'public/post/pemacakan/Lilyalallala-anjing3.jpg', '37724', 'Coklat', 'Besar', 'Dewasa', '+6285643156101'),
(10, 'Anjing', 'Daffa Raka', 4, 'Anjing', 1, 'Alaskan Malamute', 11, 'pemacakan', 'asda', 'Klaten', 'sadsaf', 'akcorg.jpg', 'aktif', '2021-07-20 02:48:38', '2021-07-20 02:48:38', 'public/post/pemacakan/Anjing-akcorg.jpg', '40127', 'Hitam', 'Kecil', 'Kitten', '+628989045550'),
(11, 'Anjing', 'Daffa Raka', 4, 'Anjing', 1, 'Alaskan Malamute', 11, 'pemacakan', 'asda', 'Klaten', 'sadsaf', 'akcorg.jpg', 'aktif', '2021-07-20 02:48:39', '2021-07-20 02:48:39', 'public/post/pemacakan/Anjing-akcorg.jpg', '40127', 'Hitam', 'Kecil', 'Kitten', '+628989045550');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ras_hewans`
--

CREATE TABLE `ras_hewans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_ras_hewan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jenis_hewan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `parent_ras_jenis_hewan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `ras_hewans`
--

INSERT INTO `ras_hewans` (`id`, `nama_ras_hewan`, `jenis_hewan_id`, `parent_ras_jenis_hewan`, `created_at`, `updated_at`) VALUES
(2, 'Persia', 2, 'Kucing', NULL, NULL),
(3, 'Pug', 1, 'Anjing', NULL, NULL),
(4, 'Anggora', 2, 'Kucing', NULL, NULL),
(5, 'Maine Coon', 2, 'Kucing', NULL, NULL),
(6, 'Pitbull', 1, 'Anjing', NULL, NULL),
(7, 'Cihuahua', 1, 'Anjing', NULL, NULL),
(9, 'Pomerania', 1, 'Anjing', NULL, NULL),
(10, 'British Short Hair', 2, 'Kucing', NULL, NULL),
(11, 'Alaskan Malamute', 1, 'Anjing', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2021-06-27 10:51:07', '2021-06-27 10:51:07'),
(2, 'user', 'web', '2021-06-27 10:51:07', '2021-06-27 10:51:07'),
(3, 'super-admin', 'web', '2021-06-27 10:51:07', '2021-06-27 10:51:07'),
(4, 'Tes role', 'web', '2021-07-03 11:41:08', '2021-07-03 11:41:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 3),
(1, 4),
(2, 3),
(2, 4),
(3, 3),
(3, 4),
(4, 3),
(4, 4),
(5, 3),
(6, 3),
(7, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Qx93civD3ch4jIaonWPGAApbAiK0QT8q12oVvvUZ', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/96.0.4664.45 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiZDl1bFB2SWYyWTVHSG9KZWhGUGN2Z1Q2aGhValpIOXFiSEtHTUx5VyI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDQ6Imh0dHA6Ly9sb2NhbGhvc3Q6ODAwMC9oZXdhbi1zaWFwYS9hZG1pbi91c2VyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1637681565);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_adopsi`
--

CREATE TABLE `transaksi_adopsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TA_nama_post` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TA_nama_post_id` bigint(20) UNSIGNED DEFAULT NULL,
  `TA_nama_owner_post` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TA_nama_pengaju` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TA_jenis_hewan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TA_ras_hewan` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TA_alamat_pengaju` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TA_contact_pengaju` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `TA_alasan_memilih` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `TA_konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_adopsi`
--

INSERT INTO `transaksi_adopsi` (`id`, `TA_nama_post`, `TA_nama_post_id`, `TA_nama_owner_post`, `TA_nama_pengaju`, `TA_jenis_hewan`, `TA_ras_hewan`, `TA_alamat_pengaju`, `TA_contact_pengaju`, `TA_alasan_memilih`, `created_at`, `updated_at`, `TA_konfirmasi`) VALUES
(59, 'Kucing Kampung', 31, 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Cihuahua', 'Klaten', '+628989045550', 'Karena lucu', '2021-07-20 02:55:34', '2021-07-20 02:55:34', 'diterima'),
(60, 'Kucing Kampung', 31, 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Cihuahua', 'Klaten', '+628989045550', 'Lucu', '2021-07-20 02:56:53', '2021-07-20 02:56:53', 'ditolak'),
(61, 'Kucing Kampung', 31, 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Cihuahua', 'asdsad', '+628989045550', 'asdas', '2021-07-20 03:00:06', '2021-07-20 03:00:06', 'diterima'),
(62, 'tess', 30, 'Admin Role', 'Daffa Raka', 'Kucing', 'British Short Hair', 'sini', '+628989045550', 'Karena Lucu', '2021-07-20 20:30:12', '2021-07-20 20:30:12', 'belum_dikonfirmasi'),
(63, 'Kucing Kampung', 31, 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Cihuahua', 'Klaten', '+628989045550', 'Lucu', '2021-07-20 20:30:36', '2021-07-20 20:30:36', 'belum_dikonfirmasi'),
(64, 'Cihuahua', 32, 'Daffa Raka', 'Admin Role', 'Anjing', 'Pitbull', 'Klaten', '+628989045550', 'xxxxx', '2021-11-23 08:24:21', '2021-11-23 08:24:21', 'belum_dikonfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_pemacakan`
--

CREATE TABLE `transaksi_pemacakan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `TM_nama_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_jenis_hewan_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_ras_hewan_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_nama_post_id` bigint(20) UNSIGNED NOT NULL,
  `TM_nama_owner_post` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_nama_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_jenis_hewan_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_ras_hewan_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_alamat_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_contact_pengaju` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_alasan_memilih` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_gambar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TM_konfirmasi` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `jenis_hewan_id` bigint(20) UNSIGNED NOT NULL,
  `ras_hewan_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `transaksi_pemacakan`
--

INSERT INTO `transaksi_pemacakan` (`id`, `TM_nama_post`, `TM_jenis_hewan_post`, `TM_ras_hewan_post`, `TM_nama_post_id`, `TM_nama_owner_post`, `TM_nama_pengaju`, `TM_jenis_hewan_pengaju`, `TM_ras_hewan_pengaju`, `TM_alamat_pengaju`, `TM_contact_pengaju`, `TM_alasan_memilih`, `TM_gambar`, `TM_konfirmasi`, `created_at`, `updated_at`, `jenis_hewan_id`, `ras_hewan_id`) VALUES
(10, 'Gecko', 'Anjing', 'Alaskan Malamute', 7, 'Admin Role', 'Daffa Raka', 'Anjing', 'Pitbull', 'Satron,Rt 5 Rw 2, Karangdukuh,Jogonalan,Klaten', '09898989', 'Karena cocok dengan hewan peliharaan saya', 'Daffa Raka-033781000_1575535270-Risiko-Makan-Daging-Anjing-bagi-Kesehatan-by-soloway-123rf-36321023_s.jpg', 'ditolak', '2021-07-18 18:49:48', '2021-07-18 18:49:48', 1, 6),
(20, 'Herder', 'Kucing', 'Anggora', 8, 'Daffa Raka', 'Daffa Raka', 'Kucing', 'Anggora', 'Klaten Sleatan', '+628989045550', 'Begitulah', '-1607141405-cara-merawat-kucing-kampung-agar-bulunya-lebat-1.jpg', 'ditolak', '2021-07-20 01:46:06', '2021-07-20 01:46:06', 2, 4),
(21, 'Herder', 'Kucing', 'Anggora', 8, 'Daffa Raka', 'Daffa Raka', 'Kucing', 'Anggora', 'Klaten Sleatan', '+628989045550', 'Begini begitu', '-1607141405-cara-merawat-kucing-kampung-agar-bulunya-lebat-1.jpg', 'diterima', '2021-07-20 02:05:13', '2021-07-20 02:05:13', 2, 4),
(22, 'Herder', 'Kucing', 'Anggora', 8, 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Pitbull', 'Klaten Sleatan', '+628989045550', 'COcok dengan hewan saya', '-depositphotos_29272445-stock-photo-face-of-pitbull-dog.jpg', 'diterima', '2021-07-20 02:54:06', '2021-07-20 02:54:06', 1, 6),
(23, 'Herder', 'Kucing', 'Anggora', 8, 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Pitbull', 'Klaten Sleatan', '+628989045550', 'COcok', '-depositphotos_29272445-stock-photo-face-of-pitbull-dog.jpg', 'ditolak', '2021-07-20 03:04:28', '2021-07-20 03:04:28', 1, 6),
(24, 'Anjing', 'Anjing', 'Alaskan Malamute', 11, 'Daffa Raka', 'Daffa Raka', 'Anjing', 'Cihuahua', 'Klaten Sleatan', '+628989045550', 'begini', '-Choosing the Best Pet Snake.jpg', 'belum_dikonfirmasi', '2021-07-20 20:57:50', '2021-07-20 20:57:50', 1, 7);

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
(1, 'Admin Role', 'admin@role.test', NULL, '$2y$10$z23Dy0iUh5rz4wH2wDgmEevZKpv7oanb/PT6r3bdFtENTgjix5wDG', 'BkaqP8JOctB1PNVB8SDj0mUXbaPaCd8WHnrrrscBp4I0JBFoQpkRJ2L4fxT6', '2021-06-27 10:51:07', '2021-06-27 10:51:07'),
(2, 'User Role', 'user@role.test', NULL, '$2y$10$YxpOY21YaT5J1g0BKFzIEez5i9h38t03l4HNl4a7IUORXxnIOo9ii', NULL, '2021-06-27 10:51:08', '2021-06-27 10:51:08'),
(3, 'Super Admin Role', 'superadmin@role.test', NULL, '$2y$10$Y1VaURhLem.o9A5eToiUIOoxLr9Dfg7RvZMRzBVULPzXvSRCe.hfi', NULL, '2021-06-27 10:51:08', '2021-06-27 10:51:08'),
(4, 'Daffa Raka', 'daffarakals@gmail.com', NULL, '$2y$10$PMmEGcRbyMTY0WpNr4PJ9OpucDfEcFG5raztAVxINC0HgBNPCKQtm', 'aa4jzyD2cWBtzagZJu2tBTTbHBbeN4dC3VKQJXR229t7CO0f7X83kTywTXGm', '2021-06-27 10:52:24', '2021-06-27 10:52:24');

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
-- Indeks untuk tabel `jenis_hewans`
--
ALTER TABLE `jenis_hewans`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `laporan_transaksi_adopsi`
--
ALTER TABLE `laporan_transaksi_adopsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_transaksi_adopsi_post_id_foreign` (`post_id`);

--
-- Indeks untuk tabel `laporan_transaksi_pemacakan`
--
ALTER TABLE `laporan_transaksi_pemacakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `laporan_transaksi_pemacakan_post_id_foreign` (`post_id`);

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
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

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
-- Indeks untuk tabel `post_adopsi`
--
ALTER TABLE `post_adopsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_adopsi_jenis_hewan_id_foreign` (`jenis_hewan_id`),
  ADD KEY `post_adopsi_ras_hewan_id_foreign` (`ras_hewan_id`),
  ADD KEY `post_adopsi_owner_adopsi_id_foreign` (`owner-adopsi_id`);

--
-- Indeks untuk tabel `post_pemacakan`
--
ALTER TABLE `post_pemacakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `post_pemacakan_jenis_hewan_id_foreign` (`jenis_hewan_id`),
  ADD KEY `post_pemacakan_ras_hewan_id_foreign` (`ras_hewan_id`),
  ADD KEY `post_pemacakan_owner_pemacakan_id_foreign` (`owner-pemacakan_id`);

--
-- Indeks untuk tabel `ras_hewans`
--
ALTER TABLE `ras_hewans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ras_hewans_jenis_hewan_id_foreign` (`jenis_hewan_id`);

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
-- Indeks untuk tabel `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indeks untuk tabel `transaksi_adopsi`
--
ALTER TABLE `transaksi_adopsi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_adopsi_ta_nama_post_id_foreign` (`TA_nama_post_id`);

--
-- Indeks untuk tabel `transaksi_pemacakan`
--
ALTER TABLE `transaksi_pemacakan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaksi_pemacakan_jenis_hewan_id_foreign` (`jenis_hewan_id`),
  ADD KEY `transaksi_pemacakan_ras_hewan_id_foreign` (`ras_hewan_id`),
  ADD KEY `transaksi_pemacakan_tm_nama_post_id_foreign` (`TM_nama_post_id`);

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
-- AUTO_INCREMENT untuk tabel `jenis_hewans`
--
ALTER TABLE `jenis_hewans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `laporan_transaksi_adopsi`
--
ALTER TABLE `laporan_transaksi_adopsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;

--
-- AUTO_INCREMENT untuk tabel `laporan_transaksi_pemacakan`
--
ALTER TABLE `laporan_transaksi_pemacakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=393;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `post_adopsi`
--
ALTER TABLE `post_adopsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT untuk tabel `post_pemacakan`
--
ALTER TABLE `post_pemacakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `ras_hewans`
--
ALTER TABLE `ras_hewans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `transaksi_adopsi`
--
ALTER TABLE `transaksi_adopsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `transaksi_pemacakan`
--
ALTER TABLE `transaksi_pemacakan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `laporan_transaksi_adopsi`
--
ALTER TABLE `laporan_transaksi_adopsi`
  ADD CONSTRAINT `laporan_transaksi_adopsi_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post_adopsi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `laporan_transaksi_pemacakan`
--
ALTER TABLE `laporan_transaksi_pemacakan`
  ADD CONSTRAINT `laporan_transaksi_pemacakan_post_id_foreign` FOREIGN KEY (`post_id`) REFERENCES `post_pemacakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Ketidakleluasaan untuk tabel `post_adopsi`
--
ALTER TABLE `post_adopsi`
  ADD CONSTRAINT `post_adopsi_jenis_hewan_id_foreign` FOREIGN KEY (`jenis_hewan_id`) REFERENCES `jenis_hewans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_adopsi_owner_adopsi_id_foreign` FOREIGN KEY (`owner-adopsi_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_adopsi_ras_hewan_id_foreign` FOREIGN KEY (`ras_hewan_id`) REFERENCES `ras_hewans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `post_pemacakan`
--
ALTER TABLE `post_pemacakan`
  ADD CONSTRAINT `post_pemacakan_jenis_hewan_id_foreign` FOREIGN KEY (`jenis_hewan_id`) REFERENCES `jenis_hewans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_pemacakan_owner_pemacakan_id_foreign` FOREIGN KEY (`owner-pemacakan_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_pemacakan_ras_hewan_id_foreign` FOREIGN KEY (`ras_hewan_id`) REFERENCES `ras_hewans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ras_hewans`
--
ALTER TABLE `ras_hewans`
  ADD CONSTRAINT `ras_hewans_jenis_hewan_id_foreign` FOREIGN KEY (`jenis_hewan_id`) REFERENCES `jenis_hewans` (`id`);

--
-- Ketidakleluasaan untuk tabel `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_adopsi`
--
ALTER TABLE `transaksi_adopsi`
  ADD CONSTRAINT `transaksi_adopsi_ta_nama_post_id_foreign` FOREIGN KEY (`TA_nama_post_id`) REFERENCES `post_adopsi` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_pemacakan`
--
ALTER TABLE `transaksi_pemacakan`
  ADD CONSTRAINT `transaksi_pemacakan_jenis_hewan_id_foreign` FOREIGN KEY (`jenis_hewan_id`) REFERENCES `jenis_hewans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pemacakan_ras_hewan_id_foreign` FOREIGN KEY (`ras_hewan_id`) REFERENCES `ras_hewans` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `transaksi_pemacakan_tm_nama_post_id_foreign` FOREIGN KEY (`TM_nama_post_id`) REFERENCES `post_pemacakan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
