<?php
include("common.inc.php");
include("edit_profile.ini.php");
?>
<!DOCTYPE html>
<html>
<head>
	<?php include("html.head.inc.php"); ?>
	<script src='https://cdn.tinymce.com/4/tinymce.min.js'></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.2.1/mustache.min.js"></script>
	<script src="js/croppie.js"></script>
	<link rel="stylesheet" href="styles/croppie.css" />
	<script>
		tinymce.init({
			selector: '#biotextarea'
		});
	</script>
</head>
<body>
<div id="navbar">
	<?php 
	include("header.inc.php");
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
					<form id='edit-profile-form' method="post" action="profile.php" enctype="multipart/form-data">
					<div class="row" id="containerquickinfo">
						<!-- User Profile pic -->
						<div class="col-md-5">
							<div id="profile-pic-crop" data-pic="<? echo $user_pic; ?>"></div>
							<p>
						      <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
						      <input id="edit-profile-pic" name="userfile" type="file">							
							</p>
						</div>
						
						<!-- User quick info -->
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

					<!-- Username -->
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Benutzername</h2>
							<div class="input-group">
							  <span class="input-group-addon" id="basic-addon1">@</span>
							  <input type="text" class="form-control" placeholder="Benutzername" name="username" value="<?php echo $user['username']; ?>" aria-describedby="basic-addon1">
							</div>
						</div>
					</div>

					<!-- Biography -->
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Bio</h2>
							<textarea id="biotextarea" name="biography" rows="4" cols="50" placeholder="Geben Sie hier Ihre Biographie ein.">
								<?php echo $user['bio']; ?>
							</textarea>
						</div>
					</div>

					<!-- Interest -->
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Interessen</h2>
							<div id="interests-select-container" class="profilecontainer-description interest"></div>
						</div>
					</div>

					<!-- Places -->
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Orte</h2>
							<div id="place-select-container" class="profilecontainer-description place"></div>
						</div>
					</div>

					<!-- Text size -->
					<div id="profile-text-size" class="row">
						<div class="profilecontainerdescription">
							<h2>Text größe</h2>
							<div class="profilecontainer-description text-size">
								<input min="11" max="30" value="12" type="range" />
								<span>Lorem Ipsum</span>
							</div>
						</div>
					</div>

					<!-- Save button -->
					<div class="row" style="margin-bottom: 5%">
						<button type="button" class="save-btn btn btn-primary" name="save_profile">Speichern</button>
					</div>
					</form>
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