-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2024 at 10:03 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_absensi`
--

CREATE TABLE `tb_absensi` (
  `id_absensi` int(10) NOT NULL,
  `id_datasiswa` int(11) NOT NULL,
  `jumlah_sakit` int(3) NOT NULL DEFAULT 0,
  `jumlah_izin` int(3) NOT NULL DEFAULT 0,
  `jumlah_alpa` int(3) NOT NULL DEFAULT 0,
  `id_tahun` int(10) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_admin`
--

CREATE TABLE `tb_admin` (
  `id_admin` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `id_user` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_arsipnilai`
--

CREATE TABLE `tb_arsipnilai` (
  `id_arsip` int(11) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nilai` float NOT NULL,
  `id_kd` int(10) DEFAULT NULL,
  `id_datasiswa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_catatan_walikelas`
--

CREATE TABLE `tb_catatan_walikelas` (
  `id_catatan` int(11) NOT NULL,
  `id_datasiswa` int(11) NOT NULL,
  `catatan` text DEFAULT NULL,
  `id_tahun` int(10) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_datasiswa`
--

CREATE TABLE `tb_datasiswa` (
  `id_datasiswa` int(11) NOT NULL,
  `id_siswa` int(11) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `tahun_ajaran` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_ekstrakurikuler`
--

CREATE TABLE `tb_ekstrakurikuler` (
  `id_ekstrakurikuler` int(10) NOT NULL,
  `id_datasiswa` int(11) NOT NULL,
  `pramuka` enum('A','B','C','D','E') DEFAULT NULL,
  `drumband` enum('A','B','C','D','E') DEFAULT NULL,
  `tapak_suci` enum('A','B','C','D','E') DEFAULT NULL,
  `kaligrafi` enum('A','B','C','D','E') DEFAULT NULL,
  `id_tahun` int(10) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_guru`
--

CREATE TABLE `tb_guru` (
  `id_guru` int(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_user` int(10) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `pendidikan` varchar(100) DEFAULT NULL,
  `bidang_studi` varchar(100) DEFAULT NULL,
  `tempat_tugas` varchar(100) DEFAULT NULL,
  `tahun_mulai_tugas` year(4) DEFAULT NULL,
  `niy` varchar(50) DEFAULT NULL,
  `no_sertifikat_sertifikasi` varchar(50) DEFAULT NULL,
  `no_peserta_sertifikasi` varchar(50) DEFAULT NULL,
  `tahun_lulus_sertifikasi` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kd`
--

CREATE TABLE `tb_kd` (
  `id_kd` int(10) NOT NULL,
  `nama_kd` varchar(15) NOT NULL,
  `jenis_penilaian` enum('PTS','PAS') NOT NULL,
  `id_mapel` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(10) NOT NULL,
  `kelas` varchar(10) NOT NULL,
  `wali_kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_kkm`
--

CREATE TABLE `tb_kkm` (
  `id_kkm` int(10) NOT NULL,
  `nilai_kkm` float NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_matapelajaran`
--

CREATE TABLE `tb_matapelajaran` (
  `id_mapel` int(10) NOT NULL,
  `nama_mapel` varchar(100) NOT NULL,
  `level` enum('1','2','3','4','5','6') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilai`
--

CREATE TABLE `tb_nilai` (
  `id_nilai` int(10) NOT NULL,
  `jenis` varchar(255) NOT NULL,
  `nilai` float NOT NULL,
  `id_kd` int(10) NOT NULL,
  `id_datasiswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_nilaiakhir`
--

CREATE TABLE `tb_nilaiakhir` (
  `id_nilaiakhir` int(11) NOT NULL,
  `id_nilai` int(11) DEFAULT NULL,
  `id_datasiswa` int(11) NOT NULL,
  `id_kd` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `jenis` enum('pengetahuan','keterampilan','sikap') NOT NULL,
  `nilai` float NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_orangtua`
--

CREATE TABLE `tb_orangtua` (
  `id_orangtua` int(10) NOT NULL,
  `nama_ibu` varchar(100) NOT NULL,
  `nama_ayah` varchar(100) NOT NULL,
  `nama_wali` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengajar`
--

CREATE TABLE `tb_pengajar` (
  `id_pengajar` int(10) NOT NULL,
  `jabatan` enum('Kepala Madrasah','Guru','Ka. Tata Usaha','Staff Tata Usaha','Waka Kurikulum','Waka Sarpras','Wakasis') NOT NULL,
  `id_mapel` int(10) NOT NULL,
  `id_guru` int(10) NOT NULL,
  `id_kelas` int(10) NOT NULL,
  `id_tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_prestasi`
--

CREATE TABLE `tb_prestasi` (
  `id_prestasi` int(11) NOT NULL,
  `id_datasiswa` int(11) NOT NULL,
  `prestasi_1` varchar(255) DEFAULT NULL,
  `prestasi_2` varchar(255) DEFAULT NULL,
  `prestasi_3` varchar(255) DEFAULT NULL,
  `prestasi_4` varchar(255) DEFAULT NULL,
  `id_tahun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `id_siswa` int(10) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `nisn` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `id_orangtua` int(10) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `statu` enum('Aktif','Nonaktif') NOT NULL DEFAULT 'Aktif',
  `alamat` text DEFAULT NULL,
  `no_kip_pip` varchar(50) DEFAULT NULL,
  `id_kelas` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_tahunajaran`
--

CREATE TABLE `tb_tahunajaran` (
  `id_tahun` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `shared` enum('0','1') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(10) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('admin','siswa','guru','wali kelas','waka kurikulum') NOT NULL,
  `status` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD PRIMARY KEY (`id_absensi`),
  ADD KEY `tb_absensi_FK_1` (`id_datasiswa`),
  ADD KEY `tb_absensi_FK_2` (`id_tahun`);

--
-- Indexes for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `tb_admin_FK` (`id_user`);

--
-- Indexes for table `tb_arsipnilai`
--
ALTER TABLE `tb_arsipnilai`
  ADD PRIMARY KEY (`id_arsip`),
  ADD KEY `tb_arsipnilai_FK` (`id_kd`),
  ADD KEY `tb_arsipnilai_FK_1` (`id_datasiswa`);

--
-- Indexes for table `tb_catatan_walikelas`
--
ALTER TABLE `tb_catatan_walikelas`
  ADD PRIMARY KEY (`id_catatan`),
  ADD KEY `tb_catatan_walikelas_FK_1` (`id_datasiswa`),
  ADD KEY `tb_catatan_walikelas_FK_2` (`id_tahun`);

--
-- Indexes for table `tb_datasiswa`
--
ALTER TABLE `tb_datasiswa`
  ADD PRIMARY KEY (`id_datasiswa`),
  ADD KEY `tb_datasiswa_FK` (`id_kelas`),
  ADD KEY `tb_datasiswa_FK_1` (`id_siswa`);

--
-- Indexes for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  ADD PRIMARY KEY (`id_ekstrakurikuler`),
  ADD KEY `tb_ekstrakurikuler_FK_1` (`id_datasiswa`),
  ADD KEY `tb_ekstrakurikuler_FK_2` (`id_tahun`);

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
-- Indexes for table `tb_kkm`
--
ALTER TABLE `tb_kkm`
  ADD PRIMARY KEY (`id_kkm`),
  ADD KEY `tb_kkm_FK_1` (`id_mapel`),
  ADD KEY `tb_kkm_FK_2` (`id_tahun`);

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
  ADD KEY `tb_nilai_FK_1` (`id_kd`),
  ADD KEY `tb_nilai_FK` (`id_datasiswa`);

--
-- Indexes for table `tb_nilaiakhir`
--
ALTER TABLE `tb_nilaiakhir`
  ADD PRIMARY KEY (`id_nilaiakhir`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_datasiswa` (`id_datasiswa`),
  ADD KEY `id_kd` (`id_kd`),
  ADD KEY `id_tahun` (`id_tahun`);

--
-- Indexes for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  ADD PRIMARY KEY (`id_orangtua`);

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
-- Indexes for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD PRIMARY KEY (`id_prestasi`),
  ADD KEY `tb_prestasi_FK_1` (`id_datasiswa`),
  ADD KEY `tb_prestasi_FK_2` (`id_tahun`);

--
-- Indexes for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `id_orangtua` (`id_orangtua`) USING BTREE,
  ADD KEY `fk_id_kelas` (`id_kelas`);

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
-- AUTO_INCREMENT for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  MODIFY `id_absensi` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_admin`
--
ALTER TABLE `tb_admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tb_arsipnilai`
--
ALTER TABLE `tb_arsipnilai`
  MODIFY `id_arsip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=244;

--
-- AUTO_INCREMENT for table `tb_catatan_walikelas`
--
ALTER TABLE `tb_catatan_walikelas`
  MODIFY `id_catatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_datasiswa`
--
ALTER TABLE `tb_datasiswa`
  MODIFY `id_datasiswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=318;

--
-- AUTO_INCREMENT for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  MODIFY `id_ekstrakurikuler` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_guru`
--
ALTER TABLE `tb_guru`
  MODIFY `id_guru` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `tb_kd`
--
ALTER TABLE `tb_kd`
  MODIFY `id_kd` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=605;

--
-- AUTO_INCREMENT for table `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `tb_kkm`
--
ALTER TABLE `tb_kkm`
  MODIFY `id_kkm` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_matapelajaran`
--
ALTER TABLE `tb_matapelajaran`
  MODIFY `id_mapel` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=122;

--
-- AUTO_INCREMENT for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  MODIFY `id_nilai` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2454;

--
-- AUTO_INCREMENT for table `tb_nilaiakhir`
--
ALTER TABLE `tb_nilaiakhir`
  MODIFY `id_nilaiakhir` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_orangtua`
--
ALTER TABLE `tb_orangtua`
  MODIFY `id_orangtua` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=369;

--
-- AUTO_INCREMENT for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  MODIFY `id_pengajar` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  MODIFY `id_prestasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  MODIFY `id_siswa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=349;

--
-- AUTO_INCREMENT for table `tb_tahunajaran`
--
ALTER TABLE `tb_tahunajaran`
  MODIFY `id_tahun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67480;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_absensi`
--
ALTER TABLE `tb_absensi`
  ADD CONSTRAINT `tb_absensi_FK_1` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_absensi_FK_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_admin`
--
ALTER TABLE `tb_admin`
  ADD CONSTRAINT `tb_admin_FK` FOREIGN KEY (`id_user`) REFERENCES `tb_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_arsipnilai`
--
ALTER TABLE `tb_arsipnilai`
  ADD CONSTRAINT `tb_arsipnilai_FK` FOREIGN KEY (`id_kd`) REFERENCES `tb_kd` (`id_kd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_arsipnilai_FK_1` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_catatan_walikelas`
--
ALTER TABLE `tb_catatan_walikelas`
  ADD CONSTRAINT `tb_catatan_walikelas_FK_1` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_catatan_walikelas_FK_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_datasiswa`
--
ALTER TABLE `tb_datasiswa`
  ADD CONSTRAINT `tb_datasiswa_FK` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_datasiswa_FK_1` FOREIGN KEY (`id_siswa`) REFERENCES `tb_siswa` (`id_siswa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_ekstrakurikuler`
--
ALTER TABLE `tb_ekstrakurikuler`
  ADD CONSTRAINT `tb_ekstrakurikuler_FK_1` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_ekstrakurikuler_FK_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

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
-- Constraints for table `tb_kkm`
--
ALTER TABLE `tb_kkm`
  ADD CONSTRAINT `tb_kkm_FK_1` FOREIGN KEY (`id_mapel`) REFERENCES `tb_matapelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_kkm_FK_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilai`
--
ALTER TABLE `tb_nilai`
  ADD CONSTRAINT `tb_nilai_FK` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_nilai_FK_1` FOREIGN KEY (`id_kd`) REFERENCES `tb_kd` (`id_kd`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_nilaiakhir`
--
ALTER TABLE `tb_nilaiakhir`
  ADD CONSTRAINT `tb_nilaiakhir_ibfk_1` FOREIGN KEY (`id_nilai`) REFERENCES `tb_nilai` (`id_nilai`),
  ADD CONSTRAINT `tb_nilaiakhir_ibfk_2` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`),
  ADD CONSTRAINT `tb_nilaiakhir_ibfk_3` FOREIGN KEY (`id_kd`) REFERENCES `tb_kd` (`id_kd`),
  ADD CONSTRAINT `tb_nilaiakhir_ibfk_4` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`);

--
-- Constraints for table `tb_pengajar`
--
ALTER TABLE `tb_pengajar`
  ADD CONSTRAINT `tb_pengajar_FK` FOREIGN KEY (`id_guru`) REFERENCES `tb_guru` (`id_guru`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_2` FOREIGN KEY (`id_mapel`) REFERENCES `tb_matapelajaran` (`id_mapel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_pengajar_FK_3` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_prestasi`
--
ALTER TABLE `tb_prestasi`
  ADD CONSTRAINT `tb_prestasi_FK_1` FOREIGN KEY (`id_datasiswa`) REFERENCES `tb_datasiswa` (`id_datasiswa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_prestasi_FK_2` FOREIGN KEY (`id_tahun`) REFERENCES `tb_tahunajaran` (`id_tahun`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `fk_id_kelas` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_siswa_FK` FOREIGN KEY (`id_orangtua`) REFERENCES `tb_orangtua` (`id_orangtua`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
