<?php
  include("db.php") ;

  $idus = $_GET["idloc"] ;



  $sql = "UPDATE events
  SET valide = 'oui'
  WHERE id = '$idus' ";



  if ($mysqli->query($sql) === TRUE) {
      header("location: rendez-vous.php");
    } else {
      echo "Error =";
      }

  $conn->close();


 ?>