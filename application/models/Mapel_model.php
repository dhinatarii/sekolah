<?php

class Mapel_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_matapelajaran')->result();
    }

    public function get_detail_data($id)
    {
        return $this->db->get_where('tb_matapelajaran', ['id_mapel' => $id])->row_array();
    }

    public function get_mapel_with_kelas($id_kelas)
    {
        $this->db->select('tm.id_mapel, tm.nama_mapel, tm.level');
        $this->db->from('tb_matapelajaran tm');
        $this->db->join('tb_pengajar tp', 'tm.id_mapel = tp.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas = tk.id_kelas', 'left');
        $this->db->where('tk.id_kelas', $id_kelas);
        return $this->db->get();
    }

    public function input_data()
    {
        $data = array(
            'nama_mapel'    => $this->input->post('nama_mapel', TRUE),
            'level'         => $this->input->post('level', TRUE),
        );

        $this->db->insert('tb_matapelajaran', $data);
        $this->db->insert_id();
    }

    public function edit_data($id)
    {
        $data = array(
            'nama_mapel'    => $this->input->post('nama_mapel', TRUE),
            'level'         => $this->input->post('level', TRUE),
        );

        $this->db->where('id_mapel', $id);
        $this->db->update('tb_matapelajaran', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_matapelajaran', ['id_mapel' => $id]);
    }

    var $column_order = array(null, 'nama_mapel', 'level'); //Sesuaikan dengan field
    var $column_search = array('nama_mapel', 'level'); //field yang diizin untuk pencarian 
    var $order = array('level' => 'asc'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from('tb_matapelajaran');

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
        $this->db->from('tb_matapelajaran');
        return $this->db->count_all_results();
    }
}
