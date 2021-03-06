<?php
require ('db.php');
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "Vous devez vous connecter avant de voir votre page de profil!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $id_user = $_SESSION['id_user'];
    
//calendrier req
    $sql = "SELECT id, title, start, end, color, medecin,specialite, valide, efectuer, describ FROM events where id_usr=".$id_user;

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

//$sql2 = $mysqli->query("SELECT * FROM events WHERE id_usr='$id_user'");
//$user2 = $result->fetch_assoc();
//echo $user2[''];
}
?>
<!DOCTYPE html>

<html class=" " lang="fr-FR"><head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>RDV - RABAT</title>
<link rel='stylesheet' id='plethora-custom-bootstrap-css'  href='./index_files/theme_custom_bootstrap2.css' type='text/css' media='all' />
<link rel="stylesheet" id="js_composer_front-css" href="./index_files/js_composer.min.css" type="text/css" media="all">

<link rel="stylesheet" id="plethora-dynamic-style-css" href="./index_files/style-b8dabd5eb8.css" type="text/css" media="all">
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <meta name="author" content="">

  <link rel="stylesheet" type="text/css" href="css/custom.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
  
  <!-- FullCalendar -->
  <link href='css/fullcalendar.css' rel='stylesheet' />


    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
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
<body class="page-template-default page page-id-255 wpb-js-composer js-comp-ver-4.12.1 vc_responsive sticky_header " style="margin-top: 112px;">
  <div class="overflow_wrapper">
    <div class="header "><div class="topbar vcenter transparent">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 hidden-xs hidden-sm text-left">
                 <div class="top_menu_container">
                    </div>
                </div>
      <div class="col-md-6 col-sm-6 hidden-xs hidden-sm text-right">
       </div>
      
    </div>
  </div>
</div>
  <div class="mainbar  color">
    <div class="container">
               <div class="logo">
            <a href="index.html" class="brand">
                          <img src="./index_files/logo_clinique_med__v5.png" alt="HealthFlex">
                        </a>
                      </div>                   <div class="menu_container"><span class="close_menu">×</span>
                          <ul id="menu-primary-menu" class="main_menu hover_menu">



<li id="menu-item-1849" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1849"><a href="logout.php">se deconnecter</a></li>
</ul>        
      </div>

  
    </div>
  </div>

    </div></div>

  

 <div class="container">

        <div class="row">
          
        
       <div id="calendar" class="col-centered">
             
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="addEvent.php">
      
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ajouter un Rendez-vous</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titre</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          </div>
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
          <label for="start" class="col-sm-2 control-label">date de début</label>
          <div class="col-sm-10">
            <input type="text" name="start" class="form-control" id="start">

          </div>
          </div>
          <div class="form-group">
          <label for="end" class="col-sm-2 control-label">date de fin</label>
          <div class="col-sm-10">
            <input type="text" name="end" class="form-control" id="end">
          </div>
          </div>
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvgarder</button>
        </div>
      </form>
      </div>
      </div>
    </div>
    
    
    
    <!-- Modal -->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="editEventTitle.php">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier Rendez-vous</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">titre</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Spécialité</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Choose</option>
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
          <label for="title" class="col-sm-2 control-label">Validation</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="valide" readonly>
          </div>
          </div>
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Medecin</label>
          <div class="col-sm-10">
           <input type="text" name="title" class="form-control" id="medecin" readonly>
          </div>
          </div>
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Spécialité</label>
          <div class="col-sm-10">
          	<input type="text" name="title" class="form-control" id="specialite" readonly>
          </div>
          </div>
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
          	<input type="text" name="title" class="form-control" id="describ" readonly>
          </div>
          </div>
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Effectué:</label>
          <div class="col-sm-10">
          	<input type="text" name="title" class="form-control" id="efectuer" readonly>
          </div>
          </div>
            <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox"  name="delete"> Supprimer Rendez-voust</label>
              </div>
            </div>
          </div>
          
          <input type="hidden" name="id" class="form-control" id="id">
        
        
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        </div>
      </form>
      </div>
      </div>
    </div>

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


</body>
</html>