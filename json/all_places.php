<?php	
	header('Content-Type: application/json');
	include('../common.inc.php');

	// Get all interests
	$all_places_sql = "SELECT id, name FROM place";
	$all_places = $mysqli->query($all_places_sql);
	$result = array();

	if ($all_places->num_rows > 0) {
	   	while ($row = $all_places->fetch_assoc()) {
	    	$result[] = array('id' => $row["id"], 'name' => $row["name"]);
	   	}   
	}

	$json = array('list' => $result);
	echo json_encode($json);
	$mysqli->close();
?>