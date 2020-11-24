<?php
session_name();
session_start();

if (!isset($_SESSION['nombre'])) {
    header("location:login.php");
} else {

    // echo $_SESSION['nombre'];
    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $error = $conex->errorInfo();
        ?>
        <html>
            <head>
                <title>Productos</title>
                <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
            </head>
            <body  class="pagproductos">
                <div id="contenedor">
                    <div id="encabezado">
                        <h1>Listado de productos</h1>
                    </div>
                    <div id="cesta">
                        <h3><img src="cesta.jpg" alt="Cesta" width="24" height="21">Cesta</h3>
                        <hr />
                        <?php
                        if (isset($_POST['enviar'])) {
                            if (isset($_SESSION['cesta'][$_POST['enviar']])) {
                                $cantidad = $_SESSION['cesta'][$_POST['enviar']]['cantidad'];
                                $cantidad++;
                            } else {
                                $cantidad = 1;
                            }

                            //$_SESSION['cesta'][$_POST['enviar']]['cantidad'] +=1;
                            $datos = array('nombre' => $_POST['nombre'], 'descripcion' => $_POST['descripcion'], 'precio' => $_POST['precio'], 'cantidad' => $cantidad, 'codigo' => $_POST['enviar']);
                            $_SESSION['cesta'][$_POST['enviar']] = $datos;
                        }

                        if (isset($_POST['vaciar'])) {
                            unset($_SESSION['cesta']);
                        }
                        ?>
                        <div id="productos">
                            <label class="pagcesta"><?php
                                if (isset($_SESSION['cesta'])) {
                                    foreach ($_SESSION['cesta'] as $key => $value) {
                                        echo $key .' x ' .$value['cantidad']. 'ud<br>';
                                    }
                                }
                                ?></label>
                        </div>
                        <form action="" method="POST">
                            <input type="submit" name="vaciar" value="Vaciar Cesta"  >
                        </form>
                        <form action="cesta.php" method="POST">
                            <input type="submit" name="comprar" value="Comprar" <?php if(empty($_SESSION['cesta'])) echo 'disabled' ?> >
                        </form>

                    </div>
                    <?php
                    $consulta = $conex->query('SELECT * FROM producto');

                    while ($fila = $consulta->fetch(PDO::FETCH_OBJ)) {
                        ?>
                        <div id="productos">
                            <form action="" method="post">
                                <button type="submit" name="enviar" value="<?php echo $fila->cod; ?>" readonly>Añadir a la cesta</button>
                                <input type="text" name="nombre" value="<?php echo $fila->nombre_corto; ?>" readonly>
                                ==><!-- comment -->
                                <input type="text" name="precio" value="<?php echo $fila->PVP; ?>" readonly>€
                                <input type="hidden" name="descripcion" value="<?php echo $fila->descripcion; ?>">
                            </form>
                        </div>
                        <?php
                        // echo 'Productos: ' . $fila->nombre_corto . ' - Precio' . $fila->PVP . '€';
                        //botón que en el value le paso el código para arrastrarlo al otro archivo
                    }
                    ?>
                </div>
                <br class="divisor" />
                <div id="pie">
                    <form action="logoff.php" method="POST">
                        <input type="submit" name="salir" value="Abandonar la sesión ">
                    </form>

                    <p class='error'>  </p>

                </div>




            </body>
        </html>

        <?php
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
}
?>

