<?php

include("config.inc.php");

    $id  = $_POST['id'];
    
    $requete ="DELETE FROM `infraction` where id = '$id'";
	$resultat = $connect->prepare($requete);
	$resultat->execute() or die("Erreur lors de l'exécution de la requéte: ".mysql_error());
    
   
    