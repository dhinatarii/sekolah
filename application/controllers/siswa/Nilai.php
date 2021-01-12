<?php
class Nilai extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        if (!isset($this->session->userdata['username']) && $this->session->userdata['level'] != 'siswa') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }

        if ($this->session->userdata['level'] != 'siswa') {
            $this->session->set_flashdata('message', 'Anda Belum Login!');
            redirect('login');
        }
    }

    public function index()
    {
        $tahun      = $this->Tahun_model->get_active_stats();
        $data       = $this->User_model->get_detail_siswa($this->session->userdata['id_user'], $this->session->userdata['level']);
        $id_kelas   = $data['id_kelas'];
        $id_tahun   = $tahun['id_tahun'];
        $id_siswa   = $data['id_siswa'];
        $nilai      = $this->Nilai_model->nilai_persiswa($id_siswa, $id_kelas, $id_tahun);

        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'kelas'     => $data['kelas'],
            'wali_kelas' => $data['wali_kelas'],
            'menu'      => 'dashboard',
            'tahun'     => $this->Tahun_model->get_data(),
            'nilai'     => $nilai,
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_siswa/sidebar', $data);
        $this->load->view('siswa/nilai', $data);
        $this->load->view('templates/footer');
    }
}
