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

    <!-- adicionar  Curtir e  compartilhar do facebook-->
  <script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
  <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</head>

<body>

  <center>
   <h3> <b><p style="color:#FF8C00;">DEFINA AS CARACTERÍSTICAS DO VEÍCULO QUE DESEJA COMPRAR</h1>
  </center>
  <br>
  <center><form id="formrsales" name="formrsales" method="post" action="../models/model_sales_busca.php">
    <p>
      <label>
        <input type="checkbox" name="airconditioning" value="Y" id="airconditioning" />
        Ar-Condicionado
      </label>
       <label>
         <input type="checkbox" name="powersteering" value="Y" id="powersteering" />
         Direção Hidráulica
       </label>
       <label>
         <input type="checkbox" name="powerwindows" value="Y" id="powerwindows" />
         Vidro-Elétrico
       </label>
      <label>
         <input type="checkbox" name="automaticexchange" value="Y" id="automaticexchange" />
         Câmbio-Automático
      </label>
      <label>
        <input type="checkbox" name="airbag" value="Y" id="airbag" />
        Airbag</label>
    </p>
    
    <div class="col-xs-8 col-xs-offset-3">  
      
      <div class="col-xs-4">
        <label for="brands">Marca</label>
          <select name="brands" id="brands" onchange="buscar_marcas()"  >
          <option>Selecione...</option>
                <?=$html?>      
 
         </select>
      </div>

       <div class="col-xs-4" id="load_models">
        <label for="models">Modelo</label>
        <select name="models" id="models">          
          <option value="" >Selecione...</option>        
                
        </select>
      </div>
    </div>
    </p> 
    <br><br> <center><input  class="btn btn-lg btn-primary" type="submit" name="buscar" id="buscar" value="Encontrar Veículos"/> </center>
  </form>
  </center>  <br><br>    


  <?php
      include('view_footer.html');
  ?>

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
 
  <script src="../js/jquery-1.12.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
 
</body>
</html>