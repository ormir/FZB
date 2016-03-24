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
						<a href="#" class="list-group-item ">
							<div class="row">
								<div class="col-sm-2 col-md-2">
									<svg height="100">
					  					<image class="squareimage" width="100" height="100" xlink:href="images/person.png" />
									</svg>
								</div>
								<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
							   		<h4 class="list-group-item-heading">Name Nachname</h4>
							    	<p class="list-group-item-text">...</p>
							    </div>
					    	</div>
					  	</a>
					  	<a href="#" class="list-group-item ">
					  		<div class="row">
								<div class="col-sm-2 col-md-2">
									<svg height="100">
					  					<image class="squareimage" width="100" height="100" xlink:href="images/ic_building.svg" />
									</svg>
								</div>
								<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
							   		<h4 class="list-group-item-heading">Ort</h4>
							    	<p class="list-group-item-text">
							    		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac metus volutpat, luctus mauris ac, ornare dolor. Suspendisse vitae arcu mi. Nullam posuere, sem vitae aliquam posuere, nisi turpis feugiat sapien, quis tempor elit nunc hendrerit nulla. In hac habitasse platea dictumst.
							    	</p>
							    </div>
					    	</div>
					  	</a>
					  	<a href="#" class="list-group-item ">
					  		<div class="row">
								<div class="col-sm-2 col-md-2">
									<svg height="100">
					  					<image class="squareimage" width="100" height="100" xlink:href="images/coffee.png" />
									</svg>
								</div>
								<div class="col-sm-9 col-sm-offset-1 col-md-9 col-md-offset-1">
							   		<h4 class="list-group-item-heading">Aktivität</h4>
							    	<p class="list-group-item-text">
							    		Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse ac metus volutpat, luctus mauris ac, ornare dolor. Suspendisse vitae arcu mi. Nullam posuere, sem vitae aliquam posuere, nisi turpis feugiat sapien, quis tempor elit nunc hendrerit nulla. In hac habitasse platea dictumst.
							    	</p>
							    </div>
					    	</div>
					  	</a>
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