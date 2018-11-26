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
    $first_name = $_SESSION['name_med'];
    $last_name = $_SESSION['spe_med'];
    $email = $_SESSION['mail_med'];
    $id_med = $_SESSION['id_med'];
    
    
//calendrier req
    $sql = "SELECT id, title, start, end, color, medecin,specialite, valide, efectuer, describ FROM events where id_med = '$id_med' ";

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
    <meta name="author" content="">

  
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
          
         <H5>Nom:  &#160&#160<?php echo $first_name ;?></H5>
          <H5>Spécialité:&#160&#160<?php echo $last_name ;?></H5>
          email:&#160&#160 <?php echo $email ;?>
       <div id="calendar" class="col-centered">
             
    <div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form class="form-horizontal" method="POST" action="addEvent2.php">
      
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ajouter une occupation</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Titre</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Type</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Choisir</option>
            <option style="color:#000;" value="#000">&#9724; Congé</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Arrêt maladie</option>
              <option style="color:#01DF01;" value="#01DF01">&#9724; Vacances</option>
              <option style="color:#DF0101;" value="#DF0101">&#9724; occupé (autres)</option>
              
            </select>
          </div>
          </div>
          <div class="form-group">
          <label for="start" class="col-sm-2 control-label">description</label>
          <div class="col-sm-10">
            <input type="text" name="descrip" class="form-control" id="descrip">

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
      <form class="form-horizontal" method="POST" action="editEventTitle2.php">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modifier Occupation</h4>
        </div>
        <div class="modal-body">
        
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">titre</label>
          <div class="col-sm-10">
            <input type="text" name="title" class="form-control" id="title" placeholder="Title">
          </div>
          </div>
          <div class="form-group">
          <label for="color" class="col-sm-2 control-label">Type</label>
          <div class="col-sm-10">
            <select name="color" class="form-control" id="color">
              <option value="">Choose</option>
              <option style="color:#000;" value="#000">&#9724; Congé</option>
              <option style="color:#0071c5;" value="#0071c5">&#9724; Arrêt maladie</option>
              <option style="color:#01DF01;" value="#01DF01">&#9724; Vacances</option>
              <option style="color:#DF0101;" value="#DF0101">&#9724; occupé (autres)</option>
              
              
            </select>
          </div>
          </div>
          <div class="form-group">
          <label for="title" class="col-sm-2 control-label">Description</label>
          <div class="col-sm-10">
          	<input type="text" name="description" class="form-control" id="describ" readonly>
          </div>
          </div>
            <div class="form-group"> 
            <div class="col-sm-offset-2 col-sm-10">
              <div class="checkbox">
              <label class="text-danger"><input type="checkbox"  name="delete"> Supprimer l'occupation</label>
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

<div class="separator_bottom"><div></div></div></section></div></aside></div></div>

                <div class="copyright dark_section">
              <div class="dark_section transparent_film">
                 <div class="container">
                      <div class="row">
                           <div class="col-sm-6 col-md-6">
                      <a href="" title="Contrat d&#39;utilisation">mohamed amine fairouk - brahim tijjani   &nbsp;</a>  <a href="" title="Politique de confidentialité ">   &nbsp; Politique de confidentialité </a>                            </div>
                           <div class="col-sm-6 col-md-6 text-right">
                      <p align="center"><a href="" title="3ALogic ">Copyright © 2018 | Sites web clés en main pour les médecins  </a> </p>


                           </div>
                      </div>
                 </div>
              </div>
            </div></div>
</body>
</html>