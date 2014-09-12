<?php

class user_model extends CI_Model {

	var $details;
        var $invalid;
 function validate_user($username, $password)
            {
            $this->db->from('admin_panel');
            $this->db->where('username', $username);
            $this->db->where('password',crypt(($password), 'rl'));
            $login = $this->db->get()->result();
            if(is_array($login) && count($login) == 1)
                    {
                        $this->details = $login[0];
                        if($login[0]->role == 1)
                        {
                        echo "123";
                        $this->set_session();
                        return array('status'=>true,'mode'=>'admin');
                        }
                        else if($login[0]->role==2)
                        {
                        $this->set_session();
                        return array('status'=>true,'mode'=>'user');
                        }
                    }
                    else
                     {
                     return array('status'=>false,'mode'=>'admin','msg'=>'incorrect username or password');
                     }
                }
            
 
	function set_session() {
		$this->session->set_userdata( array(
			'id' => $this->details->id,
		        'username' => $this->details->username,
                        'company_name' =>$this->details->company_name,
              	         'isLoggedIn' => true
			)
		);
	}
        function company_insert($cname)
        {
            
        $this->db->from('add_company');
        $this->db->select('*');
        $this->db->where('company_name',$cname);
         $log= $this->db->get()->result();
       if(count($log)==1)
       {
        return false;
       }
       else 
       {
            $qry="insert into add_company(company_name)values('$cname')";
            mysql_query($qry);
            return true;
         }
         }
    
      function user_insert($usname,$pass,$cname)
        {
        //function for inserting users
         $this->db->from('admin_panel');
        $this->db->select('*');
        $this->db->where('username',$usname);
         $log= $this->db->get()->result();
       if(count($log)==1)
       {
        return false;
       }
       else 
       {
        $pas=crypt($pass,"rl"); 
        $qr="insert into admin_panel(username,password,company_name,role)values('$usname','$pas','$cname',2)";
        $qry=$this->db->query($qr);
        return true;
        }
       }
     
       function getAllGroups()
         {//function for display companies.
         $query = $this->db->query('SELECT company_name FROM add_company');
         return $query->result();
         }
      
}


?>