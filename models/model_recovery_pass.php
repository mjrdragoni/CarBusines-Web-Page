<?php

  require_once("/home/u130462423/public_html/controllers/conection.php");

    $user = mysqli_real_escape_string($conexao, trim($_POST['email']));
    $q = mysqli_query($conexao, "SELECT * FROM clients WHERE email = '$user'");
 
    if( mysqli_num_rows($q) > 0 ){
      // o utilizador existe, vamos gerar um link único e enviá-lo para o e-mail
 
      // gerar a chave
      
      $chave = sha1(uniqid( mt_rand(), true));
 
      // guardar este par de valores na tabela para confirmar mais tarde
      $conf = mysqli_query($conexao, "INSERT INTO pass_recovery  ( `user`, `confirmation`) VALUES ('$user', '$chave')");      
 
      $link = "http://carrent.hol.es/views/view_alterar_senha.php?u=$user&c=$chave";
 
     $mensagem = '<!DOCTYPE html>
        <html >
        <head>

          <title><?=$titulo?></title>

          <!-- define a viewport-->
          <meta name="viewport" content="width=device, initial-scale=1.0">
          <meta charset="utf-8">
          
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
          <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
          
        </head> 

         <body>
          
          <div class="container">
            <div class="row">
              <div class="col-xs-12 col-md-10 col-md-offset-1">
                <div class="well">
                  <center> <h3><b> <p>
                      <font color="#1d81b3">VOCÊ</font><font color="#FF8C00"> SOLICITOU </font><font color="#1d81b3"> A TROCA DE SUA</font><font color="#FF8C00"> SENHA</font> <font color="#1d81b3">!</font>
                      </p></b></h3>
                  </center><br><br>

                  <h4>
                    <font color="#1d81b3">Olá '.$user. ', clique no link abaixo para poder efetuar a alteração de sua senha: </font><br><br>
                    <font color="#FF8C00">' .$link.'</font>  
                  </h4>          

                </div>      
              </div>
            </div>
          </div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
         
        </body>
        </html>';
         
      $assunto = "alteração de Senha";
    //agora inserimos as codificações corretas e  tudo mais.
      $headers =  "Content-Type:text/html; charset=UTF-8\n";
      $headers .= "From:  carrent.hol.es<not-repply@carrent.hol.es>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
      $headers .= "X-Sender:  <not-repply@carrent.hol.es>\n"; //email do servidor //que enviou
      $headers .= "X-Mailer: PHP  v".phpversion()."\n";
      $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
      $headers .= "Return-Path:  <not-repply@carrent.hol.es>\n"; //caso a msg //seja respondida vai para  este email.
      $headers .= "MIME-Version: 1.0\n";
      $headers .= "Cc: not-repply@carrent.hol.es";

      mail($user, $assunto, $mensagem, $headers);  //função que faz o envio do email.
      
      header("Location:/views/view_success_pass_order.php");

    }

    else {    
           header("Location:/views/view_user_nao_encontrado.php");
    }
@mysqli_close($conexao);
 ?> 