<?php

// creo el array 1
for ($i = 0; $i < 4; $i++){
    $array1[$i] = rand(0, 10);
}
// lo imprimo para ver que está bien
foreach ($array1 as $key => $value) {
    echo"índice: ".$key." con valor: ".$value."<br>";
}
echo "<br>";
// creo el array 2
for ($i = 0; $i < 4; $i++){
    $array2[$i] = rand(0, 10);
}
// imprimo para comprobar
foreach ($array2 as $key => $value) {
    echo"índice: ".$key." con valor: ".$value."<br>";
}

// los uno usando array_merge, y ese nuevo se guarda en $resultado
$resultado = array_merge($array1, $array2);
echo"<br>";
echo"<h2>Array fusionado con merge</h2>";
// imprimo el fusionado
foreach ($resultado as $key => $value) {
     echo"índice: ".$key." con valor: ".$value."<br>";
}
echo"<br>";
echo"<h3>Array fusionado con merge ordenado con sort</h3>";
sort($resultado); // con sort se ordena y con el foreach lo recorro para verlo
foreach ($resultado as $key => $value) {
     echo"índice: ".$key." con valor: ".$value."<br>";
}
// en este bloque se ordena con el método burbuja con un for
echo"<br>";
echo"<h3>Array fusionado con merge ordenado de forma manual</h3>";
$num = sizeof($resultado);
for ($i = 0; $i < $resultado.sizeof($resultado); $i++){
    if($resultado[$i] > $resultado[$i - 1]){
        $aux = $resultado[$i];
        $resultado[$i] = $resultado[$i - 1];
        $resultado[$i - 1] = $aux;
    }
}
foreach ($resultado as $key => $value) {
    echo"índice: ".$key." con valor: ".$value."<br>";
}

// en este bucle se va a fusionar a mano, hago un array3 vacío y lo relleno
// con los valores de los otros dos
echo"<br>";
echo"<h2>Array fusionado a mano</h2>";
$array3 = [];
for ($i = 0; $i < 8; $i++){
    if($i < 4){
        $array3[$i] = $array1[$i];
    }else{
        $array3[$i] = $array2[$i - 4];
    }  
}
// recorro para imprimir
foreach ($array3 as $key => $value) {
    echo"índice: ".$key." con valor: ".$value."<br>";
}

// en este bloque se ordena con sort y a mano
echo"<br>";
echo"<h3>Array fusionado a mano con sort</h3>";
sort($array3);
foreach ($array3 as $key => $value) {
    echo"índice: ".$key." con valor: ".$value."<br>";
}
echo"<br>";
echo"<h3>Array fusionado a mano ordenado de forma manual</h3>";
// Lo hago con un do/while por probar
do{
    $hayIntercambios = false;
    for ($i = 0; $i < $array3.count($array3); $i++){
        if($array3[$i] > $array3[$i - 1]){
            $aux = $array3[$i - 1];
            $array3[$i - 1] = $array3[$i];
            $array3[$i] = $aux;
            $hayIntercambios = true;
        }
    }
}while ($hayIntercambios);

foreach ($array3 as $key => $value) {
    echo"índice: ".$key." con valor: ".$value."<br>";
}


?>


