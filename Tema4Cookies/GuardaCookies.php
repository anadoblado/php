<html>
    <head></head>
    <body>

        <?php
       
            echo "Hola " . $_COOKIE['nombreUsuario'] . " ,su última visita fue:" . $_COOKIE['ultimoAcceso'];
      
        ?>
        <form action="CookiesFormulario.php" method="post">

            <input type="submit" name="volver" value="Volver">

        </form>
    </body>
</html>

