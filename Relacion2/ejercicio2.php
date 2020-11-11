<?php

    for($i = 1; $i < 11; $i++){
        $array[$i] = $i*2;
    }
    
    foreach ($array as $index => $valor){
        echo "El array tiene en la posición ".$index." el valor ".$valor."<br>";
    }
    
    
    echo "<br>De forma inversa<br>";
    
    arsort($array);
     foreach ($array as $index => $valor){
        echo "El array tiene en la posición ".$index." el valor ".$valor."<br>";
    }
    
    
        
        

