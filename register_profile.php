<?php 	include("common.inc.php"); ?>

<!DOCTYPE html>
<html>
<head>
	<?php include("html.head.inc.php"); ?>
</head>
<body>

<div id="navbar">
	<?php 
	include("header.inc.php");
	// getUserInformation($_SESSION["user_id"]);
	$user = getUserInformation($_SESSION["user_id"]);
	print_r($user);
	?>
</div> <!-- /#navbar -->
<div class="indexcontainer">
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6 content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row" id="containerquickinfo">
						<div class="col-md-4">
							<img src="images/person.svg" alt="Person" id="profileuserimage" class="img-circle img-responsive">
							<p>
								<form action="upload.php" method="post" enctype="multipart/form-data">
									
									<p>Wählen Sie ein Bild zum hochladen aus:</p>
									
										<div class="fileupload btn btn-primary">
											<span>Bild auswählen</span>
											<input type="file" name="fileupload" id="uploadBtn" class="upload">
										</div>
										<input id="uploadfile" placeholder="Bildname" disabled="disabled"/>
										<div class="fileupload btn btn-primary">
											<span>Bild hochladen</span>
											<input type="submit" name="fileupload" id="uploadBtn" class="upload">
										</div>
										
									
								</form>
							</p>
						</div>

						<div class="col-md-7 profilequickinfo">
							<p class="profilenamelastname"><?php echo $user["firstname"]." ".$user["lastname"]; ?> </p>
							<p class="profilebirthday"><?php echo $user["birthday"];?></p>
							<p class="profileplace"><?php echo $user["street"]."<br>".$user["postcode"]." ".$user["city"];?></p>
						</div>
						<div class="col-md-1">
							<svg class="settingssvg">
								<circle class="settingscircle" stroke="#e0dfdf" stroke-width="3" fill="#009688" />
								<image class="circleimage" x="50%" y="50%" xlink:href="images/settings.svg" />
							</svg>	
							
						</div>
					</div>
					<div class="row">
						
							<div class="profilecontainerdescription">
								<h2>Bio</h2>
								<textarea rows="4" cols="50" placeholder="Geben Sie hier Ihre Biographie ein."></textarea>
							</div>
						
					</div>
					<div class="row">
						
							<div class="profilecontainerdescription">
								<h2>Interessen</h2>
								<p>
									<select class="form-control createprofile">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>Kaffee</option>
										<option>Theater</option>
										<option>Kino</option>
										<option>Museum</option>
										<option>Sport</option>
									</select>
								</p>
							</div>
						
					</div>
					<div class="row">
						
							<div class="profilecontainerdescription">
								<h2>Orte</h2>
								<p>
									<select class="form-control createprofile">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>Kaffee</option>
										<option>Theater</option>
										<option>Kino</option>
										<option>Museum</option>
										<option>Sport</option>
									</select>
								</p>
							</div>
						
					</div>
					<div class="row">
						
							<div class="profilecontainerdescription">
								<h2>Gruppen</h2>
								<p>
									<select class="form-control createprofile">
										<option value="0" selected="" disabled="">Auswählen</option>
										<option>Kaffee</option>
										<option>Theater</option>
										<option>Kino</option>
										<option>Museum</option>
										<option>Sport</option>
									</select>
								</p>
							</div>
						
					</div>
					<div class="row">
						<div class="profilecontainerdescription">
							<form action="index.html" method="post" enctype="multipart/form-data">
								<div class="savedata btn btn-primary">
									<span>Einstellungen speichern</span>
									<input type="submit" name="savedata" class="save">
								</div>
							</form>
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
	<script src="js/index.js"></script>
	<!-- Billy JS-->
	<script type="js/create_profile.js"></script>
</footer>
</body>
</html>