<?php

session_start();

if (!isset($_SESSION['nombre'])) {
    header("location:index.php");
} else {

    //echo $_SESSION['nombre'];
    unset($_SESSION['cesta']);
    ?>
    <html>
        <head>
            <title>title</title>
            <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
        </head>
        <body class="pagcesta">
            <span class="mensaje">Compra realizada con éxito</span>
            <form action="vistaCesta.php">
                <input type="submit" name="volver" value="Volver a lista de productos">
            </form>
        </body>
    </html>


    <?php
}
?>

