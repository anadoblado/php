<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        for($i = 1; $i < 11; $i++){
            $array[$i] = $i*2;
        }
        
        foreach ($array as $index => $valor){
            echo "El array tiene en la posición ".$index." el valor ".$valor."<br>";
        }
        ?>
    </body>
</html>
