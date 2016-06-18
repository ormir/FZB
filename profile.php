<?php 
include("common.inc.php");
include("profile.ini.php");
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
	<div class="row rowcontent">
		<div class="col-xs-8 col-sm-2 col-md-2">
		</div>
		<div class="col-xs-16 col-sm-8 col-md-8 content">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
					<div class="row" id="containerquickinfo">
<<<<<<< HEAD
						<div class="col-xs-4 col-sm-4 col-md-4">
							<img src="images/person.png" alt="Person" id="profileuserimage" class="img-circle img-responsive">
						</div>
						<div class="col-xs-6 col-sm-5 col-sm-offset-1 col-md-7 col-md-offset-1 profilequickinfo">
							<p class="profilenamelastname wordWrap">Name Nachname</p>
							<p class="profilebirthday">11.22.3333</p>
							<p class="profileplace wordWrap">Wohnort</p>
						</div>
						<div class="col-xs-2 col-sm-1 col-md-1">
							<!-- <svg class="settingssvg">
								<circle class="settingscircle" stroke="#e0dfdf" stroke-width="3" fill="#009688" />
								<image class="circleimage" x="50%" y="50%" xlink:href="images/settings.svg" />
							</svg> -->	
						</div>
					</div>
					<div class="row">
							<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 profilecontainerdescription">
								<h2>Bio</h2>
								<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac mi rutrum, fermentum lorem ac, volutpat magna. Sed dignissim quam libero, quis euismod nisi vulputate ac. Donec vel purus lacus. Morbi varius molestie dapibus. Donec vitae vestibulum ipsum, vel ultrices nisl. Maecenas nec scelerisque ligula. Suspendisse elit ipsum, condimentum non feugiat a, dignissim non quam.
								</p>
							</div>
					</div>
					<div class="row">
						
							<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 profilecontainerdescription">
								<h2>Interessen</h2>
								<p>
									<span class="label label-default">Lorem</span>
									<span class="label label-default">ipsum</span>
									<span class="label label-default">dolor</span>
									<span class="label label-default">sit</span>
									<span class="label label-default">amet</span>
								</p>
							</div>
						
					</div>
					<div class="row">
						
							<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 profilecontainerdescription">
								<h2>Orte</h2>
								<p>
									<span class="label label-default">Lorem</span>
									<span class="label label-default">ipsum</span>
									<span class="label label-default">dolor</span>
									<span class="label label-default">sit</span>
									<span class="label label-default">amet</span>
								</p>
							</div>
						
					</div>
					<div class="row">
						
							<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 profilecontainerdescription">
								<h2>Gruppen</h2>
								<div class="row">
									<div class="col-xs-3 col-sm-3 col-md-3">
										<img width="50" height="50" src="images/person.png" alt="Person" id="profileuserimage" class="img-circle img-responsive" >
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3">
										<img width="50" height="50" src="images/person.png" alt="Person" id="profileuserimage" class="img-circle img-responsive" >
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3">
										<img width="50" height="50" src="images/person.png" alt="Person" id="profileuserimage" class="img-circle img-responsive" >
									</div>
									<div class="col-xs-3 col-sm-3 col-md-3">
										<img width="50" height="50" src="images/person.png" alt="Person" id="profileuserimage" class="img-circle img-responsive" >
									</div>
								</div>
							</div>
						
					</div>
					<div class="row">
							<div class="col-sm-12 col-sm-offset-0 col-md-12 col-md-offset-0 profilecontainerdescription">
								<h2>Letzte Aktivitäten</h2>
								<p>
									<span class="label label-default">Lorem</span>
									<span class="label label-default">ipsum</span>
									<span class="label label-default">dolor</span>
									<span class="label label-default">sit</span>
									<span class="label label-default">amet</span>
								</p>
							</div>
=======
						<div class="col-md-4">
							<img src="<? echo $user_pic; ?>" alt="Person" id="profileuserimage" class="img-circle img-responsive">
						</div>
						<div class="col-md-7 profilequickinfo">
							<p class="profilenamelastname"><? echo $user['firstname'].' '.$user['lastname']; ?></p>
							<p class="profilebirthday"><? echo $user['birthday']; ?></p>
							<p class="profileplace"><?php echo $user["street"]."<br>".$user["postcode"]." ".$user["city"];?></p>
						</div>
						<div class="col-md-1 settingssvg">
							<a href="edit_profile.php">
								<img src="images/ic_settings.png">
							</a>
						</div>
					</div>
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Bio</h2>
							<?php echo $user['bio']; ?>
						</div>
					</div>
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Interessen</h2>
							<p>
								<?
								for ($i = 0; $i < $user_interest->num_rows; $i++) { 
									$row = $user_interest->fetch_assoc();?>
									<span class="label label-default"><?=$row['name']?></span>
								<? } ?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Orte</h2>
							<p>
								<?
								for ($i = 0; $i < $user_place->num_rows; $i++) { 
									$row = $user_place->fetch_assoc();?>
									<span class="label label-default"><?=$row['name']?></span>
								<?}?>
							</p>
						</div>	
					</div>
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Gruppen</h2>
							<p>
								<?
								for ($i = 0; $i < $user_group->num_rows; $i++) { 
									$row = $user_group->fetch_assoc();?>
									<span class="label label-default"><?=$row['name']?></span>
								<?}?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="profilecontainerdescription">
							<h2>Letzte Aktivitäten</h2>
							<p>
								<?
								for ($i = 0; $i < $user_activity->num_rows; $i++) { 
									$row = $user_activity->fetch_assoc();?>
									<span class="label label-default"><?=$row['name']?></span>
								<?}?>
							</p>
						</div>
>>>>>>> profile-register
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
</footer>
</body>
</html>