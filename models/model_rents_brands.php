<?php
#chama o arquivo de configuração com o banco
require_once("/home/u130462423/public_html/controllers/conection.php");

#seleciona os dados das tabela brands, car_models e cars

$sql = "SELECT id, name FROM brands";
$query_brands = mysqli_query($conexao, $sql);