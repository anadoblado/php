<html>
    <head>
        <title>Agenda</title>
        <style>
            .bajoDch {float:right;position:absolute;margin-bottom:0px;margin-right:0px;bottom:0px; right:0px;}
            .altoDch2 {color: #f00; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;}
            .altoDch1 {color: #00f; float:right; position:absolute; margin-right:0px; margin-top:0px; top:0px; right:0px;} 
        </style>

    </head>
    <body>
        <?php
        if (!empty($_POST["enviar"])) {
            // cuando pulso el botón se manda todo el array agenda desde el formulario
            $agenda = (array) json_decode($_POST["agenda"], true);
            //si nombre no está vacío y teléfono no está vacío
            if (!empty($_POST["nombre"]) && !empty($_POST["telefono"])) {
                //compruebo si ese nombre ya estaba en la agenda
                if (array_key_exists($_POST["nombre"], $agenda) == $_POST["nombre"]) {
                    echo '<p class="altoDch1">Registro modificado</p>'; // si el nombre existe lo modifica
                } else {
                    echo '<p class="altoDch1">Registro añadido</p>'; // si el nobre no está lo añade
                }
                $agenda[$_POST["nombre"]] = $_POST["telefono"]; // guardamos en el array agenda el index:nombre y el valor:telefono
            }

            // si el nombre lleva un valor y el teléfono va vacío
            if (!empty($_POST["nombre"]) && empty($_POST["telefono"])) {
                //compruebo si ese nombre ya existe en la agenda array
                if (array_key_exists($_POST["nombre"], $agenda) == $_POST["nombre"]) {
                    // si existe el nombre, se borra
                    unset($agenda[$_POST["nombre"]]);
                    echo '<p class="altoDch2">Registro eliminado</p>';
                } else {
                    //si no existe, obviamente no se encuentra
                    echo '<p class="altoDch2">Registro no encontrado</p>';
                }
            }
        } else {
            // para crear el array vacío para empezar
            $agenda = array();
        }
        ?>
        <!-- ESTA ES LA TABLA QUE SE VA A MOSTRAR COMO SI FUERA LA AGENDA -->
        <table border="1">
            <th>Nombre</th>
            <th>Teléfono</th>
            <?php
            foreach ($agenda as $key => $value) {
                echo "<tr>";
                echo "<td>" . $key . "</td>";
                echo "<td>" . $value . "</td>";
                echo "</tr>";
            }
            $valores = json_encode($agenda); // CODIFICA LA AGENDA DE NUEVO
            ?>
        </table>


        <form action="" method="post" class="bajoDch">
            Nombre: <input type="text" name="nombre">
            Telefono: <input type="text" name="telefono">
            <input type="hidden"  name="agenda" value=<?php echo $valores ?>>
            <input type="submit" name="enviar" value="Comprobar">
        </form>
    </body>
</html>

