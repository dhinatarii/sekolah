<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-tachometer-alt"></i> Dashboard</h1>
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sealamt Datang!</h4>
        <p>Selamat Datang <strong><?php echo $nama; ?></strong> di Sistem Informasi Pengolahan Data Nilai Siswa SD Muhammadiyah Trini, Anda Login Sebagai <strong><?php echo $level; ?></strong></p>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#controlpanelModal">
            <i class="fas fa-landmark"></i> Menu
        </button>
    </div>

    <div class="row">
        <!-- Tahun Ajaran -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tahun Ajaran</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $tahun['nama'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wali kelas -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Jabatan Mengajar</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengajar['jabatan'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Jumlah Kelas</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $pengajar['jumlah_kelas'] ?></div>
                        </div>
                        <div class="col-auto ">
                            <i class="fas fa-chalkboard fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Siswa</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $siswa['jumlah_siswa'] ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</main>