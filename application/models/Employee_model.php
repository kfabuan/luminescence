<?php

class Employee_model extends CI_Model{
    public function get_all($limit,$start){
        $this->db->limit($limit, $start);
        $this->db->order_by("emp_id", "DESC");
        $query = $this->db->get("tbl_emp");
        return $query->result();
    }
    
    public function insert($data){
        return $this->db->insert("tbl_emp",$data);
    }
    public function retrieve($id){
        $this->db->where("emp_id",$id);
        $query = $this->db->get("tbl_emp");
        return $query->row();
    }
    public function update($emp_id, $user_type, $fname, $mname, $lname, $uname,$passw,$emp_status){
        $this->db->set("user_type",$user_type);
        $this->db->set("fname",$fname);
        $this->db->set("mname",$mname);
        $this->db->set("lname",$lname);
        $this->db->set("uname",$uname);
        $this->db->set("passw",$passw);
        $this->db->set("emp_status",$emp_status);
        $this->db->where("emp_id",$emp_id);
        return $this->db->update("tbl_emp");
    }
    public function delete($id){
        $this->db->where("emp_id",$id);
        return $this->db->delete("tbl_emp");
    }
    public function profile_update($id, $emp_image){
        $this->db->set("emp_image",$emp_image);
        $this->db->where("emp_id",$id);
        return $this->db->update("tbl_emp");
    }


    public function send_email($to){
        $from_email = 'johndoe11321106@gmail.com'; //change this to yours
        $subject = 'Verify Your Email Address';
        $message = 'Dear User,<br /><br />Please click on the below activation link to verify your email address.<br /><br /> http://localhost/psolights/employee/verify/' . md5($to) . '<br /><br /><br />Thanks<br />Mydomain Team';
        
        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; //smtp host name
        $config['smtp_port'] = '465'; //smtp port number
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'qwerty1132'; //$from_email password
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        $this->load->library('email', $config);
        $this->email->initialize($config);
        
        //send mail
        $this->email->from($from_email);
        $this->email->to($to);
        $this->email->subject($subject);
        $this->email->message($message);
        if($this->email->send()){
            return true;
        }else{
            return false;
        };
    }


    function verifyemailid($key)
    {
        $this->db->set("emp_status", "Active");
        $this->db->where('md5(uname)', $key);
        return $this->db->update('tbl_emp');
    }
    public function count_row(){
        return $this->db->count_all("tbl_emp");
    }
}













?>