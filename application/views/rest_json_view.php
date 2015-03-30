<!DOCTYPE html>
<html>
<head>
<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
	<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/general.css' />		
	<script type="../views/text/javascript" src="js/jquery-2.1.3.js"></script>
	<title>RESTFUL JSON</title>
</head>
<header>
	<?php $this->load->view('menubar'); ?>
</header>
<body>
	<h3>JSON Result:</h3>
	<p>
		<?php echo $json; ?>
	</p>


</body>
</html>