<?php	
	header('Content-Type: application/json');
	include('../common.inc.php');

	$responce = array();

	// Get all interests
	$all_places_sql = "SELECT id, name FROM place";
	$all_places = $mysqli->query($all_places_sql);
	$result = array();

	if ($all_places->num_rows > 0) {
	   	while ($row = $all_places->fetch_assoc()) {
	    	$result[] = array('id' => $row["id"], 'name' => $row["name"]);
	   	}   
	}

	// Get user saved place
	$user_place_sql = "select `fk-place-id` from `user-place` where `fk-user-id` = ".$_SESSION['user_id'];
	$user_place = $mysqli->query($user_place_sql);
	$user_place_result = array();

	for ($i = 0; $i < $user_place->num_rows; $i++) { 
		$row = $user_place->fetch_assoc();
		$user_place_result[$i] = $row['fk-place-id'];
	}

	// $json = array('list' => $result);
	$responce['user_place'] = $user_place_result;
	$responce['list'] = $result;
	echo json_encode($responce);
	$mysqli->close();
?>