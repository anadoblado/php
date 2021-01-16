<?php

require_once __DIR__ . '/vendor/autoload.php';

$wsdl = "http://localhost/Tarea6/tarea/Serveje4.php?wsdl";
//http://localhost/Tarea6/tarea/Serveje4.php
//Instanciamos un cliente nativo de la clase de PHP 
//con el $wsdl especificado anteriormente.
$client = new nusoap_client($wsdl);

$respuesta = $client->call('mano', array('cantidad' => '1'));
print_r($respuesta);
foreach ($respuesta as $value) {
    echo $value;
}
?>

