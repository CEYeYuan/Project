<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/homeBackground.css' type='text/css' />		<script type="../views/text/javascript" src="js/jquery-2.1.3.js"></script>
	<title>Browse My Ideas</title>
</head>
<header>
	<?php $this->load->view('menubar'); ?>
</header>	
<body>
	<?php
		echo $result->result();
	?>
	
</body>
</html>