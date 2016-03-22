<?php
if(isset($_FILES['image'])){
   $errors= array();
   $file_name = $_FILES['image']['name'];
   $file_size =$_FILES['image']['size'];
   $file_tmp =$_FILES['image']['tmp_name'];
   $file_type=$_FILES['image']['type'];
   $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
   
   $expensions= array("jpeg","jpg","png");
   
   if(in_array($file_ext,$expensions)=== false){
      $errors[]="extension not allowed, please choose a JPEG or PNG file.";
   }
   
   if($file_size > 2097152){
      $errors[]='File size must be max 2 MB';
   }

   if ($file_size < 1) {
      $errors[] = "Empty file";
   }
   
   if(empty($errors)==true
      && $fileupload['tmp_name']                   // uploaded file has a temporary name
      && is_uploaded_file($fileupload['tmp_name'])){ // true, only if file uploaded
      
      move_uploaded_file($file_tmp,"images/user/".$_SESSION["user_id"].".".$file_ext);
      echo "Success";
   }else{
      print_r($errors);
   }
}
?>