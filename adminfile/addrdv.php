
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

<form class="form-horizontal" method="POST" action="addrdv2.php" >
<fieldset>

<!-- Form Name -->
<center><legend>Ajouter un Rendez-vous</legend></center>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="USERNAME">Nom de Rendez-vous</label>  
  <div class="col-md-4">
  <input id="USERNAME" name="name" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MAILID">Date de debut</label>  
  <div class="col-md-4">
  <input id="MAILID" name="spe" type="text" placeholder="" class="form-control input-md" required="">
sous forme :0000-00-00 00:00:00   
  </div>
</div>
<div class="form-group">
  <label class="col-md-4 control-label" for="VILLAGENAME">date de fin</label>  
  <div class="col-md-4">
  <input id="VILLAGENAME" name="depar" type="text" placeholder="" class="form-control input-md" required="">
 sous forme: 0000-00-00 00:00:00  
 

<div class="form-group">
          <label for="color" class="col-sm-2 control-label">Spécialité</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Choisir</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; neurologie</option>
              <option style="color:#40E0D0;" value="#40E0D0">&#9724; cardiologie</option>
              <option style="color:#008000;" value="#008000">&#9724; ophtalmologie</option>             
              <option style="color:#FFD700;" value="#FFD700">&#9724; pediatrie</option>
              <option style="color:#FF8C00;" value="#FF8C00">&#9724; oncologie</option>
              <option style="color:#FF0000;" value="#FF0000">&#9724; rhumatologie</option>
              <option style="color:#800000;" value="#800000">&#9724; Dentaire</option>
               <option style="color:#008080;" value="#008080">&#9724; Medecine generale</option>
              <option style="color:#848484;" value="#848484">&#9724; gynecologie</option>
              <option style="color:#FE2EF7;" value="#FE2EF7">&#9724; neurologie (chirurgie)</option>
              <option style="color:#000;" value="#000">&#9724; Cardiologie (chirurgie)</option>
              
            </select>
          </div>
          </div>
        <div class="form-group">
  <label class="col-md-4 control-label" for="VILLAGENAME">Id utilisateur</label>  
  <div class="col-md-4">
  <input id="VILLAGENAME" name="id_user" type="text" placeholder="" class="form-control input-md" required="">
    
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




    <body>
      </html>