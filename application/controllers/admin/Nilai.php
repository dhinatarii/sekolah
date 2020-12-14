<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Nilai extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->output->set_header('Cache-Control: no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        if (!isset($this->session->userdata['username']) && $this->session->userdata['level'] != 'admin') {
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
        $data['mapel']      = $this->Mapel_model->get_data();
        $data['kelas']      = $this->Kelas_model->get_data();
        $data['tahun']      = $this->Tahun_model->get_active_stats();
        $data['menu'] = 'nilai';
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Nilai',
                'link' => NULL
            ]
        ];

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/nilai', $data);
        $this->load->view('templates/footer');
    }

    public function get_mapel()
    {
        $id_kelas   = $this->input->post('id_kelas', TRUE);
        $data       =  $this->Mapel_model->get_mapel_with_kelas($id_kelas);
        if ($data->num_rows() > 0) {
            echo '<option value="">--Pilih Mata Pelajaran--</option>';
            foreach ($data->result() as $mp) {
                echo "<option value=$mp->id_mapel>$mp->nama_mapel / $mp->level</option>";
            }
        } else {
            echo '<option value="">--Tidak Tersedia--</option>';
        }
    }

    public function kd()
    {
        $id_kelas = $this->input->get('id_kelas', TRUE);
        $id_mapel = $this->input->get('id_mapel', TRUE);
        if (!isset($id_kelas) || !isset($id_mapel)) {
            redirect('error_404');
        }

        $data['menu'] = 'nilai';
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Nilai',
                'link' => 'admin/nilai'
            ],
            2 => (object)[
                'name' => 'Detail',
                'link' => NULL
            ]
        ];

        $data['id_kelas']   = $id_kelas;
        $data['id_mapel']   = $id_mapel;
        $data['kelas']      = $this->Kelas_model->get_detail_data($id_kelas);
        $data['mapel']      = $this->Mapel_model->get_detail_data($id_mapel);
        $data['komp_dasar'] = $this->Mapel_model->get_mapel_with_kd_detail($id_mapel, $id_kelas);

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/nilai_perkd', $data);
        $this->load->view('templates/footer');
        // $data = $this->Nilai_model->get_nilai_perkd($id_kelas, $id_mapel, 114, null);
        // var_dump($data);
        // die();
    }

    public function data_nilai_perkd()
    {
        $id_kelas   = $this->input->post('id_kelas', TRUE);
        $id_mapel   = $this->input->post('id_mapel', TRUE);
        $id_kd      = $this->input->post('id_kd', TRUE);
        $data       = $this->Nilai_model->get_nilai_perkd($id_kelas, $id_mapel, $id_kd);
        $jenis      = $this->Nilai_model->get_jenis_nilai_in_perkd($id_kelas, $id_mapel, $id_kd);
        $html       = '';
        if ($data != null || $jenis != null) {
            //awal table
            $html = $html . '<div class="card">
                    <div class="card-body">
                        ' . anchor('admin/nilai/nilai_input?id_kelas=' . $id_kelas . '&id_mapel=' . $id_mapel . '&id_kd=' . $id_kd, '<button class="btn btn-sm btn-primary mb-3 mr-2"><i class="fas fa-plus fa-sm"></i> Tambah Nilai</button>') . '
                        <table class="table table-responsive-sm table-bordered table-striped table-sm w-100 d-block d-md-table">
                            <thead>
                                <tr>
                                    <th rowspan="2" >No</th>
                                    <th rowspan="2" >Nama</th>';

            //heading table
            foreach ($jenis as $jn => $value) {
                $html = $html . '<th class="text-center">' .
                    anchor('admin/guru/edit/', '<div class="btn btn-sm btn-primary mr-1 ml-1 mb-1"><i class="fa fa-edit fa-sm"></i></div>') .
                    anchor('admin/guru/edit/', '<div class="btn btn-sm btn-danger mr-1 ml-1 mb-1"><i class="fa fa-trash fa-sm"></i></div>')
                    . '</th>';
            }

            $html = $html . '<th rowspan="2">Jumlah</th>
                            <th rowspan="2">Rata-rata</th>
                            </tr><tr>';

            //heading table
            foreach ($jenis as $jn => $value) {
                $html = $html . '<th>' . $value->jenis . '</th>';
            }

            $html = $html . '</tr></thead><tbody>';

            //body table
            foreach ($data as $dt => $value_dt) {
                $html = $html . '<tr>
                    <td width="20px">' . ++$dt . '</td>
                    <td>' . $value_dt['nama'] . '</td>';
                foreach ($jenis as $jn => $value_jn) {
                    $html = $html . '<td>' . $value_dt[$value_jn->jenis] . '</td>';
                }

                $html = $html . '<td></td><td></td></tr>';
            }

            //akhir table
            $html = $html . '</tbody></table></div></div>';
        } else if ($id_mapel == null || $id_kelas == null || $id_kd == null) {
            //id not found
            $html = $html . '<div class="card">
                                <div class="card-body">
                                    <h6 class="text-center">Data Nilai Tidak Dapat Ditampilkan, Silahkan Pilih Kompetensi Dasar</h6>
                                </div>
                            </div>';
        } else {
            //data not found
            $html = $html . '<div class="card">
                                <div class="card-body">
                                    ' . anchor('admin/nilai/nilai_input?id_kelas=' . $id_kelas . '&id_mapel=' . $id_mapel . '&id_kd=' . $id_kd, '<button class="btn btn-sm btn-primary mb-3 mr-2"><i class="fas fa-plus fa-sm"></i> Tambah Nilai</button>') . '
                                    <h4 class="text-center">Data Nilai Belum Tersedia</h4>
                                </div>
                            </div>';
        }
        echo ($html);
    }

    public function nilai_input()
    {
        $id_kelas   = $this->input->get('id_kelas', TRUE);
        $id_mapel   = $this->input->get('id_mapel', TRUE);
        $id_kd      = $this->input->get('id_kd', TRUE);

        if (!isset($id_kelas) || !isset($id_mapel) || !isset($id_kd)) {
            redirect('error_404');
        }

        $result_jenis = array_column($this->Nilai_model->get_jenis_nilai_in_perkd_array($id_kelas, $id_mapel, $id_kd), 'jenis');
        $object_jenis = ['Tugas Harian 1', 'Tugas Harian 2', 'Tugas Harian 3', 'Tugas Harian 4', 'Ulangan Harian 1', 'Ulangan Harian 2', 'Ulangan Harian 3', 'Ulangan Harian 4', 'UTS', 'UAS'];

        $data['kelas']          = $this->Kelas_model->get_detail_data($id_kelas);
        $data['mapel']          = $this->Mapel_model->get_detail_data($id_mapel);
        $data['pengajar']       = $this->Pengajar_model->get_detail_data_with_kelas_and_mapel($id_kelas, $id_mapel);
        $data['jenis_nilai']    = array_diff($object_jenis, $result_jenis);
        $data['siswa']          = $this->Siswa_model->get_data_perkelas($id_kelas);
        $data['komp_dasar']     = $this->Mapel_model->get_kd_detail($id_kd);
        $data['menu']           = 'nilai';
        $data['breadcrumb']     = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Nilai',
                'link' => 'admin/nilai'
            ],
            2 => (object)[
                'name' => 'Detail',
                'link' => 'admin/nilai/kd?id_kelas=' . $id_kelas . '&id_mapel=' . $id_mapel
            ],
            3 => (object)[
                'name' => 'Input Nilai',
                'link' => NULL
            ]
        ];

        $this->_rules_persiswa($data['siswa']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/nilai_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Nilai_model->input_nilai($data['siswa'], $id_kd);
            $this->session->set_flashdata('message', 'Nilai Siswa Berhasil Ditambahkan!');
            redirect('admin/nilai/kd?id_kelas=' . $id_kelas . '&id_mapel=' . $id_mapel);
        }
    }

    public function _rules_persiswa($data_siswa)
    {
        foreach ($data_siswa as $key => $value) {
            $this->form_validation->set_rules('nilai' . $key, 'Nilai', 'required|numeric');
        }
        $this->form_validation->set_rules('jenis', 'Jenis Nilai', 'required');
    }
}
