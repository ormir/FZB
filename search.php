<?php 
	include("common.inc.php");

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
 ?>

<!DOCTYPE html>
<html>
<head>
	<?php include("html.head.inc.php"); ?>

</head>
<body>

<div id="navbar">
	<?php include("header.inc.php"); ?>
</div> <!-- /#navbar -->
<div class="indexcontainer">
<div class="row">
	<div class="col-xs-8 col-sm-4 col-md-2">
	</div>
	<div class="col-xs-16 col-sm-12 col-md-8 content">
		<div class="row">
			<div class="col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
				<div class="row">
					<div class="col-sm-12 col-md-12 checkbox">
						<label class="checkbox-inline">
					      <input id="sActivity" type="checkbox">Aktivität</input>
					    </label>
						<label class="checkbox-inline">
					      <input id="sGroup" type="checkbox"> Gruppe</input>
					    </label>
						<label class="checkbox-inline">
					      <input id="sUser" type="checkbox"> Benutzer</input>
					    </label>
						<label class="checkbox-inline">
					      <input id="sPlace" type="checkbox"> Orte</input>
					    </label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 list-group">
						
						
					<?php
						if ($resultuser!=null && $resultuser->num_rows > 0) {
							while($rowuser = $resultuser->fetch_assoc()) {
					?>
								<a href="#" class="list-group-item ">
									<div class="row">

										<div class="col-sm-2 col-md-2">
											<image class="squareimage" width="100" height="100" src="images/person_b.png" />
										</div>

										<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
											<h4 class="list-group-item-heading"><?=$rowuser["firstname"].' '.$rowuser["lastname"]?></h4>
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
						?>
								<a href="#" class="list-group-item ">
									<div class="row">

										<div class="col-sm-2 col-md-2">
											<image class="squareimage" width="100" height="100" src="images/person_b.png" />
										</div>

										<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
											<h4 class="list-group-item-heading"><?=$rowplace["name"]?></h4>
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
						?>
								<a href="#" class="list-group-item ">
									<div class="row">

										<div class="col-sm-2 col-md-2">
											<image class="squareimage" width="100" height="100" src="images/person_b.png" />
										</div>

										<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
											<h4 class="list-group-item-heading"><?=$rowgroup["name"]?></h4>
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

						?>
								<a href="#" class="list-group-item ">
									<div class="row">

										<div class="col-sm-2 col-md-2">
											<image class="squareimage" width="100" height="100" src="images/person_b.png" />
										</div>

										<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
											<h4 class="list-group-item-heading"><?=$rowactivity["name"]?></h4>
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
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	<script src="js/function.js"></script>
	<script src="js/search.js"></script>
	<!-- <script src="js/newactivity.js"></script> -->
</footer>
</body>
</html>