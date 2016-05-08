<?php
  
$subdir = "./images/user/";

print_r($_POST);
print_r($_FILES);

if(isset($_POST['croppie'])){
      $data = $_POST['croppie'];

      list($type, $data) = explode(';', $data);
      list(, $data)      = explode(',', $data);
      $data = base64_decode($data);

      file_put_contents($subdir.'croppie.png', $data);
 }
?>