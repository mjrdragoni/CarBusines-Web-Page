<?php
    require_once("/home/u130462423/public_html/controllers/conection.php");
    
if (isset($_POST['airconditioning'])){
	$airconditioning = "Y";
} else { $airconditioning = "N";
  }

if (isset($_POST['powersteering'])){
	$powersteering = "Y";
} else { $powersteering = "N";
  }

if (isset($_POST['powerwindows'])){
	$powerwindows = "Y";
} else { $powerwindows = "N";
  }

if (isset($_POST['automaticexchange'])){
	$automaticexchange = "Y";
} else { $automaticexchange = "N";
  }

if (isset($_POST['airbag'])){
	$airbag = "Y";
} else { $airbag = "N";
  }

$sql = "SELECT car_models.name, brands.name AS brand_name, cars.color
			FROM brands INNER JOIN
                 car_models ON brands.id = car_models.id_brand INNER JOIN
                 cars ON brands.id = cars.id_brand AND car_models.id = cars.id_model 
                 WHERE (air_conditioning = '$airconditioning' AND  power_steering  = '$powersteering' AND power_windows = '$powerwindows' AND automatic_exchange =  '$automaticexchange' AND airbags = '$airbag' AND availability = 'ALUGUEL')";
$query = mysqli_query($conexao, $sql); 
 
$html = '<table border="1" class="table table-striped">
        <thead style="color:#FF8C00; background-color: #1d81b3;">
          <tr>
            <th ><center>Marca</center></th> 
            <th><center>Modelo</center></th>   
            <th><center>Cor</center></th>
            <th><center>Reserva</center></th>                        
            
          </tr>
        </thead>
        <tbody>';
       
        
require_once("/home/u130462423/public_html/views/view_rentsbr.php");

?>
 

