<?php
require("db.php");
session_start();

$target_dir = "C:\wamp\www\project\RDV-RABAT\adminfile\addmed2";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;


  $Nom = $_POST['name1']." ".$_POST['name2'];
  $mail=$_POST['name1'].$_POST['name2']."@RDV.com";
  $Specialité = $_POST['spe'];
  $departement = $_POST['depar'];

  $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])  && isset($_FILES['file'])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 2000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {


        $img_blob = base64_encode(file_get_contents ($_FILES['fileToUpload']['tmp_name']));

  $sql = "INSERT INTO medecin(name_med, spe_med, dep_med, image, mail_med) values ('$Nom', '$Specialité', '$departement','$img_blob','$mail')";
  //$req = $bdd->prepare($sql);
  //$req->execute();
  if (mysqli_query($mysqli, $sql)) {
    echo"enregistré avec succes";
      header('Location: medecin.php');
      }
       else {
      echo "404 ";
  }mysqli_close($mysqli);
}
?>