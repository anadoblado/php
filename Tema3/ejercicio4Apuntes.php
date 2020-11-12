<?php
try{
 $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
 $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
 
 
 //$consulta = $conex->exec($statement); 
  //echo $consulta;
   // echo $dwes->errorCode();
    $error = $conex->errorInfo();
    echo $error[2];
} catch (PDOException $exc){
    echo $exc->getTraceAsString(); // error de php
    echo 'Error:'.$exc ->getMessage(); // error del servidor de bd
}

$ok = true;
 $conex->beginTransaction();
 if($conex->exec("UPDATE stock SET unidades=1 WHERE tienda=1 and producto='PAPYRE62GB'") === 0){
     $ok = false;
     echo 'transaccion 1';
 }else{
       echo 'transaccion else 1';
 }
 if($conex->exec("UPDATE stock SET unidades=1 WHERE tienda=3 and producto='PAPYRE62GB'") === 0){
     $ok = false;
     echo 'transaccion 1';
 }else{
       echo 'transaccion else 2';
 }
 if($conex->exec('INSERT INTO stock VALUES("PAPYRE62GB", 2, 2)') === 0){
     $ok = false;
       echo 'transaccion 99';
 } else {
       echo 'transaccion else 3';
}
 
 if ($ok){
   $conex->commit ();  // si todo va bien, confirma los cambios
   echo 'Operación realizada';
 } else {
    $conex->rollBack(); // si hay algún error, los revierte
 }
 

