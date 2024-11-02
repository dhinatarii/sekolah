<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-users mr-3"></i>Form update data <?= $level ?>
        </div>
        <div class="card-body">
            <?= form_open_multipart() ?>
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" placeholder="Masukan Username" class="form-control" value="<?= $admin['username']; ?>">
                <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="">Status</label>
                <select class="form-control" id="status" name="status">
                    <?php foreach ($status as $st) : ?>
                        <?php if ($st == $admin['status']) : ?>
                            <option value="<?php echo $st ?>" selected><?= ($st == '0') ? 'Tidak Aktif' : 'Aktif'; ?></option>
                        <?php else : ?>
                            <option value="<?php echo $st ?>"><?= ($st == '0') ? 'Tidak Aktif' : 'Aktif'; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('status', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" class="form-control" value="<?= $admin['nama'] ?>">
                <?php echo form_error('nama', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="">Jenis Kelamin</label>
                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    <?php foreach ($jenis_kelamin as $jk) : ?>
                        <?php if ($jk == $admin['jenis_kelamin']) : ?>
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
                <input placeholder="Masukan Tanggal Lahir" type="date" class="form-control datepicker" name="tanggal_lahir" id="tanggal_lahir" value="<?= $admin['tanggal_lahir'] ?>">
                <?php echo form_error('tanggal_lahir', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="no_hp">No Handphone</label>
                <input type="text" name="no_hp" id="no_hp" placeholder="Masukan No Handphone" class="form-control" value="<?= $admin['no_hp'] ?>">
                <?php echo form_error('no_hp', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" id="email" placeholder="Masukan Email" class="form-control" value="<?= $admin['email'] ?>">
                <?php echo form_error('email', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            <?= form_close() ?>
        </div>
    </div>
</div>

</main>