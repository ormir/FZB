<?php
global $mysqli;

if(isset($_GET['i'])) {
	$id = cleanParam($_GET['i']);

	// load basic group info
	$sql = "SELECT * FROM `group` WHERE id = '".$id."'";
	$result = $mysqli->query($sql);
	if($result->num_rows > 0) {
		$groupResult = $result->fetch_assoc();
	}

	$userResult = array();
	// load users in group
	$sql = "SELECT * FROM `user-group` as ug
			LEFT JOIN `user` as u ON u.id = ug.`fk-user-id`
			WHERE `fk-group-id` = '$id'";
	$result = $mysqli->query($sql);
	$userCount = 0;
	if($result->num_rows > 0) {
		while($row = $result->fetch_assoc()){
			if($row["id"] == "") continue;
			array_push($userResult, $row);
			$userCount++;
		}
	}

	// load activities from group
	$activityResult = array();
	$sql = "SELECT * FROM `group-activity` AS ga
			LEFT JOIN `activity` AS a ON a.id = ga.`fk-activity-id`
			WHERE `fk-group-id` = $id";
	$result = $mysqli->query($sql);
	if($result->num_rows > 0) {		
		while($row = $result->fetch_assoc()){
			if($row["id"] == "") continue;
			array_push($activityResult, $row);				
		}
	}

	// load group tags
	$tagsResult = array();
	$sql = "SELECT * FROM `group-interest` AS gi
			LEFT JOIN `interest` AS i ON i.id = gi.`fk-interest-id`
			WHERE `fk-group-id` = $id";
	$result = $mysqli->query($sql);
	if($result->num_rows > 0) {	
		while($row = $result->fetch_assoc()){
			if($row["id"] == "") continue;
			array_push($tagsResult, $row);
		}
	}

	$blogResult = array();
	$sql = "SELECT * FROM `blog`
			WHERE `fk-group-id` = $id
			ORDER BY `date`";
	$result = $mysqli->query($sql);
	if($result->num_rows > 0) {	
		while($row = $result->fetch_assoc()){
			if($row["id"] == "") continue;
			array_push($blogResult, $row);
		}
	}

}

?>