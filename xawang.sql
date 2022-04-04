-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2022 at 07:47 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `xawang`
--

-- --------------------------------------------------------

--
-- Table structure for table `disewa`
--

CREATE TABLE `disewa` (
  `disewa_id` int(11) NOT NULL,
  `kamera_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tgl_sewa` date NOT NULL,
  `tgl_kembali` date DEFAULT NULL,
  `jumlah` int(11) NOT NULL,
  `status` enum('sewa','selesai','booked') NOT NULL DEFAULT 'sewa',
  `total_harga_sewa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `disewa`
--

INSERT INTO `disewa` (`disewa_id`, `kamera_id`, `user_id`, `tgl_sewa`, `tgl_kembali`, `jumlah`, `status`, `total_harga_sewa`) VALUES
(4, 5, 2, '2022-01-24', '2022-01-26', 1, 'selesai', 65046),
(5, 5, 2, '2022-01-24', '2022-01-26', 2, 'booked', 130092),
(9, 5, 2, '2022-01-24', '2022-01-31', 1, 'selesai', 204895),
(10, 5, 2, '2022-01-24', '2022-01-30', 1, 'booked', 195138),
(11, 6, 4, '2022-01-27', '2022-01-29', 3, 'sewa', 374064),
(12, 9, 4, '2022-01-25', '2022-02-02', 5, 'sewa', 843264),
(13, 6, 4, '2022-01-26', '2022-01-28', 1, 'booked', 124688);

-- --------------------------------------------------------

--
-- Table structure for table `kamera`
--

CREATE TABLE `kamera` (
  `kamera_id` int(11) NOT NULL,
  `nama_kamera` varchar(20) NOT NULL,
  `gambar` varchar(20) NOT NULL,
  `tipe` varchar(10) NOT NULL,
  `stok` int(11) DEFAULT 0,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kamera`
--

INSERT INTO `kamera` (`kamera_id`, `nama_kamera`, `gambar`, `tipe`, `stok`, `harga`) VALUES
(5, 'Canon EOS 5D Mark IV', 'km1.png', 'DSLR', 250, 32523),
(6, 'Nikon D3300', 'km2.jpg', 'DSLR', 235, 62344),
(7, 'Nikon D3400', 'km3.png', 'DSLR', 532, 54765),
(8, 'Nikon D5500', 'km4.png', 'DSLR', 234, 22143),
(9, 'Nikon D5300', 'km5.jpg', 'DSLR', 435, 23424),
(10, 'Canon EOS 750D', 'km6.png', 'DSLR', 324, 23525),
(11, 'Nikon D5200', 'km7.jpg', 'DSLR', 532, 43543),
(12, 'Canon EOS 5D Mark II', 'km8.jpg', 'DSLR', 342, 52442),
(13, 'Nikon D3200', 'km9.jpg', 'DLSR', 123, 42562),
(14, 'Canon EOS 80D', 'km10.jpg', 'DLSR', 321, 32445),
(15, 'Canon EOS 5DS R', 'km11.png', 'DSLR', 324, 63453),
(16, 'Canon EOS Rebel SL2', 'km12.jpg', 'DSLR', 234, 43422),
(17, 'Canon EOS 4000D', 'km13.jpg', 'DSLR', 234, 52442),
(18, 'Canon EOS 77D', 'km14.jpg', 'DSLR', 234, 45674),
(19, 'Nikon D610', 'km15.jpg', 'DSLR', 234, 65243),
(20, 'aksdbaknd', 'bung.png', 'lsfaslknf', 1231, 1231231);

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `transaksi_id` int(11) NOT NULL,
  `sewa_id` int(11) NOT NULL,
  `stat_trx` enum('lunas','belum bayar') NOT NULL,
  `tgl_trx` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`transaksi_id`, `sewa_id`, `stat_trx`, `tgl_trx`) VALUES
(1, 11, 'belum bayar', '2022-01-24'),
(2, 12, 'lunas', '2022-01-24'),
(3, 9, 'belum bayar', '2022-01-24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `passwd` varchar(15) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `level` enum('admin','pelanggan') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nama`, `email`, `passwd`, `alamat`, `no_telp`, `level`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'Lombok Timur', '087824234657', 'admin'),
(2, 'Ilham', 'ilham@gmail.com', '12345', 'Jalan jalan aja', '0872328139123', 'pelanggan'),
(3, 'Udin', 'udin@gmail.com', 'udin123', 'Jalan Keluar', '087824244767', 'admin'),
(4, 'Tom Cruise', 'cruise@gmail.com', 'cruise123', 'New York', '0872328139345', 'pelanggan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `disewa`
--
ALTER TABLE `disewa`
  ADD PRIMARY KEY (`disewa_id`),
  ADD KEY `kamera_id` (`kamera_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `kamera`
--
ALTER TABLE `kamera`
  ADD PRIMARY KEY (`kamera_id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`transaksi_id`),
  ADD KEY `sewa_id` (`sewa_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `disewa`
--
ALTER TABLE `disewa`
  MODIFY `disewa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `kamera`
--
ALTER TABLE `kamera`
  MODIFY `kamera_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `transaksi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `disewa`
--
ALTER TABLE `disewa`
  ADD CONSTRAINT `disewa_ibfk_1` FOREIGN KEY (`kamera_id`) REFERENCES `kamera` (`kamera_id`),
  ADD CONSTRAINT `disewa_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`);

--
-- Constraints for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`sewa_id`) REFERENCES `disewa` (`disewa_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
