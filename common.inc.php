<?php
session_start();

if(!isset($_SESSION['user_id']) && !strpos($_SERVER[REQUEST_URI], 'register')){
	header("location:register.php");
}

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

?>
