-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 02, 2019 at 02:13 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `atribut_barang`
--

CREATE TABLE `atribut_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL COMMENT 'warna, ukuran, dll',
  `store_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` text,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `admin_id` varchar(255) NOT NULL,
  `mulai_berlaku` date DEFAULT NULL,
  `akhir_berlaku` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `daerah`
--

CREATE TABLE `daerah` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `daerah_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `left` int(11) DEFAULT NULL COMMENT '	',
  `right` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_koreksi_stok`
--

CREATE TABLE `detil_koreksi_stok` (
  `id` varchar(255) NOT NULL,
  `koreksi_stok_id` varchar(255) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `stok_lalu` int(11) DEFAULT '0',
  `stok_kini` int(11) DEFAULT '0',
  `selisih` int(11) DEFAULT '0',
  `alasan` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `stok_expired` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_mutasi_keluar`
--

CREATE TABLE `detil_mutasi_keluar` (
  `id` varchar(255) NOT NULL,
  `mutasi_keluar_id` varchar(255) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_mutasi_stok`
--

CREATE TABLE `detil_mutasi_stok` (
  `id` varchar(255) NOT NULL,
  `tb_mutasi_stok_id` varchar(255) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_pembelian`
--

CREATE TABLE `detil_pembelian` (
  `id` varchar(255) NOT NULL,
  `pembelian_id` varchar(255) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `ppn` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `sub_total` int(11) NOT NULL,
  `tanggal_kadaluarsa` date DEFAULT NULL,
  `tanggal_manufacture` date DEFAULT NULL,
  `nomor_batch` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detil_penjualan`
--

CREATE TABLE `detil_penjualan` (
  `id` varchar(255) NOT NULL,
  `penjualan_id` varchar(255) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `harga_beli` int(11) DEFAULT '0',
  `jumlah` int(11) DEFAULT '0',
  `ppn` int(11) DEFAULT '0',
  `margin` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT '0',
  `diskon` int(11) DEFAULT '0',
  `sub_total` int(11) DEFAULT '0',
  `racikan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `id` int(11) NOT NULL,
  `kode` varchar(45) DEFAULT NULL,
  `nama` varchar(45) DEFAULT NULL,
  `kode_kupon` varchar(255) DEFAULT NULL,
  `start_from` datetime DEFAULT NULL,
  `valid_until` date DEFAULT NULL,
  `produk_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_rules`
--

CREATE TABLE `discount_rules` (
  `id` int(11) NOT NULL,
  `discount_id` int(11) NOT NULL,
  `discount_rules_category_id` int(11) NOT NULL COMMENT 'mempengaruhi rulenya.\\nmisalnya beli barang dapat barang : beli taro 2 dapat es teh 1 (req : 2; val: 1)\\ntotal belanja : total belanja 300k dapat diskon 5% (req : 300k; val: 5)\\nbeli tiga lebih murah : beli 3 indomie harga 5000 (req : 3; val: 5000)',
  `requirement` decimal(18,2) DEFAULT NULL,
  `value` decimal(18,2) DEFAULT NULL,
  `stack_with_other_disc` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `discount_rules_category`
--

CREATE TABLE `discount_rules_category` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) DEFAULT NULL COMMENT 'misalnya beli barang dapat barang : beli taro 2 dapat es teh 1',
  `store_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `distributor`
--

CREATE TABLE `distributor` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `harga_jual`
--

CREATE TABLE `harga_jual` (
  `id` int(11) NOT NULL,
  `start_from` datetime DEFAULT NULL,
  `valid_until` datetime DEFAULT NULL,
  `value` decimal(18,2) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `site_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `diskon_persen` decimal(18,2) DEFAULT NULL,
  `margin_persen` decimal(18,2) DEFAULT NULL,
  `tunai` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jenis_transaksi_penjualan`
--

CREATE TABLE `jenis_transaksi_penjualan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `margin_persen` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kartu_stok`
--

CREATE TABLE `kartu_stok` (
  `id` varchar(255) NOT NULL,
  `site_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `uraian` varchar(50) DEFAULT NULL,
  `keluar` int(11) DEFAULT NULL,
  `masuk` int(11) DEFAULT NULL,
  `sisa_stok` int(11) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `kode_bukti` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `parent_kategori_id` int(11) DEFAULT NULL,
  `left` int(11) DEFAULT NULL,
  `right` int(11) DEFAULT NULL,
  `nesting` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `konversi_satuan_produk`
--

CREATE TABLE `konversi_satuan_produk` (
  `id` int(11) NOT NULL,
  `from_satuan_id` int(11) NOT NULL,
  `to_satuan_id` int(11) NOT NULL,
  `multiplier` int(11) DEFAULT NULL COMMENT 'rulenya selalu dari kecil ke besar.\\nmisalnya dari bijian ke dozen.\\n1 dozen = 12 biji.\\nmaka diisi 12.\\n\\njadi dalam pemogramannya, ketika kita memilih produk, maka kita pasti akan dapat satuan terkecilnya.\\n\\nsetelah itu bisa dengan rekursif kita dapatkan satuan setingkat diatasnya dst.\\n\\ntabel konversi satuan ini hanya untuk mempermudah tampilan pada saat input dan membuat report user nantinya. sehingga tidak berpengaruh pada isi database',
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `koreksi_stok`
--

CREATE TABLE `koreksi_stok` (
  `id` varchar(255) NOT NULL,
  `site_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_mulai`
--

CREATE TABLE `log_mulai` (
  `id` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `log_selesai`
--

CREATE TABLE `log_selesai` (
  `id` varchar(255) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_keluar`
--

CREATE TABLE `mutasi_keluar` (
  `id` varchar(255) NOT NULL,
  `site_id` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `mutasi_stok`
--

CREATE TABLE `mutasi_stok` (
  `id` varchar(255) NOT NULL,
  `faktur_mutasi_stok` varchar(255) DEFAULT NULL,
  `site_asal_id` int(11) NOT NULL,
  `site_tujuan_id` int(11) NOT NULL,
  `keterangan` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(50) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `users_id` varchar(255) DEFAULT NULL,
  `point` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `jenis_kelamin`, `tanggal_lahir`, `pekerjaan`, `alamat`, `created_at`, `updated_at`, `deleted_at`, `site_id`, `users_id`, `point`) VALUES
('3caefbb9-47f1-4b72-b896-03df87fc9b12', 'pria', '1997-02-21', 'mahasiswa', 'sdafafa', '2018-12-19 20:41:05', '2018-12-19 20:41:05', NULL, NULL, 'c271732b-1581-45d5-8501-3c51b4f9405b', 0),
('63ea9d5c-dd75-427c-a8f7-6cc5a2ce0978', 'pria', '1997-02-21', 'mahasiswa', 'sdafafa', '2018-12-18 22:38:12', '2018-12-18 22:38:12', NULL, NULL, 'c45c3a97-6e7e-4193-a36c-7bf203c1e7ff', 0),
('dd6975c1-bf15-4dad-8bbf-161f246a15f0', 'pria', '1997-02-21', 'mahasiswa', 'sdafafa', '2018-12-18 22:42:41', '2018-12-18 22:42:41', NULL, NULL, '2811c949-b050-47ff-86d7-7827e08661ff', 0);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan_has_voucher`
--

CREATE TABLE `pelanggan_has_voucher` (
  `id` int(11) NOT NULL,
  `pelanggan_id` varchar(255) NOT NULL,
  `voucher_id` int(11) NOT NULL,
  `point` int(11) DEFAULT NULL,
  `users_id` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT '	',
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id` varchar(255) NOT NULL,
  `faktur_pembelian` varchar(50) NOT NULL,
  `faktur_distributor` varchar(50) DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `distributor_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `tanggal_faktur` date DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_has_jenis_pembayaran`
--

CREATE TABLE `pembelian_has_jenis_pembayaran` (
  `pembelian_id` varchar(255) NOT NULL,
  `jenis_pembayaran_id` int(11) NOT NULL,
  `nomor_referensi` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id` varchar(255) NOT NULL,
  `faktur_penjualan` varchar(50) NOT NULL,
  `pelanggan_id` varchar(255) DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `nomor_resep` varchar(50) DEFAULT NULL,
  `tanggal_jatuh_tempo` date DEFAULT NULL,
  `ppn` int(11) DEFAULT NULL,
  `diskon` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `jenis_transaksi_penjualan_id` int(11) NOT NULL,
  `bayar` int(11) DEFAULT '0',
  `users_id` varchar(255) NOT NULL,
  `point` int(11) DEFAULT NULL,
  `scan_bukti` varchar(255) DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penjualan_has_jenis_pembayaran`
--

CREATE TABLE `penjualan_has_jenis_pembayaran` (
  `penjualan_id` varchar(255) NOT NULL,
  `jenis_pembayaran_id` int(11) NOT NULL,
  `bank_id` int(11) DEFAULT NULL,
  `nomor_referensi` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `barcode` varchar(255) DEFAULT NULL,
  `produsen_id` int(11) DEFAULT NULL,
  `jenis_barang_id` int(11) DEFAULT NULL,
  `kategori_barang_id` int(11) DEFAULT NULL,
  `satuan_terkecil` int(11) NOT NULL,
  `ppn_persen` decimal(18,2) DEFAULT '0.00',
  `margin_persen` decimal(18,2) DEFAULT '0.00',
  `diskon_persen` decimal(18,2) DEFAULT '0.00',
  `stok_minimal` int(11) NOT NULL DEFAULT '3',
  `default_input` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `distributor_id` int(11) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `pembelian` smallint(6) DEFAULT '0',
  `penjualan` smallint(6) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_has_atribut_barang`
--

CREATE TABLE `produk_has_atribut_barang` (
  `produk_id` int(11) NOT NULL,
  `atribut_barang_id` int(11) NOT NULL,
  `value` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk_has_raw`
--

CREATE TABLE `produk_has_raw` (
  `produk_id` int(11) NOT NULL,
  `produk_raw_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produsen`
--

CREATE TABLE `produsen` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` longtext,
  `kota` varchar(50) DEFAULT NULL,
  `kontak` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produsen`
--

INSERT INTO `produsen` (`id`, `nama`, `alamat`, `kota`, `kontak`, `created_at`, `updated_at`, `deleted_at`, `store_id`) VALUES
(2, 'bayu', 'Jl.Biawan', 'Samarinda', '075893788', '2018-12-02 06:28:31', '2018-12-02 06:28:31', NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `promosi`
--

CREATE TABLE `promosi` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `isi` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `mulai_promosi` datetime DEFAULT NULL,
  `akhir_promosi` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `promosi`
--

INSERT INTO `promosi` (`id`, `judul`, `isi`, `foto`, `mulai_promosi`, `akhir_promosi`, `created_at`, `updated_at`, `deleted_at`, `users_id`) VALUES
(1, 'promo akhir tahun', 'buy one get one', 'promo-akhir-tahun.png', '2018-12-19 00:00:00', '2019-01-01 00:00:00', '2018-12-19 03:59:43', '2018-12-19 03:59:43', NULL, '56508208-f517-11e8-baca-382c4a81e975');

-- --------------------------------------------------------

--
-- Table structure for table `return_pembelian`
--

CREATE TABLE `return_pembelian` (
  `id` varchar(255) NOT NULL,
  `detil_pembelian_id` varchar(255) NOT NULL,
  `jumlah_return` int(11) DEFAULT NULL,
  `total_return` int(11) DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `terima_return` smallint(6) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `return_penjualan`
--

CREATE TABLE `return_penjualan` (
  `id` varchar(255) NOT NULL,
  `detil_penjualan_id` varchar(255) NOT NULL,
  `jumlah_return` int(11) DEFAULT NULL,
  `total_return` int(11) DEFAULT NULL,
  `alasan` varchar(100) DEFAULT NULL,
  `kode_admin` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `site_id` int(11) NOT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Admin', NULL, '2019-02-12 16:00:00', NULL),
(2, 'kasir', 'Kasir', NULL, NULL, NULL),
(3, 'pelanggan', 'Pelanggan', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_user`
--

CREATE TABLE `role_user` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `satuan_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `shift_kerja`
--

CREATE TABLE `shift_kerja` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `site`
--

CREATE TABLE `site` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `store_id` int(11) NOT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `daerah_id` int(11) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `site`
--

INSERT INTO `site` (`id`, `kode`, `store_id`, `nama`, `kontak`, `alamat`, `created_at`, `updated_at`, `deleted_at`, `daerah_id`, `foto`) VALUES
(1, '6e7q64gd', 1, 'Samarinda Sebrang', '09232424', 'Jl.kamu', '2018-12-19 19:23:34', '2018-12-19 20:32:19', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sms_otp`
--

CREATE TABLE `sms_otp` (
  `id` int(11) NOT NULL,
  `number` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `users_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stok`
--

CREATE TABLE `stok` (
  `site_id` int(11) NOT NULL,
  `produk_id` int(11) NOT NULL,
  `jumlah` int(11) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `kontak` varchar(255) DEFAULT NULL,
  `alamat` varchar(225) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`id`, `kode`, `nama`, `kontak`, `alamat`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '45', 'A', '0854522412', 'Jl.kamu', '2018-12-10 04:07:16', '2018-12-10 04:07:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_token` varchar(255) DEFAULT NULL,
  `site_id` int(11) DEFAULT NULL,
  `shift_kerja_id` int(11) DEFAULT NULL,
  `kontak` varchar(45) NOT NULL,
  `token_device` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`, `verified`, `verification_token`, `site_id`, `shift_kerja_id`, `kontak`, `token_device`, `foto`) VALUES
('2811c949-b050-47ff-86d7-7827e08661ff', 'arie', 'ariesyarwani251@gmail.com', '$2y$10$3LIHyt2oYHwc9ojKHYN6Je671Hp38kzoEtC67kMVEv4cBpyyrKqgi', NULL, '2018-12-18 22:42:41', '2018-12-18 22:42:41', NULL, 0, NULL, NULL, NULL, '09234433', NULL, NULL),
('56508208-f517-11e8-baca-382c4a81e975', 'arsy', 'ariesyarwani21@gmail.com', '$2y$10$TKhxCVEEziTuYRt7oEwo6OL9UZlCNVAJFrD551HaBnlI4skyr3tQe', 'QgJ78HaxENDI32FvYUlFxhTYDY5y3SAigktLNTKedh1xwi2YksJZdnPiZhbK', '2018-11-30 19:15:21', '2018-11-30 19:15:21', NULL, 0, NULL, NULL, NULL, '08986881047', NULL, NULL),
('8481bb34-fc23-11e8-8792-0a0027000014', 'novi', 'novi@gmail.com', '$2y$10$tLbpaAIzSUx5P0IjgF5Vx.f9H4Um1O3jclYZzq/LxjJD/H9AGncI.', 'PCC3kZQs2veJgeq5e1n0mmLkprFIK6TCbGEa8SXUg6yb1bz1eILfUv542g4a', '2018-12-09 18:30:11', '2018-12-09 18:30:11', NULL, 0, NULL, NULL, NULL, '09232424', NULL, NULL),
('b7de6cac-fc23-11e8-b89a-0a0027000014', 'gina', 'gina@gmail.com', '$2y$10$JJE8KQ3bm0jbesd9kV5WjOo5glx60dWnsmQ5giGEIT6RpWO4Hm1sK', NULL, '2018-12-09 18:31:37', '2018-12-09 18:31:37', NULL, 0, NULL, NULL, NULL, '081231314', NULL, NULL),
('c271732b-1581-45d5-8501-3c51b4f9405b', 'arie', 'ariesyarwani2510@gmail.com', '$2y$10$uV.B1lp721D/aCVn7uyjruxntGcmK5Li48ZmfeaIj6mtab9DlPt2a', NULL, '2018-12-19 20:41:05', '2018-12-19 20:41:05', NULL, 0, NULL, NULL, NULL, '092344337', NULL, NULL),
('c45c3a97-6e7e-4193-a36c-7bf203c1e7ff', 'arie', 'ariesyarwani25@gmail.com', '$2y$10$FVv4rlcC6nUpAf0X14FzHO..UzckL2/.LsigTagkNmcdiOWl.FMPO', NULL, '2018-12-18 22:38:11', '2018-12-18 22:38:12', NULL, 0, NULL, NULL, NULL, '0923443', NULL, NULL),
('f04e5573-0161-4791-b85d-48b050ae4bb8', 'arie', 'ariesyarwani22@gmail.com', '$2y$10$ryT5U1MDwaoCpo7WWojlQu0JVSG/QOdKwjBwB2ACOxvXzAEnPGmxm', NULL, '2018-12-18 22:26:39', '2018-12-18 22:26:39', NULL, 0, NULL, NULL, NULL, '0923443', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `voucher`
--

CREATE TABLE `voucher` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `admin_id` varchar(255) NOT NULL,
  `mulai_berlaku` date DEFAULT NULL,
  `akhir_berlaku` date DEFAULT NULL,
  `point` int(11) DEFAULT '0',
  `promo_awal` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `voucher`
--

INSERT INTO `voucher` (`id`, `nama`, `foto`, `keterangan`, `created_at`, `updated_at`, `deleted_at`, `admin_id`, `mulai_berlaku`, `akhir_berlaku`, `point`, `promo_awal`) VALUES
(1, '50.000', 'FreshLinkLogo.png', 'belanja di atas rp.100.000', '2018-12-19 04:01:08', '2018-12-19 04:01:08', NULL, '', NULL, NULL, 10, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `atribut_barang`
--
ALTER TABLE `atribut_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_atribut_barang_store1_idx` (`store_id`);

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_bank_store1_idx` (`store_id`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_reward_users1_idx` (`admin_id`);

--
-- Indexes for table `daerah`
--
ALTER TABLE `daerah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_daerah_daerah1_idx` (`daerah_id`);

--
-- Indexes for table `detil_koreksi_stok`
--
ALTER TABLE `detil_koreksi_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detil_koreksi_stok_koreksi_stok1_idx` (`koreksi_stok_id`),
  ADD KEY `fk_detil_koreksi_stok_barang1_idx` (`produk_id`),
  ADD KEY `fk_detil_koreksi_stok_satuan1_idx` (`satuan_id`);

--
-- Indexes for table `detil_mutasi_keluar`
--
ALTER TABLE `detil_mutasi_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detil_mutasi_keluar_mutasi_keluar1_idx` (`mutasi_keluar_id`),
  ADD KEY `fk_detil_mutasi_keluar_barang1_idx` (`produk_id`),
  ADD KEY `fk_detil_mutasi_keluar_satuan1_idx` (`satuan_id`);

--
-- Indexes for table `detil_mutasi_stok`
--
ALTER TABLE `detil_mutasi_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detil_mutasi_stok_barang1_idx` (`produk_id`),
  ADD KEY `fk_detil_mutasi_stok_tb_mutasi_stok1_idx` (`tb_mutasi_stok_id`),
  ADD KEY `fk_detil_mutasi_stok_satuan1_idx` (`satuan_id`);

--
-- Indexes for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembelian_detil_pembelian1_idx` (`pembelian_id`),
  ADD KEY `fk_pembelian_detil_barang1_idx` (`produk_id`),
  ADD KEY `fk_pembelian_detil_satuan1_idx` (`satuan_id`);

--
-- Indexes for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detil_penjualan_penjualan1_idx` (`penjualan_id`),
  ADD KEY `fk_detil_penjualan_barang1_idx` (`produk_id`),
  ADD KEY `fk_detil_penjualan_satuan1_idx` (`satuan_id`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_discount_barang1_idx` (`produk_id`),
  ADD KEY `fk_discount_site1_idx` (`site_id`);

--
-- Indexes for table `discount_rules`
--
ALTER TABLE `discount_rules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_discount_rules_discount_rules_category1_idx` (`discount_rules_category_id`),
  ADD KEY `fk_discount_rules_Discount1_idx` (`discount_id`);

--
-- Indexes for table `discount_rules_category`
--
ALTER TABLE `discount_rules_category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_discount_rules_category_store1_idx` (`store_id`);

--
-- Indexes for table `distributor`
--
ALTER TABLE `distributor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `harga_jual`
--
ALTER TABLE `harga_jual`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_harga_store1_idx` (`store_id`),
  ADD KEY `fk_harga_site1_idx` (`site_id`),
  ADD KEY `fk_harga_barang1_idx` (`produk_id`);

--
-- Indexes for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenis_barang_store1_idx` (`store_id`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_transaksi_penjualan`
--
ALTER TABLE `jenis_transaksi_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jenis_transaksi_penjualan_store1_idx` (`store_id`);

--
-- Indexes for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kartu_stok_store1_idx` (`site_id`),
  ADD KEY `fk_kartu_stok_barang1_idx` (`produk_id`),
  ADD KEY `fk_kartu_stok_users1_idx` (`users_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kategori_kategori_idx` (`parent_kategori_id`),
  ADD KEY `fk_kategori_store1_idx` (`store_id`);

--
-- Indexes for table `konversi_satuan_produk`
--
ALTER TABLE `konversi_satuan_produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_konversi_satuan_produk_satuan1_idx` (`from_satuan_id`),
  ADD KEY `fk_konversi_satuan_produk_satuan2_idx` (`to_satuan_id`);

--
-- Indexes for table `koreksi_stok`
--
ALTER TABLE `koreksi_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_koreksi_stok_store1_idx` (`site_id`),
  ADD KEY `fk_koreksi_stok_users1_idx` (`users_id`);

--
-- Indexes for table `log_mulai`
--
ALTER TABLE `log_mulai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_mulai_users1_idx` (`users_id`);

--
-- Indexes for table `log_selesai`
--
ALTER TABLE `log_selesai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_log_selesai_users1_idx` (`users_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mutasi_keluar`
--
ALTER TABLE `mutasi_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mutasi_keluar_store1_idx` (`site_id`),
  ADD KEY `fk_mutasi_keluar_users1_idx` (`users_id`);

--
-- Indexes for table `mutasi_stok`
--
ALTER TABLE `mutasi_stok`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_mutasi_stok_store1_idx` (`site_asal_id`),
  ADD KEY `fk_mutasi_stok_store2_idx` (`site_tujuan_id`),
  ADD KEY `fk_mutasi_stok_users1_idx` (`users_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelanggan_store1_idx` (`site_id`),
  ADD KEY `fk_pelanggan_users1_idx` (`users_id`);

--
-- Indexes for table `pelanggan_has_voucher`
--
ALTER TABLE `pelanggan_has_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pelanggan_has_reward_reward1_idx` (`voucher_id`),
  ADD KEY `fk_pelanggan_has_reward_pelanggan1_idx` (`pelanggan_id`),
  ADD KEY `fk_pelanggan_has_reward_users1_idx` (`users_id`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faktur_pembelian_UNIQUE` (`faktur_pembelian`),
  ADD KEY `fk_tb_pembelian_distributor1_idx` (`distributor_id`),
  ADD KEY `fk_pembelian_store1_idx` (`site_id`),
  ADD KEY `fk_pembelian_users1_idx` (`users_id`);

--
-- Indexes for table `pembelian_has_jenis_pembayaran`
--
ALTER TABLE `pembelian_has_jenis_pembayaran`
  ADD PRIMARY KEY (`pembelian_id`,`jenis_pembayaran_id`),
  ADD KEY `fk_pembelian_has_jenis_pembayaran_jenis_pembayaran1_idx` (`jenis_pembayaran_id`),
  ADD KEY `fk_pembelian_has_jenis_pembayaran_pembelian1_idx` (`pembelian_id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `faktur_penjualan_UNIQUE` (`faktur_penjualan`),
  ADD KEY `fk_penjualan_pelanggan1_idx` (`pelanggan_id`),
  ADD KEY `fk_penjualan_store1_idx` (`site_id`),
  ADD KEY `fk_penjualan_jenis_transaksi_penjualan1_idx` (`jenis_transaksi_penjualan_id`),
  ADD KEY `fk_penjualan_users1_idx` (`users_id`);

--
-- Indexes for table `penjualan_has_jenis_pembayaran`
--
ALTER TABLE `penjualan_has_jenis_pembayaran`
  ADD PRIMARY KEY (`penjualan_id`,`jenis_pembayaran_id`),
  ADD KEY `fk_penjualan_has_jenis_pembayaran_jenis_pembayaran1_idx` (`jenis_pembayaran_id`),
  ADD KEY `fk_penjualan_has_jenis_pembayaran_penjualan1_idx` (`penjualan_id`),
  ADD KEY `fk_penjualan_has_jenis_pembayaran_bank1_idx` (`bank_id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_barang_produsen1_idx` (`produsen_id`),
  ADD KEY `fk_barang_jenis1_idx` (`jenis_barang_id`),
  ADD KEY `fk_barang_kategori1_idx` (`kategori_barang_id`),
  ADD KEY `fk_barang_distributor1_idx` (`distributor_id`),
  ADD KEY `fk_barang_store1_idx` (`store_id`),
  ADD KEY `fk_barang_satuan2_idx` (`satuan_terkecil`);

--
-- Indexes for table `produk_has_atribut_barang`
--
ALTER TABLE `produk_has_atribut_barang`
  ADD PRIMARY KEY (`produk_id`,`atribut_barang_id`),
  ADD KEY `fk_barang_has_atribut_barang_atribut_barang1_idx` (`atribut_barang_id`),
  ADD KEY `fk_barang_has_atribut_barang_barang1_idx` (`produk_id`);

--
-- Indexes for table `produk_has_raw`
--
ALTER TABLE `produk_has_raw`
  ADD PRIMARY KEY (`produk_id`,`produk_raw_id`),
  ADD KEY `fk_produk_has_produk_produk2_idx` (`produk_raw_id`),
  ADD KEY `fk_produk_has_produk_produk1_idx` (`produk_id`),
  ADD KEY `fk_produk_has_produk_users1_idx` (`users_id`);

--
-- Indexes for table `produsen`
--
ALTER TABLE `produsen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_produsen_store1_idx` (`store_id`);

--
-- Indexes for table `promosi`
--
ALTER TABLE `promosi`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`foto`),
  ADD KEY `fk_promosi_users1_idx` (`users_id`);

--
-- Indexes for table `return_pembelian`
--
ALTER TABLE `return_pembelian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_return_pembelian_detil_pembelian1_idx` (`detil_pembelian_id`),
  ADD KEY `fk_return_pembelian_store1_idx` (`site_id`),
  ADD KEY `fk_return_pembelian_users1_idx` (`users_id`);

--
-- Indexes for table `return_penjualan`
--
ALTER TABLE `return_penjualan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_return_penjualan_detil_penjualan1_idx` (`detil_penjualan_id`),
  ADD KEY `fk_return_penjualan_store1_idx` (`site_id`),
  ADD KEY `fk_return_penjualan_users1_idx` (`users_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`role_id`,`user_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`),
  ADD KEY `fk_role_user_users1_idx` (`user_id`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_satuan_satuan1_idx` (`satuan_id`);

--
-- Indexes for table `shift_kerja`
--
ALTER TABLE `shift_kerja`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site`
--
ALTER TABLE `site`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`),
  ADD KEY `fk_site_store2_idx` (`store_id`),
  ADD KEY `fk_site_daerah1_idx` (`daerah_id`);

--
-- Indexes for table `sms_otp`
--
ALTER TABLE `sms_otp`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`status`),
  ADD KEY `fk_reward_users1_idx` (`users_id`);

--
-- Indexes for table `stok`
--
ALTER TABLE `stok`
  ADD KEY `fk_store_has_barang_barang1_idx` (`produk_id`),
  ADD KEY `fk_store_has_barang_store1_idx` (`site_id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`nama`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `fk_users_store1_idx` (`site_id`),
  ADD KEY `fk_users_shift_kerja1_idx` (`shift_kerja_id`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama_UNIQUE` (`foto`),
  ADD KEY `fk_reward_users1_idx` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `atribut_barang`
--
ALTER TABLE `atribut_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `daerah`
--
ALTER TABLE `daerah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `discount_rules`
--
ALTER TABLE `discount_rules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `distributor`
--
ALTER TABLE `distributor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jenis_transaksi_penjualan`
--
ALTER TABLE `jenis_transaksi_penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pelanggan_has_voucher`
--
ALTER TABLE `pelanggan_has_voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produsen`
--
ALTER TABLE `produsen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `promosi`
--
ALTER TABLE `promosi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shift_kerja`
--
ALTER TABLE `shift_kerja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `site`
--
ALTER TABLE `site`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sms_otp`
--
ALTER TABLE `sms_otp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `atribut_barang`
--
ALTER TABLE `atribut_barang`
  ADD CONSTRAINT `fk_atribut_barang_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `bank`
--
ALTER TABLE `bank`
  ADD CONSTRAINT `fk_bank_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `fk_reward_users100` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `daerah`
--
ALTER TABLE `daerah`
  ADD CONSTRAINT `fk_daerah_daerah1` FOREIGN KEY (`daerah_id`) REFERENCES `daerah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detil_koreksi_stok`
--
ALTER TABLE `detil_koreksi_stok`
  ADD CONSTRAINT `fk_detil_koreksi_stok_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detil_koreksi_stok_koreksi_stok1` FOREIGN KEY (`koreksi_stok_id`) REFERENCES `koreksi_stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detil_koreksi_stok_satuan1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detil_mutasi_keluar`
--
ALTER TABLE `detil_mutasi_keluar`
  ADD CONSTRAINT `fk_detil_mutasi_keluar_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detil_mutasi_keluar_mutasi_keluar1` FOREIGN KEY (`mutasi_keluar_id`) REFERENCES `mutasi_keluar` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detil_mutasi_keluar_satuan1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detil_mutasi_stok`
--
ALTER TABLE `detil_mutasi_stok`
  ADD CONSTRAINT `fk_detil_mutasi_stok_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detil_mutasi_stok_satuan1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_detil_mutasi_stok_tb_mutasi_stok1` FOREIGN KEY (`tb_mutasi_stok_id`) REFERENCES `mutasi_stok` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detil_pembelian`
--
ALTER TABLE `detil_pembelian`
  ADD CONSTRAINT `fk_pembelian_detil_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembelian_detil_pembelian1` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_pembelian_detil_satuan1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detil_penjualan`
--
ALTER TABLE `detil_penjualan`
  ADD CONSTRAINT `fk_detil_penjualan_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detil_penjualan_penjualan1` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_detil_penjualan_satuan1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `fk_discount_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_discount_site1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discount_rules`
--
ALTER TABLE `discount_rules`
  ADD CONSTRAINT `fk_discount_rules_Discount1` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_discount_rules_discount_rules_category1` FOREIGN KEY (`discount_rules_category_id`) REFERENCES `discount_rules_category` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `discount_rules_category`
--
ALTER TABLE `discount_rules_category`
  ADD CONSTRAINT `fk_discount_rules_category_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `harga_jual`
--
ALTER TABLE `harga_jual`
  ADD CONSTRAINT `fk_harga_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_harga_site1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_harga_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD CONSTRAINT `fk_jenis_barang_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `jenis_transaksi_penjualan`
--
ALTER TABLE `jenis_transaksi_penjualan`
  ADD CONSTRAINT `fk_jenis_transaksi_penjualan_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kartu_stok`
--
ALTER TABLE `kartu_stok`
  ADD CONSTRAINT `fk_kartu_stok_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kartu_stok_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kartu_stok_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `fk_kategori_kategori` FOREIGN KEY (`parent_kategori_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_kategori_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `konversi_satuan_produk`
--
ALTER TABLE `konversi_satuan_produk`
  ADD CONSTRAINT `fk_konversi_satuan_produk_satuan1` FOREIGN KEY (`from_satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_konversi_satuan_produk_satuan2` FOREIGN KEY (`to_satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `koreksi_stok`
--
ALTER TABLE `koreksi_stok`
  ADD CONSTRAINT `fk_koreksi_stok_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_koreksi_stok_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log_mulai`
--
ALTER TABLE `log_mulai`
  ADD CONSTRAINT `fk_log_mulai_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `log_selesai`
--
ALTER TABLE `log_selesai`
  ADD CONSTRAINT `fk_log_selesai_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mutasi_keluar`
--
ALTER TABLE `mutasi_keluar`
  ADD CONSTRAINT `fk_mutasi_keluar_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mutasi_keluar_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `mutasi_stok`
--
ALTER TABLE `mutasi_stok`
  ADD CONSTRAINT `fk_mutasi_stok_store1` FOREIGN KEY (`site_asal_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mutasi_stok_store2` FOREIGN KEY (`site_tujuan_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mutasi_stok_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD CONSTRAINT `fk_pelanggan_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelanggan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pelanggan_has_voucher`
--
ALTER TABLE `pelanggan_has_voucher`
  ADD CONSTRAINT `fk_pelanggan_has_reward_pelanggan1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelanggan_has_reward_reward1` FOREIGN KEY (`voucher_id`) REFERENCES `voucher` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pelanggan_has_reward_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `fk_pembelian_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembelian_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tb_pembelian_distributor1` FOREIGN KEY (`distributor_id`) REFERENCES `distributor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembelian_has_jenis_pembayaran`
--
ALTER TABLE `pembelian_has_jenis_pembayaran`
  ADD CONSTRAINT `fk_pembelian_has_jenis_pembayaran_jenis_pembayaran1` FOREIGN KEY (`jenis_pembayaran_id`) REFERENCES `jenis_pembayaran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembelian_has_jenis_pembayaran_pembelian1` FOREIGN KEY (`pembelian_id`) REFERENCES `pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `fk_penjualan_jenis_transaksi_penjualan1` FOREIGN KEY (`jenis_transaksi_penjualan_id`) REFERENCES `jenis_transaksi_penjualan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_pelanggan1` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `penjualan_has_jenis_pembayaran`
--
ALTER TABLE `penjualan_has_jenis_pembayaran`
  ADD CONSTRAINT `fk_penjualan_has_jenis_pembayaran_bank1` FOREIGN KEY (`bank_id`) REFERENCES `bank` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_has_jenis_pembayaran_jenis_pembayaran1` FOREIGN KEY (`jenis_pembayaran_id`) REFERENCES `jenis_pembayaran` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_penjualan_has_jenis_pembayaran_penjualan1` FOREIGN KEY (`penjualan_id`) REFERENCES `penjualan` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_barang_distributor1` FOREIGN KEY (`distributor_id`) REFERENCES `distributor` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_jenis1` FOREIGN KEY (`jenis_barang_id`) REFERENCES `jenis_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_kategori1` FOREIGN KEY (`kategori_barang_id`) REFERENCES `kategori` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_produsen1` FOREIGN KEY (`produsen_id`) REFERENCES `produsen` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_satuan2` FOREIGN KEY (`satuan_terkecil`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk_has_atribut_barang`
--
ALTER TABLE `produk_has_atribut_barang`
  ADD CONSTRAINT `fk_barang_has_atribut_barang_atribut_barang1` FOREIGN KEY (`atribut_barang_id`) REFERENCES `atribut_barang` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_barang_has_atribut_barang_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produk_has_raw`
--
ALTER TABLE `produk_has_raw`
  ADD CONSTRAINT `fk_produk_has_produk_produk1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_has_produk_produk2` FOREIGN KEY (`produk_raw_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_produk_has_produk_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `produsen`
--
ALTER TABLE `produsen`
  ADD CONSTRAINT `fk_produsen_store1` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `promosi`
--
ALTER TABLE `promosi`
  ADD CONSTRAINT `fk_promosi_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `return_pembelian`
--
ALTER TABLE `return_pembelian`
  ADD CONSTRAINT `fk_return_pembelian_detil_pembelian1` FOREIGN KEY (`detil_pembelian_id`) REFERENCES `detil_pembelian` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_return_pembelian_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_return_pembelian_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `return_penjualan`
--
ALTER TABLE `return_penjualan`
  ADD CONSTRAINT `fk_return_penjualan_detil_penjualan1` FOREIGN KEY (`detil_penjualan_id`) REFERENCES `detil_penjualan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_return_penjualan_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_return_penjualan_users1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `fk_role_user_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `satuan`
--
ALTER TABLE `satuan`
  ADD CONSTRAINT `fk_satuan_satuan1` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `site`
--
ALTER TABLE `site`
  ADD CONSTRAINT `fk_site_daerah1` FOREIGN KEY (`daerah_id`) REFERENCES `daerah` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_site_store2` FOREIGN KEY (`store_id`) REFERENCES `store` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `sms_otp`
--
ALTER TABLE `sms_otp`
  ADD CONSTRAINT `fk_reward_users10` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `fk_store_has_barang_barang1` FOREIGN KEY (`produk_id`) REFERENCES `produk` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_store_has_barang_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_shift_kerja1` FOREIGN KEY (`shift_kerja_id`) REFERENCES `shift_kerja` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_store1` FOREIGN KEY (`site_id`) REFERENCES `site` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `voucher`
--
ALTER TABLE `voucher`
  ADD CONSTRAINT `fk_reward_users1` FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
