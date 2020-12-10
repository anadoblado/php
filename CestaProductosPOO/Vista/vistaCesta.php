<?php
require_once '../Controlador/controladorProducto.php';

session_start();

if (!isset($_SESSION['nombre'])) {
header("location:index.php");
} else {

// echo $_SESSION['nombre'];
try {
$conex = new Conexion();
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
                    //$_SESSION['cesta'][$_POST['enviar']] = controladorPruducto::buscarProducto($_POST["enviar"]);
                    $_SESSION['cesta'][] = controladorPruducto::buscarProducto($_POST["enviar"]);
                }

                if (isset($_POST['vaciar'])) {
                    unset($_SESSION['cesta']);
                }
                ?>

                <?php
                if (isset($_SESSION['cesta'])) {
                    foreach ($_SESSION['cesta'] as $value) {
                        echo $value->nombre_corto.'<br>';
                    }
                }
                ?>

                <form action="" method="POST">
                    <input type="submit" name="vaciar" value="Vaciar Cesta"  >
                </form>
                <form action="cesta.php" method="POST">
                    <input type="submit" name="comprar" value="Comprar" <?php if (empty($_SESSION['cesta'])) echo 'disabled' ?> >
                </form>

            </div>
            <div id="productos">
                <?php
                $productos = controladorPruducto::recuperarTodos();
                foreach ($productos as $value) {
                // echo 'Codigo '.$val->codigo;
                //}
                ?>

                <form action="" method="post">
                    <button type="submit" name="enviar" value="<?php echo $value->codigo; ?>" readonly>Añadir a la cesta</button>
                    <input type="text" name="nombre" value="<?php echo $value->nombre_corto; ?>" readonly>
                    ==><!-- comment -->
                    <input type="text" name="precio" value="<?php echo $value->PVP; ?>" readonly>€
                    <input type="hidden" name="descripcion" value="<?php echo $value->descripcion; ?>">
                </form>

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
