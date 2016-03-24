<?php
	global $mysqli;
	$sqlplace = "select id, name from place";
	$resultplace = $mysqli->query($sqlplace);

	$sqlinterest = "select name from interest";
	$resultinterest = $mysqli->query($sqlinterest);

	$sqldistrict = "select name, postcode from district";
	$resultdistrict = $mysqli->query($sqldistrict);

if($welchesInput=="district"){

	if ($resultdistrict->num_rows > 0) {
   		// output data of each row
    	$d=1;
   		while($row = $resultdistrict->fetch_assoc()) {
   			if($row["postcode"]>=1010&&$row["postcode"]<=1230){
   										 		
   				echo '<option value="'.$row["postcode"].'">'.$d.'. '.' Bezirk'.' ('.$row["name"].')'. '</option>';
   				$d++;
   			}else
   			{
   				echo '<option value="'.$row["postcode"].'">'.$row["postcode"].' ('.$row["name"].')'. '</option>';
   			}
		}
    										
	} else {
  		echo "0 results";
	}

}else if($welchesInput=="interest"){
	if ($resultinterest->num_rows > 0) {
   		// output data of each row
    
   		while($row = $resultinterest->fetch_assoc()) {
   			echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
   		}
   	}else
   	{
   		echo '<option>0 results</option>';
   	}
}else if($welchesInput=="place"){
	if ($resultplace->num_rows > 0) {
   		// output data of each row
    	$d=1;
   		while($row = $resultplace->fetch_assoc()) {
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
}else if($welchesInput=="stunde") {
	for($i=1; $i<25;$i++){
			if($i<10)
				echo '<option value='.$i.'>'.'0'.$i.'</option>';
				else
				echo '<option value='.$i.'>'.$i.'</option>';
	}
}else if($welchesInput=="minute") {
	for($i=0; $i<61;$i++){
			if(($i%15)==0)
			echo '<option value='.$i.'>'.$i.'</option>';
		}
}

?>