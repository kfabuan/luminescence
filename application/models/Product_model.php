<?php

class Product_model extends CI_Model{
    public function get_all($limit,$start){
        $query =  $this->db->select('*')
                    ->select("tbl_emp.fname")
                    ->from('tbl_prod')
                    ->join('tbl_emp', 'tbl_prod.added_by = tbl_emp.emp_id', "inner")
                    ->order_by("prod_id","DESC")
                    ->limit($limit, $start)
                    ->get();
        return $query;
    }
    public function insert($data){
        return $this->db->insert("tbl_prod",$data);
    }


    public function retrieve_one_prod($id){
        $query =  $this->db->select('*')
                    ->select("tbl_emp.fname")
                    ->from('tbl_prod')
                    ->join('tbl_emp', 'tbl_prod.added_by = tbl_emp.emp_id', "inner")
                    ->where("prod_id",$id)
                    ->get();
        return $query->row();
    }

    public function update($idup, $productnameup, $heightup, $widthup, $lengthup, $descup,$catup,
    $origup,$sellup,$stockup,$statusup) {

        $this->db->set("prod_name",$productnameup);
        $this->db->set("height_cm",$heightup);
        $this->db->set("width_cm",$widthup);
        $this->db->set("length_cm",$lengthup);
        $this->db->set("prod_desc",$descup);
        $this->db->set("category",$catup);
        $this->db->set("orig_price",$origup);
        $this->db->set("selling_price",$sellup);
        $this->db->set("stock",$stockup);
        $this->db->set("prod_status",$statusup);
        $this->db->where("prod_id",$idup);
        return $this->db->update("tbl_prod");

    }

    public function delete($id){
        $this->db->where("prod_id",$id);
        return $this->db->delete("tbl_prod");
    }
    public function profile_update($id,$prod_image){
        $this->db->set("prod_img",$prod_image);
        $this->db->where("prod_id",$id);
        return $this->db->update("tbl_prod");
    }


    public function get_pro_sale(){
        $this->db->where("stock > 0");
        $this->db->where("prod_status" , "Active");
        $query = $this->db->get("tbl_prod");
        return $query->result();
    }


    public function product_order_update($id, $quantity){
        $this->db->set("stock",'stock-'.$quantity,FALSE);
        $this->db->where("prod_id",$id);
        return $this->db->update("tbl_prod");
    }
    public function count_row(){
        return $this->db->count_all("tbl_prod");
    }
}

















?>