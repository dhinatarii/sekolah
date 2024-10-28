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
            <i class="fas fa-futbol mr-3"></i>Form Tambah Data Ekstrakurikuler
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
                                <label for="kode_ekskul">Kode Ekstrakurikuler</label>
                                <input type="text" name="kode_ekskul" id="kode_ekskul" placeholder="Masukan Kode Ekstrakurikuler" class="form-control">
                                <?php echo form_error('kode_ekskul', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nama_ekskul">Nama Ekstrakurikuler</label>
                                <input type="text" name="nama_ekskul" id="nama_ekskul" placeholder="Masukan Nama Ekstrakurikuler" class="form-control">
                                <?php echo form_error('nama_ekskul', '<div class="text-danger small ml-3">', '</div>') ?>
                            </div>
                            <div class="form-group">
                                <label for="nilai">Nilai Ekstrakurikuler</label>
                                <input type="number" name="nilai" id="nilai" placeholder="Masukan Nilai Ekstrakurikuler" class="form-control">
                                <?php echo form_error('nilai', '<div class="text-danger small ml-3">', '</div>') ?>
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