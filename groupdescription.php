<?php 
	include("common.inc.php");
	include("groupdescription.ini.php")	
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
	<div class="col-xs-8 col-sm-2 col-md-2">
	</div>
	<div class="col-xs-12 col-sm-8 col-md-8 content">
		<div class="row">
			<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-10 col-md-offset-1">
				<?php if(isset($_GET["i"])){ ?>
					<div class="row">
						<!-- <div class="col-xs-4 col-sm-3 col-md-3">
			  					<image class="squareimage" width="200" height="200" src="images/coffee.png">
						</div> -->

						<div class="col-xs-6 col-sm-7 col-md-7">
							<h1><?php echo $groupResult["name"] ?></h1>
							<p>
								<?php  
									foreach ($tagsResult as $row) {
								?>
										<a href="" class="label label-default"><?php echo $row["name"] ?></a>
								<?php
									}
								?>	
							</p>
							<p><?php echo $userCount ?> Mitglieder</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h4>Beschreibung</h4>
							<p>
								<?php echo $groupResult["description"]; ?>
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4">
							<h4>Mitglieder</h4>
							<ul class="list-group">
								<?php  
									foreach ($userResult as $row) {										
								?>											
										<a href="profile.php?i=<?php echo $row["id"]; ?>" class="list-group-item wordWrap"><?php echo $row["username"] ?></a>
										
								<?php
									}
								?>						  		
							</ul><br><br>
							<h4>Aktivitäten</h4>
							<ul class="list-group">
							  <?php  
									foreach ($activityResult as $row) {
								?>
										<a href="activitydescription.php?i=<?php echo $row["id"]; ?>" class="list-group-item wordWrap"> <?php echo $row["name"] ?></a>
								<?php
									}
								?>		
							</ul><br><br>
						</div>
					</div>

				<?php 
				// end of if(isset($_GET["i"])) 
				}
				else { ?>
					<h1>Keine Gruppe gefunden!</h1>
				<?php }
				?>
			</div>
		</div>
	</div>
	<div class="col-md-3"> </div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	<script src="js/function.js"></script>
	<!-- <script src="js/newactivity.js"></script> -->
</footer>
</body>
</html>