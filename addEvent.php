<?php

// Connexion à la base de données
require_once('db.php');
//echo $_POST['title'];
session_start();

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	if ($_POST['color'] == '#0071c5')
		{$spe = 'neurologie';   }
	elseif ($_POST['color'] == '#40E0D0')
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
	

	$title = $_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$id_user = $_SESSION['id_user'];

	$sql = "INSERT INTO events(title, start, end, color,specialite, id_usr) values ('$title', '$start', '$end', '$color','$spe','$id_user')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
