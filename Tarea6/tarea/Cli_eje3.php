<?php
require_once __DIR__ . '/vendor/autoload.php';
//Especificamos el wsdl que utilizaremos en nuestro 
//servicio web.
$wsdl = "http://localhost/Tarea6/tarea/Serveje3.php?wsdl";

//Instanciamos un cliente nativo de la clase de PHP 
//con el $wsdl especificado anteriormente.
$client = new nusoap_client($wsdl);


//$rLD = $client->call('LibraDolar', array('cantidad' => '1'));
//echo 'Al cambio obtienes: ' . $rLD . '$<br>';
//
//$rDL = $client->call('DolarLibra', array('cantidad' => '1'));
//echo 'Al cambio obtienes: ' . $rDL . '£<br>';
?>

<html>
    <head>
        <title>Conversor</title>
    </head>
    <body>
        <form action="" method="post">
            Cantidad: <input name="cantidad" type="number" placeholder="Cantidad en €">
            <select id="moneda" name="moneda">
                <option value="euro">€</option>
                <option value="dolar">$</option>
                <option value="libra">£</option>
            </select>
            <input type="submit" name="cambiaEuro" value="Cambiar">
        </form>
        <?php
        if (isset($_POST["cambiaEuro"])) {
            if ($_POST['moneda'] == 'dolar') {
                $rED = $client->call('EuroDolar', array('cantidad' => $_POST['cantidad']));
                echo 'Al cambio obtienes: ' . $rED . '$<br>';
            } elseif ($_POST['moneda'] == 'libra') {
                $rEL = $client->call('EuroLibra', array('cantidad' => $_POST['cantidad']));
                echo 'Al cambio obtienes: ' . $rEL . '£<br>';
            }else{
                $rED = $client->call('EuroDolar', array('cantidad' => $_POST['cantidad']));
                echo 'Al cambio obtienes: ' . $rED . '$<br>';
                $rEL = $client->call('EuroLibra', array('cantidad' => $_POST['cantidad']));
                echo 'Al cambio obtienes: ' . $rEL . '£<br>';
            }
        }
        ?>
        <form action="" method="post">
            Introduce cantidad y elige moneda: <input name="cantidad2" type="number" placeholder="Cantidad">
            <select id="moneda" name="moneda2">
                <option value="dolar">$</option>
                <option value="libra">£</option>
            </select>
            <input type="submit" name="devuelveEuro" value="Cambiar">
        </form>
        <?php
        if (isset($_POST['devuelveEuro'])) {
            if ($_POST['moneda2'] == 'dolar') {
                $rDE = $client->call('DolarEuro', array('cantidad' => $_POST['cantidad2']));
                echo 'Al cambio obtienes: ' . $rDE . '€<br>';
            } else {
                $rLE = $client->call('LibraEuro', array('cantidad' => $_POST['cantidad2']));
                echo 'Al cambio obtienes: ' . $rLE . '€<br>';
            }
        }
        ?>
    </body>
</html>


