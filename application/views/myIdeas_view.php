<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/homeBackground.css' type='text/css' />		
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
			echo "<li style='font-size:20px'>";
			$url=base_url()."index.php/Ideas/index/$row->Iid";
			echo "<a href='$url'>$row->title</a>";
			echo "</br>Poineer Time:$row->dateOfInit";
			echo "</li>";
		}
		?>
	</ul>
	
	
</body>
</html>