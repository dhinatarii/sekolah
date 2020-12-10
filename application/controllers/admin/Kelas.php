<?php
class Kelas extends CI_Controller
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
        $data['menu'] = 'kelas';
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Kelas',
                'link' => NULL
            ]
        ];

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/kelas', $data);
        $this->load->view('templates/footer');
    }

    function get_result_kelas()
    {
        $list = $this->Kelas_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->kelas;
            $row[] = $item->wali_kelas;
            $row[] = anchor('admin/kelas/edit/' . $item->id_kelas, '<div class="btn btn-sm btn-primary btn-xs mr-1 ml-1 mb-1"><i class="fa fa-edit"></i></div>')
                . '<a href="javascript:;" onclick="confirmDelete(' . $item->id_kelas . ')" class="btn btn-sm btn-danger btn-xs mr-1 ml-1 mb-1"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Kelas_model->count_all(),
            "recordsFiltered" => $this->Kelas_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function input()
    {
        $data['guru'] = $this->Guru_model->get_data_only_name();
        $data['menu'] = 'kelas';
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Kelas',
                'link' => 'admin/kelas'
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
            $this->load->view('admin/kelas_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kelas_model->input_data();
            $this->session->set_flashdata('message', 'Data Kelas Berhasil Ditambahkan!');
            redirect('admin/kelas');
        }
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/kelas');
        }

        $data['kelas'] = $this->Kelas_model->get_detail_data($id);
        $data['guru'] = $this->Guru_model->get_data_only_name();
        $data['menu'] = 'kelas';
        $data['breadcrumb'] = [
            0 => (object)[
                'name' => 'Dashboard',
                'link' => 'admin/dashboard'
            ],
            1 => (object)[
                'name' => 'Kelas',
                'link' => 'admin/kelas'
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
            $this->load->view('admin/kelas_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Kelas_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Kelas Berhasil Diupdate!');
            redirect('admin/kelas');
        }
    }

    public function delete()
    {
        $id           = $this->uri->segment(4);
        $this->Kelas_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Kelas Berhasil Dihapus!');
        redirect('admin/kelas');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('kelas', 'Kelas', 'required|max_length[10]');
        $this->form_validation->set_rules('wali_kelas', 'Wali Kelas', 'required|max_length[100]');
    }
}
