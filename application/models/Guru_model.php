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
        $tahun_ajaran = !empty($tahun) ? $tahun['nama'] : null;

        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tp.id_guru = tg.id_guru', 'inner');
        $this->db->join('tb_tahunajaran tt', 'tt.id_tahun = tp.id_tahun', 'inner');

        if ($tahun_ajaran !== null) {
            $this->db->where('tt.nama', $tahun_ajaran);
        }

        $this->db->group_by('tg.id_guru');
        return $this->db->get()->num_rows();
    }

    // Mengambil nama guru yang tidak menjadi wali kelas
    public function get_data_only_name()
    {
        return $this->db->query("
            SELECT tg.nama, tg.id_user 
            FROM tb_guru tg
            WHERE tg.nama NOT IN (
                SELECT tk.wali_kelas
                FROM tb_kelas tk
                WHERE tk.wali_kelas = tg.nama
            )
        ")->result();
    }

    // Mendapatkan detail guru
    public function get_detail_data($id_user = NULL, $id_guru = NULL)
    {
        // Jika id_user diberikan, cari berdasarkan id_user
        if ($id_user) {
            $this->db->where('id_user', $id_user);
        }

        // Jika id_guru diberikan, cari berdasarkan id_guru
        if ($id_guru) {
            $this->db->where('id_guru', $id_guru);
        }

        return $this->db->get('tb_guru')->row_array();
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
            'nip'           => $this->input->post('nip', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'no_hp'         => $this->input->post('no_hp', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'alamat'        => $this->input->post('alamat', TRUE),
            // 'photo'         => $photo,
            'id_user'       => $id_user
        );

        $this->db->insert('tb_guru', $data);
    }

    public function edit_data($id)//,$photo = null harusnya ini berada dalam kurung
    {
        $dataDetail = $this->get_detail_data($id);
        if (!$dataDetail) {
            log_message('error', 'Data guru tidak ditemukan saat edit dengan id: ' . $id);
            return; // Menghentikan eksekusi jika data tidak ditemukan
        }

        $dataUser = array(
            'username' => $this->input->post('email', TRUE),
        );

        $data = array(
            'nip'           => $this->input->post('nip', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'no_hp'         => $this->input->post('no_hp', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'alamat'        => $this->input->post('alamat', TRUE),
        );

        // if ($photo != null) {
        //     $data['photo'] = $photo;
        // }

        // Update data guru
        $this->db->where('id_guru', $id);
        $this->db->update('tb_guru', $data);

        // Update data user
        $this->db->where('username', $dataDetail['email']);
        $this->db->update('tb_user', $dataUser);
    }

    public function delete_data($id)
    {
        // Hapus data guru
        $this->db->delete('tb_guru', ['id_guru' => $id]);
    }

    // Variabel untuk datatables
    var $column_order = array(null, 'nip', 'nama', 'jenis_kelamin', 'tanggal_lahir', 'no_hp', 'email', 'alamat');
    var $column_search = array('nama', 'no_hp', 'email', 'alamat');
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
