<?php

class Sales_model extends CI_Model{
    public function cat_floor(){
        $query =  $this->db->select('*')
                    ->select("tbl_prod.prod_name")
                    ->from('tbl_saleshistory')
                    ->join('tbl_prod', 'tbl_saleshistory.prod_name = tbl_prod.prod_id', "inner")
                    ->where("category","Floor")
                    ->get();
                    
        return $query->num_rows();
    }
    public function cat_grand(){
        $query =  $this->db->select('*')
                    ->select("tbl_prod.prod_name")
                    ->from('tbl_saleshistory')
                    ->join('tbl_prod', 'tbl_saleshistory.prod_name = tbl_prod.prod_id', "inner")
                    ->where("category","Grand")
                    ->get();
                    
        return $query->num_rows();
    }
    public function cat_pendant(){
        $query =  $this->db->select('*')
                    ->select("tbl_prod.prod_name")
                    ->from('tbl_saleshistory')
                    ->join('tbl_prod', 'tbl_saleshistory.prod_name = tbl_prod.prod_id', "inner")
                    ->where("category","Pendant")
                    ->get();
                    
        return $query->num_rows();
    }
    public function cat_suspension(){
        $query =  $this->db->select('*')
                    ->select("tbl_prod.prod_name")
                    ->from('tbl_saleshistory')
                    ->join('tbl_prod', 'tbl_saleshistory.prod_name = tbl_prod.prod_id', "inner")
                    ->where("category","Suspension")
                    ->get();
                    
        return $query->num_rows();
    }
    public function cat_table(){
        $query =  $this->db->select('*')
                    ->select("tbl_prod.prod_name")
                    ->from('tbl_saleshistory')
                    ->join('tbl_prod', 'tbl_saleshistory.prod_name = tbl_prod.prod_id', "inner")
                    ->where("category","Table")
                    ->get();
                    
        return $query->num_rows();
    }
    public function cat_wall(){
        $query =  $this->db->select('*')
                    ->select("tbl_prod.prod_name")
                    ->from('tbl_saleshistory')
                    ->join('tbl_prod', 'tbl_saleshistory.prod_name = tbl_prod.prod_id', "inner")
                    ->where("category","Wall")
                    ->get();
                    
        return $query->num_rows();
    }

    public function monthly_sales(){
       $query =  $this->db->query("select date_format(sales_date, '%M') as month, sum(total) as total from tbl_saleshistory group by YEAR(sales_date), MONTH(sales_date) order by YEAR(sales_date), MONTH(sales_date)");
       return $query->result();
    }

    public function number_sales(){
        $query = $this->db->get("tbl_saleshistory");
        return $query->num_rows();
    }

    public function total_sales(){
        $this->db->select_sum("total");
        $query = $this->db->get("tbl_saleshistory");
        return $query->row();
    }

    public function total_product(){
        $query = $this->db->get("tbl_prod");
        return $query->num_rows();
    }

    public function get_all($limit,$start){
            $query =  $this->db->select('*')
                    ->select("tbl_emp.fname")
                    ->from('tbl_saleshistory')
                    ->join('tbl_emp', 'tbl_saleshistory.emp_id = tbl_emp.emp_id', "inner")
                    ->join('tbl_prod', 'tbl_saleshistory.prod_name = tbl_prod.prod_id', "inner")
                    ->limit($limit, $start)
                    ->order_by("sales_id","DESC")
                    ->get();
        return $query->result();
    }
    public function count_row(){
        return $this->db->count_all("tbl_saleshistory");
    }

    public function delete_one($id){
        $this->db->where("sales_id",$id);
        return $this->db->delete("tbl_saleshistory");
    }
}






?>