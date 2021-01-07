-- delete_user_siswa
CREATE TRIGGER `delete_user_siswa` AFTER DELETE ON `tb_siswa`
FOR EACH ROW DELETE FROM `tb_user` WHERE `tb_user`.`username` = OLD.nis

-- delete_orangtua_and_alamat
CREATE TRIGGER `delete_orangtua_and_alamat` AFTER DELETE ON `tb_siswa`
FOR EACH ROW BEGIN
	DECLARE idAlamat int(10);
    SELECT id_alamat FROM tb_orangtua WHERE id_orangtua = OLD.id_orangtua INTO idAlamat;
	DELETE FROM `tb_orangtua` WHERE `tb_orangtua`.`id_orangtua` = OLD.id_orangtua;
    DELETE FROM `tb_alamat` WHERE `tb_alamat`.`id_alamat` = idAlamat;
END