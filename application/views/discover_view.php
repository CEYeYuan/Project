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
	
	<!-- Display Category name -->
	<h2><?php echo $category[0]->name;?></h2>
	
	<h3>Most Popular</h3>
	
	<hr>
	
	<table>
	<!-- Display the 3 most popular projects in the Category -->
	<?php
		// the $picDir is only to be temporarily used
		$picDir = base_url() . "assets/images/";
		
		foreach($results as $row) {
			echo "<tr valign='top'><td>";
			echo "<img src=" . "'" . $picDir . "wireframe.png' alt='tmpPic'>";
			
			echo "</td>";
			echo "<td>";
			echo "<a href='" . base_url() . "project/index/" . $row->pid . "'>";
			echo $row->pname . "</a>";
			echo "<br>";
			echo "<br>";
			echo "$row->description</td></tr>";
		}
	?>
	</table>
	
	</body>
</html>