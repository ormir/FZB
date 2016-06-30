<?php 
	include("admin.common.inc.php");	
	connectDB();
	$sel = "user-aendern";
	$data = array();

	if(isset($_GET["del"])){
		$id = $_GET['del'];
		$sql = "DELETE FROM user
		WHERE id = $id";
		$result = mysqli_query($mysqli,$sql);
	}

	if(isset($_POST['submit'])){
	   if($_POST['to_admin'] != NULL){
			foreach($_POST['to_admin'] as $id) {
				$sql = "UPDATE user
						SET admin=1
						WHERE id=$id";						
				$mysqli->query($sql);
			}
		}

		if($_POST['to_user'] != NULL){
			foreach($_POST['to_user'] as $id) {
				$sql = "UPDATE user
						SET admin=0
						WHERE id=$id";
				$mysqli->query($sql);
			}
		}
	}

	$sql = "SELECT * 
			FROM user
			WHERE active = 1
			ORDER BY lastname";	
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

			if(n == 1){
				var entry = ".entry-"+id;		
				if($(entry).hasClass("selected-to-admin")){
					$(entry).removeClass('selected-to-admin');
				} else {
					$(entry).addClass('selected-to-admin');
				}
			} else if(n == 2) {
				var entry = ".entry-"+id;		
				if($(entry).hasClass("selected-to-user")){
					$(entry).removeClass('selected-to-user');
				} else {
					$(entry).addClass('selected-to-user');
				}
			}
			
		}

		function delete_entry(id,user)
		{
			if (confirm("Soll der Benutzer "+user+" wirklich gelöscht werden?")) window.location.href = "user_list.php?del="+id;
		}

	</script>
</head>
<body>
	<div class="site-wrap">
		<a href="../logout.php" class="logout-button">Logout</a> &nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="normal-view.php">User Ansicht</a>
	</div>	
	<div class="site-wrap user-list">
		<?php include("sidebar.inc.php"); ?>	
		<div class="main-content">
			<form action="user_list.php" method="POST">
				<input type="submit" name="submit" value="Änderungen speichern!" class="submit">
				<br><br><br><br>
				<h2>Admins</h2>
				<table>
					<tr>
						<td>Vorname</td>
						<td>Nachname</td>
						<td>Username</td>
						<td>Benutzer</td>
					</tr>
					<?php 					
						foreach ($data as $row) {
							if($row["admin"] != 1) continue;
							if($row["id"] == 1) continue;
					 ?>
						<tr class="entry-<?=$row["id"] ?>"> 
							<td><?=$row["firstname"] ?></td>
							<td><?=$row["lastname"] ?></td>
							<td><?=$row["username"] ?></td>
							<td><input type="checkbox" onchange="changeBackgroundClass(<?=$row["id"] ?>, 2)" class="delete" value="<?=$row["id"]?>" name="to_user[]"></td>
						</tr>
					<?php
						}
					 ?>
				</table>

				<br><br><br><br>
				<h2>Benutzer</h2>
				<table>
					<tr>
						<td>Vorname</td>
						<td>Nachname</td>
						<td>Username</td>
						<td>Editieren</td>
						<td>Passwort neu setzen</td>
						<td>Löschen</td>
						<td>Admin</td>
					</tr>
					<?php 					
						foreach ($data as $row) {
							if($row["admin"] == 1) continue;
					 ?>
						<tr class="entry-<?=$row["id"] ?>"> 
							<td><?=$row["firstname"] ?></td>
							<td><?=$row["lastname"] ?></td>
							<td><?=$row["username"] ?></td>
							<td><a href="user_list_edit.php?edit=<?=$row["id"] ?>"><img src="../images/admin/admin_edit.gif" alt=""></a></td>		
							<td><a href="password_reset.php?edit=<?=$row["id"] ?>"><img src="../images/admin/admin_edit.gif" alt=""></a></td>			
							<td><a href="javascript:delete_entry(<? echo $row["id"].",'".$row["username"]?>')" class="delete-user"><img src="../images/admin/admin_delete.gif" alt=""></a></td>
							<td><input type="checkbox" class="delete" onchange="changeBackgroundClass(<?=$row["id"] ?>, 1)" value="<?=$row["id"]?>" name="to_admin[]"></td>
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