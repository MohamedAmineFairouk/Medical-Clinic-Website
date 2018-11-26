<?php

require_once('db.php');
if (isset($_POST['delete']) && isset($_POST['id'])){
	
	
	$id = $_POST['id'];
	
	$sql = "DELETE FROM events WHERE id = $id";
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Erreur prepare');
	}
	$res = $query->execute();
	if ($res == false) {
	 print_r($query->errorInfo());
	 die ('Erreur execute');
	}
	
}elseif (isset($_POST['title']) && isset($_POST['color']) && isset($_POST['id'])){


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
	
	$id = $_POST['id'];
	$title = $_POST['title'];
	$color = $_POST['color'];
	$sql = "UPDATE events SET  title = '$title', color = '$color', specialite = '$spe' WHERE id = $id ";

	
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
header('Location: profile.php');

	
?>
