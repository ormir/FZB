<?php 
	global $mysqli;
	$sql = "select name, postcode from district";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
   		// output data of each row
    	$d=1;
   		while($row = $result->fetch_assoc()) {
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
										

?>