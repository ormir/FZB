<?php	
	header('Content-Type: application/json');
	include('../common.inc.php');

	// Get all interests
	$all_interest_sql = "SELECT id, name FROM interest";
	$all_interest = $mysqli->query($all_interest_sql);
	$result = array();

	if ($all_interest->num_rows > 0) {
	   	while ($row = $all_interest->fetch_assoc()) {
	    	// echo $row["id"]." ".$row["name"]."<br>";     
	    	// $result[] = $row;
	    	$result[] = array('id' => $row["id"], 'name' => $row["name"]);
	   	}   
	}

	$json = array('list' => $result);
	echo json_encode($json);
?>