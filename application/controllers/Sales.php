<?php

class Sales extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("Sales_model");
        $this->load->model("Product_model");
    }
    public function index(){
        if (isset($_SESSION['logged_in'])){

            $config = array();
            $config["base_url"] = base_url("sales"); 
            $config["total_rows"] = $this->Sales_model->count_row();
            $config["per_page"] = 10;
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

            $data["all"] = $this->Sales_model->get_all($config["per_page"],$page);
            $data["sales"] = $this->Sales_model->monthly_sales();
            $data["ns"] = $this->Sales_model->number_sales();
            $data["ts"] = $this->Sales_model->total_sales();
            $data["tp"] = $this->Sales_model->total_product();
            $data["products"] = $this->Product_model->get_pro_sale();

            $page_data = array(
                'title' => "Sales",
                'style' => "footer",
            );

            $this->load->view("common", $page_data);

            $this->load->view("navbar");
            $this->load->view("sales_page",$data);
            $this->load->view("footer");
            
        } else{
            redirect(base_url("login"));
        }
    }


    public function delete($id){
        if (isset($_SESSION['logged_in'])){

            $deleteOne = $this->Sales_model->delete_one($id);
            if($deleteOne){
                $this->session->set_flashdata("status", "Successfully Delete");
                redirect(base_url("sales"));
            }
        } else{
            redirect(base_url("login"));
        }
    }
}










?>