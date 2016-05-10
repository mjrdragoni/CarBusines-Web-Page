<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
   
    <title><?=$titulo?></title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- adicionar  Bootstrap personalizado-->
    <link rel="stylesheet" media="screen" href="../css/estilo.css">

    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/theme.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/rtespond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body role="document">

    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
         
        <a href="../index.php" class="navbar-brand ">CarRent</a>
         

        </div>
        <div id="navbar" class="navbar-collapse  collapse">          
          
          <span style="padding-top: 13px" class=" col-xs-4 navbar navbar-left">
            <div class="row">
              <ul class="nav navbar-nav">

               <li><?php if ($link == 'Sobre') echo '<li class="active">';?><a href="/views/view_sobre.php">Sobre</a></li>
               <li><?php if ($link == 'Contato') echo '<li class="active">';?><a href="#about">Contato</a></li>
               <li><?php if ($link == 'Aluguel') echo '<li class="active">';?><a href="/views/view_rentsb.php">Aluguel</a>  </li>
               <li><?php if ($link == 'Venda') echo '<li class="active">';?><a href="#about">Compra e Venda</a></li>
              
              </ul>
             </div> 
          </span>     
          
          <form method="POST" action="../models/model_login.php" class="navbar-form navbar-right col-xs-8" >           
              <div class="form-group ">
                
                <span class="navbar">
                  <input name="login" id="login" type="text" class="form-control" placeholder="Usuário"> 
                  <input name="pass" id="pass" type="password" class="form-control" placeholder="Senha">
                </span>
                
                <input id="lembrar" type="checkbox" value="1" name="lembrar">  Manter Logado</input>        
              </div>           

              <input type="submit" value="Login" class="btn btn-primary"></input> 
              <a href="/views/view_cadastro.php"><button type="button" class="btn btn-warning">Cadastre-se</button></a>
          </form> 
        </div><!--/.nav-collapse -->
      </div>
    </nav>

  <!-- Bootstrap core JavaScript
  ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="../js/vendor/jquery.min.js"><\/script>')</script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="..js/docs.min.js"></script>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
  <script src="..js/ie10-viewport-bug-workaround.js"></script>

