<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-chalkboard-teacher mr-3"></i>Form Tambah Data Pengajar
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="guru">Nama Guru</label>
                    <select class="form-control" id="guru" name="guru">
                        <option value="">--Pilih Guru--</option>
                        <?php foreach ($guru as $gr) : ?>
                            <option value="<?php echo $gr->id_guru ?>"><?php echo $gr->nama ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('guru', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="mapel">Mata Pelajaran</label>
                    <select class="form-control" id="mapel" name="mapel">
                        <option value="">--Pilih Mata Pelajaran--</option>
                        <?php foreach ($mapel as $mp) : ?>
                            <option value="<?php echo $mp->id_mapel ?>"><?= $mp->nama_mapel ?> / <?= $mp->level ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('mapel', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <select class="form-control" id="kelas" name="kelas">
                        <option value="">--Pilih Mata Pelajaran--</option>
                        <?php foreach ($kelas as $kl) : ?>
                            <option value="<?php echo $kl->id_kelas ?>"><?= $kl->kelas ?></option>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="jabatan">Jabatan</label>
                    <select class="form-control" id="jabatan" name="jabatan">
                        <option value="">--Pilih Jabatan--</option>
                        <option value="Guru Kelas">Guru Kelas</option>
                        <option value="Guru Agama">Guru Agama</option>
                        <option value="Guru Penjas">Guru Penjas</option>
                    </select>
                    <?php echo form_error('jabatan', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="tahun">Tahun Ajaran</label>
                    <input type="text" name="tahun" id="tahun" placeholder="Masukan Tahun Ajaran" class="form-control" value="<?= $tahun['nama'] ?>" disabled>
                    <?php echo form_error('tahun', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->