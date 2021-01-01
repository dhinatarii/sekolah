<?php
class Pengajar_model extends CI_Model
{
    public function input_data($id_tahun)
    {
        $data = array(
            'id_guru'   => $this->input->post('guru', TRUE),
            'id_mapel'  => $this->input->post('mapel', TRUE),
            'id_kelas'  => $this->input->post('kelas', TRUE),
            'id_tahun'  => $id_tahun,
            'jabatan'   => $this->input->post('jabatan', TRUE)
        );

        $this->db->insert('tb_pengajar', $data);
    }

    public function get_count_perpengajar($id)
    {
        return $this->db->get_where('tb_pengajar', ['id_guru' => $id])->num_rows();
    }

    public function edit_data($id)
    {
        $data = array(
            'id_guru'   => $this->input->post('guru', TRUE),
            'id_mapel'  => $this->input->post('mapel', TRUE),
            'id_kelas'  => $this->input->post('kelas', TRUE),
            'jabatan'   => $this->input->post('jabatan', TRUE)
        );

        $this->db->where('id_pengajar', $id);
        $this->db->update('tb_pengajar', $data);
    }

    public function get_data()
    {
        $this->db->select('tp.id_pengajar, tp.jabatan, tg.nama as guru, CONCAT_WS(" / ", tm.nama_mapel, tm.level) as mapel, tk.kelas, tt.nama as tahun');
        $this->db->from('tb_pengajar tp');
        $this->db->join('tb_guru tg', 'tp.id_guru = tg.id_guru', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas  = tk.id_kelas', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');

        return $this->db->get()->result();
    }

    public function get_data_with_tahun($id_tahun)
    {
        $this->db->select('tk.*, tt.nama as tahun');
        $this->db->from('tb_pengajar tp');
        $this->db->join('tb_guru tg', 'tp.id_guru = tg.id_guru', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas  = tk.id_kelas', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->where('tt.id_tahun', $id_tahun);
        $this->db->group_by('tk.id_kelas');

        return $this->db->get();
    }

    public function get_detail_data($id)
    {
        return $this->db->get_where('tb_pengajar', ['id_pengajar' => $id])->row_array();
    }

    public function get_detail_data_with_kelas_and_mapel($id_kelas, $id_mapel)
    {
        $this->db->select('tp.id_pengajar, tg.id_guru, tg.nama');
        $this->db->from('tb_guru tg');
        $this->db->join('tb_pengajar tp', 'tp.id_guru = tg.id_guru', 'inner');
        $this->db->join('tb_kelas tk', 'tk.id_kelas = tp.id_kelas', 'inner');
        $this->db->join('tb_matapelajaran tm', 'tm.id_mapel = tp.id_mapel', 'inner');
        $this->db->where('tm.id_mapel', $id_mapel);
        $this->db->where('tk.id_kelas', $id_kelas);
        return $this->db->get()->row_array();
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_pengajar', ['id_pengajar' => $id]);
    }

    var $column_order = array(null, 'guru', 'jabatan', 'mapel', 'kelas', 'tahun'); //Sesuaikan dengan field
    var $column_search = array('guru', 'jabatan', 'mapel', 'kelas', 'tahun'); //field yang diizin untuk pencarian 
    var $order = array('kelas' => 'asc'); // default order 

    private function _get_datatables_query()
    {
        $this->db->select('tp.id_pengajar, tp.jabatan, tg.nama as guru, CONCAT_WS(" / ", tm.nama_mapel, tm.level) as mapel, tk.kelas, tt.nama as tahun');
        $this->db->from('tb_pengajar tp');
        $this->db->join('tb_guru tg', 'tp.id_guru = tg.id_guru', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas  = tk.id_kelas', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        $this->db->order_by('tk.kelas', 'asc');


        $i = 0;

        foreach ($this->column_search as $item) // looping awal
        {
            if ($_POST['search']['value']) // jika datatable mengirimkan pencarian dengan metode POST
            {

                if ($i === 0) // looping awal
                {
                    $this->db->group_start();
                    $this->db->like($item, $_POST['search']['value']);
                } else {
                    $this->db->or_like($item, $_POST['search']['value']);
                }

                if (count($this->column_search) - 1 == $i)
                    $this->db->group_end();
            }
            $i++;
        }

        if (isset($_POST['order'])) {
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }

    function get_datatables()
    {
        $this->_get_datatables_query();
        if ($_POST['length'] != -1)
            $this->db->limit($_POST['length'], $_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }

    function count_filtered()
    {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }

    public function count_all()
    {
        $this->db->from('tb_pengajar');
        return $this->db->count_all_results();
    }
}
