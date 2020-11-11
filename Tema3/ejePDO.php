<?php
try {
    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
    $dwes = new PDO('mysql:host=localhost; dbname=futbol; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
    $registro=$dwes->exec("UPDATE jugadores SET Goles=45 WHERE DNI='74916373z'");
    echo $registro;
   // echo $dwes->errorCode();
    $error = $dwes->errorInfo();
    echo $error[2];
} catch (PDOException $exc) {
    echo $exc->getTraceAsString(); // error de php
    echo 'Error:'.$exc ->getMessage(); // error del servidor de bd
}





