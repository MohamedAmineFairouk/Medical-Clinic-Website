<?php
include('db.php');
$idloc = $_GET["idloc"] ;

 
  $sqli = "SELECT *  FROM events where id ='$idloc'";
        $resulti = $mysqli->query($sqli);
        if ($resulti->num_rows > 0) {
           // output data of each rowrrrrrr
           while($rowi = $resulti->fetch_assoc()) {
            
      

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
<form class="form-horizontal" method="POST" action="editrdv2.php" >
<fieldset>

 </div></center>


<div class="form-group">
<label class="col-md-4 control-label" for="USERNAME">ID:</label>  
  <div class="col-md-4">
  <input id="USERNAME" name="id_rdv" type="text" value="<?php echo $rowi['id'] ?>" class="form-control input-md" readonly>
    
  </div>
</div>



  <label class="col-md-4 control-label" for="USERNAME">Nom de Rendez-vous</label>  
  <div class="col-md-4">
  <input id="USERNAME" name="title" type="text" value="<?php echo $rowi['title'] ?>" class="form-control input-md" required>
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MAILID">Date de debut</label>  
  <div class="col-md-4">
  <input id="MAILID" name="start" type="text" value="<?php echo $rowi['start'] ?>" class="form-control input-md" required>
sous forme :0000-00-00 00:00:00   
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="VILLAGENAME">date de fin</label>  
  <div class="col-md-4">
  <input id="VILLAGENAME" name="end" value="<?php echo $rowi['end'] ?>" type="text" placeholder="" class="form-control input-md" required="">
 sous forme: 0000-00-00 00:00:00  
  </div>
</div>
 <div class="form-group">
  <label class="col-md-4 control-label" for="VILLAGENAME">Description de rendez-vous</label>  
  <div class="col-md-4">
  <input id="VILLAGENAME" name="describ" value="<?php echo $rowi['describ'] ?>" type="text" placeholder="" class="form-control input-md" required="">
     </div>
</div>  
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
   <center> <button id="button1id" name="Submit" value="Submit" type="submit" class="btn btn-success">Ajouter</button></center>
  </div>
</div>

</fieldset>
</form>
 <?php         }
       }else {
           echo "0 results";
       }
?>



    <body>
      </html>