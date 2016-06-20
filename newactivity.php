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
	<?php include("header.inc.php"); $welchesInput="null"?>
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

						<div class="col-md-3 col-md-offset-1" id="circleactivity" autofocus>
							<img src="images/kite.png" class="circleimage" id="newactivityimage">
							<h3 class="newactivity">Aktivität</h3>
						</div>

						<div class="col-md-3 col-md-offset-1" id="circlegroup">
							<img src="images/group.png" class="circleimage">
							<h3 class="newactivity">Gruppe</h3>
						</div>
						
						<div class="col-md-3 col-md-offset-1" id="circleplace">
							<img src="images/place.png" class="circleimage">		
							<h3 class="newactivity">Ort</h3>
						</div>
						
						
						
					</div>
					<div id="createnewform">
					<form id="createnewactivity" action="createnewactivity.php" method="post">
						<!-- createnewactivity-->
						<div >
							<div class="row">
								<div class="col-md-4">
									Art:
								</div>
								<div class="col-md-8">
									<select name="Art" class="form-control formular" id="selinterest" required>
										<option value="" >Auswählen</option>
										<?php $welchesInput="interest"; 
										include("newactivity.inc.php");?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Beschreibung:
								</div>
								<div class="col-md-8">
									<textarea class="form-control formular" name="Beschreibung" rows="5" cols="30"></textarea>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Anfang-Datum
								</div>
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-4">
											<select name="ATag" class="form-control formular datetime">
											<?php $welchesInput="tag"; 
											include("newactivity.inc.php");?>
											</select>
										</div>
										<div class="col-md-4">
											<select name="AMonat" class="form-control formular datetime"><?php $welchesInput="monat"; 
											include("newactivity.inc.php"); ?></select>
										</div>
										<div class="col-md-4">
											<select  name="AJahr" class="form-control formular datetime"><?php $welchesInput="jahr";
											include("newactivity.inc.php"); ?></select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Uhrzeit:
								</div>
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-6">
											<select  name="AStunde" class="form-control formular datetime">
												<?php $welchesInput="stunde";
											include("newactivity.inc.php"); ?>

											</select>
										</div>
										<div class="col-md-6">
											<select  name="AMinute" class="form-control formular datetime">
												<?php $welchesInput="minute";
												include("newactivity.inc.php"); ?>
											</select>

										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-4">
									Ende-Datum
								</div>
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-4">
											<select name="ETag" class="form-control formular datetime">
											<?php $welchesInput="tag"; 
											include("newactivity.inc.php");?>
											</select>
										</div>
										<div class="col-md-4">
											<select name="EMonat" class="form-control formular datetime"><?php $welchesInput="monat"; 
											include("newactivity.inc.php"); ?></select>
										</div>
										<div class="col-md-4">
											<select  name="EJahr" class="form-control formular datetime"><?php $welchesInput="jahr";
											include("newactivity.inc.php"); ?></select>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Uhrzeit:
								</div>
								<div class="col-md-8">
									<div class="row">
										<div class="col-md-6">
											<select  name="EStunde" class="form-control formular datetime">
												<?php $welchesInput="stunde";
											include("newactivity.inc.php"); ?>

											</select>
										</div>
										<div class="col-md-6">
											<select  name="EMinute" class="form-control formular datetime">
												<?php $welchesInput="minute";
												include("newactivity.inc.php"); ?>
											</select>

										</div>
									</div>
								</div>
							</div>	
							<div class="row">
								<div class="col-md-4">
									Ort:
								</div>
								<div class="col-md-8">
									<select name="Ort" class="form-control formular">
										<option value="0" selected="" disabled="">Auswählen</option>
										<?php $welchesInput="place"; include("newactivity.inc.php");?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Adresse:
								</div>
								<div class="col-md-8">
									<input  name="Adresse" type="text" id="newaddress" class="form-control formular" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Bezirk:
								</div>
								<div class="col-md-8">
									<select  name="Bezirk" class="form-control formular">
										<?php $welchesInput="district"; 
										include("newactivity.inc.php");?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Teilnehmer:
								</div>
								<div class="col-md-8">
									Min: <input name="Teilnehmermin" type="number" name="minpeoplecount" class="formular" min="1" max="100" value=""> 
									Max: <input name="Teilnehmermax" type="number" name="maxpeoplecount" class="formular" min="1" max="100" value=""> 
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-6">
								<a href="index.html">
									<input class="btn btn-lg btn-primary btn-block newactivity newactivitybutton" type="submit" value="Erstelle" onclick="finish()">
								</a>
							</div>
						</div>
					</form>
						<!-- createnewactivity ende-->
						<!-- createnewgroup-->
					<form id="createnewgroup" action="createnewgroup.php" method="post">
						<div >
							<div class="row">
								<div class="col-md-4">
									Name:
								</div>
								<div class="col-md-8">
									<input name="Name" type="text" id="newaddress" class="form-control" placeholder="" required>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Art:
								</div>
								<div class="col-md-8">
									<select name="Art" class="form-control formular" required>
										<option value="" selected="" disabled="">Auswählen</option>
										<?php $welchesInput="interest"; 
										include("newactivity.inc.php");?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Beschreibung:
								</div>
								<div class="col-md-8">
									<textarea name="Beschreibung" class="col-md-12"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-6">
								<a href="index.html">
									<input class="btn btn-lg btn-primary btn-block newactivity newactivitybutton" type="submit" value="Erstelle" onclick="finish()">
								</a>
							</div>
						</div>
						<!-- createnewgroup ende-->
					</form>
					<form id="createnewplace" action="createnewplace.php" method="post">
						<!-- createnewplace-->
						<div >
							<div class="row">
								<div class="col-md-4">
									Name:
								</div>
								<div class="col-md-8">
									<input name="Name" type="text" id="newname" class="form-control formular" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Art:
								</div>
								<div class="col-md-8">
									<select name="Art" class="form-control formular" required>
										<option value="" selected="" disabled="">Auswählen</option>
										<?php $welchesInput="interest"; 
										include("newactivity.inc.php");?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Adresse:
								</div>
								<div class="col-md-8">
									<input name="Adresse" type="text" id="newaddress" class="form-control formular" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Bezirk:
								</div>
								<div class="col-md-8">
									<select name="Bezirk" class="form-control formular">
										<?php $welchesInput="district"; 
										include("newactivity.inc.php");?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Ort:
								</div>
								<div class="col-md-8">
								<input name="Ort" type="text" id="newaddress" class="form-control formular" placeholder="">
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									Beschreibung:
								</div>
								<div class="col-md-8">
								<textarea name="Beschreibung" type="text-area" id="newaddress" class="form-control formular" placeholder=""></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6 col-md-offset-6">
								<a href="index.html">
									<input class="btn btn-lg btn-primary btn-block newactivity newactivitybutton" type="submit" value="Erstelle" onclick="finish()">
								</a>
							</div>
						</div>
					</form>
						<!-- createnewplace ende-->
						
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