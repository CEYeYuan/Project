<!DOCTYPE html>
<html>
	<head>
		<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
		<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/profile.css' type='text/css' />
		<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navigation.css' type='text/css' />
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery-2.1.3.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/profileTab.js"></script>
		<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/profileEdit.js"></script>
		
	</head>

	<header>
		<!-- Include the header -->
		<?php $this->load->view('menubar'); ?>
	</header>
	<body>
	
<?php

	$email = mysql_real_escape_string($this->session->userdata('email'));
			//$where = "username = '$email'";
	$query = $this->db->query("select * from User where username='$email'");
	//echo $query->row()->DateofBirth;
	
	//set the initial value for gender
	if ($query->row()->gender=='M') {
		$genM=True;
		$genF=False;
	}elseif ($query->row()->gender=='F'){
		$genM=False;
		$genF=True;
	}else{
		$genM=False;
		$genF=False;
	}
	
	$yy=substr($query->row()->DateofBirth, 0,4);
	$ypos=strpos($query->row()->DateofBirth,"y");
	$mpos=strpos($query->row()->DateofBirth,"m");
	$dpos=strpos($query->row()->DateofBirth,"d");
	$mm=substr($query->row()->DateofBirth, $ypos+1,$mpos-$ypos-1);
	$dd=substr($query->row()->DateofBirth, $mpos+1,$dpos-$mpos-1);

?>
<div class="profile">
	<h1>Sydna's Profile</h1>
	<form method="post" accept-charset="utf-8" action="profile_update_validition" >
	<div class='left-side'>
		<img src="" alt="display picture" height="200" width="200">
		<edit>Edit</edit>
		<input type="submit" value="done" />
	</div>
	<div class='right-side'>
		<ul class="user">

			<a>Welcome!</a></br>
			<a class='username'>Username: <?php echo $query->row()->username ?></a>
			
			<?php 
				//echo form_open('index.php/main/profile_update_validition');
				echo validation_errors();
				//echo "<p>Upload your profile picture: ";
				//echo form_upload('file'); 
			?>
			<li>First name: <a class='fn'><?php echo $query->row()->firstName ?></a></li>
			<li>Last name: <a class='ln'><?php echo $query->row()->lastName ?></a></li>
			<li>Date of Birth: <a class='dob'>

				<!--<select disabled name="month"><option value=<?php echo $mm ?>><?php echo $mm ?></option></select>
				<select disabled name="day"><option value=<?php echo $dd ?>><?php echo $dd ?></option></select>
				<select disabled name="year"><option value=<?php echo $yy ?>><?php echo $yy ?></option></select>-->
			
				<?php

				$range = range(1900,2015);

	echo '<select name="year" >';
	//Now we use a foreach loop and build the option tags
	foreach($range as $r)
	{
	if ($r==$yy)
		echo '<option value="'.$r.'"selected="selected">'.$r.'</option>';else
	echo '<option value="'.$r.'">'.$r.'</option>';

	}	
	//Echo the closing select tag
	echo '</select>';
	echo "y";


	$range = range(1,12);

	echo '<select name="month">';
	//Now we use a foreach loop and build the option tags
	foreach($range as $r)
	{
	if ($r==$mm)
		echo '<option value="'.$r.'"selected="selected">'.$r.'</option>';else
	echo '<option value="'.$r.'">'.$r.'</option>';
	}	
	//Echo the closing select tag
	echo '</select>';
	echo "m";

	$range = range(1,31);

	echo '<select name="day" >';
	//Now we use a foreach loop and build the option tags
	foreach($range as $r)
	{
	if ($r==$dd)
		echo '<option value="'.$r.'"selected="selected">'.$r.'</option>';else
	echo '<option value="'.$r.'">'.$r.'</option>';
	}	
	//Echo the closing select tag
	echo '</select>';
	echo "d";


				?>

			</a></li>
			</form>
		
		</ul>
	</div>
</div>
<div class='tabs'>
	<ul class="tab-links">
		<li class="active"><a href="#funder">I funder</a></li>
		<li><a href="#initator">I initator</a></li>
	</ul>
	<div class='tab-content'>
		<div id="funder" class="tab active">
			<h3>FProject Name 1</h3>
			<h3>FProject Name 2</h3>
		</div>
		<div id="initator" class="tab">
			<h3>IProject Name 1</h3>
			<h3>IProject Name 2</h3>
		</div>
	</div>
	</body>
</html>