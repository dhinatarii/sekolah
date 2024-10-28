<?php
class Ekstrakurikuler extends CI_Controller
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
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'level'     => $data['level'],
            'menu'      => 'ekstrakurikuler',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Ekstrakurikuler',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/ekstrakurikuler', $data);
        $this->load->view('templates/footer');
    }

    function get_result_ekstrakurikuler()
    {
        $list = $this->Ekstrakurikuler_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nama_ekstrakurikuler;
            $row[] = $item->pembimbing;
            $row[] = $item->jadwal;
            $row[] = '<div id="set_detailModal" class="btn btn-sm btn-success mr-1 ml-1 mb-1" data-toggle="modal" data-target="#detailModal" data-idekstrakurikuler="' . $item->id_ekstrakurikuler . '" data-ekstrakurikuler="' . $item->nama_ekstrakurikuler . '" data-pembimbing="' . $item->pembimbing . '"><i class="fa fa-eye"></i></div>'
                . anchor('admin/ekstrakurikuler/edit/' . $item->id_ekstrakurikuler, '<div class="btn btn-sm btn-primary mr-1 ml-1 mb-1"><i class="fa fa-edit"></i></div>')
                . '<a href="javascript:;" onclick="confirmDelete(' . $item->id_ekstrakurikuler . ')" class="btn btn-sm btn-danger btn-delete-ekstrakurikuler mr-1 ml-1 mb-1"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Ekstrakurikuler_model->count_all(),
            "recordsFiltered" => $this->Ekstrakurikuler_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function edit()
    {
        $id = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/ekstrakurikuler');
        }

        $ekstrakurikuler = $this->Ekstrakurikuler_model->get_detail_data($id);
        if (!isset($ekstrakurikuler)) {
            redirect('error_404');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'level'         => $data['level'],
            'ekstrakurikuler' => $ekstrakurikuler,
            'menu'          => 'ekstrakurikuler',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Ekstrakurikuler',
                    'link' => 'admin/ekstrakurikuler'
                ],
                2 => (object)[
                    'name' => 'Edit',
                    'link' => NULL
                ]
            ]
        );

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/ekstrakurikuler_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Ekstrakurikuler_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Ekstrakurikuler Berhasil Diupdate!');
            redirect('admin/ekstrakurikuler');
        }
    }

    public function input()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'level'         => $data['level'],
            'menu'          => 'ekstrakurikuler',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Ekstrakurikuler',
                    'link' => 'admin/ekstrakurikuler'
                ],
                2 => (object)[
                    'name' => 'Input',
                    'link' => NULL
                ]
            ]
        );

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/ekstrakurikuler_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Ekstrakurikuler_model->input_data_ekstrakurikuler();
            $this->session->set_flashdata('message', 'Data Ekstrakurikuler Berhasil Ditambahkan!');
            redirect('admin/ekstrakurikuler');
        }
    }

    public function delete($id)
    {
        $this->Ekstrakurikuler_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Ekstrakurikuler Berhasil Dihapus!');
        redirect('admin/ekstrakurikuler');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama_ekstrakurikuler', 'Nama Ekstrakurikuler', 'required|max_length[100]');
        $this->form_validation->set_rules('pembimbing', 'Pembimbing', 'required|max_length[100]');
        $this->form_validation->set_rules('jadwal', 'Jadwal', 'required');
    }
}
