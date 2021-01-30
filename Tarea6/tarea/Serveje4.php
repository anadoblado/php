<?php
echo PHP_VERSION;
require_once __DIR__ . '/vendor/autoload.php';
$server = new nusoap_server();
$namespace = "http://localhost/Tarea6/tarea/Serveje4.php";
$server->configureWSDL("Tarea 6", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;

//$server->register('Saludar', array('nombre'=>"xsd:string"),array("return"=>"xsd:string"),FALSE,FALSE,FALSE,FALSE,"Saludar");
//$server->register('ObtenerDatos',array('dni'=>"xsd:string"),array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,"Devuelve array");
////Declararemos las funciones (acciones soap) que utilizara 
////nuestro servicio web
//function Saludar($nombre){    
//    return "Hola ".$nombre;
//}
//function Suma($a,$b){    
//    $suma=$a+$b;    
//    return $suma;
//}
//function ObtenerDatos($dni){    
//    $arr= array('Ana',"Doblado","NS/NC");
//    return ($arr);
//}

$server->register('mano', array('cantidad' => "xsd:int"), array("return" => "xsd:Array"), FALSE, FALSE, FALSE, FALSE, "mano");

function mano($cantidad) {
    $numero = array(1, 2, 3, 4, 5, 6, 7, 'Sota', 'Caballo', 'Rey');
    $palo = array("Oros", "Copas", "Espadas", "Bastos");
    for ($i = 1; $i <= $cantidad; $i++) {
        $numeroAle[$i] = $numero[array_rand($numero)];
        $paloAle[$i] = $palo[array_rand($palo)];
        $cartas = array_merge($numeroAle, $paloAle);
        //print_r($cartas);
        $mano[$i]=$cartas;
        //array_push($mano, $cartas);
    }
//    $numAle = $numero[array_rand($numero, $cantidad)];
//    $palAle = $palo[array_rand($palo, $cantidad)];
//    $cartas = array_merge_recursive($numAle,$palAle);
//    $mano[] = $cartas;
  
    return $mano;
}

//Desplegaremos con $server->service nuestro servicio web
$server->service(file_get_contents("php://input"));
?>

