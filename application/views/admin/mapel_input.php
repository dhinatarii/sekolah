<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-book-open mr-3"></i>Form Tambah Data Mata Pelajaran
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="nama_mapel">Nama Mata Pelajaran</label>
                    <input type="text" name="nama_mapel" id="nama_mapel" placeholder="Masukan Nama Mata Pelajaran" class="form-control">
                    <?php echo form_error('nama_mapel', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="level">Level</label>
                    <select class="form-control" id="level" name="level">
                        <option value="">--Pilih Level--</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                    </select>
                    <?php echo form_error('level', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary ml-1">Reset</button>
            </form>
        </div>
    </div>
</div>