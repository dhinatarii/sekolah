<?php
class Guru_model extends CI_Model
{
    // Mengambil semua data guru
    public function get_data()
    {
        return $this->db->get('tb_guru')->result();
    }

    // Menghitung jumlah guru berdasarkan tahun ajaran
    public function get_count($tahun)
    {
        $tahun_ajaran = ($tahun) ? $tahun['nama'] : 'null';
        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tp.id_guru = tg.id_guru', 'inner');
        $this->db->join('tb_tahunajaran tt', 'tt.id_tahun = tp.id_tahun', 'inner');
        $this->db->where('tt.nama', $tahun_ajaran);
        $this->db->group_by('tg.id_guru');
        return $this->db->get()->num_rows();
    }

    public function get_data_only_name()
    {
        return $this->db->query("select tg.nama, tg.id_user 
            from
                tb_guru tg
            where
                tg.nama not in (
                select
                    tk.wali_kelas
                from
                    tb_kelas tk
                where
                    tk.wali_kelas = tg.nama)")->result();
    }

    public function get_detail_data($id, $id_user = NULL, $name = NULL)
    {
        if ($id_user) {
            return $this->db->get_where('tb_guru', ['id_user' => $id_user])->row_array();
        } elseif ($name) {
            return $this->db->get_where('tb_guru', ['nama' => $name])->row_array();
        } else {
            return $this->db->get_where('tb_guru', ['id_guru' => $id])->row_array();
        }
    }


    private function _input_user()
    {
        $date = date_create($this->input->post('tanggal_lahir', TRUE));
        $dateFormat = date_format($date, "mY");
        $data = array(
            'username'  => $this->input->post('email', TRUE),
            'password'  => MD5($dateFormat),
            'level'     => 'guru',
            'status'    => '1'
        );

        $this->db->insert('tb_user', $data);
        return $this->db->insert_id();
    }

    public function input_data()//$photo harusnya ini berada dalam kurung
    {
        $id_user = $this->_input_user();
        $data = array(
            'nik'                              => $this->input->post('nik', TRUE),
            'nama'                             => $this->input->post('nama', TRUE),
            'jenis_kelamin'                    => $this->input->post('jenis_kelamin', TRUE),
            'tanggal_lahir'                    => $this->input->post('tanggal_lahir', TRUE),
            'no_hp'                            => $this->input->post('no_hp', TRUE),
            'email'                            => $this->input->post('email', TRUE),
            'alamat'                           => $this->input->post('alamat', TRUE),
            'nip'                              => $this->input->post('nip', TRUE),
            'pendidikan'                       => $this->input->post('pendidikan', TRUE),
            'bidang_studi'                     => $this->input->post('bidang_studi', TRUE),
            'tempat_tugas'                     => $this->input->post('tempat_tugas', TRUE),
            'tahun_mulai_tugas'                => $this->input->post('tahun_mulai_tugas', TRUE),
            'niy'                              => $this->input->post('niy', TRUE),
            'no_sertifikat_sertifikasi'        => $this->input->post('no_sertifikat_sertifikasi', TRUE),
            'no_peserta_sertifikasi'           => $this->input->post('no_peserta_sertifikasi', TRUE),
            'tahun_lulus_sertifikasi'          => $this->input->post('tahun_lulus_sertifikasi', TRUE),
            'id_user'       => $id_user
        );

        $this->db->insert('tb_guru', $data);
    }

    public function edit_data($id,$name_guru)//,$photo = null harusnya ini berada dalam kurung
    {
        $dataDetail = $this->get_detail_data($id);
        $dataWali = $this->db->get_where('tb_kelas', ['wali_kelas' => $name_guru])->num_rows();

        $dataUser = array(
            'username' => $this->input->post('email', TRUE),
        );
        $dataWali = array(
            'wali_kelas'     => $this->input->post('nama', TRUE),
        );

        $data = array(
            'nik'                              => $this->input->post('nik', TRUE),
            'nama'                             => $this->input->post('nama', TRUE),
            'jenis_kelamin'                    => $this->input->post('jenis_kelamin', TRUE),
            'tanggal_lahir'                    => $this->input->post('tanggal_lahir', TRUE),
            'no_hp'                            => $this->input->post('no_hp', TRUE),
            'email'                            => $this->input->post('email', TRUE),
            'alamat'                           => $this->input->post('alamat', TRUE),
            'nip'                              => $this->input->post('nip', TRUE),
            'pendidikan'                       => $this->input->post('pendidikan', TRUE),
            'bidang_studi'                     => $this->input->post('bidang_studi', TRUE),
            'tempat_tugas'                     => $this->input->post('tempat_tugas', TRUE),
            'tahun_mulai_tugas'                => $this->input->post('tahun_mulai_tugas', TRUE),
            'niy'                              => $this->input->post('niy', TRUE),
            'no_sertifikat_sertifikasi'        => $this->input->post('no_sertifikat_sertifikasi', TRUE),
            'no_peserta_sertifikasi'           => $this->input->post('no_peserta_sertifikasi', TRUE),
            'tahun_lulus_sertifikasi'          => $this->input->post('tahun_lulus_sertifikasi', TRUE),
        );

        // Update data guru
        $this->db->where('id_guru', $id);
        $this->db->update('tb_guru', $data);

        // Update data user
        $this->db->where('username', $dataDetail['email']);
        $this->db->update('tb_user', $dataUser);

        if ($dataWali > 0) {
            $this->db->where('wali_kelas', $name_guru);
            $this->db->update('tb_kelas', $dataWali);
        }

    }

    public function delete_data($id)
    {
        // Hapus data guru
        $this->db->delete('tb_guru', ['id_guru' => $id]);
    }

    // Variabel untuk datatables
    var $column_order = array(null, 'nik', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'no_hp', 'email', 'alamat', 'nip', 'pendidikan', 'bidang_studi', 'tempat_tugas', 'tahun_mulai_tugas', 'niy', 'no_sertifikat_sertifikasi', 'no_peserta_sertifikasi', 'tahun_lulus_sertifikasi');
    var $column_search = array('nama', 'no_hp', 'email', 'alamat', 'bidang_studi');
    var $order = array('nama' => 'asc');

    private function _get_datatables_query()
    {
        $this->db->from('tb_guru');
        $i = 0;

        foreach ($this->column_search as $item) {
            if ($_POST['search']['value']) {
                if ($i === 0) {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i) {
                    $this->db->group_end();
                }
            }
            $i++;
        }

        // Penanganan order
        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    // Mengambil data untuk datatables
    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1) {
            $this->db->limit($_POST['length'], $_POST['start']);
        }
        return $this->db->get()->result();
    }

    // Menghitung jumlah data yang difilter
    function count_filtered()
    {
        $this->_get_datatables_query();
        return $this->db->get()->num_rows();
    }

    // Menghitung total semua data
    public function count_all()
    {
        $this->db->from('tb_guru');
        return $this->db->count_all_results();
    }
}
