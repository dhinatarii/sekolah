<?php

class Mapel_model extends CI_Model
{
    public function get_data()
    {
        $this->db->select('tb_matapelajaran.id_mapel, tb_matapelajaran.nama_mapel, tb_matapelajaran.level, COUNT(tb_tema.id_mapel) AS jum_tema');
        $this->db->from('tb_matapelajaran');
        $this->db->join('tb_tema', 'tb_matapelajaran.id_mapel = tb_tema.id_mapel', 'left');
        $this->db->group_by('tb_matapelajaran.id_mapel');
        return $this->db->get()->result();
    }

    public function get_detail_data($id)
    {
        $this->db->select('tb_matapelajaran.id_mapel, tb_matapelajaran.nama_mapel, tb_matapelajaran.level, COUNT(tb_tema.id_mapel) AS jum_tema');
        $this->db->from('tb_matapelajaran');
        $this->db->where('tb_matapelajaran.id_mapel', $id);
        $this->db->join('tb_tema', 'tb_matapelajaran.id_mapel = tb_tema.id_mapel', 'left');
        $this->db->group_by('tb_matapelajaran.id_mapel');
        return $this->db->get()->row_array();
    }

    public function input_data()
    {
        $id_mapel = $this->_input_mapel();
        $jum_tema = $this->input->post('jum_tema', TRUE);
        $data = array();

        for ($i = 1; $i <= $jum_tema; $i++) {
            array_push($data, array(
                'tema'      => 'Tema ' . $i,
                'id_mapel'  => $id_mapel
            ));
        }

        $this->db->insert_batch('tb_tema', $data);
    }

    public function edit_data($id)
    {
        $jum_tema = $this->input->post('jum_tema', TRUE);
        $data_tema = array();
        for ($i = 1; $i <= $jum_tema; $i++) {
            array_push($data_tema, array(
                'tema'      => 'Tema ' . $i,
                'id_mapel'  => $id
            ));
        }

        $data = array(
            'nama_mapel'    => $this->input->post('nama_mapel', TRUE),
            'level'         => $this->input->post('level', TRUE),
        );

        // update tema
        $this->db->delete('tb_tema', ['id_mapel' => $id]);
        $this->db->insert_batch('tb_tema', $data_tema);

        // update mapel
        $this->db->where('id_mapel', $id);
        $this->db->update('tb_matapelajaran', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_tema', ['id_mapel' => $id]);
        $this->db->delete('tb_matapelajaran', ['id_mapel' => $id]);
    }

    private function _input_mapel()
    {
        $data = array(
            'nama_mapel'    => $this->input->post('nama_mapel', TRUE),
            'level'         => $this->input->post('level', TRUE),
        );

        $this->db->insert('tb_matapelajaran', $data);
        return $this->db->insert_id();
    }
}
