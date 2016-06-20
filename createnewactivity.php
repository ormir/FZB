<?php
/*Aktivität muss mit Ort und Interesse noch zusammengefügt werden.
 	|-> Damit die Zwischentabelle(activity-interest,activity-place) gefüllt werden. 
*/
include "common.inc.php";
global $mysqli;
if(isset($_POST["Art"])&&isset($_POST["Beschreibung"])&&isset($_POST["ATag"])&&isset($_POST["AMonat"])
	&&isset($_POST["AJahr"])&&isset($_POST["AStunde"])&&isset($_POST["AMinute"])
	&&isset($_POST["Ort"])&&isset($_POST["Adresse"])&&isset($_POST["Bezirk"])
	&&isset($_POST["Teilnehmermin"])&&isset($_POST["Teilnehmermax"])
	&&isset($_POST["ETag"])&&isset($_POST["EMonat"])&&isset($_POST["EJahr"])
	&&isset($_POST["AStunde"])&&isset($_POST["AMinute"]))
{
	$Bezirk=$_POST["Bezirk"];
	if(strpos($Bezirk, ".")==1)
	$Bezirk="10".substr($Bezirk, 0,1)."0";
	else
		$Bezirk="1".substr($Bezirk, 0,2)."0";


	$startDate=$_POST["AJahr"]."-".$_POST["AMonat"]."-".$_POST["ATag"]." ".$_POST["AStunde"].":".$_POST["AMinute"].":"."00";
	$endDate=$_POST["EJahr"]."-".$_POST["EMonat"]."-".$_POST["ETag"]." ".$_POST["EStunde"].":".$_POST["EMinute"].":"."00";
	
$sql = "INSERT INTO activity (id,name, description, `date-start`,`date-end`,`max-participants`,
`min-participants`)
	VALUES (NULL,'".$_POST["Art"]."','".$_POST["Beschreibung"]."','".$startDate."','".$endDate."','".$_POST["Teilnehmermin"]."','".$_POST["Teilnehmermax"]."')";
	
	if($mysqli->query($sql)===TRUE)
	{
		echo '<script> alert("Sie haben eine Aktivität Erstellt");</script>';
	}
	else
		echo '<script> alert(".Error:'.$sql .$mysqli->error.'");</script>';

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
		echo '<script> alert("Sie haben eine Aktivität Erstellt");</script>';
	}
	else
		echo '<script> alert(".Error:'.$sql .$mysqli->error.'");</script>';	

	$sql= "SELECT id FROM place WHERE street='".$_POST["Adresse"]."' AND postcode='".$Bezirk."'";
	$result=$mysqli->query($sql);
	$row = $result->fetch_assoc();
	$fk_place_id=$row["id"];

	$sql ="INSERT INTO `activity-place`(id,`fk-activity-id`,`fk-place-id`)
			VALUES(NULL,'".$fk_activity_id."','".$fk_place_id."')";

	if($mysqli->query($sql)===TRUE)
	{
		echo '<script> alert("Sie haben eine Aktivität Erstellt");</script>';
	}
	else
		echo '<script> alert(".Error:'.$sql .$mysqli->error.'");</script>';	
				
		

}




?>