-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 08 Agu 2014 pada 11.16
-- Versi Server: 5.6.11
-- Versi PHP: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `reor`
--
CREATE DATABASE IF NOT EXISTS `reor` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `reor`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `date_in_holiday`
--

CREATE TABLE IF NOT EXISTS `date_in_holiday` (
  `id_date` int(4) NOT NULL AUTO_INCREMENT,
  `name_holiday` varchar(100) NOT NULL,
  `date_holiday` date NOT NULL,
  PRIMARY KEY (`id_date`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data untuk tabel `date_in_holiday`
--

INSERT INTO `date_in_holiday` (`id_date`, `name_holiday`, `date_holiday`) VALUES
(1, 'Tahun Baru Masehi', '2015-01-01'),
(2, 'Maulid Nabi Muhammad SAW (12 Rabiul Awal 1436H)', '2015-01-03'),
(3, 'Tahun Baru Imlek 2566', '2015-02-19'),
(4, 'Hari Raya Nyepi (Tahun Baru Saka 1937)', '2015-03-21'),
(5, 'Wafat Yesus Kristus', '2015-04-03'),
(6, 'Hari Buruh', '2015-05-01'),
(7, 'Hari Kenaikan Yesus Kristus', '2015-05-14'),
(8, 'Isra'' Mi''raj Nabi Muhammad SAW (27 Rajab 1436H)', '2015-05-16'),
(9, 'Hari Raya Waisak 2559', '2015-06-02'),
(10, 'Cuti bersama Idul Fitri', '2015-07-16'),
(11, 'Idul Fitri (1-2 Syawal 1436H)', '2015-07-17'),
(12, 'Idul Fitri (1-2 Syawal 1436H)', '2015-07-18'),
(13, 'Cuti bersama Idul Fitri', '2015-07-20'),
(14, 'Cuti bersama Idul Fitri', '2015-07-21'),
(15, 'Proklamasi Hari Kemerdekaan Republik Indonesia ke-70', '2015-08-17'),
(16, 'Idul Adha (10 Dzulhijjah 1436H)', '2015-09-24'),
(17, 'Tahun Baru Islam (1 Muharram 1437H)', '2015-10-14'),
(18, 'Cuti bersama Natal', '2015-12-24'),
(19, 'Hari Raya Natal', '2015-12-25'),
(20, 'Hari Kemerdekaan RI', '2014-08-17'),
(21, 'Hari Raya Idul Adha 1435 Hijriah', '2014-10-05'),
(22, 'Tahun Baru Islam 1436 Hijriah', '2014-10-25'),
(23, 'Hari Raya Natal', '2014-12-25'),
(24, 'Cuti Bersama Natal', '2014-12-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `exams`
--

CREATE TABLE IF NOT EXISTS `exams` (
  `id_exam` int(11) NOT NULL AUTO_INCREMENT,
  `id_lemdik` int(11) NOT NULL,
  `judul_exam` varchar(45) NOT NULL,
  `id_jenis_sertifikat` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '-1 = deleted\n0 - new\n1 - open for registration\n2 - closed for registration',
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `provinsi` varchar(45) NOT NULL,
  `kabupaten` varchar(45) NOT NULL,
  `alamat_pelaksanaan` varchar(200) NOT NULL,
  `kuota_peserta` int(11) NOT NULL,
  `surat_permohonan` varchar(45) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_exam`),
  KEY `fk_exams_users_idx` (`created_by`),
  KEY `fk_exams_lemdik1_idx` (`id_lemdik`),
  KEY `fk_exams_users1_idx` (`modified_by`),
  KEY `fk_exams_mst_jenis_sertifikat1_idx` (`id_jenis_sertifikat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Dumping data untuk tabel `exams`
--

INSERT INTO `exams` (`id_exam`, `id_lemdik`, `judul_exam`, `id_jenis_sertifikat`, `status`, `date_start`, `date_end`, `provinsi`, `kabupaten`, `alamat_pelaksanaan`, `kuota_peserta`, `surat_permohonan`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 'Permohonan Ujian Batch I', 1, 1, '2014-08-25 00:00:00', '2014-08-28 00:00:00', 'Sulawesi Selatan', 'Makassar', 'Makassar', 100, '', 1, '2014-08-04 02:54:00', 1, '2014-08-04 07:07:40'),
(2, 1, 'Permohonan Ujian Batch II', 2, 0, '2014-09-15 00:00:00', '2014-09-18 00:00:00', 'Sulawesi Selatan', 'Makassar', 'Makassar', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:59:50'),
(3, 1, 'Permohonan Ujian Batch III', 3, 0, '2014-10-01 00:00:00', '2014-10-04 00:00:00', 'Sulawesi Selatan', 'Makassar', 'Makassar', 100, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:08:46'),
(4, 2, 'Permohonan Ujian Batch I', 1, 0, '2014-09-16 00:00:00', '2014-09-19 00:00:00', 'DKI Jakarta', 'Jakarta', 'Jakarta', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:08:51'),
(5, 2, 'Permohonan Ujian Batch II', 2, 0, '2014-09-08 00:00:00', '2014-09-11 00:00:00', 'DKI Jakarta', 'Jakarta', 'Jakarta', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:01:38'),
(6, 2, 'Permohonan Ujian Batch III', 3, 0, '2014-10-01 00:00:00', '2014-10-04 00:00:00', 'DKI Jakarta', 'Jakarta', 'Jakarta', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:09:02'),
(7, 2, 'Permohonan Ujian Batch IV', 4, 0, '2014-10-14 00:00:00', '2014-10-17 00:00:00', 'DKI Jakarta', 'Jakarta', 'Jakarta', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:09:09'),
(8, 3, 'Permohonan Ujian Batch I', 1, 0, '2014-09-01 00:00:00', '2014-09-04 00:00:00', 'DKI Jakarta', 'Jakarta', 'Jakarta', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:09:13'),
(9, 3, 'Permohonan Ujian Batch II', 2, 0, '2014-11-03 00:00:00', '2014-11-06 00:00:00', 'DKI Jakarta', 'Jakarta', 'Jakarta', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:03:34'),
(10, 4, 'Permohonan Ujian Batch I', 1, 0, '2014-10-26 00:00:00', '2014-10-29 00:00:00', 'Kepulauan Riau', 'Batam', 'Batam', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:11:21'),
(11, 4, 'Permohonan Ujian Batch II', 2, 0, '2014-10-22 00:00:00', '2014-10-25 00:00:00', 'Kepulauan Riau', 'Batam', 'Batam', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:11:17'),
(12, 4, 'Permohonan Ujian Batch III', 3, 0, '2014-09-30 00:00:00', '2014-10-03 00:00:00', 'Kepulauan Riau', 'Batam', 'Batam', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:11:14'),
(13, 4, 'Permohonan Ujian Batch IV', 4, 0, '2014-11-02 00:00:00', '2014-11-05 00:00:00', 'Kepulauan Riau', 'Batam', 'Batam', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:11:11'),
(14, 4, 'Permohonan Ujian Batch V', 5, 0, '2014-11-18 00:00:00', '2014-11-21 00:00:00', 'Kepulauan Riau', 'Batam', 'Batam', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:11:07'),
(15, 5, 'Permohonan Ujian Batch I', 1, 0, '2014-10-29 00:00:00', '2014-11-01 00:00:00', 'Jawa Tengah', 'Semarang', 'Semarang', 150, '', 1, '2014-08-03 17:00:00', 1, '2014-08-04 07:12:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lemdiks`
--

CREATE TABLE IF NOT EXISTS `lemdiks` (
  `id_lemdik` int(11) NOT NULL AUTO_INCREMENT,
  `nama_lemdik` varchar(45) NOT NULL,
  `provinsi` varchar(45) NOT NULL,
  `kabupaten` varchar(45) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_lemdik`),
  KEY `fk_lemdik_users1_idx` (`created_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `lemdiks`
--

INSERT INTO `lemdiks` (`id_lemdik`, `nama_lemdik`, `provinsi`, `kabupaten`, `alamat`, `email`, `created_by`, `created_on`) VALUES
(1, 'BP2IP MAKASSAR', '', '', '', '', 1, '2014-08-03 17:00:00'),
(2, 'BINA SENA JAKARTA', 'DKI Jakarta', 'Jakarta', 'Jakarta', '', 1, '2014-08-03 17:00:00'),
(3, 'STIP JAKARTA', 'DKI Jakarta', 'Jakarta', 'Jakarta', '', 1, '2014-08-03 17:00:00'),
(4, 'INDORAD BATAM', 'Riau', 'Kepulauan Riau', 'Batam', '', 1, '2014-08-03 17:00:00'),
(5, 'PIP SEMARANG', '', '', '', '', 1, '2014-08-03 17:00:00'),
(6, 'STIMART AMNI SEMARANG', '', '', '', '', 1, '2014-08-03 17:00:00'),
(7, 'PIP MAKASSAR', '', '', '', '', 1, '2014-08-03 17:00:00'),
(8, 'BHARUNA BHAKTI UTAMA SURABAYA', '', '', '', '', 1, '2014-08-03 17:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_approvals`
--

CREATE TABLE IF NOT EXISTS `log_approvals` (
  `id_log_approval` int(11) NOT NULL AUTO_INCREMENT,
  `id_registrant` int(11) NOT NULL,
  `new_status` tinyint(4) NOT NULL COMMENT '-3 - score rejected\n-2 - unpaid\n-1 - registration rejected\n0 - new\n1 - register approved (waiting for payment)\n2 - paid \n3 - score masuk\n4 - score approved \n5 - selesai tidak lulus\n6 - selesai lulus\n',
  `approved_by` int(11) NOT NULL,
  `approved_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log_approval`),
  KEY `fk_log_approvals_registrants1_idx` (`id_registrant`),
  KEY `fk_log_approvals_users1_idx` (`approved_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_certificates`
--

CREATE TABLE IF NOT EXISTS `log_certificates` (
  `id_log_certificate` int(11) NOT NULL AUTO_INCREMENT,
  `id_registrant` int(11) NOT NULL,
  `sent_by` tinyint(4) NOT NULL COMMENT '1- Web\n2- Emails',
  `request_by` int(11) NOT NULL,
  `request_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_log_certificate`),
  KEY `fk_log_certificate_users1_idx` (`request_by`),
  KEY `fk_log_certificate_registrants1_idx` (`id_registrant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mst_jenis_sertifikat`
--

CREATE TABLE IF NOT EXISTS `mst_jenis_sertifikat` (
  `id_jenis_sertifikat` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_jenis_sertifikat`),
  KEY `fk_mst_jenis_sertifikat_users1_idx` (`created_by`),
  KEY `fk_mst_jenis_sertifikat_users2_idx` (`modified_by`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data untuk tabel `mst_jenis_sertifikat`
--

INSERT INTO `mst_jenis_sertifikat` (`id_jenis_sertifikat`, `name`, `remark`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 'SORP', 'Sertifikat Operator Radio Pantai', 1, '0000-00-00 00:00:00', 1, '2014-07-24 04:56:11'),
(2, 'SOT', 'Sertifikat Operator Terbatas', 1, '2014-07-24 04:59:06', 1, '2014-07-24 04:59:21'),
(3, 'SOU', 'Sertifikat Operator Umum', 1, '2014-07-24 04:59:06', 1, '2014-07-24 04:59:23'),
(4, 'SRE-I', 'Sertifikat Radio-Elektronika Kelas I', 1, '2014-07-24 04:59:06', 1, '2014-07-24 04:59:26'),
(5, 'SRE-II', 'Sertifikat Radio-Elektronika Kelas II', 1, '2014-07-24 04:59:06', 1, '2014-07-24 04:59:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `id_payment` int(11) NOT NULL AUTO_INCREMENT,
  `id_registrant` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '-1 - unpaid\n0 - new\n1 - paid',
  `invoice_number` varchar(45) NOT NULL,
  `amount` double NOT NULL,
  `remark` varchar(200) DEFAULT NULL,
  `due_date` datetime NOT NULL,
  `payment_date` datetime DEFAULT NULL,
  `created_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_payment`),
  KEY `fk_payments_registrants1_idx` (`id_registrant`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `registrants`
--

CREATE TABLE IF NOT EXISTS `registrants` (
  `id_registrant` int(11) NOT NULL AUTO_INCREMENT,
  `id_exam` int(11) NOT NULL,
  `id_jenis_sertifikat` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL COMMENT '-3 - score rejected\n-2 - unpaid\n-1 - registration rejected\n0 - new\n1 - register approved (waiting for payment)\n2 - paid \n3 - score masuk\n4 - score approved \n5 - selesai tidak lulus\n6 - selesai lulus\n',
  `nama_registrant` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `agama` varchar(45) NOT NULL,
  `tempat_lahir` varchar(45) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` char(1) NOT NULL COMMENT 'L : laki-laki\nP : perempuan',
  `angkatan` int(11) DEFAULT NULL,
  `foto` varchar(45) DEFAULT NULL,
  `ijazah` varchar(45) DEFAULT NULL,
  `akte_kelahiran` varchar(45) DEFAULT NULL,
  `sttpl` varchar(45) DEFAULT NULL,
  `skck` tinyint(1) NOT NULL DEFAULT '0',
  `sk_dokter` tinyint(1) NOT NULL,
  `no_sertifikat` varchar(45) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_registrant`),
  KEY `fk_registrants_exams1_idx` (`id_exam`),
  KEY `fk_registrants_users1_idx` (`created_by`),
  KEY `fk_registrants_users2_idx` (`modified_by`),
  KEY `fk_registrants_mst_jenis_sertifikat1_idx` (`id_jenis_sertifikat`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data untuk tabel `registrants`
--

INSERT INTO `registrants` (`id_registrant`, `id_exam`, `id_jenis_sertifikat`, `status`, `nama_registrant`, `email`, `agama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `angkatan`, `foto`, `ijazah`, `akte_kelahiran`, `sttpl`, `skck`, `sk_dokter`, `no_sertifikat`, `created_by`, `created_on`, `modified_by`, `modified_on`) VALUES
(1, 1, 1, 0, 'Frinsyah', 'frinsyah@gmail.com', 'Islam', 'Jakarta', '1977-03-04', 'L', 2002, 'frinsyah.jpg', 'ijazah_frinsyah.pdf', 'akte_frinsyah.pdf', 'sttpl_frinsyah.pdf', 1, 1, '0287499283740', 1, '2014-08-03 17:00:00', 1, '2014-08-06 08:48:54'),
(2, 2, 1, 1, 'Hardi', 'hardi@gmail.com', 'Islam', 'Makasar', '1973-08-05', 'L', 2004, 'hardi.jpg', 'izajah_hardi.pdf', 'akte_hardi.pdf', 'sttpl_hardi.pdf', 1, 1, '8829382208374', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:27'),
(3, 3, 1, 2, 'Haris', 'haris@gmail.com', 'Islam', 'Medan', '1980-07-11', 'L', 2005, 'haris.jpg', 'izajah_haris.pdf', 'akte_haris.pdf', 'sttpl_haris.pdf', 1, 1, '8849372938953', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:34'),
(4, 3, 1, 3, 'Eko', 'eko@gmail.com', 'Islam', 'Binjai', '1983-09-20', 'L', 2001, 'eko.jpg', 'izajah_eko.pdf', 'akte_eko.pdf', 'sttpl_eko.pdf', 1, 1, '7428328382983', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:40'),
(5, 4, 1, 4, 'Risti', 'risti@gmail.com', 'Katholik', 'Medan', '1985-01-27', 'P', 2005, 'risti.jpg', 'ijazah_risti.pdf', 'akte_risti.pdf', 'sttpl_risti.pdf', 1, 1, '8493929832938', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:45'),
(6, 5, 1, 5, 'Rano', 'rano@gmail.com', 'Buddha', 'Semarang', '1988-04-27', 'L', 2005, 'rano.jpg', 'ijazah_rano.pdf', 'akte_rano.pdf', 'sttpl_rano.pdf', 1, 1, '381920392097', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:50'),
(7, 1, 1, 0, 'Rani', 'rani@gmail.com', 'Hindu', 'Cibaduyut', '1984-08-04', 'P', 2004, 'rani.jpg', 'izajah_rani.pdf', 'akte_rani.pdf', 'sstpl_rani.pdf', 0, 0, '329372382302', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(8, 1, 1, 0, 'Charles', 'charles@gmail.com', 'Kristen', 'Surabaya', '1981-10-13', 'P', 2009, 'charles.jpg', 'izajah_charles.pdf', 'akte_charles.pdf', 'sstpl_charles.pdf', 0, 0, '929137209392', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(9, 1, 1, 0, 'Doni', 'doni@gmail.com', 'Islam', 'Sekarepmu', '1984-03-04', 'L', 2004, 'doni.jpg', 'izajah_doni.pdf', 'akte_doni.pdf', 'sstpl_doni.pdf', 0, 0, '930232938292', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(10, 1, 1, 0, 'Sinta', 'sinta@gmail.com', 'Islam', 'Cendana', '1989-03-11', 'P', 2010, 'sinta.jpg', 'izajah_sinta.pdf', 'akte_sinta.pdf', 'sstpl_sinta.pdf', 0, 0, '38209837293928', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(11, 1, 1, 0, 'Corry', 'coory@gmail.com', 'Kristen', 'Cicalengka', '1977-10-10', 'P', 2000, 'corry.jpg', 'izajah_corry.pdf', 'akte_corry.pdf', 'sstpl_corry.pdf', 0, 0, '487293298283720', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(12, 1, 1, 0, 'Ratna', 'ratna@gmail.com', 'Islam', 'Cipendeuy', '1987-04-04', 'P', 2005, 'ratna.jpg', 'izajah_ratna.pdf', 'akte_ratna.pdf', 'sstpl_ratna.pdf', 0, 0, '8932893923287', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(13, 1, 1, 0, 'Siska', 'siska@gmail.com', 'Islam', 'Cimareme', '1987-11-22', 'P', 2004, 'siska.jpg', 'izajah_siska.pdf', 'akte_siska.pdf', 'sstpl_siska.pdf', 0, 0, '9392382392792', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(14, 1, 1, 0, 'Hasyim', 'hasyim@gmail.com', 'Hindu', 'Cikutra', '1977-02-04', 'L', 2000, 'hasyim.jpg', 'izajah_hasyim.pdf', 'akte_hasyim.pdf', 'sstpl_hasyim.pdf', 0, 0, '743438769823', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(15, 1, 1, 0, 'Harti', 'Harti@gmail.com', 'Islam', 'Makassar', '1989-11-04', 'P', 2004, 'harti.jpg', 'izajah_harti.pdf', 'akte_harti.pdf', 'sstpl_harti.pdf', 0, 0, '9382023929023', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(16, 1, 1, 0, 'Serti', 'serti@gmail.com', 'Hindu', 'Bekalo', '1988-12-24', 'L', 2008, 'serti.jpg', 'izajah_serti.pdf', 'akte_serti.pdf', 'sstpl_serti.pdf', 0, 0, '88383832883', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(17, 2, 1, 0, 'Frinsyah', 'frinsyah@gmail.com', 'Islam', 'Jakarta', '1977-03-04', 'L', 2002, 'frinsyah.jpg', 'ijazah_frinsyah.pdf', 'akte_frinsyah.pdf', 'sttpl_frinsyah.pdf', 1, 1, '0287499283740', 1, '2014-08-03 17:00:00', 1, '2014-08-06 08:48:54'),
(18, 2, 1, 0, 'Hardi', 'hardi@gmail.com', 'Islam', 'Makasar', '1973-08-05', 'L', 2004, 'hardi.jpg', 'izajah_hardi.pdf', 'akte_hardi.pdf', 'sttpl_hardi.pdf', 1, 1, '8829382208374', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:27'),
(19, 2, 1, 0, 'Haris', 'haris@gmail.com', 'Islam', 'Medan', '1980-07-11', 'L', 2005, 'haris.jpg', 'izajah_haris.pdf', 'akte_haris.pdf', 'sttpl_haris.pdf', 1, 1, '8849372938953', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:34'),
(20, 2, 1, 0, 'Eko', 'eko@gmail.com', 'Islam', 'Binjai', '1983-09-20', 'L', 2001, 'eko.jpg', 'izajah_eko.pdf', 'akte_eko.pdf', 'sttpl_eko.pdf', 1, 1, '7428328382983', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:40'),
(21, 2, 1, 0, 'Risti', 'risti@gmail.com', 'Katholik', 'Medan', '1985-01-27', 'P', 2005, 'risti.jpg', 'ijazah_risti.pdf', 'akte_risti.pdf', 'sttpl_risti.pdf', 1, 1, '8493929832938', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:45'),
(22, 2, 1, 0, 'Rano', 'rano@gmail.com', 'Buddha', 'Semarang', '1988-04-27', 'L', 2005, 'rano.jpg', 'ijazah_rano.pdf', 'akte_rano.pdf', 'sttpl_rano.pdf', 1, 1, '381920392097', 1, '2014-08-03 17:00:00', 1, '2014-08-07 06:01:50'),
(23, 2, 1, 0, 'Rani', 'rani@gmail.com', 'Hindu', 'Cibaduyut', '1984-08-04', 'P', 2004, 'rani.jpg', 'izajah_rani.pdf', 'akte_rani.pdf', 'sstpl_rani.pdf', 0, 0, '329372382302', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(24, 2, 1, 0, 'Charles', 'charles@gmail.com', 'Kristen', 'Surabaya', '1981-10-13', 'P', 2009, 'charles.jpg', 'izajah_charles.pdf', 'akte_charles.pdf', 'sstpl_charles.pdf', 0, 0, '929137209392', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(25, 2, 1, 0, 'Doni', 'doni@gmail.com', 'Islam', 'Sekarepmu', '1984-03-04', 'L', 2004, 'doni.jpg', 'izajah_doni.pdf', 'akte_doni.pdf', 'sstpl_doni.pdf', 0, 0, '930232938292', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(26, 2, 1, 0, 'Sinta', 'sinta@gmail.com', 'Islam', 'Cendana', '1989-03-11', 'P', 2010, 'sinta.jpg', 'izajah_sinta.pdf', 'akte_sinta.pdf', 'sstpl_sinta.pdf', 0, 0, '38209837293928', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(27, 2, 1, 0, 'Corry', 'coory@gmail.com', 'Kristen', 'Cicalengka', '1977-10-10', 'P', 2000, 'corry.jpg', 'izajah_corry.pdf', 'akte_corry.pdf', 'sstpl_corry.pdf', 0, 0, '487293298283720', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(28, 2, 1, 0, 'Ratna', 'ratna@gmail.com', 'Islam', 'Cipendeuy', '1987-04-04', 'P', 2005, 'ratna.jpg', 'izajah_ratna.pdf', 'akte_ratna.pdf', 'sstpl_ratna.pdf', 0, 0, '8932893923287', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(29, 2, 1, 0, 'Siska', 'siska@gmail.com', 'Islam', 'Cimareme', '1987-11-22', 'P', 2004, 'siska.jpg', 'izajah_siska.pdf', 'akte_siska.pdf', 'sstpl_siska.pdf', 0, 0, '9392382392792', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(30, 2, 1, 0, 'Hasyim', 'hasyim@gmail.com', 'Hindu', 'Cikutra', '1977-02-04', 'L', 2000, 'hasyim.jpg', 'izajah_hasyim.pdf', 'akte_hasyim.pdf', 'sstpl_hasyim.pdf', 0, 0, '743438769823', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(31, 2, 1, 0, 'Harti', 'Harti@gmail.com', 'Islam', 'Makassar', '1989-11-04', 'P', 2004, 'harti.jpg', 'izajah_harti.pdf', 'akte_harti.pdf', 'sstpl_harti.pdf', 0, 0, '9382023929023', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(32, 2, 1, 0, 'Serti', 'serti@gmail.com', 'Hindu', 'Bekalo', '1988-12-24', 'L', 2008, 'serti.jpg', 'izajah_serti.pdf', 'akte_serti.pdf', 'sstpl_serti.pdf', 0, 0, '88383832883', 1, '2014-08-07 17:00:00', 1, '2014-08-07 17:00:00'),
(33, 3, 1, 0, 'Frinsyah', 'frinsyah@gmail.com', 'Islam', 'Jakarta', '1977-03-04', 'L', 2002, 'frinsyah.jpg', 'ijazah_frinsyah.pdf', 'akte_frinsyah.pdf', 'sttpl_frinsyah.pdf', 1, 1, '0287499283740', 1, '2014-08-03 10:00:00', 1, '2014-08-06 01:48:54'),
(34, 3, 1, 0, 'Hardi', 'hardi@gmail.com', 'Islam', 'Makasar', '1973-08-05', 'L', 2004, 'hardi.jpg', 'izajah_hardi.pdf', 'akte_hardi.pdf', 'sttpl_hardi.pdf', 1, 1, '8829382208374', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:27'),
(35, 3, 1, 0, 'Haris', 'haris@gmail.com', 'Islam', 'Medan', '1980-07-11', 'L', 2005, 'haris.jpg', 'izajah_haris.pdf', 'akte_haris.pdf', 'sttpl_haris.pdf', 1, 1, '8849372938953', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:34'),
(36, 3, 1, 0, 'Eko', 'eko@gmail.com', 'Islam', 'Binjai', '1983-09-20', 'L', 2001, 'eko.jpg', 'izajah_eko.pdf', 'akte_eko.pdf', 'sttpl_eko.pdf', 1, 1, '7428328382983', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:40'),
(37, 3, 1, 0, 'Risti', 'risti@gmail.com', 'Katholik', 'Medan', '1985-01-27', 'P', 2005, 'risti.jpg', 'ijazah_risti.pdf', 'akte_risti.pdf', 'sttpl_risti.pdf', 1, 1, '8493929832938', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:45'),
(38, 3, 1, 0, 'Rano', 'rano@gmail.com', 'Buddha', 'Semarang', '1988-04-27', 'L', 2005, 'rano.jpg', 'ijazah_rano.pdf', 'akte_rano.pdf', 'sttpl_rano.pdf', 1, 1, '381920392097', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:50'),
(39, 3, 1, 0, 'Rani', 'rani@gmail.com', 'Hindu', 'Cibaduyut', '1984-08-04', 'P', 2004, 'rani.jpg', 'izajah_rani.pdf', 'akte_rani.pdf', 'sstpl_rani.pdf', 0, 0, '329372382302', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(40, 3, 1, 0, 'Charles', 'charles@gmail.com', 'Kristen', 'Surabaya', '1981-10-13', 'P', 2009, 'charles.jpg', 'izajah_charles.pdf', 'akte_charles.pdf', 'sstpl_charles.pdf', 0, 0, '929137209392', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(41, 3, 1, 0, 'Doni', 'doni@gmail.com', 'Islam', 'Sekarepmu', '1984-03-04', 'L', 2004, 'doni.jpg', 'izajah_doni.pdf', 'akte_doni.pdf', 'sstpl_doni.pdf', 0, 0, '930232938292', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(42, 3, 1, 0, 'Sinta', 'sinta@gmail.com', 'Islam', 'Cendana', '1989-03-11', 'P', 2010, 'sinta.jpg', 'izajah_sinta.pdf', 'akte_sinta.pdf', 'sstpl_sinta.pdf', 0, 0, '38209837293928', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(43, 3, 1, 0, 'Corry', 'coory@gmail.com', 'Kristen', 'Cicalengka', '1977-10-10', 'P', 2000, 'corry.jpg', 'izajah_corry.pdf', 'akte_corry.pdf', 'sstpl_corry.pdf', 0, 0, '487293298283720', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(44, 3, 1, 0, 'Ratna', 'ratna@gmail.com', 'Islam', 'Cipendeuy', '1987-04-04', 'P', 2005, 'ratna.jpg', 'izajah_ratna.pdf', 'akte_ratna.pdf', 'sstpl_ratna.pdf', 0, 0, '8932893923287', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(45, 3, 1, 0, 'Siska', 'siska@gmail.com', 'Islam', 'Cimareme', '1987-11-22', 'P', 2004, 'siska.jpg', 'izajah_siska.pdf', 'akte_siska.pdf', 'sstpl_siska.pdf', 0, 0, '9392382392792', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(46, 3, 1, 0, 'Hasyim', 'hasyim@gmail.com', 'Hindu', 'Cikutra', '1977-02-04', 'L', 2000, 'hasyim.jpg', 'izajah_hasyim.pdf', 'akte_hasyim.pdf', 'sstpl_hasyim.pdf', 0, 0, '743438769823', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(47, 3, 1, 0, 'Harti', 'Harti@gmail.com', 'Islam', 'Makassar', '1989-11-04', 'P', 2004, 'harti.jpg', 'izajah_harti.pdf', 'akte_harti.pdf', 'sstpl_harti.pdf', 0, 0, '9382023929023', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(48, 3, 1, 0, 'Serti', 'serti@gmail.com', 'Hindu', 'Bekalo', '1988-12-24', 'L', 2008, 'serti.jpg', 'izajah_serti.pdf', 'akte_serti.pdf', 'sstpl_serti.pdf', 0, 0, '88383832883', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(49, 4, 1, 0, 'Frinsyah', 'frinsyah@gmail.com', 'Islam', 'Jakarta', '1977-03-04', 'L', 2002, 'frinsyah.jpg', 'ijazah_frinsyah.pdf', 'akte_frinsyah.pdf', 'sttpl_frinsyah.pdf', 1, 1, '0287499283740', 1, '2014-08-03 10:00:00', 1, '2014-08-06 01:48:54'),
(50, 4, 1, 0, 'Hardi', 'hardi@gmail.com', 'Islam', 'Makasar', '1973-08-05', 'L', 2004, 'hardi.jpg', 'izajah_hardi.pdf', 'akte_hardi.pdf', 'sttpl_hardi.pdf', 1, 1, '8829382208374', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:27'),
(51, 4, 1, 0, 'Haris', 'haris@gmail.com', 'Islam', 'Medan', '1980-07-11', 'L', 2005, 'haris.jpg', 'izajah_haris.pdf', 'akte_haris.pdf', 'sttpl_haris.pdf', 1, 1, '8849372938953', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:34'),
(52, 4, 1, 0, 'Eko', 'eko@gmail.com', 'Islam', 'Binjai', '1983-09-20', 'L', 2001, 'eko.jpg', 'izajah_eko.pdf', 'akte_eko.pdf', 'sttpl_eko.pdf', 1, 1, '7428328382983', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:40'),
(53, 4, 1, 0, 'Risti', 'risti@gmail.com', 'Katholik', 'Medan', '1985-01-27', 'P', 2005, 'risti.jpg', 'ijazah_risti.pdf', 'akte_risti.pdf', 'sttpl_risti.pdf', 1, 1, '8493929832938', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:45'),
(54, 4, 1, 0, 'Rano', 'rano@gmail.com', 'Buddha', 'Semarang', '1988-04-27', 'L', 2005, 'rano.jpg', 'ijazah_rano.pdf', 'akte_rano.pdf', 'sttpl_rano.pdf', 1, 1, '381920392097', 1, '2014-08-03 10:00:00', 1, '2014-08-06 23:01:50'),
(55, 4, 1, 0, 'Rani', 'rani@gmail.com', 'Hindu', 'Cibaduyut', '1984-08-04', 'P', 2004, 'rani.jpg', 'izajah_rani.pdf', 'akte_rani.pdf', 'sstpl_rani.pdf', 0, 0, '329372382302', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(56, 4, 1, 0, 'Charles', 'charles@gmail.com', 'Kristen', 'Surabaya', '1981-10-13', 'P', 2009, 'charles.jpg', 'izajah_charles.pdf', 'akte_charles.pdf', 'sstpl_charles.pdf', 0, 0, '929137209392', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(57, 4, 1, 0, 'Doni', 'doni@gmail.com', 'Islam', 'Sekarepmu', '1984-03-04', 'L', 2004, 'doni.jpg', 'izajah_doni.pdf', 'akte_doni.pdf', 'sstpl_doni.pdf', 0, 0, '930232938292', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(58, 4, 1, 0, 'Sinta', 'sinta@gmail.com', 'Islam', 'Cendana', '1989-03-11', 'P', 2010, 'sinta.jpg', 'izajah_sinta.pdf', 'akte_sinta.pdf', 'sstpl_sinta.pdf', 0, 0, '38209837293928', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(59, 4, 1, 0, 'Corry', 'coory@gmail.com', 'Kristen', 'Cicalengka', '1977-10-10', 'P', 2000, 'corry.jpg', 'izajah_corry.pdf', 'akte_corry.pdf', 'sstpl_corry.pdf', 0, 0, '487293298283720', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(60, 4, 1, 0, 'Ratna', 'ratna@gmail.com', 'Islam', 'Cipendeuy', '1987-04-04', 'P', 2005, 'ratna.jpg', 'izajah_ratna.pdf', 'akte_ratna.pdf', 'sstpl_ratna.pdf', 0, 0, '8932893923287', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(61, 4, 1, 0, 'Siska', 'siska@gmail.com', 'Islam', 'Cimareme', '1987-11-22', 'P', 2004, 'siska.jpg', 'izajah_siska.pdf', 'akte_siska.pdf', 'sstpl_siska.pdf', 0, 0, '9392382392792', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(62, 4, 1, 0, 'Hasyim', 'hasyim@gmail.com', 'Hindu', 'Cikutra', '1977-02-04', 'L', 2000, 'hasyim.jpg', 'izajah_hasyim.pdf', 'akte_hasyim.pdf', 'sstpl_hasyim.pdf', 0, 0, '743438769823', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(63, 4, 1, 0, 'Harti', 'Harti@gmail.com', 'Islam', 'Makassar', '1989-11-04', 'P', 2004, 'harti.jpg', 'izajah_harti.pdf', 'akte_harti.pdf', 'sstpl_harti.pdf', 0, 0, '9382023929023', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00'),
(64, 4, 1, 0, 'Serti', 'serti@gmail.com', 'Hindu', 'Bekalo', '1988-12-24', 'L', 2008, 'serti.jpg', 'izajah_serti.pdf', 'akte_serti.pdf', 'sstpl_serti.pdf', 0, 0, '88383832883', 1, '2014-08-07 10:00:00', 1, '2014-08-07 10:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `scores`
--

CREATE TABLE IF NOT EXISTS `scores` (
  `id_score` int(11) NOT NULL AUTO_INCREMENT,
  `id_registrant` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `point` double DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `created_on` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `modified_by` int(11) NOT NULL,
  `modified_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_score`),
  KEY `fk_scores_registrants1_idx` (`id_registrant`),
  KEY `fk_scores_users1_idx` (`created_by`),
  KEY `fk_scores_users2_idx` (`modified_by`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(45) NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `roles` tinyint(4) NOT NULL COMMENT 'Bit representatif:\n1st bit = lemdik\n2nd bit = admin\n----\nthus :\n0 : no access\n1 : lemdik\n2 : admin\n3 : lemdik + admin',
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_lemdik` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_user`),
  KEY `fk_users_lemdiks1_idx` (`id_lemdik`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `name`, `password`, `email`, `roles`, `created_date`, `id_lemdik`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 2, '2014-07-24 04:47:47', NULL),
(2, 'lemdik_bbus', 'BHARUNA BHAKTI UTAMA SURABAYA', 'bda82c107159c30e5936eaa66be8ee30', 'bbu.surabaya@lemdik.co.id', 1, '2014-08-06 17:00:00', 8),
(3, 'lemdik_bp2ip', 'BP2IP MAKASSAR', 'bda82c107159c30e5936eaa66be8ee30', 'lemdik.bp2ip@lemdik.co.id', 1, '2014-08-06 17:00:00', 1),
(4, 'lemdik_binasena', 'BINA SENA JAKARTA', 'bda82c107159c30e5936eaa66be8ee30', 'bina.sena@lemdik.co.id', 1, '2014-08-06 17:00:00', 2),
(5, 'lemdik_stip', 'STIP JAKARTA', 'bda82c107159c30e5936eaa66be8ee30', 'stip.jakarta@lemdik.co.id', 1, '2014-08-06 17:00:00', 3),
(6, 'lemdik_indoradbatam', 'INDORAD BATAM', 'bda82c107159c30e5936eaa66be8ee30', 'indorad.batam@lemdik.co.id', 1, '2014-08-06 17:00:00', 4),
(7, 'lemdik_pipsemarang', 'PIP SEMARANG', 'bda82c107159c30e5936eaa66be8ee30', 'pip.semarang@lemdik.co.id', 1, '2014-08-06 17:00:00', 5),
(8, 'lemdik_stimartamni', 'STIMART AMNI SEMARANG', 'bda82c107159c30e5936eaa66be8ee30', 'stimart.amnisemarang@lemdik.co.id', 1, '2014-08-06 17:00:00', 6),
(9, 'lemdik_pipmakassar', 'PIP MAKASSAR', 'bda82c107159c30e5936eaa66be8ee30', 'pip.makassar@lemdik.co.id', 1, '2014-08-06 17:00:00', 7);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `fk_exams_lemdik1` FOREIGN KEY (`id_lemdik`) REFERENCES `lemdiks` (`id_lemdik`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exams_mst_jenis_sertifikat1` FOREIGN KEY (`id_jenis_sertifikat`) REFERENCES `mst_jenis_sertifikat` (`id_jenis_sertifikat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exams_users` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exams_users1` FOREIGN KEY (`modified_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `lemdiks`
--
ALTER TABLE `lemdiks`
  ADD CONSTRAINT `fk_lemdiks_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `log_approvals`
--
ALTER TABLE `log_approvals`
  ADD CONSTRAINT `fk_log_approvals_registrants1` FOREIGN KEY (`id_registrant`) REFERENCES `registrants` (`id_registrant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_approvals_users1` FOREIGN KEY (`approved_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `log_certificates`
--
ALTER TABLE `log_certificates`
  ADD CONSTRAINT `fk_log_certificates_registrants1` FOREIGN KEY (`id_registrant`) REFERENCES `registrants` (`id_registrant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_log_certificates_users1` FOREIGN KEY (`request_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `mst_jenis_sertifikat`
--
ALTER TABLE `mst_jenis_sertifikat`
  ADD CONSTRAINT `fk_mst_jenis_sertifikat_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_mst_jenis_sertifikat_users2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `fk_payments_registrants1` FOREIGN KEY (`id_registrant`) REFERENCES `registrants` (`id_registrant`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `registrants`
--
ALTER TABLE `registrants`
  ADD CONSTRAINT `fk_registrants_exams1` FOREIGN KEY (`id_exam`) REFERENCES `exams` (`id_exam`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registrants_mst_jenis_sertifikat1` FOREIGN KEY (`id_jenis_sertifikat`) REFERENCES `mst_jenis_sertifikat` (`id_jenis_sertifikat`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registrants_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_registrants_users2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `scores`
--
ALTER TABLE `scores`
  ADD CONSTRAINT `fk_scores_registrants1` FOREIGN KEY (`id_registrant`) REFERENCES `registrants` (`id_registrant`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_scores_users1` FOREIGN KEY (`created_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_scores_users2` FOREIGN KEY (`modified_by`) REFERENCES `users` (`id_user`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_users_lemdiks1` FOREIGN KEY (`id_lemdik`) REFERENCES `lemdiks` (`id_lemdik`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
