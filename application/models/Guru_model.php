<?php
class Guru_model extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('tb_guru')->result();
    }

    public function get_data_only_name()
    {
        $this->db->select('nama');
        return $this->db->get('tb_guru')->result();
    }

    public function get_detail_data($id)
    {
        return $this->db->get_where('tb_guru', ['id_guru' => $id])->row_array();
    }

    public function input_data()
    {
        $data = array(
            'nip'           => $this->input->post('nip', TRUE),
            'nama'          => $this->input->post('nama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'no_hp'         => $this->input->post('no_hp', TRUE),
            'email'         => $this->input->post('email', TRUE),
            'alamat'        => $this->input->post('alamat', TRUE)
        );

        $this->db->insert('tb_guru', $data);
    }

    public function edit_data($id)
    {
        $data = array(
            'nip'       => $this->input->post('nip', TRUE),
            'nama'      => $this->input->post('nama', TRUE),
            'jenis_kelamin' => $this->input->post('jenis_kelamin', TRUE),
            'tanggal_lahir' => $this->input->post('tanggal_lahir', TRUE),
            'no_hp'     => $this->input->post('no_hp', TRUE),
            'email'     => $this->input->post('email', TRUE),
            'alamat'    => $this->input->post('alamat', TRUE)
        );

        $this->db->where('id_guru', $id);
        $this->db->update('tb_guru', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_guru', ['id_guru' => $id]);
    }
}
