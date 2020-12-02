<?php
class Siswa extends CI_Controller
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
        $data['siswa'] = $this->Siswa_model->get_all_data();
        $data['menu'] = 'akademik';

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id)
    {
        $data['siswa'] = $this->Siswa_model->get_detail_data($id);
        $data['menu'] = 'akademik';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/siswa_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Siswa Berhasil Diupdate!');
            redirect('admin/siswa');
        }
    }

    public function input()
    {
        $data['menu'] = 'akademik';
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/siswa_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Siswa_model->input_data_siswa();
            $this->session->set_flashdata('message', 'Data Siswa Berhasil Ditambahkan!');
            redirect('admin/siswa');
        }
    }

    public function delete($id)
    {
        $this->Siswa_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Siswa Berhasil Dihapus!');
        redirect('admin/siswa');
    }

    private function _rules()
    {
        // rules data diri
        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|numeric');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        // $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        // rules data orang tua
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required');
        $this->form_validation->set_rules('pendidikan_ibu', 'Pendidikan Ibu', 'required');
        $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required');
        $this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan Ayah', 'required');
        $this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan_ayah', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[13]');

        // rules data alamat
        $this->form_validation->set_rules('dusun', 'Dusun', 'required');
        $this->form_validation->set_rules('desa', 'Desa', 'required');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required');
    }
}
