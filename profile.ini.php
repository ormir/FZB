<?
$user = getUserInformation($_SESSION["user_id"]);

// Get userpic
$user_pic = "images/user_blue.png";
$pics = glob("./images/user/".$user['picture']."*");
$user_pic = $pics[0];

// Get user saved interest
$user_interest_sql = "select name
						from `user-interest`
							join `interest` on interest.id = `fk-interest-id`
						where `fk-user-id` = ".$_SESSION['user_id'];
$user_interest = $mysqli->query($user_interest_sql);

// Get user saved place
$user_place_sql = "select name 
					from `user-place` 
						join place on place.id = `fk-place-id`
					where `fk-user-id` = ".$_SESSION['user_id'];
$user_place = $mysqli->query($user_place_sql);

// Get user groups
$user_group_sql = "select name
					from `user-group`
						join `group` on `group`.id = `fk-group-id`
					where `fk-user-id` = ".$_SESSION['user_id'];
$user_group = $mysqli->query($user_group_sql);

// Get user groups
$user_activity_sql = "select name
					from `user-activity`
						join `activity` on `activity`.id = `fk-activity-id`
					where `fk-user-id` = ".$_SESSION['user_id'];
$user_activity = $mysqli->query($user_activity_sql);
?>