<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>DB Test</h1>
	<?php

	// Report all errors
	ini_set("error_reporting", E_ALL);

	// echo 'CONNECTING TO DB';
	$servername = "db4free.net";
	$username = "fzb_test";
	$password = "fzb_test";
	$dbname = "fzb_test";

	// Create connection
	$mysqli = new mysqli($servername, $username, $password, $dbname);

	// Check connection
	if ($mysqli->connect_error) {
	    die("Connection failed: " . $mysqli->connect_error);
	}

	echo "<p>Connected</p>";

	$result = $mysqli->query("select * from user");

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "id: " . $row["id-user"] . "<br>";
	    }
	} else {
	    echo "0 results";
	}

	$mysqli->close();


	?>
</body>
</html>