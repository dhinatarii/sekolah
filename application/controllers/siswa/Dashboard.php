<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['username']) && $this->session->userdata['level'] != 'siswa') {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('login');
        }

        if ($this->session->userdata['level'] != 'siswa') {
            $this->session->set_flashdata('message', '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Anda Belum Login!
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('login');
        }
    }

    public function index()
    {
        $data = $this->User_model->get_data($this->session->userdata['username']);
        $data = array(
            'username'  => $data->username,
            'level'     => $data->level,
        );

        $this->load->view('templates/header');
        $this->load->view('templates_siswa/sidebar');
        $this->load->view('siswa/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
