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
		}else{
			$url_like=base_url()."index.php/Ideas/like/$Iid";
			$url_dislike=base_url()."index.php/Ideas/dislike/$Iid";
			echo "<p>";
				echo "<a href=$url_like  >Like </a>";
				if($like==1){
					echo "liked";}
			echo "</p>";

			echo "<p>";
				echo "<a href=$url_dislike > Dislike </a>";
				if($like==-1){
					echo "disliked";}
			echo "</p>";

		}

	?>

	
	
</body>
</html>