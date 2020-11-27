<?php 
class Siswa_model extends CI_Model 
{
    public function get_all_data()
    {
        $this->db->select('*');
        $this->db->from('tb_siswa');
        $this->db->join('tb_orangtua', 'tb_siswa.id_orangtua = tb_orangtua.id_orangtua', 'left');
        $this->db->join('tb_alamat', 'tb_orangtua.id_alamat = tb_alamat.id_alamat', 'left');
        return $this->db->get()->result();
    }
}
