<?php
class Order_model extends CI_Model{
    public function insert($data){
        return $this->db->insert("tbl_saleshistory", $data);
    }
    public function summary($order_id){
    
        $query =  $this->db->select('*')
                    ->select("tbl_emp.fname", "tbl_prod.prod_name")
                    ->from('tbl_saleshistory')
                    ->join('tbl_emp', 'tbl_saleshistory.emp_id = tbl_emp.emp_id', "inner")
                    ->join('tbl_prod', 'tbl_saleshistory.prod_name = tbl_prod.prod_id', "inner")
                    ->where("order_id",$order_id)
                    ->get();
        return $query->row();
    }
}


?>