<?php

class home extends CI_Controller{

	public function __construct() {
		parent::__construct();
		
		if(!$this->session->userdata('isLoggedIn')) {
			redirect ('/login/show_login');
		}
	}
     	
	function show_home()
        {
	$this->load->view('home');
	}
         function add_user()
         {
        $this->load->model('user_model');
        $data['groups'] =$this->user_model->getAllGroups();
        $this->load->helper('form');
        $this->load->view('adduser',$data);   
        }
        function  add_company()
         {
         $this->load->helper('form');
         $this->load->view('addcompany');   
         }
        function company_insert()
        {   
            $cname=$this->input->post('company-name');
            $this->load->model('user_model');
            $data['insert_company']=$this->user_model->company_insert($cname);
            if($data['insert_company'] == false)
            {
            echo '<script>alert("The data already exists!");</script>';
               redirect('home/add_company', 'refresh');
            } 
            else
            {
            echo '<script>alert("You Have Successfully updated this Record!");</script>';
            redirect('home/show_home', 'refresh');
            }
        }
       
        
    
}
