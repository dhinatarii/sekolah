<?php
class Ekstrakurikuler_model extends CI_Model
{
    public function get_all_data()
    {
        return $this->db->order_by('id_ekstrakurikuler', 'ASC')->get('tb_ekstrakurikuler')->result();
    }

    public function get_data_by_id($id)
    {
        return $this->db->get_where('tb_ekstrakurikuler', ['id_ekstrakurikuler' => $id])->row_array();
    }

    public function insert_data($data)
    {
        return $this->db->insert('tb_ekstrakurikuler', $data);
    }

    public function update_data($id, $data)
    {
        $this->db->where('id_ekstrakurikuler', $id);
        return $this->db->update('tb_ekstrakurikuler', $data);
    }

    public function delete_data($id)
    {
        $this->db->where('id_ekstrakurikuler', $id);
        return $this->db->delete('tb_ekstrakurikuler');
    }

    // Fungsi untuk mencari data ekstrakurikuler berdasarkan kolom pramuka, drum band, tapak suci, atau kaligrafi
    public function search_data($keyword)
    {
        $this->db->like('pramuka', $keyword);
        $this->db->or_like('drumband', $keyword);
        $this->db->or_like('tapak_suci', $keyword);
        $this->db->or_like('kaligrafi', $keyword);
        return $this->db->get('tb_ekstrakurikuler')->result();
    }

    // Fungsi untuk menghitung total ekstrakurikuler
    public function count_all()
    {
        return $this->db->count_all('tb_ekstrakurikuler');
    }
}
