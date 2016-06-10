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
	<div class="col-xs-4 col-sm-2 col-md-2">
	</div>
	<div class="col-xs-14 col-sm-8 col-md-8 content index">
		<div class="row">
			<div class="col-xs-18 col-sm-15 col-md-12" id="map"></div>
			<!-- Maps script -->
			<script src="js/maps.js"></script>
			<!-- Google Maps Script -->
    		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8&callback=initMap" async defer></script>
		</div>
	
		<div class="row">
			<a href="#">
				<div class="circle">
					<img src="images/map3.png" alt="">
					<p>Karte</p>
				</div>
			</a>	

			<a href="#">
				<div class="circle">
					<img src="images/kite.png" alt="">
					<p>Aktivität</p>
				</div>
			</a>	

			<a href="#">
				<div class="circle">
					<img src="images/group.png" alt="">
					<p>Gruppe</p>
				</div>
			</a>	

			<a href="#">
				<div class="circle">
					<img src="images/place.png" alt="">
					<p>Orte</p>
				</div>
			</a>	

			<a href="#">
				<div class="circle">
					<img src="images/plus.png" alt="">
					<p>Erstelle</p>
				</div>
			</a>				
		</div>
		<!-- Aktivität sortieren -->
		
		<!-- Aktivität sortieren Ende -->
		<!-- Aktivitäten -->
		<!-- <div class="row" id="activitycontainer">
			<div class="col-xs-15 col-sm-12 col-md-10 col-md-offset-1">
				<div id="activitycontent" class="row">
					<div id="squarecoffee" class="squarecontainer col-xs-3 col-sm-3 col-md-3">
						<img src="images/coffee.png" class="activityimage">	
						<p class="sortiertext">Kaffee</p>		
					</div>
					
					

					<div id="squarecoffeelist" class="squarelist col-xs-18 col-sm-15 col-md-12">
						<div class="row">
							<div class="col-xs-1 col-xs-offset-1 col-md-1 col-md-offset-0 listarrow">
								
				  			<image class="squarearrow" width="80" height="200" src="images/left_arrow1.png" />
							
							</div>
							<div class="col-xs-2 col-md-3 listimagecontainer">
								
				  					<image class="squarearrow" src="images/coffee.png" />
							
							</div>
							<div class="col-xs-6 col-md-7">
								<h2>Kaffee
								</h2>
								
								<div class="panel panel-default">
									<!-- Table -->
<!-- 									<table class="table table-hover">
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
								
					  				<image class="squarearrow" width="80" height="200" src="images/right_arrow1.png"/>
							
							</div>
						</div>
					</div>
				</div>	-->
				<!-- <div id="groupcontent" class="row">
					<div class="col-xs-18 col-md-12">
						<div class="panel panel-default">
							<table class="table table-hover">
								<thead>
							      <tr>
							        <th>Name</th>
							        <th>Interesse</th>
							        <th>Mitglieder</th>
							      </tr>
							    </thead>
								<tbody>
									<tr onclick="location.href='groupdescription.php'">
										<td>Gruppe 1</td>
										<td>Kaffe, Musik</td>
										<td>26</td>
									</tr>
									<tr onclick="location.href='groupdescription.php'">
										<td>Gruppe 2</td>
										<td>Fussball</td>
										<td>12</td>
									<tr onclick="location.href='groupdescription.php'">
										<td>Gruppe 2</td>
										<td>Tanzen</td>
										<td>20</td>
									</tr>
									<tr onclick="location.href='groupdescription.php'">
										<td>Gruppe 3</td>
										<td>Theater</td>
										<td>20</td>
									</tr>
									<tr onclick="location.href='groupdescription.php'">
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
							 <table class="table table-hover">
								<thead>
							      <tr>
							        <th>Name</th>
							        <th>Interesse</th>
							        <th>Bezirk</th>
							      </tr>
							    </thead>
								<tbody>
									<tr onclick="location.href='placedescription.php'">
										<td>Ort 1</td>
										<td>Kaffe, Musik</td>
										<td>2</td>
									</tr>
									<tr onclick="location.href='placedescription.php'">
										<td>Ort 2</td>
										<td>Fussball</td>
										<td>6</td>
									<tr onclick="location.href='placedescription.php'">
										<td>Ort 2</td>
										<td>Tanzen</td>
										<td>20</td>
									</tr>
									<tr onclick="location.href='placedescription.php'">
										<td>Ort 3</td>
										<td>Theater</td>
										<td>1</td>
									</tr>
									<tr onclick="location.href='placedescription.php'">
										<td>Ort 4</td>
										<td>Filme</td>
										<td>10</td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>  -->

		<!-- </div> -->
		<!-- Aktivitäten Ende -->
	
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