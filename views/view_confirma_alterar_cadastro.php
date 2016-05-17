<?php

	$link = "Aluguel";
	
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
							PARABÉNS, SEU <font color="#FF8C00">CADASTRO</font> FOI ALTERADO COM <font color="#FF8C00">SUCESSO</font>!
							</p></b></h3>
					</center><br><br>

					<h4>
						<font color="#FF8C00">Nome:</font> <?=$nome?>
						<font color="#FF8C00">RG: </font>  <?=$rg?>
						<font color="#FF8C00">CPF: </font> <?=$cpf?><br><br>
						<font color="#FF8C00">Endereço: </font>  <?=$end?>
						<font color="#FF8C00">Cidade: </font><?=$cidade?>
						<font color="#FF8C00">Bairro:</font> <?=$bairro?>
						<font color="#FF8C00">Estado:</font> <?=$estado?>
						<font color="#FF8C00">CEP:</font> <?=$cep?><br><br>
						<font color="#FF8C00">Telefone: </font> <?=$tel?>
						<font color="#FF8C00">Celular: </font> <?=$cel?>
						<font color="#FF8C00">E-mail: </font><?=$email?>						
					</h4>
				</div>

				<br>

				<center>
				<a href="../index.php"><input  class="btn btn-lg btn-warning" type="button" name="continuar" id="continuar" value="Continuar"></a>
            	<a href="../views/view_alterar_cadastro.php"><input  class="btn btn-lg btn-primary" type="submit" name="alterar" id="alterar" value="Rever as Alterações" /></a>		
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