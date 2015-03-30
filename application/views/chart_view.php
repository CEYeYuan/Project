<!DOCTYPE html>
<html>
	<head>
		<title>Home</title>
		<link rel='stylesheet' href='<?php echo base_url(); ?>assets/stylesheets/navbar.css' type='text/css' />
<link type='text/css' rel='stylesheet' href='<?php echo base_url()?>assets/stylesheets/general.css' />
		<script  src='<?php echo base_url(); ?>assets/js/Chart.js'></script>
		<style>
			body{
				padding: 0;
				margin: 0;
			}
			#canvas-holder{
				width:30%;
			}
		</style>
	

	</head>
	
	<header>
		<!-- Include the header -->
		<?php $this->load->view('menubar'); ?>
	</header>
	
	<body>
	<div class="background">
		<h2>Ideas market distribution</h2>
	</div>
	<div id="canvas-holder">
			<canvas id="chart-area" width="100" height="100"/>
		</div>


	<script>

		var doughnutData = [
				{
					value: <?php echo $health;?>,
					color:"#F7464A",
					highlight: "#FF5A5E",
					label: "Health"
				},
				{
					value: <?php echo $education;?>,
					color: "#46BFBD",
					highlight: "#5AD3D1",
					label: "Education"
				},
				{
					value: <?php echo $technology;?>,
					color: "#FDB45C",
					highlight: "#FFC870",
					label: "Technology"
				},
				{
					value: <?php echo $travel;?>,
					color: "#949FB1",
					highlight: "#A8B3C5",
					label: "Travel"
				},
				{
					value: <?php echo $finance;?>,
					color: "#4D5360",
					highlight: "#616774",
					label: "Finance"
				}

			];

			window.onload = function(){
				var ctx = document.getElementById("chart-area").getContext("2d");
				window.myDoughnut = new Chart(ctx).Doughnut(doughnutData, {responsive : true});
			};



	</script>
	</body>
	
</html>
