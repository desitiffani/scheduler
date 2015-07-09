-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 05, 2015 at 06:00 PM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skilaboo`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(256) NOT NULL,
  `password` mediumtext NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `judul` mediumtext NOT NULL,
  `isi` mediumtext NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`) VALUES
(1, 'test', 'test isi artikel'),
(2, 'coba 2', 'isi coba 2');

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE IF NOT EXISTS `member` (
  `id_member` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(256) NOT NULL,
  `password` mediumtext NOT NULL,
  `nama` varchar(256) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `alamat` mediumtext NOT NULL,
  `status_aktivasi` enum('Tidak Aktif','Aktif') NOT NULL DEFAULT 'Tidak Aktif',
  `id_admin` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_member`),
  UNIQUE KEY `email` (`email`),
  KEY `id_admin` (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id_member`, `email`, `password`, `nama`, `no_telp`, `alamat`, `status_aktivasi`, `id_admin`) VALUES
(1, 'tiffanidesi@yahoo.com', '069e2dd171f61ecffb845190a7adf425', 'Desi Tiffani Siahaan', '12345', '', 'Aktif', NULL),
(2, 'desi@mobilus-interactive.com', 'd4158baafaee85a95cf89ee16b6ebb42', 'Desi Tiffani Siahaan Mobilus', '12345', '', 'Aktif', NULL),
(3, 'kiki@mobilus-interactive.com', '0d61130a6dd5eea85c2c5facfe1c15a7', 'Kiki Mobilus', '12345', '', 'Aktif', NULL),
(4, 'ririn@mobilus-interactive.com', 'b84a4059d1af6c8b50bb7a28290dbd63', 'Ririn Mobilus', '12345', '', 'Aktif', NULL),
(5, 'ragil@mobilus-interactive.com', '67153c4ffb77b9d03276cad142a84e79', 'Ragil Mobilus', '12345', '', 'Aktif', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE IF NOT EXISTS `pesan` (
  `id_pesan` int(11) NOT NULL AUTO_INCREMENT,
  `id_pengirim` int(11) DEFAULT NULL,
  `id_penerima` int(11) DEFAULT NULL,
  `isi` text NOT NULL,
  `status_baca` enum('Belum dibaca','Sudah dibaca') NOT NULL DEFAULT 'Belum dibaca',
  `tgl_dikirim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status_hapus_pengirim` enum('Tidak dihapus','Dihapus') NOT NULL DEFAULT 'Tidak dihapus',
  `status_hapus_penerima` enum('Tidak dihapus','Dihapus') NOT NULL DEFAULT 'Tidak dihapus',
  PRIMARY KEY (`id_pesan`),
  KEY `id_pengirim` (`id_pengirim`),
  KEY `id_penerima` (`id_penerima`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_pengirim`, `id_penerima`, `isi`, `status_baca`, `tgl_dikirim`, `status_hapus_pengirim`, `status_hapus_penerima`) VALUES
(1, 1, 5, 'kirim pesan ke ragil', 'Sudah dibaca', '2015-07-05 10:37:42', 'Tidak dihapus', 'Dihapus'),
(3, 1, 5, 'test kirim pesan kedua', 'Sudah dibaca', '2015-07-05 10:55:32', 'Tidak dihapus', 'Dihapus'),
(4, 5, 1, 'test balas pesan', 'Sudah dibaca', '2015-07-05 11:05:09', 'Dihapus', 'Tidak dihapus'),
(5, 5, 1, 'apanya sih?', 'Sudah dibaca', '2015-07-05 11:15:56', 'Tidak dihapus', 'Tidak dihapus'),
(6, 1, 5, 'apanya ai kamu hahaha', 'Sudah dibaca', '2015-07-05 11:16:23', 'Tidak dihapus', 'Dihapus'),
(7, 5, 3, 'hai kiki :)', 'Sudah dibaca', '2015-07-05 11:38:20', 'Tidak dihapus', 'Tidak dihapus'),
(8, 3, 5, 'hai ragil :)', 'Sudah dibaca', '2015-07-05 11:40:43', 'Tidak dihapus', 'Tidak dihapus'),
(9, 5, 1, 'hahahaha :D', 'Sudah dibaca', '2015-07-05 12:07:21', 'Tidak dihapus', 'Tidak dihapus'),
(10, 5, 1, 'hahahaha :D', 'Sudah dibaca', '2015-07-05 12:11:08', 'Dihapus', 'Tidak dihapus'),
(11, 5, 1, 'hihihi', 'Sudah dibaca', '2015-07-05 12:11:27', 'Dihapus', 'Tidak dihapus'),
(12, 5, 1, 'hoho', 'Sudah dibaca', '2015-07-05 12:11:38', 'Dihapus', 'Dihapus'),
(13, 5, 1, 'kenapa?', 'Sudah dibaca', '2015-07-05 15:47:34', 'Tidak dihapus', 'Tidak dihapus'),
(14, 5, 1, 'hai lagi deh', 'Sudah dibaca', '2015-07-05 15:49:29', 'Tidak dihapus', 'Tidak dihapus'),
(15, 2, 1, 'test', 'Belum dibaca', '2015-07-05 15:54:18', 'Tidak dihapus', 'Tidak dihapus'),
(16, 2, 1, 'test 123', 'Belum dibaca', '2015-07-05 15:54:23', 'Tidak dihapus', 'Tidak dihapus'),
(17, 1, 5, 'apanya sih hah?', 'Belum dibaca', '2015-07-05 15:55:21', 'Tidak dihapus', 'Tidak dihapus'),
(18, 1, 5, 'geje kamu mah hahaha', 'Belum dibaca', '2015-07-05 15:55:28', 'Tidak dihapus', 'Tidak dihapus');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE IF NOT EXISTS `status` (
  `id_status` int(11) NOT NULL AUTO_INCREMENT,
  `id_member` int(11) NOT NULL,
  `tipe` enum('Text','Gambar') NOT NULL,
  `isi` mediumtext NOT NULL,
  `tgl_dikirim` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_status`),
  KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `teman`
--

CREATE TABLE IF NOT EXISTS `teman` (
  `id_member` int(11) NOT NULL,
  `id_member_add` int(11) NOT NULL,
  `tgl_request` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status_approve` enum('Belum diapprove','Sudah diapprove') NOT NULL DEFAULT 'Belum diapprove',
  `tgl_approve` datetime NOT NULL,
  KEY `id_member_add` (`id_member_add`),
  KEY `id_member_add_2` (`id_member_add`),
  KEY `id_member` (`id_member`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teman`
--

INSERT INTO `teman` (`id_member`, `id_member_add`, `tgl_request`, `status_approve`, `tgl_approve`) VALUES
(1, 2, '2015-07-05 09:32:34', 'Sudah diapprove', '0000-00-00 00:00:00'),
(1, 5, '2015-07-05 09:38:43', 'Sudah diapprove', '0000-00-00 00:00:00'),
(3, 5, '2015-07-05 11:38:10', 'Sudah diapprove', '0000-00-00 00:00:00');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `member`
--
ALTER TABLE `member`
  ADD CONSTRAINT `member_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id_admin`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `pesan`
--
ALTER TABLE `pesan`
  ADD CONSTRAINT `pesan_ibfk_3` FOREIGN KEY (`id_pengirim`) REFERENCES `member` (`id_member`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `pesan_ibfk_4` FOREIGN KEY (`id_penerima`) REFERENCES `member` (`id_member`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `teman`
--
ALTER TABLE `teman`
  ADD CONSTRAINT `teman_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `teman_ibfk_2` FOREIGN KEY (`id_member_add`) REFERENCES `member` (`id_member`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
