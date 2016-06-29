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
		?>
				<a href="profile.php?i=<?php echo $rowuser["id"];?>" class="list-group-item benutzer">
						<div class="row">

							<div class="col-sm-2 col-md-2">
								<image class="squareimage" width="100" height="100" src="images/person_b.png" />
							</div>

							<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
								<h4 class="list-group-item-heading"><?php echo $rowuser["firstname"].' '.$rowuser["lastname"]?></h4>
								<p class="list-group-item-text"></p>
							</div>
						</div>
					</a>
		<?php					
	}
}
else
	$anz++;
if ($resultplace!=null && $resultplace->num_rows > 0) {
	while($rowplace = $resultplace->fetch_assoc())
	{
		?><a href="placedescription.php?i=<?php echo $rowplace["id"];?>" class="list-group-item orte">
						<div class="row">

							<div class="col-sm-2 col-md-2">
								<image class="squareimage" width="100" height="100" src="images/place_b.png" />
							</div>

							<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
								<h4 class="list-group-item-heading"><?php echo $rowplace["name"]?></h4>
								<p class="list-group-item-text"></p>
							</div>
						</div>
					</a>
		<?php
	}
} 
else
	$anz++;

if ($resultgroup!=null && $resultgroup->num_rows > 0) {
	while($rowgroup = $resultgroup->fetch_assoc())
	{
		?><a href="groupdescription.php?i=<?php echo $rowgroup["id"];?>" class="list-group-item gruppe">
						<div class="row">

							<div class="col-sm-2 col-md-2">
								<image class="squareimage" width="100" height="100" src="images/group_b.png" />
							</div>

							<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
								<h4 class="list-group-item-heading"><?php echo $rowgroup["name"];?></h4>
								<p class="list-group-item-text"></p>
							</div>
						</div>
					</a>
		<?php			
	}
} 
else
	$anz++;

if ($resultactivity!=null && $resultactivity->num_rows > 0) {
	while($rowactivity = $resultactivity->fetch_assoc())
	{
		?> <a href="profile.php?i=<?php echo $rowactivity["id"];?>" class="list-group-item activitaet">
						<div class="row">

							<div class="col-sm-2 col-md-2">
								<image class="squareimage" width="100" height="100" src="images/person_b.png" />
							</div>

							<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
								<h4 class="list-group-item-heading"><?php echo $rowactivity["name"];?></h4>
								<p class="list-group-item-text"></p>
							</div>
						</div>
					</a>
		<?php
	}

}
else
	$anz++;

if($anz==4)
{
	echo 'Keine Ergebnisse gefunden:(';
	$anz=0;
}