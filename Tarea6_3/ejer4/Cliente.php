<?php
require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro 
//servicio web.
$wsdl="http://localhost/Tarea6_3/ejer4/Server.php?wsdl";
//Instanciamos un cliente nativo de la clase de PHP 
//con el $wsdl especificado anteriormente.
$client=new nusoap_client($wsdl);

$respuesta = $client->call('mano', array('cantidad'=>'1'));
print_r($respuesta);
echo 'holaaaaaaaaaa';

