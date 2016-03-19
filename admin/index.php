<?php 
	include("admin.common.inc.php");	
	connectDB();
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("admin.html.head.inc.php"); ?>
</head>
<body>
	<div class="site-wrap">
		<form action="index.php">
			<input type="text" name="username">
			<input type="password" name="password">
			<input type="submit" name="submit">
		</form>
	</div>
</body>
</html>