<!DOCTYPE hmtl>
<html>
	<head>
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/navbar.css' />
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/catagory.css' />
		<link type="text/css" rel="stylesheet" href='<?php echo base_url()?>assets/stylesheets/project.css' />
		<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/profile.css' />
		<script type="text/javascript" src="<?php echo base_url()?>assets/js/jquery-2.1.3.js"></script>
	</head>
	
	<header>
		<!-- Include the header -->
		<?php $this->load->view('menubar'); ?>
	</header>
	
	<body>
		
		<form action='<?php echo base_url();?>projectCreate/create' method="post">
		<table>
			<tr valign="justified">
				<td><img id="projectPic" src="<?php echo base_url() ?>assets/images/wireframe.png"></td>
				<td>
					Project Title: <input type="text" name="title">
					
					<br>
					
					Category: 
					
					<select name="category" size="1">
						<?php
							foreach($categories as $row) {
								echo "<option value='" . $row->name . "'>" . $row->name;
								echo "</option>";
							}
						
						 ?>
					</select>
					
					<br>
					
					Planned Start Date: Y:
					<!-- Year selection -->
					<select name="year" size="1">
					<?php
						// create an <option> tag for years between
						// 1850 and 2050
						for ($i = 1850; $i < 2051; $i++) {
							echo "<option value='" . $i . "'>" . $i;
							echo "</option>";
						}
					?>
					</select>
					
					<!-- Month selection -->
					M:
					<select name="month" size="1">
					<?php
						for ($i = 1; $i < 13; $i++) {
							echo "<option value='" . $i . "'>" . $i;
							echo "</option>";
						}
					 ?>
					</select>
					
					<!-- Day selection -->
					D:
					<select name="day" size="1">
					<?php
						for ($i = 1; $i < 32; $i++) {
							echo "<option value='" . $i . "'>" . $i;
							echo "</option>";
						}
					 ?>
					</select>
					
					<br>
					
					Funds Needed: $$ 
					<input type="text" name="dollars" size="1">
					.
					<input type="text" name="cents" size="1">
				</td>
			</tr>
			<tr align="center">
				<td><button id="editButton" type="button">Edit</button></td>
				<td></td>
			</tr>
		</table>
		
		<br>
		
		Description:
		<br>
		<br>
		<textarea name="description" rows="10" cols="90"></textarea>
		
		<br>
		<br>
		<!--<div class='projectInfo'>-->
		<div class="left-side">
			
			<div class="buttons">
				<button id="cancelButton" type="button" onClick='window.location.href = "<?php echo base_url();?>home"'>Cancel</button>
				<button id="submitButton" type="submit">Create</button>
			</div>
		</div>
		</form>
	</body>
	
</html>