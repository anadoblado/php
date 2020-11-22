<?php
session_start();
if (isset($_POST['borrar'])) {
    //$_SESSION['idioma']="";
    //$_SESSION['perfil']="";
    //$_SESSION['zonaHoraria']="";
    // si pulsamos borrar, destruimos la sesión y con ella sus datos
    session_unset();
    session_destroy();
    echo session_id();
    echo "<br>";
    echo session_name();
}
?>

<html>
    <head>
        <title>Mostrar</title>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    </head>
    <body>
        <fieldset>
            <legend>Preferencias</legend>

            <?php
            if (isset($_POST['borrar'])) {
                echo '<span class=' . "mensaje" . '>Información de sesión eliminada.</span><br>';
            }
            ?>
            <form action="" method="post">
                <label class="etiqueta">Idioma:</label><br>
                <label class="texto"><?php if (isset($_SESSION['idioma'])) echo $_SESSION['idioma']; ?></label><br><br>


                <label class="etiqueta">Perfil público</label><br>
                <label class="texto"><?php if (isset($_SESSION['perfil'])) echo $_SESSION['perfil']; ?></label><br><br>

                <label class="etiqueta">Zona horarioa</label><br>
                <label class="texto"><?php if (isset($_SESSION['zonaHoraria'])) echo $_SESSION['zonaHoraria']; ?></label><br><br>

                <br><!-- comment -->
                <input type="submit" name="borrar" value="Borrar preferencias">
                <br><!-- comment -->
                <a href="preferencias.php">Establecer preferencias</a>
            </form>
        </fieldset>

    </body>
</html>


