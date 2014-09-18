<!doctype html>
<html>
    <head>
        <link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('resources/css/bootstrap-theme-min.css'); ?>" rel="stylesheet">
          <link href="<?php echo base_url('resources/css/bootstrap.min.js'); ?>" rel="stylesheet">
          <link href="style.css" rel="stylesheet">
       <title>
            home page
        </title>
    </head>
    <body> 
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                     <h2>welcome..</h2>
                     <h4>    <?php echo $this->session->flashdata('alert_user');?> </h4>
                     <h4>   <?php echo $this->session->flashdata('alert_success');?></h4>
                     <h4>  <?php echo $this->session->flashdata('alert_error');?></h4>
              
                           <ul class="nav nav-pills">
                                      <li class=""><a href="<?php echo base_url(); ?>home/add_company" class="button">ADD ORGANIZATION</a></li>
                                      <li><a href="<?php echo base_url(); ?>home/add_user" class="button">ADD user</a></li>
                                      <li><a href="<?php echo base_url(); ?>login/sign_out" class="button">SIGN OUT</a></li>
                           </ul>
                     
            </div>     
        </div>
            
       </div>
     </body>
</html>

