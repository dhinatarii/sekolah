<?php
class Tahun_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_tahunajaran')->result();
    }

    public function get_detail_data($id)
    {
        return $this->db->get_where('tb_tahunajaran', ['id_tahun' => $id])->row_array();
    }

    public function get_active_stats()
    {
        $this->db->order_by('nama', 'desc');
        return $this->db->get_where('tb_tahunajaran', ['status' => 1])->row_array();
    }

    public function get_id_year($name)
    {
        $this->db->select('id_tahun');
        $this->db->where('nama', $name);
        return $this->db->get('tb_tahunajaran')->result();
    }

    public function input_data()
    {
        $data = array(
            'nama'         => $this->input->post('nama', TRUE),
            'status'    => $this->input->post('status', TRUE),
        );

        $this->db->insert('tb_tahunajaran', $data);
    }

    public function edit_data($id)
    {
        $data = array(
            'nama'         => $this->input->post('nama', TRUE),
            'status'    => $this->input->post('status', TRUE),
        );

        $this->db->where('id_tahun', $id);
        $this->db->update('tb_tahunajaran', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_tahunajaran', ['id_tahun' => $id]);
    }
}
