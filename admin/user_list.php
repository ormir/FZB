<?php 
	include("admin.common.inc.php");	
	connectDB();
	$sel = "aendern";
	$data = array();

	if(isset($_GET["del"])){
		$id = $_GET['del'];
		$sql = "DELETE FROM user
		WHERE id = $id";
		$result = mysqli_query($mysqli,$sql);
	}

	$sql = "SELECT * 
			FROM user
			WHERE active = 1";	
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
			console.log(entry);
			if($(entry).hasClass("selected-to-activate")){
				$(entry).removeClass('selected-to-activate');
			} else {
				$(entry).addClass('selected-to-activate');
			}
		}

		function delete_entry(id,user)
		{
			if (confirm("Soll der Benutzer "+user+" tatsächlich gelöscht werden?")) window.location.href = "user_list.php?del="+id;
		}

	</script>
</head>
<body>
	<div class="site-wrap">
		<a href="../logout.php" class="logout-button">Logout</a>
	</div>	
	<div class="site-wrap user-list">
		<?php include("sidebar.inc.php"); ?>	
		<div class="main-content">
			<br><br><br><br>
			<table>
				<tr>
					<td>Vorname</td>
					<td>Nachname</td>
					<td>Username</td>
					<td>Editieren</td>
					<td>Passwort neu setzen</td>
					<td>Löschen</td>
				</tr>

				<?php 					
					foreach ($data as $row) {
				 ?>
					<tr class="entry-<?=$row["id"] ?>"> 
						<td><?=$row["firstname"] ?></td>
						<td><?=$row["lastname"] ?></td>
						<td><?=$row["username"] ?></td>
						<td><a href="user_list_edit.php?edit=<?=$row["id"] ?>"><img src="../images/admin/admin_edit.gif" alt=""></a></td>		
						<td><a href="password_reset.php?edit=<?=$row["id"] ?>"><img src="../images/admin/admin_edit.gif" alt=""></a></td>			
						<td><a href="javascript:delete_entry(<? echo $row["id"].",'".$row["username"]?>')" class="delete-user"><img src="../images/admin/admin_delete.gif" alt=""></a></td>
					</tr>
				<?php
					}
				 ?>
			</table>
		</div>				
	</div>
</body>
</html>