-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2018 at 06:33 AM
-- Server version: 10.1.26-MariaDB-0+deb9u1
-- PHP Version: 7.0.27-0+deb9u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `memollage`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `aktivasi`
--

CREATE TABLE `aktivasi` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `akun`
--

CREATE TABLE `akun` (
  `email` varchar(100) NOT NULL,
  `profile` text NOT NULL,
  `bio` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `akun`
--

INSERT INTO `akun` (`email`, `profile`, `bio`) VALUES
('muammar.clasic@gmail.com', 'seorang pelajar', 'berusaha untuk menjadi tamvan dan berani'),
('muammar.zikri.aksana@gmail.com', 'Lets Change your profile information', 'I\'m Not \'user\'');

-- --------------------------------------------------------

--
-- Table structure for table `chat_kelas`
--

CREATE TABLE `chat_kelas` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pesan` text NOT NULL,
  `waktu_pembuatan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat_kelas`
--

INSERT INTO `chat_kelas` (`id`, `id_kelas`, `email`, `pesan`, `waktu_pembuatan`) VALUES
(27, 51, 'muammar.clasic@gmail.com', 'tes', '2018-06-19 15:39:17'),
(28, 51, 'mhs3@mhs.go.id', 'tes2', '2018-06-19 15:39:30'),
(29, 51, 'muammar.clasic@gmail.com', 'tes3', '2018-06-19 15:39:36'),
(30, 51, 'mhs3@mhs.go.id', 'tes4', '2018-06-19 15:39:43'),
(31, 51, 'muammar.clasic@gmail.com', 'tes5', '2018-06-19 15:39:50'),
(32, 51, 'mhs3@mhs.go.id', 'tes6', '2018-06-19 15:39:57'),
(33, 51, 'mhs3@mhs.go.id', 'tes7', '2018-06-19 15:40:07'),
(34, 51, 'muammar.clasic@gmail.com', 'tes8', '2018-06-19 15:40:20'),
(35, 53, 'muammar.zikri.aksana@gmail.com', 'tes', '2018-06-20 02:02:35'),
(36, 54, 'muammar.zikri.aksana@gmail.com', 'pesan 1', '2018-06-20 03:42:34'),
(37, 54, 'muammar.clasic@gmail.com', 'pesam 2', '2018-06-20 03:43:01'),
(38, 54, 'muammar.clasic@gmail.com', 'pesam 3', '2018-06-20 03:43:06'),
(39, 54, 'muammar.clasic@gmail.com', 'pesam 4', '2018-06-20 03:43:10'),
(40, 54, 'muammar.clasic@gmail.com', 'pesam 5', '2018-06-20 03:43:14'),
(41, 54, 'muammar.clasic@gmail.com', 'pesam 6rn', '2018-06-20 03:43:20'),
(42, 54, 'muammar.clasic@gmail.com', 'd', '2018-06-20 03:47:50'),
(43, 54, 'muammar.clasic@gmail.com', 'dddddddddddddddddddddddddddddddddddddddddddddddddddddddddddddd', '2018-06-20 03:54:50');

-- --------------------------------------------------------

--
-- Table structure for table `data_foto_profile`
--

CREATE TABLE `data_foto_profile` (
  `email` varchar(100) NOT NULL,
  `id_foto` varchar(100) NOT NULL,
  `tanggal_perubahan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `data_foto_profile`
--

INSERT INTO `data_foto_profile` (`email`, `id_foto`, `tanggal_perubahan`) VALUES
('muammar.clasic@gmail.com', '1529429760muammar_clasic1.jpg', '2018-06-20 00:36:00'),
('muammar.zikri.aksana@gmail.com', '1529430764muammar_zikri_aksana14199400_945679428875476_736557715468613383_n.jpg', '2018-06-20 00:52:44'),
('muammar.zikri.aksana@gmail.com', '1529433532muammar_zikri_aksana1.jpg', '2018-06-20 01:38:52'),
('muammar.zikri.aksana@gmail.com', '1529433856muammar_zikri_aksana14199400_945679428875476_736557715468613383_n.jpg', '2018-06-20 01:44:16'),
('muammar.zikri.aksana@gmail.com', '1529433862muammar_zikri_aksana1.jpg', '2018-06-20 01:44:22'),
('muammar.clasic@gmail.com', '1529439402muammar_clasic14199400_945679428875476_736557715468613383_n.jpg', '2018-06-20 03:16:42'),
('muammar.clasic@gmail.com', '1529439760muammar_clasic14199400_945679428875476_736557715468613383_n.jpg', '2018-06-20 03:22:40'),
('muammar.zikri.aksana@gmail.com', 'memollage_user.png', '2018-06-20 03:26:58'),
('muammar.zikri.aksana@gmail.com', '1529440302muammar_zikri_aksanadownload.jpeg', '2018-06-20 03:31:42'),
('muammar.zikri.aksana@gmail.com', '1529440314muammar_zikri_aksana14199400_945679428875476_736557715468613383_n.jpg', '2018-06-20 03:31:54'),
('muammar.zikri.aksana@gmail.com', '1529440347muammar_zikri_aksanadownload.jpeg', '2018-06-20 03:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE `dosen` (
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `id_univ` int(11) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_akses` int(11) NOT NULL,
  `aktivasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`email`, `nama`, `password`, `id_univ`, `tanggal_daftar`, `id_akses`, `aktivasi`) VALUES
('muammar.clasic@gmail.com', 'muammar zikri', 'kode-48MZA', 2, '2018-06-01', 2, 1),
('muammar.zikri.aksana@gmail.com', 'zikri', 'kode-48MZA', 2, '2018-06-20', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hak_akses`
--

CREATE TABLE `hak_akses` (
  `id_akses` int(11) NOT NULL,
  `akses` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hak_akses`
--

INSERT INTO `hak_akses` (`id_akses`, `akses`) VALUES
(1, 'admin'),
(2, 'dosen'),
(3, 'komisaris'),
(4, 'mahasiswa');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_akses` int(11) NOT NULL,
  `tanggal_penambahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jadwal_kelas`
--

INSERT INTO `jadwal_kelas` (`id`, `id_kelas`, `email`, `id_akses`, `tanggal_penambahan`) VALUES
(61, 54, 'muammar.clasic@gmail.com', 2, '2018-06-20'),
(62, 54, 'muammar.zikri.aksana@gmail.com', 2, '2018-06-20');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_user`
--

CREATE TABLE `jadwal_user` (
  `email_dosen` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `nama_jadwal` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tanggal_penambahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `nama_matakuliah` varchar(100) NOT NULL,
  `nama_kelas` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tanggal_pembuatan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `email_dosen`, `nama_matakuliah`, `nama_kelas`, `hari`, `jam_mulai`, `jam_akhir`, `tanggal_pembuatan`) VALUES
(54, 'muammar.clasic@gmail.com', 'pbw', 'pbw', 'Monday', '00:00:00', '12:00:00', '2018-06-20 03:33:05');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `email` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `id_akses` int(11) NOT NULL,
  `aktivasi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `title` varchar(30) NOT NULL,
  `komen` varchar(100) NOT NULL,
  `status` varchar(30) NOT NULL,
  `waktu_pembuatan` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifikasi`
--

INSERT INTO `notifikasi` (`id`, `email`, `id_kelas`, `title`, `komen`, `status`, `waktu_pembuatan`) VALUES
(11, 'muammar.zikri.aksana@gmail.com', 54, 'kelas masuk ya', 'Pesan per tama nich', 'kelas masuk', '2018-06-20 03:36:26'),
(12, 'muammar.zikri.aksana@gmail.com', 54, 'kelas masuk ya', 'Pesan per tama nich', 'kelas masuk', '2018-06-20 03:37:23'),
(13, 'muammar.clasic@gmail.com', 54, 'kelas masuk', 'Text Notifd', 'kelas masuk', '2018-06-20 03:38:33');

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE `tes` (
  `a` int(11) NOT NULL,
  `b` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tes`
--

INSERT INTO `tes` (`a`, `b`) VALUES
(1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE `universitas` (
  `id` int(11) NOT NULL,
  `nama_univ` varchar(100) NOT NULL,
  `email_at` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id`, `nama_univ`, `email_at`) VALUES
(1, 'Universitas Syiah Kuala', 'unsyiah.ac.id'),
(2, 'google', 'gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aktivasi`
--
ALTER TABLE `aktivasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_email_dosen_a` (`email`);

--
-- Indexes for table `chat_kelas`
--
ALTER TABLE `chat_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_kelas_p` (`id_kelas`);

--
-- Indexes for table `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_id_univ` (`id_univ`),
  ADD KEY `fk_id_akses` (`id_akses`);

--
-- Indexes for table `hak_akses`
--
ALTER TABLE `hak_akses`
  ADD PRIMARY KEY (`id_akses`);

--
-- Indexes for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_kelas` (`id_kelas`),
  ADD KEY `fk_id_akses_jk` (`id_akses`);

--
-- Indexes for table `jadwal_user`
--
ALTER TABLE `jadwal_user`
  ADD KEY `fk_email_dosen_j` (`email_dosen`),
  ADD KEY `fk_email_user_j` (`email_user`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`),
  ADD KEY `fk_email_dosen` (`email_dosen`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`email`),
  ADD KEY `fk_id_hak_akses` (`id_akses`);

--
-- Indexes for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_kelas_n` (`id_kelas`);

--
-- Indexes for table `universitas`
--
ALTER TABLE `universitas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_at` (`email_at`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aktivasi`
--
ALTER TABLE `aktivasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `chat_kelas`
--
ALTER TABLE `chat_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `fk_id_akses` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`),
  ADD CONSTRAINT `fk_id_univ` FOREIGN KEY (`id_univ`) REFERENCES `universitas` (`id`);

--
-- Constraints for table `jadwal_kelas`
--
ALTER TABLE `jadwal_kelas`
  ADD CONSTRAINT `fk_id_akses_jk` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal_user`
--
ALTER TABLE `jadwal_user`
  ADD CONSTRAINT `fk_email_dosen_j` FOREIGN KEY (`email_dosen`) REFERENCES `dosen` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_email_user_j` FOREIGN KEY (`email_user`) REFERENCES `mahasiswa` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `fk_email_dosen` FOREIGN KEY (`email_dosen`) REFERENCES `dosen` (`email`);

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `fk_id_hak_akses` FOREIGN KEY (`id_akses`) REFERENCES `hak_akses` (`id_akses`);

--
-- Constraints for table `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `fk_id_kelas_n` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
