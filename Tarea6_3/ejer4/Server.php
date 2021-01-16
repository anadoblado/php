<?php
// cargar la librería de SOAP
require_once __DIR__ . '/vendor/autoload.php';
// creamos el nuevo servidor y el WSDL
$server = new nusoap_server();
$namespace = "http://localhost/Tarea6_4/ejer4/Server.php";
$server->configureWSDL("Tarea", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;
echo 'hola';

/* Registraremos cuales serán las funcionalidades de nuestro 
 * servicio web*register contiene muchos parámetros mas pero 
 * solo nos enfocaremos en los principales:*register(accion, 
 * parametros_entrada, parametros_salida) */

$server->register('mano', array('cantidad'=>"xsd:int"),array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,FALSE,"mano");


function mano($cantidad) {
           $numero = array(1, 2, 3, 4, 5, 6, 7, 'Sota', 'Caballo', 'Rey');
        $palo = array("Oros", "Copas", "Espadas", "Bastos");
    for ($i = 1; $i <= $cantidad; $i++) {
        $numeroAle[] = $numero[array_rand($numero)];
        $paloAle[] = $palo[array_rand($palo)];
        $cartas = array_merge($numeroAle, $paloAle);
        print_r($cartas);
        $mano = array_push($array);
    }
    return $mano;
}

$server->service(file_get_contents("php://input"));
?>
