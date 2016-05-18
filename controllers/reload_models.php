<?php
    require_once("/home/u130462423/public_html/controllers/conection.php");
    @session_start();
    $id_brand = $_SESSION['brand'];
    $id_model = $_GET['id'];
   
    $sql = "SELECT * FROM cars WHERE id_brand = '$id_brand' AND id_model = '$id_model' ORDER BY car_name"; 
    $r  = mysqli_query($conexao, $sql); // a pesquisa de acordo com o segundo select
       
        while($result = mysqli_fetch_array($r)) {
            $html_veiculo .= '<option value="'.$result['id'].'">'.$result['car_name'].'</opton>';
        }    

?>

<label for="veiculos">Nome do Veículo</label>
<select name="veiculos" id="veiculos">
  
  <option value="" >Selecione...</option>   
    <?=$html_veiculo?>        
</select>