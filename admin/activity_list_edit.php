<?php 
	include("admin.common.inc.php");	
	connectDB();
	$sel = "aktivitaeten-aendern";

	if(isset($_GET["edit"])){
		$id = intval(cleanParam($_GET["edit"]));
	} else {
		$id = NULL;
	}

	if(isset($_POST["save"])){
		$name = cleanParam($_POST["name"]);
		$startdate = cleanParam($_POST["startdate"]);		
		$starttime = cleanParam($_POST["starttime"]);
		$enddate = cleanParam($_POST["enddate"]);
		$endtime = cleanParam($_POST["endtime"]);
		$participantsMin = cleanParam($_POST["participants-min"]);
		$participantsMax = cleanParam($_POST["participants-max"]);
		$description = cleanParam($_POST["description"]);

		//convert startdate/enddate to useful mysql format
		$start = $startdate." ".$starttime;
		$end = $enddate." ".$endtime;

		$sql = "UPDATE `activity`
				SET `name` = '".$name."',
					`start` = '".$start."',
					`end` = '".$end."',
					`participants-min` = $participantsMin,
					`participants-max` = $participantsMax,
					`description` = '".$description."'
					WHERE id = $id";

		$mysqli->query($sql);

	}

	if($id != NULL){
		$sql = "SELECT * 
				FROM `activity`
				WHERE id = $id";	
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result);

		//convert datetime from mysql to useful format
		$phpdate = strtotime( $row["start"] );
		$mysqldate = date( 'Y-m-d H:i', $phpdate );
		$startDate = explode(" ", $mysqldate);

		$phpdate = strtotime( $row["end"] );
		$mysqldate = date( 'Y-m-d H:i', $phpdate );
		$endDate = explode(" ", $mysqldate);
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("admin.html.head.inc.php"); ?>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script>
		function delete_entry(id,name)
		{
			if (confirm("Soll die Gruppe "+name+" tatsächlich gelöscht werden?")) window.location.href = "group_list.php?del="+id;
		}
	</script>
</head>
<body>
	<div class="site-wrap">
		<a href="../logout.php" class="logout-button">Logout</a>
	</div>	
	<div class="site-wrap user-list-edit">		
		<?php include("sidebar.inc.php"); ?>		
		<div class="main-content">
			<br><br><br><br>
			<table>
				<form action="activity_list_edit.php?edit=<?=$id; ?>" method="POST">
					<div class="save-buttons">
						<input type="submit" value="Speichern" name="save">
					</div>						
					
					<tr>
						<td>Aktivitäts Name</td>
						<td><input type="text" name="name" value="<?= $row["name"]?>"></td>
					</tr>
					<tr class="time-row">
						<td>Start</td>						
						<td><input type="date" name="startdate" value="<?= $startDate[0]?>" class="date"></td> <td><input class="time" type="time" name="starttime" value="<?= $startDate[1]?>"></td>
						<td>Ende</td>
						<td><input type="date" name="enddate" value="<?= $endDate[0]?>" class="date"></td> <td><input class="time" type="time" name="endtime" value="<?= $endDate[1]?>"></td>
						<td>Teilnehmer(min)</td>						
						<td><input type="number" class="participants" name="participants-min" value="<?= $row["participants-min"]?>"></td>
						<td>Teilnehmer(max)</td>
						<td><input type="number" class="participants" name="participants-max" value="<?= $row["participants-max"]?>"></td>

					</tr>
					<tr class="bio">
						<td>Aktivitäts Beschreibung</td>
						<td><textarea name="description" id="bio"><?= $row["description"]?></textarea></td>
					</tr>
				</form>				
			</table>		
		</div>				
	</div>
</body>
</html>