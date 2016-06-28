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
			<?php if(isset($_GET["i"])){ ?>
				<div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-md-5">				
					<div class="row">					
						<div class="col-xs-12 col-sm-12 col-md-12">
							<h1><?php echo $groupResult["name"] ?></h1>
							<p>
								<?php  
									foreach ($tagsResult as $row) {
								?>
										<a href="interestdescription.php?i=<?=$row["fk-interest-id"] ?>" class="label label-default"><?php echo $row["name"] ?></a>
								<?php
									}
								?>	
							</p>
							<p><?php echo $userCount ?> Mitglieder</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-10 col-sm-10 col-md-10">
							<h4>Beschreibung</h4>
							<p>
								<?php echo $groupResult["description"]; ?>							
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-8 col-sm-8 col-md-8">
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
				</div>

				<div class="col-xs-10 col-sm-10 col-md-6">
				<br><br>
					<?php  
						foreach ($blogResult as $row) {
					?>										

					<div class="panel panel-default">
						<div class="panel-heading"><?php echo $row["headline"] ?></div>
						<div class="panel-body"><?php echo $row["content"] ?></div>
					</div>

					<?php
						}
					?>		
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