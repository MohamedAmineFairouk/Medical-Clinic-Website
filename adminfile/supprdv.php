<?php
  include("db.php") ;

  $idus = $_GET["idloc"] ;



  $sql = "DELETE FROM events
  WHERE id = '$idus' ";



  if ($mysqli->query($sql) === TRUE) {
      header("location: rendez-vous.php");
    } else {
      echo "Error =";
      }

  $conn->close();


 ?>