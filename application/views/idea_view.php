<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/homeBackground.css' type='text/css' />		<script type="../views/text/javascript" src="js/jquery-2.1.3.js"></script>
	<title>Browse Ideas</title>
</head>
<header>
	<?php $this->load->view('menubar'); ?>
</header>	
<body>
	<h2><?php echo $username."'s Idea: ".$title; ?> </h2>
	<ul>
		<li>
			<h3>TITLE:</h3>
			<?php echo $title;?>
			
		</li>

		<li>
			<h3>MARKET:</h3>
			<?php echo $market;?>
			
		</li>
		
		<li> 
			<h3>DESCRIPTION:</h3>
			<?php echo $description; ?> 
			
		</li>

		<li>
			<h3>Pioneer Date:</h3>
			<?php echo $dateOfInit; ?>		
		</li>
		<!--><a href="http://www.163.com" onclick="return confirm('Are you sure?')" >Delete </a><!-->
	</ul>
	<?php 
		if($username==$this->session->userdata('username')){
			$url_edit=base_url()."index.php/Ideas/edit/$Iid";
			$url_delete=base_url()."index.php/Ideas/delete/$Iid";
			echo "<p>";
			echo "<a href=$url_delete  >Delete </a>";
			echo "</p>";
			echo "<p>";
			echo "<a href=$url_edit>Edit </a>";
			echo "</p>";
		}

	?>

	
	
</body>
</html>