 <?php
 @session_start();
  require_once("/home/u130462423/public_html/controllers/conection.php"); 
  $id_client = $_SESSION['idclient'];
  $id_car = $_GET['id'];

  $sql = "SELECT customer_cars.id, car_models.name, brands.name AS brand_name, customer_cars.color, customer_cars.price, customer_cars.year, customer_cars.image1, customer_cars.image2, customer_cars.image3, customer_cars.image4, customer_cars.image5, customer_cars.description, customer_cars.power_steering, customer_cars.power_windows, customer_cars.automatic_exchange, customer_cars.air_conditioning, customer_cars.airbags
            FROM brands INNER JOIN
                 car_models ON brands.id = car_models.id_brand INNER JOIN
                 customer_cars ON brands.id = customer_cars.id_brand AND car_models.id = customer_cars.id_model    
            WHERE (id_client = '$id_client' AND customer_cars.id = '$id_car')"; 

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

  require_once("/home/u130462423/public_html/views/view_altera_customer_car.php");

?>