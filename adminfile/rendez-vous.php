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
<div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 col-md-2">

    <a href="addrdv.php"><button type="button" class="btn btn-success">Ajouter un nouveau Rendez-vous</button></a>

  </div></div></div><br>
<div class="container-fluid">
    <div class="panel panel-default">
  <!-- Default panel contents -->
  <div class="panel-heading">La liste des Rendez-vous</div>
  <div class="panel-body">

  </div>


  <!-- Table -->
  <table class="table">
    <thead>
     <tr>
       <th>id</th>
       <th>titre</th>
       <th>debut</th>
       <th>fin</th>
       <th>client</th>
       <th>valide</th>
       <th>medecin</th>
       <th>specialite</th>
       <th>effectué</th>
       <th>modifier</th>

     </tr>


       <?php
        include('db.php');
        $sql = "SELECT *  FROM events where ocmed = 0 ";
        $result = $mysqli->query($sql);
        if ($result->num_rows > 0) {
           // output data of each row
           while($row = $result->fetch_assoc()) {
          $myid = $row["id"];
             echo "<tr><td>".$row["id"]."</td><td>".$row["title"]."</td><td> ".$row["start"]."</td><td>".$row["end"]."</td><td>";
             //nom client
             $usr= $row["id_usr"];
             $sqli = "SELECT *  FROM users where id_user ='$usr'";
        $resulti = $mysqli->query($sqli);
        if ($resulti->num_rows > 0) {
           // output data of each rowrrrrrr
           while($rowi = $resulti->fetch_assoc()) {
           	echo $rowi["first_name"]." ".$rowi["last_name"];
           }
             }
            echo "</td><td>".$row["valide"]."<a href='valid.php?idloc=".$myid."' class='btn btn-dark' >Valider?</button></td><td>".$row["medecin"]."<br><a href='medec.php?idloc=".$myid."'class='btn btn-dark'>choisir</button></td><td>".$row["specialite"]."<br><a href='spec.php?idloc=".$myid."'class='btn btn-dark'>choisir</button></td><td>".$row["efectuer"]."<br><a href='effect.php?idloc=".$myid."'class='btn btn-dark'>OUI?</button></td><td><br><a href='editrdv.php?idloc=".$myid."'class='btn btn-dark'>Modifier</button><br><br><br><a href='supprdv.php?idloc=".$myid."'class='btn btn-danger'>Supprim</button></td></tr>";

           
           }
       } else {
           echo "0 results";
       }
       $mysqli->close();


       ?>

   </thead>
  </table>

  </div>
</div>


  </div>
  </div>



  </body>
</html>
