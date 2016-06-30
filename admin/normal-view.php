<?php
	session_start();
	
	$_SESSION["admin-frontend"] = true;
	header("location:../index.php");
?>