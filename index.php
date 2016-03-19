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
			<div class="col-xs-18 col-sm-15 col-md-12" id="map"></div>
			<!-- Maps script -->
			<script src="js/maps.js"></script>
			<!-- Google Maps Script -->
    		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyABs6b120foEjF7yhc3HSOWRFwznMWHdY8&callback=initMap"
        async defer></script>
		</div>
		
		<!-- Aktivität sortieren -->

		<div class="row">
			<div class="sortingcirclecontainer col-xs-3 col-sm-2 col-md-4" id="hidemaps">
				<svg class="sortingcirclesvg">
					<circle class="sortingcircle" stroke="#e0dfdf" stroke-width="3" fill="#a7ce39" />
					<image class="circleimage" x="50%" y="50%"  xlink:href="images/kite.svg" />
					<text class="circleText" x="50%" y="50%" fill="white" font-size="30" text-anchor="middle">Toggle</text>
				</svg>
			</div>
			<div id="circleactivity" class="sortingcirclecontainer col-xs-3 col-sm-2 col-md-4">
				<svg class="sortingcirclesvg">
					<circle class="sortingcircle" stroke="#e0dfdf" stroke-width="3" fill="#a7ce39" />
					<image class="circleimage" x="50%" y="50%"  xlink:href="images/kite.svg" />
					<text class="circleText" x="50%" y="50%" fill="white" font-size="30" text-anchor="middle">Aktivität</text>
				</svg>
			</div>
			<div id="circlegroup" class="sortingcirclecontainer col-xs-3 col-sm-2 col-md-4">
				<svg class="sortingcirclesvg">
					<circle class="sortingcircle" stroke="#e0dfdf" stroke-width="3" fill="#a7ce39" />
					<image class="circleimage" x="50%" y="50%" xlink:href="images/group.svg" />
					<text class="circleText" x="50%" y="50%" fill="white" font-size="30" text-anchor="middle">Gruppe</text>
				</svg>			
			</div>
			<div id="circleplace" class="sortingcirclecontainer col-xs-3 col-sm-2 col-md-4 col-md-offset-2">
				<svg class="sortingcirclesvg">
					<circle class="sortingcircle" stroke="#e0dfdf" stroke-width="3" fill="#a7ce39" />
					<image class="circleimage" x="50%" y="50%" xlink:href="images/building.svg" />
					<text class="circleText" x="50%" y="50%" fill="white" font-size="30" text-anchor="middle">Orte</text>
				</svg>			
			</div>
			<div id="circlecreate" class="sortingcirclecontainer col-xs-3 col-sm-2 col-md-4">
				<svg class="sortingcirclesvg">
					<circle class="sortingcircle" stroke="#e0dfdf" stroke-width="3" fill="#a7ce39" />
					<image class="circleimage" x="50%" y="50%" xlink:href="images/plus.svg" />
					<text class="circleText" x="50%" y="50%" fill="white" font-size="30" text-anchor="middle">Erstelle</text>
				</svg>			
			</div>
		</div>
		<!-- Aktivität sortieren Ende -->
		<!-- Aktivitäten -->
		<div class="row" id="activitycontainer">
			<div class="col-xs-15 col-sm-12 col-md-10 col-md-offset-1">
				<div id="activitycontent" class="row">
					<div id="squarecoffee" class="squarecontainer col-xs-3 col-sm-2 col-md-4">
						<svg class="squaresvg">
		  					<rect class="square" fill="#ffffff" stroke="#e0dfdf" stroke-width="5" />
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_coffee.svg" />
							<text class="squareText" x="50%" y="50%" fill="#7ebce6" font-size="30" text-anchor="middle">Kaffee</text>
						</svg>
					</div>
					
					<div id="squarecinema" class="squarecontainer col-xs-3 col-sm-2 col-md-4">
						<svg class="squaresvg">
		  					<rect class="square" fill="#ffffff" stroke="#e0dfdf" stroke-width="5" />
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_cinema.svg" />
							<text class="squareText" x="50%" y="50%" fill="#7ebce6" font-size="30" text-anchor="middle">Kino</text>
						</svg>
					</div>
					<div id="squaremusic" class="squarecontainer col-xs-3 col-sm-2 col-md-4">
						<svg class="squaresvg">
		  					<rect class="square" fill="#ffffff" stroke="#e0dfdf" stroke-width="5" />
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_music.svg" />
							<text class="squareText" x="50%" y="50%" fill="#7ebce6" font-size="30" text-anchor="middle">Musik</text>
						</svg>
					</div>
					<div id="squarebook" class="squarecontainer col-xs-3 col-sm-2 col-md-4">
						<svg class="squaresvg">
		  					<rect class="square" fill="#ffffff" stroke="#e0dfdf" stroke-width="5" />
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_book.svg" />
							<text class="squareText" x="50%" y="50%" fill="#7ebce6" font-size="30" text-anchor="middle">Bücherei</text>
						</svg>
					</div>

					<div id="squarecoffeelist" class="squarelist col-xs-18 col-md-12">
						<div class="row">
							<div class="col-xs-1 col-xs-offset-1 col-md-1 listarrow">
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
					
					<div id="squarecinemalist" class="squarelist col-xs-18 col-md-12">
						<div class="row">
							<div class="col-xs-1 col-md-1 listarrow">
								<svg class="squarearrowsvgleft">
				  					<image class="squarearrow" y="70" width="50" height="100" xlink:href="images/ic_left_arrow.svg" />
								</svg>
							</div>
							<div class="col-xs-2 col-md-3 listimagecontainer">
								<svg class="squaresvg">
									
		  							<image class="squareimage" xlink:href="images/ic_cinema.svg" />
								</svg>
							</div>
							<div class="col-xs-6 col-md-7">
								<h2>Kino
								</h2>
								
								<div class="panel panel-default">

									
									<table class="table table-hover">
										<tbody>
											<tr  onclick="location.href='activitydescription.html'">
												<td>Kino 1</td>
												<td>10:00</td>
												<td>26.12.2015</td>
												<td>
													<label>
														<input type="checkbox">
													</label>
												</td>
											</tr>
											<tr onclick="location.href='activitydescription.html'">
												<td>Kino 2</td>
												<td>11:30</td>
												<td>27.12.2015</td>
												<td>
													<label>
														<input type="checkbox" checked>
													</label>
												</td>
											</tr>
											<tr onclick="location.href='activitydescription.html'">
												<td>Kino 3</td>
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
					<div id="squaremusiclist" class="squarelist col-md-12">
						<div class="row">
							<div class="col-xs-2 col-md-1 listarrow">
								<svg class="squarearrowsvgleft">
				  					<image class="squarearrow" y="70" width="50" height="100" xlink:href="images/ic_left_arrow.svg" />
								</svg>
							</div>
							<div class="col-xs-5 col-md-3 listimagecontainer">
								<svg class="squaresvg">
									
		  							<image class="squareimage" xlink:href="images/ic_music.svg" />
								</svg>
							</div>
							<div class="col-xs-9 col-md-7">
								<h2>Musik
								</h2>
								
								<div class="panel panel-default">

									
									<table class="table table-hover">
										<tbody>
											<tr onclick="location.href='activitydescription.html'">
												<td>Musik 1</td>
												<td>10:00</td>
												<td>26.12.2015</td>
												<td>
													<label>
														<input type="checkbox">
													</label>
												</td>
											</tr>
											<tr onclick="location.href='activitydescription.html'">
												<td>Musik 2</td>
												<td>11:30</td>
												<td>27.12.2015</td>
												<td>
													<label>
														<input type="checkbox" checked>
													</label>
												</td>
											</tr>
											<tr onclick="location.href='activitydescription.html'">
												<td>Musik 3</td>
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
							<div class="col-xs-2 col-md-1 listarrow">
								<svg class="squarearrowsvgright">
				  					<image class="squarearrow" y="70" width="50" height="100" xlink:href="images/ic_right_arrow.svg" />
								</svg>
							</div>
						</div>
					</div>
					<div id="squarebooklist" class="squarelist col-xs-18 col-md-12">
						<svg class="squaresvg">
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_book.svg" />
						</svg>
					</div>
				
					<div id="squaretheatre" class="squarecontainer col-xs-3 col-sm-2 col-md-4">
						<svg class="squaresvg">
		  					<rect class="square" fill="#ffffff" stroke="#e0dfdf" stroke-width="5" />
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_theatre.svg" />
							<text class="squareText" x="50%" y="50%" fill="#7ebce6" font-size="30" text-anchor="middle">Theater</text>
						</svg>
					</div>
					
					<div id="squarefootball" class="squarecontainer col-xs-3 col-sm-2 col-md-4">
						<svg class="squaresvg">
		  					<rect class="square" fill="#ffffff" stroke="#e0dfdf" stroke-width="5" />
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_football.svg" />
							<text class="squareText" x="50%" y="50%" fill="#7ebce6" font-size="30" text-anchor="middle">Fußball</text>
						</svg>
					</div>
					<div id="squarezoo" class="squarecontainer col-xs-3 col-sm-2 col-md-4">
						<svg class="squaresvg">
		  					<rect class="square" fill="#ffffff" stroke="#e0dfdf" stroke-width="5" />
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_footprint.svg" />
							<text class="squareText" x="50%" y="50%" fill="#7ebce6" font-size="30" text-anchor="middle">Zoo</text>
						</svg>
					</div>
					<div id="squaredance" class="squarecontainer col-xs-3 col-sm-2 col-md-4">
						<svg class="squaresvg">
		  					<rect class="square" fill="#ffffff" stroke="#e0dfdf" stroke-width="5" />
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_party.svg" />
							<text class="squareText" x="50%" y="50%" fill="#7ebce6" font-size="30" text-anchor="middle">Tanzen</text>
						</svg>
					</div>
				
					<div id="squaretheatrelist" class="squarelist col-xs-18 col-md-12">
						<svg class="squaresvg">
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_theatre.svg" />
						</svg>
					</div>
					<div id="squarefootballlist" class="squarelist col-xs-18 col-md-12">
						<svg class="squaresvg">
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_football.svg" />
						</svg>
					</div>
					<div id="squarezoolist" class="squarelist col-xs-18 col-md-12">
						<svg class="squaresvg">
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_footprint.svg" />
						</svg>
					</div>
					<div id="squaredancelist" class="squarelist col-xs-18 col-md-12">
						<svg class="squaresvg">
		  					<image class="squareimage" x="50%" y="50%" xlink:href="images/ic_party.svg" />
						</svg>
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