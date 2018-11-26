<?php
  include("db.php") ;

  $idus = $_GET["idloc"] ;



  $sql = "DELETE FROM medecin
  WHERE id_med = '$idus' ";



  if ($mysqli->query($sql) === TRUE) {
      header("location: medecin.php");
    } else {
      echo "Error =";
      }

  $conn->close();


 ?>