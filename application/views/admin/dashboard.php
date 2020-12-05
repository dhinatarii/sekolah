<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-tachometer-alt"></i> Dashboard</h1>
    </div>

    <div class="alert alert-success" role="alert">
        <h4 class="alert-heading">Sealamt Datang!</h4>
        <p>Selamat Datang <strong><?php echo $username; ?></strong> di Sistem Informasi Pengolahan Data Nilai Siswa SD Muhammadiyah Trini, Anda Login Sebagai <strong><?php echo $level; ?></strong></p>
        <hr>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#controlpanelModal">
            <i class="fas fa-cog"></i> Control Panel
        </button>
    </div>

    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
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
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="controlpanelModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-cog"></i> Control Panel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-user-graduate"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Siswa</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-chalkboard-teacher"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Guru</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-book-reader"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Mata Pelajaran</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-calendar-alt"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Tahun Akademik</p>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-sort-numeric-down"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Input Nilai</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-user-tie"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Wali Kelas</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-print"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Cetak Nilai</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-bullhorn"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Informasi Sekolah</p>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-info-circle"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Tentang Sekolah</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-envelope"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Kontak</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-users"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">User</p>
                            </a>
                        </div>
                        <div class="col-md-3 text-info text-center">
                            <i class="fas fa-4x fa-bars"></i>
                            <a href="<?php echo base_url() ?>">
                                <p class="nav-link small text-info">Menu</p>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->