<?php
	global $mysqli;
	
	
if($welchesInput=="groupAdmin"){
	$usr_id=$_SESSION["user_id"];
	$sql = "SELECT `name` from `group` where `fk-admin-id`=".$usr_id;
	$resutls = $mysqli->query($sql);

   			echo '<option value="Keine Gruppe">Keine Gruppe</option>';
	if ($resutls->num_rows > 0) {
   		// output data of each row
   		while($row = $resutls->fetch_assoc()) {
   			echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
   		}
   	}
   	
   	

}	
else
if($welchesInput=="district"){
	
    echo '<option value="1. Bezirk (Innere Stadt)">1. Bezirk (Innere Stadt)</option>';
    echo '<option value="2. Bezirk (Leopoldstadt)">2. Bezirk (Leopoldstadt)</option>';
    echo '<option value="3. Bezirk (Landstraße)">3. Bezirk (Landstraße)</option>';
    echo '<option value="4. Bezirk (Wieden)">4. Bezirk (Wieden)</option>';
    echo '<option value="5. Bezirk (Margareten)">5. Bezirk (Margareten)</option>';
    echo '<option value="6. Bezirk (Mariahilf)">6. Bezirk (Mariahilf)</option>';
    echo '<option value="7. Bezirk (Neubau)">7. Bezirk (Neubau)</option>';
    echo '<option value="8. Bezirk (Josefstadt)">8. Bezirk (Josefstadt)</option>';
    echo '<option value="9. Bezirk (Alsergrund)">9. Bezirk (Alsergrund)</option>';
    echo '<option value="10. Bezirk (Favoriten)">10. Bezirk (Favoriten)</option>';
    echo '<option value="11. Bezirk (Simmering)">11. Bezirk (Simmering)</option>';
    echo '<option value="12. Bezirk (Meidling)">12. Bezirk (Meidling)</option>';
    echo '<option value="13. Bezirk (Hietzing)">13. Bezirk (Hietzing)</option>';
    echo '<option value="14. Bezirk (Penzing)">14. Bezirk (Penzing)</option>';
    echo '<option value="15. Bezirk (Rudolfsheim-Fünfstadt)">15. Bezirk (Rudolfsheim-Fünfstadt)</option>';
    echo '<option value="16. Bezirk (Ottakring)">16. Bezirk (Ottakring)</option>';
    echo '<option value="17. Bezirk (Hernals)">17. Bezirk (Hernals)</option>';
    echo '<option value="18. Bezirk (Währing)">18. Bezirk (Währing)</option>';
    echo '<option value="19. Bezirk (Döbling)">19. Bezirk (Döbling)</option>';
    echo '<option value="20. Bezirk (Brigittenau)">20. Bezirk (Brigittenau)</option>';
    echo '<option value="21. Bezirk (Floridsdorf)">21. Bezirk (Floridsdorf)</option>';
    echo '<option value="22. Bezirk (Donaustadt)">22. Bezirk (Donaustadt)</option>';
    echo '<option value="23. Bezirk (Liesing)">23. Bezirk (Liesing)</option>';

}else if($welchesInput=="interest"){
	$sqlinterest = "select name from interest";
	$resultinterest = $mysqli->query($sqlinterest);

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
	$sqlplace = "select id, name from place";
	$resultplace = $mysqli->query($sqlplace);

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
	for($i=1; $i<32;$i++){
		if($i<10)
			echo '<option value=0'.$i.'>'.$i.'</option>';
		else
			echo '<option value='.$i.'>'.$i.'</option>';
	}
}else if ($welchesInput=="monat") {
	$months = array("Jänner", "Februar", "März", "April", "Mai", "Juni",  "Juli","August", "September", "Oktober", "November", "Dezember");
		for($i=0; $i<12;$i++){
			$value=$i+1;
			if($i<10)
				echo '<option value="0'.$value.'">'.$months[$i].'</option>';
			else
				echo '<option value="'.$value.'">'.$months[$i].'</option>';
		}
}else if ($welchesInput=="jahr") {
	for($i=0; $i<101;$i++){
		$years = date('Y')+$i;
		echo '<option value='.$years.'>'.$years.'</option>';

	}
}else if($welchesInput=="stunde") {
	for($i=1; $i<25;$i++){
			if($i<10)
				echo '<option value=0'.$i.'>'.'0'.$i.'</option>';
				else
				echo '<option value='.$i.'>'.$i.'</option>';
	}
}else if($welchesInput=="minute") {
	for($i=0; $i<46;$i++){
			if(($i%15)==0)
			{
				if($i!=0)
					echo '<option value='.$i.'>'.$i.'</option>';
				else
					echo '<option value=0'.$i.'>'.'0'.$i.'</option>';
			}
		
		}
}

?>