<?php
class User_model extends CI_Model
{
    public function get_data($name)
    {

        $this->db->where('username', $name);
        return $this->db->get('tb_user')->row();
    }

    public function count_user($level)
    {
        return $this->db->get_where('tb_user', ['level' => $level])->num_rows();
    }

    public function get_user($level)
    {
        return $this->db->get_where('tb_user', ['level' => $level])->result();
    }

    public function get_detail_user($id, $level)
    {
        return $this->db->get_where('tb_user', ['id_user' => $id, 'level' => $level])->row_array();
    }

    public function input_data()
    {
        $data = array(
            'username'  => $this->input->post('username', TRUE),
            'password'  => MD5($this->input->post('password', TRUE)),
            'level'     => 'admin',
            'status'    => $this->input->post('status', TRUE)
        );

        $this->db->insert('tb_user', $data);
    }

    public function cek_user()
    {
        return $this->db->get_where('tb_user', ['username' => $this->input->post('username', TRUE)])->num_rows();
    }

    public function edit_data($id)
    {
        $data = array(
            'status' => $this->input->post('status', TRUE),
        );

        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
    }

    public function edit_password($id)
    {
        $data = array(
            'password'  => MD5($this->input->post('password', TRUE)),
        );

        $this->db->where('id_user', $id);
        $this->db->update('tb_user', $data);
    }

    public function delete_data($id)
    {
        $this->db->delete('tb_user', ['id_user' => $id]);
    }
}
