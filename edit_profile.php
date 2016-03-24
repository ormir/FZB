<?php
include("common.inc.php");
include("edit_profile.ini.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("html.head.inc.php"); ?>
	<!-- <script src='//cdn.tinymce.com/4/tinymce.min.js'></script> -->
	<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.2.1/mustache.min.js"></script>
	<script>
		tinymce.init({
			selector: '#biotextarea'
		});
	</script>
</head>
<body>
<div id="navbar">
	<?php 
	if (!isset($_SESSION["firstlogin"]) && !$_SESSION["firstlogin"]) {
		include("header.inc.php");
	}
	$user = getUserInformation($_SESSION["user_id"]);
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
						<?php
							$result = glob ("./images/user/".$_SESSION["user_id"].".*");
							if($result){
								echo "<img src='".$result[0]."' alt='Person' id='profileuserimage' class='img-circle img-responsive'>";
							} else {
								echo "<img src='images/user_blue.png' alt='Person' id='profileuserimage' class='img-circle img-responsive'>";
							}
						?>
							<p>
							<form method="post" action="edit_profile.php" enctype="multipart/form-data">
						      <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
						      Lade ein rechteckiges Bild hoch: <input name="userfile" type="file">
						      <input type="submit" value="Upload">
							</form>
								<!-- <form action="edit_profile.php" method="post" enctype="multipart/form-data">
									<p>Wählen Sie ein Bild zum hochladen aus:</p>
										<div class="fileupload btn btn-primary">
											<span>Bild auswählen</span>
											<input type="file" name="image" id="uploadBtn" class="upload">
										</div>
										<input id="uploadfile" placeholder="Bildname" disabled="disabled"/>
										<div class="fileupload btn btn-primary">
											<span>Bild hochladen</span>
											<input type="submit" name="fileupload" id="uploadBtn" class="upload">
										</div>
								</form> -->
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
							<textarea id="biotextarea" rows="4" cols="50" placeholder="Geben Sie hier Ihre Biographie ein.">
								<?php echo $user['bio']; ?>
							</textarea>
						</div>
					</div>
					<div class="row">
						
							<div class="profilecontainerdescription">
								<h2>Interessen</h2>
								<div id="interests-select-container" class="profilecontainer-description">
									<!-- <div ></div> -->
								</div>
							</div>
						
					</div>
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Orte</h2>
							<div class="profilecontainer-description">
								<div class="select-tag">
									<select class="form-control createprofile">
										<div><option value="0" selected="" disabled="">Auswählen</option></div>
										<?php
											if ($all_places->num_rows > 0) {
											   	while ($row = $all_places->fetch_assoc()) {
											    	echo "<option value='".$row["id"]."'> ".$row["name"]."</option>";         
											   	}   
											}
										?>
									</select>
									<img src="images/arrow_down.png">
								</div>
							</div>
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
<select class="tmp" id="tmp-select">
	<option id='tmp-selected-option'></option>
</select>
<footer>
	<script type="text/javascript" src="js/edit_profile.js"></script>
</footer>
</body>
</html>