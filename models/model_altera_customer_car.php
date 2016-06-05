<?php
	
  require_once("/home/u130462423/public_html/controllers/conection.php"); 
  require_once("/home/u130462423/public_html/controllers/functions.php");
  
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

$id_car = $_GET['idcar'];

$color = mysqli_real_escape_string($conexao, trim($_POST['cor']));

$id_brand = mysqli_real_escape_string($conexao, trim($_POST['brands']));

$id_model = mysqli_real_escape_string($conexao, trim($_POST['models']));

$year = mysqli_real_escape_string($conexao, trim($_POST['ano']));

$get_valor = mysqli_real_escape_string($conexao, trim($_POST['preco']));

$price = moeda($get_valor);

$description = mysqli_real_escape_string($conexao, trim($_POST['descricao']));
 
    $patterncor = "^([A-Za-z]){4,20}^";
    $patternbm =  "^([0-9]{1,3})^";
    $patternano = "^([0-9]){4}^";
    $patternpreco = "^[0-9]{1,3}([.]([0-9]{3}))*[,]([.]{0})[0-9]{0,2}^";

    if (empty($color) || empty($id_brand) || empty($id_model) || empty($year) || empty($get_valor)
       ||  !preg_match($patternano, $year) || !preg_match($patternpreco, $get_valor) || !preg_match($patterncor, $color) ||
       !preg_match($patternbm, $id_brand) || !preg_match($patternbm, $id_model)){

        require_once("/home/u130462423/public_html/views/view_try_again3.php");
        exit();
    }
       else{


$sql = "UPDATE `customer_cars` SET `id_brand`='$id_brand',`id_model`='$id_model',`color`='$color',`year`='$year',`air_conditioning`='$airconditioning',`power_steering`='$powersteering',`power_windows`='$powerwindows',`automatic_exchange`='$automaticexchange',`airbags`='$airbag',`price`='$price',`description`='$description'
    WHERE id = '$id_car'";

$r = @mysqli_query($conexao, $sql); 

 $sql = "SELECT customer_cars.id, car_models.name, brands.name AS brand_name, customer_cars.color, customer_cars.price, customer_cars.year, customer_cars.image1, customer_cars.image2, customer_cars.image3, customer_cars.image4, customer_cars.image5, customer_cars.description, customer_cars.power_steering, customer_cars.power_windows, customer_cars.automatic_exchange, customer_cars.air_conditioning, customer_cars.airbags
            FROM brands INNER JOIN
                 car_models ON brands.id = car_models.id_brand INNER JOIN
                 customer_cars ON brands.id = customer_cars.id_brand AND car_models.id = customer_cars.id_model    
            WHERE (customer_cars.id = '$id_car')
            ORDER BY id DESC LIMIT 1"; 

  $r_car = mysqli_query($conexao, $sql);

  while ($result = mysqli_fetch_array($r_car)) { 
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
    $imagem5 = $result['image5'];
  }
  


require_once("/home/u130462423/public_html/views/view_confirma_altera_carro_cadastro.php");
}


?>


