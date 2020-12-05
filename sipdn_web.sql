-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2020 at 04:08 PM
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
(7, 'Trini', 'Trihanggo', 'Gamping', 'Sleman');

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
(43, '2038750653300013', 'Rumiyati, S.Ag.', 'Perempuan', '1972-07-09', '085123456789', 'rumi@gmail.com', 'Jetis, Sinduadi, Mlati, Sleman'),
(45, '3743764666200022', 'Ahmad Nor Mutaqin, S.Pd.I', 'Laki-laki', '1985-04-11', '085123456789', 'ahmad@gmail.com', 'Dongkusan, Sidoarjo, Godean, Sleman');

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
(14, '1C', 'Sri Sumarsih, S.Pd'),
(15, '1B', 'Diah Pintarti, S.S'),
(16, '2', 'Siti Nurochmah, S.Pd.'),
(17, '3', 'Hendri Abdul Kristanto, S.Pd.'),
(18, '4', 'Dia Sintawati, S.Pd'),
(19, '5', 'Irni Sulistiana, S.Pd.'),
(21, '6', 'Tri Nurhudayah, S.E');

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
  `level` enum('Tema','Mulok','PAI') NOT NULL,
  `sub` int(10) NOT NULL,
  `kompetensi_dasar` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(8, 'siti', 'SMP', 'ibu rumah tangga', 'tono', 'SMA', 'petani', '085213456987', 7);

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
(7, '123456', '654321987', 'Taufik', '2020-11-17', 'Islam', 'Laki-laki', 8, NULL);

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
(14, '123456', '3fc0a7acf087f549ac2b266baf94b8b1', 'siswa', '1'),
(17, 'taufik', '76868b011b66684d4a91d4ef7e1a2651', 'admin', '1'),
(25, 'sri@gmail.com', '89f844227a5fb22a16b2faa15e6ee792', 'wali kelas', '1'),
(26, 'diah@gmail.com', '0dc4887c87db4de4ee2eea2fc0c34cf4', 'wali kelas', '1'),
(27, 'siti@gmail.com', 'fb9dfc03b6bc9bee72d937b8b0797900', 'wali kelas', '1'),
(28, 'hendri@gmail.com', '800d357080c431743bc9e7c5b14cf8fa', 'wali kelas', '1'),
(29, 'dia@gmail.com', 'e2bb3ad3e79dd9658af642c8cb4382a2', 'wali kelas', '1'),
(30, 'irni@gmail.com', '0e7207ed174e54a5eeff0052973dd6da', 'wali kelas', '1'),
(31, 'tri@gmail.com', '653121c949651c3b36ff5ac9cfbde33d', 'wali kelas', '1'),
(32, 'rumi@gmail.com', '3c89aedc630a4b2951480196c6d4bdcf', 'guru', '1'),
(34, 'ahmad@gmail.com', '86ec3f7117d4fa80f46458517727e8e5', 'guru', '1');

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
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `tb_siswa_FK` (`id_orangtua`),
  ADD KEY `tb_siswa_FK_1` (`id_kelas`);

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
  MODIFY `id_alamat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  MODIFY `id_orangtua` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  ADD CONSTRAINT `tb_orangtua_FK` FOREIGN KEY (`id_alamat`) REFERENCES `tb_alamat` (`id_alamat`) ON DELETE SET NULL;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_FK` FOREIGN KEY (`id_orangtua`) REFERENCES `tb_orangtua` (`id_orangtua`) ON DELETE SET NULL,
  ADD CONSTRAINT `tb_siswa_FK_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
