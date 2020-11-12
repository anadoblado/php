<?php

try{
 $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
 $conex = new PDO('mysql:host=localhost; dbname=futbol; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
 
  //$consulta = $conex->exec($statement); 
  //echo $consulta;
   // echo $dwes->errorCode();
    $error = $conex->errorInfo();
    echo $error[2];
    
// $result = $conex->query("SELECT * FROM jugadores");
// while($obj=$result->fetchObject()){
//     echo 'Nombre: '.$obj->Nombre.'<br>';
// }
 
    $result=$conex->prepare("SELECT * FROM jugadores WHERE Dorsal=?");
   
    $dorsal = 2;
    $result->bindParam(1, $dorsal); // se le pasa en el segundo una variable, una dirección de memoria
    $result->execute(); // cuando se ejecuta guarda los resultados en ese $result
    print_r ($result->errorInfo());
     while($obj=$result->fetchObject()){
     echo 'Nombre: '.$obj->Nombre.'<br>';
 }
    
 

} catch (PDOException $exc){
    echo $exc->getTraceAsString(); // error de php
    echo 'Error:'.$exc ->getMessage(); // error del servidor de bd
}

