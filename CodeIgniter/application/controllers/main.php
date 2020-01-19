<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

    public function __construct() {
        parent:: __construct();

        $this->load->helper('url');
        $this->load->model('main_model');
        $this->load->library("pagination");
    }
    
    // public function index()
    // {  
    //     $this->load->model("main_model");  
    //     $data["fetch_data"] = $this->main_model->fetch_data();  
    //     $this->load->view("main_view", $data);  
    // }  

    public function index()
    {  
        // $this->load->model("main_model");  
        // $data["fetch_data"] = $this->main_model->fetch_data();  
        // $this->load->view("main_view", $data); 
        
        $config = array();
        $config["base_url"] = base_url() . "main";
        $config["total_rows"] = $this->main_model->get_count();
        $config["per_page"] = 10;
        $config["uri_segment"] = 2;

        $this->pagination->initialize($config);

        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;

        $data["links"] = $this->pagination->create_links();

        $data['fetch_data'] = $this->main_model->get_authors($config["per_page"], $page);

        $this->load->view('main_view', $data);
    }  

    public function delete_data(){  
        $id = $this->uri->segment(3);  
        $this->load->model("main_model");  
        $this->main_model->delete_data($id);  
        redirect(base_url() . "main/deleted");    
    }  

    public function deleted()  
    {  
        $this->index();  
    }

    public function form_validation()
    {
        // echo 'OK';
        $this->load->library('form_validation');
        $this->form_validation->set_rules("first_name", "First Name", 'required');  
        $this->form_validation->set_rules("last_name", "Last Name", 'required'); 
        $this->form_validation->set_rules("phone_number", "Phone Number", 'required');  
        $this->form_validation->set_rules("email", "Email", 'required');   
        if($this->form_validation->run())  
        {  
            //true  
            $this->load->model("main_model");  
            $data = array(  
                  "c_fname"     =>$this->input->post("first_name"),  
                  "c_lname"     =>$this->input->post("last_name"),
                  "c_mobileNo"  =>$this->input->post("phone_number"),
                  "c_email"     =>$this->input->post("email")      
            ); 

             if($this->input->post("update"))  
             {  
                  $this->main_model->update_data($data, $this->input->post("hidden_id"));  
                  redirect(base_url() . "main/updated");  
             }  
             if($this->input->post("insert"))  
             {  
                 $this->main_model->insert_data($data);  
                 redirect(base_url() . "main/inserted");  
             }  
        }  
        else  
        {  
            //false  
            $this->index();  
        }  
    }

    public function inserted()  
    {  
       $this->index();  
    }  

    public function updated()  
    {  
        $this->index();  
    } 

    public function update_data()
    {
        $config["per_page"] = 10;
        $page = ($this->uri->segment(2)) ? $this->uri->segment(2) : 0;
        $data["links"] = $this->pagination->create_links();
        
        $user_id = $this->uri->segment(3);  
        $this->load->model("main_model");  
        $data["user_data"] = $this->main_model->fetch_single_data($user_id); 
        // $data["fetch_data"] = $this->main_model->fetch_data();  
        $data['fetch_data'] = $this->main_model->get_authors($config["per_page"], $page);
        $this->load->view("main_view", $data);  
    }
    
}
