<?php
session_start();

if($_SESSION["admin"] == false){
	header("location:index.php");
}

// DB global variable
$mysqli = NULL;

if(!isset($_SESSION['user_id'])){
	header("index.php");
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

function cleanParam($string)
{
	return addslashes(stripslashes($string));
}
?>

