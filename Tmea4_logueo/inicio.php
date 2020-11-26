<?php
session_name();
session_start();

if (!isset($_SESSION['user'])) {
    header("location:index.php");
}

if ( $_SESSION['intentos'] == 0){
    header("location:intentos.php");
}
echo 'Bienvenido '.$_SESSION['nombre'];
if(isset($_POST['salir'])){
    setcookie('PHPSESSID', "", time()-3600, "/");
    session_unset();
    session_destroy();
    header("location:index.php");
}

?>
<html>
    <head>
        <title>Inicio</title>
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

        <fieldset>
            <div id="contenedor">
                <div class="inico" id="saludo">
                    <h3>Hola <?php echo $_SESSION['nombre'];?></h3>
                    <form action="" method="post">
                        <input type="submit" value="Salir" name="salir">
                    </form>   
                </div>
            </div>
            <div>
                <h1>Bienvenido a nuestra web</h1>
                <form action="datos.php" method="post">
                    <input type="submit" name="datos" value="Ver mis datos">
                </form>
            </div>
        </fieldset>
        
    </body>
</html>
