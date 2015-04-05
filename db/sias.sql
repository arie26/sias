-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 05, 2015 at 11:13 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sias`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `id_guru` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nip` varchar(10) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 : aktif, 2 : cuti, 3 : keluar',
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `kontak` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `gelar_depan` varchar(10) DEFAULT NULL,
  `gelar_belakang` varchar(10) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nip`, `nama`, `status`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `kontak`, `email`, `gelar_depan`, `gelar_belakang`, `foto`) VALUES
(1, '2603201501', 'Arie Wahyu Triansyah', 1, 'Jakarta', '2015-03-18', 'Jl. Mahoni', '081293921117', 'ariewahyut@gmail.com', NULL, 'ST', 'arie.jpg'),
(2, '2603201502', 'Danish Fariansyah', 1, 'Jakarta', '2015-03-10', 'Jl. Mahoni Lontar III', '081293921117', 'ariewahyut@gmail.com', NULL, 'ST', 'arie.jpg'),
(3, '2603201503', 'Thalita Syakira', 1, 'Jakarta', '2015-03-16', 'Jl. Mahoni Lontar III', '081293921117', 'ariewahyut@gmail.com', NULL, 'ST', 'puput-siluet.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `id_jadwal` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_guru` tinyint(4) NOT NULL,
  `id_mapel` tinyint(4) NOT NULL,
  `id_kelas` tinyint(4) NOT NULL,
  `id_tahun_ajaran` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_jadwal`),
  KEY `fk_jadwal_mapel1_idx` (`id_mapel`),
  KEY `fk_jadwal_guru1_idx` (`id_guru`),
  KEY `fk_jadwal_kelas1_idx` (`id_kelas`),
  KEY `fk_jadwal_tahun_ajaran1_idx` (`id_tahun_ajaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id_jadwal`, `id_guru`, `id_mapel`, `id_kelas`, `id_tahun_ajaran`, `status`) VALUES
(13, 1, 2, 3, 1, 1),
(14, 2, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_guru` tinyint(4) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `kapasitas` int(11) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  KEY `id_kelas` (`id_kelas`),
  KEY `id_guru` (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `id_guru`, `nama`, `kapasitas`, `status`) VALUES
(1, 2, 'X.1', 30, 1),
(3, 3, 'X.2', 30, 1);

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE IF NOT EXISTS `mapel` (
  `id_mapel` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `sifat` tinyint(4) NOT NULL COMMENT '1 : wajib, 2 : tambahan',
  `status` tinyint(4) NOT NULL COMMENT '1 : aktif, 2 : tdk_aktif',
  PRIMARY KEY (`id_mapel`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id_mapel`, `nama`, `sifat`, `status`) VALUES
(1, 'Matematika', 1, 1),
(2, 'Bahasa Indonesia Raya', 1, 1),
(3, 'Bahasa Inggris', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pembagain_kelas`
--

CREATE TABLE IF NOT EXISTS `pembagain_kelas` (
  `id_pembagian_kelas` tinyint(4) NOT NULL AUTO_INCREMENT,
  `id_siswa` tinyint(4) NOT NULL,
  `id_kelas` tinyint(4) NOT NULL,
  `id_tahun_ajaran` tinyint(4) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_pembagian_kelas`),
  KEY `fk_pembagain_kelas_siswa1_idx` (`id_siswa`),
  KEY `fk_pembagain_kelas_kelas1_idx` (`id_kelas`),
  KEY `fk_pembagain_kelas_tahun_ajaran1_idx` (`id_tahun_ajaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `pembagain_kelas`
--

INSERT INTO `pembagain_kelas` (`id_pembagian_kelas`, `id_siswa`, `id_kelas`, `id_tahun_ajaran`, `status`) VALUES
(1, 1, 1, 1, -1),
(2, 1, 3, 1, 1),
(3, 1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `id_semester` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  PRIMARY KEY (`id_semester`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_semester`, `nama`, `status`) VALUES
(1, 'Ganjil', 1),
(2, 'Genap', 2);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `id_siswa` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nis` varchar(45) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '1 : aktif, 2 : lulus, 3 : keluar',
  `tahun_masuk` varchar(10) DEFAULT NULL,
  `tempat_lahir` varchar(45) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `orang_tua` varchar(45) NOT NULL,
  `foto` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id_siswa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nis`, `nama`, `status`, `tahun_masuk`, `tempat_lahir`, `tanggal_lahir`, `alamat`, `orang_tua`, `foto`) VALUES
(1, 'SMA21032015001', 'Arie Wahyu Triansyah', 1, '2015', 'Jakarta', '1990-09-26', 'Jl. Mahoni Lontar III No. 22 Rt. 05 Rw. 05 Kel. Tugu Utara Kec. Koja Jakarta Utara', 'Arie Wahyu Triansyah', 'arie.jpg'),
(2, 'SMA22032015002', 'Lionel Messi', 3, '2015', 'Jakarta', '1990-09-26', 'Argentina, Buones Aires', 'Jorge Messi', '95803.jpg'),
(3, 'SMA22032015003', 'Xavi Hernandez', -1, '2015', 'Barcelona', '2015-03-22', 'Barcelona, Catalunya', 'Xavi Hernandez', '35018.jpg'),
(4, 'SMA22032015004', 'Lionel Messi', -1, '2015', 'Jakarta', '1990-09-26', 'Argentina, Buones Aires', 'Jorge Messi', '95803.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE IF NOT EXISTS `tahun_ajaran` (
  `id_tahun_ajaran` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  PRIMARY KEY (`id_tahun_ajaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id_tahun_ajaran`, `nama`, `status`, `tanggal_mulai`, `tanggal_akhir`) VALUES
(1, '2015/2016', 1, '2015-06-01', '2016-07-02'),
(2, '2016/2017', -1, '2016-06-01', '2017-07-01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id_user` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` tinyint(4) NOT NULL,
  `id_guru` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_user_guru1_idx` (`id_guru`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `role`, `id_guru`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_mapel1` FOREIGN KEY (`id_mapel`) REFERENCES `mapel` (`id_mapel`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_jadwal_tahun_ajaran1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jadwal_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `jadwal_ibfk_2` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_ibfk_1` FOREIGN KEY (`id_guru`) REFERENCES `guru` (`id_guru`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `pembagain_kelas`
--
ALTER TABLE `pembagain_kelas`
  ADD CONSTRAINT `fk_pembagain_kelas_siswa1` FOREIGN KEY (`id_siswa`) REFERENCES `siswa` (`id_siswa`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_pembagain_kelas_tahun_ajaran1` FOREIGN KEY (`id_tahun_ajaran`) REFERENCES `tahun_ajaran` (`id_tahun_ajaran`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pembagain_kelas_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `kelas` (`id_kelas`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
