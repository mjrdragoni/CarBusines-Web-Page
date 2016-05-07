<?php

	require_once("/home/u130462423/public_html/controllers/conection.php");
	


	$login =  mysqli_real_escape_string($conexao, trim($_POST['login']));
	$senha =  mysqli_real_escape_string($conexao, trim($_POST['pass']));
	$sql = "SELECT *
			FROM users
			WHERE login = '$login'  
			AND pass = '$senha' ";
	$r = @mysqli_query($conexao, $sql); 
	$num = mysqli_num_rows($r);
	

	if (isset($_POST['lembrar']) && $_POST['lembrar'] == "1") {
			// criar um cookie que vai nos dizer que o usuário está logado
			//o usuario vai ficar logado por um mes
			setcookie("usuarioLogado",$_POST['login'],time()+60*60*24*30);
		}	

	if ($num > 0){
		@session_start();
		$_SESSION['usuario'] = $_POST['login'];
		header("Location:/index.php");
	} 
	else{
		header("Location:/views/view_cadastro.php");
	}
  	@mysqli_close($conexao);
  ?>

