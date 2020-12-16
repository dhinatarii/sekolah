<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-circle"></i> Profile</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-3" class="text-center">
                    <h6 class="text-dark font-weight-bold">Foto Admin</h6>
                    <div id="photo" class="mb-3">
                        <img src="<?= base_url('assets/photos/' . $admin['photo']) ?>" alt="photo <?= $admin['nama'] ?>" style="width: 200px; height: 300px; border-radius: 15px;">
                    </div>
                </div>
                <div class="col-sm-9">
                    <h6 class="text-dark font-weight-bold">Data Diri</h6>
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless no-margin table-striped">
                                <tr>
                                    <th>NIP</th>
                                    <td><span id="nip"><?= $admin['nip'] ?></span></td>
                                </tr>
                                <tr>
                                    <th>Nama</th>
                                    <td><span id="nama"><?= $admin['nama'] ?></span></td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td><span id="jenis-kelamin"><?= $admin['jenis_kelamin'] ?></span></td>
                                </tr>
                                <tr>
                                    <th>Tanggal Lahir</th>
                                    <td><span id="tanggal-lahir"><?= $admin['tanggal_lahir'] ?></span></td>
                                </tr>
                                <tr>
                                    <th>No. Handphone</th>
                                    <td><span id="no-hp"><?= $admin['no_hp'] ?></span></td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td><span id="email"><?= $admin['email'] ?></span></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td><span id="alamat"><?= $admin['alamat'] ?></span></td>
                                </tr>
                            </table>

                            <?= anchor('admin/profile/password?id_user=' . $admin['id_user'], '<div class="btn btn-sm btn-primary  mr-1 ml-1 mb-1"><i class="fa fa-lock"></i> Ganti Password</div>') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>