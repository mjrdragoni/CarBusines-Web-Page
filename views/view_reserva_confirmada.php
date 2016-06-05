<?php

	$link = "Aluguel";
	require_once("/home/u130462423/public_html/models/model_reserve.php");
	@session_start();
	if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
			if(isset($_COOKIE['usuarioLogado']))
			$_SESSION['usuario'] = $_COOKIE['usuarioLogado'];
			include("view_header_restrita.php");
			
	}		
	else{
		
	    header("Location:../index.php?ac=logout");	
	} 			
?>
<!DOCTYPE html>
<html >
<head>

	<title><?=$titulo?></title>

	<!-- define a viewport-->
	<meta name="viewport" content="width=device, initial-scale=1.0">
	<meta charset="utf-8">

	<!-- adicionar o CSS Bootstrap-->
	<link rel="stylesheet" media="screen" href="../css/bootstrap.min.css">

	<!-- adicionar  Bootstrap personalizado-->
	<link rel="stylesheet" media="screen" href="../css/estilo.css">
	
  
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<!-- adicionar  Curtir e  compartilhar do facebook-->
	<script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

	<!-- adicionar  Curtir e  compartilhar do facebook-->
	<script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</head>	

 <body>
	
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				<div class="well">
					<center> <h3><b> <p>
							PARABÉNS, SUA <font color="#FF8C00">RESERVA</font> FOI REALIZADA COM <font color="#FF8C00">SUCESSO</font>!
							</p></b></h3>
					</center><br><br>

					<h4>
						<font color="#FF8C00">Cód. da Reserva:</font> <?=$id_reservation?> <br><br><br>
						<font color="#FF8C00">Data para Retirada: </font>  <?=$dataretirada?>
						<font color="#FF8C00">Data para Entrega: </font> <?=$dataentrega?>
						<font color="#FF8C00">Hora para Retirada e Entrega: </font>  <?=$horaretirada?><br><br>
						<font color="#FF8C00">Cliente: </font><?=$client_name?>
						<font color="#FF8C00">CPF:</font> <?=$client_cpf?>
						<font color="#FF8C00">E-mail:</font> <?=$client_email?><br><br>
						<font color="#FF8C00">Cód. do Veículo:</font> <?=$id_car?>
						<font color="#FF8C00">Marca: </font> <?=$brand?>
						<font color="#FF8C00">Modelo: </font> <?=$model?>
						<font color="#FF8C00">Cor: </font><?=$color?><br><br>
						<center><font color="#FF8C00">Preço da Diária: </font> R$ <?=$rental_price?>,00
						<font color="#FF8C00">Valor Total: </font> R$ <?=$valtot?>,00</center>
					</h4>
				</div>

				<br>

				<center><h3>Em instantes você receberá um e-mail com a confirmação de sua reserva.<br> Caso o pagamento da mesma não seja efetuado em 24h ela será automáticamente cancelada!</h3></center>			
			</div>
		</div>
	</div>

	 <?php
      include('view_footer.html');
  	?>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>