-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2017 at 03:26 PM
-- Server version: 10.1.28-MariaDB
-- PHP Version: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kms_spf`
--

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` int(11) NOT NULL,
  `nama_departemen` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `fuzzy`
--

CREATE TABLE `fuzzy` (
  `id_fuzzy` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `fuzzy` varchar(100) NOT NULL,
  `bobot_min` int(11) NOT NULL,
  `bobot_max` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_role` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hasil_penilaian`
--

CREATE TABLE `hasil_penilaian` (
  `id_hasil` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `nilai` int(11) NOT NULL,
  `kinerja` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `id_departemen` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(64) NOT NULL,
  `NIK` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `tempat_lahir` varchar(225) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenis_kelamin` enum('p','l','','') NOT NULL,
  `agama` varchar(32) NOT NULL,
  `alamat` text NOT NULL,
  `pendidikan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_karyawan`, `id_departemen`, `id_jabatan`, `username`, `password`, `NIK`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenis_kelamin`, `agama`, `alamat`, `pendidikan`) VALUES
(1, 1, 4, 'direktur', '9bc242fe326e1f0db6d4571f45067144', 101000, 'Fathoni', 'Padang', '1960-08-06', 'l', 'Islam', 'Palembang', 'S1 Manajemen'),
(2, 2, 5, 'admin_hrd', '9bc242fe326e1f0db6d4571f45067144', 102005, 'Rudiyan', 'Palembang', '1987-11-09', 'l', 'Islam', 'Palembang', 'S. Ag'),
(3, 2, 2, 'manajer_hrd', '985fabf8f96dc1c4c306341031569937', 102002, 'Erva Yanti', 'Ujung Gading', '1990-09-27', 'p', 'Islam', 'Palembang', 'S1 Sistem Informasi'),
(4, 1, 2, 'manajer_fa', '9bc242fe326e1f0db6d4571f45067144', 101001, 'Jon Hendri', 'Palembang', '1968-02-02', 'l', 'Islam', 'Palembang', 'S1 Akuntansi'),
(5, 1, 1, 'supervisorfa_desiana', '9bc242fe326e1f0db6d4571f45067144', 10102, 'Desiana', 'Palembang', '1985-05-12', 'p', 'Islam', 'Palembang', 'S1 Akuntansi'),
(6, 1, 1, 'supervisorfa_agus', '9bc242fe326e1f0db6d4571f45067144', 10101, 'Agus Munandar', 'Palembang', '1985-01-25', 'l', 'Islam', 'Indralaya', 'S1 Akuntansi'),
(7, 1, 3, 'foremanfa_usman', '9bc242fe326e1f0db6d4571f45067144', 10107, 'Usman', 'Banda', '1980-12-01', 'l', 'Islam', 'Palembang', 'S1 Agama'),
(8, 1, 3, 'foremanfa_aulia', '9bc242fe326e1f0db6d4571f45067144', 10103, 'Aulia Taqwa', 'Prabumulih', '1986-09-01', 'l', 'Islam', 'Indralaya', 'D3 Akuntansi'),
(9, 1, 3, 'foremanfa_dermawan', '9bc242fe326e1f0db6d4571f45067144', 10104, 'Dermawan ', 'Bandung', '1986-07-07', 'p', 'Islam', 'Tanjung Raja', 'D3 Statistika'),
(10, 1, 3, 'foremanfa_suci', '9bc242fe326e1f0db6d4571f45067144', 10105, 'Suci Rahmawati', 'Banjarmasin', '1980-06-16', 'p', 'Islam', 'Palembang', 'S1 Akuntansi'),
(11, 1, 3, 'foremanfa_michael', '9bc242fe326e1f0db6d4571f45067144', 10106, 'Michael Saut', 'Medan', '1980-09-15', 'l', 'Kristen', 'Pelembang', 'S1 Sistem Informasi'),
(12, 1, 3, 'foremanfa_aryadi', '9bc242fe326e1f0db6d4571f45067144', 10108, 'Aryadi', 'Banjarmasin', '1990-01-12', 'l', 'Islam', 'Palembang', 'S1 Akuntasi'),
(13, 1, 3, 'foreman_tri', '9bc242fe326e1f0db6d4571f45067144', 10109, 'Tri Sutrisno', 'Palembang', '1989-01-17', 'l', 'Islam', 'Palembang', 'S. Ag'),
(14, 1, 3, 'foremanfa_wulandari', '9bc242fe326e1f0db6d4571f45067144', 101010, 'Wulandari', 'Palembang', '1989-01-13', 'p', 'Islam', 'Palembang', 'S1 Akuntansi'),
(15, 1, 3, 'foremanfa_reno', '9bc242fe326e1f0db6d4571f45067144', 101011, 'Reno', 'Palembang', '1988-02-15', 'p', 'Islam', 'Palembang', 'S1 Pertanian'),
(16, 1, 3, 'foremanfa_yuliza', 'borneos1', 101012, 'Yuliza Subhan', 'Palembang', '1986-02-20', 'p', 'Islam', 'Indralaya', 'S1 Teknik'),
(17, 1, 3, 'foremanfa_supriyadi', '9bc242fe326e1f0db6d4571f45067144', 101013, 'Supriyadi', 'Indralaya', '1988-03-01', 'l', 'Kristen', 'Indralaya', 'S1 Akuntansi'),
(18, 1, 3, 'foremanfa_suparti', '9bc242fe326e1f0db6d4571f45067144', 101013, 'Suparti', 'Wonosobo', '1985-03-25', 'p', 'Islam', 'Prabumulih', 'S1 Akuntansi'),
(19, 1, 3, 'foremanfa_hartaty', '9bc242fe326e1f0db6d4571f45067144', 101014, 'Hartaty', 'Bangka', '1995-03-07', 'p', 'Islam', 'Indralaya', 'S1 sistem Informasi'),
(20, 1, 3, 'foremanfa_hambali', '9bc242fe326e1f0db6d4571f45067144', 101016, 'Hambali', 'Padang', '1899-04-04', 'l', 'Islam', 'Tanjung Senai', 'S1 Akuntansi'),
(21, 1, 3, 'foremanfa_nurhabibah', '9bc242fe326e1f0db6d4571f45067144', 101017, 'Nurhabibah', 'Surabaya', '1988-05-11', 'p', 'Islam', 'Indralaya', 'S1 Pertanian'),
(22, 1, 3, 'foreman_julian', '9bc242fe326e1f0db6d4571f45067144', 101018, 'Julian', 'Medan', '1984-04-18', 'l', 'Kristen', 'Indralaya', 'S1 Akuntansi'),
(23, 1, 3, 'foremanfa_yuliani', '9bc242fe326e1f0db6d4571f45067144', 101019, 'Yuliani', 'Indralaya', '1988-05-23', 'p', 'Islam', 'Indralaya', 'S1 Pertanian'),
(24, 1, 3, 'foremanfa_zulkarnain', '9bc242fe326e1f0db6d4571f45067144', 101020, 'Zulkarnain', 'Samarinda', '1886-07-27', 'l', 'Islam', 'Indralaya', 'S1 Akuntannsi');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `label` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `penilaian_karyawan`
--

CREATE TABLE `penilaian_karyawan` (
  `id_penilaian` int(11) NOT NULL,
  `id_kriteria` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD PRIMARY KEY (`id_fuzzy`);

--
-- Indexes for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`),
  ADD KEY `id_jabatan` (`id_jabatan`),
  ADD KEY `id_departemen` (`id_departemen`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fuzzy`
--
ALTER TABLE `fuzzy`
  MODIFY `id_fuzzy` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
