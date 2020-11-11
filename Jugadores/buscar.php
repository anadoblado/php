<html>
    <head>
        <title>Buscar</title>
    </head>
    <body>
        <h2>Buscador</h2>
        <?php
        if (isset($_POST['enviar']) && !empty($_POST['opcion']) && !empty($_POST['buscar'])) {
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'futbol');
            if ($conex->connect_error) {
                echo "<h1>ERROR</h1>";
            } else {
                if (!empty($_POST['opcion'])) {
                    $opcion = $_POST['opcion'];
                    // echo $opcion;
                    $valor = $_POST['buscar'];
                    // echo $valor;
                    //$result = $conex->query("SELECT * FROM jugadores WHERE " . $opcion . " = '" . $valor . "'");
                    $result = $conex->query("SELECT * FROM jugadores WHERE " . $opcion . " LIKE '%" . $valor . "%'");
                    echo $conex->error;

                    echo '<table border="1">';
                    echo ' <th>Nombre</th>';
                    echo ' <th>DNI</th>';
                    echo ' <th>Dorsal</th>';
                    echo '<th>Posición</th>';
                    echo ' <th>Equipo</th>';
                    echo '<th>Goles</th>';

                    while ($obj = $result->fetch_object()) {
                        //$pos = explode(',', $obj->Posicion);
                        echo'<tr>';
                        echo'<td>' . $obj->Nombre . '</td>';
                        echo'<td>' . $obj->DNI . '</td>';
                        echo'<td>' . $obj->Dorsal . '</td>';
                        echo'<td>' . $obj->Posicion . '</td>';
//                        foreach ($pos as $value) {
//                            echo '<td>' . $value . '</td>';
//                        }
                        echo'<td>' . $obj->Equipo . '</td>';
                        echo'<td>' . $obj->Goles . '</td>';
                    }
                    echo '</table>';
                    ?>

                    <form action="buscar.php">
                        <input type="submit" value="Volver" name="volver" />
                    </form>

                    <?php
                    //echo '<a href="buscar.php">Volver a la búsqueda</a>';
                }
            }
        } else {
            ?>

            <form action="" method="post">
                Buscar por: <select name="opcion">
                    <option value="DNI">DNI</option>
                    <option value="Equipo">Equipo</option>
                    <option value="Posicion">Posicion</option>
                </select><br>
                Introduce un valor:<input type="text" name="buscar"><br>
                <input type="submit" value="Buscar" name="enviar" /><br><!-- comment -->
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

