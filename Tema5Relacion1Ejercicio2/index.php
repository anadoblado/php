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
        
        require_once 'Vehiculo.php';
        require_once 'Coche.php';
        require_once 'Bicicleta.php';
        // put your code here
        
        $coche1 = new Coche();
     
        echo $coche1->anda(30);
        echo $coche1->quemaRueda();
        echo $coche1->anda(80);
        
        echo "<br>Hay". Vehiculo::getCantidad() . " vehículos<br>";
        
        $bici1 = new Bicicleta();
        echo $bici1->anda(10);
        echo $bici1->hacerCaballito();
        echo "<br>Hay ". Vehiculo::getCantidad() . " vehículos<br>";
        ?>
        
        
    </body>
</html>
