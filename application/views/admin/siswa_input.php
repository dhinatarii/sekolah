<div class="container-fluid">

    <?php if ($this->session->flashdata('message_error')) : ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message_error'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>

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
                                <input type="text" name="nik" id="nik" placeholder="Masukan NIK" class="form-control">
                                <?php echo form_error('nik', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input type="text" name="nisn" id="nisn" placeholder="Masukan NISN" class="form-control">
                                <?php echo form_error('nisn', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control">
                                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input placeholder="Masukan Tanggal Lahir" type="date" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir">
                                <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" class="form-control">
                                <?php echo form_error('tempat_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-laki">Laki-laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                                <?php echo form_error('jenis_kelamin', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">--Pilih Status Siswa--</option>
                                    <option value="Aktif">Aktif</option>
                                    <option value="Nonaktif">Nonaktif</option>
                                </select>
                                <?php echo form_error('status', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" class="form-control">
                                <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="no_kip_pip">No KIP/PIP</label>
                                <input type="text" name="no_kip_pip" id="no_kip_pip" placeholder="Masukan No KIP/PIP" class="form-control">
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
                                <input type="text" name="nama_ibu" id="nama_ibu" placeholder="Masukan Nama Ibu" class="form-control">
                                <?php echo form_error('nama_ibu', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" name="nama_ayah" id="nama_ayah" placeholder="Masukan Nama Ayah" class="form-control">
                                <?php echo form_error('nama_ayah', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_wali">Nama Wali</label>
                                <input type="text" name="nama_wali" id="nama_wali" placeholder="Masukan Nama Wali" class="form-control">
                                <?php echo form_error('nama_wali', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Alamat</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <input type="text" name="dusun" id="dusun" placeholder="Masukan Nama Dusun" class="form-control">
                                <?php echo form_error('dusun', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="desa">Desa</label>
                                <input type="text" name="desa" id="desa" placeholder="Masukan Nama Desa" class="form-control">
                                <?php echo form_error('desa', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input type="text" name="kecamatan" id="kecamatan" placeholder="Masukan Kecamatan" class="form-control">
                                <?php echo form_error('kecamatan', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="kabupaten">Kabupaten</label>
                                <input type="text" name="kabupaten" id="kabupaten" placeholder="Masukan Kabupaten" class="form-control">
                                <?php echo form_error('kabupaten', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>
                    </div>
                </div> -->
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