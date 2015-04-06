<!DOCTYPE html>
<html>
<head>	
<head>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
	<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/general.css' />
	<script type="../views/text/javascript" src="js/jquery-2.1.3.js"></script>
	<title>Restful</title>
</head>
<header>
		<!-- Include the header -->
		<?php $this->load->view('menubar'); ?>
</header>

<body>
	<div>
		<h2>Distribution of ideas</h2>
		<h3>Go to this url: </h3>	
		<a href='<?php echo base_url()."index.php/restful/graph" ?>'><?php echo base_url()."index.php/restful/graph" ?> </a>
	</div>	

	<div>
		<h2>Search the ideas</h2>
		<h3>Go to this url: </h3>	
		<a href='<?php echo base_url()."index.php/restful/ideas/date1/2015-01-29/date2/2015-03-29/num/3" ?>'><?php echo base_url()."index.php/restful/ideas/date1/2015-01-29/date2/2015-03-29/num/3" ?> </a>
		<h3>date1 means starting date while date2 means ending date</h3>
		
	</div>
	
</body>
	
</html>
