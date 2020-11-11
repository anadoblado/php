<?php

$datos = array (
    "persona1" => array("Nombre" => "Pedro Torres", "Dirección" => "C/ Mayor, 37","Teléfono" => "123456789"),
    "persona2" => array("Nombre" => "Juan Pérez", "Dirección" => "c/ Mayor, 56", "Teléfono" => "12345676"));

echo "<table border = 1 cellspacing = 1>";
echo "<tr><th></th><th>Nombre</th><th>Dirección</th><th>Teléfono</th></tr>";
foreach ($datos as $indFila => $fila){
    echo "<tr>";
    echo "<td>".$indFila."</td>";
    foreach ($fila as $indCol => $num){
        echo"<td>".$num."</td>\n";
    }
    echo"<\tr>\n";
}
echo "</table>";

 