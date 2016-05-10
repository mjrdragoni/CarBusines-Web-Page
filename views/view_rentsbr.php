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

 <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <!-- adicionar  Bootstrap personalizado-->
  <link rel="stylesheet" media="screen" href="../css/estilo.css">
   <style>
  .modal-header, h4, .close {
      background-color: #1d81b3;
      color:#FF8C00 !important;
      text-align: center;
      font-size: 30px;
  }
  .modal-footer {
      background-color: #f9f9f9;
  }
  </style>

</head>

<body <?php $onload; ?> >
<div class="container-fluid">
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
    
     <?=$showhtm?>     
        
    </div>
  </div>

 <!-- Modal -->
  <div class="modal fade col-xs-12" id="carry_resgistration" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Efetue seu Cadastro</h4>
        </div>
        <div class="modal-body">
       <form id="formcadastro" name="formcadastro" method="post" action="../models/model_cadastra_cliente.php">
        <center><p>
            <label for="usuario">Nome de Usuário</label>
            <input name="usuario" type="text" id="usuario" size="15" required />
           <label for="senha">Senha</label>
            <input name="senha" type="password" id="senha" size="15" required/>
           <p><label for="confirmasenha">Confirme sua Senha</label>
            <input name="confirmasenha" type="password" id="confirmasenha" size="15" required/>
         </p>
          <p>
            <label for="nome">Nome Completo</label>
            <input name="nome" type="text" id="nome" size="50" required/></p>
            <p><label for="rg">RG</label>
            <input name="rg" type="" id="rg" size="15" required />
            
              <label for="cpf">CPF</label>
              <input name="cpf" type="text" id="cpf" size="15" required/></p>
             <p> <label for="telefone">Telefone</label>
            <input name="telefone" type="text" id="telefone" size="15" required/>    

            <label for="celular"> Celular</label>
            <input name="celular" id="celular" size="15" required/> </p>
            <p><label for="email">E-mail</label>
            <input name="email" type="email" id="email" size="50" required/>
                    
          </p>
          <p>
            <label for="endereco">Endereço </label>
            <input name="endereco" type="text" id="endereco" size="50" required/>
          </p>
          <p>
            <label for="cidade">cidade</label>
            <input name="cidade" type="text" id="cidade" size="20" required/>
            <label for="bairro">Bairro</label>
            <input name="bairro" type="text" id="bairro" size="20" required/>
          <P><label for="estado">Estado</label>
            <select name="estado" size="1" id="estado" required>
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
            <input type="text" name="cep" id="cep" required="Digite seu CEP"/></P>
          <p>&nbsp;</p></center>
         
        </div>
        <div class="modal-footer">
          <center><button type="submit" class="btn btn-warning btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
          
            <input  class="btn  btn-primary" type="submit" name="cadastrar" id="cadastrar" value="Efetuar meu Cadastro" onsubmit="validateForm();" />
              
        </form>             
        </div>
      </div>
      
    </div>
  </div> 
</div>>
</div>


  <script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
  
</body>
</html>  
