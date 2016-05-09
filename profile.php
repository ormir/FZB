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
	<div class="row">
		<div class="col-md-3">
		</div>
		<div class="col-md-6 content">
			<div class="row">
				<div class="col-md-10 col-md-offset-1">
					<div class="row" id="containerquickinfo">
						<div class="col-md-4">
							<img src="<? echo $user_pic; ?>" alt="Person" id="profileuserimage" class="img-circle img-responsive">
						</div>
						<div class="col-md-7 profilequickinfo">
							<p class="profilenamelastname"><? echo $user['firstname'].' '.$user['lastname']; ?></p>
							<p class="profilebirthday"><? echo $user['birthday']; ?></p>
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
								<?php echo $user['bio']; ?>
							</div>
						
					</div>
					<div class="row">
						
							<div class="profilecontainerdescription">
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
						
							<div class="profilecontainerdescription">
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
						
							<div class="profilecontainerdescription">
								<h2>Gruppen</h2>
								<div class="row">
									<div class="col-md-3">
										<img width="50" height="50" src="images/person.svg" alt="Person" id="profileuserimage" class="img-circle img-responsive" >
									</div>
									<div class="col-md-3">
										<img width="50" height="50" src="images/person.svg" alt="Person" id="profileuserimage" class="img-circle img-responsive" >
									</div>
									<div class="col-md-3">
										<img width="50" height="50" src="images/person.svg" alt="Person" id="profileuserimage" class="img-circle img-responsive" >
									</div>
									<div class="col-md-3">
										<img width="50" height="50" src="images/person.svg" alt="Person" id="profileuserimage" class="img-circle img-responsive" >
									</div>
								</div>
							</div>
						
					</div>
					<div class="row">
						
							<div class="profilecontainerdescription">
								<h2>Letzte Aktivitäten</h2>
								<p>
									<span class="label label-default">Lorem</span>
									<span class="label label-default">ipsum</span>
									<span class="label label-default">dolor</span>
									<span class="label label-default">sit</span>
									<span class="label label-default">amet</span>
								</p>
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
</footer>
</body>
</html>