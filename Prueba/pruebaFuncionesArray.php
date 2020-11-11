<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$array = array(1, 2, 3, 4, 5);

foreach ($array as $index => $valor){
    echo "El valor de la posición ".$index." es ".$valor."<br>";
}
echo reset($array)."<br>";
echo end($array)."<br>";
//echo next($array);
//echo prev($array);

while ($valor = each($array)){
   print "El valor del índice ".$valor[1]." es ".$valor[0]."<br />";
}

if($array[0]){
    echo next($array);
}