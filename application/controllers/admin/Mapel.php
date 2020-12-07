<?php
class Mapel extends CI_Controller
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
        $data['menu'] = 'mata pelajaran';
        $data['mapel'] = $this->Mapel_model->get_data();

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/mapel', $data);
        $this->load->view('templates/footer');
    }

    public function input()
    {
        $data['menu'] = 'mata pelajaran';
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/mapel_input', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mapel_model->input_data();
            $this->session->set_flashdata('message', 'Data Mata Pelajaran Berhasil Ditambahkan!');
            redirect('admin/mapel');
        }
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/mapel');
        }

        $data['mapel']  = $this->Mapel_model->get_detail_data($id);
        $data['level']  = [1, 2, 3, 4, 5, 6];
        $data['menu']   = 'mata pelajaran';

        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header');
            $this->load->view('templates_admin/sidebar', $data);
            $this->load->view('admin/mapel_edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Mapel_model->edit_data($id);
            $this->session->set_flashdata('message', 'Data Kelas Berhasil Diupdate!');
            redirect('admin/mapel');
        }
    }

    public function delete()
    {
        $id           = $this->uri->segment(4);
        $this->Mapel_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Mata Pelajaran Berhasil Dihapus!');
        redirect('admin/mapel');
    }

    private function _rules()
    {
        $this->form_validation->set_rules('nama_mapel', 'Nama Mata Pelajaran', 'required|max_length[100]');
        $this->form_validation->set_rules('level', 'Level', 'required');
        $this->form_validation->set_rules('jum_tema', 'Jumlah Tema', 'required');
    }
}
