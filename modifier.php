<?php

include("config.inc.php");


    $id  = $_POST['id_infraction'];
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $cer = $_POST['cercle'];
    $typ = $_POST['type'];
    $dat = $_POST['date'];
    $pv  = $_POST['pv'];
    
    $requete ="UPDATE `infracteur` SET  `nom` = '$nom' where cin = '$cin'";
    $resultat = $connect->prepare($requete);
	$resultat->execute() or die("Erreur lors de l'exécution de la requéte: ".mysql_error());

    $requete ="UPDATE `infraction`SET `date` = '$dat', `type` = '$typ', `id_zone` = '$cer',`pv` = '$pv' where id = '$id'";
	$resultat = $connect->prepare($requete);
	$resultat->execute() or die("Erreur lors de l'exécution de la requéte: ".mysql_error());
    header("Location: Lister.php");
    exit();
    
    