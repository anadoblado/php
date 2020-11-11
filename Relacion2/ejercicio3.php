<?php

$peliculas = array("enero" => 9, "febrero" => 12,"marzo" => 0,"abril" => 17);

foreach ($peliculas as $mes => $cantidad){
    if ($cantidad != 0){
        echo "En el mes ".$mes." se han visto ".$cantidad."<br>";
    }
}