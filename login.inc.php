<?php

if(isset($_POST["loginsubmit"])){

	$password = md5($_POST["password"]);

<<<<<<< HEAD
	$sql = "SELECT `id`, `admin`
=======
	$sql = "SELECT id, `last-login`
>>>>>>> profile-register
				FROM  user
				WHERE email =  '".$_POST['email']."'
				OR username =  '".$_POST['email']."'
				AND PASSWORD =  '".$password."'
				AND active = 1";

	// echo $sql;
	$result = $mysqli->query($sql);

	if ($result->num_rows == 1) {
	    $row = $result->fetch_assoc();
<<<<<<< HEAD
	    // admin redirect
	    if($row["admin"] == 1){
	    	$_SESSION["admin"] = true;
	    	header("location:admin/activate_user.php");
	    } else {
	    	//normal redirect
		    $_SESSION['user_id'] = $row["id"];
		    header("location:index.php");	  
	    }	      
=======
	    $_SESSION['user_id'] = $row["id"];

	    //admin redirect
	    if($row["id"] == 1){
	    	header("location:activate_user.php");
	    } else if ($row["last-login"] === NULL) {
	    	$_SESSION["firstlogin"] = true;
	    	header("location:edit_profile.php");
	    	exit();
	    }

	    // echo "Last Login: '".$row["lastlogin"]."'";
	    //normal redirect
	    // $_SESSION['user_id'] = $row["id"];
	    header("location:index.php");	    
	} else if ($result !== true) {
		echo "Error User Login: ".$mysqli->error;
>>>>>>> profile-register
	}
}

?>