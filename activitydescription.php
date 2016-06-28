<?php 
	include("common.inc.php");
global $mysqli;
	if(isset($_GET["i"])) {
		$id = cleanParam($_GET["i"]);
		
		$sql = "SELECT * FROM `activity`
				WHERE id = $id";
		$result = $mysqli->query($sql);
		if($result)
			$activityResult = $result->fetch_assoc();

		
		$interestResult = array();
		$sql = "SELECT * FROM `activity-interest` as ai
				LEFT JOIN `interest` as i on i.id = ai.`fk-interest-id`
				WHERE `fk-activity-id` = $id";
		$result = $mysqli->query($sql);

		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
				if($row["id"] == "") continue;
				array_push($interestResult, $row);
			}
		}

		$sql = "SELECT * FROM `activity-place` AS ap
				LEFT JOIN `place` as p on p.id = `fk-place-id`
				WHERE `fk-activity-id` = $id";
		$result = $mysqli->query($sql);
		$placeResult = $result->fetch_assoc();

		
		$userResult = array();
		$sql = "SELECT * FROM `user-activity` as au
				LEFT JOIN `user` as u on `fk-user-id` = u.id
				WHERE `fk-activity-id` = $id";
		$result = $mysqli->query($sql);
		if($result->num_rows > 0){
			while($row = $result->fetch_assoc()) {
				if($row["id"] == "") continue;
				array_push($userResult, $row);
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
			<?php if(isset($_GET["i"])){ ?>
				<div class="row">
					<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
				  					<image class="squareimage" width="200" height="200" src="images/coffee.png"/>
							</div>
							<div class="col-xs-7 col-xs-offset-2 col-sm-7 col-sm-offset-2 col-md-7 col-md-offset-2">
								<h1><?php echo $activityResult["name"]; ?></h1>
								<p>
								<?php
									foreach ($interestResult as $row) {
								?>
										<a href="interestdescription.php?i=<?=$row["fk-interest-id"] ?>" class="label label-default"><?=$row["name"]?></a>
								<?php
									}										

								?>
								</p>
								<p>Start: <?=$activityResult["date-start"] ?></p>
								<p>Start: <?=$activityResult["date-end"] ?></p>
								<?php if($placeResult["name"] != "") {?>
									<p><?=$placeResult["name"]; ?>, <?=$placeResult["place"]; ?> <?=$placeResult["postcode"]; ?></p>
								<?php } ?>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<h4>Teilnehmer</h4>
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
							<div class="col-xs-9 col-sm-9 col-md-9">
								<h4>Beschreibung</h4>
								<p>
									<?=$activityResult["description"] ?>
								</p>
							</div>
						</div>
						<div id="activityanmelden" class="row">
							<form action="activitydescription.php?i=<?=$id?>" method="POST">
							<?php 
							if(isset($_POST["anmelden"])){
							?>
								<button name="abmelden" class="btn btn-default" type="submit">Abemelden</button>
							<?php
								$sql="insert into `user-activity`(`fk-activity-id`,`fk-user-id`,admin)
									values(".$id.",".$_SESSION['user_id'].",0) ";
									
								$mysqli->query($sql);
							}
							else
							?>
								<button name="anmelden" class="btn btn-default" type="submit">Anmelden</button>
							
							</form>
						</div>
					</div>
				</div>				
			</div>
			<?php 
			// end of if(isset($_GET["i"])) 
			}
			else { ?>
				<h1>Keine Aktivität gefunden!</h1>
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
	<!-- <script src="js/newactivity.js"></script> -->
</footer>
</body>
</html>