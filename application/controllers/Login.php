<?php

class Login extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('login/index');
        $this->load->view('templates/footer');
    }

    public function auth()
    {

        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username / Email / NISN wajib di isi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib di isi!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('login/index');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $check = $this->Login_model->check_login($user, $pass);

            if ($check->num_rows() > 0) {
                foreach ($check->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'guru') {
                    redirect('guru/dashboard');
                } elseif ($sess_data['level'] == 'siswa') {
                    redirect('siswa/dashboard');
                } else {
                    $this->session->set_flashdata('message', 'Username atau Password Salah!');
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata('message', 'Username atau Password Salah!');
                redirect('login');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
