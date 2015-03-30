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
		<h3>Get: </h3>
		<?php $url=base_url()."index.php/restful/ideas" ;?>
		<form action='<?php echo $url; ?>' method="get">
			<p>Starting Date
				<input type="text" name='date1' value='2015-03-29 13:42:25'/>
			</p>
			<p>Ending Date
				<input type="text" name='date2'  value='2015-03-29 13:42:25'/>
			</p>
			<p> Numbers:
				<input type="text" name='num' />
			</p>
			<p>
				<input type='submit'  />
			</p>

		</form>

		<h3>Post: </h3>
		<?php $url=base_url()."index.php/restful/ideas" ;?>
		<form action='<?php echo $url; ?>' method="post">
			<p>Starting Date
				<input type="text" name='date1' value='2015-03-29 13:42:25'/>
			</p>
			<p>Ending Date
				<input type="text" name='date2'  value='2015-03-29 13:42:25'/>
			</p>
			<p> Numbers:
				<input type="text" name='num' />
			</p>
			<p>
				<input type='submit'  />
			</p>

		</form>
		
	</div>
	
</body>
	
</html>
