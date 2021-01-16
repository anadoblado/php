<html>
    <head>
        <title>El tiempo</title>
    </head>
    <body>
        <form action="" method="post">
            Número loteria Navidad: <input type="text" name="navidad">
            <input type="submit" name="buscar1" value="Consultar">
        </form>
        <br>
        <form action="" method="post">
            Número loteria del Niño: <input type="text" name="ninio">
            <input type="submit" name="buscar2" value="Consultar">
        </form>
    </body>
</html>
<?php
if(isset($_POST['buscar1'])){
    //Desplegaremos con $server->service nuestro servicio web
    $numero = $_POST['navidad'];
$server=file_get_contents("https://api.elpais.com/ws/LoteriaNavidadPremiados?n=".$numero);
$server = str_replace("busqueda=", "", $server);
$r= json_decode($server);
echo "<hr>";
echo "<h3>Resultado: </h3>";
echo "El número: ".$numero." ha resultado con el premio de  " .$r->premio." € <br>";
}
?>
<?php
if(isset($_POST['buscar2'])){
    //Desplegaremos con $server->service nuestro servicio web
    $numero = $_POST['ninio'];
$server=file_get_contents("https://api.elpais.com/ws/LoteriaNinoPremiados?n=".$numero);
$server = str_replace("busqueda=", "", $server);
$r= json_decode($server);
echo "<hr>";
echo "<h3>Resultado: </h3>";
echo "El número: ".$numero." ha resultado con el premio de  " .$r->premio." € <br>";
}
?>

