<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
	<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/homeBackground.css' type='text/css' />		<script type="../views/text/javascript" src="js/jquery-2.1.3.js"></script>
	<title>Browse</title>
</head>
<head>

	<?php $this->load->view('menubar'); ?>
</head>
<body>
	<div>
		
		<form method='post' action='<?php echo base_url()."index.php/browse/filter"?>'>
			<h3>Filter by Market:</h3>	
			<p>
				<input type='checkbox' name='health' checked="checked" /> health
				<input type='checkbox' name='technology' checked="checked" /> technology
				<input type='checkbox' name='education' checked="checked" /> education					
				<input type='checkbox' name='finance' checked="checked" /> finance
				<input type='checkbox' name='travel' checked="checked" /> travel
			</p>
			<h3>Sort by:</h3>	
			<p>	
				<input type='radio' name='sort'  value='title' checked="checked" /> title
				<input type='radio' name='sort'  value='dateOfInit'  /> date
				<input type='radio' name='sort'  value='username'  /> author
			</p>
			<h3>Order:</h3>
			<p>	
				<input type='radio' name='order'  value='ASC' checked="checked" /> Ascending
				<input type='radio' name='order'  value='DESC'  /> Descending
			</p>
			<p>
				<input type="submit" />
			</p>
				

		</form>
	</div>
	
	<div>
		<ul>
		<?php 
		foreach($result->result() as $row){
			echo "<li>";
				$url=base_url()."index.php/Ideas/index/$row->Iid";
				echo "<a href=$url> $row->title </a> ";
			echo "</li>";
			
			echo "<ul>";

			echo "<li> author:";
				echo $row->username;
			echo "</li>";
			
			echo "<li> date:";
				echo $row->dateOfInit;
			echo "</li>";

			echo "<li> market:";
				echo $row->market;
			echo "</li>";
			echo "</ul>";	
		}

	?>
	</ul>
	</div>
	
	

</body>
</html>