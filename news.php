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
			<div class="col-md-12">
				<h1>Nachrichten</h1>
				<p>Sie haben 2 neue Nachrichten:</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="list-group">
					<button type="button" onclick="clickOnPerson(1)" class="list-group-item buttonpersons">Admin</button>
					<button type="button" onclick="clickOnPerson(2)" class="list-group-item list-group-item-info buttonpersons">Moderator</button>
					<button type="button" onclick="clickOnPerson(3)" class="list-group-item list-group-item-info buttonpersons">Integration Wien</button>
				</div>
			</div>
			<div class="col-md-9" id="adminblog">
				<div class="list-group">
					<div class="panel panel-success">
						<div class="panel-heading">Admin</div>
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod nisl a ornare ornare. Aliquam erat volutpat. Cras eu dapibus orci. Aenean vel metus sodales, efficitur ligula ac, pretium dui. Cras tincidunt ultricies feugiat. Curabitur velit nisl, porttitor id orci eu, congue tempor erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris finibus accumsan laoreet. Vivamus quam ex, varius auctor nulla ac, feugiat condimentum erat.</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">User</div>
						<div class="panel-body">Lorem ipsum dolor sit amet</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">Admin</div>
						<div class="panel-body">consectetur adipiscing elit.</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">User</div>
						<div class="panel-body">Lorem ipsum dolor sit amet</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">Admin</div>
						<div class="panel-body">consectetur adipiscing elit.</div>
					</div>

				</div>
				<textarea class="form-control" rows="5" id="comment"></textarea>
				<input class="btn btn-default" type="button" value="Senden">
			</div>
			<div class="col-md-9" id="moderatorblog">
				<div class="list-group">
					<div class="panel panel-success">
						<div class="panel-heading">Moderator</div>
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod nisl a ornare ornare. Aliquam erat volutpat. Cras eu dapibus orci. Aenean vel metus sodales, efficitur ligula ac, pretium dui. Cras tincidunt ultricies feugiat. Curabitur velit nisl, porttitor id orci eu, congue tempor erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris finibus accumsan laoreet. Vivamus quam ex, varius auctor nulla ac, feugiat condimentum erat.</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">User</div>
						<div class="panel-body">Lorem ipsum dolor sit amet</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">Moderator</div>
						<div class="panel-body">consectetur adipiscing elit.</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">User</div>
						<div class="panel-body">Lorem ipsum dolor sit amet</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">Moderator</div>
						<div class="panel-body">consectetur adipiscing elit.</div>
					</div>

				</div>
				<textarea class="form-control" rows="5" id="comment"></textarea>
				<input class="btn btn-default" type="button" value="Senden">
			</div>
			<div class="col-md-9" id="integrationblog">
				<div class="list-group">
					<div class="panel panel-success">
						<div class="panel-heading">Integration Wien</div>
						<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam euismod nisl a ornare ornare. Aliquam erat volutpat. Cras eu dapibus orci. Aenean vel metus sodales, efficitur ligula ac, pretium dui. Cras tincidunt ultricies feugiat. Curabitur velit nisl, porttitor id orci eu, congue tempor erat. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris finibus accumsan laoreet. Vivamus quam ex, varius auctor nulla ac, feugiat condimentum erat.</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">User</div>
						<div class="panel-body">Lorem ipsum dolor sit amet</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">Integration Wien</div>
						<div class="panel-body">consectetur adipiscing elit.</div>
					</div>
					<div class="panel panel-default">
						<div class="panel-heading">User</div>
						<div class="panel-body">Lorem ipsum dolor sit amet</div>
					</div>
					<div class="panel panel-success">
						<div class="panel-heading">Integration Wien</div>
						<div class="panel-body">consectetur adipiscing elit.</div>
					</div>

				</div>
				<textarea class="form-control" rows="5" id="comment"></textarea>
				<input class="btn btn-default" type="button" value="Senden">
			</div>
			<div class="col-md-3">
			</div>
			<div class="col-md-9">
			</div>
		</div>
		
	</div>
	<div class="col-md-3">
	</div>
</div>
</div>
<footer>
	<!-- Aytac JS-->
	
	<script src="js/newspage.js"></script>
	<script src="js/function.js"></script>
	
</footer>
</body>
</html>