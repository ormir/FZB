<?php 
	include("common.inc.php");
	
	if(isset($_GET['i']) && $_GET["i"] != "") {
		$id = cleanParam($_GET['i']);
		$usrId = $_SESSION["user_id"];

		// group-angemeldet, da form sonst automatisch bei refresh nochmal geschickt wird
		if(isset($_POST["anmelden"]) && $_SESSION["group-angemeldet"] != true){
			$sql="INSERT into `user-group`(`fk-group-id`,`fk-user-id`)
				values($id,$usrId)";
			$mysqli->query($sql);
			$_SESSION["group-angemeldet"] = true;
		}

		if(isset($_POST["abmelden"])){
			$sql = "DELETE FROM `user-group`
					WHERE `fk-user-id` = $usrId
					AND `fk-group-id` = $id";
			$mysqli->query($sql);
			$_SESSION["group-angemeldet"] = false;
		}

		// load basic group info
		$sql = "SELECT * FROM `group` WHERE id = '".$id."'";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			$groupResult = $result->fetch_assoc();
		}

		$userResult = array();
		// load users in group
		$sql = "SELECT * FROM `user-group` as ug
				LEFT JOIN `user` as u ON u.id = ug.`fk-user-id`
				WHERE `fk-group-id` = '$id'";
		$result = $mysqli->query($sql);
		$userCount = 0;
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($userResult, $row);
				$userCount++;
			}
		}

		// load activities from group
		$activityResult = array();
		$sql = "SELECT * FROM `group-activity` AS ga
				LEFT JOIN `activity` AS a ON a.id = ga.`fk-activity-id`
				WHERE `fk-group-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {		
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($activityResult, $row);				
			}
		}

		// load group tags
		$tagsResult = array();
		$sql = "SELECT * FROM `group-interest` AS gi
				LEFT JOIN `interest` AS i ON i.id = gi.`fk-interest-id`
				WHERE `fk-group-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {	
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($tagsResult, $row);
			}
		}

		$blogResult = array();
		$sql = "SELECT * FROM `blog`
				WHERE `fk-group-id` = $id
				ORDER BY `date` desc";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {	
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($blogResult, $row);
			}
		}

	}
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
	<div class="col-xs-8 col-sm-2 col-md-2">
	</div>
	<div class="col-xs-12 col-sm-8 col-md-8 content">
		<div class="row">
			<?php if(isset($_GET["i"]) && $_GET["i"] != ""){ ?>
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-5">				
					<div class="row">					
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h1><?php echo $groupResult["name"] ?></h1>
							<p>
								<?php  
									foreach ($tagsResult as $row) {
								?>
										<a href="interestdescription.php?i=<?=$row["fk-interest-id"] ?>" class="label label-default"><?php echo $row["name"] ?></a>
								<?php
									}
								?>	
							</p>
							<p><?php echo $userCount ?> Mitglieder</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-10">
							<h4>Beschreibung</h4>
							<p>
								<?php echo $groupResult["description"]; ?>							
							</p>
						</div>
					</div>
					<div id="activityanmelden" class="row">
						<form action="groupdescription.php?i=<?=$id?>" method="POST">
							<?php 
							$sql = "SELECT * FROM `user-group` 
									WHERE `fk-user-id` = $usrId
									AND `fk-group-id` = $id";
							$result = $mysqli->query($sql);
							if($result->num_rows > 0){ ?>
								<button name="abmelden" class="btn btn-default pull-left" type="submit">Unlike</button>
							<?php
							} else { ?>
								<button name="anmelden" class="btn btn-default pull-left" type="submit">Like</button>
							<?php
							}
							?>	
						
						</form>
					</div>
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8">
							<h4>Mitglieder</h4>
							<ul class="list-group">
								<?php  
									foreach ($userResult as $row) {										
								?>											
										<a href="profile.php?i=<?php echo $row["id"]; ?>" class="list-group-item wordWrap"><?php echo $row["username"] ?></a>
										
								<?php
									}
								?>						  		
							</ul><br><br>
							<h4>Aktivitäten</h4>
							<ul class="list-group">
							  <?php  
									foreach ($activityResult as $row) {
								?>
										<a href="activitydescription.php?i=<?php echo $row["id"]; ?>" class="list-group-item wordWrap"> <?php echo $row["name"] ?></a>
								<?php
									}
								?>		
							</ul><br><br>
						</div>
					</div>
				</div>

				<div class="col-xs-10 col-sm-10 col-md-6">
				<?php
					if($groupResult["fk-admin-id"] == $_SESSION["user_id"]) { ?>
						<br>
						<br>
						<div class="col-xs-2 col-xs-offset-9 col settingssvg">
							<a href="new_group_blog_entry.php?i=<?=$groupResult["id"] ?>">
								<img src="images/ic_settings.png">
							</a>
						</div>
						<br>
						<br>
				<? } ?>
				<br><br>
					<?php  

						foreach ($blogResult as $row) {
					?>										

							<div class="panel panel-default">
								<div class="panel-heading"><?php echo $row["headline"] ?></div>
								<div class="panel-body"><?php echo $row["content"] ?></div>
							</div>

					<?php
						}
					?>
				</div>

			<?php 
			// end of if(isset($_GET["i"])) 
			}
			else { ?>
				<h1>Keine Gruppe gefunden!</h1>
			<?php }
			?>
		</div>
	</div>
	<div class="col-md-3"> </div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	<script src="js/function.js"></script>
	<!-- <script src="js/newactivity.js"></script> -->
</footer>
</body>
</html>