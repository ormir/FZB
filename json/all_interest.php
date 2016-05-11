<?php	
	header('Content-Type: application/json');
	include('../common.inc.php');

	$responce = array();

	// Get all interests
	$all_interest_sql = "SELECT id, name FROM interest";
	$all_interest = $mysqli->query($all_interest_sql);
	$all_interest_result = array();

	if ($all_interest->num_rows > 0) {
	   	while ($row = $all_interest->fetch_assoc()) {
	    	$all_interest_result[] = array('id' => $row["id"], 'name' => $row["name"]);
	   	}   
	}

	// Get user saved interest
	$user_interest_sql = "select `fk-interest-id` from `user-interest` where `fk-user-id` = ".$_SESSION['user_id'];
	$user_interest = $mysqli->query($user_interest_sql);
	$user_interest_result = array();

	for ($i = 0; $i < $user_interest->num_rows; $i++) { 
		$row = $user_interest->fetch_assoc();
		$user_interest_result[$i] = $row['fk-interest-id'];
	}

	$responce['user_interst'] = $user_interest_result;
	$responce['list'] = $all_interest_result;
	echo json_encode($responce);
	$mysqli->close();
?>