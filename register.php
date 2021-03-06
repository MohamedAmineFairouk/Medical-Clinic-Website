<?php
require "db.php" ;
session_start();
/* Registration process, inserts user info into the database 
   and sends account confirmation email message
 */

// Set session variables to be used on profile.php page
$_SESSION['email'] = $_POST['email'];
$_SESSION['first_name'] = $_POST['firstname'];
$_SESSION['last_name'] = $_POST['lastname'];
$_SESSION['sexe'] = $_POST['sexe'];

// Escape all $_POST variables to protect against SQL injections
$first_name = $mysqli->escape_string($_POST['firstname']);
$last_name = $mysqli->escape_string($_POST['lastname']);
$email = $mysqli->escape_string($_POST['email']);
$sexe = $mysqli->escape_string($_POST['sexe']);
$password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
$hash = $mysqli->escape_string( md5( rand(0,1000) ) );
      
// Check if user with that email already exists
$result = $mysqli->query("SELECT * FROM users WHERE email='$email'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result->num_rows > 0 ) {
    
    $_SESSION['message'] = 'Utilisateur avec ce courriel existe déjà!';
    header("location: error.php");
    
}
else { // Email doesn't already exist in a database, proceed...

    // active is 0 by DEFAULT (no need to include it here)
    $sql = "INSERT INTO users (first_name, last_name, email, password, hash, sexe) " 
            . "VALUES ('$first_name','$last_name','$email','$password', '$hash', '$sexe')";

    // Add user to the database
    if ( $mysqli->query($sql) ){
 //0 until user activates their account with verify.php
        $_SESSION['logged_in'] = true; // So we know the user has logged in
        $_SESSIO['password'] = $password;        
                 header("location: signupcheked.php");
        
       // header("location: profile.php"); 

    }

    else {
        $_SESSION['message'] = 'Échec de lenregistrement!';
        header("location: error.php");
    }

}