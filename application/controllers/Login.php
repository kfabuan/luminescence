<?php

class Login extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("Login_model");
    }

    public function index(){
        $this->load->view("login_page");
    }
    public function login_credentials(){
        $this->form_validation->set_rules("username","username","required|valid_email");
        $this->form_validation->set_rules("password","password","required");


        if($this->form_validation->run()){
            $username = $this->input->post("username");
            $password = $this->input->post("password");

            $login = $this->Login_model->get($username, $password);

            if($login){
                $data["credentials"] = $login;
                $this->session->set_userdata($data);

                redirect(base_url("dashboard"));
                
            }else{
                $this->session->set_flashdata("status", "Wrong Credentials. Please Try Again");
                $this->load->view("login_page");
            }
          
        }else{
           $this->load->view("login_page");
        }
    }
    public function logout(){
        $this->session->unset_userdata("credentials");
        redirect(base_url("login"));
    }
}


?>