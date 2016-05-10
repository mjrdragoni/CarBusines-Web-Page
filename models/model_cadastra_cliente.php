<?php	
	require_once("/home/u130462423/public_html/controllers/conection.php");

	

	$usuario = mysqli_real_escape_string($conexao, trim($_POST['usuario']));
	$senha =  mysqli_real_escape_string($conexao, trim($_POST['senha']));	
	$confirmasenha =  mysqli_real_escape_string($conexao, trim($_POST['confirmasenha']));
	$nome =  mysqli_real_escape_string($conexao, trim($_POST['nome']));
	$rg =  mysqli_real_escape_string($conexao, trim($_POST['rg']));
	$cpf =  mysqli_real_escape_string($conexao, trim($_POST['cpf']));
	$telefone =  mysqli_real_escape_string($conexao, trim($_POST['telefone']));
	$celular =  mysqli_real_escape_string($conexao, trim($_POST['celular']));
	$email =  mysqli_real_escape_string($conexao, trim($_POST['email']));
	$endereco =  mysqli_real_escape_string($conexao, trim($_POST['endereco']));
	$cidade =  mysqli_real_escape_string($conexao, trim($_POST['cidade']));
	$bairro =  mysqli_real_escape_string($conexao, trim($_POST['bairro']));
	$estado =  mysqli_real_escape_string($conexao, trim($_POST['estado']));
	$cep =  mysqli_real_escape_string($conexao, trim($_POST['cep']));

	if (empty($usuario) || empty($senha) || empty($confirmasenha) || empty($nome) || 
	empty($rg) || empty($cpf) || empty($telefone) || empty($celular) || 
	empty($email) || empty($endereco) || empty($cidade) || empty($bairro) || 
	empty($estado)){
		require_once("/home/u130462423/public_html/views/view_try_again3.php");
		exit();
	} 
	else{
	
			
		$sql = "SELECT *
				FROM users
				WHERE login = '$usuario'";

		$r = @mysqli_query($conexao, $sql);
		$num = mysqli_num_rows($r); 
			
		if ($num > 0){
			require_once("/home/u130462423/public_html/views/view_try_again.php");
		}	
			else{
					
				$sql = "SELECT *
						FROM clients
						WHERE cpf_cnpj = '$cpf'";
				$r = @mysqli_query($conexao, $sql);
				$num = mysqli_num_rows($r); 
					if ($num > 0){
						require_once("/home/u130462423/public_html/views/view_try_again2.php");
					} 
						else {

							$sql = "INSERT  INTO `clients` ( `cpf_cnpj`, `name_conpany_name` , `ie_rg`,  `addr`  ,`city`, `district`,`states`,  `zip_code`,`phone` , `cell` , `email`) VALUES  ('$cpf','$nome', '$rg', '$endereco', '$cidade', '$bairro', '$estado', '$cep','$telefone', '$celular', '$email')";
							$r = @mysqli_query($conexao, $sql);

							$sql = "SELECT id
									FROM clients
									WHERE cpf_cnpj = '$cpf'";
							$r = @mysqli_query($conexao, $sql);	
							$id_client  = mysqli_fetch_object($r);				
							

							$sql = "INSERT  INTO `users` ( `id_client`, `login` , `pass`) VALUES  ('$id_client->id','$usuario', '$confirmasenha')";
													
							$r = @mysqli_query($conexao, $sql); 
							require_once("/home/u130462423/public_html/views/view_success.php"); 	
						}			
			}
	}

	@mysqli_close($conexao);
?>
