<?php


class Dashboard extends CI_Controller{
    public function __construct(){
        parent::__construct();
        if(!$this->session->userdata('credentials')){
            redirect(base_url("login"));
        }
        $this->load->model("Sales_model");
    }

    public function index(){
        if (isset($_SESSION['logged_in'])){
            $data["info"] = $this->session->userdata("credentials");
            $data["user_type"] =  $data["info"]->user_type;

            //Categories in Sales
            $data["floor"] = $this->Sales_model->cat_floor();
            $data["grand"] = $this->Sales_model->cat_grand();
            $data["pendant"] = $this->Sales_model->cat_pendant();
            $data["suspension"] = $this->Sales_model->cat_suspension();
            $data["table"] = $this->Sales_model->cat_table();
            $data["wall"] = $this->Sales_model->cat_wall();
            
            $page_data = array(
                'title' => "Dashboard",
                'style' => "footer",
            );

            $this->session->set_userdata($data);
            $this->load->view("common", $page_data);
            $this->load->view("navbar");
            $this->load->view("dashboard_page",$data);
            $this->load->view("footer");
        } else{
            redirect(base_url("login"));
        }
    }
    public function cashier(){
        if (isset($_SESSION['logged_in'])){
            $page_data = array(
                'title' => "Dashboard",
                'style' => "footer",
            );

            $this->load->view("common", $page_data);
            $this->load->view("navbar");
            $this->load->view("cashier_page");
            $this->load->view("footer");
        } else{
            redirect(base_url("login"));
        }
    }

}

?>