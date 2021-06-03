<?php
include("config.inc.php");
session_start();

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM user WHERE username='$username'  And password='$password'";
$resultat = $connect->prepare($sql);
$resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());

	if($resultat->rowCount())
	{
      $_SESSION['login'] = true;
      header("Location: ./Home.php");
			exit();


	} else {
		header("Location: ./");
		exit();


	}


 ?>
