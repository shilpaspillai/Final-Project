<?php
class login extends CI_Controller{

	function index() {
	
		if($this->session->userdata('isLoggedIn')) {
			redirect('home/show_home');
		} else{
			$this->show_login();
		}
	}
	
	function show_login($show_error=false)
                {
                      
		$data['error'] = $show_error;
                $this->load->helper('form');
		$this->load->view('login', $data);
	        }
	
	function login_user()
            {
		$this->load->model('user_model');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
                if($username != NULL && $password != NULL)
                {
                   $qry=$this->user_model->validate_user($username, $password);
                            if($qry['status'])
                            {
                              switch ($qry['mode'])
                               {
                                case 'admin': redirect('home/show_home');
                                         break;
                                case 'user':$this->load->helper('form');
                                      $this->load->view('user_page'); 
                                       break;
                                default :$this->session->set_flashdata("alert_err", "Enter a valid user name and password");
                                        redirect('login/show_login','refresh');
                                       break;
                                }
                            }
                            else
                            {
                            $this->session->set_flashdata("alert_er", "Enter a valid user name"); 
                            redirect('login/show_login', 'refresh');
                            }
                }
                else 
                {
                $this->session->set_flashdata("alert_er", "Enter a valid user name"); 
                 redirect('login/show_login', 'refresh');
                }
                            
                }
                                 
         function sign_out()
           {
           $this->session->sess_destroy();
           $this->index();
           }
                 
         function add_user()
         {  
            $this->load->model('company_model');
            $cid=$this->input->post('companyname');
            $com=$this->company_model->check_company($cid);
                      if($com)
                      {
                      $this->load->model('user_model');
                      $usname=$this->input->post('username');
                      $pass=$this->input->post('password');
                      $cid=$this->input->post('companyname');
                         if($usname != NULL && $pass != NULL && $cid != NULL)
                         {
                         $qr['insert']=$this->user_model->user_insert($usname,$pass,$cid);
                         if($qr['insert'] == FALSE)
                          {
                          $this->session->set_flashdata("alert_error", "The data already exist"); 
                          redirect('home/add_user', 'refresh');
                          } 
                          else
                           {
                           $this->session->set_flashdata("alert_user", "USER data entered successfully!");   
                           redirect('home/show_home', 'refresh');
                           }
                           }
                          else
                           {$this->session->set_flashdata("alert_usrer", "ENTER ALL FIELDS..."); 
                            redirect('home/add_user', 'refresh');}
                           }
                        else
                        {
                        $this->session->set_flashdata("alert_company", "ENTER THE COMPANY"); 
                        redirect('home/add_user', 'refresh');           
                        }
     }
  }

           
?>
