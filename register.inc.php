<?php

if(isset($_POST['registersubmit'])){
	$sql = "INSERT INTO `user` (`firstname`, `lastname`, `email`, `street`, `city`, `postcode`, `password`, `active`) 
		VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['email']."', '".$_POST['street']."', '".$_POST['city']."', '".$_POST['postcode']."', '".md5($_POST['password'])."', '0');";

	if ($mysqli->query($sql) === TRUE) {
	?>
	<script language="javascript">
		alert("New record created successfully");
	</script>
	<?php } else {
		echo '<script language="javascript">';
		echo 'alert("Error: " '. $sql . '"<br>" '. $mysqli->error.'")';
		echo '</script>';	    
	}

}

?>
