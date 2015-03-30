<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
	<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/general.css' />		
	<script type="../views/text/javascript" src="js/jquery-2.1.3.js"></script>
	<title>Browse My Ideas</title>
</head>
<header>
	<?php $this->load->view('menubar'); ?>
</header>	
<body>
	<ul>
		<h2>
			My Ideas:
		</h2>
		<?php
		foreach($result->result() as $row){

			echo "<li style='font-size:15px'>";
			$url=base_url()."index.php/Ideas/index/$row->Iid";
			echo "<a href='$url'><h3>$row->title</h3></a>";
			echo "<ul><li>Time:$row->dateOfInit</li></ul>";
			echo "</li>";
		}
		?>
	</ul>
	
	
</body>
</html>
