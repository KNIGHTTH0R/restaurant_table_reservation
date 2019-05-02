-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2019 at 03:06 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_reservation2`
--

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `kode_meja` varchar(4) NOT NULL,
  `status` enum('tersedia','terpakai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`kode_meja`, `status`) VALUES
('A01', 'terpakai'),
('A02', 'tersedia'),
('A03', 'terpakai'),
('A04', 'terpakai'),
('A05', 'terpakai'),
('A06', 'tersedia'),
('B01', 'terpakai'),
('B02', 'tersedia'),
('B03', 'terpakai'),
('B04', 'tersedia'),
('B05', 'terpakai');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(55) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `harga`) VALUES
(1, 'Nasi Goreng', 12000),
(8, 'Mie Rebus', 13000),
(9, 'Mie Georeng Seafood', 25000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(55) NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_pelanggan`, `jenis_kelamin`, `no_hp`, `alamat`) VALUES
(5, 'rafif', 'laki-laki', '0812', 'jamuju'),
(6, 'bapa', 'laki-laki', '0813', 'jamuju'),
(7, 'rafif', 'laki-laki', '0812', 'depok'),
(8, 'rafif', 'laki-laki', '0812', 'depok');

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `kode_meja` varchar(4) NOT NULL,
  `id_menu` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `total` int(11) NOT NULL,
  `status` enum('pending','aktif','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `kode_meja`, `id_menu`, `id_user`, `total`, `status`) VALUES
(8, 6, 'A03', 1, 4, 2, 'aktif'),
(9, 7, 'A01', 1, 4, 2, 'selesai'),
(10, NULL, 'A05', NULL, NULL, 0, 'pending'),
(11, 5, 'A04', 8, 4, 3, 'selesai'),
(12, 8, 'B01', 9, 4, 2, 'selesai'),
(13, NULL, 'B03', NULL, NULL, 0, 'pending'),
(14, NULL, 'B05', NULL, NULL, 0, 'pending');

--
-- Triggers `pemesanan`
--
DELIMITER $$
CREATE TRIGGER `meja_terpakai` AFTER INSERT ON `pemesanan` FOR EACH ROW UPDATE `meja` SET `status` = 'terpakai' WHERE `kode_meja` = NEW.kode_meja
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_pemesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_bayar` int(11) NOT NULL,
  `bayar` int(11) NOT NULL,
  `kembali` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_pemesanan`, `id_user`, `total_bayar`, `bayar`, `kembali`) VALUES
(2, 11, 5, 39000, 40000, 1000),
(3, 9, 5, 24000, 30000, 6000),
(4, 12, 5, 50000, 50000, 0);

--
-- Triggers `transaksi`
--
DELIMITER $$
CREATE TRIGGER `transaksi_sukses` AFTER INSERT ON `transaksi` FOR EACH ROW UPDATE `pemesanan` SET `status` = 'selesai' WHERE `id_pemesanan` = NEW.id_pemesanan
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('administrator','waiter','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(3, 'administrator', '4194d1706ed1f408d5e02d672777019f4d5385c766a8c6ca8acba3167d36a7b9', 'administrator'),
(4, 'waiter', '9beb7c0bd91394a08c1138752c0f196ab638f1da2c290184890184cfcb821ab4', 'waiter'),
(5, 'kasir', '2c7ee7ade401a7cef9ef4dad9978998cf42ed805243d6c91f89408c6097aa571', 'kasir'),
(6, 'owner', '4c1029697ee358715d3a14a2add817c4b01651440de808371f78165ac90dc581', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`kode_meja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `kode_meja` (`kode_meja`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_pesanan` (`id_pemesanan`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`),
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`kode_meja`) REFERENCES `meja` (`kode_meja`),
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`),
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`),
  ADD CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
