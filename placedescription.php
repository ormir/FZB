<?php 
	include("common.inc.php");

	if(isset($_GET["i"]) && $_GET["i"] != "") {
		// basic info
		$id = cleanParam($_GET["i"]);
		
		$sql = "SELECT * FROM `place`
				WHERE id = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			$placeInfo = $result->fetch_assoc();
		}

		$activityResult = array();

		// activities in place
		$sql = "SELECT * FROM `activity-place` as ap
				LEFT JOIN `activity` as a ON a.id = ap.`fk-place-id`
				WHERE `fk-place-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($activityResult, $row);
			}
		}

		$userResult = array();
		// users like place
		$sql = "SELECT * FROM `user-place` as up
				LEFT JOIN `user` as u ON u.id = up.`fk-user-id`
				WHERE `fk-place-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($userResult, $row);
			}
		}

		$interestResult = array();
		$sql = "SELECT * FROM `interest-place` as ip
				LEFT JOIN `interest` as i on i.id = `fk-interest-id`
				WHERE `fk-place-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($interestResult, $row);
			}
		}

	}	
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include("html.head.inc.php"); ?>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8&callback=initMap" async defer></script>

	<script>
		
		window.onload = function() {
		    var latlng = new google.maps.LatLng(<?php echo $placeInfo["lat"].",".$placeInfo["lng"] ?>);
		    var map = new google.maps.Map(document.getElementById('map'), {
		        center: latlng,
		        zoom: 14,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    });
		    var marker = new google.maps.Marker({
		        position: latlng,
		        map: map
		    });
		}
	</script>
</head>
<body>
<div id="navbar">
	<?php include("header.inc.php"); ?>
</div> <!-- /#navbar -->
<div class="indexcontainer">
<div class="row">
	<div class="col-xs-8 col-sm-2 col-md-2">
	</div>
	<div class="col-xs-12 col-sm-8 col-md-8 content">
		<?php if(isset($_GET["i"]) && $_GET["i"] != ""){ ?>
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-3 col-sm-3 col-md-3">
			  				<image class="squareimage" width="160" height="160" src="images/place_b.png"/>
						</div>
						<div class="col-xs-7 col-xs-offset-2 col-sm-7 col-sm-offset-2 col-md-7 col-md-offset-2">
							<h1><?php echo $placeInfo["name"]; ?></h1>
							<?php
								foreach ($interestResult as $row) {
							?>
									<a href="interestdescription.php?i=<?=$row["fk-interest-id"] ?>" class="label label-default"><?=$row["name"]?></a>
							<?php
								}
							?>
							<br><br>
							Straße: <?=$placeInfo["street"]?>,
							<?=$placeInfo["city"]?> <?=$placeInfo["postcode"]?>
						</div>
					</div>
					<?php

						if($placeInfo["lng"] != "" && $placeInfo["lat"] != ""){
					?>	
							<br>
							<br>
							<div class="row">
								<div class="col-xs-18 col-sm-15 col-md-12" id="map"></div>
								<!-- Maps script -->
								<script src="js/maps.js"></script>
								<!-- Google Maps Script -->
				    			<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8&callback=initMap" async defer></script>
							</div>
					<?php
						}
					?>

					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h4>Beschreibung</h4>
							<p>
								<?php echo $placeInfo["description"]; ?>
							</p>
							<br>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 placedescription">
							<!-- <div id="map">
								<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8&callback=initMap" async defer></script>
							</div> -->
							<!-- Google Maps Script -->
			    			
	        			</div>
	        			<div class="col-xs-12 col-sm-12 col-md-12">
	        				<br>
	        			</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<h4>Mögliche Aktivitäten</h4>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<h4>Benutzer denen, dieser Ort gefällt</h4>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<ul class="list-group">
							  <?php  

							  	foreach($activityResult as $value) {
							  ?>
							  	<a href="activitydescription.php?i=<?php echo $value["id"]; ?>" class="list-group-item wordWrap"><?php echo $value["name"]; ?></a>					  
							  	<?php
							  	}						  	
							  	?>						  
							</ul>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<ul class="list-group">
								<?php  

							  	foreach($userResult as $value) {
							  ?>
							  	<a href="profile.php?i=<?php echo $value["id"]; ?>" class="list-group-item wordWrap"><?php echo $value["username"]; ?></a>					  
							  	<?php
							  	}						  	
							  	?>	
							</ul>
						</div>
					</div>
				</div>			
			</div>
		<?php 
		// end of if(isset($_GET["i"])) 
		}
		else { ?>
			<h1>Kein Ort gefunden!</h1>
		<?php }
		?>
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