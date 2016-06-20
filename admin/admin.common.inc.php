<?php
session_start();

if($_SESSION["admin"] == false || !isset($_SESSION["admin"])){
	header("location:../index.php");
}

// DB global variable
$mysqli = NULL;

if(!isset($_SESSION['user_id'])){
	header("index.php");
}

function connectDB(){
	// // echo 'CONNECTING TO DB';
	// $servername = "sql7.freesqldatabase.com";
	// $username = "sql7111381";
	// $password = "l4icJ9cjd2";
	// $dbname = "sql7111381";
	// global $mysqli;

	// // Create connection
	// $mysqli = new mysqli($servername, $username, $password, $dbname);

	// // Check connection
	// if ($mysqli->connect_error) {
	//     die("Connection failed: ".$mysqli->connect_error);
	// }

	// if (!$mysqli->set_charset("utf8")) {
	//   err_handle("db error({$mysqli->errno}).");
	// }

	// DB Connection
	// $servername = "sql7.freesqldatabase.com";
	// $username = "sql7111381";
	// $password = "l4icJ9cjd2";
	// $dbname = "sql7111381";


	// richtige connection
	$servername = "db4free.net";
	$username = "fzb_test";
	$password = "fzb_test";
	$dbname = "fzb_test";

	// $servername = "localhost";
	// $username = "root";
	// $password = "root";
	// $dbname = "fzb_test";
	global $mysqli;

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: ".$mysqli->connect_error);
	}
	if (!$mysqli->set_charset("utf8")) {
	  err_handle("db error({$mysqli->errno}).");
	}
}

function cleanParam($string)
{
	return addslashes(stripslashes($string));
}
?>

