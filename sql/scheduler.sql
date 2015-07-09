-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 09, 2015 at 04:55 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scheduler`
--

-- --------------------------------------------------------

--
-- Table structure for table `dosen`
--

CREATE TABLE IF NOT EXISTS `dosen` (
  `id_dosen` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `password` mediumtext NOT NULL,
  `nama` varchar(256) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `keterangan` mediumtext NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `twitter` varchar(256) NOT NULL,
  `status` enum('Tidak Aktif','Aktif') NOT NULL,
  PRIMARY KEY (`id_dosen`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `dosen`
--

INSERT INTO `dosen` (`id_dosen`, `email`, `password`, `nama`, `no_telp`, `alamat`, `keterangan`, `facebook`, `twitter`, `status`) VALUES
(2, 'dodo@yahoo.com', '721c6ff80a6d3e4ad4ffa52a04c60085', 'Dodo Edodo', '', '', 'dodo itu dosen', '', '', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `dosen_universitas`
--

CREATE TABLE IF NOT EXISTS `dosen_universitas` (
  `id_universitas` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  KEY `id_dosen` (`id_dosen`),
  KEY `id_dosen_2` (`id_dosen`),
  KEY `id_universitas` (`id_universitas`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` int(11) NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `terakhir_diedit` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_dosen` int(11) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `id_dosen` (`id_dosen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `janji`
--

CREATE TABLE IF NOT EXISTS `janji` (
  `id_mahasiswa` int(11) NOT NULL,
  `id_dosen` int(11) NOT NULL,
  `waktu_janji` datetime NOT NULL,
  `keterangan` mediumtext NOT NULL,
  `waktu_buat_janji` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` enum('Pending','Approved','Rejected') NOT NULL,
  KEY `id_mahasiswa` (`id_mahasiswa`),
  KEY `id_dosen` (`id_dosen`),
  KEY `id_mahasiswa_2` (`id_mahasiswa`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan`
--

CREATE TABLE IF NOT EXISTS `kegiatan` (
  `id_kegiatan` int(11) NOT NULL AUTO_INCREMENT,
  `judul` varchar(256) NOT NULL,
  `jam_mulai` time NOT NULL,
  `jam_selesai` time NOT NULL,
  `tempat` varchar(256) NOT NULL,
  `letak_geografis` varchar(256) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  PRIMARY KEY (`id_kegiatan`),
  KEY `id_jadwal` (`id_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE IF NOT EXISTS `mahasiswa` (
  `id_mahasiswa` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `password` mediumtext NOT NULL,
  `nama` varchar(256) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `thn_masuk` year(4) NOT NULL,
  `jurusan` varchar(256) NOT NULL,
  `status` enum('Tidak Aktif','Aktif') NOT NULL,
  `id_universitas` int(11) NOT NULL,
  PRIMARY KEY (`id_mahasiswa`),
  KEY `id_universitas` (`id_universitas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_mahasiswa`, `email`, `password`, `nama`, `no_telp`, `alamat`, `thn_masuk`, `jurusan`, `status`, `id_universitas`) VALUES
(2, 'tiffanidesi@yahoo.com', '069e2dd171f61ecffb845190a7adf425', 'Desi Tiffani S.', '', '', 0000, 'Teknik Informatika 2012', 'Aktif', 1),
(3, 'ichafizha@gmail.com', '9088e8c69e4625a75b5068a3f77d777b', 'Hafizha Husnaisa', '', '', 0000, 'Teknik Informatika 2012', 'Aktif', 1);

-- --------------------------------------------------------

--
-- Table structure for table `negara`
--

CREATE TABLE IF NOT EXISTS `negara` (
  `id_negara` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) NOT NULL,
  `lokasi_geografis` varchar(256) NOT NULL,
  PRIMARY KEY (`id_negara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `negara`
--

INSERT INTO `negara` (`id_negara`, `nama`, `lokasi_geografis`) VALUES
(4, 'Indonesia', ''),
(5, 'Malaysia', '');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE IF NOT EXISTS `provinsi` (
  `id_provinsi` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) NOT NULL,
  `id_negara` int(11) NOT NULL,
  `lokasi_geografis` varchar(256) NOT NULL,
  PRIMARY KEY (`id_provinsi`),
  KEY `id_negara` (`id_negara`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `nama`, `id_negara`, `lokasi_geografis`) VALUES
(1, '', 4, 'Jawa Barat'),
(2, '', 4, 'DI Yogyakarta');

-- --------------------------------------------------------

--
-- Table structure for table `universitas`
--

CREATE TABLE IF NOT EXISTS `universitas` (
  `id_universitas` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(256) NOT NULL,
  `no_telp` varchar(50) NOT NULL,
  `alamat` varchar(256) NOT NULL,
  `kota` varchar(256) NOT NULL,
  `id_provinsi` int(11) NOT NULL,
  PRIMARY KEY (`id_universitas`),
  KEY `id_provinsi` (`id_provinsi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `universitas`
--

INSERT INTO `universitas` (`id_universitas`, `nama`, `no_telp`, `alamat`, `kota`, `id_provinsi`) VALUES
(1, 'Universitas Komputer Indonesia', '', 'DU', 'Bandung', 1),
(2, 'Institut Teknologi Bandung', '', 'Jl. Ganesha', 'Bandung', 1),
(3, 'Institut Teknologi Harapan Bangsa', '', '', 'Bandung', 1),
(4, 'Universitas Gajah Mada', '', '', 'Jogja', 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `dosen_universitas`
--
ALTER TABLE `dosen_universitas`
  ADD CONSTRAINT `dosen_universitas_ibfk_2` FOREIGN KEY (`id_universitas`) REFERENCES `universitas` (`id_universitas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `dosen_universitas_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `janji`
--
ALTER TABLE `janji`
  ADD CONSTRAINT `janji_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `dosen` (`id_dosen`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `janji_ibfk_1` FOREIGN KEY (`id_mahasiswa`) REFERENCES `mahasiswa` (`id_mahasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD CONSTRAINT `kegiatan_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal` (`id_jadwal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD CONSTRAINT `mahasiswa_ibfk_2` FOREIGN KEY (`id_universitas`) REFERENCES `universitas` (`id_universitas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD CONSTRAINT `provinsi_ibfk_1` FOREIGN KEY (`id_negara`) REFERENCES `negara` (`id_negara`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `universitas`
--
ALTER TABLE `universitas`
  ADD CONSTRAINT `universitas_ibfk_1` FOREIGN KEY (`id_provinsi`) REFERENCES `provinsi` (`id_provinsi`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
