<?php
	@session_start();
  require_once("/home/u130462423/public_html/controllers/conection.php"); 
  require_once("/home/u130462423/public_html/controllers/functions.php");
  $id_client = $_SESSION['idclient'];
extract($_POST);
if (isset($_POST['airconditioning'])){
	$airconditioning = "Y";
} else { $airconditioning = "N";
  }

if (isset($_POST['powersteering'] )){
	$powersteering = "Y";
} else { $powersteering = "N";
  }

if (isset($_POST['powerwindows'])){
	$powerwindows = "Y";
} else { $powerwindows = "N";
  }

if (isset($_POST['automaticexchange'])){
} else { $automaticexchange = "N";
  }

if (isset($_POST['airbag'])){
} else { $airbag = "N";
  }

if (isset($_POST['aceito'])){
    $acept = "Y";
} else { $acept = "N";
  } 

$acepted = "Y";

$color = mysqli_real_escape_string($conexao, trim($_POST['cor']));

$id_brand = mysqli_real_escape_string($conexao, trim($_POST['brands']));

$id_model = mysqli_real_escape_string($conexao, trim($_POST['models']));

$year = mysqli_real_escape_string($conexao, trim($_POST['ano']));

$get_valor = mysqli_real_escape_string($conexao, trim($_POST['preco']));

$price = moeda($get_valor);

$foto1 = $_FILES['img1']['tmp_name'];

$foto2 = $_FILES['img2']['tmp_name'];

$foto3 = $_FILES['img3']['tmp_name'];

$foto4 = $_FILES['img4']['tmp_name'];

$foto5 = $_FILES['img5']['tmp_name'];

$description = mysqli_real_escape_string($conexao, trim($_POST['descricao']));




$tamanho_permitido = 1024000; //1 MB
$pasta = '../views/cars_images';



    $patterncor = "^([A-Za-z]){4,20}^";
    $patternbm =  "^([0-9]{1,3})^";
    $patternano = "^([0-9]){4}^";
    $patternpreco = "^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}^";
    $_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif', 'bmp');  

    if (empty($color) || empty($id_brand) || empty($id_model) || empty($year) || empty($get_valor) || strcmp( $acepted, $acept) != 0     ||  !preg_match($patternano, $year) || !preg_match($patternpreco, $get_valor) || !preg_match($patterncor, $color) ||  !preg_match($patternbm, $id_brand) || !preg_match($patternbm, $id_model) ){
        require_once("/home/u130462423/public_html/views/view_try_again3.php");
        exit();

          } else

          { 

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
      echo "Por favor, envie arquivos : .jpg, .png, .bmp ou .gif";
      exit;
    } else{
    

     //MONTA O CAMINHO DO NOVO DESTINO
    $novoDestino1 = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;
    
    move_uploaded_file ($foto1 , $novoDestino1 );
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

if (!empty($foto3)){
    $file = getimagesize($foto3);

    //TESTA O TAMANHO DO ARQUIVO
    if($_FILES['img3']['size'] > $tamanho_permitido){
        echo "Erro! - Arquivo muito grande. Por favor seleciona uma foto com no máximo 1Mb";
        exit();
    }  

    
       //CAPTURA A EXTENSÃO DO ARQUIVO
    $_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif', 'bmp');    
    $extensao = @strtolower(@end(@explode('.', $_FILES['img3']['name'])));

    //VERIFICA A EXTENSÃO DO ARQUIVO
    if (array_search($extensao, $_UP['extensoes']) === false) {
      echo "Por favor, envie arquivos : .jpg, .png, .bmp ou .gif";
      exit;
    } else{
    

     //MONTA O CAMINHO DO NOVO DESTINO
    $novoDestino3 = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;
    
    move_uploaded_file ($foto3 , $novoDestino3 );
    }
  }

if (!empty($foto4)){
    $file = getimagesize($foto4);

    //TESTA O TAMANHO DO ARQUIVO
    if($_FILES['img4']['size'] > $tamanho_permitido){
        echo "Erro! - Arquivo muito grande. Por favor seleciona uma foto com no máximo 1Mb";
        exit();
    }  

  
       //CAPTURA A EXTENSÃO DO ARQUIVO
    $_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif', 'bmp');    
    $extensao = @strtolower(@end(@explode('.', $_FILES['img4']['name'])));

    //VERIFICA A EXTENSÃO DO ARQUIVO
    if (array_search($extensao, $_UP['extensoes']) === false) {
      echo "Por favor, envie arquivos : .jpg, .png, .bmp ou .gif";
      exit;
    } else{
    

     //MONTA O CAMINHO DO NOVO DESTINO
    $novoDestino4 = "{$pasta}/foto_arquivo_".uniqid('', true) . '.' . $extensao;
    
    move_uploaded_file ($foto4 , $novoDestino4 );
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
    


    $sql = "INSERT INTO customer_cars (`id_client`, `id_brand`, `id_model`, `color`, `year`, `air_conditioning`, `power_steering` , `power_windows` , `automatic_exchange` ,  `airbags` , `price`, `description`, `image1`, `image2`, `image3`, `image4`, `image5`) values ('$id_client', '$id_brand', '$id_model', '$color', '$year', '$airconditioning', '$powersteering', '$powerwindows', '$automaticexchange','$airbag','$price', '$description', '$novoDestino1', '$novoDestino2', '$novoDestino3', '$novoDestino4', '$novoDestino5')";

    $r = mysqli_query($conexao, $sql);

     $sql = "SELECT customer_cars.id, car_models.name, brands.name AS brand_name, customer_cars.color, customer_cars.price, customer_cars.year, customer_cars.image1, customer_cars.image2, customer_cars.image3, customer_cars.image4, customer_cars.image5, customer_cars.description, customer_cars.power_steering, customer_cars.power_windows, customer_cars.automatic_exchange, customer_cars.air_conditioning, customer_cars.airbags
                FROM brands INNER JOIN
                     car_models ON brands.id = car_models.id_brand INNER JOIN
                     customer_cars ON brands.id = customer_cars.id_brand AND car_models.id = customer_cars.id_model    
                WHERE (id_client = '$id_client')
                ORDER BY id DESC LIMIT 1"; 

      $r_client = @mysqli_query($conexao, $sql); 

      while ($result = mysqli_fetch_array($r_client)) { 
        $marca = $result['brand_name'];
        $modelo = $result['name'];
        $ano = $result['year'];
        $cor = $result['color'];
        $preco = $result['price'];
        $descr = $result['description'];
        $airconditioning= $result['air_conditioning'];
        $powersteering = $result['power_steering'];
        $powerwindows = $result['power_windows'];
        $automaticexchange = $result['automatic_exchange']; 
        $airbag = $result['airbags'];
        $imagem1 = $result['image1'];
        $imagem2 = $result['image2'];
        $imagem3 = $result['image3'];
        $imagem4 = $result['image4'];
        $imagem5= $result['image5'];
    }
  
      

    require_once("/home/u130462423/public_html/views/view_confirma_carro_cadastro.php");
  
}




?>