<?php

echo "Crea un array asociativo con los siguientes valores:
$estadios_de_futbol=
BarcelonaCamp Nou
Real Madrid 
Valencia  Mestalla
C  Anoeta
Muestra los valores del array en una tabla, has de mostrar el índice y el valor
asociado.
Elimina el estadio asociado al Real Madrid.
Vuelve a mostrar los valores para comprobar que se ha eliminado, pero esta vez en
una lista numerada";

$estadios_de_futbol = array("Barcelona" => "Camp Nou","Real Madrid" => "Santiago Bernabeu",
    "Valencia" => "Mestalla", "Real Sociedad" => "Anoeta" );
echo"<table border = 1>";
foreach ($estadios_de_futbol as $indexFil => $value) {
    echo"<tr>";
    echo"<td>".$indexFil."</td>";
    echo"<td>".$value."</td>";
    echo "</tr>";
}
echo"</table>";

$estadios_de_futbol["Real Madrid"] = "";
echo"<ol>";
foreach ($estadios_de_futbol as $key => $value) {
    echo"<li>".$value."</li>";
}
echo"</ol>";


