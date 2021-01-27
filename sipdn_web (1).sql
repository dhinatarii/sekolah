-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2020 at 08:30 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

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
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_admin`
--

INSERT INTO `tb_admin` (`id_admin`, `nip`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `email`, `alamat`, `id_user`) VALUES
(1, '000111222333444555', 'Admin', 'Laki-laki', '1997-01-01', '085123456789', 'admin@gmail.com', 'trini', 72),
(2, '0123456789', 'Taufik', 'Laki-laki', '1998-07-01', '085123456789', 'taufik@gmail.com', 'Trini, Trihanggo, Gamping, Sleman', 84);

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
(37, 'GAMPING KIDUL', 'AMBARKETAWANG', 'GAMPING', 'SLEMAN'),
(40, 'NANDAN', 'SARIHARJO', 'NGAGLIK', 'SLEMAN'),
(43, 'KARANG TENGAH', 'NOGOTIRTO', 'GAMPING', 'SLEMAN'),
(44, 'NUSUPAN', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(45, 'BIRU', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(46, 'KWARASAN', 'NOGOTIRTO', 'GAMPING', 'SLEMAN'),
(47, 'BLAMBANGAN BATURAN', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(48, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(49, 'KRONGGAHAN 1', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(50, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(51, 'RAJEK NGEMPLAK', 'TIRTOADI', 'MLATI', 'SLEMAN'),
(52, 'DONOKITRI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(53, 'BATURAN', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(54, 'MAYANGAN', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(55, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(56, 'SUROKARSAN MG II/ 196 YK', 'WIROGUNAN', 'MERGANGSANG', 'KOTA YOGYAKARTA'),
(57, 'NGENTAK GEDE, BEDOG', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(58, 'GEDONGAN', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(59, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(60, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(61, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(62, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(63, 'BATURAN', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(64, 'BESOLE', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(65, 'TRINI', 'TRIHANGGO', 'GAMPING', 'SLEMAN'),
(66, 'PINGGIREJO', 'WATES', 'MAGELANG UTARA', 'KOTA MAGELANG'),
(67, 'GAMPING KIDUL', 'AMBARKETAWANG', 'GAMPING', 'SLEMAN'),
(68, 'GEDONGAN', 'SINDUADI', 'MLATI', 'SLEMAN');

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
  `alamat` varchar(100) NOT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_guru`
--

INSERT INTO `tb_guru` (`id_guru`, `nip`, `nama`, `jenis_kelamin`, `tanggal_lahir`, `no_hp`, `email`, `alamat`, `id_user`) VALUES
(52, '9854748650300010', 'Sri Sumarsih, S.Pd', 'Perempuan', '1979-06-22', '085123456789', 'sri@gmail.com', 'Jombor, Trihanggo, Gamping, Sleman', 73),
(53, '6335758659300050', 'Diah Pintarti, S.S', 'Perempuan', '1960-10-03', '085123456789', 'diah@gmail.com', 'Biru, Trihanggo, Gamping, Sleman', 74),
(54, '9847760662130230', 'Siti Nurochmach, S.Pd', 'Perempuan', '1962-05-15', '085123456789', 'siti@gmail.com', 'Trini, Trihanggo, Gamping, Sleman', 76),
(55, '', 'Hendri Abdul Kristanto, S.Pd', 'Laki-laki', '1965-12-24', '085123456789', 'hendri@gmail.com', 'Demangan, Maguwoharjo, Depok, Sleman', 77),
(56, '', 'Dia Sintawati, S.Pd', 'Perempuan', '1962-07-07', '085123456789', 'dia@gmail.com', 'Turusan, Banyuraden, Gamping, Sleman', 78),
(57, '6456755656300042', 'Tri Nurhudayah, S.Pd', 'Perempuan', '1977-01-24', '085123456789', 'tri@gmail.com', 'Dowangan, Banyuraden, Gamping, Sleman', 79),
(58, '1746761662300052', 'Irni Sulistiana, S.Pd.', 'Perempuan', '1963-04-14', '085123456789', 'irni@gmail.com', 'Trini, Trihanggo, Gamping, Sleman', 80);

