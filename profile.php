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