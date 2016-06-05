<?php  
  
  @session_start();
  if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
      if(isset($_COOKIE['usuarioLogado'])){
      $_SESSION['usuario'] = $_COOKIE['usuarioLogado'];
      $_SESSION['iduser'] = $_COOKIE['iduser'];
    }
      include("view_header_restrita.php");
      
  }   
  else{
    
      require_once("/home/u130462423/public_html/views/view_try_again3.php");
      exit();
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



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
  background-color: #FFF;
}
</style>

<!-- adicionar  Curtir e  compartilhar do facebook-->
  <script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
  <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</head>

<body>

  <div class="container col-xs-12">
  <center>
   <h3> <b><p style="color:#FF8C00;">AQUI ESTÃO OS VEÍCULOS QUE VOCÊ ANUNCIOU EM NOSSO SITE</p></b></h3>
  </center><Br>
  

         <div class="row">
          <div class="col-xs-8 col-xs-offset-2">               
    
            <?=$showhtm?>

          
            <br>      
          </div>
            <?=$htmlmodal?> 
          </div>
     
  
  
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
</body>
</html>
