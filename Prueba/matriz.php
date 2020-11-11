<?php


/*
 * $num = 1;
for ($fila = 0; $fila < 3; $fila++){
    for ($columna = 0; $columna < 3; $columna++){
        $matriz[$fila][$columna]=num;
        $num ++;
    }
    
}
*/

//$matriz2 = array("Fil1" =>1, ...);

$matriz["fila1"]["columna1"] = 1;
$matriz["fila1"]["columna2"] = 2;
$matriz["fila1"]["columna3"] = 3;
$matriz["fila2"]["columna1"] = 4;
$matriz["fila2"]["columna2"] = 5;
$matriz["fila2"]["columna3"] = 6;
$matriz["fila3"]["columna1"] = 7;
$matriz["fila3"]["columna2"] = 8;
$matriz["fila3"]["columna3"] = 9;

/*
foreach ($matriz as $index => $valor){
    echo "En la fila ".$index." columna ".$index2." está el valor ".$valor;

}
 * 
 */
//Mostrar matriz en forma de tabla
echo "<table border = 1 cellspacing = 1>";
foreach ($matriz as $indFila => $fila){
    echo "<tr>\n";
    foreach ($fila as $indCol => $num){
        echo"<td>".$num."</td>\n";
    }
    echo"</tr>\n";
}
echo "</table>";
 
/*
 * Imprimir la matriz con los índices
 * 
foreach ($matriz as $indFila => $fila){
    foreach ($fila as $indCol => $num){
        echo "En la fila ".$indFila." y coluna ".$indCol." está el valor ".$num."<br>";
    }
}
 * 
 */
 

//print_r($matriz);