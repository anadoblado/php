<?php
session_start();
require_once './Controlador/controladorCuentas.php';
require_once './Controlador/controladorUsuario.php';
require_once './Controlador/controladorTransferenia.php';

//echo 'Hola' . $_SESSION['nombre'] . " " . $_SESSION['apellidos'];
if (isset($_POST['cerrar'])) {
    if (!isset($_SESSION['nombre'])) {
        header("Location:index.php");
    } else {
        setcookie(session_name(), "", time() - 3600, "/");
        session_unset();
        session_destroy();
        header("Location:index.php");
    }
}
?>
<html>
    <head>
        <title>Incio</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Hola <?php echo $_SESSION['nombre'] . " " . $_SESSION['apellidos'] ?></h1>
            <form action="" method="post">
                <button type="submit" name="cerrar" class="btn btn-dark">Cerrar sesión</button>
            </form>
            <h1>Mis cuentas</h1>
            <div class="row">
                <div class="col">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                                <th>Cuentas</th>
                                <th>Saldo</th>
                                <th>Historial</th>
                                <th>Transferencia</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php
                            $cuentas = controladorCuentas::cuentasDelUsuario($_SESSION['dni']);
                            while ($registro = $cuentas->fetchObject()) {
                                echo '<tr>';
                                ?>

                            <td><?php echo $registro->iban; ?></td>
                            <td><?php echo $registro->saldo;
                                
                                ?></td> 

                            <form action="" method="post">
                                <td><button name="historial"  class="btn btn-info" value="<?php echo $registro->iban; ?>">Historial</button></td>    
                            </form>
                            <form action="transferencias.php" method="post">
                                <td><button name="transferencia"  class="btn btn-info" value="<?php $_SESSION['iban_origen'] = $registro->iban;
                            $_SESSION['saldo'] = $registro->saldo;
                            echo $registro->iban; ?>">Transferencia</button></td>    
                            </form>
                            <?php
                            echo '</tr>';
                        }
                        ?>


                        </tbody>
                    </table>
                </div>

            </div>
            <?php
            if (isset($_POST['historial'])) {
                ?>
                <h1>Historial</h1>
                <div class="row">
                    <div class="col">
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Origen</th>
                                    <th>Destino</th>
                                    <th>Cantidad</th>
                                    <th>Fecha</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $historialCuenta = controladorTransferencia::historialDeUnaCuenta($_POST['historial']);
                                while ($registro = $historialCuenta->fetchObject()) {
                                    echo '<tr>';
                                    ?>

                                <td><?php echo $registro->iban_origen; ?></td>
                                <td><?php echo $registro->iban_destino; ?></td>
                                <td><?php echo $registro->cantidad; ?></td>
                                <td><?php echo $registro->fecha; ?></td>
                                <?php
                                echo '</tr>';
                            }
                            ?>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
                </body>
                </html>


