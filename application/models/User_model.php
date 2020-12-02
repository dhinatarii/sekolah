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

    public function input_data()
    {
        $data = array(
            'username'  => $this->input->post('username', TRUE),
            'password'  => MD5($this->input->post('password', TRUE)),
            'level'     => 'admin',
            'status'    => '1'
        );

        $this->db->insert('tb_user', $data);
    }
}
