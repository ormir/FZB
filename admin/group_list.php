<?php 
	include("admin.common.inc.php");	
	connectDB();
	$sel = "gruppe-aendern";
	$data = array();

	if(isset($_GET["del"])){
		$id = $_GET['del'];
		$sql = "DELETE FROM `group`
		WHERE id = $id";
		$result = mysqli_query($mysqli,$sql);
	}

	$sql = "SELECT * 
			FROM `group`";	
	$result = mysqli_query($mysqli,$sql);
	while ($row = mysqli_fetch_array($result)) array_push($data,$row);
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
		<a href="../logout.php" class="logout-button">Logout</a> &nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="normal-view.php">User Ansicht</a>
	</div>	
	<div class="site-wrap group-list">		

		<?php include("sidebar.inc.php"); ?>
		<div class="main-content">
			<br><br><br><br>
			<table>
				<tr>
					<td>Gruppenname</td>
					<td>Editieren</td>
					<td>Löschen</td>
				</tr>

				<?php 					
					foreach ($data as $row) {
				 ?>
					<tr class="entry-<?=$row["id"] ?>"> 
						<td><?=$row["name"] ?></td>
						<td><a href="group_list_edit.php?edit=<?=$row["id"] ?>"><img src="../images/admin/admin_edit.gif" alt=""></a></td>		
						<td><a href="javascript:delete_entry(<? echo $row["id"].",'".$row["name"]?>')" class="delete-user"><img src="../images/admin/admin_delete.gif" alt=""></a></td>
					</tr>
				<?php
					}
				 ?>
			</table>
		</div>				
	</div>
</body>
</html>