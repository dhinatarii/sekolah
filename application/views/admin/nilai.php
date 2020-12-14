<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-sort-numeric-down"></i> Data Nilai</h1>
    </div>
    <div class="row">

        <div class="col-sm-3">
            <div class="card">
                <div class="card-header bg-behance">
                    <h6 class="text-white">Masukkan Data Yang Diperlukan</h6>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <select class="form-control" id="kelas" name="kelas">
                            <option value="">--Pilih Kelas--</option>
                            <?php foreach ($kelas as $kl) : ?>
                                <option value="<?php echo $kl->id_kelas ?>"><?= $kl->kelas ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?php echo form_error('kelas', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <div class="form-group">
                        <label for="mapel">Mata Pelajaran</label>
                        <select class="form-control" id="mapel" name="mapel">
                            <option value="">--Pilih Mata Pelajaran--</option>
                        </select>
                        <?php echo form_error('mapel', '<div class="text-danger small ml-3">', '</div>') ?>
                    </div>
                    <button onclick="searchNilai()" class="btn btn-primary">Cari</button>
                </div>
            </div>
        </div>
        <div class="col-sm-9" id="table-result">

        </div>
    </div>
</div>

</main>

<script>
    $(document).ready(function() {
        $('#kelas').change(function() {
            const kelas = $(this).val();
            $.ajax({
                type: 'POST',
                url: '<?= base_url('admin/nilai/get_mapel') ?>',
                data: 'id_kelas=' + kelas,
                success: function(response) {
                    $('#mapel').html(response);
                }
            });
        })
    });

    function searchNilai() {
        const kelas = $('#kelas').val()
        const mapel = $('#mapel').val()
        const href = '<?= base_url('admin/nilai/kd?id_kelas=') ?>' + kelas + '&id_mapel=' + mapel;
        const htmlResult = `
            <div class="card">
                <div class="card-header bg-behance">
                    <h6 class="text-white"> Matemtaik / Kelas 1A</h6>
                </div>
                <div class="card-body">
                    <a href="${href}" class="btn btn-primary mb-3">Cek Selengkapnya</i></a>
                    <h4 class="text-center">Data Nilai Belum Tersedia</h4>
                </div>
            </div>`
        console.log(kelas + "------" + mapel);
        if (kelas !== '' && mapel !== '') {
            $('#table-result').html(htmlResult);
        }
    }

    // $(document).ready(function() {
    //     $(document).on('click', '#detail-nilai', function() {

    //     });
    // });

    // function detailNilai() {
    //     const idKelas = $(this).data('idkelas');
    //     const idMapel = $(this).data('idmapel');
    //     console.log(idKelas + idMapel);
    // }
</script>