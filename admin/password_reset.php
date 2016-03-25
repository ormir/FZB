<?php 
	include("admin.common.inc.php");	
	connectDB();
	$sel = "user-aendern";

	if(isset($_GET["edit"])){
		$id = intval(cleanParam($_GET["edit"]));
	} else {
		$id = NULL;
	}

	if(isset($_POST["save"])){
		$sql = "UPDATE `user`
				SET `password`='".md5($_POST["password"])."'
				WHERE `id`=".$id;
		$mysqli->query($sql);
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
				<form action="password_reset.php?edit=<?=$id; ?>" method="POST">
					<div class="save-buttons">
						<input type="submit" value="Passwort ändern!" name="save">
					</div>											
					<tr>
						<td>Neues Passwort</td>
						<td><input type="password" name="password"></td>
					</tr>
				</form>				
			</table>
		</div>				
	</div>
</body>
</html>