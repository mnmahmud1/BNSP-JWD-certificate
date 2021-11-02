-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 16, 2021 at 02:37 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb_smp`
--

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL,
  `nisn` varchar(10) NOT NULL,
  `foto` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` varchar(10) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `asal_sekolah` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `hp_siswa` varchar(13) NOT NULL,
  `nama_wali` varchar(50) NOT NULL,
  `hub_wali` varchar(30) NOT NULL,
  `pekerjaan_wali` varchar(30) NOT NULL,
  `hp_wali` varchar(13) NOT NULL,
  `alamat_wali` text NOT NULL,
  `status` varchar(3) NOT NULL,
  `validasi` tinyint(1) NOT NULL,
  `tgl_daftar` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `username`, `password`, `nisn`, `foto`, `nama`, `jenkel`, `tempat_lahir`, `tgl_lahir`, `asal_sekolah`, `alamat`, `hp_siswa`, `nama_wali`, `hub_wali`, `pekerjaan_wali`, `hp_wali`, `alamat_wali`, `status`, `validasi`, `tgl_daftar`) VALUES
(9, 'albi', '$2y$10$aAyrG4y86tf/LpPZCdjPZeQgUMPh1ltr57g3kb0NBg8xOjn6fPGwa', '0035904409', 'albi.JPG', 'Albi Albana', 'Laki-Laki', 'Bogor', '2021-10-10', 'SDN CICADAS 1', 'Kp. Cicadas', '0896751235617', 'Tina', 'Ibu', 'Ibur Rumah Tangga', '0812657263423', 'Kp. Cicadas', '', 1, '2021-10-16'),
(10, 'sarda', '$2y$10$RKybMZ2iqSdV2b74jOm/KenFuYhRcir4CNPBzH4GvMR4Y4Tel5J86', '0018193490', 'sarda.JPG', 'Sarda Ragilia Aizuri Siahaan', 'Perempuan', 'Bogor', '2021-10-19', 'SDN NTT 12', 'Kp. Parung Dengdek', '', 'Martika', 'Ibu', 'Ibur Rumah Tangga', '0856234223423', 'Kp. Parung Dengdek', '', 1, '2021-10-16'),
(11, 'aan', '$2y$10$/cg6WeWNWs4ZBwyUV6qPrex.eXRz1MdvqhJKASKliif1JBAI0HP.e', '0022823110', 'aan.JPG', 'Aan Maryani', 'Perempuan', 'Bogor', '2021-09-30', 'SDN CIKEAS 4', 'Kp. Cikeas', '', 'RIDWAN', 'Ayah', 'Karyawan Swasta', '0896465465465', 'Kp. Cikeas', '', 1, '2021-10-16'),
(12, 'dede', '$2y$10$wkYQUsbCctZhfQycTiCMq.8dDHcMLRcL1pqNBckst9RsO1rq0D/NG', '0018193490', 'dede.JPG', 'Dede Irawan', 'Laki-Laki', 'Cianjur', '2021-10-26', 'SDN TLAJUNG UDIK 2', 'Kp. Tlajung Udik', '', 'Indah Mulyani', 'Kakak', 'Karyawan Swasta', '0857675776474', 'Kp. Tlajung Udik', '', 1, '2021-10-16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`) VALUES
(1, 'admin', 'admin', '$2y$10$v7uy/o39Z.ggGngdWZU5uu3ReIehb7MXU0l8Mml4EqH0ZM3ZbHpdq');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
