<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="stylesheet" href="<?php echo base_url(); ?>/assets/stylesheets/log.css" 
 type="text/css" media="screen"/>
 	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	<meta charset="utf-8"/>
	<title>Sign up page</title>
</head>
<body>
<div id="container">
	<div class = "header">
		<h1>Sign Up</h1>
	</div>
	<div class = "body">
		<?php

		echo form_open('index.php/main/signup_validation');
		echo validation_errors();

		echo "<p>Email: ";
		echo form_input('email',$this->input->post('email'));
		echo "</p>";

		echo "<p>Password: ";
		echo form_password('password');
		echo "</p>";

		echo "<p>Confirm Password: ";
		echo form_password('cpassword');
		echo "</p>";
		?>
	</div>
	<div class="footer">
		<!-- DAVID ADDED -->
		<!-- The Cancel button redirects to the home page 
		with some JavaScript code for the "onClick" attribute-->
		<button class="login_bt" type="button" onClick='window.location.href = "<?php echo base_url(); ?>main"'>Cancel</button>
		
		<?php
		echo "<p>";
		echo form_submit('signup_submit','Sign up',"class='login_bt'");
		echo "</p>";
		
		echo form_close();
		?>
	</div>
</div>
</body>
</html>
