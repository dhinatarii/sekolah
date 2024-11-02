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
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'   => $data['id_user'],
            'nama'      => $data['nama'],
            // 'photo'     => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'     => $data['level'],
            'menu'      => 'siswa',
            'breadcrumb' => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Siswa',
                    'link' => NULL
                ]
            ]
        );

        $this->load->view('templates/header');
        $this->load->view('templates_admin/sidebar', $data);
        $this->load->view('admin/siswa', $data);
        $this->load->view('templates/footer');
    }

    function get_result_siswa()
    {
        $list = $this->Siswa_model->get_datatables();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $item) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $item->nik;
            $row[] = $item->nisn;
            $row[] = $item->nama;
            $row[] = $item->tanggal_lahir;
            $row[] = $item->tempat_lahir;
            $row[] = $item->jenis_kelamin;
            $row[] = $item->status;
            $row[] = $item->alamat;
            $row[] = $item->no_kip_pip;
            $row[] = '<div id="set_detailModal" class="btn btn-sm btn-success mr-1 ml-1 mb-1" data-toggle="modal" data-target="#detailModal" data-idsiswa="' . $item->id_siswa . '" data-siswa="' . $item->nama . '" data-namaibu="' . $item->nama_ibu . '" data-namaayah="' . $item->nama_ayah . '"data-namawali="' . $item->nama_wali . '"><i class="fa fa-eye"></i></div>'
                . anchor('admin/siswa/edit/' . $item->id_siswa, '<div class="btn btn-sm btn-primary mr-1 ml-1 mb-1"><i class="fa fa-edit"></i></div>')
                . '<a href="javascript:;" onclick="confirmDelete(' . $item->id_siswa . ')" class="btn btn-sm btn-danger btn-delete-siswa mr-1 ml-1 mb-1"><i class="fa fa-trash"></i></a>';
            $data[] = $row;
        }

        $output = array(
            "draw" => @$_POST['draw'],
            "recordsTotal" => $this->Siswa_model->count_all(),
            "recordsFiltered" => $this->Siswa_model->count_filtered(),
            "data" => $data,
        );

        echo json_encode($output);
    }

    public function edit()
    {
        $id           = $this->uri->segment(4);
        if (!$id) {
            redirect('admin/siswa');
        }

        $siswa = $this->Siswa_model->get_detail_data($id);
        if (!isset($siswa)) {
            redirect('error_404');
        }

        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            'level'         => $data['level'],
            // 'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'siswa'         => $siswa,
            'kelas'         => $this->Kelas_model->get_data(),
            'jenis_kelamin' => ['Laki-laki', 'Perempuan'],
            'status' => ['Aktif', 'Nonaktif'],
            'menu'          => 'siswa',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Siswa',
                    'link' => 'admin/siswa'
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
            $this->load->view('admin/siswa_edit', $data);
            $this->load->view('templates/footer');
        } 
        // else {
        //     $config['upload_path']          = './assets/photos/';
        //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //     $config['max_size']             = 5000;
        //     $config['file_name']            = 'photo-siswa-' . $this->input->post('tanggal_lahir', TRUE) . '-' . substr(md5(rand()), 0, 10);
        //     $this->upload->initialize($config);

        //     if (@$_FILES['photo']['name'] != null) {

        //         if ($this->upload->do_upload('photo')) {
        //             $item = $this->Siswa_model->get_detail_data($id);
        //             if ($item['photo'] != null) {
        //                 $target_delete = './assets/photos/' . $item['photo'];
        //                 unlink($target_delete);
        //             }

        //             $gbr = $this->upload->data();
        //             //Compress Image
        //             $config['image_library'] = 'gd2';
        //             $config['source_image'] = './assets/photos/' . $gbr['file_name'];
        //             $config['create_thumb'] = FALSE;
        //             $config['maintain_ratio'] = FALSE;
        //             $config['quality'] = '50%';
        //             $config['width'] = 400;
        //             $config['height'] = 600;
        //             $config['new_image'] = './assets/photos/' . $gbr['file_name'];
        //             $this->image_lib->initialize($config);
        //             $this->image_lib->resize();

        //             $photo = $gbr['file_name'];
        //             $this->Siswa_model->edit_data($id, $photo);
        //             $this->session->set_flashdata('message', 'Data Siswa Berhasil Diupdate!');
        //             redirect('admin/siswa');
        //         } else {
        //             $error = $this->upload->display_errors();
        //             $this->session->set_flashdata('message_error', $error);
        //             redirect('admin/siswa/input');
        //         }
        //     } 
            else {
                $photo = NULL;
                $this->Siswa_model->edit_data($id, $photo);
                $this->session->set_flashdata('message', 'Data Siswa Berhasil Diupdate!');
                redirect('admin/siswa');
            }
        // }
    }

    public function input()
    {
        $data = $this->User_model->get_detail_admin($this->session->userdata['id_user'], $this->session->userdata['level']);
        $data = array(
            'id_user'       => $data['id_user'],
            'nama'          => $data['nama'],
            // 'photo'         => $data['photo'] != null ? $data['photo'] : 'user-placeholder.jpg',
            'level'         => $data['level'],
            'kelas'         => $this->Kelas_model->get_data(),
            'menu'          => 'siswa',
            'breadcrumb'    => [
                0 => (object)[
                    'name' => 'Dashboard',
                    'link' => 'admin'
                ],
                1 => (object)[
                    'name' => 'Siswa',
                    'link' => 'admin/siswa'
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
            $this->load->view('admin/siswa_input', $data);
            $this->load->view('templates/footer');
        } 
        // else {

        //     $config['upload_path']          = './assets/photos/';
        //     $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //     $config['max_size']             = 5000;
        //     $config['file_name']            = 'photo-siswa-' . $this->input->post('tanggal_lahir', TRUE) . '-' . substr(md5(rand()), 0, 10);
        //     $this->upload->initialize($config);

        //     if (@$_FILES['photo']['name'] != null) {

        //         if ($this->upload->do_upload('photo')) {
        //             $gbr = $this->upload->data();
        //             //Compress Image
        //             $config['image_library'] = 'gd2';
        //             $config['source_image'] = './assets/photos/' . $gbr['file_name'];
        //             $config['create_thumb'] = FALSE;
        //             $config['maintain_ratio'] = FALSE;
        //             $config['quality'] = '50%';
        //             $config['width'] = 400;
        //             $config['height'] = 600;
        //             $config['new_image'] = './assets/photos/' . $gbr['file_name'];
        //             $this->image_lib->initialize($config);
        //             $this->image_lib->resize();

        //             $photo = $gbr['file_name'];
        //             $this->Siswa_model->input_data_siswa($photo);
        //             $this->session->set_flashdata('message', 'Data Siswa Berhasil Ditambahkan!');
        //             redirect('admin/siswa');
        //         } else {
        //             $error = $this->upload->display_errors();
        //             $this->session->set_flashdata('message_error', $error);
        //             redirect('admin/siswa/input');
        //         }
        //     } 
            else {
                $photo = NULL;
                $this->Siswa_model->input_data_siswa($photo);
                $this->session->set_flashdata('message', 'Data Siswa Berhasil Ditambahkan!');
                redirect('admin/siswa');
            }
        // }
    }

    public function delete($id)
    {
        $item = $this->Siswa_model->get_detail_data($id);
        $id_address = $this->Siswa_model->get_id_address($item['id_orangtua']);

        $this->Siswa_model->delete_data($id_address);
        $this->User_model->delete_data($item['id_user']);
        $this->session->set_flashdata('message', 'Data Siswa Berhasil Dihapus!');
        redirect('admin/siswa');
    }

    private function _rules()
    {
        // rules data diri
        $this->form_validation->set_rules('nik', 'NIK', 'required|numeric|max_length[20]');
        $this->form_validation->set_rules('nisn', 'NISN', 'required|numeric|max_length[20]');
        $this->form_validation->set_rules('nama', 'Nama', 'required|max_length[100]');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal lahir', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat lahir', 'required|max_length[100]');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('status', 'Status', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|max_length[100]');
        $this->form_validation->set_rules('no_kip_pip', 'No KIP/PIP', 'numeric|max_length[20]');
        // rules data orang tua
        $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'required|max_length[100]');
        $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'required|max_length[100]');
        $this->form_validation->set_rules('nama_wali', 'Nama Wali', 'required|max_length[100]');

    }
}
