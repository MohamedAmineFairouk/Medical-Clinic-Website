<?php
require("db.php");
session_start();
  $title = $_POST['name'];
  $start = $_POST['spe'];
  $end  = $_POST['depar'];
  $id_user=$_POST['id_user'];
  $color =$_POST['color'];
 if ($_POST['color'] == '#0071c5')
    {$spe = 'neurologie';   }
  elseif ($_POST['color'] == '#40E0D0"')
    {$spe = 'cardiologie';   }
  elseif ($_POST['color'] == '#008000')
    {$spe = 'ophtalmologie';   }
  elseif ($_POST['color'] == '#FFD700')
    {$spe = 'pediatrie';   }
  elseif ($_POST['color'] == '#FF8C00')
    {$spe = 'oncologie';   }
  elseif ($_POST['color'] == '#FF0000')
    {$spe = 'rhumatologie';   }
  elseif ($_POST['color'] == '#800000')
    {$spe = 'Dentaire';   }
  elseif ($_POST['color'] == '#008080')
    {$spe = 'Medecine generale';   }
  elseif ($_POST['color'] == '#848484')
    {$spe = 'gynecologie';   }
  elseif ($_POST['color'] == '#FE2EF7')
    {$spe = 'neurologie (chirurgie)';   }
  elseif ($_POST['color'] == '#000')
    {$spe = 'Cardiologie (chirurgie)';   }




 
  $sql = "INSERT INTO events(title, start, end, color,specialite, id_usr) values ('$title', '$start', '$end', '$color','$spe','$id_user')";
  //$req = $bdd->prepare($sql);
  //$req->execute();
  if (mysqli_query($mysqli, $sql)) {
 
      header('Location: rendez-vous.php');
         echo"enregistré avec succes";
      }
       else {
      echo "Error: ";
  }mysqli_close($mysqli);

?>