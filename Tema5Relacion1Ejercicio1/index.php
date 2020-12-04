<!DOCTYPE html>
<!--and open the template in the editor.
To change this license header, choose License To change this template file, choose Tools | Headers in Project Properties.
Templates

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Index</title>
    </head>
    <body>
        <?php
        require_once 'Animal.php';
        require_once 'Ave.php';
        require_once 'Mamifero.php';
        require_once 'Gato.php';
        require_once 'Perro.php';
        require_once 'Pinguino.php';
        require_once 'Canario.php';
        require_once 'Lagarto.php';
        // put your code here
        $camaleon = new Animal("Leo", "Moscas", "Verde");
        echo Animal::cantidad();
        echo "<br>".$camaleon;
        
        $lola = new Mamifero("Lola", "hamster", "blanco", "si");
        echo "<br>".$lola."<br>";
         echo Animal::cantidad();
         
         $gallina = new Ave("pita", "grano", "blanco", "si");
         echo "<br>".$gallina."<br>";
         echo "<br>Manada de bichos con plumas: ".Ave::miembrosManada()."<br>";
         echo "<br>Cantidad de animales:".Animal::cantidad()."<br>";
         
         $garfield = new Gato("Garfield", "pienso", "naranja", "si", "muchos");
         echo "<br>".$garfield."<br>";
         echo "<br>Cantidad de animales:".Animal::cantidad()."<br>";
         
         $rayo = new Perro("Rayo", "pienso", "blanco y negro", "si", "collie enanano");
         echo "<br>".$rayo."<br>";
         echo "<br>Cantidad de animales:".Animal::cantidad()."<br>";
         
         $pinguino = new Pinguino("Rey", "pescado", "negro y blanco", "no", "si");
          echo "<br>".$pinguino."<br>";
         echo "<br>Manada de bichos con plumas: ".Ave::miembrosManada()."<br>";
         echo "<br>Cantidad de animales:".Animal::cantidad()."<br>";
         
         $canario = new Cananrio("yellow", "alpiste", "amarillo", "vuelo");
         echo "<br>".$canario."<br>";
         echo "<br>Manada de bichos con plumas: ".Ave::miembrosManada()."<br>";
         echo "<br>Cantidad de animales:".Animal::cantidad()."<br>";
         
         $lagarto = new Lagarto("Guancho", "moscas", "verde", "Australia");
         echo "<br>".$lagarto."<br>";
         echo "<br>Manada de bichos con plumas: ".Ave::miembrosManada()."<br>";
         echo "<br>Cantidad de animales:".Animal::cantidad()."<br>";
         
         
        ?>
    </body>
</html>
