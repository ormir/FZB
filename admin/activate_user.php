<?php 
	include("admin.common.inc.php");	
	connectDB();
	$data = array();

	if(isset($_POST['submit']) && $_POST['checkboxes'] != NULL){
		foreach($_POST['checkboxes'] as $id) {
			$sql = "UPDATE user
					SET active=1
					WHERE id=$id";
			$mysqli->query($sql);
		}
	}

	$sql = "SELECT * 
			FROM user
			WHERE active = 0";	
	$result = mysqli_query($mysqli,$sql);
	while ($row = mysqli_fetch_array($result)) array_push($data,$row);
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("admin.html.head.inc.php"); ?>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script>
		function changeBackgroundClass(id){
			var entry = ".entry-"+id;			
			if($(entry).hasClass("selected-to-activate")){
				$(entry).removeClass('selected-to-activate');
			} else {
				$(entry).addClass('selected-to-activate');
			}
		}
	</script>
</head>
<body>
	<div class="site-wrap">
		<div class="sidebar">
			<ul>
				<li class="nav-item"><a href="#">Personen bestätigen</a></li>				
			</ul>
		</div>		
		<div class="main-content">
			<form action="admin.php" method="POST">
				<input type="submit" name="submit" value="Änderungen speichern!" class="submit">
				<table>
					<tr>
						<td>VN</td>
						<td>NN</td>
						<td>User</td>
						<td>E-Mail</td>
						<td>Straße</td>
						<td>Ort</td>
						<td>PLZ</td>
						<td>Geburtstag</td>
						<td>Aktivieren</td>
					</tr>

					<?php 					
						foreach ($data as $row) {
					 ?>
						<tr class="entry-<?=$row["id"] ?> <? if($row["active"]==1){echo "selected-to-activate";} ?>"> 
							<td><?=$row["firstname"] ?></td>
							<td><?=$row["lastname"] ?></td>
							<td><?=$row["username"] ?></td>
							<td><?=$row["email"] ?></td>
							<td><?=$row["street"] ?></td>
							<td><?=$row["city"] ?></td>
							<td><?=$row["postcode"] ?> </td>
							<td><?=$row["birthday"] ?></td>
							<td><input type="checkbox" onchange="changeBackgroundClass(<?=$row["id"] ?>);" value="<?=$row["id"]?>" name="checkboxes[]"></td>
						</tr>
					<?php 						
						}
					 ?>
				</table>
			</form>	
		</div>		
	</div>
</body>
</html>