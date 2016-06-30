<?php 
	include("admin.common.inc.php");	
	connectDB();
	$sel = "user-aendern";
	$data = array();

	if(isset($_GET["edit"])){
		$id = intval(cleanParam($_GET["edit"]));
	} else {
		$id = NULL;
	}

	$vn = "NULL";
	$ln = "NULL";
	$usr = "NULL";
	$email = "NULL";
	$telno = "NULL";
	$city = "NULL";
	$street = "NULL";
	$postcode = "NULL";
	$bio = "NULL";
	$birthday = "NULL";

	if(isset($_POST["save"])){
		$vn = cleanParam($_POST["firstname"]);
		$ln = cleanParam($_POST["lastname"]);
		$usr = cleanParam($_POST["username"]);
		$email = cleanParam($_POST["email"]);
		$telno = cleanParam($_POST["tel-no"]);
		$city = cleanParam($_POST["city"]);
		$street = cleanParam($_POST["street"]);
		$postcode = cleanParam($_POST["postcode"]);
		$bio = cleanParam($_POST["bio"]);
		$birthday = cleanParam($_POST["birthdate"]);

		$sql = "UPDATE user
				SET firstname='$vn',
				lastname='$ln',
				username='$usr',
				email='$email',
				`tel-no`='$telno',
				city='$city',
				street='$street',
				postcode='$postcode',
				bio='$bio',
				birthday='$birthday'
				WHERE id=$id";

		$mysqli->query($sql);
	}

	if($id != NULL){
		$sql = "SELECT * 
				FROM user
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
		<a href="../logout.php" class="logout-button">Logout</a> &nbsp;&nbsp;|&nbsp;&nbsp;
		<a href="normal-view.php">User Ansicht</a>
	</div>	
	<div class="site-wrap user-list-edit">
		<?php include("sidebar.inc.php"); ?>
		<div class="main-content">
			<br><br><br><br>
			<table>
				<form action="user_list_edit.php?edit=<?=$id; ?>" method="POST">
					<div class="save-buttons">
						<input type="submit" value="Speichern" name="save">
					</div>						
					
					<tr>
						<td>Vorname</td>
						<td><input type="text" name="firstname" value="<?= $row["firstname"]?>"></td>
					</tr>
					<tr>
						<td>Nachname</td>
						<td><input type="text" name="lastname" value="<?= $row["lastname"]?>"></td>
					</tr>
					<tr>
						<td>Username</td>
						<td><input type="text" name="username" value="<?= $row["username"]?>"></td>
					</tr>
					<tr>
						<td>E-Mail</td>
						<td><input type="text" name="email" value="<?= $row["email"]?>"></td>
					</tr>
					<tr>
						<td>Telefon Nummer</td>
						<td><input type="text" name="tel-no" value="<?= $row["tel-no"]?>"></td>
					</tr>
					<tr>
						<td>Wohnort</td>
						<td>
							<input type="text" name="street" class="street" placeholder="Straße" value="<?= $row["street"]?>">
							<input type="text" name="city" class="city" placeholder="Stadt" value="<?= $row["city"]?>"> 														
							<input type="text" name="postcode" class="postcode" placeholder="PLZ" value="<?= $row["postcode"]?>"> 
						</td>
					</tr>
					<tr class="bio">
						<td>Biografie</td>
						<td class="textarea-wrap"><textarea name="bio" id="bio"><?= $row["bio"]?></textarea></td>
					</tr>
					<tr>
						<td>Geburtstag</td>
						<td><input type="date" name="birthdate" value="<?= $row["birthday"]?>"></td>
					</tr>
				</form>				
			</table>
		</div>				
	</div>
</body>
</html>