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

	<link href="../css/bootstrap-theme.min.css" rel="stylesheet">



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
			<p><center><h1><font color="#FF8C00">CPF</font> já cadastrado. <br> Tente Novamente!</h1></center></p>
			<br><br><br><br>
			 <center><a href="../views/view_cadastro.php"><button class="btn btn-lg btn-warning" type="button">Informar CPF Novamente</button></center>
		</div>
	</div>	

	<script src="../js/jquery-1.12.3.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>	