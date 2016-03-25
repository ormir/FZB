<?php 
	include("admin.common.inc.php");	
	connectDB();
	$sel = "interessen-aendern";
	$data = array();

	if(isset($_GET["edit"])){
		$id = intval(cleanParam($_GET["edit"]));
	} else {
		$id = NULL;
	}

	$name = NULL;
	$description = NULL;

	if(isset($_POST["save"])){
		$name = cleanParam($_POST["name"]);
		$description = cleanParam($_POST["description"]);

		$sql = "UPDATE `interest`
				SET name='$name',
				description='$description'
				WHERE id=$id";

		$mysqli->query($sql);
	}

	if($id != NULL){
		$sql = "SELECT * 
				FROM `interest`
				WHERE id = $id";	
		$result = mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($result);
	}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("admin.html.head.inc.php"); ?>
	<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
	<script src='//cdn.tinymce.com/4/tinymce.min.js'></script>
	<script>
		tinymce.init({
			selector: '#bio'
		});
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
				<form action="interest_list_edit.php?edit=<?=$id; ?>" method="POST">
					<div class="save-buttons">
						<input type="submit" value="Speichern" name="save">
					</div>						
					
					<tr>
						<td>Interessen Name</td>
						<td><input type="text" name="name" value="<?= $row["name"]?>"></td>
					</tr>					
					<tr class="bio">
						<td>Interessen Beschreibung</td>
						<td><textarea name="description" id="bio"><?= $row["description"]?></textarea></td>
					</tr>
				</form>				
			</table>
		</div>				
	</div>
</body>
</html>