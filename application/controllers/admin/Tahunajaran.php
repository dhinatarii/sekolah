<?php
class Tahunajaran extends CI_Controller
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
        $data['menu'] = 'tahun ajaran';
        $data['tahun'] = $this->Tahun_model->get_data();
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Tahun Ajaran',
                'link' => NULL
            ]
        ];

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/tahun', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['menu'] = 'tahun ajaran';
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Tahun Ajaran',
                'link' => 'admin/tahunajaran'
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
            $this->load->view('admin/tahun_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Tahun_model->input_data();
            $this->session->set_flashdata('message', 'Data Tahun Ajaran Berhasil Ditambahkan!');
            redirect('admin/tahunajaran');
        }
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/tahunajaran');
        }

        $data['tahun'] = $this->Tahun_model->get_detail_data($id);
        $data['status'] = ['0', '1'];
        $data['menu'] = 'tahun ajaran';
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Tahun Ajaran',
                'link' => 'admin/tahunajaran'
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
            $this->load->view('admin/tahun_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Tahun_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Tahun Ajaran Berhasil Diupdate!');
            redirect('admin/tahunajaran');
        }
    }

    public function delete()
    {
        $id           = $this->uri->segment(4);
        $this->Tahun_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Tahun Ajaran Berhasil Dihapus!');
        redirect('admin/tahunajaran');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama', 'Tahun Ajaran', 'required|max_length[50]');
        $this->form_validation->set_rules('status', 'Status', 'required');
    }
}
