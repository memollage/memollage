-- phpMyAdmin SQL Dump
-- version 4.6.6deb4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 12, 2018 at 03:44 PM
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
-- Table structure for table `chat_kelas`
--

CREATE TABLE `chat_kelas` (
  `id_kelas` int(11) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `tanggal_penambahan` date NOT NULL,
  `pesan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
('amar98@mhs.unsyiah.ac.id', 'zikri', 'kode-48MZA', 1, '2018-06-12', 2, 1),
('muammar.clasic@gmail.com', 'zikri', 'kode-48MZA', 1, '2018-06-01', 1, 1);

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
(4, 'anggota');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal_kelas`
--

CREATE TABLE `jadwal_kelas` (
  `id_kelas` int(11) NOT NULL,
  `email_dosen` varchar(100) NOT NULL,
  `email_user` varchar(100) NOT NULL,
  `tanggal_penambahan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `nama_kelas` varchar(100) NOT NULL,
  `hari` varchar(100) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_akhir` time NOT NULL,
  `tanggal_pembuatan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`email`, `nama`, `password`, `tanggal_daftar`, `id_akses`, `aktivasi`) VALUES
('muammar.zikri.aksana@gmail.com', 'zikri', 'kode-48MZA', '2018-06-12', 4, 1);

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
(1, 'Universitas Syiah Kuala', 'unsyiah.ac.id');

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
  ADD KEY `fk_id_kelas_p` (`id_kelas`),
  ADD KEY `fk_id_dosen_p` (`email_dosen`),
  ADD KEY `fk_id_user_p` (`email_user`);

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
  ADD KEY `fk_id_kelas` (`id_kelas`),
  ADD KEY `fk_email_user_k` (`email_user`),
  ADD KEY `fk_email_dosen_k` (`email_dosen`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `universitas`
--
ALTER TABLE `universitas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chat_kelas`
--
ALTER TABLE `chat_kelas`
  ADD CONSTRAINT `fk_id_dosen_p` FOREIGN KEY (`email_dosen`) REFERENCES `dosen` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_kelas_p` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_user_p` FOREIGN KEY (`email_user`) REFERENCES `mahasiswa` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_email_dosen_k` FOREIGN KEY (`email_dosen`) REFERENCES `dosen` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_email_user_k` FOREIGN KEY (`email_user`) REFERENCES `mahasiswa` (`email`) ON DELETE CASCADE ON UPDATE CASCADE,
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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
