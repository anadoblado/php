<?php

echo "<table border = 1 cellspacing = 1>";

foreach ($_SERVER as $codigo => $modulo){
    echo "<tr><td>".$codigo."</td><td>".$modulo."</td></tr>";
    
    
   // echo "El índice ".$codigo." tiene como valor: ".$modulo."<br>";
}
echo"</table>";

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

