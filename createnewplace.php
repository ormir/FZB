<?php
/*Aktivität muss mit Ort und Interesse noch zusammengefügt werden.
 	|-> Damit die Zwischentabelle(activity-interest,activity-place) gefüllt werden. 
*/
include "common.inc.php";
global $mysqli;

if(isset($_POST["Name"])&&isset($_POST["Art"])&&isset($_POST["Adresse"])&&isset($_POST["Bezirk"])&&isset($_POST["Ort"])&&isset($_POST["Beschreibung"]))
{
	$Bezirk=$_POST["Bezirk"];
	if(strpos($Bezirk, ".")==1)
	$Bezirk="10".substr($Bezirk, 0,1)."0";
	else
		$Bezirk="1".substr($Bezirk, 0,2)."0";


	$sql = "INSERT INTO place (id,street, name,postcode,city,description)
	VALUES (NULL,'".$_POST["Adresse"]."','".$_POST["Name"]."','".$Bezirk."','".$_POST["Ort"]."','".$_POST["Beschreibung"]."');";
	
if($mysqli->query($sql)===TRUE)
	{
		echo '<script> alert("Sie haben eine Aktivität Erstellt");</script>';
	}
	else
		echo '<script> alert(".Error:'.$sql . $mysqli->error.'");</script>';

	
	
	
	
}

?>