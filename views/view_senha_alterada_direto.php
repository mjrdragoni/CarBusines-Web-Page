<?php  
 
  @session_start();
  if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
      if(isset($_COOKIE['usuarioLogado'])){
      $_SESSION['usuario'] = $_COOKIE['usuarioLogado'];
      $_COOKIE['iduser'] = $_COOKIE['iduser'];
      include("view_header_restrita.php");
    }
      
      
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