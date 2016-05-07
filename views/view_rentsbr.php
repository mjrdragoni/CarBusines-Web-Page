<?php
  $link = "Aluguel";
   require_once("/home/u130462423/public_html/models/model_rents.php");
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

  <div class="row">
    <div class="col-xs-6 col-xs-offset-3">
      
          <?php
            if (empty($result)){
              echo $html;
              while($result = mysqli_fetch_array($query)){

                echo '<tr><td>'.$result['brand_name'].'</td><td>'.$result['name'].'</td><td>'.$result['color'].'</td><td><center><a href="/views/view_reserva.php"><button type="button" class="btn btn-warning">Efetuar Reserva</button></a></center></td></tr>'; 
              }           
            }  

            else{
              echo '<center><h3><b><p><font color="#FF8C00">DESCULPE</font>, NÃO FORAM ENCONTRADOS VEÍCULOS COM AS CARACTERÍSTICAS QUE VOCÊ DESEJA</p></b></h3><center>' ; 
            }
          ?>                   
                           
             
        </tbody>
       </table>
    </div>
  </div>

  
   
  
  <script src="../js/jquery-1.12.3.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  
</body>
</html>  
