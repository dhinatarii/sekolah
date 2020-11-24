<?php
class Kelas extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar');
        $this->load->view('admin/kelas');
        $this->load->view('templates/footer');
    }
}
