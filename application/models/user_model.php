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
            
   function getCompanyname($company_id)
                 {
                    $this->db->from('add_company');
                    $this->db->select('company_name');
                    $this->db->where('id',$company_id);
                    $res=$this->db->get()->result();
                    return $res[0]->company_name;
                }
                
    function set_session() {
            		 $this->session->set_userdata( array(
			'id' => $this->details->id,
		        'username' => $this->details->username,
                        'company_name' =>  self::getCompanyname($this->details->company_id),
                         'entry_role' => $this->details->role,
              	         'isLoggedIn' => true
			)
		);
	}
       
      function user_insert($usname,$pass,$cid)
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
        $qr="insert into admin_panel(username,password,company_id,role)values('$usname','$pas',$cid,2)";
        $qry=$this->db->query($qr);
        return true;
        }
        }
        function  is_admin()
        {
            //check whether user is admin or not.
         if(($this->session->userdata['entry_role'])==1)
         {
         return true;
         } 
        else
         {
        return false;
         }
        }
     
}
      
 ?>

 
