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

    public function get_data()
    {
        $this->db->select('tp.id_pengajar, tp.jabatan, tg.nama as guru, tm.nama_mapel as mapel, tm.level, tk.kelas, tt.nama as tahun');
        $this->db->from('tb_pengajar tp');
        $this->db->join('tb_guru tg', 'tp.id_guru = tg.id_guru', 'left');
        $this->db->join('tb_matapelajaran tm', 'tp.id_mapel = tm.id_mapel', 'left');
        $this->db->join('tb_kelas tk', 'tp.id_kelas  = tk.id_kelas', 'left');
        $this->db->join('tb_tahunajaran tt', 'tp.id_tahun = tt.id_tahun', 'left');
        
        return $this->db->get()->result();
    }
}
