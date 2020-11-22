<!DOCTYPE html>
<!--
Ejemplo de clase
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $fecha = date('d-m-y h:i:s');

        setcookie('ultimoAcceso', $fecha);

        if (isset($_COOKIE['ultimoAcceso'])) {
            ?>
            Su última conexión fue: <?php echo $_COOKIE['ultimoAcceso'] ?>
            <?php
        } else {

            echo "Primer acceso a la página";
        }
        ?>
    </body>
</html>
