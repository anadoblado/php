<?php

$opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4");
$dwes = new PDO("mysql:host=localhost;dbname=tarea6", "dwes", "abc123.", $opciones);

if ($_GET['tabla'] = "familia") {
    $result = $dwes->query("SELECT * FROM familia");
    while ($obj = $result->fetchObject()) {
        $codigos[] = $obj->cod;
    }
    $json = json_encode($codigos);
    echo $json;
}



