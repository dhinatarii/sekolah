<?php
class Siswa extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        if (!isset($this->session->userdata['username']) && $this->session->userdata['level'] != 'admin') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('admin/auth');
        }

        if ($this->session->userdata['level'] != 'admin') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('admin/auth');
        }
    }

    public function index()
    {
        $data['siswa'] = $this->Siswa_model->get_all_data();
        $data['menu'] = 'akademik';

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        // $data['kelas'] = $this->Kelas_model->get_detail_data($id);
        // $data['guru'] = $this->Guru_model->get_data_only_name();
        $data['menu'] = 'akademik';

        // $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/siswa_edit', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->Kelas_model->edit_data($id);
            // $this->session->set_flashdata('message', 'Data Kelas Berhasil Diupdate!');
            // redirect('admin/kelas');
        }
    }

    public function input()
    {
        // $data['guru'] = $this->Guru_model->get_data_only_name();
        $data['menu'] = 'akademik';
        // $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/siswa_input', $data);
            $this->load->view('templates/footer');
        } else {
            // $this->Kelas_model->input_data();
            // $this->session->set_flashdata('message', 'Data Kelas Berhasil Ditambahkan!');
            // redirect('admin/siswa');
        }
    }
}
