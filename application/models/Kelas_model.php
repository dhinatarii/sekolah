<?php
class Kelas_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_kelas')->result();
    }

    public function get_detail_data($id)
    {
        return $this->db->get_where('tb_kelas', ['id_kelas' => $id])->row_array();
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
}
