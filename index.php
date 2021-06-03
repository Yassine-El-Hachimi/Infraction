<?php
include("config.inc.php");
session_start();
if(isset($_SESSION['login'])){
  header("Location: Home.php");
  exit();
} ?>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" comtent="width=device-width, initial-scale=1.0">

    <!-- compatibilité edge-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--===========================-->


	<title>Al Amala</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">


	<link rel="stylesheet" type="text/css" href="https://www.fontstatic.com/f=arabswell-1" />


	<script type="text/javascript" src="./js/javascript_index.js"></script>




</head>

<body class="body " style="background-image: url('./images/back.png'); "  >

		<!--  header  -------------------------------------------------------->




	<div class="container mt-5">

								<img src="./images/logo.png" >



<br><br>

									<div class="alert alert-info text-center"  role="info">

											<h5><b>Gestion des Infractions de la préfecture de Safi</b></h5>
											</div><br><br>
								<section class="section">
										<div class="row">
											<div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">


												<div class="card card-primary">
													<div class="card-header"><h4>Se Connecter</h4></div>

													<div class="card-body">
														<form method="POST" action="login.inc.php" >
															<div class="form-group">
																<label for="username">Nom Utilisateur</label>
																<input id="username" type="text" class="form-control" name="username" tabindex="1" required autofocus>

															</div>


															<div class="form-group">
																<div class="d-block">
																	<label for="password" class="control-label">Mot de passe</label>

																</div>
																<input id="password" type="password" class="form-control" name="password" tabindex="2" required>

															</div>



															<div class="form-group">
																<button type="submit" class="btn btn-info btn-lg btn-block" tabindex="4">
																	Login
																</button>
															</div>
														</form>

												<div class="simple-footer">
													Copyright &copy; Habiba 2020-2021
												</div>
											</div>
										</div>

								</section>

</div>







</body>
</html>
