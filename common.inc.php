<?php
session_start();

// If no user is loggid in, redirect to register page
if(!isset($_SESSION['user_id']) && !strpos($_SERVER[REQUEST_URI], 'register')){
	header("location:register.php");
}

// DB Connection
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
	if (!$mysqli->set_charset("utf8")) {
	  err_handle("db error({$mysqli->errno}).");
	}

function cleanParam($string)
{
	return addslashes(stripslashes($string));
}
?>
