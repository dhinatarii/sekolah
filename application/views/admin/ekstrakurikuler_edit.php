<div class="container-fluid">
    <div class="card mb-5">
        <div class="card-header">
            <i class="fas fa-futbol mr-3"></i>Form Edit Data Ekstrakurikuler
        </div>
        <div class="card-body">
            <?= form_open() ?>
            <div class="row">
                <div class="col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h5 class="card-title">Informasi Ekstrakurikuler</h5>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nama_ekskul">Nama Ekstrakurikuler</label>
                                <input type="text" name="nama_ekskul" id="nama_ekskul" placeholder="Masukan Nama Ekstrakurikuler" class="form-control" value="<?php echo $ekstrakurikuler['nama_ekskul']; ?>">
                                <?php echo form_error('nama_ekskul', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nilai_ekskul">Nilai Ekstrakurikuler</label>
                                <input type="number" name="nilai_ekskul" id="nilai_ekskul" placeholder="Masukan Nilai Ekstrakurikuler" class="form-control" value="<?php echo $ekstrakurikuler['nilai_ekskul']; ?>">
                                <?php echo form_error('nilai_ekskul', '<div class="text-danger small ml-3">', '</div>') ?>
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
</main>