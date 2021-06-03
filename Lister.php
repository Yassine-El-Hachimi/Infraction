<?php
session_start();
if(!$_SESSION['login']){
  header("Location: ./");
  exit();
}
 ?>
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

									<div id="stat"></div>
											<section class="section" id ="up">


															<div class="card card-primary" >
																<div class="card-header"><h4>Lister les Infractions</h4></div>

																<div class="card-body">

																		<div class ="row">
																			<div class="col-lg-6">
																		<div class="form-group">
																			<label for="db">Date debut </label>
																			<input id="db" type="date" class="form-control" name="db" tabindex="1" required autofocus>
																		</div>
																	</div>
																	<div class="col-lg-6">
																<div class="form-group">
																	<label for="df">Date fin</label>
																	<input id="df" type="date" class="form-control" name="df" tabindex="1" required autofocus>
																</div>
															</div>
														</div>


																		 <div class ="row">
																			 <div class="col-lg-4"></div>
																				 <div class="col-lg-4">
																		<div class="form-group">
																			<button id="_lister" class="btn btn-info btn-lg btn-block" tabindex="4">
																				Lister
																			</button>
																		</div>
																	</div>

																</div>
																<div class="col-lg-12 col-sm-14 col-md-8">
          <div class="table-responsive-sm">
                      <table class="table table-striped table-bordered  " id="table-1">
                        <thead>                                 
                          <tr>
                          
                             <th  class="th-sm">Commune</th>
                             <th class="th-sm">Conduite</th>
                             <th class="th-sm">Cercle</th>
							 <th class="th-sm">Infracteur</th>
							 <th class="th-sm">Date</th>
							 <th class="th-sm">Type</th>
							 <th class="th-sm">Pv</th>
							 <th class="th-sm">Action</th>
                          </tr>
                          
                        </thead>
                        <tbody id = "tab"> </tbody>
                      </table>

            
            </div>
																	

															<div class="simple-footer text-center">
																Copyright &copy; Habiba 2020-2021
															</div>
														</div>
													</div>
												</div>
											</section>

                    </div><br>
					<script src="js/ajax.js"></script>
					
					<script>
					function Delete(id){
     // Delete 
$(document).ready(function(){

// Delete 
  var el = $("#delete");
  
     // AJAX Request
     $.ajax({
      type:"post",
      url: "Delete.php",
       data: { id:id },
       success: function(response){

        
            $(el).closest('tr').css('background','tomato');
            $(el).closest('tr').fadeOut(300,function(){
              $(el).remove();
            });
               
		}
            });
            
          
        });
      
    }
					</script>

</body>
</html>
