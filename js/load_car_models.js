$(document).ready(function(){
 
    // Por Rogerio Coli, www.rcoli.com.br - favor não remover
    jQuery.fn.loadCarModels = function() {
         
        // Objeto que guarda os argumentos
        var args                    = arguments[0] || {};
         
        //id do Select de Modelos
        var idSelectCar         = args.idSelectCar;
         
        // Página que irá criar o JSon
        var paginaPhpModels        = '../models/model_rents_models.ajax.php';
         
        // Conteúdo do elemento span que vai aparecer enquanto carregam as cidades, 
        // pode ser substituído por uma imagem. Coloque a tag completa  
        var carregandoMsg           = 'Aguarde, carregando...' 
         
        // Classe do elemento span que vai aparecer enquanto carregam as cidades
        var carregandoClass         = 'class';
        // após as cidades carregarem aparece esta mensagem
        var jsonPrimeiroElemento    = '(selecione a cidade)';
        // Aqui eu pego a frase do primeiro option de Cidade  
        var primeiroElemento        = $(idSelectCar).find('option:first').html();
         
         
        if( $(this).val() ) {
            // escondendo as cidades até carregarem
           $(idSelectCar).hide();
            // mensagem de espera: carregando
            $(idSelectCar).after('<span class='+ carregandoClass +'>'+carregandoMsg+'</span>');
             
            $.getJSON(paginaPhpModels+'?search=',{id_brand: $(this).val(), ajax: 'true'}, function(j){
                    // É importante que o value seja vazio pra que o formulário não seja enviado vazio
                    // caso use o form validate
                var options = '<option value="">'+jsonPrimeiroElemento+'</option>';    
                for (var i = 0; i < j.length; i++) {
                    // É importante que o value seja vazio pra que o formulário não seja enviado vazio
                    // caso use o form validate
                    options += '<option value="' + j[i].id + '">' + j[i].nome + '</option>';
                } 
                // mostrando as cidades após carregarem e removendo a mensagem de espera
                $(idSelectCidade).html(options).show();
                $(idSelectCidade).next().remove();
            });
        } else {
            $(idSelectCidade).html('<option value="">'+primeiroElemento+'</option>');
        }
         
    };
    //Inciando o SELECT, importante ao recarregar a página
    $("#id_brand option:first").attr('selected','selected');
    // Aqui eu chamo a função e o método que irá carregá-la
    $('#id_brand).change(function(){ $(this).loadCarModels({idSelectcar'#cod_cidades'}); })
});