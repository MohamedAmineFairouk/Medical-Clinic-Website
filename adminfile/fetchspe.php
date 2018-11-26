<?php

include('db.php');
$usr = $_POST['id_spe'];
$user = $_POST['id_user'];

 
  $sqli = "SELECT *  FROM specialite where id_specialite ='$usr'";
        $resulti = $mysqli->query($sqli);
        if ($resulti->num_rows > 0) {
           // output data of each rowrrrrrr
           while($rowi = $resulti->fetch_assoc()) {
           	$medecin = $rowi["name_spe"];
           }
       }else {
           echo "0 results";
       }

$sql = "UPDATE events
  SET specialite = '$medecin'
  WHERE id = '$user' ";



  if ($mysqli->query($sql) === TRUE) {
      header("location: rendez-vous.php");
    } else {
      echo "Error =";
      }

  $mysqli->close();


 ?>