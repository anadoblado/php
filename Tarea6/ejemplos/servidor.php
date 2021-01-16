<?php

$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4");
$dwes = new PDO("mysql:host=localhost;dbname=tarea6", "dwes", "abc123.", $opciones);

if (isset($_GET['tabla'])) {
    if ($_GET['tabla'] = "familia") {
        $result = $dwes->query("SELECT * FROM familia");
        while ($obj = $result->fetchObject()) {
            $codigos[] = $obj->cod;
        }
        $json = json_encode($codigos);
        echo $json;
    }
    if ($_GET['tabla'] = "producto") {
        $result = $dwes->query("SELECT * FROM producto");
        while ($obj = $result->fetchObject()) {
            $codigos[] = $obj->cod;
        }
        $json = json_encode($codigos);
        echo $json;
    } 
    if($_GET['tabla'] = "stock") {
        $result = $dwes->query("SELECT * FROM stock");
        while ($obj = $result->fetchObject()) {
            $codigos[] = $obj->producto;
        }
        $json = json_encode($codigos);
        echo $json;
    } 
}else{
    $result = $dwes->query("SELECT * FROM tienda");
        while ($obj = $result->fetchObject()) {
            $codigos[] = $obj->nombre;
        }
        $json = json_encode($codigos);
        echo $json;
}





