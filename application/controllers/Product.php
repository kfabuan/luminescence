<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model("Product_model");

    }

    // para makuha lahat ng products
    public function index(){
        if (isset($_SESSION['logged_in'])){
            $config = array();
            $config["base_url"] = base_url("product"); 
            $config["total_rows"] = $this->Product_model->count_row();
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

            $data["products"] = $this->Product_model->get_all($config["per_page"],$page);

            $page_data = array(
                'title' => "Products",
                'style' => "footer",
            );

            $this->load->view("common", $page_data);
            $this->load->view("navbar");
            $this->load->view("product_page",$data);
            $this->load->view("footer");
        } else{
            redirect(base_url("login"));
        }

    }
    // pag create ng products
    public function create(){
        if (isset($_SESSION['logged_in'])){

            // added by
            $user = array();
            $user = $this->session->userdata("credentials");
            
            $this->form_validation->set_rules("productname","productname","required|is_unique[tbl_prod.prod_name]");
            $this->form_validation->set_rules("height","height","required");
            $this->form_validation->set_rules("width","width","required");
            $this->form_validation->set_rules("length","length","required");
            $this->form_validation->set_rules("desc","desc","required");
            $this->form_validation->set_rules("cat","cat","required");
            $this->form_validation->set_rules("orig","orig","required");
            $this->form_validation->set_rules("sell","sell","required");
            $this->form_validation->set_rules("stock","stock","required");
            $this->form_validation->set_rules("status","status","required");

            if($this->form_validation->run()){
                $fileName = $_FILES["prodimg"]["name"];
                $newName = time()."_"."".$fileName;

                $config['upload_path']  = './images/';
                $config['allowed_types']    = 'gif|jpg|png|jpeg';
                $config["file_name"]    =  $newName;

                $this->load->library('upload', $config);
                if ( ! $this->upload->do_upload("prodimg"))
                {
                    redirect(base_url("product"));
                }else{   

                    $uploadedFile = $this->upload->data("file_name");
                    
                    $data["prod_name"] = $this->input->post("productname");
                    $data["height_cm"] = $this->input->post("height");
                    $data["width_cm	"] = $this->input->post("width");
                    $data["length_cm"] = $this->input->post("length");
                    $data["prod_desc"] = $this->input->post("desc");
                    $data["category"] = $this->input->post("cat");
                    $data["orig_price"] =  $this->input->post("orig");
                    $data["selling_price"] = $this->input->post("sell");
                    $data["date_added"] = date("Y-m-d");
                    $data["stock"] = $this->input->post("stock");
                    $data["added_by"] = $user->emp_id;
                    $data["prod_status"] = $this->input->post("status");
                    $data["prod_img"] = $uploadedFile;

                    $insertData = $this->Product_model->insert($data);
                    $this->session->set_flashdata("status", "Successfully Inserted");
                    redirect(base_url("product"));   
            }

            }else{
                $this->session->set_flashdata("prod_add_error", "Creat Error: Duplicate Product or Wrong Image Format");
                redirect(base_url("product"));
            }
        } else{
            redirect(base_url("login"));
        }     
    }
    // Pag retrieve ng isang product
    public function retrieve($id){
        if (isset($_SESSION['logged_in'])){

            $result = $this->Product_model->retrieve_one_prod($id);
            echo json_encode($result);
        } else{
            redirect(base_url("login"));
        }
    }
    // Pag update ng product
    public function update(){
        if (isset($_SESSION['logged_in'])){
            $this->form_validation->set_rules("productnameup","productnameup","required|is_unique[tbl_prod.prod_name]");
            $this->form_validation->set_rules("heightup","heightup","required");
            $this->form_validation->set_rules("widthup","widthup","required");
            $this->form_validation->set_rules("lengthup","lengthup","required");
            $this->form_validation->set_rules("descup","descup","required");
            $this->form_validation->set_rules("catup","catup","required");
            $this->form_validation->set_rules("origup","origup","required");
            $this->form_validation->set_rules("sellup","sellup","required");
            $this->form_validation->set_rules("stockup","stockup","required");
            $this->form_validation->set_rules("statusup","statusup","required");

            if($this->form_validation->run()){
                
                $productnameup = $this->input->post("productnameup");
                $heightup = $this->input->post("heightup");
                $widthup = $this->input->post("widthup");
                $lengthup = $this->input->post("lengthup");
                $descup = $this->input->post("descup");
                $catup = $this->input->post("catup");
                $origup = $this->input->post("origup");
                $sellup = $this->input->post("sellup");
                $stockup = $this->input->post("stockup");
                $statusup = $this->input->post("statusup");
                $idup = $this->input->post("idup");
            
                $updateData = $this->Product_model->update($idup, $productnameup, $heightup, $widthup, $lengthup, $descup,$catup,
                $origup,$sellup,$stockup,$statusup);
                $this->session->set_flashdata("status", "Successfully Updated");
                redirect(base_url("product"));
                
            }else{
                    $this->session->set_flashdata("prod_upd_error", "Update Error: Duplicate Product or Wrong Image Format");
                    redirect(base_url("product"));
            }
        } else{
            redirect(base_url("login"));
        }
    }
    // Pag remove ng product
    public function delete($id){
        if (isset($_SESSION['logged_in'])){
            $deleteData = $this->Product_model->delete($id);
            if($deleteData){
                $this->session->set_flashdata("status", "Successfully Deleted");
                redirect(base_url("product"));
            }
        } else{
            redirect(base_url("login"));
        }
    }

    // pag view ng details
    public function detail($id){
        if (isset($_SESSION['logged_in'])){
            $data["result"] = $this->Product_model->retrieve_one_prod($id);

            $page_data = array(
                'title' => "Product Detail",
                'style' => "footer",
            );

            $this->load->view("common", $page_data);
            $this->load->view("navbar");
            $this->load->view("proddetails_page",$data);
            $this->load->view("footer");
        } else{
            redirect(base_url("login"));
        }
    }

    // pag change photo ng product
    public function profile_update($id){
        if (isset($_SESSION['logged_in'])){

            $fileNames = $_FILES["prodprof"]["name"];
            $newNames = time()."_"."".$fileNames;

            $config['upload_path']  = './images/';
            $config['allowed_types']    = 'gif|jpg|png|jpeg';
            $config["file_name"]    =  $newNames;

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload("prodprof"))
            {
                redirect(base_url("product"));
            }else{   

                $uploadedFile = $this->upload->data("file_name");
                $prod_image = $uploadedFile;

                $updateData = $this->Product_model->profile_update($id,$prod_image);
                $this->session->set_flashdata("status", "Successfully Updated Product's Photo");
                redirect(base_url("product/detail/".$id));
            }
        } else{
            redirect(base_url("login"));
        }
    }
}

?>