<?php

if(isset($_POST["loginsubmit"])){

	$password = md5($_POST["password"]);

	$sql = "SELECT `id`
				FROM  user
				WHERE email =  '".$_POST['email']."'
				OR username =  '".$_POST['email']."'
				AND PASSWORD =  '".$password."'
				AND active = 1";

	$result = $mysqli->query($sql);

	if ($result->num_rows == 1) {
	    $row = $result->fetch_assoc();
	    //admin redirect
	    if($row["id"] == 1){
	    	$_SESSION["admin"] = true;
	    	header("location:admin/activate_user.php");
	    } else {
	    	//normal redirect
		    $_SESSION['user_id'] = $row["id"];
		    header("location:index.php");	  
	    }	      
	}
}

?>