<?php
header( 'Cache-Control: no-cache' );
header( 'Content-type: application/xml; charset="utf-8"', true );
require_once("/home/u130462423/public_html/controllers/conection.php");

 
$brand = mysqli_real_escape_string($conexao trim($_REQUEST['brands'] ));
$sql = "SELECT id FROM brands WHERE name = '$brand' " ;
$id_brand = mysqli_query($conexao $sql);
 
$sql = "SELECT id, name
        FROM car_models
        WHERE id_brand=$id_brand
        ORDER BY name";
$res = mysqli_query( $sql );
while ( $row = mysqli_fetch_assoc( $res ) ) {
    $car_models[] = array(
        'id_model'   => $row['id_model'],
        'name'          => htmlentities($row['name']),
    );
}
 
echo( json_encode( $car_models ) );	

