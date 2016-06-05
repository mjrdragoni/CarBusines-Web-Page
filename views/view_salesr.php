<?php
  $link = "Venda";
  require_once("/home/u130462423/public_html/models/model_sales.php");
  require_once("/home/u130462423/public_html/controllers/conection.php");
  
 
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
 

  <!-- adicionar  Curtir e  compartilhar do facebook-->
  <script src="http://connect.facebook.net/pt_BR/all.js#xfbml=1"></script>
  <script src="http://static.ak.fbcdn.net/connect.php/js/FB.Share" type="text/javascript"></script>
  <style>
    .carousel-inner > .item > img {
    position-relative;
    min-width: 100%;
    height: 300px; /* Altura da imagem dentro do Carousel */
}
  </style>
</head>

<body>
<div class="container-fluid">
  <center>
   <h3> <b><p style="color:#FF8C00;">DEFINA AS CARACTERÍSTICAS DO VEÍCULO QUE DESEJA COMPRAR</h1>
  </center>
  <br>
  <center><form id="formsales" name="formrsales" method="POST" action="">
    <p>
      <label>
        <input type="checkbox" name="airconditioning" value="Y" id="airconditioning" />
        Ar-Condicionado
      </label>
       <label>
         <input type="checkbox" name="powersteering" value="Y" id="powersteering" />
         Direção Hidráulica
       </label>
       <label>
         <input type="checkbox" name="powerwindows" value="Y" id="powerwindows" />
         Vidro-Elétrico
       </label>
      <label>
         <input type="checkbox" name="automaticexchange" value="Y" id="automaticexchange" />
         Câmbio-Automático
      </label>
      <label>
        <input type="checkbox" name="airbag" value="Y" id="airbag" />
        Airbag</label>
    </p>
    <div class="col-xs-12">  
      
      <div class="col-xs-6" align="right">
        <label for="brands">Marca</label>
          <select name="brands" id="brands" onchange="buscar_marcas()"  >
          <option>Selecione...</option>
                <?=$html?>      
 
         </select>
      </div>

      <div class="col-xs-6" id="load_models" align="left">
        <label for="models">Modelo</label>
        <select name="models" id="models" onchange="buscar_veiculos()">          
          <option value="" >Selecione...</option>        
                
        </select>
      </div>
    </div>
    </p> 
   <br><br> <center> <label for="order">Ordenar por: </label> <select name="order" id="order">
              <option value="price ASC">Selecione...</option>
              <option value="price DESC">Maior Preço</option>
              <option value="price ASC">Menor Preço</option>
              <option value="color ASC">Cor</option>
              <option value="year ASC">Ano</option>            

     </select></center> 
    <br><center><input  class="btn btn-lg btn-primary" type="submit"  name="buscar" id="buscar" onclick="document.formrsales.action='../models/model_sales_busca.php'; document.form1.submit();"  value="Encontrar Veículos"/>  <input  class="btn btn-lg btn-warning" name="buscardecliente" type="submit" id="buscardecliente"   onclick="document.formrsales.action='../models/model_sales_customer_busca.php'; document.formrsales.submit();"  value="Veículos Anunciados por Clientes"/></center>
  </form>
  </center>  

     <br>

   
    

         <div class="row">
          <div class="col-xs-8 col-xs-offset-2">               
    
            <?=$showhtm?>       
          </div>
        </div> 

     <?=$htmlmodal?>


    <div class="modal fade col-xs-12" id="carry_resgistration" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 30px; padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Efetue seu Cadastro e/ou Faça Logon</h4>
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
            <input name="nome" type="text" id="nome" size="40" required/></p>
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
         <center><a href="/views/view_solicita_alterar_senha.php"><font color="#FF8C00">Clique aqui</font></a> caso tenha esquecido sua senha.</center>
        </div>
        <div class="modal-footer" background-color: #f9f9f9;>
          <center><button type="submit" class="btn btn-warning btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
          
            <input  class="btn  btn-primary" type="submit" name="cadastrar" id="cadastrar" value="Efetuar meu Cadastro" onsubmit="validateForm();" />
              
        </form>             
        </div>
      </div>
    </div>  
 
</div>
</div><br>
   
   <?php
      include('view_footer.html');
  ?>

  
    <script type="text/javascript">

    function buscar_marcas(){
        var id = $('#brands').val();  //codigo do estado escolhido
        //se encontrou o estado
        if(id){
          var url = '../controllers/reload_brands.php?id='+id;  //caminho do arquivo php que irá buscar as cidades no BD
          $.get(url, function(dataReturn) {
            $('#load_models').html(dataReturn);  //coloco na div o retorno da requisicao
          });
        }
      }

  </script> 
 
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.3/jquery.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../js/jquery.maskedinput.min.js"></script>
  <script type="text/javascript" src="../js/jquery.validate.min.js"></script>
 
</body>
</html>  
