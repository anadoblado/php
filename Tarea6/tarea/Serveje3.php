<?php
// cargar la librería de SOAP
require_once __DIR__ . '/vendor/autoload.php';
// creamos el nuevo servidor y el WSDL
$server = new nusoap_server();
$namespace = "http://localhost/Tarea6/tarea/Serveje3.php";
$server->configureWSDL("Tarea6/6", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;
//echo 'hola';

$server->register('EuroDolar', array('cantidad'=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"EuroDolar");
$server->register('DolarEuro', array('cantidad'=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"DolarEuro");
$server->register('EuroLibra', array('cantidad'=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"EuroLibra");
$server->register('LibraEuro', array('cantidad'=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"LibraEuro");
$server->register('LibraDolar', array('cantidad'=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"LibraDolar");
$server->register('DolarLibra', array('cantidad'=>"xsd:float"),array("return"=>"xsd:float"),FALSE,FALSE,FALSE,FALSE,"DolarLibra");

function EuroDolar($cantidad){
    $cambio = $cantidad * 1.21;
    return $cambio;
}

function DolarEuro($cantidad){
    $cambio = $cantidad * 0.83;
    return $cambio;
}

function EuroLibra($cantidad){
    $cambio = $cantidad * 0.89;
    return $cambio;
}

function LibraEuro($cantidad){
    $cambio = $cantidad * 1.12;
    return $cambio;
}

function LibraDolar($cantidad){
    $cambio = $cantidad * 1.36;
    return $cambio;
}

function DolarLibra($cantidad){
    $cambio = $cantidad * 0.74;
    return $cambio;
}

$server->service(file_get_contents("php://input"));
?>