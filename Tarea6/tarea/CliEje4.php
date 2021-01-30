<?php

require_once __DIR__ . '/vendor/autoload.php';

$wsdl = "http://localhost/Tarea6/tarea/Serveje4.php?wsdl";
//http://localhost/Tarea6/tarea/Serveje4.php
//Instanciamos un cliente nativo de la clase de PHP 
//con el $wsdl especificado anteriormente.
$client = new nusoap_client($wsdl);

$respuesta = $client->call('mano', array('cantidad' => 2));
//echo('<pre>');
//var_dump($respuesta);
//echo('</pre>');

print_r($respuesta);

//foreach ($respuesta as $value) {
//    echo $value;
//}

//for($i = 0; $i <= 1; $i++){
//    echo $respuesta[$i]. "\n";
//}
?>

//<?php
//$entrada = array("Neo", "Morpheus", "Trinity", "Cypher", "Tank");
//$claves_aleatorias = array_rand($entrada, 2);
//echo $entrada[$claves_aleatorias[0]] . "\n";
//echo $entrada[$claves_aleatorias[1]] . "\n";
//?>


