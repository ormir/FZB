<?php

// global $mysqli;

// Get all interests
// $all_interest_sql = "SELECT id, name FROM interest";
// $all_interest = $mysqli->query($all_interest_sql);

// Get all places
// $all_places_sql = "SELECT id, name FROM place";
// $all_places = $mysqli->query($all_places_sql);
  
$subdir = "./images/user/";

if (isset($_FILES['userfile'])) {                     // wurde Datei per POST-Methode upgeloaded
   $fileupload=$_FILES['userfile'];                // diverse Statusmeldungen ausschreiben
   // echo "name: ".$fileupload['name']." <br>";            // Originalname der hochgeladenen Datei
   // echo "type: ".$fileupload['type']." <br>";            // Mimetype der hochgeladenen Datei
   // echo "size: ".$fileupload['size']." <br>";            // Größe der hochgeladenen Datei
   // echo "error: ".$fileupload['error']." <br>";       // eventuelle Fehlermeldung
   // echo "tmp_name: ".$fileupload['tmp_name']." <br>";    // Name, wie die hochgeladene Datei im temporären Verzeichnis heißt
   $file_ext = strtolower(end(explode('.',$fileupload['name'])));
   $filesource = $subdir.$_SESSION["user_id"].".".$file_ext;
   // echo "ziel: ".$filesource."<br>";    // Pfad und Dateiname, wo die hochgeladene Datei hinkopiert werden soll
   // echo "<br>";
   
   // Delete file if exist peviously
   $result = glob ("./images/user/".$_SESSION["user_id"].".*");
   if ($result) {
      unlink($result[0]);
   }
   
   // Prüfungen, ob Dateiupload funktioniert hat
   if ( !$fileupload['error']                         // kein Fehler passiert
       && $fileupload['size']>0                    // Größe > 0   
      && $fileupload['tmp_name']                   // hochgeladene Datei hat einen temporären Namen
      && is_uploaded_file($fileupload['tmp_name']))      // nur dann true, wenn Datei gerade erst hochgeladen wurde
        move_uploaded_file($fileupload['tmp_name'],$filesource);  // erst dann ins neue Verzeichnis verschieben
   else echo 'Upload error!!!';
}
?>