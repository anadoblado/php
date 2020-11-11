<html>
    <head>
        <title>Introducir</title>
    </head>
    <body>
        <h2>Introducir jugador</h2>
        <?php
        if (isset($_POST['enviar']) && preg_match('/^[a-z]{1,100}$/i', $_POST['nombre']) && preg_match('/^[0-9]{8}[a-z]{1}$/i', $_POST['dni']) && preg_match('/^[0-9]{1}/', $_POST['dorsal']) && !empty($_POST['posicion']) && !empty($_POST['equipo']) && preg_match('/^\d{1,3}/', $_POST['goles'])) {

            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
            if ($conex->connect_errno) {
                echo "<h1>ERROR</h1>";
            } else {
                $pos = 0;
                foreach ($_POST['posicion'] as $value) {
                    $pos += $value;
                }
                $conex->query("INSERT INTO jugadores (Nombre, DNI, Dorsal, Posicion, Equipo, Goles) VALUES ('$_POST[nombre]', '$_POST[dni]', '$_POST[dorsal]', $pos, '$_POST[equipo]', '$_POST[goles]')");
                echo "<h2>Jugador guardado correctamente</h2>";
                echo "<a href='index.php'>Volver al menú</a>";
            }
        } else {
            ?>
            <form action="" method="post">
                Nombre: <input type="text" name="nombre"><br>
            <?php
            if (isset($_POST['enviar']) && !preg_match('/^[a-z]{1,100}$/i', $_POST['nombre'])) {
                echo '<span style="color:red">El nombre quedó vacío, debe introducir un nombre</span><br>';
            }
            ?>
                DNI: <input type="text" name="dni"><br><!-- comment -->
                <?php
                if (isset($_POST['enviar']) && !preg_match('/^[0-9]{8}[a-z]{1}$/i', $_POST['dni'])) {
                    echo '<span style="color:red">Debe introducir un DNI con formato 12345678Z</span><br>';
                }
                ?>
                Dorsal: <select name="dorsal">
                    <option value="1">1</option>
                    <option value="2">2</option><!-- comment -->
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option><!-- comment -->
                    <option value="6">6</option><!-- comment -->
                    <option value="7">7</option>
                    <option value="8">8</option><!-- comment -->
                    <option value="9">9</option>
                    <option value="10">10</option>
                    <option value="11">11</option><!-- comment -->
                </select><br>
    <?php
    if (isset($_POST['enviar']) && !preg_match('/^[0-9]{1}/', $_POST['dorsal'])) {
        echo '<span style="color:red">Debe elegir un número de dorsal</span><br>';
    }
    ?>
                Posición: <select multiple="" name=posicion[]">
                    <option value="1">Portero</option>
                    <option value="2">Defensa</option>
                    <option value="4">Centrocampista</option>
                    <option value="8">Delantero</option>
                </select> <br>
    <?php
    if (isset($_POST['enviar']) && empty($_POST['posicion'])) {
        echo '<span style="color:red">Debe marcar una posición</span><br>';
    }
    ?>
                Equipo: <input type="text" name="equipo"><br><!-- comment -->
                <?php
                if (isset($_POST['enviar']) && empty($_POST['equipo'])) {
                    echo '<span style="color:red">Debe introducir un equipo</span><br>';
                }
                ?>
                Número de goles: <input type="int" name="goles"><br>
                <?php
                if (isset($_POST['enviar']) && !preg_match('/^\d{1,3}/', $_POST['goles'])) {
                    echo '<span style="color:red">Debe introducir numero de goles</span><br>';
                }
                ?>
                <input type="submit" name="enviar" value="Enviar">
                
            </form>
            <form action="index.php">
                <input type="submit" value="Volver al menú" name="volver" />
            </form>

    <?php
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

