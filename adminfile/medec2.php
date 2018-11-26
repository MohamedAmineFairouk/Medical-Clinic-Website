<?php
require ('db.php');
/* Displays user information and some useful messages */
session_start();
$idloc = $_GET["idloc"] ;
// Check if user is logged in using the session variable

    
//calendrier req
   

//$sql2 = $mysqli->query("SELECT * FROM events WHERE id_usr='$id_user'");
//$user2 = $result->fetch_assoc();
//echo $user2[''];

?>
<!DOCTYPE html>

<html class=" " lang="fr-FR"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>Coté Administrateur</title>
<link rel='stylesheet' id='plethora-custom-bootstrap-css'  href='./index_files/theme_custom_bootstrap2.css' type='text/css' media='all' />
<link rel="stylesheet" id="js_composer_front-css" href="./index_files/js_composer.min.css" type="text/css" media="all">
<link rel="stylesheet" id="plethora-dynamic-style-css" href="./index_files/style-b8dabd5eb8.css" type="text/css" media="all">
<meta charset="utf-8">
<link href='css/fullcalendar.css' rel='stylesheet' />
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
    <!-- Custom CSS -->
    <style>
    body {
        
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
  #calendar {
    max-width: 800px;
  }
  .col-centered{
    float: none;
    margin: 0 auto;
  }
  
    </style>  
    <style type="text/css"> .wpb_animate_when_almost_visible { opacity: 1; }</style></noscript> 

      </head>
<body >
  
 <div class="container-fluid">
  <div class="row">
    <div class="col-sm-6 col-md-2">

    <a href="medec.php?idloc=<?php echo $idloc; ?>" ><button type="button" class="btn btn-success">liste des médecin</button></a>

  </div></div></div><br>
  <form class="form-horizontal" method="POST" action="medec2.php?idloc=<?php echo $idloc; ?>" >  
  <div class="col-md-4">
  <select name="id_med" class="form-control" id="color">
              <option value="">Choisir un medecin...</option>
              <?php 
              include('db.php');
 $sqli = "SELECT *  FROM medecin ";
        $resulti = $mysqli->query($sqli);
        if ($resulti->num_rows > 0) {
           // output data of each rowrrrrrr
           while($rowi = $resulti->fetch_assoc()) {
         echo '<option value="'.$rowi['id_med'].'">'.$rowi['name_med'].'</option>';
           }
       }
       ?>  
              
            
            </select>
           <button id="button1id" name="Submit" value="Submit" type="submit" class="button">Fetch</button>
    
  </div>
</form>
  
<form class="form-horizontal" method="POST" action="fetchmed.php" >
            <div class="form-group">

       <?php 
if(isset($_POST['id_med']))      
{$id_med=$_POST['id_med'];}
else
{
  $id_med=28;
}

        $sql = "SELECT id, title, start, end, color, medecin,specialite, valide, efectuer, describ FROM events where id_med=".$id_med;

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll(); ?>

<center><H1>MEDECIN: <?php
 $sqli = "SELECT *  FROM medecin where id_med ='$id_med'";
        $resulti = $mysqli->query($sqli);
        if ($resulti->num_rows > 0) {
           // output data of each rowrrrrrr
           while($rowi = $resulti->fetch_assoc()) {
            echo $rowi["name_med"];?><br><?php
            echo $id_med;
           }
       }else {
           echo "0 results";
       }?></H1></center><br><br>


 <div class="container">

        <div class="row">
       <div id="calendar" class="col-centered">
             

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
  
  <!-- FullCalendar -->
  <script src='js/moment.min.js'></script>
  <script src='js/fullcalendar.min.js'></script>
  
  <script>

  $(document).ready(function() {
    
    $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,basicWeek,basicDay'
      },
      defaultDate: '2018-06-02',
      editable: true,
      eventLimit: true, // allow "more" link when too many events
      selectable: true,
      selectHelper: true,
      select: function(start, end) {
        
        $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
        $('#ModalAdd').modal('show');
      },
      eventRender: function(event, element) {
        element.bind('dblclick', function() {
          $('#ModalEdit #id').val(event.id);
          $('#ModalEdit #title').val(event.title);
          $('#ModalEdit #color').val(event.color);
          $('#ModalEdit #medecin').val(event.medecin);
       	  $('#ModalEdit #specialite').val(event.specialite);
       	  $('#ModalEdit #valide').val(event.valide);
       	  $('#ModalEdit #efectuer').val(event.efectuer);
       	  $('#ModalEdit #describ').val(event.describ);
          $('#ModalEdit').modal('show');
        });
      },
      eventDrop: function(event, delta, revertFunc) { // si changement de position

        edit(event);

      },
      eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

        edit(event);

      },
      events: [
      <?php foreach($events as $event): 
      
        $start = explode(" ", $event['start']);
        $end = explode(" ", $event['end']);
        if($start[1] == '00:00:00'){
          $start = $start[0];
        }else{
          $start = $event['start'];
        }
        if($end[1] == '00:00:00'){
          $end = $end[0];
        }else{
          $end = $event['end'];
        }
      ?>
        {
          id: '<?php echo $event['id']; ?>',
          title: '<?php echo $event['title']; ?>',
          start: '<?php echo $start; ?>',
          end: '<?php echo $end; ?>',
          color: '<?php echo $event['color']; ?>',
          medecin: '<?php echo $event['medecin']; ?>',
          specialite: '<?php echo $event['specialite']; ?>',
          valide: '<?php echo $event['valide']; ?>',
          efectuer: '<?php echo $event['efectuer']; ?>',
          describ: '<?php echo $event['describ']; ?>',

        },
        
      <?php 
      endforeach; ?>
      ]
    });
    
    function edit(event){
      start = event.start.format('YYYY-MM-DD HH:mm:ss');
      if(event.end){
        end = event.end.format('YYYY-MM-DD HH:mm:ss');
      }else{
        end = start;
      }
      
      id =  event.id;
      
      Event = [];
      Event[0] = id;
      Event[1] = start;
      Event[2] = end;
      
      $.ajax({
       url: 'editEventDate.php',
       type: "POST",
       data: {Event:Event},
       success: function(rep) {
          if(rep == 'OK'){
            alert('Saved');
          }else{
            alert('Could not be saved. try again.'); 
          }
        }
      });
    }
    
  });

</script>


           
  <label class="col-md-4 control-label" for="USERNAME">Inserer ID du medecin choisi</label>  
  <div class="col-md-4">
  <input id="USERNAME" name="id_med" type="text" value= "<?php echo $id_med ?>" class="form-control input-md" readonly>
  <input id="USERNAME" name="id_user" type="text" value= "<?php echo $idloc ?>" class="form-control input-md" readonly>
          <center> <button id="button1id" name="Submit" value="Submit" type="submit" class="btn btn-success">Valider</button></center>
    
  </div>
</div>
</form>
</body>
</html>