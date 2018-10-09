-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 09 Okt 2018 pada 16.52
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
-- Database: `lomeca`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `banner`
--

CREATE TABLE `banner` (
  `ID_BANNER` int(10) UNSIGNED NOT NULL,
  `ID_CLIENT` int(11) DEFAULT NULL,
  `NAMA_BANNER` varchar(255) DEFAULT NULL,
  `MULAI_AKTIF` date NOT NULL,
  `AKHIR_AKTIF` date NOT NULL,
  `TGL_CREATE` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `FILE_BANNER` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_client`
--

CREATE TABLE `m_client` (
  `ID_CLIENT` int(10) NOT NULL,
  `NAMA_CLIENT` varchar(100) DEFAULT NULL,
  `EMAIL_CLIENT` varchar(100) DEFAULT NULL,
  `TELP_CLIENT` varchar(100) DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_client`
--

INSERT INTO `m_client` (`ID_CLIENT`, `NAMA_CLIENT`, `EMAIL_CLIENT`, `TELP_CLIENT`, `STATUS`, `PASSWORD`) VALUES
(1, 'StarBuck', 'star@buck.com', '123123123', 0, '123456'),
(2, 'mc d22', 'mc@gmail.com22', '32142342422', 1, '12322');

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_lokasi_client`
--

CREATE TABLE `m_lokasi_client` (
  `ID_CLIENT` int(11) DEFAULT NULL,
  `ID_LOKASI` int(10) NOT NULL,
  `ID_KOTA` int(10) DEFAULT NULL,
  `ALAMAT_LOKASI` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `m_user`
--

CREATE TABLE `m_user` (
  `ID_USER` int(10) NOT NULL,
  `ID_CLIENT` int(10) DEFAULT NULL,
  `ID_PHONE` varchar(100) NOT NULL,
  `NAMA_USER` varchar(100) DEFAULT NULL,
  `TLP_USER` varchar(100) DEFAULT NULL,
  `EMAIL_USER` varchar(100) DEFAULT NULL,
  `ALAMAT_USER` varchar(200) DEFAULT NULL,
  `JKL_USER` varchar(10) DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_user`
--

INSERT INTO `m_user` (`ID_USER`, `ID_CLIENT`, `ID_PHONE`, `NAMA_USER`, `TLP_USER`, `EMAIL_USER`, `ALAMAT_USER`, `JKL_USER`, `STATUS`, `PASSWORD`) VALUES
(1, NULL, '', 'asdas', NULL, 'adi@gmai.co', 'asdfsf', 'Laki-Laki', 0, '2DCBA143'),
(2, NULL, '', 'asdas', NULL, 'adi@gmai.co', 'asdfsf', 'Laki-Laki', 0, '4CBA123D'),
(3, NULL, '', 'asdas', NULL, 'adi@gmai.co', 'asdfsf', 'Laki-Laki', 0, '3CDB241A'),
(4, NULL, '', 'asdas', NULL, 'adi@gmai.co', 'asdfsf', 'Laki-Laki', 0, 'D14AB23C'),
(5, 1, '23234', 'Adi Santoso', NULL, 'adi@gmai.co', 'asdfsf', 'Laki-Laki', 1, '231DBA4C'),
(6, 1, '23234', 'adi', NULL, 'mail.adi@gmail.c', 'ad', 'Laki-Laki', 0, '3B4ACD21'),
(7, 1, '23234s', 'sdad', NULL, 'adi@gmai.co', 'asd', 'Laki-Laki', 0, 'D2A14C3B'),
(8, 1, '23212313', 'asd', NULL, 'adi@gmai.co', 'wer`', 'Laki-Laki', 0, '42BC31DA'),
(9, 1, '23212313', 'asd', NULL, 'adi@gmai.co', 'wer`', 'Laki-Laki', 0, 'B132CD4A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `promo`
--

CREATE TABLE `promo` (
  `ID_PROMO` int(10) NOT NULL,
  `ID_CLIENT` int(10) DEFAULT NULL,
  `NAMA_PROMO` varchar(255) DEFAULT NULL,
  `KETERANGAN_PROMO` text NOT NULL,
  `IMAGE_PROMO` varchar(225) NOT NULL,
  `TGL_CREATE` timestamp NULL DEFAULT NULL,
  `MULAI_AKTIF` date DEFAULT NULL,
  `AKHIR_AKTIF` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `promo`
--

INSERT INTO `promo` (`ID_PROMO`, `ID_CLIENT`, `NAMA_PROMO`, `KETERANGAN_PROMO`, `IMAGE_PROMO`, `TGL_CREATE`, `MULAI_AKTIF`, `AKHIR_AKTIF`) VALUES
(1, 1, 'Spin Two, Pay for One', 'Spin Two, Pay for One', '1539090402_starbucks_01102018.jpg', NULL, '2018-10-02', '2018-10-10'),
(2, 1, 'Beli Satu, gratis Satu', 'Beli Satu, gratis Satu', '1539096547_1539080657_index1.jpg', NULL, '2018-10-04', '2018-10-17'),
(3, 1, 'New For Drink', 'New For Drink', '1539096563_1539073475_featured-bev-summer2-2016_tcm33-15215_w1024_n1.jpg', NULL, '2018-10-01', '2018-10-23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `voucher`
--

CREATE TABLE `voucher` (
  `ID_VOUCHER` int(10) NOT NULL,
  `ID_CLIENT` int(10) DEFAULT NULL,
  `NAMA_VOUCHER` varchar(100) DEFAULT NULL,
  `KODE_VOUCHER` varchar(50) NOT NULL,
  `KETERANGAN_VOUCHER` text NOT NULL,
  `MULAI_AKTIF` date DEFAULT NULL,
  `AKHIR_AKTIF` date DEFAULT NULL,
  `BERLAKU_MULAI` date NOT NULL,
  `BERLAKU_AKHIR` date NOT NULL,
  `TGL_CREATE` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `voucher`
--

INSERT INTO `voucher` (`ID_VOUCHER`, `ID_CLIENT`, `NAMA_VOUCHER`, `KODE_VOUCHER`, `KETERANGAN_VOUCHER`, `MULAI_AKTIF`, `AKHIR_AKTIF`, `BERLAKU_MULAI`, `BERLAKU_AKHIR`, `TGL_CREATE`) VALUES
(1, 1, 'Memperingati hari Kemerdekaan Republik Indonesia ke-78', '78MERDEKA', 'Memperingati hari Kemerdekaan Republik Indonesia ke-78', '2018-10-02', '2018-10-16', '2018-10-10', '2018-10-18', NULL),
(2, 1, 'Memperingati Ulang Tahun StarBuck Indonesia ke-12', '12GRATIS', 'Memperingati Ulang Tahun StarBuck Indonesia ke-12', '2018-10-04', '2018-10-17', '2018-10-04', '2018-10-18', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`ID_BANNER`);

--
-- Indexes for table `m_client`
--
ALTER TABLE `m_client`
  ADD PRIMARY KEY (`ID_CLIENT`);

--
-- Indexes for table `m_lokasi_client`
--
ALTER TABLE `m_lokasi_client`
  ADD PRIMARY KEY (`ID_LOKASI`);

--
-- Indexes for table `m_user`
--
ALTER TABLE `m_user`
  ADD PRIMARY KEY (`ID_USER`);

--
-- Indexes for table `promo`
--
ALTER TABLE `promo`
  ADD PRIMARY KEY (`ID_PROMO`);

--
-- Indexes for table `voucher`
--
ALTER TABLE `voucher`
  ADD PRIMARY KEY (`ID_VOUCHER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `ID_BANNER` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_client`
--
ALTER TABLE `m_client`
  MODIFY `ID_CLIENT` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `m_lokasi_client`
--
ALTER TABLE `m_lokasi_client`
  MODIFY `ID_LOKASI` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `m_user`
--
ALTER TABLE `m_user`
  MODIFY `ID_USER` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `ID_PROMO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `ID_VOUCHER` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
