<?php

require_once __DIR__ . '/vendor/autoload.php';


//Especificamos el wsdl que utilizaremos en nuestro 
//servicio web.
$wsdl="http://localhost/Tarea6/tarea/Server.php?wsdl";

//Instanciamos un cliente nativo de la clase de PHP 
//con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);


$respuestaGetPVP = $client->call('getPVP', array('codigo'=>"3DSNG"));
echo $respuestaGetPVP . '<br>';


$respuestaGetStock = $client->call('getStock', array('codigo'=>"3DSNG", 'cod_tienda' => "1"));
echo $respuestaGetStock;
echo '<br>';

$respuestaGetFamilias = $client->call('getFamilias', array());
echo 'Familias: ';
print_r($respuestaGetFamilias);
echo '<br>';
//foreach ($respuestaGetFamilias as $value) {
//    echo $value;
//}


$respuestaGetProductoFamilia = $client->call('getProductoFamilia', array('codigo_familia'=>"CONSOL"));
//foreach ($respuestaGetProductoFamilia as $value) {
//    echo $value;
//}
echo 'Productos de la misma familia: ';
print_r($respuestaGetProductoFamilia);
echo '<br>';

?>

