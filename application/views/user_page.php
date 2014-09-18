<!doctype html>
<html>
    <head>
          <link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('resources/css/bootstrap-theme-min.css'); ?>" rel="stylesheet">
          <link href="<?php echo base_url('resources/css/bootstrap.min.js'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('style.css'); ?>" rel='stylesheet'>
        <title>
        user page
        </title>
    </head>
    <body>
        <div class="container">
                 <div class="row">
                <div class="col-md-6 col-lg-offset-4">
                    <div class="user-data">
         <h1> "Welcome <?php print_r($this->session->userdata['username']);?> TO <?php print_r($this->session->userdata['company_name']);  ?>"</h1> 
                    </div>
                    <div class="align-botton">
                    <a href="<?php echo base_url(); ?>login/sign_out" class="botton">signout</a> 
                    </div>
                </div>
            </div>
        </div>  
   </body>
</html>