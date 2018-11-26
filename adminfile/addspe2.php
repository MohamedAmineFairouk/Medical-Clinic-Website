<?php
require("db.php");
session_start();
  $Nom = $_POST['name'];
  $Specialité = $_POST['spe'];
  $departement = $_POST['depar'];

  $sql = "INSERT INTO specialite(name_spe, departement, detail) values ('$Nom', '$Specialité', '$departement')";
  //$req = $bdd->prepare($sql);
  //$req->execute();
  if (mysqli_query($mysqli, $sql)) {
    echo"enregistré avec succes";
      header('Location: specialite.php');
      }
       else {
      echo "Error: ";
  }mysqli_close($mysqli);

?>