--
-- Triggers `tb_guru`
--
DELIMITER $$
CREATE TRIGGER `delete_user_guru` AFTER DELETE ON `tb_guru` FOR EACH ROW DELETE FROM `tb_user` WHERE `tb_user`.`id_user` = OLD.id_user
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_walikelas` BEFORE DELETE ON `tb_guru` FOR EACH ROW UPDATE `tb_kelas` SET `tb_kelas`.`wali_kelas` = NULL WHERE `tb_kelas`.`wali_kelas` = OLD.nama
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kd`
--

CREATE TABLE `tb_kd` (
  `id_kd` int(10) NOT NULL,
  `nama_kd` varchar(15) NOT NULL,
  `id_mapel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_kd`
--

INSERT INTO `tb_kd` (`id_kd`, `nama_kd`, `id_mapel`) VALUES
(114, 'KD 3.1', 35),
(123, 'KD 3.1', 63),
(128, 'KD 3.1', 40),
(129, 'KD 3.2', 40),
(130, 'KD 3.3', 40),
(131, 'KD 3.4', 40),
(132, 'KD 3.5', 40),
(133, 'KD 3.2', 35),
(134, 'KD 3.3', 35),
(135, 'KD 3.4', 35);

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
(22, '1B', 'Diah Pintarti, S.S'),
(23, '2', 'Siti Nurochmach, S.Pd'),
(24, '3', 'Hendri Abdul Kristanto, S.Pd'),
(25, '4', 'Dia Sintawati, S.Pd'),
(26, '5', 'Irni Sulistiana, S.Pd.'),
(27, '6', 'Tri Nurhudayah, S.Pd');

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
(35, 'Matematika', '1'),
(37, 'Bahas Indonesia', '2'),
(40, 'SBDP', '1'),
(41, 'SBDP', '2'),
(42, 'PPKN', '1'),
(43, 'PPKN', '2'),
(44, 'PJOK', '1'),
(45, 'PAI', '1'),
(46, 'Matematika', '2'),
(47, 'PJOK', '2'),
(48, 'PAI', '2'),
(49, 'PPKN', '3'),
(50, 'Matematika', '3'),
(51, 'Bahasa Indonesia', '3'),
(52, 'SBDP', '3'),
(53, 'PJOK', '3'),
(54, 'PAI', '3'),
(63, 'Bahas Indonesia', '1');

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(10) NOT NULL,
  `jenis` enum('Tugas Harian 1','Tugas Harian 2','Tugas Harian 3','Tugas Harian 4','Ulangan Harian 1','Ulangan Harian 2','Ulangan Harian 3','Ulangan Harian 4','UTS','UAS') NOT NULL,
  `nilai` float NOT NULL,
  `id_kd` int(10) NOT NULL,
  `id_siswa` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_nilai`
--

INSERT INTO `tb_nilai` (`id_nilai`, `jenis`, `nilai`, `id_kd`, `id_siswa`) VALUES
(1, 'Tugas Harian 1', 80, 114, 40),
(2, 'Tugas Harian 1', 79, 114, 41),
(3, 'Tugas Harian 1', 78, 114, 42),
(4, 'Tugas Harian 1', 80, 114, 43),
(5, 'Tugas Harian 2', 90, 114, 40),
(6, 'Tugas Harian 2', 78, 114, 41),
(7, 'Tugas Harian 2', 67, 114, 42),
(8, 'Tugas Harian 2', 85, 114, 43),
(9, 'Ulangan Harian 1', 75, 114, 40),
(10, 'Ulangan Harian 1', 90, 114, 41),
(11, 'Ulangan Harian 1', 67, 114, 42),
(12, 'Ulangan Harian 1', 87, 114, 43),
(13, 'Ulangan Harian 2', 67, 114, 40),
(14, 'Ulangan Harian 2', 78, 114, 41),
(15, 'Ulangan Harian 2', 90, 114, 42),
(16, 'Ulangan Harian 2', 78, 114, 43),
(17, 'Tugas Harian 1', 80, 133, 40),
(18, 'Tugas Harian 1', 95, 133, 41),
(19, 'Tugas Harian 1', 79, 133, 42),
(20, 'Tugas Harian 1', 56, 133, 43),
(21, 'Tugas Harian 2', 80, 133, 40),
(22, 'Tugas Harian 2', 78, 133, 41),
(23, 'Tugas Harian 2', 95, 133, 42),
(24, 'Tugas Harian 2', 68, 133, 43),
(25, 'UTS', 80, 114, 40),
(26, 'UTS', 70, 114, 41),
(27, 'UTS', 76, 114, 42),
(28, 'UTS', 78, 114, 43);

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
(38, 'ISNIATI ROSIDAH. SP.', 'S1', 'WIRASWASTA', 'YUDHI PRAMARDIYANTO', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 37),
(41, 'INDRI WAHYUNI', 'SLTA', 'WIRASWASTA', 'HERU YULIANTO', 'SLTA', 'WIRASWASTA', '085123456789', 40),
(44, 'ERNA SRI REJEKISARI', 'DIPLOMA III', 'KARYAWAN SWASTA', 'M. SALIM SAMSUDIN', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 43),
(45, 'ISWANTI', 'SLTP/ SEDERAJAT', 'KARYAWAN SWASTA', 'RUBIYADI', 'SLTP/ SEDERAJAT', 'KARYAWAN SWASTA', '085123456789', 44),
(46, 'DIAH PINTARTI', 'S1', 'GTY', 'DWI SUHARYANTO', 'S1', 'PNS', '085123456789', 45),
(47, 'LILIK', 'DIPLOMA III', 'GTY', 'ALM. NANANG SULARSO', '-', '-', '085123456789', 46),
(48, 'NUNUNG HARYATI', 'S1', 'TIDAK BEKERJA', 'SLAMET ARINES', 'SLTA', 'WIRASWASTA', '085123456789', 47),
(49, 'SRI RAHAYU', 'DIPLOMA III', 'KARYAWAN SWASTA', 'PRIYANTORO', 'SLTA', 'PNS', '085123456789', 48),
(50, 'PENI LESTARI', 'SLTP', 'TIDAK BEKERJA', 'EKA WIBAWA', 'SLTA', 'WIRASWASTA', '085123456789', 49),
(51, 'ROHMI NUR ALIFAH', 'SLTP', 'TIDAK BEKERJA', 'TRIYANTO', 'SLTA', 'BURUH', '085123456789', 50),
(52, 'HARTINI', 'SLTA', 'WIRASWASTA', 'SUPRIYADI', 'SLTA', 'WIRASWASTA', '085123456789', 51),
(53, 'SRI LESTARI', 'SLTA', 'TIDAK BEKERJA', 'HARJONO', 'SLTA', 'BURUH', '085123456789', 52),
(54, 'ROSIDA', 'SLTP', 'TIDAK BEKERJA', 'BARTONO', 'SLTP/ SEDERAJAT', 'SWASTA', '085123456789', 53),
(55, 'TRI SETYORINI', 'SLTA', 'KARYAWAN SWASTA', 'SENO SETYA BUDI', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 54),
(56, 'SARIYATI', 'SLTP', 'BURUH', 'WAHYUDI', 'SMA / sederajat', 'KARYAWAN SWASTA', '085123456789', 55),
(57, 'SRI FARIDATUN RAHAYUNINGTYAS', 'SLTP', 'BURUH', 'SASMINTO NUGROHO', 'SD', 'BURUH', '085123456789', 56),
(58, 'ARI SULISTIYANTI', 'DIPLOMA III', 'TIDAK BEKERJA', 'JENDRO KALISNA', 'SLTA', 'WIRASWASTA', '085123456789', 57),
(59, 'ALM. SUNDARI', '-', '-', 'SUSANTO', 'SLTA', 'WIRASWASTA', '085123456789', 58),
(60, 'SRI LESTARI', 'SLTA', 'TIDAK BEKERJA', 'TEGUH PRIYONO', 'SLTA', 'BURUH', '085123456789', 59),
(61, 'ANNISA PUSPITA', 'SLTA', 'TIDAK BEKERJA', 'SIGIT PANJI SAPUTRO', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 60),
(62, 'SUMARNI', 'SD', 'BURUH', 'HARYANTO', 'SLTA', 'BURUH', '085123456789', 61),
(63, 'SUPRIYATMI', 'DIPLOMA III', 'TIDAK BEKERJA', 'AMBAR PRIHATIN', 'SLTP/ SEDERAJAT', 'BURUH', '085123456789', 62),
(64, 'ERAWATI AGUSTINA', 'SLTA', 'KARYAWAN SWASTA', 'EKO BUDIYANTO', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 63),
(65, 'ANNIS SOLIKHAH, S. Psi', 'S1', 'KARYAWAN SWASTA', 'IMAN SUMARLAN, S. IP', 'S1', 'KARYAWAN SWASTA', '085123456789', 64),
(66, 'SUTILAH', 'SLTP', 'KARYAWAN SWASTA', 'MARYANTO', 'SLTP/ SEDERAJAT', 'KARYAWAN SWASTA', '085123456789', 65),
(67, 'DEVI OKVITA RINI', 'DIPLOMA III', 'KARYAWAN SWASTA', 'BAMBANG SETIADI', 'S1', 'WIRASWASTA', '085123456789', 66),
(68, 'ISNIATI ROSIDAH. SP.', 'S1', 'WIRASWASTA', 'YUDHI PRAMARDIYANTO', 'SLTA', 'KARYAWAN SWASTA', '085123456789', 67),
(69, 'HERUNINGSIH', 'SLTA', 'TIDAK BEKERJA', 'SUBARDI', 'SLTA', 'BURUH', '085123456789', 68);

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
(7, 'Guru Kelas', 35, 52, 14, 3),
(9, 'Guru Kelas', 40, 52, 14, 3),
(10, 'Guru Kelas', 42, 52, 14, 3),
(11, 'Guru Kelas', 35, 53, 22, 3),
(12, 'Guru Kelas', 37, 53, 22, 3),
(13, 'Guru Kelas', 40, 53, 22, 3),
(14, 'Guru Kelas', 42, 53, 22, 3),
(15, 'Guru Kelas', 46, 54, 23, 3),
(16, 'Guru Kelas', 37, 54, 23, 3),
(17, 'Guru Kelas', 41, 54, 23, 3),
(18, 'Guru Kelas', 43, 54, 23, 3),
(19, 'Guru Kelas', 49, 55, 24, 3),
(20, 'Guru Kelas', 50, 55, 24, 3),
(21, 'Guru Kelas', 51, 55, 24, 3),
(22, 'Guru Kelas', 53, 55, 24, 3);

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
  `id_kelas` int(10) DEFAULT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_siswa`
--

INSERT INTO `tb_siswa` (`id_siswa`, `nis`, `nisn`, `nama`, `tanggal_lahir`, `agama`, `jenis_kelamin`, `id_orangtua`, `id_kelas`, `id_user`) VALUES
(40, '1783', '0115142353', 'ABDULLAH AHMAD SIDIQ', '2013-04-12', 'Islam', 'Laki-laki', 44, 14, 85),
(41, '1784', '0113561822', 'ADNAN NAFIS YOWAN ADIKA', '2013-10-25', 'Islam', 'Laki-laki', 45, 14, 86),
(42, '1785', '0125122403', 'ALIFA RIZKYA LABIBAH', '2014-01-25', 'Islam', 'Perempuan', 46, 14, 87),
(43, '1786', '0111105145', 'ALINA QONITA FAIZAH', '2013-05-01', 'Islam', 'Perempuan', 47, 14, 88),
(44, '1787', '0116389416', 'AMIR ABDUL ROZAK', '2013-01-29', 'Islam', 'Laki-laki', 48, 22, 89),
(45, '1788', '0118492443', 'ARYA PUTRA NAFIS', '2013-04-12', 'Islam', 'Laki-laki', 49, 22, 90),
(46, '1789', '0127884410', 'ATHAYA REINDRA MAULANA', '2013-01-15', 'Islam', 'Laki-laki', 50, 22, 91),
(47, '1790', '0114446854', 'AXIST RIHHADATUL AISY AZKIYA', '2013-06-22', 'Islam', 'Perempuan', 51, 22, 92),
(48, '1791', '0113558709', 'AZALIA RAMADHANI', '2011-08-16', 'Islam', 'Perempuan', 52, 23, 93),
(49, '1792', '0113380677', 'DANIAL ADLI PANGESTU', '2011-07-13', 'Islam', 'Laki-laki', 53, 23, 94),
(50, '1793', '0116243681', 'FATIMA DZAKIYA SAKHI', '2011-05-11', 'Islam', 'Perempuan', 54, 23, 95),
(51, '1794', '0114399812', 'FIDELYA NORIN NATHANIA', '2011-09-09', 'Islam', 'Perempuan', 55, 23, 96),
(52, '1842', '0137743415', 'GADING APRILLEANO SILVA', '2010-04-12', 'Islam', 'Laki-laki', 56, 24, 97),
(53, '1795', '0114428234', 'HAFIZ MAULANA', '2010-06-01', 'Islam', 'Laki-laki', 57, 24, 98),
(54, '1796', '0128941294', 'HASNA FADIYAH KALISNA', '2010-01-20', 'Islam', 'Perempuan', 58, 24, 99),
(55, '1797', '0117341208', 'IMAM BANUGROHO WICAKSONO', '2010-08-17', 'Islam', 'Laki-laki', 59, 24, 100),
(56, '1798', '0128004291', 'JIHAN QONITA AZKA PRIYONO', '2009-01-24', 'Islam', 'Perempuan', 60, 25, 101),
(57, '1799', '0112874725', 'KEYSHA HANA ZAHRANI', '2009-08-29', 'Islam', 'Perempuan', 61, 25, 102),
(58, '1800', '0118464308', 'LUTFI AKMAL', '2009-10-20', 'Islam', 'Laki-laki', 62, 25, 103),
(59, '1803', '0111532628', 'RACHELA PUTRI LATIFA', '2009-05-20', 'Islam', 'Perempuan', 63, 25, 104),
(60, '1804', '0112918297', 'RASYID EFENDI', '2008-09-27', 'Islam', 'Laki-laki', 64, 26, 105),
(61, '1805', '0122998093', 'RAUSYAN EL FIKR', '0010-01-01', 'Islam', 'Laki-laki', 65, 26, 106),
(62, '1806', '0128308811', 'RENA AMBARWATI ', '2008-02-28', 'Islam', 'Perempuan', 66, 26, 107),
(63, '1807', '0119299626', 'RIDWAN FAWWAZUL PRATAMA', '2008-04-24', 'Islam', 'Laki-laki', 67, 26, 108),
(64, '1808', '0121543709', 'RR. DISTI ADELIA NUGRAHENI', '2007-04-16', 'Islam', 'Perempuan', 68, 27, 109),
(65, '1810', '0125613640', 'SINERGI AISYA LARESAE', '2012-02-25', 'Islam', 'Perempuan', 69, 27, 110);

--
-- Triggers `tb_siswa`
--
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
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','siswa','guru','wali kelas') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `username`, `password`, `level`, `status`) VALUES
(72, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1'),
(73, 'sri@gmail.com', 'c1e996fa5333850c5c15c05aceaa16f3', 'wali kelas', '1'),
(74, 'diah@gmail.com', 'fb5854c1dd091f5981498aed48c26e24', 'wali kelas', '1'),
(76, 'siti@gmail.com', 'c66f85668ac3180063f4b755b4db8d83', 'wali kelas', '1'),
(77, 'hendri@gmail.com', '800d357080c431743bc9e7c5b14cf8fa', 'wali kelas', '1'),
(78, 'dia@gmail.com', 'eaa26d8ee5c626d986301ac2e3aa50a3', 'wali kelas', '1'),
(79, 'tri@gmail.com', '653121c949651c3b36ff5ac9cfbde33d', 'wali kelas', '1'),
(80, 'irni@gmail.com', '0e7207ed174e54a5eeff0052973dd6da', 'wali kelas', '1'),
(84, 'taufik123', '76868b011b66684d4a91d4ef7e1a2651', 'admin', '1'),
(85, '1783', '3c8e2c51453f4d665f1050da871dead6', 'siswa', '1'),
(86, '1784', '0da2bc000f1fe4ea8746f9aea0bb5879', 'siswa', '1'),
(87, '1785', '6cf9e035d2f1d8ffe1b9f2f96a9e7a3a', 'siswa', '1'),
(88, '1786', 'ed268f8f3837888893f896b7240f1254', 'siswa', '1'),
(89, '1787', 'b2e85aa5f9c095607e638c7e6e2c694b', 'siswa', '1'),
(90, '1788', '3c8e2c51453f4d665f1050da871dead6', 'siswa', '1'),
(91, '1789', '07713adfd12a8cd9d376671631f3bc02', 'siswa', '1'),
(92, '1790', '412998e77ee121227580e3d363f75fa2', 'siswa', '1'),
(93, '1791', '17b5405b2f84fb3c49c98faa3667396c', 'siswa', '1'),
(94, '1792', 'ddf982e1176e6263757093cc2f312cd3', 'siswa', '1'),
(95, '1793', '928ba50351efae8cbed881787bcb4783', 'siswa', '1'),
(96, '1794', '18f7c9bb65478213b7dcd26262dde1a0', 'siswa', '1'),
(97, '1842', 'ee8af89abee489d2d0f69fb08d18fe35', 'siswa', '1'),
(98, '1795', 'eb8838725d2e736fc653f9b60178e2b1', 'siswa', '1'),
(99, '1796', '8b7a6d174aa299e533a2d9d6e1a07151', 'siswa', '1'),
(100, '1797', '18e05abf76a319a07a1202febdcd95bf', 'siswa', '1'),
(101, '1798', '69e94a8f9c9915faece856551c590226', 'siswa', '1'),
(102, '1799', 'df000a459f81e8711ef70434cace369d', 'siswa', '1'),
(103, '1800', '87c319dbaade2a389a4ff7036dd8fe1f', 'siswa', '1'),
(104, '1803', '977f5225b6f2ab7a422428510a589137', 'siswa', '1'),
(105, '1804', 'b947c18b06f8bc5ebe5878c6547f5749', 'siswa', '1'),
(106, '1805', 'e769760fe696c971783cd559c85f3435', 'siswa', '1'),
(107, '1806', '42438de25c0232f139bfcefc82b63624', 'siswa', '1'),
(108, '1807', '2d4eca14f7f073af37eb4400774325be', 'siswa', '1'),
(109, '1808', '1368ffeb1a638ceb9d21c9579012d0f6', 'siswa', '1'),
(110, '1810', '93292bf41ccb6542d121825f25cbf70b', 'siswa', '1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `tb_admin_FK` (`id_user`);

--
-- Indexes for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  ADD PRIMARY KEY (`id_alamat`);

--
-- Indexes for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD KEY `tb_guru_FK` (`id_user`);

--
-- Indexes for table `tb_kd`
--
ALTER TABLE `tb_kd`
  ADD PRIMARY KEY (`id_kd`),
  ADD KEY `tb_tema_FK` (`id_mapel`);

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
  ADD PRIMARY KEY (`id_nilai`),
  ADD KEY `tb_nilai_FK` (`id_siswa`),
  ADD KEY `tb_nilai_FK_1` (`id_kd`);

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
  ADD KEY `tb_siswa_FK` (`id_orangtua`),
  ADD KEY `tb_siswa_FK_2` (`id_user`);

--
-- Indexes for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  ADD PRIMARY KEY (`id_tahun`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_alamat`
--
ALTER TABLE `tb_alamat`
  MODIFY `id_alamat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tb_kd`
--
ALTER TABLE `tb_kd`
  MODIFY `id_kd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  MODIFY `id_orangtua` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_FK` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_guru`
--
ALTER TABLE `tb_guru`
  ADD CONSTRAINT `tb_guru_FK` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_kd`
--
ALTER TABLE `tb_kd`
  ADD CONSTRAINT `tb_tema_FK` FOREIGN KEY (`id_mapel`) REFERENCES `tb_matapelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_FK` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_FK_1` FOREIGN KEY (`id_kd`) REFERENCES `tb_kd` (`id_kd`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `tb_siswa_FK_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_siswa_FK_2` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
