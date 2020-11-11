<?php

$suma = 0;

for($i = 1; $i <= 100; $i++){
    $suma = $suma + pow($i, 2);
}

echo "La suma de los cuadrados de los 100 primeros números es: ". $suma;
