<?php 
	include("admin.common.inc.php");	
	connectDB();
	$data = array();
	$sel = "user-bestaetigen";

	if(isset($_POST['submit'])){
	   if($_POST['checkboxes_activate'] != NULL){
			foreach($_POST['checkboxes_activate'] as $id) {
				$sql = "UPDATE user
						SET active=1
						WHERE id=$id";
				$mysqli->query($sql);
			}
		}

		if($_POST['checkboxes_delete'] != NULL){
			foreach($_POST['checkboxes_delete'] as $id) {
				$sql = "DELETE FROM user
						WHERE id=$id";
				$mysqli->query($sql);
			}
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
		function changeBackgroundClass(id,n){
			var entry = ".entry-"+id;		
			var checkbox;
			if(n == 1) {
				if($(entry).hasClass('selected-to-delete')){
					checkbox = entry+" .delete";
					$(checkbox).prop("checked",false);
					$(entry).removeClass('selected-to-delete');
				}
				if($(entry).hasClass("selected-to-activate")){
					$(entry).removeClass('selected-to-activate');
				} else {
					$(entry).addClass('selected-to-activate');
				}
			} else {

				if($(entry).hasClass('selected-to-activate')){
					checkbox = entry+" .activate";
					$(checkbox).prop("checked",false);
					$(entry).removeClass('selected-to-activate');
				}

				if($(entry).hasClass("selected-to-delete")){
					$(entry).removeClass('selected-to-delete');
				} else {
					$(entry).addClass('selected-to-delete');
				}
			}
		}
	</script>
</head>
<body>
	<div class="site-wrap">
		<a href="../logout.php" class="logout-button">Logout</a>
	</div>	
	<div class="site-wrap">
		<?php include("sidebar.inc.php"); ?>	
		<div class="main-content activate-user">
			<form action="activate_user.php" method="POST">
				<input type="submit" name="submit" value="Änderungen speichern!" class="submit">
				<table>
					<tr>
						<td>VN</td>
						<td>NN</td>
						<td>E-Mail</td>
						<td>Straße</td>
						<td>Ort</td>
						<td>PLZ</td>
						<td>Aktivieren</td>
						<td>Löschen</td>
					</tr>

					<?php 					
						foreach ($data as $row) {
					 ?>
						<tr class="entry-<?=$row["id"] ?> <? if($row["active"]==1){echo "selected-to-activate";} ?>"> 
							<td><?=$row["firstname"] ?></td>
							<td><?=$row["lastname"] ?></td>
							<td><?=$row["email"] ?></td>
							<td><?=$row["street"] ?></td>
							<td><?=$row["city"] ?></td>
							<td><?=$row["postcode"] ?> </td>
							<td><input type="checkbox" class="activate" onchange="changeBackgroundClass(<?=$row["id"] ?>,1);" value="<?=$row["id"]?>" name="checkboxes_activate[]"></td>
							<td><input type="checkbox" class="delete" onchange="changeBackgroundClass(<?=$row["id"] ?>,2);" value="<?=$row["id"]?>" name="checkboxes_delete[]"></td>
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