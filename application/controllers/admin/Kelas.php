<?php
class Kelas extends CI_Controller
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
        $data['kelas'] = $this->Kelas_model->get_data();
        $data['menu'] = 'akademik';

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['guru'] = $this->Guru_model->get_data_only_name();
        $data['menu'] = 'akademik';
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/kelas_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kelas_model->input_data();
            $this->session->set_flashdata('message', 'Data Kelas Berhasil Ditambahkan!');
            redirect('admin/kelas');
        }
    }

    public function edit($id)
    {
        $data['kelas'] = $this->Kelas_model->get_detail_data($id);
        $data['guru'] = $this->Guru_model->get_data_only_name();
        $data['menu'] = 'akademik';

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/kelas_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kelas_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Kelas Berhasil Diupdate!');
            redirect('admin/kelas');
        }
    }

    public function delete($id)
    {
        $this->Kelas_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Kelas Berhasil Dihapus!');
        redirect('admin/kelas');
    }

    function _rules()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required');
    }
}
