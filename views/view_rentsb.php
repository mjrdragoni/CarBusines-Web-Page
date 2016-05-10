<?php
  $link = "Aluguel";
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

</head>

<body>

  <center>
   <h3> <b><p style="color:#FF8C00;">DEFINA AS CARACTERÍSTICAS DO VEÍCULO QUE DESEJA ALUGAR</h1>
  </center>
  <br>
  <center><form id="formrents" name="formrents" method="POST" action="../models/model_rents.php">
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
 
  <br />
    </p>
     <center><input  class="btn btn-lg btn-primary" type="submit" name="cadastrar" id="cadastrar" value="Encontrar Veículos"/> </center>
  </form>
  </center>  <br><br>
   
  
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>