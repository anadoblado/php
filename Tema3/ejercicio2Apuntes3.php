<html>
    <head>
        <meta charset="UTF-8">
        <title>Ejercicio 1</title>
    </head>
    <style>
        h1 {margin-bottom:0;}
        #encabezado {background-color:#ddf0a4;}
        #contenido {background-color:#EEEEEE;height:600px;}
        #pie {background-color:#ddf0a4;color:#ff0000;height:30px;}
    </style>

    <body>
        <div id="encabezado">
            <h1>Conjunto de resultados en Mysqli</h1>
            <form action="" method="post">
                Producto: <select name="producto">

                    <?php
                    $conexion = new mysqli('localhost', 'dwes', 'abc123.', 'dwes');

                    if (!$conexion->connect_errno) {

                        //$conexion->autocommit(false);

                        $result = $conexion->query('SELECT cod, nombre_corto from producto');

                        if (!$conexion->errno) {
                            if ($result->num_rows) {

                                while ($fila = $result->fetch_array()) {

                                    echo '<option value="' . $fila['cod'] . '">' . $fila['nombre_corto'] . '</option>';
                                }
                            }
                        } else {
                            echo 'No se ha podido hacer la conexión';
                        }
                    }
                    ?>

                </select>

                <input type="submit" name="mostrar" value="mostrar">
            </form>
        </div>


        <div id="contenido">
            <h1>Stock del producto en tiendas</h1>
            
            <form action = "" method = "post" >
                <?php
                if (isset($_POST["mostrar"]) && !empty($_POST['producto'])) {

                    $result = $conexion->query('SELECT ti.nombre, ti.cod, sto.unidades from tienda as ti JOIN stock as sto where sto.tienda=ti.cod and sto.producto="' . $_POST['producto'] . '"');

                    $producto = $_POST['producto'];

                    if ($result) {
                       
                        while ($fila = $result->fetch_array()) {
                            echo "Tienda: " . $fila['nombre'] . " : <input type='text' name='uni[]' value='$fila[unidades]'>";

                            echo "<input type='hidden' name='producto' value='$_POST[producto]'>";

                            echo "<input type ='hidden' name ='codigoTienda[]' value ='$fila[cod]'>";
                        }
                        ?>

                        <input type="submit" name="actualizar" value="Actualizar">
                    </form>
                    <?php
                }
            }

            if (isset($_POST['actualizar'])) {
                echo 'holaaaaaaaaaaaa';
                $result2 = $conexion->stmt_init();
                $result2->prepare('UPDATE stock SET unidades=? WHERE tienda=? and producto=?');
                $result2->bind_param('sss', $unidades, $tienda, $_POST['producto']);
                for ($i = 0; $i < count($_POST['uni']); $i++) {
                    $unidades = $_POST["uni"][$i];
                    $tienda = $_POST["codigoTienda"][$i];
                    $result2->execute();
                }
                $result2->close();
                $conexion->close();
            }
            ?>

        </div>
    </body>
</html>




