<?php
	$link = "Sobre";
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
</head>

<body>		
	  	
	<div class="container">
		<div class="row">
			<div class="col-xs-12">


              <p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;A CarRent inicou seus trabalhos no ano de 2015 apenas vendendo veículos e posteriormente ampliou seus horizonte passando a trabalhar também com aluguel de carros.
Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque sed pellentesque nibh. Nulla ultrices mi sodales mi aliquam, sit amet egestas dolor sodales. Vestibulum ut vulputate mauris. Quisque eget ipsum risus. Sed commodo bibendum purus eu aliquam. Mauris auctor et massa eget sagittis. Nam tincidunt sapien ac quam ullamcorper, sit amet tempus magna porta. Curabitur et ante nulla. Donec iaculis aliquam leo vel gravida. Duis imperdiet dictum consectetur. Aliquam pellentesque tellus quis efficitur finibus. Aliquam ullamcorper auctor tellus ut varius. Donec quam neque, porttitor sed risus vel, semper porttitor risus. Nulla malesuada dolor vitae lectus varius euismod. Sed posuere metus ac nunc semper finibus. Cras facilisis urna at neque malesuada pellentesque.</p>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Aliquam euismod hendrerit lobortis. Cras ut semper libero. Integer sagittis iaculis ex, nec viverra lorem consectetur in. Integer vel mi dui. Pellentesque at leo nibh. Etiam bibendum ex nisl, in interdum orci aliquam ac. Donec malesuada pharetra justo sed porttitor. Donec bibendum nibh vitae lacus auctor tempus. Donec elementum sagittis pretium. Nam vitae orci porta, volutpat mauris auctor, auctor massa. Cras et faucibus dui, a laoreet ante. Ut cursus purus eu leo congue luctus. Vestibulum semper eu nisi et gravida. Morbi sed ultricies ante. Maecenas faucibus odio enim, a lobortis sapien auctor eu. Nulla metus turpis, pretium quis vestibulum ac, malesuada nec magna.
In malesuada eget tortor vel dapibus. Phasellus viverra dui nisl, eget mattis lacus aliquam quis. Etiam et consectetur mi. Proin ut laoreet metus. Sed eros nulla, ornare a justo sed, dignissim vulputate ante. Nulla blandit vestibulum felis et dapibus. Proin ac lorem ut arcu faucibus condimentum non eu nisi. Sed imperdiet nisl a ante pellentesque feugiat. Proin malesuada purus quam, nec dapibus est pretium id. Nullam eu imperdiet lectus.
Aenean aliquet nulla non aliquam imperdiet. Integer consequat velit sed ipsum tempor ullamcorper. Maecenas blandit odio lectus, et malesuada nulla tincidunt non. Donec volutpat urna et leo euismod, sit amet cursus lectus lacinia. Maecenas risus felis, finibus faucibus ornare nec, consequat eu tellus. Etiam urna lectus, tincidunt at nunc in, cursus pharetra nisl. Fusce vel nulla mauris. Pellentesque eget tempus est. Maecenas enim massa, ullamcorper ut congue et, gravida ac felis.</p>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Integer auctor maximus lectus et dictum. Mauris tempor massa diam, eu gravida felis tincidunt eget. Praesent pulvinar lorem ut risus venenatis aliquet. Aenean non ligula id arcu egestas varius id non tellus. Praesent egestas enim mauris, et mattis nibh viverra id. Morbi vestibulum porttitor maximus. Vestibulum congue, orci in malesuada euismod, quam ligula eleifend diam, id feugiat nunc orci quis erat. Morbi cursus justo ut faucibus eleifend. Quisque non commodo enim. Donec vel eros euismod, faucibus elit sed, aliquam odio. Suspendisse in nisl et arcu vulputate varius. </p>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ac enim vel massa sodales semper ac nec turpis. Curabitur augue odio, efficitur quis felis vel, tempus tincidunt nisi. Pellentesque scelerisque leo vel nisi cursus, at sagittis metus semper. Praesent consectetur auctor nulla, ut semper libero cursus placerat. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Aliquam in elit a orci congue rhoncus. Maecenas vitae laoreet odio. Nullam bibendum accumsan ex eu interdum. Maecenas rutrum non ipsum ac auctor. Phasellus id dolor dignissim, lobortis ipsum et, malesuada elit. Vestibulum ut eros a massa eleifend interdum. Phasellus justo urna, congue eget magna et, semper sodales tellus.
Mauris ac convallis risus. Duis porta dignissim purus et varius. In et egestas massa. Donec gravida nibh consequat, mollis nisl a, mollis nisl. Proin fringilla dui ut dolor mollis sagittis. Aenean quis interdum felis, a varius diam. Nulla accumsan a odio non rutrum. Nam id nunc mollis, dictum elit sit amet, hendrerit elit. Praesent laoreet sed velit in vestibulum. Sed quam libero, accumsan eu commodo ut, bibendum vel ex. Ut nec ex diam. Vivamus ut tortor sit amet massa luctus tempus.</p>
<p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sed nec enim elementum, ullamcorper elit sit amet, tempus nunc. Nullam interdum ante et tortor varius suscipit. Sed volutpat mi et consectetur posuere. Sed id nisl nibh. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis sit amet augue nec libero iaculis dapibus at non orci. Sed lobortis pharetra sapien sit amet sollicitudin. Duis sollicitudin justo et odio condimentum vehicula. Donec laoreet risus ut neque tristique pharetra. Vivamus mattis suscipit tortor id rutrum. Integer laoreet eu diam nec commodo. Proin feugiat, dolor sed finibus imperdiet, leo eros elementum nibh, et tempus enim erat ut leo. Duis cursus pellentesque rhoncus. Integer efficitur nulla eu erat suscipit finibus at eu diam. Phasellus porttitor velit eu tortor gravida dictum. Ut euismod, risus in mollis pretium, mauris purus eleifend quam, at viverra elit eros in nulla.
Pellentesque consequat sodales dolor, ac tincidunt sapien. Praesent non vestibulum odio, at gravida leo. Mauris luctus varius tellus, mattis bibendum quam consequat id. Nunc elit lorem, viverra ac tincidunt nec, commodo ac nulla. Phasellus vehicula interdum velit, sed ullamcorper ligula dictum sed. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent finibus a tortor quis vehicula. Aenean cursus, velit eget condimentum porttitor, neque odio euismod massa, vel semper tortor nisi at lacus. Nam nec pellentesque neque, ac cursus odio. Sed erat leo, tristique non lectus ornare, tempus sodales ante. Praesent nec pharetra purus. Nulla eu malesuada nunc. Praesent ut pellentesque nisi, at auctor metus. Proin nec ligula ultrices massa cursus malesuada. Maecenas laoreet elit in commodo viverra.
Aenean tristique nulla vel tortor convallis, eget facilisis ante elementum. Aenean pellentesque, augue eu ornare porta, ex diam congue ex, eu semper quam lacus id velit. Phasellus faucibus est nisi, condimentum lacinia nibh gravida eu. Pellentesque scelerisque turpis odio, in feugiat sapien scelerisque sit amet. Ut efficitur libero in risus congue sodales. Vestibulum porta ipsum arcu, sed imperdiet lorem consequat in. Donec sit amet vehicula est. In sagittis dui at lorem convallis, id scelerisque tortor congue. Nam a efficitur erat, nec laoreet ligula. Proin posuere nec mi sed ultricies.</p>
		
				
				
				
			</div>		
		</div>
	</div>		
	
		
	 <?php
  		include('view_footer.html');
	?>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
</body>
</html>