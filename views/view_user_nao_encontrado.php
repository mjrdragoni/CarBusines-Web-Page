<?php
	include("view_header.php");	
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



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-color: #FFF;
}
</style>
</head>
<body>
	<div class="container col-xs-12">
		<div class="row">
			<p><center><h1>Infelizmente este <font color="#FF8C00">Nome de Usuário</font> não consta em nossos registros. <br> Tente novamente Por Favor!</h1></center></p>
			<br><br><br><br>
			 <center><a href="javascript:window.history.go(-1)"><button class="btn btn-lg btn-warning" type="button">Tentar Novamente</button></center>
		</div>
	</div>	

	<script src="../js/jquery-1.12.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>	