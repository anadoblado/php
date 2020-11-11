<form action="mostrarDatosDeFormConDosPasos.php" method="post">
    Nº Matrícula: <input type="text" name="matricula"><br>
    Curso:  <input type="text" name="curso"><br><!-- comment -->
    Precio:  <input type="text" name="precio"><br>
    <input type="hidden" name="nombre" value="<?php echo $_POST['nombre'];?>"><!-- comment -->
     <input type="hidden" name="apellidos" value="<?php echo $_POST['apellidos'];?>">
    <input type="submit" name="enviar" value="Enviar">
</form>


<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

