<?php
  @session_start();
  require_once("/home/u130462423/public_html/controllers/conection.php");
  $dataretirada = mysqli_real_escape_string($conexao, trim($_POST['dataretirada']));
  $dataentrega = mysqli_real_escape_string($conexao, trim($_POST['dataentrega']));  
  $id_client = $_SESSION['idclient'];
  $horaretirada = mysqli_real_escape_string($conexao, trim($_POST['horaretirada']));
  $id_car = $_SESSION['idcar'];
  $pattern = "^[0-9]{2}+/[0-9]{2}+/[0-9]{4}^";
  $patternh = "^[0-9]{2}+:[0-3]{2}^";   
  $dataretconv =  substr($dataretirada,6,4)."-".substr($dataretirada,3,2)."-".substr($dataretirada,0,2);
  $dataentconv =  substr($dataentrega,6,4)."-".substr($dataentrega,3,2)."-".substr($dataentrega,0,2);


  if (empty($dataretirada) || empty($dataentrega) || empty($horaretirada) || !preg_match($pattern, $dataretirada) ||
  !preg_match($pattern, $dataentrega) || !preg_match($patternh, $horaretirada)) {    
    require_once("/home/u130462423/public_html/views/view_try_again3.php");
    exit();
    
  }
 
  if ( date("Y-m-d") > $dataretconv ||  $dataentconv < $dataretconv || $dataretirada == $dataentrega ){
    require_once("/home/u130462423/public_html/views/view_try_again_reserva.php");
    exit(); 
  }
  
  $sql = "SELECT status FROM cars 
          WHERE id = 'id_car'";
  $r = @mysqli_query($conexao, $sql);
  while ($result = mysqli_fetch_array($r)) {
    $status = $result['status'];
  }
  
  if ($status = "N"){
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

   $valtot = ($dataentrega - $dataretirada) * $rental_price; 

         
require_once("/home/u130462423/public_html/views/view_reserva_confirmada.php");

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
 

//agora inserimos as codificações corretas e  tudo mais.
  $headers =  "Content-Type:text/html; charset=UTF-8\n";
  $headers .= "From:  carrent.hol.es<not-repply@carrent.hol.es>\n"; //Vai ser //mostrado que  o email partiu deste email e seguido do nome
  $headers .= "X-Sender:  <not-repply@carrent.hol.es>\n"; //email do servidor //que enviou
  $headers .= "X-Mailer: PHP  v".phpversion()."\n";
  $headers .= "X-IP:  ".$_SERVER['REMOTE_ADDR']."\n";
  $headers .= "Return-Path:  <not-repply@carrent.hol.es>\n"; //caso a msg //seja respondida vai para  este email.
  $headers .= "MIME-Version: 1.0\n";
  $headers .= "Cc: not-repply@carrent.hol.es"; 

 

mail($client_email, $assunto, $mensagem, $headers);  //função que faz o envio do email.



@mysqli_close($conexao);
}
?>