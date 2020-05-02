-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 16, 2020 at 08:40 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_emperium`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_anggota`
--

CREATE TABLE `tb_anggota` (
  `id_m` int(255) NOT NULL,
  `nama` varchar(250) COLLATE latin1_general_ci NOT NULL,
  `tempat_lahir` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jk` enum('l','p') COLLATE latin1_general_ci NOT NULL,
  `alamat` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `nohp` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `tgl_expired` date NOT NULL,
  `expired` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_anggota`
--

INSERT INTO `tb_anggota` (`id_m`, `nama`, `tempat_lahir`, `tgl_lahir`, `jk`, `alamat`, `nohp`, `tgl_expired`, `expired`) VALUES
(1130081, 'febry', 'sengeti', '1995-02-11', 'l', 'sengeti', '082374998103', '2020-04-08', 0),
(1130083, 'randi', 'sengeti', '1993-02-02', 'l', 'jambi', '08220202009', '1970-01-01', 0),
(1130082, 'sobex', 'jambi', '1992-02-02', 'l', 'jambi', '082374998103', '0000-00-00', 0),
(1130080, 'heris', 'jambi', '1992-02-02', 'l', 'jambi', '080808080', '0000-00-00', 0),
(1130084, 'ade', 'batanghari', '1998-02-03', 'l', 'jambi', '082299880090', '2019-12-23', 0),
(1130085, 'reny', 'jambi', '1992-02-02', 'p', 'jambi', '0822291019', '2019-12-23', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id` int(9) NOT NULL,
  `nama_barang` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `kategori` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `harga` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `jumlah_barang` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`id`, `nama_barang`, `kategori`, `harga`, `jumlah_barang`) VALUES
(5, 'Lemineral', 'Minuman', '4000', 200),
(6, 'Kacang Kedelai', 'Minuman', '5000', 100),
(12, 'Roti Gandum', 'Makanan', '15000', 12),
(13, 'Obat BCAA', 'Obat', '20000', 200),
(14, 'Obat Karotin', 'Obat', '25000', 300),
(15, 'Roti Isi Coklat', 'Makanan', '5000', 50),
(16, 'Kedelai ', 'Minuman', '4000', 100),
(17, 'yakul', 'Minuman', '2000', 120);

-- --------------------------------------------------------

--
-- Table structure for table `tb_kategori`
--

CREATE TABLE `tb_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_kategori`
--

INSERT INTO `tb_kategori` (`id_kategori`, `kategori`) VALUES
(2, 'Minuman'),
(3, 'Makanan'),
(4, 'Obat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_keranjang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_beli` int(255) NOT NULL,
  `total_harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_paket`
--

CREATE TABLE `tb_paket` (
  `id_paket` int(255) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `durasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_paket`
--

INSERT INTO `tb_paket` (`id_paket`, `nama_paket`, `harga`, `durasi`) VALUES
(3, '1 Bulan Gym', '120000', '30'),
(6, '1 Bulan Zumbah', '125000', '30'),
(7, 'Visit Gym', '25000', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tranggota`
--

CREATE TABLE `tb_tranggota` (
  `id_tranggota` int(255) NOT NULL,
  `id_m` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `biaya_paket` varchar(255) NOT NULL,
  `biaya_admin` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tranggota`
--

INSERT INTO `tb_tranggota` (`id_tranggota`, `id_m`, `nama`, `nama_paket`, `tgl_bayar`, `biaya_paket`, `biaya_admin`, `total`) VALUES
(11, 1130081, 'febry', '1 Bulan Gym', '2019-11-15', '120000', '', '120000'),
(12, 1130083, 'randi', '1 Bulan Gym', '2019-11-23', '120000', '', '120000'),
(13, 1130084, 'ade', '1 Bulan Gym', '2019-11-23', '120000', '', '120000'),
(14, 1130085, 'reny', '1 Bulan Gym', '2019-11-23', '120000', '20000', '140000'),
(15, 1130082, 'sobex', '1 Bulan Gym', '2019-12-11', '120000', '', '120000'),
(16, 1130080, 'heris', '1 Bulan Gym', '2019-12-11', '120000', '', '120000'),
(17, 1130081, 'febry', '1 Bulan Gym', '2020-03-09', '120000', '', '120000'),
(18, 1130081, 'febry', '1 Bulan Gym', '2020-03-09', '120000', '', '120000'),
(19, 1130083, 'randi', '1 Bulan Gym', '2020-03-09', '120000', '', '120000'),
(20, 1130081, 'febry', '1 Bulan Gym', '2020-03-09', '120000', '', '120000'),
(21, 0, 'febry ramadhan', 'Visit Gym', '2020-03-10', '25000', '', '25000');

-- --------------------------------------------------------

--
-- Table structure for table `tb_trbarang`
--

CREATE TABLE `tb_trbarang` (
  `id_transbarang` int(11) NOT NULL,
  `id_barang` int(128) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `harga_barang` varchar(128) NOT NULL,
  `tanggal_belanja` date NOT NULL,
  `jumlah_beli` int(128) NOT NULL,
  `total_belanja` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `password` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `nama` varchar(200) COLLATE latin1_general_ci NOT NULL,
  `level` varchar(30) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(200) COLLATE latin1_general_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `password`, `nama`, `level`, `foto`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'admin', 'IMG_20190615_200138.jpg'),
(2, 'user', 'admin', 'user', 'user', 'login.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  ADD PRIMARY KEY (`id_m`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `tb_paket`
--
ALTER TABLE `tb_paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indexes for table `tb_tranggota`
--
ALTER TABLE `tb_tranggota`
  ADD PRIMARY KEY (`id_tranggota`);

--
-- Indexes for table `tb_trbarang`
--
ALTER TABLE `tb_trbarang`
  ADD PRIMARY KEY (`id_transbarang`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_anggota`
--
ALTER TABLE `tb_anggota`
  MODIFY `id_m` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1130087;

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_kategori`
--
ALTER TABLE `tb_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tb_keranjang`
--
ALTER TABLE `tb_keranjang`
  MODIFY `id_keranjang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_paket`
--
ALTER TABLE `tb_paket`
  MODIFY `id_paket` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_tranggota`
--
ALTER TABLE `tb_tranggota`
  MODIFY `id_tranggota` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_trbarang`
--
ALTER TABLE `tb_trbarang`
  MODIFY `id_transbarang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
