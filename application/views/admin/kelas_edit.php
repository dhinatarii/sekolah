<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-chalkboard-teacher mr-3"></i>Form Update Data Kelas
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="kelas">Kelas</label>
                    <input type="text" name="kelas" id="kelas" placeholder="Masukan Kelas" class="form-control" value="<?php echo $kelas['kelas']; ?>">
                    <?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="wali_kelas">Wali Kelas</label>
                    <select class="form-control" id="wali_kelas" name="wali_kelas">
                        <?php foreach ($guru as $gr) : ?>
                            <?php if ($gr->nama == $kelas['wali_kelas']) : ?>
                                <option value="<?php echo $gr->nama ?>" selected><?php echo $gr->nama ?></option>
                            <?php else : ?>
                                <option value="<?php echo $gr->nama ?>"><?php echo $gr->nama ?></option>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </select>
                    <?php echo form_error('wali_kelas', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo base_url('admin/kelas') ?>" class="btn btn-secondary ml-1">Batal</a>
            </form>
        </div>
    </div>
</div>

</div>
<!-- End of Main Content -->

<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2020</span>
        </div>
    </div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>