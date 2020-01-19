<?php  
class Login_model extends CI_Model  
{
    function login_process($data)
    {
        $condition = "email =" . "'" . $data['email'] . "' AND " . "password =" . "'" . $data['password'] . "'";
        $this->db->select("*");
        $this->db->from("tbl_user");
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();
        
        if($query->num_rows() == 1)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
}  