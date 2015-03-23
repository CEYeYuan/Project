<!DOCTYPE html>
<html lang="en">
<head>
	<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/log.css' />
	<title>Login page</title>
	
</head>
<body>
<div id="container">
	<div class="header">
		<h1>Startup Ideas</h1>
	</div>
	
	<div class="body">
		<?php
			echo form_open('index.php/main/login_validation');
			echo validation_errors();
	
			echo form_input('email',$this->input->post('email'),"placeholder='Email'");
		

			echo form_password('password', '', "placeholder='Password'");
		
		?>
	</div>
	
	<div class="footer">
		<?php
			//echo "<p>";
			echo form_submit('login_submit','Login',"class='login_bt'");
			//echo "</p>";
			echo form_close();
		?>
		<a href='<?php echo base_url()."index.php/main/signup"?>'>Sign Up!</a>
	</div>
	
</div>
</body>
</html>
