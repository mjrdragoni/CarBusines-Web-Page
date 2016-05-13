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
<html >
<head>

	<title><?=$titulo?></title>

	<!-- define a viewport-->
	<meta name="viewport" content="width=device, initial-scale=1.0">
	<meta charset="utf-8">

	<!-- adicionar o CSS Bootstrap-->
	<link rel="stylesheet" media="screen" href="../css/bootstrap.min.css">

	<!-- adicionar  Bootstrap personalizado-->
	<link rel="stylesheet" media="screen" href="../css/estilo.css">
	
  
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

	<!-- adicionar  Curtir e  compartilhar do facebook-->
	<script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

	<!-- adicionar  Curtir e  compartilhar do facebook-->
	<script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
	<script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
</head>	

 <body>

	<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
	$(function() {
	$("#dataretirada").datepicker({
	    dateFormat: 'dd/mm/yy',
	    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
	    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
	});
	});
	</script>
	
	<script>
	$(function() {
	$("#dataentrega").datepicker({
	    dateFormat: 'dd/mm/yy',
	    dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'],
	    dayNamesMin: ['D','S','T','Q','Q','S','S','D'],
	    dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'],
	    monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
	    monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez']
	});
	});
	</script>	

	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-md-10 col-md-offset-1">
				

				<div class="well">
				  <div id="datetimepicker3" class="input-append">
				  	  <form id="formreserva" name="formreserva" method="post" action="../models/model_reserva_alguel.php">
					  	<center> <h3><b> <p>
							ESCOLHA A <font color="#FF8C00">DATA</font> E A <font color="#FF8C00">HORA</font> PARA RETIRAR O VEÍCULO <br> E A <font color="#FF8C00">DATA</font> PARA DEVOLVÊ-LO 
							</p></b></h3></center><br><br>
							<center><p>
							<label for="dataretirada">Data de Retirada</label>
							<input type="text" id="dataretirada" name="dataretirada">&nbsp;
							<label for="dataentrega">Data de Entrega</label>
							<input type="text" id="dataentrega" name="dataentrega">
						</p><br>
							  <p>
							    <label for="horaretirada">Hora de Retirada</label>
							    <select name="horaretirada" size="1" id="horaretirada">
							      <option> 7:00 h</option>
							      <option> 7:30 h</option>
							      <option> 8:00 h</option>
							      <option> 8:30 h</option>
							      <option> 9:00 h</option>
							      <option> 9:30 h</option>
							      <option> 10:00 h</option>
							      <option> 10:30 h</option>
							      <option> 11:00 h</option>
							      <option> 11:30 h</option>
							      <option> 12:00 h</option>
							      <option> 12:30 h</option>
							      <option> 13:00 h</option>
							      <option> 13:30 h</option>
							      <option> 14:00 h</option>
							      <option> 14:30 h</option>
							      <option> 15:00 h</option>
							      <option> 15:30 h</option>
							      <option> 16:00 h</option>
							      <option> 16:30 h</option>
							      <option> 17:00 h</option>
							      <option> 17:30 h</option>
							      <option> 18:00 h</option>
							      <option> 18:30 h</option>
							      <option> 19:00 h</option>
							      <option> 19:30 h</option>
							      <option> 20:00 h</option>
							      <option> 20:30 h</option>
							      <option> 21:00 h</option>
							      <option> 21:30 h</option>
							      <option> 22:00 h</option>
							      <option> 22:30 h</option>
							      <option> 23:00 h</option>
							      <option> 23:30 h</option>
						        </select> <font color="#FF8C00"><b>O horário de devolução deverá ser o mesmo da retirada.</b></font></p>
							  </p><br><br>
							  
						</center>
						 <center><a href="javascript:window.history.go(-1)"><input  class="btn btn-md btn-warning" type="button" name="cancelar" id="cancelar" value="Cancelar"></a>
			            <input  class="btn btn-md btn-primary" type="submit" name="cadastrar" id="cadastrar" value="Efetuar meu Cadastro" onsubmit="validateForm();" />
			            </center>	    	


				    	</form>
				   		 <span class="add-on">
				      		<i data-time-icon="icon-time" data-date-icon="icon-calendar">
				      		</i>
				    	</span>
				  </div>
				</div>
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