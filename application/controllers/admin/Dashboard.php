<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['username'])) {
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
        $data = $this->User_model->get_data($this->session->userdata['username']);
        $data = array(
            'username'  => $data->username,
            'level'     => $data->level,
            'menu'      => 'dashboard',
            'tahun'     => $this->Tahun_model->get_active_stats(),
            'siswa'     => $this->Siswa_model->get_count_allsiswa(),
            'kelas'     => $this->Kelas_model->get_count(),
            'guru'      => $this->Guru_model->get_count(),
        );

        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => NULL
            ]
        ];

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
