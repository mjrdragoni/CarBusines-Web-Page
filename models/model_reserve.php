<?php
  @session_start();
  require_once("/home/u130462423/public_html/controllers/conection.php");
  require_once("/home/u130462423/public_html/phpmailer/class.phpmailer.php");
  require_once("/home/u130462423/public_html/controllers/functions.php");
  $dataretirada = mysqli_real_escape_string($conexao, trim($_POST['dataretirada']));
  $dataentrega = mysqli_real_escape_string($conexao, trim($_POST['dataentrega']));  
  $id_client = $_SESSION['idclient'];
  $horaretirada = mysqli_real_escape_string($conexao, trim($_POST['horaretirada']));
  $id_car = $_SESSION['idcar'];
  $pattern = "^[0-9]{2}+/[0-9]{2}+/[0-9]{4}^";
  $patternh = "^[0-9]{2}+:[0-3]{2}^"; 
  // Usa a função criada e pega o timestamp das duas datas:  
  $dataretconv =  geraTimestamp($dataretirada);
  $dataentconv =  geraTimestamp($dataentrega);
  $dataret =  substr($dataretirada,6,4)."-".substr($dataretirada,3,2)."-".substr($dataretirada,0,2);
  $dataent =  substr($dataentrega,6,4)."-".substr($dataentrega,3,2)."-".substr($dataentrega,0,2);

  $diferenca = $dataentconv - $dataretconv; // 19522800 segundos
  // Calcula a diferença de dias
  $dias = (int)floor( $diferenca / (60 * 60 * 24)); // 225 dias
 


  if (empty($dataretirada) || empty($dataentrega) || empty($horaretirada) || !preg_match($pattern, $dataretirada) ||
  !preg_match($pattern, $dataentrega) || !preg_match($patternh, $horaretirada)) {    
    require_once("/home/u130462423/public_html/views/view_try_again3.php");
    exit();
    
  }

  if ( ($dataret <= date('Y-m-d')) || $diferenca < 0 || ($dataretirada == $dataentrega) ){
    require_once("/home/u130462423/public_html/views/view_try_again_reserva.php");
    exit(); 
  }
  
  $sql = "SELECT status FROM cars 
          WHERE id = '$id_car'";
  $r = @mysqli_query($conexao, $sql);
  while ($result = mysqli_fetch_array($r)) {
    $status = $result['status'];
  }
  
  if ($status == "N"){
    require_once("/home/u130462423/public_html/views/view_try_again3.php");
    exit();
    }
else { 
    
  $sql = "INSERT  INTO `reservation` (`id_client` , `start_date`,  `end_date`  ,`start_hour`, `end_hour`,`id_car`) 
          VALUES  ('$id_client', '$dataretirada', '$dataentrega', '$horaretirada', '$horaretirada', '$id_car')";
  $r = @mysqli_query($conexao, $sql);


  $sql = "UPDATE cars
        SET status = 'N'
        WHERE id = '$id_car'";
  $r = @mysqli_query($conexao, $sql);  
           

 $sql = "SELECT id FROM reservation 
        WHERE (id_client = '$id_client' AND start_date = '$dataretirada' AND end_date = '$dataentrega' 
        AND start_hour = '$horaretirada' AND end_hour = '$horaretirada' AND id_car = '$id_car')";
  $r_reserve = @mysqli_query($conexao, $sql); 

  while ($result = mysqli_fetch_array($r_reserve)) { 
    $id_reservation = $result['id'];
  }


  $sql = "SELECT  name_conpany_name, email, cpf_cnpj FROM clients
          WHERE id = '$id_client'";

  $r_clients = @mysqli_query($conexao, $sql);

  while ($result = mysqli_fetch_array($r_clients)) { 
    $client_name = $result['name_conpany_name']; 
    $client_cpf = $result['cpf_cnpj']; 
    $client_email = $result['email']; 
  } 


  $sql = "SELECT cars.car_name, car_models.name, brands.name AS brand_name, cars.color, cars.rental_price
      FROM brands INNER JOIN
         car_models ON brands.id = car_models.id_brand INNER JOIN
         cars ON brands.id = cars.id_brand AND car_models.id = cars.id_model 
         WHERE (cars.id = '$id_car')";
  $r_car = mysqli_query($conexao, $sql); 

  while ($result = mysqli_fetch_array($r_car)) { 
    $model = $result['name']; 
    $brand = $result['brand_name']; 
    $color = $result['color']; 
    $rental_price = $result['rental_price']; 
  } 
         
  $valtot = $dias * $rental_price; 

  // enviando e-mail de confirmação da reserva para o cliente
  // defininos o que vai no assunto do e-mail
  $assunto = 'Reserva de Veículo - CarRent';
   //Agora definimos a  mensagem que vai ser enviado no e-mail
  $mensagem = '<!DOCTYPE html>
<html >
<head>

  <title><?=$titulo?></title>

  <!-- define a viewport-->
  <meta name="viewport" content="width=device, initial-scale=1.0">
  <meta charset="utf-8">
  
  
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  
</head> 

 <body>
  
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        <div class="well">
          <center> <h3><b> <p>
              <font color="#1d81b3">PARABÉNS, SUA </font><font color="#FF8C00">RESERVA</font><font color="#1d81b3"> FOI REALIZADA COM </font><font color="#FF8C00">SUCESSO</font> <font color="#1d81b3">!</font>
              </p></b></h3>
          </center><br><br>

          <h4>
            <font color="#FF8C00">Cód. da Reserva:</font><font color="#1d81b3">' .$id_reservation. '</font> <br><br><br>
            <font color="#FF8C00">Data para Retirada: </font><font color="#1d81b3">' .$dataretirada.'</font>
            <font color="#FF8C00">Data para Entrega: </font><font color="#1d81b3">' .$dataentrega.'
            <font color="#FF8C00">Hora para Retirada e Entrega: </font><font color="#1d81b3">  '.$horaretirada.'</font><br><br>
            <font color="#FF8C00">Cliente: </font><font color="#1d81b3">' .$client_name.'</font>
            <font color="#FF8C00">CPF:</font><font color="#1d81b3">'.$client_cpf.'</font>
            <font color="#FF8C00">E-mail:</font><font color="#1d81b3">'.$client_email.'</font><br><br>
            <font color="#FF8C00">Cód. do Veículo:</font><font color="#1d81b3">'.$id_car.'</font>
            <font color="#FF8C00">Marca: </font><font color="#1d81b3">'.$brand.'</font>
            <font color="#FF8C00">Modelo: </font><font color="#1d81b3">'.$model.'</font>
            <font color="#FF8C00">Cor: </font><font color="#1d81b3">' .$color.'</font>
            <font color="#FF8C00">Preço da Diária: </font><font color="#1d81b3"> R$ '.$rental_price.'</font>
            <font color="#FF8C00">Valor Total: </font> <font color="#1d81b3"> R$ '.$valtot.'</font>
          </h4> 
            

        </div>      
      </div>
    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
 
</body>
</html>';
 


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
$mail->AddAddress($client_email, $client_name);
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
// Exibe uma mensagem de resultado

require_once("/home/u130462423/public_html/views/view_reserva_confirmada.php");

@mysqli_close($conexao);
}


?>