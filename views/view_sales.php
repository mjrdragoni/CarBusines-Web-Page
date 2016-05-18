<?php
  $link = "Venda";
  require_once("/home/u130462423/public_html/models/model_sales.php");
  require_once("/home/u130462423/public_html/controllers/conection.php");
  
  @session_start();
  if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
      if(isset($_COOKIE['usuarioLogado']))
      $_SESSION['usuario'] = $_COOKIE['usuarioLogado'];
      include("view_header_restrita.php");
      
  }   
  else{
    
      include("view_header.php");     
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
   <script type="text/javascript" src="../js/load_car_models.js"></script>
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
    
    <div class="col-xs-8 col-xs-offset-2">  
      
      <div class="col-xs-4">
        <label for="brands">Marca</label>
          <select name="brands" id="brands" onchange="buscar_marcas()"  >
          <option>Selecione...</option>
                <?=$html?>      
 
         </select>
      </div>

      <div class="col-xs-4" id="load_models">
        <label for="models">Modelo</label>
        <select name="models" id="models" onchange="buscar_veiculos()">          
          <option value="" >Selecione...</option>        
                
        </select>
      </div>

      <div class="col-xs-4" id="load_veiculos" >
        <label for="veiculos">Nome do Veículo</label>
        <select name="veiculos" id="veiculos">     
         
         <option value="">Selecione...</option>      

        </select> 
       </div> 

     </div>  
    
  </form>
  </center>

  <script type="text/javascript">

    function buscar_marcas(){
        var id = $('#brands').val();  //codigo do estado escolhido
        //se encontrou o estado
        if(id){
          var url = '../controllers/reload_brands.php?id='+id;  //caminho do arquivo php que irá buscar as cidades no BD
          $.get(url, function(dataReturn) {
            $('#load_models').html(dataReturn);  //coloco na div o retorno da requisicao
          });
        }
      }

  </script>
  
  <script type="text/javascript">

    function buscar_veiculos(){
        var id = $('#models').val();  //codigo do estado escolhido
        //se encontrou o estado
        if(id){
          var url = '../controllers/reload_models.php?id='+id;  //caminho do arquivo php que irá buscar as cidades no BD
          $.get(url, function(dataReturn) {
            $('#load_veiculos').html(dataReturn);  //coloco na div o retorno da requisicao
          });
        }
      }

  </script>
 
  <script src="../js/jquery-1.12.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
 
</body>
</html>