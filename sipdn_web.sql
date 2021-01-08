-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 10, 2020 at 04:09 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sipdn_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_alamat`
--

CREATE TABLE `tb_alamat` (
  `id_alamat` int(10) NOT NULL,
  `dusun` varchar(50) NOT NULL,
  `desa` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `kabupaten` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_alamat`
--

INSERT INTO `tb_alamat` (`id_alamat`, `dusun`, `desa`, `kecamatan`, `kabupaten`) VALUES
(9, 'Karangtengah', 'Nogotirto', 'Gamping', 'Sleman'),
(10, 'Karangtengah', 'Nogotirto', 'Gamping', 'Sleman'),
(11, 'Karangtengah', 'Nogotirto', 'Gamping', 'Sleman'),
(15, 'BIRU', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(16, 'KWARASAN', 'NOGOTIRTO', 'GAMPING', 'SLEMAN'),
(17, 'BLAMBANGAN BATURAN', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(18, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(19, 'KRONGGAHAN 1', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(20, 'TRINI', 'SINDUADI', 'MLATI', 'SLEMAN'),
(21, 'RAJEK NGEMPLAK', 'TIRTOADI', 'MLATI', 'SLEMAN'),
(22, 'DONOKITRI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(25, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(26, 'SUROKARSAN MG II/ 196 YK', 'WIROGUNAN', 'MLATI', 'SLEMAN'),
(27, 'NGENTAK GEDE, BEDOG', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(28, 'GEDONGAN', 'SINDUADI', 'MLATI', 'SLEMAN'),
(29, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(30, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(31, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(32, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(33, 'BATURAN', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(34, 'BESOLE', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(35, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(36, 'PINGGIREJO', 'WATES', 'MAGELANG UTARA', 'KOTA MAGELANG'),
(37, 'GAMPING KIDUL', 'AMBARKETAWANG', 'GAMPING', 'SLEMAN'),
(38, 'GEDONGAN', 'SINDUADI', 'MLATI', 'SLEMAN'),
(39, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(40, 'NANDAN', 'SARIHARJO', 'NGAGLIK', 'SLEMAN');

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `email`, `alamat`) VALUES
(36, '9854748650300010', 'Sri Sumarsih, S.Pd', 'Perempuan', '1979-05-22', '085123456789', 'sri@gmail.com', 'Jombor. Trihanggo, Gamping, Sleman'),
(37, '6335758659300053', 'Diah Pintarti, S.S', 'Perempuan', '1986-10-03', '085123456789', 'diah@gmail.com', 'Biru, Trihanggo, Gamping, Sleman'),
(38, '9847760662130230', 'Siti Nurochmah, S.Pd.', 'Perempuan', '1962-06-15', '085123456789', 'siti@gmail.com', 'Trini, Trihanggo, Gamping, Sleman'),
(39, '', 'Hendri Abdul Kristanto, S.Pd.', 'Laki-laki', '1965-12-24', '085123456789', 'hendri@gmail.com', 'Demangan, Maguwoharjo, Depok, Sleman'),
(40, '', 'Dia Sintawati, S.Pd', 'Perempuan', '1962-07-17', '085123456789', 'dia@gmail.com', 'Turusan, Banyuraden, Gamping, Sleman'),
(41, '1746761662300052', 'Irni Sulistiana, S.Pd.', 'Perempuan', '1963-04-14', '085123456789', 'irni@gmail.com', 'Trini, Trihanggo, Gamping, Sleman'),
(42, '64567556530042', 'Tri Nurhudayah, S.E', 'Perempuan', '1977-01-24', '085123456789', 'tri@gmail.com', 'Demangan, Banyuraden, Gamping, Sleman'),
(43, '2038750653300013', 'Rumiyati, S.Ag.', 'Perempuan', '1972-07-09', '085123456789', 'rumi@gmail.com', 'Jetis, Sinduadi, Mlati, Sleman');

--
-- Triggers `tb_guru`
--
DELIMITER $$
CREATE TRIGGER `add_user_guru` BEFORE INSERT ON `tb_guru` FOR EACH ROW INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status`) VALUES (NULL, NEW.email, MD5(NEW.tanggal_lahir), 'guru', '1')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_user_guru` AFTER DELETE ON `tb_guru` FOR EACH ROW DELETE FROM `tb_user` WHERE `tb_user`.`username` = OLD.email
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_walikelas` BEFORE DELETE ON `tb_guru` FOR EACH ROW UPDATE `tb_kelas` SET `tb_kelas`.`wali_kelas` = NULL WHERE `tb_kelas`.`wali_kelas` = OLD.nama
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `wali_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`, `wali_kelas`) VALUES
(14, '1A', 'Sri Sumarsih, S.Pd'),
(15, '1B', 'Diah Pintarti, S.S'),
(16, '2', 'Siti Nurochmah, S.Pd.'),
(17, '3', 'Hendri Abdul Kristanto, S.Pd.'),
(18, '4', 'Dia Sintawati, S.Pd'),
(19, '5', 'Irni Sulistiana, S.Pd.');

--
-- Triggers `tb_kelas`
--
DELIMITER $$
CREATE TRIGGER `add_user_wali` AFTER INSERT ON `tb_kelas` FOR EACH ROW BEGIN
	DECLARE vUser varchar(100);
    SELECT email FROM tb_guru WHERE nama = NEW.wali_kelas INTO vUser;
	UPDATE `tb_user` SET `level` = 'wali kelas' WHERE `tb_user`.`username` = vUser;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_user_wali` AFTER DELETE ON `tb_kelas` FOR EACH ROW BEGIN
	DECLARE vUser varchar(100);
    SELECT email FROM tb_guru WHERE nama = OLD.wali_kelas INTO vUser;
	UPDATE `tb_user` SET `level` = 'guru' WHERE `tb_user`.`username` = vUser;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `update_user_wali` BEFORE UPDATE ON `tb_kelas` FOR EACH ROW BEGIN
	DECLARE oldUser varchar(100);
    DECLARE newUser varchar(100);
    SELECT email FROM tb_guru WHERE nama = OLD.wali_kelas INTO oldUser;
    SELECT email FROM tb_guru WHERE nama = NEW.wali_kelas INTO newUser;
	UPDATE `tb_user` SET `level` = 'guru' WHERE `tb_user`.`username` = oldUser;
    UPDATE `tb_user` SET `level` = 'wali kelas' WHERE `tb_user`.`username` = newUser;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `id_mapel` int(10) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `level` enum('1','2','3','4','5','6') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_matapelajaran`
--

INSERT INTO `tb_matapelajaran` (`id_mapel`, `nama_mapel`, `level`) VALUES
(35, 'Matematika', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(10) NOT NULL,
  `jenis` enum('Tugas','PR','UTS','UAS') NOT NULL,
  `nilai` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_orangtua`
--

CREATE TABLE `tb_orangtua` (
  `id_orangtua` int(10) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `pendidikan_ibu` varchar(50) NOT NULL,
  `pekerjaan_ibu` varchar(50) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `pendidikan_ayah` varchar(50) NOT NULL,
  `pekerjaan_ayah` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `id_alamat` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_orangtua`
--

INSERT INTO `tb_orangtua` (`id_orangtua`, `nama_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `nama_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `no_hp`, `id_alamat`) VALUES
(10, 'ERNA SRI REJEKISARI', 'DIPLOMA III', 'KARYAWAN SWASTA', 'M. SALIM SAMSUDIN', 'SLTA/ SEDERAJAT', 'KARYAWAN SWASTA', '085123456789', 9),
(11, 'ERNA SRI REJEKISARI', 'DIPLOMA III', 'KARYAWAN SWASTA', 'M. SALIM SAMSUDIN', 'SLTA/ SEDERAJAT', 'KARYAWAN SWASTA', '085123456789', 10),
(12, 'ERNA SRI REJEKISARI', 'DIPLOMA III', 'KARYAWAN SWASTA', 'M. SALIM SAMSUDIN', 'SLTA/ SEDERAJAT', 'KARYAWAN SWASTA', '085123456789', 11),
(16, 'DIAH PINTARTI', 'S1', 'GTY', 'DWI SUHARYANTO', 'S1', 'PNS', '085123456789', 15),
(17, 'LILIK', 'DIPLOMA III', 'GTY', 'ALM. NANANG SULARSO', '-', '-', '085123456789', 16),
(18, 'NUNUNG HARYATI', 'S1', 'TIDAK BEKERJA', 'SLAMET ARINES', 'SLTA', 'WIRASWASTA', '085123456789', 17),
(19, 'SRI RAHAYU', 'DIPLOMA III', 'KARYAWAN SWASTA', 'PRIYANTORO', 'SLTA', 'PNS', '085123456789', 18),
(20, 'PENI LESTARI', 'SLTP', 'TIDAK BEKERJA', 'EKA WIBAWA', 'SLTA', 'WIRASWASTA', '085123456789', 19),
(21, 'ROHMI NUR ALIFAH', 'SLTP', 'TIDAK BEKERJA', 'TRIYANTO', 'SLTA', 'BURUH', '085123456789', 20),
(22, 'HARTINI', 'SLTA', 'WIRASWASTA', 'SUPRIYADI', 'SLTA', 'WIRASWASTA', '085123456789', 21),
(23, 'SRI LESTARI', 'SLTA', 'TIDAK BEKERJA', 'HARJONO', 'SLTA', 'BURUH', '085123456789', 22),
(26, 'SARIYATI', 'SLTP', 'BURUH', 'WAHYUDI', 'SMA / sederajat', 'KARYAWAN SWASTA', '085123456789', 25),
(27, 'SRI FARIDATUN RAHAYUNINGTYAS', 'SLTP', 'BURUH', 'SASMINTO NUGROHO', 'SD', 'BURUH', '085123456789', 26),
(28, 'ARI SULISTIYANTI', 'DIPLOMA III', 'TIDAK BEKERJA', 'JENDRO KALISNA', 'SLTA', 'WIRASWASTA', '085123456789', 27),
(29, 'ALM. SUNDARI', '-', '-', 'SUSANTO', 'SLTA', 'BURUH', '085123456789', 28),
(30, 'TEGUH PRIYONO', 'SLTA', 'BURUH', 'SRI LESTARI', 'SLTA', 'TIDAK BEKERJA', '085123456789', 29),
(31, 'ANNISA PUSPITA', 'SLTA', 'TIDAK BEKERJA', 'SIGIT PANJI SAPUTRO', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 30),
(32, 'SUMARNI', 'SD', 'BURUH', 'HARYANTO', 'SLTA', 'BURUH', '085123456789', 31),
(33, 'SUPRIYATMI', 'DIPLOMA III', 'TIDAK BEKERJA', 'AMBAR PRIHATIN', 'SLTP/ SEDERAJAT', 'BURUH', '085123456789', 32),
(34, 'ERAWATI AGUSTINA', 'SLTA', 'KARYAWAN SWASTA', 'EKO BUDIYANTO', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 33),
(35, 'ANNIS SOLIKHAH, S. Psi', 'S1', 'KARYAWAN SWASTA', 'IMAN SUMARLAN, S. IP', 'S1', 'KARYAWAN SWASTA', '085123456789', 34),
(36, 'SUTILAH', 'SLTP', 'KARYAWAN SWASTA', 'MARYANTO', 'SLTP/ SEDERAJAT', 'KARYAWAN SWASTA', '085123456789', 35),
(37, 'DEVI OKVITA RINI', 'DIPLOMA III', 'WIRASWASTA', 'BAMBANG SETIADI', 'S1', 'WIRASWASTA', '085123456789', 36),
(38, 'ISNIATI ROSIDAH. SP.', 'S1', 'WIRASWASTA', 'YUDHI PRAMARDIYANTO', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 37),
(39, 'HERUNINGSIH', 'SLTA', 'TIDAK BEKERJA', 'SUBARDI', 'SLTA', 'BURUH', '085123456789', 38),
(40, 'NURI NURCAHYANTI', 'SLTA', 'KARYAWAN SWASTA', 'KRISWANTO', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 39),
(41, 'INDRI WAHYUNI', 'SLTA', 'WIRASWASTA', 'HERU YULIANTO', 'SLTA', 'WIRASWASTA', '085123456789', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(10) NOT NULL,
  `jabatan` enum('Guru Kelas','Guru Agama','Guru Penjas') NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_guru` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengajar`
--

INSERT INTO `tb_pengajar` (`id_pengajar`, `jabatan`, `id_mapel`, `id_guru`, `id_kelas`, `id_tahun`) VALUES
(3, 'Guru Kelas', 35, 36, 14, 3),
(4, 'Guru Kelas', 35, 36, 15, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(10) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `id_orangtua` int(10) DEFAULT NULL,
  `id_kelas` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nisn`, `nama`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `id_orangtua`, `id_kelas`) VALUES
(12, '1785', '0125122403', 'ALIFA RIZKYA LABIBAH', '2014-01-25', 'Islam', 'Perempuan', 16, 14),
(13, '1786', '0111105145', 'ALINA QONITA FAIZAH', '2013-05-01', 'Islam', 'Perempuan', 17, 14),
(14, '1787', '0116389416', 'AMIR ABDUL ROZAK', '2013-01-29', 'Islam', 'Laki-laki', 18, 15),
(15, '1788', '0118492443', 'ARYA PUTRA NAFIS', '2013-04-12', 'Islam', 'Laki-laki', 19, 15),
(16, '1789', '0127884410', 'ATHAYA REINDRA MAULANA', '2013-01-15', 'Islam', 'Laki-laki', 20, 15),
(17, '1790', '0114446854', 'AXIST RIHHADATUL AISY AZKIYA', '2013-01-22', 'Islam', 'Perempuan', 21, 15),
(18, '1791', '0113558709', 'AZALIA RAMADHANI', '2012-08-16', 'Islam', 'Perempuan', 22, 16),
(19, '1792', '0113380677', 'DANIAL ADLI PANGESTU', '2012-07-13', 'Islam', 'Laki-laki', 23, 16),
(22, '1842', '0137743415', 'GADING APRILLEANO SILVA', '2010-04-12', 'Islam', 'Laki-laki', 26, 17),
(23, '1795', '0114428234', 'HAFIZ MAULANA', '2011-06-01', 'Islam', 'Laki-laki', 27, 17),
(24, '1796', '0128941294', 'HASNA FADIYAH KALISNA', '2012-01-20', 'Islam', 'Perempuan', 28, 17),
(25, '1797', '0117341208', 'IMAM BANUGROHO WICAKSONO', '2011-11-18', 'Islam', 'Laki-laki', 29, 17),
(26, '1798', '0128004291', 'JIHAN QONITA AZKA PRIYONO', '2010-01-24', 'Islam', 'Perempuan', 30, 18),
(27, '1799', '0112874725', 'KEYSHA HANA ZAHRANI', '2010-08-29', 'Islam', 'Perempuan', 31, 18),
(28, '1800', '0118464308', 'LUTFI AKMAL', '2010-10-30', 'Islam', 'Laki-laki', 32, 18),
(29, '1803', '0111532628', 'RACHELA PUTRI LATIFA', '2010-05-28', 'Islam', 'Perempuan', 33, 18),
(30, '1804', '0112918297', 'RASYID EFENDI', '2009-09-27', 'Islam', 'Laki-laki', 34, 19),
(31, '1805', '0122998093', 'RAUSYAN EL FIKR', '2009-01-01', 'Islam', 'Laki-laki', 35, 19),
(32, '1806', '0128308811', 'RENA AMBARWATI ', '2009-02-28', 'Islam', 'Perempuan', 36, 19),
(33, '1807', '0119299626', 'RIDWAN FAWWAZUL PRATAMA', '2009-04-24', 'Islam', 'Laki-laki', 37, 19),
(35, '1810', '0125613640', 'SINERGI AISYA LARESAE', '2009-02-25', 'Islam', 'Perempuan', 39, NULL),
(36, '1811', '0113926322', 'YAMA SATRIA PRATAMA', '2011-12-29', 'Islam', 'Laki-laki', 40, NULL);

--
-- Triggers `tb_siswa`
--
DELIMITER $$
CREATE TRIGGER `add_user_siswa` BEFORE INSERT ON `tb_siswa` FOR EACH ROW INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status`) VALUES (NULL, NEW.nis, MD5(NEW.tanggal_lahir), 'siswa', '1')
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_orangtua_and_alamat` AFTER DELETE ON `tb_siswa` FOR EACH ROW BEGIN
	DECLARE idAlamat int(10);
    SELECT id_alamat FROM tb_orangtua WHERE id_orangtua = OLD.id_orangtua INTO idAlamat;
	DELETE FROM `tb_orangtua` WHERE `tb_orangtua`.`id_orangtua` = OLD.id_orangtua;
    DELETE FROM `tb_alamat` WHERE `tb_alamat`.`id_alamat` = idAlamat;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_user_siswa` AFTER DELETE ON `tb_siswa` FOR EACH ROW DELETE FROM `tb_user` WHERE `tb_user`.`username` = OLD.nis
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahunajaran`
--

CREATE TABLE `tb_tahunajaran` (
  `id_tahun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `status` enum('1','0') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tahunajaran`
--

INSERT INTO `tb_tahunajaran` (`id_tahun`, `nama`, `status`) VALUES
(3, '2020/2021', '1'),
(4, '2019/2020', '0');

-- --------------------------------------------------------

--
-- Table structure for table `tb_tema`
--

CREATE TABLE `tb_tema` (
  `id_tema` int(10) NOT NULL,
  `tema` varchar(10) NOT NULL,
  `id_mapel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_tema`
--

INSERT INTO `tb_tema` (`id_tema`, `tema`, `id_mapel`) VALUES
(95, 'Tema 1', 35),
(96, 'Tema 2', 35),
(97, 'Tema 3', 35),
(98, 'Tema 4', 35),
(99, 'Tema 5', 35),
(100, 'Tema 6', 35),
(101, 'Tema 7', 35),
(102, 'Tema 8', 35),
(103, 'Tema 9', 35),
(104, 'Tema 10', 35),
(105, 'Tema 11', 35);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','siswa','guru','wali kelas') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1'),
(25, 'sri@gmail.com', '89f844227a5fb22a16b2faa15e6ee792', 'wali kelas', '1'),
(26, 'diah@gmail.com', '0dc4887c87db4de4ee2eea2fc0c34cf4', 'wali kelas', '1'),
(27, 'siti@gmail.com', 'fb9dfc03b6bc9bee72d937b8b0797900', 'wali kelas', '1'),
(28, 'hendri@gmail.com', '800d357080c431743bc9e7c5b14cf8fa', 'wali kelas', '1'),
(29, 'dia@gmail.com', 'e2bb3ad3e79dd9658af642c8cb4382a2', 'wali kelas', '1'),
(30, 'irni@gmail.com', '0e7207ed174e54a5eeff0052973dd6da', 'wali kelas', '1'),
(31, 'tri@gmail.com', '653121c949651c3b36ff5ac9cfbde33d', 'guru', '1'),
(32, 'rumi@gmail.com', '3c89aedc630a4b2951480196c6d4bdcf', 'guru', '1'),
(38, '1785', '6cf9e035d2f1d8ffe1b9f2f96a9e7a3a', 'siswa', '1'),
(39, '1786', 'ed268f8f3837888893f896b7240f1254', 'siswa', '1'),
(40, '1787', 'b2e85aa5f9c095607e638c7e6e2c694b', 'siswa', '1'),
(41, '1788', '3c8e2c51453f4d665f1050da871dead6', 'siswa', '1'),
(42, '1789', '07713adfd12a8cd9d376671631f3bc02', 'siswa', '1'),
(43, '1790', 'bc58efba5e800fb688b34bfde89c24bf', 'siswa', '1'),
(44, '1791', '4a21ddebdfee548e65b62c2809afc1c0', 'siswa', '1'),
(45, '1792', '6c1f25b149f7224c4de256ef6e37c951', 'siswa', '1'),
(48, '1842', 'ee8af89abee489d2d0f69fb08d18fe35', 'siswa', '1'),
(49, '1795', 'f9906ac7d7d1241ad5c23eb95cf9c6e4', 'siswa', '1'),
(50, '1796', 'd3fa88b8a081356f91911e74ecf7e481', 'siswa', '1'),
(51, '1797', '8432e9be3a7a8a9212201edf8ef07c9f', 'siswa', '1'),
(52, '1798', 'd9c2d12d3f1b7dbd92e982df5ef5c585', 'siswa', '1'),
(53, '1799', '22b46dd03c30397cb2e61d417da0ebfa', 'siswa', '1'),
(54, '1800', '7551a93e4dbd2a1d3935888899251e15', 'siswa', '1'),
(55, '1803', 'd93145c885e52231c2bf6511e9e8bb93', 'siswa', '1'),
(56, '1804', 'ae173351560410be5e2276a3347f2c04', 'siswa', '1'),
(57, '1805', 'bf5471dd69c33c4d425c941d6c1dabdb', 'siswa', '1'),
(58, '1806', '15ac3618d3df1b8fe6fc9ebae1337780', 'siswa', '1'),
(59, '1807', 'f00132b0472ad6abc7866e0ae0368b3c', 'siswa', '1'),
(61, '1810', '74b989ea2fcdc56bf36420d027a367b5', 'siswa', '1'),
(62, '1811', 'c79548466fdad0728a9aa092fbad03a7', 'siswa', '1'),
(66, 'taufik21', '0192023a7bbd73250516f069df18b500', 'admin', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`);

--
-- Indexes for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  ADD PRIMARY KEY (`id_mapel`);

--
-- Indexes for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  ADD PRIMARY KEY (`id_orangtua`),
  ADD KEY `tb_orangtua_FK` (`id_alamat`);

--
-- Indexes for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD PRIMARY KEY (`id_pengajar`),
  ADD KEY `tb_pengajar_FK` (`id_guru`),
  ADD KEY `tb_pengajar_FK_1` (`id_kelas`),
  ADD KEY `tb_pengajar_FK_2` (`id_mapel`),
  ADD KEY `tb_pengajar_FK_3` (`id_tahun`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `tb_siswa_FK_1` (`id_kelas`),
  ADD KEY `tb_siswa_FK` (`id_orangtua`);

--
-- Indexes for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tb_tema`
--
ALTER TABLE `tb_tema`
  ADD PRIMARY KEY (`id_tema`),
  ADD KEY `tb_tema_FK` (`id_mapel`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  MODIFY `id_alamat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  MODIFY `id_orangtua` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_tema`
--
ALTER TABLE `tb_tema`
  MODIFY `id_tema` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  ADD CONSTRAINT `tb_orangtua_FK` FOREIGN KEY (`id_alamat`) REFERENCES `tb_alamat` (`id_alamat`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD CONSTRAINT `tb_pengajar_FK` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_2` FOREIGN KEY (`id_mapel`) REFERENCES `tb_matapelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_3` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_FK` FOREIGN KEY (`id_orangtua`) REFERENCES `tb_orangtua` (`id_orangtua`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_siswa_FK_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE SET NULL;

--
-- Constraints for table `tb_tema`
--
ALTER TABLE `tb_tema`
  ADD CONSTRAINT `tb_tema_FK` FOREIGN KEY (`id_mapel`) REFERENCES `tb_matapelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
