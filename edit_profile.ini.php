<?php
  
$subdir = "./images/user/";

if (isset($_FILES['userfile'])) {
   $fileupload = $_FILES['userfile'];
   
   $tmp_val = explode('.', $fileupload['name']);
   $file_ext = strtolower(end($tmp_val));
   $filesource = $subdir.$_SESSION["user_id"].".".$file_ext;
   
   // Delete file if exist peviously
   $result = glob ("./images/user/".$_SESSION["user_id"].".*");
   if ($result) {
      unlink($result[0]);
   }
   
   // // Prüfungen, ob Dateiupload funktioniert hat
   // if ( !$fileupload['error']                         // kein Fehler passiert
   //       && $fileupload['size']>0                    // Größe > 0   
   //       && $fileupload['tmp_name']                   // hochgeladene Datei hat einen temporären Namen
   //       && is_uploaded_file($fileupload['tmp_name']))      // nur dann true, wenn Datei gerade erst hochgeladen wurde
   //    move_uploaded_file($fileupload['tmp_name'], $filesource);  // erst dann ins neue Verzeichnis verschieben
   // else echo 'Upload error!!!';
}
?>