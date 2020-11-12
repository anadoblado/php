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

        <?php
        try {
            $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_SERVER_VERSION);
            $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
            $error = $conex->errorInfo();
            echo $error[2];
            ?> 
            <div id="encabezado">
                <h1>Ejercicio: Conjuntos de resultados en MySQLi</h1>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

                    Producto: <select name="productos">
                        <?php
                        $productos = $conex->query("SELECT * FROM producto");
                        while ($obj = $productos->fetch(PDO::FETCH_OBJ)) {
                            echo '<option value="' . $obj->cod . '"';
                            if (!empty($_POST['productos']) && $obj->cod == $_POST['productos']) {
                                echo 'selected';
                            }
                            echo '>' . $obj->nombre_corto . '</option>';
                        }
                        ?>
                    </select>
                    <input type="submit" name="mostrar" value="Mostrar stock">
                </form>
            </div>
            <div id="contenido">
                <h1>Stock del producto en tiendas</h1>
                <form action="" method="post">
                    <?php
                    if (!empty($_POST['productos']) && isset($_POST['mostrar'])) {
                        $elemento = $_POST['productos'];
                        $consulta = $conex->query('SELECT ti.nombre, st.unidades, ti.cod FROM stock st JOIN tienda ti WHERE ti.cod=st.tienda AND st.producto="' . $elemento . '"');
                        while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
                            echo "Tienda: " . $fila->nombre . " : <input type='text' name='uni[]' value='$fila->unidades'><br>";
                            echo "<input type='hidden' name='productos' value='$_POST[productos]'>";
                            echo "<input type ='hidden' name ='codigoTienda[]' value ='$fila->cod'>";
                        }
                    }
                    ?>  
                    <input type="submit" name="actualizar" value="Actualizar">
                </form>

                <?php
                if (isset($_POST['actualizar'])) {



                    for ($i = 0; $i < count($_POST['uni']); $i++) {
                        $result = $conex->prepare('UPDATE stock SET unidades=? WHERE tienda=? and producto=?');
                        $producto = $_POST['productos'];
                        $unidades = $_POST["uni"][$i];
                        $tienda = $_POST["codigoTienda"][$i];
                        $result->bindParam(1, $unidades);
                        $result->bindParam(2, $tienda);
                        $result->bindParam(3, $producto);
                        $result->execute();
                    }

                    echo '<h3>Operación realizada con éxito</h3>';
                }
                ?>

                <?php
            } catch (PDOException $exc) {
                echo $exc->getTraceAsString(); // error de php
                echo 'Error:' . $exc->getMessage(); // error del servidor de bd
            }
            ?>
        </div>


    </body>
</html>
