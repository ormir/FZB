<?php
	global $mysqli;
	$sql = "select id, name from place";
	$result = $mysqli->query($sql);
if($welchesInput=="place"){
	if ($result->num_rows > 0) {
   		// output data of each row
    	$d=1;
   		while($row = $result->fetch_assoc()) {
   			echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
		}
    										
	} else {
  		echo "0 results";
	}
}else if ($welchesInput=="tag") {
	for($i=1; $i<32;$i++)
		echo '<option value='.$i.'>'.$i.'</option>';
}else if ($welchesInput=="monat") {
	$months = array("Jänner", "Februar", "März", "April", "Mai", "Juni",  "Juli","August", "September", "Oktober", "November", "Dezember");
		for($i=0; $i<12;$i++)
			echo '<option value='.$months[$i].'>'.$months[$i].'</option>';
}else if ($welchesInput=="jahr") {
	for($i=0; $i<101;$i++){
		$years = date('Y')-$i;
		echo '<option value='.$years.'>'.$years.'</option>';

	}
}

?>