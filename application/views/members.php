<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" href="navigation.css" type="text/css" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js">
		$(document).ready(function() {
			jQuery('.tab-links a').on('click', function() {
				var currAttrValue = jQuery(this).attr('href');
				jQuery('.tabs ' + currAttrValue).show().siblings().hide();
				jQuery(this).parent('li').addClass('active').siblings().removeClass('active');
			})
		})
		</script>
	</head>
	<body>
		<div id="container">
			<h1>Members page</h1>
			<?php
			echo "<pre>";
			print_r ($this->session->all_userdata());
			echo "<pre>";
		?>

		<a href='<?php echo base_url()."index.php/main/logout"?>'>Logout</a>
		<a href='<?php echo base_url()."index.php/main/profile"?>'>Profile</a>
		</div>


		<div class="tabs">
			<ul class="tab-links">
				<li class="active"> <a href="#discover">Discover</a></li>
				<li><a href="#create">Create</a></li>
			</ul>
		</div>
		<div class="tab-content">
			<div id="discover" class="tab active">
				<h2>Disover Categories</h2>
				<p>stuff<p>
			</div>
			<div id="create" class="tab">
				<h2>Create Categories</h2>
				<p>stuff</p>
			</div>
		</div>
	</body>
</html>
