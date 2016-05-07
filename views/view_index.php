<?php
	$link = "CarRent";
	@session_start();
	if (isset($_GET['ac']) && $_GET['ac'] == "logout") {
		setcookie("usuarioLogado","",time()-3600);

		unset($_SESSION['usuario']);
		session_destroy();		
		unset($_COOKIE['usuarioLogado']);
	}
	
	
	if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
			if(isset($_COOKIE['usuarioLogado']))
			$_SESSION['usuario'] = $_COOKIE['usuarioLogado'];
			include("view_header_restrita.php");
			
	}		
	else{
		
	    include("view_header.php");			
		} 	
?>
<!DOCTYPE html>
<html>
<head>

	<title><?=$titulo?></title>

	<!-- define a viewport-->
	<meta name="viewport" content="width=device, initial-scale=1.0">
	<meta charset="utf-8">

	<!-- adicionar o CSS Bootstrap-->
	<link rel="stylesheet" media="screen" href="../css/bootstrap.min.css">

	<!-- adicionar  Bootstrap personalizado-->
	<link rel="stylesheet" media="screen" href="../css/estilo.css">



</head>
<body>
	<div class="container">		
		<div class="row">
			<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  		<!-- Indicators -->
			  <ol class="carousel-indicators">
			    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			    <li data-target="#myCarousel" data-slide-to="1"></li>
			    <li data-target="#myCarousel" data-slide-to="2"></li>
			    <li data-target="#myCarousel" data-slide-to="3"></li>
			     <li data-target="#myCarousel" data-slide-to="4"></li>
			  </ol>

  				<!-- Wrapper for slides -->
			  	<div class="carousel-inner" role="listbox">
				    <div class="item active">
				      <img src="views/images/civic.png" alt="Civic">
				    </div>

				    <div class="item">
				      <img src="views/images/unored.png" alt="Uno">
				    </div>

				    <div class="item">
				        <img src="views/images/celta.png"alt="Celta"> 
				    </div>

				    <div class="item">
				        <img src="views/images/sienna.png"alt="Sienna">
				    </div>

				    <div class="item">
				        <img src="views/images/doblo.png"alt="Sienna">
				    </div>
  				</div>

				  <!-- Left and right controls -->
		  		<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
		    		<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
		    		<span class="sr-only">Previous</span>
		  		</a>
		  		<a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
		    		<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
		    		<span class="sr-only">Next</span>
		  		</a>
			</div>			
		</div>

		<div class="row">
			<b><center><font color="#483D8B"><h1><b>Negócios com Veículos é na </b><font color="#FF8C00"><b>CarRent</b></font>!</h1></font></b></center></b>
			<center><h2>Se o que você quer é alugar, comprar ou vender um veículo, <br>a <b><font color="#FF8C00">CarRent</font></b> é o lugar certo.</h2></center>
		</div>
	</div>	
	
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>