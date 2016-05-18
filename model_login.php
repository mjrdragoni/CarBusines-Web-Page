<?php

	require_once("/home/u130462423/public_html/controllers/conection.php");
	


	$login =  mysqli_real_escape_string($conexao, trim($_POST['login']));
	$senha =  mysqli_real_escape_string($conexao, trim($_POST['pass']));
	$sql = "SELECT users.id, clients.id AS id_client
			FROM users 
			INNER JOIN clients ON clients.id = users.id_client
			WHERE (users.login = '$login' AND users.pass = md5('$senha')) OR 
			(clients.email = '$login' AND users.pass = md5('$senha')) ";
	$r = @mysqli_query($conexao, $sql);
	while ($result = mysqli_fetch_array($r)) {			 	
			 	$id_client = $result['id_client'];
			}
			setcookie("idclient",$id_client); 

	$num = mysqli_num_rows($r);
	

	if ($num > 0){
		if (strstr($login, "@")){
			$sql = "SELECT users.login, clients.id
			FROM users INNER JOIN clients ON users.id_client = clients.id 
			WHERE clients.email = '$login' ";
			$r = @mysqli_query($conexao, $sql);
			while ($result = mysqli_fetch_array($r)) {
			 	$user_name = $result['login'];			 	
			}

		} 					 
		else{
			 $user_name = $login;			 
			}
		if (isset($_POST['lembrar']) && $_POST['lembrar'] == "1") {
			// criar um cookie que vai nos dizer que o usuário está logado
			//o usuario vai ficar logado por um mes
			setcookie("usuarioLogado",$user_name,time()+60*60*24*30);
			setcookie("idusuarioLogado",$id_client,time()+60*60*24*30);
			
					
			}	

		@session_start();
		$_SESSION['usuario'] = $user_name;	
						
			header("Location:../index.php");
	} 
		else{
			header("Location:/views/view_cadastro.php");
		}		

	
  	@mysqli_close($conexao);
  ?>

