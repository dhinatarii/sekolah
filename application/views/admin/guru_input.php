<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-chalkboard-teacher mr-3"></i>Form Tambah Data Guru
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" id="nip" placeholder="Masukan NIP" class="form-control">
                    <?php echo form_error('nip', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control">
                    <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="no_hp">No Handphone</label>
                    <input type="text" name="no_hp" id="no_hp" placeholder="Masukan No Handphone" class="form-control">
                    <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" placeholder="Masukan Email" class="form-control">
                    <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" placeholder="Masukan Alamat" class="form-control">
                    <?php echo form_error('alamat', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('admin/guru') ?>" class="btn btn-secondary ml-1">Batal</a>
            </form>
        </div>
    </div>
</div>