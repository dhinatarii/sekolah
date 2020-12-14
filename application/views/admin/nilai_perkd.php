<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-sort-numeric-down"></i> Detail Nilai <?= $mapel['nama_mapel'] . ' / Kelas ' . $kelas['kelas'] ?></h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="form-group">
                <label for="komp_dasar">Kompetensi Dasar</label>
                <select class="form-control" id="komp_dasar" name="komp_dasar">
                    <option value="">--Pilih Kompetensi Dasar--</option>
                    <?php foreach ($komp_dasar as $kd) : ?>
                        <option value="<?php echo $kd->id_kd ?>"><?= $kd->nama_kd ?></option>
                    <?php endforeach; ?>
                </select>
                <?php echo form_error('komp_dasar', '<div class="text-danger small ml-3">', '</div>') ?>
            </div>
        </div>
    </div>
    <div id="nilai-detail">
    </div>
</div>

</main>

<script>
    $(document).ready(function() {
        $('#komp_dasar').change(function() {
            const idKd = $(this).val();
            const idMapel = '<?= $id_mapel ?>';
            const idKelas = '<?= $id_kelas ?>';
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/nilai/data_nilai_perkd') ?>',
                data: {
                    id_kelas: idKelas,
                    id_mapel: idMapel,
                    id_kd: idKd
                },
                success: function(response) {
                    $('#nilai-detail').html(response);
                },
                error: function(response) {
                    $('#nilai-detail').html(response);
                }
            });
        })
    });
</script>