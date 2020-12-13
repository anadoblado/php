<?php
require_once './Controlador/controladorJuego.php';
require_once './Controlador/controladorCliente.php';
require_once './Controlador/controladorAlquiler.php';
session_start();
if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }

if (isset($_POST['modificar'])) {

    if ($_FILES['foto']['size'] > 0) {

        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $juego = new Juegos();
            $fich_unic = time() . "-" . $_FILES['foto']['name'];
            $ruta = "imagenes/" . $fich_unic;
            //para copiar el fichero en la carpeta usamos la funciçon move_uploaded_file
            move_uploaded_file($_FILES['foto']['tmp_name'], $ruta);

            $juego = new Juegos();
            $juego->nuevoJuego($_POST['codigo'], $_POST['nombre'], $_POST['consola'], $_POST['año'], $_POST['precio'], 'NO', $ruta, $_POST['descripcion']);
            controladorJuego::modificarJuego($juego);
            header('location:administrarJuegos.php');
        } else {
            echo 'ERROR al cargar la imagen';
        }
    }else{
        $juego = new Juegos();
        $juego->nuevoJuego($_POST['codigo'], $_POST['nombre'], $_POST['consola'], $_POST['año'], $_POST['precio'], 'NO', $_POST['foto'], $_POST['descripcion']);
        controladorJuego::modificarJuego($juego);
        header('location:administrarJuegos.php');
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
                    <a href="vistaAdministrarJuegos.php">Volver</a>
                        <?php
                    } else {
                        ?>
                        <a href="vistaLogueo.php">Volver</a>
                        <?php
                    }
                    ?>
                    <div class="row">
                        <div class="col-sm-8">

                            <h3>Modifica un Juego</h3>

                            <form  class="form-vertical" action="" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <?php
                                    $juego = controladorJuego::buscarJuego($_POST['editar']);
                                    ?>
                                    <input type="hidden" name="codigo" value="<?php echo $juego->codigo ?>">
                                    Nombre: <input class="form-control" type="text" name="nombre" value="<?php echo $juego->nombre_juego ?>" readonly>
                                    <br>
                                    Consola: <input class="form-control" type="text" name="consola" value="<?php echo $juego->nombre_consola ?>"readonly>
                                    <br>
                                    Año: <input class="form-control" type="number" name="año" value="<?php echo $juego->anno ?>">
                                    <br>
                                    Precio: <input class="form-control" type="number" name="precio" value="<?php echo $juego->precio ?>">
                                    <br>
                                    Descripción: <textarea class="form-control" name="descripcion" ><?php echo $juego->descripcion ?></textarea>
                                    <br>
                                    Imagen: <input  type="file" name="foto" value="<?php echo $juego->imagen ?>">
                                    <input  type="hidden" name="foto" value="<?php echo $juego->imagen ?>">
                                    <br>
                                    <br>
                                    <button type="submit" name="modificar" class="btn btn-outline-dark">Modificar</button>
<!--                                    <input type="submit" name="modificar" value="Modificar">-->
                                    <br>
                                </div>
                        </div>
                        <div class="col-sm-4">
                            <img src="<?php echo $juego->imagen ?>">
                        </div>

                    </div>

                </div>

                </body>
                </html>
