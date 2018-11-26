<?php
  include("db.php") ;

  $idus = $_POST["id_rdv"] ;
  $title=$_POST["title"] ;
  $start=$_POST["start"] ;
  $end=$_POST["end"] ;
  $describ=$_POST["describ"] ;



  $sql = "UPDATE events
  SET title = '$title', start='$start', end ='$end', describ = '$describ'
  WHERE id = '$idus' ";



  if ($mysqli->query($sql) === TRUE) {
      header("location: rendez-vous.php");
    } else {
      echo "Error =";
      }

  $mysqli->close();


 ?>