<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-chalkboard-teacher mr-3"></i>Form Update Data Guru
        </div>
        <div class="card-body">
            <?= form_open_multipart() ?>
            <div class="form-group">
                <label for="nik">NIK</label>
                <input type="text" name="nik" id="nik" placeholder="Masukan NIK" class="form-control" value="<?php echo $guru['nik']; ?>">
                <?php echo form_error('nik', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control" value="<?php echo $guru['nama']; ?>">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <?php foreach ($jenis_kelamin as $jk) : ?>
                        <?php if ($jk == $guru['jenis_kelamin']) : ?>
                            <option value="<?php echo $jk ?>" selected><?php echo $jk ?></option>
                        <?php else : ?>
                            <option value="<?php echo $jk ?>"><?php echo $jk ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="tanggal_lahir">Tanggal Lahir</label>
                <input placeholder="Masukan Tanggal Lahir" type="date" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" value="<?php echo $guru['tanggal_lahir']; ?>">
                <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="no_hp">No Handphone</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="Masukan No Handphone" class="form-control" value="<?php echo $guru['no_hp']; ?>">
                <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Masukan Email" class="form-control" value="<?php echo $guru['email']; ?>">
                <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" class="form-control" value="<?php echo $guru['alamat']; ?>">
                <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" placeholder="Masukan NIP" class="form-control" value="<?php echo $guru['nip']; ?>">
                <?php echo form_error('nip', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="pendidikan">Pendidikan</label>
                <input type="text" name="pendidikan" id="pendidikan" placeholder="Masukan Pendidikan" class="form-control" value="<?php echo $guru['pendidikan']; ?>">
                <?php echo form_error('pendidikan', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="bidang_studi">Bidang Studi</label>
                <input type="text" name="bidang_studi" id="bidang_studi" placeholder="Masukan Bidang Studi" class="form-control" value="<?php echo $guru['bidang_studi']; ?>">
                <?php echo form_error('bidang_studi', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="tempat_tugas">Tempat Tugas</label>
                <input type="text" name="tempat_tugas" id="tempat_tugas" placeholder="Masukan Tempat Tugas" class="form-control" value="<?php echo $guru['tempat_tugas']; ?>">
                <?php echo form_error('tempat_tugas', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="tahun_mulai_tugas">Tahun Mulai Tugas</label>
                <input type="text" name="tahun_mulai_tugas" id="tahun_mulai_tugas" placeholder="Masukan Tahun Mulai Tugas" class="form-control" value="<?php echo $guru['tahun_mulai_tugas']; ?>">
                <?php echo form_error('tahun_mulai_tugas', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="niy">NIY</label>
                <input type="text" name="niy" id="niy" placeholder="Masukan NIY" class="form-control" value="<?php echo $guru['niy']; ?>">
                <?php echo form_error('niy', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="no_sertifikat_sertifikasi">No Sertifikat Sertifikasi</label>
                <input type="text" name="no_sertifikat_sertifikasi" id="no_sertifikat_sertifikasi" placeholder="Masukan No Sertifikat Sertifikasi" class="form-control" value="<?php echo $guru['no_sertifikat_sertifikasi']; ?>">
                <?php echo form_error('no_sertifikat_sertifikasi', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="no_peserta_sertifikasi">Nomor Peserta Sertifikasi</label>
                <input type="text" name="no_peserta_sertifikasi" id="no_peserta_sertifikasi" placeholder="Masukan Nomor Peserta Sertifikasi" class="form-control" value="<?php echo $guru['no_peserta_sertifikasi']; ?>">
                <?php echo form_error('no_peserta_sertifikasi', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="tahun_lulus_sertifikasi">Tahun Lulus Sertifikasi</label>
                <input type="text" name="tahun_lulus_sertifikasi" id="tahun_lulus_sertifikasi" placeholder="Masukan Tahun Lulus Sertifikasi" class="form-control" value="<?php echo $guru['tahun_lulus_sertifikasi']; ?>">
                <?php echo form_error('tahun_lulus_sertifikasi', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

</main>