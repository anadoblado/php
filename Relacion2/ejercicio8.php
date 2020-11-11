<?php

echo "Rellena un array de 10 enteros, con los 10 primeros números naturales.
    Calcula la media de los que están en posiciones pares
    y muestra los impares por pantalla"."<br>";
echo "<br>";

for ($i = 1; $i <= 10; $i++){
    $array[$i] = $i;
}

$suma = 0;
$media = 0;
foreach ($array as $index => $valores){
    //echo "valores ".$valores."<br>"; 
    if($index % 2 == 0){
        $suma = $suma + $valores;
        $denominador = count($array);
    }
    else{
        echo "Los impares son: ".$valores."<br>";
    }
}
$media = $suma / ($denominador/2);
echo "La media es: ".$media;



