<?php
class Kelas_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_kelas')->result();
    }

    public function get_like_data($query)
    {
        $this->db->like('kelas', $query, 'both');
        return $this->db->get('tb_kelas');
    }

    public function get_count()
    {
        return $this->db->get('tb_kelas')->num_rows();
    }

    public function get_detail_data($id)
    {
        return $this->db->get_where('tb_kelas', ['id_kelas' => $id])->row_array();
    }

    public function get_id_kelas()
    {
        $kelas = $this->input->post('kelas', TRUE);
        $this->db->select('id_kelas');
        $this->db->where('kelas', $kelas);
        $row = $this->db->get('tb_kelas')->row();
        return $row->id_kelas;
    }

    public function input_data()
    {
        $data = array(
            'kelas'         => $this->input->post('kelas', TRUE),
            'wali_kelas'    => $this->input->post('wali_kelas', TRUE),
        );

        $this->db->insert('tb_kelas', $data);
    }

    public function edit_data($id)
    {
        $data = array(
            'kelas'         => $this->input->post('kelas', TRUE),
            'wali_kelas'    => $this->input->post('wali_kelas', TRUE),
        );

        $this->db->where('id_kelas', $id);
        $this->db->update('tb_kelas', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_kelas', ['id_kelas' => $id]);
    }

    var $column_order = array(null, 'kelas', 'wali_kelas'); //Sesuaikan dengan field
    var $column_search = array('kelas', 'wali_kelas'); //field yang diizin untuk pencarian 
    var $order = array('kelas' => 'asc'); // default order 

    private function _get_datatables_query()
    {

        $this->db->from('tb_kelas');

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
        $this->db->from('tb_kelas');
        return $this->db->count_all_results();
    }
}
