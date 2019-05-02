-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2019 at 12:12 AM
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
-- Database: `restaurant_reservation`
--

-- --------------------------------------------------------

--
-- Table structure for table `meja`
--

CREATE TABLE `meja` (
  `Kodemeja` varchar(4) NOT NULL,
  `Status` enum('tersedia','terpakai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `meja`
--

INSERT INTO `meja` (`Kodemeja`, `Status`) VALUES
('90', 'tersedia'),
('A01', 'tersedia'),
('d07', 'tersedia');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `Idmenu` int(11) NOT NULL,
  `Namamenu` varchar(55) NOT NULL,
  `Harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`Idmenu`, `Namamenu`, `Harga`) VALUES
(3, 'Nasi Goreng', 10000),
(4, 'Nasi Kuning', 6000),
(5, 'Nasi Aki', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `Idpelanggan` int(11) NOT NULL,
  `Namapelanggan` varchar(55) NOT NULL,
  `Jeniskelamin` tinyint(1) NOT NULL,
  `Nohp` varchar(13) NOT NULL,
  `Alamat` varchar(95) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`Idpelanggan`, `Namapelanggan`, `Jeniskelamin`, `Nohp`, `Alamat`) VALUES
(23, 'anang', 1, '1', 'nyencle'),
(24, 'rafif', 1, '0812', 'depok'),
(25, 'yogie', 1, '12', 'cilangkap'),
(26, 'tes', 1, '09', 'depok');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `Idpesanan` int(11) NOT NULL,
  `Idmenu` int(11) NOT NULL,
  `Idpelanggan` int(11) NOT NULL,
  `Kodemeja` varchar(4) NOT NULL,
  `Iduser` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('aktif','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`Idpesanan`, `Idmenu`, `Idpelanggan`, `Kodemeja`, `Iduser`, `jumlah`, `status`) VALUES
(22, 3, 23, '90', 2, 2, 'selesai'),
(23, 3, 24, 'A01', 2, 2, 'selesai'),
(24, 3, 25, 'd07', 2, 5, 'selesai'),
(25, 3, 26, '90', 2, 1, 'selesai');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `use_meja` AFTER INSERT ON `pesanan` FOR EACH ROW UPDATE meja SET `Status` = 'terpakai' WHERE Kodemeja = NEW.Kodemeja
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `Idtransaksi` int(11) NOT NULL,
  `Idpesanan` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `Bayar` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`Idtransaksi`, `Idpesanan`, `Total`, `Bayar`) VALUES
(1, 23, 20000, 50000),
(2, 22, 20000, 30000),
(3, 22, 20000, 30000),
(4, 24, 50000, 50000),
(5, 24, 50000, 50000),
(6, 25, 10000, 10000);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Iduser` int(11) NOT NULL,
  `Namauser` varchar(25) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `level` enum('administrator','waiter','kasir','owner') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Iduser`, `Namauser`, `Password`, `level`) VALUES
(1, 'administrator', '4194d1706ed1f408d5e02d672777019f4d5385c766a8c6ca8acba3167d36a7b9', 'administrator'),
(2, 'waiter', '9beb7c0bd91394a08c1138752c0f196ab638f1da2c290184890184cfcb821ab4', 'waiter'),
(3, 'kasir', '2c7ee7ade401a7cef9ef4dad9978998cf42ed805243d6c91f89408c6097aa571', 'kasir'),
(4, 'owner', '4c1029697ee358715d3a14a2add817c4b01651440de808371f78165ac90dc581', 'owner');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `meja`
--
ALTER TABLE `meja`
  ADD PRIMARY KEY (`Kodemeja`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`Idmenu`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`Idpelanggan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`Idpesanan`),
  ADD KEY `Idmeja` (`Kodemeja`),
  ADD KEY `Idpelanggan` (`Idpelanggan`),
  ADD KEY `Idmenu` (`Idmenu`),
  ADD KEY `Iduser` (`Iduser`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`Idtransaksi`),
  ADD KEY `Idpesanan` (`Idpesanan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Iduser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `Idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `Idpelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `Idpesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `Idtransaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`Idmenu`) REFERENCES `menu` (`Idmenu`),
  ADD CONSTRAINT `pesanan_ibfk_2` FOREIGN KEY (`Iduser`) REFERENCES `user` (`Iduser`),
  ADD CONSTRAINT `pesanan_ibfk_5` FOREIGN KEY (`Kodemeja`) REFERENCES `meja` (`Kodemeja`),
  ADD CONSTRAINT `pesanan_ibfk_6` FOREIGN KEY (`Idpelanggan`) REFERENCES `pelanggan` (`Idpelanggan`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`Idpesanan`) REFERENCES `pesanan` (`Idpesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
