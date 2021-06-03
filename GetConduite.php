<?php
include("config.inc.php");
session_start();

$comm = $_POST['comm'];



$sql = "SELECT * FROM conduite WHERE id_commune='$comm'";
$resultat = $connect->prepare($sql);
$resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());

	if($resultat->rowCount())
	{
		$output = $resultat->fetchAll(PDO::FETCH_ASSOC);
		echo(json_encode($output));
	


	}

 ?>
