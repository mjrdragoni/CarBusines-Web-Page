<?php
	include("view_header.php");
	setcookie("usuarioLogado","",time()-3600);
	setcookie("idusuarioLogado","",time()-3600);

		@session_destroy();		
		unset($_COOKIE['usuarioLogado']);
		unset($_COOKIE['idusuarioLogado']);	
?>

<!DOCTYPE html>
<html>
<head>
	  <!-- adicionar  Bootstrap personalizado-->
    <link rel="stylesheet" media="screen" href="../css/estilo.css">
</head>

<body>
	<div class="container col-xs-12">
		<div class="row">
			<p><center><h1><br><br><br><br><b>SUA SENHA FOI ALTERADA COM<font color="#FF8C00"> SUCESSO!</font></b></h1></center></p>
			<br><br>

				<center>
				<a href="../index.php"><input  class="btn btn-lg btn-warning" type="button" name="continuar" id="continuar" value="Continuar"></a>
				</center>
				<br><br>
			 
		</div>
	</div>	

</body>
</html>	