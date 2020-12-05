<?php
class Guru extends CI_Controller
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
        $data['guru'] = $this->Guru_model->get_data();
        $data['menu'] = 'guru';

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['menu'] = 'guru';
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/guru_input');
            $this->load->view('templates/footer');
        } else {
            $this->Guru_model->input_data();
            $this->session->set_flashdata('message', 'Data Guru Berhasil Ditambahkan!');
            redirect('admin/guru');
        }
    }

    public function edit($id)
    {
        $data['guru'] = $this->Guru_model->get_detail_data($id);
        $data['menu'] = 'guru';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/guru_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Guru_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Guru Berhasil Diupdate!');
            redirect('admin/guru');
        }
    }

    public function delete($id)
    {
        $this->Guru_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Guru Berhasil Dihapus!');
        redirect('admin/guru');
    }

    function _rules()
    {
        $this->form_validation->set_rules('nip', 'NIP', 'numeric|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
    }
}
