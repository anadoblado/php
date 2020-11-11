<?php
   
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
    $a = 9;
    $b = 5;
    $c = 2;
    
    if( $a > $b && $a > $c){
        echo $a." es el mayor";
    }elseif ($b > $c) {
        echo $b." es el mayor";
    } else {
         echo $c." es el mayor";
    }
