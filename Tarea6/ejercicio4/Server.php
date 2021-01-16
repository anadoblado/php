<?php
require_once __DIR__ . '/vendor/autoload.php';
$server = new nusoap_server();
$namespace = "http://localhost/Tarea6/ejercicio4/Server.php";
$server->configureWSDL("Tarea6/6", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;

$server->service(file_get_contents("php://input"));
?>

