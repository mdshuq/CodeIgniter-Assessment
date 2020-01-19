<?php  
class Main_model extends CI_Model  
{  
    protected $table = 'tbl_contact';

    function fetch_data()  
    {  
        //$query = $this->db->get("tbl_contact");  
        //$query = $this->db->query("SELECT * FROM tbl_contact ORDER BY id DESC");  
         $this->db->select("*");  
         $this->db->from("tbl_contact");  
         $query = $this->db->get();  
         return $query;  
    }  

    function delete_data($id){  
        $this->db->where("id", $id);  
        $this->db->delete("tbl_contact");  
        //DELETE FROM tbl_user WHERE id = $id  
    } 
    
    function insert_data($data)  
    {  
        $this->db->insert("tbl_contact", $data);  
    }  

    function fetch_single_data($id)  
    {  
        $this->db->where("id", $id);  
        $query = $this->db->get("tbl_contact");  
        return $query;  
        //Select * FROM tbl_user where id = '$id'  
    } 

    function update_data($data, $id)  
      {  
           $this->db->where("id", $id);  
           $this->db->update("tbl_contact", $data);  
           //UPDATE tbl_user SET first_name = '$first_name', last_name = '$last_name' WHERE id = '$id'  
      }  
    //   
    // 

      public function __construct() {
        parent::__construct();
    }

    public function get_count() {
        return $this->db->count_all($this->table);
    }

    public function get_authors($limit, $start) {
        $this->db->limit($limit, $start);
        $query = $this->db->get($this->table);

        return $query->result();
    }
}  