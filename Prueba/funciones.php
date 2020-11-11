<?php

function fecha2(){
    switch (date("N")){
        case 1:
            $a = "Lunes";
            break;
        case 2:
            $a = "Martes";
            break;
         case 3:
            $a = "Miércoles";
            break;
        case 4:
            $a = "Jueves";
            break;
         case 5:
            $a = "Viernes";
            break;
        case 6:
            $a = "Sábado";
            break;
        case 7:
            $a = "Domingo";
            break;
    }
    
    switch (date ("n")){
        case 1:
            $b = "Enero";
            break;
        case 2:
            $b = "Febrero";
            break;
        case 3:
            $b = "Marzo";
            break;
        case 4:
            $b = "Abril";
            break;
        case 5:
            $b = "Mayo";
            break;
        case 6:
            $b = "Junio";
            break;
        case 7:
            $b = "Julio";
            break;
        case 8:
            $b = "Agosto";
            break;
        case 9:
            $b = "Septiembre";
            break;
        case 10:
            $b = "Octubre";
            break;
        case 11:
            $b = "Noviembre";
            break;
        case 12:
            $b = "Diciembre";
            break;
        
        
    }
     echo $a.", ". date("d")." de ".$b." de ".date("Y");
}

function fecha ($segundos){
    
    switch (date("N",$segundos)){
        case 1:
            $a = "Lunes";
            break;
        case 2:
            $a = "Martes";
            break;
         case 3:
            $a = "Miércoles";
            break;
        case 4:
            $a = "Jueves";
            break;
         case 5:
            $a = "Viernes";
            break;
        case 6:
            $a = "Sábado";
            break;
        case 7:
            $a = "Domingo";
            break;
    }
    
    switch (date ("n",$segundos)){
        case 1:
            $b = "Enero";
            break;
        case 2:
            $b = "Febrero";
            break;
        case 3:
            $b = "Marzo";
            break;
        case 4:
            $b = "Abril";
            break;
        case 5:
            $b = "Mayo";
            break;
        case 6:
            $b = "Junio";
            break;
        case 7:
            $b = "Julio";
            break;
        case 8:
            $b = "Agosto";
            break;
        case 9:
            $b = "Septiembre";
            break;
        case 10:
            $b = "Octubre";
            break;
        case 11:
            $b = "Noviembre";
            break;
        case 12:
            $b = "Diciembre";
            break;
        
        
    }
    
    //echo date("N, d - F - Y");
    echo("<br>");
    return  $a.", ". date("d", $segundos)." de ".$b." de ".date("Y", $segundos);
}

function ordenarTresNumeros ($a, $b, $c){
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
}

function intercambiarValores($a, $b,$c){
    $aux = 0;
    $aux = $c;
    $a = $b;
    
}

