<!DOCTYPE html>
<html lang="en">
<head>
	<link rel='stylesheet' href='assets/stylesheets/log.css' type='text/css' />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
	
	<meta charset="utf-8">
	<title>Login page</title>
	
</head>
<body>
<div id="container">
	<div class="header">
		<h1>Startup</h1>
	</div>
	
	<div class="body">
		<?php
			echo form_open('index.php/main/login_validation');
			echo validation_errors();
			echo form_input('email',$this->input->post('email'),"placeholder='Email'");
			echo "<br/>";
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
