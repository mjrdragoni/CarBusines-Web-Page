<?php

	require_once("/home/u130462423/public_html/controllers/conection.php");
	


	$login =  mysqli_real_escape_string($conexao, trim($_POST['user']));
	$senha =  mysqli_real_escape_string($conexao, trim($_POST['confirmasenha']));
	
	$sql = "SELECT users.id
			FROM users 
			INNER JOIN clients ON clients.id = users.id_client
			WHERE users.login = '$login'  OR clients.email = '$login'";		
	

	$r = @mysqli_query($conexao, $sql);
		$num = mysqli_num_rows($r); 
			
		if ($num > 0){
	while ($result = mysqli_fetch_array($r)) {			 	
			 	$id_user = $result['id'];
	}
	

      $sql = "UPDATE users 
              set  pass = md5('$senha')
              WHERE id = '$id_user'";
      $r = @mysqli_query($conexao, $sql);        
      

      require_once("/home/u130462423/public_html/views/view_senha_alterada.php"); 
  		}

  		else{
  			require_once("/home/u130462423/public_html/views/view_user_nao_encontrado.php"); 
  		}
	
  	@mysqli_close($conexao);
  ?>

