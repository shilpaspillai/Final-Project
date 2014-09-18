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
           $insert=$this->user_model->is_admin();
            if($insert)
            {
          $this->load->model('company_model');
          $data['groups'] =$this->company_model->getAllGroups();
          $this->load->helper('form');
          $this->load->view('adduser',$data);   
           }
         else
             {
             $this->session->set_flashdata("alert_adm", "user don't have admin-rights for adding new user and new company!!!");
             redirect ('/login/show_login');
              }
         }
        function  add_company()
         {
         $this->load->helper('form');
         $this->load->view('addcompany');   
         }
        function company_insert()
        {   
            $this->load->model('user_model');    
           $insert=$this->user_model->is_admin();
             if($insert)
             {
             $cname=$this->input->post('company-name');
             
            if($cname != NULL)
            {
            $this->load->model('company_model');
            $data['insert_company']=$this->company_model->company_insert($cname);
            if($data['insert_company'] == false)
            {
            $this->session->set_flashdata("alert_error", "The company already exist");    
            redirect('home/add_company', 'refresh');
            } 
            else
            {
             $this->session->set_flashdata("alert_success", "You Have Successfully updated this Record!");
             redirect('home/show_home', 'refresh');
            }
            }
            else { $this->session->set_flashdata("alert_com", "enter the company");    
            redirect('home/add_company', 'refresh');}
            }
          else 
              {
              $this->session->set_flashdata("alert_adm", "user don't have admin-rights for adding new user and new company!!!"); 
             redirect ('/login/show_login'); 
             }
        }
        
        
   }
       
        
    


