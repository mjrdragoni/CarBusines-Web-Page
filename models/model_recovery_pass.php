<?php

  require_once("/home/u130462423/public_html/controllers/conection.php");
  require_once("/home/u130462423/public_html/phpmailer/class.phpmailer.php");
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
                     <font color="#FF8C00">Este é um link único, caso você clique nele e não consiga efetivar a alteração de sua senha, você deverá fazer uma nova solicitação de troca de senha.</font>  
                    <font color="#FF8C00">' .$link.'</font>  
                  </h4>          

                </div>      
              </div>
            </div>
          </div>

          <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
         
        </body>
        </html>';
         
      $assunto = "Alteração de Senha";

// Inicia a classe PHPMailer
$mail = new PHPMailer();
// Define os dados do servidor e tipo de conexão
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = "mx1.hostinger.com.br"; // Endereço do servidor SMTP
$mail->SMTPAuth = true; // Usa autenticação SMTP? (opcional)
$mail->Port = 2525;
$mail->Username = "not-repply@carrent.hol.es"; // Usuário do servidor SMTP
$mail->Password = "1983dragoni"; // Senha do servidor SMTP
// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "not-repply@carrent.hol.es"; // Seu e-mail
$mail->FromName = "CarRent"; // Seu nome
// Define os destinatário(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress($user, $user);
$mail->AddAddress('not-repply@carrent.hol.es');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // Cópia Oculta
// Define os dados técnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
$mail->CharSet = 'utf-8'; // Charset da mensagem (opcional)
// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = $assunto; // Assunto da mensagem
$mail->Body = $mensagem;
$mail->AltBody = "";
// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("c:/temp/documento.pdf", "novo_nome.pdf");  // Insere um anexo
// Envia o e-mail
$enviado = $mail->Send();
// Limpa os destinatários e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();


      header("Location:/views/view_success_pass_order.php");

    }

    else {    
           header("Location:/views/view_user_nao_encontrado.php");
    }
@mysqli_close($conexao);
 ?> 
