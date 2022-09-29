-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 29, 2022 at 02:58 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `native_cutionline`
--

-- --------------------------------------------------------

--
-- Table structure for table `jenis_cuti`
--

CREATE TABLE `jenis_cuti` (
  `id_cuti` int(11) NOT NULL,
  `nama_cuti` varchar(100) NOT NULL,
  `durasi` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_cuti`
--

INSERT INTO `jenis_cuti` (`id_cuti`, `nama_cuti`, `durasi`) VALUES
(1, 'Cuti Hamil', 45),
(2, 'Cuti Tahunan', 12);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan_cuti`
--

CREATE TABLE `pengajuan_cuti` (
  `id_ajuan` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `jenis_id` int(11) NOT NULL,
  `tgl_ajuan` date NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `lama_ajuan` tinyint(4) NOT NULL,
  `status` varchar(50) NOT NULL,
  `keperluan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengajuan_cuti`
--

INSERT INTO `pengajuan_cuti` (`id_ajuan`, `user_id`, `jenis_id`, `tgl_ajuan`, `tgl_awal`, `tgl_akhir`, `lama_ajuan`, `status`, `keperluan`) VALUES
(1, 10, 2, '2022-09-26', '2022-10-01', '2022-10-06', 5, 'Diterima', 'holiday'),
(2, 10, 2, '2022-09-26', '2022-10-01', '2022-10-11', 11, 'Ditolak', 'holiday part 2'),
(3, 10, 2, '2022-09-26', '2022-10-01', '2022-10-11', 11, 'Ditolak', 'holiday'),
(4, 10, 2, '2022-09-26', '2022-10-01', '2022-10-12', 12, 'Ditolak', 'asik'),
(5, 10, 1, '2022-09-26', '2022-10-01', '2022-11-01', 32, 'Ditolak', 'menemani'),
(6, 12, 2, '2022-09-29', '2022-10-01', '2022-10-05', 5, 'Diterima', 'Holiday\r\n'),
(7, 12, 2, '2022-09-29', '2022-11-01', '2022-11-05', 5, 'Verifikasi', 'urusan keluarga');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `fullname_user` varchar(250) NOT NULL,
  `name_user` varchar(150) NOT NULL,
  `pass_user` varchar(250) NOT NULL,
  `level_user` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `fullname_user`, `name_user`, `pass_user`, `level_user`) VALUES
(2, 'Karyawan Pertama', 'karyawan-pertama', '9e014682c94e0f2cc834bf7348bda428', 'karyawan'),
(9, 'Muhammad Irfan Permana', 'muhammad-irfan-permana', 'f455f5a8421d755049228c4a700c1dea', 'admin'),
(10, 'Hafidz Hidayatullah', 'hafidz-hidayatullah', 'e10adc3949ba59abbe56e057f20f883e', 'karyawan'),
(11, 'Administrator Website', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(12, 'Rizka Wardana', 'rizka-wardana', 'e10adc3949ba59abbe56e057f20f883e', 'karyawan'),
(13, 'Karyawan Satu', 'karyawan-satu', 'e10adc3949ba59abbe56e057f20f883e', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  ADD PRIMARY KEY (`id_ajuan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jenis_cuti`
--
ALTER TABLE `jenis_cuti`
  MODIFY `id_cuti` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan_cuti`
--
ALTER TABLE `pengajuan_cuti`
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
