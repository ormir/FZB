<?php

global $mysqli;
	$sql = "select name from interest";
	$result = $mysqli->query($sql);

	if ($result->num_rows > 0) {
   		// output data of each row
    
   		while($row = $result->fetch_assoc()) {
   			echo '<option value="'.$row["name"].'">'.$row["name"].'</option>';
   		}
   	}else
   	{
   		echo '<option>0 results</option>';
   	}
?>