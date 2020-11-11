<?php

$a = 20;
$b = 7;
$c = 16;
$mayor = 0;
$menor = 0;
$distinto = 0;

if ($a == $b && $b == $c){
    echo"Los tres números son iguales";
}elseif ($a > $b && $a > $c) {
    $mayor = $a;
    if ($b > $c){
        $distinto = $b;
        $menor = $c;
    }else{
        $distinto = $c;
        $menor = $b;
    }
}elseif ($b > $a && $b > $c) {
    $mayor = $b;
    if($a > $ $c){
        $distinto = $a;
        $menor = $c;
    }else{
        $distinto = $c;
        $menor = $a;
    }
}elseif ($c > $a && $c > $b) {
    $mayor = $c;
    if($a > $b){
        $distinto = $a;
        $menor = $b;
    }else{
        $distinto = $b;
        $menor = $a;
    }
}
echo"De mayour a menor: ".$mayor.", ".$distinto.", ".$menor;


