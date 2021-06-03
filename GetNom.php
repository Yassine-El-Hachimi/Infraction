<?php
include("config.inc.php");
session_start();

$cin = $_POST['cin'];



$sql = "SELECT * FROM infracteur WHERE cin='$cin'";
$resultat = $connect->prepare($sql);
$resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());

	if($resultat->rowCount())
	{
		$output = $resultat->fetchAll(PDO::FETCH_ASSOC);
		echo(json_encode($output));
	


	}

 ?>
