<?php
require_once './Controlador/controladorJuego.php';
require_once './Controlador/controladorCliente.php';
require_once './Controlador/controladorAlquiler.php';
session_start();
if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }
$juego= controladorJuego::buscarJuego($_GET['codigo']);
//echo $_GET['codigo'];
if (isset($_POST['alquilar'])){
    //$_SESSION['alquilo'][] = controladorJuego::buscarJuego($_POST['alquilar']);
    $fechaA = date("Y-n-d");
//    $fecha= date_create($fechaA);  
//    $f=date_format($fecha, "Y-n-d");
//echo $f;    
//echo $fechaA;
    $fechaD = date("Y-n-d");
    controladorAlquiler::insertar(null,$_POST['alquilar'], $_SESSION['dni'], $fechaA, null);
    controladorAlquiler::cambiarAlquilerSI($_POST['alquilar']);
}
?>

<html>
    <head>
        <title>Mostrar</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <a href="vistaCliente.php">Volver</a>
                    <h1><?php echo $juego->nombre_juego;?></h1>
                    <p><strong>Consola:</strong><?php echo $juego->nombre_consola;?></p>
                    <p><strong>Año:</strong><?php echo $juego->anno;?></p><!-- comment -->
                    <p><strong>Precio:</strong><?php echo $juego->precio;?></p><!-- comment -->
                    <p><strong>Descripción:</strong><?php echo $juego->descripcion;?></p>
                  
                    <form action="" method="post">
                        <button name="alquilar" class="btn btn-info" value="<?php echo $juego->codigo;?>"  
                            <?php if($juego->alquilado == "SI") echo 'disabled';?>>Aqluilar</button>
                    </form>
                </div>
                <div class="col-sm-4">
                    <img src="<?php echo $juego->imagen;?>" width="300" height="400">
                </div>
            </div>
        </div>
    </body>
</html>


