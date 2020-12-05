<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-users"></i> Data user <?= $level ?></h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php if ($level == 'admin') echo anchor('admin/user/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-bordered table-hover w-100 d-block d-md-table">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>Username / NISN / Email</th>
                        <th>Level</th>
                        <th class="text-center">Status</th>
                        <?= ($level == 'admin') ? '<th class="text-center" colspan="3">Aksi</th>' : '<th class="text-center" colspan="2">Aksi</th>'; ?>
                    </tr>
                </thead>

                <?php
                $no = 1;
                foreach ($users as $user) : ?>
                    <tbody>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $user->username ?></td>
                            <td><?php echo $user->level ?></td>
                            <td width="160px" class="text-center"><?= ($user->status == 1) ? '<strong class="badge badge-success">aktif</strong>' : '<strong class="badge badge-danger">tidak aktif</strong>'; ?></td>
                            <td width="40px">
                                <?php echo anchor(
                                    'admin/user/edit?level=' . $level . '&id=' . $user->id_user,
                                    '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'
                                ) ?>
                            </td>
                            <td width="40px">
                                <?php echo anchor(
                                    'admin/user/change_password?level=' . $level . '&id=' . $user->id_user,
                                    '<div class="btn btn-sm btn-success"><i class="fa fa-lock"></i></div>'
                                ) ?>
                            </td>
                            <?php if ($level == 'admin') : ?>
                                <td width="40px">
                                    <a href="<?php echo base_url(); ?>admin/user/delete/<?= $level . '/' . $user->id_user ?>" class="btn btn-sm btn-danger btn-delete-user">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    </tbody>
                <?php endforeach ?>
            </table>
        </div>
    </div>
</div>

<script>
    // Hapus data user
    $('.btn-delete-user').on('click', function(event) {
        event.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data user akan dihapus",
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