 <?php
 class company_model extends CI_Model{
 
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
         function getAllGroups()
         {//function for display companies.
           $query = $this->db->query('SELECT id,company_name FROM add_company');
           return $query->result();
         }
         function check_company($cid)
         {
         $this->db->from('add_company');
         $this->db->select('company_name');
         $this->db->where('id',$cid);
         $log=$this->db->get()->result();
         if(count($log)==1)
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
    