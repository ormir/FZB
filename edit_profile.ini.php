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

if (isset($_POST['save_profile'])) {
   // print_r($_POST);

   $changes = array();
   
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
         if(!unlink($pics[0])){
            echo "Profile pic: Could not delete ".$pics[0];
         }
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
      $sql .= $colum."='".$value."', ";
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
      if (preg_match("/place-*/", $key)){
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
?>