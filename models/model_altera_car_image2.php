<?php
  
  require_once("/home/u130462423/public_html/controllers/conection.php"); 

  $id_car = $_GET['idcar'];

  $foto2 = $_FILES['img2']['tmp_name'];


  $tamanho_permitido = 1024000; //1 MB
  $pasta = '../views/cars_images';

 
 if (!empty($_FILES['img2'])){
        $sql = "SELECT *  FROM customer_cars   WHERE (id = '$id_car')";
    $r = mysqli_query($conexao, $sql);
 
  while ($result = mysqli_fetch_array($r)) {

    if(!empty($result['image2'])){
       unlink($result['image2']);
    }
   }

 }

    if (!empty($foto2)){   
    $file = getimagesize($foto2);

    //TESTA O TAMANHO DO ARQUIVO
    if($_FILES['img2']['size'] > $tamanho_permitido){
        echo "Erro! - Arquivo muito grande. Por favor seleciona uma foto com no máximo 1Mb";
        exit();
    }   
    //CAPTURA A EXTENSÃO DO ARQUIVO
    $_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif', 'bmp');    
    $extensao = @strtolower(@end(@explode('.', $_FILES['img2']['name'])));

    //VERIFICA A EXTENSÃO DO ARQUIVO
    if (array_search($extensao, $_UP['extensoes']) === false) {
      echo "Por favor, envie arquivos : .jpg, .png, .bmp ou .gif";
      exit;
    } else{
    

     //MONTA O CAMINHO DO NOVO DESTINO
    $novoDestino2 = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;
    
    move_uploaded_file ($foto2 , $novoDestino2 );
    }
  }


$sql = "UPDATE `customer_cars` SET `image2`='$novoDestino2'
    WHERE id = '$id_car'";

$r = @mysqli_query($conexao, $sql); 



header("Location:/models/model_altera_customer_car1.php?id=$id_car")

?> 