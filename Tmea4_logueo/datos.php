<?php
session_name();
session_start();
//echo $_SESSION['nombre'];
//echo $_SESSION['apellido'];
if (!isset($_SESSION['user'])) {
    header("location:index.php");
}

if ( $_SESSION['intentos'] == 0){
    header("location:intentos.php");
}
if(isset($_POST['salir'])){
    setcookie('PHPSESSID', "", time()-3600, "/");
    session_unset();
    session_destroy();
    header("location:index.php");
}
?>
<html>
    <head>
        <title>Datos</title>
        <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
         <style>
            body{
                background-color: <?php echo $_SESSION['color_fondo']; ?> ;
                color: <?php echo $_SESSION['color_letra']; ?>;
                font-family:<?php echo $_SESSION['tipo_letra']; ?> ;
                font-size: <?php echo $_SESSION['tam_letra']; ?>;
            }
        </style>
    </head>
    <body>
        <div>
            <h3>Hola <?php echo $_SESSION['nombre']; ?></h3>
        </div>
        <div class="contenedor">
            <h1>Tus datos son:</h1><!-- comment -->
            <form action="" method="post">
                <label>Nombre: <?php echo $_SESSION['nombre']; ?></label><br>
                <label>Apellidos: <?php echo $_SESSION['apellidos']; ?></label><br>
                <label>Dirección: <?php echo $_SESSION['direccion']; ?></label><br>
                <label>Localidad: <?php echo $_SESSION['localidad']; ?></label><br>
                <input type="submit" name="salir" value="Salir">
            </form>
        </div>
    </body>
</html>
