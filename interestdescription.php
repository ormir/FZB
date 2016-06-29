<?php 
	include("common.inc.php");

	if(isset($_GET["i"]) && $_GET["i"] != "") {
		// basic info
		$id = cleanParam($_GET["i"]);		
		$usrId = $_SESSION["user_id"];

		// group-angemeldet, da form sonst automatisch bei refresh nochmal geschickt wird
		if(isset($_POST["anmelden"]) && $_SESSION["interest-angemeldet"] != true){
			$sql="INSERT into `user-interest`(`fk-interest-id`,`fk-user-id`)
				values($id,$usrId)";
			$mysqli->query($sql);
			$_SESSION["interest-angemeldet"] = true;
		}

		if(isset($_POST["abmelden"])){
			$sql = "DELETE FROM `user-interest`
					WHERE `fk-user-id` = $usrId
					AND `fk-interest-id` = $id";
			$mysqli->query($sql);
			$_SESSION["interest-angemeldet"] = false;
		}

		$sql = "SELECT * FROM `interest`
				WHERE id = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			$interestInfo = $result->fetch_assoc();
		}

		$groupResult = array();
		$sql = "SELECT * FROM `group-interest` as gi
				LEFT JOIN `group` as g ON g.id = gi.`fk-group-id`
				WHERE `fk-interest-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($groupResult, $row);
			}
		}

		$userResult = array();
		$sql = "SELECT * FROM `user-interest` as ui
				LEFT JOIN `user` as u ON u.id = ui.`fk-user-id`
				WHERE `fk-interest-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($userResult, $row);
			}
		}

		$placeResult = array();
		$sql = "SELECT * FROM `interest-place` as ip
				LEFT JOIN `place` as i on i.id = `fk-place-id`
				WHERE `fk-interest-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0) {
			while($row = $result->fetch_assoc()){
				if($row["id"] == "") continue;
				array_push($placeResult, $row);
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
		<?php if(isset($_GET["i"]) && $_GET["i"] != ""){ ?>
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h1><?php echo $interestInfo["name"]; ?></h1>							
							<div id="activityanmelden" class="row">
								<form action="interestdescription.php?i=<?=$id?>" method="POST">
									<?php 
									$sql = "SELECT * FROM `user-interest` 
											WHERE `fk-user-id` = $usrId
											AND `fk-interest-id` = $id";
									$result = $mysqli->query($sql);
									if($result->num_rows > 0){ ?>
										<button name="abmelden" class="btn btn-default" type="submit">Unlike</button>
									<?php
									} else { ?>
										<button name="anmelden" class="btn btn-default" type="submit">Like</button>
									<?php
									}
									?>	
								
								</form>
							</div>
						</div>
					</div>					
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h4>Beschreibung</h4>
							<p>
								<?php echo $interestInfo["description"]; ?>
							</p>							
							<br>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 placedescription">			    			
	        			</div>
	        			<div class="col-xs-12 col-sm-12 col-md-12">
	        				<br>
	        			</div>
						<div class="col-xs-4 col-sm-4 col-md-4">
							<h4>Gruppen mit dieser Interesse</h4>
							<ul class="list-group">
							  <?php  

							  	foreach($groupResult as $value) {
							  ?>
							  	<a href="groupdescription.php?i=<?php echo $value["id"]; ?>" class="list-group-item wordWrap"><?php echo $value["name"]; ?></a>					  
							  	<?php
							  	}						  	
							  	?>						  
							</ul>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4">
							<h4>Benutzer mit dieser Interesse</h4>
							<ul class="list-group">
								<?php  

							  	foreach($userResult as $value) {
							  ?>
							  	<a href="profile.php?i=<?php echo $value["id"]; ?>" class="list-group-item wordWrap"><?php echo $value["username"]; ?></a>					  
							  	<?php
							  	}						  	
							  	?>	
							</ul>
						</div>

						<div class="col-xs-4 col-sm-4 col-md-4">
							<h4>Orte mit dieser Interesse</h4>
							<ul class="list-group">
								<?php  

							  	foreach($placeResult as $value) {
							  ?>
							  	<a href="placedescription.php?i=<?php echo $value["id"]; ?>" class="list-group-item wordWrap"><?php echo $value["name"]?></a>					  
							  	<?php
							  	}
							  	?>
							</ul>
						</div>
					</div>
				</div>			
			</div>
		<?php 
		// end of if(isset($_GET["i"])) 
		}
		else { ?>
			<h1>Kein Ort gefunden!</h1>
		<?php }
		?>
	</div>
	<div class="col-md-3">
	</div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	<script src="js/function.js"></script>
	<script src="js/placedescription.js"></script>
</footer>
</body>
</html>