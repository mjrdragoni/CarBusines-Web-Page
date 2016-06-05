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
 extract($_POST);
 $order = $_POST['order'];


$sql = "SELECT cars.id, car_models.name, brands.name AS brand_name, cars.color, cars.rental_price
			FROM brands INNER JOIN
                 car_models ON brands.id = car_models.id_brand INNER JOIN
                 cars ON brands.id = cars.id_brand AND car_models.id = cars.id_model 
                 WHERE air_conditioning = '$airconditioning' AND  power_steering  = '$powersteering' AND power_windows = '$powerwindows' AND automatic_exchange =  '$automaticexchange' AND airbags = '$airbag' AND availability = 'ALUGUEL' AND cars.status = 'Y'
                 ORDER BY $order" ;
$query = mysqli_query($conexao, $sql); 

   
 
$html = '<table border="1" class="table table-striped">
        <thead style="color:#FF8C00; background-color: #1d81b3;">
          <tr>
            <th><center>Marca</center></th> 
            <th><center>Modelo</center></th>   
            <th><center>Cor</center></th>
            <th><center>Diária</center></th>
            <th><center>Reserva</center></th>                        
            
          </tr>
        </thead>
        <tbody>';
while($result = mysqli_fetch_array($query)){

  $html .= '<tr>
          <td><center>'.$result['brand_name'].'</center></td>
          <td><center>'.$result['name'].'</center></td>
          <td><center>'.$result['color'].'</center></td>
          <td><b><center> R$ '.number_format($result['rental_price'],2,",",".").'</center></b></td>';

          @session_start();
            if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
                if(isset($_COOKIE['usuarioLogado']))
                $_SESSION['usuario'] = $_COOKIE['usuarioLogado'];
                $loged ='<td><a href="/views/view_reserva.php?id='.$result['id'].'"><center><button type="button" class="btn btn-warning">Efetuar Reserva</button></center></a></td>';            
            }   
            else{
               $loged ='<td><center><button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#carry_resgistration">Efetuar Reserva</button></center></td>';   
              } 

    $html .= $loged;
         
}


$html .= '</tbody>
       </table>'; 
         
           
$rows = mysqli_num_rows($query);

if ($rows > 0){
  $showhtm = $html;
}
 else{
   $showhtm = '<center><h3><b><p><font color="#FF8C00">DESCULPE</font>, NÃO FORAM ENCONTRADOS VEÍCULOS COM AS CARACTERÍSTICAS QUE VOCÊ DESEJA</p></b></h3><center>' ; 
 } 

include_once("/home/u130462423/public_html/views/view_rentsbr.php");

@mysqli_close($conexao);

?>
 

