<!-- The "navigation" section is the header -->

<!--
	PREREQS:
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/navbar.css' />
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/catagory.css' />
		<script type="text/javascript" src="assets/js/jquery-2.1.3.js"></script>
		
	**NOTE: These prereqs must be in the <head> element for the header
	to display properly
 -->

<div id="navigation">
	<ul class="links">
		<li>
			<a href=<?php echo base_url() . "index.php/main/members"; ?>>Home</a>
		</li>
		<li class="active">
			<a href=<?php echo base_url() . "index.php/main/members"; ?>>Browse</a>
		</li>
		<li>
			<a href=<?php echo base_url() . "index.php/main/share_page"; ?>>Share</a>
		</li>
	</ul>


	<a class="rightside" id="farRight" href='<?php echo base_url() . 
		"index.php/main/logout"; ?>'>Logout</a>
	<a class="rightside" href='<?php echo base_url(); ?>index.php/main/share_ideas'>My Idea</a>	
	
	

</div>