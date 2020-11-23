<?php 
    class User_model extends CI_Model 
    {
        public function get_data($name)
        {
            
            $this->db->where('username', $name);
            return $this->db->get('user')->row();
            
        }
    }
    
?>