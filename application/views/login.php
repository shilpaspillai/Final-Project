<!doctype html>
<html>
    <head>
        <link href="style.css" rel="stylesheet">
        <title> login page</title>
    </head> 
    <body>
      
<div class="container-login">
	<div class="row">
	<br/>
        <h4>    <?php echo $this->session->flashdata('alert_er');?> </h4>
          <h4>    <?php echo $this->session->flashdata('alert_err');?> </h4>
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
			<button type="submit" name="submit" class="btn btn-info btn-block">Sign in</button>
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
    </body>
</html>