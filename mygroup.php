<?php 
	include("common.inc.php");

	$groupResults = array();
	$groupResultsTN = array();
	$groupResultsIT = array();

	$sql = "SELECT * FROM `user-group` AS up
			LEFT JOIN `group` AS g ON `fk-group-id` = g.id
			WHERE `fk-user-id` = ".$_SESSION['user_id'];
	$result = $mysqli->query($sql);
	$sqlIT ="SELECT `fk-group-id`,`fk-interest-id`, name FROM `group-interest` join interest as it on `fk-interest-id`=it.id group by `fk-interest-id` ";
	$sqlTN="SELECT `fk-group-id`, count(*) as anz FROM `user-group` group by `fk-group-id`";
	$resultTN= $mysqli->query($sqlTN);
	$resultIT= $mysqli->query($sqlIT);

	
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			if($row["id"] == "") continue;
			array_push($groupResults, $row);
		}
	}

	if($resultTN->num_rows > 0) {
		while($rowTN = $resultTN->fetch_assoc()){
			
			array_push($groupResultsTN, $rowTN);
		}
	}
	if($resultIT->num_rows > 0) {
		while($rowIT = $resultIT->fetch_assoc()){
			
			array_push($groupResultsIT, $rowIT);
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
				<p><h1>Meine Gruppen</h1></p>
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
					        <th>Mitglieder</th>
					        <th>Interresse</th>
					        <!-- <th>Mitglieder</th> -->
				    	</tr>
				    </thead>
					<tbody> 
						<?php 
							foreach ($groupResults as $row) {
						?>
								<tr>
									<td>
										<a href="groupdescription.php?i=<?=$row["fk-group-id"] ?>">
											<?=$row["name"]?>
										</a>
									</td>
									<?php foreach ($groupResultsTN as $rowTN) {
										if($rowTN["fk-group-id"]==$row["fk-group-id"]){ 
									?>	
									<td><?php echo $rowTN["anz"];}}?></td>

									<?php 
										$string=""; 
										foreach ($groupResultsIT as $rowIT) {
											if($rowIT["fk-group-id"]==$row["fk-group-id"]){
												$string .=  $rowIT["name"]."   ";
											}
										}
									?>	
									<td><?php echo $string ?></td>
									
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