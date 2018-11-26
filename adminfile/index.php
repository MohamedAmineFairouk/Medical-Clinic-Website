<?php include("db.php") ;
$sqlusers = "SELECT *  FROM users";
$resultusers = $mysqli->query($sqlusers);

$sqlevents = "SELECT *  FROM events";
$resultevents = $mysqli->query($sqlevents);

$sqlmedecin = "SELECT *  FROM medecin";
$resultmedecin = $mysqli->query($sqlmedecin);

$sqlspecialite = "SELECT *  FROM specialite";
$resultspecialite = $mysqli->query($sqlspecialite);

?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
        <link rel="stylesheet" type="text/css" href="css/custom.css">
        <title>Coté Administrateur</title>


          <nav class="navbar navbar-inverse navbar-static-top mynav" role="navigation">
          <div class="container-fluid nav2">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="index.php">Coté Administrateur</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div   class="collapse navbar-collapse">
              <ul class="nav navbar-nav esp">
                    <li><a href="clients.php">Les clients</a></li>
                    <li><a href="rendez-vous.php">Les Rendez-vous</a></li>
                    <li><a href="medecin.php">Les medecins</a></li>
                    <li><a href="specialite.php">les specialités</a></li>
                </ul>

              <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Se déconnecter</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>



    </head>




    <body>
  <center>  	<div id="container">



<div id="content" class="container col-md-12">

<div class="col-md-12">
		<h1>Les données RDV-RABAT</h1>
		<hr>
	</div>

 		<a href="clients.php">
			<div class="col-sm-6 col-md-2">
	            <div class="thumbnail">
	              <div class="caption">
	              <center>
	              <img src="images/ic_category.png" width="150" height="150">
	                <h3><?php echo $resultusers->num_rows ;  ?></h3>
	                <p class="detail">Les Clients</p>
	                </center>
	              </div>
	            </div>
	         </div>
	    </a>

		<a href="rendez-vous.php">
          <div class="col-sm-6 col-md-2">
            <div class="thumbnail">
              <div class="caption">
              <center>
              <img src="images/voiture.png" width="150" height="150">
                <h3><?php echo $resultevents->num_rows ;  ?></h3>
                <p class="detail">Les Rendez-vous</p>
                </center>
              </div>
            </div>
          </div>
        </a>

        <a href="medecin.php">
              <div class="col-sm-6 col-md-2">
                <div class="thumbnail">
                  <div class="caption">
                  <center>
                  <img src="images/ic_news.png" width="150" height="150">
                    <h3><?php echo $resultmedecin->num_rows ; ?></h3>
                    <p class="detail">Les Medecins</p>
                    </center>
                  </div>
                </div>
              </div>
            </a>
        <a href="specialite.php">
          <div class="col-sm-6 col-md-2">
            <div class="thumbnail">
              <div class="caption">
              <center>
              <img src="images/ic_setting.png" width="150" height="150">
                <h3><?php echo $resultspecialite->num_rows ; ?></h3>
                <p class="detail">les specialites</p>
                </center>
              </div>
            </div>
          </div>
        </a>
</div>

			<div id="footer">
</div>    	</div>
</center>
</body></html>
