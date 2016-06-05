<?php 
 
  require_once("/home/u130462423/public_html/models/model_sales.php");
  require_once("/home/u130462423/public_html/models/model_altera_customer_car1.php");
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
         <h3><b> <p style="color:#FF8C00;">ATUALIZE O SEU ANÚNCIO E BOA VENDA</p></b></h> 
        </center>
        <p>&nbsp;</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-10 col-md-offset-2">
        <form id="formcadastro" name="formcadastraveic" method="post" action="../models/model_altera_customer_car.php?idcar=<?=$id_car?>" enctype="multipart/form-data">
                    
             <p>
            <label for="opcionais">Opcionais: </label>            
            <label> <?php if ($airconditioning == "Y"){$checkbox = "checked";} else {$checkbox = "";} ?>
              <input type="checkbox" <?=$checkbox?> name="airconditioning" value="Y" id="airconditioning" />
              Ar-Condicionado
            </label>
             <label> <?php if ($powersteering == "Y"){$checkbox = "checked";} else {$checkbox = "";} ?>
               <input type="checkbox"  <?=$checkbox?> name="powersteering" value="Y" id="powersteering" />
               Direção Hidráulica
             </label>
             <label> <?php  if ($powerwindows == "Y"){$checkbox = "checked";} else {$checkbox = "";} ?>
               <input type="checkbox"  <?=$checkbox?> name="powerwindows" value="Y" id="powerwindows" />
               Vidro-Elétrico
             </label>
            <label> <?php  if ($automaticexchange == "Y"){$checkbox = "checked";} else {$checkbox = "";} ?>
               <input type="checkbox" <?=$checkbox?> name="automaticexchange" value="Y" id="automaticexchange" />
               Câmbio-Automático
            </label>
            <label> <?php  if ($airbag == "Y"){$checkbox = "checked";} else {$checkbox = "";} ?>
              <input type="checkbox"  <?=$checkbox?> name="airbag" value="Y" id="airbag" />
              Airbag</label>
          </p>
            
            <div class="col-xs-12">
                &nbsp; &nbsp; &nbsp; &nbsp; <font color="#FF8C00;">Por favor, confirme a marca e o modelo de seu Veículo, caso contrário a atualização falhará  </font><br> <br>    
              <div class="col-xs-4" align="right">
                <label for="brands">Marca</label>
                  <select name="brands" id="brands" onchange="buscar_marcas()" required="required">
                   <option placeholder="Selecione..."></option>
                        <?=$html?>      
         
                 </select>
              </div>

              <div class="col-xs-4" align="left" id="load_models">
                <label for="models">Modelo</label>
                <select name="models" id="models" onchange="buscar_veiculos()" required="requireded">          
                 <option placeholder="Selecione...">...Selecione uma Marca</option>  
                        
                </select>

              </div>
            </div>  
             
              <div class="col-xs-10 col-xs-offset-2" id="load_models">
                <br><label for="cor"> Cor</label>
                <input name="cor" id="cor" size="10" value="<?=$cor?>" style='text-transform:uppercase' required/> 
                <label for="preco"> &nbsp;Preço R$</label>
                <input type="text" id="preco" name="preco" value="<?php echo number_format($preco,2,",",".") ?>" pattern="([0-9]{1,3}\.)?[0-9]{1,3},[0-9]{2}$" required />
                <label for="ano"> &nbsp;Ano</label>
                <input name="ano" type="text" id="ano" size="10" value="<?=$ano?>" required/>                     
              </div>                                  
          
          <div class="row col-xs-12">
            <div class="col-xs-6"><br> 
               <a href="#alterimg1" data-toggle="modal"><img src="<?=$imagem1?>" width="125" height="100" /></a>
              <a href="#alterimg2"  data-toggle="modal"><img src="<?=$imagem2?>" width="125" height="100" /></a>
              <a href="#alterimg3"  data-toggle="modal"><img src="<?=$imagem3?>" width="125" height="100" /></a><br>
               <center>Clique na Imagem que Deseja Alterar</center>
              <a href="#alterimg4"  data-toggle="modal"><img src="<?=$imagem4?>" width="125" height="100" /></a>
              <a href="#alterimg5"  data-toggle="modal"><img src="<?=$imagem5?>" width="125" height="100" /></a><br>           

            </div>

            <div class=" row col-xs-6">
            <br>
               <label for="img1">Descrição</label>
               <br>
              <textarea rows="8" cols="50" maxlength="1000" name="descricao" id="descricao"><?=$descr?></textarea> 
            <a href="javascript:window.history.go(-1)"> <input  class="btn btn-lg btn-warning" type="button" name="cancelar" id="cancelar" value="Cancelar"></a>
              <input  class="btn btn-lg btn-primary" type="submit" name="alterar" id="alterar" value="Salvar Alterações" onsubmit="validateForm();" />
            </div>
          </div>             
              
           
      </div>  
    </div>
    
    </form> 
     <form id="formcadastro" name="formcadastraveic" method="post" action="../models/model_altera_car_image1.php?idcar=<?=$id_car?>" enctype="multipart/form-data">
  <div class="modal fade col-xs-12" id="alterimg1" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 20px; padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-edit"></span> Escolha uma nova imagem!
        </div>
        <div class="modal-body">
             <center>
             <input type="file" name="img1" id="img1" accept="image/*"> <br>    
             <button type="button" class="btn btn-warning  btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
             <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-edit"></span> Salvar</button>
          
        </div>        
      </div> 
    </div>
  </div>
  </form>

    <form id="formcadastro" name="formcadastraveic" method="post" action="../models/model_altera_car_image2.php?idcar=<?=$id_car?>" enctype="multipart/form-data">
    <div class="modal fade col-xs-12" id="alterimg2" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 20px; padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-edit"></span> Escolha uma nova imagem!
        </div>
        <div class="modal-body">
             <center>
             <input type="file" name="img2" id="img2" value="<?=$imagem2?>" accept="image/*" /> <br> 
             <button type="button" class="btn btn-warning btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>   
             <button type="submit" class="btn  btn-primary"><span class="glyphicon glyphicon-edit"></span> Salvar</button>          
             
        </div>        
      </div> 
    </div>
  </div>
  </form>

    <form id="formcadastro" name="formcadastraveic" method="post" action="../models/model_altera_car_image3.php?idcar=<?=$id_car?>" enctype="multipart/form-data">
    <div class="modal fade col-xs-12" id="alterimg3" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 20px; padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-edit"></span> Escolha uma nova imagem!
        </div>
        <div class="modal-body">
             <center>
             <input type="file" name="img3" id="img3" value="<?=$imagem3?>" accept="image/*"  />  <br> 
             <button type="button" class="btn  btn-warning btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>  
             <button type="submit" class="btn  btn-primary"><span class="glyphicon glyphicon-edit"></span> Salvar</button>          
        </div>        
      </div> 
    </div>
  </div>
  </form>

    <form id="formcadastro" name="formcadastraveic" method="post" action="../models/model_altera_car_image4.php?idcar=<?=$id_car?>" enctype="multipart/form-data">
    <div class="modal fade col-xs-12" id="alterimg4" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 20px; padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-edit"></span> Escolha uma nova imagem!
        </div>
        <div class="modal-body">
             <center>
             <input type="file" name="img4" id="img4" value="peido" ccept="image/*" />  <br>
             <button type="button" class="btn btn-warning  btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>   
             <button type="submit" class="btn  btn-primary" ><span class="glyphicon glyphicon-edit"></span> Salvar</button>        
            
        </div>        
      </div> 
    </div>
  </div>
  </form>

    <form id="formcadastro" name="formcadastraveic" method="post" action="../models/model_altera_car_image5.php?idcar=<?=$id_car?>" enctype="multipart/form-data">
    <div class="modal fade col-xs-12" id="alterimg5" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style=" background-color: #1d81b3;
                                          color:#FF8C00 !important;
                                          text-align: center;
                                          font-size: 20px; padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <span class="glyphicon glyphicon-edit"></span> Escolha uma nova imagem!
        </div>
        <div class="modal-body">
             <center>
             <input type="file" name="img5" id="img5" accept="image/*" />   <br> 
             <button type="button" class="btn btn-warning btn-primary" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancelar</button>
             <button type="submit" class="btn  btn-primary"><span class="glyphicon glyphicon-edit"></span> Salvar</button>
          
            
        </div>        
      </div> 
    </div>
  </div>    
    </form>
  </div>  
  

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