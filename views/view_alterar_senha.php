<?php
require_once("/home/u130462423/public_html/controllers/conection.php");
$user = mysqli_real_escape_string($conexao, trim($_GET['u']));
$chave = mysqli_real_escape_string($conexao, trim($_GET['c']));

$sql = "SELECT * FROM pass_recovery WHERE user = '$user' AND confirmation = '$chave'";

$r = mysqli_query($conexao, $sql);
$n = mysqli_num_rows($r);

if($n < 1){
   require_once("/home/u130462423/public_html/views/view_try_again3.php");
   exit();

 } 

  else{

  $sql = "DELETE FROM pass_recovery WHERE user = '$user' AND confirmation = '$chave';";
  $r = mysqli_query($conexao, $sql);
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

  <div class="container-fluid fontecorpadrao">
    <div class="row">
      <div class="col-xs-12">	
        <center>
         <h3><b> <p style="color:#FF8C00;">REDEFINA SUA SENHA</p></b></h> 
        </center>        
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-1">
        <form id="formcadastro" name="formcadastro"  autocomplete="off" method="post" action="../models/model_altera_senha.php">  
           
          <p><br><br>
            <input name="user" type="hidden" id="user" size="40" value="<?=$user?>" readonly  required>
            <label for="senha">Digite uma Nova Senha</label>&nbsp;
            <input name="senha" type="password" id="senha" size="40" required ><br><br>
            <label for="confirmasenha">Confirme a Nova Senha</label>&nbsp;
            <input name="confirmasenha" type="password" id="confirmasenha" size="40" required/>
          </p><br><br>
      
          <p>
            <center><a href="../index.php"><input  class="btn btn-lg btn-warning" type="button" name="cancelar" id="cancelar" value="Cancelar"></a>
            <input  class="btn btn-lg btn-primary" type="submit" name="alterar" id="alterar" value="OK" onsubmit="validateForm();" />
            </center>
          </p>     
        </form>   
      </div>  
    </div>   
  </div><br><br><br><br><br>

  

  <?php
      include('view_footer.html');
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
</body>
</html>
