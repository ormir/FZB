<?php
session_start();

// If no user is loggid in, redirect to register page
if(!isset($_SESSION['user_id']) && !strpos($_SERVER['REQUEST_URI'], 'register')){
	header("location:register.php");
}

// DB Connection
$servername = "db4free.net";
$username = "fzb_test";
$password = "fzb_test";
$dbname = "fzb_test";

// Create connection
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: ".$mysqli->connect_error);
}

if (!$mysqli->set_charset("utf8")) {
  err_handle("db error({$mysqli->errno}).");
}


function cleanParam($string) {
	return addslashes(stripslashes($string));
}

/**
 * Returns the basic data of the user
 * @param  integer $id User ID
 * @return array     associative array containing all the information of the user
 *                   if user not found, return NULL
 */
function getUserInformation($id) {
	global $mysqli;
	$sql = "SELECT firstname, lastname, username, email, `tel-no`, street, city, postcode, bio, birthday FROM user where id = ".$id;

	$result = $mysqli->query($sql);

	if ($result->num_rows == 1) {
	    $row = $result->fetch_assoc();
	    return $row;
	} else if ($result !== true) {
		echo "Error getting user information: ".$mysqli->error;
	}	
}
?>
