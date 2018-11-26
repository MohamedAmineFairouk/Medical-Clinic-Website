<?php
require 'db.php';
session_start();
/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
if ( isset($_POST['checkmed'])){
    //test of medecin

$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM medecin WHERE mail_med='$email'");

if ( $result->num_rows == 0 ){ // User doesn't exist
$_SESSION['message'] = "Ce medecin n'existe pas!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();
    if ( $_POST['password'] == $user['psw_med'] ) {
     
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;
        $_SESSION['spe_med'] = $user['spe_med'];
        $_SESSION['name_med'] = $user['name_med'];
        $_SESSION['mail_med'] = $user['mail_med'];
        $_SESSION['id_med'] = $user['id_med'];
        header("location:profile_med.php");
    }
    else {
        $_SESSION['message'] = "Vous avez entré un mot de passe incorrect, réessayez!";
    header("location: error.php");
    }
}

}
    //end test of medecin
else { 
if($_POST['email']=='root@gmail.com' && $_POST['password']=='root') {
        //partie admin
        header("location: adminfile/index.php");}
else {
$email = $mysqli->escape_string($_POST['email']);
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'");


if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "L'utilisateur avec cet email n'existe pas!";
    header("location: error.php");
}

else { // User exists
    $user = $result->fetch_assoc();

    if ( password_verify($_POST['password'], $user['password']) ) {
        
        $_SESSION['email'] = $user['email'];
        $_SESSION['first_name'] = $user['first_name'];
        $_SESSION['last_name'] = $user['last_name'];
        $_SESSION['birth_date'] = $user['date'];
        $_SESSION['sexe'] = $user['sexe'];
        $_SESSION['id_user'] = $user['id_user'];
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: profile.php");
    }
    else{
        $_SESSION['message'] = "Vous avez entré un mot de passe incorrect, réessayez!";
        header("location: error.php");
    }
}
}
}
