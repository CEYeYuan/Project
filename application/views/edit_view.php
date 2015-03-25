<!DOCTYPE HTML>
<HTML>
	<head>
		<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
		<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/homeBackground.css' type='text/css' />
		<script type="../views/text/javascript" src="js/jquery-2.1.3.js"></script>
		<title>Share Your Ideas</title>

	</head>
	
	<header>
		<!-- Include the header -->
		<?php $this->load->view('menubar'); ?>
	</header>

	
	<body>
		<div>
			<form action='<?php echo base_url();?>/index.php/Ideas/share_ideas' method="post">
				<?php echo validation_errors();?>
				<p>Title
					<input type="text" name="title" value=<?php echo $result->row()->title;?> /> 
				</p>

				<p>Market

					<?php   
						
						if ($result->row()->market=="health")
							echo "<input type='radio' name='market' value='health' checked='checked'/> health";
						else
							echo "<input type='radio' name='market' value='health' /> health";

						if ($result->row()->market=="technology")
							echo "<input type='radio' name='market' value='technology' checked='checked'/> technology";
						else
							echo "<input type='radio' name='market' value='technology' /> technology";

						if ($result->row()->market=="education")
							echo "<input type='radio' name='market' value='education' checked='checked'/> education";
						else
							echo "<input type='radio' name='market' value='education' /> education";

						if ($result->row()->market=="finance")
							echo "<input type='radio' name='market' value='finance' checked='checked'/> finance";
						else
							echo "<input type='radio' name='market' value='finance' /> finance";

						if ($result->row()->market=="travel")
							echo "<input type='radio' name='market' value='travel' checked='checked'/> travel";
						else
							echo "<input type='radio' name='market' value='travel' /> travel";

					?>
				</p>

				<p>Description</p>
				<p>
					<textarea name="description" rows="6" cols="40">
						<?php echo $result->row()->description;?>	
					</textarea>	
				</p>	
				
				<p>
					<input type="submit" />
		
				</p>		

				
			</form>	
			
		</div>
		
				
				
	</body>
</HTML>