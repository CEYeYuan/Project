<!DOCTYPE html>
<html>
	<head>
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/navbar.css' />
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/catagory.css' />
		<link type="text/css" rel="stylesheet" href='<?php echo base_url()?>assets/stylesheets/project.css' />
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/navigation.css' />
		<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery-2.1.3.js"></script>
		<script type='text/javascript' src="<?php echo base_url() ?>assets/js/profileTab.js"></script>
	</head>
	
	<header>
		<!-- Include the header -->
		<?php $this->load->view('menubar'); ?>
	</header>
	
	<body>
		<div class="main-container">
			<div class='left-side'>
				<img>
				<div class='rating'>
					<!-- &#8962; is the code for a little house logo -->
					<span>&#8962;</span><span>&#8962;</span><span>&#8962;</span><span>&#8962;</span><span>&#8962;</span>
				</div>
			</div>
			<div class='right-side'>
				<a class='title'>
					<?php
							if (count($pTitle) > 0) {
								echo $pTitle[0]->pname;
							} else {
								echo "ERROR";
							}
						?></a></br>
				<a class='daystogo'>
					Days To Go:
					<?php
						if (count($daysToGo) > 0) {
							echo $daysToGo[0]->diffDate;
						} else {
							echo "ERROR";
						}
					?>
				</a></br>
				<a class='curFund'>
					$
					<?php
						if (count($cashFunded) > 0) {
							echo $cashFunded[0]->total;
						} else {
							echo "ERROR";
						}
					?>
					/
					<?php
						if (count($cashNeeded) > 0) {
							echo $cashNeeded[0]->needed;
						} else {
							echo "ERROR";
						}
					?>
					
					</a></br>
				<form class='form' action='<?php echo base_url()?>project/fundProject/<?php echo $pid[0] ?>' method="post">
					<a class='fundBtn'>$$ 
					<input type='text' name='dollars'> . <input type='text' name="cents">
					<input type="submit" value="Fund!">
					</a>
				</form>
			</div>
		</div>
		<div class='bottom-container'>
			<div class='tabs'>
				<ul class="tab-links">
					<li class="active"><a href="#description">Description</a></li>
					<li><a href="#updates">Updates</a></li>
					<li><a href="#comments">Comments</a></li>
				</ul>
				<div class='tab-content'>
					<div id="description" class="tab active">
						<p>
							<?php 
								if (count($description) > 0) {
									echo $description[0]->description;
								} else {
									echo "ERROR";
								}
							
							?>
						</p>
					</div>
					<div id="updates" class="tab">
						<p>Currently no updates</p>
					</div>
					<div id="comments" class="tab">
						<p>Be the first to comment!</p>
					</div>
				</div>
			</div>
		</div>
		
	</body>
	

</html>