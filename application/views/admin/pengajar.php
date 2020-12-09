<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-chalkboard-teacher"></i> Data Pengajar</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/pengajar/input', '<button class="btn btn-sm btn-primary mb-3 mr-2"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-bordered table-hover w-100 d-block d-md-table">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Guru</th>
                        <th>Jabatan</th>
                        <th>Mata Pelajaran</th>
                        <th>Kelas</th>
                        <th>Tahun Ajaran</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>

                <?php
                $no = 1;
                foreach ($pengajar as $pe) : ?>
                    <tbody>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $pe->guru ?></td>
                            <td><?php echo $pe->jabatan ?></td>
                            <td><?php echo $pe->mapel ?> / <?php echo $pe->level ?></td>
                            <td><?php echo $pe->kelas ?></td>
                            <td><?php echo $pe->tahun ?></td>
                            <td width="40px">
                                <?php echo anchor(
                                    'admin/pengajar/edit/' . $pe->id_pengajar,
                                    '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'
                                ) ?>
                            </td>
                            <td width="40px">
                                <a href="<?php echo base_url(); ?>admin/pengajar/delete/<?php echo $pe->id_pengajar ?>" class="btn btn-sm btn-danger btn-delete-mapel">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<script>
    // Hapus data mapel
    $('.btn-delete-mapel').on('click', function(event) {
        event.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data mata pelajaran akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus Data',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.location.href = href;
            }
        });
    });
</script>