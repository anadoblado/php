<?php
require_once './Controlador/controladorCliente.php';
session_start();
if (!isset($_SESSION['nombre'])) {
    header("Location:index.php");
}

if (isset($_POST['modificar'])) {

    if ($_FILES['foto']['size'] > 0) {

        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $cliente = new Cliente();
            $fich_unic = time() . "-" . $_FILES['foto']['name'];
            $ruta = "imagenes/" . $fich_unic;
            //para copiar el fichero en la carpeta usamos la funciçon move_uploaded_file
            move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

            $cliente->nuevoCliente($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['localidad'], $_POST['clave'], 'cliente', $ruta);
            controladorCliente::modificarCliente($dni);
            if ($_SESSION['nombre'] == "Admin") {
                header('location:administrarClientes.php');
            } else {
                header('location:vistaCliente.php');
            }
        } else {
            echo 'ERROR al cargar la imagen';
        }
    } else {
        $cliente = new Cliente();
        $cliente->nuevoCliente($_POST['dni'], $_POST['nombre'], $_POST['apellidos'], $_POST['direccion'], $_POST['localidad'], $_POST['clave'], 'cliente', $_POST['foto']);
        controladorCliente::modificarCliente($cliente);
        if ($_SESSION['nombre'] == "Admin") {
            header('location:administrarClientes.php');
        } else {
            header('location:vistaCliente.php');
        }
    }
}
?>


<html>
    <head>
        <meta charset="ISO-8859-1">
        <title>Insert title here</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet"
              href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <script
        src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script
        src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script
        src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    </head>
    <body>


        <div class="ml-5 mt-4">

            <div class="row">
                <div class="col-md-4">
                    <?php if ($_SESSION['nombre'] == "Admin") {
                        ?>
                        <a href="vistaAdministrador.php">Volver</a>
                        <?php
                    } else {
                        ?>
                        <a href="vistaCliente.php">Volver</a>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <form  class="form-vertical" action="" method="post" enctype="multipart/form-data">
                            <div class="col-sm-8">

                                <h3>Modificar datos</h3>


                                <div class="form-group">
                                    <?php
                                    if ($_SESSION['nombre'] == "Admin") {
                                        $cliente = controladorCliente::buscarClienteSoloDni($_POST['editar'], $errores);
                                    } else {
                                        $cliente = controladorCliente::buscarClienteSoloDni($_GET['dni'], $errores);
                                    }
                                    ?>
                                    <input type="hidden" name="dni" value="<?php echo $cliente->dni ?>">
                                    Nombre: <input class="form-control" type="text" name="nombre" value="<?php echo $cliente->nombre ?>" readonly>
                                    <br>
                                    Apellidos: <input class="form-control" type="text" name="apellidos" value="<?php echo $cliente->apellidos ?>"readonly>
                                    <br>
                                    Direccion: <input class="form-control" type="text" name="direccion" value="<?php echo $cliente->direccion ?>">
                                    <br>
                                    Localidad: <input class="form-control" type="text" name="localidad" value="<?php echo $cliente->localidad ?>">
                                    <br>
                                    Contraseña: <input class="form-control" type="text" name="clave">
                                    <br>
                                    Imagen: <input  type="file" name="foto" value="<?php echo $cliente->imagen ?>">
                                    <input  type="hidden" name="foto" value="<?php echo $cliente->imagen ?>">
                                    <br>
                                    <br>
                                    <button type="submit" name="modificar" class="btn btn-outline-dark" <?php if ($cliente->tipo == "admin") echo 'disabled'; ?>>Modificar</button>
<!--                                    <input type="submit" name="modificar" value="Modificar">-->
                                    <br>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <img src="<?php echo $cliente->imagen ?>" width="200px" height="300px">
                            </div>
                        </form>
                    </div>

                </div>
            </div>

        </div>
    </body>
</html>


