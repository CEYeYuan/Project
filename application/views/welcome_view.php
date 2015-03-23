<!DOCTYPE html>
<html>
	<head>
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/navbar.css' />
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/catagory.css' />
		<script type="text/javascript" src="assets/js/jquery-2.1.3.js"></script>
	</head>
	
	<header>
		<!-- Include the header -->
		<?php $this->load->view('menubar'); ?>
	</header>
	
	<body>
	

<!-- This section is the main body -->
<div class="catagory">
	
	<h3>Pioneer a creative project!</h3>
	
	<ul class="catList">
	<?php
	
	foreach($results as $row) {
		echo "<li id='$row->cid'>";
		echo "<a href='discover/index/" . $row->cid . "'>";
		echo $row->name;
		echo "</a>";
		echo "</li>";
	}
	
	?>
	</ul>
</div>
	</body>
</html>