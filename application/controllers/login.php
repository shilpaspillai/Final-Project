<?php
class login extends CI_Controller{

	function index() {
	
		if($this->session->userdata('isLoggedIn')) {
			redirect('home/show_home');
		} else{
			$this->show_login();
		}
	}
	
	function show_login()
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
                $this->user_model->validate_user($username,$password);
	        if($username && $password)
                {
                   $qry=$this->user_model->validate_user($username, $password);
                   
                   if($qry==1)
                   {
                    redirect('home/show_home');   
                   }
                   else if($qry==3)
                   {
                  echo '<script>alert("Enter a valid user name!");</script>';
                 redirect('login/show_login', 'refresh');   
                   }
                   else if($qry==2)
                   {   $this->load->helper('form');
                      $this->load->view('user_page');
                   }
                   else if($qry==FALSE)
                   {
                redirect('login/show_login','refresh');
                   }
                 else
                   {
                 echo '<script>alert("Enter a valid user name!");</script>';
                 redirect('login/show_login', 'refresh');
                   }
                } 
            }
        
         function sign_out()
           {
          $this->session->sess_destroy();
          $this->index();
         }
                 
         function add_user()
         {       
             $this->load->model('user_model');
             $usname=$this->input->post('username');
             $pass=$this->input->post('password');
             $cname=$this->input->post('companyname');
            $qr['insert']=$this->user_model->user_insert($usname,$pass,$cname);
            if($qr['insert'] == FALSE)
            {
            $this->session->set_flashdata("alert_error", "The data already exist"); 
            redirect('home/add_user', 'refresh');
             } 
             else{
              $this->session->set_flashdata("alert_error", "USER data entered successfully!");   
              redirect('home/show_home', 'refresh');
               }
         }
  }

           
?>
