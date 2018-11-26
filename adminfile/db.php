<?php
/* Database connection settings */
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'rdv_db';
$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=rdv_db;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
