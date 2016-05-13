<?php
include("view_header.php"); 

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
         <h3><b> <p style="color:#FF8C00;">EFETUE SEU CADASTRO E TENHA ACESSO TOTAL</p></b></h> 
        </center>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-2">
        <form id="formcadastro" name="formcadastro" method="post" action="../models/model_cadastra_cliente.php">
         <p>
            <label for="usuario">Nome de Usuário</label>
            <input name="usuario" type="text" id="usuario" size="20" maxlength="10" pattern="[a-zA-Z0-9]+$" placeholder="Letras e/ou Números" required />
           <label for="senha">Senha</label>
            <input name="senha" type="password" id="senha" size="20" required/>
           <label for="confirmasenha">Confirme sua Senha</label>
            <input name="confirmasenha" type="password" id="confirmasenha" size="20" required/>
         </p>
          <p>
            <label for="nome">Nome Completo</label>
            <input name="nome" type="text" id="nome" size="50" required/>
            <label for="rg">RG</label>
            <input name="rg" type="" id="rg" size="45" required />
            <p>
              <label for="cpf">CPF</label>
              <input name="cpf" type="text" id="cpf" size="45" required/>
              <label for="telefone">Telefone</label>
            <input name="telefone" type="text" id="telefone" size="45" required/>                 
          <p>
            <label for="celular"> Celular</label>
            <input name="celular" id="celular" size="45"/> 
            <label for="email">E-mail</label>
            <input name="email" type="email" id="email" size="50" required/>
                    
          </p>
          <p>
            <label for="endereco">Endereço </label>
            <input name="endereco" type="text" id="endereco" size="100" required/>
          </p>
          <p>
            <label for="cidade">cidade</label>
            <input name="cidade" type="text" id="cidade" size="45" required/>
            <label for="bairro">Bairro</label>
            <input name="bairro" type="text" id="bairro" size="58" required/>
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
          <p>&nbsp;</p>
          <p>
            <center><a href="../index.php"><input  class="btn btn-lg btn-warning" type="button" name="cancelar" id="cancelar" value="Cancelar"></a>
            <input  class="btn btn-lg btn-primary" type="submit" name="cadastrar" id="cadastrar" value="Efetuar meu Cadastro" onsubmit="validateForm();" />
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