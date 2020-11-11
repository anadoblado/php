
<!-- comprobar usuario -->

<html>
    <head>
        <title>Formularo</title>
    </head>
    <body>
        <?php
        $nombreCorrecto = true;
        $dniCorrecto = true;
        $fechaCorrecta = true;
        $edadCorrecta = true;
        if (isset($_POST["enviar"])) {
            if (!preg_match('/^[a-z]{1,30}$/i', $_POST['nombre'])) {
                $nombreCorrecto = false;
            }
            if (!preg_match('/^[0-9]{8}[a-z]{1}$/i', $_POST['dni'])) {
                $dniCorrecto = false;
            }
            if (!preg_match('/^\d{2}-\d{2}-\d{4}$/', $_POST['fecha_nac'])) {
                $fechaCorrecta = false;
            }
            if ($_POST['edad'] > 18 && !preg_match('/^\d{3}/', $_POST['edad'])) {
                $edadCorrecta = false;
            }
            if ($nombreCorrecto && $dniCorrecto && $fechaCorrecta && $fechaCorrecta) {
                echo '<h3>Formulario</h3>';
                echo 'Nombre: ' . $_POST['nombre'] . '<br>';
                echo 'DNI: ' . $_POST['dni'] . '<br>';
                echo 'Fecha de nacimiento: ' . $_POST['fecha_nac'] . '<br>';
                echo 'Edad: ' . $_POST['edad'] . '<br>';
            } else {
                ?>

                <form action="" method="post">
                    Nombre: <input type="text" name="nombre"><br>
                    DNI: <input type="text" name="dni"><br>
                    Fecha de nacimiento <input type="text" name="fecha_nac"><br>
                    Edad: <input type="text" name="edad"><br>
                    <input type="submit" name="enviar" value="Comprobar"><br>  
                </form>
                <?php
            }
        }
        ?>


    </body>
</html>




<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

