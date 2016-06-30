<?
	session_start();

	if($_SESSION["admin"] == true){
		$_SESSION["admin-frontend"] = false;
		header("location:admin/activate_user.php");
	} else {
		header("location:index.php");
	}

?>