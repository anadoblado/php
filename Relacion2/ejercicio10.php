<?php

echo"Implementa un array asociativo con los siguientes valores y ordénalo de menor a
mayor. Muestra los valores en una tabla.
numeros=array(3,2,8,123,5,1);";

$numeros = array(1 => 3, 2 => 2,3 => 8,4 => 123,5 => 5,6 => 1);

echo"<table border = 1>";
foreach ($numeros as $key => $value) {
    echo"<tr>";
    echo"<td>".$key."</td>";
    echo"<td>".$value."</td>";
    echo"</tr>";
}
echo "</table>";

sort($numeros);
echo"<br>";
echo"Array ordenado";
echo"<table border = 1>";
foreach ($numeros as $key => $value) {
    echo"<tr>";
    echo"<td>".$key."</td>";
    echo"<td>".$value."</td>";
    echo"</tr>";
}
echo "</table>";
