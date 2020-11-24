<?php
class Kelas extends CI_Controller
{
    public function index()
    {
        $data['menu'] = 'akademik';

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/kelas');
        $this->load->view('templates/footer');
    }
}
