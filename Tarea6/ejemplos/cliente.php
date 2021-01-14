<?php

$json = file_get_contents("http://localhost/Tarea6/ejemplos/servidor.php");
$datos = json_decode($json);
print_r($datos);

