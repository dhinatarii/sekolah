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
            <i class="fas fa-futbol mr-3"></i>Form Edit Data Ekstrakurikuler
        </div>
        <div class="card-body">
            <?= form_open_multipart() ?>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Informasi Ekstrakurikuler</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id_siswa">ID Siswa</label>
                                <input type="text" name="id_siswa" id="id_siswa" placeholder="Masukan ID Siswa" class="form-control" value="<?php echo $ekstrakurikuler['id_siswa']; ?>">
                                <?php echo form_error('id_siswa', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" id="nama_siswa" placeholder="Masukan Nama Siswa" class="form-control" value="<?php echo $ekstrakurikuler['nama_siswa']; ?>">
                                <?php echo form_error('nama_siswa', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nilai_pramuka">Nilai Pramuka</label>
                                <input type="text" name="nilai_pramuka" id="nilai_pramuka" placeholder="Masukan Nilai Pramuka" class="form-control" value="<?php echo $ekstrakurikuler['nilai_pramuka']; ?>">
                                <?php echo form_error('nilai_pramuka', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nilai_drumband">Nilai Drumband</label>
                                <input type="text" name="nilai_drumband" id="nilai_drumband" placeholder="Masukan Nilai Drumband" class="form-control" value="<?php echo $ekstrakurikuler['nilai_drumband']; ?>">
                                <?php echo form_error('nilai_drumband', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nilai_tapak_suci">Nilai Tapak Suci</label>
                                <input type="text" name="nilai_tapak_suci" id="nilai_tapak_suci" placeholder="Masukan Nilai Tapak Suci" class="form-control" value="<?php echo $ekstrakurikuler['nilai_tapak_suci']; ?>">
                                <?php echo form_error('nilai_tapak_suci', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nilai_kaligrafi">Nilai Kaligrafi</label>
                                <input type="text" name="nilai_kaligrafi" id="nilai_kaligrafi" placeholder="Masukan Nilai Kaligrafi" class="form-control" value="<?php echo $ekstrakurikuler['nilai_kaligrafi']; ?>">
                                <?php echo form_error('nilai_kaligrafi', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            <?= form_close() ?>
        </div>
    </div>
</div>