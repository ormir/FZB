<?php 
	include("common.inc.php");
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
					      <input type="checkbox">Aktivität</input>
					    </label>
						<label class="checkbox-inline">
					      <input type="checkbox"> Gruppe</input>
					    </label>
						<label class="checkbox-inline">
					      <input type="checkbox"> Benutzer</input>
					    </label>
						<label class="checkbox-inline">
					      <input type="checkbox"> Orte</input>
					    </label>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12 col-md-12 list-group">
						
						<?php include("search.inc.php"); ?>
					
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
	<!-- <script src="js/newactivity.js"></script> -->
</footer>
</body>
</html>