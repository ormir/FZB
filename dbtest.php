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
	$servername = "sql7.freesqldatabase.com";
	$username = "sql7111381";
	$password = "l4icJ9cjd2";
	$dbname = "sql7111381";

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