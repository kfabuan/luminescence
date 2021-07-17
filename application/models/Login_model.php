<?php

class Login_model extends CI_Model{
    public function get($username, $password){
        $this->db->where("emp_status", "Active");
        $this->db->where("uname", $username);
        $this->db->where("passw", $password);
        $query = $this->db->get("tbl_emp");
        return $query->row();
    }
}










?>