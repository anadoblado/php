<html>
    <head>
        <title>Ejercicio DWES</title>
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
            <h1>Ejercicio: Conjuntos de resultados en MySQLi</h1>

            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                <select name="nombre_corto">
                    <?php
                    $conex = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');
                    $result = $conex->query('select * from producto');
                    if (!$conex->errno) {
                        if ($result->num_rows) {
                            while ($fila = $result->fetch_array()) {
                                echo '<option value="' . $fila['cod'] . '">' . $fila['nombre_corto'] . '</option>';
                            }
                        }
                    } else {
                        echo 'No se ha podido acceder';
                    }
                    ?>
                </select>
                <input type="submit" value="Mostrar Stock">

            </form>

        </div>
        <div id="contenido">
            <h1>Stock del producto en las tiendas</h1>

            <?php
            if (!empty($_POST['nombre_corto'])) {
                $producto = $_POST['nombre_corto'];
                $result = $conex->query('select ti.nombre, st.unidades from stock st join tienda ti where ti.cod=st.tienda and st.producto="' . $producto . '"');

                if (!$conex->errno) {
                    if ($result->num_rows) {
                        while ($fila = $result->fetch_array()) {
                            echo 'Tienda: ' . $fila['nombre'] . ': ' . $fila['unidades'] . ' unidades.<br>';
                        }
                    }
                } else {
                    echo 'No se ha podido acceder';
                }
            }
            ?>
        </div>


    </body>
</html>



