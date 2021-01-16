<?php
// cargar la librería de SOAP
require_once __DIR__ . '/vendor/autoload.php';
require_once './conexion.php';

// creamos el nuevo servidor y el WSDL
$server = new nusoap_server();
$namespace = "http://localhost/Tarea6/tarea/Server.php";
$server->configureWSDL("Tarea 6", $namespace);
$server->wsdl->schemaTargenNamespace = $namespace;
//echo 'hola';

/* Registraremos cuales serán las funcionalidades de nuestro 
 * servicio web*register contiene muchos parámetros mas pero 
 * solo nos enfocaremos en los principales:*register(accion, 
 * parametros_entrada, parametros_salida) */

//$server->register('Saludar', array('nombre'=>"xsd:string"),array("return"=>"xsd:string"),FALSE,FALSE,FALSE,FALSE,"Saludar");
//$server->register('ObtenerDatos',array('dni'=>"xsd:string"),array("return"=>"xsd:Array"),FALSE,FALSE,FALSE,"Devuelve array");
//Declararemos las funciones (acciones soap) que utilizara 
//nuestro servicio web
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

$server->register('getPVP', array('codigo' => "xsd:string"), array("return" => "xsd:string"), FALSE, FALSE, FALSE, FALSE, "getPVP");
$server->register('getStock', array('codigo' => "xsd:string", 'cod_tienda' => "xsd:string"), array("return" => "xsd:string"), FALSE, FALSE, FALSE, FALSE, "getStock");
$server->register('getFamilias', array(), array("return" => "xsd:Array"), FALSE, FALSE, FALSE, FALSE, "getFamilias");
$server->register('getProductoFamilia', array('codigo_familia' => "xsd:string"), array("return" => "xsd:Array"), FALSE, FALSE, FALSE, FALSE, "getProductoFamilia");

function getPVP($codigo) {
    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT PVP FROM producto WHERE cod='$codigo'");
        if ($result->rowCount()) {
            $registro = $result->fetchObject();
            $precio = $registro->PVP;
            return $precio;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $ex) {
         $errores[] = $exc->getMessage();
        die('error con la base de datos');
    }
}

function getStock($codigo, $cod_tienda) {
    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT unidades FROM stock WHERE producto='$codigo' and tienda='$cod_tienda'");
        if ($result->rowCount()) {
            $registro = $result->fetchObject();
            $unidades = $registro->unidades;
            return $unidades;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $ex) {
         $errores[] = $exc->getMessage();
        die('error con la base de datos');
    }
}

function getFamilias() {
    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT cod FROM familia");
        $familias=[];
        if ($result->rowCount()) {
            while ($registro = $result->fetchObject()){
                foreach ($registro as $key) {
                    array_push($familias, $key);
                }
            }
            return $familias;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $ex) {
         $errores[] = $exc->getMessage();
        die('error con la base de datos');
    }
}

function getProductoFamilia($codigo_familia) {
    try {
        $conex = new Conexion();
        $result = $conex->query("SELECT cod FROM producto WHERE familia='$codigo_familia'");
        $productos=[];
        if ($result->rowCount()) {
            while ($registro = $result->fetchObject()){
                foreach ($registro as $key) {
                    array_push($productos, $key);
                }
            }
            return $productos;
        }
        unset($result);
        unset($conex);
    } catch (PDOException $ex) {
         $errores[] = $exc->getMessage();
        die('error con la base de datos');
    }
}

//Desplegaremos con $server->service nuestro servicio web
$server->service(file_get_contents("php://input"));
?>