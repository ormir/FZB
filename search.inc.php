<?php 
$eingabe="";
$resultuser=null;

if(isset($_GET["eingabe"]) && $_GET["eingabe"] !=null && $_GET["eingabe"]!=""){
	$eingabe = cleanParam($_GET["eingabe"]);
	$sqluser = "SELECT id, firstname, lastname
			FROM  `user` 
			WHERE (firstname LIKE  '%$eingabe%'
			OR lastname LIKE  '%$eingabe%') AND id<>1;" ;
	$resultuser = $mysqli->query($sqluser);
}
 $sqlplace = "select id, name from `place` where name like '%".$eingabe."%'";

$sqlactivity = "select id, name from `activity` where name like '%$eingabe%'";
$sqlgroup = "select id, name from `group` where name like '%$eingabe%'";


$resultplace = $mysqli->query($sqlplace);

$resultgroup = $mysqli->query($sqlgroup);
$resultactivity = $mysqli->query($sqlactivity);

$anz=0;

if ($resultuser!=null && $resultuser->num_rows > 0) {
		while($rowuser = $resultuser->fetch_assoc()) {
		
				echo '<a href="#" class="list-group-item ">
						<div class="row">

							<div class="col-sm-2 col-md-2">
								<image class="squareimage" width="100" height="100" src="images/person_b.png" />
							</div>

							<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
								<h4 class="list-group-item-heading">'.$rowuser["firstname"].' '.$rowuser["lastname"].'</h4>
								<p class="list-group-item-text"></p>
							</div>
						</div>
					</a>';

	}
}
else
	$anz++;
if ($resultplace!=null && $resultplace->num_rows > 0) {
	while($rowplace = $resultplace->fetch_assoc())
	{
		echo '<a href="#" class="list-group-item ">
						<div class="row">

							<div class="col-sm-2 col-md-2">
								<image class="squareimage" width="100" height="100" src="images/person_b.png" />
							</div>

							<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
								<h4 class="list-group-item-heading">'.$rowplace["name"].'</h4>
								<p class="list-group-item-text"></p>
							</div>
						</div>
					</a>';
	}
} 
else
	$anz++;

if ($resultgroup!=null && $resultgroup->num_rows > 0) {
	while($rowgroup = $resultgroup->fetch_assoc())
	{
		echo '<a href="#" class="list-group-item ">
						<div class="row">

							<div class="col-sm-2 col-md-2">
								<image class="squareimage" width="100" height="100" src="images/person_b.png" />
							</div>

							<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
								<h4 class="list-group-item-heading">'.$rowgroup["name"].'</h4>
								<p class="list-group-item-text"></p>
							</div>
						</div>
					</a>';
	}
} 
else
	$anz++;

if ($resultactivity!=null && $resultactivity->num_rows > 0) {
	while($rowactivity = $resultactivity->fetch_assoc())
	{
		echo '<a href="#" class="list-group-item ">
						<div class="row">

							<div class="col-sm-2 col-md-2">
								<image class="squareimage" width="100" height="100" src="images/person_b.png" />
							</div>

							<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
								<h4 class="list-group-item-heading">'.$rowactivity["name"].'</h4>
								<p class="list-group-item-text"></p>
							</div>
						</div>
					</a>';
	}

}
else
	$anz++;

if($anz==4)
{
	echo 'Keine Ergebnisse gefunden:(';
	$anz=0;
}


/*------------------------------------------------------------------------------------------------------------*/
/*if ($result->num_rows > 0) {
	while($rowuser = $resultuser->fetch_assoc()) {
					
		$eingabe =$_GET["eingabe"];
		$firstname=" ".$rowuser["firstname"];
		$lastname=" ".$rowuser["lastname"];

		if(stripos($firstname, $eingabe)||stripos($lastname, $eingabe)){
?>
				<a href="#" class="list-group-item ">
					<div class="row">

						<div class="col-sm-2 col-md-2">
							<image class="squareimage" width="100" height="100" src="images/person_b.png" />
						</div>

						<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
							<h4 class="list-group-item-heading">'.$rowuser["firstname"].' '.$rowuser["lastname"].'</h4>
							<p class="list-group-item-text"></p>
						</div>
					</div>
				</a>
<?php
		}

	}
} else {
	   echo "0 results";
}*/