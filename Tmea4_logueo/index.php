<?php
$incorrecto = false;
session_start();

if (!isset($_SESSION["intentos"])) {
    echo "hola";
    
    $_SESSION["intentos"] = 3;
}
if ($_SESSION["intentos"] == 0) {
    header("location:intentos.php");
}

if (isset($_POST['enviar']) && isset($_POST['nombre']) && isset($_POST['pass'])) {

    try {
        $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
        $conex = new PDO('mysql:host=localhost; dbname=dwes; charset=UTF8mb4', 'dwes', 'abc123.', $opciones);
        $error = $conex->errorInfo();
        //comprobar con la mia
       $result = $conex->query("SELECT * FROM usuarios WHERE nombre='$_POST[nombre]' and password='" . md5($_POST["pass"]) . "'");

        
        
        if ($result->rowCount()) {
            session_name();
            session_start();
            $_SESSION['nombre'] = $_POST['nombre'];
            header("location:.php");
        } else {
            $incorrecto = true;
            $_SESSION["intentos"]--;
            echo"restar";
            if (($_SESSION["intentos"]) == 0)
                header("location:intentos.php");
        }
    } catch (PDOException $exc) {
        echo $exc->getTraceAsString(); // error de php
        echo 'Error:' . $exc->getMessage(); // error del servidor de bd
    }
} if (!isset($_POST["enviar"]) || $incorrecto == true) {
    ?>
    <html>
        <head>
            <title>Login</title>
            <link rel="stylesheet" type="text/css" href="myStyle.css" media="screen" />
        </head>
        <body>

            <div id='login'>
                <form action='' method='post'>
                    <fieldset >
                        <?php
                        if ($incorrecto == true) {
                            echo '<span class="mensaje">USUARIO INCORRECTO TE QUEDAN '.$_SESSION["intentos"].' INTENTOS</span>';
                        }
                        ?>
                        <legend>FORMULARIO DE REGISTRO</legend>
                        <div><span class='error'>	</span></div>
                        <div class='campo'>
                            <label for='usuario' >Usuario:</label><br/>
                            <input type='text' name='nombre' id='usuario' maxlength="50" /><br/>
                        </div>
                        <div class='campo'>
                            <label for='password' >Contraseña:</label><br/>
                            <input type='password' name='pass' id='password' maxlength="50" /><br/>
                        </div>
                        <div class='campo'>
                            <input type='submit' name='enviar' value='Enviar' />
                            <input type='submit' name='registrar' value='Registrar' />
                        </div>
                    </fieldset>
                </form>
            </div>

            <?php
        }
        ?>

    </body>
</html>
