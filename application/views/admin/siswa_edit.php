<div class="container-fluid">
    <div class="card mb-5">
        <div class="card-header">
            <i class="fas fa-user-graduate mr-3"></i>Form Tambah Data Siswa
        </div>
        <div class="card-body">
            <?= form_open_multipart() ?>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Data Diri</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="text" name="nik" id="nik" placeholder="Masukan NIK" class="form-control" value="<?php echo $siswa['nik']; ?>">
                                <?php echo form_error('nik', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" placeholder="Masukan NISN" class="form-control" value="<?php echo $siswa['nisn']; ?>">
                                <?php echo form_error('nisn', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control" value="<?php echo $siswa['nama']; ?>">
                                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" placeholder="Masukan Tanggal Lahir" class="form-control" value="<?php echo $siswa['tanggal_lahir']; ?>">
                                <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" class="form-control" value="<?php echo $siswa['alamat']; ?>">
                                <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <?php foreach ($jenis_kelamin as $jk) : ?>
                                        <?php if ($jk == $siswa['jenis_kelamin']) : ?>
                                            <option value="<?php echo $jk ?>" selected><?php echo $jk ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $jk ?>"><?php echo $jk ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <?php foreach ($status as $sts) : ?>
                                        <?php if ($sts == $siswa['status']) : ?>
                                            <option value="<?php echo $sts ?>" selected><?php echo $sts ?></option>
                                        <?php else : ?>
                                            <option value="<?php echo $sts ?>"><?php echo $sts ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                                <?php echo form_error('status', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" class="form-control" value="<?php echo $siswa['alamat']; ?>">
                                <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="no_kip_pip">No KIP/PIP</label>
                                <input type="text" name="no_kip_pip" id="no_kip_pip" placeholder="Masukan No KIP/PIP" class="form-control" value="<?php echo $siswa['nik']; ?>">
                                <?php echo form_error('no_kip_pip', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Orang Tua</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" name="nama_ibu" id="nama_ibu" placeholder="Masukan Nama Ibu" class="form-control" value="<?php echo $siswa['nama_ibu']; ?>">
                                <?php echo form_error('nama_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" name="nama_ayah" id="nama_ayah" placeholder="Masukan Nama Ayah" class="form-control" value="<?php echo $siswa['nama_ayah']; ?>">
                                <?php echo form_error('nama_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_wali">Nama Wali</label>
                                <input type="text" name="nama_wali" id="nama_wali" placeholder="Masukan Nama Wali" class="form-control" value="<?php echo $siswa['nama_ayah']; ?>">
                                <?php echo form_error('nama_wali', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

</main>