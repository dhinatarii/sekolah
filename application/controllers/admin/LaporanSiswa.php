<?php
class LaporanSiswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }

        if ($this->session->userdata['level'] != 'admin') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }
    }

    public function index()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'tahun'     => $this->Tahun_model->get_data(),
            'menu'      => 'laporan_siswa',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Laporan Daftar Siswa',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/laporan_siswa', $data);
        $this->load->view('templates/footer');
    }

    public function get_kelas()
    {
        $id_tahun   = $this->input->post('id_tahun', TRUE);
        $data       =  $this->Pengajar_model->get_data_with_tahun($id_tahun);
        if ($data->num_rows() > 0) {
            echo '<option value="">--Pilih Kelas--</option>';
            foreach ($data->result() as $pe) {
                echo "<option value=$pe->id_kelas>$pe->kelas</option>";
            }
        } else {
            echo '<option value="">--Tidak Tersedia--</option>';
        }
    }

    public function data_all_siswa()
    {
        $id_tahun   = $this->input->post('id_tahun', TRUE);
        $id_kelas   = $this->input->post('id_kelas', TRUE);
        $tahun      = $this->Tahun_model->get_detail_data($id_tahun);
        $kelas      = $this->Kelas_model->get_detail_data($id_kelas);
        $html       = '';

        $cek_data   = $this->Laporan_model->get_numrow_siswa($id_tahun, $id_kelas);
        if ($cek_data > 0) {
            $html       = $html . '
                <div class="card">
                    <div class="card-body">
                        <a href="' . base_url('admin/laporansiswa/pdf_laporan?q=alldata&tahun=' . $id_tahun . '&kelas=' . $id_kelas) . '" class="btn btn-info mb-2"><i class="fas fa-print"></i> Print</a>
                        <div>
                            <h1 class="h1 text-center">LAPORAN DAFTAR SISWA</h1>
                            <h2 class="text-center">SD MUHAMMADIYAH TRINI</h2>
                            <h3 class="text-center">Tahun Ajaran ' . $tahun['nama'] . '</h3>
                            <h4 class="text-center">Kelas ' . $kelas['kelas'] . '</h4>
                        </div>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-laporansiswa">
                            <thead>
                                <tr class="text-center">
                                    <th width="10px" rowspan="2" style="vertical-align : middle;text-align:center;">No</th>
                                    <th width="10px" rowspan="2" style="vertical-align : middle;text-align:center;">NIS</th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;">NISN</th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;">Nama</th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;">Jenis Kelamin</th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;">Tanggal Lahir</th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;">Agama</th>
                                    <th colspan="4">Alamat</th>
                                    <th rowspan="2" style="vertical-align : middle;text-align:center;" class="text-center" width="80px">Aksi</th>
                                </tr>
                                <tr class="text-center">
                                    <th>Dusun</th>
                                    <th>Desa</th>
                                    <th>Kecamatan</th>
                                    <th>Kabupaten</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#table-laporansiswa").DataTable({
                            "serverSide": true,
                            "ajax": {
                                "url": "' . base_url('admin/laporansiswa/get_result_siswa') . '",
                                "type": "POST",
                                "data":{
                                    id_tahun: ' . $id_tahun . ',
                                    id_kelas: ' . $id_kelas . '
                                }
                            },
                            "columnDefs": [{
                                    "targets": [0, 1, 2,-1],
                                    "className": "text-center"
                                },
                                {
                                    "targets": [-1],
                                    "orderable": false
                                }
                            ]
                        });
                    });
                </script>
            ';
        } else {
            $html = $html . '<div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Laporan Daftar Siswa Tidak Tersedia, Silahkan Masukan Data Yang Diperlukan</h6>
                                </div>
                            </div>';
        }

        echo $html;
    }

    function get_result_siswa()
    {
        $id_tahun = $this->input->post('id_tahun', TRUE);
        $id_kelas = $this->input->post('id_kelas', TRUE);

        $list = $this->Laporan_model->get_datatables_siswa($id_tahun, $id_kelas);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nis;
            $row[] = $item->nisn;
            $row[] = $item->nama;
            $row[] = $item->jenis_kelamin;
            $row[] = $item->tanggal_lahir;
            $row[] = $item->agama;
            $row[] = $item->dusun;
            $row[] = $item->desa;
            $row[] = $item->kecamatan;
            $row[] = $item->kabupaten;
            $row[] = anchor('admin/laporansiswa/detail/' . $item->id_siswa, '<div class="btn btn-sm btn-success mr-1 ml-1 mb-1 mt=1"><i class="fa fa-eye"></i></div>') .
                '<a href="' . base_url('admin/laporansiswa/pdf_laporan?q=detaildata&id=' . $item->id_siswa) . '" class="btn btn-sm btn-info mr-1 ml-1 mb-1 mt=1"><i class="fa fa-print"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Laporan_model->count_all_siswa($id_tahun, $id_kelas),
            "recordsFiltered" => $this->Laporan_model->count_filtered_siswa($id_tahun, $id_kelas),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function detail()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/laporansiswa');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'siswa'     => $this->Siswa_model->get_detail_data($id),
            'data'      => $this->Laporan_model->get_detail_lap_guru($id),
            'id_siswa'   => $id,
            'level'     => $data['level'],
            'tahun'     => $this->Tahun_model->get_data(),
            'menu'      => 'laporan_siswa',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Laporan Daftar Siswa',
                    'link' => 'admin/laporansiswa'
                ],
                2 => (object)[
                    'name' => 'Detail',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/laporan_siswadetail', $data);
        $this->load->view('templates/footer');
    }

    public function pdf_laporan()
    {
        $query      = $this->input->get('q');
        $tahun      = $this->input->get('tahun');
        $kelas      = $this->input->get('kelas');
        $id_siswa   = $this->input->get('id');

        if ($query == 'alldata') {
            $data['data'] = $this->Laporan_model->get_all_lap_siswa($tahun, $kelas);
            $data['kelas'] = $this->Kelas_model->get_detail_data($kelas);
            $this->mypdf->generate('pdf/laporan_allsiswa', $data, 'Laporan Data Siswa', 'A4', 'landscape');
        } elseif ($query == 'detaildata') {
            $data['siswa'] = $this->Siswa_model->get_detail_data($id_siswa);
            $this->mypdf->generate('pdf/laporan_detailsiswa', $data, 'Laporan Data Siswa', 'A4', 'portrait');
        }
    }
}
