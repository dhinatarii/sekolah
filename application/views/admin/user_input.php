<div class="container-fluid">

    <div class="card">
        <div class="card-header">
            <i class="fas fa-users mr-3"></i>Form Tambah Data Admin
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" placeholder="Masukan Username" class="form-control">
                    <?php echo form_error('username', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" placeholder="Masukan Password" class="form-control">
                    <?php echo form_error('password', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <div class="form-group">
                    <label for="konfirmasi">Konfirmasi Password</label>
                    <input type="password" name="konfirmasi" id="konfirmasi" placeholder="Masukan Konfirmasi Password" class="form-control">
                    <?php echo form_error('konfirmasi', '<div class="text-danger small ml-3">', '</div>') ?>
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="<?php echo $this->agent->referrer(); ?>" class="btn btn-secondary ml-1">Batal</a>
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