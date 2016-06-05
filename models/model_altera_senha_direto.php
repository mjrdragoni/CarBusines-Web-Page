<?php

	require_once("/home/u130462423/public_html/controllers/conection.php");
	@session_start();
	$id_user = $_SESSION['iduser'];
	
	$senha =  mysqli_real_escape_string($conexao, trim($_POST['confirmasenha']));
	
	

      $sql = "UPDATE users 
              set  pass = md5('$senha')
              WHERE id = '$id_user'";

      $r = @mysqli_query($conexao, $sql);       

      
  		require_once("/home/u130462423/public_html/views/view_senha_alterada_direto.php"); 
  		
	
  	@mysqli_close($conexao);
  ?>

