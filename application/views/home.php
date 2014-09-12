<!doctype html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
       <title>
            home page
        </title>
    </head>
    <body>
      
        <div class="admin-container">
                  <div class="admin_heading">
                     <h2>welcome..</h2>
                     <h4>    <?php echo $this->session->flashdata('alert_user');?> </h4>
                     <h4>   <?php echo $this->session->flashdata('alert_success');?></h4>
                     <h4>  <?php echo $this->session->flashdata('alert_error');?></h4>
                </div>
                       <div class="admin_ref">
                       <div class="align_a">
                       <a href="<?php echo base_url(); ?>home/add_company">ADD ORGANIZATION</a> </div>
                       <div class="align_a"> <a href="<?php echo base_url(); ?>home/add_user">ADD user</a></div>
                    <a href="<?php echo base_url(); ?>login/sign_out">SIGN OUT</a>
                  
                </div>
             </form>
       </div>
     </body>
</html>

