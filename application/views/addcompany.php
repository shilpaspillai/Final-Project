<!doctype html>
<html>
    <head>
         <link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('resources/css/bootstrap-theme-min.css'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('resources/css/bootstrap.min.js'); ?>" rel="stylesheet">
         <title>add-company </title>
        </head>
          <body>
                <h4><?php echo $this->session->flashdata('alert_error');?></h4>
                 <h4><?php echo $this->session->flashdata('alert_com');?></h4>
                    <?php echo form_open('home/company_insert')?>
                  <div class="row">
                     <div class="col-md-6 col-md-offset-4">
                     <h2> ADD COMPANY </h2>
                     <div class="form-group">
                         <label for="company-name">   company name:</label>
                         <input class="form-control" type="text" name="company-name" id="company-name">
                     </div>
                     <div class="button"><input type="submit" name="submit" value="submit"></div>
                     </div>
                     </div>
                 
      </body>
</html>