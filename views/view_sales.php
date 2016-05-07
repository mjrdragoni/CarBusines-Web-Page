<?php
  $link = "Aluguel";
  require_once("/home/u130462423/public_html/models/model_rents_brands.php");

  @session_start();
  include("view_header_restrita.php");
  if ( !isset($_SESSION['usuario']) and !isset($_COOKIE['usuarioLogado']) ) {
    
    unset ($_COOKIE['usuarioLogado']);
    header("Location:view_cadastro.php");
    exit();
  } 
  else{
    if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
      if(isset($_COOKIE['usuarioLogado']))
      $_SESSION['usuario'] = $_COOKIE['usuarioLogado'];
      
    } 
  } 
?> 
<!DOCTYPE html>
<html>
<head>

  <title><?=$titulo?></title>

  <!-- define a viewport-->
  <meta name="viewport" content="width=device, initial-scale=1.0">
  <meta charset="utf-8">

  <!-- adicionar o CSS Bootstrap-->
  <link rel="stylesheet" media="screen" href="../css/bootstrap.min.css">

  <!-- adicionar  Bootstrap personalizado-->
  <link rel="stylesheet" media="screen" href="../css/estilo.css">

</head>

<body>

  <center>
   <h3> <b><p style="color:#FF8C00;">DEFINA AS CARACTERÍSTICAS DO VEÍCULO QUE DESEJA ALUGAR</h1>
  </center>
  <br>
  <center><form id="formrents" name="formrents" method="post" action="../models/model_rents.php">
    <p>
      <label>
        <input type="checkbox" name="airconditioning" value="caixa de seleção" id="airconditioning" />
        Ar-Condicionado
      </label>
       <label>
         <input type="checkbox" name="powersteering" value="caixa de seleção" id="powersteering" />
         Direção Hidráulica
       </label>
       <label>
         <input type="checkbox" name="powerwindows" value="caixa de seleção" id="powerwindows" />
         Vidro-Elétrico
       </label>
      <label>
         <input type="checkbox" name="automaticexchange" value="caixa de seleção" id="automaticexchange" />
         Câmbio-Automático
      </label>
      <label>
        <input type="checkbox" name="airbag" value="caixa de seleção" id="airbag" />
        Airbag</label>
    </p>
    <p>
      <label for="brands">Marca</label>
      <select name="brands" id="brands"  onchange="load_car_models($(this).val())">
        <option>Selecione...</option>
 
         <?php while($brand = mysqli_fetch_array($query_brands)) { ?>
         <option value="<?php echo $brand['id'] ?>"><?php echo $brand['name'] ?></option>
         <?php } ?>
 
      </select>

      <label for="model">
       
      Modelo</label>
      <select name="model" id="model">
        
        <option>Selecione...</option>
 
         <?php while($car_models = mysqli_fetch_array($query_car_models)) { ?>
         <option value="<?php echo $car_models['id'] ?>"><?php echo $car_models['name'] ?></option>
         <?php } ?>

      </select>
      <label for="results">Nome do Veículo</label>
      <select name="results" id="results">


         <?php while($cars = mysqli_fetch_array($query_cars)) { ?>
         <option value="<?php echo $cars['id'] ?>"><?php echo $cars['name'] ?></option>
         <?php } ?>

      </select>
  <br />
    </p>
  </form>
  </center>
  
  
  <script src="../js/jquery-1.12.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/load_car_models.js"></script>
</body>
</html>