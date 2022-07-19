-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2022 at 11:55 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_latian2`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id_booking` int(11) NOT NULL,
  `no_booking` varchar(15) NOT NULL,
  `nm_booking` varchar(70) NOT NULL,
  `email` varchar(70) NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `tgl_lhr` date NOT NULL,
  `no_tlp` varchar(15) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `is_bayar` enum('1','0') NOT NULL,
  `gambar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id_booking`, `no_booking`, `nm_booking`, `email`, `tgl_booking`, `tgl_lhr`, `no_tlp`, `alamat`, `is_bayar`, `gambar`) VALUES
(3, 'MB2022001', 'Muhammad Ardiansyah', 'test@gmail.com', '2022-07-16 18:16:11', '2000-01-03', '02546432135', 'test', '1', ''),
(4, 'MB2022002', 'haji ', 'haji@gmail.com', '2022-07-16 18:18:00', '2000-02-01', '0301200022', 'test', '1', ''),
(5, 'MB2022003', 'Muhammad Ardiansyah', 'ardi@gmail.com', '2022-07-16 18:22:49', '2000-02-01', '02546432135', 'gogo', '1', 'Id Card Panitia.jpg'),
(6, 'MB2022004', 'sultan', 'jaj@gmail.com', '2022-07-16 18:25:09', '2000-02-05', '0215468551', 'jajaj', '', 'Id Card Panitia.jpg'),
(7, 'MB2022005', 'Ardy', 'arudi@gmail.com', '2022-07-19 16:01:50', '2022-07-12', '08165423285', 'Pandaan', '1', 'Screenshot 2022-07-19 003630.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daftarmember`
--

CREATE TABLE `daftarmember` (
  `idmember` int(11) NOT NULL,
  `kode_member` varchar(9) DEFAULT NULL,
  `nm_member` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `tgl_daftar` datetime DEFAULT NULL,
  `tgl_lhr` date DEFAULT NULL,
  `no_telp` varchar(15) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `jk` varchar(10) DEFAULT NULL,
  `foto` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftarmember`
--

INSERT INTO `daftarmember` (`idmember`, `kode_member`, `nm_member`, `email`, `password`, `tgl_daftar`, `tgl_lhr`, `no_telp`, `alamat`, `jk`, `foto`) VALUES
(1, 'MB2022001', 'Ardi', 'ardi@gmail.com', '1242525325', '2022-06-15 10:44:20', '2022-06-08', '08109810401', 'jalan maju jaya no.8 bandung', 'Wanita', 'brosurNEW.jpg'),
(2, 'MB2022002', 'AniNur', 'aninur@gmail.com', '123', '2022-06-29 10:51:15', '2022-06-30', '08301801800', 'jalan no.6', 'laki-laki', '5-destinasi-bukit-teletubbies-di-indonesia-dari-ba'),
(6, 'MB2022006', 'Muhammad Ardiansyah', 'congki@gmail.com', '123', '2022-07-19 16:05:35', '2022-07-14', '08165423285', 'Pandaan', 'laki-laki', 'Foto Resmi Background Merah.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_booking`
--

CREATE TABLE `daftar_booking` (
  `idbooking` int(11) NOT NULL,
  `no_invoice` varchar(50) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `bukti bayar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `mst_kamar`
--

CREATE TABLE `mst_kamar` (
  `id_kamar` int(11) NOT NULL,
  `nm_kamar` varchar(50) NOT NULL,
  `gambar` varchar(25) NOT NULL,
  `id_tipe` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jml` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_kamar`
--

INSERT INTO `mst_kamar` (`id_kamar`, `nm_kamar`, `gambar`, `id_tipe`, `harga`, `jml`, `deskripsi`) VALUES
(13, 'Kismin Room', 'Kismin room.jpg', 2, 150000, 10, 'Kamar Standard kelas Bawah'),
(14, 'Ploretar Room', 'Ploretar room.jpg', 8, 250000, 15, '             Kamar Kelas Menengah untuk kenyamanan dengan harga terjangkau'),
(17, 'Borjuis Room', 'kmrvvip.jpg', 13, 120000, 3, '   BLOK');

-- --------------------------------------------------------

--
-- Table structure for table `mst_menu`
--

CREATE TABLE `mst_menu` (
  `idmenu` int(11) NOT NULL,
  `kode_menu` varchar(8) NOT NULL,
  `nmmenu` varchar(25) NOT NULL,
  `link` varchar(50) NOT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_menu`
--

INSERT INTO `mst_menu` (`idmenu`, `kode_menu`, `nmmenu`, `link`, `icon`) VALUES
(1, 'M2022001', 'tipe kamar', 'mod_tipekamar', '<i class=\"bi bi-boxes\"></i>'),
(2, 'M2022002', 'daftar kamar', 'mod_kamar', '<i class=\"bi bi-bag-check-fill\"></i>'),
(3, 'M2022003', 'Data Member', 'mod_member', '<i class=\"bi bi-person-bounding-box\"></i>'),
(4, 'M2022004', 'Data Transaksi', 'mod_transaksi', '<i class=\"bi bi-basket-fill\"></i>'),
(5, 'M2022005', 'Data UserLogin', 'mod_userlogin', '<i class=\"bi bi-person-workspace\"></i>'),
(6, 'M2022006', 'Data Menu', 'mod_menu', '<i class=\"bi bi-text-left\"></i>'),
(7, 'M2022007', '', '', ''),
(8, 'M2022008', '', '', ''),
(10, 'M2022009', 'Feedback Costumer', 'mod_responden', '');

-- --------------------------------------------------------

--
-- Table structure for table `mst_tipekamar`
--

CREATE TABLE `mst_tipekamar` (
  `id_tipe` int(11) NOT NULL,
  `nm_tipe` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_tipekamar`
--

INSERT INTO `mst_tipekamar` (`id_tipe`, `nm_tipe`) VALUES
(2, 'standard room'),
(8, 'Deluxe rooms'),
(13, 'VVIP Room');

-- --------------------------------------------------------

--
-- Table structure for table `mst_userlogin`
--

CREATE TABLE `mst_userlogin` (
  `iduser` int(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_active` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mst_userlogin`
--

INSERT INTO `mst_userlogin` (`iduser`, `username`, `nama_lengkap`, `password`, `is_active`) VALUES
(1, 'mahasiswa', 'Calon Orang Sukses', '827ccb0eea8a706c4c34a16891f84e7b', 1),
(3, 'admin', 'Abang Admin', '202cb962ac59075b964b07152d234b70', 1),
(4, 'agung', 'Agung Cakep', 'd9b1d7db4cd6e70935368a1efb10e377', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tst_booking`
--

CREATE TABLE `tst_booking` (
  `no_invoice` varchar(15) NOT NULL,
  `nama_booking` varchar(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `jml_hari` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `tgl_booking` datetime NOT NULL,
  `bukti_pembayaran` varchar(70) NOT NULL,
  `is_bayar` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tst_penjualan`
--

CREATE TABLE `tst_penjualan` (
  `no_invoice` varchar(12) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `idmember` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `buktipembayaran` varchar(50) NOT NULL,
  `is_bayar` enum('1','0') NOT NULL,
  `is_closed` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tst_request`
--

CREATE TABLE `tst_request` (
  `id_request` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password_baru` varchar(100) NOT NULL,
  `date_request` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tst_request`
--

INSERT INTO `tst_request` (`id_request`, `username`, `password_baru`, `date_request`) VALUES
(4, 'mahasiswa', 'e034fb6b66aacc1d48f445ddfb08da98', '2022-07-15'),
(5, 'mahasiswa', '202cb962ac59075b964b07152d234b70', '2022-07-15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id_booking`);

--
-- Indexes for table `daftarmember`
--
ALTER TABLE `daftarmember`
  ADD PRIMARY KEY (`idmember`);

--
-- Indexes for table `daftar_booking`
--
ALTER TABLE `daftar_booking`
  ADD PRIMARY KEY (`idbooking`),
  ADD UNIQUE KEY `fk_idkamar` (`id_kamar`),
  ADD KEY `fk_idmember` (`idmember`);

--
-- Indexes for table `mst_kamar`
--
ALTER TABLE `mst_kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `fk_id_kategori` (`id_tipe`);

--
-- Indexes for table `mst_menu`
--
ALTER TABLE `mst_menu`
  ADD PRIMARY KEY (`idmenu`);

--
-- Indexes for table `mst_tipekamar`
--
ALTER TABLE `mst_tipekamar`
  ADD PRIMARY KEY (`id_tipe`);

--
-- Indexes for table `mst_userlogin`
--
ALTER TABLE `mst_userlogin`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `username` (`username`);

--
-- Indexes for table `tst_booking`
--
ALTER TABLE `tst_booking`
  ADD PRIMARY KEY (`no_invoice`);

--
-- Indexes for table `tst_penjualan`
--
ALTER TABLE `tst_penjualan`
  ADD PRIMARY KEY (`no_invoice`),
  ADD KEY `fk_idmember` (`idmember`),
  ADD KEY `fk_idkamar` (`id_kamar`);

--
-- Indexes for table `tst_request`
--
ALTER TABLE `tst_request`
  ADD PRIMARY KEY (`id_request`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id_booking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `daftarmember`
--
ALTER TABLE `daftarmember`
  MODIFY `idmember` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `daftar_booking`
--
ALTER TABLE `daftar_booking`
  MODIFY `idbooking` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `mst_kamar`
--
ALTER TABLE `mst_kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `mst_menu`
--
ALTER TABLE `mst_menu`
  MODIFY `idmenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `mst_tipekamar`
--
ALTER TABLE `mst_tipekamar`
  MODIFY `id_tipe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `mst_userlogin`
--
ALTER TABLE `mst_userlogin`
  MODIFY `iduser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tst_request`
--
ALTER TABLE `tst_request`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `daftar_booking`
--
ALTER TABLE `daftar_booking`
  ADD CONSTRAINT `fk_idkamar` FOREIGN KEY (`id_kamar`) REFERENCES `mst_kamar` (`id_kamar`);

--
-- Constraints for table `mst_kamar`
--
ALTER TABLE `mst_kamar`
  ADD CONSTRAINT `fk_id_kategori` FOREIGN KEY (`id_tipe`) REFERENCES `mst_tipekamar` (`id_tipe`);

--
-- Constraints for table `tst_penjualan`
--
ALTER TABLE `tst_penjualan`
  ADD CONSTRAINT `fk_idmember` FOREIGN KEY (`idmember`) REFERENCES `daftarmember` (`idmember`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
