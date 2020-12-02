<?php

class User extends CI_Controller
{
    public function __construct()
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
        $data['menu']           = 'akademik';
        $data['count_admin']    = $this->User_model->count_user('admin');
        $data['count_guru']     = $this->User_model->count_user('guru');
        $data['count_wali']     = $this->User_model->count_user('wali kelas');
        $data['count_siswa']    = $this->User_model->count_user('siswa');

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    public function detail($id)
    {
        $data['level']  = $id == 1 ? 'admin' : ($id == 2 ? 'guru' : ($id == 3 ? 'wali kelas' : ($id == 4 ? 'siswa' : null)));
        $data['menu']   = 'akademik';
        $data['users']  = $this->User_model->get_user($data['level']);

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/user_detail', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['menu']   = 'akademik';

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/user_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->input_data();
            $this->session->set_flashdata('message', 'Data Admin Berhasil Ditambahkan!');
            redirect('admin/user/detail/1');
        }
    }

    public function edit()
    {
        $data['menu']   = 'akademik';
        $data['id']     = $this->input->get('id', TRUE);
        $data['level']  = $this->input->get('level', TRUE);

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/user_edit', $data);
        $this->load->view('templates/footer');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', "required|min_length[6]|matches[password]");
    }
}
