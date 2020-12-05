<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user-graduate"></i> Data Siswa</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/siswa/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive table-bordered table-hover w-100 d-block d-md-table">
                <thead class="thead-light">
                    <tr>
                        <th>No</th>
                        <th>NIS</th>
                        <th>NISN</th>
                        <th>Nama</th>
                        <th>Tanggal Lahir</th>
                        <th>Agama</th>
                        <th>Jenis Kelamin</th>
                        <th>Kelas</th>
                        <th colspan="3">Aksi</th>
                    </tr>
                </thead>

                <?php
                $no = 1;
                foreach ($siswa as $sw) : ?>
                    <tbody>
                        <tr>
                            <td width="20px"><?php echo $no++ ?></td>
                            <td><?php echo $sw->nis ?></td>
                            <td><?php echo $sw->nisn ?></td>
                            <td><?php echo $sw->nama ?></td>
                            <td><?php echo $sw->tanggal_lahir ?></td>
                            <td><?php echo $sw->agama ?></td>
                            <td><?php echo $sw->jenis_kelamin ?></td>
                            <td></td>
                            <td width="40px">
                                <div id="set_detailModal" class="btn btn-sm btn-success" data-toggle="modal" data-target="#detailModal" data-idsiswa="<?= $sw->id_siswa ?>" data-siswa="<?= $sw->nama ?>" data-namaibu="<?= $sw->nama_ibu ?>" data-pendidikanibu="<?= $sw->pendidikan_ibu ?>" data-perkejaanibu="<?= $sw->pekerjaan_ibu ?>" data-namaayah="<?= $sw->nama_ayah ?>" data-pendidikanayah="<?= $sw->pendidikan_ayah ?>" data-pekerjaanayah="<?= $sw->pekerjaan_ayah ?>" data-nohp="<?= $sw->no_hp ?>" data-dusun="<?= $sw->dusun ?>" data-desa="<?= $sw->desa ?>" data-kecamatan="<?= $sw->kecamatan ?>" data-kabupaten="<?= $sw->kabupaten ?>">
                                    <i class="fa fa-eye"></i></div>
                            </td>
                            <td width="40px">
                                <?php echo anchor(
                                    'admin/siswa/edit/' . $sw->id_siswa,
                                    '<div class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></div>'
                                ) ?>
                            </td>
                            <td width="40px">
                                <a href="<?php echo base_url(); ?>admin/siswa/delete/<?php echo $sw->id_siswa ?>" class="btn btn-sm btn-danger btn-delete-siswa">
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

<!-- Detal Modal -->
<div class="modal fade detailModal" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detalModal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-dark font-weight-bold">Siswa : <span id="namasiswa"></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm">
                            <h6 class="text-dark font-weight-bold">Orang Tua</h6>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-borderless no-margin">
                                        <tr>
                                            <th>Nama Ibu</th>
                                            <td><span id="namaibu"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Ibu</th>
                                            <td><span id="pendibu"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Ibu</th>
                                            <td><span id="pekibu"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Nama Ayah</th>
                                            <td><span id="namaayah"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Pendidikan Ayah</th>
                                            <td><span id="pendayah"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Pekerjaan Ayah</th>
                                            <td><span id="pekayah"></span></td>
                                        </tr>
                                        <tr>
                                            <th>No. Handphone</th>
                                            <td><span id="nohp"></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm">
                            <h6 class="text-dark font-weight-bold">Alamat</h6>
                            <div class="card">
                                <div class="card-body">
                                    <table class="table table-borderless no-margin">
                                        <tr>
                                            <th>Dusun</th>
                                            <td><span id="dusun"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Desa</th>
                                            <td><span id="desa"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Kecamatan</th>
                                            <td><span id="kecamatan"></span></td>
                                        </tr>
                                        <tr>
                                            <th>Kabupaten</th>
                                            <td><span id="kabupaten"></span></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" id="edit-siswa">Edit</a>
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
    // Hapus data siswa
    $('.btn-delete-siswa').on('click', function(event) {
        event.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data siswa akan dihapus",
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

    // Detail modal siswa
    $(document).ready(function() {
        $(document).on('click', '#set_detailModal', function() {
            const idsiswa = $(this).data('idsiswa');
            const namaSiswa = $(this).data('siswa');
            const namaIbu = $(this).data('namaibu');
            const pendIbu = $(this).data('pendidikanibu');
            const pekIbu = $(this).data('perkejaanibu');
            const namaAyah = $(this).data('namaayah');
            const pendAyah = $(this).data('pendidikanayah');
            const pekAyah = $(this).data('pekerjaanayah');
            const noHp = $(this).data('nohp');
            const dusun = $(this).data('dusun');
            const desa = $(this).data('desa');
            const kecamatan = $(this).data('kecamatan');
            const kabupaten = $(this).data('kabupaten');
            const href = '<?php echo base_url('admin/siswa/edit/') ?>' + idsiswa;

            $('#namasiswa').text(namaSiswa);
            $('#namaibu').text(namaIbu);
            $('#pendibu').text(pendIbu);
            $('#pekibu').text(pekIbu);
            $('#namaayah').text(namaAyah);
            $('#pendayah').text(pendAyah);
            $('#pekayah').text(pekAyah);
            $('#nohp').text(noHp);
            $('#dusun').text(dusun);
            $('#desa').text(desa);
            $('#kecamatan').text(kecamatan);
            $('#kabupaten').text(kabupaten);

            $(document).on('click', '#edit-siswa', function() {
                document.location.href = href;
            });

        });
    });
</script>