<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

echo "<table border = 1 cellspacing = 1>";
$num = 1;
for ($i = 1; $i <= 5; $i++){
    echo"<tr>\n";
    for($j = 1; $j <= 7; $j++){
         echo"<td>".$num."</td>\n";
         $num += 1;
       
    }
    echo"<\tr>\n";
}
echo"<\table>";