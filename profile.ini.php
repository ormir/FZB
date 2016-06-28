<?
if (isset($_POST['save_profile'])) {
	$subdir = "./images/user/";
   	$changes = array();
      $changes['last-login'] = date('Y-m-d');
   
   	// Save cropped pic
   	if(isset($_POST['pic'])) {
    	// Convert pic from base64 encoded message
      	$data = $_POST['pic'];
      	list($type, $data) = explode(';', $data);
      	list(, $data)      = explode(',', $data);
      	$data = base64_decode($data);

      	$name = md5(time());
      	$changes['picture'] = $name;

      	file_put_contents($subdir.$name.'.png', $data);

      	// Ged old pic name
      	$sql = "select picture from user where id = ".$_SESSION["user_id"];
      	$result = $mysqli->query($sql);

      	if ($result->num_rows == 1) {
        	$row = $result->fetch_assoc();
        	$pics = glob("./images/user/".$row['picture']."*");

        	// Delete old pic
         @unlink($pics[0]);
      	}
   	}

   // Save username
   if(isset($_POST['username']))
      $changes['username'] = $_POST['username'];

   // Save biography
   if(isset($_POST['biography']))
      $changes['bio'] = $_POST['biography'];

   $sql = "UPDATE user SET ";

   // Organise changes for query
   foreach ($changes as $colum => $value) {
      $sql .= "`".$colum."`='".$value."', ";
   }

   // Remove last comma
   $sql = substr($sql, 0, -2);
   $sql .= " WHERE id = ".$_SESSION["user_id"];

   // echo $sql;
   if ($mysqli->query($sql) !== TRUE) {
      echo 'Error updating user: '.$this->mysqli->error;
   }
   
   // Remove all saved interest of user
   $sql = "delete from `user-interest` where `fk-user-id`=".$_SESSION["user_id"];
   $reslut = $mysqli->query($sql);

   // Get saved interests
   foreach($_POST as $key => $value) {
      if (preg_match("/interest-*/", $key) && $value != 0){

         // Add new interests
         if ($reslut) {
            $sql = "insert into `user-interest` (`fk-user-id`, `fk-interest-id`) values (".$_SESSION["user_id"].", ".$value.");";
            if ($mysqli->query($sql) !== true) {
               echo 'Couldnt add interest'.$value.' to user';
            }
         } else {
            echo "<br>Could not remove user ".$_SESSION["user_id"]." interests<br>";   
         }
      }

      // Remove all saved places of user
      $sql = "delete from `user-place` where `fk-user-id`=".$_SESSION["user_id"];
      $reslut = $mysqli->query($sql);

      // Get saved place
      foreach($_POST as $key => $value) {
         if (preg_match("/place-*/", $key) && $value != 0){
            // Add new places
            if ($reslut) {
               $sql = "insert into `user-place` (`fk-user-id`, `fk-place-id`) values (".$_SESSION["user_id"].", ".$value.");";
               if ($mysqli->query($sql) !== true) {
                  echo $sql;
                  echo '<br>Couldnt add place '.$value.' to user<br><br>';
               }
            } else {
               echo "<br>Could not remove user ".$_SESSION["user_id"]." place<br>";   
            }
         }
      }
   }
}

if(isset($_GET["i"])) $id = cleanParam($_GET["i"]);
else $id = $_SESSION["user_id"];

$user = getUserInformation($id);
// Get userpic
$user_pic = "images/user_blue.png";
$pics = glob("./images/user/".$user['picture']."*");
$user_pic = $pics[0];

// Get user saved interest
$user_interest_sql = "select interest.id, name
						from `user-interest`
							join `interest` on interest.id = `fk-interest-id`
						where `fk-user-id` = ".$id;
$user_interest = $mysqli->query($user_interest_sql);

// Get user saved place
$user_place_sql = "select place.id, name 
					from `user-place` 
						join place on place.id = `fk-place-id`
					where `fk-user-id` = ".$id;
$user_place = $mysqli->query($user_place_sql);

// Get user groups
$user_group_sql = "select group.id, name
					from `user-group`
						join `group` on `group`.id = `fk-group-id`
					where `fk-user-id` = ".$id;
$user_group = $mysqli->query($user_group_sql);

// Get user acitivities
$user_activity_sql = "select activity.id, name
					from `user-activity`
						join `activity` on `activity`.id = `fk-activity-id`
					where `fk-user-id` = ".$id;
$user_activity = $mysqli->query($user_activity_sql);
?>