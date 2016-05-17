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
			<p><center><h1><br><br><br><br><font color="#FF8C00">OPS!</font> Algo saiu errado.</h1></center></p>
			<br><br><br><br>
			 
		</div>
	</div>	

</body>
</html>	