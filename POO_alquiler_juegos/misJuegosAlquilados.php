<?php
require_once './Controlador/controladorJuego.php';
require_once './Controlador/controladorCliente.php';
require_once './Controlador/controladorAlquiler.php';
session_start();

if (!isset($_SESSION['nombre'])) {
    header("Location:index.php");
}

if (isset($_POST['devolver'])) {
    controladorAlquiler::cambiarAlquilerNO($_POST['devolver']);
    //controladorAlquiler::eliminarAlquiler($_POST['devolver']);
    $fechaD = date("Y-n-d");
    controladorAlquiler::modificarAlquiler($_POST['devolver'], $fechaD);
    $fechas = controladorAlquiler::calculoFechas($_POST['devolver'], $_POST['id']);
    //echo $_POST['id'];

    while ($row = $fechas->fetchObject()) {
        // sacamos las fechas de la consulta
        $fecha1 = $row->Fecha_alquiler;
        $fecha2 = $row->Fecha_devol;

        // como devuelve un string, le pasamos la función date_create para volverlos tipo date
        $fechaActual = date_create($fecha1);
        $fechadevol = date_create($fecha2);
        // con la función date_diff hacemos la diferencia de las fechas
        $dias = date_diff($fechaActual, $fechadevol);
        // hay que usar %a para formatearlo y obtener un número
        $diferencia = '%a';
        $df = $dias->format($diferencia);
    }

    // para obtener el pago, recuperamos el cod y el id, si no, se duplica
    $pago = controladorAlquiler:: pagoCliente($_POST['devolver'], $_POST['id']);

    while ($row = $pago->fetchObject()) {
        // obtengo el precio del juego de la consulta
        $pagar = $row->Precio;

        // miramos si lo ha tenido una semana, que es lo previsto o más, para combrarle recargos
        if ($df > 7) {
            $total = $pagar + $df - 7;
            ?>
            <div class="alert alert-danger">
                Has tenido el juego <strong><?php echo $df; ?></strong> Tienes que pagar <strong><?php echo $total; ?>€ </strong> .
            </div>
            <?php
        } else {
            ?>
            }
            <div class="alert alert-success">
                Has tenido el juego <strong><?php echo $df; ?></strong> Tienes que pagar <strong><?php echo $pagar; ?>€ </strong> .
            </div>
            <?php
        }
    }
}
?>
<!DOCTYPE html>
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


        <div class="container py-3">
            <div class="ml-3">
                <div class="py-3 ml-3">
                    <?php echo "Hola " . $_SESSION['nombre'];
                    ?>
                </div>
                <h3>Mis Juegos Alquilados</h3>
            </div>
            <div class="container">
                <?php
                if ($_SESSION['nombre'] == "Admin") {
                    ?>
                    <a href="vistaAdministrador.php">Volver</a>
                    <?php
                } else {
                    ?>
                    <a href="vistaCliente.php">Volver</a>
                    <?php
                }

                $juegos = controladorJuego::recuperarAlquiladosUsuario($_SESSION['dni']);
                if ($juegos->rowCount() > 0) {
                    ?>
                    <h4 style="text-align: start">Juegos Comares</h4>
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th>Carátula</th>
                                <th>Nombre Juego</th>
                                <th>Nombre Consola</th>
                                <th>Año</th>
                                <th>Precio</th>
                                <th></th>
                            </tr>
                        </thead>

                        <?php
                        while ($row = $juegos->fetchObject()) {
                            ?>
                            <tr>
                                <td> <img src="<?php echo $row->Imagen ?>" width="60px" height="70px"/></td>
                                <td> <?php echo $row->Nombre_juego ?> </td>
                                <td> <?php echo $row->Nombre_consola ?> </td>
                                <td> <?php echo $row->Anno ?> </td>
                                <td> <?php echo $row->Precio ?></td>
                                <td> <form action="" method="post">
                                        <button type="submit" class="btn btn-outline-danger" name="devolver" value="<?php echo $row->Codigo ?>">Devolver</button>
                                        <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    </form></td>
                            </tr>

                            <?php
                        }
                    } else {
                        ?>
                        <div class="alert alert-info">
                            <strong>Info!</strong> No hay juegos en la lista.
                        </div>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>

    </body>
</html>

