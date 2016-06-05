<?php
	$link = "Contato";
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



<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style type="text/css">
body {
	background-color: #FFF;
}
</style>

<!-- adicionar  Curtir e  compartilhar do facebook-->
	<script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v2.6";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>


</head>
<body>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : 'your-app-id',
      xfbml      : true,
      version    : 'v2.5'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
</head>
	  	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">	
				<p><h1><center>Qualquer<font color="#FF8C00"> Dúvida </font>, ou<font color="#FF8C00"> Sugestão </font>envie um E-mail para: <br><br><font color="#FF8C00"> atendimento@carrent.hol.es</font></center></h1></p>
				
			</div>		
		</div>
		</div>

	 <?php
  		include('view_footer.html');
	?>
		<div class="fb-comments col-xs-12 col-md-6 col-md-offset-3"  data-href="https://www.facebook.com/CarRent-385255211598374/" data-numposts="5"></div>
	</div>
	</div>	
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>