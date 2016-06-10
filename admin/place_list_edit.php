<?php 
	include("admin.common.inc.php");	
	connectDB();
	$sel = "orte-aendern";

	if(isset($_GET["edit"])){
		$id = intval(cleanParam($_GET["edit"]));
	} else {
		$id = NULL;
	}

	$name = NULL;
	$description = NULL;

	if(isset($_POST["save"])){
		$name = cleanParam($_POST["name"]);
		$description = cleanParam($_POST["description"]);
		$street = cleanParam($_POST["street"]);
		$city = cleanParam($_POST["city"]);
		$postcode = cleanParam($_POST["postcode"]);
		$lng = cleanParam($_POST["lng"]);
		$lat = cleanParam($_POST["lat"]);

		$sql = "UPDATE `place`
				SET	`name`='".$name."',
				`description`='".$description."',
				`street`='".$street."',
				`city`='".$city."',
				`postcode`='".$postcode."',
				`lng`='".$lng."',
				`lat`='".$lat."'
				WHERE id=$id";

		$mysqli->query($sql);
	}

	if($id != NULL){
		$sql = "SELECT * 
				FROM `place`
				WHERE id = $id";	
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result);
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("admin.html.head.inc.php"); ?>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>	
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
	<script>
		tinymce.init({
			selector: '#bio'
		});

      	window.onload = function() {
		    var latlng = new google.maps.LatLng(<?php echo $row["lat"].",".$row["lng"] ?>);
		    var map = new google.maps.Map(document.getElementById('map'), {
		        center: latlng,
		        zoom: 14,
		        mapTypeId: google.maps.MapTypeId.ROADMAP
		    });
		    var marker = new google.maps.Marker({
		        position: latlng,
		        map: map,
		        title: 'Set lat/lon values for this property',
		        draggable: true
		    });
		    google.maps.event.addListener(marker, 'dragend', function(a) {		        
		    	$("#lng").val(a.latLng.lng());
		    	$("#lat").val(a.latLng.lat());
		    	// console.log(a.latLng.lat() + "  " + a.latLng.lng());	        
		    });
		}
	</script>
	<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8"
        async defer></script>
</head>
<body>
	<div class="site-wrap">
		<a href="../logout.php" class="logout-button">Logout</a>
	</div>	
	<div class="site-wrap user-list-edit">
		<?php include("sidebar.inc.php"); ?>
		<div class="main-content">
			<br><br><br><br>
			<table>
				<form action="place_list_edit.php?edit=<?=$id; ?>" method="POST">
					<div class="save-buttons">
						<input type="submit" value="Speichern" name="save">
					</div>						
					
					<tr>
						<td>Gruppen Name</td>
						<td><input type="text" name="name" value="<?= $row["name"]?>"></td>
					</tr>							
					<tr>
						<td>Ort</td>
						<td>
							<input type="text" name="street" class="street" placeholder="Straße" value="<?= $row["street"]?>">
							<input type="text" name="city" class="city" placeholder="Stadt" value="<?= $row["city"]?>">
							<input type="text" name="postcode" class="postcode" placeholder="PLZ" value="<?= $row["postcode"]?>">
						</td>						
					</tr>						
					<tr class="bio">
						<td>Gruppen Beschreibung</td>
						<td><textarea name="description" id="bio"><?= $row["description"]?></textarea></td>
					</tr>
					<td><input type="hidden" id="lng" name="lng" value="<?= $row["lng"]?>"></td>
					<td><input type="hidden" id="lat" name="lat" value="<?= $row["lat"]?>"></td>
				</form>				
			</table>			
			<div id="map"></div>		
		</div>			
	</div>
</body>
</html>