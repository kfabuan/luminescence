<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Employee extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model("Employee_model");

    }
    // Pag display ng mga Employees
    public function index(){

        $config = array();
        $config["base_url"] = base_url("employee"); 
        $config["total_rows"] = $this->Employee_model->count_row();
        $config["per_page"] = 5;
        $config["uri_segment"] = 2;
        $config['first_tag_open'] = '<div class="btn btn-outline-primary btn-sm">';
        $config['first_tag_close'] = '</div>';
        $config['last_tag_open'] = '<div class="btn btn-outline-primary btn-sm">';
        $config['last_tag_close'] = '</div>';
        $config['next_tag_open'] = '<div class="btn btn-outline-primary btn-sm">';
        $config['next_tag_close'] = '</div>';
        $config['prev_tag_open'] = '<div class="btn btn-outline-primary btn-sm">';
        $config['prev_tag_close'] = '</div>';
        $config['num_tag_open'] = '<div class="btn btn-outline-primary btn-sm">';
        $config['num_tag_close'] = '</div>';
        $config['cur_tag_open'] = '<div class="btn btn-primary btn-sm">';
        $config['cur_tag_close'] = '</div>';

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();

        $data["employees"] = $this->Employee_model->get_all($config["per_page"],$page);

        $page_data = array(
            'title' => "Employee",
            'style' => "footer",
        );

        $this->load->view("common", $page_data);
        $this->load->view("navbar");
        $this->load->view("employees_page",$data);
        $this->load->view("footer");
    
        
        
    }

    // Pag create ng mga Employees
    public function create(){
        $this->form_validation->set_rules("firstname","firstname","required");
        $this->form_validation->set_rules("middlename","middlename","required");
        $this->form_validation->set_rules("lastname","lastname","required");
        $this->form_validation->set_rules("username","username","required|valid_email|is_unique[tbl_emp.uname]");
        $this->form_validation->set_rules("password","password","required");

        if($this->form_validation->run()){
            $fileName = $_FILES["img"]["name"];
            $newName = time()."_"."".$fileName;

            $config['upload_path']  = './images/';
            $config['allowed_types']    = 'gif|jpg|png';
            $config["file_name"]    =  $newName;

            $this->load->library('upload', $config);
            if ( ! $this->upload->do_upload("img"))
            {
                redirect(base_url("employee"));
            }else{   

                $uploadedFile = $this->upload->data("file_name");
                
                $data["user_type"] = $this->input->post("type");
                $data["fname"] = $this->input->post("firstname");
                $data["mname"] = $this->input->post("middlename");
                $data["lname"] = $this->input->post("lastname");
                $data["uname"] = $this->input->post("username");
                $data["passw"] = $this->input->post("password");
                $data["date_added"] =  date("Y-m-d");
                $data["emp_status"] = $this->input->post("status");
                $data["emp_image"] = $uploadedFile;

                $insertData = $this->Employee_model->insert($data);
              
                if($insertData){
                   
                    if($this->Employee_model->send_email($data["uname"])){
                        $this->session->set_flashdata("emp_status", "Successfully Inserted. Please Visit your email to confirm your registration");
                        redirect(base_url("employee"));
                    }
                }else{
                    redirect(base_url("employee"));
                }
            }

        }else{
            redirect(base_url("employee"));
            
            // $data["employees"] = $this->Employee_model->get_all(1,0);

            // $page_data = array(
            //     'title' => "Employees",
            //     'style' => "footer",
            // );
            // $this->load->view("common", $page_data);
            // $this->load->view("navbar");
            // $this->load->view("employees_page",$data);
            // $this->load->view("footer");
        }

    }



    public function verify($hash){
        if($this->Employee_model->verifyemailid($hash)){
            $this->session->set_flashdata("success", "Successfully Verified. You can Login your account now. 😊");
            redirect(base_url("login"));
        }
    }

    // Pag retrieve ng isang employee at pag display ng information niya
    public function retrieve($id){
        $result = $this->Employee_model->retrieve($id);
        echo json_encode($result);
    }

    // Pag update ng employee
    public function update(){
        $this->form_validation->set_rules("firstnameup","firstname","required");
        $this->form_validation->set_rules("middlenameup","middlename","required");
        $this->form_validation->set_rules("lastnameup","lastname","required");
        $this->form_validation->set_rules("usernameup","username","required");
        $this->form_validation->set_rules("passwordup","password","required");
        $this->form_validation->set_rules("typeup","typeup","required");
        $this->form_validation->set_rules("statusup","statusup","required");

        if($this->form_validation->run()){
              
            $user_type = $this->input->post("typeup");
            $fname = $this->input->post("firstnameup");
            $mname = $this->input->post("middlenameup");
            $lname = $this->input->post("lastnameup");
            $uname = $this->input->post("usernameup");
            $passw = $this->input->post("passwordup");
            $emp_status = $this->input->post("statusup");
            $emp_id = $this->input->post("idup");
           
            $updateData = $this->Employee_model->update($emp_id, $user_type, $fname, $mname, $lname, $uname,$passw,$emp_status);
            $this->session->set_flashdata("status", "Successfully Updated");
            redirect(base_url("employee"));
               
        }

        }

        // pag delete ng employee
    public function delete($id){
        $deleteData = $this->Employee_model->delete($id);
        if($deleteData){
            $this->session->set_flashdata("status", "Successfully Deleted");
            redirect(base_url("employee"));
        }
    }

    // Pag view ng details
    public function detail($id){
        $result = $this->Employee_model->retrieve($id);
        $data["result"] = $result;

        $this->load->view("navbar");
        $this->load->view("empdetails_page",$data);
        $this->load->view("footer");
    }

    // Pag change ng Profile
    public function profile_update($id){
        
        $fileNames = $_FILES["emprof"]["name"];
        $newNames = time()."_"."".$fileNames;

        $config['upload_path']  = './images/';
        $config['allowed_types']    = 'gif|jpg|png';
        $config["file_name"]    =  $newNames;

        $this->load->library('upload', $config);
        if (!$this->upload->do_upload("emprof"))
        {
            redirect(base_url("employee"));
        }else{   

            $uploadedFile = $this->upload->data("file_name");
            $emp_image = $uploadedFile;

            $updateData = $this->Employee_model->profile_update($id,$emp_image);
            echo "hello";
            $this->session->set_flashdata("status", "Successfully Updated your Photo");
            redirect(base_url("employee/detail/".$id));
            
    }

        }
    }


    
    














?>