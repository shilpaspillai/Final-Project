<!doctype html>
<html>
    <head>
      
       <link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('resources/css/bootstrap-theme-min.css'); ?>" rel="stylesheet">
          <link href="<?php echo base_url('resources/css/bootstrap.min.js'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('style.css'); ?>" rel='stylesheet'>
         <title>
            add new user
        </title>
    </head> 
    <body>
        <div class="container">
   
                    <h4><?php echo $this->session->flashdata('alert_error');?> </h4>
                      <h4><?php echo $this->session->flashdata('alert_usrer');?> </h4>
                      <h4><?php echo $this->session->flashdata('alert_company');?> </h4>
               
                 <?php echo form_open('login/add_user')?>
                 <div class="row">
                 <div class="col-md-6">
                      <h1>user details</h1>
                <div class="form-group">
                    <label for="username" class="col-md-offset-3">username </label>
                    <input class="form-control" type="text" name="username" id="username">
                </div>
                     <div class="form-group">
                     <label for="password" class="col-md-offset-3">password </label>
                     <input class="form-control" type="password" name="password" id="password">
                  </div>   
                <div class="ac"> company: <select name="companyname" id="companyname" class="form-control"></div>
                       <option> </option>
                <?php 
                 foreach($groups as $rowd)
                       { 
                       echo '<option value="'.$rowd->id.'">'.$rowd->company_name.'</option>';
                      }
                ?>
                 </select>
                   <input type="submit" name="submit" value="submit"> 
                </div>
              </div>
           </div>
        <?php echo form_close(); ?>
        </div>
     </body>
</html>