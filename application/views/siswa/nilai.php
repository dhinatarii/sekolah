<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"> <i class="fas fa-sticky-note"></i> Nilai</h1>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="form-inline">
                <select class="form-control mb-2 mr-2" id="thn_ajaran" name="thn_ajaran">
                    <option value="">--Pilih Tahun Ajaran--</option>
                    <?php foreach ($tahun as $th) : ?>
                        <option value="<?php echo $th->id_tahun ?>"><?= $th->nama ?> - Semester <?= $th->semester ?></option>
                    <?php endforeach; ?>
                </select>
                <button onclick="lihatNilai()" class="btn btn-primary mb-2 mr-2"><i class="fas fa-search"></i> Lihat</button>
            </div>
            <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-guru">
                <thead>
                    <tr>
                        <th class="text-center" width="30px">No</th>
                        <th>Mata Pelajaran</th>
                        <th>PTS</th>
                        <th>PAS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($nilai as $key => $value) : ?>
                        <tr>
                            <td class="text-center"><?= ++$key ?></td>
                            <td><?= $value->nama_mapel ?></td>
                            <td><?= $value->pts ?></td>
                            <td><?= $value->pas ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="data-all-nilai"></div>
</div>
</main>