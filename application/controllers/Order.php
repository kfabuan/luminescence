<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller{
    public function __construct(){
        parent::__construct();

        $this->load->model("Product_model");
        $this->load->model("Order_model");
    }
    public function index(){
        $user = array();
        $user = $this->session->userdata("credentials");
        $data["products"] = $this->Product_model->get_pro_sale();
        $data["emp"] = $user->fname;
        $data["id"] = $user->emp_id;

        $page_data = array(
            'title' => "POS",
            'style' => "footer",
        );

        $this->load->view("common", $page_data);
        $this->load->view("navbar");
        $this->load->view("order_page",$data);
        $this->load->view("footer");
    }
    public function create(){
        $this->form_validation->set_rules("pn","pn","required");
        $this->form_validation->set_rules("quantity","quantity","required");
        $this->form_validation->set_rules("amntpaid","amntpaid","required");

        if($this->form_validation->run()){
            $data["emp_id"] = $this->input->post("id");
            $data["prod_name"] = $this->input->post("pn");
            $data["quantity"] = $this->input->post("quantity");
            $data["price"] = $this->input->post("price");
            $data["total"] = $this->input->post("total");
            $data["amount_paid"] = $this->input->post("amntpaid");
            $data["amount_tendered"] = $this->input->post("tendered");
            $data["sales_date"] = $this->input->post("date");
            $data["order_id"] = $this->input->post("unique");

            // $id = $this->input->post("prod_name");
            // $quantity = $this->input->post("quantity");
            
            $insertData = $this->Order_model->insert($data);
            if($insertData){
                $this->session->set_flashdata("status", "Successfully Inserted");
                $updateData = $this->Product_model->product_order_update($data["prod_name"],$data["quantity"]);
                redirect(base_url("order/summary/".$data["order_id"]));
               
            }
            
        }else{
            redirect(base_url("order"));
        }
    }


    public function summary($order_id){
        $summary = $this->Order_model->summary($order_id);

        $page_data = array(
            'title' => "Summary",
            'style' => "footer",
        );

        $this->load->view("common", $page_data);
        $this->load->view("navbar");
        $this->load->view("summary_page",$summary);
        $this->load->view("footer");

    }
 
}











?>