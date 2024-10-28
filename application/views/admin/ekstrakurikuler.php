<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-futbol"></i> Data Ekstrakurikuler</h1>
    </div>
    <?php if ($this->session->flashdata('message')) : ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?php echo $this->session->flashdata('message'); ?>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    <?php endif; ?>
    <?php echo anchor('admin/ekstrakurikuler/input', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i> Tambah Data</button>') ?>

    <div class="card">
        <div class="card-body">
            <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-ekstrakurikuler">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Ekstrakurikuler</th>
                        <th>Nilai</th>
                        <th width="160px" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data akan diisi oleh DataTables -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    // DataTables
    $(document).ready(function() {
        $('#table-ekstrakurikuler').DataTable({
            "ajax": {
                "url": "URL_ENDPOINT", // Ganti dengan URL endpoint Anda
                "dataSrc": ""
            },
            "columns": [{
                    "data": "no"
                }, // Nomor urut
                {
                    "data": "nama_ekstrakurikuler"
                }, // Nama Ekstrakurikuler
                {
                    "data": "nilai"
                }, // Nilai Ekstrakurikuler
                { // Kolom Aksi
                    "data": null,
                    "render": function(data, type, row) {
                        return `
                            <button class="btn btn-sm btn-info" onclick="editData(${data.id})">Edit</button>
                            <button class="btn btn-sm btn-danger" onclick="confirmDelete(${data.id})">Hapus</button>
                        `;
                    },
                    "orderable": false,
                    "searchable": false
                }
            ],
            "error": function(xhr, error, code) {
                console.log(xhr, error, code);
            }
        });
    });

    function confirmDelete(id) {
        const href = '<?= site_url('admin/ekstrakurikuler/delete/') ?>' + id;

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "data ekstrakurikuler akan dihapus",
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

    function editData(id) {
        const href = '<?= base_url('admin/ekstrakurikuler/edit/') ?>' + id;
        document.location.href = href;
    }
</script>