<?php

class Pengajar extends CI_Controller
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
        $data['menu'] = 'pengajar';
        $data['pengajar'] = $this->Pengajar_model->get_data();

        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Guru Pengajar',
                'link' => NULL
            ]
        ];

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/pengajar', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['menu'] = 'pengajar';
        $data['guru'] = $this->Guru_model->get_data();
        $data['mapel'] = $this->Mapel_model->get_data();
        $data['kelas'] = $this->Kelas_model->get_data();
        $data['tahun'] = $this->Tahun_model->get_active_stats();
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Guru Pengajar',
                'link' => 'admin/pengajar'
            ],
            2 => (object)[
                'name' => 'Input',
                'link' => NULL
            ]
        ];

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/pengajar_input', $data);
            $this->load->view('templates/footer');
        } else {
            $id_tahun = $data['tahun']['id_tahun'];
            $this->Pengajar_model->input_data($id_tahun);
            $this->session->set_flashdata('message', 'Data Pengajar Berhasil Ditambahkan!');
            redirect('admin/pengajar');
        }
    }

    private function _rules()
    {
        $this->form_validation->set_rules('guru', 'Guru', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('jabatan', 'Jabatan', 'required');
    }
}
