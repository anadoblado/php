<?php

// cargar la librería de SOAP
require_once __DIR__.'/vendor/autoload.php';

// creamos el nuevo servidor y el WSDL
$server=new nusoap_server();
$namespace="http://localhost/WebService/ejemplo1/Server.php";
$server->configureWSDL("Ejemplo 1 Servicios Web",$namespace);
$server->wsdl->schemaTargenNamespace=$namespace;
//echo 'hola';

/*Registraremos cuales serán las funcionalidades de nuestro 
 * servicio web*register contiene muchos parámetros mas pero 
 * solo nos enfocaremos en los principales:*register(accion, 
 * parametros_entrada, parametros_salida)*/
$server->register('Suma',array('a'=>"xsd:int",'b'=>"xsd:int"),array("return"=>"xsd:int"),FALSE,FALSE,FALSE,FALSE,"Suma");
$server->register('Saludar', array('nombre'=>"xsd:string"),array("return"=>"xsd:string"),FALSE,FALSE,FALSE,FALSE,"Saludar");
$server->register('ObtenerDatos',array('dni'=>"xsd:string"),array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,"Devuelve array");

//Declararemos las funciones (acciones soap) que utilizara 
//nuestro servicio web
function Saludar($nombre){    
    return "Hola ".$nombre;
}
function Suma($a,$b){    
    $suma=$a+$b;    
    return $suma;
}
function ObtenerDatos($dni){    
    $arr= array('Ana',"Doblado","NS/NC");
    return ($arr);
}

//Desplegaremos con $server->service nuestro servicio web
$server->service(file_get_contents("php://input"));
?>