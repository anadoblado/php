<?php

$suma = 0;

for ($i = 1; $i <= 100; $i++){
    if ($i % 2 == 0){
        $suma = $suma + $i;
    }
}

echo"La suma de los primeros 100 números pares es: ".$suma;

