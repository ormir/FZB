<?php	
	header('Content-Type: application/json');
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

	// Get all interests
	$all_interest_sql = "SELECT id, name FROM interest";
	// $data = array();

	// $result = mysqli_query($mysqli,$all_interest_sql);
	// while ($row = mysqli_fetch_array($result)) array_push($data,$row);

	$all_interest = $mysqli->query($all_interest_sql);

	$result = array();

	if ($all_interest->num_rows > 0) {
	   	while ($row = $all_interest->fetch_assoc()) {
	    	// echo $row["id"]." ".$row["name"]."<br>";     
	    	// $result[] = $row;
	    	$result[] = array('id' => $row["id"], 'name' => $row["name"]);
	   	}   
	}

	$json = array('interest' => $result);
	echo json_encode($json);
?>