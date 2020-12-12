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
}
