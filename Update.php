<?php
include("config.inc.php");
session_start();
if(!$_SESSION['login']){
	header("Location: ./");
	exit();
  }
$id = $_GET['id'];


$sql = "SELECT * FROM infraction where id ='$id'";
$resultat = $connect->prepare($sql);
$resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());

	if($resultat->rowCount())
	{
		$output = $resultat->fetchAll(PDO::FETCH_ASSOC);

		$id_zone = $output[0]['id_zone'];
		$cin = $output[0]['cin_infracteur'];
		$sql = "SELECT z.id id_z, z.nom nom_z, c.id id_c, c.nom nom_c, comm.id id_comm, comm.nom nom_comm  FROM zone z,conduite c,commune comm where z.id_conduite = c.id and c.id_commune = comm.id and z.id = $id_zone ";
		$resultat = $connect->prepare($sql);
		$resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());
		$zone = $resultat->fetchAll(PDO::FETCH_ASSOC);
		

		$sql = "SELECT * FROM infracteur where cin ='$cin'";
		$resultat = $connect->prepare($sql);
		$resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());
		$infracteur = $resultat->fetchAll(PDO::FETCH_ASSOC);
		
 ?>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" comtent="width=device-width, initial-scale=1.0">

    <!-- compatibilité edge-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--===========================-->


	<title>Al Amala</title>
	<link rel="stylesheet" href="./css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=arabswell-1" />


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




</head>

<body class="body " style="background-image: url('./images/back.png'); "  >

		<!--  header  -------------------------------------------------------->




	<div class="container mt-5">
<nav class="row bg-white">
<div class="col-lg-6">
<div class="form-group">
<img src="./images/logo.png" >
</div>
</div>                  
                                  <div class="col-lg-2 mt-5">
                                    <div class="form-group">
                                      <a href="Home.php" class="btn btn-white text-secondary btn-lg btn-block" >
                                        <b>Ajouter</b>
                                      </a>
                                    </div>
                                  </div>
                                  <div class="col-lg-2 mt-5">
                                    <div class="form-group">
                                      <a href="Lister.php" class="btn btn-white text-secondary btn-lg btn-block" >
                                      <b>Lister</b>
                                      </a>
                                    </div>
                                  </div>

                                  <div class="col-lg-2 mt-5">
                                    <div class="form-group">
                                      <a href="session.inc.php" class="btn btn-white text-secondary btn-lg btn-block" >
                                      <b>Logout</b>
                                      </a>
                                    </div>
                                  </div>
                                  


</nav>
                



<br><br>

									<div class="alert alert-info text-center"  role="info">
                 
											<h5><b>Gestion des Infractions de la préfecture de Safi</b></h5>
											</div>
                      <section class="section">
                        <div class="container mt-5">


                              <div class="card card-primary">
                                <div class="card-header"><h4>Modifier Infraction</h4></div>

                                <div class="card-body">
                                  <form method="POST" action="modifier.php">
								  <input  type="text" class="form-control" name="id_infraction" tabindex="1" value="<?php echo $id; ?>"   hidden>

                                    <h5 class="text-danger"><b>Infracteur</b></h5>
                                    <hr>
                                    <div class ="row">
                                      <div class="col-lg-6">
                                    <div class="form-group">
                                      <label for="cin">CIN </label>
                                      <input id="cin" type="text" class="form-control" name="cin" tabindex="1" value="<?php echo $output[0]['cin_infracteur'];?>"   required autofocus>
                                    </div>
                                  </div>
                                  <div class="col-lg-6">
                                <div class="form-group">
                                  <label for="username">Nom Prenom </label>
                                  <input id="username" type="text" class="form-control" name="nom" tabindex="1" value="<?php echo $infracteur[0]['nom'];?>" required autofocus>
                                </div>
                              </div>
                            </div>

                            <h5 class="text-danger"><b>Infraction</b></h5>
                            <hr>

                            <div class ="row">
                                <div class="col-lg-4">

                                    <div class="form-group">
                                        <label for="comm">Communauté</label>
                                    <select name="comm" class="form-control" id="comm">

                                    <?php
                                            $sql = "SELECT id,nom FROM commune";
                                            $resultat = $connect->prepare($sql);
                                            $resultat->execute() or die("Erreur lors de l'execution de la requete: ".mysql_error());
                                            while ($row = $resultat->fetch()) {
												if($row['id'] == $zone[0]['id_comm']){
                                                echo "<option value='". $row['id'] ."' selected>" . $row['nom'] . "</option>";
												}
												else{
												echo "<option value='". $row['id'] ."'>" . $row['nom'] . "</option>";
												}
											}
                                        ?>
                                    </select>
                                     </div>
                                   </div>
                                   <div class="col-lg-4">
                                     <div class="form-group">
                                         <label for="conduite">Conduite</label>
                                     <select name="conduite" class="form-control" id="conduite" >
                                       <?php echo "<option value='". $zone[0]['id_c'] ."' selected>" . $zone[0]['nom_c'] . "</option>"; ?>




                                     </select>
                                      </div>
                                    </div>
                                    <div class="col-lg-4">
                                      <div class="form-group">
                                          <label for="cercle">Cercle Zone</label>
                                      <select name="cercle" class="form-control" id="cercle" >
									  <?php echo "<option value='". $zone[0]['id_z'] ."' selected>" . $zone[0]['nom_z'] . "</option>"; ?>

                                      </select>
                                       </div>
                                     </div>
                                   </div>

                                   <div class ="row">
                                       <div class="col-lg-6">
                                         <div class="form-group">
                                           <label for="type">Type</label>
                                           <input id="type" type="text" class="form-control" name="type" tabindex="1" value="<?php echo $output[0]['type']?>" required autofocus>
                                         </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label for="date">Date</label>
                                          <input id="date" type="date" class="form-control" name="date" tabindex="1" value="<?php echo $output[0]['date']?>" required autofocus>
                                        </div>
                                     </div>
                                    </div>

                                    <div class ="row">
                                      <div class="col-md-12">
                                        <div class="form-group">
                                        <label class="text-black" for="pv">Procès-verbal</label>
                                        <textarea name="pv" id="pv" class="form-control" rows="7" placeholder="Procès-verbal ..."><?php echo $output[0]['pv']?></textarea>


                                        </div>
                                      </div>

                                     </div>
                                     <div class ="row">
                                        <div class="col-lg-4"></div>
                                         <div class="col-lg-4">
                                    <div class="form-group">
                                      <button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
                                        Modifier
                                      </button>
                                    </div>
                                  </div>

                                </div>

                                  </form>
                                  <div class="simple-footer text-center">
                                    Copyright &copy; Habiba 2020-2021
                                  </div>

                            </div>
                          </div>
                        </div>
                      </section>

                    </div><br>
<script src="js/ajax.js"></script>
</body>

</html>

	
<?php	}

 ?>
