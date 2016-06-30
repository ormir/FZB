<?php
/*Aktivität muss mit Ort und Interesse noch zusammengefügt werden.
 	|-> Damit die Zwischentabelle(activity-interest,activity-place) gefüllt werden. 
*/
include "common.inc.php";
global $mysqli;
if(isset($_POST["Name"])&&isset($_POST["Art"])&&isset($_POST["Beschreibung"]))
{
	$sql = "INSERT INTO `group` (name, description,`fk-admin-id`)
	VALUES ('".$_POST["Name"]."','".$_POST["Beschreibung"]."','".$_SESSION["user_id"]."');";
	
	if($mysqli->query($sql)===TRUE)
	{
	}

	$sql= "SELECT id FROM `group` WHERE name='".$_POST["Name"]."'";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
	$fk_group_id=$row["id"];
	
	$sql= "SELECT id FROM `interest` WHERE name='".$_POST["Art"]."'";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
	$fk_interest_id=$row["id"];
	
	

	$sql ="INSERT INTO `group-interest`(id,`fk-group-id`,`fk-interest-id`)
			VALUES(NULL,'".$fk_group_id."','".$fk_interest_id."')";

	$mysqli->query($sql);
	
		

	$fk_user_id=$_SESSION["user_id"];
	$sql ="INSERT INTO `user-group`(id,`fk-group-id`,`fk-user-id`)
			VALUES(NULL,'".$fk_group_id."','".$fk_user_id."')";
	$mysqli->query($sql);
}	



header("location:groupdescription.php?i=$fk_group_id");

?>