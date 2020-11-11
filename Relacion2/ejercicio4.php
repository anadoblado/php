<?php

$datos = array ("Nombre" => "Pedro Torres", "Dirección" => "C/ Mayor, 37","Teléfono" => "123456789");
    


foreach ($datos as $index => $valores){
    echo $index." = ".$valores."<br>";
}