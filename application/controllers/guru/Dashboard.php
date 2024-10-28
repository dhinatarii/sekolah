<?php
class Dashboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();

        // Load session library
        $this->load->library('session');

        // Load models
        $this->load->model('User_model');
        $this->load->model('Guru_model');
        $this->load->model('Tahun_model');
        $this->load->model('Pengajar_model');

        // Cek apakah pengguna sudah login
        if (!$this->session->userdata('username')) {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }

        // Cek level pengguna
        if ($this->session->userdata('level') != 'guru') {
            $this->session->set_flashdata('message', 'Akses tidak diizinkan!');
            redirect('login');
        }
    }



    public function index()
    {
        // Cek apakah pengguna sudah login
        if (!isset($this->session->userdata['username'])) {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }

        // Log data session untuk debug
        log_message('debug', 'Session Data: ' . json_encode($this->session->userdata));

        // Cek level pengguna
        if ($this->session->userdata['level'] != 'guru') {
            $this->session->set_flashdata('message', 'Akses tidak diizinkan!');
            redirect('login');
        }

        // Ambil detail guru dari model
        $data = $this->User_model->get_detail_guru($this->session->userdata['id_user'], $this->session->userdata['level']);
        log_message('debug', 'Data user: ' . json_encode($data));

        // Validasi data guru
        if (!$data) {
            show_error('Data guru tidak ditemukan.', 404);
            return; // Menghentikan eksekusi jika data tidak ditemukan
        }

        // Ambil detail guru berdasarkan id_user
        // Ambil detail guru berdasarkan id_user
        $guru = $this->Guru_model->get_detail_data(NULL, $data['id_user']);

        log_message('debug', 'Data guru: ' . json_encode($guru));

        // Validasi data guru
        if (!$guru) {
            show_error('Data guru tidak ditemukan.', 404);
            return; // Menghentikan eksekusi jika data tidak ditemukan
        }

        // Ambil tahun aktif
        $tahun = $this->Tahun_model->get_active_stats();

        // Validasi data tahun
        if (empty($tahun)) {
            show_error('Tahun aktif tidak ditemukan.', 404);
            return; // Menghentikan eksekusi jika tidak ada tahun aktif
        }

        // Siapkan data untuk view
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            // 'photo'     => !empty($data['photo']) ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'menu'      => 'dashboard',
            'tahun'     => $tahun,
            'pengajar'  => $this->Pengajar_model->get_count_pengampu($guru['id_guru'], $tahun),
            'siswa'     => $this->Pengajar_model->get_count_siswa($guru['id_guru'], $tahun),
            'breadcrumb' => [
                (object)[
                    'name' => 'Dashboard',
                    'link' => NULL
                ]
            ]
        );

        // Load view
        $this->load->view('templates/header');
        $this->load->view('templates_guru/sidebar', $data);
        $this->load->view('guru/dashboard', $data);
        $this->load->view('templates/footer');
    }
}
