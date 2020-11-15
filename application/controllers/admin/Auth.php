<?php
class Auth extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates_admin/header');
        $this->load->view('admin/login');
        $this->load->view('templates_admin/footer');
    }

    public function process_login()
    {

        $this->form_validation->set_rules('username', 'username', 'required', ['required' => 'Username wajib di isi!']);
        $this->form_validation->set_rules('password', 'password', 'required', ['required' => 'Password wajib di isi!']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates_admin/header');
            $this->load->view('admin/login');
            $this->load->view('templates_admin/footer');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');

            $user = $username;
            $pass = MD5($password);

            $check = $this->Login_model->cek_login($user, $pass);

            if ($check->num_rows() > 0) {
                foreach ($check->result() as $ck) {
                    $sess_data['username'] = $ck->username;
                    $sess_data['email'] = $ck->email;
                    $sess_data['level'] = $ck->level;
                }
                if ($sess_data['level'] == 'admin') {
                    redirect('admin/dashboard');
                } else {
                    $this->session->set_flashdata('message', '
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Username atau Password Salah!
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>');
                    redirect('admin/auth');
                }
            } else {
                $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Username atau Password Salah!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
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
