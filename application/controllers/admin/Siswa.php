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

        $config = $this->_config();
        $this->pagination->initialize($config);

        $data['start'] = $this->uri->segment(4);
        $data['siswa'] = $this->Siswa_model->get_all_data($config['per_page'], $data['start']);
        $data['menu'] = 'siswa';
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Siswa',
                'link' => NULL
            ]
        ];

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/siswa');
        }

        $data['siswa'] = $this->Siswa_model->get_detail_data($id);
        $data['kelas'] = $this->Kelas_model->get_data();
        $data['menu'] = 'siswa';
        $data['jenis_kelamin'] = ['Laki-laki', 'Perempuan'];
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Siswa',
                'link' => 'admin/siswa'
            ],
            2 => (object)[
                'name' => 'Edit',
                'link' => NULL
            ]
        ];

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/siswa_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $id_kelas = $this->Kelas_model->get_id_kelas();
            $this->Siswa_model->edit_data($id, $id_kelas);
            $this->session->set_flashdata('message', 'Data Siswa Berhasil Diupdate!');
            redirect('admin/siswa');
        }
    }

    public function input()
    {
        $data['menu'] = 'siswa';
        $data['kelas'] = $this->Kelas_model->get_data();
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Siswa',
                'link' => 'admin/siswa'
            ],
            2 => (object)[
                'name' => 'Input',
                'link' => NULL
            ]
        ];

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/siswa_input', $data);
            $this->load->view('templates/footer');
        } else {
            $id_kelas = $this->Kelas_model->get_id_kelas();
            $this->Siswa_model->input_data_siswa($id_kelas);
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
        $this->form_validation->set_rules('nis', 'NIS', 'required|numeric|max_length[10]');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|numeric|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('agama', 'Agama', 'required|max_length[10]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');

        // rules data orang tua
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|max_length[100]');
        $this->form_validation->set_rules('pendidikan_ibu', 'Pendidikan Ibu', 'required|max_length[50]');
        $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'required|max_length[50]');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required|max_length[100]');
        $this->form_validation->set_rules('pendidikan_ayah', 'Pendidikan Ayah', 'required|max_length[50]');
        $this->form_validation->set_rules('pekerjaan_ayah', 'pekerjaan_ayah', 'required|max_length[50]');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');

        // rules data alamat
        $this->form_validation->set_rules('dusun', 'Dusun', 'required|max_length[50]');
        $this->form_validation->set_rules('desa', 'Desa', 'required|max_length[50]');
        $this->form_validation->set_rules('kecamatan', 'Kecamatan', 'required|max_length[50]');
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|max_length[50]');
    }

    private function _config()
    {
        //config pagination
        $config['base_url'] = 'http://localhost/sipdn-web/admin/siswa/index';
        $config['total_rows'] = $this->Siswa_model->get_count_allsiswa();;
        $config['per_page'] = 10;
        $config['num_link'] = 5;

        $config['full_tag_open'] = '<nav><ul class="pagination justify-content-center">';
        $config['full_tag_close'] = '</ul></nav>';

        $config['first_link'] = 'First';
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';

        $config['last_link'] = 'Last';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';

        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = ' <li class="page-item">';
        $config['next_tag_close'] = '</li>';

        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = ' <li class="page-item">';
        $config['prev_tag_close'] = '</li>';

        $config['cur_tag_open'] = ' <li class="page-item active"><a class="page-link" href="#">';
        $config['cur_tag_close'] = '</a></li>';

        $config['num_tag_open'] = ' <li class="page-item">';
        $config['num_tag_close'] = '</li>';

        $config['attributes'] = ['class' => 'page-link'];

        return $config;
    }
}
