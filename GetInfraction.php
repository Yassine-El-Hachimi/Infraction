<?php
include("config.inc.php");
session_start();

$date_debut = $_POST['db'];
$date_fin = $_POST['df'];


$sql = "SELECT * FROM (SELECT  inf.id, inf.cin_infracteur , inf.date, inf.type,inf.pv,z.nom as nom_zone,c.nom as nom_conduite, comm.nom as nom_commune FROM `infraction` as inf , zone z,conduite c,commune comm where inf.id_zone = z.id and z.id_conduite = c.id and c.id_commune = comm.id) as tab ,infracteur where tab.cin_infracteur=infracteur.cin and tab.date between '$date_debut' and '$date_fin'";
$resultat = $connect->prepare($sql);
$resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());

	if($resultat->rowCount())
	{
		$output = $resultat->fetchAll(PDO::FETCH_ASSOC);
		echo(json_encode($output));
	
	}

 ?>
