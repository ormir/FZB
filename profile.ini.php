<?
$user = getUserInformation($_SESSION["user_id"]);

// Get userpic
$user_pic = "images/user_blue.png";
$pics = glob("./images/user/".$user['picture']."*");
$user_pic = $pics[0];
?>