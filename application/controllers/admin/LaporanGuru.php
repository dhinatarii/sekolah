<?php
class LaporanGuru extends CI_Controller
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
            'menu'      => 'laporan_guru',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin/dashboard'
                ],
                1 => (object)[
                    'name' => 'Laporan Daftar Guru',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/laporan_guru', $data);
        $this->load->view('templates/footer');
    }

    public function data_all_guru()
    {
        $id_tahun   = $this->input->post('id_tahun', TRUE);
        $cek_data   = $this->Laporan_model->cek_datatahun($id_tahun);
        $html       = '';

        if ($cek_data->num_rows() > 0) {
            $html = $html . '
                <div class="card">
                    <div class="card-body">
                        <button class="btn btn-info mb-2"><i class="fas fa-print"></i> Print</button>
                        <div>
                            <h1 class="h1 text-center">LAPORAN DAFTAR GURU</h1>
                            <h2 class="text-center">SD MUHAMMADIYAH TRINI</h2>
                            <h3 class="text-center">Tahun Ajaran 2020 / 2021</h3>
                        </div>
                        <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table" id="table-laporanguru">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIP</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jabatan</th>
                                    <th>Kelas Mengajar</th>
                                    <th>Alamat</th>
                                    <th class="text-center" width="50px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
                <script>
                    $(document).ready(function() {
                        $("#table-laporanguru").DataTable({
                            "serverSide": true,
                            "ajax": {
                                "url": "' . base_url('admin/laporanguru/get_result_guru') . '",
                                "type": "POST",
                                "data":{
                                    id_tahun: ' . $id_tahun . '
                                }
                            },
                            "columnDefs": [{
                                    "targets": [0, -1],
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
                                    <h6 class="text-center">Laporan Daftar Guru Tidak Tersedia, Silahkan Pilih Tahun Ajaran</h6>
                                </div>
                            </div>';
        }
        echo $html;
    }

    function get_result_guru()
    {
        $id_tahun = $this->input->post('id_tahun', TRUE);
        $list = $this->Laporan_model->get_datatables($id_tahun);
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $map_kelas = explode(',', $item->kelas);
            $uniqe_kelas = array_unique($map_kelas);
            sort($uniqe_kelas);
            $new_kelas = implode(', ', $uniqe_kelas);
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama;
            $row[] = $item->nip;
            $row[] = $item->jenis_kelamin;
            $row[] = $item->tanggal_lahir;
            $row[] = $item->jabatan;
            $row[] = $new_kelas;
            $row[] = $item->alamat;
            $row[] = anchor('admin/laporanguru/detail/' . $item->id_guru, '<div class="btn btn-sm btn-success mr-1 ml-1 mb-1"><i class="fa fa-eye"></i></div>');
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Laporan_model->count_all($id_tahun),
            "recordsFiltered" => $this->Laporan_model->count_filtered($id_tahun),
            "data" => $data,
        );

        echo json_encode($output);
    }
}
