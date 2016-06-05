<?php

	require_once("/home/u130462423/public_html/controllers/conection.php");
	@session_start();
	$id_client = $_SESSION['idclient'];

	$sql = "SELECT customer_cars.id, car_models.name, brands.name AS brand_name, customer_cars.color, customer_cars.price, customer_cars.year, customer_cars.image1, customer_cars.image2, customer_cars.image3, customer_cars.image4, customer_cars.image5
			FROM brands INNER JOIN
                 car_models ON brands.id = car_models.id_brand INNER JOIN
                 customer_cars ON brands.id = customer_cars.id_brand AND car_models.id = customer_cars.id_model 
                 WHERE customer_cars.id_client = '$id_client'" ;

$query = mysqli_query($conexao, $sql);

   
 
$htmlr = '<table border="1" class="table table-striped">
        <thead style="color:#FF8C00; background-color: #1d81b3;">
          <tr>
            <th><center>Marca</center></th> 
            <th><center>Modelo</center></th> 
            <th><center>Ano</center></th>  
            <th><center>Cor</center></th>           
            <th><center>Preço</center></th>           
            <th><center>Ver Detalhes/Alterar</center></th> 
            <th><center>Excluir</center></th>                        
            
          </tr>
        </thead>
        <tbody>';
while($result = mysqli_fetch_array($query)){
  $idcar = $result['id'];
  $htmlr .= '<tr>
          <td><center>'.$result['brand_name'].'</center></td>
          <td><center>'.$result['name'].'</center></td>
          <td><center>'.$result['year'].'</center></td>
          <td><center>'.strtoupper($result['color']).'</center></td>        
          <td><b><center> R$ '.number_format($result['price'],2,",",".").'</center></b></td>         
          <td><center><a href="/models/model_altera_customer_car1.php?id='.$result['id'].'"><button type="button" class="btn btn-warning">Ver Detalhes/Alterar</button></a></center></td>
          <td><center><button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#excluir">Excluir</button></center></td>'; 	  
} 

$htmlmodal = '<div class="modal fade col-xs-12" id="excluir" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 20px; padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-alert"></span> Vocês está prestes a apagar permanentemente o Anuncio deste Veículo. Tem certeza que deseja continuar?
        </div>
        <div class="modal-body">
             <center><button type="submit" class="btn btn-warning btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
          
             <a href="../models/model_excluir_customer_car.php?id='.$idcar.'"><input  class="btn btn-danger btn-primary"  name="excluir" id="excluir" value="Confirmar Exclusão" /></a>
        </div>        
      </div> 
    </div>
  </div>
';

$rows = mysqli_num_rows($query);

if ($rows > 0){
  $showhtm = $htmlr;
}
 else{
   $showhtm = '<center><h3><b><p><font color="#FF8C00">OPS</font>! VOCÊ NÃO POSSUI VEICULOS CADASTRADOS EM NOSSO SITE</p></b></h3><center>'; 
 }



require_once("/home/u130462423/public_html/views/view_result_client_cars.php");

@mysqli_close($conexao);