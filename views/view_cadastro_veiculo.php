<?php 
  $link = "Venda";
  require_once("/home/u130462423/public_html/models/model_sales.php");
  require_once("/home/u130462423/public_html/controllers/conection.php");
  @session_start();
  if (isset($_SESSION['usuario']) || isset($_COOKIE['usuarioLogado'])) {
      if(isset($_COOKIE['usuarioLogado'])){
      $_SESSION['usuario'] = $_COOKIE['usuarioLogado'];      
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
         <h3><b> <p style="color:#FF8C00;">CADASTRE SEU VEÍCULO E BOA VENDA</p></b></h> 
        </center>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-2">
        <form id="formcadastro" name="formcadastraveic" method="post" action="../models/model_cadastra_carro.php" enctype="multipart/form-data">
                    
             <p>
            <label for="opcionais">Opcionais: </label>            
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
      
              <div class="col-xs-4" align="right">
                <label for="brands">Marca</label>
                  <select name="brands" id="brands" onchange="buscar_marcas()"  required="required"  >
                  <option>Selecione...</option>
                        <?=$html?>      
         
                 </select>
              </div>

              <div class="col-xs-4" align="left" id="load_models">
                <label for="models">Modelo</label>
                <select name="models" id="models" onchange="buscar_veiculos()" required="required" >          
                  <option value="" >Selecione...</option>        
                        
                </select>

              </div>
            </div>  
             
              <div class="col-xs-10 col-xs-offset-2" id="load_models">
                 <br><label for="cor"> Cor</label>
                <input name="cor" id="cor" size="10" type="text" style='text-transform:uppercase' required  /> 
                <label for="preco"> &nbsp;Preço R$</label>
               <input type="text" name="preco" id="preco" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" placeholder="Ex: 99.999,99" required />
                <label for="ano"> &nbsp;Ano</label>
                <input name="ano" type="text" id="ano" size="10" required="required" />                       
              </div>                                  
          
          <div class="row col-xs-12">
            <div class="col-xs-6"><br> 
              <label for="img1">Imagem 1</label>
              <input type="file" name="img1" id="img1" accept="image/*" />        
              <label for="img2">Imagem 2</label>
              <input type="file" name="img2" id="img2" accept="image/*" />
             <label for="img3">Imagem 3</label>
              <input type="file" name="img3" id="img3" accept="image/*" />
             <label for="img4">Imagem 4</label>
              <input type="file" name="img4" id="img4" accept="image/*" />
             <label for="img5">Imagem 5</label>
              <input type="file" name="img5" id="img5" accept="image/*" />
            </div>

            <div class=" row col-xs-6">
            <br>
               <label for="img1">Descrição</label>
               <br>
              <textarea rows="8" cols="50" maxlength="1000" name="descricao" id="descricao"></textarea>              
              <a href="../index.php"><input  class="btn btn-lg btn-warning" type="button" name="cancelar" id="cancelar" value="Cancelar"></a>
              <input  class="btn btn-lg btn-primary" type="submit" name="cadastrar" id="cadastrar" value="Efetuar meu Cadastro" onsubmit="validateForm();" />
            </div>
          </div>              
         
      </div>  
    </div> 
    <br><br>

    <div class="col-xs-9 col-xs-offset-2">
      <p align="justify"><font color="#FF8C00"><b>OBSERVAÇÃO:</b></font> Será incluido automaticamente na descrição do seu veículo o seu<font color="#FF8C00"> e-mail</font>  e seu <font color="#FF8C00">telefone</font> cadastrados pra contato. A CarRent não se respansabiliza por quaisquer negociações realizadas entre você e o comprador do seu veículo. </p>
      <p align="justify">Caso você não concorde com o que foi supramencionado não realize o anuncio. Qualquer dúvida entre em contato conosco <font color="#FF8C00">atendimento@carrent.hol.es</font> <br><br>
      <p align="center">  <input type="checkbox" name="aceito" required value="Y"  id="aceito" /> Aceito que meu e-mail e meu telefone sejam publidados no anuncio.  <br>    
    </div>
  </div><br>
   </form> 


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