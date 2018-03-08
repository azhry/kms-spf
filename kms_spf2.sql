-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2018 at 10:26 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

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
-- Table structure for table `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `nmax` int(11) NOT NULL,
  `nmin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `explicit_knowledge`
--

CREATE TABLE `explicit_knowledge` (
  `id_explicit` int(11) NOT NULL,
  `id_hasil` int(11) NOT NULL,
  `judul` varchar(300) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `id_karyawan` int(11) NOT NULL,
  `filename` text NOT NULL
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

--
-- Dumping data for table `fuzzy`
--

INSERT INTO `fuzzy` (`id_fuzzy`, `id_kriteria`, `fuzzy`, `bobot_min`, `bobot_max`) VALUES
(1, 1, 'Kurang Baik', 20, 55),
(2, 1, 'Baik', 60, 80),
(3, 1, 'Sangat Baik', 85, 100),
(4, 2, 'Kurang Bisa Memimpin', 20, 55),
(5, 2, 'Bisa Memimpin', 60, 80),
(6, 2, 'Sangat Bisa Memimpin', 85, 100),
(7, 3, 'Kurang Menguasai', 20, 55),
(8, 3, 'Menguasai', 60, 80),
(9, 3, 'Sangat Menguasai', 85, 100),
(10, 4, 'SMA', 20, 55),
(11, 4, 'D3', 60, 80),
(12, 4, 'S1', 85, 100),
(13, 5, 'Kurang Pengalaman', 20, 55),
(14, 5, 'Pengalaman', 60, 80),
(15, 5, 'Sangat Pengalaman', 85, 100),
(16, 1, 'aaa', 11, 11);

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
  `id_keputusan` int(11) NOT NULL
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

-- --------------------------------------------------------

--
-- Table structure for table `keputusan`
--

CREATE TABLE `keputusan` (
  `id_keputusan` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `nmin` int(11) NOT NULL,
  `nmax` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keputusan`
--

INSERT INTO `keputusan` (`id_keputusan`, `nama`, `nmin`, `nmax`) VALUES
(3, 'Kurang Baik', 20, 55),
(4, 'Baik', 60, 80),
(5, 'Sangat Baik', 85, 100);

-- --------------------------------------------------------

--
-- Table structure for table `komentar_explicit`
--

CREATE TABLE `komentar_explicit` (
  `id_komentar` int(11) NOT NULL,
  `id_explicit` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `komentar_tacit`
--

CREATE TABLE `komentar_tacit` (
  `id_komentar` int(11) NOT NULL,
  `id_tacit` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `komentar` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `label` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama`, `label`) VALUES
(1, 'Kompetensi Inti', 'KI'),
(2, 'Kompetensi Peran', 'KP'),
(3, 'Kompetensi Fungsional', 'KF'),
(4, 'Kompetensi Pendidikan', 'KPd'),
(5, 'Kompetensi Pengalaman Kerja', 'KPK');

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
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `role`, `deskripsi`) VALUES
(1, 'Admin', '<p>Ini adminn</p>'),
(2, 'Manajer', '<p>Manajer</p>'),
(3, 'Officer', '<p>Officer</p>'),
(4, 'Direktur', '<p>Direktur</p>'),
(5, 'Karyawan', '<p>Karyawan</p>');

-- --------------------------------------------------------

--
-- Table structure for table `tacit_knowledge`
--

CREATE TABLE `tacit_knowledge` (
  `id_tacit` int(11) NOT NULL,
  `id_hasil` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `id_karyawan` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `waktu_pembaharuan` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `explicit_knowledge`
--
ALTER TABLE `explicit_knowledge`
  ADD PRIMARY KEY (`id_explicit`),
  ADD KEY `explicit_hasil` (`id_hasil`),
  ADD KEY `explicit_karyawan` (`id_karyawan`);

--
-- Indexes for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD PRIMARY KEY (`id_fuzzy`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD KEY `hak_role` (`id_role`),
  ADD KEY `hak_karyawan` (`id_karyawan`);

--
-- Indexes for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  ADD PRIMARY KEY (`id_hasil`),
  ADD KEY `karyawan` (`id_karyawan`),
  ADD KEY `keputusan_penilaian` (`id_keputusan`);

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
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `komentar_explicit` (`id_explicit`),
  ADD KEY `komentar2_karyawan` (`id_karyawan`);

--
-- Indexes for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  ADD PRIMARY KEY (`id_komentar`),
  ADD KEY `komentar_tacit` (`id_tacit`),
  ADD KEY `komentar_karyawan` (`id_karyawan`);

--
-- Indexes for table `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD KEY `kriteria` (`id_kriteria`),
  ADD KEY `id_karyawan` (`id_karyawan`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `tacit_knowledge`
--
ALTER TABLE `tacit_knowledge`
  ADD PRIMARY KEY (`id_tacit`),
  ADD KEY `tacit_hasil` (`id_hasil`),
  ADD KEY `tacit_karyawan` (`id_karyawan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `explicit_knowledge`
--
ALTER TABLE `explicit_knowledge`
  MODIFY `id_explicit` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `fuzzy`
--
ALTER TABLE `fuzzy`
  MODIFY `id_fuzzy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
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
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `tacit_knowledge`
--
ALTER TABLE `tacit_knowledge`
  MODIFY `id_tacit` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `explicit_knowledge`
--
ALTER TABLE `explicit_knowledge`
  ADD CONSTRAINT `explicit_hasil` FOREIGN KEY (`id_hasil`) REFERENCES `hasil_penilaian` (`id_hasil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `explicit_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD CONSTRAINT `fuzzy_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD CONSTRAINT `hak_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hak_role` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  ADD CONSTRAINT `karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keputusan_penilaian` FOREIGN KEY (`id_keputusan`) REFERENCES `keputusan` (`id_keputusan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `kar_departemen` FOREIGN KEY (`id_departemen`) REFERENCES `departemen` (`id_departemen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kar_jabatan` FOREIGN KEY (`id_jabatan`) REFERENCES `jabatan` (`id_jabatan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  ADD CONSTRAINT `komentar2_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_explicit` FOREIGN KEY (`id_explicit`) REFERENCES `explicit_knowledge` (`id_explicit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  ADD CONSTRAINT `komentar_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `komentar_tacit` FOREIGN KEY (`id_tacit`) REFERENCES `tacit_knowledge` (`id_tacit`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  ADD CONSTRAINT `id_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kriteria` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tacit_knowledge`
--
ALTER TABLE `tacit_knowledge`
  ADD CONSTRAINT `tacit_hasil` FOREIGN KEY (`id_hasil`) REFERENCES `hasil_penilaian` (`id_hasil`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tacit_karyawan` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
