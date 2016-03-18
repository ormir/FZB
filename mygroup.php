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
	<div class="col-md-3">
	</div>
	<div class="col-md-6 content">
		<div class="row">
			<div class="col-md-10 col-md-offset-1">
				<p><h1>Meine Gruppen</h1></p>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-md-10 col-md-offset-1 panel panel-default">
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
							<td>Kaffee</td>
							<td>Kaffee, Musik</td>
							<td>26</td>
						</tr>
						<tr onclick="location.href='groupdescription.html'">
							<td>Fuﬂball</td>
							<td>Fuﬂball</td>
							<td>12</td>
						<tr onclick="location.href='groupdescription.html'">
							<td>Laufen</td>
							<td>Laufen</td>
							<td>20</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<div class="col-md-3">
	</div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	<script src="js/function.js"></script>
	
</footer>
</body>
</html>