<?php

// Connexion à la base de données
require_once('db.php');
//echo $_POST['title'];
session_start();

if (isset($_POST['title']) && isset($_POST['start']) && isset($_POST['end']) && isset($_POST['color'])){
	if ($_POST['color'] == '#000')
		{$spe = 'Congé';   }
	elseif ($_POST['color'] == '#0071c5')
		{$spe = 'Arrêt maladie';   }
	elseif ($_POST['color'] == '#01DF01')
		{$spe = 'Vacances';   }
	elseif ($_POST['color'] == '#DF0101')
		{$spe = 'occupé (autres)';   }
	
	

	$title = "--Medecin--".$_POST['title'];
	$start = $_POST['start'];
	$end = $_POST['end'];
	$color = $_POST['color'];
	$id_med = $_SESSION['id_med'];
	$describ = $_POST['descrip'];
	$ocmed = 1;

	$sql = "INSERT INTO events(title, start, end, color, id_med, type, describ, ocmed) values ('$title', '$start', '$end', '$color','$id_med','$spe','$describ','$ocmed')";
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
