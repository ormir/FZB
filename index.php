<?php include("common.inc.php"); ?>

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
			<div class="col-xs-18 col-sm-15 col-md-12" id="map"></div>
			<!-- Maps script -->
			<script src="js/maps.js"></script>
			<!-- Google Maps Script -->
    		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8&callback=initMap"
        async defer></script>
		</div>

		<!-- Aktivität sortieren -->

		<div class="row">

			<div class="sortingcirclecontainer col-xs-3 col-sm-2 col-sm-offset-1 col-md-3 col-md-offset-0" id="hidemaps">
				<img src="images/map3.png" class="sortierimage">
				<p class="sortiertext">Karte</p>
			</div>
				
			
			<div id="circleactivity" class="sortingcirclecontainer col-xs-3 col-sm-2 col-md-3 col-md-offset-0">
				<img src="images/kite.png" class="sortierimage">
				<p class="sortiertext">Aktivität</p>
			</div>


			<div id="circlegroup" class="sortingcirclecontainer col-xs-3 col-sm-2 col-md-3 col-md-offset-0">
					<img src="images/group.png" class="sortierimage">
					<p class="sortiertext">Gruppe</p>
			</div>


			<div id="circleplace" class="sortingcirclecontainer col-xs-3 col-sm-2 col-md-3 col-md-offset-0">
				<img src="images/place.png" class="sortierimage">	
				<p class="sortiertext">Orte</p>	
			</div>

			<div id="circlecreate" class="col-xs-3 col-sm-2 col-md-3 col-md-offset-0 sortingcirclecontainer">
			<img src="images/plus.png" class="sortierimage">	
			<p class="sortiertext">Erstelle</p>	
			</div>
		
		<!-- Aktivität sortieren Ende -->
		<!-- Aktivitäten -->
		<div class="row" id="activitycontainer">
			<div class="col-xs-15 col-sm-12 col-md-10 col-md-offset-1">
				<div id="activitycontent" class="row">
					<div id="squarecoffee" class="squarecontainer col-xs-3 col-sm-3 col-md-3">
						<img src="images/coffee.png" class="activityimage">	
						<p class="sortiertext">Kaffee</p>		
					</div>
					
					

					<div id="squarecoffeelist" class="squarelist col-xs-18 col-sm-15 col-md-12">
						<div class="row">
							<div class="col-xs-1 col-xs-offset-1 col-md-1 col-md-offset-0 listarrow">
								<svg class="squarearrowsvgleft">
				  					<image class="squarearrow" y="70" width="50" height="100" xlink:href="images/ic_left_arrow.svg" />
								</svg>
							</div>
							<div class="col-xs-2 col-md-3 listimagecontainer">
								<svg class="squarearrowsvg">
				  					<image class="squarearrow" xlink:href="images/ic_coffee.svg" />
								</svg>
							</div>
							<div class="col-xs-6 col-md-7">
								<h2>Kaffee
								</h2>
								
								<div class="panel panel-default">
									<!-- Table -->
									<table class="table table-hover">
										<tbody>
											<tr onclick="location.href='activitydescription.php'">
													<td >Cafe Jelinek</td>
													<td>10:00</td>
													<td>26.12.2015</td>
											
												<td>
													<label>
														<input type="checkbox">
													</label>
												</td>
											</tr>
											<tr onclick="location.href='activitydescription.php'">
												<td>Cafe Phil</td>
												<td>11:30</td>
												<td>27.12.2015</td>
												<td>
													<label>
														<input type="checkbox" checked>
													</label>
												</td>
											</tr>
											<tr onclick="location.href='activitydescription.php'">
												<td>Cafe Concerto</td>
												<td>12:30</td>
												<td>28.12.2015</td>
												<td>
													<label>
														<input type="checkbox">
													</label>
												</td>
											</tr>
										</tbody>
									</table>

								</div>
							</div>
							<div class="col-xs-1 col-md-1 listarrow">
								<svg class="squarearrowsvgright">
				  					<image class="squarearrow" y="70" width="50" height="100" xlink:href="images/ic_right_arrow.svg" />
								</svg>
							</div>
						</div>
					</div>
					
				<div id="groupcontent" class="row">
					<div class="col-xs-18 col-md-12">
						<div class="panel panel-default">
							<!-- Table -->
							<table class="table table-hover">
								<thead>
							      <tr>
							        <th>Name</th>
							        <th>Interesse</th>
							        <th>Mitglieder</th>
							      </tr>
							    </thead>
								<tbody>
									<tr onclick="location.href='groupdescription.html'">
										<td>Gruppe 1</td>
										<td>Kaffe, Musik</td>
										<td>26</td>
									</tr>
									<tr onclick="location.href='groupdescription.html'">
										<td>Gruppe 2</td>
										<td>Fussball</td>
										<td>12</td>
									<tr onclick="location.href='groupdescription.html'">
										<td>Gruppe 2</td>
										<td>Tanzen</td>
										<td>20</td>
									</tr>
									<tr onclick="location.href='groupdescription.html'">
										<td>Gruppe 3</td>
										<td>Theater</td>
										<td>20</td>
									</tr>
									<tr onclick="location.href='groupdescription.html'">
										<td>Gruppe 4</td>
										<td>Filme</td>
										<td>20</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
				<div id="placecontent" class="row">
					<div class="col-md-12">
						<div class="panel panel-default">
							<!-- Table -->
							<table class="table table-hover">
								<thead>
							      <tr>
							        <th>Name</th>
							        <th>Interesse</th>
							        <th>Bezirk</th>
							      </tr>
							    </thead>
								<tbody>
									<tr onclick="location.href='placedescription.html'">
										<td>Ort 1</td>
										<td>Kaffe, Musik</td>
										<td>2</td>
									</tr>
									<tr onclick="location.href='placedescription.html'">
										<td>Ort 2</td>
										<td>Fussball</td>
										<td>6</td>
									<tr onclick="location.href='placedescription.html'">
										<td>Ort 2</td>
										<td>Tanzen</td>
										<td>20</td>
									</tr>
									<tr onclick="location.href='placedescription.html'">
										<td>Ort 3</td>
										<td>Theater</td>
										<td>1</td>
									</tr>
									<tr onclick="location.href='placedescription.html'">
										<td>Ort 4</td>
										<td>Filme</td>
										<td>10</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Aktivitäten Ende -->
	</div>
	<div class="col-xs-8 col-sm-4 col-md-2">
	</div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	
	<script src="js/index.js"></script>
	<script src="js/function.js"></script>
	

</footer>
</body>
</html>