<?php

    $daysForYear = 2016;
    
    if($daysForYear % 4 == 0 ){
        if ($daysForYear % 100 == 0){
            if ($daysForYear % 400 == 0){
                echo "El año ".$daysForYear." es bisiesto";
            }
        }else{
             echo "El año ".$daysForYear." es bisiesto";
        }
    }else{
        echo "El año ".$daysForYear." no es bisiesto";
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

