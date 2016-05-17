<?php
	include("view_header_restrita.php");	
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
	<div class="container col-xs-12 col-md-12">
		<div class="row">
			<p><center><h1><b>VERIFIQUE AS <font color="#FF8C00">DATAS ESCOLHIDAS</font>!</b></h1> <br><br><h2> Você não pode escolher uma <font color="#FF8C00">Data de Retirada</font> anterior a <font color="#FF8C00">Data de Hoje</font> <br> e nem uma <font color="#FF8C00">Data de Entrega</font> anterior,  ou igual à <font color="#FF8C00">Data de Retirada</font>.</h2></center></p>
			<br><br><br><br>
			 <center><a href="javascript:history.back()"><button class="btn btn-lg btn-warning" type="button">Selecionar Datas Novamente</button></center>
		</div>
	</div>	

	<script src="../js/jquery-1.12.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>	