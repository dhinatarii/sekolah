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
        $data['menu']           = 'user';
        $data['count_admin']    = $this->User_model->count_user('admin');
        $data['count_guru']     = $this->User_model->count_user('guru');
        $data['count_wali']     = $this->User_model->count_user('wali kelas');
        $data['count_siswa']    = $this->User_model->count_user('siswa');

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/user', $data);
        $this->load->view('templates/footer');
    }

    public function detail()
    {
        $id      = $this->uri->segment(4);
        if ($id < 1) {
            redirect('admin/user');
        }

        if ($id > 4) {
            redirect('admin/user');
        }


        $data['level']  = $id == 1 ? 'admin' : ($id == 2 ? 'guru' : ($id == 3 ? 'wali kelas' : ($id == 4 ? 'siswa' : null)));


        $data['menu']   = 'user';
        $data['users']  = $this->User_model->get_user($data['level']);

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/user_detail', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['menu']   = 'user';

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/user_input', $data);
            $this->load->view('templates/footer');
        } else {
            $cek = $this->User_model->cek_user();
            if ($cek == 0) {
                $this->User_model->input_data();
                $this->session->set_flashdata('message', 'Data Admin Berhasil Ditambahkan!');
                redirect('admin/user/detail/1');
            } else {
                $this->session->set_flashdata('message_error', 'Username telah ada');
                redirect('admin/user/input');
            }
        }
    }

    public function edit()
    {
        $data['menu']   = 'user';
        $data['id']     = $this->input->get('id', TRUE);
        $data['level']  = $this->input->get('level', TRUE);
        $data['user']   = $this->User_model->get_detail_user($data['id'], $data['level']);
        $data['status'] = ['0', '1'];
        $detail         = $data['level'] == 'admin' ? '1' : ($data['level'] == 'guru' ? '2' : ($data['level'] == 'wali kelas' ? '3' : ($data['level'] == 'siswa' ? '4' : NULL)));

        $this->_rules_data();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/user_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->edit_data($data['id']);
            $this->session->set_flashdata('message', 'Data Berhasil Diupdate!');
            redirect('admin/user/detail/' . $detail);
        }
    }

    public function change_password()
    {
        $data['menu']   = 'user';
        $data['id']     = $this->input->get('id', TRUE);
        $data['level']  = $this->input->get('level', TRUE);
        $detail         = $data['level'] == 'admin' ? '1' : ($data['level'] == 'guru' ? '2' : ($data['level'] == 'wali kelas' ? '3' : ($data['level'] == 'siswa' ? '4' : NULL)));
        $this->_rules_password();


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/user_password', $data);
            $this->load->view('templates/footer');
        } else {
            $this->User_model->edit_password($data['id']);
            $this->session->set_flashdata('message', 'Password Berhasil Diupdate!');
            redirect('admin/user/detail/' . $detail);
        }
    }

    public function delete()
    {
        $level      = $this->uri->segment(4);
        $id         = $this->uri->segment(5);
        $detail     = $level == 'admin' ? '1' : ($level == 'guru' ? '2' : ($level == 'wali kelas' ? '3' : ($level == 'siswa' ? '4' : NULL)));

        $this->User_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data User Berhasil Dihapus!');
        redirect('admin/user/detail/' . $detail);
    }

    private function _rules()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|min_length[6]|max_length[100]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', "required|min_length[6]|matches[password]|max_length[50]");
        $this->form_validation->set_rules('status', 'status', 'required');
    }

    private function _rules_data()
    {
        $this->form_validation->set_rules('status', 'status', 'required');
    }

    private function _rules_password()
    {
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[50]');
        $this->form_validation->set_rules('konfirmasi', 'Konfirmasi Password', "required|min_length[6]|matches[password]|max_length[50]");
    }
}
