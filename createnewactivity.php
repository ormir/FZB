<?php
/*Aktivität muss mit Ort und Interesse noch zusammengefügt werden.
 	|-> Damit die Zwischentabelle(activity-interest,activity-place) gefüllt werden. 
*/
include "common.inc.php";
global $mysqli;
if(isset($_POST["Art"])&&isset($_POST["Beschreibung"])&&isset($_POST["ATag"])&&isset($_POST["AMonat"])
	&&isset($_POST["AJahr"])&&isset($_POST["AStunde"])&&isset($_POST["AMinute"])
	&&isset($_POST["Ort"])&&isset($_POST["Teilnehmermin"])&&isset($_POST["Teilnehmermax"])
	&&isset($_POST["ETag"])&&isset($_POST["EMonat"])&&isset($_POST["EJahr"])
	&&isset($_POST["AStunde"])&&isset($_POST["AMinute"]))
{
	

	$fk_user_id=$_SESSION["user_id"];
	$startDate=$_POST["AJahr"]."-".$_POST["AMonat"]."-".$_POST["ATag"]." ".$_POST["AStunde"].":".$_POST["AMinute"].":"."00";
	$endDate=$_POST["EJahr"]."-".$_POST["EMonat"]."-".$_POST["ETag"]." ".$_POST["EStunde"].":".$_POST["EMinute"].":"."00";
	
$sql = "INSERT INTO activity (id,name, description, `date-start`,`date-end`,`max-participants`,
`min-participants`)
	VALUES (NULL,'".$_POST["Art"]."','".$_POST["Beschreibung"]."','".$startDate."','".$endDate."','".$_POST["Teilnehmermin"]."','".$_POST["Teilnehmermax"]."')";
	
	if($mysqli->query($sql)===TRUE)
	{
		
	}



	$sql= "SELECT id FROM activity WHERE name='".$_POST["Art"]."' AND `date-start`='".$startDate."' 
	AND `date-end`='".$endDate."'";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
	$fk_activity_id=$row["id"];

	$sql= "SELECT id FROM interest WHERE name='".$_POST["Art"]."'";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
	$fk_interest_id=$row["id"];

$sql ="INSERT INTO `activity-interest`(id,`fk-activity-id`,`fk-interest-id`)
			VALUES(NULL,'".$fk_activity_id."','".$fk_interest_id."')";
	if($mysqli->query($sql)===TRUE)
	{

	}
	else{}

	$sql= "SELECT id FROM place WHERE name='".$_POST["Ort"]."'";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
	$fk_place_id=$row["id"];

	$sql ="INSERT INTO `activity-place`(id,`fk-activity-id`,`fk-place-id`)
			VALUES(NULL,'".$fk_activity_id."','".$fk_place_id."')";

	if($mysqli->query($sql)===TRUE)
	{
	}
	else{}

	$sql ="INSERT INTO `user-activity`(id,`fk-activity-id`,`fk-user-id`,`admin`)
			VALUES(NULL,'".$fk_activity_id."','".$fk_user_id."',1)";

	if($mysqli->query($sql)===TRUE)
	{
	}
	else{}
	if(isset($_POST["Gruppe"]))
	{
		$sql= "SELECT `id` FROM `group` WHERE `name`='".$_POST["Gruppe"]."'";
		$result=$mysqli->query($sql);
		$row = $result->fetch_assoc();
		$fk_group_id=$row["id"];

		$sql ="INSERT INTO `group-activity`(id,`fk-activity-id`,`fk-group-id`)
		VALUES(NULL,'".$fk_activity_id."','".$fk_group_id."')";

		if($mysqli->query($sql)===TRUE)
		{
		}
		else{}
	}

}




?>