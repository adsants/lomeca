-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13 Okt 2018 pada 08.31
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
-- Struktur dari tabel `m_client`
--

CREATE TABLE `m_client` (
  `ID_CLIENT` int(10) NOT NULL,
  `NAMA_CLIENT` varchar(100) DEFAULT NULL,
  `EMAIL_CLIENT` varchar(100) DEFAULT NULL,
  `TELP_CLIENT` varchar(100) DEFAULT NULL,
  `IMAGE_CLIENT` varchar(100) NOT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  `PASSWORD` varchar(50) DEFAULT NULL,
  `ID_KEY_APP` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `m_client`
--

INSERT INTO `m_client` (`ID_CLIENT`, `NAMA_CLIENT`, `EMAIL_CLIENT`, `TELP_CLIENT`, `IMAGE_CLIENT`, `STATUS`, `PASSWORD`, `ID_KEY_APP`) VALUES
(1, 'StarBuck', 'star@buck.com', '123123123', '1539405926_starbucks_20170809_1111301.jpg', 1, '123456', 'AAAAkf_Jo_k:APA91bEUJ8XDluVcULfS7VYBdP6POGkx_KCMdThFTkt47RGzK_5AfkOdKOtWgyWyaQyo4-sUGE9oFt9DoMueLh-OeM_1rbymRiTR0CEse6s1URrW3QaiBRkK_Tu5DnDM0nrgbkYjLvZv');

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
  `ID_PHONE` varchar(255) NOT NULL,
  `NAMA_USER` varchar(100) DEFAULT NULL,
  `TLP_USER` varchar(100) DEFAULT NULL,
  `EMAIL_USER` varchar(100) DEFAULT NULL,
  `ALAMAT_USER` varchar(200) DEFAULT NULL,
  `JKL_USER` varchar(10) DEFAULT NULL,
  `STATUS` smallint(6) DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Indexes for dumped tables
--

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
  MODIFY `ID_USER` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promo`
--
ALTER TABLE `promo`
  MODIFY `ID_PROMO` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `voucher`
--
ALTER TABLE `voucher`
  MODIFY `ID_VOUCHER` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
