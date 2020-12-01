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
        require_once 'Persona.php';
        require_once 'empleado.php';
        $p = new Persona("Antonio", "Pérez", 65);
//        echo $p->nombre;
//        $p->edad=50;
//        echo '<br>'.$p->edad;
        echo '<br>'.$p;
//        
//        echo "<br>";
//        $p->muestra("Pepe");
//        echo $p;
//         echo "<br>";
//        $p->muestra("Pepe", "Valvede");
//        echo $p;
          echo Persona::personas();
          modifica($p);
          echo '<br>'. $p;
//          $p3 = $p;
//          modifica($p3);
//          echo '<br>'. $p;
//          echo '<br>'. $p3;
          // si hago $p3 = $p, estoy haciendo otro objeto que apunta a la misma referencia de memomoria del primero, 
          // si hago un cambio en $p3 le afecta a $p, porque están en el mismo sitio
          // si quiero hacer una COPIA existe la función clonar, el = crea un ALIAS
          $p3 = clone($p);
           modifica($p3);
           session_start();
           $_SESSION['person']=$p;
           
          
          function modifica($p){
              $p->nombre="Rosario";
          }
          $empleado = new Empleado("Maria", "García", 43, 5000);
          echo '<br>' .$empleado;
          
        ?>
        <a href="sesion.php">Pasar en session</a>
    </body>
</html>
