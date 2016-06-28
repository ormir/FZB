<?php 
	include("common.inc.php");

	$placesResult = array();
	$sql = "SELECT * FROM `user-place` AS up
			LEFT JOIN `place` AS p ON `fk-place-id` = p.id
			WHERE `fk-user-id` = ".$_SESSION['user_id'];
	$result = $mysqli->query($sql);
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			if($row["id"] == "") continue;
			array_push($placesResult, $row);
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
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
				<p><h1>Meine Orte</h1></p>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 panel panel-default">
				<!-- Table -->
				<table class="table">
					<thead>
				      <tr>
				        <th>Name</th>
				        <th>Adresse</th>
				        <th>Ort</th>
				        <th>Postleitzahl</th>
				      </tr>
				    </thead>
					<tbody>
						<?php 
							foreach ($placesResult as $row) {
						?>
								<tr>
										<td>
											<a href="placedescription.php?i=<?=$row["fk-place-id"] ?>">
												<?=$row["name"]?>
											</a>
										</td>
										<td><?=$row["street"]?></td>
										<td><?=$row["city"]?></td>
										<td><?=$row["postcode"]?></td>
								</tr>
						<?php
							}
						 ?>							
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
	</div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	<script src="js/function.js"></script>
	
</footer>
</body>
</html>