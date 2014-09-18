<!doctype html>
<html>
    <head>
        <link href="<?php echo base_url('resources/css/bootstrap.min.css'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('resources/css/bootstrap-theme-min.css'); ?>" rel="stylesheet">
         <link href="<?php echo base_url('resources/css/bootstrap.min.js'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('style.css'); ?>" rel='stylesheet'>
        <title> login page</title>
    </head> 
    <body>
        <div class="container">
	<div class="row">
            <div class="col-md-6 col-md-offset-3">
        <h4><?php echo $this->session->flashdata('alert_er');?> </h4>
          <h4> <?php echo $this->session->flashdata('alert_err');?> </h4>
         
		<div class="loginbox">
		<legend>Please Sign In</legend>
			<?php if(isset($error) && $error): ?>
				<div class="alert alert-error">
					<a class="close" data-dismiss="alert" href="#">x</a>Incorrect Username or Password!
				</div>
			<?php endif; ?>
              		<?php echo form_open('login/login_user') ?>
			<!-- Login Box Starts Here -->
			<input type="text" id="username" class="span4" name="username" placeholder="Username"><br/><br/>
			<input type="password" id="password" class="span4" name="password" placeholder="Password"><br/><br/>
			<button type="submit" name="submit" class="btn btn-success">Sign in</button>
                          <h4>    <?php echo $this->session->flashdata('alert_adm');?> </h4>
			<?php echo form_close();?>
		</div>
            </div>
	</div>
       </div>
    </body>
</html>