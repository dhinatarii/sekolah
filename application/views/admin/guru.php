<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-chalkboard-teacher"></i> Data Guru</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/guru/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>
    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-bordered table-hover w-100 d-block d-md-table">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>Tanggal Lahir</th>
                        <th>No Handphone</th>
                        <th>Email</th>
                        <th>Alamat</th>
                        <th colspan="2">Aksi</th>
                    </tr>
                </thead>

                <?php
                $no = 1;
                foreach ($guru as $gr) : ?>
                    <tbody>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $gr->nip ?></td>
                            <td><?php echo $gr->nama ?></td>
                            <td><?php echo $gr->jenis_kelamin ?></td>
                            <td><?php echo $gr->tanggal_lahir ?></td>
                            <td><?php echo $gr->no_hp ?></td>
                            <td><?php echo $gr->email ?></td>
                            <td><?php echo $gr->alamat ?></td>
                            <td width="20px">
                                <?php echo anchor(
                                    'admin/guru/edit/' . $gr->id_guru,
                                    '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'
                                ) ?>
                            </td>
                            <td width="20px">
                                <a href="<?php echo base_url(); ?>admin/guru/delete/<?php echo $gr->id_guru ?>" class="btn btn-sm btn-danger btn-delete-guru">
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

</div>
<!-- End of Main Content -->


<script>
    // Hapus data guru
    $('.btn-delete-guru').on('click', function(event) {
        event.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data guru akan dihapus",
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