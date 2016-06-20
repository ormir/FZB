<?php
  
$subdir = "./images/user/";

// Get userpic
$user_pic = "images/user_blue.png";
$sql = "select picture from user where id = ".$_SESSION["user_id"];
$result = $mysqli->query($sql);

if ($result->num_rows == 1) {
   $row = $result->fetch_assoc();
   $pics = glob("./images/user/".$row['picture']."*");
   $user_pic = $pics[0];
}
?>