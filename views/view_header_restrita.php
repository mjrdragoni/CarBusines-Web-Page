<!DOCTYPE html>
<html>
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
<body>
	
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
          
          <span  style="padding-top: 13px" class="navbar navbar-left col-xs-6">
            <ul class="nav navbar-nav ">
            
             <li><?php if ($link == 'Sobre') echo '<li class="active">';?><a href="/views/view_sobre.php">Sobre</a></li>
             <li><?php if ($link == 'Contato') echo '<li class="active">';?><a href="/views/view_contato.php">Contato</a></li>
             <li><?php if ($link == 'Aluguel') echo '<li class="active">';?><a href="/views/view_rentsb.php">Aluguel</a>  </li>
             <li><?php if ($link == 'Venda') echo '<li class="active">';?><a href="/views/view_sales.php">Compra e Venda</a></li>	
                  
            </ul>
          </span> 
          	<div class="navbar-form navbar-right col-xs-6">
				<p><b><h3>Você está logado(a) como <font color="#FF8C00"><?=$_SESSION['usuario']?></font> </h3></b></p>
				<p><a href="../index.php?ac=logout"><font color="#FF8C00"> Efetuar Logoff</font></a>  &nbsp; &nbsp;
         <a href="/views/view_alterar_cadastro.php"><button type="button" class="btn btn-xs btn-primary">Meu Cadastro</button></a></p></
			</div>
  
			
          
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
