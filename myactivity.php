<?php 
	include("common.inc.php");

	$activityResults = array();
	$activityResultsTN = array();

	$sql = "SELECT * FROM `user-activity` AS ua
			LEFT JOIN `activity` AS a ON `fk-activity-id` = a.id
			WHERE `fk-user-id` = ".$_SESSION['user_id'];
	$sqlTN="SELECT `fk-activity-id`, count(*) as anz FROM `user-activity` group by `fk-activity-id`";
	$result = $mysqli->query($sql);
	$resultTN= $mysqli->query($sqlTN);
	
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			if($row["id"] == "") continue;
			array_push($activityResults, $row);
		}
	}
	if($resultTN->num_rows > 0) {
		while($rowTN = $resultTN->fetch_assoc()){
			
			array_push($activityResultsTN, $rowTN);
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
				<p><h1>Meine Aktivitäten</h1></p>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1 panel panel-default">
				<!-- Table -->
				<table class="table table-hover">
					<thead>
				      <tr>
				        <th>Name</th>
						<th>Teilnehmer</th>
				        <th>Start-Datum</th>
				        <th>End-Datum</th>
				      </tr>
				    </thead>
					<tbody>
					<?php 
							foreach ($activityResults as $row) {
						?>
								<tr>
									<td>
										<a href="activitydescription.php?i=<?=$row["fk-place-id"] ?>">
											<?=$row["name"]?>
										</a>
									</td>
									<?php foreach ($activityResultsTN as $rowTN) {
									if($rowTN["fk-activity-id"]==$row["fk-activity-id"]){ 
										?>	
									<td><?php echo $rowTN["anz"];}}?></td>
							
									<td><?php echo $row["date-start"]?></td>
									<td><?php echo $row["date-start"]?></td>
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