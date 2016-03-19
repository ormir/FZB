<?php
session_start();

if(isset($_POST["loginsubmit"])){

	// echo 'CONNECTING TO DB';
	$servername = "sql7.freesqldatabase.com";
	$username = "sql7111381";
	$password = "l4icJ9cjd2";
	$dbname = "sql7111381";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: ".$mysqli->connect_error);
	}

	$password = md5($_POST["password"]);

	$sql = "SELECT `id`
				FROM  user
				WHERE email =  '".$_POST['email']."'
				OR username =  '".$_POST['email']."'
				AND PASSWORD =  '".$password."'
				AND active = 1";

	$result = $mysqli->query($sql);

	if ($result->num_rows == 1) {
	    $row = $result->fetch_assoc();
	    $_SESSION['user_id'] = $row["id"];
	    header("location:index.php");	    
	} else {
	    header("location:register.php");	
	}
}


?>