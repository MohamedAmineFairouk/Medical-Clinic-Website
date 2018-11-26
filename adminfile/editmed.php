<?php
  include("db.php") ;

  $idloc = $_GET["idloc"] ;


$sqli = "SELECT *  FROM medecin where id_med ='$idloc'";


 $resulti = $mysqli->query($sqli);
        if ($resulti->num_rows > 0) {
           // output data of each rowrrrrrr
           while($rowi = $resulti->fetch_assoc()) {
            $disp = $rowi['disponible'];

             }
       }else {
           echo "0 results";
       }

if($disp == "0")
  $disp2="1";
else
  $disp2="0";


  $sql = "UPDATE medecin SET disponible = '$disp2' WHERE id_med = '$idloc' ";

  if ($mysqli->query($sql) === TRUE) {
      header("location: medecin.php");
    } else {
      echo "Error =";
      }

  $mysqli->close();


 ?>