<?php

//include "common.inc.php";
global $mysqli;
$sql1 = "SELECT id from `user` where firstname = ".$_SESSION['user_id'];
echo $sql1;
$sql = "SELECT name, description FROM `group`";
$sqlgroup = "SELECT id from `group` "
$sql2 = "SELECT name from `interest`,`group-interest` ON id=fk_interest_id";

$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
    	?>
    	<tr>
    	
    	<td><a class="group-link" href="#"><?=$row['name'] ?>
    	</a></td>
    	<td><a class="group-link" href="#"><?=$row['description'] ?>
    	</a></td>

    	</tr>
        <?php
    }
} else {
    echo "0 results";
}
?>