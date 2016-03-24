<?php
	global $mysqli;
	$sql = "select id, name from place";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
   		// output data of each row
    	$d=1;
   		while($row = $result->fetch_assoc()) {
   			echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
		}
    										
	} else {
  		echo "0 results";
	}
		

?>