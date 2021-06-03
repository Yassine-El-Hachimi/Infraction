<?php
include("config.inc.php");
session_start();

$conduite = $_POST['conduite'];



$sql = "SELECT * FROM zone WHERE id_conduite='$conduite'";
$resultat = $connect->prepare($sql);
$resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());

	if($resultat->rowCount())
	{
		$output = $resultat->fetchAll(PDO::FETCH_ASSOC);
		echo(json_encode($output));
	
	}

 ?>
