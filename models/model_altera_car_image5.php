<?php
  
  require_once("/home/u130462423/public_html/controllers/conection.php");

  $id_car = $_GET['idcar'];

  $foto5 = $_FILES['img5']['tmp_name'];


  $tamanho_permitido = 1024000; //1 MB
  $pasta = '../views/cars_images';

 
 if (!empty($_FILES['img5'])){
        $sql = "SELECT *  FROM customer_cars   WHERE (id = '$id_car')";
    $r = mysqli_query($conexao, $sql);
 
  while ($result = mysqli_fetch_array($r)) {

    if(!empty($result['image5'])){
       unlink($result['image5']);
    }
   }

 }

    if (!empty($foto5)){   
    $file = getimagesize($foto5);

    //TESTA O TAMANHO DO ARQUIVO
    if($_FILES['img5']['size'] > $tamanho_permitido){
        echo "Erro! - Arquivo muito grande. Por favor seleciona uma foto com no máximo 1Mb";
        exit();
    }   

          //CAPTURA A EXTENSÃO DO ARQUIVO
    $_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif', 'bmp');    
    $extensao = @strtolower(@end(@explode('.', $_FILES['img5']['name'])));

    //VERIFICA A EXTENSÃO DO ARQUIVO
    if (array_search($extensao, $_UP['extensoes']) === false) {
      echo "Por favor, envie arquivos : .jpg, .png, .bmp ou .gif";
      exit;
    } else{
    

     //MONTA O CAMINHO DO NOVO DESTINO
    $novoDestino5 = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;
    
    move_uploaded_file ($foto5 , $novoDestino5 );
    }
  }


$sql = "UPDATE `customer_cars` SET `image5`='$novoDestino5'
    WHERE id = '$id_car'";

$r = @mysqli_query($conexao, $sql); 



header("Location:/models/model_altera_customer_car1.php?id=$id_car")

?>