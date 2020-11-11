<html>
    <head>
        <title>Ejemplo</title>
        <style>
            h1 {margin-bottom:0;} 
            #encabezado {
                background-color:#ddf0a4;
            }
            #contenido {
                background-color:#EEEEEE;
                height:600px;
            }
            #pie {
                background-color:#ddf0a4;
                color:#ff0000;
                height:30px;
            }
        </style>
    </head>
    <body>

        <div id="encabezado">
            <?php
            $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
            echo $conex->server_info . "<br>";
            $result = $conex->stmt_init();
            $result->prepare("SELECT cod,nombre_corto FROM producto");
            echo $result->error;
            $result->execute();
            echo $result->error;
            $result->bind_result($cod, $nombre_corto);
            echo $result->error;
            ?>
            <h1>Ejercicio: Conjuntos de resultados en MySQLi</h1>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                Producto: <select name="productos">
                    <?php
                    if (!$result->errno) {
                        while ($result->fetch()) {
                            // echo "Código: ".$fila['cod']."<br>";
                            echo '<option value="' . $cod . '">' . $nombre_corto . '</option>';
                        }
                    } else {
                        echo 'Esto no anda';
                    }
                    ?>
                </select>
                <input type="submit" name="enviar" value="Mostrar stock">
            </form>
        </div>
        <div id="contenido">
            <h1>Stock del producto en tiendas</h1>
            <?php
            if (!empty($_POST['enviar'])) {
                //$elemento = $_POST['productos'];
                $result2 = $conex->stmt_init();
                echo $result2->error;
                $result2->prepare('select ti.nombre, st.unidades from stock st join tienda ti where ti.cod=st.tienda and st.producto="' . $cod . '"');
                echo $result2->error;
                $result2->execute();
                echo $result2->error;
                $result2->bind_result($nombre, $unidades);
                echo $result2->error;
                if (!$result2->errno) {
                    while ($result2->fetch()) {
                        echo'Tienda: ' . $nombre . ': <input type="text" value="' . $unidades . '"> unidades';
                    }
                }
            } else {
                echo 'No se puede hacer la consulta';
            }
            ?>
        </div>


    </body>
</html>




