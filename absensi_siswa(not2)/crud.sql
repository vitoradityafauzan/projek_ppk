-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2018 at 02:42 AM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `biodata`
--

CREATE TABLE `biodata` (
  `id` int(11) NOT NULL,
  `nik` int(150) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(12) NOT NULL,
  `position` text NOT NULL,
  `division` text NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biodata`
--

INSERT INTO `biodata` (`id`, `nik`, `fname`, `lname`, `email`, `phone`, `position`, `division`, `username`, `password`) VALUES
(41, 1001, 'anton', 'corlenen', 'div@gmail.com', '123456', 'Staff', 'IT Support', 'guan', '$2y$10$iP9WHoywi5VLdgaV5Yvra.S5/dbcKqKCN0ryIKHyqowVxKuturxUq');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id_job` int(11) NOT NULL,
  `nomor` varchar(55) NOT NULL,
  `tanggal` date NOT NULL,
  `store` varchar(100) NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `kategori` varchar(55) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id_job`, `nomor`, `tanggal`, `store`, `alamat`, `kategori`, `keterangan`) VALUES
(1, '1007', '2019-04-03', 'Store 1', 'di gandaria I', 'Maintenace', 'Belum'),
(4, '1002', '2018-03-14', 'store 2', 'Pondok Indah', 'Standby', 'Sudah'),
(8, '1003', '2018-03-22', 'store 1', 'jl. merah', 'Maintenance', 'belum'),
(9, '1006', '2018-03-31', 'store 4', 'gulukz', 'Maintenance', 'Belum'),
(11, '1008', '2018-03-28', 'store 2', 'sono', 'Standby', 'nothing'),
(12, '1009', '2018-03-30', 'store 4', 'Jl. Mangga', 'Problem', 'Mesin Error'),
(15, '1010', '2018-03-31', 'store 2', 'Jl. apel', 'Maintenance', 'Sudah'),
(16, '1011', '2018-04-01', 'store 4', 'Jl. Jengkol', 'Standby', 'Sudah'),
(17, '1012', '2018-04-02', 'store 1', 'Jl. Anggur', 'Maintenance', 'Belum'),
(18, '1013', '2018-04-03', 'store 1', 'Jl. durian', 'Maintenance', 'Sudah'),
(19, '1014', '2018-04-04', 'store 3', 'Jl. Melon', 'Problem', 'OS Corrupt'),
(20, '1001', '2018-03-21', 'store 1', 'Jl. Bintang', 'Problem', 'Anti Virus Corrupt'),
(21, '45678', '2018-08-02', 'STORE 2', 'ln;ln;lkn', 'Standby', 'jbklb');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(4, 'gyh', '$2y$10$mtgkUEw./g.nHTfGWZlKLeCQtL8xsUlWNIHThS8dJl5mYWWonmJM.'),
(5, 'Blackwatch', '$2y$10$rIny2A.0DbZaYsjLkodGGeHrKtDrUZ8yED3AwsMy/c7u6jRzz.BhS'),
(6, 'agus', '$2y$10$pR5Dm53M.pATxLUm4nP2AuTDIstjDOXV8BIrx7gTrYg1kRrvcIZ2C'),
(7, 'guan', '$2y$10$.8vmY8zwDkxFS/xJPVocYOSEB5SAdVNRnqLxz/Y0eHpjWbMFek5Aa');

-- --------------------------------------------------------

--
-- Table structure for table `plus_key`
--

CREATE TABLE `plus_key` (
  `username` varchar(50) NOT NULL,
  `pkey` varchar(32) NOT NULL,
  `time` varchar(10) NOT NULL,
  `status` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plus_key`
--

INSERT INTO `plus_key` (`username`, `pkey`, `time`, `status`) VALUES
('1001', '0b5a34676b137197924cdca8507a17cc', '1521443221', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `plus_login`
--

CREATE TABLE `plus_login` (
  `id` varchar(50) NOT NULL DEFAULT '',
  `username` varchar(50) NOT NULL DEFAULT '',
  `ip` varchar(20) NOT NULL DEFAULT '',
  `tm` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` char(3) NOT NULL DEFAULT 'ON'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `plus_signup`
--

CREATE TABLE `plus_signup` (
  `mem_id` int(3) NOT NULL,
  `username` varchar(50) NOT NULL DEFAULT '',
  `password` text NOT NULL,
  `email` varchar(50) NOT NULL DEFAULT '',
  `nama` varchar(160) NOT NULL DEFAULT '',
  `division` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plus_signup`
--

INSERT INTO `plus_signup` (`mem_id`, `username`, `password`, `email`, `nama`, `division`, `phone`) VALUES
(6, 'guhal', 'a152e841783914146e4bcd4f39100686', 'henry@gmail.com', 'Henry Hulkman', 'IT Support', '02495124'),
(7, 'serihal', '01cfcd4f6b8770febfb40cb906715822', 'seri@gmail.com', 'Seri Hernawan', 'IT Infrastruktur', '08648392747'),
(8, 'fariz', 'a9fb784316e285458d773ac56b731bdb', 'fariz@gmail.com', 'fariz', 'IT Infrastruktur', '098765'),
(9, 'testtest123', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'test@gmail.com', 'test', 'IT Solution', '088888888'),
(10, 'expert', '01cfcd4f6b8770febfb40cb906715822', 'expert@test.com', 'expert', 'IT Infrastruktur', '08473474374272'),
(11, 'Nothing', 'd8578edf8458ce06fbc5bb76a58c5ca4', 'nothing@gmail.com', 'michel', 'IT Electronic Data Processing', '5556732'),
(12, 'qwerty', 'a384b6463fc216a5f8ecb6670f86456a', 'qwer@ffbr.com', 'qwe', 'Guru\\', '1234567'),
(13, 'Ekowiryo', '8e1a070e9b0340da2b0ea4f193c172f0', 'eko@gmail.com', 'Eko Wiryono', 'Kesiswaan', '64357345825');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `id_siswa` int(11) NOT NULL,
  `nis_siswa` int(225) NOT NULL,
  `nama_siswa` varchar(30) NOT NULL,
  `kelas_siswa` varchar(10) NOT NULL,
  `tgl_absen` date NOT NULL,
  `alasan_absen` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`id_siswa`, `nis_siswa`, `nama_siswa`, `kelas_siswa`, `tgl_absen`, `alasan_absen`) VALUES
(2, 87787, 'pppp', 'X - RPL', '0000-00-00', NULL),
(3, 10002, 'Agus', 'XI - RPL', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(50) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `phone` int(50) NOT NULL,
  `isDeleted` tinyint(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `email`, `password`, `salt`, `fname`, `lname`, `phone`, `isDeleted`, `timestamp`) VALUES
(2, 'Hul@gmail.com', '338babff8e108917dff561e9cac45e61c7e7d38c', '1521711650', '', '', 0, 0, '2018-03-22 09:40:50'),
(3, 'vitoraditya.f@gmail.com', 'asdfg1521712762', '1521712762', '', '', 0, 0, '2018-03-22 09:59:22'),
(4, 'ggg@gmail.com', '9bc74ae75bfe67d28dd61e7a673d9b15bdf0615061d05d5f3d7851b6f25da884', '1521712895', '', '', 0, 0, '2018-03-22 10:01:35'),
(5, 'vitoraditya.f@gmail.co.id', 'a9b526b80b5ee0a39ff71cb9636a9cca5a1b9956c880510f4425b01df6534bf3', '1521712969', '', '', 0, 0, '2018-03-22 10:02:49'),
(6, 'register@gmail.com', 'b8879ddc1a11d1d2b757b71b47628f98473e48d373f83eddb0188cada2340e41', '1521713251', '', '', 0, 0, '2018-03-22 10:07:31'),
(7, 'registrasi@gmail.com', '17dc60a631e7f3ed8c0e10e0f890bf805828cc1e', '1521713515', '', '', 0, 0, '2018-03-22 10:11:55');

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`id`, `username`, `email`, `password`) VALUES
(1, 'guluk', 'guluk@gmail.com', '65e84be33532fb784c48129675f9eff3a682b27168c0ea744b2cf58ee02337c5'),
(2, 'hul', 'hul@gmail.com', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(3, 'Herman', 'herman@gmail', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(4, 'Alex', 'Alexian@gmail', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5'),
(7, 'xander', 'xander@gmail', '5994471abb01112afcc18159f6cc74b4f511b99806da59b3caf5a9c173cacfc5');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `biodata`
--
ALTER TABLE `biodata`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id_job`),
  ADD UNIQUE KEY `nomor` (`nomor`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);
ALTER TABLE `login` ADD FULLTEXT KEY `username_2` (`username`);

--
-- Indexes for table `plus_signup`
--
ALTER TABLE `plus_signup`
  ADD PRIMARY KEY (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `userid` (`username`),
  ADD UNIQUE KEY `mem_id` (`mem_id`);

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `id_siswa` (`id_siswa`),
  ADD UNIQUE KEY `id_siswa_2` (`id_siswa`),
  ADD UNIQUE KEY `nis_siswa` (`nis_siswa`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `biodata`
--
ALTER TABLE `biodata`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id_job` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `plus_signup`
--
ALTER TABLE `plus_signup`
  MODIFY `mem_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
