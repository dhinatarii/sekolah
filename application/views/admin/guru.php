<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-chalkboard-teacher"></i> Data Guru</h1>
    </div>
    <?php echo $this->session->flashdata('message'); ?>
    <?php echo anchor('admin/guru/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"> Tambah Data</i></button>') ?>

    <table class="table table-responsive table-hover w-100 d-block d-md-table">
        <thead class="thead-light">
            <tr>
                <th>No</th>
                <th>NIP</th>
                <th>Nama</th>
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
                        <?php echo anchor(
                            'admin/guru/delete/' . $gr->id_guru,
                            '<div class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></div>'
                        ) ?>
                    </td>
                </tr>
            </tbody>
        <?php endforeach ?>
    </table>