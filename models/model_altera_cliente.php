<?php
  @session_start();
  require_once("/home/u130462423/public_html/controllers/conection.php"); 
  $id_client = $_SESSION['idclient'];

  
  $tel_alt =  mysqli_real_escape_string($conexao, trim($_POST['telefone']));
  $cel_alt =  mysqli_real_escape_string($conexao, trim($_POST['celular']));  
  $end_alt =  mysqli_real_escape_string($conexao, trim($_POST['endereco']));
  $cidade_alt =  mysqli_real_escape_string($conexao, trim($_POST['cidade']));
  $bairro_alt =  mysqli_real_escape_string($conexao, trim($_POST['bairro']));
  $estado_alt =  mysqli_real_escape_string($conexao, trim($_POST['estado']));
  $cep_alt =  mysqli_real_escape_string($conexao, trim($_POST['cep']));
  $email_alt = mysqli_real_escape_string($conexao, trim($_POST['email']));
  $pattern_tel= "^\(+[0-9]{2}+\)+\s[0-9]{4}+\-[0-9]{4}^";
  $pattern_cel= "^\(+[0-9]{2}+\)+\s[0-9]{5}+\-[0-9]{4}^";
  $pattern_cep= "^[0-9]{5}+\-[0-9]{3}^";
  $pattern_email= "^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+.([a-zA-Z]{2,4})^";

  if ( empty($tel_alt) || empty($cel_alt) ||   empty($end_alt) || empty($cidade_alt) || empty($bairro_alt) || 
  empty($estado_alt) || empty($cep_alt) ||  empty($email_alt) || !preg_match($pattern_tel, $tel_alt) || !preg_match($pattern_email, $email_alt) || !preg_match($pattern_cep, $cep_alt) || !preg_match($pattern_cel, $cel_alt)){
    require_once("/home/u130462423/public_html/views/view_try_again3.php");
    exit();
  } 
  else{

  
    
      $sql = "UPDATE clients 
              set  addr = '$end_alt' ,city = '$cidade_alt' , district = '$bairro_alt', states = '$estado_alt',  zip_code = '$cep_alt', phone = '$tel_alt', cell = '$cel_alt', email = '$email_alt'
              WHERE id = '$id_client'";
      $r = @mysqli_query($conexao, $sql);

       $sql = "SELECT * FROM clients 
            WHERE (id = '$id_client')";
      $r_client = @mysqli_query($conexao, $sql); 

      while ($result = mysqli_fetch_array($r_client)) { 
        $nome = $result['name_conpany_name'];
        $rg = $result['ie_rg'];
        $cpf = $result['cpf_cnpj'];
        $end = $result['addr'];
        $cidade = $result['city'];
        $bairro = $result['district'];
        $estado = $result['states'];
        $cep = $result['zip_code'];
        $tel = $result['phone'];
        $cel = $result['cell'];
        $email = $result['email'];
      }

   
      require_once("/home/u130462423/public_html/views/view_confirma_alterar_cadastro.php"); 
   }   
  @mysqli_close($conexao);

  ?>

