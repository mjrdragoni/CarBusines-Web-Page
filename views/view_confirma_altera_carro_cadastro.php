<?php

	
	
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
							PARABÉNS, AS INFORMAÇÕES DO SEU <font color="#FF8C00">VEÍCULO</font> FORAM ATUALIZADAS COM <font color="#FF8C00">SUCESSO</font>!
							</p></b></h3>
					</center><br><br>

					<h4><center>
						<font color="#FF8C00">Marca:</font> <?=$marca?>
						<font color="#FF8C00">Modelo: </font>  <?=$modelo?>
						<font color="#FF8C00">Cor: </font> <?=$cor?>
						<font color="#FF8C00">Ano: </font>  <?=$year?>
						<font color="#FF8C00">Preço: </font>R$ <?php echo number_format($preco,2,",",".") ?><br><br>												
						<img src="<?=$imagem1?>" width="150" height="100"   />
		              	<img src="<?=$imagem2?>" width="150" height="100"  />
		              	<img src="<?=$imagem3?>" width="150" height="100"  />	           
		              	<img src="<?=$imagem4?>" width="150" height="100"  />
		             	<img src="<?=$imagem5?>" width="150" height="100"  />
		             	</center>
					</h4>
				</div>

				<br>

				<center>
				<a href="../index.php"><input  class="btn btn-lg btn-warning" type="button" name="continuar" id="continuar" value="Continuar"></a>
            	
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