<?php

include('db.php');
$usr = $_POST['id_med'];
$user = $_POST['id_user'];

 
  $sqli = "SELECT *  FROM medecin where id_med ='$usr'";
        $resulti = $mysqli->query($sqli);
        if ($resulti->num_rows > 0) {
           // output data of each rowrrrrrr
           while($rowi = $resulti->fetch_assoc()) {
           	$medecin = $rowi["name_med"];
           }
       }else {
           echo "0 results";
       }

$sql = "UPDATE events
  SET medecin = '$medecin', id_med='$usr'
  WHERE id = '$user' ";



  if ($mysqli->query($sql) === TRUE) {
      header("location: rendez-vous.php");
    } else {
      echo "Error =";
      }

  $conn->close();


 ?>