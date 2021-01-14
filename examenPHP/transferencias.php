<?php
session_start();
require_once './Controlador/controladorCuentas.php';
require_once './Controlador/controladorUsuario.php';
require_once './Controlador/controladorTransferenia.php';
//echo 'Hola' . $_SESSION['nombre'] . " " . $_SESSION['apellidos'];

$positivo = true;
if (isset($_POST['cerrar'])){
    if(!isset($_SESSION['nombre'])){
    header("Location:index.php");
    }else{
        setcookie(session_name(), "", time()-3600, "/");
        session_unset();
        session_destroy();
        header("Location:index.php");  
    }
}
if(isset($_POST['transferir'])){
    $saldo = controladorCuentas::verSaldo($_SESSION['dni'], $_SESSION['iban_origen']);
    $cantidad = $saldo->saldo;
    $_SESSION['cantidad']=$_POST['cantidad'];
    
    $comision = $_POST['cantidad'] * 0.01;
    $_SESSION['comision']=$comision;
    $diferencia = $_POST['saldo'] - $_POST['cantidad'] - $comision;
//    if($diferencia > 0){
//        $positivo = true;
    
    //$_SESSION['comision']=0.01*$_POST['cantidad'];
    $_SESSION['iban_destino']=$_POST['iban_destino'];
    $_SESSION['saldo_posterior']=$diferencia;
       header("Location:validar_transferencia.php");
//    }else{
//        $positivo = false;
//    }
}
?>
<html>
    <head>
        <title>Trasferencias</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <h1>Hola <?php echo $_SESSION['nombre'];?></h1>
            <form action="" method="post">
                <button type="submit" name="cerrar" class="btn btn-dark">Cerrar sesión</button>
            </form>
            <h1>Tramitar transferencia</h1>
            <form class="form-vertical" action="" method="post">
                <div class="form-group">
                             
                    Origen: <input class="form-control" type="text" name="iban_origen" value="<?php echo $_SESSION['iban_origen']; ?>" readonly>
                         <br>
                         Saldo: <input class="form-control" type="text" name="saldo" value="<?php echo $_SESSION['saldo']; ?>" readonly>
                         <br>
                         Cuentas: <select class="form-control" name="iban_destino">
                             <?php
                                $cuenta = controladorCuentas::verCuentaConUsuario();
                                while ($registro = $cuenta->fetchObject()) {
                             ?>
                             <option value="<?php echo $registro->iban; ?>"><?php echo $registro->iban." -- ". $registro->Nombre; ?></option>
                             <?php }?>
                         </select>
                                
       
                         <br>
                         Cantidad: <input class="form-control" type="number" name="cantidad"">
                         <?php  ?>
                         <br>
                         
                         <br>
                         <button type="submit" name="transferir" class="btn btn-dark">Transferir</button>
                         
                         
                         </div>
            </form>
            
        </div>
    </body>
</html>



