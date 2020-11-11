<?php

function crearMatriz($fil, $col){
    $matriz = array();
    for($i = 0; $i < $fil; $i++ ){
        for($j = 0; $j < $col; $j++){
            $matriz[$i][$j] = rand(1, 100);
             //echo"<td>". $matriz[$i][$j]."</td>";
        }
    } 
    return $matriz;
}

function mostrarMatriz($matriz){
   // $matriz = array();     
    echo "<h3>Ver la matriz</h3>";
    echo "<table border ='1'>";
    for($i = 0; $i < count($matriz); $i++ ){
         echo"<tr>";
        for($j = 0; $j < count($matriz[$i]); $j++){
           // $matriz[$i][$j] = rand(1, 100);
             echo"<td>". $matriz[$i][$j]."</td>";
        }
         echo"</tr>";
    }
    echo"</table>"; 
   // return $matriz;
}

function sumarFilas($matriz){
    echo 'Tienes '.$_POST['fil'].' filas'. "<br>";
    for($i = 0; $i < count($matriz); $i++){
        $suma = 0;
        for($j = 0; $j < count($matriz[$i]); $j++){
            $suma += $matriz[$i][$j];  
        }
        $sumaFila[] = $suma;
        //echo 'La suma de la fila'.$i.' es '.$suma. "<br>";
    }
    return $sumaFila;
}

function sumarColumnas($matriz){
    
    for($j = 0; $j < count($matriz[0]); $j++){
        $suma = 0;
        for($i = 0; $i < count($matriz); $i++){
            $suma += $matriz[$i][$j];  
        }
        $sumaColumna[] = $suma;
        //echo 'La suma de la columna'.$i.' es '.$suma. "<br>";
    }
    return $sumaColumna;
}

function sumaTotal($matriz){
    $suma = 0;
    for($i = 0; $i < count($matriz); $i++){
        for($j = 0; $j < count($matriz); $j++){
             $suma += $matriz[$i][$j];
        }
    }
    return $suma;
}

function sumarDiagonal($matriz){
    $suma = 0;
    for($i = 0, $j = 0; $i < count($matriz),$j < count($matriz); $i++,  $j++){    
         $suma += $matriz[$i][$j];
    }
    return $suma;
}

function mostrarTraspuesta($matriz){
    echo "<table border ='1'>";
    
    foreach ($matriz as $valor){
       echo"<tr>";
        foreach ($valor as $num){
            echo"<td>".$num."</td>";
        }
        echo"</tr>";
    }
    echo"</table>";
    //return $matrizTraspuesta;
}

function crearMatrizTraspuesta($matriz){
   // $matrizTraspuesta = array();
    for($i = 0; $i < count($matriz); $i++ ){
        for($j = 0; $j < count($matriz[$i]); $j++){
            $matrizTraspuesta [$j][$i] = $matriz[$i][$j];
        }
    }
    return $matrizTraspuesta;
}