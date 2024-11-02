<?php
class Guru extends CI_Controller
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
            // 'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'menu'      => 'guru',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/guru', $data);
        $this->load->view('templates/footer');
    }

    function get_result_guru()
    {
        $list = $this->Guru_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nik;
            $row[] = $item->nama;
            $row[] = $item->jenis_kelamin;
            $row[] = $item->tanggal_lahir;
            $row[] = $item->no_hp;
            $row[] = $item->email;
            $row[] = $item->alamat;
            $row[] = $item->nip;
            $row[] = $item->pendidikan;
            $row[] = $item->bidang_studi;
            $row[] = $item->tempat_tugas;
            $row[] = $item->tahun_mulai_tugas;
            $row[] = $item->niy;
            $row[] = $item->no_sertifikat_sertifikasi;
            $row[] = $item->no_peserta_sertifikasi;
            $row[] = $item->tahun_lulus_sertifikasi;
            $row[] = anchor('admin/guru/edit/' . $item->id_guru, '<div class="btn btn-sm btn-primary btn-xs mr-1 ml-1 mb-1"><i class="fa fa-edit"></i></div>')
                . '<a href="javascript:;" onclick="confirmDelete(' . $item->id_guru . ')" class="btn btn-sm btn-danger btn-delete-guru btn-xs mr-1 ml-1 mb-1"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Guru_model->count_all(),
            "recordsFiltered" => $this->Guru_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function input()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            'level'     => $data['level'],
            'menu'      => 'guru',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru',
                    'link' => 'admin/guru'
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
            $this->load->view('admin/guru_input');
            $this->load->view('templates/footer');
        } 
            else {
                // $photo = NULL;
                $this->Guru_model->input_data();
                $this->session->set_flashdata('message', 'Data Guru Berhasil Ditambahkan!');
                redirect('admin/guru');
            }
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/guru');
        }

        $guru = $this->Guru_model->get_detail_data($id);
        if (!isset($guru)) {
            redirect('error_404');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'level'         => $data['level'],
            'guru'          => $guru,
            'jenis_kelamin' => ['Laki-laki', 'Perempuan'],
            'menu'          => 'guru',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Guru',
                    'link' => 'admin/guru'
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
            $this->load->view('admin/guru_edit', $data);
            $this->load->view('templates/footer');
        } 
        else {
                $this->Guru_model->edit_data($id, $data['guru']['nama']);
                $this->session->set_flashdata('message', 'Data Guru Berhasil Diupdate!');
                redirect('admin/guru');
            }
    }

    public function delete()
    {
        $id           = $this->uri->segment(4);
        $item         = $this->Guru_model->get_detail_data($id);

        $this->User_model->delete_data($item['id_user']);
        $this->Kelas_model->delete_walikelas($item['nama']);
        $this->Guru_model->delete_data($id);
        $this->session->set_flashdata('message', 'Data Guru Berhasil Dihapus!');
        redirect('admin/guru');
    }

    function _rules()
    {
        $this->form_validation->set_rules('nik', 'NIK', 'required|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('no_hp', 'No Handphone', 'required|numeric|min_length[10]|max_length[15]');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|max_length[100]');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('nip', 'NIP');
        $this->form_validation->set_rules('pendidikan', 'Pendidikan', 'required|max_length[100]');
        $this->form_validation->set_rules('bidang_studi', 'Bidang Studi', 'required|max_length[100]');
        $this->form_validation->set_rules('tempat_tugas', 'Tempat Tugas', 'required|max_length[100]');
        $this->form_validation->set_rules('tahun_mulai_tugas', 'Tahun Mulai Tugas');
        $this->form_validation->set_rules('niy', 'NIY');
        $this->form_validation->set_rules('no_sertifikat_sertifikasi', 'No Sertifikat Sertifikasi');
        $this->form_validation->set_rules('no_peserta_sertifikasi', 'No Peserta Sertifikasi');
        $this->form_validation->set_rules('tahun_lulus_sertifikasi', 'Tahun Lulus Sertifikasi');
    }
}