<?php
#chama o arquivo de configuração com o banco
require_once("/home/u130462423/public_html/controllers/conection.php");

$sql = "SELECT id, name FROM brands";
$query_brands = mysqli_query($conexao, $sql);

while($result = mysqli_fetch_array($query_brands)) { 
    $html .= '<option value="'.$result['id'].'">'.$result['name'].'</opton>';
}

@mysqli_close($conexao);
