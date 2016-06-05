<?php
#chama o arquivo de configuração com o banco
require_once("/home/u130462423/public_html/controllers/conection.php");
#seleciona os dados da tabela brands

@session_start();
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

extract($_POST);

$id_brand = $_SESSION['brand'];
$id_model = $_POST['models'];
$order = $_POST['order'];

 

$sql = "SELECT customer_cars.id, car_models.name, brands.name AS brand_name, customer_cars.color, customer_cars.price, customer_cars.year, customer_cars.image1, customer_cars.image2, customer_cars.image3, customer_cars.image4, customer_cars.image5, customer_cars.description
			FROM brands INNER JOIN
                 car_models ON brands.id = car_models.id_brand INNER JOIN
                 customer_cars ON brands.id = customer_cars.id_brand AND car_models.id = customer_cars.id_model 
                 WHERE air_conditioning = '$airconditioning' AND  power_steering  = '$powersteering' AND power_windows = '$powerwindows' AND automatic_exchange =  '$automaticexchange' AND airbags = '$airbag' AND customer_cars.id_brand = '$id_brand' AND customer_cars.id_model = '$id_model'
                 ORDER BY $order" ;

$query = mysqli_query($conexao, $sql);

$rows = mysqli_num_rows($query);

if ($rows > 0){   
 
$htmlr = '<table border="1" class="table table-striped">
        <thead style="color:#FF8C00; background-color: #1d81b3;">
          <tr>
            <th><center>Marca</center></th> 
            <th><center>Modelo</center></th> 
            <th><center>Ano</center></th>  
            <th><center>Cor</center></th>           
            <th><center>Preço</center></th>
            <th><center>Imagens/Descrição</center></th>                        
            
          </tr>
        </thead>
        <tbody>';
while($result = mysqli_fetch_array($query)){
  $idcar = $result['id'];
  $im1 = $result['image1'];
  $im2 = $result['image2'];
  $im3 = $result['image3'];
  $im4 = $result['image4'];
  $im5 = $result['image5'];
  $htmlr .= '<tr>
          <td><center>'.$result['brand_name'].'</center></td>
          <td><center>'.$result['name'].'</center></td>
          <td><center>'.$result['year'].'</center></td>
          <td><center>'.strtoupper($result['color']).'</center></td>        
          <td><b><center> R$ '.number_format($result['price'],2,",",".").'</center></b></td>
          <td><center><button type="button" class="btn btn-warning"  data-toggle="modal" data-target="#car_images'.$idcar.'">Ver Imagens/Descrição</button></center></td></tr>';


$sql = "SELECT email, phone FROM clients 
        INNER JOIN customer_cars ON clients.id = customer_cars.id_client WHERE customer_cars.id = $idcar";

$qry = mysqli_query($conexao, $sql);

while($res = mysqli_fetch_array($qry)){
  $email = $res['email'];
  $phone = $res['phone']; 
  }
          
  $htmlr .= '<tr>
  <div class="modal fade col-xs-12 col-md-12" id="car_images'.$idcar.'" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 30px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-camera"></span> <b>Imagens do Veículo Selecionado</b>
        </div>
        <div class="modal-body">       
            <div id="myCarousel'.$idcar.'" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
              <ol class="carousel-indicators">
                <li data-target="#myCarousel'.$idcar.'" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel'.$idcar.'" data-slide-to="1"></li>
                <li data-target="#myCarousel'.$idcar.'" data-slide-to="2"></li>
                <li data-target="#myCarousel'.$idcar.'" data-slide-to="3"></li>
                <li data-target="#myCarousel'.$idcar.'" data-slide-to="4"></li>
              </ol>

              <!-- Wrapper for slides -->
              <div class="carousel-inner" role="listbox">
                <div class="item active">
                  <img src="'.$im1.'"  alt="Imagem não Disponível">
                </div>

                <div class="item">
                  <img src="'.$im2.'" alt="Imagem não Disponível">
                </div>

                <div class="item">
                    <img src="'.$im3.'" alt="Imagem não Disponível"> 
                </div>

                <div class="item">
                    <img src="'.$im4.'" alt="Imagem não Disponível">
                </div>

                <div class="item">
                    <img src="'.$im5.'"  alt="Imagem não Disponível">
                </div>
              </div>

              <!-- Left and right controls -->
              <a class="left carousel-control" href="#myCarousel'.$idcar.'" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="right carousel-control" href="#myCarousel'.$idcar.'" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
        </div>
          <div class="modal-footer" background-color: #f9f9f9;>
            <span style="float: left; text-align: left;"> <font color="#FF8C00">Descrição do Veículo: </font>'.$result['description'].' <br><br>
            <font color="#FF8C00"> E-mail:</font> '.$email.' <font color="#FF8C00">Telefone: </font> '.$phone.'
             </span>                 
          </div>
      </div> 
    </div>
  </div></tr>';  
  
}          

$htmlr .= '</tbody>
       </table>';         
           

 
     

  $showhtm = $htmlr;
}
 else{
   $showhtm = '<center><h3><b><p><font color="#FF8C00">DESCULPE</font>, NÃO FORAM ENCONTRADOS VEÍCULOS COM AS CARACTERÍSTICAS QUE VOCÊ DESEJA</p></b></h3><center>'; 
 }



require_once("/home/u130462423/public_html/views/view_salesr.php");

@mysqli_close($conexao);
