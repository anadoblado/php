<?php
require_once 'Zona.php';
session_start();
if (!isset($_SESSION["zonas"])) {
    $zonas = ["principal" => 1000, "compra_venta" => 200, "VIP" => 25];
    foreach ($zonas as  $zona => $entradas) {
        // creamos el array de zonas en una sesión y suponemos las entradas restantes iguales a las totales
        $_SESSION["zonas"][$zona] = new Zona($zona, $entradas, $entradas);
    }
}
if (isset($_POST["comprar"])) {
    // restamos las entradas que hemos comprado para actualizar las entradas restantes
    $plazas_restantes = $_SESSION["zonas"][$_POST["zona"]]->plazas_restantes - $_POST["num_entradas"];
    if ($plazas_restantes >= 0)
        $_SESSION["zonas"][$_POST["zona"]]->plazas_restantes = $plazas_restantes;
    else
        echo "Ha seleccionado más plazas de las dispobibles";
}
?>
<html>
    <head>
        <title>index</title>
    </head>
    <body>
        <h1>Expocoches Campanillas</h1>
        <p>Bienvenidos a Expocoches Campanillas. ¿Cuántas entradas desea comprar?</p>
        <form action="" method="post">
            Zona: <select name="zona">
                  <?php
                  foreach ($_SESSION["zonas"] as $zona) {
                  ?>
                      <option value="<?php echo $zona->nombre_zona; ?>"><?php echo $zona->nombre_zona; ?></option>
                  <?php
                  }
                  ?>
                  </select>
            Número de entradas: <input type="number" name="num_entradas" value="1">   
            <button type="submit" name="comprar">Comprar</button>
        </form>
            <?php
            foreach ($_SESSION["zonas"] as $zona) {
                // recorremos el array de zonas y lo sacamos porque tenemos su toString
                echo $zona."<br><br>";
            }
            ?>
    </body>
</html>