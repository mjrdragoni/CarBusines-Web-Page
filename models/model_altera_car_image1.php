<?php
  
  require_once("/home/u130462423/public_html/controllers/conection.php"); 

  $id_car = $_GET['idcar'];

  $foto1 = $_FILES['img1']['tmp_name'];


  $tamanho_permitido = 1024000; //1 MB
  $pasta = '../views/cars_images';
  

 
 if (!empty($_FILES['img1'])){
        $sql = "SELECT *  FROM customer_cars   WHERE (id = '$id_car')";
    $r = mysqli_query($conexao, $sql);
 
  while ($result = mysqli_fetch_array($r)) {

    if(!empty($result['image1'])){
       unlink($result['image1']);
    }
   }

 }

    if (!empty($foto1)){   
    $file = getimagesize($foto1);

    //TESTA O TAMANHO DO ARQUIVO
    if($_FILES['img1']['size'] > $tamanho_permitido){
        echo "Erro! - Arquivo muito grande. Por favor seleciona uma foto com no máximo 1Mb";
        exit();
    }   

    //CAPTURA A EXTENSÃO DO ARQUIVO
    $_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif', 'bmp');    
    $extensao = @strtolower(@end(@explode('.', $_FILES['img1']['name'])));

    //VERIFICA A EXTENSÃO DO ARQUIVO
    if (array_search($extensao, $_UP['extensoes']) === false) {
      echo "Por favor, envie arquivos: .jpg, .png, .bmp ou .gif";
      exit;
    } else{
    

     //MONTA O CAMINHO DO NOVO DESTINO
    $novoDestino1 = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;
    
    move_uploaded_file ($foto1 , $novoDestino1 );
    }
  }


$sql = "UPDATE `customer_cars` SET `image1`='$novoDestino1'
    WHERE id = '$id_car'";

$r = @mysqli_query($conexao, $sql); 



header("Location:/models/model_altera_customer_car1.php?id=$id_car")

?>