﻿<?php  
  require_once("/home/u130462423/public_html/models/model_altera_cliente1.php"); 
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

  <!-- adicionar  Curtir e  compartilhar do facebook-->
  <script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
  <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>

</head>

<body>  

  <div class="container-fluid fontecorpadrao">
    <div class="row">
      <div class="col-xs-12">	
        <center>
         <h3><b> <p style="color:#FF8C00;">ALTERE AS INFORMAÇÕES QUE SE FIZEREM NECESSÁRIAS</p></b></h> 
        </center>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-2">
        <form id="formcadastro" name="formcadastro" method="post" action="../models/model_altera_cliente.php">  
           
          <p>
            <label for="nome">Nome Completo</label>
            <input name="nome" type="text" id="nome" size="50" value="<?=$nome?>" readonly required/>
            <label for="rg">RG</label>
            <input name="rg" type="" id="rg" size="45" value="<?=$rg?>" readonly required />
            <p>
              <label for="cpf">CPF</label>
              <input name="cpf" type="text" id="cpf" size="45" value="<?=$cpf?>" readonly required/>
              <label for="telefone">Telefone</label>
            <input name="telefone" type="text" id="telefone" size="45"  value="<?=$tel?>" required/>                 
          <p>
            <label for="celular"> Celular</label>
            <input name="celular" id="celular" size="45" value="<?=$cel?>"/> 
            <label for="email">E-mail</label>
            <input name="email" type="email" id="email" size="50" value="<?=$email?>"  required/>
                    
          </p>
          <p>
            <label for="endereco">Endereço </label>
            <input name="endereco" type="text" id="endereco" size="100" value="<?=$end?>" required/>
          </p>
          <p>
            <label for="cidade">cidade</label>
            <input name="cidade" type="text" id="cidade" size="45" value="<?=$cidade?>" required/>
            <label for="bairro">Bairro</label>
            <input name="bairro" type="text" id="bairro" size="58" value="<?=$bairro?>" required/>
          <P><label for="estado">Estado</label>
            <select name="estado" size="1" id="estado" value="<?=$estado?>" required>
              <option><?=$estado?></option>
              <option>AC</option>
              <option>AL</option>
              <option>AP</option>
              <option>AM</option>
              <option>BA</option>
              <option>CE</option>
              <option>DF</option>
              <option>ES</option>
              <option>GO</option>
              <option>MA</option>
              <option>MT</option>
              <option>MS</option>
              <option>MG</option>
              <option>PA</option>
              <option>PB</option>
              <option>PR</option>
              <option>PE</option>
              <option>PI</option>
              <option>RJ</option>
              <option>RN</option>
              <option>RS</option>
              <option>RO</option>
              <option>RR</option>
              <option>SC</option>
              <option>SP</option>
              <option>SE</option>
              <option>TO</option>
            </select>
            <label for="cep">CEP</label>
            <input type="text" name="cep" id="cep" value="<?=$cep?>" required="Digite seu CEP"/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              <a href="/views/view_alterar_senha_direto.php">Alterar minha Senha</a> &nbsp;&nbsp;
              <a href="/models/model_carros_cliente.php"><font color="#696969"> Veículos que Anunciei</font></a>&nbsp;&nbsp; 
              <a href="#delete_client" data-toggle="modal"><font color="#FF8C00"> Excluir meu Cadastro</font></a>
             
             </P>

  <div class="modal fade col-xs-12" id="delete_client" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 20px; padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-alert"></span> Vocês está prestes a apagar permanentemente seu Cadastro, juntamente com todos os carros anunciados por você e também seu histórico de reservas.<br> Isso é irreversível. <br>Tem certeza que deseja continuar?
        </div>
        <div class="modal-body">
             <center><button type="submit" class="btn btn-warning btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
          
             <a href="../models/model_excluir_cliente.php"><input  class="btn btn-danger btn-primary"  name="excluir" id="excluir" value="Confirmar Exclusão" /></a>
        </div>        
      </div> 
    </div>
  </div>

          <p>&nbsp;</p>
          <p>
            <center><a href="../index.php"><input  class="btn btn-lg btn-warning" type="button" name="cancelar" id="cancelar" value="Cancelar"></a>
            <input  class="btn btn-lg btn-primary" type="submit" name="alterar" id="alterar" value="Salvar as Alterações" onsubmit="validateForm();" />
            </center>
          </p>     
        </form>   
      </div>  
    </div>   
  </div>

  <?php
      include('view_footer.html');
  ?>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
</body>
</html>