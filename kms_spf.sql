-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2018 at 09:56 AM
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

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`, `deskripsi`) VALUES
(1, 'Human Resource General Affair', '<p>HRGA</p>');

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

--
-- Dumping data for table `explicit_knowledge`
--

INSERT INTO `explicit_knowledge` (`id_explicit`, `id_hasil`, `judul`, `status`, `id_karyawan`, `filename`) VALUES
(3, 3, '', 0, 25, '20180220211920.pdf'),
(4, 2, 'test', 0, 25, '20180227145918.pdf');

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
(1, 1, 'Kurang Baik', 20, 60),
(2, 1, 'Baik', 60, 80),
(3, 1, 'Sangat Baik', 80, 100),
(4, 2, 'Kurang Bisa Memimpin', 20, 60),
(5, 2, 'Bisa Memimpin', 60, 80),
(6, 2, 'Sangat Bisa Memimpin', 80, 100),
(7, 3, 'Kurang Menguasai', 20, 60),
(8, 3, 'Menguasai', 60, 80),
(9, 3, 'Sangat Menguasai', 80, 100),
(10, 4, 'SMA', 20, 55),
(11, 4, 'D3', 60, 80),
(12, 4, 'S1', 85, 100),
(13, 5, 'Kurang Pengalaman', 20, 55),
(14, 5, 'Pengalaman', 60, 80),
(15, 5, 'Sangat Pengalaman', 85, 100);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_role` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_role`, `id_karyawan`) VALUES
(1, 25),
(2, 25),
(3, 25),
(4, 25),
(5, 25),
(3, 26);

-- --------------------------------------------------------

--
-- Table structure for table `hasil_penilaian`
--

CREATE TABLE `hasil_penilaian` (
  `id_hasil` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_keputusan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hasil_penilaian`
--

INSERT INTO `hasil_penilaian` (`id_hasil`, `id_karyawan`, `id_keputusan`) VALUES
(1, 1, 3),
(2, 5, 3),
(3, 25, 3),
(4, 1, 4),
(5, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(200) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `deskripsi`) VALUES
(1, 'Manajer', '<p>manajer</p>'),
(4, 'Training Officer', '<p>Training Officer</p>');

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
(24, 1, 3, 'foremanfa_zulkarnain', '9bc242fe326e1f0db6d4571f45067144', 101020, 'Zulkarnain', 'Samarinda', '1886-07-27', 'l', 'Islam', 'Indralaya', 'S1 Akuntannsi'),
(25, 1, 1, 'azhary', '985fabf8f96dc1c4c306341031569937', 12345, 'Azhary Arliansyah', 'Palembang', '2018-02-23', 'l', 'Islam', 'Alamat', 'S1'),
(26, 1, 1, 'harsi', '827ccb0eea8a706c4c34a16891f84e7b', 23456, 'Harsi Rahayu', 'Bunga Mayang', '1995-11-06', 'p', 'Islam', 'Griya Sejahtera', 'Mahasiswa');

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
(4, 'Baik', 55, 80),
(5, 'Sangat Baik', 80, 100);

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

--
-- Dumping data for table `komentar_explicit`
--

INSERT INTO `komentar_explicit` (`id_komentar`, `id_explicit`, `id_karyawan`, `komentar`, `waktu`) VALUES
(1, 3, 25, 'komentar explicit', '2018-02-27 02:10:20');

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

--
-- Dumping data for table `komentar_tacit`
--

INSERT INTO `komentar_tacit` (`id_komentar`, `id_tacit`, `id_karyawan`, `komentar`, `waktu`) VALUES
(1, 1, 25, 'Ini komentarku, mana komentarmu?', '2018-02-13 18:04:06'),
(2, 1, 25, 'contoh komentar', '2018-02-27 01:50:52');

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

--
-- Dumping data for table `penilaian_karyawan`
--

INSERT INTO `penilaian_karyawan` (`id_penilaian`, `id_kriteria`, `id_karyawan`, `bobot`) VALUES
(1, 1, 1, 100),
(2, 2, 1, 90),
(3, 3, 1, 30),
(4, 4, 1, 100),
(5, 5, 1, 65),
(6, 1, 2, 100),
(7, 2, 2, 90),
(8, 3, 2, 88),
(9, 4, 2, 100),
(10, 5, 2, 80),
(11, 1, 5, 23),
(12, 2, 5, 45),
(13, 3, 5, 23),
(14, 4, 5, 65),
(15, 5, 5, 3),
(16, 1, 25, 30),
(17, 2, 25, 40),
(18, 3, 25, 50),
(19, 4, 25, 20),
(20, 5, 25, 40);

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
-- Dumping data for table `tacit_knowledge`
--

INSERT INTO `tacit_knowledge` (`id_tacit`, `id_hasil`, `status`, `id_karyawan`, `judul`, `waktu_pembaharuan`) VALUES
(1, 3, 0, 25, 'haha', '0000-00-00 00:00:00'),
(2, 1, 1, 25, '', '0000-00-00 00:00:00'),
(3, 3, 0, 25, '', '0000-00-00 00:00:00'),
(4, 1, 0, 25, '', '0000-00-00 00:00:00'),
(5, 1, 0, 25, 'aaaabbb', '2018-02-26 18:13:46');

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
  ADD PRIMARY KEY (`id_explicit`);

--
-- Indexes for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD PRIMARY KEY (`id_fuzzy`),
  ADD KEY `id_kriteria` (`id_kriteria`);

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
-- Indexes for table `keputusan`
--
ALTER TABLE `keputusan`
  ADD PRIMARY KEY (`id_keputusan`);

--
-- Indexes for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indexes for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  ADD PRIMARY KEY (`id_komentar`);

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
-- Indexes for table `tacit_knowledge`
--
ALTER TABLE `tacit_knowledge`
  ADD PRIMARY KEY (`id_tacit`);

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
  MODIFY `id_departemen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `explicit_knowledge`
--
ALTER TABLE `explicit_knowledge`
  MODIFY `id_explicit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `fuzzy`
--
ALTER TABLE `fuzzy`
  MODIFY `id_fuzzy` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `hasil_penilaian`
--
ALTER TABLE `hasil_penilaian`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `keputusan`
--
ALTER TABLE `keputusan`
  MODIFY `id_keputusan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `komentar_explicit`
--
ALTER TABLE `komentar_explicit`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `komentar_tacit`
--
ALTER TABLE `komentar_tacit`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `penilaian_karyawan`
--
ALTER TABLE `penilaian_karyawan`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tacit_knowledge`
--
ALTER TABLE `tacit_knowledge`
  MODIFY `id_tacit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `fuzzy`
--
ALTER TABLE `fuzzy`
  ADD CONSTRAINT `fuzzy_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id_kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
