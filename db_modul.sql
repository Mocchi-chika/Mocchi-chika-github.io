-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 15, 2023 at 01:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_modul`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(32, 'administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
(33, 'Aria Rifaldy', '123', '202cb962ac59075b964b07152d234b70'),
(35, 'luluk eka rahayu', 'kurir', 'bb31e9f1f03ad601eb8fb53e4f663039');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_modul`
--

CREATE TABLE `tbl_modul` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `namaFile` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_modul`
--

INSERT INTO `tbl_modul` (`id`, `title`, `pengarang`, `description`, `image_name`, `namaFile`, `featured`, `active`) VALUES
(1, 'Modul Sistem Basis Data', 'Ade Davy Wiranata, S.Kom., M.Kom.', 'Modul Sistem Basis Data ', 'Modul_Name_961.jpeg', 'Modul Sistem Basis Data dan Surat tugas mengajar.pdf', 'Yes', 'Yes'),
(2, 'Modul Pemrograman Visual', 'Andrian Sah, S.Kom., M.Kom. &  Jusmawati, S.Kom., M.Kom', 'Modul Pemrograman Visual', 'Modul_Name_184.jpeg', 'Pemrograman Visual 2023 (1).pdf', 'Yes', 'Yes'),
(3, 'Modul Pemrograman Berorientasi Objek', 'Ir. Mursalim Tonggiroh, S.Kom., M.Eng.', 'Modul Praktikum Pemrograman Berorientasi Objek', 'Modul_Name_597.jpeg', '1. PBO.pdf', 'Yes', 'Yes'),
(5, 'Modul Konsep Teknologi', 'Rani Susanto, S.Kom.', 'Modul  Konsep Teknologi Informatika', 'Modul_Name_929.jpeg', 'Modul Konsep Teknologi.pdf', 'Yes', 'Yes'),
(6, 'MODUL PEMBELAJARAN PRAKTEK BASIS DATA (MySQL)', 'Haris Saputro', 'MODUL PEMBELAJARAN PRAKTEK\r\nBASIS DATA (MySQL)\r\n', 'Modul_Name_765.jpeg', 'materi_1.pdf', 'No', 'Yes'),
(7, 'Modul Praktikum Pemrograman C++', 'Frieyadie, Sopiyan Dalis dan Pradita Cynthia Sari', 'Modul \r\nPemrograman C++', 'Modul_Name_108.jpeg', 'MODUL_C--_RevMer14--ok.pdf', 'Yes', 'Yes'),
(8, 'MODUL PENGANTAR TEKNOLOGI INFORMASI & KOMUNIKASI', 'Fabriyan Fandi Dwi Imaniawan', 'MODUL\r\nPENGANTAR TEKNOLOGI INFORMASI & KOMUNIKASI\r\n', 'Modul_Name_721.jpeg', 'MODUL-PENGANTAR-TEKNOLOGI-INFORMASI-&-KOMUNIKASI.pdf', 'No', 'Yes'),
(9, 'MODUL  APLIKASI KOMPUTER', 'MURSALIN, S.Pd.,M.Pd', 'MODUL  APLIKASI KOMPUTER (Microsoft Word, Microsoft Excel, dan Power Point)', 'Modul_Name_696.jpeg', 'Modul%20Ajar%20Aplikasi%20Komputer.pdf', 'No', 'Yes'),
(10, 'MODUL PRAKTIKUM SISTEM INFORMASI', 'Agung Teguh Wibowo Almais, M.T', 'MODUL PRAKTIKUM\r\nSISTEM INFORMASI', 'Modul_Name_702.jpeg', 'MODUL-PRAKTIKUM-SI.pdf', 'No', 'Yes'),
(11, 'MODUL PRAKTIKUM BASIS DATA', 'Arita Witanti, S.T., M.T', 'MODUL PRAKTIKUM\r\nBASIS DATA (MYSQL)', 'Modul_Name_925.jpeg', 'MODUL%20PRAKTIKUM%20BASIS%20DATA.pdf', 'No', 'Yes'),
(12, 'Modul Kuliah Manajemen Idustri', 'Muhamad Ali, M.T', 'Modul Kuliah Manajemen Idustri', 'Modul_Name_316.jpeg', 'Materi+1+Manajemen+dan+Organisasi.pdf', 'No', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_modul`
--
ALTER TABLE `tbl_modul`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tbl_modul`
--
ALTER TABLE `tbl_modul`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
