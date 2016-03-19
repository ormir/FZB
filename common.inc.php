<?php
session_start();

// DB global variable
$mysqli = NULL;

if(!isset($_SESSION['user_id']) && !strpos($_SERVER[REQUEST_URI], 'register')){
	header("location:register.php");
}

function connectDB(){
	// echo 'CONNECTING TO DB';
	$servername = "sql7.freesqldatabase.com";
	$username = "sql7111381";
	$password = "l4icJ9cjd2";
	$dbname = "sql7111381";
	global $mysqli;

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: ".$mysqli->connect_error);
	}
} 

function authenticate($username, $password){
	// Hash password
	$password = md5($password);
	global $mysqli;

	$sql = "SELECT `id-user`
				FROM  user
				WHERE email =  '".$username."'
				OR username =  '".$username."'
				AND PASSWORD =  '".$password."'
				AND active = 1";

	$result = $mysqli->query($sql);

	if ($result->num_rows == 1) {
	    $row = $result->fetch_assoc();
	    $_SESSION['user_id'] = $row["id-user"];
	    return true;	    
	} else {
	    return false;
	}
}

// Parameter säubern
function cleanParam($string)
{
	return addslashes(stripslashes($string));
}
?>
