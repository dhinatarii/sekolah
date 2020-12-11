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
            <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-user">
                <thead>
                    <tr>
                        <th width="20px">No</th>
                        <th>Nama</th>
                        <th>Username / NIS / Email</th>
                        <th>Level</th>
                        <th width="120px" class="text-center">Status</th>
                        <th width="120px">Aksi</th>
                        <!-- <?= ($level == 'admin') ? '<th class="text-center" colspan="3">Aksi</th>' : '<th class="text-center" colspan="2">Aksi</th>'; ?> -->
                    </tr>
                </thead>

                <tbody>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    //onclick hapus data user
    function confirmDelete(id) {
        const href = '<?= site_url('admin/user/delete/' . $level . '/') ?>' + id;
        console.log(href);

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
    }

    //datatables
    $(document).ready(function() {
        $('#table-user').DataTable({
            "serverSide": true,
            "ajax": {
                "url": "<?= site_url('admin/user/get_result_user/' . $id) ?>",
                "type": "POST"
            },
            "columnDefs": [{
                    "targets": [0, 3, -1, -2],
                    "className": 'text-center'
                },
                {
                    "targets": [-1],
                    "orderable": false
                }
            ]
        });
    });
</script>