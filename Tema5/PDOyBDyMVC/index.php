<?php
require_once './Controlador/controladorProducto.php';

//$p = new Producto(5, "vaqueros", 70);
//controladorPruducto::insertar($p);
//echo controladorPruducto::buscarProducto(1);
//$productos = controladorPruducto::recuperarTodos();
//foreach ($productos as $valor){
//    echo "Código: ".$valor->codigo." nombre ".$valor->nombre. " precio: ".$valor->precio."<br>";
//}
?>
<html>
    <head>
        <title>title</title>
    </head>
    <body>
        <form action="" method="post">
            Codigo <input name="codigo" type="text"><!-- comment -->
            <input type="submit" name="enviar" value="Enviar">
    <?php
    if (isset($_POST['enviar'])) {
        $p = controladorPruducto::buscarProducto($_POST['codigo']);
        echo $p;
    }
    ?>
        </form>
    </body>
</html>


