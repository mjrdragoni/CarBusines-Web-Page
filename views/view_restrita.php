<?php

	include("view_header_restrita.php");

	if ( !isset($_SESSION['usuario']) and !isset($_COOKIE['usuarioLogado']) ) {
    
    unset ($_COOKIE['usuarioLogado']);
		header("Location:view_cadastro.php");
		exit();
	} 
	else{
		if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
			if(isset($_COOKIE['usuarioLogado']))
			$_SESSION['usuario'] = $_COOKIE['usuarioLogado'];
			
		}	
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
	

	<script src="../js/jquery-1.12.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>