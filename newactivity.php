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
		<div class="col-md-3">
		</div>
		<div class="col-md-6 content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-md-10">
							<h2>Erstelle neue:</h2>
						</div>
					</div>
					<div class="row">

						<div class="col-md-3 col-md-offset-1 sortingcirclecontainer" id="circleactivity" autofocus>
							<img src="images/kite.png" class="circleimage" id="newactivityimage">
							<h3 class="newactivity">Aktivität</h3>
						</div>

						<div class="col-md-3 col-md-offset-1 sortingcirclecontainer" id="circlegroup">
							<img src="images/group.png" class="circleimage">
							<h3 class="newactivity">Gruppe</h3>
						</div>
						
						<div class="col-md-3 col-md-offset-1 sortingcirclecontainer" id="circleplace">
							<img src="images/place.png" class="circleimage">		
							<h3 class="newactivity">Ort</h3>
						</div>
						
						
						
					</div>
					<div id="createnewform">
						<!-- createnewactivity-->
						<div id="createnewactivity">
							<div class="row">
								<div class="col-md-4">
									Art:
								</div>
								<div class="col-md-8">
									<select class="form-control formular">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>Kaffee</option>
										<option>Theater</option>
										<option>Kino</option>
										<option>Museum</option>
										<option>Sport</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Datum und Uhrzeit:
								</div>
								<div class="col-md-8">
									<input class="formular" type="date" name="activitydate" min="2016-01-01">
									<input class="formular" type="time" name="activitytime">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Ort:
								</div>
								<div class="col-md-8">
									<select class="form-control formular">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>Kaffee</option>
										<option>Theater</option>
										<option>Kino</option>
										<option>Museum</option>
										<option>Sport</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Adresse:
								</div>
								<div class="col-md-8">
									<input type="text" id="newaddress" class="form-control formular" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Bezirk:
								</div>
								<div class="col-md-8">
									<select class="form-control formular">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>1. Bezirk</option>
										<option>2. Bezirk</option>
										<option>3. Bezirk</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Teilnehmer:
								</div>
								<div class="col-md-8">
									Min: <input type="number" name="minpeoplecount" class="formular" min="1" max="100" value=""> 
									Max: <input type="number" name="maxpeoplecount" class="formular" min="1" max="100" value=""> 
								</div>
							</div>
						</div>
						<!-- createnewactivity ende-->
						<!-- createnewgroup-->
						<div id="createnewgroup">
							<div class="row">
								<div class="col-md-4">
									Name:
								</div>
								<div class="col-md-8">
									<input type="text" id="newaddress" class="form-control" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Art:
								</div>
								<div class="col-md-8">
									<select class="form-control formular">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>Kaffee</option>
										<option>Theater</option>
										<option>Kino</option>
										<option>Museum</option>
										<option>Sport</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Beschreibung:
								</div>
								<div class="col-md-8">
									<input type="textarea">
								</div>
							</div>
						</div>
						<!-- createnewgroup ende-->
						<!-- createnewplace-->
						<div id="createnewplace">
							<div class="row">
								<div class="col-md-4">
									Art:
								</div>
								<div class="col-md-8">
									<select class="form-control formular">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>Kaffee</option>
										<option>Theater</option>
										<option>Kino</option>
										<option>Museum</option>
										<option>Sport</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Ort:
								</div>
								<div class="col-md-8">
									<select class="form-control formular">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>Kaffee</option>
										<option>Theater</option>
										<option>Kino</option>
										<option>Museum</option>
										<option>Sport</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Adresse:
								</div>
								<div class="col-md-8">
									<input type="text" id="newaddress" class="form-control formular" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Bezirk:
								</div>
								<div class="col-md-8">
									<select class="form-control formular">
									<?php 
										global $mysqli;
										$sql = "select name, postcode from district";
										$result = $mysqli->query($sql);

										if ($result->num_rows > 0) {
    										// output data of each row
    										$d=1;
   							 				while($row = $result->fetch_assoc()) {
   							 					if($row["postcode"]>=1010&&$row["postcode"]<=1230){
   											 		
       												echo '<option value='.$row["postcode"].'>'.$d.'. '.' Bezirk'.'('.$row["name"].')'. '<option>';
       												$d++;
   											 	}else
   											 	{
   											 		echo '<option value='.$row["postcode"].'>'.$row["postcode"].'('.$row["name"].')'. '<option>';
   											 	}
										   	}
    										
										} else {
    										echo "0 results";
										}
										

									?>
									</select>
								</div>
							</div>
						</div>
						<!-- createnewplace ende-->
						<!-- erstellen button-->
						<div class="row">
							<div class="col-md-6 col-md-offset-6">
								<a href="index.html">
									<button class="btn btn-lg btn-primary btn-block newactivity newactivitybutton" type="submit" value="submit" onclick="finish()">Erstellen</button>
								</a>
							</div>
						</div>
						<!-- erstellen button ende-->
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
	<script src="js/newactivity.js"></script>

	<?php
function finish()
{

}


	?>
</footer>
</body>
</html>