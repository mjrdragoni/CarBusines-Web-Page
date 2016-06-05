<?php 
  $link = "Venda";
  require_once("/home/u130462423/public_html/models/model_sales.php");
  require_once("/home/u130462423/public_html/controllers/conection.php");
  @session_start();
  if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
      if(isset($_COOKIE['usuarioLogado'])){
      $_SESSION['usuario'] = $_COOKIE['usuarioLogado'];      
    }
      include("view_header_restrita.php");
      
  }   
  else{
    
      require_once("/home/u130462423/public_html/views/view_try_again3.php");
      exit();
    } 
    
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
			<p><center><h1><br><br><br><br><font color="#FF8C00">Veículo</font> excluído com sucesso!</h1></center></p>
			<br><br><br><br>
			 
		</div>
	</div>	

</body>
</html>	