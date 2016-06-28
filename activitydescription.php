<?php 
	include("common.inc.php");

	if(isset($_GET["i"])) {
		$id = cleanParam($_GET["i"]);
		
		$sql = "SELECT * FROM `activity`
				WHERE id = $id";
		$result = $mysqli->query($sql);
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
								<p>Start: <?=$activityResult["start-date"] ?></p>
								<p>Cafe Jelinek, Wien 1030</p>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-sm-3 col-md-3">
								<h4>Teilnehmer</h4>
								<ul class="list-group">
								  <li class="list-group-item">Cras justo odio</li>
								  <li class="list-group-item">Dapibus ac facilisis in</li>
								  <li class="list-group-item">Morbi leo risus</li>
								  <li class="list-group-item">Vestibulum at eros</li>
								</ul>
							</div>
							<div class="col-xs-9 col-sm-9 col-md-9">
								<h4>Beschreibung</h4>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipiscing elit. In ac mi rutrum, fermentum lorem ac, volutpat magna. Sed dignissim quam libero, quis euismod nisi vulputate ac. Donec vel purus lacus. Morbi varius molestie dapibus. Donec vitae vestibulum ipsum, vel ultrices nisl. Maecenas nec scelerisque ligula. Suspendisse elit ipsum, condimentum non feugiat a, dignissim non quam.
								</p>
							</div>
						</div>
						<div id="activityanmelden" class="row">
							<button class="btn btn-default" type="submit">Anmelden</button>
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