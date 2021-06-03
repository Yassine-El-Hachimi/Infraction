<?php

include("config.inc.php");

if (!isDataSet($_POST)){
    header("Location: Home.php");
    exit();
}else{
    $cin = $_POST['cin'];
    $nom = $_POST['nom'];
    $cer = $_POST['cercle'];
    $typ = $_POST['type'];
    $dat = $_POST['date'];
    $pv  = $_POST['pv'];


    $requete ="INSERT IGNORE INTO `infracteur`(`cin`, `nom`) VALUES ('$cin','$nom')";
    $resultat = $connect->prepare($requete);
	$resultat->execute() or die("Erreur lors de l'exécution de la requéte: ".mysql_error());

    $requete ="INSERT INTO `infraction`(`date`, `type`, `cin_infracteur`, `id_zone`,`pv`) VALUES ('$dat','$typ','$cin','$cer','$pv')";
	$resultat = $connect->prepare($requete);
	$resultat->execute() or die("Erreur lors de l'exécution de la requéte: ".mysql_error());

    header("Location: Home.php");
    exit();
}


function isDataSet($POST){
    if (isset($POST['cin'])
        && isset($POST['nom'])
        && isset($POST['comm'])
        && isset($POST['conduite'])
        && isset($POST['cercle'])
        && isset($POST['type'])
        && isset($POST['date'])
        && isset($POST['pv'])
    ){
        return 1;
    }
    return 0;
}