<?php 
	include("common.inc.php");
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include("html.head.inc.php"); ?>
</head>
<body>

<div id="navbar">
	<?php include("header.inc.php"); ?>
</div> <!-- /#navbar -->
<div class="indexcontainer">
<div class="row">
	<div class="col-xs-8 col-sm-2 col-md-2">
	</div>
	<div class="col-xs-16 col-sm-8 col-md-8 content">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-md-3">
						
		  					<image class="squareimage" width="160" height="160" src="images/place_b.png"/>
					
					</div>
					<div class="col-md-7 col-md-offset-2">
						<h1>Ort Name</h1>
						<p>Addresse</p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h4>Beschreibung</h4>
						<p>
							Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac mi rutrum, fermentum lorem ac, volutpat magna. Sed dignissim quam libero, quis euismod nisi vulputate ac. Donec vel purus lacus. Morbi varius molestie dapibus. Donec vitae vestibulum ipsum, vel ultrices nisl. Maecenas nec scelerisque ligula. Suspendisse elit ipsum, condimentum non feugiat a, dignissim non quam.
						</p>
						<br>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 placedescription">
						<div id="map">
							<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8&callback=initMap" async defer></script>
						</div>
						<!-- Google Maps Script -->
		    			
        			</div>
        			<div class="col-md-12">
        				<br>
        			</div>
					<div class="col-md-6">
						<h4>Mögliche Aktivitäten</h4>
					</div>
					<div class="col-md-6">
						<h4>Benutzer denen, dieser Ort gefällt</h4>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
						<ul class="list-group">
						  <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						</ul>
					</div>
					<div class="col-md-6">
						<ul class="list-group">
						  <li class="list-group-item">Cras justo odio</li>
						  <li class="list-group-item">Dapibus ac facilisis in</li>
						  <li class="list-group-item">Morbi leo risus</li>
						  <li class="list-group-item">Vestibulum at eros</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="col-md-3">
	</div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	<script src="js/function.js"></script>
	<script src="js/placedescription.js"></script>
</footer>
</body>
</html>