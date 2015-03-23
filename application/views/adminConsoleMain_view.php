<!DOCTYPE html>
<html>
	<head>
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/navbar.css' />
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/catagory.css' />
		<!--<link type="text/css" rel="stylesheet" href='<?php echo base_url()?>assets/stylesheets/project.css' />-->
		<link type='text/css' rel='stylesheet' href='<?php echo base_url() ?>assets/stylesheets/adminConsole.css' />
		<script type="text/javascript" src="assets/js/jquery-2.1.3.js"></script>
	</head>
	
	<header>
		<!-- Include the header -->
		<?php $this->load->view('menubar'); ?>
	</header>
	
	<body>
		<div class="Links">
		
		<!-- Add admin -->
		<a href="<?php echo base_url() ?>adminConsole/addAdmin">Add an Admin</a>
		
		<br>
		
		<!-- Remove an admin -->
		<a href="#">Remove an Admin</a>
		
		</div>
	</body>

</html>