-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2022 at 10:09 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tikets`
--

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id` int(11) NOT NULL,
  `namal` varchar(50) DEFAULT NULL,
  `namap` varchar(20) DEFAULT NULL,
  `divisi` varchar(20) DEFAULT NULL,
  `jk` int(1) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `nohp` varchar(15) DEFAULT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id`, `namal`, `namap`, `divisi`, `jk`, `alamat`, `nohp`, `status`) VALUES
(1, 'Hikma Agriady', 'Agrhi', '1', 1, 'Tondo', '082248038346', 1),
(2, 'Ihza Marif', 'Eja', '1', 1, 'Jl. Dewi Sartika', '082248038345', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tiket`
--

CREATE TABLE `tiket` (
  `id` int(11) NOT NULL,
  `tgl` varchar(20) DEFAULT NULL,
  `desk` varchar(250) DEFAULT NULL,
  `pic` int(11) DEFAULT NULL,
  `request` varchar(20) DEFAULT NULL,
  `pelapor` varchar(50) DEFAULT NULL,
  `team` int(11) DEFAULT NULL,
  `priority` int(1) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `divisi` int(11) DEFAULT NULL,
  `bulan` int(11) DEFAULT NULL,
  `tahun` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tiket`
--

INSERT INTO `tiket` (`id`, `tgl`, `desk`, `pic`, `request`, `pelapor`, `team`, `priority`, `status`, `divisi`, `bulan`, `tahun`) VALUES
(1, '23-06-2022', 'Pembuatan Aplikasi Tiket dan Piket', 1, 'Kadiv Programer', 'Kadiv', 1, 1, 1, 1, 1, '2022'),
(2, '23-06-2022', 'Tessss bulan 4', 1, 'Kadiv Programer', 'Kadiv', 1, 1, 1, 1, 4, '2020'),
(3, '23-06-2022', 'Tessss bulan 4', 1, 'Kadiv Programer', 'Kadiv', 1, 1, 1, 1, 4, '2022'),
(4, '23-06-2022', 'Tessss bulan 2', 1, 'Kadiv Programer', 'Kadiv', 1, 1, 1, 1, 2, '2022'),
(5, '23-06-2022', 'Tessss bulan 2', 1, 'Kadiv Programer', 'Kadiv', 1, 1, 1, 1, 3, '2022');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiket`
--
ALTER TABLE `tiket`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tiket`
--
ALTER TABLE `tiket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
