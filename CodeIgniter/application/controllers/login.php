<?php
defined('BASEPATH') OR exit('No direct script access allowed');

session_start();

class Login extends CI_Controller {

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
    
    public function index()
    {    
        $this->load->view("login");  
    }  

    public function login_process()
    {
        $this->load->library('form_validation');
        $this->form_validation->set_rules("email", "Email", 'required');  
        $this->form_validation->set_rules("password", "Password", 'required'); 

        if($this->form_validation->run())  
        {
            //true
            $this->load->model("login_model");  
            $data = array(  
                "email"     =>$this->input->post("email"),  
                "password"     =>$this->input->post("password")    
            ); 

            $login_result = $this->login_model->login_process($data);
            if($login_result == TRUE){
                redirect(base_url() . "main/");  
            }
            else{
                $data = array(
                    'error_message' => 'Invalid Username or Password'
                );
                $this->load->view('login', $data);
            }
        }
        else{
            //false
            $this->index(); 
        }
    }

    public function logout()
    {
        $data['logout_message'] = 'Successfully Logout';
        $this->load->view('login', $data);

    }
}
