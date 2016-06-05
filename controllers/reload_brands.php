<?php
    require_once("/home/u130462423/public_html/controllers/conection.php");

    $id_brand = $_GET['id'];
    @session_start();
    $_SESSION['brand'] = $id_brand;
   
    $sql = "SELECT * FROM car_models WHERE id_brand = '$id_brand' ORDER BY name"; 
    $r  = mysqli_query($conexao, $sql); // a pesquisa de acordo com o segundo select
       
        while($result = mysqli_fetch_array($r)) {
            $html_model .= '<option value="'.$result['id'].'">'.$result['name'].'</opton>';
        }
    
?>
<div class="col-xs-12">
<label for="models">Modelo</label>
<select name="models" id="models" onchange="buscar_veiculos()" required="required">
  
  <option placeholder="Selecione..." > </option>   
    <?=$html_model?>         
</select>
</div>