<?php
class Auth extends CI_Controller
{
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('admin/login');
            $this->load->view('templates/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $check = $this->Login_model->check_login($user, $pass);

            if ($check->num_rows() > 0) {
                foreach ($check->result() as $ck) {
                    $sess_data['username']  = $ck->username;
                    $sess_data['email']     = $ck->email;
                    $sess_data['level']     = $ck->level;

                    $this->session->set_userdata($sess_data);
                }
                if ($sess_data['level'] == 'admin') {
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('message', 'Username atau Password Salah!');
                    redirect('admin/auth');
                }
            } else {
                $this->session->set_flashdata('message', 'Username atau Password Salah!');
                redirect('admin/auth');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('admin/auth');
    }
}
