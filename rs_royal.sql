-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 21 Sep 2018 pada 12.34
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rs_royal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_barang`
--

CREATE TABLE `m_barang` (
  `ID_BARANG` int(11) NOT NULL,
  `ID_SATUAN_BARANG` int(11) NOT NULL,
  `KODE_BARANG` varchar(10) NOT NULL,
  `NAMA_BARANG` varchar(150) NOT NULL,
  `KETERANGAN_BARANG` text NOT NULL,
  `JUMLAH_STOK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_barang`
--

INSERT INTO `m_barang` (`ID_BARANG`, `ID_SATUAN_BARANG`, `KODE_BARANG`, `NAMA_BARANG`, `KETERANGAN_BARANG`, `JUMLAH_STOK`) VALUES
(1, 2, 'ROYAL-1234', 'Betadine', 'Obat untuk Luka Luar', 8),
(2, 3, 'ROYAL-1121', 'Paracetamol', 'Obat Sakit Kepala', 50);

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_kategori_user`
--

CREATE TABLE `m_kategori_user` (
  `ID_KATEGORI_USER` int(11) NOT NULL,
  `NAMA_KATEGORI_USER` varchar(50) DEFAULT NULL,
  `KETERANGAN` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_kategori_user`
--

INSERT INTO `m_kategori_user` (`ID_KATEGORI_USER`, `NAMA_KATEGORI_USER`, `KETERANGAN`) VALUES
(1, 'Adminsitrator', ''),
(2, 'Admin Gudang', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_menu`
--

CREATE TABLE `m_menu` (
  `ID_MENU` int(11) NOT NULL,
  `ID_PARENT` int(11) DEFAULT NULL,
  `NAMA_MENU` varchar(100) DEFAULT NULL,
  `JUDUL_MENU` varchar(250) DEFAULT NULL,
  `LINK_MENU` varchar(35) DEFAULT NULL,
  `ICON_MENU` varchar(25) DEFAULT NULL,
  `AKTIF_MENU` varchar(1) DEFAULT NULL,
  `TINGKAT_MENU` int(11) DEFAULT NULL,
  `URUTAN_MENU` int(11) DEFAULT NULL,
  `ADD_BUTTON` varchar(1) DEFAULT NULL,
  `EDIT_BUTTON` varchar(1) DEFAULT NULL,
  `DELETE_BUTTON` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_menu`
--

INSERT INTO `m_menu` (`ID_MENU`, `ID_PARENT`, `NAMA_MENU`, `JUDUL_MENU`, `LINK_MENU`, `ICON_MENU`, `AKTIF_MENU`, `TINGKAT_MENU`, `URUTAN_MENU`, `ADD_BUTTON`, `EDIT_BUTTON`, `DELETE_BUTTON`) VALUES
(1, 0, 'Utilitas', '', '', 'database', 'Y', 1, 2, 'N', 'N', 'N'),
(2, 0, 'Transaksi Gudang', '', '', 'cubes', 'Y', 1, 5, 'N', 'N', 'N'),
(3, 1, 'Data User', 'Menu Pengguna Aplikasi  adalah Data User/Pengguna dari Aplikasi.', 'user', '', 'Y', 2, 2, 'Y', 'Y', 'Y'),
(4, 2, 'Barang Masuk', 'Menu Karyawan adalah Data Keseluruhan Pegawai.', 'barang_masuk', '', 'Y', 2, 2, 'Y', 'N', 'N'),
(5, 1, 'Data Kategori User', 'Menu Kategori Pengguna Aplikasi adalah Halaman yang berisi Data Kategori Pengguna Aplikasi. Dalam menu ini akan diatur untuk hak Akses dari Kategori Pengguna.', 'kategori_user', '', 'Y', 2, 1, 'Y', 'Y', 'Y'),
(6, 2, 'Barang Keluar', 'Barang Keluar', 'barang_keluar', NULL, 'Y', 2, 2, 'Y', '', ''),
(7, 0, 'Data Barang', 'Halaman untuk menampilkan Daftar Antrian Order.', 'barang', 'archive', 'Y', 1, 4, 'Y', 'Y', 'Y'),
(8, 0, 'Data Satuan Barang', 'Halaman untuk menampilkan Daftar Antrian Order.', 'satuan_barang', 'clipboard', 'Y', 1, 3, 'Y', 'Y', 'Y'),
(9, 0, 'Laporan Transaksi Gudang', '', 'laporan', 'file', 'Y', 1, 5, 'N', 'N', 'N'),
(12, 0, 'Dashboard', 'Halaman untuk menampilkan Daftar Antrian Order.', 'dashboard', 'dashboard', 'Y', 1, 1, 'N', 'N', 'N');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_satuan_barang`
--

CREATE TABLE `m_satuan_barang` (
  `ID_SATUAN_BARANG` int(11) NOT NULL,
  `NAMA_SATUAN_BARANG` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_satuan_barang`
--

INSERT INTO `m_satuan_barang` (`ID_SATUAN_BARANG`, `NAMA_SATUAN_BARANG`) VALUES
(2, 'Botol'),
(3, 'Tablet'),
(4, 'Lusin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `ID_USER` int(11) NOT NULL,
  `ID_KATEGORI_USER` int(11) DEFAULT NULL,
  `NAMA_USER` varchar(25) DEFAULT NULL,
  `USERNAME` varchar(25) DEFAULT NULL,
  `PASSWORD` varchar(25) DEFAULT NULL,
  `AKTIF` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`ID_USER`, `ID_KATEGORI_USER`, `NAMA_USER`, `USERNAME`, `PASSWORD`, `AKTIF`) VALUES
(3, 1, 'Admin Aplikasi', 'admin', 'admin', 'Y'),
(4, 2, 'Admin Gudang', 'gudang', '12345', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_barang`
--

CREATE TABLE `t_barang` (
  `ID_T_BARANG` int(11) NOT NULL,
  `ID_BARANG` int(11) NOT NULL,
  `ID_USER` int(11) NOT NULL,
  `JENIS_TRANSAKSI` enum('M','K') NOT NULL COMMENT 'm= masuk, k= keluar',
  `TGL_TRANSAKSI` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `JUMLAH_TRANSAKSI` int(11) NOT NULL,
  `KETERANGAN` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_barang`
--

INSERT INTO `t_barang` (`ID_T_BARANG`, `ID_BARANG`, `ID_USER`, `JENIS_TRANSAKSI`, `TGL_TRANSAKSI`, `JUMLAH_TRANSAKSI`, `KETERANGAN`) VALUES
(1, 2, 3, 'M', '2018-09-21 08:41:59', 67, 'Test'),
(2, 1, 3, 'M', '2018-09-21 08:45:00', 5, 'Barang mash segel'),
(3, 2, 3, 'M', '2018-09-21 08:51:45', 9, 'Tambah Lagi'),
(4, 2, 3, 'K', '2018-09-21 08:52:36', 10, 'Terjual 10'),
(5, 1, 3, 'K', '2018-09-21 08:52:55', 2, 'Tejual Dua boto'),
(6, 1, 4, 'M', '2018-09-21 09:22:59', 7, 'Pas menjadi sepuluh'),
(7, 1, 4, 'K', '2018-09-21 09:23:22', 2, 'Terjual Dua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_hak_akses`
--

CREATE TABLE `t_hak_akses` (
  `ID_MENU` int(11) NOT NULL,
  `ID_KATEGORI_USER` int(11) NOT NULL,
  `ADD_BUTTON` varchar(1) DEFAULT NULL,
  `EDIT_BUTTON` varchar(1) DEFAULT NULL,
  `DELETE_BUTTON` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_hak_akses`
--

INSERT INTO `t_hak_akses` (`ID_MENU`, `ID_KATEGORI_USER`, `ADD_BUTTON`, `EDIT_BUTTON`, `DELETE_BUTTON`) VALUES
(1, 1, '', '', ''),
(2, 1, '', '', ''),
(2, 2, '', '', ''),
(3, 1, 'Y', 'Y', 'Y'),
(4, 1, 'Y', '', ''),
(4, 2, 'Y', '', ''),
(5, 1, 'Y', 'Y', 'Y'),
(6, 1, 'Y', '', ''),
(6, 2, 'Y', '', ''),
(7, 1, 'Y', 'Y', 'Y'),
(7, 2, '', '', ''),
(8, 1, 'Y', 'Y', 'Y'),
(9, 1, '', '', ''),
(12, 1, '', '', ''),
(12, 2, '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_barang`
--
ALTER TABLE `m_barang`
  ADD PRIMARY KEY (`ID_BARANG`),
  ADD UNIQUE KEY `KODE_BARANG` (`KODE_BARANG`);

--
-- Indexes for table `m_kategori_user`
--
ALTER TABLE `m_kategori_user`
  ADD PRIMARY KEY (`ID_KATEGORI_USER`);

--
-- Indexes for table `m_menu`
--
ALTER TABLE `m_menu`
  ADD PRIMARY KEY (`ID_MENU`);

--
-- Indexes for table `m_satuan_barang`
--
ALTER TABLE `m_satuan_barang`
  ADD PRIMARY KEY (`ID_SATUAN_BARANG`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`ID_USER`),
  ADD KEY `RELATIONSHIP_1_FK` (`ID_KATEGORI_USER`);

--
-- Indexes for table `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`ID_T_BARANG`);

--
-- Indexes for table `t_hak_akses`
--
ALTER TABLE `t_hak_akses`
  ADD PRIMARY KEY (`ID_MENU`,`ID_KATEGORI_USER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_barang`
--
ALTER TABLE `m_barang`
  MODIFY `ID_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_satuan_barang`
--
ALTER TABLE `m_satuan_barang`
  MODIFY `ID_SATUAN_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `ID_T_BARANG` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `m_user`
--
ALTER TABLE `m_user`
  ADD CONSTRAINT `FK_M_KARYAW_RELATIONS_M_KATEGO` FOREIGN KEY (`ID_KATEGORI_USER`) REFERENCES `m_kategori_user` (`ID_KATEGORI_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
