<?php

if(isset($_POST["loginsubmit"])){

	$password = md5($_POST["password"]);

	$sql = "SELECT id, lastlogin
				FROM  user
				WHERE email =  '".$_POST['email']."'
				OR username =  '".$_POST['email']."'
				AND PASSWORD =  '".$password."'
				AND active = 1";

	$result = $mysqli->query($sql);

	if ($result->num_rows == 1) {
	    $row = $result->fetch_assoc();
	     $_SESSION['user_id'] = $row["id"];
	    //admin redirect
	    if($row["id"] == 1){
	    	header("location:activate_user.php");
	    } else if ($row["lastlogin"] === NULL) {
	    	header("location:edit_profile.php");
	    	exit();
	    }

	    // echo "Last Login: '".$row["lastlogin"]."'";
	    //normal redirect
	    // $_SESSION['user_id'] = $row["id"];
	    header("location:index.php");	    
	}
}

?>