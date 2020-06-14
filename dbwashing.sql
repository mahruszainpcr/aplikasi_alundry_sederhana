-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jun 14, 2020 at 08:28 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwashing`
--

-- --------------------------------------------------------

--
-- Table structure for table `Pelanggan`
--

CREATE TABLE `Pelanggan` (
  `Kode_Pelanggan` varchar(10) NOT NULL,
  `Nama_Pelanggan` varchar(20) NOT NULL,
  `Alamat_pelanggan` varchar(50) NOT NULL,
  `Nomor_HP` varchar(20) NOT NULL,
  `Jenis_Pelanggan` varchar(100) NOT NULL,
  `Tanggal_Aktif` date NOT NULL,
  `id_pelanggan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Pelanggan`
--

INSERT INTO `Pelanggan` (`Kode_Pelanggan`, `Nama_Pelanggan`, `Alamat_pelanggan`, `Nomor_HP`, `Jenis_Pelanggan`, `Tanggal_Aktif`, `id_pelanggan`) VALUES
('001', 'Muhamamd Mahrus Zain', 'jalan umban sari', '081275575929', 'Platinum', '2020-06-14', 2),
('002', 'Si Otong', 'Jalan Umban sari bukit sari', '0812747689789', 'General', '2020-06-14', 3);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi_pencucian`
--

CREATE TABLE `transaksi_pencucian` (
  `No_Faktur` varchar(10) NOT NULL,
  `Tanggal_Faktur` date NOT NULL,
  `Kode_Pelanggan` varchar(20) NOT NULL,
  `Jenis_Paket` varchar(20) NOT NULL,
  `Harga` double NOT NULL,
  `Jumlah_Kilo` double NOT NULL,
  `Diskon` double NOT NULL,
  `Total_Harga` double NOT NULL,
  `id_transaksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi_pencucian`
--

INSERT INTO `transaksi_pencucian` (`No_Faktur`, `Tanggal_Faktur`, `Kode_Pelanggan`, `Jenis_Paket`, `Harga`, `Jumlah_Kilo`, `Diskon`, `Total_Harga`, `id_transaksi`) VALUES
('002', '2020-06-14', '001', 'Cucian + Setrika (Ha', 10000, 4, 2000, 38000, 2),
('002', '2020-06-14', '001', 'Cucian + Setrika (Ha', 10000, 4, 2000, 38000, 3),
('003', '0000-00-00', '002', 'Cucian + Setrika (Ha', 10000, 4, 0, 40000, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Pelanggan`
--
ALTER TABLE `Pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `transaksi_pencucian`
--
ALTER TABLE `transaksi_pencucian`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Pelanggan`
--
ALTER TABLE `Pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transaksi_pencucian`
--
ALTER TABLE `transaksi_pencucian`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
